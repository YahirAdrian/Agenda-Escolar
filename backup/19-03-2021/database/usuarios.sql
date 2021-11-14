-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-03-2021 a las 23:05:51
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
-- Base de datos: `agenda_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `datos` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `pass`, `foto`, `datos`) VALUES
(16, 'prueba', 'prueba', 'password123', '#223472', ''),
(17, 'Nuevo Usuario', 'Lorem Ipsum', 'nuevo_usuario', '#59778b', ''),
(18, 'Afrika', 'Afriko', 'afriko12', '#810b8b', ''),
(19, 'Usuario2', 'Lorem', 'loremsupa', '#c64646', ''),
(20, 'Yahir Adrian', 'Ortiz Estrella', 'LoremIpsum', '#c64646\r\n', ''),
(21, 'Benjamin', 'Amador', '3scuela', '#ff5a0f', ''),
(22, 'Joana Stephanie', 'Pat cupul', '0831', '#59778b', ''),
(23, 'Jose Manuel', 'Cortez Lizama', 'dragon123', '#c64646', ''),
(24, 'Manuel', 'Pool', 'Ariana', '#15a762', ''),
(25, 'Isaac', 'Lugo', 'isaaclugo', '#810b8b', ''),
(27, 'Bryan Alberto', 'Tamayo puc', 'tamayo12', '#c64646', ''),
(28, 'No soy ', 'Admin', 'jajasalu2', '#2e6a26', ''),
(31, 'Nattally ', 'Calderón ', 'styles1517', '#223472', ''),
(32, 'Rocio ', 'Avila', 'Avila2310', '#15a762', ''),
(35, 'A', 'B', '55', '#15a762', ''),
(36, 'Arturo Abrhan ', 'Mena cruz ', 'coppel', '#7b2ce7', ''),
(37, 'Arturo Mena', 'Mena cruz ', '12345', '#1d91bc', ''),
(38, 'Adriana joanna', 'May Carrillo', 'canela15', '#c64646', ''),
(39, 'Iván', 'López Vélez', 'Springtrap24', '#ff5a0f', ''),
(40, 'Luis Esteban ', 'Pat quen', 'panque123', '#7b2ce7', ''),
(41, 'Karla Itzel', 'Hernandez Cruz', 'GrizzLarUwU', '#c64646', ''),
(42, '', '', '', '#ff5a0f', ''),
(43, 'Juan Carlos', 'Uribe González', 'quetevalgaqso', '#c64646', ''),
(44, 'Belem', 'Hau', 'Lula12', '#59778b', ''),
(45, 'daily', 'tuyub', 'tomlinson', '#e11111', ''),
(46, 'Avan Yoshua', 'Reyes de Alba', '040303', '#7b2ce7', ''),
(47, 'Yosef ', 'Cárdenas ', 'aguadecoco', '#1d91bc', ''),
(48, 'Geraldine', 'Carrillo', 'Carrillo2810', '#59778b', ''),
(50, 'Rocio Guadalupe', 'Avila Flota', 'lupi2310', '#2e6a26', ''),
(51, 'Verenice ', 'Chan', 'bts03', '#810b8b', ''),
(52, 'Miguel Angel', 'Cen Martin', 'Contraseña', '#c64646', ''),
(53, 'Carlos Iván', 'González Aceves', 'DerEisendrache1661', '#15a762', ''),
(54, 'Raúl', 'Rosado Gutiérrez', 'hayabuza', '#223472', ''),
(55, 'daniela', 'ayuso', 'dani123', '#59778b', ''),
(60, 'Hector ', 'Santos ', 'azul123', '#e11111', ''),
(61, 'Dante', 'Si', 'c90', '#ff5a0f', ''),
(62, 'José Javier', 'Martínez Hernández', 'javir16', '#e11111', ''),
(63, 'monika', 'ortiz bouloy', 'manasan1', '#59778b', ''),
(64, 'Jacob', 'Herrrera', 'jaco0308', '#2e6a26', ''),
(65, 'Abril', 'Cupul', 'holasoyabril', '#15a762', ''),
(66, 'Anthony Alejandro', 'Xihum', 'arenalilo12', '#223472', ''),
(67, 'Carlos Diego ', 'Magaña ', '123456', '#e11111', ''),
(70, 'Luis', 'Gio', 'luis123', '#7b2ce7', ''),
(73, 'Benjamin', 'Amador', 'tarea', '#c64646', ''),
(74, 'Omar', 'Piña ', 'omar2653', '#223472', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
