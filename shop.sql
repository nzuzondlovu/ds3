-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 10:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 4, 'fff', '121212121', 'fds', 'efsd', 'feds', 1212, '2017-09-03 00:00:00', '2017-09-20 00:00:00', 1);

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
(3, 'Samsung', 'Sese', '0822175681', '2344444', 'mandiso04@yahoo.co');

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
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user`, `name`, `serial`, `type`, `pic_url`, `description`, `description2`, `date_in`, `status`, `technician`, `date_out`, `date`, `archive`) VALUES
(1, 2, 'HP', 'trd72757rf3', 'Laptop', '', 'It works fine', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-02 20:27:45', 0),
(2, 2, 'HP', '55884102', 'Desktop', '', 'I am not sure', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-02 21:27:45', 0),
(3, 2, 'SGH09000', '6936', 'Cellphone', '', 'THE  device ios crazyyyyy', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-04-03 11:24:17', 0),
(4, 3, 'yttgtrbvfd', '852tffc', 'Desktop', 'FB_IMG_14808153292160947.jpg', 'rthbfd tfv', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-05-07 21:15:04', 1),
(5, 5, 'Admin', '555ddd5d', 'Desktop', 'FB_IMG_14807106345083239.jpg', 'fgh', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-05-10 10:45:23', 0),
(6, 1, 'HP', 'Hs121', 'Laptop', 'nature_mountain_eagle_fog_landscape_ultrahd_4k_wal', 'hhhhhb fvv ffb', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-09-07 12:18:00', 1),
(7, 1, 'lenovo', '2542525dfv', 'Desktop', 'Sunset_at_Tiergarten_UHD.jpg', 'dede fgfb', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '2017-09-07 12:41:56', 1),
(8, 1, 'Acer', '1234', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'wwwrtwr', '', '2017-09-20 12:48:36', '', '', '2017-09-20 12:48:36', '2017-09-20 12:48:36', 0),
(9, 1, 'test', '1234', 'Desktop', 'IMG-20170612-WA0029 - Copy.jpg', 'ugudugfwelh', '', '2017-09-20 12:50:04', '', '', '2017-09-20 12:50:04', '2017-09-20 12:50:04', 0),
(10, 1, 'Sasadatr', '112334343', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'bewhfkbbbbbbwwqw', '', '2017-09-21 12:26:08', '', '', '2017-09-21 12:26:08', '2017-09-30 00:00:00', 0),
(11, 1, 'Sasadatr', '112334343', 'Cellphone', 'IMG-20170612-WA0027 - Copy.jpg', 'bewhfkbbbbbbwwqw', '', '2017-09-21 12:26:08', '', '', '2017-09-21 12:26:08', '2017-09-30 00:00:00', 0),
(12, 1, 'Asande', '112334343', 'wola lapho', 'IMG_20140924_202358.jpg', 'jkfgdsgxkxklhnjkcdx', '', '2017-09-21 12:28:11', '', '', '2017-09-21 12:28:11', '2017-10-06 00:00:00', 0),
(13, 1, 'Mak Pub', '1243275783788493', 'Hardrive', 'IMG_20140924_230113.jpg', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '', '2017-09-25 14:57:22', '', '', '2017-09-25 14:57:22', '2017-11-10 00:00:00', 0);

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
  `barcode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user`, `name`, `description`, `type`, `price`, `promo_price`, `pic_url`, `date`, `promo_date1`, `promo_date2`, `archive`, `onhand_qty`, `qty`, `qty_sold`, `supplier`, `brandname`, `oPrice`, `profit`, `brand_name`, `generic_name`, `supplierID`, `order_price`, `barcode`) VALUES
(1, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '1259.00', 'a', '2017-04-02 21:43:30', '2017-12-19 00:00:00', '2018-10-20 00:00:00', 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '34542.00', 'a', '2017-04-02 21:43:30', '2017-12-12 00:00:00', '2019-12-12 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 0, 'Hp', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '3500.00', '0.00', 'a', '2017-04-02 21:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 0, 'Dell', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '7500.00', '7300.00', 'a', '2017-04-02 21:43:30', '2017-04-28 00:00:00', '2017-04-30 00:00:00', 0, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 'Dell', 'A good device i5', 'Laptop', '3300.00', '2010.00', '', '2017-04-02 22:04:22', '2017-12-12 00:00:00', '2019-12-12 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 'gfds', 'a', 'Desktop', '5252.00', '0.00', '', '2017-05-04 10:56:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 'Landline', 'Old school', 'Cellphone', '300.00', '0.00', '1FB_IMG_14797886111325064.jpg', '2017-05-07 20:38:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 'Landline', 'Old school', 'Cellphone', '300.00', '0.00', '1FB_IMG_14797886111325064.jpg', '2017-05-07 20:39:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 'gfd', 'hello', 'Cellphone', '500.00', '0.00', 'FB_IMG_14807740054992457.jpg', '2017-05-07 20:57:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 'AAA', 'fgh', 'Desktop', '401.00', '123.00', 'FB_IMG_14794968922419420.jpg', '2017-05-07 20:58:59', '2017-10-19 00:00:00', '2017-10-20 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 'gfdstrge', 'gthfejd', 'Desktop', '852.00', '0.00', 'FB_IMG_14818444791488686.jpg', '2017-05-07 21:00:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 'BBB', 'fgh', 'Cellphone', '500.00', '34353.00', 'FB_IMG_14794968780497765.jpg', '2017-05-10 10:44:14', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 'e15', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '', '1000.00', '2121.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:17:01', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 999, 8, NULL, 'Microsoft', 'Acer', '1', '999', NULL, NULL, NULL, NULL, NULL),
(30, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:19:40', '2017-09-20 12:19:40', '2017-09-20 12:19:40', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL),
(31, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '22.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:20:43', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL),
(32, 1, 'j1', 'testetetetet', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0027 - Copy.jpg', '2017-09-20 12:20:43', '2017-09-20 12:20:43', '2017-09-20 12:20:43', 0, 23, 5, NULL, 'Microsoft', 'Samsung', '100', '23', NULL, NULL, NULL, NULL, NULL),
(33, 1, 's8', 'tetdyfue;hdvkllkrgkjuieyfgyiajs', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0028.jpg', '2017-09-20 12:21:43', '2017-09-20 12:21:43', '2017-09-20 12:21:43', 0, 58, 34, NULL, 'Microsoft', 'Samsung', '65', '58', NULL, NULL, NULL, NULL, NULL),
(34, 1, 's8', 'tetdyfue;hdvkllkrgkjuieyfgyiajs', 'Cellphone', '123.00', '0.00', 'IMG-20170612-WA0028.jpg', '2017-09-20 12:21:43', '2017-09-20 12:21:43', '2017-09-20 12:21:43', 0, 58, 34, NULL, 'Microsoft', 'Samsung', '65', '58', NULL, NULL, NULL, NULL, NULL),
(35, 1, 'iPhone8', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Cellphone', '50000.00', '0.00', 'IMG-20170612-WA0029 - Copy.jpg', '2017-09-20 12:22:38', '2017-09-20 12:22:38', '2017-09-20 12:22:38', 1, 49922, 54, NULL, 'Microsoft', 'Apple', '78', '49922', NULL, NULL, NULL, NULL, NULL),
(36, 1, 'iPhone8', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Cellphone', '50000.00', '10000.00', 'IMG-20170612-WA0029 - Copy.jpg', '2017-09-20 12:22:38', '2017-12-12 00:00:00', '2018-12-12 00:00:00', 0, 49922, 54, NULL, 'Microsoft', 'Apple', '78', '49922', NULL, NULL, NULL, NULL, NULL);

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
(4, 1, 'jay@z.com', 'Nzuzo', 'Hwelelklchvjkbdhjcbjnxjkbshvkhs', 'unanswered', ' ');

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
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `booking_id`, `name`, `serial`, `model`, `accessory`, `technician`, `description`, `deposit`, `balance`, `total`, `status`, `archive`) VALUES
(1, 5, 'Admin', '555ddd5d', 'rtgfd', 'tgfdv', 'Nzuzo', 'gfd', '500.00', '600.00', '100.00', 'Fixing', 0),
(2, 6, 'HP', 'Hs121', 'hd344', 'none', 'Nzuzo', 'hrhrhh eiievj jrjdj', '200.00', '3500.00', '5222.00', 'Pending', 1),
(3, 4, 'yttgtrbvfd', '852tffc', 'hh', 'dd', 'Nzuzo', 'ffgv gvbgnhg gfv', '652.00', '52.00', '66.00', 'Pending', 0),
(4, 10, 'Sasadatr', '112334343', 'e15Mandiso', 'chacha', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '123.00', '576.00', '699.00', 'Fixing', 0),
(5, 10, 'Sasadatr', '112334343', 'e15Mandiso', 'chacha', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '123.00', '576.00', '699.00', 'Fixing', 0),
(6, 8, 'Acer', '1234', 'e15New', 'Pouch', 'Nzuzo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '200.00', '306.00', '506.00', 'Booked', 0),
(7, 12, 'Asande', '112334343', 'e15', 'Charger', 'Nzuzo', 'dbhjvxhjcsxhcgsygc;jxnjcbhsxz', '123.00', '1077.00', '1200.00', 'Booked', 0);

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
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `product`, `contactNumber`, `email`, `website`, `address`) VALUES
(1, 'Microsoft', 'Microsoft Office 365', '1234567890', 'sales@microsoft.com', 'http://microsoft.com', 'Microsoft headquarters');

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
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customersaledevice`
--
ALTER TABLE `customersaledevice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
