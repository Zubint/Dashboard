<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign in to CI Dashboard App</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>Sign in</h3>
		</div>
		<div class="row">
				<form class="form-horizontal" name="sign in" action="/users/signin" method="POST">
					<div class="form-group col-sm-6">
						 <label for="username" class="col-sm-2  control-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" <?php echo("value='" .  set_value('username') . "' " ); ?> name="username" placeholder="Enter your username" />
							<?php echo (form_error('username')); ?>
						</div>
						<label for="password" class="col-sm-2 control-label">Password:</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" <?php echo("value='" .  set_value('password') . "' " ); ?> name="password" placeholder="Enter your password" />
							<?php echo (form_error('password')); ?>
							<?php echo ($this->session->flashdata("password_error")); ?>
						</div>
					</div>
					<div class="form-group col-sm-8">
						<div class="col-sm-offset-7 col-sm-2">
							<button type="submit" class="btn btn-success">Sign in</button>
						</div>
					</div>
				</form>
		</div>
		<a href="/Users/registration">Need an account?  Register</a>

	</div>

</body>
</html>