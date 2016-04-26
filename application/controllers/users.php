<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('User');
    	$this->load->model('Post');
    	$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='red'>", "</p>");
  	}

	public function index()
	{
		$this->load->view('/nav');
		$this->load->view('/users/home');
	}



	public function addNew()
	{
	
		if ($this->session->userdata('user_level')==9 && $this->session->userdata('logged_in')===true)
		{
			$this->load->view('/nav_logged_in');
			$this->load->view('/users/new');
		}else
		{
			redirect('/users/signin');
		}
	}

	public function signin()
	{
		
		//validate

		$this->form_validation->set_rules("username", "email", "required|valid_email|trim");
		$this->form_validation->set_rules("password", "password", "required|min_length[8]|trim");
		$this->form_validation->set_error_delimiters("<p class='red'>", "</p>");

		if ($this->form_validation->run()==true)
			{ 
				$data = array(
				"email"=>$this->input->post('username'),
				"password"=> $this->input->post('password')
				);
		
				$userRecord = $this->User->Authenticate($data);

				if ($userRecord)
				{	
					// var_dump($userRecord);
					// die();
					$this->session->set_userdata('id', $userRecord['id']);
					$this->session->set_userdata('first_name', $userRecord['first_name']);
					$this->session->set_userdata('last_name', $userRecord['last_name']);
					$this->session->set_userdata('email', $userRecord['email']);
					$this->session->set_userdata('user_level', $userRecord['user_level']);
					$this->session->set_userdata('created_at', $userRecord['created_at']);

					if ($this->session->userdata('user_level')==9)
					{
						$this->session->set_userdata('logged_in', true);
						redirect('/dashboards/admin');
					}
					else
					{
						$this->session->set_userdata('logged_in', true);
						redirect('/dashboards');
					}
					
				}
				else
				{
					$this->session->set_flashdata("password_error", "<p class='red'>Passwords don't match</p>");
					$this->load->view('/users/signin');

				}
			}
		else
			{
				$this->load->view('/users/signin');
			}
		// $this->load->view('/nav');
		// $this->load->view('/users/signin');
		//WHEN YOU WRITE THE SIGN IN FUNCTION - CHECK FOR THE KIND OF USER AND ROUTE APPROPRIATELY (ADMIN VS. USER)
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/users');
	}

	public function registration()
	{
		
		$this->load->view('/nav');
		$this->load->view('/users/register');
	}

	public function createAccount()
	{
		//receive the post data and perform validation
		if($this->session->userdata('user_level')==9)
		{
			$this->session->set_userdata('admin_add', true);
		}
		else
		{
			$this->session->set_userdata('admin_add',false);
		}
			$this->form_validation->set_rules("email", "email address", "required|valid_email|is_unique[users.email]|trim");
			$this->form_validation->set_rules("first_name", "first name", "required|alpha|trim");
			$this->form_validation->set_rules("last_name", "last name", "required|alpha|trim");
			$this->form_validation->set_rules("password", "password", "required|min_length[8]|trim");
			$this->form_validation->set_rules("conf_password", "password confirmation", "required|matches[password]|trim");


		if($this->form_validation->run() === true)
		{	//proceed
			$userData = array(
				"email" => $this->input->post('email'),
				"first_name" => $this->input->post('first_name'),
				"last_name" => $this->input->post('last_name'),
				"password" => $this->input->post('password'),
				"conf_password" => $this->input->post('conf_password'),
				);

			if($this->User->createAccount($userData))
			{
				//goto the dashboard
				//set session variable to logged in
				$email = $this->input->post('email');

				$this->session->set_userdata('logged_in', true);
				$currentUser = $this->User->getUserByEmail($email);
				// var_dump($currentUser);
				// die();

				$this->session->set_userdata('id', $currentUser['id']);
				$this->session->set_userdata('first_name', $currentUser['first_name']);
				$this->session->set_userdata('last_name', $currentUser['last_name']);
				$this->session->set_userdata('email', $currentUser['email']);
				$this->session->set_userdata('created_at', $currentUser['created_at']);

				
				if ($this->session->userdata('admin_add')===true)
				{
					//don't update the session userlevel

					$this->session->set_userdata('admin_add',false);
				}
				else
				{
					$this->session->set_userdata('user_level', $currentUser['user_level']);
				}

				if ($this->session->userdata["user_level"]==9)
				{
					redirect('/Dashboards/admin');
				}
				else
				{
					redirect('/Dashboards/');
				}
				

			}
			else
			{
				//there was some issue writing the record
				$this->session->set_userdata('logged_in', false);
				echo ("problem writing to DB.");
			}
		}
		else
		{
			//redirect to registration page
			// redirect('/Users/registration');
			$this->load->view('nav');
			$this->load->view('/Users/register');
		}

	}

	public function edit()
	{
		$this->load->view('/nav_logged_in');
		$this->load->view('/users/edit');
	}

	public function show($id)
	{
		
		$userRecord['userData'] = $this->User->getUserByID($id);
		$userPosts['userPosts'] = $this->Post->getPosts_and_comments_byUserId($id);
		$this->load->view('/nav_logged_in');
		$this->load->view('/users/show', $userRecord);
		$this->load->view('/posts/posts', $userPosts);
	}

	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */