<?php
session_start();
$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';

$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION["user"];
//$status = $_SESSION['status'];
//$form = $_SESSION['form'];
$id = $_SESSION['ID'];
#echo $username;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HomePage</title>    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">UTEP EDGE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="appointment.php">Create Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="application.php">Create Application</a>
          </li>
			<li class="nav-item active">
            <a class="nav-link" href="status.php">Check Application status</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="forms.php">Forms</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Log out</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        </form>
      </div>
    </nav>
    
    <div class="flexBoxWrapper">
      <br/s>

	<?php
	
	$sql="SELECT Fill_suid FROM application WHERE Fill_suid = '$id'";
	
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result); //if there is a match this should = 1
	echo $username," ";
	$row;
	$sql2="SELECT Appform_number,Appstatus,Manage_auid,Appdate,Appcomments FROM application WHERE Fill_suid = '$id'";
	$result2 = mysqli_query($conn,$sql2);
	#$row = $result2->fetch_array(MYSQLI_ASSOC);
	echo $num,"<br>";
	if($num >0){
	 while($row = mysqli_fetch_array($result2)){
		echo "Form: ", $row['Appform_number'],"s current status is ",$row['Appstatus'],", the form is being managed by ", $row['Manage_auid'],". Submitted on: ",$row['Appdate'],". Reason: ",$row['Appcomments'];
		echo "<br>";
		#echo $row;
		}
	}
	?>
    <hr>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © . All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
  </html>