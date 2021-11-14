-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-03-2021 a las 23:03:18
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
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datos` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `nombre`, `datos`) VALUES
(1, 'actualizacion de reuniones', '2021-03-15 23:31:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `de` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `para` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `leido` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `de`, `para`, `titulo`, `descripcion`, `leido`, `fecha`, `hora`) VALUES
(20, 'Admin', 'Todos', 'Tareas', '<h1>Lista de tareas</h1><p>La lista de tareas se reiniciarán de la agenda a partir del comienzo del segundo parcial.</p><p><br></p><p><br></p><p><br></p><p>Espero que les vaya bien en este segundo parcial y échenle muchas ganas. !Animo ya estamos en el último semestre!</p>', 0, '2021-03-14', '18:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `id` int(11) NOT NULL,
  `materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`id`, `materia`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Aplicaciones Android', '10:00:00', '10:50:00'),
(2, 'Aplicaciones IOS', '07:00:00', '07:50:00'),
(3, 'Temas de Fisica', '10:50:00', '11:40:00'),
(4, 'Probabilidad y estadistica', '00:00:00', '00:00:00'),
(5, 'Filosofia', '00:00:00', '00:00:00'),
(6, 'Dibujo tecnico', '13:20:00', '14:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareacompletada_usuario`
--

CREATE TABLE `tareacompletada_usuario` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` date NOT NULL,
  `hora_limite` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareacompletada_usuario`
--
ALTER TABLE `tareacompletada_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tareacompletada_usuario`
--
ALTER TABLE `tareacompletada_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tareacompletada_usuario`
--
ALTER TABLE `tareacompletada_usuario`
  ADD CONSTRAINT `tareacompletada_usuario_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tareacompletada_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
