-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2020 a las 00:16:55
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text COMMENT 'Texto adicional que describe la categoria o clasificación.',
  `icono` varchar(25) DEFAULT NULL COMMENT 'Nombre del icono relacionado de entre los disponibles en la aplicación (carpeta iconos posibles).',
  `categoria_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Categoria relacionada, para poder realizar la jerarquía de clasificaciones. Nodo padre de la jerarquía de categoría, o CERO si es nodo raiz (como si fuera NULL).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `icono`, `categoria_id`) VALUES
(4, 'Restaurante', '', '', 0),
(6, 'Tradicional', '', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `variable` varchar(50) NOT NULL,
  `valor` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text COMMENT 'Texto adicional que describe la etiqueta o NULL si no es necesario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Picoteo', 'Bares, restaurantes o cualquier tipo de local en donde se puedan consumir tapas.'),
(2, 'Bailoteo', 'Lugares  con pista de baile disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hosteleros`
--

CREATE TABLE `hosteleros` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con los datos principales.',
  `nif_cif` varchar(12) NOT NULL COMMENT 'Identificador del hostelero.',
  `razon_social` varchar(255) DEFAULT NULL COMMENT 'Razon social del comercio o NULL si con el "nombre y apellidos" del usuario es suficiente.',
  `telefono_comercio` varchar(25) NOT NULL,
  `telefono_contacto` varchar(25) NOT NULL,
  `url` text COMMENT 'Dirección web del comercio o NULL si no hay o no se conoce.',
  `fecha_alta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de alta como hostelero, no como usuario o NULL si no se conoce por algún motivo (que no debería ser).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hosteleros`
--

INSERT INTO `hosteleros` (`id`, `usuario_id`, `nif_cif`, `razon_social`, `telefono_comercio`, `telefono_contacto`, `url`, `fecha_alta`) VALUES
(1, 1, '7536952m', 'Engordar a la Gente', '980163589', '659783468', NULL, '2020-01-07 00:00:00'),
(102, 1, '5616316', 'Alcoholizar a la Gente', '78943216', '6541964136', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(12) UNSIGNED NOT NULL,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para el establecimiento/local.',
  `descripcion` text COMMENT 'Descripción breve del establecimiento/local o NULL si no es necesaria.',
  `lugar` text COMMENT 'Descripcion del lugar del establecimiento/local o NULL si no se conoce, aunque no debería estar vacío este dato.',
  `url` text COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" o directamente del establecimiento/local o NULL si no hay o no se conoce.',
  `zona_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Area/Zona de ubicación del establecimiento/local o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `categoria_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Categoria de clasificación del establecimiento/local o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de presentación" del establecimiento/local, o NULL si no hay.',
  `sumaValores` int(9) NOT NULL DEFAULT '0' COMMENT 'Suma acumulada de las valoraciones para el establecimiento/local.',
  `totalVotos` int(9) NOT NULL DEFAULT '0' COMMENT 'Contador de votos (valoraciones) emitidas para el establecimiento/local.',
  `hostelero_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Hostelero/Propietario del establecimiento/local o CERO si no está patrocinado por nadie o no existe, o aún no está indicado (como si fuera NULL).',
  `prioridad` int(4) NOT NULL DEFAULT '0' COMMENT 'Indicador de importancia para el establecimiento/local en caso de tener hostelero.',
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de establecimiento/local visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.',
  `terminado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de establecimiento/local terminado o suspendido: 0=No, 1=Realizada, 2=Suspendida, 3=Cancelada por Inadecuada, ...',
  `fecha_terminacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de terminación del establecimiento/local. Debería estar a NULL si no está terminada.',
  `num_denuncias` int(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del establecimiento/local o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de establecimiento/local bloqueada: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del establecimiento/local. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo del establecimiento/local o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `cerrado_comentar` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de establecimiento/local cerrado para comentarios: 0=No, 1=Si.',
  `cerrado_quedar` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de establecimiento/local cerrado para quedadas: 0=No, 1=Si.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha creado el establecimiento/local o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del establecimiento/local o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha modificado el establecimiento/local por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del establecimiento/local o NULL si no se conoce por algún motivo.',
  `notas_admin` text COMMENT 'Notas adicionales para los moderadores/administradores sobre el establecimiento/local o NULL si no hay.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `titulo`, `descripcion`, `lugar`, `url`, `zona_id`, `categoria_id`, `imagen_id`, `sumaValores`, `totalVotos`, `hostelero_id`, `prioridad`, `visible`, `terminado`, `fecha_terminacion`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `cerrado_comentar`, `cerrado_quedar`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`, `notas_admin`) VALUES
