-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-04-2019 a las 14:11:08
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_appioc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesores`
--

CREATE TABLE `asesores` (
  `id` int(11) NOT NULL,
  `nombreA` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidosA` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asesores`
--

INSERT INTO `asesores` (`id`, `nombreA`, `apellidosA`) VALUES
(1, 'Matias', 'Encinoso'),
(2, 'Laura', 'Sanchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `nombreC` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombreC`) VALUES
(1, 'A1'),
(2, 'A2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `material` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `escala` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `altura` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dar_baja` blob,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `codigo`, `material`, `marca`, `escala`, `color`, `fecha_alta`, `altura`, `dar_baja`, `fecha_baja`) VALUES
(1, '2442', 'metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '421', 'plastico', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '312', 'metal', 'prueba', '1.12', 'A2', NULL, '1.12', NULL, NULL),
(4, '1242', 'plastico', 'test', '12', 'A2', NULL, '1.12', NULL, NULL),
(6, '12d', 'plastico', 'prueba', '1.12', 'A1', NULL, '1-12', NULL, NULL),
(7, '634', 'metal', 'prueba', '2', 'A1', NULL, '2', NULL, NULL),
(8, '12423', 'metal', 'prueba', '1.12', 'A2', NULL, '1-12', NULL, NULL),
(9, '312gfd', 'plastico', 'prueba', '12', 'A1', NULL, '1.12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombreD` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidosD` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombreD`, `apellidosD`) VALUES
(1, 'Ara', 'Martin'),
(2, 'Miguel', 'Martin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implantes`
--

CREATE TABLE `implantes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `id` int(11) NOT NULL,
  `nombreMaq` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`id`, `nombreMaq`) VALUES
(2, 'VHFNH'),
(1, 'VHFS2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `marcaD` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `marcaD`) VALUES
(2, 'prueba'),
(1, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `nombreM` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombreM`) VALUES
(1, 'metal'),
(2, 'plastico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `codigoP` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreP` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidosP` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `codigoP`, `nombreP`, `apellidosP`) VALUES
(1, '1242', 'Matias', 'Encinoso'),
(2, '634', 'ara', 'Martin'),
(3, '312', 'Test', 'Morales'),
(4, '674', 'Genji', 'Morales'),
(5, '123', 'Sofia', 'Sosa'),
(6, '321', 'Marta', 'Ramos'),
(7, '3121', 'Marta', 'Ramos'),
(8, '12421', 'Test', 'Martin'),
(9, '098', 'Prueba', 'Prueba'),
(10, '1234', 'Hola', 'hola'),
(11, '31267', 'Genji', 'Ramos'),
(12, '32424', 'ara', 'Martin'),
(13, '76543', 'Vanessa', 'Muriel'),
(14, '5432', 'Carla', 'Martinez'),
(15, '1242d', 'wqed', 'ad'),
(16, '23d', 'ef', 'ds'),
(17, 'df', 'ara', 'ds'),
(18, 'da', 'ara@ara.com', 'Martin'),
(19, 'sa', 'sd', 'sd'),
(20, 'hjk', 'hj', 'jkjh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_tratamientos`
--

CREATE TABLE `pacientes_tratamientos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  `tipo_implante` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `c_guiada` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_definitiva` date DEFAULT NULL,
  `pic_provisional` tinyint(1) DEFAULT NULL,
  `fotos_pre` tinyint(1) DEFAULT NULL,
  `orto_pre` tinyint(1) DEFAULT NULL,
  `tac_pre` tinyint(1) DEFAULT NULL,
  `ioscan_pre` tinyint(1) DEFAULT NULL,
  `foto_protesis_boca_provisional` tinyint(1) DEFAULT NULL,
  `foto_protesis` tinyint(1) DEFAULT NULL,
  `video_pre` tinyint(1) DEFAULT NULL,
  `pic_final` tinyint(1) DEFAULT NULL,
  `foto_post` tinyint(1) DEFAULT NULL,
  `orto_post` tinyint(1) DEFAULT NULL,
  `tac_post` tinyint(1) DEFAULT NULL,
  `ioscan_post` tinyint(1) DEFAULT NULL,
  `video_final` tinyint(1) DEFAULT NULL,
  `foto_protesis_final` tinyint(1) DEFAULT NULL,
  `foto_protesis_boca_final` tinyint(1) DEFAULT NULL,
  `powerpoint` blob,
  `pdf` blob,
  `link` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes_tratamientos`
--

INSERT INTO `pacientes_tratamientos` (`id`, `id_paciente`, `id_tratamiento`, `id_doctor`, `id_asesor`, `tipo_implante`, `c_guiada`, `fecha_inicio`, `fecha_definitiva`, `pic_provisional`, `fotos_pre`, `orto_pre`, `tac_pre`, `ioscan_pre`, `foto_protesis_boca_provisional`, `foto_protesis`, `video_pre`, `pic_final`, `foto_post`, `orto_post`, `tac_post`, `ioscan_post`, `video_final`, `foto_protesis_final`, `foto_protesis_boca_final`, `powerpoint`, `pdf`, `link`) VALUES
(1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 16, 3, 1, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_trabajo`
--

CREATE TABLE `tipo_trabajo` (
  `id` int(11) NOT NULL,
  `tipoT` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_trabajo`
--

INSERT INTO `tipo_trabajo` (`id`, `tipoT`) VALUES
(3, 'corona'),
(2, 'prueba'),
(1, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `id_tratamiento` int(11) DEFAULT NULL,
  `material` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `stl` blob,
  `tipo_trabajo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `n_piezas` int(2) DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_disco` int(11) DEFAULT NULL,
  `maquina` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `notas` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `id_tratamiento`, `material`, `stl`, `tipo_trabajo`, `n_piezas`, `color`, `id_disco`, `maquina`, `notas`) VALUES
(33, 2, 'metal', NULL, 'corona', NULL, NULL, 2, NULL, NULL),
(35, 6, 'metal', NULL, NULL, NULL, 'A1', 7, 'VHFNH', 'ytre'),
(36, 3, 'plastico', NULL, NULL, NULL, 'A1', 3, 'VHFNH', NULL),
(37, 6, 'plastico', NULL, NULL, NULL, 'A1', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(11) NOT NULL,
  `nombreT` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombreT`) VALUES
(1, 'Sin tratamiento'),
(2, 'pc'),
(3, 'caso carga inmediata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'ara', 'ara@ara.com', '$2y$10$0XzXIVJ51wrIo7xp4bZ/NeSfYtTJLHmGvw3O4GjShcJrNQ4YFEaDa', NULL, '2019-03-28 15:47:34', '2019-03-28 15:47:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesores`
--
ALTER TABLE `asesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreC` (`nombreC`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material` (`material`),
  ADD KEY `color` (`color`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `implantes`
--
ALTER TABLE `implantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `tipo_2` (`tipo`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreMaq` (`nombreMaq`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marcaD` (`marcaD`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreM` (`nombreM`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigoP`);

--
-- Indices de la tabla `pacientes_tratamientos`
--
ALTER TABLE `pacientes_tratamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_tratamiento` (`id_tratamiento`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_asesor` (`id_asesor`),
  ADD KEY `tipo_implante` (`tipo_implante`);

--
-- Indices de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipoT` (`tipoT`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_1` (`id_tratamiento`),
  ADD KEY `fk_disco` (`id_disco`),
  ADD KEY `material` (`material`),
  ADD KEY `color` (`color`),
  ADD KEY `maquina` (`maquina`),
  ADD KEY `tipo_trabajo` (`tipo_trabajo`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesores`
--
ALTER TABLE `asesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `implantes`
--
ALTER TABLE `implantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes_tratamientos`
--
ALTER TABLE `pacientes_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `discos`
--
ALTER TABLE `discos`
  ADD CONSTRAINT `discos_ibfk_1` FOREIGN KEY (`material`) REFERENCES `material` (`nombreM`),
  ADD CONSTRAINT `discos_ibfk_2` FOREIGN KEY (`color`) REFERENCES `colores` (`nombreC`),
  ADD CONSTRAINT `discos_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marca` (`marcaD`);

--
-- Filtros para la tabla `pacientes_tratamientos`
--
ALTER TABLE `pacientes_tratamientos`
  ADD CONSTRAINT `pacientes_tratamientos_ibfk3` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_2` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamientos` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_4` FOREIGN KEY (`id_asesor`) REFERENCES `asesores` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_5` FOREIGN KEY (`tipo_implante`) REFERENCES `implantes` (`tipo`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_6` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_7` FOREIGN KEY (`id_asesor`) REFERENCES `asesores` (`id`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `fk_disco` FOREIGN KEY (`id_disco`) REFERENCES `discos` (`id`),
  ADD CONSTRAINT `fk_id_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `pacientes_tratamientos` (`id`),
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`material`) REFERENCES `material` (`nombreM`),
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`color`) REFERENCES `colores` (`nombreC`),
  ADD CONSTRAINT `trabajos_ibfk_3` FOREIGN KEY (`maquina`) REFERENCES `maquina` (`nombreMaq`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
