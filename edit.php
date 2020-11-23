<?php
#include("admin_application.php");
$Appform_number = $_POST['form_number'];
$_SESSION["form"] = $Appform_number;

?>
<html>
<head>
	<body>
		<div class="row">
			<div class="col-md-4">
				<h2> <?php echo "$Appform_number"; ?></h2>
				<form action="update_application.php" method="POST">
					<label>Set status as:</label>
					<select name="status">
						<option value="Approved">Approved</option>
						<option value="Needs Signatures">Needs Signatures</option>
						<option value="Denied">Denied</option>
					</select>
					<div class="form-group">
						<label>Comment about the application</label>
						<input type="text" name="comment" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</form>
			</div>
		</div>
		<nav>
			<ul>
				<!-- <li><a href="home.php">Go Back to home page</a></li> -->
				<li><a href="admin_application.php">Back to applications</a></li>
			</ul>
		</nav>
	</body>
</head>
</html>