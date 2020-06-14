<?php
session_start();
$uid = $_SESSION['uid'];
$servername = "localhost";
    $username = "Alok";
    $password = "pass";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Name FROM employee where EmployeeID = '$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user = $row[Name];
    $conn->close();
echo "Welcome " . $user;
if(isset($_REQUEST[logout]))
{
    session_unset();
    session_destroy();
    echo "<script> location.href= 'index.php' </script>";
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    <button type="submit" name= "logout">Logout</button>
</form>
<form method="post" action="pending_status.php">
    <button type="submit">Pending Order</button>
</form>
<form method="post" action="update_status.php">
    <button type="submit">Update Status</button>
</form>
<form method="post" action="update_report.php">
    <button type="submit">Update Report</button>
</form>
<form method="post" action="status.php">
    <button type="submit">Patient Report</button>
</form>

</body>
</html>
