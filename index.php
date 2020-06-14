<?php
    session_start();
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
    $uid = $_POST['uid'];
    $utype = $_POST['user'];
    $sql = "SELECT EmployeeID FROM employee where EmployeeID = '$uid' and Employee_Type = '$utype'";
    $result = $conn->query($sql) or die("Faild to fatch database" . mysql_error());
    $row = $result->fetch_assoc();
    if ($row[EmployeeID] == $uid) 
    {
        
        if(isset($uid))
        {
            $_SESSION['uid'] = $uid;
            if($utype == "Doctor")
            {
                echo "<script>location.href='d_doctor.php'</script>";
            }
            elseif ($utype == "Staff") 
            {
                echo "<script>location.href='d_staff.php'</script>";
            }
            else
            {
                echo "<script>location.href='d_patient.php'</script>";
            }
        }
        
    } 
    else 
    {
        echo '<script>alert("Incorrect User Type Of ID, Please try again!")</script>';
    }
    
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Center Lab | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/style-login.css" />
</head>
<body>
    <div class="login-div">
    <div class="logo"></div>
    <div class="title">University Of Hyderabad</div>
    <div class="sub-title">Diagnostic Laboratory System</div>
    <div class="sub-title">Health Center</div>
    <form method="post" action="">
    <div class="fields">
    <div class="utype">
        <path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path>
        <input type="text" class="pass-input" placeholder="User Type"  name="user" required>
    </div>
    <div class="uid">
        <path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path>
        <input type="text" class="pass-input" placeholder="User ID"  name="uid" required>
        </div>
    </div>
    <input type="submit" class="signin-button">
    </form>
    </div>



</body>
</html>