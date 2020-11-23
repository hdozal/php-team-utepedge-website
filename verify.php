<!-- Verifying login information -->
<?php 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION["user"] = $username;

$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';




$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
// $getID = "SELECT Uid FROM user WHERE Uusername = $username"
// $resultt = $conn->query($getID);
// if ($resultt->num_rows > 0){
// 	$row = mysqli_fetch($getID);
// 	$_SESSION["ID"] = $row->Uid;
// }


$sql="SELECT Uusername,Upassword FROM user WHERE Uusername = '$username' && Upassword = '$password'";
$sql2 = "SELECT Uid FROM user WHERE Uusername = '$username'";

$result = mysqli_query($conn,$sql);
$result2 = mysqli_query($conn,$sql2);
$num = mysqli_num_rows($result); //if there is a match this should = 1
$row = $result2->fetch_array(MYSQLI_ASSOC);
#$retrive = mysqli_fetch($result2);
$id = $row['Uid'];
$_SESSION["ID"] = $id;
##echo $id;
if($num ==1){
	$_SESSION["user"] = $username;
	

	#$username = $_POST['username'];
	header('location:home.php');

}
else{
	echo "Wrong login information entered";
	header('location:login.php?');
}
 ?>