<?php
session_start();
$servername = "localhost";
$username = "Alok";
$password = "pass";
$dbname = "test";
$userid = $_SESSION['userid'];
$doctorid = $_GET['doctorid'];
$testid = $_GET['testid'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Patient
$sql = "SELECT * FROM employee where EmployeeID = '$userid'";
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
//Blood report
$sql = "SELECT * FROM blood where BTID = '$testid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    
    $Hemoglobin = $row["Hemoglobin"];
    $WBC = $row["WBC"];
    $Neutrophils = $row["Neutrophils"];
    $Remark = $row["Remark"];
  }
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<body>
<!--For Details--> 
<form  method="post">
            Blood Test ID: <input type="text" value="<?php echo @$testid;?>" />
            <br>
            Doctor ID: <input type="text" value="<?php echo @$doctorid;?>" />
            <br>
            Patient ID: <input type="text" value="<?php echo @$userid;?>" />
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
            Test Type: <input type="text" value="Blood Test"/> 
            <br>
            Hemoglobin: <input type="text" value="<?php echo @$Hemoglobin;?>"/>
            <br>
            WBC Count: <input type="text" value="<?php echo @$WBC;?>"/>
            <br>
            Neutrophils: <input type="text" value="<?php echo @$Neutrophils;?>"/>
            <br>
            Remark: <textarea ><?php echo @$Remark;?></textarea>
            <br>
            <input type="submit" value="Print" onclick = "window.print();">
            <br>

</form>
</body> 
</html>