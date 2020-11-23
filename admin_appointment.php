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
$id = $_SESSION["ID"];

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
      <a class="navbar-brand" href="adminhome.php">UTEP EDGE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active ">
            <a class="nav-link" href="admin_appointment.php">View Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_application.php">Check Applications</a>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="report.php">Generate Report</a>
          </li>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        </form>
      </div>
    </nav>
    <hr>
		<br>
        <?php
            $sql = "SELECT * FROM appointment WHERE Approve_auid ='$id';" 
            or die("Error: ". mysql_error(). " with query ");
            $options = '';
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);

            if($num > 0 ){
                while($row = mysqli_fetch_array($result)) {
                    echo "Appointment Date: ",$row['Apdate']," Time: ",$row['Aptime'], " created by ",$row['Make_suid'];
                    echo "<br>";
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