-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2017 a las 17:40:58
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
create database integrador;
	use integrador;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `usuario`, `contacto`, `fecha`) VALUES
(20, 2, 1, '2017-07-02 05:45:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL,
  `descripccion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `descripccion`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 'restaurant'),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 'bar'),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 'bar'),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 'bar'),
(5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 'bar'),
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant'),
(7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 'restaurant'),
(8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 'restaurant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeschat`
--

CREATE TABLE IF NOT EXISTS `mensajeschat` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE IF NOT EXISTS `puntos` (
  `IdPunto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cx` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cy` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`IdPunto`, `id_usuario`, `cx`, `cy`) VALUES
(1, 1, '-13.158554946192757', ' -72.54770278930664'),
(2, 2, '-13.17343121885015', ' -72.54650115966797'),
(3, 3, '-13.129301215619058', ' -72.51628875732422'),
(5, 1, '-4.390228926463384', ' -68.994140625'),
(6, 2, '-0.5273363048115043', ' -78.310546875'),
(7, 1, '2.547987871471383', ' -71.3671875'),
(8, 2, '-23.725011735951796', ' -67.412109375');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `descripccion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripccion`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'USUARIO', 1),
(6, 'rtyuio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id` int(11) NOT NULL,
  `origen` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `origen`, `destino`, `id_usu`, `fecha`, `estado`) VALUES
(16, 'Quito Prensa y Yacuambi', 'Quito', 1, '2017-07-01 21:33:00', 1),
(17, 'Quito Prensa y Yacuambi', 'Quito', 2, '2017-07-03 15:21:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `usuario`, `solicitud`) VALUES
(2, 1, 3),
(3, 1, 4),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilegio` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `online` int(11) NOT NULL,
  `col2` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `privilegio`, `correo`, `online`, `col2`, `estado`) VALUES
(1, 'LUIS PRADO', 'LUCHO', 'e10adc3949ba59abbe56e057f20f883e', 1, 'luis6969uchiha@outlook.com', 1, 0, 1),
(2, 'pepe lucho', 'uno', 'e10adc3949ba59abbe56e057f20f883e', 1, 'rtgrtg@xn--ida.com', 1, 0, 1),
(3, 'tyujikolpñ', 'dfghjk', '81dc9bdb52d04dc20036dbd8313ed055', 1, '123456', 0, 0, 1),
(4, 'werty', '345ty', 'e10adc3949ba59abbe56e057f20f883e', 1, 'r4@jj.com', 0, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`IdPunto`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`), ADD KEY `estado` (`estado`), ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `estado` (`estado`), ADD KEY `privilegio` (`privilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `IdPunto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puntos`
--
ALTER TABLE `puntos`
ADD CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`),
ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`),
ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`privilegio`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
