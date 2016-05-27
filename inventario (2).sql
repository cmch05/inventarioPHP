-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2016 a las 15:27:11
-- Versión del servidor: 5.7.12-0ubuntu1
-- Versión de PHP: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_acceso`
--

CREATE TABLE `bitacora_acceso` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `empleado` varchar(255) DEFAULT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora_acceso`
--

INSERT INTO `bitacora_acceso` (`serial`, `empleado`, `fecha_ingreso`, `fecha_salida`) VALUES
(0000000035, '94463816', '2016-05-25 21:50:57', NULL),
(0000000036, '94463816', '2016-05-25 21:52:29', NULL),
(0000000037, '94463816', '2016-05-25 21:52:40', NULL),
(0000000038, '94463816', '2016-05-25 21:52:58', NULL),
(0000000039, '94463816', '2016-05-25 22:20:57', NULL),
(0000000040, '94463816', '2016-05-25 22:21:38', NULL),
(0000000041, '94463816', '2016-05-25 22:22:49', '2016-05-25 17:24:28'),
(0000000042, '94463816', '2016-05-25 22:26:04', '2016-05-25 17:26:06'),
(0000000043, '94463816', '2016-05-25 22:26:40', '2016-05-25 17:26:45'),
(0000000044, '94463816', '2016-05-25 22:26:56', '2016-05-25 17:27:04'),
(0000000045, '94463816', '2016-05-25 22:27:46', '2016-05-25 17:27:48'),
(0000000046, '94463816', '2016-05-25 22:27:51', NULL),
(0000000047, '94463816', '2016-05-25 23:40:48', '2016-05-25 18:43:39'),
(0000000048, '94463816', '2016-05-25 23:43:46', '2016-05-25 18:43:59'),
(0000000049, '94463816', '2016-05-25 23:44:06', '2016-05-25 18:44:57'),
(0000000050, '94463816', '2016-05-25 23:45:01', '2016-05-25 18:45:02'),
(0000000051, '94463816', '2016-05-25 23:45:05', '2016-05-25 20:03:40'),
(0000000052, '94463816', '2016-05-26 01:03:43', NULL),
(0000000053, '94463816', '2016-05-26 03:09:37', '2016-05-25 22:17:41'),
(0000000054, '94463816', '2016-05-26 03:17:43', NULL),
(0000000055, '94463816', '2016-05-26 13:15:13', '2016-05-26 08:36:12'),
(0000000056, '94463816', '2016-05-26 13:36:14', NULL),
(0000000057, '94463816', '2016-05-26 14:22:13', '2016-05-26 11:03:44'),
(0000000058, '94463816', '2016-05-26 16:03:49', '2016-05-26 14:18:32'),
(0000000059, '94463816', '2016-05-26 19:18:36', '2016-05-26 14:46:21'),
(0000000060, '94463816', '2016-05-26 19:46:31', '2016-05-26 14:46:41'),
(0000000061, '94463816', '2016-05-26 19:50:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_cambios`
--

CREATE TABLE `bitacora_cambios` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `empleado` varchar(255) DEFAULT NULL,
  `tabla_modificada` varchar(255) DEFAULT NULL,
  `registro_modificado` varchar(255) DEFAULT NULL,
  `contenido_anterior` varchar(255) NOT NULL,
  `contenido_nuevo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`codigo`, `nombre`) VALUES
('100', 'CEO'),
('50', 'VIGILANCIA'),
('51', 'CONDUCTOR'),
('52', 'SECRETARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_empleado`
--

CREATE TABLE `cargo_empleado` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_empleado` varchar(255) DEFAULT NULL,
  `codigo_cargo` varchar(255) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_empleado`
--

INSERT INTO `cargo_empleado` (`serial`, `id_empleado`, `codigo_cargo`, `estado`, `inicio`, `fin`) VALUES
(0000000001, '94463816', '100', 0, '2016-05-20 15:35:54', '2016-05-20 16:05:43'),
(0000000002, '94463815', '50', 0, '2016-05-20 15:35:54', '2016-05-20 15:35:54'),
(0000000003, '94463816', '51', 0, '2016-05-20 15:35:54', '2016-05-20 15:35:54'),
(0000000004, '1115566675', '100', 0, '2016-05-20 15:47:05', '2016-05-20 15:53:25'),
(0000000005, '1115566675', '100', 0, '2016-05-20 15:48:28', '2016-05-20 15:53:25'),
(0000000006, '1115566675', '100', 0, '2016-05-20 15:48:35', '2016-05-20 15:53:24'),
(0000000007, '1115566675', '100', 0, '2016-05-20 15:51:06', '2016-05-20 15:53:19'),
(0000000008, '1115566675', '51', 0, '2016-05-20 15:51:35', '2016-05-20 15:53:09'),
(0000000009, '1115566675', '100', 0, '2016-05-20 15:54:50', '2016-05-20 15:55:06'),
(0000000010, '1115566675', '100', 0, '2016-05-20 16:04:28', '2016-05-20 16:04:46'),
(0000000011, '1115566675', '100', 0, '2016-05-20 16:04:46', '2016-05-20 16:05:16'),
(0000000012, '1115566675', '51', 0, '2016-05-20 16:05:16', '2016-05-20 16:05:28'),
(0000000013, '1115566675', '50', 0, '2016-05-20 16:05:28', '2016-05-20 16:08:43'),
(0000000014, '94463816', '52', 0, '2016-05-20 16:05:43', '2016-05-20 16:06:18'),
(0000000015, '94463816', '100', 0, '2016-05-20 16:06:18', '2016-05-20 16:13:33'),
(0000000016, '1115566675', '52', 0, '2016-05-20 16:08:43', '2016-05-20 16:11:40'),
(0000000017, '94463815', '52', 0, '2016-05-20 16:08:55', '2016-05-20 17:30:56'),
(0000000018, '1115566675', '100', 0, '2016-05-20 16:11:40', '2016-05-20 16:12:48'),
(0000000019, '1115566675', '100', 0, '2016-05-20 16:12:48', '2016-05-20 16:13:26'),
(0000000020, '1115566675', '100', 0, '2016-05-20 16:13:26', '2016-05-20 16:13:39'),
(0000000021, '94463816', '100', 0, '2016-05-20 16:13:33', '2016-05-20 23:51:46'),
(0000000022, '1115566675', '50', 0, '2016-05-20 16:13:39', '2016-05-20 23:51:20'),
(0000000023, '94478564', '51', 0, '2016-05-20 16:15:33', '2016-05-20 16:21:49'),
(0000000024, '94478564', '52', 0, '2016-05-20 16:21:49', '2016-05-20 16:47:54'),
(0000000025, '94478564', '52', 0, '2016-05-20 16:47:54', '2016-05-20 16:48:04'),
(0000000026, '94478564', '50', 0, '2016-05-20 16:48:04', '2016-05-20 17:22:13'),
(0000000027, '94478564', '52', 0, '2016-05-20 17:22:13', '2016-05-20 17:30:49'),
(0000000028, '94478564', '52', 0, '2016-05-20 17:30:49', '2016-05-21 19:04:52'),
(0000000029, '94463815', '52', 0, '2016-05-20 17:30:56', '2016-05-20 23:59:56'),
(0000000030, '1115566675', '100', 0, '2016-05-20 23:51:20', '2016-05-20 23:51:34'),
(0000000031, '1115566675', '100', 0, '2016-05-20 23:51:34', '2016-05-21 00:13:51'),
(0000000032, '94463816', '100', 0, '2016-05-20 23:51:46', '2016-05-26 03:18:02'),
(0000000033, '94463815', '52', 1, '2016-05-20 23:59:56', '2016-05-20 23:59:56'),
(0000000034, '1115566675', '100', 0, '2016-05-21 00:13:51', '2016-05-21 16:58:31'),
(0000000035, '1115566675', '52', 0, '2016-05-21 19:01:08', '2016-05-21 19:01:37'),
(0000000036, '1115566675', '52', 0, '2016-05-21 19:01:37', '2016-05-21 19:02:28'),
(0000000037, '1115566675', '50', 0, '2016-05-21 19:02:28', '2016-05-21 19:03:16'),
(0000000038, '1115566675', '51', 0, '2016-05-21 19:03:16', '2016-05-21 19:06:38'),
(0000000039, '94478564', '52', 1, '2016-05-21 19:04:52', '2016-05-21 19:04:52'),
(0000000040, '1115566675', '52', 0, '2016-05-21 19:06:38', '2016-05-21 19:07:17'),
(0000000041, '1115566675', '52', 0, '2016-05-21 19:07:17', '2016-05-21 19:13:11'),
(0000000042, '1115566675', '51', 0, '2016-05-21 19:13:11', '2016-05-22 03:20:40'),
(0000000043, '1115566675', '52', 0, '2016-05-22 03:20:40', '2016-05-22 03:20:48'),
(0000000044, '1115566675', '51', 0, '2016-05-22 03:20:48', '2016-05-22 03:20:59'),
(0000000045, '1115566675', '50', 0, '2016-05-22 03:20:59', '2016-05-22 03:21:52'),
(0000000046, '1115566675', '100', 0, '2016-05-22 03:21:52', '2016-05-22 20:26:57'),
(0000000047, '1115566675', '50', 0, '2016-05-22 20:26:57', '2016-05-22 20:27:38'),
(0000000048, '1115566675', '52', 0, '2016-05-22 20:27:38', '2016-05-23 14:07:03'),
(0000000049, '1115566675', '52', 0, '2016-05-23 14:07:03', '2016-05-24 14:12:51'),
(0000000050, '1115566675', '100', 1, '2016-05-24 14:12:51', '2016-05-24 14:12:51'),
(0000000051, '98745547', '51', 1, '2016-05-25 00:45:03', '2016-05-25 00:45:03'),
(0000000052, '94463816', '100', 1, '2016-05-26 03:18:02', '2016-05-26 03:18:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`codigo`, `nombre`, `departamento`) VALUES
('001', 'MEDELLIN', '05'),
('042', 'ANTIOQUIA', '05'),
('059', 'ARMENIA', '05'),
('088', 'BELLO', '05'),
('109', 'BUENAVENTURA', '76'),
('11001', 'SANTA FE DE BOGOTA D.C.', '11'),
('111', 'BUGA', '76'),
('11100', 'SANTA FE DE BOGOTA D.C. USAQUEN', '11'),
('122', 'CAICEDONIA', '76'),
('25001', 'AGUA DE DIOS', '25'),
('258', 'EL PEÑOL', '25'),
('520', 'PALMIRA', '76'),
('76001', 'CALI (SANTIAGO DE CALI)', '76');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `clientecol` float(9,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`codigo`, `nombre`) VALUES
('05', 'ANTIOQUIA'),
('11', 'SANTA FE DE BOGOTA'),
('25', 'CUNDINAMARCA'),
('76', 'VALLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `sueldo` float(9,1) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `id_usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `direccion`, `telefono`, `fecha_ingreso`, `sueldo`, `estado`, `id_usuario`, `password`) VALUES
('1115566675', 'OSCAR ANDRES CHAVEZ', 'CLL16  9-33 N', '3114292255', '2016-05-05', 600000.0, 1, NULL, NULL),
('111566554', 'ELIANA GARCIA', 'CLL 15 # 22-55', '3214122211', '2016-05-20', 600000.0, 1, NULL, NULL),
('94463815', 'MARIANA CORDOBA SA', 'CR 10 # 15-44', '3214569988', '2016-05-12', 600000.0, 1, NULL, NULL),
('94463816', 'CRISTIAN MAURICIO GUERRERO', 'CLL2 A 9-43', '3114297346', '2016-05-05', 1200000.0, 1, 'root', '0920516'),
('94478564', 'WILLIAM CADAVID', 'CALL 50 55-55', '3214569988', '2016-05-05', 600000.0, 1, NULL, NULL),
('98745547', 'FELIX HERNANDES', 'CLL12 15-22', '32112321153', '2016-05-22', 600000.0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `vendedor` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `codigo_remision` varchar(255) NOT NULL,
  `fecha_remision` date DEFAULT NULL,
  `precio_total` float(9,1) DEFAULT NULL,
  `fecha ingreso` date DEFAULT NULL,
  `id_proveedor` varchar(255) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_empleado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra__producto`
--

CREATE TABLE `factura_compra__producto` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `factura_compra` varchar(255) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

CREATE TABLE `factura_producto` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `serial_factura` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `codigo_producto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_agregada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fecha_actulizada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codigo`, `nombre`, `fecha_agregada`, `ciudad`, `direccion`, `telefono`, `email`, `fecha_actulizada`) VALUES
('000001', 'MAGGI', '2016-05-25 16:42:12', NULL, NULL, NULL, NULL, '2016-05-26 16:14:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_primer_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disponible` int(1) DEFAULT '1',
  `cantidad` int(11) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `precio_venta` float(9,1) DEFAULT NULL,
  `precio_compra` float(9,1) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `fecha_primer_ingreso`, `disponible`, `cantidad`, `marca`, `precio_venta`, `precio_compra`, `descripcion`) VALUES
('7891000087923', 'CALDO DE GALLINA', '2016-05-25 16:46:54', 1, 1000, '000001', 2500.0, '2200', 'CALDO DE GALLINA MAGGI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_item`
--

CREATE TABLE `producto_item` (
  `codigo_item` varchar(255) NOT NULL,
  `codigo_producto` varchar(255) DEFAULT NULL,
  `fecha_vencimiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `serial` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_producto` varchar(255) DEFAULT NULL,
  `id_proveedor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`serial`, `id_producto`, `id_proveedor`) VALUES
(0000000001, '7891000087923', '000001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_recepcion`
--

CREATE TABLE `producto_recepcion` (
  `codigo` int(10) UNSIGNED ZEROFILL NOT NULL,
  `codigo_producto` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_vencimineto_lote` datetime DEFAULT NULL,
  `factura_compra` varchar(255) DEFAULT NULL,
  `id_transporte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `ciudad`, `direccion`, `fecha_agregado`, `telefono`, `email`) VALUES
('000001', 'NESTLE COLOMBIA', '11001', 'TRANSVERSAL 18 # 96-41', '2016-05-25 16:39:23', '(57)2190800', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_usuario`, `password`) VALUES
(1, 'cmch05', '0920516'),
(2, 'root', '0920516');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora_acceso`
--
ALTER TABLE `bitacora_acceso`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_bitacora_acceso1_idx` (`empleado`);

--
-- Indices de la tabla `bitacora_cambios`
--
ALTER TABLE `bitacora_cambios`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_bitacora_cambios1_idx` (`empleado`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_cargo_empleado1_idx` (`codigo_cargo`),
  ADD KEY `fk_cargo_empleado2_idx` (`id_empleado`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_ciudad1_idx` (`departamento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_factura1_idx` (`vendedor`),
  ADD KEY `fk_factura2_idx` (`cliente`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`codigo_remision`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `factura_compra__producto`
--
ALTER TABLE `factura_compra__producto`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_factura_compra__pruducto1_idx` (`factura_compra`),
  ADD KEY `fk_factura_compra__pruducto2_idx` (`producto`);

--
-- Indices de la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_factura_producto_cliente1_idx` (`serial_factura`),
  ADD KEY `fk_factura_producto_cliente1_idx1` (`codigo_producto`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_marca1_idx` (`ciudad`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto1_idx` (`marca`);

--
-- Indices de la tabla `producto_item`
--
ALTER TABLE `producto_item`
  ADD PRIMARY KEY (`codigo_item`),
  ADD KEY `fk_producto_item1_idx` (`codigo_producto`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_producto_proveedor_producto2_idx` (`id_proveedor`),
  ADD KEY `fk_producto_proveedor_producto1_idx` (`id_producto`);

--
-- Indices de la tabla `producto_recepcion`
--
ALTER TABLE `producto_recepcion`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_producto_recepcion_producto_idx` (`codigo_producto`),
  ADD KEY `fk_producto_recepcion2_idx` (`factura_compra`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proveedor1_idx` (`ciudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora_acceso`
--
ALTER TABLE `bitacora_acceso`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `bitacora_cambios`
--
ALTER TABLE `bitacora_cambios`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura_compra__producto`
--
ALTER TABLE `factura_compra__producto`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  MODIFY `serial` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `producto_recepcion`
--
ALTER TABLE `producto_recepcion`
  MODIFY `codigo` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora_acceso`
--
ALTER TABLE `bitacora_acceso`
  ADD CONSTRAINT `fk_bitacora_acceso1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bitacora_cambios`
--
ALTER TABLE `bitacora_cambios`
  ADD CONSTRAINT `fk_bitacora_cambios1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  ADD CONSTRAINT `fk_cargo_empleado1` FOREIGN KEY (`codigo_cargo`) REFERENCES `cargo` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cargo_empleado2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura1` FOREIGN KEY (`vendedor`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura2` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD CONSTRAINT `factura_compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `factura_compra_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `factura_compra__producto`
--
ALTER TABLE `factura_compra__producto`
  ADD CONSTRAINT `fk_factura_compra__pruducto1` FOREIGN KEY (`factura_compra`) REFERENCES `factura_compra` (`codigo_remision`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_compra__pruducto2` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD CONSTRAINT `fk_factura_producto_cliente1` FOREIGN KEY (`serial_factura`) REFERENCES `factura` (`serial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_producto_cliente2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `fk_marca1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto1` FOREIGN KEY (`marca`) REFERENCES `marca` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_item`
--
ALTER TABLE `producto_item`
  ADD CONSTRAINT `fk_producto_item1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `fk_producto_proveedor_producto1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor_producto2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_recepcion`
--
ALTER TABLE `producto_recepcion`
  ADD CONSTRAINT `fk_producto_recepcion1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_recepcion2` FOREIGN KEY (`factura_compra`) REFERENCES `factura_compra` (`codigo_remision`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
