-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-07-2016 a las 10:46:35
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `slxcontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alert`
--

CREATE TABLE IF NOT EXISTS `tb_alert` (
`cp_id` int(11) NOT NULL,
  `cp_alert_cgf_id` int(11) NOT NULL,
  `cp_inicio` bigint(255) NOT NULL,
  `cp_final` bigint(255) DEFAULT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_comentario` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_alert`
--

INSERT INTO `tb_alert` (`cp_id`, `cp_alert_cgf_id`, `cp_inicio`, `cp_final`, `cp_estado_cfg_id`, `cp_oid`, `cp_comentario`) VALUES
(1, 9, 1440795360, 0, 4, 1440795360, 'Pendiente ....'),
(2, 9, 1440799920, 0, 4, 1440799920, 'Pendiente ....'),
(3, 9, 1440800040, 0, 4, 1440800040, 'Pendiente ....'),
(4, 9, 1440800040, 0, 4, 1440800040, 'Pendiente ....'),
(5, 9, 1440800100, 0, 4, 1440800100, 'Pendiente ....'),
(6, 9, 1440800100, 0, 4, 1440800100, 'Pendiente ....'),
(7, 9, 1440800160, 0, 4, 1440800160, 'Pendiente ....'),
(8, 9, 1440800760, 0, 4, 1440800760, 'Pendiente ....'),
(9, 9, 1440800820, 0, 4, 1440800820, 'Pendiente ....'),
(10, 9, 1440800880, 0, 4, 1440800880, 'Pendiente ....'),
(11, 9, 1440800880, 0, 4, 1440800880, 'Pendiente ....'),
(12, 9, 1440800940, 0, 4, 1440800940, 'Pendiente ....'),
(13, 9, 1440801000, 0, 4, 1440801000, 'Pendiente ....'),
(14, 9, 1440801060, 0, 4, 1440801060, 'Pendiente ....'),
(15, 9, 1440801180, 0, 4, 1440801180, 'Pendiente ....'),
(16, 9, 1440801240, 0, 4, 1440801240, 'Pendiente ....'),
(17, 9, 1440801240, 0, 4, 1440801240, 'Pendiente ....'),
(18, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(19, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(20, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(21, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(22, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(23, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(24, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(25, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(26, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(27, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(28, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(29, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(30, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(31, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(32, 8, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(33, 9, 1440801360, 0, 4, 1440801360, 'Pendiente ....'),
(34, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(35, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(36, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(37, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(38, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(39, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(40, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(41, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(42, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(43, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(44, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(45, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(46, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(47, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(48, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(49, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(50, 8, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(51, 9, 1440801420, 0, 4, 1440801420, 'Pendiente ....'),
(52, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(53, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(54, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(55, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(56, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(57, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(58, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(59, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(60, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(61, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(62, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(63, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(64, 8, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(65, 9, 1440801480, 0, 4, 1440801480, 'Pendiente ....'),
(66, 8, 1440801720, 0, 4, 1440801720, 'Pendiente ....'),
(67, 8, 1440801720, 0, 4, 1440801720, 'Pendiente ....'),
(68, 8, 1440801720, 0, 4, 1440801720, 'Pendiente ....'),
(69, 8, 1440801720, 0, 4, 1440801720, 'Pendiente ....'),
(70, 9, 1440802260, 0, 4, 1440802260, 'Pendiente ....'),
(71, 9, 1440802260, 0, 4, 1440802260, 'Pendiente ....'),
(72, 9, 1440802260, 0, 4, 1440802260, 'Pendiente ....'),
(73, 9, 1440802320, 0, 4, 1440802320, 'Pendiente ....'),
(74, 9, 1440802380, 0, 4, 1440802380, 'Pendiente ....'),
(75, 9, 1440802560, 0, 4, 1440802560, 'Pendiente ....'),
(76, 9, 1440802560, 0, 4, 1440802560, 'Pendiente ....'),
(77, 9, 1440802740, 0, 4, 1440802740, 'Pendiente ....'),
(78, 9, 1440802800, 0, 4, 1440802800, 'Pendiente ....'),
(79, 9, 1440803160, 0, 4, 1440803160, 'Pendiente ....'),
(80, 9, 1440803220, 0, 4, 1440803220, 'Pendiente ....'),
(81, 9, 1440803280, 0, 4, 1440803280, 'Pendiente ....'),
(82, 9, 1440803340, 0, 4, 1440803340, 'Pendiente ....'),
(83, 9, 1440803460, 0, 4, 1440803460, 'Pendiente ....'),
(84, 9, 1440803520, 0, 4, 1440803520, 'Pendiente ....'),
(85, 9, 1440803520, 0, 4, 1440803520, 'Pendiente ....'),
(86, 9, 1440803700, 0, 4, 1440803700, 'Pendiente ....'),
(87, 9, 1440803820, 0, 4, 1440803820, 'Pendiente ....'),
(88, 9, 1440804000, 0, 4, 1440804000, 'Pendiente ....'),
(89, 9, 1440804060, 0, 4, 1440804060, 'Pendiente ....'),
(90, 9, 1440804060, 0, 4, 1440804060, 'Pendiente ....'),
(91, 9, 1440804300, 0, 4, 1440804300, 'Pendiente ....'),
(92, 9, 1440804300, 0, 4, 1440804300, 'Pendiente ....'),
(93, 9, 1440804360, 0, 4, 1440804360, 'Pendiente ....'),
(94, 9, 1440804540, 0, 4, 1440804540, 'Pendiente ....'),
(95, 9, 1440804600, 0, 4, 1440804600, 'Pendiente ....'),
(96, 9, 1440804720, 0, 4, 1440804720, 'Pendiente ....'),
(97, 9, 1440804780, 0, 4, 1440804780, 'Pendiente ....'),
(98, 9, 1440804960, 0, 4, 1440804960, 'Pendiente ....'),
(99, 9, 1440805080, 0, 4, 1440805080, 'Pendiente ....'),
(100, 9, 1440805080, 0, 4, 1440805080, 'Pendiente ....'),
(101, 9, 1440805200, 0, 4, 1440805200, 'Pendiente ....'),
(102, 9, 1440805200, 0, 4, 1440805200, 'Pendiente ....'),
(103, 9, 1440805200, 0, 4, 1440805200, 'Pendiente ....'),
(104, 9, 1440805260, 0, 4, 1440805260, 'Pendiente ....'),
(105, 9, 1440805440, 0, 4, 1440805440, 'Pendiente ....'),
(106, 9, 1440805440, 0, 4, 1440805440, 'Pendiente ....'),
(107, 9, 1440805560, 0, 4, 1440805560, 'Pendiente ....'),
(108, 9, 1440805560, 0, 4, 1440805560, 'Pendiente ....'),
(109, 9, 1440805620, 0, 4, 1440805620, 'Pendiente ....'),
(110, 9, 1440805740, 0, 4, 1440805740, 'Pendiente ....'),
(111, 9, 1440805800, 0, 4, 1440805800, 'Pendiente ....'),
(112, 9, 1440805860, 0, 4, 1440805860, 'Pendiente ....'),
(113, 9, 1440805920, 0, 4, 1440805920, 'Pendiente ....'),
(114, 9, 1440805920, 0, 4, 1440805920, 'Pendiente ....'),
(115, 9, 1440805980, 0, 4, 1440805980, 'Pendiente ....'),
(116, 9, 1440806040, 0, 4, 1440806040, 'Pendiente ....'),
(117, 9, 1440806040, 0, 4, 1440806040, 'Pendiente ....'),
(118, 9, 1440806160, 0, 4, 1440806160, 'Pendiente ....'),
(119, 9, 1440806340, 0, 4, 1440806340, 'Pendiente ....'),
(120, 9, 1440806640, 0, 4, 1440806640, 'Pendiente ....'),
(121, 9, 1440806880, 0, 4, 1440806880, 'Pendiente ....'),
(122, 9, 1440806940, 0, 4, 1440806940, 'Pendiente ....'),
(123, 9, 1440807000, 0, 4, 1440807000, 'Pendiente ....'),
(124, 9, 1440807000, 0, 4, 1440807000, 'Pendiente ....'),
(125, 9, 1440807120, 0, 4, 1440807120, 'Pendiente ....'),
(126, 9, 1440807240, 0, 4, 1440807240, 'Pendiente ....'),
(127, 9, 1440807300, 0, 4, 1440807300, 'Pendiente ....'),
(128, 9, 1440807360, 0, 4, 1440807360, 'Pendiente ....'),
(129, 9, 1440807360, 0, 4, 1440807360, 'Pendiente ....'),
(130, 9, 1440807360, 0, 4, 1440807360, 'Pendiente ....'),
(131, 9, 1440807480, 0, 4, 1440807480, 'Pendiente ....'),
(132, 9, 1440807540, 0, 4, 1440807540, 'Pendiente ....'),
(133, 9, 1440807600, 0, 4, 1440807600, 'Pendiente ....'),
(134, 9, 1440807660, 0, 4, 1440807660, 'Pendiente ....'),
(135, 9, 1440807840, 0, 4, 1440807840, 'Pendiente ....'),
(136, 9, 1440807900, 0, 4, 1440807900, 'Pendiente ....'),
(137, 9, 1440808020, 0, 4, 1440808020, 'Pendiente ....'),
(138, 9, 1440808020, 0, 4, 1440808020, 'Pendiente ....'),
(139, 9, 1440808080, 0, 4, 1440808080, 'Pendiente ....'),
(140, 9, 1440808140, 0, 4, 1440808140, 'Pendiente ....'),
(141, 8, 1440846720, 0, 4, 1440846720, 'Pendiente ....'),
(142, 9, 1440846720, 0, 4, 1440846720, 'Pendiente ....'),
(143, 9, 1440848700, 0, 4, 1440848700, 'Pendiente ....'),
(144, 9, 1440848820, 0, 4, 1440848820, 'Pendiente ....'),
(145, 9, 1440848880, 0, 4, 1440848880, 'Pendiente ....'),
(146, 9, 1440848880, 0, 4, 1440848880, 'Pendiente ....'),
(147, 9, 1440849540, 0, 4, 1440849540, 'Pendiente ....'),
(148, 9, 1440849540, 0, 4, 1440849540, 'Pendiente ....'),
(149, 9, 1440849540, 0, 4, 1440849540, 'Pendiente ....'),
(150, 9, 1440849660, 0, 4, 1440849660, 'Pendiente ....'),
(151, 9, 1440849720, 0, 4, 1440849720, 'Pendiente ....'),
(152, 9, 1440849780, 0, 4, 1440849780, 'Pendiente ....'),
(153, 9, 1440849900, 0, 4, 1440849900, 'Pendiente ....'),
(154, 9, 1440849960, 0, 4, 1440849960, 'Pendiente ....'),
(155, 9, 1440849960, 0, 4, 1440849960, 'Pendiente ....'),
(156, 9, 1440849960, 0, 4, 1440849960, 'Pendiente ....'),
(157, 9, 1440850140, 0, 4, 1440850140, 'Pendiente ....'),
(158, 9, 1440850320, 0, 4, 1440850320, 'Pendiente ....'),
(159, 9, 1440850320, 0, 4, 1440850320, 'Pendiente ....'),
(160, 9, 1440850620, 0, 4, 1440850620, 'Pendiente ....'),
(161, 9, 1440850620, 0, 4, 1440850620, 'Pendiente ....'),
(162, 9, 1440850620, 0, 4, 1440850620, 'Pendiente ....'),
(163, 9, 1440850680, 0, 4, 1440850680, 'Pendiente ....'),
(164, 9, 1440850680, 0, 4, 1440850680, 'Pendiente ....'),
(165, 9, 1440850740, 0, 4, 1440850740, 'Pendiente ....'),
(166, 9, 1440850740, 0, 4, 1440850740, 'Pendiente ....'),
(167, 9, 1440850740, 0, 4, 1440850740, 'Pendiente ....'),
(168, 9, 1440850800, 0, 4, 1440850800, 'Pendiente ....'),
(169, 9, 1440850800, 0, 4, 1440850800, 'Pendiente ....'),
(170, 9, 1440850920, 0, 4, 1440850920, 'Pendiente ....'),
(171, 9, 1440850920, 0, 4, 1440850920, 'Pendiente ....'),
(172, 9, 1440850980, 0, 4, 1440850980, 'Pendiente ....'),
(173, 9, 1440851040, 0, 4, 1440851040, 'Pendiente ....'),
(174, 9, 1440851160, 0, 4, 1440851160, 'Pendiente ....'),
(175, 9, 1440851220, 0, 4, 1440851220, 'Pendiente ....'),
(176, 9, 1440851220, 0, 4, 1440851220, 'Pendiente ....'),
(177, 9, 1440851340, 0, 4, 1440851340, 'Pendiente ....'),
(178, 9, 1440851400, 0, 4, 1440851400, 'Pendiente ....'),
(179, 9, 1440851400, 0, 4, 1440851400, 'Pendiente ....'),
(180, 9, 1440851460, 0, 4, 1440851460, 'Pendiente ....'),
(181, 9, 1440851520, 0, 4, 1440851520, 'Pendiente ....'),
(182, 9, 1440851580, 0, 4, 1440851580, 'Pendiente ....'),
(183, 9, 1440851760, 0, 4, 1440851760, 'Pendiente ....'),
(184, 9, 1440851820, 0, 4, 1440851820, 'Pendiente ....'),
(185, 9, 1440851880, 0, 4, 1440851880, 'Pendiente ....'),
(186, 9, 1440851940, 0, 4, 1440851940, 'Pendiente ....'),
(187, 9, 1440852000, 0, 4, 1440852000, 'Pendiente ....'),
(188, 9, 1440852060, 0, 4, 1440852060, 'Pendiente ....'),
(189, 9, 1440852060, 0, 4, 1440852060, 'Pendiente ....'),
(190, 9, 1440852060, 0, 4, 1440852060, 'Pendiente ....'),
(191, 9, 1440852120, 0, 4, 1440852120, 'Pendiente ....'),
(192, 9, 1440852120, 0, 4, 1440852120, 'Pendiente ....'),
(193, 9, 1440852240, 0, 4, 1440852240, 'Pendiente ....'),
(194, 9, 1440852240, 0, 4, 1440852240, 'Pendiente ....'),
(195, 9, 1440852360, 0, 4, 1440852360, 'Pendiente ....'),
(196, 9, 1440852540, 0, 4, 1440852540, 'Pendiente ....'),
(197, 9, 1440852660, 0, 4, 1440852660, 'Pendiente ....'),
(198, 9, 1440852720, 0, 4, 1440852720, 'Pendiente ....'),
(199, 9, 1440852720, 0, 4, 1440852720, 'Pendiente ....'),
(200, 9, 1440852780, 0, 4, 1440852780, 'Pendiente ....'),
(201, 9, 1440852780, 0, 4, 1440852780, 'Pendiente ....'),
(202, 9, 1440852780, 0, 4, 1440852780, 'Pendiente ....'),
(203, 9, 1440852840, 0, 4, 1440852840, 'Pendiente ....'),
(204, 9, 1440852840, 0, 4, 1440852840, 'Pendiente ....'),
(205, 9, 1440852900, 0, 4, 1440852900, 'Pendiente ....'),
(206, 9, 1440852960, 0, 4, 1440852960, 'Pendiente ....'),
(207, 9, 1440852960, 0, 4, 1440852960, 'Pendiente ....'),
(208, 9, 1440852960, 0, 4, 1440852960, 'Pendiente ....'),
(209, 9, 1440853080, 0, 4, 1440853080, 'Pendiente ....'),
(210, 9, 1440853140, 0, 4, 1440853140, 'Pendiente ....'),
(211, 9, 1440853140, 0, 4, 1440853140, 'Pendiente ....'),
(212, 9, 1440853200, 0, 4, 1440853200, 'Pendiente ....'),
(213, 9, 1440853320, 0, 4, 1440853320, 'Pendiente ....'),
(214, 9, 1440853320, 0, 4, 1440853320, 'Pendiente ....'),
(215, 9, 1440853380, 0, 4, 1440853380, 'Pendiente ....'),
(216, 9, 1440853440, 0, 4, 1440853440, 'Pendiente ....'),
(217, 9, 1440853500, 0, 4, 1440853500, 'Pendiente ....'),
(218, 9, 1440853740, 0, 4, 1440853740, 'Pendiente ....'),
(219, 9, 1440853800, 0, 4, 1440853800, 'Pendiente ....'),
(220, 9, 1440853800, 0, 4, 1440853800, 'Pendiente ....'),
(221, 9, 1440853860, 0, 4, 1440853860, 'Pendiente ....'),
(222, 9, 1440853860, 0, 4, 1440853860, 'Pendiente ....'),
(223, 9, 1440855540, 0, 4, 1440855540, 'Pendiente ....'),
(224, 9, 1440855540, 0, 4, 1440855540, 'Pendiente ....'),
(225, 9, 1440855660, 0, 4, 1440855660, 'Pendiente ....'),
(226, 9, 1440855780, 0, 4, 1440855780, 'Pendiente ....'),
(227, 9, 1440855900, 0, 4, 1440855900, 'Pendiente ....'),
(228, 9, 1440855900, 0, 4, 1440855900, 'Pendiente ....'),
(229, 9, 1440855960, 0, 4, 1440855960, 'Pendiente ....'),
(230, 9, 1440856260, 0, 4, 1440856260, 'Pendiente ....'),
(231, 9, 1440856260, 0, 4, 1440856260, 'Pendiente ....'),
(232, 9, 1440856320, 0, 4, 1440856320, 'Pendiente ....'),
(233, 9, 1440856320, 0, 4, 1440856320, 'Pendiente ....'),
(234, 9, 1440856440, 0, 4, 1440856440, 'Pendiente ....'),
(235, 9, 1440856500, 0, 4, 1440856500, 'Pendiente ....'),
(236, 9, 1440856860, 0, 4, 1440856860, 'Pendiente ....'),
(237, 9, 1440857040, 0, 4, 1440857040, 'Pendiente ....'),
(238, 9, 1440857040, 0, 4, 1440857040, 'Pendiente ....'),
(239, 9, 1440857040, 0, 4, 1440857040, 'Pendiente ....'),
(240, 9, 1440857040, 0, 4, 1440857040, 'Pendiente ....'),
(241, 9, 1440857040, 0, 4, 1440857040, 'Pendiente ....'),
(242, 9, 1440857100, 0, 4, 1440857100, 'Pendiente ....'),
(243, 9, 1440857100, 0, 4, 1440857100, 'Pendiente ....'),
(244, 9, 1440857160, 0, 4, 1440857160, 'Pendiente ....'),
(245, 9, 1440857160, 0, 4, 1440857160, 'Pendiente ....'),
(246, 9, 1440857160, 0, 4, 1440857160, 'Pendiente ....'),
(247, 9, 1440857220, 0, 4, 1440857220, 'Pendiente ....'),
(248, 9, 1440857220, 0, 4, 1440857220, 'Pendiente ....'),
(249, 9, 1440857340, 0, 4, 1440857340, 'Pendiente ....'),
(250, 9, 1440857340, 0, 4, 1440857340, 'Pendiente ....'),
(251, 9, 1440857400, 0, 4, 1440857400, 'Pendiente ....'),
(252, 9, 1440857460, 0, 4, 1440857460, 'Pendiente ....'),
(253, 9, 1440857520, 0, 4, 1440857520, 'Pendiente ....'),
(254, 9, 1440857640, 0, 4, 1440857640, 'Pendiente ....'),
(255, 9, 1440857640, 0, 4, 1440857640, 'Pendiente ....'),
(256, 9, 1440857700, 0, 4, 1440857700, 'Pendiente ....'),
(257, 9, 1440857880, 0, 4, 1440857880, 'Pendiente ....'),
(258, 9, 1440857940, 0, 4, 1440857940, 'Pendiente ....'),
(259, 9, 1440858000, 0, 4, 1440858000, 'Pendiente ....'),
(260, 9, 1440858060, 0, 4, 1440858060, 'Pendiente ....'),
(261, 9, 1440858060, 0, 4, 1440858060, 'Pendiente ....'),
(262, 9, 1440858120, 0, 4, 1440858120, 'Pendiente ....'),
(263, 9, 1440858120, 0, 4, 1440858120, 'Pendiente ....'),
(264, 9, 1440858540, 0, 4, 1440858540, 'Pendiente ....'),
(265, 9, 1440858600, 0, 4, 1440858600, 'Pendiente ....'),
(266, 9, 1440858660, 0, 4, 1440858660, 'Pendiente ....'),
(267, 9, 1440858660, 0, 4, 1440858660, 'Pendiente ....'),
(268, 9, 1440858780, 0, 4, 1440858780, 'Pendiente ....'),
(269, 9, 1440858840, 0, 4, 1440858840, 'Pendiente ....'),
(270, 9, 1440858840, 0, 4, 1440858840, 'Pendiente ....'),
(271, 9, 1440858900, 0, 4, 1440858900, 'Pendiente ....'),
(272, 9, 1440858900, 0, 4, 1440858900, 'Pendiente ....'),
(273, 9, 1440859020, 0, 4, 1440859020, 'Pendiente ....'),
(274, 9, 1440859080, 0, 4, 1440859080, 'Pendiente ....'),
(275, 9, 1440859200, 0, 4, 1440859200, 'Pendiente ....'),
(276, 9, 1440859260, 0, 4, 1440859260, 'Pendiente ....'),
(277, 9, 1440859500, 0, 4, 1440859500, 'Pendiente ....'),
(278, 9, 1440859500, 0, 4, 1440859500, 'Pendiente ....'),
(279, 9, 1440859680, 0, 4, 1440859680, 'Pendiente ....'),
(280, 9, 1440859680, 0, 4, 1440859680, 'Pendiente ....'),
(281, 9, 1440859680, 0, 4, 1440859680, 'Pendiente ....'),
(282, 9, 1440859740, 0, 4, 1440859740, 'Pendiente ....'),
(283, 9, 1440859800, 0, 4, 1440859800, 'Pendiente ....'),
(284, 9, 1440859860, 0, 4, 1440859860, 'Pendiente ....'),
(285, 9, 1440859860, 0, 4, 1440859860, 'Pendiente ....'),
(286, 9, 1440860040, 0, 4, 1440860040, 'Pendiente ....'),
(287, 9, 1440860100, 0, 4, 1440860100, 'Pendiente ....'),
(288, 9, 1440860160, 0, 4, 1440860160, 'Pendiente ....'),
(289, 9, 1440860220, 0, 4, 1440860220, 'Pendiente ....'),
(290, 9, 1440860880, 0, 4, 1440860880, 'Pendiente ....'),
(291, 9, 1440860940, 0, 4, 1440860940, 'Pendiente ....'),
(292, 9, 1440861000, 0, 4, 1440861000, 'Pendiente ....'),
(293, 9, 1440861120, 0, 4, 1440861120, 'Pendiente ....'),
(294, 9, 1440861300, 0, 4, 1440861300, 'Pendiente ....'),
(295, 9, 1440861360, 0, 4, 1440861360, 'Pendiente ....'),
(296, 9, 1440861360, 0, 4, 1440861360, 'Pendiente ....'),
(297, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(298, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(299, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(300, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(301, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(302, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(303, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(304, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(305, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(306, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(307, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(308, 8, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(309, 9, 1440861420, 0, 4, 1440861420, 'Pendiente ....'),
(310, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(311, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(312, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(313, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(314, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(315, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(316, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(317, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(318, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(319, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(320, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(321, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(322, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(323, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(324, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(325, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(326, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(327, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(328, 8, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(329, 9, 1440861480, 0, 4, 1440861480, 'Pendiente ....'),
(330, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(331, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(332, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(333, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(334, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(335, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(336, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(337, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(338, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(339, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(340, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(341, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(342, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(343, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(344, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(345, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(346, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(347, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(348, 8, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(349, 9, 1440861540, 0, 4, 1440861540, 'Pendiente ....'),
(350, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(351, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(352, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(353, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(354, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(355, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(356, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(357, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(358, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(359, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(360, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(361, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(362, 8, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(363, 9, 1440861600, 0, 4, 1440861600, 'Pendiente ....'),
(364, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(365, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(366, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(367, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(368, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(369, 8, 1440861960, 0, 4, 1440861960, 'Pendiente ....'),
(370, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(371, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(372, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(373, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(374, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(375, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(376, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(377, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(378, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(379, 8, 1440862020, 0, 4, 1440862020, 'Pendiente ....'),
(380, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(381, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(382, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(383, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(384, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(385, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(386, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(387, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(388, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(389, 8, 1440862080, 0, 4, 1440862080, 'Pendiente ....'),
(390, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(391, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(392, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(393, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(394, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(395, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(396, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(397, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(398, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(399, 8, 1440862140, 0, 4, 1440862140, 'Pendiente ....'),
(400, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(401, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(402, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(403, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(404, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(405, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(406, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(407, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(408, 8, 1440862200, 0, 4, 1440862200, 'Pendiente ....'),
(409, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(410, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(411, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(412, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(413, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(414, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(415, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(416, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(417, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(418, 8, 1440862260, 0, 4, 1440862260, 'Pendiente ....'),
(419, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(420, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(421, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(422, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(423, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(424, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(425, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(426, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(427, 8, 1440862320, 0, 4, 1440862320, 'Pendiente ....'),
(428, 9, 1440862860, 0, 4, 1440862860, 'Pendiente ....'),
(429, 9, 1440862920, 0, 4, 1440862920, 'Pendiente ....'),
(430, 9, 1440862980, 0, 4, 1440862980, 'Pendiente ....'),
(431, 9, 1440862980, 0, 4, 1440862980, 'Pendiente ....'),
(432, 9, 1440862980, 0, 4, 1440862980, 'Pendiente ....'),
(433, 9, 1440863040, 0, 4, 1440863040, 'Pendiente ....'),
(434, 9, 1440863040, 0, 4, 1440863040, 'Pendiente ....'),
(435, 9, 1440863160, 0, 4, 1440863160, 'Pendiente ....'),
(436, 9, 1440863220, 0, 4, 1440863220, 'Pendiente ....'),
(437, 9, 1440863220, 0, 4, 1440863220, 'Pendiente ....'),
(438, 9, 1440863220, 0, 4, 1440863220, 'Pendiente ....'),
(439, 9, 1440863280, 0, 4, 1440863280, 'Pendiente ....'),
(440, 9, 1440863280, 0, 4, 1440863280, 'Pendiente ....'),
(441, 9, 1440863340, 0, 4, 1440863340, 'Pendiente ....'),
(442, 9, 1440863340, 0, 4, 1440863340, 'Pendiente ....'),
(443, 9, 1440863400, 0, 4, 1440863400, 'Pendiente ....'),
(444, 9, 1440863460, 0, 4, 1440863460, 'Pendiente ....'),
(445, 9, 1440863460, 0, 4, 1440863460, 'Pendiente ....'),
(446, 9, 1440863580, 0, 4, 1440863580, 'Pendiente ....'),
(447, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(448, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(449, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(450, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(451, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(452, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(453, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(454, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(455, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(456, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(457, 8, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(458, 9, 1440863640, 0, 4, 1440863640, 'Pendiente ....'),
(459, 8, 1440863760, 0, 4, 1440863760, 'Pendiente ....'),
(460, 9, 1440863760, 0, 4, 1440863760, 'Pendiente ....'),
(461, 8, 1440863880, 0, 4, 1440863880, 'Pendiente ....'),
(462, 9, 1440863880, 0, 4, 1440863880, 'Pendiente ....'),
(463, 8, 1440864060, 0, 4, 1440864060, 'Pendiente ....'),
(464, 9, 1440864060, 0, 4, 1440864060, 'Pendiente ....'),
(465, 8, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(466, 9, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(467, 8, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(468, 9, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(469, 8, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(470, 9, 1440864180, 0, 4, 1440864180, 'Pendiente ....'),
(471, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(472, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(473, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(474, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(475, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(476, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(477, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(478, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(479, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(480, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(481, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(482, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(483, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(484, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(485, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(486, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(487, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(488, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(489, 8, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(490, 9, 1440864240, 0, 4, 1440864240, 'Pendiente ....'),
(491, 8, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(492, 9, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(493, 8, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(494, 9, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(495, 8, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(496, 9, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(497, 8, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(498, 9, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(499, 8, 1440864300, 0, 4, 1440864300, 'Pendiente ....'),
(500, 9, 1440864300, 0, 4, 1440864300, 'Pendiente ....');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alert_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_alert_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descrip` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_max` float NOT NULL,
  `cp_mim` float NOT NULL,
  `cp_perfil_cont_id` int(11) NOT NULL,
  `cp_oid_inicial` bigint(255) NOT NULL,
  `cp_oid_mod` bigint(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_alert_cfg`
--

INSERT INTO `tb_alert_cfg` (`cp_id`, `cp_nombre`, `cp_descrip`, `cp_max`, `cp_mim`, `cp_perfil_cont_id`, `cp_oid_inicial`, `cp_oid_mod`) VALUES
(1, 'Alarma Ta', 'Alarma de Temperatura mayor a', 55, 0, 1, 1440789600, 0),
(2, 'Alarma Ip', 'Alarma de Intensidad del Panel mayor a', 60, 0, 1, 1440789600, 0),
(3, 'Alarma Vp', 'Alarma de Voltaje del Panel mayor a', 55, 0, 1, 1440789600, 0),
(4, 'Alarma Ib', 'Alarma de Intensidad de la Bateria mayor a', 60, 0, 1, 1440789600, 0),
(5, 'Alarma Vb', 'Alarma de Voltaje de la Bateria menor a', 40, 19, 1, 1440789600, 0),
(6, 'Alarma Il', 'Alarma de Intensidad de Carga mayor a', 5, 0, 1, 1440789600, 0),
(7, 'Alarma Vl', 'Alarma de Voltaje de Carga menor a', 40, 19, 1, 1440789600, 0),
(8, 'Alarma SNMP', 'Error al Intentar conectar al Controlador', 0, 0, 1, 1440789600, 0),
(9, 'Alarma Proceso Datos', 'Error en el procesamiento de los datos', 0, 0, 1, 1440789600, 0),
(10, 'Alarma Ta', 'Alarma de Temperatura mayor a', 55, 0, 2, 1440870120, 0),
(11, 'Alarma Ip', 'Alarma de Intensidad del Panel mayor a', 60, 0, 2, 1440870120, 0),
(12, 'Alarma Vp', 'Alarma de Voltaje del Panel mayor a', 55, 0, 2, 1440870120, 0),
(13, 'Alarma Ib', 'Alarma de Intensidad de la Bateria mayor a', 15, 0, 2, 1440870120, 0),
(14, 'Alarma Vb', 'Alarma de Voltaje de la Bateria menor a', 40, 19, 2, 1440870120, 0),
(15, 'Alarma Il', 'Alarma de Intensidad de Carga mayor a', 5, 0, 2, 1440870120, 0),
(16, 'Alarma Vl', 'Alarma de Voltaje de Carga menor a', 40, 19, 2, 1440870120, 0),
(17, 'Alarma SNMP', 'Error al Intentar conectar al Controlador', 0, 0, 2, 1440870120, 0),
(18, 'Alarma Proceso Datos', 'Error en el procesamiento de los datos', 0, 0, 2, 1440870120, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cambios_perfil_cont`
--

CREATE TABLE IF NOT EXISTS `tb_cambios_perfil_cont` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_est_inicial` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_est_final` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `OID` bigint(255) NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_campos_lectura`
--

CREATE TABLE IF NOT EXISTS `tb_campos_lectura` (
`id` int(11) NOT NULL,
  `campo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_campo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden_lectura_arduino` int(5) DEFAULT NULL,
  `categorias_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_campos_lectura`
--

INSERT INTO `tb_campos_lectura` (`id`, `campo`, `descripcion`, `tipo_campo`, `orden_lectura_arduino`, `categorias_id`) VALUES
(1, 'cp_volt1', 'Nivel instantaneo', 'LITROS', 1, 9),
(2, 'cp_volt2', 'Nivel filtrado (medio)', 'LITROS', 2, 9),
(5, 'cp_amp1', 'Horometro acumulado', 'HORAS', 3, 9),
(6, 'cp_amp2', 'Horometro sesiÃ³n', 'HORAS', 4, 9),
(20, 'cp_volt1', '', 'VOLTAJE', 3, 1),
(21, 'cp_volt2', '', 'VOLTAJE', 5, 1),
(22, 'cp_volt3', '', 'VOLTAJE', 7, 1),
(23, 'cp_amp1', '', 'AMPERAJE', 2, 1),
(24, 'cp_amp2', '', 'AMPERAJE', 4, 1),
(25, 'cp_amp3', '', 'AMPERAJE', 6, 1),
(26, 'cp_temp', '', 'TEMPERATURA', 1, 1),
(34, 'cp_temp', '', 'TEMPERATURA', 1, 2),
(35, 'cp_amp1', '', 'AMPERAJE', 2, 2),
(36, 'cp_volt1', '', 'VOLTAJE', 3, 2),
(37, 'cp_amp2', '', 'AMPERAJE', 4, 2),
(38, 'cp_volt2', '', 'VOLTAJE', 5, 2),
(39, 'cp_amp3', '', 'AMPERAJE', 6, 2),
(40, 'cp_volt3', '', 'VOLTAJE', 7, 2),
(41, 'cp_dig1', 'status horometro', 'DIGITAL', 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_categorias_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias_cfg`
--

INSERT INTO `tb_categorias_cfg` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'Carro Repetidor', 'Carro Repetidor'),
(2, 'Sitio Fotovoltaico', 'Sitio Fotovoltaico'),
(3, 'Servidor', 'Servidor'),
(4, 'Carro CCTV', 'Carro CCTV'),
(5, 'Semaforo Meteorologico', 'Semaforo Meteorologico'),
(6, 'Barrera de Acceso', 'Barrera de Acceso'),
(7, 'Terralite', 'Terralite'),
(8, 'Luminaria', 'Luminaria'),
(9, 'Camion - Fuel', 'Proyecto Combustible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_ubicacion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo1` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo2` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_cliente_cfg`
--

INSERT INTO `tb_cliente_cfg` (`cp_id`, `cp_nombre`, `cp_ubicacion`, `cp_correo1`, `cp_correo2`) VALUES
(1, 'MIMcontrol CMDIC', 'Minera Collahuasi', 'contacto@collahuasi.cl', 'contacto2@collahuasi.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_colection`
--

CREATE TABLE IF NOT EXISTS `tb_colection` (
`cp_id` int(11) NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_id_perfil_cont` int(11) NOT NULL,
  `cp_volt1` double DEFAULT NULL,
  `cp_volt2` double DEFAULT NULL,
  `cp_volt3` double DEFAULT NULL,
  `cp_amp1` double DEFAULT NULL,
  `cp_amp2` double DEFAULT NULL,
  `cp_amp3` double DEFAULT NULL,
  `cp_temp` int(11) DEFAULT NULL,
  `cp_dig1` int(11) DEFAULT NULL,
  `cp_dig2` int(11) DEFAULT NULL,
  `cp_dig3` int(11) DEFAULT NULL,
  `cp_dig4` int(11) DEFAULT NULL,
  `cp_gps_x` double DEFAULT NULL,
  `cp_gps_y` double DEFAULT NULL,
  `cp_gps_z` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_comentarios` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_usuario_id` int(11) NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_coment` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`cp_id`, `cp_perfil_id`, `cp_usuario_id`, `cp_oid`, `cp_coment`) VALUES
(1, 1, 2, 1440885500, 'Panel solar sin datos de corriente'),
(2, 2, 2, 1440885704, 'no se tienen los datos de corriente del arreglo de paneles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_estado_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_estado` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_estado_cfg`
--

INSERT INTO `tb_estado_cfg` (`cp_id`, `cp_estado`, `cp_descripcion`) VALUES
(1, 'Activo', 'Activo'),
(2, 'Pendiente', 'Pendiente'),
(3, 'Eliminado', 'Eliminado'),
(4, 'Con Fallas', 'Con fallas'),
(5, 'Bloqueado', 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_cont`
--

CREATE TABLE IF NOT EXISTS `tb_estado_cont` (
`cp_id` int(11) NOT NULL,
  `cp_perfil_id` int(11) NOT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_estado_cont`
--

INSERT INTO `tb_estado_cont` (`cp_id`, `cp_perfil_id`, `cp_estado_cfg_id`, `cp_descripcion`) VALUES
(1, 1, 1, 'Controlador Activo'),
(2, 2, 3, 'Controlador Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modelo_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_modelo_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_modelo_cfg`
--

INSERT INTO `tb_modelo_cfg` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'MIM-Mine-00010101', 'MIMcontrol Mine V 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_nivel_usuario` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_nivel_usuario`
--

INSERT INTO `tb_nivel_usuario` (`cp_id`, `cp_nombre`, `cp_descripcion`) VALUES
(1, 'Administrador', 'Administrador'),
(2, 'Operador', 'operador'),
(3, 'Monitor', 'monitoreo'),
(4, 'Usuario', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_perfil_cont_cfg`
--

CREATE TABLE IF NOT EXISTS `tb_perfil_cont_cfg` (
`cp_id` int(11) NOT NULL,
  `cp_cat_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_ip` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_modelo_id` int(11) NOT NULL,
  `id_mina` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_perfil_cont_cfg`
--

INSERT INTO `tb_perfil_cont_cfg` (`cp_id`, `cp_cat_id`, `cp_nombre`, `cp_ip`, `cp_oid`, `cp_modelo_id`, `id_mina`) VALUES
(1, 9, 'slx01', '192.168.24.13', 1440789600, 1, '769'),
(2, 9, 'slx02', '192.168.24.12', 1440870120, 1, '770'),
(3, 1, 'slx03', '192.168.1.175', 0, 1, '771'),
(5, 6, 'slx666', '666.666.666', 0, 1, '666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_registro_usu`
--

CREATE TABLE IF NOT EXISTS `tb_registro_usu` (
`cp_id` int(11) NOT NULL,
  `cp_usuario_id` int(11) NOT NULL,
  `cp_actividad` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
`cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_telefono` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_correo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_rut` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_oid` bigint(255) NOT NULL,
  `cp_nivel_id` int(11) NOT NULL,
  `cp_estado_cfg_id` int(11) NOT NULL,
  `cp_password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `cp_foto` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`cp_id`, `cp_nombre`, `cp_telefono`, `cp_correo`, `cp_rut`, `cp_oid`, `cp_nivel_id`, `cp_estado_cfg_id`, `cp_password`, `cp_foto`) VALUES
(1, 'Pablo Campillay', '76042823', 'pabloc@mimlook.cl', '16120768-3', 1462738980000, 1, 1, 'mierdaster', 'default.jpg'),
(2, 'cmdic', '12345678', 'cmdic@cmdic.cl', 'cmdic', 123456789, 1, 1, 'cmdic', 'default.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_alert_cgf_id` (`cp_alert_cgf_id`), ADD KEY `cp_estado_id` (`cp_estado_cfg_id`);

--
-- Indices de la tabla `tb_alert_cfg`
--
ALTER TABLE `tb_alert_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_cont_id` (`cp_perfil_cont_id`);

--
-- Indices de la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`);

--
-- Indices de la tabla `tb_campos_lectura`
--
ALTER TABLE `tb_campos_lectura`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_categorias_cfg`
--
ALTER TABLE `tb_categorias_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_id` (`cp_id`), ADD KEY `cp_id_2` (`cp_id`);

--
-- Indices de la tabla `tb_cliente_cfg`
--
ALTER TABLE `tb_cliente_cfg`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_colection`
--
ALTER TABLE `tb_colection`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_id_perfil_cont` (`cp_id_perfil_cont`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`), ADD KEY `cp_usuario_id` (`cp_usuario_id`);

--
-- Indices de la tabla `tb_estado_cfg`
--
ALTER TABLE `tb_estado_cfg`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_perfil_id` (`cp_perfil_id`), ADD KEY `cp_estado_cfg_id` (`cp_estado_cfg_id`);

--
-- Indices de la tabla `tb_modelo_cfg`
--
ALTER TABLE `tb_modelo_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_id` (`cp_id`);

--
-- Indices de la tabla `tb_nivel_usuario`
--
ALTER TABLE `tb_nivel_usuario`
 ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_ip` (`cp_ip`(255)), ADD KEY `cp_cat_id` (`cp_cat_id`), ADD KEY `cp_modelo_id` (`cp_modelo_id`);

--
-- Indices de la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_usuario_id` (`cp_usuario_id`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
 ADD PRIMARY KEY (`cp_id`), ADD KEY `cp_nivel_id` (`cp_nivel_id`), ADD KEY `cp_estado_cfg_id` (`cp_estado_cfg_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=501;
--
-- AUTO_INCREMENT de la tabla `tb_alert_cfg`
--
ALTER TABLE `tb_alert_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_campos_lectura`
--
ALTER TABLE `tb_campos_lectura`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `tb_categorias_cfg`
--
ALTER TABLE `tb_categorias_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_cliente_cfg`
--
ALTER TABLE `tb_cliente_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_colection`
--
ALTER TABLE `tb_colection`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_estado_cfg`
--
ALTER TABLE `tb_estado_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_modelo_cfg`
--
ALTER TABLE `tb_modelo_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_nivel_usuario`
--
ALTER TABLE `tb_nivel_usuario`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_alert`
--
ALTER TABLE `tb_alert`
ADD CONSTRAINT `tb_alert_ibfk_2` FOREIGN KEY (`cp_alert_cgf_id`) REFERENCES `tb_alert_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_alert_ibfk_3` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_alert_cfg`
--
ALTER TABLE `tb_alert_cfg`
ADD CONSTRAINT `tb_alert_cfg_ibfk_1` FOREIGN KEY (`cp_perfil_cont_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_cambios_perfil_cont`
--
ALTER TABLE `tb_cambios_perfil_cont`
ADD CONSTRAINT `tb_cambios_perfil_cont_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_colection`
--
ALTER TABLE `tb_colection`
ADD CONSTRAINT `tb_colection_ibfk_1` FOREIGN KEY (`cp_id_perfil_cont`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
ADD CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`cp_usuario_id`) REFERENCES `tb_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_estado_cont`
--
ALTER TABLE `tb_estado_cont`
ADD CONSTRAINT `tb_estado_cont_ibfk_1` FOREIGN KEY (`cp_perfil_id`) REFERENCES `tb_perfil_cont_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_estado_cont_ibfk_2` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_perfil_cont_cfg`
--
ALTER TABLE `tb_perfil_cont_cfg`
ADD CONSTRAINT `tb_perfil_cont_cfg_ibfk_2` FOREIGN KEY (`cp_modelo_id`) REFERENCES `tb_modelo_cfg` (`cp_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `tb_perfil_cont_cfg_ibfk_3` FOREIGN KEY (`cp_cat_id`) REFERENCES `tb_categorias_cfg` (`cp_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_registro_usu`
--
ALTER TABLE `tb_registro_usu`
ADD CONSTRAINT `tb_registro_usu_ibfk_1` FOREIGN KEY (`cp_usuario_id`) REFERENCES `tb_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`cp_nivel_id`) REFERENCES `tb_nivel_usuario` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`cp_estado_cfg_id`) REFERENCES `tb_estado_cfg` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
