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
  $uid = $_GET['PatientID'];
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

  // Insert Urin Report
  $sql = "SELECT TestID FROM test where PatientID = '$uid' and Status != 'Complete'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $UTID = $row["TestID"];
  $Appearance = $_POST['Appearance'];
  $Colour = $_POST['Colour'];
  $Albumin = $_POST['Albumin'];
  $Sugar = $_POST['Sugar'];
  $Bil_Salts = $_POST['Bil_Salts'];
  $Bil_Pigment = $_POST['Bil_Pigment'];
  $Microscopic_Eximination = $_POST['Microscopic_Eximination'];
  $Remarks = $_POST['Remarks'];
  $UID = $_POST['UID'];
  $date = date("d-m-y");
  $sql ="update urine set Result_Date = '$date',Appearance = '$Appearance',Colour = '$Colour',Albumin = '$Albumin',Sugar = '$Sugar',Bil_Salts = '$Bil_Salts',Bil_Pigment = '$Bil_Pigment',Microscopic_Eximination = '$Microscopic_Eximination',Remarks = $Remarks where UTID = '$UID'";
  $res = $conn->query($sql);
  $Status = $_POST['Complete'];
  $sql1 = "update test set Status = 'Complete' where TestID = '$UID' and Test_Type = 'Urine Test'";
  $res1 = $conn->query($sql1);
  if ( $res === true && $res1 === true)
  {
      // echo "Record update successfully";
  }
  else 
  {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report</title>
    <link rel="stylesheet" href="css/d_dashboard.css">
    <link rel="stylesheet" href="css/order_test_02.css">
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
        <main>
        <!--For Details--> 
        <div class="sub-header">
        <h2>Update Urine Report</h2>
        <!-- <?php echo $UID . ">" . $date . ">" . $Appearance . ">" . $Colour . ">" . $Albumin . ">" . $Sugar . ">" . $Bil_Salts . ">" . $Bil_Pigment . ">" . $Microscopic_Eximination;?> -->
        <p>Date: <?php echo date("d-m-Y") ?></p>
      </div>
      <div class="clearfix"></div>
      
      <div class="form-container">
        <form  method="post">
          Patient ID: <input type="text" value="<?php echo @$uid;?>" name="uid" required>
          
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
            Requaired Test: 
            <table id="tableMain">
                <tr>
                <th>Test ID</th>
                <th>Test Name</th>
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
                $sql = "SELECT TestID,Test_Name FROM test where PatientID = '$uid' and Test_Type = 'Urine Test' and Status != 'Complete'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {?>
                      <tr>
                      <td><?php echo $row["TestID"]; ?></td>
                      <td><?php echo $row["Test_Name"]; ?></td>
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
<!--For Urin-->
<form  method="post">
            <div class="form-display-line-02">
            <label>Appearance:</label><input type="text" name="Appearance"/>
            <label>Colour:</label><input type="text" name="Colour"/>
            </div>
            <div class="form-display-line-02">
            <label>Albumin:</label><input type="text" name="Albumin"/>
            <label>Sugar:</label><input type="text" name="Sugar"/>
            </div>
            <div class="form-display-line-02">
            <label>Bil Salts:</label><input type="text" name="Bil_Salts"/>
            <label>Bil Pigment:</label><input type="text" name="Bil_Pigment">
            </div>
            <div class="form-display-line-02">
            <label>Microscopic Eximination:</label><input type="text" name="Microscopic_Eximination"/>
            </div>
            <div class="form-display-line-02">
            <label>Remark:</label><textarea name = "Remarks" ></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="form-display-line-02">
            <label>Status:</label><input type="text" name="Complete" value = "Complete">
            </div>
            <div class="form-display-line-02">
            <input type="submit" value="Submit">
            </div>
            
</form>
</main>
                      <footer>
                      <p><small>Copyright &copy; University of Hyderabad</small></p>
                      </footer>
</body> 
</html>
