<!-- Application submission -->
<?php 
session_start();
$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';
$username = $_SESSION['user'];
$id = $_SESSION['ID'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$Mauid = $username;
$Auid = $_POST['admin_name']; // who was sent the submission
$comment = $_POST['comment'];
$adminName = explode(" ", $Auid);

$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT Uid FROM user WHERE Ufirstname= '$adminName[0]' AND Ulastname = '$adminName[1]'";

$result = mysqli_query($conn,$sql);
$temp = $result->fetch_array(MYSQLI_ASSOC); //use this to fetch the sql table that meets these requirements
$adminUid = $temp['Uid'];

$sql2="SELECT Appform_number,Appstatus,Manage_auid FROM application WHERE Fill_suid = '$id'";
$result2 = mysqli_query($conn,$sql2);


#echo "Connected successfully";

$reg = "INSERT INTO appointment(Aptime,Apdate,Aplocation,Make_suid,Approve_auid,Appcomment) 
		VALUES('$time','$date','$location','$id','$adminUid','$comment');";
	mysqli_query($conn,$reg);

	#echo $time,"	|",$date,"	|",$location,"	|",$id,"	 |",$adminUid, "	|",$comment;
	#echo $reg;
 ?>
 <h2>Appointment submitted sucessfully</h2>
 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
	<title>HomePage</title>
</head>
<body>
	<!-- You have sucessfully submitted an Appointment, please wait for the Administrator to approve the appointment -->


<nav>
  <ul>
    <li><a href="home.php">Go back to home page</a></li>
    <li><a href="status.php">Check status</a></li>
  </ul>
</nav>
</body>
</html>