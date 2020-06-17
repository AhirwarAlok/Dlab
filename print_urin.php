<?php
session_start();
$servername = "localhost";
$username = "Alok";
$password = "pass";
$dbname = "test";
$userid = $_SESSION['userid'];
$doctorid = $_GET['doctorid'];
$testid = $_GET['testid'];
$date = $_GET['date'];


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
    $sex = $row["Sex"];
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
    $Result_Date = $row['Result_Date'];
    $Sample_Date = $row['Sample_Date'];
    $Semple_Number  = $row['Semple_Number'];
    $Appearance = $row['Appearance'];
    $Colour = $row['Colour'];
    $Albumin = $row['Albumin'];
    $Sugar = $row['Sugar'];
    $Bil_Salts = $row['Bil_Salts'];
    $Bil_Pigment = $row['Bil_Pigment'];
    $Microscopic_Eximination = $row['Microscopic_Eximination'];
    $Remarks = $row['Remarks'];
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
    <link rel="stylesheet" href="css/print_urine_01.css">
</head>
<body>
    <header>
        <div class="university-details">
        <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
        </div>
    </header>

    <main>
        <h2>Urine Report</h2>
        <p id="date">Date: <?php echo date("d-m-Y"); ?></p>
        <div class="clearfix"></div>
<!--For Details--> 
<form  method="post">
            
            <div class="form-element"><label>Test Date:</label><input type="text" value="<?php echo @$date;?>" /></div>
            <div class="form-element"><label>Sample Date:</label><input type="text" value="<?php echo @$Sample_Date;?>" /></div>
            <div class="form-element"><label>Result Date:</label><input type="text" value="<?php echo @$Result_Date;?>" /></div>
            <div class="form-element"><label>Semple Number:</label><input type="text" value="<?php echo @$Semple_Number;?>" /></div>
            <div class="form-element"><label>Urine Test ID:</label><input type="text" value="<?php echo @$testid;?>" /></div>
            <div class="form-element"><label>Doctor ID:</label><input type="text" value="<?php echo @$doctorid;?>" /></div>
            <div class="form-element"><label>Patient ID:</label><input type="text" value="<?php echo @$userid;?>" /></div>
            <div class="form-element"><label>Name:</label><input type="text" value="<?php echo @$name;?>"/></div>
            <div class="form-element"><label>Sex:</label><input type="text" value="<?php echo @$sex;?>"/></div>
            <div class="form-element"><label>Age:</label><input type="text" value="<?php echo @$age;?>"/></div>
            <div class="form-element"><label>Email ID:</label><input type="text" value="<?php echo @$email;?>"/></div>
            <div class="form-element"><label>Mobile Number:</label><input type="text" value="<?php echo @$mobile;?>"/> </div>
            <hr>

            <div class="test-title">Complete Urine Examination</div>
            <div class="form-element"><label>Appearance:</label><input type="text" value="<?php echo @$Appearance;?>"/></div>
            <div class="form-element"><label>Bil Salts:</label><input type="text" value="<?php echo @$Bil_Salts;?>"/></div>
            
            <div class="form-element"><label>Colour:</label><input type="text" value="<?php echo @$Colour;?>"/></div>
            <div class="form-element"><label>Bil Pigment:</label><input type="text" value="<?php echo @$Bil_Pigment;?>"></div>

            <div class="form-element"><label>Albumin:</label><input type="text" value="<?php echo @$Albumin;?>"/></div>
            <div class="form-element"><label>Sugar:</label><input type="text" value="<?php echo @$Sugar;?>"/></div>

            <div class="form-element-02"><label>Microscopic Examination:</label><input type="text" value="<?php echo @$Microscopic_Eximination;?>"/></div>
            <div class="form-element-02"><label></label><input type="text" value=""/></div><br>
            <div class="form-element-02"><label>Remark:</label><textarea ><?php echo @$Remarks;?></textarea></div>
            <div class="push-down"></div>
            <input type="submit" value="Print" onclick = "window.print();">
            

            </form>
    </main>

    <footer>

    </footer>
</body>
</html>