-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-03-2020 a las 10:27:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vargasacedo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `usuario` varchar(20) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`usuario`, `imagen`, `titulo`, `fecha`) VALUES
('ana', 'EFVdEyJWwAEsHJM.jpeg', 'Dante Eclipse', '2020-03-06 08:45:57'),
('alfonso', 'Firefox_wallpaper.png', 'Dinosaurio', '2020-03-06 08:38:24'),
('ana', 'kids-toy-500x500.jpg', 'Minion Guay', '2020-03-06 08:43:03'),
('alfonso', 'MPP50626.jpg', 'Blandito', '2020-03-06 08:41:50'),
('ana', 'todoroki.jpg', 'Todoroki Kun', '2020-03-06 08:44:45'),
('alfonso', 'unnamed.gif', 'Gatino', '2020-03-06 08:38:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`imagen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
