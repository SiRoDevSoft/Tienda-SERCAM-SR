-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2021 a las 17:58:44
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sercam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(42, 5, 15, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail`
--

INSERT INTO `detail` (`id`, `sales_id`, `product_id`, `quantity`, `status`) VALUES
(1, 54, 14, 1, 1),
(2, 55, 6, 1, 1),
(3, 56, 9, 1, 1),
(4, 57, 14, 1, 1),
(5, 58, 14, 1, 1),
(6, 59, 20, 2, 1),
(7, 60, 5, 1, 1),
(8, 60, 33, 1, 1),
(9, 61, 17, 1, 1),
(10, 61, 22, 1, 1),
(11, 62, 15, 1, 1),
(12, 63, 18, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_category`
--

CREATE TABLE `detail_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_category`
--

INSERT INTO `detail_category` (`id`, `category_id`, `title`, `description`) VALUES
(1, 1, '¿Qué es un Sistema de Alarmas?', 'Un sistema de alarma consiste en la instalación de una serie de equipos electrónicos en los lugares de su hogar o empresa considerados estratégicos desde el punto de vista de la seguridad y que están en comunicación con la Central de Monitoreo de SERCAM. Estos dispositivos pueden ser sensores de movimiento, contactos magnéticos, detectores de humo, botón de pánico, entre otros. Cuando un dispositivo de alerta se acciona, éstos envían señales en forma periódica a la central de monitoreo, permitiendo una protección instantánea durante las 24 horas del día.'),
(2, 2, '¿Qué es un Sistema de Videovigilancia IP?', 'Es una tecnología de vigilancia visual que combina los beneficios analógicos de los tradicionales CCTV (Circuito Cerrado de Televisión) con las ventajas digitales de las redes de comunicación IP (Internet Protocol), permitiendo la supervisión local y/o remota de imágenes y audio.\r\nEn Tiempo Real contamos con la experiencia adecuada para desarrollar sus proyectos de seguridad electrónica. Permitiendo aplicar lo más nuevo en cámaras de seguridad tanto “Digitales” como “Análogas”.\r\nEstas últimas también permiten aprovechar su actual sistema de cámaras, ya que los nuevos equipos“XVR”, mantienen tecnología “Pentahibrido” la cual acepta las cinco tecnologías actuales. Estos equipos permiten además detectar a través de un canal el concepto de “Analítica”. También pueden tornar funcionalidades externas como encender luces, realizar voceo, etc.\r\n'),
(3, 3, '¿Qué es un Sistema de Control de Acceso?', 'Un sistema de control de acceso, consiste en verificar a una entidad (Persona, Vehículo) los derechos necesarios para solicitar el acceso.\r\nSERCAM-SR le brinda sistemas para que proteja y facilite el ingreso a su propiedad a través de sistemas de control de acceso que, al utilizar una base de datos, usted puede saber quién entra o quien sale de un determinado lugar. Puede también emitir informes en cualquier momento para saber las horas de entrada y salida de determinado lugar. El Control de Acceso puede utilizar huella dactilar, el uso de una clave numérica o mediante el rostro.\r\n'),
(4, 4, 'Mejorá tu sistema de seguridad con detectores de humo y temperatura', 'Nuestros sistemas de alarma pueden ser complementados con avanzados equipos que detectan la presencia de humo o temperatura, emitiendo una señal de emergencia a nuestra Central de Monitoreo, alertando a nuestros especialistas para tomar contacto con el cliente y con el Cuerpo de Bomberos.\r\nSERCAM-SR Cumple con la Ley 2231/6 contra incendio reglamentada por la disposición 415 de la dirección general de defensa y protección al consumidor. \r\n'),
(5, 5, 'Sistemas de seguridad', 'Todos nuestro productos que son complementos para tu máxima seguridad.'),
(6, 6, '¿Porqué es necesario las baterías en tu sistemas?', 'Toda nuestra sección de baterías de Libre Mantenimiento.\r\nBaterías de litio de larga duración y alta calidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_presale`
--

CREATE TABLE `detail_presale` (
  `id` int(11) NOT NULL,
  `presale_id` int(11) NOT NULL,
  `products` varchar(50) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detail_presale`
--

INSERT INTO `detail_presale` (`id`, `presale_id`, `products`, `total`) VALUES
(1, 10, '', 0),
(2, 11, '', 0),
(3, 12, '', 0),
(4, 13, '', 0),
(5, 14, '', 0),
(6, 15, '', 0),
(7, 16, '', 0),
(8, 17, '', 0),
(9, 18, '', 0),
(10, 19, '', 0),
(11, 20, '', 0),
(12, 21, '33', 1),
(13, 21, '5', 1),
(14, 22, '22', 1),
(15, 22, '17', 1),
(16, 23, '15', 1),
(17, 24, '18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(5) NOT NULL,
  `porcentaje` int(10) NOT NULL,
  `iva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `porcentaje`, `iva`) VALUES
(1, 5, 1.05),
(2, 10, 1.1),
(3, 21, 1.21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presale`
--

CREATE TABLE `presale` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presale`
--

INSERT INTO `presale` (`id`, `user_id`, `date`, `status`) VALUES
(10, 12, '2021-10-01', 0),
(11, 12, '2021-10-01', 0),
(12, 12, '2021-10-01', 0),
(13, 6, '2021-10-01', 0),
(14, 6, '2021-10-01', 0),
(15, 6, '2021-10-01', 0),
(16, 6, '2021-10-01', 0),
(17, 11, '2021-10-02', 0),
(18, 11, '2021-10-02', 0),
(19, 6, '2021-10-03', 0),
(20, 6, '2021-10-04', 0),
(21, 7, '2021-10-04', 0),
(22, 7, '2021-10-04', 0),
(23, 7, '2021-10-04', 0),
(24, 7, '2021-10-04', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(350) NOT NULL,
  `stock` int(11) NOT NULL,
  `price_init` float NOT NULL,
  `price_sale` float NOT NULL,
  `iva` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `type`, `name`, `description`, `photo`, `stock`, `price_init`, `price_sale`, `iva`, `date`, `date_view`, `counter`, `status`) VALUES
(1, 1, 'Teclado KPD8008', '<p>Teclado de Alarma ALONSO.</p>\r\n\r\n<p>1 Zona de Teclado.</p>\r\n\r\n<p>Desactivaci&oacute;n Inteligente.</p>\r\n\r\n<p>Pulsador de P&aacute;nico 24hs</p>\r\n', '1632604376_teclado-alonsong.png', 6, 1350, 1832, '132', '2021-09-21', '2021-10-02', 17, 1),
(2, 1, 'Central de Alarma  DSC 585', '<p>Central de alarma con transformador y gabinete.</p>\r\n', '', 0, 2300, 0, '', '2021-09-21', '0000-00-00', 0, 0),
(3, 1, 'Teclado PC777', '<p>Teclado de central de alarma A2K4 PC777</p>\r\n\r\n<p>Zona de teclado incluida.</p>\r\n\r\n<p>Emergencias 24hs</p>\r\n', '1632335484_Teclado Kpd860.png', 0, 1200, 3025, '525', '2021-09-22', '2021-10-03', 39, 1),
(4, 1, 'Teclado PC585', '<p>Teclado de central de alarma DSC Modelo PC-585.</p>\r\n\r\n<p>5 zonas - 1 zona 24hs.</p>\r\n\r\n<p>Desactivaci&oacute;n Smart.</p>\r\n', '1632604386_teclado-dsc585.png', 5, 2300, 2129.6, '369.6', '2021-09-22', '2021-10-03', 21, 1),
(5, 2, 'Camara Bullet', '<p>Camara de video vigilancia HD 2MP</p>\r\n\r\n<p>Hikvision</p>\r\n\r\n<p>Detecci&oacute;n Smart.</p>\r\n', '1633122973_D_NQ_NP_855123-MLA44808932408_022021-O.jpg', 0, 2300, 2329.25, '404.25', '2021-09-23', '2021-10-03', 9, 1),
(6, 2, 'Camara Bullet Full HD', '<p>Camara tipo Bullet H&iacute;brido Full HD</p>\r\n\r\n<p>Hikvision.</p>\r\n\r\n<p>Detecci&oacute;n de rostro.</p>\r\n', '1632352295_Camara HD Analoga.jpg', 10, 3500, 2838, '258', '2021-09-23', '2021-10-01', 12, 1),
(7, 2, 'Camara De Seguridad Ip P2p Hd Wifi Vision Nocturna Exterior', '<p>C&aacute;mara tipo bullet met&aacute;lico 720p HD.</p>\r\n\r\n<p>La SX37 es la nueva versi&oacute;n de c&aacute;maras Full HD tipo Bullet de GADNIC. Esta c&aacute;mara es IPl65, que da la posibilidad de usarse en interiores o exteriores. Su resoluci&oacute;n Full HD 1080P permite ver con mayor definici&oacute;n cualquier movimiento que pase frente a ella. Gracias a su capacidad de almacenamiento expandible hasta 128GB, y su funci&oacute;n de activaci&oacute;n por movimiento puede optimizar el tiempo de grabado en su memoria.<br />\r\nEl manejo desde la App Gadnic hace que la c&aacute;mara sea muy f&aacute;cil de usar, configurar las notificaciones y alertas en tu celular.</p>\r\n', '1633123155_D_NQ_NP_788289-MLA42306676934_062020.jpg', 10, 1300, 9680, '1680', '2021-09-23', '2021-10-01', 9, 1),
(8, 1, 'Sirena de Interior MP100', '<p>Sirena de Alarma&nbsp;</p>\r\n\r\n<p>1 Tono de alta desibeles.</p>\r\n\r\n<p>Alonso</p>\r\n\r\n<p>Universal</p>\r\n', '1632604367_Sirena-mp100.png', 0, 1300, 1933, '283', '2021-09-24', '2021-10-01', 2, 1),
(9, 1, 'Sirena de Exterior MP 1500', '<p>Sirena de Exterior con led de fijaci&oacute;n.</p>\r\n\r\n<p>Alonso modelo mp-1500.</p>\r\n\r\n<p>Con tamper de seguridad anti-destrucci&oacute;n.</p>\r\n', '1632587680_sirena 1500..png', 5, 2800, 3740, '340', '2021-09-24', '2021-10-03', 6, 1),
(10, 1, 'Sirena de Exterior MP 300', '<p>Sirena de Alta resistencia.&nbsp;</p>\r\n\r\n<p>Tamper anti-destrucci&oacute;n.</p>\r\n\r\n<p>Variedad de tonos&nbsp;</p>\r\n\r\n<p>Led de confirmaci&oacute;n.</p>\r\n\r\n<p>Bateria de respaldo</p>\r\n', '1632604337_sirena-mp-300.png', 5, 3600, 6106, '903', '2021-09-24', '2021-10-01', 5, 1),
(11, 6, 'Bateria MG - 12v', '<p>Bateria de Gel libre mantenimiento.</p>\r\n\r\n<p>MG1270</p>\r\n\r\n<p>Tensi&oacute;n:12v 7A</p>\r\n', '1632604496_bateria12.png', 5, 2300, 3520, '320', '2021-09-25', '2021-10-03', 1, 1),
(12, 6, 'Bateria KEYPOWER', '<p>Bateria de Litio libre mantenimiento.</p>\r\n\r\n<p>Marca: KEYPOWER</p>\r\n\r\n<p>12v-7Ah</p>\r\n', '1632604586_Bateria-keypower.png', 1, 3000, 4235, '735', '2021-09-25', '2021-09-28', 0, 1),
(13, 6, 'Vapex-TECH 1270', '<p>Bater&iacute;a de gel libre mantenimiento</p>\r\n\r\n<p>Voltaje:12v 7A.</p>\r\n\r\n<p>Controlador de carga smart.</p>\r\n', '1632604681_bateria-orange.png', 0, 2500, 3751, '651', '2021-09-25', '2021-10-01', 1, 1),
(14, 3, 'Control ID', '<p>Controlador Autom&aacute;tico de Acceso&nbsp;de huella digital.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1632604813_control-acceso.png', 4, 21000, 29887, '5187', '2021-09-25', '2021-10-02', 18, 1),
(15, 4, 'Detector de Humo TECEX', '<p>Detector de humo 4 hilos.</p>\r\n\r\n<p>Led indicador de detecci&oacute;n activa.</p>\r\n\r\n<p>Buzer indicador</p>\r\n', '1632605015_detector-ina-humo.png', 5, 2350, 4356, '756', '2021-09-25', '2021-10-04', 9, 1),
(16, 4, 'Detector TECXE', '<p>Detecci&oacute;n inal&aacute;mbrica de humo</p>\r\n\r\n<p>Bater&iacute;a de respaldo.</p>\r\n\r\n<p>Buzer indicador de actividad</p>\r\n', '1632605159_detector-inala-humo.png', 10, 2500, 4235, '735', '2021-09-25', '2021-10-02', 12, 1),
(17, 1, 'Teclado DSC NEO1902', '<p>Teclado de Cental de Alarma DSC 1902.</p>\r\n\r\n<p>Teclado inal&aacute;mbrico con zona de auxiliar.</p>\r\n\r\n<p>Zonas 24hs programables.</p>\r\n', '1632710994_teclado-dscneo.png', 3, 8500, 11500, '12155', '2021-09-27', '2021-10-04', 0, 1),
(18, 1, 'Sirena X28 - s52', '<p>Sirena de exterior X28</p>\r\n\r\n<p>6 tonos.</p>\r\n\r\n<p>Tamper de seguridad anti-destrucci&oacute;n.</p>\r\n\r\n<p>Led indicador de estado.</p>\r\n', '1632715994_sirena s52-x28.png', 4, 3200, 4719, '819', '2021-09-27', '2021-10-04', 5, 1),
(19, 5, 'Boton Panico Para Personas', '<p>Sistema de alarma para adultos mayores con boton de panico (resistente al agua) con app por WiFi<br />\r\n<br />\r\nEste sistema se puede monitorear por la app smart life<br />\r\nDe esta forma el sistema funciona como un boton de panico<br />\r\nque informa al celular especificado cuando alguno de los pulsadores<br />\r\nes presionado<br />\r\nAdemas este sistema integra una sirena que se puede activar conjuntamente al dar el aviso<br />\r\nEste sistema necesita de una red WiFi para funcionar con la app. Sin esta red solo funcionara la sirena.</p>\r\n', '1633122473_D_NQ_NP_636657-MLA46962343453_082021-.jpg', 5, 11.825, 14107.5, '1282.5', '2021-10-01', '2021-10-03', 2, 1),
(20, 2, 'Kit 3 Camaras Seguridad Ip Motorizado Wifi Vision', '<p>C&aacute;maras de Seguridad Gadnic SX9 x3 IP WiFi Motorizadas Full HD Visi&oacute;n Nocturna</p>\r\n\r\n<p>&iexcl;Con el Kit de c&aacute;maras de seguridad Gadnic SX9 disfrut&aacute; la tranquilidad de saber que est&aacute;s protegido!<br />\r\nGracias a su conectividad v&iacute;a wifi la instalaci&oacute;n es muy f&aacute;cil: solo necesit&aacute;s descargar la app, conectarte a Wifi y &iexcl;listo!<br />\r\nLa c&aacute;mara de seguridad cuenta con 6 led IR de alto poder que te permiten ver hasta 15 metros en perfectas condiciones a&uacute;n de noche.<br />\r\nLa resoluci&oacute;n FULL HD y su capacidad de movimiento 360 te facilitan ver por completo todo lo que pase alrededor de ella.<br />\r\nEn caso que pase algo, la c&aacute;mara detecta el movimiento y te env&iacute;a una alerta con foto al celular y emite una sirena en el lugar donde este.</p>\r\n', '1633122698_D_NQ_NP_804535-MLA46750645493_072021-.jpg', 4, 12000, 16335, '2835', '2021-10-01', '2021-10-03', 0, 1),
(21, 5, 'Alarma Inalámbrica Sensor Movimiento Sirena Control', '<p>MINI ALARMA CON SENSOR DE MOVIMIENTOS, DOS CONTROLES Y SOPORTE PARA PONER EN LA PARED</p>\r\n\r\n<p>Ubicar la alarma en un lugar estrat&eacute;gico de 2 a 2,5 mts. de altura. Para activar el sensor pulse el bot&oacute;n de cualquiera de los dos controles remotos. El led verde del sensor se encender&aacute; por 30 segundos, luego se apaga y dejar&aacute; activada la alarma. Cuando el sensor detecta el movimiento o la presencia de alguien en un rango de hasta 10 mts. de distancia, &eacute;ste activa la sirena de 105 decibeles, lo suficientemente fuerte para alertar a los habitantes de la casa o a los vecinos m&aacute;s cercanos. El sensor se desactiva presionando nuevamente el bot&oacute;n del Control Remoto o en caso de que no detecte mas movimiento se apaga la sirena a los 30 segundos quedando nuevamente ativada.</p>\r\n', '1633122378_D_NQ_NP_936582-MLA40404265211_012020.jpg', 4, 2000, 3850, '350', '2021-10-01', '2021-10-04', 0, 1),
(22, 3, 'Control Horario Acceso Facial Wifi Ip Hikvision Ds-k1t331w', '<p>AUTENTICACION POR ROSTRO<br />\r\n&iexcl; EVITA EL CONTACTO PARA HACERLE FRENTE A LA PANDEMIA !<br />\r\nBASTA DE ACCESOS CON HUELLA DIGITAL O NUM&Eacute;RICOS QUE PUEDEN SER FUENTES DE CONTAGIO.<br />\r\nREGISTRA HORARIOS DE EMPLEADOS Y PERSONAL CON EL ROSTRO CON ESTE EQUIPO DE PRIMERA MARCA. SE CONTROLA TODO DESDE SOFTWARE CON PC.<br />\r\nTIENE TAMBI&Eacute;N UNA SALIDA A RELE PARA PARA ABRIR O CERRAR PUERTAS.<br />\r\n&nbsp;</p>\r\n', '1633122618_D_NQ_NP_764368-MLA45855683530_052021.jpg', 0, 25000, 35090, '6090', '2021-10-01', '2021-10-04', 0, 1),
(23, 3, 'Control Acceso Facial Huella Hikvision Ds-k1t607mf Wifi Ip', '<p>- Terminal de reconocimiento facial<br />\r\n- Pantalla t&aacute;ctil de 7 pulgadas, lente gran angular de 2 megap&iacute;xeles<br />\r\n- Lector de tarjetas integrado para tarjeta EM / Mifare1 (opcional)<br />\r\n- Algoritmo de aprendizaje profundo<br />\r\n- 6.000 caras, 5.000 tarjetas, 5.000 huellas digitales (opcional), almacenamiento de 10.000 eventos<br />\r\n- TCP / IP, comunicaci&oacute;n Wi-Fi (opcional), IP65<br />\r\n- Detecci&oacute;n anti-spoofing<br />\r\n- Reconocimiento facial en ambiente oscuro.<br />\r\n- Estado de asistencia de tiempo m&uacute;ltiple<br />\r\n- Tasa de precisi&oacute;n de reconocimiento facial&gt; 99%<br />\r\n- Duraci&oacute;n del reconocimiento facial (1: N) 0,5 s<br />\r\n- Distancia de reconocimiento facial: 0,3 m - 1,5 m</p>\r\n', '1633122592_D_NQ_NP_960559-MLA41286698062_032020-.jpg', 5, 90000, 133100, '23100', '2021-10-01', '2021-10-02', 0, 1),
(24, 2, 'Camara Hikvision Cctv 720p', '<p>C&Aacute;MARA BULLET HIKVISION<br />\r\nINFRARROJA HD 720P<br />\r\n4en1 TVI - AHD - CVI - CVBS<br />\r\nCOMPATIBLE CON TODOS LOS DVR DEL MERCADO !!<br />\r\n<br />\r\nCaracter&iacute;sticas:<br />\r\nModelo: DS-2CE16C0T-IPF<br />\r\nImage Sensor: 1MP CMOS Image Sensor<br />\r\nResoluci&oacute;n: 720P (1240 x 720)<br />\r\n24 leds, ICR, 0.01 Lux/F1.2 Smart IR<br />\r\nLente: 2.8mm (92&deg;)<br />\r\nVisi&oacute;n nocturna: 20mts<br />\r\nVoltaje: 12v 500ma<br />\r\nResoluci&oacute;n: 1MP<br />\r\nColor: Blanco<br />\r\nMaterial: Pl&aacute;stico IP66<br />\r\nApto Interior y Exterior</p>\r\n', '1633122489_D_NQ_NP_763262-MLA31994957795_082019.jpg', 0, 2035, 3971, '361', '2021-10-01', '2021-10-01', 1, 1),
(25, 2, 'Camara Infrarroja Hd 1mp', '<p>* Es HD (resoluci&oacute;n 720P, o 1296 x 732), con una calidad de imagen insuperable. Colores vivos, n&iacute;tidos y detallados.<br />\r\n<br />\r\n* Posee sistema EXIR 2.0, lo que se traduce en una visi&oacute;n infrarroja profunda y detallada en completa oscuridad (20m cobertura)<br />\r\n<br />\r\n* Es una c&aacute;mara con lente fijo de 2.8mm y sensor de 1/4&acute;&acute;, lo cual significa que proporcionar&aacute; 92&ordm; de visi&oacute;n.</p>\r\n', '1633122544_D_NQ_NP_911960-MLA46113341852_052021.jpg', 0, 2500, 4356, '756', '2021-10-01', '0000-00-00', 0, 1),
(26, 2, 'Dvr Seguridad Hikvision 4ch', '<p>Formato de v&iacute;deo: 720P / 1080P lite / IP<br />\r\nEntradas de v&iacute;deo: 4 Canales BNC, Acepta normas HDTVI / HDCVI / AHD / CVBS 720P y 1080P (por pares) + 1 Canal IP<br />\r\nConfiguraci&oacute;n h&iacute;brida: 4 Canales desde BNC y 1 Canal IP (1080p), este nuevo software permite cambiar todos los canales a modo IP<br />\r\nSalidas de v&iacute;deo: 1 HDMI Full HD, 1 VGA<br />\r\nEntradas de audio: 1 Canal RCA<br />\r\nSalidas de audio: 1 Canal RCA<br />\r\nAudio bidireccional Reutilizando la entrada/salida de audio<br />\r\nCompresi&oacute;n v&iacute;deo/audio: H.264+ / G.711u<br />\r\nResoluci&oacute;n display: 1920x1080, 1280x1024, 1280x720, 1024x768<br />\r\nResoluci&oacute;n grabaci&oacute;n: 720p 30FPS / 1080P Lite 12 FPS / WD1 / 4CIF /VGA / CIF - H.264/H.264+</p>\r\n', '1633122682_D_NQ_NP_682992-MLA46440434622_062021-O.jpg', 0, 8500, 11374, '1974', '2021-10-01', '2021-10-01', 0, 1),
(27, 2, 'Camara Infrarroja 2mp Hd 1080p Cctv', '<p>Caracteristicas:<br />\r\nModelo: DS-2CE56D0T-IPF<br />\r\nImage Sensor: 2MP CMOS Image Sensor<br />\r\nResolucion: 1080P<br />\r\n24 leds, ICR, 0.01 Lux/F1.2 Smart IR<br />\r\nLente: 2.8mm (92&ordm;)<br />\r\nVision nocturna: 20mts<br />\r\nVoltaje: 12v 500ma<br />\r\nResoluci&oacute;n: 2MP<br />\r\nColor: Blanco<br />\r\nMaterial: Plastico<br />\r\nApto Interior</p>\r\n', '1633122525_D_NQ_NP_906353-MLA31035424305_062019-O.jpg', 10, 3000, 3025, '525', '2021-10-01', '2021-10-02', 2, 1),
(28, 4, 'Alarma Sirena Contra Incendio Y Pulsador Avisador Fuente220v', '<p>El Kit consta de una sirena de alarma con luz destellante, la cual al presionar romper el vidrio se dispara un sonido de alarma dando aviso.<br />\r\nEl pulsador incluye herramienta para realizar simulacros y pruebas del sistema.<br />\r\n<br />\r\nCaracteristicas principales:<br />\r\n-Voltaje de operacion 24V CC<br />\r\n-Corriente de trabajo 250mA<br />\r\n-Sonidos seleccionables de:<br />\r\nBomberos<br />\r\nPolicia<br />\r\nAmbulancia<br />\r\n&nbsp;</p>\r\n', '1633122321_D_NQ_NP_656493-MLA31022060373_062019-O.jpg', 4, 4500, 6776, '1176', '2021-10-01', '2021-10-01', 0, 1),
(29, 4, 'Central De Alarma Aviso De Incendio Completa Con Sensores', '<p>Kit compuesto por una central de alarma de 3 zonas, 1 sirena, 2 sensores de humo, 1 bateria , 1 cartel se&ntilde;alizador de alarma.<br />\r\n<br />\r\nCaracteristicas principales:<br />\r\nSIRENA INTERIOR / EXTERIOR DE 30W SUPER POTENTE<br />\r\nCENTRAL DE ALARMA DE 3 ZONAS CON ACTIVACION / DESACTIVACION POR PULSADOR<br />\r\nSENSORES DE HUMO CON SOPORTE INCLUIDO<br />\r\nCARTEL SE&Ntilde;ALIZACION DE ALARMA<br />\r\nLA CAPACIDAD MAXIMA ES DE 12 SENSORES EN TOTAL<br />\r\nBATERIA DE GEL POR CORTES DE LUZ 12V 7A</p>\r\n', '1633122561_D_NQ_NP_958472-MLA43577103632_092020.jpg', 6, 18800, 29040, '5040', '2021-10-01', '0000-00-00', 0, 1),
(30, 4, 'Central Panel Alarma Incendio Homologado Inim Expandible 20z', '<p>El SmartLine Panel de Control convencional para detecci&oacute;n de fuegos ofrece 4 zonas expandible a 20 zonas (con modulo expansor no incluido). La instalaci&oacute;n f&aacute;cil y segura, los procedimientos elementales de programaci&oacute;n y la operaci&oacute;n simple para el integrador o usuario final hace a este Panel de Control altamente competitivo, ideal para aplicaciones peque&ntilde;as y medianas, especialmente esas aplicaciones d&oacute;nde la programaci&oacute;n e instalaci&oacute;n r&aacute;pida y segura est&aacute;n entre los aspectos m&aacute;s importantes del sistema. Las numerosas funciones, la flexibilidad y las capacidades innovadoras de conectividad (RS485, TCP/IP, etc.). Las salidas supervisadas de los paneles de control SmartLine (una en la tarjeta principal y una en cada expansi&oacute;n a&ntilde;adida) para la activaci&oacute;n de dispositivos audiovisuales, una salida del relevadores y dos salidas del 24V.&nbsp;</p>\r\n', '1633122576_D_NQ_NP_942872-MLA45739124444_042021-O.jpg', 0, 34560, 54450, '9450', '2021-10-01', '0000-00-00', 0, 1),
(31, 6, 'Bateria Gel 6v 2.8ah Recargable Luz Emergencia Alarma Ups', '<p>BATER&Iacute;A DE GEL PARA JUGUETES, ILUMINACION Y ALARMAS MODELO 6V 2.8AH<br />\r\n&nbsp;</p>\r\n', '1633122463_D_NQ_NP_866955-MLA46615914614_072021.jpg', 5, 1000, 1650, '150', '2021-10-01', '2021-10-01', 0, 1),
(32, 6, 'Bateria Alarma 12v 7ah 7a Recargable Leds Ups', '<p>&raquo; Selladas, libres de mantenimiento y utilizables en cualquier posici&oacute;n.<br />\r\n&raquo; Composici&oacute;n: electrolito absorbido<br />\r\n&raquo; Terminales faston F1 de 4,75mm<br />\r\n&raquo; Dimensiones: 15 x 9 x 6.5cm<br />\r\n&raquo; Vida &uacute;til de 3 a 5 a&ntilde;os<br />\r\n&raquo; Potencia: 7000mA<br />\r\n&raquo; Voltaje: 12V<br />\r\n&raquo; Peso: 2Kg</p>\r\n', '1633122456_D_NQ_NP_695299-MLA47662200505_092021-O.jpg', 10, 2500, 4235, '735', '2021-10-01', '2021-10-01', 0, 1),
(33, 1, 'Alarma Domiciliaria Cableada+teclado Led-a2k4-ng', '<p>La &ldquo;Nueva Generaci&oacute;n&rdquo; de A2K4 es un poderoso sistema de alarmas para peque&ntilde;as y medianas instalaciones que le otorga al usuario e instalador ventajas y caracter&iacute;sticas competitivas a la hora de seleccionar el producto para la protecci&oacute;n de su familia. Los nuevos procesadores utilizados en el dise&ntilde;o permiten caracter&iacute;sticas sobresalientes como &quot;Voice Control&quot;, &quot;Verificaci&oacute;n de Audio&quot;, opci&oacute;n para operar con detectores inal&aacute;mbricos, conexi&oacute;n con comunicadores GPRS e IP, entre muchas funciones mas.<br />\r\n<br />\r\nESPECIFICACIONES T&Eacute;CNICAS<br />\r\n&bull; Lista para usar, incluye Teclado KPD-800, transformador y gabinete.<br />\r\n&bull; 6 zonas en la placa principal + 2 zonas, una por teclado.<br />\r\n&bull; 2 salidas PGM en la placa principal.<br />\r\n&bull; Hasta 2 particiones independientes.<br />\r\n&bull; Hasta 512 eventos en memoria.<br />\r\n&bull; 32 c&oacute;digos de usuario.<br />\r\n&bull; Incluye Voice Control para Control a distancia.<br />\r\n&bull; Verificaci&oacute;n de audio unidireccional.</p>\r\n', '1633123944_KIT CON SIRENA.jpg', 5, 15000, 21780, '3780', '2021-10-01', '2021-10-03', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_category`
--

CREATE TABLE `products_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products_category`
--

INSERT INTO `products_category` (`id`, `name`, `identity`, `status`) VALUES
(1, 'intrusion', 'Alarmas', 1),
(2, 'cctv', 'videovigilancia IP', 1),
(3, 'acceso', 'Control de Acceso', 1),
(4, 'incendio', 'Alerta de Incendio', 1),
(5, 'varios', 'Sistemas de Alerta', 1),
(6, 'baterias', 'Baterias', 1),
(7, 'Cables', 'Cables', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `net_pay` float NOT NULL,
  `tax` float NOT NULL,
  `full_payment` float NOT NULL,
  `date_sale` date NOT NULL,
  `created` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `code`, `net_pay`, `tax`, `full_payment`, `date_sale`, `created`, `status`) VALUES
(2, 11, '17201639411', 4719, 235.95, 4954.95, '2021-07-02', '2021-07-02', 1),
(54, 12, '12121212', 29887, 1, 31540, '2021-09-30', '2021-09-30', 1),
(55, 6, '17274665749', 6956, 347.8, 7303.8, '2021-09-28', '2021-09-28', 1),
(56, 6, '1727466574698254', 10516, 525.8, 11041.8, '2021-09-21', '2021-09-21', 1),
(57, 6, '5625652523256', 29887, 1494.35, 31381.3, '2021-09-23', '2021-09-23', 1),
(58, 11, '17285955711', 29887, 1494.35, 31381.3, '2021-07-24', '2021-07-24', 1),
(59, 6, '17312630342', 32670, 1633.5, 34303.5, '2021-07-23', '2021-07-23', 1),
(60, 7, '172859557113424', 48218.5, 2410.93, 50629.4, '2021-08-11', '2021-08-11', 1),
(61, 7, '17274665749656565', 46590, 2329.5, 48919.5, '2021-08-20', '2021-08-20', 1),
(62, 7, '121212128556852', 4356, 217.8, 4573.8, '2021-08-10', '2021-08-10', 1),
(63, 7, '17285955711a12389', 4719, 235.95, 4954.95, '2021-10-04', '2021-10-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `price_init` float NOT NULL,
  `date` date NOT NULL,
  `approbation` tinyint(1) NOT NULL,
  `expiration` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services_category`
--

CREATE TABLE `services_category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price_init` float NOT NULL,
  `satus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `services_category`
--

INSERT INTO `services_category` (`id`, `name`, `price_init`, `satus`) VALUES
(1, 'Instalación', 2500, 1),
(2, 'Ampliación', 4000, 1),
(3, 'Reparación', 1000, 1),
(4, 'Extracción', 500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(350) NOT NULL,
  `password` varchar(60) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `presale` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `type`, `firstname`, `lastname`, `email`, `address`, `contact_info`, `photo`, `password`, `activate_code`, `date`, `presale`, `status`) VALUES
(4, 1, 'Silvio', 'Rojas', 'admin@admin.com', 'Edgardo Alonso 341', '2625455634', '1633361154_Perfil .png', '$2y$04$wl.l8PwbeUBTwAa8N7XqmupYAcjt59MZpNXNKjRZ//QL63TImnF4m', 'eqjZuX2bzkUF', '2021-09-15', 0, 1),
(5, 2, 'Pepe', 'Honguito', 'pepeHongo@correo.com', 'Av. Libertador Sur 385', '2625455634', '1632584183_clerk.png', '$2y$04$pzvSQvu/yzfc034J63thmupjed7mkQSVMtVw7UbPOLLkHUQOn0ZdC', 'HxAQMDJw17bU', '2021-09-15', 1, 0),
(6, 2, 'Micaela Jazmin', 'Martinez', 'micamartinez@correo.com', 'Francia 38 ', '2625411185', '1633264995_user_acount.png', '$2y$04$T5sYsiV4qjN2aHEgUa7vMu.ecp30Oia3maHfY3vA09eoc8uwfQZfW', 'FAVdDrTkqQLG', '2021-09-15', 0, 1),
(7, 2, 'Mia Priscila', 'Rojas Martinez', 'miapriscila@correo.com', 'Edgardo Alonso 341', '2625422439', '1631967731_ianh.jpg', '$2y$04$FeQfGjPOiV7XYYTYc1tdU.kJcb93/okifYVKXYVjHQd9r0g5he2za', '5JBWLH7i2fpA', '2021-09-15', 0, 1),
(8, 2, 'Eduardo Ezequiel', 'Rojas Lujan ', 'eduardo.ezero95@gmail.com', 'General Alvear ', '2625679939', '1631972392_20210914_175352.jpg', '$2y$04$Zl8RuKxfeEbIjqaw6JXjKueUQLwE.VaD6rVSwXLKAiSb9dbhkl9JC', 'phRAVUGyeYxd', '2021-09-17', 0, 1),
(11, 2, 'Luciano', 'Gili', 'luciano@mail.com', 'Edgardo Alonso 341', '2625455634', '1633360705_men.png', '$2y$04$oA0Kmk2byCdu2xNffSiyJuT7WU77rjEkNCYk6PAgd8WhP1H77k3qq', 'Pmp6xAh9F8tT', '2021-09-23', 0, 1),
(12, 2, 'dante', 'Pagano', 'dante@mail.com', 'Calle7', '2625455634', '1633361993_developer.png', '$2y$04$GqzeQcHXVptLrt6iTWOLPeX7TzWWc0ox6gphmArGHDMZtreamQ7JO', 'xDR9I3c2nT57', '2021-09-28', 0, 1),
(13, 2, 'David', 'Veisaga', 'david@mail.com', 'Ing. Lange 300', '12356789', '1633362007_developer.png', '$2y$04$o4T9WSI2uEDbYV9ujfX8xO9rYqr6qaB8nwpqwFl5A.Tg4TBOSO1Fi', '', '2021-10-04', 0, 1),
(14, 2, 'Gustavo', 'Gomez', 'gustavo@mail.com', 'Av. Lugones 692', '32165498', '1633362038_men.png', '$2y$04$yt2tHzuhfdQUufZQcDSS5eS8y5TbmuSgXf.XZzbftdt093w5omlvK', '', '2021-10-04', 0, 1),
(15, 2, 'Leticia', 'Biagetti', 'leticia@mail.com', 'Av. Mendoza 1068', '98765432', '1633362053_women.png', '$2y$04$s8KzD3ZkUX97wdJ8csC.nO4xYNt3n2hSMoh4kpHxc8EcHmp4r2ds.', '', '2021-10-04', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_category`
--

INSERT INTO `user_category` (`id`, `name`, `status`) VALUES
(1, 'Administrator', 1),
(2, 'Customer', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`user_id`),
  ADD KEY `fk_cart_product` (`product_id`);

--
-- Indices de la tabla `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_sales` (`sales_id`),
  ADD KEY `fk_detail_product` (`product_id`);

--
-- Indices de la tabla `detail_category`
--
ALTER TABLE `detail_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_category` (`category_id`);

--
-- Indices de la tabla `detail_presale`
--
ALTER TABLE `detail_presale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_presale` (`presale_id`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presale`
--
ALTER TABLE `presale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_presale_users` (`user_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`type`);

--
-- Indices de la tabla `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_user` (`user_id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_services_category` (`type`),
  ADD KEY `fk_services_user` (`user_id`);

--
-- Indices de la tabla `services_category`
--
ALTER TABLE `services_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_category` (`type`);

--
-- Indices de la tabla `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detail_category`
--
ALTER TABLE `detail_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detail_presale`
--
ALTER TABLE `detail_presale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `presale`
--
ALTER TABLE `presale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `services_category`
--
ALTER TABLE `services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `fk_detail_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_sales` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail_category`
--
ALTER TABLE `detail_category`
  ADD CONSTRAINT `fk_details_category` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail_presale`
--
ALTER TABLE `detail_presale`
  ADD CONSTRAINT `fk_detail_presale` FOREIGN KEY (`presale_id`) REFERENCES `presale` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `presale`
--
ALTER TABLE `presale`
  ADD CONSTRAINT `fk_presale_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`type`) REFERENCES `products_category` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_category` FOREIGN KEY (`type`) REFERENCES `services_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_services_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_category` FOREIGN KEY (`type`) REFERENCES `user_category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
