<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AyudaModel extends CI_Model
	{

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
		
	}
?>