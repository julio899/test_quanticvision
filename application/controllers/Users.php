<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */

	public function index()
	{
	    return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
                    'text' => 'Users Default',
                    'type' => 'Default Data Enpty'
            )));
	}

	public function roles()
	{
		$roles = $this->data->getRoles();    

	    return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'text' => 'Ok',
                    'type' => 'success',
                    'roles'=> $roles
            )));
	}

	public function validation()
	{
		$datos = array('username' =>'julio899','password' =>'vinachi892');
		$resp = $this->data->verifycation($datos);

		if(count($resp)>0)
		{
			$response_status = 'success';
			unset($resp->password);
		}else{
			$response_status = 'error';
			$datos = null;	
			$resp = null;		
		}

		 return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'text' => 'usuario o clave incorrecta.',
                    'type' => $response_status,
                    'details'=> $resp
            )));
	}
}
