<?php
    session_start();
    $servername = "localhost";
    $username = "Alok";
    $password = "pass";
    $dbname = "test";
    $TestID = $_SESSION["testid"];
    $DoctorID = $_SESSION['uid'];
    $UserID = $_SESSION['userid'];
    $btestid1 = $_SESSION['btestid1'];
    $btestid2 = $_SESSION['btestid2'];
    $utestid = $_SESSION['urineid'];
    $bctestid1 = $_SESSION['bioid1'];
    $bctestid2 = $_SESSION['bioid2'];
    $bctestid3 = $_SESSION['bioid3'];
    $bctestid4 = $_SESSION['bioid4'];
    $bctestid5 = $_SESSION['bioid5'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }
    //print patient
    
    $sql = "SELECT * FROM employee where EmployeeID = '$UserID'";
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
    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Status</title>
    <link rel="stylesheet" href="css/print_status_02.css">
</head>
<body>
    <header>
        <div class="university-details">
        <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
        </div>
    </header>

    <main>
        <h2>Test Order Receipt</h2>
        <p id="date">Date: <?php echo date("d-m-Y"); ?></p>
        <div class="clearfix"></div>
        
        <form  method="post">
            <div class="form-element"><span class="form-text">Test ID:</span><input type="text" value="<?php echo @$TestID;?>"> </div>
            <div class="form-element"><span class="form-text">Doctor ID:</span><input type="text" value="<?php echo @$DoctorID;?>"> </div>
            <div class="form-element"><span class="form-text">Patient ID:</span><input type="text" value="<?php echo @$UserID;?>"></div>
            <div class="form-element"><span class="form-text">Name:</span><input type="text" value="<?php echo @$name;?>"/></div>
            <div class="form-element"><span class="form-text">Sex:</span><input type="text" value="<?php echo @$sex;?>"/></div>
            <div class="form-element"><span class="form-text">Patient Age:</span><input type="text" value="<?php echo @$age;?>"/></div>
            <div class="form-element"><span class="form-text">Email ID:</span><input type="text" value="<?php echo @$email;?>"/></div>
            
            <div class="push-down"></div>
            <div class="form-element-02"><label>Bio-Chemestry Test:</label>
                <input type="text" value="<?php echo @$bctestid1;?>"/> 
                <input type="text" value="<?php echo @$bctestid2;?>"/> 
                <input type="text" value="<?php echo @$bctestid3;?>"/> 
                <input type="text" value="<?php echo @$bctestid4;?>"/>
                <input type="text" value="<?php echo @$bctestid5;?>"/>
            </div>
            <div class="form-element-02"><label>Blood Test:</label>
                <input type="text" value="<?php echo @$btestid1;?>"/>
                <input type="text" value="<?php echo @$btestid2;?>"/>
            </div>
            <div class="form-element-03"><label>Urine Test:</label>
                <input type="text" value="<?php echo @$utestid;?>"/>
            </div>
            

            <input type="submit" value="Print" onclick = "window.print();">
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>