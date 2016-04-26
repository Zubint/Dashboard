			<h4>Leave a message for <?= $userData['first_name'] ?></h4>
			<form  <?= "action='/posts/addPost/" . $userData['id'] ."'"  ?> method="POST">
				<div class="form-group">
						<textarea class="form-control" name="post_message" rows="5"></textarea>
						<button class="btn btn-success pull-right" type="submit">Post</button>
				</div>
			</form>
			<?= form_error('post_message') ?>
		</div>
	</div>
	

		<?php 

		// var_dump($userPosts);
		// die();
		foreach ($userPosts as $post)
		{
			echo ( 
						// class='col-md-3 col-md-offset-2 comment'
						// class='col-md-7 col-md-offset-3
						"<div class='row'>".
							"<p class='col-md-3 col-md-offset-2 comment'> 
								<a href='/users/show/" . $post['postUserID'] . "'>" . $post['postUserName'] ." wrote:</a>
							</p>
							<p  class='col-md-2 col-md-offset-5 text-right comment'>" . $post['postCreatedDate'] . ".</p>
						</div>
						<div class='row'>
						<div class='col-md-10 col-md-offset-1 pull-right'>
							<p class='outline'>" .
								$post['post_text'] .
							"</p>
						</div>
					</div>");

				foreach($post['comments'] as $comment)
				{
					echo(
								"<div class='row'>	
										<p class='col-md-2 col-md-offset-3  comment'>
											<a href='/users/show/'" . $comment['comment_user_ID'] . "'>" . $comment['name'] . " Wrote:</a>
											<p class='col-md-7  text-right comment'>" . $comment['comment_created_at'] . ".</p>
										</p>
										<div class='col-md-9 pull-right'>
											<p class='outline'>" . 
												$comment['comment'] . "
											</p>

										</div>
								</div>"

						);
				}

				echo (
						"<div class='col-md-10  pull-right'>
							<form method='POST' action='/posts/addComment/" . $post['postID'] . "'>".
								"<div class='form-group'>
									<textarea class='form-control' name='post_comment' rows='4'></textarea>
									<button class='btn btn-success pull-right' type='submit'>Comment</button>
								</div>
							</form>
							<?= form_error('post_comment') ?>
						</div>"
					);
		}
		?>
</body>

</html>