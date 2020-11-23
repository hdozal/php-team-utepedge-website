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
    <label>Student Totals By Classification</label>
    <?php

        $sql = "SELECT*FROM StudentTotalsByClassification";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr>
                    <th>Student Classification</th>
                    <th>Count</th>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Sclassification"]. "</td>
                          <td>" . $row["count(*)"]. "</td>
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