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


$conn->close();
?>

<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report</title>
    <link rel="stylesheet" href="css/d_dashboard.css">
    <link rel="stylesheet" href="css/update_report.css">
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
            <form method="post" action="update_breport.php" class="main-form">
                <button class="form-submit" type="submit">Update Blood Report</button>
            </form>
            <form method="post" action="update_ureport.php" class="main-form">
                <button class="form-submit" type="submit">Update Urine Report</button>
            </form>
            <form method="post" action="update_bcreport.php" class="main-form">
                <button class="form-submit" type="submit">Update Bio Reoprt</button>
            </form>
        </main>
        <footer>
            <p><small>Copyright &copy; University of Hyderabad</small></p>
        </footer>
    </div>
</body>
</html>