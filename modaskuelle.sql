-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2013 a las 05:31:02
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `modaskuelle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE IF NOT EXISTS `abonos` (
  `ID_ABONO` int(50) NOT NULL AUTO_INCREMENT,
  `NRO_PEDIDO` int(10) NOT NULL,
  `ABONO` bigint(20) NOT NULL,
  `FECHA_ABONO` date NOT NULL,
  `FORMA_PAGO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ABONO`,`NRO_PEDIDO`),
  KEY `ID_ABONO` (`ID_ABONO`,`NRO_PEDIDO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`ID_ABONO`, `NRO_PEDIDO`, `ABONO`, `FECHA_ABONO`, `FORMA_PAGO`) VALUES
(20, 1, 45000, '2013-09-29', 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bermuda`
--

CREATE TABLE IF NOT EXISTS `bermuda` (
  `id_cliente` int(11) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `tiro` decimal(11,2) NOT NULL,
  `bota` decimal(11,2) NOT NULL,
  `talla` varchar(11) NOT NULL,
  `molde` char(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bermuda`
--

INSERT INTO `bermuda` (`id_cliente`, `cintura`, `base`, `largo`, `tiro`, `bota`, `talla`, `molde`, `observacion`) VALUES
(14839549, 85.00, 63.00, 25.00, 41.00, 85.00, '61', 'NO', 'OBIJGIOBJIO'),
(145236956, 85.00, 63.00, 14.00, 14.00, 145.00, '0', 'SI', 'DSFGDSFGDFGDFGF'),
(1148695626, 45.00, 8.00, 45.00, 75.00, 47.00, 'L', 'SI', 'FGJGFJF'),
(1145698236, 45.00, 12.00, 63.00, 25.00, 45.00, 'D', 'SI', 'GSDFGDX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blusa`
--

CREATE TABLE IF NOT EXISTS `blusa` (
  `id_cliente` int(20) NOT NULL,
  `talle_del` decimal(11,2) NOT NULL,
  `talle_tras` decimal(11,2) NOT NULL,
  `espalda` decimal(11,2) NOT NULL,
  `pecho` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `mangac` decimal(11,2) NOT NULL,
  `punomc` decimal(11,2) NOT NULL,
  `mangal` decimal(11,2) NOT NULL,
  `punoml` decimal(11,2) NOT NULL,
  `mangatres` decimal(11,2) NOT NULL,
  `punotres` decimal(11,2) NOT NULL,
  `entrepecho` decimal(11,2) NOT NULL,
  `escote` decimal(11,2) NOT NULL,
  `costado` decimal(11,2) NOT NULL,
  `molde` char(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blusa`
--

INSERT INTO `blusa` (`id_cliente`, `talle_del`, `talle_tras`, `espalda`, `pecho`, `cintura`, `base`, `hombro`, `mangac`, `punomc`, `mangal`, `punoml`, `mangatres`, `punotres`, `entrepecho`, `escote`, `costado`, `molde`, `observacion`) VALUES
(1145698236, 5.00, 79.00, 78.15, 5.00, 51.00, 21.00, 3.00, 20.00, 65.00, 12.78, 12.00, 210.00, 21.00, 12.00, 20.00, 201.00, 'NO', 'dfgdfgdfgdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camisa`
--

CREATE TABLE IF NOT EXISTS `camisa` (
  `id_cliente` int(20) NOT NULL,
  `cuello` decimal(11,2) NOT NULL,
  `espalda_alta` decimal(11,2) NOT NULL,
  `espalda_baja` decimal(11,2) NOT NULL,
  `manga` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `talla` char(5) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `molde` char(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `camisa`
--

INSERT INTO `camisa` (`id_cliente`, `cuello`, `espalda_alta`, `espalda_baja`, `manga`, `largo`, `base`, `cintura`, `talla`, `hombro`, `molde`, `observacion`) VALUES
(14526895, 45.00, 21.00, 63.00, 11.00, 52.00, 82.00, 52.00, 'L', 45.00, 'SI', 'OLBKJHOKJGBIOBJ'),
(24589653, 45.00, 86.00, 92.00, 63.00, 45.00, 21.00, 52.00, 'S', 58.00, 'SI', 'LKNKJBKJB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chaleco`
--

CREATE TABLE IF NOT EXISTS `chaleco` (
  `id_cliente` int(11) NOT NULL,
  `talle` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `espalda` decimal(11,2) NOT NULL,
  `pecho` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `separacion` decimal(11,2) NOT NULL,
  `altura` decimal(11,2) NOT NULL,
  `molde` varchar(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chaleco`
--

INSERT INTO `chaleco` (`id_cliente`, `talle`, `largo`, `espalda`, `pecho`, `cintura`, `base`, `hombro`, `separacion`, `altura`, `molde`, `observacion`) VALUES
(1145698236, 45.00, 26.00, 32.10, 62.00, 41.00, 58.00, 62.00, 96.00, 45.00, 'NO', 'FGHJGFHF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chaqueta`
--

CREATE TABLE IF NOT EXISTS `chaqueta` (
  `id_cliente` int(20) NOT NULL,
  `talle_del` decimal(11,2) NOT NULL,
  `talle_tras` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `espalda_alta` decimal(11,2) NOT NULL,
  `espalda_baja` decimal(11,2) NOT NULL,
  `pecho` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `altura` decimal(11,2) NOT NULL,
  `manga_larga` decimal(11,2) NOT NULL,
  `punoml` decimal(11,2) NOT NULL,
  `manga_corta` decimal(11,2) NOT NULL,
  `punomc` decimal(5,2) NOT NULL,
  `separacion` decimal(11,2) NOT NULL,
  `braso` decimal(11,2) NOT NULL,
  `costado` decimal(11,2) NOT NULL,
  `entrepecho` decimal(11,2) NOT NULL,
  `molde` text NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `NRO_PEDIDO` int(10) NOT NULL,
  `NRO_ORDEN` int(11) NOT NULL AUTO_INCREMENT,
  `PRENDA` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `MODELO` varchar(20) NOT NULL,
  `COLOR` varchar(20) NOT NULL,
  `PRECIO` bigint(20) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY (`NRO_PEDIDO`,`NRO_ORDEN`),
  KEY `NRO_ORDEN` (`NRO_ORDEN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`NRO_PEDIDO`, `NRO_ORDEN`, `PRENDA`, `DESCRIPCION`, `MODELO`, `COLOR`, `PRECIO`, `FECHA`) VALUES
(1, 20, 'Arreglo', 'jhfvjhv', '', '', 78000, '2013-09-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE IF NOT EXISTS `detalle_temp` (
  `NRO_PEDIDO` int(10) NOT NULL,
  `NRO_ORDEN` int(11) NOT NULL,
  `PRENDA` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `MODELO` varchar(20) NOT NULL,
  `COLOR` varchar(20) NOT NULL,
  `PRECIO` bigint(20) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falda`
--

CREATE TABLE IF NOT EXISTS `falda` (
  `id_cliente` int(20) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `vuelo_lar` decimal(11,2) NOT NULL,
  `vuelo_cor` decimal(11,2) NOT NULL,
  `abdomen` decimal(11,2) NOT NULL,
  `molde` text NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_entrega`
--

CREATE TABLE IF NOT EXISTS `fechas_entrega` (
  `NRO_PEDIDO` bigint(20) NOT NULL,
  `FECHA` date NOT NULL,
  `ENTREGA` varchar(100) NOT NULL,
  `ESTADO` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operario`
--

CREATE TABLE IF NOT EXISTS `operario` (
  `CEDULA` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `DIRECCION` varchar(20) NOT NULL,
  `BARRIO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operario`
--

INSERT INTO `operario` (`CEDULA`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `DIRECCION`, `BARRIO`) VALUES
(123456, 'MARIA', 'GARCIA', '4258956', 'CRA 12 #12-8', 'LA BASE'),
(456789, 'ERNESTO', 'CACERES', '8854712', 'cra 45 sgsdg', 'fasaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalon`
--

CREATE TABLE IF NOT EXISTS `pantalon` (
  `id_cliente` int(11) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `tiro` decimal(11,2) NOT NULL,
  `pierna` decimal(11,2) NOT NULL,
  `rodilla` decimal(11,2) NOT NULL,
  `bota` decimal(11,2) NOT NULL,
  `talla` varchar(5) NOT NULL,
  `molde` varchar(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pantalon`
--

INSERT INTO `pantalon` (`id_cliente`, `cintura`, `base`, `largo`, `tiro`, `pierna`, `rodilla`, `bota`, `talla`, `molde`, `observacion`) VALUES
(24589653, 45.00, 85.00, 62.00, 32.00, 65.00, 21.00, 54.00, 'L', 'SI', 'DFGDFG'),
(454, 4.00, 65.00, 86.00, 21.00, 12.00, 84.00, 41.00, '82', 'NO', 'JHDVJXV'),
(14526895, 45.00, 20.00, 32.00, 62.00, 515.00, 51.00, 41.00, 'L', 'NO', 'KJBKJB'),
(16740089, 46.00, 55.00, 98.00, 22.00, 32.00, 28.00, 22.00, '0', 'NO', 'ALGO'),
(94500073, 56.00, 48.00, 52.00, 62.00, 33.00, 45.00, 85.00, 'L', 'NO', 'KJHKNJB'),
(14526359, 45.00, 74.50, 48.00, 74.00, 45.00, 25.00, 75.80, 'S', 'SI', 'GHKGHKGHK'),
(1145698236, 45.00, 75.00, 63.00, 14.00, 52.00, 11.00, 45.00, '28', 'NO', 'NADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_asignados`
--

CREATE TABLE IF NOT EXISTS `pedidos_asignados` (
  `NRO_PEDIDO` int(10) NOT NULL,
  `NRO_ORDEN` int(11) NOT NULL,
  `ID_OPERARIO` int(11) NOT NULL,
  `PAGO` bigint(20) NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `FECHA_ENTREGA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saco`
--

CREATE TABLE IF NOT EXISTS `saco` (
  `id_cliente` int(11) NOT NULL,
  `talle` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `espalda_alta` decimal(11,2) NOT NULL,
  `espalda_baja` decimal(11,2) NOT NULL,
  `pecho` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `manga` decimal(11,2) NOT NULL,
  `molde` varchar(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `saco`
--

INSERT INTO `saco` (`id_cliente`, `talle`, `largo`, `espalda_alta`, `espalda_baja`, `pecho`, `cintura`, `base`, `hombro`, `manga`, `molde`, `observacion`) VALUES
(94500073, 0.00, 87.00, 74.00, 85.00, 58.00, 62.00, 35.00, 45.00, 45.00, 'SI', 'DFGDFG'),
(24589653, 0.00, 45.00, 14.00, 52.00, 41.00, 52.00, 45.00, 74.00, 47.00, 'NO', 'jlhjlhjl'),
(475693, 0.00, 45.00, 74.00, 45.00, 75.00, 85.00, 65.00, 85.00, 75.00, 'NO', 'JHKHJK'),
(1148695626, 0.00, 78.00, 45.00, 12.00, 45.00, 32.00, 12.00, 12.00, 54.00, 'NO', 'lkhnono'),
(1145698236, 0.00, 86.00, 92.00, 51.00, 23.00, 54.00, 25.00, 62.00, 57.00, 'SI', 'FGHGFH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slack`
--

CREATE TABLE IF NOT EXISTS `slack` (
  `id_cliente` int(20) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `tiro` decimal(11,2) NOT NULL,
  `pierna` decimal(11,2) NOT NULL,
  `rodilla` decimal(11,2) NOT NULL,
  `bota` decimal(11,2) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `abdomen` decimal(11,2) NOT NULL,
  `molde` varchar(5) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slack`
--

INSERT INTO `slack` (`id_cliente`, `cintura`, `base`, `largo`, `tiro`, `pierna`, `rodilla`, `bota`, `talla`, `abdomen`, `molde`, `observacion`) VALUES
(24589653, 45.00, 85.00, 62.00, 35.00, 96.00, 45.00, 87.00, 'L', 40000.00, 'NO', 'KJHVBJV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE IF NOT EXISTS `tbcliente` (
  `nombre_cliente` varchar(45) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `sexo` char(15) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `digitador` varchar(20) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `update_last` date NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `observacion` varchar(70) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_sexo` (`sexo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`nombre_cliente`, `apellido`, `id_cliente`, `sexo`, `telefono`, `celular`, `ciudad`, `direccion`, `digitador`, `fecha_entrada`, `update_last`, `nombre_apellido`, `empresa`, `observacion`) VALUES
('Gerardo', 'Martinez', 454, 'M', '546516', '65616', 'cali', 'cra 25', 'administrador', '2011-04-07', '0000-00-00', 'Gerardo Martinez', '', ''),
('edwin', 'gonzalez', 47859, 'M', '4523658', '314785698', 'cali', 'cra 24', 'administrador ', '2011-07-24', '2011-07-25', 'edwin gonzalez', 'telmex', 'nada'),
('edwin', 'martinez', 458796, 'M', '4523658', '314785698', 'cali', 'cra 24', 'administrador ', '2011-07-24', '0000-00-00', 'edwin martinez', 'une', 'nada'),
('edwin', 'osorio', 475693, 'M', '4523658', '314785698', 'cali', 'cra 24', 'administrador ', '2011-07-24', '0000-00-00', 'edwin osorio', 'une', 'nada'),
('edwin', 'forlan', 1458965, 'M', '4523658', '314785698', 'cali', 'cra 24', 'administrador ', '2011-07-24', '0000-00-00', 'edwin forlan', 'une', 'nada'),
('andres', 'lujan rodriguez', 14526359, 'M', '45236985', '31256895', 'MORICHAL', 'cra 25 ', 'edwin gomez', '2011-03-09', '0000-00-00', 'Andres Lujan Rodriguez', '', ''),
('Daniela', 'Rosero Gomez', 14526895, 'F', '4526356', '317458236', 'popayan', 'cra 7 #14-91', 'EDWIN GOMEZ', '2011-03-10', '0000-00-00', 'Daniela Rosero Gomez', '', ''),
('Yesid', 'Reyes Urquijo', 14839549, 'M', '3746430', '3007778915', 'CALI', 'Carrera 11c n 62-51', 'Yesid Reyes', '2011-02-19', '2011-07-19', 'Yesid Reyes Urquijo', 'MODAS KUELLE', 'ADMINISTRADOR'),
('RENE', 'CADAVID', 16740089, 'M', '6676764', '0', 'CALI', '0', 'administrador ', '2011-08-31', '0000-00-00', 'RENE CADAVID', '', ''),
('LAURA', 'RAMIREZ', 24589653, 'F', '4586325', '31785693', 'vallegrande', 'calle 8', 'Hayder Reyes', '2011-02-18', '0000-00-00', 'Laura Ramirez', '', ''),
('hayder ', 'reyes urquijo', 94500073, 'M', '25622666', '1234569', 'Cali-Nueva base', 'transv 72 f #28-25', 'Hayder Reyes', '2011-02-19', '2011-08-31', 'hayder  reyes urquijo', 'Fundacion Andes', 'CONTADOR PUBLICO'),
('Miguel', 'Garcia', 145236956, 'm', '4526356', '31548569', 'cali', 'cra 25 #24-7', 'EDWIN GOMEZ', '2011-03-10', '0000-00-00', 'Miguel Garcia', '', ''),
('EDWIN', 'GOMEZ', 1145698236, 'M', '4370383', '3177218896', 'CALI', 'DIAG 28', '', '2011-02-18', '2011-10-16', 'EDWIN GOMEZ', 'MICROSOFT', 'Nada'),
('DAVID', 'ARREDONDO', 1148695626, 'M', '4589623', '3158965369', 'comfandi', 'diag 25 #24-56', '', '2011-02-18', '2011-10-01', 'DAVID ARREDONDO', 'CASA', 'NDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpedido`
--

CREATE TABLE IF NOT EXISTS `tbpedido` (
  `NRO_PEDIDO` int(10) NOT NULL,
  `TALONARIO` varchar(20) NOT NULL,
  `CLIENTE` int(10) NOT NULL,
  `FECHA_RECIBIDO` datetime NOT NULL,
  `OBSERVACION` varchar(100) DEFAULT NULL,
  `DIGITADOR` varchar(20) NOT NULL,
  PRIMARY KEY (`NRO_PEDIDO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbpedido`
--

INSERT INTO `tbpedido` (`NRO_PEDIDO`, `TALONARIO`, `CLIENTE`, `FECHA_RECIBIDO`, `OBSERVACION`, `DIGITADOR`) VALUES
(1, '10', 1145698236, '2013-09-29 21:38:33', '', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsexo_cliente`
--

CREATE TABLE IF NOT EXISTS `tbsexo_cliente` (
  `sexo` char(15) NOT NULL,
  `codigo` int(3) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `login` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`login`, `password`) VALUES
('admin', 'admin'),
('auxiliar', 'aux');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vestido`
--

CREATE TABLE IF NOT EXISTS `vestido` (
  `id_cliente` int(20) NOT NULL,
  `talle_del` decimal(11,2) NOT NULL,
  `talle_tras` decimal(11,2) NOT NULL,
  `espalda_alta` decimal(11,2) NOT NULL,
  `espalda_baja` decimal(11,2) NOT NULL,
  `largo` decimal(11,2) NOT NULL,
  `largo_falda` decimal(11,2) NOT NULL,
  `pecho` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `hombro` decimal(11,2) NOT NULL,
  `manga` decimal(11,2) NOT NULL,
  `altura` decimal(11,2) NOT NULL,
  `separacion` decimal(11,2) NOT NULL,
  `costado` decimal(11,2) NOT NULL,
  `escote_del` decimal(11,2) NOT NULL,
  `escote_tra` decimal(11,2) NOT NULL,
  `imperio` decimal(11,2) NOT NULL,
  `contorno` decimal(11,2) NOT NULL,
  `molde` text NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
