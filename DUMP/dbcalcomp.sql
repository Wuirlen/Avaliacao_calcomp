-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcalcomp
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dqc84`
--

DROP TABLE IF EXISTS `dqc84`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dqc84` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `MODEL` int NOT NULL,
  `FAT_PART_NO` varchar(15) NOT NULL,
  `TOTAL_LOCATION` int NOT NULL,
  `UPDATE_DT` timestamp NOT NULL,
  `CREATE_DT` timestamp NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FAT_PART_NO_UNIQUE` (`FAT_PART_NO`),
  KEY `fk_DQC84_DQCMODEL_idx` (`MODEL`),
  CONSTRAINT `fk_DQC84_DQCMODEL` FOREIGN KEY (`MODEL`) REFERENCES `dqcmodel` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dqc84`
--

LOCK TABLES `dqc84` WRITE;
/*!40000 ALTER TABLE `dqc84` DISABLE KEYS */;
INSERT INTO `dqc84` VALUES (1,1,'SD018CMAB1R',124,'2020-04-21 01:59:36','2020-04-21 01:59:36'),(2,1,'SD018CMAB0T',129,'2020-04-21 02:00:36','2020-04-21 02:00:36'),(3,1,'SD018PMAB0P',2,'2020-04-21 13:36:10','2020-04-21 02:02:00'),(4,3,'Teste',4,'2020-04-21 12:25:40','2020-04-21 12:25:40');
/*!40000 ALTER TABLE `dqc84` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dqc841`
--

DROP TABLE IF EXISTS `dqc841`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dqc841` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FAT_PART_NO` int NOT NULL,
  `PARTS_NO` varchar(15) NOT NULL,
  `UNT_USG` int NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `REF_DESIGNATOR` longtext,
  `UPDATE_DT` timestamp NOT NULL,
  `CREATE_DT` timestamp NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UQ_PARTS` (`FAT_PART_NO`,`PARTS_NO`),
  KEY `fk_DQC841_DQC841_idx` (`FAT_PART_NO`),
  CONSTRAINT `fk_DQC841_DQC841` FOREIGN KEY (`FAT_PART_NO`) REFERENCES `dqc84` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dqc841`
--

LOCK TABLES `dqc841` WRITE;
/*!40000 ALTER TABLE `dqc841` DISABLE KEYS */;
INSERT INTO `dqc841` VALUES (1,2,'HGSE5014R05',1,'LABEL PCB BARCODE LABEL 10X6MM 25# PLASTIC BLANK','U10','2020-04-21 02:04:19','2020-04-21 02:04:19'),(2,2,'SAH00001Z09',8,'SMT BUTTOM','R31','2020-04-21 13:28:03','2020-04-21 02:06:18'),(3,4,'ZZ705101R08',0,'Calcomp','C116','2020-04-21 12:27:52','2020-04-21 12:27:52');
/*!40000 ALTER TABLE `dqc841` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dqcmodel`
--

DROP TABLE IF EXISTS `dqcmodel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dqcmodel` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `MODEL` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `MODEL_UNIQUE` (`MODEL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dqcmodel`
--

LOCK TABLES `dqcmodel` WRITE;
/*!40000 ALTER TABLE `dqcmodel` DISABLE KEYS */;
INSERT INTO `dqcmodel` VALUES (1,'SSD018'),(2,'SSD019'),(3,'SSD020');
/*!40000 ALTER TABLE `dqcmodel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbcalcomp'
--

--
-- Dumping routines for database 'dbcalcomp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-21 13:33:37
