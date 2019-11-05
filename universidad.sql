-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2019 a las 21:50:18
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `email`, `password`) VALUES
('17.023.956-3', 'Juan-Ignacio Flores', 'J.floresahlers@gmail.com', 'hola123'),
('19.123.456-7', 'Diego Negrón', 'dnegron@alumnos.uai.cl', '123'),
('19.290.140-5', 'Catalina Silva', 'catasilva@alumnos.uai.cl', 'hola123'),
('19.456.456-7', 'José Arroyo', 'jarroyo@alumnos.uai.cl', '123'),
('19.863.329-2', 'Julio Latorre', 'jlatorre@alumnos.uai.cl', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `id` int(100) NOT NULL,
  `tipo_de_certificado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `envio_email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_funcionario` int(22) NOT NULL,
  `rut_alumno` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `certificado`
--

INSERT INTO `certificado` (`id`, `tipo_de_certificado`, `nombre_titulo`, `fecha`, `estado`, `envio_email`, `id_funcionario`, `rut_alumno`) VALUES
(1, 'Certificado de Tìtulo', 'Ingenierìa Civil Industrial mención Tecnologìas de la Información', '2020-01-20', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(2, 'Certificado de Título', 'Ingeniero Civil Industrial mención Obras Civiles', '2020-02-01', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(3, 'Certificado de Título', 'Ingeniero Civil Industrial mención Minería', '2019-02-01', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(4, 'Certificado de Título', 'Ingeniero Civil Industrial mención Tecnologías de la Información', '2020-01-20', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(79, 'Certificado de Título', 'Ingeniero Civil Industrial mención Obras Civiles', '2019-10-09', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(80, 'Certificado de Título', 'Ingeniero Civil Industrial mención Obras Civiles', '2019-10-09', 'Revocado', 'No Enviado', 1, '19.290.140-5'),
(81, 'Certificado de Título', 'Ingeniero Civil en Minería', '2019-10-09', 'Revocado', 'No Enviado', 0, '19.290.140-5'),
(82, 'Certificado de Título', 'Ingeniero Civil Industrial mención Tecnologías de la Información', '2019-10-09', 'Revocado', 'No Enviado', 0, '19.290.140-5'),
(83, 'Certificado de Título', 'Ingeniero Civil Industrial mención Tecnologías de la Información', '2019-10-09', 'Emitido', 'No Enviado', 1, '19.290.140-5'),
(84, 'Certificado de Título', 'Ingeniero Civil Industrial mención Obras Civiles', '2019-10-09', 'Emitido', 'No Enviado', 0, '19.290.140-5'),
(85, 'Certificado de Título', 'Ingeniero Civil Industrial mención Tecnologías de la Información', '2019-10-16', 'Emitido', 'No Enviado', 1, '19.290.140-5'),
(86, 'Certificado de Título', 'Ingeniero Civil Industrial mención Tecnologías de la Información', '2019-10-09', 'Emitido', 'No Enviado', 1, '19.290.140-5'),
(87, 'Certificado de Título', 'Ingeniero Civil Industrial mención Biotecnología', '2019-10-16', 'Emitido', 'No Enviado', 1, '19.290.140-5'),
(88, 'Certificado de Título', 'Ingeniero Civil en Minería', '2019-10-16', 'Emitido', 'No Enviado', 0, '19.290.140-5'),
(89, 'Certificado de Título', 'Ingeniero Civil Industrial mención Obras Civiles', '2019-11-14', 'Emitido', 'No Enviado', 0, '19.290.140-5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(1, 'Catalina', 'Silva', 'catasilva@uai.cl', 'hola123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(20) NOT NULL,
  `universidad` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_de_certificado` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rut_alumno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `jwt` varchar(10000) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `universidad`, `tipo_de_certificado`, `estado`, `rut_alumno`, `jwt`) VALUES
(1, 'Universidad Adolfo Ibáñez', 'Diploma', 'Autorizado', '19.290.140-5', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NkstUiJ9.eyJpYXQiOjE1NzEyNTM2NjUsImV4cCI6MTU3Mzg0NTY2NSwic3ViIjoiZGlkOmV0aHI6MHhiY2Q5YjMwNTA5OGQ3NjBhZTlmMmE0ZmMyZjVlMzUyOGFhNDJmM2Y5IiwiY2xhaW0iOnsiQ2VydGlmaWNhZG8gZGUgVGl0dWxvIjp7IlVuaXZlcnNpZGFkIjoiVW5pdmVyc2lkYWQgQWRvbGZvIEliw6HDsWV6IiwiU2VkZSI6IlNhbnRpYWdvIiwiVMOtdHVsbyI6IkluZ2VuaWVybyBDaXZpbCBJbmR1c3RyaWFsIG1lbmNpw7NuIEJpb3RlY25vbG9nw61hIiwiRmVjaGEiOiIyMDE5LTEwLTE2IiwiUnV0IjoiMTkuMjkwLjE0MC01IiwiTm9tYnJlIjoiQ2F0YWxpbmEgU2lsdmEifX0sImlzcyI6ImRpZDpldGhyOjB4Y2IyOWFiNTgzZDYyMTQ3NzllOGMwOWE1ZWJiNzc5NjUzM2E1OThiZCJ9.0rmkS8eabdD0XhOQY4KC-r4g6b0Li_8FQQWBOVoR6DV2jYU7N5TKiNw-jCE2Mg7g9d_GcWXbnvL2bWIQfHbsBQA'),
(2, 'Universidad Adolfo Ibáñez', 'Diploma', 'Pendiente', '19.123.456-7', NULL),
(3, 'Universidad Adolfo Ibáñez', 'Diploma', 'Pendiente', '19.290.140-5', NULL),
(26, 'Universidad Adolfo Ibáñez', 'Certificado de Titulo', 'Pendiente', '19.290.140-5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rubro` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`nombre`, `apellido`, `empresa`, `rubro`, `email`, `usuario`, `password`) VALUES
('Catalina', 'Silva', 'IBM', 'TI', 'catasilva@ibm.cl', 'catasilva', 'hola123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
