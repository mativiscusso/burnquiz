-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2019 a las 02:36:30
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
-- Base de datos: `burnquiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` tinyint(4) NOT NULL,
  `pregunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`) VALUES
(9, '¿De que color son las cajas negras de los aviones?'),
(10, 'Estás corriendo en una carrera y adelantas a la persona que esta en segundo lugar, en que posición pasas a estar?'),
(11, 'Cuanto duro la Guerra de los 100 años?'),
(12, '¿Que palabra usarías para describir a un hombre que no tiene todos los dedos en una mano?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `usuario` varchar(50) NOT NULL,
  `puntaje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` tinyint(4) NOT NULL,
  `respuesta` tinytext NOT NULL,
  `validacion` tinytext NOT NULL,
  `id_pregunta` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `validacion`, `id_pregunta`) VALUES
(28, 'Negra', 'i', 9),
(29, 'Roja', 'i', 9),
(30, 'Naranja', 'c', 9),
(31, 'Primero', 'i', 10),
(32, 'Tercero', 'i', 10),
(33, 'Segundo', 'c', 10),
(34, '100', 'i', 11),
(35, '101', 'i', 11),
(36, '116', 'c', 11),
(37, 'Ogro', 'i', 12),
(38, 'Mounstro', 'i', 12),
(39, 'Hombre común', 'c', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `puntaje` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `imagen`, `puntaje`) VALUES
(19, 'Matias', 'mativiscusso@gmail.com', '$2y$10$Xne//m88vNV4JXu7O0aTpO87aCkYzDeACoYdpTZ0tK/6E/t6qo1ra', 'img_5dce8ab289c2d.jpg', NULL),
(20, 'DigitalHouse', 'info@digitalhouse.com', '$2y$10$IDHO4BcgccQrZYmMLzuMLO3pa9i.HZauCXjMfPclPuO45uL6wUZtC', 'img_5dcea0e3351b9.png', NULL),
(21, '', '', '$2y$10$AUvNZ8.VnLT3FGfTbz0L2eqlHrJkrf4ZTNycIwU35sSbfJVbPRWjG', 'img_5dcea0f2b8cec.', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
