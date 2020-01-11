-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2020 a las 11:45:18
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw2_hosteleros`
--

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `titulo`, `descripcion`, `lugar`, `url`, `zona_id`, `categoria_id`, `imagen_id`, `sumaValores`, `totalVotos`, `hostelero_id`, `prioridad`, `visible`, `terminado`, `fecha_terminacion`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `cerrado_comentar`, `cerrado_quedar`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`, `notas_admin`) VALUES
(1, 'El caballero', 'Bar de pinchos especializado en patatas brabas', 'Calle Flores de S Torcuato 4, 49014, Zamora España', 'http://www.barcaballero.com/', 0, 0, 'barcaballero1.jpg', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 1, '2020-01-11 11:09:42', 0, '0000-00-00 00:00:00', '0', 0, 0, 1, '2020-01-11 11:29:33', 0, '2020-01-11 11:29:33', '0'),
(2, 'telepizza', 'vende pizzas', 'principe de asturias', '', 0, 1, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(3, 'Vaiven', 'Bar de tapas, hosteleros bordes.', 'Cerca de la uni', '', 0, 0, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(4, 'Gran casino', 'Restaurante', 'Por ahi', '0', 0, 1, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(5, 'Gran casino', 'Restaurante', 'Por ahi', '0', 0, 1, '0', 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
