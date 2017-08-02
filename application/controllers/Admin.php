<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('session');
		}

		public function Index(){
			$data['titulo'] = "Administrador";
			$this->session->set_userdata(array('r_usuario' => 18256317));
			if ($this->ValidarSession() == false) {
					return;
				}
			$data['adminData'] = $this->AdminModel->getAdminPersonalData($this->session->userdata('r_usuario'));
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('admin/index');
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