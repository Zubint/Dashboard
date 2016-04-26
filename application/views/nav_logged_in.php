<!DOCTYPE html>
<html lang="en">
<head>
	<title>Show User and Comments</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/users/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="navbar navbar-fixed-top">
	<div class="container-fluid" id="nav">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-bar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar">
				<span class="icon-bar">
				<span class="icon-bar">
		</button>
		<div class="collapse navbar-collapse" id="nav-bar-collapse">
				<h1 class="nav navbar-nav navbar-text">Test App</h1>
				<ul class="nav navbar-nav navbar-left">
					<li class="nav navbar-nav navbar-text">
						<?php
							if($this->session->userdata('user_level')==9)
							{
								echo( "<a href='/dashboards/admin'>Dashboard</a>");
							}
							else
							{
								echo( "<a href='/dashboards'>Dashboard</a>");
							}
							?>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li class="nav navbar-nav navbar-text">
						<a href="/Users/edit">Profile</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav navbar-nav navbar-text">
						<a href="/Users/logoff">Log off</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
