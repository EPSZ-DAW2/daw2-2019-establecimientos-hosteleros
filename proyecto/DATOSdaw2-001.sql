-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2020 a las 22:33:59
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
-- Volcado de datos para la tabla `categorias`
--

INSERT IGNORE INTO `categorias` (`id`, `nombre`, `descripcion`, `icono`, `categoria_id`) VALUES
(4, 'Restaurante', '', '', 0),
(6, 'Tradicional', '', '', 4);

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT IGNORE INTO `etiquetas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Picoteo', 'Bares, restaurantes o cualquier tipo de local en donde se puedan consumir tapas.'),
(2, 'Bailoteo', 'Lugares  con pista de baile disponible');

--
-- Volcado de datos para la tabla `hosteleros`
--

INSERT IGNORE INTO `hosteleros` (`id`, `usuario_id`, `nif_cif`, `razon_social`, `telefono_comercio`, `telefono_contacto`, `url`, `fecha_alta`) VALUES
(1, 1, '72172741z', NULL, '601229584', '685251566', NULL, NULL),
(2, 2, '73172741z', NULL, '602229584', '675251566', NULL, NULL),
(3, 3, '7536952m', 'Engordar a la Gente', '980163589', '659783468', NULL, '2020-01-07 00:00:00'),
(4, 4, '5616316', 'Alcoholizar a la Gente', '78943216', '6541964136', '', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `locales`
--

INSERT IGNORE INTO `locales` (`id`, `titulo`, `descripcion`, `lugar`, `url`, `zona_id`, `categoria_id`, `imagen_id`, `sumaValores`, `totalVotos`, `hostelero_id`, `prioridad`, `visible`, `terminado`, `fecha_terminacion`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `cerrado_comentar`, `cerrado_quedar`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`, `notas_admin`) VALUES
(1, 'El caballero', 'Bar de pinchos especializado en patatas brabas', 'Calle Flores de S Torcuato 4, 49014, Zamora España', 'http://www.barcaballero.com/', 1, 4, 'barcaballeroPrincipal.jpg', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 1, '2020-01-17 05:49:21', 0, '0000-00-00 00:00:00', '0', 0, 0, 1, '2020-01-17 11:09:23', 0, '2020-01-17 11:09:23', '0'),
(2, 'telepizza', 'vende pizzas', 'principe de asturias', '', 1, 4, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(3, 'Vaiven', 'Bar de tapas, hosteleros bordes.', 'Cerca de la uni', '', 1, 4, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(4, 'Gran casino', 'Restaurante', 'Por ahi', '0', 1, 4, '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(5, 'Valenciana Shock', 'Heladeria Artesanal', 'C/Renova 5, Zamora', '', 1, 4, '', 0, 0, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, 0, '2020-01-09 05:09:09', 0, NULL, NULL),
(6, 'Pinoccio', 'Restaurante Italiano', 'Calle Salamanca 8, Zamora', '', 1, 4, '', 0, 0, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, 0, '2020-01-09 05:14:16', 0, NULL, NULL);

--
-- Volcado de datos para la tabla `locales_comentarios`
--

INSERT IGNORE INTO `locales_comentarios` (`id`, `local_id`, `valoracion`, `texto`, `comentario_id`, `cerrado`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 7, 'Muy buenas tartas', 0, 0, 1, '2020-01-09 11:21:29', 0, NULL, NULL, 0, '2020-01-09 10:57:22', 0, NULL),
(2, 1, 5, 'Servicio normal, cosas cutres', 0, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-09 11:03:49', 0, NULL),
(3, 5, 10, 'HOSTIA PILOTES, OHH QUE SON DE BONES, ME ENCANTAN', 0, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-09 11:48:57', 0, NULL),
(4, 1, 8, 'Muy buen local', 1, 0, 0, NULL, 0, NULL, NULL, 1, '2020-01-09 00:00:00', 0, NULL),
(5, 2, 2, 'No me ha gustado', 1, 0, 0, NULL, 0, NULL, NULL, 1, '2020-01-09 00:00:00', 0, NULL),
(6, 2, 6, 'No esta mal pero podria estar mejor', 1, 0, 0, NULL, 0, NULL, NULL, 2, '2020-01-09 00:00:00', 0, NULL),
(8, 2, 3, 'tu comentario me ofende', 6, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-10 06:07:00', 0, NULL),
(9, 5, 4, 'Mentiroso', 1, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-10 12:03:53', 0, NULL),
(10, 5, 10, 'mentira', 1, 0, 5, '2020-01-10 12:15:21', 1, '2020-01-10 12:15:37', 'Bloqueado por numero de denuncias ', 0, '2020-01-10 12:05:22', 0, NULL);

--
-- Volcado de datos para la tabla `locales_convocatorias`
--

INSERT IGNORE INTO `locales_convocatorias` (`id`, `local_id`, `texto`, `fecha_desde`, `fecha_hasta`, `num_denuncias`, `fecha_denuncia1`, `bloqueada`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 'Primera convocatoria del bar caballeroos', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 1, '2020-01-09 00:00:00', 1, '2020-09-01 10:08:47'),
(2, 2, 'Primera convocatoria de telepizza', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 1, '2020-01-09 00:00:00', 0, NULL),
(3, 3, 'Primera convocatoria de este bar', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 2, '2020-01-09 00:00:00', 0, NULL),
(4, 4, 'Primera convocatoria de gran casino', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 2, '2020-01-09 00:00:00', 0, NULL);

--
-- Volcado de datos para la tabla `locales_convocatorias_asistentes`
--

INSERT IGNORE INTO `locales_convocatorias_asistentes` (`id`, `local_id`, `convocatoria_id`, `usuario_id`, `fecha_alta`) VALUES
(2, 3, 3, 1, NULL),
(3, 4, 4, 1, NULL),
(7, 2, 2, 2, '2020-01-03 00:00:00');

--
-- Volcado de datos para la tabla `locales_etiquetas`
--

INSERT IGNORE INTO `locales_etiquetas` (`id`, `local_id`, `etiqueta_id`) VALUES
(1, 1, 1);

--
-- Volcado de datos para la tabla `locales_imagenes`
--

INSERT IGNORE INTO `locales_imagenes` (`id`, `local_id`, `imagen_id`) VALUES
(1, 1, 'barcaballero1.jpg'),
(2, 1, 'barcaballero2.jpg'),
(3, 1, 'barcaballero3.jpg'),
(5, 1, 'barcaballero4.jpg'),
(6, 1, 'barcaballero5.jpg'),
(7, 1, 'barcaballero6.jpg');

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT IGNORE INTO `usuarios` (`id`, `email`, `password`, `nick`, `nombre`, `apellidos`, `fecha_nacimiento`, `direccion`, `zona_id`, `fecha_registro`, `confirmado`, `fecha_acceso`, `num_accesos`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`) VALUES
(1, 'pepe@gmail.com', 'pepe', 'pepe', 'pepe', 'perez', '0000-00-00', 'ninguna', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', ''),
(2, 'manuel@gmail.com', 'manuel', 'manu', 'manuel', 'rodriguez', '0000-00-00', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', ''),
(3, 'jose@gmail.es', 'jose', 'jose', 'perez', 'ampudia', '2018-04-16', 'calle villalpando 2c', 0, '2019-12-17 00:00:00', 1, '2019-12-03 00:00:00', 0, 0, NULL, NULL);

--
-- Volcado de datos para la tabla `usuarios_avisos`
--

INSERT IGNORE INTO `usuarios_avisos` (`id`, `fecha_aviso`, `clase_aviso_id`, `texto`, `destino_usuario_id`, `origen_usuario_id`, `local_id`, `comentario_id`, `fecha_lectura`, `fecha_aceptado`) VALUES
(1, '0000-00-00 00:00:00', 'A', 'Este es un aviso tipo aviso del usuario 1 hacia el usuario 3 sobre el local id 0', 1, 3, 0, 0, '2020-10-01 04:40:01', '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00', 'A', 'Este es un aviso tipo aviso del usuario 1 hacia el usuario 2 sobre el local id 0', 1, 2, 0, 0, NULL, '0000-00-00 00:00:00'),
(4, '0000-00-00 00:00:00', 'N', 'Este es un aviso tipo Notoficacion del usuario 1 hacia el usuario 2 sobre el local id 0', 1, 2, 0, 0, '2020-09-01 12:45:56', '0000-00-00 00:00:00'),
(5, '0000-00-00 00:00:00', 'D', 'Este es un aviso tipo denuncia del usuario 1 hacia el usuario 3 sobre el local id 0', 1, 3, 0, 0, '2020-10-01 04:41:11', '0000-00-00 00:00:00'),
(6, '0000-00-00 00:00:00', 'D', 'Este es un aviso tipo denuncia del usuario 1 hacia el usuario 2 sobre el local id 0', 1, 2, 0, 0, '2020-03-01 12:52:09', '0000-00-00 00:00:00'),
(7, '0000-00-00 00:00:00', 'C', 'Este es un aviso tipo Consulta del usuario 1 hacia el usuario 3 sobre el local id 0', 1, 3, 0, 0, NULL, '0000-00-00 00:00:00'),
(8, '0000-00-00 00:00:00', 'B', 'Este es un aviso tipo bloqueo del usuario 1 hacia el usuario 3 sobre el local id 0', 1, 3, 0, 0, NULL, '0000-00-00 00:00:00'),
(9, '0000-00-00 00:00:00', 'B', 'Este es un aviso tipo bloqueo del usuario 1 hacia el usuario 2 sobre el local id 0', 1, 2, 0, 0, NULL, '0000-00-00 00:00:00'),
(10, '0000-00-00 00:00:00', 'M', 'Este es un aviso tipo mensaje generico del usuario 1 hacia el usuario 3\r\n sobre el local id 0', 1, 3, 0, 0, NULL, '0000-00-00 00:00:00'),
(16, '2020-08-01 07:48:44', 'N', 'Aviso de eliminacion de seguimiento del local: El caballero', 1, 0, 1, 0, '2020-10-01 04:41:01', NULL),
(21, '2020-09-01 09:35:51', 'N', 'Aviso de eliminacion de convocatoria del local: El caballero', 2, 0, 1, 0, '2020-10-01 01:43:46', NULL),
(22, '2020-09-01 09:35:51', 'N', 'Aviso de eliminacion de convocatoria del local: El caballero', 1, 0, 1, 0, NULL, NULL),
(25, '2020-09-01 10:27:28', 'N', 'Aviso de eliminacion (debido a que sigues al local) de convocatoria del local: telepizza', 1, 0, 2, 0, NULL, NULL),
(26, '2020-09-01 10:30:09', 'N', 'Aviso de eliminacion (debido a que sigues al local) de convocatoria del local: telepizza', 1, 0, 2, 0, NULL, NULL),
(27, '2020-09-01 10:30:09', 'N', 'Aviso de eliminacion (debido a que ibas a asistir a la convocatoria) de convocatoria del local: telepizza', 2, 0, 2, 0, '2020-09-01 10:30:13', NULL),
(32, '2020-10-01 05:20:59', 'N', 'El usuario id=1 ha pedido solicitud de baja', 1, 1, 0, 1, NULL, NULL),
(33, '2020-10-01 05:51:17', 'N', 'El usuario id=2 ha pedido solicitud de baja', 1, 2, 0, 2, NULL, NULL);

--
-- Volcado de datos para la tabla `usuarios_categorias`
--

INSERT IGNORE INTO `usuarios_categorias` (`id`, `usuario_id`, `categoria_id`, `fecha_seguimiento`) VALUES
(5, 100, 4, '2019-12-30 10:55:08'),
(6, 1, 6, '2020-01-10 16:08:45');

--
-- Volcado de datos para la tabla `usuarios_etiquetas`
--

INSERT IGNORE INTO `usuarios_etiquetas` (`id`, `usuario_id`, `etiqueta_id`, `fecha_seguimiento`) VALUES
(8, 100, 2, '2019-12-27 11:50:22');

--
-- Volcado de datos para la tabla `usuarios_locales`
--

INSERT IGNORE INTO `usuarios_locales` (`id`, `usuario_id`, `local_id`, `fecha_alta`) VALUES
(2, 1, 4, '2020-01-17 00:00:00'),
(3, 2, 1, '2020-01-03 05:00:17'),
(5, 1, 2, '2020-01-15 00:00:00'),
(6, 1, 1, '2020-01-03 05:00:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
