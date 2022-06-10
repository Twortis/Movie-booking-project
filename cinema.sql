-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2022 г., 13:22
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `searchmovie` (IN `movie` VARCHAR(1000))  NO SQL
SELECT * from movies where Movie_Name like CONCAT('%', movie, '%')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `activity`
--

CREATE TABLE `activity` (
  `ac_id` int NOT NULL,
  `ac_nm` varchar(200) NOT NULL,
  `ac_time` varchar(200) NOT NULL,
  `ac_tmp` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `a_id` int NOT NULL,
  `a_nm` varchar(50) NOT NULL,
  `a_unm` varchar(6) NOT NULL,
  `a_mno` varchar(12) NOT NULL,
  `a_pwd` varchar(40) NOT NULL,
  `a_email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`a_id`, `a_nm`, `a_unm`, `a_mno`, `a_pwd`, `a_email`) VALUES
(1, 'admin', 'admin', '9714007824', 'admin', 'pdwapinc@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `b_id` int NOT NULL,
  `b_bookid` varchar(100) NOT NULL,
  `b_theatre` varchar(10) NOT NULL,
  `b_unm` varchar(20) NOT NULL,
  `b_show` varchar(20) NOT NULL,
  `b_screen` varchar(20) NOT NULL,
  `b_seat` int NOT NULL,
  `b_amt` int NOT NULL,
  `b_date` varchar(40) NOT NULL,
  `b_time` bigint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`b_id`, `b_bookid`, `b_theatre`, `b_unm`, `b_show`, `b_screen`, `b_seat`, `b_amt`, `b_date`, `b_time`) VALUES
(18, 'BKID9288928', '10', '11', '55', '12', 1, 200, '2022-06-25', 1654757821);

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `m_id` int NOT NULL,
  `m_nm` varchar(40) NOT NULL,
  `m_duration` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_genre` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_dnm` varchar(200) NOT NULL,
  `m_des` longtext NOT NULL,
  `m_banner` varchar(200) NOT NULL,
  `m_shw` int NOT NULL DEFAULT '0',
  `m_status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`m_id`, `m_nm`, `m_duration`, `m_genre`, `m_dnm`, `m_des`, `m_banner`, `m_shw`, `m_status`) VALUES
