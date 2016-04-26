<!DOCTYPE html>
<html lang="en">
	<title>Edit user</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/users/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div class="container">
		<h1> Edit </h1>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				 <h5> Edit Your information </h5>
				<form name="editUser" action="/Users/edit" method="POST">
				 <!--Remember you will need to populate this information from DB -->
					<div class="form-group col-sm-8 col-md-8 col-sm-offset-1 col-md-offset-1" id="editInfo">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" value="SOME VALUE FROM DB">
						<label for="first_name">First Name</label>
		 				<input name="first_name" type="text" class="form-control " placeholder="Enter your first name"/>
		 				<label for="last_name">Last Name</label>
		 				<input name="last_name" type="text" class="form-control " placeholder="Enter your last name"/>
						<button type="submit" class="form-group btn btn-success pull-right">Update Information</button>
					</div>
				</form>
			</div>
			<div class="col-sm-6 col-md-6">
				<h5>Change your password</h5>
				<form name="editPassword" action="/Users/editPassword" method="POST">
					<div class="form-group col-sm-8 col-md-8 col-sm-offset-1 col-md-offset-1">	
						<label for="password">Password</label>
		 				<input name="password" type="password" class="form-control " placeholder="Choose a password"/>
		  				<label for="conf_password">Confirm Password</label>
		 				<input name="conf_password" type="password" class="form-control" placeholder="Re-enter your password"/>
		 				<button type="submit" class="form-group btn btn-success pull-right">Change password</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div id="description" class="col-sm-9 col-md-9  col-sm-offset-1 col-md-offset-1">
				<h5>Edit your description</h5>
					<form  class="form-group" name="editDescription" action="/Users/editDescription" method="POST">
						<!-- <div class="form-group"> -->
							<textarea class="form-control text-left" rows="5">
							</textarea>
							<button type="submit" class="form-group btn btn-success pull-right">Save</button>
						<!-- </div> -->
					</form>
				</div>
		</div>

		</div>

	</div>
</body>
</html>