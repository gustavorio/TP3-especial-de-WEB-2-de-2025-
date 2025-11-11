-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2025 a las 00:39:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciber dragon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladores`
--

CREATE TABLE `desarrolladores` (
  `desarrolladorId` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `origen` varchar(45) NOT NULL,
  `nombreDesarrollador` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrolladores`
--

INSERT INTO `desarrolladores` (`desarrolladorId`, `fechaCreacion`, `origen`, `nombreDesarrollador`) VALUES
(5, '2009-09-12', 'Noruega', 'Mojang'),
(7, '1992-04-25', 'EEUU', 'Blizzard'),
(8, '1995-06-15', 'EEUU', 'Rockstar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `juegoId` int(11) NOT NULL,
  `nombreJuego` varchar(45) NOT NULL,
  `fechaLanzamiento` date NOT NULL,
  `desarrolladorId` int(11) NOT NULL,
  `descripcionJuego` text NOT NULL,
  `edad` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`juegoId`, `nombreJuego`, `fechaLanzamiento`, `desarrolladorId`, `descripcionJuego`, `edad`, `imagen`) VALUES
(21, 'Hearthstone: Heroes of Warcraft', '2014-03-11', 7, 'Hearthstone es un juego de cartas coleccionables en línea...', 7, 'https://d2q63o9r0h0ohi.cloudfront.net/_next/static/images/default-4fff3c606c794dc03a915b9071f562d3.jpg'),
(22, 'GTA V', '2013-09-17', 8, 'Grand Theft Auto V es un videojuego de acción-aventura...', 18, 'https://image.api.playstation.com/cdn/UP1004/CUSA00419_00/bTNSe7ok8eFVGeQByA5qSzBQoKAAY32R.png'),
(23, 'Minecraft', '2011-11-18', 5, 'edfghjklññlkjuytfrdfghjuklñlkjhgfdfghjkl', 6, 'https://www.minecraft.net/content/dam/games/minecraft/key-art/SUPM_Game-Image_One-Vanilla_672x400.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `juegoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`reviewId`, `descripcion`, `puntuacion`, `usuario`, `juegoId`) VALUES
(12, 'Muy pay to win, difícil cuando recién se arranca a jugar.', 2, 'webadmin', 21),
(13, 'Buen juego pero muy violento.', 4, 'webadmin', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(200) NOT NULL,
  `contra` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contra`) VALUES
('webadmin', '$2y$10$5iX0BZS3E2qRR090rtKUqOfAc0XDL6XFpVFBpWODBWxIsw/t65DRq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`desarrolladorId`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`juegoId`),
  ADD KEY `desarrollador` (`desarrolladorId`) USING BTREE;

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `juegoId` (`juegoId`),
  ADD KEY `usuario` (`usuario`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `desarrolladorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `juegoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`desarrolladorId`) REFERENCES `desarrolladores` (`desarrolladorId`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`juegoId`) REFERENCES `juegos` (`juegoId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
