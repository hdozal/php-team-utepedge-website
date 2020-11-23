<!-- Verifying login information -->
<?php 
session_start();
$form = $_SESSION['form'];
$status = $_POST['status'];
$comment = $_POST['comment'];

$_SESSION["user"] = $username;

$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';




$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql="UPDATE application SET Appstatus = '$status',Appcomments = '$comment' WHERE Appform_number = '$form';";

mysqli_query($conn,$sql);
header('location:admin_application.php');
 ?>