<?php 

 ?>
<!DOCTYPE html>
 <html language="en">
 <head>
 	<title>Register your Account for CI User dashboard</title>
 	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-6">
	 			<h1>Add a new user</h1>
	 		</div>
	 		<div class="col-md-6">
	 			<a href="/dashboards/admin"><button type="button" class="btn btn-primary">Return to Dashboard</button></a>
 			</div>
 		</div>
 		<div class="row">
 			<form class="col-md-6" name="registration" action="/Users/createAccount" method="POST">
	 			<div class="form-group col-md-8"> 
	 				<label for="Email">Email address</label>
	 				<input name="email" type="text" <?php echo ("value='" . set_value('email') ."'");?> class="form-control" placeholder="Enter your email address"/>
	 				<?PHP echo (form_error('email')); ?>
	 				<label for="first_name">First Name</label>
	 				<input name="first_name" type="text" <?php echo ("value='" . set_value('first_name') ."'");?> class="form-control" placeholder="Enter your first name"/>
	 				<?PHP echo (form_error('first_name')); ?>
	 				<label for="last_name">Last Name</label>
	 				<input name="last_name" type="text" <?php echo ("value='" . set_value('last_name') ."'");?> class="form-control" placeholder="Enter your last name"/>
	 				<?PHP echo (form_error('last_name')); ?>
	 				<label for="password">Password</label>
	 				<input name="password" type="password" class="form-control" placeholder="Choose a password"/>
	 				<?PHP echo (form_error('password')); ?>
	  				<label for="conf_password">Confirm Password</label>
	 				<input name="conf_password" type="password" class="form-control" placeholder="Re-enter your password"/>
	 				<?PHP echo (form_error('conf_password')); ?>
	 			</div>
				<div class="form-group col-md-8 ">
 					<button type="submit" class="btn btn-success  pull-right">Create New User</button>
				</div>
	 		</form>		
 		</div>
 		<div class="row">
 			<p>
 				<a href="/Users/signin">Already have an account?  Sign in</a>
 			</p>
 		</div>
 	</div>
 </body>
 </html>