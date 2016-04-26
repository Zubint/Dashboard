<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to CI Dashboard</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-md-8 col-md-offset-1">
					<h3>All Users</h3>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name^</th>
						<th>Email</th>
						<th>Created At</th>
						<th>User Level</th>
					</tr>
					</thead>
					<tbody>
						<?PHP 
							$this->load->helper('date');
							foreach ($allUsers as $user)
							{
								$userType ="";
								if($user['user_level']==9)
									{ 
										$userType = "Admin";
									}
									else
									{
										$userType ="Normal";
									}
								$createdDate = date('M-d-y H:i a', mysql_to_unix($user['created_at']));
								echo (
										"<tr>
											<td>". $user['id']."</td>
											<td><a href='/users/show/" .$user['id'] . "'>" . $user['first_name'] . " " . $user['last_name'] ."</a></td>
											<td>" . $user['email'] . "</td>
											<td>" . $createdDate . "</td>
											<td>" . $userType . "</td>
										</tr>"
									);
							}
						?>
				</tbody>
				</table>
			</div>
		</div>
	</div>


</body>
</html>