-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_GestionCommerciale
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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

/*** Création de la base de données ***/

CREATE DATABASE `db_GestionCommerciale`;

--
-- Table structure for table `GC_Categorie`
--


DROP TABLE IF EXISTS `GC_Categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GC_Categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GC_Categorie`
--

LOCK TABLES `GC_Categorie` WRITE;
/*!40000 ALTER TABLE `GC_Categorie` DISABLE KEYS */;
INSERT INTO `GC_Categorie` VALUES (1,'Informatique','INFO'),(2,'Smart Phone','SP'),(3,'Console','CONS'),(4,'Téléphonie','TEL');
/*!40000 ALTER TABLE `GC_Categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GC_Produit`
--

DROP TABLE IF EXISTS `GC_Produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GC_Produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categorieId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorieId` (`categorieId`),
  CONSTRAINT `GC_Produit_ibfk_1` FOREIGN KEY (`categorieId`) REFERENCES `GC_Categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GC_Produit`
--

LOCK TABLES `GC_Produit` WRITE;
/*!40000 ALTER TABLE `GC_Produit` DISABLE KEYS */;
INSERT INTO `GC_Produit` VALUES (1,'PC HP - Envy','Processus i7 3.40Ghz, 1TO, NvidiaGTX4100',1),(2,'S4 - Mini','smartphone 3D Samsung',2),(3,'Xbox 360','la nouvelle Xbox 360',3),(4,'PS4','la dernière PS4 neuf',3),(5,'iMAC i5','la nouvelle Xbox 360 en très bon état',1),(6,'LG X584','Télévision 81cm LED',2),(7,'Booter','le meilleur booster du monde',3),(8,'LG X584','la nouvelle Xbox 360 en très bon état',1),(9,'Xbox 360','la nouvelle Xbox 360 en très bon état',2),(10,'iMAC i5','aa',3),(11,'Booter','la nouvelle Xbox 360',4),(12,'Booter','Télévision 81cm LED',2),(13,'PS4','la nouvelle Xbox 360',2);
/*!40000 ALTER TABLE `GC_Produit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-24 22:57:48
