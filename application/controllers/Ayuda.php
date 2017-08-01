<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Ayuda extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('pagination');
			$this->load->library('table');
		}

		public function Index(){
			$data['titulo'] = "Ayuda";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/index');
			$this->load->view('plantilla/footer');
		}

		public function DocumentosOficiales()
		{
			$data['titulo'] = "Documentos oficiales";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/documentos_oficiales');
			$this->load->view('plantilla/footer');
		}

		public function PreguntasFrecuentes()
		{
			$data['titulo'] = "Preguntas frecuentes";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/preguntas_frecuentes');
			$this->load->view('plantilla/footer');
		}

		public function VideoTutoriales()
		{
			$data['titulo'] = "Video tutoriales";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/video_tutoriales');
			$this->load->view('plantilla/footer');
		}

		public function ManualUsuario()
		{
			$data['titulo'] = "Manual de uso";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/manual_usuario');
			$this->load->view('plantilla/footer');
		}

		public function MesaAyuda()
		{
			$data['titulo'] = "Mesa de ayuda";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/mesa_ayuda');
			$this->load->view('plantilla/footer');
		}

		public function SobreSistema()
		{
			$data['titulo'] = "Sobre el sistema";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('ayuda/sobre_sistema');
			$this->load->view('plantilla/footer');
		}
	}
?>