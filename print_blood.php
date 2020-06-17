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
//Blood report
$sql = "SELECT * FROM blood where BTID = '$testid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $Result_Date = $row['Result_Date'];
    $Sample_Date = $row['Sample_Date'];
    $Semple_Number  = $row['Semple_Number'];
    $Hemoglobin = $row["Hemoglobin"];
    $WBC = $row["Total_WBC"];
    $Neutrophils = $row["Neutrophils"];
    $Eosinophils = $row['Eosinophils'];
    $Basophils = $row['Basophils'];
    $Lymphocytes = $row['Lymphocytes'];
    $Monocytes = $row['Monocytes'];
    $Blood_Picture = $row['Blood_Picture'];
    $Malarial_Parasite = $row['Malarial_Parasite'];
    $ESR = $row['ESR'];
    $Salmonella_Typhi_O = $row['Salmonella_Typhi_O'];
    $Salmonella_Typhi_H = $row['Salmonella_Typhi_H'];
    $Salmonella_Para_Typhi_AH = $row['Salmonella_Para_Typhi_AH'];
    $Salmonella_Para_Typhi_BH = $row['Salmonella_Para_Typhi_BH'];
    $Total_Bilirubin = $row['Total_Bilirubin'];
    $Direct_Bilirubin = $row['Direct_Bilirubin'];
    $CRP = $row['CRP'];
    $Remark = $row["Remarks"];
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
    <link rel="stylesheet" href="css/print_blood.css">
</head>
<body>
    <header>
        <div class="university-details">
        <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
        </div>
    </header>

    <main>
        <h2>Blood Report</h2>
        <p id="date">Date: <?php echo date("d-m-Y"); ?></p>
        <div class="clearfix"></div>
<!--For Details--> 

<form  method="post">   
            <div class="form-element"><label>Test Date:</label><input type="text" value="<?php echo @$date;?>"/> </div>
            <div class="form-element"><label>Sample Date:</label><input type="text" value="<?php echo @$Sample_Date;?>" /></div>
            <div class="form-element"><label>Result Date:</label><input type="text" value="<?php echo @$Result_Date;?>" /></div>
            <div class="form-element"><label>Semple Number:</label><input type="text" value="<?php echo @$Semple_Number;?>" /></div>
            <div class="form-element"><label>Blood Test ID:</label><input type="text" value="<?php echo @$testid;?>" /></div>
            <div class="form-element"><label>Doctor ID:</label><input type="text" value="<?php echo @$doctorid;?>" /></div>
            <div class="form-element"><label>Patient ID:</label><input type="text" value="<?php echo @$userid;?>" /></div>
            <div class="form-element"><label>Name:</label><input type="text" value="<?php echo @$name;?>"/></div>
            <div class="form-element"><label>Sex:</label><input type="text" value="<?php echo @$sex;?>"/></div>
            <div class="form-element"><label>Age:</label><input type="text" value="<?php echo @$age;?>"/></div>
            <div class="form-element"><label>Email ID:</label><input type="text" value="<?php echo @$email;?>"/></div>
            <div class="form-element"><label>Mobile Number:</label><input type="text" value="<?php echo @$mobile;?>"/> </div>
            <hr>
            <div class="left-side">
              <div class="form-element"><label>Test Type:</label><input type="text" value="Blood Test"/></div><br>
              <div class="form-element"><label>Hemoglobin:</label><input type="text" value="<?php echo @$Hemoglobin;?>"/>gms% </div><br>
              <div class="form-element"><label>Total WBC Count:</label><input type="text" value="<?php echo @$WBC;?>"/>per Cmm</div><br>
              <div class="form-element"><label id="label">Differential Leucocyte Count :</label></div><br>
              <div class="form-element"><label>Neutrophils:</label><input type="text" value="<?php echo @$Neutrophils;?>">% </div><br>
              <div class="form-element"><label>Eosinophils:</label><input type="text" value="<?php echo @$Eosinophils;?>">% </div><br>
              <div class="form-element"><label>Basophils:</label><input type="text" value="<?php echo @$Basophils;?>">% </div><br>
              <div class="form-element"><label>Lymphocytes:</label><input type="text" value="<?php echo @$Lymphocytes;?>">% </div><br>
              <div class="form-element"><label>Monocytes:</label><input type="text" value="<?php echo @$Monocytes;?>">% </div> <br>
            </div>
            <div class="right-side">
              <b>NORMAL VALUES</b><br>
              Men 13.5-17.5 gms<br>
              Women 11.5-15.5gms%<br>
              4000-10000 Cmm <br>
              
              <div class="push-down-02"></div>
              <div class="ranges">40 - 70%</div>
              <div class="ranges">01 - 06%</div>
              <div class="ranges">00 - 05%</div>
              <div class="ranges">20 - 40%</div>
              <div class="ranges">02 - 06%</div>
              </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="form-element-02" id="blood-picture"><label>Blood Picture:</label><input type="text" value="<?php echo @$Blood_Picture;?>"></div>
            <div class="form-element-02" id="blood-picture"><label></label><input type="text" value=""></div>
            <div class="form-element-02"><label>Malarial Parasite:</label><input type="text" value="<?php echo @$Malarial_Parasite;?>"></div>
            <div id="malaria-text">men 0-5 mm Women 0-7mm</div>
            <div class="clearfix"></div>
            <div class="form-element-02" id="esr"><label>ESR:</label><input type="text" value="<?php echo @$ESR;?>">mm fall at the end of 1 hr</div>
            <div class="form-element-02" id="esr"><label></label><input type="text" value="">mm fall at the end of 2nd hr</div>
            <hr>

            <div class="test-title">Serum Widal</div>
            <div class="form-element-03"><label>Salmonella Typhi "O":</label><input type="text" value="<?php echo @$Salmonella_Typhi_O;?>"></div>
            <div class="form-element-03"><label>Salmonella Typhi "H":</label><input type="text" value="<?php echo @$Salmonella_Typhi_H;?>"></div>
            <div class="form-element-03"><label>Salmonella Para Typhi (AH):</label><input type="text" value="<?php echo @$Salmonella_Para_Typhi_AH;?>"></div>
            <div class="form-element-03"><label>Salmonella Para Typhi (BH):</label><input type="text" value="<?php echo @$Salmonella_Para_Typhi_BH;?>"></div>
            <div class="form-element-03"><label>Total Bilirubin:</label><input type="text" value="<?php echo @$Total_Bilirubin;?>"></div>
            <div class="form-element-03"><label>Direct Bilirubin:</label><input type="text" value="<?php echo @$Direct_Bilirubin;?>"></div>
            <div class="form-element-03"><label>CRP:</label><input type="text" value="<?php echo @$CRP;?>"></div>

            <div class="form-element-03"><label>Remark:</label><textarea><?php echo @$Remark;?></textarea></div>
            
            <div class="push-down"></div>
            <input type="submit" value="Print" onclick = "window.print();">

            </form>
    </main>

    <footer>

    </footer>
</body>
</html>