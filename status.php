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


//patient
$sql = "SELECT EmployeeID FROM employee where EmployeeID = '$uid'";
$result = $conn->query($sql) or die("Faild to fatch database" . mysql_error());
$row = $result->fetch_assoc();
if ($row[EmployeeID] == $uid) 
{
  $sql = "SELECT * FROM employee where EmployeeID = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
      
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
      
      $name = $row["Name"];
      $sex = $row["Sex"];
      $age = $row["Age"];
      $email = $row["Email"];
      $mobile = $row["Mobile"];
    }
  }

} 
else 
{
  echo '<script>alert("Incorrect User ID, Please try again!")</script>';
}
$_SESSION['userid'] = $uid;

$conn->close();
?>


<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Health Center Lab | Dashboard</title>
      <!-- <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">  -->
      <link rel="stylesheet" href="css/d_dashboard.css">
      <link rel="stylesheet" href="css/status.css">
  </head>

  <body>
  <!-- <form method="post" action="">
      <button type="submit" name= "logout">Logout</button>
  </form> -->

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
      <!-- <form  method="post">
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
                  <br> -->

      <div class="form-container">
        <form  method="post">
          Patient ID: <input type="text" value="<?php echo @$uid;?>" name="uid"> <input id="form-search" type="submit" value="Search"><br>
          
          <div class="form-display-line">
            <span id="patient-name"><label>Name: </label> <input type="text" value="<?php echo @$name;?>"/></span>
            <span id="patient-age"><label>Age: </label><input type="text" value="<?php echo @$age;?>"/></span>
            <span id="patient-sex"><label>Sex: </label><input type="text" value="<?php echo @$sex;?>"/></span>
          </div>
          
          <div class="form-display-line">
            <span id="patient-email">Email ID: <input type="text" value="<?php echo @$email;?>"/></span>
            <span id="patient-mobile">Mobile Number: <input type="text" value="<?php echo @$mobile;?>"/></span>
          </div>
          <hr>


            <table  id="tableMain">
              
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
                $sql = "SELECT * FROM test where PatientID = '$uid'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                  ?>
                  <tr>
                    <th>Date</th>
                    <th>Test ID</th>
                    <th>Doctor ID</th>
                    <th>Test Type</th>
                    <th>Test Name</th>
                    <th>Status</th>
                  </tr>
                  <?php
                    
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                    ?>
                    <tr>
                      <td><?php echo $row['Date']; ?></td>
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
                          <td id="form-view"><a href="print_blood.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?> & date=<?php echo $row['Date']; ?>">View</a></td><?php
                        }
                        else if ($row["Test_Type"] == "Urine Test") 
                        {?>
                          <td id="form-view"><a href="print_urin.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?>  & date=<?php echo $row['Date']; ?>">View</a></td><?php
                        }
                        else 
                        {?>
                          <td id="form-view"><a href="print_bio.php?testid=<?php echo $row['TestID']; ?> & doctorid=<?php echo $row['DoctorID']; ?>  & date=<?php echo $row['Date']; ?>">View</a></td><?php
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
      </div>
    </main>
      <div class="clearfix"></div>
      
      <footer>
          <p><small>Copyright &copy; University of Hyderabad</small></p>
      </footer>
  </body> 
</html>