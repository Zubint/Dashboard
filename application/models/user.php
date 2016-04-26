<?php 

class User extends CI_model{

	public function getUserByEmail($email)
	{
		$query = "select * from users where email ='" . $email . "'";

		return $this->db->query($query)->row_array();

	}

	public function getUserById($id)
	{
		$query = "Select * from users where id =" . $id;

		return $this->db->query($query)->row_array();
		
	}
	
	public function getAllUsers()
	{
		$query = "select * from users";

		return $this->db->query($query)->result_array();

	}

	public function createAccount($data)
	{
		// var_dump($data);
		// die();

		//remove the 'confirmation password which is the last element from the array'

		array_pop($data);

		if ($this->User->isFirstUser()===true)
		{	//Make this user an
			//admin, otherwise, its just a normal user
				$userLevel = 9; //this is an admin
		}
		else
		{
			$userLevel = 1; //this is a normal user
		}
		
		$data["user_level"]=$userLevel;
		$data["created_at"]=date('Y-m-d H:i:s');
		$data["updated_at"]=date('Y-m-d H:i:s');

		// var_dump($data);
		// echo ($userLevel);
		// die();
		$query="INSERT INTO CI_wall.users (email, first_name, last_name, password, user_level, created_at, updated_at) 
				VALUES (?,?,?,?,?,?,?)";

		return $this->db->query($query, $data);

	}

	public function isFirstUser()
	{
		$query="SELECT * FROM CI_wall.users";

		$usersTable = $this->db->query($query)->result_array();

		if (!$usersTable){
			return true;	
		}
		else
		{
			return false;
		}

	}

	public function Authenticate($userData)
	{
		// var_dump($userData);

			$query = "select * from users where email=?";
			$email = $userData['email'];	

			// echo $query;
			// echo $email;

			$user = $this->db->query($query, $email)->row_array();

			// var_dump($user);
			// echo count($user);

			if (count($user)>0)
			{
				$user = $this->db->query($query, $userData)->row_array();
					if($user['password']==$userData['password'])
					{
						

						return $user;
					}
					else
					{
					 	return false;
					}
			}
			else
			{
				echo ("not found");
				die();
			}
	}
}