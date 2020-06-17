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
$TestID = $_GET["testid"];
$Test_Type = $_GET["Test_Type"];

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


// update

$Status = $_POST['Status'];
$Semple_Number = $_POST['Semple_Number'];

$date = date("d-m-y");
if ($Test_Type == "Blood Test") 
{
    $sql1 = "insert into blood(BTID,Semple_Number,Sample_Date) values ('$TestID','$Semple_Number','$date')";
    $res1 = $conn->query($sql1);
} 
else if($Test_Type == "Bio Test")
{
    $sql1 = "insert into bio(BCTID,Semple_Number,Sample_Date) values ('$TestID','$Semple_Number','$date')";
    $res1 = $conn->query($sql1);
}
else if($Test_Type == "Urine Test")
{
    $sql1 = "insert into urine(UTID, Semple_Number,Sample_Date) values ('$TestID','$Semple_Number','$date')";
    $res1 = $conn->query($sql1);
}

$sql = "update test set Status = '$Status' where TestID = '$TestID' and Test_Type = '$Test_Type'";
$res = $conn->query($sql);
if ( $res === true)
{
    // echo "Update successfully";
}
else 
{
//   echo "Error: " . $sql . "<br>" . $conn->error;
}


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
      <link rel="stylesheet" href="css/update_status.css">
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
                <form class="form-container" method="post">
                    <div class="form-display-line">
                        <!-- Test ID <input type="text" name="TestID"> 
                        Test Type <input type="text" name="Test_Type">
                         -->
                         
                        Sample Number <input type="text" name="Semple_Number"> 
                    </div>
                    <lebel>Status</lebel>
                    <input type="text" name="Status" value="Pending"> 
                    <input type="submit" value="Update">
                </form>
            </main>
            <footer>
                <p><small>Copyright &copy; University of Hyderabad</small></p>
            </footer>
        </div>
</body> 
</html>