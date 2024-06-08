-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: library_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `author_name` varchar(45) NOT NULL,
  `author_surname` varchar(45) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Pan Tadeusz','Adam','Mickiewicz',1834),(2,'Lalka','Bolesław','Prus',1890),(3,'Quo Vadis','Henryk','Sienkiewicz',1896),(4,'Potop','Henryk','Sienkiewicz',1886),(5,'Faraon','Bolesław','Prus',1897),(6,'Chłopi','Władysław','Reymont',1904),(7,'W pustyni i w puszczy','Henryk','Sienkiewicz',1911),(8,'Kamienie na szaniec','Aleksander','Kamiński',1943),(9,'Syzyfowe prace','Stefan','Żeromski',1897),(10,'Krzyżacy','Henryk','Sienkiewicz',1900),(11,'Dziady','Adam','Mickiewicz',1823),(12,'Nad Niemnem','Eliza','Orzeszkowa',1888),(13,'Przedwiośnie','Stefan','Żeromski',1924),(14,'Ziemia obiecana','Władysław','Reymont',1899),(15,'Granica','Zofia','Nałkowska',1935),(16,'Cesarz','Ryszard','Kapuściński',1978),(17,'Sanatorium pod Klepsydrą','Bruno','Schulz',1937),(18,'Ferdydurke','Witold','Gombrowicz',1937),(19,'Tango','Sławomir','Mrożek',1964),(20,'Mistrz i Małgorzata','Michaił','Bułhakow',1967);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-04 19:52:46
