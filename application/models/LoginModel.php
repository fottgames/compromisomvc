<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LoginModel extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}

		//Esta funcion devuelve 'true' si el usuario existe en la base de datos, de los contrario devuelve 'false'.
		function IsUserInBd($data){
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where('rut_usuario', $data);
			$result = $this->db->get();
			if ($result->num_rows() == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
?>