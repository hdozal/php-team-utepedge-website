 <html>
<head>
	<title>Registration part 2 </title>
	 <link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
<body>
<div class="container">
	<div class="row">
	<div class="col-md-4">
		<h2> Finishing Registration</h2>
		<form action="" method="POST">
		<div class="form-group">
        <label>Ethnicity</label>
        <input type="text" name="ethnicity" class="form-control" required>
      	</div>
		
        <div class="form-group">
          <label>Gender</label>
          <select name="type" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">other</option>
          <select name='gender' id='gender' required>
          </select>
        </div>
         </div>
        <div class="form-group">
          <label>Military Status</label>
          <option value="Active">Active Military</option>
          <option value="Family member is active in the Military">Family member active in the Military</option>
          <option value="None">N/A</option>
          <select name='military' id='military' required>
          </select>
        </div>
			<div class="form-group">
			<button type="submit" name="SubmitButton" class="btn btn-primary">Register</button>
		</form>
		</div>
		</div>				
</body>
</html>

<?php
$host ="ilinkserver.cs.utep.edu";
$db = 'f19_team9';
$DBusername = 'raguilarsa';
$DBpassword = '*utep2020!';

$conn = new mysqli($host,$DBusername,$DBpassword,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $id = $_SESSION["ID"];
$message = "";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
 $reg = "INSERT INTO student(uid,Sethnicity,Sclassification,Sgender,Smilitary_status,Smajor) 
		VALUES('$id','$_POST['ethnicity']','$_POST['classification']','$_POST['gender']',$_POST['military'],'Computer Science')";
	mysqli_query($conn,$reg);
}

$check2="SELECT uid FROM student where uid = $id";
$result2 = mysqli_query($conn,$check2); //check if we have all the student data we need
$num2 = mysqli_num_rows($result2); // if it suceeded this should equal 1
if($num2 ==1){
	echo "SUCESS";
	header("location:login.php");
}
?>