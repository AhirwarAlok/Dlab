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
    // echo "Welcome " . $user;
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

for ($i=0; $i < sizeof($blood_test); $i++) 
{ 

  $sql = "insert into test(TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$value','$uid','$d_uid','Blood Test' ,'$blood_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
}
for ($i=0; $i < sizeof($urin_test); $i++) 
{ 
  $sql = "insert into test(TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$value','$uid','$d_uid','Urin Test' ,'$urin_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
}
for ($i=0; $i < sizeof($bio_test); $i++) 
{ 
  $sql = "insert into test(TestID,PatientID,DoctorID,Test_Type,Test_Name,Status) values ('$value','$uid','$d_uid','Bio Test' ,'$bio_test[$i]' ,'Waiting for semple')";
  $res = $conn->query($sql);
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
</head>

<body>
  <!-- <form method="post" action="">
      <button type="submit" name= "logout">Logout</button>
  </form> -->

  <div class="page">
    <header>
        <div class="university-details">
            <img class="logo" src="images/university_details.png" alt="" height="128">
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
                  
        <p>Blood Test</p>
        <input type="checkbox" name= "Blood[]" value= "Test1">Test1
        <input type="checkbox" name= "Blood[]" value= "Test2">Test2
        <input type="checkbox" name= "Blood[]" value= "Test3">Test3
        <p>Urin Test</p>
        <input type="checkbox" name= "Urin[]" value= "Test1">Test1
        <input type="checkbox" name= "Urin[]" value= "Test2">Test2
        <input type="checkbox" name= "Urin[]" value= "Test3">Test3
        <p>Bio Test</p>
        <input type="checkbox" name= "Bio[]" value= "Test1">Test1
        <input type="checkbox" name= "Bio[]" value= "Test2">Test2
        <input type="checkbox" name= "Bio[]" value= "Test3">Test3
        <input type="submit">
      </form>
      </main>
      <div class="clearfix"></div>
      
      <footer>
          <p><small>Copyright &copy; University of Hyderabad</small></p>
      </footer>
</div>
</body> 
</html>