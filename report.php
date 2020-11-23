
<!DOCTYPE html>
<html lang="en">
    <style>
        table, th, td {
        border: 1px solid black;
    }
    </style>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HomePage</title>    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="adminhome.php">UTEP EDGE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="admin_appointment.php">View Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_application.php">Check Applications</a>
          </li>
			<li class="nav-item active">
            <a class="nav-link" href="report.php">Generate Report</a>
          </li>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        </form>
      </div>
    </nav>
    <hr>
        <br>
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

    <h1>Generate Report</h1>
    <label>Select Report Type</label>
    
    <select name="Report Type" id= "Report Type" required>
        <option value ="Applications"> Applications</option>
    </select>

    <form method = "post">
    <select name="ApplicationStatus">
        <option value ="Submitted"> Submitted</option>
        <option value ="PendingSignature"> Pending Signature</option>
        <option value ="Returned"> Returned</option>
        <option value ="Approved"> Approved</option>
        <option value ="Denied"> Denied</option>
        <input type = "submit", name = "submit" , value = "submit">
    </select>
    </form>
    
    <br></br>

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
                $sql = "SELECT * FROM applications_approved";
                break;
            case 'Denied' :
                echo "Denied\r\n";
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
        </br>
    <hr>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © . All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
  </html>