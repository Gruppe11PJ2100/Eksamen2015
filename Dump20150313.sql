-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: localhost    Database: myDB
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
-- Table structure for table `Booking`
--

DROP TABLE IF EXISTS `Booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Booking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Dato` varchar(10) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Rom_Id` int(11) NOT NULL,
  `Dag` enum('mon','tue','wed','thu','fri') NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Booking_Mail_Fk` (`Mail`),
  KEY `Booking_Rom_Id_Fk` (`Rom_Id`),
  CONSTRAINT `Booking_Mail_Fk` FOREIGN KEY (`Mail`) REFERENCES `Student` (`Mail`),
  CONSTRAINT `Booking_Rom_Id_Fk` FOREIGN KEY (`Rom_Id`) REFERENCES `Rom` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Booking`
--

LOCK TABLES `Booking` WRITE;
/*!40000 ALTER TABLE `Booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `Booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MyGuests`
--

DROP TABLE IF EXISTS `MyGuests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MyGuests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MyGuests`
--

LOCK TABLES `MyGuests` WRITE;
/*!40000 ALTER TABLE `MyGuests` DISABLE KEYS */;
INSERT INTO `MyGuests` VALUES (1,'John','Doe','john@example.com','2015-03-10 14:01:52'),(2,'John','Doe','john@example.com','2015-03-10 14:03:13'),(3,'John','Doe','john@example.com','2015-03-10 14:06:53'),(4,'John','Doe','john@example.com','2015-03-10 14:07:13'),(5,'John','Doe','john@example.com','2015-03-11 09:45:06'),(6,'John','Doe','john@example.com','2015-03-11 09:45:24'),(7,'John','Doe','john@example.com','2015-03-11 09:45:26');
/*!40000 ALTER TABLE `MyGuests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rom`
--

DROP TABLE IF EXISTS `Rom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rom` (
  `Id` int(11) NOT NULL,
  `Antall` varchar(1) NOT NULL,
  `Prosjektor` varchar(3) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rom`
--

LOCK TABLES `Rom` WRITE;
/*!40000 ALTER TABLE `Rom` DISABLE KEYS */;
INSERT INTO `Rom` VALUES (1,'2','Nei'),(2,'2','Ja'),(3,'3','Nei'),(4,'3','Ja'),(5,'4','Nei'),(6,'4','Ja');
/*!40000 ALTER TABLE `Rom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `Mail` varchar(100) NOT NULL,
  `Navn` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES ('','noob'),('1@2.com',''),('3324324@fds','asdasd'),('adsdasdd@dasd','dadadda'),('adssdas@ads','asd3rw'),('afaf@da','sadasd'),('AHDJSAHDKSJDHAKSJDHAKSDH@SADKJHASDHJ','adhasdjh'),('alksjdasj@adas','aks,daskd'),('ALLAHU@akbar.BOMB','ALDHLAKDJLKj'),('asdadasd@asd','asdasdasdasd'),('asdas@ad','assadasd'),('asdasd@asd','asdasd'),('asdasd@das','sadas'),('asdasd@dasda','adasda'),('asdasdas@asd','asdasdasd'),('asdasdk@asd','asdlkasjd'),('asdasds@asd','fdsfsdfddf'),('asdasdsa@asdd','qwqd'),('asdasdsad2ASD@ad','sadsadsa'),('asdasdsd@ad','qwewesadsaa'),('asdass@sa','asdasd'),('asddasdasd@ad','assdasdasd'),('ASDJLKSDJKLASDJLSAKJD@ASDLKJASL','KLSDJLSDJASLKDJ'),('asdsad','33123@da'),('asdsasd@asda','dasdasd'),('askldjasd@asdsa','asldjasd'),('asldasdljl@das','asasdlsjd'),('aslkddakj@lda','klsadlakd'),('CAPSLOCKMAIL@CAPS.LOCK','HEEEERE BRO'),('DAasd@23','asdasd'),('dasdasd@3dsa','dadasdasd'),('ddvddsg@sfdf','dgrdfbb'),('dfgd@gd','ghdth'),('dfssdf@2','sfds'),('djalskdjls@askdljasl','NODJAODJ'),('dsf@fds','esfds'),('dsf@fsdf','adasdasd'),('dsfdsfsfd@232','sdfsdfsdf'),('dsfsdfs@asd','sdfsdfdsf'),('efsf@as','3243'),('eqweqweqe@qw','qweqweqw'),('ergerg@asd','gregrege'),('erwer2@DFS','sfsfetew'),('fdgfgdf@g','grrg'),('fdgfgdfg@sadf','gdfgdg'),('fesesfefeefs@sfsfdfddsfsd','seffsefesfse'),('fgfdg@fsdf','gtfgddfg'),('fghf@asd','fgnfg'),('fghfh@2','nhh'),('fsd@dsad','sfd'),('fsdfds@asd','assdds'),('gdgdg@sre','grgr'),('grrg','fdgfgdf@g'),('GSGSGSDG@DFSDSF','GRRRG'),('hdajskhd@asd','adasdsa'),('HELLLLLOooooOOOO@bRO','HELLOOOOO'),('kasjdalsdj@asd','ljadlkjsad'),('kjsaskjdnakd@ads','ajsdndkjasjd'),('kleedv10@student.westerdals.no',''),('kleedv11@student.westerdals.no',''),('kleedv12@student.westerdals.no',''),('kleedv13@student.westerdals.no',''),('kleedv14@student.westerdals.no',''),('kleedv15@student.westerdals.no',''),('kleedv16@student.westerdals.no',''),('kleedv17@student.westerdals.no',''),('kleedv1@student.westerdals.no','edvin klaebo'),('kleedv9@student.westerdals.no',''),('ksajasdlj@asd','LOL BOOLEAN IS FUCKING UP'),('laksjdaljd@asjdk','sad;lkasd'),('LASKDKSJDJLK@LOLNOROOMFORU','KAJDLADJ'),('OPS@LOL.HAHA','THIS WILL FUCK UP EVERYRHING'),('PLSEASEWORK@PHP','DOES IT WORK_????'),('qeqweqweqwe@wq','wqeqwe'),('qweqwe@dsa','ewqe'),('qweqweG@asd','qweqwe'),('qweqweqew@wqe','qweqweqwe'),('qweqweqw@adsdda','qeqweqe'),('qweqweqwe@aweqwe','qweqwe'),('qweqwew@aeqwe','qeqewqe'),('qweqweweqeqw@qwew','wqeqwe'),('qwewqeqeqQWEWQEQWEQWE@QWEWQWQE','QWQEQWEQWEQWE'),('retertreert@efdssdf','etrtteterr'),('rofl@asdlo','ASDFBRO'),('ROFLL@LOL.com','LOL'),('sadad@asd','asasd'),('sadasdasd','asdsa'),('sadjasldjas@adsasd','sdklasdjlsad'),('sdfdfdfsdf@sadf','fsfsdfsdf'),('sdfsdf@2','fsfsfd'),('sfdsfsdfsdf2@ads','asdasa'),('sfdsfssdd@daad','afgdrgddthh'),('sldflsdkfj@fdlaj','lksdjldsj'),('swaggins@blaze.com','yolo'),('tjytyjtyt@fs','jyyjtj'),('werq2@2','dadds'),('wewqeqwe2@qwe','qewqeqw'),('WJELSJ@ads','ljdlsajd'),('wqeqweqwe@awd','asdadadasd'),('YEEEEES@WORRRRKS','asdasd');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fri`
--

DROP TABLE IF EXISTS `fri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fri` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `email` varchar(255) NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fri`
--

LOCK TABLES `fri` WRITE;
/*!40000 ALTER TABLE `fri` DISABLE KEYS */;
INSERT INTO `fri` VALUES (1,'false','true','fghf@asd','2'),(2,'true','true','','2'),(3,'true','true','','2'),(4,'true','true','','2'),(5,'true','true','','2'),(6,'true','true','','2'),(7,'true','true','','2'),(8,'true','true','','2'),(9,'true','true','','2'),(10,'true','true','','2'),(11,'true','true','','2'),(12,'true','true','','2'),(13,'true','true','','2'),(14,'true','true','','2'),(15,'true','true','','2'),(16,'true','true','','2'),(17,'true','true','','2'),(18,'true','false','','2'),(19,'true','false','','2'),(20,'true','false','','2'),(21,'true','false','','2'),(22,'true','false','','2'),(23,'true','false','','2'),(24,'true','false','','3'),(25,'true','false','','3'),(26,'true','false','','3'),(27,'true','false','','3'),(28,'true','false','','3'),(29,'true','false','','3'),(30,'true','false','','3'),(31,'true','false','','3'),(32,'true','false','','3'),(33,'true','false','','3'),(34,'true','false','','3'),(35,'true','false','','3'),(36,'true','false','','3'),(37,'true','false','','3'),(38,'true','false','','3'),(39,'true','false','','3'),(40,'true','false','','3'),(41,'true','false','','4'),(42,'true','false','','4'),(43,'true','false','','4'),(44,'true','false','','4'),(45,'true','false','','4'),(46,'true','false','','4'),(47,'true','false','','4'),(48,'true','true','','4'),(49,'true','true','','4'),(50,'true','true','','4'),(51,'true','true','','4'),(52,'true','true','','4'),(53,'true','true','','4'),(54,'true','true','','4'),(55,'true','true','','3'),(56,'true','true','','3'),(57,'true','true','','3'),(58,'true','true','','3'),(59,'true','true','','3'),(60,'true','true','','3'),(61,'true','true','','3'),(62,'true','true','','3'),(63,'true','true','','3'),(64,'true','true','','3'),(65,'true','true','','3'),(66,'true','true','','3'),(67,'true','true','','3'),(68,'true','true','','3'),(69,'true','false','','2'),(70,'true','false','','2'),(71,'true','false','','2'),(72,'true','false','','2'),(73,'true','false','','2'),(74,'true','false','','2'),(75,'true','false','','3'),(76,'true','false','','3'),(77,'true','false','','3'),(78,'true','false','','3'),(79,'true','false','','3'),(80,'true','false','','3'),(81,'true','false','','3'),(82,'true','false','','3'),(83,'true','false','','3'),(84,'true','false','','3'),(85,'true','false','','3'),(86,'true','false','','3'),(87,'true','false','','3'),(88,'true','false','','3'),(89,'true','false','','3'),(90,'true','false','','3');
/*!40000 ALTER TABLE `fri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gruppe_rom`
--

DROP TABLE IF EXISTS `gruppe_rom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gruppe_rom` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `has_beamer` enum('true','false') NOT NULL,
  `day` enum('mon','tue','wed','thu','fri') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gruppe_rom`
--

LOCK TABLES `gruppe_rom` WRITE;
/*!40000 ALTER TABLE `gruppe_rom` DISABLE KEYS */;
INSERT INTO `gruppe_rom` VALUES (1,'false','false',NULL),(2,'true','false',NULL),(3,'true','false',NULL),(4,'true','false',NULL),(5,'false','false',NULL),(6,'false','false',NULL),(7,'false','false',NULL),(8,'false','true',NULL),(9,'true','true',NULL),(10,'true','true',NULL),(11,'true','true',NULL),(12,'false','true','fri'),(13,'true','true',NULL),(14,'true','true',NULL);
/*!40000 ALTER TABLE `gruppe_rom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `man`
--

DROP TABLE IF EXISTS `man`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `man` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `has_beamer` enum('true','false') NOT NULL,
  `reserved_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `man`
--

LOCK TABLES `man` WRITE;
/*!40000 ALTER TABLE `man` DISABLE KEYS */;
/*!40000 ALTER TABLE `man` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mon`
--

DROP TABLE IF EXISTS `mon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mon` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `email` varchar(255) NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mon`
--

LOCK TABLES `mon` WRITE;
/*!40000 ALTER TABLE `mon` DISABLE KEYS */;
INSERT INTO `mon` VALUES (68,'false','false','djalskdjls@askdljasl','2'),(69,'true','false','','2'),(70,'true','false','','2'),(71,'true','false','','2'),(72,'true','false','','2'),(73,'true','false','','2'),(74,'true','false','','3'),(75,'true','false','','3'),(76,'true','false','','3'),(77,'true','false','','3'),(78,'true','false','','3'),(79,'true','false','','3'),(80,'true','false','','3'),(81,'true','false','','3'),(82,'true','false','','3'),(83,'true','false','','3'),(84,'true','false','','3'),(85,'true','false','','3'),(86,'true','false','','3'),(87,'true','false','','3'),(88,'true','false','','2'),(89,'true','false','','2'),(90,'true','false','','2'),(91,'true','false','','2'),(92,'true','false','','2'),(93,'true','false','','2'),(94,'true','false','','3'),(95,'true','false','','3'),(96,'true','false','','3'),(97,'true','false','','3'),(98,'true','false','','3'),(99,'true','false','','3'),(100,'true','false','','3'),(101,'true','false','','3'),(102,'true','false','','3'),(103,'true','false','','3'),(104,'true','false','','3'),(105,'true','false','','3'),(106,'true','false','','3'),(107,'true','false','','3'),(108,'true','false','','3'),(109,'true','false','','3'),(110,'true','false','','3'),(111,'true','false','','4'),(112,'true','false','','4'),(113,'true','false','','4'),(114,'true','false','','4'),(115,'true','false','','4'),(116,'true','false','','4'),(117,'true','false','','4'),(118,'true','true','','4'),(119,'true','true','','4'),(120,'true','true','','4'),(121,'true','true','','4'),(122,'true','true','','4'),(123,'true','true','','4'),(124,'true','true','','4'),(125,'true','true','','3'),(126,'true','true','','3'),(127,'true','true','','3'),(128,'true','true','','3'),(129,'true','true','','3'),(130,'true','true','','3'),(131,'true','true','','3'),(132,'true','true','','3'),(133,'true','true','','3'),(134,'true','true','','3'),(135,'true','true','','3'),(136,'true','true','','3'),(137,'true','true','','3'),(138,'true','true','','3');
/*!40000 ALTER TABLE `mon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thu`
--

DROP TABLE IF EXISTS `thu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thu` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `email` varchar(255) NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thu`
--

LOCK TABLES `thu` WRITE;
/*!40000 ALTER TABLE `thu` DISABLE KEYS */;
INSERT INTO `thu` VALUES (1,'true','true','','2'),(2,'true','true','','2'),(3,'true','true','','2'),(4,'true','false','','2'),(5,'true','false','','2'),(6,'true','false','','2'),(7,'true','false','','2'),(8,'true','false','','2'),(9,'true','false','','2'),(10,'true','false','','3'),(11,'true','false','','3'),(12,'true','false','','3'),(13,'true','false','','3'),(14,'true','false','','3'),(15,'true','false','','3'),(16,'true','false','','3'),(17,'true','false','','3'),(18,'true','false','','3'),(19,'true','false','','3'),(20,'true','false','','3'),(21,'true','false','','3'),(22,'true','false','','3'),(23,'true','false','','3'),(24,'true','false','','3'),(25,'true','false','','3'),(26,'true','false','','3'),(27,'true','false','','4'),(28,'true','false','','4'),(29,'true','false','','4'),(30,'true','false','','4'),(31,'true','false','','4'),(32,'true','false','','4'),(33,'true','false','','4'),(34,'true','true','','4'),(35,'true','true','','4'),(36,'true','true','','4'),(37,'true','true','','4'),(38,'true','true','','4'),(39,'true','true','','4'),(40,'true','true','','4'),(41,'true','true','','3'),(42,'true','true','','3'),(43,'true','true','','3'),(44,'true','true','','3'),(45,'true','true','','3'),(46,'true','true','','3'),(47,'true','true','','3'),(48,'true','true','','3'),(49,'true','true','','3'),(50,'true','true','','3'),(51,'true','true','','3'),(52,'true','true','','3'),(53,'true','true','','3'),(54,'true','true','','3'),(55,'true','false','','2'),(56,'true','false','','2'),(57,'true','false','','2'),(58,'true','false','','2'),(59,'true','false','','2'),(60,'true','false','','2'),(61,'true','false','','3'),(62,'true','false','','3'),(63,'true','false','','3'),(64,'true','false','','3'),(65,'true','false','','3'),(66,'true','false','','3'),(67,'true','false','','3'),(68,'true','false','','3'),(69,'true','false','','3'),(70,'true','false','','3'),(71,'true','false','','3'),(72,'true','false','','3'),(73,'true','false','','3'),(74,'true','false','','3'),(75,'true','false','','3'),(76,'true','false','','3'),(77,'true','false','','3'),(78,'true','false','','4'),(79,'true','false','','4'),(80,'true','false','','4'),(81,'true','false','','4'),(82,'true','false','','4'),(83,'true','false','','4'),(84,'true','false','','4'),(85,'true','true','','4'),(86,'true','true','','4'),(87,'true','true','','4'),(88,'true','true','','4'),(89,'true','true','','4'),(90,'true','true','','4'),(91,'true','true','','4'),(92,'true','true','','3'),(93,'true','true','','3'),(94,'true','true','','3'),(95,'true','true','','3'),(96,'true','true','','3'),(97,'true','true','','3'),(98,'true','true','','3'),(99,'true','true','','3'),(100,'true','true','','3'),(101,'true','true','','3'),(102,'true','true','','3'),(103,'true','true','','3'),(104,'true','true','','3'),(105,'true','true','','3');
/*!40000 ALTER TABLE `thu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tue`
--

DROP TABLE IF EXISTS `tue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tue` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `email` varchar(255) NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tue`
--

LOCK TABLES `tue` WRITE;
/*!40000 ALTER TABLE `tue` DISABLE KEYS */;
INSERT INTO `tue` VALUES (1,'true','true','','2'),(2,'true','true','','2'),(3,'true','true','','2'),(4,'true','false','','2'),(5,'true','false','','2'),(6,'true','false','','2'),(7,'true','false','','2'),(8,'true','false','','2'),(9,'true','false','','2'),(10,'true','false','','3'),(11,'true','false','','3'),(12,'true','false','','3'),(13,'true','false','','3'),(14,'true','false','','3'),(15,'true','false','','3'),(16,'true','false','','3'),(17,'true','false','','3'),(18,'true','false','','3'),(19,'true','false','','3'),(20,'true','false','','3'),(21,'true','false','','3'),(22,'true','false','','3'),(23,'true','false','','3'),(24,'true','false','','3'),(25,'true','false','','3'),(26,'true','false','','3'),(27,'true','false','','4'),(28,'true','false','','4'),(29,'true','false','','4'),(30,'true','false','','4'),(31,'true','false','','4'),(32,'true','false','','4'),(33,'true','false','','4'),(34,'true','true','','4'),(35,'true','true','','4'),(36,'true','true','','4'),(37,'true','true','','4'),(38,'true','true','','4'),(39,'true','true','','4'),(40,'true','true','','4'),(41,'true','true','','3'),(42,'true','true','','3'),(43,'true','true','','3'),(44,'true','true','','3'),(45,'true','true','','3'),(46,'true','true','','3'),(47,'true','true','','3'),(48,'true','true','','3'),(49,'true','true','','3'),(50,'true','true','','3'),(51,'true','true','','3'),(52,'true','true','','3'),(53,'true','true','','3'),(54,'true','true','','3');
/*!40000 ALTER TABLE `tue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wed`
--

DROP TABLE IF EXISTS `wed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wed` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `is_free` enum('true','false') NOT NULL,
  `prosjektor` enum('true','false') NOT NULL,
  `email` varchar(255) NOT NULL,
  `antall` enum('2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wed`
--

LOCK TABLES `wed` WRITE;
/*!40000 ALTER TABLE `wed` DISABLE KEYS */;
INSERT INTO `wed` VALUES (1,'true','true','','3'),(2,'true','false','','2'),(3,'true','false','','2'),(4,'true','false','','2'),(5,'true','false','','2'),(6,'true','false','','2'),(7,'true','false','','2'),(8,'false','false','swaggins@blaze.com','3'),(9,'true','false','','3'),(10,'true','false','','3'),(11,'true','false','','3'),(12,'true','false','','3'),(13,'true','false','','3'),(14,'true','false','','3'),(15,'true','false','','3'),(16,'true','false','','3'),(17,'true','false','','3'),(18,'true','false','','3'),(19,'true','false','','3'),(20,'true','false','','3'),(21,'true','false','','3'),(22,'true','false','','3'),(23,'true','false','','3'),(24,'true','false','','3'),(25,'true','false','','4'),(26,'true','false','','4'),(27,'true','false','','4'),(28,'true','false','','4'),(29,'true','false','','4'),(30,'true','false','','4'),(31,'true','false','','4'),(32,'true','true','','4'),(33,'true','true','','4'),(34,'true','true','','4'),(35,'true','true','','4'),(36,'true','true','','4'),(37,'true','true','','4'),(38,'true','true','','4'),(39,'true','true','','3'),(40,'true','true','','3'),(41,'true','true','','3'),(42,'true','true','','3'),(43,'true','true','','3'),(44,'true','true','','3'),(45,'true','true','','3'),(46,'true','true','','3'),(47,'true','true','','3'),(48,'true','true','','3'),(49,'true','true','','3'),(50,'true','true','','3'),(51,'true','true','','3'),(52,'true','true','','3');
/*!40000 ALTER TABLE `wed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'myDB'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-13 13:32:38
