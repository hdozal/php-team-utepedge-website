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
#$ID = $_SESSION["ID"];
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
        <li class="nav-item">
          <a class="nav-link" href="appointment.php">Create Appointment</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="application.php">Create Application</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="status.php">Check Application status</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="forms.php">Forms</a>
            <a class="dropdown-item" href="home.php">Home Page</a>
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
    <hr>   
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <form action="submit2.php" method="POST">
            <div class="form-group">
            </div>
            <div>
              <div class="form-group">
                <label>Form Number</label>
                <input type="text" name="number" id="number" class="form-control" >
              </div>
              <?php
              $sql = "SELECT ftype FROM forms"
              or die("Error: ". mysql_error(). " with query ");
              $options = '';
              $result = mysqli_query($conn,$sql);
              $num = mysqli_num_rows($result);

              if($num > 0 ){
                while($row = mysqli_fetch_array($result)) {
                  $options .="<option>" . $row['ftype']. "</option>";
                } 
              }
              $menu="<form id='form' name='form' method='post' action=''>
              <p><label>Select Form</label></p>
              <select name='form' id='form'>
              " . $options . "
              </select>";
              echo $menu;
              ?>
              <!-- DIFFERENT DROP DOWN TABLES -->
              <br>
              <br>
              <?php
              $sql = "SELECT Ufirstname,Ulastname,Uid FROM user WHERE Uid IN (SELECT Uid FROM administrator)"
              or die("Error: ". mysql_error(). " with query ");
              $options = '';
              $result = mysqli_query($conn,$sql);
              $num = mysqli_num_rows($result);

              if($num > 0 ){
                while($row = mysqli_fetch_array($result)) {
                  $options .="<option>" . $row['Ufirstname']." " .$row['Ulastname']. "</option>";
                } 
              }
              $menu="<form id='admin_name' name='admin_name' method='post' action=''>
              <p><label>Select administrator you wish to see</label></p>
              <select name='admin_name' id='admin_name'>
              " . $options . "
              </select>";
              echo $menu;
              ?>
            </div>
            <!-- <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
              </div> -->

            <!-- <div class="form-group">
                <label>Comment</label>
                <input type="text" name="comment" class="form-control" >
              </div> -->
              <button type="submit" class="btn btn-primary">Submit application</button>
            </form>
          </div>
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