<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->helper('generic');
			$this->load->library('encryption');
			//$this->load->library('WebService');
		}

		public function Index(){
			$data['titulo'] = "Administrador";
			$this->session->set_userdata(array('r_usuario' => 18256317));
			if ($this->ValidarSession() == false) {
					return;
				}
			$data['adminData'] = $this->AdminModel->getAdminPersonalData($this->session->userdata('r_usuario'));
			$data['tipoAdmin'] = $this->AdminModel->getTipo_usuario($this->session->userdata('r_usuario'));
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/index');
			$this->load->view('plantilla/footer');
		}

		public function BuscarUsuario(){
			if (!empty($this->input->post('searchdata'))) {
				$data['filtro'] = $this->input->post('searchdata');
				if (strlen($data['filtro']) > 2) {
					$data['searchlist'] = $this->AdminModel->buscar_usuario_like($data['filtro']);
					foreach ($data['searchlist'] as $key => $value) {
						$data['searchlist'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
					}
				}
			}
			$data['titulo'] = "Buscar usuario";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/buscar_usuario');
			$this->load->view('plantilla/footer');
		}

		public function EditarUsuario(){
			$data['postdata'] = $this->input->post();
			if (!empty($data['postdata'])) {
				$userdata = $this->AdminModel->getUserData($data['postdata']['rut']);
				$userdata = $userdata[0];
				$data['titulo'] = "Usuario actualizado";
				$data['status']['cantidad_cambios'] = 0;
				$data['status']['usuario_esperado'] = "";
				$data['status']['facultad'] = "";

				//Actualiza el usuario esperado
				if ($data['postdata']['esperado'] == 1 || $data['postdata']['esperado'] == 0) {
					if ($userdata['usuario_esperado'] != $data['postdata']['esperado']) {
						$this->AdminModel->setUsuarioEsperado($data['postdata']['esperado'], $data['postdata']['rut']);
						$data['status']['usuario_esperado'] = "<span class='text-success'>El usuario ahora es esperado</span>";
						$data['status']['cantidad_cambios']++;
					}
				}
				
				//Agrega la facultad al usuario
				if (is_numeric($data['postdata']['facultad'])) {
					if (!$this->AdminModel->isFacultadInUser($data['postdata']['facultad'], $data['postdata']['rut'])) {
						$this->AdminModel->setUsuarioFacultad($data['postdata']['facultad'], $data['postdata']['rut']);
						$nombrefacultad = $this->AdminModel->getFacultad($data['postdata']['facultad']);
						$data['status']['facultad'] = "<span class='text-success'>Se ha agregado la facultad: </span><b>".$nombrefacultad[0]['nombre_facultad']."</b>";
						$data['status']['cantidad_cambios']++;
					}else{
						$data['status']['facultad'] = "<span class='text-danger'>El usuario ya pertenece a esta facultad</span>";
					}
				}
				//Se genera la vista
				generarVista('admin/asignar_usuario', $data);
			}else{
				errorMessage("Error no existen datos", "Usted no ha enviado ningun dato para editar");
			}
		}

		private function CrearPerfil($rut){
			/*$data['titulo'] = 'Crear Perfil';
			$data['userdata'] = $this->WebService->getDatos_v2('GET', 'persona', array('recurso' => 'datos',  'variable' => 'rut', 'valor' =>$rut));
			if ($data['userdata']['status'] == 1) {
				print_r($data['userdata']);
				generarVista('admin/crear_perfil', $data);
			}else{
				errorMessage("Usuario no se encuentra en el webservice", "El usuario solicitado no se encuentra en el webservice");
			}*/
		}

		private function EditarPerfil($rut){
			$data['titulo'] = 'Perfil';
			$data['userdata'] = $this->AdminModel->getUserData($rut);
			$data['userdata'][0]['facultades'] = $this->AdminModel->getUserFacultades($rut);
			$data['userdata'] = $data['userdata'][0];
			$data['facultades'] = $this->AdminModel->getAllFacultades();
			generarVista('admin/perfil_usuario', $data);
		}

		public function Perfil()
		{
			$data['rut'] = $this->uri->segment(3);
			if (!empty($data['rut'])) {
				if ($this->AdminModel->isUserinBD($data['rut'])) {
					//Mostrar perfil
					$this->EditarPerfil($data['rut']);
				}else{
					//Mostrar creador de perfil
					$this->CrearPerfil($data['rut']);
				}
			}else{
				errorMessage("No existe rut", "Porfavor ingrese un rut valido");
			}
		}

		public function RegistroConexiones(){
			//Esta funcion usa el helper "Generic"
			if ($this->uri->segment(3)) {
				//Validaciones
				$data['rut'] = $this->uri->segment(3);
				buscarUsuario_BD($data['rut']);
				//Construir Pagina
				$data['titulo'] = 'Registro de conexiones';
				$data['registro_conexion'] = $this->AdminModel->getAllConnections($data['rut']);
				$data['userData'] = $this->AdminModel->getUserData($data['rut']);
				//Genera el Template de la vista + La vista pasada, adicionalmente le pasamos los datos.
				generarVista('admin/registro_conexiones', $data);
			}
		}

		public function ListaCompleta(){
			/* |buscar_todos_usuarios_esperados(boolean)
			 * |----------------------------------------
			 * | true: Busca a todos los usuarios marcandos como esperados que hayan ingresado al sistema.
			 * | false: Busca todos los usuarios marcados como NO esperados que hayan ingresado al sistema.
			 */
			//echo $this->config->item('current_app_year');
			$data['facultades'] = $this->AdminModel->getAllFacultades();

			if (isset($_REQUEST['filter'])) 
			{
				$filtro['facultad'] = $this->input->post('filter');


				$data['searchlist_esperados'] = $this->AdminModel->buscar_todos_usuarios_esperados_filtrados(true, $filtro['facultad'] );
				foreach ($data['searchlist_esperados'] as $key => $value) {
					$data['searchlist_esperados'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}

				$data['searchlist_no_esperados'] = $this->AdminModel->buscar_todos_usuarios_esperados_filtrados(false, $filtro['facultad']);
				foreach ($data['searchlist_no_esperados'] as $key => $value) {
					$data['searchlist_no_esperados'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}

				$data['searchlist_esperados_no_ingresado'] = $this->AdminModel->buscar_usuarios_no_ingresado_filtrado($filtro['facultad']);
				foreach ($data['searchlist_esperados_no_ingresado'] as $key => $value) {
					$data['searchlist_esperados_no_ingresado'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}


			}else{
				$data['searchlist_esperados'] = $this->AdminModel->buscar_todos_usuarios_esperados(true);
				foreach ($data['searchlist_esperados'] as $key => $value) {
					$data['searchlist_esperados'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}
			
			$data['searchlist_no_esperados'] = $this->AdminModel->buscar_todos_usuarios_esperados(false);
				foreach ($data['searchlist_no_esperados'] as $key => $value) {
					$data['searchlist_no_esperados'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}

			$data['searchlist_esperados_no_ingresado'] = $this->AdminModel->buscar_usuarios_no_ingresado();
				foreach ($data['searchlist_esperados_no_ingresado'] as $key => $value) {
					$data['searchlist_esperados_no_ingresado'][$key]['facultades'] = $this->AdminModel->getUserFacultades($value['rut']);
				}
			}

			
			$data['total'] = $this->AdminModel->count_users();
			
			$data['titulo'] = "Lista completa usuarios";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/lista_completa');
			$this->load->view('plantilla/footer');
		}

		public function ListaUsuarios(){
			$data['facultades'] = $this->AdminModel->getAllFacultades();
			$filtro['id_facultad'] = $this->input->post('facultades');
			if (!empty($filtro['id_facultad'])) {
				$data['usuariosfiltrados'] = $this->AdminModel->getFilterUsers($filtro['id_facultad']);	
			}else{
				$data['usuariosfiltrados'] = array ();
			}
			//Relativos a la configuracion general de la pagina.
			$data['titulo'] = 'Listar usuarios';
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/lista_usuarios');
			$this->load->view('plantilla/footer');
		}

		public function Curriculum($rut_usuario=null)
		{	
			$data['url_core'] = $this->config->item('compromiso_base_url');
			$data['rut_usuario'] = $rut_usuario;
			$rut = $rut_usuario;

			if (empty($rut)) {
				$data['heading'] = 'No se ha pasado dato de usuario';
				$data['message'] = 'No ha sido pasada ninguna variable de usuario para visualizar';
				$this->load->view('errors/cli/error_404.php', $data);
				return;
			}

			$isUserInBd = $this->AdminModel->isUserinBD($rut);
			if ($isUserInBd == false) {
				$data['heading'] = 'No existe en la base de datos';
				$data['message'] = 'El usuario solicitado no existe en la base de datos';
				$this->load->view('errors/cli/error_404.php', $data);
				return;
			}

			$data['titulo'] = "Detalle Curriculum";
			$data['allData'] = $this->AdminModel->getAllUserDataCurriculum($rut);
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/detalle_curriculum');
			$this->load->view('plantilla/footer');
		}

		/* |-----------------------------------------------------------------
		 * | Funcion de validacion de sesion
		 * |-----------------------------------------------------------------
		 * | Esta funcion verifica si la sesion del usuario esta activa.
		 * | 1.- Verifica si esta seteada la variable de sesion 'r_usuario'.
		 * | 2.- Evalua si el rut de sesion del usuario se encuentra en la base de datos.
		 * | 3.- Luego valida si el usuario posee suficientes permisos para acceder a la pantalla de administracion.
		 */
		function ValidarSession()
		{
			if (!$this->session->userdata('r_usuario')) {
				$data['heading'] = 'Debe estar conectado para realizar cualquier accion';
				$data['message'] = 'No es posible realizar ninguna accion sino esta conectado';
				$this->load->view('errors/custom/error_session.php', $data);
				return false;
			}

			$rut_session = $this->session->userdata('r_usuario');

			if ($this->AdminModel->isUserinBD($rut_session) == false) {
				$data['heading'] = 'Base de datos';
				$data['message'] = 'El usuario no se encuentra en la base de datos';
				$this->load->view('errors/custom/error_session.php', $data);
				return false;
			}

			$data['adminData'] = $this->AdminModel->getTipo_usuario($rut_session);

			if ($data['adminData'][0]['tipo'] == 'PROFESOR' || $data['adminData'][0]['tipo'] == null) {
				$data['heading'] = 'Permisos';
				$data['message'] = 'Usted no cuenta con los permisos necesarios para acceder a este modulo, para mas informacion contacte con el administrador del sistema';
				$this->load->view('errors/custom/error_session.php', $data);
				return false;
			}

			return true;
		}
		//Fin ValidarSession.

		public function isThisSession($userLevel){

		}
	}
?>