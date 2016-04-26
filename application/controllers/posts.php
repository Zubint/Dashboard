<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller{

public function __construct(){

	parent::__construct();

	$this->load->library('form_validation');
	$this->load->model('Post');
	$this->load->model('User');
	$this->form_validation->set_error_delimiters("<p class='red'>", "</p>");

}

public function addComment($postId)
	{
	
		$this->form_validation->set_rules("post_comment", "comment", "required|trim");

		if ($this->form_validation->run()===true)
		{
			$data = array(
				"post_id" => $postId,
				"comment" => $this->input->post('post_comment'),
				"user_id" => $this->session->userdata('id')
			);

			if ($this->Post->writeComment($data))
				{
					// echo("at redirect");
					$id = $this->db->query("Select posts.user_id from posts where id=?",$postId)->row_array();
					redirect('/users/show/'.$id['user_id']);
				}
		}



	}

	public function addPost($id)
	{

		// $id is the person you are leaving the message for
		$this->form_validation->set_rules("post_message", "message", "required|trim");

		if ($this->form_validation->run() ===true)
		{
			//write the record
			$postData = array(
				"userId" => $id,
				"posted_by" => $this->session->userdata('id'),
				"post_text" => $this->input->post('post_message')
				);

			if ($this->Post->writePost($postData)===true)
				{	
					redirect('/users/show/'.$id);
				}
				else
				{
					echo ("there was an error writing to the database, please try again later");
					die();
				}
		}
		else
		{
					$userRecord['userData'] = $this->User->getUserByID($id);
					$userPosts['userPosts'] = $this->Post->getPosts_and_comments_byUserId($id);
					$this->load->view('/nav_logged_in');
					$this->load->view('/users/show', $userRecord);
					$this->load->view('/posts/posts', $userPosts);
		}
	}
}