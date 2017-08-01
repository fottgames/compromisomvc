<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Curriculum extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->helper('form');
			$this->load->library('pagination');
			$this->load->library('table');
		}

		public function Index(){
			$data['titulo'] = "Currículum académico";
			$this->load->view('plantilla/header', $data);
			$this->load->view('plantilla/navbar');
			$this->load->view('curriculum/index');
			$this->load->view('plantilla/footer');
		}

		
	}
?>