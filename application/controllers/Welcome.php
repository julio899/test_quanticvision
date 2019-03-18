<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Para el control de la session
	 * al iniciar el Constructor si no cumple con 
	 * una cuenta tipo ADMIN deacuerdo al Rol 
	 * isAdmin() lo redireccionara y frenara el acceso a este controlador
	 * @see application/helpers/login_helper
	 */

	public function __construct()
	{
		parent::__construct();
		isAdmin();
	}
	
	public function index()
	{
		$data = array(
						'page'=>'dashboard',
						'users'=>$this->data->getUsers()
					);
		$this->load->view('welcome_message',$data);
	}
}
