-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-08-2016 a las 12:30:59
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `slxcontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alert`
--

CREATE TABLE IF NOT EXISTS `tb_alert` (
`cp_id` int(11) NOT NULL,
  `cp_alert_cgf_id` int(11) NOT NULL,
  `cp_inicio` bigint(255) NOT NULL,
  `cp_final` bigint(255) DEFAULT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_comentario` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alert_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_alert_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descrip` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_max` float NOT NULL,
  `cp_min` float NOT NULL,
  `cp_perfil_cont_id` int(11) NOT NULL,
  `cp_oid_inicial` bigint(255) NOT NULL,
  `cp_oid_mod` bigint(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_alert_cfg`
--

INSERT INTO `tb_alert_cfg` (`cp_id`, `cp_nombre`, `cp_descrip`, `cp_max`, `cp_min`, `cp_perfil_cont_id`, `cp_oid_inicial`, `cp_oid_mod`) VALUES
(19, 'cp_campo8', 'alerta de prueba1111', 30, 10, 10, 0, 0),
(20, 'cp_campo11', 'sadsada', 100, 4, 13, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cambios_perfil_cont`
--

CREATE TABLE IF NOT EXISTS `tb_cambios_perfil_cont` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_est_inicial` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_est_final` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `OID` bigint(255) NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_campos_lectura`
--

CREATE TABLE IF NOT EXISTS `tb_campos_lectura` (
`id` int(11) NOT NULL,
  `campo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_campo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden_lectura_arduino` int(5) DEFAULT NULL,
  `categorias_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_campos_lectura`
--

INSERT INTO `tb_campos_lectura` (`id`, `campo`, `descripcion`, `tipo_campo`, `orden_lectura_arduino`, `categorias_id`) VALUES
(1, 'cp_campo1', 'Nombre Equipo', 'DESCRIPTIVO', 1, 9),
(2, 'cp_campo2', 'ID Registro', 'LITROS', 2, 9),
(5, 'cp_campo3', 'Nivel Guardado', 'HORAS', 3, 9),
(6, 'cp_campo4', 'Nivel Filtrado (altura del liquido)', 'LITROS', 4, 9),
(20, 'cp_volt1', '', 'VOLTAJE', 3, 1),
(21, 'cp_volt2', '', 'VOLTAJE', 5, 1),
(22, 'cp_volt3', '', 'VOLTAJE', 7, 1),
(23, 'cp_campo2', '', 'AMPERAJE', 2, 1),
(24, 'cp_amp2', '', 'AMPERAJE', 4, 1),
(25, 'cp_amp3', '', 'AMPERAJE', 6, 1),
(26, 'cp_campo1', '', 'TEMPERATURA', 1, 1),
(34, 'cp_campo1', '', 'TEMPERATURA', 1, 2),
(35, 'cp_campo2', '', 'AMPERAJE', 2, 2),
(36, 'cp_volt1', '', 'VOLTAJE', 3, 2),
(37, 'cp_amp2', '', 'AMPERAJE', 4, 2),
(38, 'cp_volt2', '', 'VOLTAJE', 5, 2),
(39, 'cp_amp3', '', 'AMPERAJE', 6, 2),
(40, 'cp_volt3', '', 'VOLTAJE', 7, 2),
(41, 'cp_campo5', 'Nivel Instantaneo', 'DIGITAL', 5, 9),
(42, 'cp_campo6', 'Voltaje Carga', 'VOLTAJE', 6, 9),
(44, 'cp_campo7', 'Hora Elapsed', 'HORAS', 7, 9),
(45, 'cp_campo8', 'status (1 o 0)', 'DESCRIPTIVO', 8, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_categorias_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias_cfg`
--

INSERT INTO `tb_categorias_cfg` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'Carro Repetidor', 'Carro Repetidor'),
(2, 'Sitio Fotovoltaico', 'Sitio Fotovoltaico'),
(3, 'Servidor', 'Servidor'),
(4, 'Carro CCTV', 'Carro CCTV'),
(5, 'Semaforo Meteorologico', 'Semaforo Meteorologico'),
(6, 'Barrera de Acceso', 'Barrera de Acceso'),
(7, 'Terralite', 'Terralite'),
(8, 'Luminaria', 'Luminaria'),
(9, 'Camion - Fuel', 'Proyecto Combustible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_ubicacion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo1` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo2` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_cliente_cfg`
--

INSERT INTO `tb_cliente_cfg` (`cp_id`, `cp_nombre`, `cp_ubicacion`, `cp_correo1`, `cp_correo2`) VALUES
(1, 'SLXcontrol CMDIC', 'Minera Collahuasi', 'contacto@collahuasi.cl', 'contacto2@collahuasi.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_comentarios` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_usuario_id` int(11) NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_coment` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_estado_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_estado` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_estado_cfg`
--

INSERT INTO `tb_estado_cfg` (`cp_id`, `cp_estado`, `cp_descripcion`) VALUES
(1, 'Activo', 'Activo'),
(2, 'Pendiente', 'Pendiente'),
(3, 'Eliminado', 'Eliminado'),
(4, 'Con Fallas', 'Con fallas'),
(5, 'Bloqueado', 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_cont`
--

CREATE TABLE IF NOT EXISTS `tb_estado_cont` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_estado_cont`
--

INSERT INTO `tb_estado_cont` (`cp_id`, `cp_perfil_id`, `cp_estado_cfg_id`, `cp_descripcion`) VALUES
(1, 10, 1, 'estado!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modelo_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_modelo_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_modelo_cfg`
--

INSERT INTO `tb_modelo_cfg` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'SLX-Mine-00010101', 'MIMcontrol Mine V 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_nivel_usuario` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_nivel_usuario`
--

INSERT INTO `tb_nivel_usuario` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'Administrador', 'Administrador'),
(2, 'Operador', 'operador'),
(3, 'Monitor', 'monitoreo'),
(4, 'Usuario', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_perfil_cont_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_perfil_cont_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_cat_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_ip` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_modelo_id` int(11) NOT NULL,
  `id_mina` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp_horometro_historico` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_perfil_cont_cfg`
--

INSERT INTO `tb_perfil_cont_cfg` (`cp_id`, `cp_cat_id`, `cp_nombre`, `cp_ip`, `cp_oid`, `cp_modelo_id`, `id_mina`, `cp_horometro_historico`) VALUES
(10, 9, 'slx01', '192.168.1.172', 0, 1, '334', '40584'),
(11, 9, 'slx02', '192.168.1.167', 0, 1, '666', '42018'),
(12, 3, 'slx03', '192.168.1.156', 0, 1, '456', '11066'),
(13, 2, 'mim01', '192.168.1.175', 0, 1, '4343', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_registro_usu`
--

CREATE TABLE IF NOT EXISTS `tb_registro_usu` (
`cp_id` int(11) NOT NULL,
  `cp_usuario_id` int(11) NOT NULL,
  `cp_actividad` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_telefono` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_rut` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_nivel_id` int(11) NOT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_foto` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`cp_id`, `cp_nombre`, `cp_telefono`, `cp_correo`, `cp_rut`, `cp_oid`, `cp_nivel_id`, `cp_estado_cfg_id`, `cp_password`, `cp_foto`) VALUES
(1, 'Pablo Campillay', '76042823', 'pabloc@mimlook.cl', '16120768-3', 1462738980000, 1, 1, 'mierdaster', 'default.jpg'),
(2, 'cmdic', '12345678', 'cmdic@cmdic.cl', 'cmdic', 123456789, 1, 1, 'cmdic', 'default.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_alert_cgf_id` (`cp_alert_cgf_id`), ADD KEY `cp_estado_id` (`cp_estado_cfg_id`);

--
-- Indices de la tabla `tb_alert_cfg`
--
ALTER TABLE `tb_alert_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_cont_id` (`cp_perfil_cont_id`);

--
-- Indices de la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`);

--
-- Indices de la tabla `tb_campos_lectura`
--
ALTER TABLE `tb_campos_lectura`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_categorias_cfg`
--
ALTER TABLE `tb_categorias_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_id` (`cp_id`), ADD KEY `cp_id_2` (`cp_id`);

--
-- Indices de la tabla `tb_cliente_cfg`
--
ALTER TABLE `tb_cliente_cfg`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`), ADD KEY `cp_usuario_id` (`cp_usuario_id`);

--
-- Indices de la tabla `tb_estado_cfg`
--
ALTER TABLE `tb_estado_cfg`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`), ADD KEY `cp_estado_cfg_id` (`cp_estado_cfg_id`);

--
-- Indices de la tabla `tb_modelo_cfg`
--
ALTER TABLE `tb_modelo_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_id` (`cp_id`);

--
-- Indices de la tabla `tb_nivel_usuario`
--
ALTER TABLE `tb_nivel_usuario`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_ip` (`cp_ip`(255)), ADD KEY `cp_cat_id` (`cp_cat_id`), ADD KEY `cp_modelo_id` (`cp_modelo_id`);

--
-- Indices de la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_usuario_id` (`cp_usuario_id`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_nivel_id` (`cp_nivel_id`), ADD KEY `cp_estado_cfg_id` (`cp_estado_cfg_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_alert_cfg`
--
ALTER TABLE `tb_alert_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_campos_lectura`
--
ALTER TABLE `tb_campos_lectura`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tb_categorias_cfg`
--
ALTER TABLE `tb_categorias_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_cliente_cfg`
--
ALTER TABLE `tb_cliente_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estado_cfg`
--
ALTER TABLE `tb_estado_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_modelo_cfg`
--
ALTER TABLE `tb_modelo_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_nivel_usuario`
--
ALTER TABLE `tb_nivel_usuario`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
ADD CONSTRAINT `tb_alert_ibfk_2` FOREIGN KEY (`cp_alert_cgf_id`) REFERENCES `tb_alert_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_alert_ibfk_3` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
ADD CONSTRAINT `tb_cambios_perfil_cont_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
ADD CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`cp_usuario_id`) REFERENCES `tb_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
ADD CONSTRAINT `tb_estado_cont_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_estado_cont_ibfk_2` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
ADD CONSTRAINT `tb_perfil_cont_cfg_ibfk_2` FOREIGN KEY (`cp_modelo_id`) REFERENCES `tb_modelo_cfg` (`cp_id`),
ADD CONSTRAINT `tb_perfil_cont_cfg_ibfk_3` FOREIGN KEY (`cp_cat_id`) REFERENCES `tb_categorias_cfg` (`cp_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
ADD CONSTRAINT `tb_registro_usu_ibfk_1` FOREIGN KEY (`cp_usuario_id`) REFERENCES `tb_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`cp_nivel_id`) REFERENCES `tb_nivel_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
