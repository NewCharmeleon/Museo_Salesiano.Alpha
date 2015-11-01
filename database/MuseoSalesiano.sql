-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-11-2015 a las 13:12:09
-- Versión del servidor: 5.6.19-0ubuntu0.14.04.1-log
-- Versión de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `MuseoSalesiano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `fondos_id` int(11) NOT NULL,
  `usuarios_carga_id` int(11) NOT NULL,
  `fecha_carga_id` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clasificaciones_fondos1_idx` (`fondos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `descripcion`, `fondos_id`, `usuarios_carga_id`, `fecha_carga_id`) VALUES
(1, 'Pieza Aborigen', 1, 1, '2010-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE IF NOT EXISTS `donaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donantes_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_donacion` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donaciones_donantes1_idx` (`donantes_id`),
  KEY `fk_donaciones_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`id`, `donantes_id`, `piezas_id`, `fecha_donacion`) VALUES
(1, 1, 1, '2015-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donantes`
--

CREATE TABLE IF NOT EXISTS `donantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `fecha_carga` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donantes_personas_idx` (`personas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `donantes`
--

INSERT INTO `donantes` (`id`, `personas_id`, `fecha_carga`) VALUES
(1, 2, '2015-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos`
--

CREATE TABLE IF NOT EXISTS `fondos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(50) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `fecha_carga_fondo` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fondos_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fondos`
--

INSERT INTO `fondos` (`id`, `descripcion`, `usuarios_id`, `fecha_carga_fondo`) VALUES
(1, 'unFondo', 1, '2015-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `piezas_id` int(11) NOT NULL,
  `fotos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fotos_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `piezas_id`, `fotos_id`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_Museo`
--

CREATE TABLE IF NOT EXISTS `log_Museo` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `operacion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `tabla_modificada` char(30) NOT NULL,
  `columnas_modificadas` char(200) NOT NULL,
  `datos_viejos` char(200) NOT NULL,
  `datos _nuevos` char(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(30) NOT NULL,
  `cuit_cuil` varchar(13) NOT NULL,
  `telefono` int(15) unsigned NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_carga_persona` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuit_cuil_UNIQUE` (`cuit_cuil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `cuit_cuil`, `telefono`, `domicilio`, `email`, `fecha_carga_persona`, `updated_at`, `created_at`) VALUES
(1, 'Adrian Arias', '20-25448798-4', 2804456897, 'Corrientes 455', 'djfkld@gmail.com', '2015-09-17', NULL, NULL),
(2, 'Pepe Pipon', '20-22222222-3', 2804111111, 'Su Calle 111', 'Sumail@yahoo.com.ar', '2015-01-01', NULL, NULL);

--
-- Disparadores `personas`
--
DROP TRIGGER IF EXISTS `personas_AFTER_INSERT`;
DELIMITER //
CREATE TRIGGER `personas_AFTER_INSERT` AFTER INSERT ON `personas`
 FOR EACH ROW BEGIN
	INSERT INTO log_Museo (id, usuarios_id, operacion, fecha, tabla_modificada, columnas_modificadas, datos_viejos, datos_nuevos)
	VALUES (null, id, 'INSERT', now(), 'personas',CONCAT(id,'', nombre,'', cuit_cuil,'', telefono,'', domicilio,'', email,'', fecha_carga_persona),
			'Primera carga de Persona - No existen datos anteriores',
            CONCAT(NEW.id,'-', NEW.nombre,'-', NEW.cuit_cuil,'-', NEW.telefono,'-', NEW.domicilio,'-', NEW.email,'-', NEW.fecha_carga_persona));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE IF NOT EXISTS `piezas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` char(100) NOT NULL,
  `clasificaciones_id` int(11) NOT NULL,
  `procedencia` char(50) NOT NULL,
  `autor` char(30) NOT NULL,
  `fecha_ejecucion` date NOT NULL,
  `tema` char(50) NOT NULL,
  `observacion` char(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`id`, `descripcion`, `clasificaciones_id`, `procedencia`, `autor`, `fecha_ejecucion`, `tema`, `observacion`, `updated_at`, `created_at`) VALUES
(1, 'Punta de Flecha', 1, 'Paso de Indios', 'Pepe', '1978-01-01', 'Cultura', 'Estado Parcial', NULL, NULL);

--
-- Disparadores `piezas`
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
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE IF NOT EXISTS `revisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_revision_id` int(11) NOT NULL,
  `piezas_id` int(11) NOT NULL,
  `fecha_revision` date NOT NULL,
  `estado_de_conservacion` char(1) NOT NULL,
  `ubicacion` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revisiones_usuarios1_idx` (`usuarios_revision_id`),
  KEY `fk_revisiones_piezas1_idx` (`piezas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `revisiones`
--

INSERT INTO `revisiones` (`id`, `usuarios_revision_id`, `piezas_id`, `fecha_revision`, `estado_de_conservacion`, `ubicacion`) VALUES
(1, 1, 1, '2015-10-20', 'D', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personas_id` int(11) NOT NULL,
  `nombre_usuario` char(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_personas1_idx` (`personas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `personas_id`, `nombre_usuario`, `password`) VALUES
(1, 1, 'Dongato', 'Dongato123');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD CONSTRAINT `fk_clasificaciones_fondos1` FOREIGN KEY (`fondos_id`) REFERENCES `fondos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `fk_donaciones_donantes1` FOREIGN KEY (`donantes_id`) REFERENCES `donantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_donaciones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `donantes`
--
ALTER TABLE `donantes`
  ADD CONSTRAINT `fk_donantes_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD CONSTRAINT `fk_fondos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_Museo`
--
ALTER TABLE `log_Museo`
  ADD CONSTRAINT `fk_log_usuarios1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `fk_revisiones_piezas1` FOREIGN KEY (`piezas_id`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_revisiones_usuarios1` FOREIGN KEY (`usuarios_revision_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
