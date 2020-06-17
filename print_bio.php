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
//Bio report
$sql = "SELECT * FROM bio where BCTID = '$testid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $Result_Date = $row['Result_Date'];
    $Sample_Date = $row['Sample_Date'];
    $Semple_Number  = $row['Semple_Number'];
    $Blood_Sugar_Fasting = $row['Blood_Sugar_Fasting'];
    $Blood_Sugar_PL = $row['Blood_Sugar_PL'];
    $Total_Cholesterol = $row['Total_Cholesterol'];
    $Triglycerides = $row['Triglycerides'];
    $HDL_Cholestrol = $row['HDL_Cholestrol'];
    $LDL_Cholestrol = $row['LDL_Cholestrol'];
    $Blood_Urea = $row['Blood_Urea'];
    $Serum_Creatinine = $row['Serum_Creatinine'];
    $Serum_Bilirubin_Total = $row['Serum_Bilirubin_Total'];
    $Direct = $row['Direct'];
    $G_HB = $row['G_HB'];
    $SGPT = $row['SGPT'];
    $Alkaline_Phosphatase = $row['Alkaline_Phosphatase'];
    $Total_Protine = $row['Total_Protine'];
    $Albumin = $row['Albumin'];
    $Globulin = $row['Globulin'];
    $Uric_Acid = $row['Uric_Acid'];
    $RF = $row['RF'];
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
    <link rel="stylesheet" href="css/print_bio.css">
