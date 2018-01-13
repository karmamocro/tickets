CREATE DATABASE  IF NOT EXISTS `ticketsysteem` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ticketsysteem`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ticketsysteem
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `bijlages`
--

DROP TABLE IF EXISTS `bijlages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bijlages` (
  `idbijlages` int(11) NOT NULL AUTO_INCREMENT,
  `ticketfk` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `tijd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idbijlages`),
  UNIQUE KEY `idbijlages_UNIQUE` (`idbijlages`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bijlages`
--

LOCK TABLES `bijlages` WRITE;
/*!40000 ALTER TABLE `bijlages` DISABLE KEYS */;
/*!40000 ALTER TABLE `bijlages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reacties`
--

DROP TABLE IF EXISTS `reacties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reacties` (
  `idreacties` int(11) NOT NULL AUTO_INCREMENT,
  `ticketfk` varchar(45) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `bericht` text NOT NULL,
  `tijd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idreacties`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reacties`
--

LOCK TABLES `reacties` WRITE;
/*!40000 ALTER TABLE `reacties` DISABLE KEYS */;
/*!40000 ALTER TABLE `reacties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `idtickets` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `onderwerp` varchar(100) NOT NULL,
  `bericht` text NOT NULL,
  `prioriteit` int(1) NOT NULL,
  `tijd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`idtickets`),
  UNIQUE KEY `idtickets_UNIQUE` (`idtickets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-18 11:23:09
