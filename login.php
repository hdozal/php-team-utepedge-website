<?php
session_start();
?>
<html>
	<head>
		<title>User Login </title>
		<link href="logintheme.css" rel="stylesheet" type="text/css">
	</head>
		
	<body id= "custom" class = "login text-center body">
		<div class="loginLogo"></div>
		<div class="loginTitle">
			<label>UTEP EDGE Log in</label>
		</div>
		<div class="row"  align="center">
			<div class="col-md-4">
				<form action="verify.php" method="POST">
					<div class="form-group" align="center">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
				<div class="form-group" align="center">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
		<nav align="center">
			<ul>
				<li><a href="register.php">Register a new account</a></li>
			</ul>
		</nav>				
	</body>
</html>