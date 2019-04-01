-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-04-2019 a las 11:47:29
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
  `nombre` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `altura` decimal(2,2) DEFAULT NULL,
  `dar_baja` blob,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `codigo`, `material`, `marca`, `escala`, `color`, `fecha_alta`, `altura`, `dar_baja`, `fecha_baja`) VALUES
(1, '2442', 'metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '421', 'plastico', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'VHFS2'),
(2, 'VHFNH');

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
(11, '31267', 'Genji', 'Ramos');

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

INSERT INTO `pacientes_tratamientos` (`id`, `id_paciente`, `id_tratamiento`, `id_doctor`, `id_asesor`, `tipo_implante`, `c_guiada`, `fecha_inicio`, `pic_provisional`, `fotos_pre`, `orto_pre`, `tac_pre`, `ioscan_pre`, `foto_protesis_boca_provisional`, `foto_protesis`, `video_pre`, `pic_final`, `foto_post`, `orto_post`, `tac_post`, `ioscan_post`, `video_final`, `foto_protesis_final`, `foto_protesis_boca_final`, `powerpoint`, `pdf`, `link`) VALUES
(1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `id_tratamiento` int(11) DEFAULT NULL,
  `material` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `stl` blob,
  `tipo_trabajo` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
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
(33, 2, 'metal', NULL, 'corona', NULL, NULL, 2, NULL, NULL);

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
(1, 'cirugia'),
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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `pacientes_tratamientos_ibfk3` (`id_doctor`),
  ADD KEY `pacientes_tratamientos_ibfk_4` (`id_asesor`),
  ADD KEY `pacientes_tratamientos_ibfk_5` (`tipo_implante`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_1` (`id_tratamiento`),
  ADD KEY `fk_disco` (`id_disco`),
  ADD KEY `material` (`material`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pacientes_tratamientos`
--
ALTER TABLE `pacientes_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Filtros para la tabla `pacientes_tratamientos`
--
ALTER TABLE `pacientes_tratamientos`
  ADD CONSTRAINT `pacientes_tratamientos_ibfk3` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_2` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamientos` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_4` FOREIGN KEY (`id_asesor`) REFERENCES `asesores` (`id`),
  ADD CONSTRAINT `pacientes_tratamientos_ibfk_5` FOREIGN KEY (`tipo_implante`) REFERENCES `implantes` (`tipo`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `fk_disco` FOREIGN KEY (`id_disco`) REFERENCES `discos` (`id`),
  ADD CONSTRAINT `fk_id_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `pacientes_tratamientos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
