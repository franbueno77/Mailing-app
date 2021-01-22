-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2020 a las 08:15:00
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `outlaws`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `idTag` int(11) NOT NULL,
  `etiqueta` varchar(50) NOT NULL,
  `color` char(7) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`idTag`, `etiqueta`, `color`) VALUES
(1, 'in', '#27db73'),
(2, 'vestibulum', '#bed95a'),
(3, 'dis', '#7c5bd7'),
(4, 'augue', '#ad6a87'),
(5, 'ut', '#f6eae5'),
(6, 'sed', '#f22746'),
(7, 'diam', '#44b36a'),
(8, 'nullam', '#6525e5'),
(9, 'in', '#d9db43'),
(10, 'nonummy', '#adecb6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMen` int(11) NOT NULL,
  `idOri` int(11) NOT NULL,
  `idDes` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `asunto` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idMen`, `idOri`, `idDes`, `fecha`, `asunto`, `texto`, `leido`) VALUES
(1, 6, 5, '2014-12-08 22:00:00', 'rhoncus aliquam lacus morbi', 'luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient', 0),
(2, 4, 5, '2020-12-16 18:54:00', 'posuere cubilia curae nulla dapibus', 'nulla suscipit ligula in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet', 1),
(3, 1, 4, '2020-12-16 18:54:00', 'scelerisque mauris sit amet eros', 'quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce', 1),
(4, 5, 6, '2020-12-15 19:09:57', 'quis orci nullam molestie', 'orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt', 0),
(5, 2, 5, '2020-12-16 18:54:00', 'in leo maecenas pulvinar lobortis', 'sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel', 1),
(6, 1, 3, '2020-12-16 18:54:00', 'consequat varius integer ac', 'laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui', 1),
(7, 6, 5, '1991-07-26 20:00:00', 'diam nam tristique tortor', 'ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo', 0),
(8, 2, 5, '2020-12-16 18:54:00', 'vivamus in felis eu', 'venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat', 1),
(9, 6, 2, '2020-12-16 18:54:00', 'accumsan tortor quis', 'in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea', 1),
(10, 3, 5, '2017-01-23 22:00:00', 'bibendum felis sed interdum', 'morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu', 0),
(11, 1, 5, '2020-12-16 18:54:00', 'nisi vulputate nonummy maecenas', 'eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla', 1),
(12, 4, 2, '2020-12-16 18:54:00', 'nulla nisl nunc', 'curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis', 1),
(13, 5, 6, '2020-12-16 18:54:00', 'sit amet diam in magna', 'vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida', 1),
(14, 3, 1, '2020-12-16 18:54:00', 'metus arcu adipiscing', 'eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio', 1),
(15, 3, 4, '2020-12-16 18:54:00', 'consequat ut nulla sed', 'accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget', 1),
(16, 1, 4, '2020-01-01 22:00:00', 'velit vivamus vel nulla', 'est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit', 0),
(17, 3, 5, '2019-06-24 20:00:00', 'urna pretium nisl ut', 'posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum', 0),
(18, 3, 5, '2020-12-16 18:54:00', 'ullamcorper augue a suscipit', 'consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio', 1),
(19, 3, 2, '2020-12-16 18:54:00', 'adipiscing elit proin', 'donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu', 1),
(20, 2, 4, '2020-12-16 18:54:00', 'erat curabitur gravida', 'at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque', 1),
(21, 5, 6, '2020-12-16 18:54:00', 'in faucibus orci luctus et', 'pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat', 1),
(22, 6, 3, '2020-12-16 18:54:00', 'a odio in', 'blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede', 1),
(23, 1, 4, '2020-12-16 18:54:00', 'consequat varius integer ac leo', 'nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis', 1),
(24, 2, 1, '1996-09-03 20:00:00', 'mattis odio donec vitae nisi', 'id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris', 0),
(25, 6, 5, '2020-12-16 18:54:00', 'lobortis est phasellus', 'vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id', 1),
(26, 6, 4, '2005-10-13 20:00:00', 'convallis eget eleifend luctus', 'augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam', 0),
(27, 4, 2, '2006-12-06 22:00:00', 'in hac habitasse', 'elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl', 0),
(28, 3, 6, '2018-02-18 22:00:00', 'odio porttitor id consequat', 'nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in', 0),
(29, 5, 3, '2020-12-16 18:54:00', 'in imperdiet et', 'est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan', 1),
(30, 1, 2, '2020-12-16 18:54:00', 'nulla suspendisse potenti cras', 'lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum', 1),
(31, 6, 3, '2020-12-16 18:54:00', 'quis lectus suspendisse', 'consequat in consequat ut nulla sed accumsan felis ut at dolor', 1),
(32, 4, 2, '2009-07-15 20:00:00', 'odio curabitur convallis duis consequat', 'ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis', 0),
(33, 1, 2, '2020-12-16 18:54:00', 'rutrum at lorem integer tincidunt', 'ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante', 1),
(34, 5, 6, '1995-11-25 22:00:00', 'sit amet diam in', 'massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque', 0),
(35, 3, 2, '2020-11-10 22:00:00', 'vivamus tortor duis mattis egestas', 'eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in', 0),
(36, 1, 3, '2008-08-18 20:00:00', 'primis in faucibus', 'augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent', 0),
(37, 3, 6, '2020-12-15 19:10:09', 'sem duis aliquam convallis', 'phasellus in felis donec semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut', 0),
(38, 3, 6, '2012-03-10 22:00:00', 'sit amet justo', 'erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed', 0),
(39, 6, 5, '2020-12-16 18:54:00', 'sit amet sem', 'odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet', 1),
(40, 1, 4, '2020-12-16 18:54:00', 'volutpat in congue etiam justo', 'libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices', 1),
(41, 6, 3, '1992-10-15 22:00:00', 'ut nunc vestibulum ante', 'blandit nam nulla integer pede justo lacinia eget tincidunt eget', 0),
(42, 3, 5, '2020-12-16 18:54:00', 'fermentum justo nec condimentum', 'mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla', 1),
(43, 4, 1, '2002-04-26 20:00:00', 'sed vestibulum sit amet cursus', 'placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris', 0),
(44, 5, 2, '2020-12-15 19:10:12', 'nulla neque libero', 'eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor', 0),
(45, 6, 2, '2020-12-16 18:54:00', 'bibendum morbi non quam nec', 'sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus', 1),
(46, 6, 3, '2020-12-16 18:54:00', 'ac leo pellentesque ultrices mattis', 'sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed', 1),
(47, 3, 1, '2020-12-16 18:54:00', 'nisl duis ac nibh fusce', 'vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non', 1),
(48, 6, 3, '2020-12-16 18:54:00', 'mauris lacinia sapien quis libero', 'suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat', 1),
(49, 2, 5, '2020-12-15 19:10:18', 'mattis pulvinar nulla', 'aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam', 0),
(50, 5, 2, '2013-01-30 22:00:00', 'vitae quam suspendisse', 'vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_etiqueta`
--

CREATE TABLE `mensaje_etiqueta` (
  `idMen` int(11) NOT NULL,
  `idTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje_etiqueta`
--

INSERT INTO `mensaje_etiqueta` (`idMen`, `idTag`) VALUES
(8, 7),
(15, 2),
(32, 5),
(47, 6),
(17, 10),
(23, 9),
(2, 7),
(24, 7),
(10, 9),
(10, 6),
(46, 6),
(18, 10),
(50, 6),
(40, 9),
(25, 4),
(18, 5),
(19, 2),
(32, 5),
(11, 9),
(28, 2),
(13, 5),
(1, 7),
(46, 9),
(31, 4),
(23, 9),
(12, 4),
(33, 5),
(26, 2),
(8, 1),
(5, 5),
(18, 3),
(12, 5),
(14, 10),
(49, 8),
(14, 8),
(6, 4),
(31, 1),
(11, 8),
(7, 3),
(11, 9),
(23, 7),
(20, 3),
(38, 9),
(37, 10),
(10, 10),
(17, 6),
(11, 4),
(3, 1),
(36, 4),
(36, 7),
(15, 10),
(21, 8),
(45, 4),
(44, 10),
(15, 5),
(40, 8),
(29, 7),
(10, 5),
(36, 1),
(29, 5),
(46, 10),
(11, 2),
(27, 10),
(19, 9),
(13, 8),
(14, 2),
(6, 2),
(12, 3),
(24, 10),
(6, 6),
(9, 3),
(32, 4),
(23, 10),
(10, 1),
(30, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(33) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `email`, `password`, `nombre`, `apellidos`, `foto`) VALUES
(1, 'blight@outlaws.com', '25d55ad283aa400af464c76d713c07ad', 'Derek', 'Powers', 'blight@outlaws.png'),
(2, 'harley@outlaws.com', '25d55ad283aa400af464c76d713c07ad', 'Harley', 'Quinn', 'harley@outlaws.png'),
(3, 'joker@outlaws.com', '25d55ad283aa400af464c76d713c07ad', 'Joker', NULL, 'joker@outlaws.png'),
(4, 'ivy@outlaws.com', '25d55ad283aa400af464c76d713c07ad', 'Poison', 'Ivy', 'ivy@outlaws.png'),
(5, 'enigma@imail.com', '25d55ad283aa400af464c76d713c07ad', 'Enigma', NULL, 'enigma@imail.png'),
(6, 'skull@outlaws.com', '25d55ad283aa400af464c76d713c07ad', 'Johann', 'Shmidt', 'skull@outlaws.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`idTag`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMen`),
  ADD KEY `fk_destino_usuario` (`idDes`),
  ADD KEY `fk_origen_usuario` (`idOri`) USING BTREE;

--
-- Indices de la tabla `mensaje_etiqueta`
--
ALTER TABLE `mensaje_etiqueta`
  ADD KEY `fk_mensaje` (`idMen`),
  ADD KEY `fk_tag` (`idTag`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_destino_usuario` FOREIGN KEY (`idDes`) REFERENCES `usuario` (`idUsu`),
  ADD CONSTRAINT `fk_origen_destino` FOREIGN KEY (`idOri`) REFERENCES `usuario` (`idUsu`);

--
-- Filtros para la tabla `mensaje_etiqueta`
--
ALTER TABLE `mensaje_etiqueta`
  ADD CONSTRAINT `fk_mensaje` FOREIGN KEY (`idMen`) REFERENCES `mensaje` (`idMen`),
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`idTag`) REFERENCES `etiqueta` (`idTag`);
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
