<<<<<<< HEAD
CREATE DATABASE  IF NOT EXISTS `pmt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pmt`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pmt
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `ciudadano`
--

DROP TABLE IF EXISTS `ciudadano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudadano` (
  `DpiCiudadano` int NOT NULL,
  `Nombre` varchar(1024) NOT NULL,
  `TarjetaCirculacion` varchar(1024) NOT NULL,
  `NoPlaca` varchar(1024) NOT NULL,
  `DescripcionCarro` varchar(1024) NOT NULL,
  PRIMARY KEY (`DpiCiudadano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudadano`
--

LOCK TABLES `ciudadano` WRITE;
/*!40000 ALTER TABLE `ciudadano` DISABLE KEYS */;
INSERT INTO `ciudadano` VALUES (1122132,'Jimena Palma','23j2k3hh213h','321j213j213','Mazda Naranja'),(2223233,'Luis Mita','ewwe32','ewqe3eweds','Camaro negro fraja roja'),(213213342,'Andrea','23j2k3hh213h','xzczdsd','Mazda planco');
/*!40000 ALTER TABLE `ciudadano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrada` (
  `CodEntrada` int NOT NULL AUTO_INCREMENT,
  `Hora` time NOT NULL,
  `Fecha` date NOT NULL,
  `DpiPolicia` int NOT NULL,
  PRIMARY KEY (`CodEntrada`),
  KEY `DpiPolicia` (`DpiPolicia`),
  CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`DpiPolicia`) REFERENCES `policia` (`DPI`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES (1,'23:15:00','2024-10-17',1122132);
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multa`
--

DROP TABLE IF EXISTS `multa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multa` (
  `CodMulta` int NOT NULL AUTO_INCREMENT,
  `MontoMulta` float NOT NULL,
  `TipoMulta` int NOT NULL,
  `DescripcionMulta` varchar(1024) NOT NULL,
  `DpiCiudadano` int NOT NULL,
  PRIMARY KEY (`CodMulta`),
  KEY `TipoMulta` (`TipoMulta`),
  KEY `DpiCiudadano` (`DpiCiudadano`),
  CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`TipoMulta`) REFERENCES `tipomulta` (`CodTipoMulta`) ON DELETE CASCADE,
  CONSTRAINT `multa_ibfk_2` FOREIGN KEY (`DpiCiudadano`) REFERENCES `ciudadano` (`DpiCiudadano`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multa`
--

LOCK TABLES `multa` WRITE;
/*!40000 ALTER TABLE `multa` DISABLE KEYS */;
INSERT INTO `multa` VALUES (1,230,1,'Iba mas de 350km/h',2223233);
/*!40000 ALTER TABLE `multa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policia`
--

DROP TABLE IF EXISTS `policia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `policia` (
  `DPI` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Edad` int NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`DPI`)
) ENGINE=InnoDB AUTO_INCREMENT=1122133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policia`
--

LOCK TABLES `policia` WRITE;
/*!40000 ALTER TABLE `policia` DISABLE KEYS */;
INSERT INTO `policia` VALUES (1122132,'Vivian','Garcia',20,'Palin');
/*!40000 ALTER TABLE `policia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salida` (
  `CodSalida` int NOT NULL AUTO_INCREMENT,
  `Hora` time NOT NULL,
  `fecha` date NOT NULL,
  `DpiPolicia` int NOT NULL,
  PRIMARY KEY (`CodSalida`),
  KEY `DpiPolicia` (`DpiPolicia`),
  CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`DpiPolicia`) REFERENCES `policia` (`DPI`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
INSERT INTO `salida` VALUES (1,'12:57:00','2024-11-01',1122132);
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipomulta`
--

DROP TABLE IF EXISTS `tipomulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipomulta` (
  `CodTipoMulta` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  PRIMARY KEY (`CodTipoMulta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipomulta`
--

LOCK TABLES `tipomulta` WRITE;
/*!40000 ALTER TABLE `tipomulta` DISABLE KEYS */;
INSERT INTO `tipomulta` VALUES (1,'Exceso de Velocidad','Multa por conducir a una velocidad superior al límite permitido.'),(2,'Conducción Bajo Efectos','Multa por conducir bajo los efectos del alcohol o drogas.'),(3,'Estacionamiento Prohibido','Multa por estacionarse en lugares no permitidos.'),(4,'Uso del Teléfono Móvil','Multa por usar el teléfono móvil mientras se conduce.');
/*!40000 ALTER TABLE `tipomulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan Pérez','juanp','miContrasenaSegura123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-01 23:48:40
=======
CREATE DATABASE  IF NOT EXISTS `pmt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pmt`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pmt
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `ciudadano`
--

DROP TABLE IF EXISTS `ciudadano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudadano` (
  `DpiCiudadano` int NOT NULL,
  `Nombre` varchar(1024) NOT NULL,
  `TarjetaCirculacion` varchar(1024) NOT NULL,
  `NoPlaca` varchar(1024) NOT NULL,
  `DescripcionCarro` varchar(1024) NOT NULL,
  PRIMARY KEY (`DpiCiudadano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudadano`
--

LOCK TABLES `ciudadano` WRITE;
/*!40000 ALTER TABLE `ciudadano` DISABLE KEYS */;
INSERT INTO `ciudadano` VALUES (1122132,'Jimena Palma','23j2k3hh213h','321j213j213','Mazda Naranja'),(2223233,'Luis Mita','ewwe32','ewqe3eweds','Camaro negro fraja roja'),(213213342,'Andrea','23j2k3hh213h','xzczdsd','Mazda planco');
/*!40000 ALTER TABLE `ciudadano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrada` (
  `CodEntrada` int NOT NULL AUTO_INCREMENT,
  `Hora` time NOT NULL,
  `Fecha` date NOT NULL,
  `DpiPolicia` int NOT NULL,
  PRIMARY KEY (`CodEntrada`),
  KEY `DpiPolicia` (`DpiPolicia`),
  CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`DpiPolicia`) REFERENCES `policia` (`DPI`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES (1,'23:15:00','2024-10-17',1122132);
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multa`
--

DROP TABLE IF EXISTS `multa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multa` (
  `CodMulta` int NOT NULL AUTO_INCREMENT,
  `MontoMulta` float NOT NULL,
  `TipoMulta` int NOT NULL,
  `DescripcionMulta` varchar(1024) NOT NULL,
  `DpiCiudadano` int NOT NULL,
  PRIMARY KEY (`CodMulta`),
  KEY `TipoMulta` (`TipoMulta`),
  KEY `DpiCiudadano` (`DpiCiudadano`),
  CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`TipoMulta`) REFERENCES `tipomulta` (`CodTipoMulta`) ON DELETE CASCADE,
  CONSTRAINT `multa_ibfk_2` FOREIGN KEY (`DpiCiudadano`) REFERENCES `ciudadano` (`DpiCiudadano`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multa`
--

LOCK TABLES `multa` WRITE;
/*!40000 ALTER TABLE `multa` DISABLE KEYS */;
INSERT INTO `multa` VALUES (1,230,1,'Iba mas de 350km/h',2223233);
/*!40000 ALTER TABLE `multa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policia`
--

DROP TABLE IF EXISTS `policia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `policia` (
  `DPI` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Edad` int NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`DPI`)
) ENGINE=InnoDB AUTO_INCREMENT=1122133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policia`
--

LOCK TABLES `policia` WRITE;
/*!40000 ALTER TABLE `policia` DISABLE KEYS */;
INSERT INTO `policia` VALUES (1122132,'Vivian','Garcia',20,'Palin');
/*!40000 ALTER TABLE `policia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salida` (
  `CodSalida` int NOT NULL AUTO_INCREMENT,
  `Hora` time NOT NULL,
  `fecha` date NOT NULL,
  `DpiPolicia` int NOT NULL,
  PRIMARY KEY (`CodSalida`),
  KEY `DpiPolicia` (`DpiPolicia`),
  CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`DpiPolicia`) REFERENCES `policia` (`DPI`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
INSERT INTO `salida` VALUES (1,'12:57:00','2024-11-01',1122132);
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipomulta`
--

DROP TABLE IF EXISTS `tipomulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipomulta` (
  `CodTipoMulta` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  PRIMARY KEY (`CodTipoMulta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipomulta`
--

LOCK TABLES `tipomulta` WRITE;
/*!40000 ALTER TABLE `tipomulta` DISABLE KEYS */;
INSERT INTO `tipomulta` VALUES (1,'Exceso de Velocidad','Multa por conducir a una velocidad superior al límite permitido.'),(2,'Conducción Bajo Efectos','Multa por conducir bajo los efectos del alcohol o drogas.'),(3,'Estacionamiento Prohibido','Multa por estacionarse en lugares no permitidos.'),(4,'Uso del Teléfono Móvil','Multa por usar el teléfono móvil mientras se conduce.');
/*!40000 ALTER TABLE `tipomulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan Pérez','juanp','miContrasenaSegura123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-01 23:48:40
>>>>>>> f96a17f6721ab40d107e0d3abac79a6e20b5680d
