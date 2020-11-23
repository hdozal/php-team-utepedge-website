<!DOCTYPE html>
<html>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<head>
    <link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
	<title>Reports</title>
</head>
<body>
    <?php
        session_start();
        $host ="ilinkserver.cs.utep.edu";
        $db = 'f19_team9';
        $DBusername = 'aortiz34';
        $DBpassword = '1Hatemyspace';

        $conn = new mysqli($host,$DBusername,$DBpassword,$db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>

    <div class = "Selection">
        <form method = "post">
        <select name="ApplicationStatus">
            <option value ="Submitted"> Submitted</option>
            <option value ="PendingSignature"> Pending Signature</option>
            <option value ="Returned"> Returned</option>
            <option value ="Approved"> Approved</option>
            <option value ="Denied"> Denied</option>
            <br></br>
        </select>
        <input type = "submit", name = "submit" , value = "submit">
        </form>
    </div>

    <div class = "Table">
    
    <?php

        switch($_POST['ApplicationStatus']){
            case 'Submitted' :
                echo "Submitted\r\n";
                $sql = "SELECT * FROM applications_submitted";
                break;
            case 'PendingSignature':
                echo "Pending Signature\r\n";
                $sql = "SELECT * FROM applications_pending";
                break;
            case 'Returned' :
                echo "Returned\r\n";
                $sql = "SELECT * FROM applications_returned";
                break;
            case 'Approved' :
                echo "Approved\r\n";
                //$sql = "CALL ApplicationsByStatus('approved')";
                $sql = "SELECT * FROM applications_approved";
                break;
            case 'Denied' :
                echo "Denied\r\n";
                //$sql = "";
                $sql = "SELECT * FROM applications_denied";
                break;    
            default:
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Form Number</th>
                    <th>Application Status</th>
                    <th>Application type</th>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Uid"]. "</td>
                          <td>" . $row["Uusername"]. "</td>
                          <td>" . $row["Ufirstname"]. " " . $row["Ulastname"]. "</td>
                          <td>" . $row["Appform_number"]. "</td>
                          <td>" . $row["Appstatus"]. "</td>
                          <td>" . $row["Apptype"]. "</td>
                          </tr>";
            }
            echo "</table>";
       
        } else {
            echo "\r\n0 results";
        }

        $conn->close();
    ?>
    </div>
    
    <ul>
    <li><a href="adminhome.php">Go Back to home page</a></li>
    <li><a href="report.php">Go Back to generate reports</a></li>
    </ul>
</body>
</html>