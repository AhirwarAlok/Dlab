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

// Insert Bio Report
$sql = "SELECT TestID FROM test where PatientID = '$uid' and Status != 'Complete'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$BCTID = $row["TestID"];
$Blood_Sugar_Fasting = $_POST['Blood_Sugar_Fasting'];
$Blood_Sugar_PL = $_POST['Blood_Sugar_PL'];
$Total_Cholesterol = $_POST['Total_Cholesterol'];
$Triglycerides = $_POST['Triglycerides'];
$HDL_Cholestrol = $_POST['HDL_Cholestrol'];
$LDL_Cholestrol = $_POST['LDL_Cholestrol'];
$Blood_Urea = $_POST['Blood_Urea'];
$Serum_Creatinine = $_POST['Serum_Creatinine'];
$Serum_Bilirubin_Total = $_POST['Serum_Bilirubin_Total'];
$Direct = $_POST['Direct'];
$G_HB = $_POST['G_HB'];
$SGPT = $_POST['SGPT'];
$Alkaline_Phosphatase = $_POST['Alkaline_Phosphatase'];
$Total_Protine = $_POST['Total_Protine'];
$Albumin = $_POST['Albumin'];
$Globulin = $_POST['Globulin'];
$Uric_Acid = $_POST['Uric_Acid'];
$RF = $_POST['RF'];
$Remarks = $_POST['Remarks'];
$BCID = $_POST['BCID'];
$date = date("d-m-y");
$sql = "update bio set Result_Date = '$date', Blood_Sugar_Fasting = '$Blood_Sugar_Fasting',Blood_Sugar_PL = '$Blood_Sugar_PL',G_HB = '$G_HB',Total_Cholesterol = '$Total_Cholesterol', Triglycerides = '$Triglycerides', HDL_Cholestrol = '$HDL_Cholestrol', LDL_Cholestrol = '$LDL_Cholestrol', Blood_Urea = '$Blood_Urea', Serum_Creatinine = '$Serum_Creatinine', Serum_Bilirubin_Total = '$Serum_Bilirubin_Total', Direct = '$Direct',SGPT = '$SGPT',Alkaline_Phosphatase = '$Alkaline_Phosphatase',Total_Protine = '$Total_Protine',Albumin = '$Albumin', Globulin = '$Globulin',Uric_Acid = '$Uric_Acid',RF = '$RF',Remarks = '$Remarks' where BCTID = '$BCID'";
$res = $conn->query($sql);
$Status = $_POST['Complete'];
$sql1 = "update test set Status = 'Complete' where TestID = '$BCID' and Test_Type = 'Bio Test'";
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
        <h2>Update Bio-Chemestry Report</h2>
        <p>Date: <?php echo date("d-m-Y") ?></p>
      </div>
      <div class="clearfix"></div>
      
      <div class="form-container">
        <form  method="post">
          Patient ID: <input type="text" value="<?php echo @$uid;?>" name="uid" requaired>
          
          <div class="form-display-line">
            <span id="patient-name"><label>Name: </label> <input type="text" value="<?php echo @$name;?>"/></span>
            <span id="patient-age"><label>Age: </label><input type="text" value="<?php echo @$age;?>"/></span>
            <span id="patient-sex"><label>Sex: </label><input type="text" value="<?php echo @$sex;?>"/></span>
          </div>
          
          <div class="form-display-line">
            <span id="patient-email">Email ID: <input type="text" value="<?php echo @$email;?>"/></span>
            <span id="patient-mobile">Mobile Number: <input type="text" value="<?php echo @$mobile;?>"/></span>
          </div>
        </form>
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
                $sql = "SELECT TestID,Test_Name FROM test where PatientID = '$uid' and Test_Type = 'Bio Test' and Status != 'Complete'";
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
<!--For Bio-->
      <form method="post">
        <div class="form-display-line-02">
          <label>Bio Test ID:</label><input type="text" value="<?php echo @$BCTID;?>" name="BCID" /> 
          <label>Blood Sugar Fasting:</label><input type="text" name="Blood_Sugar_Fasting"/>
        </div>
      <div class="form-display-line-02">
      <label>Blood Sugar PL:</label><input type="text" name="Blood_Sugar_PL"/>
        <label>G HB:</label><input type="text" name="G_HB"/>
      </div>
        <div class="form-display-line-02">
        <label>Total Cholesterol:</label><input type="text" name="Total_Cholesterol"/>
        <label>Triglycerides:</label><input type="text" name="Triglycerides"/>
        </div>
        <div class="form-display-line-02">
        <label>HDL Cholestrol:</label><input type="text" name="HDL_Cholestrol"/>
        <label>LDL Cholestrol:</label><input type="text" name="LDL_Cholestrol"/>
        </div>
        <div class="form-display-line-02">
        <label>Blood Urea:</label><input type="text" name="Blood_Urea"/>
        <label>Serum Creatinine:</label><input type="text" name="Serum_Creatinine"/>
        </div>
        <div class="form-display-line-02">
        <label>Serum Bilirubin Total:</label><input type="text" name="Serum_Bilirubin_Total"/>
        <label>Bilirubin Direct:</label><input type="text" name="Direct"/>
        </div>
        <div class="form-display-line-02">
        <label>SGPT:</label><input type="text" name="SGPT"/>
        <label>Alkaline Phosphatase:</label><input type="text" name="Alkaline_Phosphatase"/>
        </div>
        <div class="form-display-line-02">
        <label>Total Protine:</label><input type="text" name="Total_Protine"/>
        <label>Albumin:</label><input type="text" name="Albumin"/>
        </div>
        <div class="form-display-line-02">
        <label>Globulin:</label><input type="text" name="Globulin"/>
        <label>Uric Acid:</label><input type="text" name="Uric_Acid"/>
        </div>
        <div class="form-display-line-02">
        <label>RF:</label><input type="text" name="RF"/>
        </div>
        <div class="form-display-line-02">
        <label>Remark:</label><textarea name = "Remarks" ></textarea>
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