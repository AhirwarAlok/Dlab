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


// update

$Status = $_POST['Status'];
$TestID = $_POST['TestID'];
$Test_Type = $_POST['Test_Type'];
$Test_Name = $_POST['Test_Name'];

$sql = "update test set Status = '$Status' where TestID = '$TestID' and Test_Type = '$Test_Type' and Test_Name = '$Test_Name' ";
$res = $conn->query($sql);
if ( $res === true)
{
    echo "Update successfully";
}
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
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
    Test ID: <input type="text" name="TestID"> 
    <br>
    Test Type: <input type="text" name="Test_Type">
    <br>
    Test Name: <input type="text" name="Test_Name"> 
    <br>
    <level>Status</level>
    <select name="Status" >
        <option value="Complete">Complete</option>
        <option value="Pending">Pending</option>

    </select>
    <br>
    <input type="submit" value="Update">
</form>
</body> 
</html>