</head>
<body>
    <header>
        <div class="university-details">
        <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
        </div>
    </header>

    <main>
        <h2>Bio-Chemestry Report</h2>
        <p id="date">Date: <?php echo date("d-m-Y"); ?></p>
        <div class="clearfix"></div>
        <!--For Details--> 
        <form  method="post">
          <div class="form-element"><label>Test Date:</label><input type="text" value="<?php echo @$date;?>" /></div>
          <div class="form-element"><label>Sample Date:</label><input type="text" value="<?php echo @$Sample_Date;?>" /></div>
          <div class="form-element"><label>Result Date:</label><input type="text" value="<?php echo @$Result_Date;?>" /></div>
          <div class="form-element"><label>Semple Number:</label><input type="text" value="<?php echo @$Semple_Number;?>" /></div>
          <div class="form-element"><label>Bio-Chem Test ID:</label><input type="text" value="<?php echo @$testid;?>" /></div>
          <div class="form-element"><label>Doctor ID:</label><input type="text" value="<?php echo @$doctorid;?>" /></div>
          <div class="form-element"><label>Patient ID:</label><input type="text" value="<?php echo @$userid;?>" /></div>
          <div class="form-element"><label>Name:</label><input type="text" value="<?php echo @$name;?>"/></div>
          <div class="form-element"><label>Sex:</label><input type="text" value="<?php echo @$sex;?>"/></div>
          <div class="form-element"><label>Age:</label><input type="text" value="<?php echo @$age;?>"/></div>
          <div class="form-element"><label>Email ID:</label><input type="text" value="<?php echo @$email;?>"/></div>
          <div class="form-element"><label>Mobile Number:</label><input type="text" value="<?php echo @$mobile;?>"/> </div>
          <hr>

          <div class="test-title">Bio Chemistry Report</div>

          <!-- <div class="test-group">Lipid Profile</div> -->
          <div class="left-side">
            <div class="test-title">Test</div>
            <div class="form-element-02"><label>Blood Sugar Fasting:</label><input type="text" value="<?php echo @$Blood_Sugar_Fasting;?>">mg%</div>
            <div class="form-element-02"><label>Blood Sugar PL:</label><input type="text" value="<?php echo @$Blood_Sugar_PL;?>"> mg%</div>
            <div class="form-element-02"><label>G HB:</label><input type="text" value="<?php echo @$G_HB;?>"> mg%</div>
              <div class="push-down-01"></div>
            <div class="form-element-02"><label>Total Cholesterol:</label><input type="text" value="<?php echo @$Total_Cholesterol;?>"> mg%</div>
            <div class="form-element-02"><label>Triglycerides:</label><input type="text" value="<?php echo @$Triglycerides;?>"> mg%</div>
            <div class="form-element-02"><label>HDL Cholestrol:</label><input type="text" value="<?php echo @$HDL_Cholestrol;?>"> mg% </div>
              <div class="push-down-02"></div>
            <div class="form-element-02"><label>LDL Cholestrol:</label><input type="text" value="<?php echo @$LDL_Cholestrol;?>"> mg% 50-150</div>
          </div>
          <div class="right-side">
            <div class="test-title">Normal Range</div>
            <div class="right-side-element">60 - 110 mg/dl Urin Sugar F</div><br>
            <div class="right-side-element">60 - 170 mg/dl  urine sugar PL</div><br>
            <div class="right-side-element">non diabetic : 4.5 - 8.0%<br>Good Control 8.0 - 9.0% fair control : 9-10%<br>More than 10.0% poor control</div><br>
            <div class="right-side-element">upto 200mg%</div><br>
            <div class="right-side-element">up to 170 mg%</div><br>
            <div class="right-side-element">Male 35-65mg%<br>Female 35-75 mg%</div><br>
            <div class="right-side-element">50-160</div><br>
          </div>
          <div class="clearfix"></div>
          <div class="push-down"></div>

          <div class="left-side">
            <div class="form-element-02"><label>Blood Urea:</label><input type="text" value="<?php echo @$Blood_Urea;?>"> mg%</div>
            <div class="form-element-02"><label>Serum Creatinine:</label><input type="text" value="<?php echo @$Serum_Creatinine;?>"> mg%</div>
          </div>
          <div class="right-side">
            <div class="right-side-element-02">13-40 mg/dl</div><br>
            <div class="right-side-element-02">0.5-1.5 mg/dl</div><br>
          </div>
          <div class="clearfix"></div>
          <div class="push-down"></div>
          
          <div class="left-side">
            <div class="form-element-02"><label>Serum Bilirubin Total:</label><input type="text" value="<?php echo @$Serum_Bilirubin_Total;?>"> mg%</div>
            <div class="push-down-02"></div>
          <div class="form-element-02"><label> Direct:</label><input type="text" value="<?php echo @$Direct;?>"> mg%</div>
          <div class="form-element-02"><label>SGPT:</label><input type="text" value="<?php echo @$SGPT;?>">u/dl</div>
          <div class="form-element-02"><label>Alkaline Phosphatase:</label><input type="text" value="<?php echo @$Alkaline_Phosphatase;?>">IU/L</div>
            <div class="push-down-02"></div>
          <div class="form-element-02"><label>Total Protine:</label><input type="text" value="<?php echo @$Total_Protine;?>">gm/ld</div>
          <div class="form-element-02"><label>Albumin:</label><input type="text" value="<?php echo @$Albumin;?>">gm/ld</div>
          <div class="form-element-02"><label>Globulin:</label><input type="text" value="<?php echo @$Globulin;?>">gm/ld</div>
          <div class="form-element-02"><label>Uric_Acid:</label><input type="text" value="<?php echo @$Uric_Acid;?>"></div>
          <div class="form-element-02"><label>RF:</label><input type="text" value="<?php echo @$RF;?>"></div>
          </div>
          <div class="right-side">
            <div class="right-side-element-03">Male : 0.6-1.2 mg/dl<br>Female 0.5-1.1 mg/dl</div><br>
            <div class="right-side-element-03">0.0-0.2 mg/dl</div><br>
            <div class="right-side-element-03">upto 49 lU/L</div><br>
            <div class="right-side-element-03">Adults 60 - 170  U/L<br> children (3-15yrs) :151 -147 L</div><br>
            <div class="right-side-element-03">6.3-8.4 gm/dl</div><br>
            <div class="right-side-element-03">3.5-5.0 gm/dl</div><br>
              <div class="push-down-01"></div>
              <div class="push-down-01"></div>
            <div class="right-side-element-03">Male: 3.4-7.0 mg/dl<br>Female: 2.4-5.7 mg/dl</div>
          </div>
          <div class="clearfix"></div>
          <div class="push-down"></div>
          
          
          <div class="form-element-02"><label>Remark:</label><textarea ><?php echo @$Remarks;?></textarea></div>
          <div class="push-down"></div>
          <input type="submit" value="Print" onclick = "window.print();">
        </form>
      </main>
      <footer>
      </footer>
</body> 
</html>