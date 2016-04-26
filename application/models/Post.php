<?php 


class Post extends CI_Model{


	public function writePost($data)
	{
		$query = "INSERT INTO POSTS (user_id, post_by, post_text, created_at, updated_at)
							  values (?,?,?,?,?)";
		$values = array($data['userId'], $data['posted_by'], $data['post_text'], date('Y-m-d h:i:s'), date('Y-m-d h:i:s'));

		return $this->db->query($query, $values);

	}

	public function writeComment($data)
	{
		$query = "INSERT INTO COMMENTS (post_id, user_id, comment_text, created_at, updated_at)
				  values (?,?,?,?,?)";

		$values = array($data['post_id'], $data['user_id'], $data['comment'], date('Y-m-d h:i:s'),date('Y-m-d h:i:s'));

		return $this->db->query($query, $values);

	}

	public function getPosts_and_comments_byUserId($id)
	{
		$postCommentArray=[];
		$commentArray=[];

		$query="select posts.id, posts.user_id, posts.post_text, posts.post_by,posts.created_at, concat(users.first_name,' ', users.last_name) as name from posts
				left join users on users.id = posts.post_by
    			where posts.user_id=?";

		$userPosts =  $this->db->query($query, $id)->result_array();

		// var_dump($userPosts);
		// die();
		
		foreach($userPosts as $post)
		{

			// var_dump($post);
			// die();

			$commentArray=[];

			$commentQuery ="select comments.post_id, comments.user_id, comments.comment_text, comments.created_at, concat(users.first_name, ' ', users.last_name) as commenter_name from comments
							 left join users on users.id = comments.user_id
							 where comments.post_id =?";
			$postID = $post['id'];


			$comments = $this->db->query($commentQuery, array("id"=>$postID))->result_array();
			
			// echo $postID;
			// var_dump($comments);
				// die();

			foreach ($comments as $comment)
			{

				
				$commentArray[] = array(
				"comment" => $comment['comment_text'],
					"name" => $comment['commenter_name'],
					"comment_created_at" => $comment['created_at'],
					"comment_user_ID" => $comment['user_id'],
					"comment_postID"=>$comment['post_id']
					);
			}

			$postCommentArray[] = array(
				"postID" => $post['id'],
				"post_text"=> $post['post_text'],
				"postUserName"=>$post['name'],
				"postUserID" =>$post['post_by'],
				"postCreatedDate" => $post['created_at'],
				"comments" => $commentArray
				);

			
		}

		// var_dump($postCommentArray);
		// die();

		
		// echo ($id);
		// var_dump($userPosts);
		// die();

		return $postCommentArray;


	}

}