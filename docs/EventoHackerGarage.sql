-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: EventosHackerGarage
-- ------------------------------------------------------
-- Server version	5.5.24-5

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Conferencia'),(2,'Convivencia'),(3,'Curso');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `creadoPor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rutaFlyer` varchar(45) NOT NULL,
  `descripcion` varchar(4500) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `fechaEvento` date NOT NULL,
  `fechaCreacion` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `categoria` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idevento`),
  KEY `creadoPor` (`creadoPor`),
  KEY `categoria` (`categoria`),
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `creadoPor` FOREIGN KEY (`creadoPor`) REFERENCES `usuario` (`twitter`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(2,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(3,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(4,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(5,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(6,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(7,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'0000-00-00','0000-00-00','PENDIENTE',3,NULL),(8,1,'odjsdsfjdkjfkd','','sasjdf fdjhfdjfdos dsdsj',15,-1,'2012-10-15','2012-11-12','PENDIENTE',3,NULL),(9,1,'knkjjijhuhjoko','','jhhjijikjioj ij jjjhuynbhbhhggy',15,-1,'2012-11-29','2012-11-12','PENDIENTE',3,NULL);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `twitter` int(11) NOT NULL,
  `token_twitter` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`twitter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'1',1),(2,'2',0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-11 21:42:26
