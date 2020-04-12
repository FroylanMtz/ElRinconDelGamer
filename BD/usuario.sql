-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2020 a las 05:44:02
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rincondelgamer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `aPaterno` varchar(20) NOT NULL,
  `aMaterno` varchar(20) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `rutaFoto` varchar(70) DEFAULT NULL,
  `idUsuarioReferencia` int(11) DEFAULT '0',
  `monedasReferencia` int(11) DEFAULT '0',
  `totalMonedas` int(11) DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idRol`, `nombre`, `aPaterno`, `aMaterno`, `fechaNacimiento`, `genero`, `telefono`, `correo`, `usuario`, `contrasenia`, `rutaFoto`, `idUsuarioReferencia`, `monedasReferencia`, `totalMonedas`) VALUES
(1, 1, 'Sheyla', 'Silva', 'Glz', '0000-00-00', 0, '', '', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', NULL, 0, 0, 0),
(2, 2, 'Sheyla ', 'Silva', 'Gonzalez', '2020-04-14', 1, '82565210', 'sheyla@gmai.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'ruta', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
