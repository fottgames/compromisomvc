<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('pagination');
			$this->load->library('table');
		}

		public function Index(){
			//$data['facultades'] = json_decode(json_encode($this->AdminModel->getAllFacultades()), true);
			$this->load->view('plantilla/header');
			//$this->load->view('admin/index', $data);
			$this->load->view('plantilla/footer');
		}

		public function listaUsuarios(){
			//Paginacion.
			/*$config['base_url'] = base_url().'Admin/listaUsuarios';
			$config['total_rows'] = 5;
			$config['per_page'] = 5;
			$this->pagination->initialize($config);*/
			//Relativos al filtrado del contenido.
			$data['facultades'] = json_decode(json_encode($this->AdminModel->getAllFacultades()), true);
			//Relativos al filtrado del contenido obteniendo datos.
			$filtro['id_facultad'] = $this->input->post('facultades');
			if (!empty($filtro['id_facultad'])) {
				$data['usuariosfiltrados'] = $this->AdminModel->getFilterUsers($filtro['id_facultad']);	
			}else{
				$data['usuariosfiltrados'] = array ();
			}
			//Relativos a la configuracion general de la pagina.
			$data['titulo'] = 'Listar usuarios';
			$this->load->view('plantilla/header');
			$this->load->view('admin/lista_usuarios', $data);
			$this->load->view('plantilla/footer');
		}

		public function curriculum($rut)
		{
			$data['rut'] = $rut;
			$this->load->view('plantilla/header');
			$this->load->view('admin/detalle_curriculum', $data);
			$this->load->view('plantilla/footer');
		}
	}
?>