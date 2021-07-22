-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 07:32:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emisora_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_sem`
--

CREATE TABLE `dias_sem` (
  `dia_id` int(22) NOT NULL,
  `dia_nombre` varchar(155) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias_sem`
--

INSERT INTO `dias_sem` (`dia_id`, `dia_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SÁBADO', NULL, NULL, NULL),
(2, 'DOMINGO', NULL, NULL, NULL),
(3, 'LUNES', NULL, NULL, NULL),
(4, 'MARTES', NULL, NULL, NULL),
(5, 'MIERCOLES', NULL, NULL, NULL),
(6, 'JUEVES', NULL, NULL, NULL),
(7, 'VIERNES', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `ga_id` int(22) NOT NULL,
  `ga_url` varchar(165) NOT NULL,
  `user_id` int(22) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `gethorarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `gethorarios` (
`hor_id` int(22)
,`horario` varchar(165)
,`descripcion` varchar(265)
,`frase` varchar(155)
,`user_id` int(22)
,`dia_id` int(22)
,`dia_nombre` varchar(155)
,`te_id` int(22)
,`te_nombre` varchar(255)
,`te_nick` varchar(45)
,`te_image` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `hor_id` int(22) NOT NULL,
  `dia_id` int(22) NOT NULL,
  `horario` varchar(165) NOT NULL,
  `descripcion` varchar(265) NOT NULL,
  `frase` varchar(155) NOT NULL,
  `te_id` int(22) NOT NULL,
  `user_id` int(22) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`hor_id`, `dia_id`, `horario`, `descripcion`, `frase`, `te_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '08:30 - 10:00 pm', 'iny Time Talks', 'RJ Farjana', 1, 5, NULL, NULL, NULL),
(2, 7, '09:15 - 10:45 pm', 'Reacción pública', 'RJ Mahmud', 2, 5, NULL, NULL, NULL),
(3, 2, '03:15 - 04:55 am', 'Historia de pareja', 'RJ Ayman', 3, 5, NULL, NULL, NULL),
(4, 1, '02:45 - 03:10 pm', 'Reacción pública hola', 'RJ Tahmina', 4, 5, NULL, NULL, NULL),
(5, 2, '08:00 - 10:00 pm', 'Tiny Time Talks', 'RJ Mahmud', 12, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_canciones`
--

CREATE TABLE `pedido_canciones` (
  `pedc_id` int(11) NOT NULL,
  `pedc_artista` int(22) NOT NULL,
  `pedc_titulo` varchar(250) NOT NULL,
  `pedc_dedicado` varchar(190) NOT NULL,
  `pesc_nombre` varchar(190) NOT NULL,
  `pedc_email` varchar(195) NOT NULL,
  `pedido_cancionescol` varchar(130) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_social`
--

CREATE TABLE `red_social` (
  `red_id` int(22) NOT NULL,
  `red_nombre` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(22) NOT NULL,
  `rol_name` varchar(80) NOT NULL,
  `rol_active` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_name`, `rol_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'SI', NULL, NULL, NULL),
(2, 'user', 'SI', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `te_id` int(22) NOT NULL,
  `te_nombre` varchar(255) NOT NULL,
  `te_nick` varchar(45) NOT NULL,
  `te_image` varchar(300) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`te_id`, `te_nombre`, `te_nick`, `te_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Juan perez', 'Radio Jockey', 'team-1.jpg', NULL, NULL, NULL),
(2, 'Amenlinda Amada', 'Dj Amelinda', 'team-2.jpg', NULL, NULL, NULL),
(3, 'Manuel Medrano', 'Dj mañe', 'team-3.jpg', NULL, NULL, NULL),
(4, 'Luis Garcia', 'Dj lucho', 'team-4.jpg', NULL, NULL, NULL),
(5, 'Andres Villalobos', 'Dj Andre', 'team-5.jpg', NULL, NULL, NULL),
(6, 'Chelsea Gutierrez', 'Dj Chelsea', 'team-6.jpg', NULL, NULL, NULL),
(7, 'Maria Gonzalez', 'Dj mary', 'team-7.jpg', NULL, NULL, NULL),
(8, 'Victor Pavon', 'Dj vicpa', 'team-8.jpg', NULL, NULL, NULL),
(9, 'Ruber Cartagena', 'Dj ruber', 'team-9.jpg', NULL, NULL, NULL),
(10, 'Amalia Acosta', 'D Amalia', 'team-10.jpg', NULL, NULL, NULL),
(11, 'Miron Mahmud', 'Dj jj', 'team-11.jpg', NULL, NULL, NULL),
(12, 'Deivinson Schmalbach', 'Dj david', 'team-12.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams_red_social`
--

CREATE TABLE `teams_red_social` (
  `red_id` int(22) NOT NULL,
  `teams_red_socialcol` varchar(45) NOT NULL,
  `team_url` varchar(165) NOT NULL,
  `te_id` int(22) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(22) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `rol_id` int(22) NOT NULL,
  `user_mail` varchar(200) NOT NULL,
  `user_pass` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-14 01:17:13',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `rol_id`, `user_mail`, `user_pass`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Deivinson Schmalbach', 1, 'deivinson7059@gmail.com', '$2y$10$1gUh6w4zMNclLX/Xjiiy7.FTPH54EMScgVbo9GrmsXIp83E3PhCjm', '2021-07-20 20:27:44', '2021-07-20 20:27:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `vi_id` int(22) NOT NULL,
  `vi_url` varchar(165) NOT NULL,
  `vi_descripcion` varchar(255) NOT NULL,
  `user_id` int(22) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura para la vista `gethorarios`
--
DROP TABLE IF EXISTS `gethorarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gethorarios`  AS SELECT `h`.`hor_id` AS `hor_id`, `h`.`horario` AS `horario`, `h`.`descripcion` AS `descripcion`, `h`.`frase` AS `frase`, `h`.`user_id` AS `user_id`, `d`.`dia_id` AS `dia_id`, `d`.`dia_nombre` AS `dia_nombre`, `t`.`te_id` AS `te_id`, `t`.`te_nombre` AS `te_nombre`, `t`.`te_nick` AS `te_nick`, `t`.`te_image` AS `te_image` FROM ((`horarios` `h` join `dias_sem` `d` on(`d`.`dia_id` = `h`.`dia_id`)) join `teams` `t` on(`t`.`te_id` = `h`.`te_id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dias_sem`
--
ALTER TABLE `dias_sem`
  ADD PRIMARY KEY (`dia_id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`ga_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`hor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dia_id` (`dia_id`),
  ADD KEY `te_id` (`te_id`);

--
-- Indices de la tabla `pedido_canciones`
--
ALTER TABLE `pedido_canciones`
  ADD PRIMARY KEY (`pedc_artista`);

--
-- Indices de la tabla `red_social`
--
ALTER TABLE `red_social`
  ADD PRIMARY KEY (`red_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`te_id`);

--
-- Indices de la tabla `teams_red_social`
--
ALTER TABLE `teams_red_social`
  ADD KEY `red_social_red_id` (`red_id`),
  ADD KEY `te_id` (`te_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dias_sem`
--
ALTER TABLE `dias_sem`
  MODIFY `dia_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `hor_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido_canciones`
--
ALTER TABLE `pedido_canciones`
  MODIFY `pedc_artista` int(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `red_social`
--
ALTER TABLE `red_social`
  MODIFY `red_id` int(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `te_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `vi_id` int(22) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`dia_id`) REFERENCES `dias_sem` (`dia_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horarios_ibfk_3` FOREIGN KEY (`te_id`) REFERENCES `teams` (`te_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teams_red_social`
--
ALTER TABLE `teams_red_social`
  ADD CONSTRAINT `teams_red_social_ibfk_1` FOREIGN KEY (`te_id`) REFERENCES `teams` (`te_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_red_social_ibfk_2` FOREIGN KEY (`red_id`) REFERENCES `red_social` (`red_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
