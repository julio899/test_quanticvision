<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Model {

	/**
	 * Modelo principal para el retorno de datos.
	 *
	 * @package		CodeIgniter
	 * @subpackage	Models
	 * @category	Model
	 * @author		Julio Vinachi
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getRoles()
	{
		return $this->db->get('Rol')->result();
	}

	function getRole($id)
	{
		$this->db->select('nombre');
		$this->db->where('id',$id);
		$this->db->limit(1);
		return $this->db->get('Rol')->result()[0]->nombre;
	}

	function getUsers()
	{
		$this->db->select('*');
	    $this->db->from('Usuario u');
	    $this->db->join('Rol R', 'u.rol_id = R.id');
	    $this->db->order_by("u.id", "desc");
	    return $this->db->get()->result(); 
	}

	function addUser($data)
	{
		return $this->db->insert('Usuario', $data); 
	}

	function removeUser($data)
	{
		return $this->db->delete('Usuario', $data); 
	}

	function updateUser($dt)
	{
		$data = array(
               'nombres' 	=> $dt['nombres'],
               'apellidos' 	=> $dt['apellidos'],
               'telefono' 	=> $dt['telefono'],
               'email' 		=> $dt['email']
            );

		$this->db->where('id', $dt['id']);
		return $this->db->update('Usuario', $data);  
	}

	public function verifycation($data)
	{		

		$this->db->where($data);
		$this->db->limit(1);		
		$result = $this->db->get('Usuario')->result();

		if(count($result)>0)
		{
			return $result[0];
		}else{
			return $result;
		}
	}
}
