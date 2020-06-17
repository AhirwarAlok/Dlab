<?php
session_start();
if (!isset($_SESSION["uid"]))
   {
    echo '<script>alert("Please login first!")</script>';
    header("location: index.php");
   }
$servername = "localhost";
$username = "Alok";
$password = "pass";
$dbname = "test";
$d_uid = $_SESSION['uid'];
$uid = $_POST['uid'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Doctor

    $sql = "SELECT Name FROM employee where EmployeeID = '$d_uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user = $row[Name];
    // echo "Welcome " . $user;
    if(isset($_REQUEST[logout]))
    {
        session_unset();
        session_destroy();
        echo "<script> location.href= 'index.php' </script>";
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peding Orders | UOH Health Center</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">  -->
    <link rel="stylesheet" href="css/d_dashboard.css">
    <link rel="stylesheet" href="css/pending_status_02.css">
  </head>
  <body>
  <div class="page">
    <header>
        <div class="university-details">
        <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
        </div>

        <div class="user-details">
            <img src="images/user.png" alt="" width="40">
            <p><?php echo $user?></p>
            <form method="post" action="">
                <button class="logout-button" type="submit" name="logout"><img src="images/logout.png" s  alt="Logout" width="35"></button>
            </form>
        </div>
    </header>
    <div class="clearfix"></div>
    
    <main>
    <h2>Pending Orders</h2>
      <form class="form-container" method="post">
        <table id="tableMain">
        <tr>
          <th>Test Date</th>
          <th>Test ID</th>
          <th>Patient ID</th>
          <th>Doctor ID</th>
          <th>Test Type</th>
          <th>Test Name</th>
          <th>Status</th>
        </tr>
        <?php
          $servername = "localhost";
          $username = "Alok";
          $password = "pass";
          $dbname = "test";
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) 
          {
            die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM test where Status != 'Complete'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {
              
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {?>
              <tr>
                      <td><?php echo $row['Date']; ?></td>
                      <td><?php echo $row['TestID']; ?></td>
                      <td><?php echo $row['PatientID']; ?></td>
                      <td><?php echo $row['DoctorID']; ?></td>
                      <td><?php echo $row['Test_Type']; ?></td>
                      <td><?php echo $row['Test_Name']; ?></td>
                      <td><?php echo $row['Status']; ?></td>
                      <?php
                      if ($row["Status"] == "Waiting for semple") 
                      {
                        ?>
                          <td id="form-view"><a href="update_status.php?testid=<?php echo $row['TestID']; ?> & Test_Type=<?php echo $row['Test_Type']; ?>">Update Sample</a></td><?php
                      } 
                      else if($row["Status"] == "Pending") 
                      {
                        if ($row["Test_Type"] == "Blood Test") 
                        {?>
                          <td id="form-view"><a href="update_breport.php?PatientID=<?php echo $row['PatientID']; ?>">Update Report</a></td><?php
                        }
                        else if ($row["Test_Type"] == "Urine Test") 
                        {?>
                          <td id="form-view"><a href="update_ureport.php?PatientID=<?php echo $row['PatientID']; ?> ">Update Report</a></td><?php
                        }
                        else 
                        {?>
                          <td id="form-view"><a href="update_bcreport.php?PatientID=<?php echo $row['PatientID']; ?> ">Update Report</a></td><?php
                        }
                      }?>
                        
                      </tr>
                      <?php
                    
                    
                        
            }
            echo "</table>";
          }
          else
          {
            echo "No Record";
          }
        ?>
      </table>
      </form>
    </main>
      <div class="clearfix"></div>
      
      <footer>
          <p><small>Copyright &copy; University of Hyderabad</small></p>
      </footer>
  </body>
</html>