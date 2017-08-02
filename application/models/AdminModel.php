<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminModel extends CI_Model
	{
		//Obtiene el nombre del tipo_usuario asociado a un rut.
		function getTipo_usuario($data){
			$this->db->select('tipo_usuario.nombre as tipo');
			$this->db->from('usuario');
			$this->db->where('rut_usuario', $data);
			$this->db->join('tipo_usuario', 'usuario.tipo_usuario = tipo_usuario.id', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		//Obtiene la informacion del usuario administrador.
		function getAdminPersonalData($data){
			$this->db->select('nombre_usuario, apellido_paterno, apellido_materno, tipo_usuario.nombre as tipo');
			$this->db->from('usuario');
			$this->db->where('rut_usuario', $data);
			$this->db->join('tipo_usuario', 'usuario.tipo_usuario = tipo_usuario.id', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		//Devuelve todas las facultades en la base de datos con su respectiva id
		function getAllFacultades(){
			$query = $this->db->get('facultad');
			return $query->result_array();
		}

		//Devuelve todos los departamentos asociados a una id de facultad.
		function getAllDepartamentos($data){
			$this->db->select('id_departamento, nombre_departamento');
			$this->db->from('departamento');
			$this->db->where('id_facultad', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		//Valida si un usuario existe en la base de datos, devuelve true si es asi, de lo contrario devuelve false.
		function isUserinBD($data){
			$this->db->select('rut_usuario');
			$this->db->from('usuario');
			$this->db->where('rut_usuario', $data);
			$result = $this->db->get();
			if ($result->num_rows() == 1) {
				return true;
			}else{
				return false;
			}
		}

		//Obtiene todos los usuarios filtrados a traves de la facultad a la cual pertenecen.
		function getFilterUsers($data){
			$this->db->select('usuario.nombre_usuario, usuario.apellido_paterno, usuario.apellido_materno, usuario.rut_usuario, usuario.dv');
			$this->db->from('profesor');
			$this->db->where('id_facultad', $data);
			$this->db->join('usuario', 'usuario.rut_usuario = profesor.rut_usuario', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		/* |-----------------------------------------------------------------
		 * | Funciones asociadas a los datos pertenecientes al curriculum de un usuario en particular.
		 * |-----------------------------------------------------------------
		 * | Estas funciones permiten rescatar la informacion contenida en el curriculum de una persona.
		 * | 1.- Rescata la informacion personal del usuario asociada a las tablas usuario y profesor.
		 * | 2.- Devuelve toda la informacion del usuario en un array que contiene la informacion de las multiples tablas.
		 * | 
		 * | 
		 */

		function getAllUserDataCurriculum($data){
			$userData['personalData']              = $this->getUsuarioJoinProfesor($data);
			$userData['facultades']                = $this->getUsuario_Facultad($data);
			$userData['departamentos']             = $this->getUsuario_Departamento($data);
			$userData['instituciones']             = $this->getInstitucion($data);
			$userData['formacion_academica']       = $this->getFormacion_academica($data);
			$userData['otros_compromisos']         = $this->getOtros_compromisos_academicos($data);
			$userData['experiencia_docente']       = $this->getExperiencia_docente($data);
			$userData['experiencia_profesional']   = $this->getExperiencia_profesional($data);
			$userData['publicaciones']             = $this->getPublicaciones($data);
			$userData['presentaciones']            = $this->getPresentaciones($data);
			$userData['actividades_actualizacion'] = $this->getActividades_actualizacion($data);
			$userData['postitulo_pasantias']       = $this->getPostitulo_pasantias($data);
			$userData['direccion_tesis']           = $this->getDireccion_tesis($data);
			$userData['investigacion']             = $this->getProyectos_investigacion($data);
			$userData['conferencias']              = $this->getConferencias_dictadas($data);
			$userData['otros_curriculum']          = $this->getOtras_actividades($data);
			$userData['aseguramiento_calidad']     = $this->getAseguramiento_calidad($data);

			return $userData;
		}

		//Obtiene toda la informacion personal del usuario, ademas de su informacion relacionada al curriculum
		function getUsuarioJoinProfesor($data){
			$this->db->select('
				usuario.rut_usuario, 
				usuario.dv,
				usuario.nombre_usuario,
				usuario.apellido_paterno,
				usuario.apellido_materno,
				profesor.fecha_nacimiento,
				profesor.nacionalidad,
				profesor.nacionalidad_otro,
				profesor.correo_personal,
				profesor.direccion_particular,
				profesor.celular,
				profesor.correo_institucional,
				profesor.telefono_laboral,
				profesor.jerarquia_academica,
				profesor.decreto_jerarquia,
				profesor.numero_acta,
				profesor.tipo_contrato,
				profesor.horas,
				profesor.is_academico,
				profesor.is_cea,
				profesor.ciudad_region
				'
				);
			$this->db->from('usuario');
			$this->db->where('usuario.rut_usuario', $data);
			$this->db->join('profesor', 'usuario.rut_usuario = profesor.rut_usuario', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getUsuario_Facultad($data){
			$this->db->select('facultad.nombre_facultad');
			$this->db->from('usuario_facultad');
			$this->db->where('usuario_facultad.rut_usuario', $data);
			$this->db->join('facultad', 'usuario_facultad.id_facultad = facultad.id_facultad', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getUsuario_Departamento($data){
			$this->db->select('departamento.nombre_departamento');
			$this->db->from('usuario_departamento');
			$this->db->where('usuario_departamento.rut_usuario', $data);
			$this->db->join('departamento', 'usuario_departamento.id_departamento = departamento.id_departamento', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getInstitucion($data){
			$this->db->select('nombre, cargo, horas');
			$this->db->from('institucion');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getFormacion_academica($data){
			$this->db->select('titulo_grado, universidad, ano_obtencion, tipo, archivo');
			$this->db->from('formacion_academica');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getOtros_compromisos_academicos($data){
			$this->db->select('nombre, lugar, ano, archivo');
			$this->db->from('otros_compromisos_academicos');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getExperiencia_docente($data){
			$this->db->select('tipo, anos, asignatura, archivo');
			$this->db->from('experiencia_docente');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getExperiencia_profesional($data){
			$this->db->select('cargo, empresa_institucion, contacto, archivo, ano_inicio, ano_termino');
			$this->db->from('experiencia_profesional');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getPublicaciones($data){
			$this->db->select('tipo, nombre, titulo_revista, numero_revista, ano_revista, archivo, estado_revista, indexacion');
			$this->db->from('publicaciones');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getPresentaciones($data){
			$this->db->select('nombre_actividad, ano_presentacion, tipo, lugar, contexto, archivo');
			$this->db->from('presentaciones');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getActividades_actualizacion($data){
			$this->db->select('nombre_actividad, lugar, contexto, ano_inicio, ano_termino, archivo');
			$this->db->from('actividades_actualizacion');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getPostitulo_pasantias($data){
			$this->db->select('nombre_actividad, lugar, ano_inicio, ano_termino, archivo');
			$this->db->from('postitulo_pasantias');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getDireccion_tesis($data){
			$this->db->select('titulo, tipo, ano_inicio, ano_termino, archivo');
			$this->db->from('direccion_tesis');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getProyectos_investigacion($data){
			$this->db->select('tipo, nombre_proyecto, financiamiento, estado, archivo');
			$this->db->from('investigacion');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getConferencias_dictadas($data){
			$this->db->select('tipo, nombre, lugar, ano, archivo');
			$this->db->from('conferencias');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getOtras_actividades($data){
			$this->db->select('nombre_actividad, tipo, lugar, ano, archivo');
			$this->db->from('otros_curriculum');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getAseguramiento_calidad($data){
			$this->db->select('experiencia, cargo, anio, semestre, archivo');
			$this->db->from('aseguramiento_calidad');
			$this->db->where('rut_usuario', $data);
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>