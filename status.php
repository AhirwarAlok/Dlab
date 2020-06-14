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


//patient
$sql = "SELECT * FROM employee where EmployeeID = '$uid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    
    $name = $row["Name"];
    $type = $row["Employee_Type"];
    $age = $row["Age"];
    $email = $row["Email"];
    $mobile = $row["Mobile"];
  }
}
$_SESSION['userid'] = $uid;

$conn->close();
?>


<!DOCTYPE html>
<html>
  <body>
  <form method="post" action="">
      <button type="submit" name= "logout">Logout</button>
  </form>
  <form  method="post">
              Patient ID: <input type="text" value="<?php echo @$uid;?>" name="uid"> <input type="submit" value="Search">
              <br>
              Patient Name: <input type="text" value="<?php echo @$name;?>"/>
              <br>
              Patient Type: <input type="text" value="<?php echo @$type;?>"/>
              <br>
              Patient Age: <input type="text" value="<?php echo @$age;?>"/>
              <br>
              Email ID: <input type="text" value="<?php echo @$email;?>"/>
              <br>
              Mobile Number: <input type="text" value="<?php echo @$mobile;?>"/>
              <br>


        <table  id="tableMain">
          <tr>
            <th>Test ID</th>
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
            $sql = "SELECT TestID,DoctorID,Test_Type,Test_Name,Status FROM test where PatientID = '$uid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                ?>
                <tr>
                  <td><?php echo $row['TestID']; ?></td>
                  <td><?php echo $row['DoctorID']; ?></td>
                  <td><?php echo $row['Test_Type']; ?></td>
                  <td><?php echo $row['Test_Name']; ?></td>
                  <td><?php echo $row['Status']; ?></td>
                  <?php
                  if($row["Status"] == "Complete")
                  {
                    if ($row["Test_Type"] == "Blood Test") 
                    {?>
                      <td><button type="button"><a href="print_blood.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?>">View</a> </button></td><?php
                    }
                    else if ($row["Test_Type"] == "Urin Test") 
                    {?>
                      <td><button type="button"><a href="print_urin.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?>">View</a> </button></td><?php
                    }
                    else 
                    {?>
                      <td><button type="button"><a href="print_bio.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?>">View</a> </button></td><?php
                    }
                  }?>
                    
                </tr>
                <?php
              }
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