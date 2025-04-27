-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-09-2023 a las 00:56:25
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perfil_administrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `ID_Clasificacion` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_Clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactar`
--

DROP TABLE IF EXISTS `contactar`;
CREATE TABLE IF NOT EXISTS `contactar` (
  `ID_Contactar` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Servicio` int(11) NOT NULL,
  PRIMARY KEY (`ID_Contactar`),
  KEY `ID_Servicio` (`ID_Servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
CREATE TABLE IF NOT EXISTS `curriculum` (
  `ID_Curriculum` int(11) NOT NULL AUTO_INCREMENT,
  `Curriculum_PDF` longblob NOT NULL,
  `Nivel_estudio` varchar(20) NOT NULL,
  `Diplomas` longblob NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `ID_Perfil` int(10) NOT NULL,
  PRIMARY KEY (`ID_Curriculum`),
  KEY `ID_Estado` (`ID_Estado`),
  KEY `ID_Perfil` (`ID_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciosesion`
--

DROP TABLE IF EXISTS `iniciosesion`;
CREATE TABLE IF NOT EXISTS `iniciosesion` (
  `ID_Sesion` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` text NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`ID_Sesion`),
  KEY `ID_Perfil` (`ID_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `ID_Notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`ID_Notificacion`),
  KEY `ID_Perfil` (`ID_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `ID_Perfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre1` varchar(30) NOT NULL,
  `Nombre2` varchar(30) NOT NULL,
  `Apellido1` varchar(30) NOT NULL,
  `Apellido2` varchar(30) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Dui` varchar(10) NOT NULL,
  `Foto_Dui` longblob NOT NULL,
  `Foto` longblob NOT NULL,
  `Direccion` text NOT NULL,
  `Correo` text NOT NULL,
  `Contrasena` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Cuenta` varchar(15) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`ID_Perfil`, `Nombre1`, `Nombre2`, `Apellido1`, `Apellido2`, `Telefono`, `Fecha_Nac`, `Dui`, `Foto_Dui`, `Foto`, `Direccion`, `Correo`, `Contrasena`, `Descripcion`, `Cuenta`, `Estado`) VALUES
(1, 'Luis', 'Enrique', 'Sanchez', 'Fuentes', '73494133', '2005-02-24', '12345678-9', 0x4455492e6a7067, 0x4455492e6a7067, 'ahuachapan', 'Josemonroy@gmail.com', '123456789', '1234', 'Cliente', 'Bloqueada'),
(2, 'Abner', 'Alexander', 'Recinos', 'Perez', '70028551', '2005-02-24', '12345678-9', 0x4455492e6a7067, 0x4455492e6a7067, 'ahuachapan', 'Josemonroy@gmail.com', '123456789', '1234', 'Cliente', 'Bloqueada'),
(3, 'Melvin', 'Jose', 'Monroy', 'Rodriguez', '73494133', '2005-02-24', '12345678-9', 0x4455492e6a7067, 0x4455492e6a7067, 'ahuachapan', 'Josemonroy@gmail.com', '123456789', '1234', 'Cliente', 'Bloqueada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

DROP TABLE IF EXISTS `resena`;
CREATE TABLE IF NOT EXISTS `resena` (
  `ID_Resena` int(11) NOT NULL AUTO_INCREMENT,
  `Resena` text NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`ID_Resena`),
  KEY `ID_Perfil` (`ID_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID_Servicio` int(11) NOT NULL AUTO_INCREMENT,
  `Servico1` varchar(25) NOT NULL,
  `Servicio2` varchar(25) NOT NULL,
  `Servicio3` varchar(25) NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`ID_Servicio`),
  KEY `ID_Perfil` (`ID_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'administrador1', '1234'),
(2, 'administrador2', '4567'),
(3, 'administrador3', '78910'),
(4, 'administrador4', '10111213'),
(5, 'administrador5', '13141516'),
(6, 'administrador6', '16171819');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactar`
--
ALTER TABLE `contactar`
  ADD CONSTRAINT `contactar_ibfk_1` FOREIGN KEY (`ID_Servicio`) REFERENCES `servicio` (`ID_Servicio`);

--
-- Filtros para la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `curriculum_ibfk_2` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`);

--
-- Filtros para la tabla `iniciosesion`
--
ALTER TABLE `iniciosesion`
  ADD CONSTRAINT `iniciosesion_ibfk_1` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`);

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
