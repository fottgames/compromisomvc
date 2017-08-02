<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Login extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('LoginModel');
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->library('WebService');
		}

		function Index(){
			//Cargar la pantalla de login para que el usuario ingrese su ID y Contraseña.

			$data['titulo'] = "Inicio de sesión";
			$this->load->view('plantilla/header', $data);
			//$this->load->view('plantilla/navbar');
			$this->load->view('login/index');
			$this->load->view('plantilla/footer');
		}

		/*
		 * Esta Funcion se encarga de hacer las validaciones en el momento que el usuario se loguea ademas de crear la sesion del usuario.
		 */
		function LoginValidation(){
			//Obtenemos el valor de la 'x' enviada por el SINTE, si esta no existe mostramos el login de la pagina.
			//Validamos si existe coneccion con el WebService en primer instante y estan todos sus datos setiados.
			//Luego validamos si el usuario existe en la base de datos.
			//Si existe procedemos a validar si el usuario tiene correctamente creada todas sus tablas dentro del sistema de compromiso academico.
			//Luego evaluamos si existen sus carpetas dentro del sistema.
			//Una vez esta todo correctamente setiado, procedemos a crear la sesion del usuario para que use el sistema de manera normal.
		}

		public function valida()
		{
			$rut = $this->input->post('rut');
			$password = $this->input->post('password');

			$ConsultaSesion = $this->webservice->getDatos_v2('POST', 'seguridad', array('recurso' => 'validausuario',  'variable' => array('rut' => $rut,  'pass' => $password)));

			//$this->session->set_userdata(array('r_usuario' => 18256317));
			$_SESSION['x_session'] = $ConsultaSesion['datos']['SessionID'];
			echo $_SESSION['x_session'];
			echo "<br>";
			echo "<pre>";
			print_r($ConsultaSesion);
			echo "</pre>";
			
		}
	}
?>