<?php
    session_start();
    $servername = "localhost";
    $username = "Alok";
    $password = "pass";
    $dbname = "test";
    $TestID = $_SESSION["testid"];
    $DoctorID = $_SESSION['uid'];
    $UserID = $_SESSION['userid'];

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
        $type = $row["Employee_Type"];
        $age = $row["Age"];
        $email = $row["Email"];
        $mobile = $row["Mobile"];
    }
    }
    $conn->close();

?>
<form  method="post">
            Test ID: <input type="text" value="<?php echo @$TestID;?>"> 
            <br>
            Doctor ID: <input type="text" value="<?php echo @$DoctorID;?>"> 
            <br>
            Patient ID: <input type="text" value="<?php echo @$UserID;?>"> 
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
            <table>
                <tr>
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
                $sql = "SELECT Test_Type,Test_Name FROM test where TestID = '$TestID'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo "<tr><td>" . $row["Test_Type"] . "</td><td>" . $row["Test_Name"] . "</td></tr>";
                    }
                    echo "</table>";
                }
                else
                {
                    echo "No Record";
                }
                $conn->close();
                ?>
            </table>
            <input type="submit" value="Print" onclick = "window.print();">
            <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
</form>