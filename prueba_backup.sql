-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1-log

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
-- Table structure for table `clasificaciones`
--

DROP TABLE IF EXISTS `clasificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `fondos_id` int(11) NOT NULL,
  `usuarios_carga_id` int(11) NOT NULL,
  `fecha_carga_id` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clasificaciones_fondos1_idx` (`fondos_id`),
  CONSTRAINT `fk_clasificaciones_fondos1` FOREIGN KEY (`fondos_id`) REFERENCES `fondos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones`
--

LOCK TABLES `clasificaciones` WRITE;
/*!40000 ALTER TABLE `clasificaciones` DISABLE KEYS */;
INSERT INTO `clasificaciones` VALUES (1,'Pieza Aborigen',1,1,'2010-12-05');
/*!40000 ALTER TABLE `clasificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donaciones`
--

DROP TABLE IF EXISTS `donaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donantes_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_donacion` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donaciones_donantes1_idx` (`donantes_id`),
  KEY `fk_donaciones_piezas1_idx` (`piezas_id`),
  CONSTRAINT `fk_donaciones_donantes1` FOREIGN KEY (`donantes_id`) REFERENCES `donantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donaciones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donaciones`
--

LOCK TABLES `donaciones` WRITE;
/*!40000 ALTER TABLE `donaciones` DISABLE KEYS */;
INSERT INTO `donaciones` VALUES (1,1,1,'2015-01-01');
/*!40000 ALTER TABLE `donaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donantes`
--

DROP TABLE IF EXISTS `donantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `fecha_carga` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donantes_personas_idx` (`personas_id`),
  CONSTRAINT `fk_donantes_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donantes`
--

LOCK TABLES `donantes` WRITE;
/*!40000 ALTER TABLE `donantes` DISABLE KEYS */;
INSERT INTO `donantes` VALUES (1,2,'2015-09-30');
/*!40000 ALTER TABLE `donantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondos`
--

DROP TABLE IF EXISTS `fondos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `fecha_carga_fondo` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fondos_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_fondos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondos`
--

LOCK TABLES `fondos` WRITE;
/*!40000 ALTER TABLE `fondos` DISABLE KEYS */;
INSERT INTO `fondos` VALUES (1,'unFondo',1,'2015-10-19');
/*!40000 ALTER TABLE `fondos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `piezas_id` int(11) NOT NULL,
  `fotos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fotos_piezas1_idx` (`piezas_id`),
  CONSTRAINT `fk_fotos_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (1,1,0);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_Museo`
--

DROP TABLE IF EXISTS `log_Museo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_Museo` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `operacion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `tabla_modificada` char(30) NOT NULL,
  `columnas_modificadas` char(200) NOT NULL,
  `datos_viejos` char(200) NOT NULL,
  `datos _nuevos` char(200) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_log_usuarios1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_Museo`
--

LOCK TABLES `log_Museo` WRITE;
/*!40000 ALTER TABLE `log_Museo` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_Museo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(30) NOT NULL,
  `cuit_cuil` varchar(13) NOT NULL,
  `telefono` int(15) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_carga_persona` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuit_cuil_UNIQUE` (`cuit_cuil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Adrian Arias','20-25448798-4',2147483647,'Corrientes 455','djfkld@gmail.com','2015-09-17'),(2,'Pepe Pipon','20-22222222-3',2147483647,'Su Calle 111','Sumail@yahoo.com.ar','2015-01-01');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `mydb`.`personas_AFTER_INSERT` AFTER INSERT ON `personas` FOR EACH ROW
BEGIN
	INSERT INTO log_Museo (id, usuarios_id, operacion, fecha, tabla_modificada, columnas_modificadas, datos_viejos, datos_nuevos)
	VALUES (null, id, 'INSERT', now(), 'personas',CONCAT(id,'', nombre,'', cuit_cuil,'', telefono,'', domicilio,'', email,'', fecha_carga_persona),
			'Primera carga de Persona - No existen datos anteriores',
            CONCAT(NEW.id,'-', NEW.nombre,'-', NEW.cuit_cuil,'-', NEW.telefono,'-', NEW.domicilio,'-', NEW.email,'-', NEW.fecha_carga_persona));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `piezas`
--

DROP TABLE IF EXISTS `piezas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piezas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(100) NOT NULL,
  `clasificaciones_id` int(11) NOT NULL,
  `procedencia` char(50) NOT NULL,
  `autor` char(30) NOT NULL,
  `fecha_ejecucion` date NOT NULL,
  `tema` char(50) NOT NULL,
  `observacion` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas`
--

LOCK TABLES `piezas` WRITE;
/*!40000 ALTER TABLE `piezas` DISABLE KEYS */;
INSERT INTO `piezas` VALUES (1,'Punta de Flecha',1,'Paso de Indios','Pepe','1978-01-01','Cultura','Estado Parcial');
/*!40000 ALTER TABLE `piezas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `mydb`.`piezas_BEFORE_DELETE` BEFORE DELETE ON `piezas` 
FOR EACH ROW
BEGIN
	IF EXISTS (SELECT id FROM piezas
		WHERE (OLD.id) = id)
        THEN SIGNAL sqlstate '45000'
        SET message_text = 'La pieza no existe en la base de datos';
    ELSE
		INSERT INTO log_Museo (id, usuarios_id, operacion, fecha, tabla_modificada, columnas_modificadas, datos_viejos, datos_nuevos)
		VALUES (null, user(), 'DELETE', now(), 'piezas',CONCAT(id,'', descripcion,'', clasificaciones_id,'', procedencia,'', autor,'', fecha_ejecucion,'', tema,'',observacion),
			   CONCAT(OLD.id,'-', OLD.descripcion,'-', OLD.clasificaciones_id,'-', OLD.procedencia,'-', OLD.autor,'-', OLD.fecha_ejecucion,'-', OLD.tema,'',OLD.observacion),
				'Pieza eliminada en la base de datos');
    END IF;        
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `revisiones`
--

DROP TABLE IF EXISTS `revisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_revision_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_revision` date NOT NULL,
  `estado_de_conservacion` char(1) NOT NULL,
  `ubicacion` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revisiones_usuarios1_idx` (`usuarios_revision_id`),
  KEY `fk_revisiones_piezas1_idx` (`piezas_id`),
  CONSTRAINT `fk_revisiones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_revisiones_usuarios1` FOREIGN KEY (`usuarios_revision_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisiones`
--

LOCK TABLES `revisiones` WRITE;
/*!40000 ALTER TABLE `revisiones` DISABLE KEYS */;
INSERT INTO `revisiones` VALUES (1,1,1,'2015-10-20','D','d');
/*!40000 ALTER TABLE `revisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `nombre_usuario` char(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_personas1_idx` (`personas_id`),
  CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'Dongato','Dongato123');
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

-- Dump completed on 2015-11-19 16:46:16
