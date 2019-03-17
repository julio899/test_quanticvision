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
