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

  // Insert Blood Report
  $sql = "SELECT TestID FROM test where PatientID = '$uid' and Status != 'Complete'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $BTID = $row["TestID"];
  $Hemoglobin = $_POST['Hemoglobin'];
  $WBC = $_POST['WBC'];
  $Neutrophils = $_POST['Neutrophils'];
  $Remark = $_POST['Remark'];
  $BID = $_POST['BID'];
  $date = date("d-m-y");
  $Eosinophils = $_POST['Eosinophils'];
  $Basophils = $_POST['Basophils'];
  $Lymphocytes = $_POST['Lymphocytes'];
  $Monocytes = $_POST['Monocytes'];
  $Blood_Picture = $_POST['Blood_Picture'];
  $Malarial_Parasite = $_POST['Malarial_Parasite'];
  $ESR = $_POST['ESR'];
  $Salmonella_Typhi_O = $_POST['Salmonella_Typhi_O'];
  $Salmonella_Typhi_H = $_POST['Salmonella_Typhi_H'];
  $Salmonella_Para_Typhi_AH = $_POST['Salmonella_Para_Typhi_AH'];
  $Salmonella_Para_Typhi_BH = $_POST['Salmonella_Para_Typhi_BH'];
  $Total_Bilirubin = $_POST['Total_Bilirubin'];
  $Direct_Bilirubin = $_POST['Direct_Bilirubin'];
  $CRP = $_POST['CRP'];
  $sql = "update blood set Result_Date = '$date',Hemoglobin = '$Hemoglobin',Total_WBC= '$WBC', Neutrophils = '$Neutrophils', Eosinophils = '$Eosinophils', Basophils = '$Basophils', Lymphocytes = '$Lymphocytes', Monocytes = '$Monocytes', Blood_Picture = '$Blood_Picture', Malarial_Parasite = '$Malarial_Parasite', ESR = '$ESR', Salmonella_Typhi_O = '$Salmonella_Typhi_O', Salmonella_Typhi_H = '$Salmonella_Typhi_H', Salmonella_Para_Typhi_AH = '$Salmonella_Para_Typhi_AH', Salmonella_Para_Typhi_BH = '$Salmonella_Para_Typhi_BH', Total_Bilirubin = '$Total_Bilirubin', Direct_Bilirubin = '$Direct_Bilirubin', CRP = '$CRP', Remarks = '$Remark' where BTID = '$BID'";
  $res = $conn->query($sql);
  $Status = $_POST['Complete'];
  $sql1 = "update test set Status = 'Complete' where TestID = '$BID' and Test_Type = 'Blood Test'";
  $res1 = $conn->query($sql1);
  if ( $res === true && $res === true)
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
    <link rel="stylesheet" href="css/order_test.css">
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
        <h2>Update Blood Report</h2>
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
            $sql = "SELECT TestID,Test_Name FROM test where PatientID = '$uid' and Test_Type = 'Blood Test' and Status != 'Complete'";
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
        <!--For Blood-->
        <form  method="post">
          <div class="form-display-line-02">
            <label>Blood Test ID:</label> <input type="text" value="<?php echo @$BTID;?>" name="BID" />
            <label>Hemoglobin:</label><input type="text" name="Hemoglobin"/>
          </div><div class="clearfix"></div>
          <div class="form-display-line-02">
            <label>WBC Count:</label><input type="text" name="WBC"/>
            <label>Neutrophils:</label><input type="text" name="Neutrophils"/>
          </div>
          <div class="form-display-line-02">
            <label>Eosinophils:</label><input type="text" name="Eosinophils"/>
            <label>Basophils:</label><input type="text" name="Basophils"/>
          </div>
          <div class="form-display-line-02">
            <label>Lymphocytes:</label><input type="text" name="Lymphocytes"/>
            <label>Monocytes:</label><input type="text" name="Monocytes"/>
          </div>
          <div class="form-display-line-02">
            <label>Monocytes:</label><input type="text" name="ESR"/>
            <label>Salmonella Typhi "O":</label><input type="text" name="Salmonella_Typhi_O"/>
          </div>
          <div class="form-display-line-02">
            <label>Salmonella Typhi "H":</label><input type="text" name="Salmonella_Typhi_H"/>
            <label>Salmonella Para Typhi (AH):</label><input type="text" name="Salmonella_Para_Typhi_AH"/>
          </div>
          <div class="form-display-line-02">
            <label>Salmonella Para Typhi (BH):</label><input type="text" name="Salmonella_Para_Typhi_BH"/>
            <label>Total Bilirubin:</label><input type="text" name="Total_Bilirubin"/>
          </div>
          <div class="form-display-line-02">
            <label>Direct Bilirubin:</label><input type="text" name="Direct_Bilirubin"/>
            <label>CRP:</label><input type="text" name="CRP"/>
          </div>
          <div class="form-display-line-02">
            <label>Blood Picture:</label><input type="text" name="Blood_Picture"/>
            <label>Malarial Parasite:</label><input type="text" name="Malarial_Parasite"/>
          </div>
          <div class="form-display-line-02">
            <label>Remark:</label><textarea name = "Remark" ></textarea>
          </div>
          <div class="clearfix"></div>
          <div class="form-display-line-02">
            <label>Status:</label><input type="text" name="Complete" value = "Complete"/>
          </div>
          <input type="submit" value="Submit">
        </form>
                      </main>
                      <footer>
                      <p><small>Copyright &copy; University of Hyderabad</small></p>
                      </footer>
</body> 
</html>