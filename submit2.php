<!-- Application form -->
<?php 
session_start();
$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';

$username = $_SESSION['username'];
$id = $_SESSION['ID'];
$type = $_POST['form'];
$formNumber = $_POST['number'];
$appStatus = "Pending"; //will be default until admin accepts/rejects application
#$studentID = $_SESSION['ID'];
$date = date('Y-m-d');

$Auid = $_POST['admin_name']; // who was sent the submission
$comment = "";
$adminName = explode(" ", $Auid);


$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
$sql="SELECT Uid FROM user WHERE Ufirstname= '$adminName[0]' AND Ulastname = '$adminName[1]'";

$result = mysqli_query($conn,$sql);
$temp = $result->fetch_array(MYSQLI_ASSOC); //use this to fetch the sql table that meets these requirements
$adminUid = $temp['Uid'];

$reg = "INSERT INTO application(Appform_number,Appstatus,Apptype,Manage_auid,Fill_suid,Appdate,Appcomments) VALUES('$formNumber','$appStatus','$type','$adminUid','$id','$date','$comment');";
	mysqli_query($conn,$reg);
	#echo $reg;
	#echo $reg;
 ?>
 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
	<title>HomePage</title>
</head>
<body>
	<!-- You have sucessfully submitted an Application, please wait for the Administrator to approve the application -->
	<h2>Application Submitted sucessfully</h2>

<nav>
  <ul>
    <li><a href="home.php">Go back to home page</a></li>
    <li><a href="status.php">Check status</a></li>
  </ul>
</nav>
</body>
</html>