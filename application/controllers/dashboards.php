<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('User');

	}

	public function index()
	{

		$data['allUsers'] = $this->User->getAllUsers();

		if (count($data)>0){

			$this->load->view('/nav_logged_in');
			$this->load->view('/dashboard/dashboard', $data);
		}
		else
		{
			echo("Something went terribly wrong.  Please yell at our developers.  =(" );
		}

		
	}

	public function admin()
	{
		$data['allUsers'] = $this->User->getAllUsers();

		if (count($data)>0){

			$this->load->view('/nav_logged_in');
			$this->load->view('/dashboard/admin_dashboard', $data);
		}
		else
		{
			echo("Something went terribly wrong.  Please yell at our developers.  =(" );
		}


	}

}