<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class WebService
{
	
	public function getDatos_v2($metodo, $controlador, $consulta) {
		$API_URL = 'https://encuestas3.upla.cl/api';

		$API_KEY_NAME = 'KEY';
		$API_KEY_VALUE = '8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS';

		$API_USERNAME = 'admin';
		$API_PASSWORD = '123456';

		$API_VERSION = '1';

		switch ($metodo) {
		    case 'GET':
		    	if (!array_key_exists ('variable', $consulta)) {
		    		$url = $this->limpiarEspacios($API_URL."/v".$API_VERSION."/".$controlador."/".$consulta['recurso']."/".$API_KEY_NAME."/".$API_KEY_VALUE);
		    	} else {
			    	if (is_array($consulta['variable'])) {
			    		$url = $this->limpiarEspacios($API_URL."/v".$API_VERSION."/".$controlador."/".$consulta['recurso']."/".$API_KEY_NAME."/".$API_KEY_VALUE."/?".http_build_query($consulta['variable']));
			    	} else {
			    		if ($consulta['variable'] = '') {
			    			$url = $this->limpiarEspacios($API_URL."/v".$API_VERSION."/".$controlador."/".$consulta['recurso']."/".$consulta['valor']."/".$API_KEY_NAME."/".$API_KEY_VALUE);
			    		} else {
							$url = $this->limpiarEspacios($API_URL."/v".$API_VERSION."/".$controlador."/".$consulta['recurso']."/".$consulta['variable']."/".$consulta['valor']."/".$API_KEY_NAME."/".$API_KEY_VALUE);
			    		}			    		
			    	}
			    }	    	    
		        break;
		    case 'POST':
		        $url = $this->limpiarEspacios($API_URL."/v".$API_VERSION."/".$controlador."/".$consulta['recurso']."/".$API_KEY_NAME."/".$API_KEY_VALUE);
		        $variablesPOST = http_build_query($consulta['variable']);
		         //echo $variablesPOST."<br>";
		        break;
		    default:
		       die();
		}		

		//echo $url."<br>";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'CURL');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
		if ($metodo == 'POST') {
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                         
			curl_setopt($curl, CURLOPT_POSTFIELDS, $variablesPOST); 			
		}

		curl_setopt($curl, CURLOPT_USERPWD, "$API_USERNAME:$API_PASSWORD");
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);		

		$output = curl_exec($curl);
		//console(json_encode($output,true));
		
		$info = curl_getinfo($curl);
		//console(json_encode($info,true));
		
		curl_close($curl);
		return json_decode($output,true);
	}

	private function console($data) {
		if(is_array($data) || is_object($data)) {
			echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
		} else {
			echo("<script>console.log('PHP: ".$data."');</script>");
		}
	}

	private function alert($data) {
		if(is_array($data) || is_object($data))	{
			echo("<script>alert('PHP: ".json_encode($data)."');</script>");
		} else {
			echo("<script>alert('PHP: ".$data."');</script>");
		}
	}

	private function limpiarEspacios($string) {	
		$string = str_replace(" ", "%20", $string);
		return $string;
	}
}

 ?>