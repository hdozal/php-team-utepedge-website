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
        <select name="StudentClassification">
            <option value ="Freshman"> Freshman</option>
            <option value ="Sophomore"> Sophomore</option>
            <option value ="Junior"> Junior</option>
            <option value ="Senior"> Senior</option>
            <option value ="Graduate"> Graduate</option>
            <br></br>
        </select>
        <input type = "submit", name = "submit" , value = "submit">
        </form>
    </div>

    <div class = "Table">
    
    <?php

        switch($_POST['StudentClassification']){
            case 'Freshman' :
                echo "Freshman\r\n";
                $sql = "Call StudentsByClassification('Freshman')";
                break;
            case 'Sophomore':
                echo "Sophomore\r\n";
                $sql = "Call StudentsByClassification('Sophomore')";
                break;
            case 'Junior' :
                echo "Junior\r\n";
                $sql = "Call StudentsByClassification('Junior')";
                break;
            case 'Senior' :
                echo "Senior\r\n";
                $sql = "Call StudentsByClassification('Senior')";
                break;
            case 'Graduate' :
                echo "Graduate\r\n";
                $sql = "Call StudentsByClassification('Graduate')";
                break;    
            default:
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr>
                    <th>ID</th>
                    <th>Ethnicity</th>
                    <th>Classification</th>
                    <th>Gender</th>
                    <th>Military Status</th>
                    <th>Major</th>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["uid"]. "</td>
                          <td>" . $row["Sethnicity"]. "</td>
                          <td>" . $row["Sclassification"]. "</td>
                          <td>" . $row["Sgender"]. "</td>
                          <td>" . $row["Smilitary_status"]. "</td>
                          <td>" . $row["Smajor"]. "</td>
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