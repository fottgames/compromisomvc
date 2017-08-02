<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Encuesta extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('pagination');
			$this->load->library('table');
		}

		public function Index(){
			$data['titulo'] = "Encuesta";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('encuesta/index');
			$this->load->view('plantilla/footer');
		}

	}
?>