<?php
session_start();
?>
<html>
<head>
	<title>User Login And Registration </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link href="logintheme.css" rel="stylesheet" type="text/css">
</head>
<body id= "custom" class = "login text-center body">
	<div class="loginLogo">
	</div>
	<div class="loginTitle">
		<label>UTEP EDGE Log in</label>
	</div>
	<div class="row">
		<div class="col-md-4">
			<form action="verify.php" method="POST">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>

		<div class="col-md-4">
			<div class="loginTitle">
				<label>UTEP EDGE Register</label>
			</div>
			<form action="registration.php" method="POST">
				<div class="form-group">
					<label>ID</label>
					<input type="text" name="id" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username2" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="fname" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Middle Initial</label>
					<input type="text" name="middle" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="lname" class="form-control" required>
				</div>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>
		</div>
	</div>				
</body>
</html>