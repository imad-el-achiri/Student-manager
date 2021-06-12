-- MySQL dump 10.13  Distrib 8.0.24, for Linux (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Annonce`
--

DROP TABLE IF EXISTS `Annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `annonce` text,
  `id_etudiant` int DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_etudiant` (`id_etudiant`),
  CONSTRAINT `Annonce_ibfk_2` FOREIGN KEY (`id_etudiant`) REFERENCES `users_Al_Khawarizmi` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Annonce`
--

LOCK TABLES `Annonce` WRITE;
/*!40000 ALTER TABLE `Annonce` DISABLE KEYS */;
/*!40000 ALTER TABLE `Annonce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absence`
--

DROP TABLE IF EXISTS `absence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_module` int DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  `heures` time DEFAULT NULL,
  `semestre` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_module` (`id_module`),
  KEY `id_cls` (`id_cls`),
  CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absence`
--

LOCK TABLES `absence` WRITE;
/*!40000 ALTER TABLE `absence` DISABLE KEYS */;
/*!40000 ALTER TABLE `absence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classe` (
  `id_cls` int NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(100) DEFAULT NULL,
  `semestre_actuel` varchar(5) DEFAULT NULL,
  `nb_etud` int DEFAULT NULL,
  `delegue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cls`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe`
--

LOCK TABLES `classe` WRITE;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` VALUES (1,'all',NULL,NULL,NULL),(2,'LSD2','S4',32,'Ithri'),(3,'LSD 2020','S5',16,'Bb'),(4,'nom_classe 2024','S3',87,'adf'),(5,'LSD 2022','M1',22,'Samir');
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `droits`
--

DROP TABLE IF EXISTS `droits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `droits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `edt` int DEFAULT NULL,
  `notes` int DEFAULT NULL,
  `annonce` int DEFAULT NULL,
  `module` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  `creer_classe` int DEFAULT NULL,
  `creer_compte` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_cls` (`id_cls`),
  CONSTRAINT `droits_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_Al_Khawarizmi` (`id_usr`),
  CONSTRAINT `droits_ibfk_2` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `droits`
--

LOCK TABLES `droits` WRITE;
/*!40000 ALTER TABLE `droits` DISABLE KEYS */;
/*!40000 ALTER TABLE `droits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edt`
--

DROP TABLE IF EXISTS `edt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cls` int DEFAULT NULL,
  `chemin` text,
  `upload_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cls` (`id_cls`),
  CONSTRAINT `edt_ibfk_1` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edt`
--

LOCK TABLES `edt` WRITE;
/*!40000 ALTER TABLE `edt` DISABLE KEYS */;
INSERT INTO `edt` VALUES (7,2,'https://um6p-my.sharepoint.com/personal/hassan_machkour_um6p_ma/_layouts/15/Doc.aspx?sourcedoc={76238248-be72-432a-8f4e-677f521b35a7}&action=embedview&wdAllowInteractivity=False&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True','Saturday, 12/06/2021 à 00:18');
/*!40000 ALTER TABLE `edt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `id_module` int NOT NULL AUTO_INCREMENT,
  `nom_module` varchar(30) DEFAULT NULL,
  `id_prof` int DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  PRIMARY KEY (`id_module`),
  KEY `id_cls` (`id_cls`),
  KEY `id_prof` (`id_prof`),
  CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`),
  CONSTRAINT `module_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `users_Al_Khawarizmi` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_module` int DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  `note` float DEFAULT NULL,
  `semestre` varchar(5) DEFAULT NULL,
  `id_etudiant` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_module` (`id_module`),
  KEY `id_cls` (`id_cls`),
  KEY `id_etudiant` (`id_etudiant`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`),
  CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`id_etudiant`) REFERENCES `users_Al_Khawarizmi` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_Al_Khawarizmi`
--

DROP TABLE IF EXISTS `users_Al_Khawarizmi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_Al_Khawarizmi` (
  `id_usr` int NOT NULL AUTO_INCREMENT,
  `E_mail` varchar(120) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `fonction` enum('Etudiant','Responsable','prof') DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `photo_personnel` varchar(100) DEFAULT NULL,
  `id_cls` int DEFAULT NULL,
  `Genre` enum('F','M') DEFAULT NULL,
  `num` varchar(20) DEFAULT NULL,
  `adr` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_usr`),
  KEY `users_Al_Khawarizmi_ibfk_1` (`id_cls`),
  CONSTRAINT `users_Al_Khawarizmi_ibfk_1` FOREIGN KEY (`id_cls`) REFERENCES `classe` (`id_cls`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_Al_Khawarizmi`
--

LOCK TABLES `users_Al_Khawarizmi` WRITE;
/*!40000 ALTER TABLE `users_Al_Khawarizmi` DISABLE KEYS */;
INSERT INTO `users_Al_Khawarizmi` VALUES (1,'imad.elachiri@um6p.ma','El Achiri','Imad','Responsable','1234',NULL,NULL,'M',NULL,NULL);
/*!40000 ALTER TABLE `users_Al_Khawarizmi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-12 17:04:29
