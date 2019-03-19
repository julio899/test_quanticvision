<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		isAdmin();
	}

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

	public function update()
	{

		$datos = array(
				'id' 		=> $this->input->post_get('id'),
				'nombres' 	=> $this->input->post_get('name'),
               	'apellidos' => $this->input->post_get('last_name'),
               	'telefono' 	=> $this->input->post_get('phone') ,
               	'email' 	=> $this->input->post_get('email') 
               );

		$resp = $this->data->updateUser( $datos );
		
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
            				array(
			                    'text' => 'User Response',
			                    'type' => 'Default',
			                    'data' => $resp
            				)
            			)
            );
	}

	public function remove()
	{

		$datos = array(
				'id' 	=> $this->input->post_get('id')
               );

		$resp = $this->data->removeUser( $datos );
		
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
            				array(
			                    'text' => 'User Response',
			                    'type' => 'Default',
			                    'data' => $resp
            				)
            			)
            );
	}

	public function add()
	{

		$datos = array(
				'nombres' 	=> $this->input->post_get('name'),
               	'apellidos' => $this->input->post_get('last_name'),
               	'telefono' 	=> $this->input->post_get('phone') ,
               	'email' 	=> $this->input->post_get('email') ,
               	'username' 	=> $this->input->post_get('username') ,
               	'fecha_creacion' 	=> $this->input->post_get('date') ,
               	'password' 	=> $this->input->post_get('password') ,
               	'Rol_id' 	=> $this->input->post_get('rolid') ,
               	'activo' 	=> '1' 
               );

		$resp = $this->data->addUser( $datos );
		
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
            				array(
			                    'text' => 'User Response',
			                    'type' => 'Default',
			                    'data' => $resp
            				)
            			)
            );
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
