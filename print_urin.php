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
//urin report
$sql = "SELECT * FROM urine where UTID = '$testid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    
    $Apprence = $row["Apprence"];
    $Colour = $row["Colour"];
    $Sugar = $row["Sugar"];
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
            Test Type: <input type="text" value="Urine Test"/> 
            <br>
            Apprence: <input type="text" value="<?php echo @$Apprence;?>"/>
            <br>
            Colour: <input type="text" value="<?php echo @$Colour;?>"/>
            <br>
            Sugar: <input type="text" value="<?php echo @$Sugar;?>"/>
            <br>
            Remark: <textarea ><?php echo @$Remark;?></textarea>
            <br>
            <input type="submit" value="Print" onclick = "window.print();">
            <br>

</form>
</body> 
</html>