<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Login Authenticator	 
	 */
	public function index()
	{
		$data = array(
						'page'=>'login'
					);
		$this->load->view('login',$data);
	}

	public function authenticate()
	{

		$datos = array(
						'username' =>$this->input->post('appUserField'),
						'password' =>$this->input->post('appPasswordField')
						);

		$resp = $this->data->verifycation($datos);

		if(count($resp)>0)
		{
			$response_status = 'success';
			unset($resp->password);
			// En la posicion nombre se contiene el typo de cuenta
			// Referente a la tabla Rol como lo es ADMIN  
			//var_dump($this->data->getRole($resp->Rol_id));exit();
			$this->session->set_userdata('user_type', $this->data->getRole($resp->Rol_id) );
			$this->session->set_userdata('account', $resp);

			redirect('welcome');
		}else{
			$response_status = 'error';
			$datos = null;	
			$resp = null;		
		}

		if($resp!=null){

		}else{
			$this->session->set_flashdata('error', 'usuario o clave invalida');
			redirect('login');
		}
	}
}