-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2021 a las 05:54:01
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceapr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `idcliente` int(11) NOT NULL,
  `username` text COLLATE utf8_spanish2_ci NOT NULL,
  `idticket` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `area` text COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` text COLLATE utf8_spanish2_ci NOT NULL,
  `naemple` text COLLATE utf8_spanish2_ci NOT NULL,
  `idemple` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`idcliente`, `username`, `idticket`, `fecha`, `descripcion`, `area`, `comentario`, `estado`, `naemple`, `idemple`) VALUES
(8, 'Mario Reynaldo', 1, '2021-04-21', 'Error de Dns', 'Informatica', '-', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 2, '2021-04-21', 'Error de apr', 'Informatica', '-', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 3, '2021-04-22', 'Daño colateral', 'Dermatologia', '-', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 4, '2021-04-22', 'Errores de instalacion windows', 'Informatica', 'Se soluciono daño colateral', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 5, '2021-04-22', 'Windws', 'Informatica', '-', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 6, '2021-04-29', 'Murio Servidor', 'Informatica', '-', 'Asignado', 'Eduardo Alfredo', 6),
(8, 'Mario Reynaldo', 7, '2021-04-29', 'ASDASD', 'Informatica', '-', 'Asignado', 'Eduardo Alfredo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `privilegio` int(4) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `privilegio`, `created_at`) VALUES
(5, 'Rafael Ernesto Flores Canizales', 'Rafael Flores', 'rafacanizales@gmail.com', '123456', 1, '2021-04-21 05:15:14'),
(6, 'Eduardo Alfredo Aguilar Carranza', 'Eduardo Alfredo', 'eduardoalfredo@gmail.com', '654321', 3, '2021-04-21 05:56:58'),
(7, 'Irvin Eduardo Gonzales Romero', 'Irvin Eduardo', 'eduardoromero@gmail.com', '159753', 2, '2021-04-21 06:01:01'),
(8, 'Mario Reynaldo Ceron', 'Mario Reynaldo', 'marirey@gmial.com', '258789', 4, '2021-04-21 06:07:10'),
(9, 'Maria Guadalupe Espinoza Salazar', 'MariGua', 'mariagua@gmail.com', '123456', 4, '2021-04-22 06:40:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idticket`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idticket` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
