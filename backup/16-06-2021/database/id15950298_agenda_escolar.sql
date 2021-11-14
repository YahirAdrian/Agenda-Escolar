-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-06-2021 a las 16:59:40
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
-- Base de datos: `id15950298_agenda_escolar`
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
(1, 'actualizacion de reuniones', '2021-06-13 13:26:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_usuario`, `mensaje`, `fecha`, `hora`) VALUES
(10, 75, '<h1>Querido estudiante del 6AMPR</h1><p>Te doy la bienvenida a este foro donde tu podrás escribir un mensaje para compartir con tus compañeros que al igual que tú han terminado el ultimo de semestre de preparatoria. </p><h1>¿Qué es lo que puedo escribir en este foro?</h1><p>En este foro puedes escribir un mensaje para tus compañeros de tu grupo. Puedes escribir un mensaje de despedida, un consejo para tus compañeros, desearles lo mejor, compartir una anécdota, etc. Intenta personalizar tu mensaje lo mejor que puedas y espero que disfrutes leyendo los mensajes de tus demás compañeros.</p><h3>Reglas:</h3><ul><li>Puedes publicar como máximo <strong>2 mensajes</strong></li><li>Debes dirigirte respetuosamente hacia tus compañeros en tu mensaje. En caso de no hacer caso, tu mensaje será eliminado</li></ul>', '2021-05-31', '14:55:01'),
(15, 20, '<h1>Mensaje para mi grupo</h1><p>Quiero decirle a mi grupo que han pasado algunos momentos difíciles durante nuestros últimos semestres, hicimos lo que pudimos para poder seguir estudiando. Hemos pasado buenos momentos cuando estuvimos en la escuela, y también a distancia, les quiero decir que ha sido un agrado haber estudiado junto a ustedes, sin importar que no nos llevemos bien con todo el grupo, es algo normal, pero les agradezco de todas formas de poder estudiar con ustedes y haber compartido con mi grupo una etapa importante de mi vida.</p><p><br></p><p>Espero que todos ustedes puedan terminar sin problemas la preparatoria y que puedan alcanzar todos sus objetivos que se propongan, que les vaya muy bien en la vida y que recuerden siempre que ustedes<strong> pueden lograr todo lo que se propongan si se esfuerzan y realmente lo desean :)</strong> </p>', '2021-06-05', '17:17:03'),
(18, 32, '<p>Si alguno esta viendo esto, les deseo el mayor de los exitos en lo que sea que hagas o deseen a hacer a futuro y espero si alhuno presenta examen de admisión lo pase, y espero verlos siendo exitosos como ustdes decidan serlo y sobre todo siendo felices, aunque a veces me sacaban de quisio si los quiero y los voy a extrañar</p><p>Atte:su jefa de grupo que esperaba ya no serlo mas :3</p>', '2021-06-10', '05:15:40'),
(19, 32, '<p>Si alguno esta viendo esto, les deseo el mayor de los exitos en lo que sea que hagas o deseen a hacer a futuro y espero si alhuno presenta examen de admisión lo pase, y espero verlos siendo exitosos como ustdes decidan serlo y sobre todo siendo felices, aunque a veces me sacaban de quisio si los quiero y los voy a extrañar</p><p>Atte:su jefa de grupo que esperaba ya no serlo mas :3</p>', '2021-06-10', '05:15:44'),
(20, 25, '<h1>Mensaje de despedida para mi grupo 6AMPR</h1><p>Escribe tu mensaje aqui</p>', '2021-06-15', '04:59:43');

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
(21, 'Admin', 'Todos', 'Nuevos Cambios', '<p>Se han realizado algunos cambios para mejorar el rendimiento de la agenda para evitar consumir muchos recursos del servidor.</p><p><br></p><ul><li><strong>Botón de actualizar:</strong> Ahora cada vez que entres a la página deberás actualizar para estar al tanto de las nuevas actualizaciones.</li><li><strong>Modo offline: </strong>Puedes consultar la agenda incluso si estás fuera de línea. Esto es porque la última versión de la agenda se guardará en el caché del navegador.</li><li><strong>Uso de caché: </strong>Para el correcto funcionamiento de la agenda es recomendable que habilites el caché de tu navegador en casi de que no lo tengas activado (mayormente esta activado por defecto)</li></ul>', 0, '2021-04-04', '21:36:53');

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
(1, 'Aplicaciones Android', '00:00:00', '00:00:00'),
(2, 'Aplicaciones IOS', '00:00:00', '00:00:00'),
(3, 'Temas de Fisica', '00:00:00', '00:00:00'),
(4, 'Probabilidad y estadistica', '00:00:00', '00:00:00'),
(5, 'Filosofia', '00:00:00', '00:00:00'),
(6, 'Dibujo tecnico', '00:00:00', '00:00:00');

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

--
-- Volcado de datos para la tabla `tareacompletada_usuario`
--

INSERT INTO `tareacompletada_usuario` (`id`, `id_tarea`, `id_usuario`, `fecha`, `hora`) VALUES
(755, 128, 20, '2021-05-10', '20:18:36'),
(756, 124, 20, '2021-05-12', '13:58:45'),
(757, 126, 20, '2021-05-12', '13:59:00'),
(758, 128, 23, '2021-05-12', '15:42:56'),
(759, 127, 23, '2021-05-12', '17:17:03'),
(760, 125, 20, '2021-05-12', '18:49:10'),
(761, 127, 20, '2021-05-12', '19:10:15'),
(762, 128, 54, '2021-05-13', '02:11:35'),
(763, 125, 54, '2021-05-13', '02:11:44'),
(764, 128, 41, '2021-05-13', '04:24:04'),
(765, 125, 23, '2021-05-13', '12:57:54'),
(766, 130, 20, '2021-05-13', '12:58:45'),
(767, 130, 41, '2021-05-13', '20:13:59'),
(768, 128, 32, '2021-05-14', '00:00:18'),
(769, 128, 38, '2021-05-14', '00:26:11'),
(770, 124, 38, '2021-05-14', '00:26:19'),
(771, 124, 32, '2021-05-14', '01:13:08'),
(772, 124, 41, '2021-05-14', '04:48:40'),
(773, 124, 51, '2021-05-14', '10:32:39'),
(774, 126, 51, '2021-05-14', '10:32:43'),
(775, 127, 51, '2021-05-14', '10:32:47'),
(776, 125, 51, '2021-05-14', '10:32:50'),
(777, 128, 51, '2021-05-14', '10:35:05'),
(778, 127, 37, '2021-05-14', '16:45:59'),
(779, 124, 37, '2021-05-14', '16:53:06'),
(780, 125, 37, '2021-05-14', '16:54:01'),
(781, 126, 37, '2021-05-14', '17:24:59'),
(782, 125, 45, '2021-05-14', '18:09:39'),
(783, 127, 45, '2021-05-14', '18:12:41'),
(784, 124, 45, '2021-05-14', '18:24:04'),
(785, 124, 23, '2021-05-14', '18:36:12'),
(786, 126, 23, '2021-05-14', '18:36:19'),
(787, 129, 20, '2021-05-14', '19:49:38'),
(788, 126, 45, '2021-05-15', '00:09:41'),
(789, 129, 32, '2021-05-15', '00:26:10'),
(790, 125, 41, '2021-05-15', '01:57:57'),
(791, 128, 25, '2021-05-15', '02:11:14'),
(792, 124, 25, '2021-05-15', '02:11:29'),
(793, 126, 25, '2021-05-15', '02:11:34'),
(794, 129, 25, '2021-05-15', '02:11:52'),
(795, 129, 45, '2021-05-15', '02:16:29'),
(796, 126, 53, '2021-05-15', '02:33:16'),
(797, 124, 53, '2021-05-15', '02:33:20'),
(798, 126, 32, '2021-05-15', '02:44:55'),
(799, 130, 32, '2021-05-15', '02:51:16'),
(800, 128, 45, '2021-05-15', '02:53:29'),
(801, 130, 38, '2021-05-15', '03:02:05'),
(802, 126, 38, '2021-05-15', '03:02:08'),
(803, 127, 38, '2021-05-15', '03:02:10'),
(804, 131, 38, '2021-05-15', '03:02:14'),
(805, 125, 38, '2021-05-15', '03:02:17'),
(806, 128, 31, '2021-05-15', '03:33:59'),
(807, 126, 41, '2021-05-15', '03:49:53'),
(808, 129, 41, '2021-05-15', '03:50:00'),
(809, 126, 31, '2021-05-15', '03:58:58'),
(810, 124, 31, '2021-05-15', '03:59:06'),
(811, 129, 31, '2021-05-15', '03:59:11'),
(812, 127, 32, '2021-05-16', '21:15:04'),
(813, 127, 53, '2021-05-17', '06:48:35'),
(814, 131, 20, '2021-05-17', '16:58:36'),
(815, 132, 20, '2021-05-17', '17:29:33'),
(816, 125, 32, '2021-05-19', '01:58:22'),
(817, 130, 37, '2021-05-19', '22:41:24'),
(818, 130, 23, '2021-05-19', '23:29:18'),
(819, 131, 32, '2021-05-20', '03:41:50'),
(820, 131, 37, '2021-05-21', '00:50:45'),
(821, 130, 31, '2021-05-21', '04:01:13'),
(822, 125, 31, '2021-05-21', '04:09:35'),
(823, 133, 41, '2021-05-21', '04:33:19'),
(824, 130, 25, '2021-05-21', '04:43:07'),
(825, 130, 45, '2021-05-21', '04:44:11'),
(826, 137, 20, '2021-05-21', '18:16:46'),
(827, 133, 20, '2021-05-21', '18:28:29'),
(828, 131, 67, '2021-05-21', '21:36:51'),
(829, 131, 41, '2021-05-21', '22:05:33'),
(830, 133, 44, '2021-05-21', '23:03:04'),
(831, 131, 23, '2021-05-22', '00:23:04'),
(832, 133, 25, '2021-05-22', '00:27:43'),
(833, 131, 25, '2021-05-22', '00:27:49'),
(834, 137, 25, '2021-05-22', '00:28:10'),
(835, 133, 31, '2021-05-22', '02:44:56'),
(836, 131, 31, '2021-05-22', '02:45:01'),
(837, 132, 31, '2021-05-22', '02:45:05'),
(838, 133, 32, '2021-05-22', '04:34:08'),
(839, 137, 32, '2021-05-22', '04:34:21'),
(840, 132, 23, '2021-05-24', '02:22:04'),
(841, 142, 20, '2021-05-24', '18:08:49'),
(842, 139, 41, '2021-05-25', '18:05:10'),
(843, 140, 20, '2021-05-25', '21:07:15'),
(844, 143, 20, '2021-05-26', '20:56:17'),
(845, 139, 37, '2021-05-26', '23:20:29'),
(846, 139, 25, '2021-05-27', '01:48:39'),
(847, 139, 20, '2021-05-27', '03:03:50'),
(848, 140, 32, '2021-05-27', '12:21:29'),
(849, 141, 20, '2021-05-28', '02:31:24'),
(850, 140, 54, '2021-05-28', '03:13:15'),
(851, 135, 37, '2021-05-28', '03:29:03'),
(852, 140, 37, '2021-05-28', '03:29:08'),
(853, 140, 38, '2021-05-28', '16:59:44'),
(854, 140, 41, '2021-05-28', '17:51:17'),
(855, 140, 74, '2021-05-28', '20:36:00'),
(856, 140, 25, '2021-05-28', '22:12:46'),
(857, 143, 31, '2021-05-29', '00:50:48'),
(858, 141, 23, '2021-05-29', '01:31:37'),
(859, 141, 37, '2021-05-29', '02:13:18'),
(860, 141, 32, '2021-05-29', '02:17:50'),
(861, 140, 23, '2021-05-29', '02:22:35'),
(862, 142, 38, '2021-05-30', '07:40:47'),
(863, 142, 37, '2021-05-30', '15:50:51'),
(864, 143, 37, '2021-05-30', '15:50:55'),
(865, 135, 32, '2021-05-30', '19:12:05'),
(866, 142, 32, '2021-05-30', '21:40:22'),
(867, 135, 20, '2021-05-30', '22:26:37'),
(868, 136, 23, '2021-05-31', '00:38:35'),
(869, 142, 23, '2021-05-31', '00:38:51'),
(870, 142, 53, '2021-05-31', '02:25:30'),
(871, 135, 31, '2021-05-31', '03:51:20'),
(872, 142, 31, '2021-05-31', '03:51:25'),
(873, 136, 31, '2021-05-31', '03:51:33'),
(874, 135, 25, '2021-05-31', '04:43:42'),
(875, 145, 20, '2021-05-31', '13:24:23'),
(876, 147, 20, '2021-05-31', '13:24:32'),
(877, 148, 20, '2021-05-31', '21:35:18'),
(878, 136, 38, '2021-06-01', '04:35:41'),
(879, 136, 32, '2021-06-01', '11:43:28'),
(880, 144, 20, '2021-06-01', '22:57:18'),
(881, 136, 20, '2021-06-02', '02:29:20'),
(882, 145, 41, '2021-06-03', '20:20:25'),
(883, 144, 41, '2021-06-03', '22:33:19'),
(884, 147, 41, '2021-06-03', '22:33:28'),
(885, 146, 20, '2021-06-04', '02:01:24'),
(886, 149, 31, '2021-06-04', '04:03:38'),
(887, 144, 31, '2021-06-04', '10:33:56'),
(888, 144, 38, '2021-06-04', '18:11:57'),
(889, 147, 38, '2021-06-04', '18:12:09'),
(890, 146, 53, '2021-06-05', '01:10:23'),
(891, 144, 54, '2021-06-05', '01:11:06'),
(892, 146, 32, '2021-06-05', '02:06:48'),
(893, 145, 32, '2021-06-05', '02:06:54'),
(894, 144, 32, '2021-06-05', '02:06:59'),
(895, 144, 25, '2021-06-05', '03:48:27'),
(896, 145, 25, '2021-06-05', '03:49:01'),
(897, 146, 25, '2021-06-05', '03:49:06'),
(898, 149, 20, '2021-06-05', '16:16:18'),
(899, 153, 20, '2021-06-07', '16:31:41'),
(900, 151, 20, '2021-06-07', '16:31:47'),
(901, 147, 25, '2021-06-08', '23:05:49'),
(902, 152, 20, '2021-06-09', '00:50:53'),
(903, 153, 41, '2021-06-09', '01:51:10'),
(904, 152, 41, '2021-06-09', '02:27:20'),
(905, 153, 31, '2021-06-09', '08:54:29'),
(906, 147, 31, '2021-06-09', '08:54:37'),
(907, 155, 31, '2021-06-09', '08:56:16'),
(908, 153, 32, '2021-06-09', '13:47:53'),
(909, 147, 32, '2021-06-09', '13:48:06'),
(910, 148, 41, '2021-06-09', '20:09:56'),
(911, 151, 41, '2021-06-09', '20:10:04'),
(912, 147, 53, '2021-06-10', '03:11:43'),
(913, 151, 32, '2021-06-10', '05:12:25'),
(914, 154, 32, '2021-06-10', '05:12:30'),
(915, 148, 32, '2021-06-10', '05:12:42'),
(916, 150, 32, '2021-06-10', '05:16:25'),
(917, 155, 32, '2021-06-10', '05:19:40'),
(918, 148, 22, '2021-06-10', '06:22:45'),
(919, 154, 22, '2021-06-10', '06:22:48'),
(920, 151, 22, '2021-06-10', '06:22:53'),
(921, 154, 25, '2021-06-10', '20:29:47'),
(922, 148, 25, '2021-06-11', '04:57:38'),
(923, 151, 25, '2021-06-11', '04:57:42');

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

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `materia`, `nombre`, `url`, `fecha_limite`, `hora_limite`) VALUES
(124, 'Filosofia', 'Actividad 1: Cuestionario diagnóstico', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13436', '2021-05-14', '23:00:00'),
(125, 'Filosofia', 'Foro: Sentido de la vida', 'https://cbtis28-2021.ozelot.tech/mod/forum/view.php?id=13437&forceview=1', '2021-06-04', '23:00:00'),
(126, 'Filosofia', 'Actividad 2: Condiciones afectivas', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13461&forceview=1', '2021-05-14', '23:00:00'),
(127, 'Filosofia', 'Foro: Ser mexicano', 'https://cbtis28-2021.ozelot.tech/mod/forum/view.php?id=13462&forceview=1', '2021-05-17', '06:00:00'),
(128, 'Probabilidad y estadistica', 'Foro 5: Diagramas de Venn', 'https://cbtis28-2021.ozelot.tech/mod/forum/view.php?id=14899', '2021-05-14', '23:59:00'),
(129, 'Dibujo tecnico', 'Trazos y poligonos', '#', '2021-05-14', '23:00:00'),
(130, 'Temas de Fisica', 'Foro de participación: Interacciones electromagnéticas', 'https://cbtis28-2021.ozelot.tech/mod/forum/discuss.php?d=899', '2021-05-20', '23:59:00'),
(131, 'Filosofia', 'Actividad 3: Planteamientos afectivos', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13463', '2021-05-21', '23:00:00'),
(132, 'ConstruyeT', 'Actividad 1: Agente de cambio', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15180', '2021-05-23', '23:50:00'),
(133, 'Probabilidad y estadistica', 'Representación y agrupación de datos en conjuntos', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15168', '2021-05-21', '23:59:00'),
(135, 'Temas de Fisica', 'Actividad de aprendizaje 3', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15362', '2021-05-30', '23:59:00'),
(136, 'Temas de Fisica', 'Documento de apoyo proyecto final', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15363&forceview=1', '2021-06-01', '23:59:00'),
(137, 'Dibujo tecnico', 'Dibujos semana 17-21 Mayo', '#', '2021-05-21', '23:59:00'),
(139, 'Probabilidad y estadistica', 'Operaciones con conjuntos', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15344&forceview=1', '2021-05-26', '23:59:00'),
(140, 'Filosofia', 'Actividad 4: Mi persona', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13464', '2021-05-28', '23:00:00'),
(141, 'Filosofia', 'Asistencia 1: 24-28 de Mayo', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15476&forceview=1', '2021-05-28', '23:00:00'),
(142, 'ConstruyeT', 'Actividad 2: Construyete', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15181&forceview=1', '2021-05-30', '23:00:00'),
(143, 'Dibujo tecnico', 'Dibujos 25-30 Mayo: Proyecciones cónicas', '#', '2021-05-30', '12:00:00'),
(144, 'Filosofia', 'Asistencia 2: 31 Mayo - 4 Junio', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15477', '2021-06-04', '23:00:00'),
(145, 'Filosofia', 'Actividad 5: Relación cuerpo y alma', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13465&forceview=1', '2021-06-04', '23:00:00'),
(146, 'Filosofia', 'Trabajo final del parcial', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=13467&forceview=1', '2021-06-04', '23:00:00'),
(147, 'Aplicaciones Android', 'Proyecto final del  parcial: Aplicación movil', '#', '2021-06-09', '23:59:00'),
(148, 'Probabilidad y estadistica', 'Actividades Khan Academy', 'https://es.khanacademy.org/', '2021-06-10', '23:59:00'),
(149, 'Dibujo tecnico', 'Dibujos semana 1 Junio - 5 Junio', '#', '2021-06-05', '12:00:00'),
(150, 'Agenda 6ampr', 'Agrega un mensaje para tu grupo', 'https://agendaescolar6ampr.000webhostapp.com/despedida.php', '2021-06-30', '00:00:00'),
(151, 'Probabilidad y estadistica', 'Actividades khanacademy', 'https://cbtis28-2021.ozelot.tech/mod/checkmark/view.php?id=16031', '2021-06-10', '23:59:00'),
(152, 'Probabilidad y estadistica', 'Calculo de probabilidades de eventos dados', 'https://cbtis28-2021.ozelot.tech/mod/assign/view.php?id=15907', '2021-06-08', '23:59:00'),
(153, 'Probabilidad y estadistica', 'Foro 6: Reflexión del tercer parcial', 'https://cbtis28-2021.ozelot.tech/mod/forum/view.php?id=16032', '2021-06-09', '23:59:00'),
(154, 'Probabilidad y estadistica', 'Evaluación automatizada tercer parcial', 'https://cbtis28-2021.ozelot.tech/mod/quiz/view.php?id=16033', '2021-06-10', '17:00:00'),
(155, 'Agenda 6ampr', 'Contesta una encuesta sobre tu experiencia usando la agenda escolar', 'https://forms.gle/BekPyqjFitDMio4z7', '2021-06-30', '23:59:00');

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
(25, 'Isaac', 'Lugo', 'isaac_lugo_pat492', '#810b8b', ''),
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
(74, 'Omar', 'Piña ', 'omar2653', '#223472', ''),
(75, 'Agenda 6AMPR', 'Agenda Escolar', 'agendalorem', '#ff5a0f', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tareacompletada_usuario`
--
ALTER TABLE `tareacompletada_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
