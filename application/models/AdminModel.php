<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminModel extends CI_Model
	{
		function getAllUsers(){
			$query = $this->db->get('usuario');
			return $query->result();
		}

		function getAllFacultades(){
			$query = $this->db->get('facultad');
			return $query->result();
		}

		function getFilterUsers($data){
			$this->db->select('nombre_usuario, apellido_paterno, apellido_materno, usuario.rut_usuario, usuario.dv');
			$this->db->from('profesor');
			$this->db->where('id_facultad', $data);
			$this->db->join('usuario', 'usuario.rut_usuario = profesor.rut_usuario', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>