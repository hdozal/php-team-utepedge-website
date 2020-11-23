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
          <li class="nav-item">
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
    <div class="flexBoxWrapper">
        <div class="col-md-7" align="center" >
          <h2>Talented students / Enriching experiences / Lifelong success</h2>
          <div class ="stroke" style = "width:10%;"></div>
          <br>
          <div class= "wysywig">
            <p>
              "Students enter UTEP with many talents, great strengths, and big dreams. 
              The UTEP Edge develops these assets through a variety of high-impact experiences made possible
              by the expertise and dedication of our faculty, staff, alumni, and community partners."
            </p>
            <p>
              "Ranging from undergraduate research and civic engagement to study abroad and student employment, 
              high-impact  experiences increase confidence, enhance personal and professional skills, 
              and equip students with a competitive advantage when they graduate and enter the workforce or pursue a graduate degree."
            </p>
            <p>
              "It’s this competitive edge that distinguishes UTEP students from their peers at other institutions and prepares our graduates for leadership and lifelong success."
            </p>
            </div>
          </div>
      </div>
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