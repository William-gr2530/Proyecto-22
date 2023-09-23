-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: sifarisdb
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `analisis`
--

DROP TABLE IF EXISTS `analisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analisis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idexamen` bigint unsigned NOT NULL,
  `idpaciente` bigint unsigned NOT NULL,
  `idmedico` bigint unsigned NOT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `descuento` varchar(50) DEFAULT NULL,
  `Resultado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpaciente` (`idpaciente`),
  KEY `idmedico` (`idmedico`),
  KEY `idexamen` (`idexamen`),
  CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`id`),
  CONSTRAINT `analisis_ibfk_2` FOREIGN KEY (`idmedico`) REFERENCES `medico` (`id`),
  CONSTRAINT `analisis_ibfk_3` FOREIGN KEY (`idexamen`) REFERENCES `examen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
INSERT INTO `analisis` VALUES (2,4,8,5,'22/09/2023 07:21 ','20','En proceso'),(3,1,13,3,'22/09/2023 07:32 ','15','En proceso'),(6,4,8,5,'22/09/2023 08:21 ','15','fin');
/*!40000 ALTER TABLE `analisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tipoexamen` varchar(100) DEFAULT NULL,
  `precio` decimal(7,2) NOT NULL,
  `tipomuestra` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `examen_chk_1` CHECK ((`precio` > 0))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (1,'glucosa','Fluidos corporales',3.50,'Sangre completa'),(4,'colesterol','Fluidos corporales',5.20,'Sangre completa');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `espe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (3,'abigail   ',41526321,'abigail.gmail.com','local 87','psicologa'),(5,'jorge',4536210,'jorge2536@gmail.com','desconosida','nutriologo'),(6,'carlos',25366366,'caorlos@gmail.com','desconosida','general'),(7,'javier lopez',14253645,'javier@gamil.com','desconosida','general');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `dui` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (6,'william  ',26,36336,'tere','sadsa',366366),(8,'pedro  ',35,14253636,'juan','kkkkkk',123456),(11,'juan   ',45,142536,'carlos','gggg',121345),(13,'eduardo',21,14253698,'juan','ffffffff',1254366),(14,'tttttttt  ',47,44444444,'ttttt','sssssss',111);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `IdUsuario` varchar(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `tipoDocumento` varchar(25) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `estadoUsuario` varchar(15) NOT NULL,
  `telefonoUsuario` varchar(15) NOT NULL,
  `direccionUsuario` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('011173507','pedro','Dui','321','Activo','828727','Barrio San Antonio Ilobasco','Especialista'),('1414','William','Dui','123','Activo','712121','San lorenso','Administrador'),('445564','abigail','Pasaporte','123','Activo','1236321','San lorenso','Recepcionista');
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

-- Dump completed on 2023-09-22 20:34:59
