-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2015 at 12:02 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `MuseoSalesiano`
--

-- --------------------------------------------------------

--
-- Table structure for table `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `fondos_id` int(11) NOT NULL,
  `usuarios_carga_id` int(11) NOT NULL,
  `fecha_carga_id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clasificaciones_fondos1_idx` (`fondos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `descripcion`, `fondos_id`, `usuarios_carga_id`, `fecha_carga_id`, `updated_at`, `created_at`) VALUES
(1, 'Pieza Aborigen', 1, 1, '2010-12-05 03:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donaciones`
--

CREATE TABLE IF NOT EXISTS `donaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donantes_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_donacion` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donaciones_donantes1_idx` (`donantes_id`),
  KEY `fk_donaciones_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donaciones`
--

INSERT INTO `donaciones` (`id`, `donantes_id`, `piezas_id`, `fecha_donacion`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2015-01-01 03:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donantes`
--

CREATE TABLE IF NOT EXISTS `donantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `fecha_carga` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donantes_personas_idx` (`personas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donantes`
--

INSERT INTO `donantes` (`id`, `personas_id`, `fecha_carga`, `updated_at`, `created_at`) VALUES
(1, 2, '2015-09-30 03:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fondos`
--

CREATE TABLE IF NOT EXISTS `fondos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `fecha_carga_fondo` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fondos_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fondos`
--

INSERT INTO `fondos` (`id`, `descripcion`, `usuarios_id`, `fecha_carga_fondo`, `updated_at`, `created_at`) VALUES
(1, 'unFondo', 1, '2015-10-19 03:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `piezas_id` int(11) NOT NULL,
  `fotos_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fotos_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `piezas_id`, `fotos_id`, `updated_at`, `created_at`) VALUES
(1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_Museo`
--

CREATE TABLE IF NOT EXISTS `log_Museo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `operacion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `tabla_modificada` char(30) NOT NULL,
  `columnas_modificadas` char(200) NOT NULL,
  `datos_viejos` char(200) NOT NULL,
  `datos_nuevos` char(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_log_usuarios1` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `log_Museo`
--

INSERT INTO `log_Museo` (`id`, `usuarios_id`, `operacion`, `fecha`, `tabla_modificada`, `columnas_modificadas`, `datos_viejos`, `datos_nuevos`) VALUES
(1, 1, 'INSERT', '2015-11-03 23:06:59', 'personas', 'id,nombre, cuit_cuil, telefono, domicilio, email, fecha_carga_persona', 'Primera carga de Persona - No existen datos anteriores', 'adrian-11555555557-4425878-adsjfh jadf 173-adfafd@yahoo.com-2014-12-01'),
(6, 1, 'INSERT', '2015-11-04 09:39:43', 'personas', 'id,nombre, cuit_cuil, telefono, domicilio, email, fecha_carga_persona', 'Primera carga de Persona - No existen datos anteriores', 'Miguel Angel-11222223338-4444444-su calle-SuMail@yahoo.com-2015-11-04 09:39:43'),
(7, 1, 'INSERT', '2015-11-04 09:40:49', 'personas', 'id,nombre, cuit_cuil, telefono, domicilio, email, fecha_carga_persona', 'Primera carga de Persona - No existen datos anteriores', 'Matias Ale-11456786788-11425145-Buenos Aires 145-Toyloco@gmail.com-2015-11-04 09:40:49'),
(8, 1, 'INSERT', '2015-11-09 15:23:13', 'personas', 'id,nombre, cuit_cuil, telefono, domicilio, email, fecha_carga_persona', 'Primera carga de Persona - No existen datos anteriores', 'Juan Roman Riquelme-11356487453-11412568-Tierra del Fuego 543-JJRiquelme@yahoo.com.ar-2015-11-09 15:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` char(13) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `rol`, `updated_at`, `created_at`) VALUES
(1, 'administrador', NULL, NULL),
(2, 'operador', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(30) NOT NULL,
  `cuit_cuil` varchar(13) NOT NULL,
  `telefono` int(15) unsigned NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_carga_persona` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuit_cuil_UNIQUE` (`cuit_cuil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `cuit_cuil`, `telefono`, `domicilio`, `email`, `fecha_carga_persona`, `updated_at`, `created_at`) VALUES
(1, 'Adrian Arias', '20-25448798-4', 2804456897, 'Corrientes 455', 'djfkld@gmail.com', '2015-09-17 03:00:00', NULL, NULL),
(2, 'Pepe Pipon', '20-22222222-3', 2804111111, 'Su Calle 111', 'Sumail@yahoo.com.ar', '2015-01-01 03:00:00', NULL, NULL),
(7, 'Juan Perez', '', 4578798, '', 'fiambrin@gmail', '2015-11-04 12:39:43', '2015-11-06 22:58:36', '2015-11-04 15:39:43'),
(8, 'Matias Ale', '11456786788', 11425145, 'Buenos Aires 145', 'Toyloco@gmail.com', '2015-11-04 12:40:49', '2015-11-04 15:40:49', '2015-11-04 15:40:49'),
(9, 'Juan Román Riquelme', '11356487453', 11412568, 'Tierra del Fuego 543', 'JJRiquelme@yahoo.com.ar', '2015-11-09 18:23:13', '2015-11-09 21:23:34', '2015-11-09 21:23:13');

--
-- Triggers `personas`
--
DROP TRIGGER IF EXISTS `personas_AFTER_INSERT`;
DELIMITER //
CREATE TRIGGER `personas_AFTER_INSERT` AFTER INSERT ON `personas`
 FOR EACH ROW BEGIN
INSERT INTO log_Museo (
        id,
    usuarios_id,
    operacion,
    fecha,
    tabla_modificada,
    columnas_modificadas,
    datos_viejos,
    datos_nuevos)
	VALUES (null,
			1, 
            'INSERT',
            now(),
            'personas',
            'id,nombre, cuit_cuil, telefono, domicilio, email, fecha_carga_persona',
			'Primera carga de Persona - No existen datos anteriores',
            CONCAT(
            NEW.nombre,'-',
            NEW.cuit_cuil,'-',
            NEW.telefono,'-',
            NEW.domicilio,'-',
            NEW.email,'-',
 NEW.fecha_carga_persona));
		
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `piezas`
--

CREATE TABLE IF NOT EXISTS `piezas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(100) NOT NULL,
  `clasificaciones_id` int(11) NOT NULL,
  `procedencia` char(50) NOT NULL,
  `autor` char(30) NOT NULL,
  `fecha_ejecucion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tema` char(50) NOT NULL,
  `observacion` char(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `piezas`
--

INSERT INTO `piezas` (`id`, `descripcion`, `clasificaciones_id`, `procedencia`, `autor`, `fecha_ejecucion`, `tema`, `observacion`, `updated_at`, `created_at`) VALUES
(1, 'Punta de Flecha', 1, 'Paso de Indios', 'Pepe', '1978-01-01 03:00:00', 'Cultura', 'Estado Parcial', NULL, NULL),
(2, 'Punta de lanza', 1, 'Rio Senguer', 'Pepe Sanchez', '2015-11-14 03:15:02', 'Cultura', 'Pieza Intacta', NULL, NULL);

--
-- Triggers `piezas`
--
DROP TRIGGER IF EXISTS `piezas_BEFORE_DELETE`;
DELIMITER //
CREATE TRIGGER `piezas_BEFORE_DELETE` BEFORE DELETE ON `piezas`
 FOR EACH ROW BEGIN
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
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `revisiones`
--

CREATE TABLE IF NOT EXISTS `revisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_revision_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_revision` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado_de_conservacion` char(11) NOT NULL,
  `ubicacion` char(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revisiones_usuarios1_idx` (`usuarios_revision_id`),
  KEY `fk_revisiones_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `revisiones`
--

INSERT INTO `revisiones` (`id`, `usuarios_revision_id`, `piezas_id`, `fecha_revision`, `estado_de_conservacion`, `ubicacion`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2015-10-20 03:00:00', 'D', 'd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `perfil_id` int(13) NOT NULL DEFAULT '2',
  `username` char(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` char(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuarios_personas1_idx` (`personas_id`),
  KEY `fk_usuarios_perfil1_idx` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `personas_id`, `perfil_id`, `username`, `email`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'Dongato', 'Dongato.tlw@gmail.com', '$2y$10$nV4igC0G2TmWTXxWh8NBlO51UsEyQqT6GnURGrsAOIxIVJ6mbnDsK', 'PIvGxhUB0bUhGx0wt0dGQz9FAe1y3XFrwwWtggx4cPU6NRVGu9EzN2qN0mTZ', '2015-11-21 04:05:45', '2015-11-20 21:51:37'),
(2, 2, 2, 'nuevo', 'nuevo@gmail.com', '$2y$10$B.AveoSqjPGGosoHvb0lYuuBT85K1IGCyNQIDkHX02LcneXpbHNIi', NULL, '2015-11-20 21:50:11', '2015-11-20 21:50:11'),
(13, 7, 2, 'otrousuario', 'otrousuario@gmail.com', '$2y$10$tNXMPUb7Lutvcw0UaSGeWelCQuxcgdeac8ZzJOyUFaDnLFqgLAKr6', NULL, '2015-11-21 02:55:27', '2015-11-21 02:55:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD CONSTRAINT `fk_clasificaciones_fondos1` FOREIGN KEY (`fondos_id`) REFERENCES `fondos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `fk_donaciones_donantes1` FOREIGN KEY (`donantes_id`) REFERENCES `donantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_donaciones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donantes`
--
ALTER TABLE `donantes`
  ADD CONSTRAINT `fk_donantes_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fondos`
--
ALTER TABLE `fondos`
  ADD CONSTRAINT `fk_fondos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_Museo`
--
ALTER TABLE `log_Museo`
  ADD CONSTRAINT `fk_log_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `fk_revisiones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_revisiones_usuarios1` FOREIGN KEY (`usuarios_revision_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_personas2` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
