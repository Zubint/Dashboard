
	<div class="row">
		<h3 class="col-md-10 col-md-offset-1"> <?= $userData['first_name'] . " " . $userData['last_name'] ?> </h3>
		<div class="col-md-10 col-md-offset-1">
			<p class="labels">Registered on:</p>
			<p class="label-data"><?php $this->load->helper('date');
				$date= date('M-d-Y', mysql_to_unix($userData['created_at']));
				echo ($date);
				 ?></p>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<p class="labels">User Id:</p>
			<p class="label-data"><?= "#" . $userData['id'] ?></p>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<p class="labels">Email:</p>
			<p class="label-data"><?= $userData['email'] ?></p>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<p class="labels">Description:</p>
			<p class="label-data"> <?= $userData['description'] ?></p>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-10 pull-right comment'>
