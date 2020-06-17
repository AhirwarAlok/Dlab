-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bio`
--

DROP TABLE IF EXISTS `bio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bio` (
  `BCTID` varchar(255) DEFAULT NULL,
  `Result_Date` varchar(255) DEFAULT NULL,
  `Sample_Date` varchar(255) DEFAULT NULL,
  `Semple_Number` varchar(255) DEFAULT NULL,
  `Blood_Sugar_Fasting` int(11) DEFAULT NULL,
  `Blood_Sugar_PL` int(11) DEFAULT NULL,
  `G_HB` int(11) DEFAULT NULL,
  `Total_Cholesterol` int(11) DEFAULT NULL,
  `Triglycerides` int(11) DEFAULT NULL,
  `HDL_Cholestrol` int(11) DEFAULT NULL,
  `LDL_Cholestrol` int(11) DEFAULT NULL,
  `Blood_Urea` int(11) DEFAULT NULL,
  `Serum_Creatinine` int(11) DEFAULT NULL,
  `Serum_Bilirubin_Total` int(11) DEFAULT NULL,
  `Direct` int(11) DEFAULT NULL,
  `SGPT` int(11) DEFAULT NULL,
  `Alkaline_Phosphatase` int(11) DEFAULT NULL,
  `Total_Protine` int(11) DEFAULT NULL,
  `Albumin` int(11) DEFAULT NULL,
  `Globulin` int(11) DEFAULT NULL,
  `Uric_Acid` int(11) DEFAULT NULL,
  `RF` varchar(255) DEFAULT NULL,
  `Remarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bio`
--

LOCK TABLES `bio` WRITE;
/*!40000 ALTER TABLE `bio` DISABLE KEYS */;
INSERT INTO `bio` VALUES ('ABC-001 ','16-06-20','16-06-20','',100,200,10,20,30,40,50,10,20,30,40,50,10,20,30,40,50,'10','Imminent liver failure.'),('ABC-001 ','16-06-20','16-06-20','xyz-001',100,200,10,20,30,40,50,10,20,30,40,50,10,20,30,40,50,'10','Imminent liver failure.');
/*!40000 ALTER TABLE `bio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood`
--

DROP TABLE IF EXISTS `blood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blood` (
  `BTID` varchar(255) DEFAULT NULL,
  `Result_Date` varchar(255) DEFAULT NULL,
  `Sample_Date` varchar(255) DEFAULT NULL,
  `Semple_Number` varchar(255) DEFAULT NULL,
  `Hemoglobin` int(11) DEFAULT NULL,
  `Total_WBC` int(11) DEFAULT NULL,
  `Neutrophils` int(11) DEFAULT NULL,
  `Eosinophils` int(11) DEFAULT NULL,
  `Basophils` int(11) DEFAULT NULL,
  `Lymphocytes` int(11) DEFAULT NULL,
  `Monocytes` int(11) DEFAULT NULL,
  `Blood_Picture` varchar(255) DEFAULT NULL,
  `Malarial_Parasite` varchar(255) DEFAULT NULL,
  `ESR` int(11) DEFAULT NULL,
  `Salmonella_Typhi_O` varchar(255) DEFAULT NULL,
  `Salmonella_Typhi_H` varchar(255) DEFAULT NULL,
  `Salmonella_Para_Typhi_AH` varchar(255) DEFAULT NULL,
  `Salmonella_Para_Typhi_BH` varchar(255) DEFAULT NULL,
  `Total_Bilirubin` varchar(255) DEFAULT NULL,
  `Direct_Bilirubin` varchar(255) DEFAULT NULL,
  `CRP` varchar(255) DEFAULT NULL,
  `Remarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood`
--

LOCK TABLES `blood` WRITE;
/*!40000 ALTER TABLE `blood` DISABLE KEYS */;
INSERT INTO `blood` VALUES ('ABC-001 ',NULL,'16-06-20','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `blood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `EmployeeID` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('17mcmc31','Ahirwar Alokkumar Kamtaprasad','Student',24,'Male','ahirwaralok@gmail.com','+91 9876543210'),('17mcmc41','Tapaj Kumar Das','Student',23,'Male','tapajkumardas@gmail.com','+91 9876543210'),('doctor_1','Dr. Ram Kumar','Doctor',40,'Male','ram@gmail.com','+91 9876543210'),('doctor_2','Dr. Alia Bhatt','Doctor',35,'Female','alia@gmail.com','+91 9876543210'),('staff_1','Monalisa Singh','Staff',45,'Female','monalisa@gmail.com','+91 9876543210'),('staff_2','Mia Ali','Staff',30,'Male','mia@gmail.com','+91 9876543210');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `TestID` varchar(255) DEFAULT NULL,
  `PatientID` varchar(255) DEFAULT NULL,
  `DoctorID` varchar(255) DEFAULT NULL,
  `Test_Type` varchar(255) DEFAULT NULL,
  `Test_Name` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES ('ABC-001','17mcmc31','doctor_1','Blood Test','CPB','','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Blood Test','Serum Widal','','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Urine Test','Complete Urine Examination','Pending','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Bio Test','Lipid Profile','Complete','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Bio Test','KFT','Complete','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Bio Test','LFT','Complete','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Bio Test','Uric Acid','Complete','16-06-2020'),('ABC-001','17mcmc31','doctor_1','Bio Test','RF','Complete','16-06-2020'),('ABC-002','17mcmc31','doctor_1','Bio Test','Lipid Profile','Waiting for semple','16-06-2020');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urine`
--

DROP TABLE IF EXISTS `urine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urine` (
  `UTID` varchar(255) DEFAULT NULL,
  `Result_Date` varchar(255) DEFAULT NULL,
  `Sample_Date` varchar(255) DEFAULT NULL,
  `Semple_Number` varchar(255) DEFAULT NULL,
  `Appearance` varchar(255) DEFAULT NULL,
  `Colour` varchar(255) DEFAULT NULL,
  `Albumin` varchar(255) DEFAULT NULL,
  `Sugar` varchar(255) DEFAULT NULL,
  `Microscopic_Eximination` varchar(255) DEFAULT NULL,
  `Bil_Salts` varchar(255) DEFAULT NULL,
  `Bil_Pigment` varchar(255) DEFAULT NULL,
  `Remarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urine`
--

LOCK TABLES `urine` WRITE;
/*!40000 ALTER TABLE `urine` DISABLE KEYS */;
INSERT INTO `urine` VALUES ('ABC-001 ',NULL,'16-06-20','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('ABC-001 ',NULL,'16-06-20','xyz-001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `urine` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-17 14:41:16
