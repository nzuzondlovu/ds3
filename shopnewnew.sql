-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 02:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `cityName` varchar(25) NOT NULL,
  `boxcode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `cityName`, `boxcode`) VALUES
(1, 'Dannhauser', 3080),
(2, 'Hattingspruit', 3081),
(3, 'Madadeni', 2951),
(4, 'Newcastle', 2940),
(5, 'Utrecht', 2980),
(6, 'Amanzimtoti', 4126),
(7, 'Cato Ridge', 3680),
(8, 'Hammerdale', 3680),
(9, 'Doonside', 4135),
(10, 'Drummond', 3626),
(11, 'Bluff', 4052),
(12, 'Durban', 4000),
(13, 'Durban North', 4016),
(14, 'Ekuphakameni', 4309),
(15, 'Hillcrest', 3610),
(16, 'Illovo Beach', 4155),
(17, 'Inanda', 4309),
(18, 'Isipingo', 4133),
(19, 'Karridene', 4126),
(20, 'Kingsburgh', 4126),
(21, 'Kloof', 3610),
(22, 'KwaMashu', 4360),
(23, 'La Lucia', 4051),
(24, 'La Mercy', 4399),
(25, 'Mount Edgecombe', 4302),
(26, 'New Germany', 3610),
(27, 'Pinetown', 3600),
(28, 'Pinetown South', 3610),
(29, 'Queensburgh', 4093),
(30, 'Tongaat', 4339),
(31, 'Umbogintwini', 4126),
(32, 'Umdloti', 4319),
(33, 'Umgababa', 4126),
(34, 'Umhlanga', 4019),
(35, 'Umlazi', 4066),
(36, 'Verulam', 4339),
(37, 'Warner Beach', 4126),
(38, 'Westville', 3634),
(39, 'Chatsworth', 4092),
(40, 'Wentworth', 4052),
(41, 'Umkomaas', 4170),
(42, 'Magabheni', 4170),
(43, 'Ntuzuma', 4359),
(44, 'Phoenix', 4068),
(45, 'Ballito', 4399),
(46, 'KwaDukuza', 4450),
(47, 'Salt Rock', 4392),
(48, 'Bulwer', 3244),
(49, 'Franklin', 4706),
(50, 'Himeville', 3256),
(51, 'Ixopo', 3276),
(52, 'Kokstad', 4700),
(53, 'Matatiele', 4730),
(54, 'Swartberg', 4710),
(55, 'Umzimkulu', 4240),
(56, 'Underberg', 3257),
(57, 'Harding', 4680),
(58, 'Hibberdene', 4220),
(59, 'Ifafa Beach', 4184),
(60, 'Kelso', 4183),
(61, 'Margate', 4275),
(62, 'Palm Beach', 4184),
(63, 'Park Rynie', 4182),
(64, 'Pennington', 4184),
(65, 'Port Edward', 4295),
(66, 'Port Shepstone', 4240),
(67, 'Ramsgate', 4284),
(68, 'Scottburgh', 4180),
(69, 'Sezela', 4215),
(70, 'Shelly Beach', 4265),
(71, 'Southbroom', 4277),
(72, 'Umtentweni', 4235),
(73, 'Umzinto', 4200),
(74, 'Umzumbe', 4225),
(75, 'Uvongo', 4270),
(76, 'Balgowan', 4270),
(77, 'Boston', 3211),
(78, 'Byrne', 3781),
(79, 'Hilton', 3201),
(80, 'Howick', 3290),
(81, 'Merrivale', 3291),
(82, 'Mooi River', 3300),
(83, 'New Hanover', 3230),
(84, 'Pietermaritzburg', 3200),
(85, 'Richmond', 3780),
(86, 'Wartburg', 3233),
(87, 'Dalton', 3236),
(88, 'Hluhluwe', 3960),
(89, 'Ingwavuma', 3968),
(90, 'Mkuze', 3965),
(91, 'Mtubatuba', 3935),
(92, 'Ubombo', 3970),
(93, 'Jozini', 3969),
(94, 'Mbazwana', 3974),
(95, 'Manguzi', 3973),
(96, 'Dundee', 3000),
(97, 'Glencoe', 2930),
(98, 'Greytown', 3250),
(99, 'Kranskop', 3268),
(100, 'Muden', 3251),
(101, 'Pomeroy', 3020),
(102, 'Wasbank', 2920),
(103, 'Nquthu', 3135),
(104, 'Bergville', 3350),
(105, 'Colenso', 3360),
(106, 'Elandslaagte', 2900),
(107, 'Estcourt', 3310),
(108, 'Ladysmith', 3370),
(109, 'Weenen', 3325),
(110, 'Winterton', 3340),
(111, 'Babanango', 3850),
(112, 'Empangeni', 3880),
(113, 'Eshowe', 3815),
(114, 'Mandeni', 4490),
(115, 'Melmoth', 3835),
(116, 'Mtunzini', 3867),
(117, 'Richards Bay', 3900),
(118, 'Louwsburg', 3150),
(119, 'Mahlabatini', 3865),
(120, 'Nongoma', 3950),
(121, 'Paulpietersburg', 3180),
(122, 'Pongola', 3170),
(123, 'Ulundi', 3838),
(124, 'Vryheid', 3100),
(125, '\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `basic_salary` decimal(7,2) NOT NULL,
  `bonus` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `emp_id`, `basic_salary`, `bonus`) VALUES
(1, 3, '2352.00', '1.00'),
(2, 2, '2501.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `num` int(3) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `prod_id`, `name`, `price`, `num`, `date`) VALUES
(1, 0, 28, 'BBB', '500.00', 5, '2017-05-11 19:16:07'),
(2, 5, 26, 'AAA', '401.00', 5, '2017-05-11 19:18:56'),
(3, 4, 26, 'AAA', '401.00', 4, '2017-05-11 19:19:58'),
(4, 4, 26, 'AAA', '401.00', 5, '2017-05-11 19:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `description`, `dateCreated`, `archive`) VALUES
(1, 'Laptop', 'Software', 'LaptopNewjskfbjkdk New', '0000-00-00 00:00:00', 0),
(2, 'Cellphone', '', 'Cellphone', '0000-00-00 00:00:00', 1),
(3, 'Desktop', '', 'Desktop', '0000-00-00 00:00:00', 0),
(4, 'Tablet', 'Hardware', 'Phablets', '0000-00-00 00:00:00', 0),
(5, 'Catata', 'Hardware', 'rfvglhuefdjjkc', '2017-05-26 14:31:44', 0),
(6, 'Hardrive', 'Hardware', 'wwwwwwwwwwwwwwwwwwwww', '2017-09-20 13:26:03', 0),
(7, 'Hardrive', 'Hardware', 'wwwwwwwwwwwwwwwwwwwww', '2017-09-20 13:26:49', 0),
(8, 'wola lapho', 'Hardware', 'izizihfhvhcdkl', '2017-09-20 13:27:54', 0),
(9, 'please', 'Software', 'woerlkfjvcvdjhxbjc', '2017-09-20 13:31:07', 0),
(10, 'Sasadatr', 'Software', 'dtyfgugigiio', '2017-09-20 13:32:24', 0),
(11, 'dsklvnkldfmlkv', 'Hardware', 'dsfnclsdkj;clm;ndkbv/jldks', '2017-09-23 15:50:01', 0),
(12, 'sasasa', 'Hardware', 'sdknjkvdhslkcsdjl', '2017-09-23 15:57:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(175) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`) VALUES
(1, 'AX', 'Åland Islands'),
(2, 'AF', 'Afghanistan'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'PW', 'Belau'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia'),
(28, 'BQ', 'Bonaire, Saint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'VG', 'British Virgin Islands'),
(35, 'BN', 'Brunei'),
(36, 'BG', 'Bulgaria'),
(37, 'BF', 'Burkina Faso'),
(38, 'BI', 'Burundi'),
(39, 'KH', 'Cambodia'),
(40, 'CM', 'Cameroon'),
(41, 'CA', 'Canada'),
(42, 'CV', 'Cape Verde'),
(43, 'KY', 'Cayman Islands'),
(44, 'CF', 'Central African Republic'),
(45, 'TD', 'Chad'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CX', 'Christmas Island'),
(49, 'CC', 'Cocos (Keeling) Islands'),
(50, 'CO', 'Colombia'),
(51, 'AX', 'Åland Islands'),
(52, 'AF', 'Afghanistan'),
(53, 'AL', 'Albania'),
(54, 'DZ', 'Algeria'),
(55, 'AD', 'Andorra'),
(56, 'AO', 'Angola'),
(57, 'AI', 'Anguilla'),
(58, 'AQ', 'Antarctica'),
(59, 'AG', 'Antigua and Barbuda'),
(60, 'AR', 'Argentina'),
(61, 'AM', 'Armenia'),
(62, 'AW', 'Aruba'),
(63, 'AU', 'Australia'),
(64, 'AT', 'Austria'),
(65, 'AZ', 'Azerbaijan'),
(66, 'BS', 'Bahamas'),
(67, 'BH', 'Bahrain'),
(68, 'BD', 'Bangladesh'),
(69, 'BB', 'Barbados'),
(70, 'BY', 'Belarus'),
(71, 'PW', 'Belau'),
(72, 'BE', 'Belgium'),
(73, 'BZ', 'Belize'),
(74, 'BJ', 'Benin'),
(75, 'BM', 'Bermuda'),
(76, 'BT', 'Bhutan'),
(77, 'BO', 'Bolivia'),
(78, 'BQ', 'Bonaire, Saint Eustatius and Saba'),
(79, 'BA', 'Bosnia and Herzegovina'),
(80, 'BW', 'Botswana'),
(81, 'BV', 'Bouvet Island'),
(82, 'BR', 'Brazil'),
(83, 'IO', 'British Indian Ocean Territory'),
(84, 'VG', 'British Virgin Islands'),
(85, 'BN', 'Brunei'),
(86, 'BG', 'Bulgaria'),
(87, 'BF', 'Burkina Faso'),
(88, 'BI', 'Burundi'),
(89, 'KH', 'Cambodia'),
(90, 'CM', 'Cameroon'),
(91, 'CA', 'Canada'),
(92, 'CV', 'Cape Verde'),
(93, 'KY', 'Cayman Islands'),
(94, 'CF', 'Central African Republic'),
(95, 'TD', 'Chad'),
(96, 'CL', 'Chile'),
(97, 'CN', 'China'),
(98, 'CX', 'Christmas Island'),
(99, 'CC', 'Cocos (Keeling) Islands'),
(100, 'CO', 'Colombia'),
(101, 'AX', 'Åland Islands'),
(102, 'AF', 'Afghanistan'),
(103, 'AL', 'Albania'),
(104, 'DZ', 'Algeria'),
(105, 'AD', 'Andorra'),
(106, 'AO', 'Angola'),
(107, 'AI', 'Anguilla'),
(108, 'AQ', 'Antarctica'),
(109, 'AG', 'Antigua and Barbuda'),
(110, 'AR', 'Argentina'),
(111, 'AM', 'Armenia'),
(112, 'AW', 'Aruba'),
(113, 'AU', 'Australia'),
(114, 'AT', 'Austria'),
(115, 'AZ', 'Azerbaijan'),
(116, 'BS', 'Bahamas'),
(117, 'BH', 'Bahrain'),
(118, 'BD', 'Bangladesh'),
(119, 'BB', 'Barbados'),
(120, 'BY', 'Belarus'),
(121, 'PW', 'Belau'),
(122, 'BE', 'Belgium'),
(123, 'BZ', 'Belize'),
(124, 'BJ', 'Benin'),
(125, 'BM', 'Bermuda'),
(126, 'BT', 'Bhutan'),
(127, 'BO', 'Bolivia'),
(128, 'BQ', 'Bonaire, Saint Eustatius and Saba'),
(129, 'BA', 'Bosnia and Herzegovina'),
(130, 'BW', 'Botswana'),
(131, 'BV', 'Bouvet Island'),
(132, 'BR', 'Brazil'),
(133, 'IO', 'British Indian Ocean Territory'),
(134, 'VG', 'British Virgin Islands'),
(135, 'BN', 'Brunei'),
(136, 'BG', 'Bulgaria'),
(137, 'BF', 'Burkina Faso'),
(138, 'BI', 'Burundi'),
(139, 'KH', 'Cambodia'),
(140, 'CM', 'Cameroon'),
(141, 'CA', 'Canada'),
(142, 'CV', 'Cape Verde'),
(143, 'KY', 'Cayman Islands'),
(144, 'CF', 'Central African Republic'),
(145, 'TD', 'Chad'),
(146, 'CL', 'Chile'),
(147, 'CN', 'China'),
(148, 'CX', 'Christmas Island'),
(149, 'CC', 'Cocos (Keeling) Islands'),
(150, 'CO', 'Colombia'),
(151, 'KM', 'Comoros'),
(152, 'CG', 'Congo (Brazzaville)'),
(153, 'CD', 'Congo (Kinshasa)'),
(154, 'CK', 'Cook Islands'),
(155, 'CR', 'Costa Rica'),
(156, 'HR', 'Croatia'),
(157, 'CU', 'Cuba'),
(158, 'CW', 'CuraÇao'),
(159, 'CY', 'Cyprus'),
(160, 'CZ', 'Czech Republic'),
(161, 'DK', 'Denmark'),
(162, 'DJ', 'Djibouti'),
(163, 'DM', 'Dominica'),
(164, 'DO', 'Dominican Republic'),
(165, 'EC', 'Ecuador'),
(166, 'EG', 'Egypt'),
(167, 'SV', 'El Salvador'),
(168, 'GQ', 'Equatorial Guinea'),
(169, 'ER', 'Eritrea'),
(170, 'EE', 'Estonia'),
(171, 'ET', 'Ethiopia'),
(172, 'FK', 'Falkland Islands'),
(173, 'FO', 'Faroe Islands'),
(174, 'FJ', 'Fiji'),
(175, 'FI', 'Finland'),
(176, 'FR', 'France'),
(177, 'GF', 'French Guiana'),
(178, 'PF', 'French Polynesia'),
(179, 'TF', 'French Southern Territories'),
(180, 'GA', 'Gabon'),
(181, 'GM', 'Gambia'),
(182, 'GE', 'Georgia'),
(183, 'DE', 'Germany'),
(184, 'GH', 'Ghana'),
(185, 'GI', 'Gibraltar'),
(186, 'GR', 'Greece'),
(187, 'GL', 'Greenland'),
(188, 'GD', 'Grenada'),
(189, 'GP', 'Guadeloupe'),
(190, 'GT', 'Guatemala'),
(191, 'GG', 'Guernsey'),
(192, 'GN', 'Guinea'),
(193, 'GW', 'Guinea-Bissau'),
(194, 'GY', 'Guyana'),
(195, 'HT', 'Haiti'),
(196, 'HM', 'Heard Island and McDonald Islands'),
(197, 'HN', 'Honduras'),
(198, 'HK', 'Hong Kong'),
(199, 'HU', 'Hungary'),
(200, 'IS', 'Iceland'),
(201, 'IN', 'India'),
(202, 'ID', 'Indonesia'),
(203, 'IR', 'Iran'),
(204, 'IQ', 'Iraq'),
(205, 'IM', 'Isle of Man'),
(206, 'IL', 'Israel'),
(207, 'IT', 'Italy'),
(208, 'CI', 'Ivory Coast'),
(209, 'JM', 'Jamaica'),
(210, 'JP', 'Japan'),
(211, 'JE', 'Jersey'),
(212, 'JO', 'Jordan'),
(213, 'KZ', 'Kazakhstan'),
(214, 'KE', 'Kenya'),
(215, 'KI', 'Kiribati'),
(216, 'KW', 'Kuwait'),
(217, 'KG', 'Kyrgyzstan'),
(218, 'LA', 'Laos'),
(219, 'LV', 'Latvia'),
(220, 'LB', 'Lebanon'),
(221, 'LS', 'Lesotho'),
(222, 'LR', 'Liberia'),
(223, 'LY', 'Libya'),
(224, 'LI', 'Liechtenstein'),
(225, 'LT', 'Lithuania'),
(226, 'LU', 'Luxembourg'),
(227, 'MO', 'Macao S.A.R., China'),
(228, 'MK', 'Macedonia'),
(229, 'MG', 'Madagascar'),
(230, 'MW', 'Malawi'),
(231, 'MY', 'Malaysia'),
(232, 'MV', 'Maldives'),
(233, 'ML', 'Mali'),
(234, 'MT', 'Malta'),
(235, 'MH', 'Marshall Islands'),
(236, 'MQ', 'Martinique'),
(237, 'MR', 'Mauritania'),
(238, 'MU', 'Mauritius'),
(239, 'YT', 'Mayotte'),
(240, 'MX', 'Mexico'),
(241, 'FM', 'Micronesia'),
(242, 'MD', 'Moldova'),
(243, 'MC', 'Monaco'),
(244, 'MN', 'Mongolia'),
(245, 'ME', 'Montenegro'),
(246, 'MS', 'Montserrat'),
(247, 'MA', 'Morocco'),
(248, 'MZ', 'Mozambique'),
(249, 'MM', 'Myanmar'),
(250, 'NA', 'Namibia'),
(251, 'NR', 'Nauru'),
(252, 'NP', 'Nepal'),
(253, 'NL', 'Netherlands'),
(254, 'AN', 'Netherlands Antilles'),
(255, 'NC', 'New Caledonia'),
(256, 'NZ', 'New Zealand'),
(257, 'NI', 'Nicaragua'),
(258, 'NE', 'Niger'),
(259, 'NG', 'Nigeria'),
(260, 'NU', 'Niue'),
(261, 'NF', 'Norfolk Island'),
(262, 'KP', 'North Korea'),
(263, 'NO', 'Norway'),
(264, 'OM', 'Oman'),
(265, 'PK', 'Pakistan'),
(266, 'PS', 'Palestinian Territory'),
(267, 'PA', 'Panama'),
(268, 'PG', 'Papua New Guinea'),
(269, 'PY', 'Paraguay'),
(270, 'PE', 'Peru'),
(271, 'PH', 'Philippines'),
(272, 'PN', 'Pitcairn'),
(273, 'PL', 'Poland'),
(274, 'PT', 'Portugal'),
(275, 'QA', 'Qatar'),
(276, 'IE', 'Republic of Ireland'),
(277, 'RE', 'Reunion'),
(278, 'RO', 'Romania'),
(279, 'RU', 'Russia'),
(280, 'RW', 'Rwanda'),
(281, 'ST', 'São Tomé and Príncipe'),
(282, 'BL', 'Saint Barthélemy'),
(283, 'SH', 'Saint Helena'),
(284, 'KN', 'Saint Kitts and Nevis'),
(285, 'LC', 'Saint Lucia'),
(286, 'SX', 'Saint Martin (Dutch part)'),
(287, 'MF', 'Saint Martin (French part)'),
(288, 'PM', 'Saint Pierre and Miquelon'),
(289, 'VC', 'Saint Vincent and the Grenadines'),
(290, 'SM', 'San Marino'),
(291, 'SA', 'Saudi Arabia'),
(292, 'SN', 'Senegal'),
(293, 'RS', 'Serbia'),
(294, 'SC', 'Seychelles'),
(295, 'SL', 'Sierra Leone'),
(296, 'SG', 'Singapore'),
(297, 'SK', 'Slovakia'),
(298, 'SI', 'Slovenia'),
(299, 'SB', 'Solomon Islands'),
(300, 'SO', 'Somalia'),
(301, 'ZA', 'South Africa'),
(302, 'GS', 'South Georgia/Sandwich Islands'),
(303, 'KR', 'South Korea'),
(304, 'SS', 'South Sudan'),
(305, 'ES', 'Spain'),
(306, 'LK', 'Sri Lanka'),
(307, 'SD', 'Sudan'),
(308, 'SR', 'Suriname'),
(309, 'SJ', 'Svalbard and Jan Mayen'),
(310, 'SZ', 'Swaziland'),
(311, 'SE', 'Sweden'),
(312, 'CH', 'Switzerland'),
(313, 'SY', 'Syria'),
(314, 'TW', 'Taiwan'),
(315, 'TJ', 'Tajikistan'),
(316, 'TZ', 'Tanzania'),
(317, 'TH', 'Thailand'),
(318, 'TL', 'Timor-Leste'),
(319, 'TG', 'Togo'),
(320, 'TK', 'Tokelau'),
(321, 'TO', 'Tonga'),
(322, 'TT', 'Trinidad and Tobago'),
(323, 'TN', 'Tunisia'),
(324, 'TR', 'Turkey'),
(325, 'TM', 'Turkmenistan'),
(326, 'TC', 'Turks and Caicos Islands'),
(327, 'TV', 'Tuvalu'),
(328, 'UG', 'Uganda'),
(329, 'UA', 'Ukraine'),
(330, 'AE', 'United Arab Emirates'),
(331, 'GB', 'United Kingdom (UK)'),
(332, 'US', 'United States (US)'),
(333, 'UY', 'Uruguay'),
(334, 'UZ', 'Uzbekistan'),
(335, 'VU', 'Vanuatu'),
(336, 'VA', 'Vatican'),
(337, 'VE', 'Venezuela'),
(338, 'VN', 'Vietnam'),
(339, 'WF', 'Wallis and Futuna'),
(340, 'EH', 'Western Sahara'),
(341, 'WS', 'Western Samoa'),
(342, 'YE', 'Yemen'),
(343, 'ZM', 'Zambia'),
(344, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `custdelivery`
--

CREATE TABLE `custdelivery` (
  `id` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `custname` varchar(25) NOT NULL,
  `custcell` varchar(13) NOT NULL,
  `strAddress` varchar(35) NOT NULL,
  `suburb` varchar(35) NOT NULL,
  `area` varchar(35) NOT NULL,
  `boxcode` int(11) NOT NULL,
  `dateofRequest` datetime NOT NULL,
  `dateofDelivery` datetime NOT NULL,
  `deliveryID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custdelivery`
--

INSERT INTO `custdelivery` (`id`, `custId`, `custname`, `custcell`, `strAddress`, `suburb`, `area`, `boxcode`, `dateofRequest`, `dateofDelivery`, `deliveryID`) VALUES
(1, 4, 'fff', '121212121', 'fds', 'efsd', 'feds', 1212, '2017-09-03 00:00:00', '2017-09-20 00:00:00', 1),
(2, 11, 'Aminah', '0796898464', '6 Starling Cresent ,Nyala Park', 'BERKSHIRE', 'PINETOWN\r\n', 3604, '2017-09-04 00:00:00', '2017-09-11 00:00:00', 6),
(3, 11, 'tgggjfj', 'dddjdj', '22 Stalimng ,', 'South Beach', 'Durban', 4000, '2017-09-13 00:00:00', '2017-09-20 00:00:00', 11),
(4, 15, 'Lizzy', 'Novolo', '20 Starling Cresent ,', 'Nyala Park', 'Empangeni', 3880, '2017-09-10 00:00:00', '2017-09-17 00:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `customersaledevice`
--

CREATE TABLE `customersaledevice` (
  `id` int(11) NOT NULL,
  `diviceName` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `Dtype` varchar(255) NOT NULL,
  `recievedDate` varchar(255) NOT NULL,
  `establishAmount` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customersaledevice`
--

INSERT INTO `customersaledevice` (`id`, `diviceName`, `model`, `serialNumber`, `Dtype`, `recievedDate`, `establishAmount`) VALUES
(4, 'HP', 'Mobile', 'mona5', 'Hardware', '2017-06-12', '150.00'),
(5, 'Acer', 'e15', '1234567', 'Software', '2017/09/29', '12345.00');

-- --------------------------------------------------------

--
-- Table structure for table `custsaleprod`
--

CREATE TABLE `custsaleprod` (
  `id` int(11) NOT NULL,
  `prodname` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `invoice_num` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `med_aid` decimal(7,2) NOT NULL,
  `uif` decimal(7,2) NOT NULL,
  `pension` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `emp_id`, `med_aid`, `uif`, `pension`) VALUES
(1, 3, '1.00', '1.00', '1.00'),
(2, 2, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `driverdelivery`
--

CREATE TABLE `driverdelivery` (
  `id` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `deliveryID` int(11) NOT NULL,
  `dateofDelivery` date NOT NULL,
  `custname` varchar(25) NOT NULL,
  `custcell` varchar(13) NOT NULL,
  `location` varchar(250) NOT NULL,
  `area` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverdelivery`
--

INSERT INTO `driverdelivery` (`id`, `driverID`, `deliveryID`, `dateofDelivery`, `custname`, `custcell`, `location`, `area`, `status`) VALUES
(2, 1, 5, '2017-08-25', 'Amy', '0125843695', '55 Stevens road ,ASHLEY ,PINETOWN, 3200', '', ''),
(3, 1, 5, '2017-08-25', 'Amy', '0125843695', '55 Stevens road ,ASHLEY ,PINETOWN, 3200', '', ''),
(19, 2, 6, '2017-09-11', 'Aminah', '0796898464', '6 Starling Cresent ,Nyala Park ,BERKSHIRE ,PINETOWN, 3604', '', ''),
(25, 10, 10, '2017-09-17', 'Lizzy', 'Novolo', '20 Starling Cresent , ,Nyala Park ,Empangeni, 3880', '', ''),
(24, 9, 11, '2017-09-20', 'tgggjfj', 'dddjdj', '22 Stalimng , ,South Beach ,Durban, 4000', '', ''),
(23, 8, 10, '2017-09-17', 'Lizzy', 'Novolo', '20 Starling Cresent , ,Nyala Park ,Empangeni, 3880', '', ''),
(26, 2344444, 10, '2017-09-17', 'Lizzy', 'Novolo', '20 Starling Cresent , ,Nyala Park , Empangeni', '3880', ''),
(27, 2147483647, 10, '2017-09-17', 'Lizzy', 'Novolo', '20 Starling Cresent , ,Nyala Park , Empangeni', '3880', ''),
(28, 2147483647, 1, '2017-09-20', 'fff', '121212121', 'fds ,efsd , feds', '1212', ''),
(29, 2344444, 1, '2017-09-20', 'fff', '121212121', 'fds ,efsd , feds', '1212', ''),
(30, 44455, 6, '2017-09-11', 'Aminah', '0796898464', '6 Starling Cresent ,Nyala Park ,BERKSHIRE , PINETOWN', '3604', ''),
(31, 2147483647, 11, '2017-09-20', 'tgggjfj', 'dddjdj', '22 Stalimng , ,South Beach , Durban', '4000', ''),
(32, 2344444, 6, '2017-09-11', 'Aminah', '0796898464', '6 Starling Cresent ,Nyala Park ,BERKSHIRE , PINETOWN', '3604', ''),
(33, 2344444, 6, '2017-09-11', 'Aminah', '0796898464', '6 Starling Cresent ,Nyala Park ,BERKSHIRE , PINETOWN', '3604', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driverID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `cell` varchar(13) NOT NULL,
  `idnumber` varchar(13) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driverID`, `name`, `surname`, `cell`, `idnumber`, `email`) VALUES
(1, 'hello', 'world', '0795333568', '1234567895', 'nzuzondlovu@gmail.com'),
(2, 'Mandiso', 'Ngwenya', '0822175681', '9606036404080', 'mandiso04@yahoo.co'),
(3, 'Samsung', 'Sese', '0822175681', '2344444', 'mandiso04@yahoo.co'),
(4, 'Mxolisi', 'dddd', '655', '20012548695', 'mxo@gmail.com'),
(5, 'Lulu', 'lala', '0112548756', '658459251', 'lululala@gmail.com'),
(6, 'Aminah', 'Novolo', '0824443798', '7512457896312', 'novolo.lizzy@gmail.com'),
(7, 'dodo', 'dada', '6598552225555', '44455', 'dodo@gmail.com'),
(8, 'lutho', 'Spambo', '0112533662552', '3352256688745', 'ls@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `driver_loc`
--

CREATE TABLE `driver_loc` (
  `gen_code` varchar(20) NOT NULL,
  `AreaCode` varchar(100) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `Month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_loc`
--

INSERT INTO `driver_loc` (`gen_code`, `AreaCode`, `idnumber`, `Month`) VALUES
('DLV-227292', '2951 Madadeni', '9606036404080', 'April - 2017'),
('DLV-245023', '3230', '9606036404080', 'December'),
('DLV-28223', '', '7512457896312', 'January - 2017'),
('DLV-28795', '3634', '9606036404080', 'January'),
('DLV-3202033', '4126', '9606036404080', 'Ferbuary - 2017'),
('DLV-33332242', '', '44455', 'April - 2017'),
('DLV-33363203', '2980 Utrecht', '7512457896312', 'April - 2017'),
('DLV-362233', '', '658459251', 'December - 2017');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `pic_url` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `description2` varchar(250) NOT NULL,
  `date_in` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `technician` varchar(30) NOT NULL,
  `date_out` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archive` tinyint(1) NOT NULL,
  `job_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user`, `name`, `serial`, `type`, `pic_url`, `description`, `description2`, `date_in`, `status`, `technician`, `date_out`, `date`, `archive`, `job_code`) VALUES
(1, 2, 'HP', 'trd72757rf3', 'Laptop', '', 'It works fine', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-02 20:27:45', 0, ''),
(2, 2, 'HP', '55884102', 'Desktop', '', 'I am not sure', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-02 21:27:45', 0, ''),
(3, 2, 'SGH09000', '6936', 'Cellphone', '', 'THE  device ios crazyyyyy', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-03 11:24:17', 0, ''),
(4, 3, 'yttgtrbvfd', '852tffc', 'Desktop', 'FB_IMG_14808153292160947.jpg', 'rthbfd tfv', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-05-07 21:15:04', 1, ''),
(5, 5, 'Admin', '555ddd5d', 'Desktop', 'FB_IMG_14807106345083239.jpg', 'fgh', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-05-10 10:45:23', 0, ''),
(6, 1, 'HP', 'Hs121', 'Laptop', 'nature_mountain_eagle_fog_landscape_ultrahd_4k_wal', 'hhhhhb fvv ffb', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-09-07 12:18:00', 1, ''),
(7, 1, 'lenovo', '2542525dfv', 'Desktop', 'Sunset_at_Tiergarten_UHD.jpg', 'dede fgfb', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-09-07 12:41:56', 1, ''),
(8, 1, 'Acer', '1234', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'wwwrtwr', '', '2017-09-20 12:48:36', '', '', '2017-09-20 12:48:36', '2017-09-20 12:48:36', 0, ''),
(9, 1, 'test', '1234', 'Desktop', 'IMG-20170612-WA0029 - Copy.jpg', 'ugudugfwelh', '', '2017-09-20 12:50:04', '', '', '2017-09-20 12:50:04', '2017-09-20 12:50:04', 0, ''),
(10, 1, 'Sasadatr', '112334343', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'bewhfkbbbbbbwwqw', '', '2017-09-21 12:26:08', '', '', '2017-09-21 12:26:08', '2017-09-30 00:00:00', 0, ''),
(11, 1, 'Sasadatr', '112334343', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'bewhfkbbbbbbwwqw', '', '2017-09-21 12:26:08', '', '', '2017-09-21 12:26:08', '2017-09-30 00:00:00', 0, ''),
(12, 1, 'Asande', '112334343', 'wola lapho', 'IMG_20140924_202358.jpg', 'jkfgdsgxkxklhnjkcdx', '', '2017-09-21 12:28:11', '', '', '2017-09-21 12:28:11', '2017-10-06 00:00:00', 0, ''),
(13, 1, 'Mak Pub', '1243275783788493', 'Hardrive', 'IMG_20140924_230113.jpg', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '', '2017-09-25 14:57:22', '', '', '2017-09-25 14:57:22', '2017-11-10 00:00:00', 0, ''),
(14, 1, 'gsdujk', 'jbdjkfkj', 'Desktop', 'IMG-20170612-WA0027 - Copy.jpg', 'dbcubslks', '', '2017-10-05 16:06:24', '', '', '2017-10-05 16:06:24', '2017-10-03 07:00:00', 0, ''),
(15, 1, 'gsdujk', 'jbdjkfkj', 'Desktop', 'IMG-20170612-WA0027 - Copy.jpg', 'dbcubslks', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-10-03 07:00:00', 0, ''),
(16, 1, 'test', '123455', 'Desktop', 'IMG-20170612-WA0028 - Copy.jpg', 'vjhcjkdsehdkbkjcdk', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-11-16 12:00:00', 0, ''),
(17, 1, 'test', '123455', 'Desktop', 'IMG-20170612-WA0028 - Copy.jpg', 'vjhcjkdsehdkbkjcdk', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-11-16 12:00:00', 0, ''),
(18, 1, 'dvbdhid', '122.34.57.89', 'Cellphone', 'IMG-20170713-WA0020.jpg', 'bcsbjns/alkcbhjdchjbdl', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-10-23 08:45:00', 0, ''),
(19, 1, 'Samsung', '123.46.78.90', 'Cellphone', 'IMG_20140924_230133.jpg', 'ifile nami angazi kwenzenjani', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-10-28 09:15:00', 0, 'BKN-28792253');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `m_ID` int(11) NOT NULL,
  `m_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`m_ID`, `m_Name`) VALUES
(4, 'April'),
(8, 'August'),
(12, 'December'),
(2, 'Ferbuary'),
(1, 'January'),
(7, 'July'),
(6, 'June'),
(3, 'March'),
(5, 'May'),
(11, 'November'),
(10, 'October'),
(9, 'September');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `orderDate` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `totalPrice` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `supplierID`, `supplierName`, `orderDate`, `quantity`, `productName`, `email`, `totalPrice`) VALUES
(1, 1, 'Microsoft', '2017-05-14 13:19:23', 5, 'Windows 10', '', '5000.00'),
(2, 1, 'Microsoft', '2017-05-14 13:23:30', 2, 'Microsoft Office 365', 'sales@microsoft.com', '1700.00'),
(3, 1, 'Microsoft', '2017-05-14 13:23:30', 10, 'Microsoft Office 365', 'sales@microsoft.com', '8500.00'),
(4, 1, 'Microsoft', '2017-05-14 13:19:23', 13, 'Windows 10 Pro', '', '11325.00'),
(5, 1, 'Microsoft', '2017-05-14 13:19:23', 2, 'Windows 10 Home', '', '1450.00'),
(6, 1, 'Microsoft ', '2017-05-14 13:23:30', 21, 'Microsoft Office 365', 'sales@microsoft.com', '22350.00'),
(7, 1, 'Microsoft', '2017-05-14 13:23:30', 17, 'Microsoft Office Pro', 'sales@microsoft.com', '18273.00'),
(8, 1, 'Microsoft', '2017-05-14 13:19:23', 7, 'Windows 8 Enterprise', '', '8430.00'),
(9, 1, 'Microsoft', '2017-09-07 13:18:15', 555, 'Microsoft Office 365', 'sales@microsoft.com', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `promo_price` decimal(7,2) NOT NULL,
  `pic_url` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `promo_date1` datetime NOT NULL,
  `promo_date2` datetime NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `onhand_qty` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `qty_sold` int(10) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `brandname` varchar(100) DEFAULT NULL,
  `oPrice` varchar(100) DEFAULT NULL,
  `profit` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `generic_name` varchar(100) DEFAULT NULL,
  `supplierID` varchar(100) DEFAULT NULL,
  `order_price` varchar(100) DEFAULT NULL,
  `barcode` int(10) DEFAULT NULL,
  `prod_code` varchar(20) NOT NULL,
  `idnumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user`, `name`, `description`, `type`, `price`, `promo_price`, `pic_url`, `date`, `promo_date1`, `promo_date2`, `archive`, `onhand_qty`, `qty`, `qty_sold`, `supplier`, `brandname`, `oPrice`, `profit`, `brand_name`, `generic_name`, `supplierID`, `order_price`, `barcode`, `prod_code`, `idnumber`) VALUES
(1, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '1259.00', 'a', '2017-04-02 21:43:30', '2017-12-19 00:00:00', '2018-10-20 00:00:00', 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(3, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(4, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '34542.00', 'a', '2017-04-02 21:43:30', '2017-12-12 00:00:00', '2019-12-12 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(5, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(6, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(7, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(8, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(9, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(10, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(11, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(12, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(13, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(14, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(15, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(16, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(17, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(18, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(19, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(20, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '7300.00', 'a', '2017-04-02 21:43:30', '2017-04-28 00:00:00', '2017-04-30 00:00:00', 0, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(21, 1, 'Dell', 'A good device i5', 'Laptop', '3300.00', '2010.00', '', '2017-04-02 22:04:22', '2017-12-12 00:00:00', '2019-12-12 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(22, 1, 'gfds', 'a', 'Desktop', '5252.00', '0.00', '', '2017-05-04 10:56:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(23, 1, 'Landline', 'Old school', 'Cellphone', '300.00', '0.00', '1FB_IMG_14797886111325064.jpg', '2017-05-07 20:38:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(24, 1, 'Landline', 'Old school', 'Cellphone', '300.00', '0.00', '1FB_IMG_14797886111325064.jpg', '2017-05-07 20:39:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(25, 1, 'gfd', 'hello', 'Cellphone', '500.00', '0.00', 'FB_IMG_14807740054992457.jpg', '2017-05-07 20:57:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(26, 1, 'AAA', 'fgh', 'Desktop', '401.00', '123.00', 'FB_IMG_14794968922419420.jpg', '2017-05-07 20:58:59', '2017-10-19 00:00:00', '2017-10-20 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(27, 1, 'gfdstrge', 'gthfejd', 'Desktop', '852.00', '0.00', 'FB_IMG_14818444791488686.jpg', '2017-05-07 21:00:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(28, 1, 'BBB', 'fgh', 'Cellphone', '500.00', '34353.00', 'FB_IMG_14794968780497765.jpg', '2017-05-10 10:44:14', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(29, 1, 'e15', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '', '1000.00', '2121.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:17:01', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 999, 8, NULL, 'Microsoft', 'Acer', '1', '999', NULL, NULL, NULL, NULL, NULL, '', ''),
(30, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:19:40', '2017-09-20 12:19:40', '2017-09-20 12:19:40', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL, '', ''),
(31, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '22.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:20:43', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL, '', ''),
(32, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:20:43', '2017-09-20 12:20:43', '2017-09-20 12:20:43', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL, '', ''),
(33, 1, 's8', 'tetdyfue;hdvkllkrgkjuieyfgyiajs', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0028.jpg', '2017-09-20 12:21:43', '2017-09-20 12:21:43', '2017-09-20 12:21:43', 0, 58, 34, NULL, 'Microsoft', 'Samsung', '65', '58', NULL, NULL, NULL, NULL, NULL, '', ''),
(34, 1, 's8', 'tetdyfue;hdvkllkrgkjuieyfgyiajs', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0028.jpg', '2017-09-20 12:21:43', '2017-09-20 12:21:43', '2017-09-20 12:21:43', 0, 58, 34, NULL, 'Microsoft', 'Samsung', '65', '58', NULL, NULL, NULL, NULL, NULL, '', ''),
(35, 1, 'iPhone8', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Cellphone', '50000.00', '0.00', 'IMG-20170612-WA0029 - Copy.jpg', '2017-09-20 12:22:38', '2017-09-20 12:22:38', '2017-09-20 12:22:38', 1, 49922, 54, NULL, 'Microsoft', 'Apple', '78', '49922', NULL, NULL, NULL, NULL, NULL, '', ''),
(36, 1, 'iPhone8', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Cellphone', '50000.00', '10000.00', 'IMG-20170612-WA0029 - Copy.jpg', '2017-09-20 12:22:38', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 49922, 54, NULL, 'Microsoft', 'Apple', '78', '49922', NULL, NULL, NULL, NULL, NULL, '', ''),
(37, 1, 's7', 'lgdcugxcjodjpc\'k;co;hvhvcvxuhj', 'Cellphone', '123.00', '0.00', 'IMG_20140924_230143.jpg', '2017-10-07 13:15:40', '2017-10-07 13:15:40', '2017-10-07 13:15:40', 0, 88, 23, NULL, 'Microsoft', 'Samsung', '35', '88', NULL, NULL, NULL, NULL, NULL, 'PRD-02287293', '1234'),
(38, 1, 's7', 'lgdcugxcjodjpc\'k;co;hvhvcvxuhj', 'Cellphone', '123.00', '0.00', 'IMG_20140924_230143.jpg', '2017-10-07 13:15:40', '2017-10-07 13:15:40', '2017-10-07 13:15:40', 0, 88, 23, NULL, 'Microsoft', 'Samsung', '35', '88', NULL, NULL, NULL, NULL, NULL, 'PRD-02287293', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `name` varchar(20) NOT NULL,
  `query` varchar(175) NOT NULL,
  `status` varchar(20) NOT NULL,
  `feedback` varchar(175) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `email`, `name`, `query`, `status`, `feedback`) VALUES
(1, 4, 'jay@z.com2', 'Nzuzo', 'My laptop is faulty', 'answered', 'Nami angazi'),
(2, 4, 'jay@z.com2', 'Nzuzo', 'I need help', 'answered', 'sorry asasssadsgr'),
(3, 1, 'jay@z.com', 'Nzuzo', 'Hwelelklchvjkbdhjcbjnxjkbshvkhs', 'answered', 'Hvdhjgkdfjlded'),
(4, 1, 'jay@z.com', 'Nzuzo', 'Hwelelklchvjkbdhjcbjnxjkbshvkhs', 'answered', 'fjvhifodvuzxkcndcbvuijcoid');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `accessory` varchar(50) NOT NULL,
  `technician` varchar(50) NOT NULL,
  `description` varchar(160) NOT NULL,
  `deposit` decimal(7,2) NOT NULL,
  `balance` decimal(7,2) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `user_book` int(11) NOT NULL,
  `job_code` varchar(20) NOT NULL,
  `quote_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `booking_id`, `name`, `serial`, `model`, `accessory`, `technician`, `description`, `deposit`, `balance`, `total`, `status`, `archive`, `user_book`, `job_code`, `quote_code`) VALUES
(1, 5, 'Admin', '555ddd5d', 'rtgfd', 'tgfdv', 'Nzuzo', 'gfd', '500.00', '600.00', '100.00', 'Fixing', 0, 0, '0', '0'),
(2, 6, 'HP', 'Hs121', 'hd344', 'none', 'Nzuzo', 'hrhrhh eiievj jrjdj', '200.00', '3500.00', '5222.00', 'Pending', 1, 0, '0', '0'),
(3, 4, 'yttgtrbvfd', '852tffc', 'hh', 'dd', 'Nzuzo', 'ffgv gvbgnhg gfv', '652.00', '52.00', '66.00', 'Pending', 0, 0, '0', '0'),
(4, 10, 'Sasadatr', '112334343', 'e15Mandiso', 'chacha', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '123.00', '576.00', '699.00', 'Fixing', 0, 0, '0', '0'),
(5, 10, 'Sasadatr', '112334343', 'e15Mandiso', 'chacha', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '123.00', '576.00', '699.00', 'Fixing', 0, 0, '0', '0'),
(6, 8, 'Acer', '1234', 'e15New', 'Pouch', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '200.00', '306.00', '506.00', 'Booked', 0, 0, '0', '0'),
(7, 12, 'Asande', '112334343', 'e15', 'Charger', 'Nzuzo', 'dbhjvxhjcsxhcgsygc;jxnjcbhsxz', '123.00', '1077.00', '1200.00', 'Booked', 0, 0, '0', '0'),
(8, 18, 'dvbdhid', '122.34.57.89', 'fddddd', 'dfsd', 'Nzuzo', 'cukssgdisdsvcbhioclkhkldx', '123.00', '77.00', '200.00', 'Done', 0, 1, '0', '0'),
(9, 1, 'HP', 'trd72757rf3', 'dcbjkkdbkclsa', 'sgcudskgkuj', 'Nzuzo', 'gukhsfdhfilkjdlfol', '1212.00', '7691.00', '8903.00', 'Done', 0, 2, '0', '0'),
(10, 19, 'Samsung', '123.46.78.90', 'jfnvklfnbklfd', 'sdsvblkfndl;c', 'Nzuzo', 'vlflluigiohvviugkjhiolk', '132.00', '4089.00', '4221.00', 'Booked', 0, 1, '0', '0'),
(11, 19, 'Samsung', '123.46.78.90', 'jfnvklfnbklfd', 'sdsvblkfndl;c', 'Nzuzo', 'vlflluigiohvviugkjhiolk', '132.00', '4089.00', '4221.00', 'Booked', 0, 1, '0', '0'),
(12, 19, 'Samsung', '123.46.78.90', 'jfnvklfnbklfd', 'sdsvblkfndl;c', 'Nzuzo', 'vlflluigiohvviugkjhiolk', '132.00', '4089.00', '4221.00', 'Booked', 0, 1, '0', '0'),
(13, 19, 'Samsung', '123.46.78.90', 'jfnvklfnbklfd', 'sdsvblkfndl;c', 'Nzuzo', 'vlflluigiohvviugkjhiolk', '132.00', '4089.00', '4221.00', 'Booked', 0, 1, 'BKN-28792253', 'JQT-3062803'),
(14, 14, 'gsdujk', 'jbdjkfkj', 'u7', 'Washington', 'Nzuzo', 'vvbjcbnchjbsjknkckls', '1889.00', '7001.00', '8890.00', 'Booked', 0, 1, '', 'JQT-96732230'),
(15, 15, 'gsdujk', 'jbdjkfkj', 'jwbscsbjckl', 'bcuskn', 'Nzuzo', 'vcxkjhckhs;lhclkjvjkcvscj,kbcklh.cj', '334.00', '90.00', '424.00', 'Booked', 0, 1, '', 'JQT-2333956'),
(16, 2, 'HP', '55884102', 'e3', '4706', 'Nzuzo', 'ckc,hjjfghxfchjhcfgxtrfhkbjycctgh', '677.00', '223.00', '900.00', 'Done', 0, 2, '', 'JQT-0842300'),
(17, 2, 'HP', '55884102', 'e3', '4706', 'Nzuzo', 'ckc,hjjfghxfchjhcfgxtrfhkbjycctgh', '677.00', '223.00', '900.00', 'Done', 0, 2, '', 'JQT-600207'),
(18, 2, 'HP', '55884102', 'e3', '4706', 'Nzuzo', 'ckc,hjjfghxfchjhcfgxtrfhkbjycctgh', '677.00', '223.00', '900.00', 'Done', 0, 2, '', 'JQT-600207');

-- --------------------------------------------------------

--
-- Table structure for table `repairmaterial`
--

CREATE TABLE `repairmaterial` (
  `materialid` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `description` varchar(128) NOT NULL,
  `dateRecieved` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairsale`
--

CREATE TABLE `repairsale` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serialnumber` varchar(255) DEFAULT NULL,
  `recievedate` varchar(255) DEFAULT NULL,
  `amount` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairtool`
--

CREATE TABLE `repairtool` (
  `repairid` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `description` varchar(128) NOT NULL,
  `dateRecieved` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `message` varchar(160) NOT NULL,
  `rate` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `prod_id`, `user`, `name`, `message`, `rate`, `date`, `seen`, `archive`) VALUES
(1, 24, 0, 'Nzuzo', 'Hello', 0, '2017-05-10 22:22:18', 1, 0),
(2, 19, 0, 'Me', 'This doesn\'t make sense', 0, '2017-05-26 21:37:55', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `norm_hours` int(11) NOT NULL,
  `extra_hours` int(11) NOT NULL,
  `hourly_pay` decimal(7,2) NOT NULL,
  `bonus_id` int(11) NOT NULL,
  `deduct_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `norm_hours`, `extra_hours`, `hourly_pay`, `bonus_id`, `deduct_id`) VALUES
(1, 3, 41, 1, '56.00', 1, 1),
(2, 2, 41, 1, '61.00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `invoice_num` varchar(100) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `change` decimal(7,2) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `description`) VALUES
(1, 'Pending', ''),
(2, 'Booked', ''),
(3, 'Fixing', ''),
(4, 'Done', '');

-- --------------------------------------------------------

--
-- Table structure for table `stork`
--

CREATE TABLE `stork` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `QuantityOnHand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stork`
--

INSERT INTO `stork` (`id`, `category`, `productName`, `QuantityOnHand`) VALUES
(1, 'Cellphone', 'BBB', 0),
(2, 'Desktop', 'gfdstrge', 0),
(3, 'Desktop', 'AAA', 0),
(4, 'Cellphone', 'gfd', 0),
(5, 'Cellphone', 'Landline', 0),
(6, 'Desktop', 'gfds', 0),
(7, 'Laptop', 'Dell', 0),
(8, '', 'Dell', 0),
(9, '', 'Hp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suburb`
--

CREATE TABLE `suburb` (
  `id` int(11) NOT NULL,
  `suburbName` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suburb`
--

INSERT INTO `suburb` (`id`, `suburbName`) VALUES
(1, '\r\n'),
(2, 'Addington Beach\r\n'),
(3, 'Addison Park\r\n'),
(4, 'Albany Grove\r\n'),
(5, 'Albersville\r\n'),
(6, 'Alton\r\n'),
(7, 'Amajuba Park\r\n'),
(8, 'Amanzimtoti\r\n'),
(9, 'Amber Valley\r\n'),
(10, 'Amiel Park\r\n'),
(11, 'Anerley\r\n'),
(12, 'Arbor Park\r\n'),
(13, 'Arboretum\r\n'),
(14, 'Ashley\r\n'),
(15, 'Asoka\r\n'),
(16, 'Athlone Park\r\n'),
(17, 'Atholl Heights\r\n'),
(18, 'Austerville\r\n'),
(19, 'Aviary Hill\r\n'),
(20, 'Avoca\r\n'),
(21, 'Balito\r\n'),
(22, 'Barry Hertzog Park\r\n'),
(23, 'Bayhead\r\n'),
(24, 'Bayview\r\n'),
(25, 'Beachwood\r\n'),
(26, 'Bellair\r\n'),
(27, 'Belvedere\r\n'),
(28, 'Berea West\r\n'),
(29, 'Bergville\r\n'),
(30, 'Berkshire Downs\r\n'),
(31, 'Bhekuzulu\r\n'),
(32, 'Bhongwen\r\n'),
(33, 'Birdswood\r\n'),
(34, 'Bisley\r\n'),
(35, 'Blackburn\r\n'),
(36, 'Blackridge\r\n'),
(37, 'Bombay Heights\r\n'),
(38, 'Boughton\r\n'),
(39, 'Briardene\r\n'),
(40, 'Bridge City\r\n'),
(41, 'Brighton Beach\r\n'),
(42, 'Broadway\r\n'),
(43, 'Buena Vista\r\n'),
(44, 'Buffelsdraai\r\n'),
(45, 'Burlington Heights\r\n'),
(46, 'Camperdown\r\n'),
(47, 'Canelands\r\n'),
(48, 'Carrington Heights\r\n'),
(49, 'Carsdale\r\n'),
(50, 'Casuarina\r\n'),
(51, 'Cato Manor\r\n'),
(52, 'Cato Ridge\r\n'),
(53, 'Caversham Glen\r\n'),
(54, 'Chase Valley\r\n'),
(55, 'Chase Valley Downs\r\n'),
(56, 'Chasedene\r\n'),
(57, 'Chatsworth\r\n'),
(58, 'Chelmsfordville\r\n'),
(59, 'Chesterville\r\n'),
(60, 'Chiltern Hills\r\n'),
(61, 'Clairwood\r\n'),
(62, 'Clansthal\r\n'),
(63, 'Clare Hills\r\n'),
(64, 'Clarendon\r\n'),
(65, 'Claridge\r\n'),
(66, 'Cleland\r\n'),
(67, 'Clermont\r\n'),
(68, 'Clifton Park\r\n'),
(69, 'Colenso\r\n'),
(70, 'Congella\r\n'),
(71, 'Craigieburn\r\n'),
(72, 'Craigside\r\n'),
(73, 'Creighton\r\n'),
(74, 'Dairy Beach\r\n'),
(75, 'Dambuza\r\n'),
(76, 'Dassenhoek\r\n'),
(77, 'Dawn Crest\r\n'),
(78, 'Dawncliffe\r\n'),
(79, 'Desainagar\r\n'),
(80, 'Doc Wilson Point\r\n'),
(81, 'Doon Heights\r\n'),
(82, 'Doonside\r\n'),
(83, 'Dredger Harbour\r\n'),
(84, 'Drummond\r\n'),
(85, 'Dundee\r\n'),
(86, 'Durban North\r\n'),
(87, 'Eastwood\r\n'),
(88, 'Edel Park\r\n'),
(89, 'Edendale\r\n'),
(90, 'Egerton\r\n'),
(91, 'Eikedal\r\n'),
(92, 'Elangeni\r\n'),
(93, 'Emachibini\r\n'),
(94, 'Emberton\r\n'),
(95, 'Emdumezulu\r\n'),
(96, 'Empangeni\r\n'),
(97, 'Empangeni Rail\r\n'),
(98, 'Entendeka\r\n'),
(99, 'Epworth\r\n'),
(100, 'Equarand\r\n'),
(101, 'Erasmus Dam\r\n'),
(102, 'Escombe\r\n'),
(103, 'Eshowe\r\n'),
(104, 'eSibongile\r\n'),
(105, 'Esperanza\r\n'),
(106, 'Essenwood\r\n'),
(107, 'Estcourt\r\n'),
(108, 'Everest Heights\r\n'),
(109, 'Everton\r\n'),
(110, 'Fairleigh\r\n'),
(111, 'Farningham Ridge\r\n'),
(112, 'Felixton\r\n'),
(113, 'Fernwood\r\n'),
(114, 'Forest Hills\r\n'),
(115, 'Freeland Park\r\n'),
(116, 'Frere\r\n'),
(117, 'Fynnland\r\n'),
(118, 'Gandhinagar\r\n'),
(119, 'Ghandi Park\r\n'),
(120, 'Gillitts\r\n'),
(121, 'Gingindlovu\r\n'),
(122, 'Gledhow\r\n'),
(123, 'Glen Anil\r\n'),
(124, 'Glen Ashley\r\n'),
(125, 'Glencoe\r\n'),
(126, 'Glenwood\r\n'),
(127, 'Golokodo\r\n'),
(128, 'Golomi\r\n'),
(129, 'Grangertown\r\n'),
(130, 'Grantham Park\r\n'),
(131, 'Grayleigh\r\n'),
(132, 'Greendale Park\r\n'),
(133, 'Greenhill\r\n'),
(134, 'Greenwood Park\r\n'),
(135, 'Greytown\r\n'),
(136, 'Grosvenor\r\n'),
(137, 'Hambanati\r\n'),
(138, 'Hammarsdale\r\n'),
(139, 'Hayfields\r\n'),
(140, 'Hazelmere\r\n'),
(141, 'Hibberdene\r\n'),
(142, 'Hillary\r\n'),
(143, 'Hillcrest Park\r\n'),
(144, 'Hilldene\r\n'),
(145, 'Hillgrove\r\n'),
(146, 'Hilltop Camp\r\n'),
(147, 'Hilton\r\n'),
(148, 'Hilton Gardens\r\n'),
(149, 'Himeville\r\n'),
(150, 'Hippo Road\r\n'),
(151, 'Howick\r\n'),
(152, 'Howick West\r\n'),
(153, 'Hutten Heights\r\n'),
(154, 'Hyde Park\r\n'),
(155, 'Illovo Beach\r\n'),
(156, 'iMbali\r\n'),
(157, 'Inchanga\r\n'),
(158, 'Inchanga Park\r\n'),
(159, 'Isipingo\r\n'),
(160, 'Isipingo Beach\r\n'),
(161, 'Isipingo Rail\r\n'),
(162, 'Island View\r\n'),
(163, 'Ixopo\r\n'),
(164, 'Jacobs\r\n'),
(165, 'Jozini\r\n'),
(166, 'Karridene\r\n'),
(167, 'Kelso\r\n'),
(168, 'Kennedy Road\r\n'),
(169, 'Kenville\r\n'),
(170, 'Kharwastan\r\n'),
(171, 'Klaarwater\r\n'),
(172, 'Kokstad\r\n'),
(173, 'Kranskop\r\n'),
(174, 'Kuleka\r\n'),
(175, 'KwaDabeka\r\n'),
(176, 'KwaDukuza\r\n'),
(177, 'KwaMakhutha\r\n'),
(178, 'KwaMashu\r\n'),
(179, 'Kwamathukuza\r\n'),
(180, 'KwaMevana\r\n'),
(181, 'KwaNdengezi\r\n'),
(182, 'Kwasheleni Viewpoint\r\n'),
(183, 'La Lucia\r\n'),
(184, 'La Mercy\r\n'),
(185, 'Ladysmith\r\n'),
(186, 'Lamont\r\n'),
(187, 'Langeni\r\n'),
(188, 'Lennoxton\r\n'),
(189, 'Lenville\r\n'),
(190, 'Leonard\r\n'),
(191, 'Leonardsville\r\n'),
(192, 'Lincoln Meade\r\n'),
(193, 'Lindley\r\n'),
(194, 'Lotusville\r\n'),
(195, 'Louwsburg\r\n'),
(196, 'Lynnfield Park\r\n'),
(197, 'Magabeni\r\n'),
(198, 'Maidstone\r\n'),
(199, 'Malukazi\r\n'),
(200, 'Mandini\r\n'),
(201, 'Manor\r\n'),
(202, 'Manors\r\n'),
(203, 'Marburg\r\n'),
(204, 'Margate\r\n'),
(205, 'Mariann\r\n'),
(206, 'Mariannhill\r\n'),
(207, 'Marina Beach\r\n'),
(208, 'Marmic\r\n'),
(209, 'Mbango\r\n'),
(210, 'Meadow Brook\r\n'),
(211, 'Meadows\r\n'),
(212, 'Meer en See\r\n'),
(213, 'Memorial Gate\r\n'),
(214, 'Merebank\r\n'),
(215, 'Merewent\r\n'),
(216, 'Merrivale\r\n'),
(217, 'Merrivale Heights\r\n'),
(218, 'Mkondeni\r\n'),
(219, 'Mobeni East\r\n'),
(220, 'Mobeni Heights\r\n'),
(221, 'Mobeni West\r\n'),
(222, 'Montclair\r\n'),
(223, 'Monteseel\r\n'),
(224, 'Montford\r\n'),
(225, 'Montrose\r\n'),
(226, 'Mooirivier\r\n'),
(227, 'Moorton\r\n'),
(228, 'Mophela\r\n'),
(229, 'Moseley\r\n'),
(230, 'Moseley Park\r\n'),
(231, 'Motalabad\r\n'),
(232, 'Mount Edgecombe\r\n'),
(233, 'Mount Moreland\r\n'),
(234, 'Mount Richmore\r\n'),
(235, 'Mount Vernon\r\n'),
(236, 'Mountain Home\r\n'),
(237, 'Mountain Rise\r\n'),
(238, 'Mpangele\r\n'),
(239, 'Mphafa Hide\r\n'),
(240, 'Mt. Vernon\r\n'),
(241, 'Mtubatuba\r\n'),
(242, 'Mtunzini\r\n'),
(243, 'Mtwalume\r\n'),
(244, 'Musgrave\r\n'),
(245, 'Naidooville\r\n'),
(246, 'Napierville\r\n'),
(247, 'Ncandu Park\r\n'),
(248, 'New Beach\r\n'),
(249, 'New Dawn Park\r\n'),
(250, 'New Germany\r\n'),
(251, 'New Rail\r\n'),
(252, 'Newcastle\r\n'),
(253, 'Newcastle CBD\r\n'),
(254, 'Newcastle Central\r\n'),
(255, 'North Beach\r\n'),
(256, 'North Sand Bluff\r\n'),
(257, 'North Shepstone\r\n'),
(258, 'Northdale\r\n'),
(259, 'Northern Park\r\n'),
(260, 'Nqutu Park\r\n'),
(261, 'Nseleni\r\n'),
(262, 'Ntshondwe Camp\r\n'),
(263, 'Nxamalala\r\n'),
(264, 'Nyala Park\r\n'),
(265, 'Oak Park\r\n'),
(266, 'Observation Hill\r\n'),
(267, 'Ocean View\r\n'),
(268, 'Oribi\r\n'),
(269, 'Oribi Heights\r\n'),
(270, 'Oslo Beach\r\n'),
(271, 'Ottawa\r\n'),
(272, 'Overport\r\n'),
(273, 'Paddock\r\n'),
(274, 'Padfield Park\r\n'),
(275, 'Palm Beach\r\n'),
(276, 'Palmiet\r\n'),
(277, 'Paradise\r\n'),
(278, 'Park Hill\r\n'),
(279, 'Park Rynie\r\n'),
(280, 'Parlock\r\n'),
(281, 'Paulpietersburg\r\n'),
(282, 'Peacevale\r\n'),
(283, 'Pelham\r\n'),
(284, 'Pendale\r\n'),
(285, 'Pennington\r\n'),
(286, 'Pietermaritzburg\r\n'),
(287, 'Pinetown\r\n'),
(288, 'Pioneer Park\r\n'),
(289, 'Pongola\r\n'),
(290, 'Port Edward\r\n'),
(291, 'Port Shepstone\r\n'),
(292, 'Prestbury\r\n'),
(293, 'Prospect Hall\r\n'),
(294, 'Protea Park\r\n'),
(295, 'Puntans Hill\r\n'),
(296, 'Queensburgh\r\n'),
(297, 'Queensmead\r\n'),
(298, 'Raisethorpe\r\n'),
(299, 'Ramsgate\r\n'),
(300, 'Red Hill\r\n'),
(301, 'Reservoir Hills\r\n'),
(302, 'Richards Bay\r\n'),
(303, 'Richem\r\n'),
(304, 'Ridgeview\r\n'),
(305, 'Rietrivier\r\n'),
(306, 'Riverside\r\n'),
(307, 'Riyadh\r\n'),
(308, 'Roseneath\r\n'),
(309, 'Rossburgh\r\n'),
(310, 'Saiccor\r\n'),
(311, 'Salisbury Island\r\n'),
(312, 'Salmon Bay\r\n'),
(313, 'Salt Rock\r\n'),
(314, 'Sandfields\r\n'),
(315, 'Sarnia\r\n'),
(316, 'Schuinshoogte\r\n'),
(317, 'Scottburgh\r\n'),
(318, 'Scottburgh South\r\n'),
(319, 'Sea Park\r\n'),
(320, 'Sea View\r\n'),
(321, 'Sea-Cow Lake\r\n'),
(322, 'Shakaskraal\r\n'),
(323, 'Shallcross\r\n'),
(324, 'Sheffield Beach\r\n'),
(325, 'Shelly Beach\r\n'),
(326, 'Shembes Village\r\n'),
(327, 'Shulton Park\r\n'),
(328, 'Signal Hill\r\n'),
(329, 'Silverglen\r\n'),
(330, 'Sobantu\r\n'),
(331, 'South Beach\r\n'),
(332, 'Southbroom\r\n'),
(333, 'Southport\r\n'),
(334, 'Sparks\r\n'),
(335, 'St Winifreds\r\n'),
(336, 'St. Helier\r\n'),
(337, 'St. Lucia\r\n'),
(338, 'St. Wendolins\r\n'),
(339, 'Stamford Hill\r\n'),
(340, 'Stanger Heights\r\n'),
(341, 'Stanger Manor\r\n'),
(342, 'Stanmore\r\n'),
(343, 'Stratton-on-Sea\r\n'),
(344, 'Sunningdale\r\n'),
(345, 'Sunny Ridge\r\n'),
(346, 'Sunset View\r\n'),
(347, 'Sunwich Port\r\n'),
(348, 'Sury Aville\r\n'),
(349, 'Temple Valley\r\n'),
(350, 'The Grange\r\n'),
(351, 'Thembalihle\r\n'),
(352, 'Thornville\r\n'),
(353, 'Thornwood\r\n'),
(354, 'Tongaat\r\n'),
(355, 'Tongaat South\r\n'),
(356, 'Town Bush Valley\r\n'),
(357, 'Town Hill\r\n'),
(358, 'Townview\r\n'),
(359, 'Treasure Beach\r\n'),
(360, 'Umbango\r\n'),
(361, 'Umbilo\r\n'),
(362, 'Umbogintwini\r\n'),
(363, 'Umdloti\r\n'),
(364, 'Umhlanga Rocks\r\n'),
(365, 'Umhlatuzana\r\n'),
(366, 'Umkomaas\r\n'),
(367, 'Umkumbaan\r\n'),
(368, 'Umlazi\r\n'),
(369, 'Umtentweni\r\n'),
(370, 'Umzinto\r\n'),
(371, 'Underberg\r\n'),
(372, 'Utrecht\r\n'),
(373, 'Uvongo\r\n'),
(374, 'Valley View\r\n'),
(375, 'Verulam\r\n'),
(376, 'Village of Happiness\r\n'),
(377, 'Vlam\r\n'),
(378, 'Vryheid\r\n'),
(379, 'Warner Beach\r\n'),
(380, 'Wartburg\r\n'),
(381, 'Wasbank\r\n'),
(382, 'Washington Heights\r\n'),
(383, 'Waterfall\r\n'),
(384, 'Wedge Beach\r\n'),
(385, 'Weenen\r\n'),
(386, 'Wembley\r\n'),
(387, 'Wentworth\r\n'),
(388, 'Westbrook\r\n'),
(389, 'Westgate\r\n'),
(390, 'Westmead\r\n'),
(391, 'Westridge\r\n'),
(392, 'Westville\r\n'),
(393, 'Wewe\r\n'),
(394, 'Whetstone\r\n'),
(395, 'Whitfield Park\r\n'),
(396, 'Widenham\r\n'),
(397, 'Wiggins\r\n'),
(398, 'Willowton\r\n'),
(399, 'Winklespruit\r\n'),
(400, 'Winston Park\r\n'),
(401, 'Winterskloof\r\n'),
(402, 'Winterton\r\n'),
(403, 'Wood Grange\r\n'),
(404, 'Woodhaven\r\n'),
(405, 'Woodside\r\n'),
(406, 'Yellowwood Park\r\n'),
(407, 'Zenzele\r\n'),
(408, 'Zimbali\r\n'),
(409, 'Zinkwazi Beach\r\n'),
(410, 'Zondela\r\n'),
(411, 'Zulwini Gardens\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `supp_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `product`, `contactNumber`, `email`, `website`, `address`, `supp_code`) VALUES
(1, 'Microsoft', 'Microsoft Office 365', '1234567890', 'sales@microsoft.com', 'http://microsoft.com', 'Microsoft headquarters', ''),
(2, 'Game', '', '0822175681', 'game@mail.com', 'http://www.eve.con', '14 Frey Road 3610', 'SUP-9332030');

-- --------------------------------------------------------

--
-- Table structure for table `tech`
--

CREATE TABLE `tech` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech`
--

INSERT INTO `tech` (`id`, `tname`, `sname`) VALUES
(1, 'Luthos', 'SPA'),
(2, 'Simo', 'nqu'),
(3, 'Nzuzo', 'ndlo');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `speciality` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `name`, `surname`, `email`, `speciality`) VALUES
(1, 'Nzuzo', 'Ndlovu', 'jay@z.com3', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `techrepair`
--

CREATE TABLE `techrepair` (
  `id` int(11) NOT NULL,
  `diviceName` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `Dtype` varchar(255) NOT NULL,
  `recievedDate` varchar(255) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `tname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techrepair`
--

INSERT INTO `techrepair` (`id`, `diviceName`, `model`, `serialNumber`, `Dtype`, `recievedDate`, `amount`, `tname`) VALUES
(14, 'hewui', 'mobile', 'Young123', 'Hardware', '2017-06-12', '100.00', 'Luthos'),
(15, 'LMOVO', 'mobile', 'Dell989', 'Hardware', '2017-06-12', '1324.00', 'Nzuzo'),
(16, 'Dell', 'mobile', 'Dell989', 'Software', '2017-04-25', '500.00', 'Luthos'),
(17, 'sumsung young 2', 'mobile', 'Young123', 'Hardware', '2017-06-12', '500.00', 'Nzuzo'),
(21, 'iBook', 'Laptop', 'Iphon80', 'Hardware', '2017-06-12', '780.00', 'Luthos'),
(22, 'sumsung young 2', 'mobile', 'su2', 'Hardware', '2017-03-14', '478.00', 'Simo'),
(24, 'LMOVO', 'mobile', 'Young123', 'Software', '2017-06-12', '500.00', 'Luthos');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `cell` varchar(12) NOT NULL,
  `idnumber` varchar(13) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` varchar(10) NOT NULL,
  `blocked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `cell`, `idnumber`, `location`, `email`, `password`, `role`, `blocked`) VALUES
(1, 'Nzuzo', 'Ndlovu', '0795333568', '0', 'Empangeni, KwaZulu-Natal, South Africa', 'jay@z.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', 0),
(2, 'ebra', 'zilika', '02302302', '2147483647', '', 'cloude@gmail.com', '4a300d3a0ae99b58b0dfcd3fde526bf5', '', 0),
(3, 'AAA', 'BBB', '1234567890', '1234569875', '', 'jay@z.com1', 'c4ca4238a0b923820dcc509a6f75849b', 'technician', 0),
(4, 'Nzuzo', 'Ndlovu', '795333568', '2147483647', 'Empangeni, KwaZulu-Natal, South Africa', 'jay@z.com2', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(5, 'Nzuzo', 'Ndlovu', '795333568', '9503225945082', 'Empangeni, KwaZulu-Natal, South Africa', 'jay@z.com3', 'c4ca4238a0b923820dcc509a6f75849b', 'technician', 0),
(6, 'Mandiso', 'Ngwenya', '0822175681', '1234', 'Durban', 'M@MAIL.COM', 'c4ca4238a0b923820dcc509a6f75849b', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `page` varchar(30) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `countryCode` varchar(20) NOT NULL,
  `country` varchar(25) NOT NULL,
  `regionName` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `zip` int(11) NOT NULL,
  `isp` varchar(25) NOT NULL,
  `org` varchar(25) NOT NULL,
  `as1` varchar(25) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lon` varchar(30) NOT NULL,
  `timezone` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `page`, `ip`, `countryCode`, `country`, `regionName`, `city`, `zip`, `isp`, `org`, `as1`, `lat`, `lon`, `timezone`, `date`) VALUES
(1, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-07 14:28:02'),
(2, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-07 14:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `wallpaper`
--

CREATE TABLE `wallpaper` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pic_url` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallpaper`
--

INSERT INTO `wallpaper` (`id`, `name`, `pic_url`) VALUES
(1, 'a', 'a'),
(2, 'a', 'a'),
(3, 'a', 'a'),
(4, 'a', 'a'),
(5, 'a', 'a'),
(6, 'a', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custdelivery`
--
ALTER TABLE `custdelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customersaledevice`
--
ALTER TABLE `customersaledevice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custsaleprod`
--
ALTER TABLE `custsaleprod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverdelivery`
--
ALTER TABLE `driverdelivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driverID` (`driverID`),
  ADD KEY `deliveryID` (`deliveryID`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `driver_loc`
--
ALTER TABLE `driver_loc`
  ADD PRIMARY KEY (`gen_code`),
  ADD UNIQUE KEY `gen_code` (`gen_code`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`m_ID`),
  ADD UNIQUE KEY `m_Name` (`m_Name`),
  ADD KEY `m_Name_2` (`m_Name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairmaterial`
--
ALTER TABLE `repairmaterial`
  ADD PRIMARY KEY (`materialid`);

--
-- Indexes for table `repairsale`
--
ALTER TABLE `repairsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairtool`
--
ALTER TABLE `repairtool`
  ADD PRIMARY KEY (`repairid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stork`
--
ALTER TABLE `stork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suburb`
--
ALTER TABLE `suburb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech`
--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techrepair`
--
ALTER TABLE `techrepair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `custdelivery`
--
ALTER TABLE `custdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customersaledevice`
--
ALTER TABLE `customersaledevice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custsaleprod`
--
ALTER TABLE `custsaleprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driverdelivery`
--
ALTER TABLE `driverdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `repairmaterial`
--
ALTER TABLE `repairmaterial`
  MODIFY `materialid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repairsale`
--
ALTER TABLE `repairsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repairtool`
--
ALTER TABLE `repairtool`
  MODIFY `repairid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stork`
--
ALTER TABLE `stork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suburb`
--
ALTER TABLE `suburb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tech`
--
ALTER TABLE `tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `techrepair`
--
ALTER TABLE `techrepair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