(26, 'Пропавшая (18+)', '120', 'триллер', 'Брайан Гудман', 'Уилл Спэнн везет свою жену, с которой они собираются разводиться, домой к её родителям. Во время остановки на заправке супруга странным образом бесследно исчезает. Уилл поднимает на уши местную полицию и вместе с родителями жены пытается найти её. Однако со временем подозрение падает на него самого.', '1654844402_propavshaya.jpg', 0, 1),
(25, 'Одержимые', '97', 'ужасы', 'Крис Сан', 'Джейкоб Чендлер — обычный человек с необыкновенным даром. Попав в аварию, он обнаружил в себе способности экзорциста, Джейкоб при помощи племянника Лиама начинает исполнять ритуалы очищения — изгнание демонов. Вскоре они начинают замечать, что одержимых становится все больше и больше', '1654844187_одержимые.jpg', 0, 1),
(24, 'Достучаться до небес', '87', 'драма, комедия, преступление', 'Томас Ян', 'Волею судеб две абсолютные противоположности, тихоня Руди и разгильдяй Мартин, оказываются в одной больничной палате. Узнав неутешительные прогнозы, друзья решают использовать последние дни на полную катушку — угнать машину с деньгами, напиться текилы, и, конечно, увидеть море.        ', '1654854503_44ec.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `register`
--

CREATE TABLE `register` (
  `r_id` int NOT NULL,
  `r_nm` varchar(30) NOT NULL,
  `r_age` varchar(2) NOT NULL,
  `r_gender` varchar(10) NOT NULL,
  `r_mno` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `r_email` varchar(40) NOT NULL,
  `r_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `r_time` bigint NOT NULL,
  `r_status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `register`
--

INSERT INTO `register` (`r_id`, `r_nm`, `r_age`, `r_gender`, `r_mno`, `r_email`, `r_pwd`, `r_time`, `r_status`) VALUES
(20, 'Nikita', '20', 'Мужчина', '1234567895', '523@gmail.com', '$2y$10$PIoonjMHUOc4L3mQbFEp6en4r1GceoAkYSKI8zaxE6twzlywL2skC', 1654775719, 1),
(19, 'Nikita', '20', 'Мужчина', '1234567895', '525@gmail.com', '$2y$10$EDJgEUMOJje6pxnxYtIX6ekcU3f.OrplGu6TcxKYtYRWvYqQC4Aqu', 1654773836, 1),
(24, 'SELECT', '20', 'Мужчина', '1234567895', '556@gmail.com', '$2y$10$YfZACpuIt0U7rQS6JCwdg.sOd7AK8rj6Z48KaGJ5WL2LP4/yybcda', 1654793945, 1),
(18, 'Nikita', '20', 'Мужчина', '1234567895', '121@gmail.com', '$2y$10$VFGcOZzrLoZc3ZN9UCfBXOYNoOSCNAye6kb0yLXE9NljrQshjkDB.', 1654772010, 1),
(25, 'Nikita', '20', 'Мужчина', '+7 (322) 322-22-11', '5223@gmail.com', '$2y$10$RCtsoNT9a3k2gxr1be5NBukf5wNCGPM0sqFf8Ko79g2NMk.g1e94m', 1654856402, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `screen`
--

CREATE TABLE `screen` (
  `s_id` int NOT NULL,
  `s_nm` varchar(20) NOT NULL,
  `s_theatre` int NOT NULL,
  `s_seats` int NOT NULL DEFAULT '49',
  `s_time` int NOT NULL,
  `s_status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `screen`
--

INSERT INTO `screen` (`s_id`, `s_nm`, `s_theatre`, `s_seats`, `s_time`, `s_status`) VALUES
(16, 'Local', 11, 49, 1564013078, 1),
(15, 'Silver', 8, 49, 1564013069, 1),
(14, 'Gold', 8, 49, 1564013054, 1),
(13, 'Last', 10, 49, 1564013044, 1),
(12, 'First', 10, 49, 1564012964, 1),
(11, 'Red', 6, 49, 1564012935, 1),
(10, 'Blue', 6, 49, 1564012929, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `seat`
--

CREATE TABLE `seat` (
  `seat_id` int NOT NULL,
  `seat_row` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `seat_col` int NOT NULL,
  `seat_show` int NOT NULL DEFAULT '0',
  `seat_uid` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_row`, `seat_col`, `seat_show`, `seat_uid`) VALUES
(1, 'A', 1, 48, 0),
(2, 'A', 2, 48, 0),
(3, 'A', 3, 48, 0),
(4, 'A', 4, 48, 0),
(5, 'A', 5, 48, 0),
(6, 'A', 6, 48, 0),
(7, 'B', 1, 48, 0),
(8, 'B', 2, 48, 0),
(9, 'B', 3, 48, 0),
(10, 'B', 4, 48, 0),
(11, 'B', 5, 48, 0),
(12, 'B', 6, 48, 0),
(13, 'C', 1, 48, 0),
(14, 'C', 2, 48, 0),
(15, 'C', 3, 48, 0),
(16, 'C', 4, 48, 0),
(17, 'C', 5, 48, 0),
(18, 'C', 6, 48, 0),
(19, 'D', 1, 48, 0),
(20, 'D', 2, 48, 0),
(21, 'D', 3, 48, 0),
(22, 'D', 4, 48, 0),
(23, 'D', 5, 48, 0),
(24, 'D', 6, 48, 0),
(25, 'E', 1, 48, 0),
(26, 'E', 2, 48, 0),
(27, 'E', 3, 48, 0),
(28, 'E', 4, 48, 0),
(29, 'E', 5, 48, 0),
(30, 'E', 6, 48, 0),
(31, 'F', 1, 48, 0),
(32, 'F', 2, 48, 0),
(33, 'F', 3, 48, 0),
(34, 'F', 4, 48, 0),
(35, 'F', 5, 48, 0),
(36, 'F', 6, 48, 0),
(37, 'G', 1, 48, 0),
(38, 'G', 2, 48, 0),
(39, 'G', 3, 48, 0),
(40, 'G', 4, 48, 0),
(41, 'G', 5, 48, 0),
(42, 'G', 6, 48, 0),
(43, 'H', 1, 48, 0),
(44, 'H', 2, 48, 0),
(45, 'H', 3, 48, 0),
(46, 'H', 4, 48, 0),
(47, 'H', 5, 48, 0),
(48, 'H', 6, 48, 0),
(49, 'A', 1, 49, 0),
(50, 'A', 2, 49, 0),
(51, 'A', 3, 49, 0),
(52, 'A', 4, 49, 0),
(53, 'A', 5, 49, 0),
(54, 'A', 6, 49, 0),
(55, 'B', 1, 49, 0),
(56, 'B', 2, 49, 0),
(57, 'B', 3, 49, 0),
(58, 'B', 4, 49, 0),
(59, 'B', 5, 49, 0),
(60, 'B', 6, 49, 0),
(61, 'C', 1, 49, 0),
(62, 'C', 2, 49, 0),
(63, 'C', 3, 49, 0),
(64, 'C', 4, 49, 0),
(65, 'C', 5, 49, 0),
(66, 'C', 6, 49, 0),
(67, 'D', 1, 49, 0),
(68, 'D', 2, 49, 0),
(69, 'D', 3, 49, 0),
(70, 'D', 4, 49, 0),
(71, 'D', 5, 49, 0),
(72, 'D', 6, 49, 0),
(73, 'E', 1, 49, 0),
(74, 'E', 2, 49, 0),
(75, 'E', 3, 49, 0),
(76, 'E', 4, 49, 0),
(77, 'E', 5, 49, 0),
(78, 'E', 6, 49, 0),
(79, 'F', 1, 49, 0),
(80, 'F', 2, 49, 0),
(81, 'F', 3, 49, 0),
(82, 'F', 4, 49, 0),
(83, 'F', 5, 49, 0),
(84, 'F', 6, 49, 0),
(85, 'G', 1, 49, 0),
(86, 'G', 2, 49, 0),
(87, 'G', 3, 49, 0),
(88, 'G', 4, 49, 0),
(89, 'G', 5, 49, 0),
(90, 'G', 6, 49, 0),
(91, 'H', 1, 49, 0),
(92, 'H', 2, 49, 0),
(93, 'H', 3, 49, 0),
(94, 'H', 4, 49, 0),
(95, 'H', 5, 49, 0),
(96, 'H', 6, 49, 0),
(97, 'A', 1, 50, 0),
(98, 'A', 2, 50, 0),
(99, 'A', 3, 50, 0),
(100, 'A', 4, 50, 0),
(101, 'A', 5, 50, 0),
(102, 'A', 6, 50, 0),
(103, 'B', 1, 50, 0),
(104, 'B', 2, 50, 0),
(105, 'B', 3, 50, 0),
(106, 'B', 4, 50, 0),
(107, 'B', 5, 50, 0),
(108, 'B', 6, 50, 0),
(109, 'C', 1, 50, 0),
(110, 'C', 2, 50, 0),
(111, 'C', 3, 50, 0),
(112, 'C', 4, 50, 0),
(113, 'C', 5, 50, 0),
(114, 'C', 6, 50, 0),
(115, 'D', 1, 50, 0),
(116, 'D', 2, 50, 0),
(117, 'D', 3, 50, 0),
(118, 'D', 4, 50, 0),
(119, 'D', 5, 50, 0),
(120, 'D', 6, 50, 0),
(121, 'E', 1, 50, 0),
(122, 'E', 2, 50, 0),
(123, 'E', 3, 50, 0),
(124, 'E', 4, 50, 0),
(125, 'E', 5, 50, 0),
(126, 'E', 6, 50, 0),
(127, 'F', 1, 50, 0),
(128, 'F', 2, 50, 0),
(129, 'F', 3, 50, 0),
(130, 'F', 4, 50, 0),
(131, 'F', 5, 50, 0),
(132, 'F', 6, 50, 0),
(133, 'G', 1, 50, 0),
(134, 'G', 2, 50, 0),
(135, 'G', 3, 50, 0),
(136, 'G', 4, 50, 0),
(137, 'G', 5, 50, 0),
(138, 'G', 6, 50, 0),
(139, 'H', 1, 50, 0),
(140, 'H', 2, 50, 0),
(141, 'H', 3, 50, 0),
(142, 'H', 4, 50, 0),
(143, 'H', 5, 50, 0),
(144, 'H', 6, 50, 0),
(145, 'A', 1, 51, 0),
(146, 'A', 2, 51, 0),
(147, 'A', 3, 51, 0),
(148, 'A', 4, 51, 0),
(149, 'A', 5, 51, 0),
(150, 'A', 6, 51, 0),
(151, 'B', 1, 51, 0),
(152, 'B', 2, 51, 0),
(153, 'B', 3, 51, 0),
(154, 'B', 4, 51, 0),
(155, 'B', 5, 51, 0),
(156, 'B', 6, 51, 0),
(157, 'C', 1, 51, 0),
(158, 'C', 2, 51, 0),
(159, 'C', 3, 51, 0),
(160, 'C', 4, 51, 0),
(161, 'C', 5, 51, 0),
(162, 'C', 6, 51, 0),
(163, 'D', 1, 51, 0),
(164, 'D', 2, 51, 0),
(165, 'D', 3, 51, 0),
(166, 'D', 4, 51, 0),
(167, 'D', 5, 51, 0),
(168, 'D', 6, 51, 0),
(169, 'E', 1, 51, 0),
(170, 'E', 2, 51, 0),
(171, 'E', 3, 51, 0),
(172, 'E', 4, 51, 0),
(173, 'E', 5, 51, 0),
(174, 'E', 6, 51, 0),
(175, 'F', 1, 51, 0),
(176, 'F', 2, 51, 0),
(177, 'F', 3, 51, 0),
(178, 'F', 4, 51, 0),
(179, 'F', 5, 51, 0),
(180, 'F', 6, 51, 0),
(181, 'G', 1, 51, 0),
(182, 'G', 2, 51, 0),
(183, 'G', 3, 51, 0),
(184, 'G', 4, 51, 0),
(185, 'G', 5, 51, 0),
(186, 'G', 6, 51, 0),
(187, 'H', 1, 51, 0),
(188, 'H', 2, 51, 0),
(189, 'H', 3, 51, 0),
(190, 'H', 4, 51, 0),
(191, 'H', 5, 51, 0),
(192, 'H', 6, 51, 0),
(193, 'A', 1, 52, 0),
(194, 'A', 2, 52, 0),
(195, 'A', 3, 52, 0),
(196, 'A', 4, 52, 0),
(197, 'A', 5, 52, 0),
(198, 'A', 6, 52, 0),
(199, 'B', 1, 52, 0),
(200, 'B', 2, 52, 0),
(201, 'B', 3, 52, 0),
(202, 'B', 4, 52, 0),
(203, 'B', 5, 52, 0),
(204, 'B', 6, 52, 0),
(205, 'C', 1, 52, 0),
(206, 'C', 2, 52, 0),
(207, 'C', 3, 52, 0),
(208, 'C', 4, 52, 0),
(209, 'C', 5, 52, 0),
(210, 'C', 6, 52, 0),
(211, 'D', 1, 52, 0),
(212, 'D', 2, 52, 0),
(213, 'D', 3, 52, 0),
(214, 'D', 4, 52, 0),
(215, 'D', 5, 52, 0),
(216, 'D', 6, 52, 0),
(217, 'E', 1, 52, 0),
(218, 'E', 2, 52, 0),
(219, 'E', 3, 52, 0),
(220, 'E', 4, 52, 0),
(221, 'E', 5, 52, 0),
(222, 'E', 6, 52, 0),
(223, 'F', 1, 52, 0),
(224, 'F', 2, 52, 0),
(225, 'F', 3, 52, 0),
(226, 'F', 4, 52, 0),
(227, 'F', 5, 52, 0),
(228, 'F', 6, 52, 0),
(229, 'G', 1, 52, 0),
(230, 'G', 2, 52, 0),
(231, 'G', 3, 52, 0),
(232, 'G', 4, 52, 0),
(233, 'G', 5, 52, 0),
(234, 'G', 6, 52, 0),
(235, 'H', 1, 52, 0),
(236, 'H', 2, 52, 0),
(237, 'H', 3, 52, 0),
(238, 'H', 4, 52, 0),
(239, 'H', 5, 52, 0),
(240, 'H', 6, 52, 0),
(241, 'A', 1, 53, 0),
(242, 'A', 2, 53, 0),
(243, 'A', 3, 53, 0),
(244, 'A', 4, 53, 0),
(245, 'A', 5, 53, 0),
(246, 'A', 6, 53, 0),
(247, 'B', 1, 53, 0),
(248, 'B', 2, 53, 0),
(249, 'B', 3, 53, 0),
(250, 'B', 4, 53, 0),
(251, 'B', 5, 53, 0),
(252, 'B', 6, 53, 0),
(253, 'C', 1, 53, 0),
(254, 'C', 2, 53, 0),
(255, 'C', 3, 53, 0),
(256, 'C', 4, 53, 0),
(257, 'C', 5, 53, 0),
(258, 'C', 6, 53, 0),
(259, 'D', 1, 53, 0),
(260, 'D', 2, 53, 0),
(261, 'D', 3, 53, 0),
(262, 'D', 4, 53, 0),
(263, 'D', 5, 53, 0),
(264, 'D', 6, 53, 0),
(265, 'E', 1, 53, 0),
(266, 'E', 2, 53, 0),
(267, 'E', 3, 53, 0),
(268, 'E', 4, 53, 0),
(269, 'E', 5, 53, 0),
(270, 'E', 6, 53, 0),
(271, 'F', 1, 53, 0),
(272, 'F', 2, 53, 0),
(273, 'F', 3, 53, 0),
(274, 'F', 4, 53, 0),
(275, 'F', 5, 53, 0),
(276, 'F', 6, 53, 0),
(277, 'G', 1, 53, 0),
(278, 'G', 2, 53, 0),
(279, 'G', 3, 53, 0),
(280, 'G', 4, 53, 0),
(281, 'G', 5, 53, 0),
(282, 'G', 6, 53, 0),
(283, 'H', 1, 53, 0),
(284, 'H', 2, 53, 0),
(285, 'H', 3, 53, 0),
(286, 'H', 4, 53, 0),
(287, 'H', 5, 53, 0),
(288, 'H', 6, 53, 0),
(289, 'A', 1, 54, 0),
(290, 'A', 2, 54, 0),
(291, 'A', 3, 54, 0),
(292, 'A', 4, 54, 0),
(293, 'A', 5, 54, 0),
(294, 'A', 6, 54, 0),
(295, 'B', 1, 54, 0),
(296, 'B', 2, 54, 0),
(297, 'B', 3, 54, 0),
(298, 'B', 4, 54, 0),
(299, 'B', 5, 54, 0),
(300, 'B', 6, 54, 0),
(301, 'C', 1, 54, 0),
(302, 'C', 2, 54, 0),
(303, 'C', 3, 54, 0),
(304, 'C', 4, 54, 0),
(305, 'C', 5, 54, 0),
(306, 'C', 6, 54, 0),
(307, 'D', 1, 54, 0),
(308, 'D', 2, 54, 0),
(309, 'D', 3, 54, 0),
(310, 'D', 4, 54, 0),
(311, 'D', 5, 54, 0),
(312, 'D', 6, 54, 0),
(313, 'E', 1, 54, 0),
(314, 'E', 2, 54, 0),
(315, 'E', 3, 54, 0),
(316, 'E', 4, 54, 0),
(317, 'E', 5, 54, 0),
(318, 'E', 6, 54, 0),
(319, 'F', 1, 54, 0),
(320, 'F', 2, 54, 0),
(321, 'F', 3, 54, 0),
(322, 'F', 4, 54, 0),
(323, 'F', 5, 54, 0),
(324, 'F', 6, 54, 0),
(325, 'G', 1, 54, 0),
(326, 'G', 2, 54, 0),
(327, 'G', 3, 54, 0),
(328, 'G', 4, 54, 0),
(329, 'G', 5, 54, 0),
(330, 'G', 6, 54, 0),
(331, 'H', 1, 54, 0),
(332, 'H', 2, 54, 0),
(333, 'H', 3, 54, 0),
(334, 'H', 4, 54, 0),
(335, 'H', 5, 54, 0),
(336, 'H', 6, 54, 0),
(337, 'A', 1, 55, 11),
(338, 'A', 2, 55, 0),
(339, 'A', 3, 55, 0),
(340, 'A', 4, 55, 0),
(341, 'A', 5, 55, 0),
(342, 'A', 6, 55, 0),
(343, 'B', 1, 55, 0),
(344, 'B', 2, 55, 0),
(345, 'B', 3, 55, 0),
(346, 'B', 4, 55, 0),
(347, 'B', 5, 55, 0),
(348, 'B', 6, 55, 0),
(349, 'C', 1, 55, 0),
(350, 'C', 2, 55, 0),
(351, 'C', 3, 55, 0),
(352, 'C', 4, 55, 0),
(353, 'C', 5, 55, 0),
(354, 'C', 6, 55, 0),
(355, 'D', 1, 55, 0),
(356, 'D', 2, 55, 0),
(357, 'D', 3, 55, 0),
(358, 'D', 4, 55, 0),
(359, 'D', 5, 55, 0),
(360, 'D', 6, 55, 0),
(361, 'E', 1, 55, 0),
(362, 'E', 2, 55, 0),
(363, 'E', 3, 55, 0),
(364, 'E', 4, 55, 0),
(365, 'E', 5, 55, 0),
(366, 'E', 6, 55, 0),
(367, 'F', 1, 55, 0),
(368, 'F', 2, 55, 0),
(369, 'F', 3, 55, 0),
(370, 'F', 4, 55, 0),
(371, 'F', 5, 55, 0),
(372, 'F', 6, 55, 0),
(373, 'G', 1, 55, 0),
(374, 'G', 2, 55, 0),
(375, 'G', 3, 55, 0),
(376, 'G', 4, 55, 0),
(377, 'G', 5, 55, 0),
(378, 'G', 6, 55, 0),
(379, 'H', 1, 55, 0),
(380, 'H', 2, 55, 0),
(381, 'H', 3, 55, 0),
(382, 'H', 4, 55, 0),
(383, 'H', 5, 55, 0),
(384, 'H', 6, 55, 0),
(385, 'A', 1, 56, 0),
(386, 'A', 2, 56, 0),
(387, 'A', 3, 56, 0),
(388, 'A', 4, 56, 0),
(389, 'A', 5, 56, 0),
(390, 'A', 6, 56, 0),
(391, 'B', 1, 56, 0),
(392, 'B', 2, 56, 0),
(393, 'B', 3, 56, 0),
(394, 'B', 4, 56, 0),
(395, 'B', 5, 56, 0),
(396, 'B', 6, 56, 0),
(397, 'C', 1, 56, 0),
(398, 'C', 2, 56, 0),
(399, 'C', 3, 56, 0),
(400, 'C', 4, 56, 0),
(401, 'C', 5, 56, 0),
(402, 'C', 6, 56, 0),
(403, 'D', 1, 56, 0),
(404, 'D', 2, 56, 0),
(405, 'D', 3, 56, 0),
(406, 'D', 4, 56, 0),
(407, 'D', 5, 56, 0),
(408, 'D', 6, 56, 0),
(409, 'E', 1, 56, 0),
(410, 'E', 2, 56, 0),
(411, 'E', 3, 56, 0),
(412, 'E', 4, 56, 0),
(413, 'E', 5, 56, 0),
(414, 'E', 6, 56, 0),
(415, 'F', 1, 56, 0),
(416, 'F', 2, 56, 0),
(417, 'F', 3, 56, 0),
(418, 'F', 4, 56, 0),
(419, 'F', 5, 56, 0),
(420, 'F', 6, 56, 0),
(421, 'G', 1, 56, 0),
(422, 'G', 2, 56, 0),
(423, 'G', 3, 56, 0),
(424, 'G', 4, 56, 0),
(425, 'G', 5, 56, 0),
(426, 'G', 6, 56, 0),
(427, 'H', 1, 56, 0),
(428, 'H', 2, 56, 0),
(429, 'H', 3, 56, 0),
(430, 'H', 4, 56, 0),
(431, 'H', 5, 56, 0),
(432, 'H', 6, 56, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shows`
--

CREATE TABLE `shows` (
  `show_id` int NOT NULL,
  `show_m` int NOT NULL,
  `show_t` int NOT NULL,
  `show_s` int NOT NULL,
  `show_time` varchar(200) NOT NULL,
  `show_date` varchar(20) NOT NULL,
  `show_price` int NOT NULL,
  `show_status` int NOT NULL DEFAULT '1',
  `show_seat` int NOT NULL DEFAULT '48',
  `show_unq` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `shows`
--

INSERT INTO `shows` (`show_id`, `show_m`, `show_t`, `show_s`, `show_time`, `show_date`, `show_price`, `show_status`, `show_seat`, `show_unq`) VALUES
(56, 24, 8, 15, '20:05', '2022-06-11', 500, 1, 48, '62a2e01bed06c');

-- --------------------------------------------------------

--
-- Структура таблицы `theatre`
--

CREATE TABLE `theatre` (
  `t_id` int NOT NULL,
  `t_nm` varchar(30) NOT NULL,
  `t_city` varchar(30) NOT NULL,
  `t_time` bigint NOT NULL,
  `t_status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `theatre`
--

INSERT INTO `theatre` (`t_id`, `t_nm`, `t_city`, `t_time`, `t_status`) VALUES
(6, 'Cosmoplex', 'Rajkot   ', 1558695729, 1),
(8, 'Angel', 'Amreli      ', 1559134151, 1),
(9, 'Galaxy ', 'Rajkot', 1559548986, 1),
(10, 'R World', 'Rajkot', 1559549005, 1),
(11, 'Rajeshri', 'Rajkot', 1559549033, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `upmovies`
--

CREATE TABLE `upmovies` (
  `um_id` int NOT NULL,
  `um_nm` varchar(40) NOT NULL,
  `um_date` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `um_genre` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `um_duration` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `um_des` longtext NOT NULL,
  `um_banner` varchar(200) NOT NULL,
  `um_status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `upmovies`
--

INSERT INTO `upmovies` (`um_id`, `um_nm`, `um_date`, `um_genre`, `um_duration`, `um_des`, `um_banner`, `um_status`) VALUES
(19, 'Криминальный город 2', '16-06-2022', 'преступление, боевик, триллер', '106', '2008 год. Опергруппа под руководством харизматичного начальника Ма Сок-то отправляется со спецзаданием во Вьетнам. Там копы должны вычислить и поймать сбежавшего соотечественника, нападающего на корейских туристов.', '1654844746_506522307927.jpg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ac_id`);

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`m_id`);

--
-- Индексы таблицы `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- Индексы таблицы `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`s_id`);

--
-- Индексы таблицы `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Индексы таблицы `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`show_id`);

--
-- Индексы таблицы `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`t_id`);

--
-- Индексы таблицы `upmovies`
--
ALTER TABLE `upmovies`
  ADD PRIMARY KEY (`um_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activity`
--
ALTER TABLE `activity`
  MODIFY `ac_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `m_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `screen`
--
ALTER TABLE `screen`
  MODIFY `s_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT для таблицы `shows`
--
ALTER TABLE `shows`
  MODIFY `show_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `theatre`
--
ALTER TABLE `theatre`
  MODIFY `t_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `upmovies`
--
ALTER TABLE `upmovies`
  MODIFY `um_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