(1, 'El caballero', 'Bar de pinchos especializado en patatas brabas', 'Calle Flores de S Torcuato 4, 49014, Zamora España', 'http://www.barcaballero.com/', 0, 0, 'NULL', 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 6, '2020-01-09 12:32:45', 1, '2020-01-09 04:05:20', 'Bloqueado por numero de denuncias ', 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(2, 'telepizza', 'vende pizzas', 'principe de asturias', '', 0, 1, '0', 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2, '2020-01-09 05:12:53', 'Bloqueado por la administracion', 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(3, 'Vaiven', 'Bar de tapas, hosteleros bordes.', 'Cerca de la uni', '', 0, 0, '0', 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(4, 'Gran casino', 'Restaurante', 'Por ahi', '0', 0, 1, '0', 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0', 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0'),
(5, 'Valenciana Shock', 'Heladeria Artesanal', 'C/Renova 5, Zamora', '', 0, 0, '', 0, 0, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, 0, '2020-01-09 05:09:09', 0, NULL, NULL),
(6, 'Pinoccio', 'Restaurante Italiano', 'Calle Salamanca 8, Zamora', '', 0, 0, '', 0, 0, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, 0, '2020-01-09 05:14:16', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_comentarios`
--

CREATE TABLE `locales_comentarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionado',
  `valoracion` int(9) NOT NULL DEFAULT '0' COMMENT 'Valoración dada al establecimiento/local.',
  `texto` text NOT NULL COMMENT 'El texto del comentario.',
  `comentario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.',
  `cerrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)',
  `num_denuncias` int(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del comentario o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locales_comentarios`
--

INSERT INTO `locales_comentarios` (`id`, `local_id`, `valoracion`, `texto`, `comentario_id`, `cerrado`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 7, 'Muy buenas tartas', 0, 0, 1, '2020-01-09 11:21:29', 0, NULL, NULL, 0, '2020-01-09 10:57:22', 0, NULL),
(2, 1, 5, 'Servicio normal, cosas cutres', 0, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-09 11:03:49', 0, NULL),
(3, 5, 10, 'HOSTIA PILOTES, OHH QUE SON DE BONES, ME ENCANTAN', 0, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-09 11:48:57', 0, NULL),
(4, 5, 4, 'Mentiroso', 1, 0, 0, NULL, 0, NULL, NULL, 0, '2020-01-10 12:03:53', 0, NULL),
(5, 5, 10, 'mentira', 1, 0, 5, '2020-01-10 12:15:21', 1, '2020-01-10 12:15:37', 'Bloqueado por numero de denuncias ', 0, '2020-01-10 12:05:22', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_convocatorias`
--

CREATE TABLE `locales_convocatorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionado',
  `texto` text NOT NULL COMMENT 'El texto de la convocatoria.',
  `fecha_desde` datetime DEFAULT NULL COMMENT 'Fecha y Hora de inicio de la convocatoria o NULL si no se conoce (mostrar próximamente).',
  `fecha_hasta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de finalización de la convocatoria o NULL si no se conoce (no caduca automáticamente).',
  `num_denuncias` int(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias de la convocatoria o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueada` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de convocatoria bloqueada: 0=No, 1=Si(bloqueada por denuncias), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo de la convocatoria. Debería estar a NULL si no está bloqueada o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo de la convocatoria o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha creado la convocatoria o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación de la convocatoria o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario que ha modificado la convocatoria por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación de la convocatoria o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locales_convocatorias`
--

INSERT INTO `locales_convocatorias` (`id`, `local_id`, `texto`, `fecha_desde`, `fecha_hasta`, `num_denuncias`, `fecha_denuncia1`, `bloqueada`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 'Primera convocatoria de este bar', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 0, '2020-01-09 00:00:00', 0, NULL),
(2, 2, 'Primera convocatoria de este bar', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 0, '2020-01-09 00:00:00', 0, NULL),
(3, 3, 'Primera convocatoria de este bar', '2020-01-16 00:00:00', '2020-01-17 00:00:00', 0, NULL, 0, NULL, NULL, 0, '2020-01-09 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_convocatorias_asistentes`
--

CREATE TABLE `locales_convocatorias_asistentes` (
  `id` int(12) UNSIGNED NOT NULL,
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionado',
  `convocatoria_id` int(12) UNSIGNED NOT NULL COMMENT 'convocatoria relacionada',
  `usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'usuario relacionado que asistira a la convocatoria.',
  `fecha_alta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación de la asistencia a la convocatoria o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locales_convocatorias_asistentes`
--

INSERT INTO `locales_convocatorias_asistentes` (`id`, `local_id`, `convocatoria_id`, `usuario_id`, `fecha_alta`) VALUES
(1, 1, 1, 1, NULL),
(2, 3, 3, 1, NULL),
(3, 2, 2, 1, NULL),
(4, 1, 1, 4, '2020-01-03 00:00:00'),
(5, 2, 2, 1, '2020-01-03 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_etiquetas`
--

CREATE TABLE `locales_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionada',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locales_etiquetas`
--

INSERT INTO `locales_etiquetas` (`id`, `local_id`, `etiqueta_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_imagenes`
--

CREATE TABLE `locales_imagenes` (
  `id` int(12) UNSIGNED NOT NULL,
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionada',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen del establecimiento/local.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha_registro` datetime NOT NULL COMMENT 'Fecha y Hora del registro de acceso.',
  `clase_log_id` char(1) NOT NULL COMMENT 'código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...',
  `modulo` varchar(50) DEFAULT 'app' COMMENT 'Modulo o Sección de la aplicación que ha generado el mensaje de registro.',
  `texto` text COMMENT 'Texto con el mensaje de registro.',
  `ip` varchar(40) DEFAULT NULL COMMENT 'Dirección IP desde donde accede el usuario (vale para IPv4 e IPv6.',
  `browser` text COMMENT 'Texto con información del navegador utilizado en el acceso.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento del usuario o NULL si no lo quiere informar.',
  `direccion` text COMMENT 'Direccion del usuario o NULL si no quiere informar.',
  `zona_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Area/Zona de localización del usuario o CERO si no lo quiere informar (como si fuera NULL), aunque es recomendable.',
  `fecha_registro` datetime DEFAULT NULL COMMENT 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  `confirmado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario ha confirmado su registro o no.',
  `fecha_acceso` datetime DEFAULT NULL COMMENT 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
  `num_accesos` int(9) NOT NULL DEFAULT '0' COMMENT 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nick`, `nombre`, `apellidos`, `fecha_nacimiento`, `direccion`, `zona_id`, `fecha_registro`, `confirmado`, `fecha_acceso`, `num_accesos`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`) VALUES
(1, 'manolo@gmail.com', 'pepe', 'pepe', 'pepe', 'perez', '0000-00-00', 'ninguna', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', ''),
(2, 'manuel@gmail.com', 'manuel', 'manu', 'manuel', 'rodriguez', '0000-00-00', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', ''),
(3, 'jose@gmail.es', 'jose', 'jose', 'perez', 'ampudia', '2018-04-16', 'calle villalpando 2c', 0, '2019-12-17 00:00:00', 1, '2019-12-03 00:00:00', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_area_moderacion`
--

CREATE TABLE `usuarios_area_moderacion` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con un Area para su moderación.',
  `zona_id` int(12) UNSIGNED NOT NULL COMMENT 'Zona relacionada con el Usuario que puede moderarla.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_avisos`
--

CREATE TABLE `usuarios_avisos` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha_aviso` datetime NOT NULL COMMENT 'Fecha y Hora de creación del aviso.',
  `clase_aviso_id` char(1) NOT NULL DEFAULT 'M' COMMENT 'código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, B=Bloqueo, M=Mensaje Genérico,...',
  `texto` text COMMENT 'Texto con el mensaje de aviso.',
  `destino_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario relacionado, destinatario del aviso, o NULL si no es para administración y aún no está gestionado.',
  `origen_usuario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Usuario relacionado, origen del aviso, o NULL si es del sistema.',
  `local_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'establecimiento/local relacionado o NULL si no tiene que ver directamente.',
  `comentario_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Comentario relacionado o NULL si no tiene que ver directamente con un comentario.',
  `fecha_lectura` datetime DEFAULT NULL COMMENT 'Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.',
  `fecha_aceptado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_avisos`
--

INSERT INTO `usuarios_avisos` (`id`, `fecha_aviso`, `clase_aviso_id`, `texto`, `destino_usuario_id`, `origen_usuario_id`, `local_id`, `comentario_id`, `fecha_lectura`, `fecha_aceptado`) VALUES
(1, '0000-00-00 00:00:00', 'A', 'Este es un aviso tipo aviso del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-04-01 12:19:14', '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00', 'A', 'Este es un aviso tipo aviso del usuario 1 hacia el usuario 2 sobre el local id 0', 2, 1, 0, 0, '2020-04-01 12:19:18', '0000-00-00 00:00:00'),
(3, '0000-00-00 00:00:00', 'N', 'Este es un aviso tipo Notoficacion del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-04-01 12:19:21', '0000-00-00 00:00:00'),
(4, '0000-00-00 00:00:00', 'N', 'Este es un aviso tipo Notoficacion del usuario 1 hacia el usuario 2 sobre el local id 0', 2, 1, 0, 0, '2020-03-01 12:54:23', '0000-00-00 00:00:00'),
(5, '0000-00-00 00:00:00', 'D', 'Este es un aviso tipo denuncia del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-03-01 12:52:02', '0000-00-00 00:00:00'),
(6, '0000-00-00 00:00:00', 'D', 'Este es un aviso tipo denuncia del usuario 1 hacia el usuario 2 sobre el local id 0', 2, 1, 0, 0, '2020-03-01 12:52:09', '0000-00-00 00:00:00'),
(7, '0000-00-00 00:00:00', 'C', 'Este es un aviso tipo Consulta del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-04-01 12:19:32', '0000-00-00 00:00:00'),
(8, '0000-00-00 00:00:00', 'B', 'Este es un aviso tipo bloqueo del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-03-01 12:52:18', '0000-00-00 00:00:00'),
(9, '0000-00-00 00:00:00', 'B', 'Este es un aviso tipo bloqueo del usuario 1 hacia el usuario 2 sobre el local id 0', 2, 1, 0, 0, '2020-04-01 12:19:39', '0000-00-00 00:00:00'),
(10, '0000-00-00 00:00:00', 'M', 'Este es un aviso tipo mensaje generico del usuario 1 hacia el usuario 3\r\n sobre el local id 0', 3, 1, 0, 0, NULL, '0000-00-00 00:00:00'),
(11, '0000-00-00 00:00:00', 'A', 'Este es un aviso tipo aviso del usuario 1 hacia el usuario 3 sobre el local id 0', 3, 1, 0, 0, '2020-04-01 12:19:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_categorias`
--

CREATE TABLE `usuarios_categorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `categoria_id` int(12) UNSIGNED NOT NULL COMMENT 'Categoria relacionada.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la categoria por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_categorias`
--

INSERT INTO `usuarios_categorias` (`id`, `usuario_id`, `categoria_id`, `fecha_seguimiento`) VALUES
(5, 100, 4, '2019-12-30 10:55:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_etiquetas`
--

CREATE TABLE `usuarios_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la etiqueta por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_etiquetas`
--

INSERT INTO `usuarios_etiquetas` (`id`, `usuario_id`, `etiqueta_id`, `fecha_seguimiento`) VALUES
(8, 100, 2, '2019-12-27 11:50:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_locales`
--

CREATE TABLE `usuarios_locales` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado, seguidor del establecimiento/local.',
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'establecimiento/local relacionado.',
  `fecha_alta` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento del establecimiento/local por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_locales`
--

INSERT INTO `usuarios_locales` (`id`, `usuario_id`, `local_id`, `fecha_alta`) VALUES
(2, 1, 4, '2020-01-17 00:00:00'),
(3, 2, 1, '2020-01-03 05:00:17'),
(4, 1, 3, '2020-01-15 00:00:00'),
(5, 1, 2, '2020-01-15 00:00:00'),
(7, 1, 1, '2020-01-03 05:00:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(12) UNSIGNED NOT NULL,
  `clase_zona_id` char(1) NOT NULL COMMENT 'Código de clase de la zona: 1=Continente, 2=Pais, 3=Estado, 4=Region, 5=Provincia, 6=Municipio, 7=Localidad, 8=Barrio, 9=Area, ...',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la zona que la identifica.',
  `zona_id` int(12) UNSIGNED DEFAULT '0' COMMENT 'Zona relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`variable`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hosteleros`
--
ALTER TABLE `hosteleros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif_cif_UNIQUE` (`nif_cif`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales_comentarios`
--
ALTER TABLE `locales_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales_convocatorias`
--
ALTER TABLE `locales_convocatorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales_convocatorias_asistentes`
--
ALTER TABLE `locales_convocatorias_asistentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales_etiquetas`
--
ALTER TABLE `locales_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales_imagenes`
--
ALTER TABLE `locales_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`);

--
-- Indices de la tabla `usuarios_area_moderacion`
--
ALTER TABLE `usuarios_area_moderacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_avisos`
--
ALTER TABLE `usuarios_avisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_categorias`
--
ALTER TABLE `usuarios_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_etiquetas`
--
ALTER TABLE `usuarios_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_locales`
--
ALTER TABLE `usuarios_locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hosteleros`
--
ALTER TABLE `hosteleros`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `locales_comentarios`
--
ALTER TABLE `locales_comentarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `locales_convocatorias`
--
ALTER TABLE `locales_convocatorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `locales_convocatorias_asistentes`
--
ALTER TABLE `locales_convocatorias_asistentes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `locales_etiquetas`
--
ALTER TABLE `locales_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `locales_imagenes`
--
ALTER TABLE `locales_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_area_moderacion`
--
ALTER TABLE `usuarios_area_moderacion`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_avisos`
--
ALTER TABLE `usuarios_avisos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios_categorias`
--
ALTER TABLE `usuarios_categorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios_etiquetas`
--
ALTER TABLE `usuarios_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios_locales`
--
ALTER TABLE `usuarios_locales`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
