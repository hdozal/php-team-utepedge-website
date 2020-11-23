<?php 
session_start();

$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';
#$table ='user'


$conn = new mysqli($host,$DBusername,$DBpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
#mysql_select_db($conn,"user")
#or die("Could not select database"); 

$id = $_POST['id'];
$username = $_POST['username2'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$middle = $_POST['middle'];
$lname = $_POST['lname'];

$check="SELECT Uid,Uusername FROM user WHERE Uid = '$id' OR Uusername = '$username'";

$result = mysqli_query($conn,$check);
$num = mysqli_num_rows($result); //if there is a match this should = 1

if($num ==1){
	echo "Username or ID already taken";
}
else{
	$reg = "INSERT INTO user(Uid,Uusername,Upassword,Ufirstname,Umiddleinit,Ulastname) VALUES('$id','$username','$password','$fname','$middle','$lname')";
	mysqli_query($conn,$reg);
	#echo "Registration Sucessful!";
	echo $id," ",$username," ",$password," ",$fname," ",$middle," ",$lname;
}
 ?>