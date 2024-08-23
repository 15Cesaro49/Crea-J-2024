-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2024 a las 16:02:39
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
-- Base de datos: `crea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `email`, `nombre`, `contra`, `fecha_registro`) VALUES
(1, 'jr@gmail.com', '123', '123', '2024-08-21 01:55:22'),
(3, 'jr123@gmail.com', 'Carlos Eduardo', '$2y$10$P/Br6huavo0ce.2hGpoD8ufYIt2Qk0/SaJKEbyrqIgt9O4UO9KDqu', '2024-08-21 02:26:56'),
(5, 'jr132@gmail.com', 'Carlos Eduardo', '$2y$10$tOWQdou7fw0MCmkc/Nu1kuESoopQH/tNdlzI1UZtukFu33YCVhSPC', '2024-08-21 02:37:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` text NOT NULL,
  `contra` text NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `email`, `contra`, `fecha_registro`) VALUES
(1, 'julio', 'jacinto', 'Verstappen_Checo@gmail.com', '$2y$10$lU99u62WvGOv9pjGrIi5DuPGA4nWAhBoS7x4X1RThPjlwuwhq1alK', '2024-08-18 15:35:42'),
(2, 'julio', 'jacinto', 'Verstappen_Checo@gmail.com', '$2y$10$Tc9Xj7NmzcyrABUggEJNTuPOb2piQ8KQNgieQUvuFJ7IZrKCrvBYa', '2024-08-18 15:59:49'),
(3, 'Carlos Eduardo', 'Merino Ventura', 'merinoventura123@gmail.com', '$2y$10$/hp//5d5SoCJW1.nMGcPD.aH/xIdw.4NIun1R90liUdHBYnTiKgyy', '2024-08-20 08:15:39'),
(4, 'Carlos Eduardo', 'jacinto', 'jr72@gmail.com', '$2y$10$R7Sivyx8NqibUcrJCdrOI.XHkv27gww73uFSqiCW.sLqa2RM8EknG', '2024-08-20 13:47:17'),
(5, '1212', '2121', 'jr@gmail.com', '$2y$10$.NmkiXee0K/uPd4a0PToru4dDsFomXDZURloT81qZtpv7uzYp7.bW', '2024-08-20 13:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `reporte` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `reporte`, `fecha`) VALUES
(1, 'aaa', '2024-08-20 03:44:00'),
(2, 'aaa', '2024-08-20 03:44:43'),
(3, 'aaa', '2024-08-20 03:45:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
