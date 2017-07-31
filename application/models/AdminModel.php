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

		function getAllDepartamentos(int $data){
			$this->db->select('id_departamento, nombre_departamento');
			$this->db->from('departamento');
			$this->db->where('id_facultad', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getFilterUsers($data){
			$this->db->select('usuario.nombre_usuario, usuario.apellido_paterno, usuario.apellido_materno, usuario.rut_usuario, usuario.dv');
			$this->db->from('profesor');
			$this->db->where('id_facultad', $data);
			$this->db->join('usuario', 'usuario.rut_usuario = profesor.rut_usuario', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getDataCurriculumUser($data){
			$this->db->select('usuarionombre_usuario, usuarioapellido_paterno, usuarioapellido_materno, usuario.rut_usuario, usuario.dv');
			$this->db->from('profesor');
			$this->db->where('id_facultad', $data);
			$this->db->join('usuario', 'usuario.rut_usuario = profesor.rut_usuario', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>