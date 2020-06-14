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

// Insert Blood Report
$sql = "SELECT TestID FROM test where PatientID = '$uid' and Status != 'Complete'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$BTID = $row["TestID"];
$Hemoglobin = $_POST['Hemoglobin'];
$WBC = $_POST['WBC'];
$Neutrophils = $_POST['Neutrophils'];
$Remark = $_POST['Remark'];
$BID = $_POST['BID'];
$sql = "insert into blood(BTID,Hemoglobin,WBC,Neutrophils,Remark) values ('$BID','$Hemoglobin','$WBC','$Neutrophils','$Remark')";
$res = $conn->query($sql);
$Status = $_POST['Complete'];
$sql1 = "update test set Status = 'Complete' where TestID = '$BID' and Test_Type = 'Blood Test'";
$res1 = $conn->query($sql1);
if ( $res === true && $res === true)
{
    echo "Record update successfully";
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
<!--For Details--> 
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
            Requaired Test: 
            <table>
                <tr>
                <th>Test ID</th>
                <th>Test Type</th>
                <th>Test Name</th>
                </tr>
                <?php
                $servername = "localhost";
                $username = "Alok";
                $password = "pass";
                $dbname = "test";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT TestID,Test_Type,Test_Name FROM test where PatientID = '$uid' and Test_Type = 'Blood Test' and Status != 'Complete'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo "<tr><td>" . $row["TestID"]. "</td><td>" . $row["Test_Type"] . "</td><td>" . $row["Test_Name"] . "</td></tr>";
                    }
                    echo "</table>";
                }
                else
                {
                    echo "No Record";
                }
                ?>
            </table>

</form>
<!--For Blood-->
<form  method="post">
            Blood Test ID: <input type="text" value="<?php echo @$BTID;?>" name="BID" /> 
            <br>
            Hemoglobin: <input type="text" name="Hemoglobin"/>
            <br>
            WBC Count: <input type="text" name="WBC"/>
            <br>
            Neutrophils: <input type="text" name="Neutrophils"/>
            <br>
            Remark: <textarea name = "Remark" ></textarea>
            <br>
            Status: <input type="text" name="Complete" value = "Complete"/>
            <br>
            <input type="submit" value="Submit">
            <br>
</form>
</body> 
</html>