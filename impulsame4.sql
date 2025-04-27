-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-08-2023 a las 05:36:47
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
-- Base de datos: `impulsame4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

DROP TABLE IF EXISTS `inicio`;
CREATE TABLE IF NOT EXISTS `inicio` (
  `ID_Inicio` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_Inicio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`ID_Inicio`, `Correo`, `Contrasena`) VALUES
(1, 'jose@gmail.com ', '12'),
(2, 'jose@gmail.com ', '1'),
(3, 'jose@gmail.com ', '12'),
(4, 'mzunigagodinez@gmail.com ', '567'),
(5, 'mzunigagodinez363@gmail.com ', 'hju'),
(6, 'mzunigagodinez363@gmail.com ', 'hju'),
(7, 'mzunigagodinez363@gmail.com ', 'hj'),
(8, 'mzunigagodinez363@gmail.com ', 'hj'),
(9, 'mzunigagodinez363@gmail.com ', 'hj'),
(10, 'jose@gmail.com ', '4555'),
(11, 'mzunigagodinez363@gmail.com ', 'mn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mostrar1`
--

DROP TABLE IF EXISTS `mostrar1`;
CREATE TABLE IF NOT EXISTS `mostrar1` (
  `ID_Mostrar1` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Solicitud` int(11) NOT NULL,
  `ID_PerfilCl` int(11) NOT NULL,
  PRIMARY KEY (`ID_Mostrar1`),
  KEY `ID_Solicitud` (`ID_Solicitud`),
  KEY `ID_PerfilCl` (`ID_PerfilCl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mostrar2`
--

DROP TABLE IF EXISTS `mostrar2`;
CREATE TABLE IF NOT EXISTS `mostrar2` (
  `ID_Mostrar2` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Solicitud` int(11) NOT NULL,
  `ID_PerfilT` int(11) NOT NULL,
  PRIMARY KEY (`ID_Mostrar2`),
  KEY `ID_Solicitud` (`ID_Solicitud`),
  KEY `ID_PerfilT` (`ID_PerfilT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(255) DEFAULT NULL,
  `message` text,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `sender_name`, `message`, `status`) VALUES
(1, NULL, NULL, 'pending'),
(2, NULL, 'wa\r\n', 'pending'),
(3, NULL, 'Woas', 'pending'),
(4, NULL, 'Siiiiiii', 'pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilcl`
--

DROP TABLE IF EXISTS `perfilcl`;
CREATE TABLE IF NOT EXISTS `perfilcl` (
  `ID_PerfilCl` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) NOT NULL,
  PRIMARY KEY (`ID_PerfilCl`),
  KEY `ID_Cliente` (`ID_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilcliente`
--

DROP TABLE IF EXISTS `perfilcliente`;
CREATE TABLE IF NOT EXISTS `perfilcliente` (
  `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre1` varchar(35) NOT NULL,
  `Nombre2` varchar(35) NOT NULL,
  `Apellido1` varchar(35) NOT NULL,
  `Apellido2` varchar(35) NOT NULL,
  `Fecha_Nac` varchar(20) NOT NULL,
  `Dui` varchar(10) NOT NULL,
  `Foto_Dui` longblob NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `ID_Inicio` int(11) NOT NULL,
  `Foto` longblob NOT NULL,
  `Telefono` int(10) NOT NULL,
  PRIMARY KEY (`ID_Cliente`),
  KEY `ID_Inicio` (`ID_Inicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfilcliente`
--

INSERT INTO `perfilcliente` (`ID_Cliente`, `Nombre1`, `Nombre2`, `Apellido1`, `Apellido2`, `Fecha_Nac`, `Dui`, `Foto_Dui`, `Direccion`, `ID_Inicio`, `Foto`, `Telefono`) VALUES
(1, 'Miguel', 'Antonio', 'Zuniga ', 'Godinez', '24/05/2022', '67483-5', 0x50657266696c2e6a7067, 'Col. uwu Calle. Sis', 5, 0x4d656c76696e2e6a706567, 75674834);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiltr`
--

DROP TABLE IF EXISTS `perfiltr`;
CREATE TABLE IF NOT EXISTS `perfiltr` (
  `ID_PerfilT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Trabajador` int(11) NOT NULL,
  `ID_Resena` int(11) NOT NULL,
  PRIMARY KEY (`ID_PerfilT`),
  KEY `ID_Trabajador` (`ID_Trabajador`),
  KEY `ID_Resena` (`ID_Resena`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiltrabajador`
--

DROP TABLE IF EXISTS `perfiltrabajador`;
CREATE TABLE IF NOT EXISTS `perfiltrabajador` (
  `ID_Trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre1` varchar(30) NOT NULL,
  `Nombre2` varchar(30) NOT NULL,
  `Apellido1` varchar(30) NOT NULL,
  `Apellido2` varchar(30) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Dui` varchar(10) NOT NULL,
  `Foto_Dui` longblob NOT NULL,
  `Foto` longblob NOT NULL,
  `Anos` int(2) NOT NULL,
  `ID_Inicio` int(11) NOT NULL,
  `ID_Profesion` int(11) NOT NULL,
  PRIMARY KEY (`ID_Trabajador`),
  KEY `ID_Inicio` (`ID_Inicio`),
  KEY `ID_Profesion` (`ID_Profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiltrabajador`
--

INSERT INTO `perfiltrabajador` (`ID_Trabajador`, `Nombre1`, `Nombre2`, `Apellido1`, `Apellido2`, `Telefono`, `Dui`, `Foto_Dui`, `Foto`, `Anos`, `ID_Inicio`, `ID_Profesion`) VALUES
(1, 'Melvin', 'Jose', 'Monroy', 'Rodriguez', '12345678', '12345678-9', 0x372e6a7067, 0x31382e6a7067, 12, 0, 0),
(2, 'Melvin', 'Jose', 'Monroy', 'Rodriguez', '78679516', '12345678-9', 0x362e6a7067, 0x372e6a7067, 12, 0, 0),
(3, 'Melvin', 'Jose', 'Monroy', 'Rodriguez', '12345678', '12345678-9', 0x372e6a7067, 0x31382e6a7067, 12, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE IF NOT EXISTS `profesion` (
  `ID_Profesion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre1` varchar(50) NOT NULL,
  `Nombre2` varchar(50) NOT NULL,
  `Nombre3` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`ID_Profesion`, `Nombre1`, `Nombre2`, `Nombre3`) VALUES
(1, 'Programador', 'Soldador', 'AlbaÃ±il'),
(2, 'Programador', 'Soldador', 'AlbaÃ±il'),
(3, 'Programador', 'Soldador', 'AlbaÃ±il'),
(4, 'albaÃ±il', 'developer', 'software'),
(5, 'Programador', 'Soldador', 'AlbaÃ±il'),
(6, 'mKI', 'JI', 'AJAJA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res`
--

DROP TABLE IF EXISTS `res`;
CREATE TABLE IF NOT EXISTS `res` (
  `res` varchar(255) NOT NULL,
  `star` int(1) NOT NULL,
  `hr` datetime NOT NULL,
  `id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `res`
--

INSERT INTO `res` (`res`, `star`, `hr`, `id`) VALUES
('waos', 5, '2023-08-17 08:42:47', 'Usuario Cualquiera'),
('Servicio excelente, trabaja algo lento', 3, '2023-08-17 08:45:59', 'Usuario Cualquiera'),
('No sÃ©, simplemente Melvin XD', 5, '2023-08-17 10:23:19', 'Usuario Cualquiera'),
('Hola', 3, '2023-08-17 10:23:27', 'Usuario Cualquiera'),
('SinÂ´t', 3, '2023-08-17 10:23:45', 'Usuario Cualquiera'),
('4', 2, '2023-08-17 10:24:04', 'Usuario Cualquiera'),
('4', 1, '2023-08-17 10:24:10', 'Usuario Cualquiera'),
('yu', 2, '2023-08-17 10:25:16', 'Usuario Cualquiera'),
('3', 1, '2023-08-17 10:25:22', 'Usuario Cualquiera'),
('Hola ', 1, '2023-08-17 10:25:32', 'Usuario Cualquiera'),
('7', 5, '2023-08-17 10:25:38', 'Usuario Cualquiera'),
('El mejor developer del INAH (No es que haya tanta competencia xd).', 5, '2023-08-17 13:19:19', 'Usuario Cualquiera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

DROP TABLE IF EXISTS `resena`;
CREATE TABLE IF NOT EXISTS `resena` (
  `ID_Resena` int(11) NOT NULL AUTO_INCREMENT,
  `Resena` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Servicio` int(11) NOT NULL,
  PRIMARY KEY (`ID_Resena`),
  KEY `ID_Servicio` (`ID_Servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID_Servicio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` int(11) NOT NULL,
  `ID_PerfilT` int(11) NOT NULL,
  `ID_Profesion` int(11) NOT NULL,
  PRIMARY KEY (`ID_Servicio`),
  KEY `ID_PerfilT` (`ID_PerfilT`),
  KEY `ID_Profesion` (`ID_Profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_Servicio`, `Descripcion`, `ID_PerfilT`, `ID_Profesion`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 12, 0, 0),
(5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `ID_Solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PerfilT` int(11) NOT NULL,
  `ID_PerfilCl` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`ID_Solicitud`),
  KEY `ID_PerfilT` (`ID_PerfilT`),
  KEY `ID_PerfilCl` (`ID_PerfilCl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
