<?php
session_start();
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
    echo "Welcome " . $user;
    if(isset($_REQUEST[logout]))
    {
        session_unset();
        session_destroy();
        echo "<script> location.href= 'index.php' </script>";
    }
    $conn->close();
?>


<!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    <button type="submit" name= "logout">Logout</button>
</form>
<form  method="post">
        <table>
        <tr>
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
            {
              echo "<tr><td>" . $row["TestID"] .  "</td><td>" . $row["PatientID"] . "</td><td>" .  $row["DoctorID"]. "</td><td>" . $row["Test_Type"] . "</td><td>" . $row["Test_Name"] . "</td><td>" . $row["Status"] . "</td></tr>";
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
</body> 
</html>