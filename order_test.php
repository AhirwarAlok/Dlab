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



//submit

//auto number
$value2='';
$query = "SELECT TestID from test order by TestID DESC LIMIT 1";
$stmt = $conn->query($query);
  if(mysqli_num_rows($stmt) > 0) 
  {
    if ($row = mysqli_fetch_assoc($stmt)) 
    {
      $value2 = $row['TestID'];
      $value2 = substr($value2,4,7);
      $value2 = $value2 + 1;
      $value2 = "ABC-" . sprintf('%03s', $value2);
      $value = $value2; 
    }
  } 
  else 
  {
     $value2 = "ABC-001";
     $value = $value2;
  }
$blood_test = $_POST["Blood"];
$urin_test  = $_POST["Urin"];
$bio_test  = $_POST["Bio"];
$res = '';
$date = date("d-m-Y");
for ($i=0; $i < sizeof($blood_test); $i++) 
{ 

  $sql = "insert into test(Date,TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$date','$value','$uid','$d_uid','Blood Test' ,'$blood_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
  $_SESSION['btestid1']= $blood_test[0];
  $_SESSION['btestid2']= $blood_test[1];

}
for ($i=0; $i < sizeof($urin_test); $i++) 
{ 
  $sql = "insert into test(Date,TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$date','$value','$uid','$d_uid','Urine Test' ,'$urin_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
  $_SESSION[urineid]= $urin_test[0];
}
for ($i=0; $i < sizeof($bio_test); $i++) 
{ 
  $sql = "insert into test(Date,TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$date','$value','$uid','$d_uid','Bio Test' ,'$bio_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
  $_SESSION['bioid1']= $bio_test[0];
  $_SESSION['bioid2']= $bio_test[1];
  $_SESSION['bioid3']= $bio_test[2];
  $_SESSION['bioid4']= $bio_test[3];
  $_SESSION['bioid5']= $bio_test[4];
}
if ( $res === true)
{
    echo "<script> location.href= 'print_status.php' </script>";
}
else 
{
  // echo "Error: " . $sql . "<br>" . $conn->error;
}

$_SESSION["testid"] = $value; 
$_SESSION["userid"] = $uid;

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
    <link rel="stylesheet" href="css/order_test.css">
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
      <div class="sub-header">
        <h2>Order Test</h2>
        <p>Date: <?php echo date("d-m-Y") ?></p>
      </div>
      <div class="clearfix"></div>
      
      <div class="form-container">
        <form  method="post">
          Patient ID: <input type="text" value="<?php echo @$uid;?>" name="uid"> <input id="form-search" type="submit" value="Search" required><br>
          
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
                    
          <h3>Test Type</h3>
          
          <fieldset>
            <legend>Bio-Chemistry Test</legend>
            <div class="test-type-row">
              <input type="checkbox" name= "Bio[]" value= "Lipid Profile">Lipid Profile
              <input type="checkbox" name= "Bio[]" value= "KFT">KFT
              <input type="checkbox" name= "Bio[]" value= "LFT">LFT
              <input type="checkbox" name= "Bio[]" value= "Uric Acid">Uric Acid
              <input type="checkbox" name= "Bio[]" value= "RF">RF
            </div>
          </fieldset>
          
          <fieldset>
            <legend>Blood Test</legend>
            <div class="test-type-row">
              <input type="checkbox" name= "Blood[]" value= "CPB">CPB
              <input type="checkbox" name= "Blood[]" value= "Serum Widal">Serum Widal
            </div>
          </fieldset>
          
          <fieldset>
            <legend>Urine Test</legend>
            <div class="test-type-row">
              <input type="checkbox" name= "Urin[]" value= "Complete Urine Examination">Complete Urine Examination
            </div>
          </fieldset>

          <input id="form-submit" type="submit">
        </form>
      </div>

      </main>
      <div class="clearfix"></div>
      
      <footer>
          <p><small>Copyright &copy; University of Hyderabad</small></p>
      </footer>
</div>
</body> 
</html>