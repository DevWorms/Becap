-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: becap_db
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `beca_favorito`
--

DROP TABLE IF EXISTS `beca_favorito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beca_favorito` (
  `id_favorito` int(7) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(7) NOT NULL,
  `id_beca` int(7) NOT NULL,
  PRIMARY KEY (`id_favorito`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_beca` (`id_beca`),
  CONSTRAINT `beca_favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beca_favorito_ibfk_2` FOREIGN KEY (`id_beca`) REFERENCES `becas` (`ID_Beca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beca_favorito`
--

LOCK TABLES `beca_favorito` WRITE;
/*!40000 ALTER TABLE `beca_favorito` DISABLE KEYS */;
/*!40000 ALTER TABLE `beca_favorito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beca_interesa`
--

DROP TABLE IF EXISTS `beca_interesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beca_interesa` (
  `id_interesa` int(7) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(7) NOT NULL,
  `id_beca` int(7) NOT NULL,
  PRIMARY KEY (`id_interesa`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_beca` (`id_beca`),
  CONSTRAINT `beca_interesa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beca_interesa_ibfk_2` FOREIGN KEY (`id_beca`) REFERENCES `becas` (`ID_Beca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beca_interesa`
--

LOCK TABLES `beca_interesa` WRITE;
/*!40000 ALTER TABLE `beca_interesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `beca_interesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `becas`
--

DROP TABLE IF EXISTS `becas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `becas` (
  `ID_Beca` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Beca` varchar(250) DEFAULT NULL,
  `ID_Tipo` int(11) NOT NULL,
  `ID_Escuela` int(11) DEFAULT NULL,
  `Nivel_Estudio` varchar(30) DEFAULT NULL,
  `Estatus_Alumno` varchar(50) DEFAULT NULL,
  `Promedio_Acceso` varchar(100) DEFAULT NULL,
  `Promedio_Mantener` varchar(100) DEFAULT NULL,
  `Estudio_Socioeco` tinyint(1) DEFAULT NULL,
  `Examen_Admision` varchar(100) DEFAULT NULL,
  `Puntaje` varchar(100) DEFAULT NULL,
  `Examen_Idiomas` varchar(100) DEFAULT NULL,
  `Puntuaje_Idiomas` varchar(100) DEFAULT NULL,
  `Descripcion_Beca` varchar(300) DEFAULT NULL,
  `Requisitos_Espe` varchar(300) DEFAULT NULL,
  `Contacto` varchar(300) DEFAULT NULL,
  `Telefono` varchar(300) DEFAULT NULL,
  `Link_Beca` varchar(300) DEFAULT NULL,
  `Porcentaje_Beca` varchar(100) DEFAULT NULL,
  `Porcentaje_Credito` varchar(100) DEFAULT NULL,
  `Tasa_Interes` varchar(100) DEFAULT NULL,
  `Nom_Descriptivo` varchar(40) DEFAULT NULL,
  `Beca_Sobre` varchar(255) DEFAULT NULL,
  `Requiere_Promedio` tinyint(1) DEFAULT NULL,
  `Ingresos_Comprobar` varchar(255) DEFAULT NULL,
  `Requiere_Examen` tinyint(1) DEFAULT NULL,
  `Requiere_Idiomas` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_Beca`),
  KEY `ID_Escuela_idx` (`ID_Escuela`),
  KEY `id_tipo` (`ID_Tipo`),
  CONSTRAINT `ID_Escuela` FOREIGN KEY (`ID_Escuela`) REFERENCES `escuelas` (`ID_Escuela`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `becas_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_beca` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `becas`
--

LOCK TABLES `becas` WRITE;
/*!40000 ALTER TABLE `becas` DISABLE KEYS */;
/*!40000 ALTER TABLE `becas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras_usuario`
--

DROP TABLE IF EXISTS `carreras_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras_usuario` (
  `id_registro` int(7) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(7) NOT NULL,
  `admin` int(2) DEFAULT NULL,
  `aboga` int(2) DEFAULT NULL,
  `psico` int(2) DEFAULT NULL,
  `conta` int(2) DEFAULT NULL,
  `econo` int(2) DEFAULT NULL,
  `finan` int(2) DEFAULT NULL,
  `arthu` int(2) DEFAULT NULL,
  `arqui` int(2) DEFAULT NULL,
  `ingen` int(2) DEFAULT NULL,
  `disin` int(2) DEFAULT NULL,
  `ensen` int(2) DEFAULT NULL,
  `medic` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `carreras_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras_usuario`
--

LOCK TABLES `carreras_usuario` WRITE;
/*!40000 ALTER TABLE `carreras_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `carreras_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuelas`
--

DROP TABLE IF EXISTS `escuelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escuelas` (
  `ID_Escuela` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Escuela` varchar(255) NOT NULL,
  `Nombre_Campus` varchar(255) DEFAULT NULL,
  `Descripcion_Escuela` varchar(300) DEFAULT NULL,
  `ID_Pais` varchar(10) NOT NULL,
  `Tipo_Institucion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Escuela`),
  KEY `ID_Pais_idx` (`ID_Pais`),
  CONSTRAINT `ID_Pais` FOREIGN KEY (`ID_Pais`) REFERENCES `paises` (`ID_Pais`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuelas`
--

LOCK TABLES `escuelas` WRITE;
/*!40000 ALTER TABLE `escuelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `escuelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `ID_Pais` varchar(10) NOT NULL,
  `Nombre_Pais` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Pais`),
  UNIQUE KEY `ID_Pais_UNIQUE` (`ID_Pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `promedio` int(11) NOT NULL DEFAULT '0',
  `acta` int(11) NOT NULL DEFAULT '0',
  `examen` int(11) NOT NULL DEFAULT '0',
  `toefl` int(11) NOT NULL DEFAULT '0',
  `kardex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_beca`
--

DROP TABLE IF EXISTS `tipo_beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_beca` (
  `id_tipo` int(7) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(70) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_beca`
--

LOCK TABLES `tipo_beca` WRITE;
/*!40000 ALTER TABLE `tipo_beca` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_beca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Usuario` varchar(80) DEFAULT NULL,
  `Apellidos_Usuario` varchar(150) DEFAULT NULL,
  `Mail_Usuario` varchar(255) DEFAULT NULL,
  `Pwd_Usuario` varchar(255) NOT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Pais` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Estudia` tinyint(1) DEFAULT NULL,
  `Nombre_Posgrado` varchar(200) DEFAULT NULL,
  `Promedio_Pos` varchar(5) DEFAULT NULL,
  `Nombre_Universidad` varchar(200) DEFAULT NULL,
  `Promedio_Uni` varchar(5) DEFAULT NULL,
  `Nombre_Prepa` varchar(100) DEFAULT NULL,
  `Promedio_Prepa` varchar(5) DEFAULT NULL,
  `Nombre_Secundaria` varchar(100) DEFAULT NULL,
  `Promedio_Secundaria` varchar(5) DEFAULT NULL,
  `Telefono_contacto` varchar(100) DEFAULT NULL,
  `tipo_beca` int(7) DEFAULT NULL,
  PRIMARY KEY (`ID_Usuario`,`Pwd_Usuario`),
  KEY `tipo_beca` (`tipo_beca`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_beca`) REFERENCES `tipo_beca` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
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

-- Dump completed on 2017-06-06  1:08:06
