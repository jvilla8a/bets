-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2015 a las 18:32:44
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bet`
--

CREATE TABLE `bet` (
  `id` int(11) NOT NULL,
  `idnick` int(11) NOT NULL,
  `idmatch` int(11) NOT NULL,
  `idwinner` int(11) NOT NULL,
  `idmvp` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `league`
--

CREATE TABLE `league` (
  `id` int(11) NOT NULL,
  `idregion` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `league`
--

INSERT INTO `league` (`id`, `idregion`, `name`, `active`) VALUES
(1, 1, 'NA LCS', 1),
(2, 2, 'EU LCS', 1),
(3, 3, 'LCK', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `season` int(11) NOT NULL,
  `split` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `match`
--

INSERT INTO `match` (`id`, `date`, `active`, `season`, `split`) VALUES
(1, '2015-11-28 00:00:00', 1, 5, 'spring'),
(9, '2015-11-29 00:00:00', 1, 5, 'spring'),
(10, '2015-11-29 00:00:00', 1, 5, 'spring'),
(11, '2015-12-24 00:00:00', 0, 6, 'summer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `summoner` varchar(255) NOT NULL,
  `idteam` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `player`
--

INSERT INTO `player` (`id`, `summoner`, `idteam`, `active`) VALUES
(1, 'Bjergsen', 1, 1),
(2, 'xPeke', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playermatchhistory`
--

CREATE TABLE `playermatchhistory` (
  `id` int(11) NOT NULL,
  `idplayer` int(11) NOT NULL,
  `idmatch` int(11) NOT NULL,
  `kills` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `mvp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `playermatchhistory`
--

INSERT INTO `playermatchhistory` (`id`, `idplayer`, `idmatch`, `kills`, `deaths`, `assists`, `mvp`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(5, 2, 10, 0, 0, 0, 0),
(6, 1, 11, 0, 0, 0, 0),
(7, 2, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `name`, `active`) VALUES
(1, 'North America', 1),
(2, 'Europe', 0),
(3, 'Korea', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortname` char(3) NOT NULL,
  `idleague` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id`, `name`, `shortname`, `idleague`, `active`) VALUES
(1, 'Team Solo Mid', 'TSM', 1, 1),
(2, 'Counter Logic Gaming', 'CLG', 1, 0),
(3, 'Origen', 'OG', 2, 1),
(4, 'Fnatic', 'FNC', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teammatchhistory`
--

CREATE TABLE `teammatchhistory` (
  `id` int(11) NOT NULL,
  `idmatch` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `side` tinyint(1) NOT NULL,
  `winner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teammatchhistory`
--

INSERT INTO `teammatchhistory` (`id`, `idmatch`, `idteam`, `side`, `winner`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 2, 0, 0),
(14, 9, 4, 1, 0),
(15, 9, 3, 0, 0),
(16, 10, 3, 1, 0),
(17, 10, 4, 0, 0),
(18, 11, 1, 1, 0),
(19, 11, 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `summoner` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `idregion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idregion` (`idregion`);

--
-- Indices de la tabla `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `summoner` (`summoner`),
  ADD KEY `idteam` (`idteam`);

--
-- Indices de la tabla `playermatchhistory`
--
ALTER TABLE `playermatchhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmatch` (`idmatch`),
  ADD KEY `idplayer` (`idplayer`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idleague` (`idleague`);

--
-- Indices de la tabla `teammatchhistory`
--
ALTER TABLE `teammatchhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmatch` (`idmatch`,`idteam`),
  ADD KEY `teammatchhistory_ibfk_2` (`idteam`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bet`
--
ALTER TABLE `bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `playermatchhistory`
--
ALTER TABLE `playermatchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `teammatchhistory`
--
ALTER TABLE `teammatchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `league`
--
ALTER TABLE `league`
  ADD CONSTRAINT `league_ibfk_1` FOREIGN KEY (`idregion`) REFERENCES `region` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`idteam`) REFERENCES `team` (`id`);

--
-- Filtros para la tabla `playermatchhistory`
--
ALTER TABLE `playermatchhistory`
  ADD CONSTRAINT `playermatchhistory_ibfk_1` FOREIGN KEY (`idmatch`) REFERENCES `match` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playermatchhistory_ibfk_2` FOREIGN KEY (`idplayer`) REFERENCES `player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`idleague`) REFERENCES `league` (`id`);

--
-- Filtros para la tabla `teammatchhistory`
--
ALTER TABLE `teammatchhistory`
  ADD CONSTRAINT `teammatchhistory_ibfk_1` FOREIGN KEY (`idmatch`) REFERENCES `match` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teammatchhistory_ibfk_2` FOREIGN KEY (`idteam`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
