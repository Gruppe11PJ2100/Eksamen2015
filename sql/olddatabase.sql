CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES ('','sadsdd'),('adsdsa@dasdcp','sadasdasd'),('asasdadasd@asdasd','asdsadasdsasdasa'),('asdasd@adds','fghtfghghf'),('asdasd@asd','asdasd'),('asdasdasda@aadsd','feasdas'),('asdasdasdas@adsasdasd','saasdasdasdasd'),('dfgdfgd@efsfd','rgdrgdf'),('dlvhldfhj@asdasd','gcgbgf'),('dsfdsdsfsd@dsa','rwe'),('edvin.klaebo@gmail.com','Edvin'),('fdssfdsdf@adsad','asdasd'),('fghfgh@asd','fghfghfgh'),('fghgfhgfg@23','asdas'),('fsjflj@fkjs','wlhsldf'),('iululuil@sdgf','l8iliulu'),('k2@student.westerdals.no','Edvin'),('kaasddssd@student.westerdals.no','Edvin'),('kaddssaasd@student.westerdals.no','Edvin'),('kaddssasd2@student.westerdals.no','Edvin'),('kads2@student.westerdals.no','Edvin'),('kadsasd2@student.westerdals.no','Edvin'),('kafsfsaaasd@student.westerdals.no','Edvin'),('kafsfsaadssd@student.westerdals.no','Edvin'),('klaeeaasad2@student.westerdals.no','Edvin'),('klaeeaasada2@student.westerdals.no','Edvin'),('klaeeaasasada2@student.westerdals.no','Edvin'),('klaeeasad2@student.westerdals.no','Edvin'),('klaeeasd2@student.westerdals.no','Edvin'),('kleeasd2@student.westerdals.no','Edvin'),('kleeasdsad2@student.westerdals.no','Edvin'),('kleedv14@student.westerdals.no','Edvin'),('kleedv17@student.westerdals.no','Edvin'),('kleedv3232@student.westerdals.no','Edvin'),('kleedv32@student.westerdals.no','Edvin'),('kleesad2@student.westerdals.no','Edvin'),('ksdhasdkjh@asldkjasl','lsjfksdfjl'),('kuykyk@adas','ukyfkyu'),('Man@Manly.man','Very manly man man'),('sddaasd@asdasdad','asasd&quot;'),('sdfgdf@rfsfd','3243'),('sdfsfd@adfasd','hffddfgd'),('sdsadasd@adasd','fddsdfsd'),('sldkasdlk@saldk','Noobasd'),('y7iyi7y@fgsd','i7yi');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fredag`
--

DROP TABLE IF EXISTS `Fredag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Fredag` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email5` (`email`),
  CONSTRAINT `email5` FOREIGN KEY (`email`) REFERENCES `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fredag`
--

LOCK TABLES `Fredag` WRITE;
/*!40000 ALTER TABLE `fredag` DISABLE KEYS */;
/*!40000 ALTER TABLE `fredag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandag`
--

DROP TABLE IF EXISTS `Mandag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mandag` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mandag`
--

LOCK TABLES `mandag` WRITE;
/*!40000 ALTER TABLE `mandag` DISABLE KEYS */;
INSERT INTO `mandag` VALUES (1,'false','true','4','adsdsa@dasdcp'),(2,'false','true','4','asdasd@asd'),(3,'true','true','4',NULL),(4,'true','true','4',NULL),(5,'true','true','4',NULL),(6,'true','true','4',NULL),(7,'true','true','4',NULL),(8,'false','true','2','fsjflj@fkjs'),(9,'false','true','2','fdssfdsdf@adsad'),(10,'false','true','2','asdasdasdas@adsasdasd'),(11,'false','true','2','asdasdasdas@adsasdasd'),(12,'false','true','2','asasdadasd@asdasd'),(13,'false','true','2','edvin.klaebo@gmail.com'),(14,'false','true','3','Man@Manly.man'),(15,'false','true','3','sldkasdlk@saldk'),(16,'false','true','3','asdasd@adds'),(17,'false','true','3','kleedv14@student.westerdals.no'),(18,'false','true','3','kleedv14@student.westerdals.no'),(19,'false','true','3','kleedv14@student.westerdals.no'),(20,'false','true','3','asdasdasda@aadsd'),(21,'false','true','3','sdfgdf@rfsfd'),(22,'false','true','3','dfgdfgd@efsfd'),(23,'false','false','4','sddaasd@asdasdad'),(24,'false','false','4','dlvhldfhj@asdasd'),(25,'false','false','4','fghfgh@asd'),(26,'true','false','4',NULL),(27,'true','false','4',NULL),(28,'true','false','4',NULL),(29,'true','false','4',NULL),(30,'true','false','4',NULL);
/*!40000 ALTER TABLE `mandag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onsdag`
--

DROP TABLE IF EXISTS `Onsdag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Onsdag` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email3` (`email`),
  CONSTRAINT `email3` FOREIGN KEY (`email`) REFERENCES `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Onsdag`
--

LOCK TABLES `Onsdag` WRITE;
/*!40000 ALTER TABLE `Onsdag` DISABLE KEYS */;
/*!40000 ALTER TABLE `Onsdag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tirsdag`
--

DROP TABLE IF EXISTS `Tirsdag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tirsdag` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email2` (`email`),
  CONSTRAINT `email2` FOREIGN KEY (`email`) REFERENCES `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tirsdag`
--

LOCK TABLES `tirsdag` WRITE;
/*!40000 ALTER TABLE `Tirsdag` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tirsdag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Torsdag`
--

DROP TABLE IF EXISTS `Torsdag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Torsdag` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email4` (`email`),
  CONSTRAINT `email4` FOREIGN KEY (`email`) REFERENCES `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torsdag`
--

LOCK TABLES `Torsdag` WRITE;
/*!40000 ALTER TABLE `torsdag` DISABLE KEYS */;
/*!40000 ALTER TABLE `torsdag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-18 18:02:48
