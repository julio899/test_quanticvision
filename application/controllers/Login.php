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
}