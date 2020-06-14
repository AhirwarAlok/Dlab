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


$conn->close();
?>


<!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    <button type="submit" name= "logout">Logout</button>
</form>
<form method="post" action="update_breport.php">
    <button type="submit">Update Blood Report</button>
</form>
<form method="post" action="update_ureport.php">
    <button type="submit">Update Urine Report</button>
</form>
<form method="post" action="update_bcreport.php">
    <button type="submit">Update Bio Reoprt</button>
</form>
</body> 
</html>