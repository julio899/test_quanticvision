-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2019 a las 15:25:21
-- Versión del servidor: 5.7.21-1
-- Versión de PHP: 7.0.29-1+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `activo` smallint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'ADMIN', 'Administrador', 1),
(2, 'USER', 'Operador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `activo` smallint(11) DEFAULT NULL,
  `avatar` varchar(150) NOT NULL,
  `Rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombres`, `apellidos`, `email`, `telefono`, `username`, `password`, `fecha_creacion`, `activo`, `avatar`, `Rol_id`) VALUES
(1, 'Julio', 'Vinachi', 'julio899@gmail.com', '0243-271', 'julio899', 'vinachi89', '2019-03-16', 1, 'https://avatars3.githubusercontent.com/u/2575745?s=460&v=4', 1),
(158, 'coralie', 'smeekes', 'coralie.smeekes@example.com', '(166)-533-5462', 'smalldog567', 'xerxes', '2004-05-13', 1, 'https://randomuser.me/api/portraits/women/31.jpg', 2),
(159, 'walter', 'matthews', 'walter.matthews@example.com', '061-308-1239', 'blueelephant717', '1995', '2015-12-28', 1, 'https://randomuser.me/api/portraits/men/15.jpg', 2),
(160, 'frédéric', 'joly', 'frédéric.joly@example.com', '(539)-026-8624', 'crazybird393', 'twist', '2002-08-22', 1, 'https://randomuser.me/api/portraits/men/97.jpg', 1),
(161, 'lucien', 'denis', 'lucien.denis@example.com', '03-08-63-63-18', 'yellowrabbit566', 'charisma', '2004-11-13', 1, 'https://randomuser.me/api/portraits/men/22.jpg', 1),
(162, 'mathys', 'rolland', 'mathys.rolland@example.com', '02-64-89-94-84', 'sadbear486', 'redhot', '2014-05-31', 1, 'https://randomuser.me/api/portraits/men/20.jpg', 2),
(163, 'lia', 'carpentier', 'lia.carpentier@example.com', '05-30-42-55-07', 'smalltiger499', 'orange1', '2005-12-25', 1, 'https://randomuser.me/api/portraits/women/96.jpg', 1),
(164, 'melissa', 'george', 'melissa.george@example.com', '01981 67702', 'organicgorilla903', 'mancity', '2002-07-27', 1, 'https://randomuser.me/api/portraits/women/56.jpg', 2),
(165, 'faith', 'marshall', 'faith.marshall@example.com', '017684 86527', 'silverdog831', 'bank', '2010-08-27', 1, 'https://randomuser.me/api/portraits/women/80.jpg', 1),
(166, 'troy', 'johnsrud', 'troy.johnsrud@example.com', '86146848', 'angrymeercat719', 'attack', '2013-06-28', 1, 'https://randomuser.me/api/portraits/men/27.jpg', 1),
(167, 'carla', 'ter veen', 'carla.terveen@example.com', '(740)-010-0157', 'whitekoala397', 'babycake', '2006-10-01', 1, 'https://randomuser.me/api/portraits/women/68.jpg', 1),
(168, 'eevi', 'rantanen', 'eevi.rantanen@example.com', '04-716-870', 'crazydog228', 'secret', '2013-12-22', 1, 'https://randomuser.me/api/portraits/women/20.jpg', 1),
(169, 'esma', 'baykam', 'esma.baykam@example.com', '(125)-064-1354', 'ticklishmouse244', 'firefigh', '2013-12-13', 1, 'https://randomuser.me/api/portraits/women/86.jpg', 1),
(170, 'leire', 'araújo', 'leire.araújo@example.com', '(16) 0905-5168', 'ticklishduck477', 'perkins', '2013-08-04', 1, 'https://randomuser.me/api/portraits/women/59.jpg', 2),
(171, 'tina', 'mercier', 'tina.mercier@example.com', '(533)-180-9323', 'bluetiger593', 'bowtie', '2003-10-22', 1, 'https://randomuser.me/api/portraits/women/77.jpg', 1),
(172, 'farzana', 'tjoelker', 'farzana.tjoelker@example.com', '(010)-867-3965', 'sadwolf385', 'carmel', '2008-06-30', 1, 'https://randomuser.me/api/portraits/women/75.jpg', 1),
(173, 'antonin', 'vidal', 'antonin.vidal@example.com', '04-45-47-20-50', 'happymouse881', 'alisha', '2014-06-13', 1, 'https://randomuser.me/api/portraits/men/1.jpg', 1),
(174, 'آریا', 'نجاتی', 'آریا.نجاتی@example.com', '023-05757038', 'blackkoala353', 'boricua', '2008-05-14', 1, 'https://randomuser.me/api/portraits/men/22.jpg', 1),
(175, 'mouaad', 'de kanter', 'mouaad.dekanter@example.com', '(484)-736-0021', 'bluepeacock598', 'goodboy', '2003-12-09', 1, 'https://randomuser.me/api/portraits/men/57.jpg', 1),
(176, 'naresh', 'slaats', 'naresh.slaats@example.com', '(434)-454-0790', 'crazysnake820', 'tabasco', '2010-03-04', 1, 'https://randomuser.me/api/portraits/men/64.jpg', 1),
(177, 'brooke', 'wright', 'brooke.wright@example.com', '(575)-942-6763', 'heavyzebra192', 'steph', '2013-02-04', 1, 'https://randomuser.me/api/portraits/women/14.jpg', 1),
(178, 'noor', 'hoem', 'noor.hoem@example.com', '39113777', 'heavypeacock291', 'womans', '2013-07-31', 1, 'https://randomuser.me/api/portraits/women/37.jpg', 1),
(179, 'alwin', 'dreier', 'alwin.dreier@example.com', '0153-0528909', 'smallkoala612', 'asimov', '2002-05-17', 1, 'https://randomuser.me/api/portraits/men/96.jpg', 2),
(180, 'emil', 'leinonen', 'emil.leinonen@example.com', '02-685-871', 'orangefrog114', 'lucky7', '2015-10-31', 1, 'https://randomuser.me/api/portraits/men/89.jpg', 2),
(181, 'ceyhan', 'sezek', 'ceyhan.sezek@example.com', '(957)-204-1752', 'whitezebra156', 'melina', '2015-11-15', 1, 'https://randomuser.me/api/portraits/women/42.jpg', 2),
(182, 'daniel', 'lepisto', 'daniel.lepisto@example.com', '02-589-472', 'orangeelephant312', 'broncos1', '2015-12-26', 1, 'https://randomuser.me/api/portraits/men/28.jpg', 1),
(183, 'denise', 'jimenez', 'denise.jimenez@example.com', '(310)-860-3448', 'yellowfish108', 'nylons', '2005-04-08', 1, 'https://randomuser.me/api/portraits/women/20.jpg', 1),
(184, 'elmano', 'monteiro', 'elmano.monteiro@example.com', '(48) 8461-4503', 'orangeduck520', 'bigdaddy', '2011-10-29', 1, 'https://randomuser.me/api/portraits/men/16.jpg', 1),
(185, 'ethan', 'roche', 'ethan.roche@example.com', '(173)-967-1631', 'bluefrog979', 'break', '2017-01-01', 1, 'https://randomuser.me/api/portraits/men/42.jpg', 1),
(186, 'mia', 'ray', 'mia.ray@example.com', '(632)-761-1651', 'greenpanda117', 'gang', '2006-02-23', 1, 'https://randomuser.me/api/portraits/women/65.jpg', 1),
(187, 'lori', 'newman', 'lori.newman@example.com', '00-7095-4231', 'silverladybug869', 'papers', '2007-06-28', 1, 'https://randomuser.me/api/portraits/women/6.jpg', 1),
(188, 'sedef', 'özberk', 'sedef.özberk@example.com', '(297)-443-5419', 'organicfrog981', 'crow', '2003-08-20', 1, 'https://randomuser.me/api/portraits/women/18.jpg', 1),
(189, 'amy', 'clark', 'amy.clark@example.com', '054-413-6244', 'greencat859', 'honey', '2015-10-04', 1, 'https://randomuser.me/api/portraits/women/23.jpg', 2),
(190, 'mia', 'patel', 'mia.patel@example.com', '022-153-7063', 'browndog934', 'listen', '2010-07-25', 1, 'https://randomuser.me/api/portraits/women/56.jpg', 2),
(191, 'nalan', 'çamdalı', 'nalan.çamdalı@example.com', '(739)-884-3571', 'happywolf515', 'jellybea', '2008-11-14', 1, 'https://randomuser.me/api/portraits/women/76.jpg', 2),
(192, 'kaya', 'örge', 'kaya.örge@example.com', '(677)-419-4650', 'blackostrich849', 'gamecube', '2008-08-13', 1, 'https://randomuser.me/api/portraits/men/49.jpg', 2),
(193, 'martinus', 'selstad', 'martinus.selstad@example.com', '52997470', 'angryostrich276', 'sushi', '2013-02-26', 1, 'https://randomuser.me/api/portraits/men/86.jpg', 1),
(194, 'nihal', 'pekkan', 'nihal.pekkan@example.com', '(339)-426-9529', 'goldenbird887', 'xiong', '2017-06-30', 1, 'https://randomuser.me/api/portraits/men/96.jpg', 1),
(195, 'mina', 'lopez', 'mina.lopez@example.com', '(442)-731-9868', 'angryswan728', 'delilah', '2005-10-14', 1, 'https://randomuser.me/api/portraits/women/86.jpg', 1),
(196, 'eugenia', 'cruz', 'eugenia.cruz@example.com', '922-382-093', 'angrymeercat804', 'shotgun', '2009-01-17', 1, 'https://randomuser.me/api/portraits/women/3.jpg', 1),
(197, 'gabriel', 'gutierrez', 'gabriel.gutierrez@example.com', '991-125-284', 'beautifuldog981', 'jester', '2009-01-06', 1, 'https://randomuser.me/api/portraits/men/81.jpg', 1),
(198, 'siebrand', 'van wijnen', 'siebrand.vanwijnen@example.com', '(727)-949-2093', 'biglion659', 'gmoney', '2007-08-14', 1, 'https://randomuser.me/api/portraits/men/43.jpg', 2),
(199, 'annette', 'roche', 'annette.roche@example.com', '(064)-720-1651', 'bigpeacock692', 'memorex', '2013-03-16', 1, 'https://randomuser.me/api/portraits/women/37.jpg', 2),
(200, 'alice', 'morin', 'alice.morin@example.com', '174-946-5812', 'happytiger148', 'cowboy1', '2012-06-06', 1, 'https://randomuser.me/api/portraits/women/14.jpg', 2),
(201, 'carlos', 'bennett', 'carlos.bennett@example.com', '06-5000-9715', 'orangecat744', 'xfiles', '2013-02-20', 1, 'https://randomuser.me/api/portraits/men/66.jpg', 1),
(202, 'alisa', 'koskinen', 'alisa.koskinen@example.com', '04-533-874', 'redbutterfly845', 'faster', '2002-05-16', 1, 'https://randomuser.me/api/portraits/women/3.jpg', 1),
(203, 'samantha', 'white', 'samantha.white@example.com', '061-168-4814', 'goldenfish496', 'wolf359', '2009-08-30', 1, 'https://randomuser.me/api/portraits/women/48.jpg', 2),
(204, 'meral', 'köybaşı', 'meral.köybaşı@example.com', '(144)-532-6141', 'bigzebra261', 'chico', '2009-09-11', 1, 'https://randomuser.me/api/portraits/women/84.jpg', 1),
(205, 'fedor', 'baldauf', 'fedor.baldauf@example.com', '0994-2574963', 'whitetiger638', 'paramedi', '2008-12-12', 1, 'https://randomuser.me/api/portraits/men/20.jpg', 1),
(206, 'andreas', 'pedersen', 'andreas.pedersen@example.com', '49236829', 'greenfrog260', '4567', '2004-06-04', 1, 'https://randomuser.me/api/portraits/men/61.jpg', 2),
(207, 'lærke', 'thomsen', 'lærke.thomsen@example.com', '17796449', 'smallduck156', 'busted', '2014-07-11', 1, 'https://randomuser.me/api/portraits/women/10.jpg', 1),
(208, 'wera', 'sadowski', 'wera.sadowski@example.com', '0183-6219333', 'greenrabbit417', 'harcore', '2007-03-30', 1, 'https://randomuser.me/api/portraits/women/34.jpg', 1),
(209, 'ivan', 'moreno', 'ivan.moreno@example.com', '947-733-048', 'sadpeacock488', 'hawaiian', '2014-11-19', 1, 'https://randomuser.me/api/portraits/men/57.jpg', 2),
(210, 'mia', 'snyder', 'mia.snyder@example.com', '016973 99978', 'organicsnake408', 'babycake', '2009-03-02', 1, 'https://randomuser.me/api/portraits/women/39.jpg', 1),
(211, 'onata', 'santos', 'onata.santos@example.com', '(74) 5963-9321', 'sadleopard666', 'thecure', '2015-07-25', 1, 'https://randomuser.me/api/portraits/women/95.jpg', 2),
(212, 'nikoline', 'nyland', 'nikoline.nyland@example.com', '64958311', 'crazyrabbit805', 'wind', '2009-09-23', 1, 'https://randomuser.me/api/portraits/women/11.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Usuario_Rol1_idx` (`Rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Rol_id`) REFERENCES `Rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
