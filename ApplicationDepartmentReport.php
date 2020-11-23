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
        <select name="ApplicationsByDepartment">
            <option value ="CollegeAccreditationProcess"> College Accreditation Process</option>
            <option value ="GraduateStudies"> Graduate Studies</option>
            <option value ="LowerDivisionAdvising"> Lower Division Advising</option>
            <option value ="UndergraduateForms"> Undergraduate Forms</option>
            <option value ="UndergraduateResearchOpportunities"> Undergraduate Research Opportunities</option>
            <br></br>
        </select>
        <input type = "submit", name = "submit" , value = "submit">
        </form>
    </div>

    <div class = "Table">
    
    <?php

        switch($_POST['ApplicationsByDepartment']){
            case 'CollegeAccreditationProcess' :
                echo "College Accreditation Process\r\n";
                $sql = "CALL ApplicationsByDepartment('College Accreditation Process')";
                break;
            case 'GraduateStudies':
                echo "Graduate Studies\r\n";
                $sql = "CALL ApplicationsByDepartment('Graduate Studies')";
                break;
            case 'LowerDivisionAdvising' :
                echo "Lower Division Advising\r\n";
                $sql = "CALL ApplicationsByDepartment('Lower Division Advising')";
                break;
            case 'UndergraduateForms' :
                echo "Undergraduate Forms\r\n";
                $sql = "CALL ApplicationsByDepartment('Undergraduate Forms')";
                break;
            case 'UndergraduateResearchOpportunities' :
                echo "Undergraduate Research Opportunities\r\n";
                $sql = "CALL ApplicationsByDepartment('Undergraduate Research Opportunities')";
                break;    
            default:
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr>
                    <th>Application Number</th>
                    <th>Application Status</th>
                    <th>Application Type</th>
                    <th>Admin Username</th>
                    <th>Student ID</th>
                    <th>Application Date</th>
                    <th>Application Comment</th>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Appform_number"]. "</td>
                          <td>" . $row["Appstatus"]. "</td>
                          <td>" . $row["Apptype"]. "</td>
                          <td>" . $row["Manage_auid"]. "</td>
                          <td>" . $row["Fill_suid"]. "</td>
                          <td>" . $row["Appdate"]. "</td>
                          <td>" . $row["Appcomments"]. "</td>
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