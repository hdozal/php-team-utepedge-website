<html>
	<head>
		<title>Register your account! </title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="logintheme.css" rel="stylesheet" type="text/css">
	</head>
		<body  id= "custom" class = "login" align="center">
			<div class="loginTitle">
				<label>UTEP EDGE Register</label>
			</div>
			<div class="container" align="center">
				<div class="row">
					<div class="col-md">
						<form action="verify_registration.php" method="POST">
							<div class="form-group" >
								<label>ID</label>
								<input type="text" name="id" class="form-control" required>
							</div>
							<div class="form-group" >
								<label>Username</label>
								<input type="text" name="username2" class="form-control" required>
							</div>
							<div class="form-group" >
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
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Ethnicity</label>
								<input type="text" name="ethnicity" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Classification</label>
								<input type="text" name="classification" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<input type="text" name="gender" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Military Status</label>
								<input type="text" name="military" class="form-control" required>
							</div>
							<div class="form-group" class="eight columns omega">
								<label>Major</label>
								<input type="text" name="major" class="form-control" required>
					</div>
							<button type="submit" class="btn btn-primary">Register</button>
						</form>
					</div>
				</div>
			</div>

		</body>
</html>