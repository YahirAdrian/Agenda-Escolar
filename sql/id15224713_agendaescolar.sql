-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-12-2020 a las 18:02:00
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id15224713_agendaescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `Id_producto` int(4) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `Categoria` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Unidades` int(5) NOT NULL,
  `Imagen` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reuniones`
--

CREATE TABLE `Reuniones` (
  `id` int(11) NOT NULL,
  `Materia` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Hora` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Reuniones`
--

INSERT INTO `Reuniones` (`id`, `Materia`, `Hora`) VALUES
(1, 'Aplicaciones Web', 'N/A'),
(2, 'Calculo Integral', 'N/A'),
(3, 'CTSyV', 'N/A'),
(4, 'Fisica', 'N/A'),
(5, 'Ingles', 'N/A'),
(6, 'Bases de Datos', 'N/A'),
(7, 'Actualizacion', 'zJueves 17 de Diciembre a las 2:29 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE `Tareas` (
  `id` int(11) NOT NULL,
  `materia` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tarea` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Tareas`
--

INSERT INTO `Tareas` (`id`, `materia`, `tarea`) VALUES
(16, 'Calculo Integral', 'N/A'),
(17, 'Ingles', 'N/A'),
(18, 'CTSyV', 'N/A'),
(19, 'Aplicaciones Web', 'N/A'),
(20, 'Bases de Datos', 'N/A'),
(21, 'Fisica', 'N/A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `Reuniones`
--
ALTER TABLE `Reuniones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `Id_producto` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Reuniones`
--
ALTER TABLE `Reuniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
