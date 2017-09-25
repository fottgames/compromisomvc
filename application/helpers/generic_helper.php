<?php
	//Pantalla generica de error que permite realizarlos de manera mas rapida y facil.
	function errorMessage($heading, $mensaje){
		$CI = get_instance();
		$data['heading'] = $heading;
		$data['message'] = $mensaje;
		$CI->load->view('errors/custom/error_message', $data);
		die($CI->output->get_output());
	}

	//Pantalla generadora de vista, permite pasarle informacion y agrega el Template por defecto a la vista.
	function generarVista($vista, $data){
		$CI = get_instance();
		$CI->load->view('plantilla/header', $data);
		$CI->load->view('plantilla/navbar');
		$CI->load->view($vista);
		$CI->load->view('plantilla/footer');
	}

	function buscarUsuario_BD($rut_usuario){
		$CI = get_instance();
		if (!$CI->AdminModel->isUserinBD($rut_usuario)) {
			errorMessage('Usuario no en base de datos', 'El usuario solicitado no se encuentra en la base de datos');
		}
	}
?>