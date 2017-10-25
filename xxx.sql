-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2017 at 12:31 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silvezyz_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `adID` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `strAddress` varchar(20) NOT NULL,
  `suburb` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `AreaCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(124, 'Vryheid', 3100);

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
(1, 2, '15900.00', '3457.00'),
(2, 4, '21600.00', '2000.00'),
(3, 1, '26400.00', '3500.00'),
(4, 15, '3360.00', '0.00'),
(5, 8, '10200.00', '0.00'),
(6, 20, '26325.00', '0.00');

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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `description`, `dateCreated`, `archive`) VALUES
(1, 'Cellphone', 'Hardware', 'All Mobile Telephone Devices Fall Under This Section', '2017-10-09 22:56:17', 0),
(2, 'Laptop', 'Hardware', 'All Laptops/Portable Computers Fall Under This Section', '2017-10-09 22:57:06', 0),
(3, 'Desktop', 'Hardware', 'All Desktop Comuters fall into this Catagory', '2017-10-09 22:58:50', 0),
(4, 'Hardrive', 'Hardware', 'All Hardrive devices Fall into this section', '2017-10-09 22:59:54', 0),
(5, 'Operating System', 'Software', 'All Operating System Software Products Fall into this Section', '2017-10-09 23:00:49', 0),
(6, 'Television', 'Hardware', 'All Television Devices Fall into this Section', '2017-10-09 23:01:59', 0),
(7, 'Tablet', 'Hardware', 'All Tablet phones fall into this section', '2017-10-09 23:17:08', 0),
(8, 'Microwave', 'Hardware', 'All Electronic Microwave Devices fall into this Section', '2017-10-09 23:18:40', 0),
(9, 'Antivirus', 'Software', 'All Antivirus Software Tools fall into this Section', '2017-10-09 23:19:26', 0);

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
  `deliveryID` int(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custdelivery`
--

INSERT INTO `custdelivery` (`id`, `custId`, `custname`, `custcell`, `strAddress`, `suburb`, `area`, `boxcode`, `dateofRequest`, `dateofDelivery`, `deliveryID`, `status`) VALUES
(1, 6, 'Ebrahim', '0610334843', '6 Starling Cresent ,Nyala Park', 'BERKSHIRE', 'PINETOWN\r\n', 3604, '2017-09-04 00:00:00', '2017-09-11 00:00:00', 6, 'allocated'),
(2, 16, 'Nosipho', '0867654321', '30 Adrienne Avenue ', 'Gateway', 'Umhlanga', 4019, '2017-06-24 10:16:17', '2017-06-28 10:16:17', 5, 'allocated'),
(3, 16, 'Nosipho', '0867654321', '30 Adrienne Avenue', 'Gateway', 'Umhlanga', 4019, '2017-10-19 00:00:00', '2017-10-26 11:44:19', 7, 'pending'),
(4, 17, 'Fazila', '0610445800', '23 Sauter Drive', 'Marianhill Park', 'Pinetown', 3610, '2017-09-19 00:00:00', '2017-09-29 11:44:19', 8, 'pending');

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
  `establishAmount` decimal(18,2) NOT NULL,
  `Cname` varchar(50) NOT NULL,
  `idNo` varchar(20) NOT NULL,
  `num` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `job_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customersaledevice`
--

INSERT INTO `customersaledevice` (`id`, `diviceName`, `model`, `serialNumber`, `Dtype`, `recievedDate`, `establishAmount`, `Cname`, `idNo`, `num`, `email`, `job_code`) VALUES
(2, 'Apple', 'iPhone4s', '1296490', 'Hardware', '2017/10/27', '1234.00', 'Sandiso', '9606030405869', '08284699741', 'mail@mail.com', 'BKN-37038333');

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

--
-- Dumping data for table `custsaleprod`
--

INSERT INTO `custsaleprod` (`id`, `prodname`, `barcode`, `qty`, `price`, `discount`, `total_price`, `invoice_num`) VALUES
(1, 'Apple iPhone6s', 'PRD-2345', 2, '16799.00', 0, '33598.00', 'RS-2298233'),
(2, 'Samsung Samg-Exp-HDD', 'PRD-29020', 1, '654.00', 0, '654.00', 'RS-2298233'),
(3, 'Apple iPhone4s', 'PRD-060333', 56, '3500.00', 0, '99999.99', 'RS-2202493'),
(4, 'Hewlet Parkade Pavillion', 'PRD-40273', 568, '12000.00', 0, '99999.99', 'RS-2202493'),
(5, 'Apple iPhone6s', 'PRD-2345', 677, '16799.00', 0, '99999.99', 'RS-2202493'),
(6, 'Apple iPhone4s', 'PRD-060333', 4, '3500.00', 0, '14000.00', 'RS-220530'),
(7, 'Hewlet Parkade Pavillion', 'PRD-40273', 2, '12000.00', 0, '24000.00', 'RS-02226'),
(8, 'Apple iPad Pro', 'PRD-2203262', 1, '10000.00', 0, '10000.00', 'RS-02226'),
(9, 'Apple iPhone6s', 'PRD-2345', 5, '16799.00', 0, '83995.00', 'RS-2332030'),
(10, 'Samsung Micro436', 'PRD-0242283', 11, '456.00', 0, '5016.00', 'RS-2332030'),
(11, 'Samsung Micro436', 'PRD-0242283', 4, '456.00', 0, '1824.00', 'RS-2332030'),
(12, 'Apple iPad Pro', 'PRD-2203262', 1, '10000.00', 0, '10000.00', 'RS-2200232'),
(13, 'Hewlet Parkade Pavillion', 'PRD-40273', 2, '12000.00', 0, '24000.00', 'RS-2200232'),
(14, 'Hewlet Parkade Pavillion', 'PRD-40273', 1, '12000.00', 0, '12000.00', 'RS-2200232');

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
(1, 2, '230.00', '24.00', '129.00'),
(2, 4, '1234.00', '245.00', '390.00'),
(3, 1, '2400.00', '13.00', '99999.99'),
(4, 15, '0.00', '0.00', '0.00'),
(5, 8, '0.00', '0.00', '0.00'),
(6, 20, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `driverdelivery`
--

CREATE TABLE `driverdelivery` (
  `id` int(11) NOT NULL,
  `driverID` varchar(20) NOT NULL,
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
(13, '9603065615084', 5, '2017-06-28', 'Nosipho', '0867654321', '30 Adrienne Avenue ,Gatewway , Umhlanga', '4019', 'Delivered'),
(12, '9511250402085', 6, '2017-09-11', 'Ebrahim', '0610334843', '6 Starling Cresent ,Nyala Park ,BERKSHIRE , PINETOWN', '3604', 'Delivered'),
(14, '9511250402085', 8, '2017-09-29', 'Fazila', '0610445800', '23 Sauter Drive ,Marianhill Park , Pinetown', '3610', 'OnRoad');

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
(1, 'Nokubonga', 'Nxumalo', '0722420083', '9511250402085', 'nxukzaza@gmail.com'),
(2, 'Alulutho', 'Spambo', '0721172942', '9504250402085', 'luthos@gmail.com');

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
('DLV-02033203', '3081 Hattingspruit', '9504250402085', 'January - 2017'),
('DLV-02425', '3081 Hattingspruit', '9504250402085', ''),
('DLV-203', '3610 Hillcrest', '9504250402085', 'Ferbuary - 2017'),
('DLV-2802', '3081 Hattingspruit', '9511250402085', 'June - 2017'),
('DLV-302605', '36102 Kloof', '9504250402085', 'Ferbuary - 2017'),
('DLV-330332', '3081 Hattingspruit', '9504250402085', 'Ferbuary - 2017'),
('DLV-3896205', '36102 Kloof', '9504250402085', ''),
('DLV-390232', '4126 Amanzimtoti', '9504250402085', 'September - 2017');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `rent` decimal(7,2) NOT NULL,
  `utility` decimal(7,2) NOT NULL,
  `insurance` decimal(7,2) NOT NULL,
  `fees` decimal(7,2) NOT NULL,
  `tax` decimal(7,2) NOT NULL,
  `interest` decimal(7,2) NOT NULL,
  `maintenance` decimal(7,2) NOT NULL,
  `travel` decimal(7,2) NOT NULL,
  `mande` decimal(7,2) NOT NULL,
  `training` decimal(7,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `rent`, `utility`, `insurance`, `fees`, `tax`, `interest`, `maintenance`, `travel`, `mande`, `training`, `date`) VALUES
(1, '15000.00', '6790.00', '2789.00', '3480.00', '7000.00', '8000.00', '3468.00', '4900.00', '7397.00', '4900.00', '2017-10-23 00:00:00'),
(2, '15000.00', '6790.00', '2789.00', '3480.00', '7000.00', '8000.00', '3468.00', '4900.00', '7397.00', '4900.00', '2017-10-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(350) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `query_id`, `user_id`, `feedback`, `date`) VALUES
(0, 0, 1, 'it was said I will get it two weeks after, and it almost 3 weeks', '2017-10-24 21:10:18'),
(0, 0, 1, 'it was said I will get it two weeks after, and it almost 3 weeks', '2017-10-24 21:10:27');

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
(1, 5, 'Samsung', '245.85.57.033', 'Cellphone', 'broken1.jpg', 'Broken Screen ,', '', '2017-10-10 09:58:36', '', '', '2017-10-10 09:58:36', '2017-11-03 02:45:00', 0, 'BKN-3322982'),
(2, 5, 'Logic', '126.48.93.75', 'Microwave', 'brok micro.jpg', 'The Microwave is not working', '', '2017-10-10 10:01:33', '', '', '2017-10-10 10:01:33', '2017-11-15 10:00:00', 0, 'BKN-0033364'),
(3, 7, 'Apple', '78.75.46.76', 'Desktop', 'desk_apple.jpg', 'The screen is not coming on', '', '2017-10-10 10:14:14', '', '', '2017-10-10 10:14:14', '2017-12-01 10:00:00', 0, 'BKN-02430222'),
(4, 7, 'Huawei', '82.35.89.32', 'Tablet', 'broken3.jpg', 'blank screen battery dead also', '', '2017-10-10 10:15:04', '', '', '2017-10-10 10:15:04', '2017-10-27 10:00:00', 0, 'BKN-0252423'),
(5, 8, 'lenova thinkpad', '235.67.89.013', 'Laptop', 'the-best-lenovo-laptops-of-2017_4vng.jpg', 'keeps on restarting over and over again', '', '2017-10-19 12:04:17', '', '', '2017-10-19 12:04:17', '2017-05-17 00:00:00', 0, 'BKN-2039'),
(6, 8, 'ipad', '87.098.98.32', 'Tablet', '3547912_orig.jpg', 'i have a broken screen and my volume up button is not working', '', '2017-10-19 12:07:49', '', '', '2017-10-19 12:07:49', '2017-08-10 08:00:00', 0, 'BKN-20223332'),
(7, 17, 'nokia', '27.83.47.85', 'Cellphone', 'Nokia_5310.jpg', 'speakers not working', '', '2017-10-19 13:05:29', '', '', '2017-10-19 13:05:29', '0000-00-00 00:00:00', 0, 'BKN-22634283'),
(8, 17, 'samsung', '89.70.67.98', 'Cellphone', '50932441.jpg', 'my phone is not charging properly and battery dies quickly', '', '2017-10-19 13:08:52', '', '', '2017-10-19 13:08:52', '0000-00-00 00:00:00', 0, 'BKN-20228030'),
(9, 17, 'apple', '46.71.234.56', 'Laptop', 'index.jpg', 'memory card slot not working', '', '2017-10-19 13:11:27', '', '', '2017-10-19 13:11:27', '0000-00-00 00:00:00', 0, 'BKN-2402063'),
(10, 1, 'Dell', '34.246.68.87', 'Laptop', 'laptop_Dell.png', 'the screen cracked', '', '2017-10-24 21:29:44', '', '', '2017-10-24 21:29:44', '0000-00-00 00:00:00', 0, 'BKN-2523800'),
(11, 1, 'samsung', '234.56.78.90', 'Television', 'broken-tv-screen.jpg', 'screen cracked', '', '2017-10-24 21:32:41', '', '', '2017-10-24 21:32:41', '0000-00-00 00:00:00', 0, 'BKN-52072222'),
(12, 1, 'iPhone4', '45.67.87.65', 'Cellphone', 'broken6.jpg', 'screen cracked , but software seems to be working fine', '', '2017-10-24 21:37:44', '', '', '2017-10-24 21:37:44', '0000-00-00 00:00:00', 0, 'BKN-330383'),
(13, 1, 'microwave', '42.76.26.29', 'Microwave', 'brok micro.jpg', 'doesn\'t work anymore', '', '2017-10-24 21:42:29', '', '', '2017-10-24 21:42:29', '0000-00-00 00:00:00', 0, 'BKN-03305'),
(14, 1, 'tablet', '52.82.62.72', 'Tablet', 'tab1.jpg', 'just cant open', '', '2017-10-24 21:44:48', '', '', '2017-10-24 21:44:48', '0000-00-00 00:00:00', 0, 'BKN-2023282');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Heir Apparel', 'Crowea Pl, Frenchs Forest NSW 2086', -33.737885, 151.235260),
(2, 'BeeYourself Clothing', 'Thalia St, Hassall Grove NSW 2761', -33.729752, 150.836090),
(3, 'Dress Code', 'Glenview Avenue, Revesby, NSW 2212', -33.949448, 151.008591),
(4, 'The Legacy', 'Charlotte Ln, Chatswood NSW 2067', -33.796669, 151.183609),
(5, 'Fashiontasia', 'Braidwood Dr, Prestons NSW 2170', -33.944489, 150.854706),
(6, 'Trish & Tash', 'Lincoln St, Lane Cove West NSW 2066', -33.812222, 151.143707),
(7, 'Perfect Fit', 'Darley Rd, Randwick NSW 2031', -33.903557, 151.237732),
(8, 'Buena Ropa!', 'Brodie St, Rydalmere NSW 2116', -33.815521, 151.026642),
(9, 'Coxcomb and Lily Boutique', 'Ferrers Rd, Horsley Park NSW 2175', -33.829525, 150.873764),
(10, 'Moda Couture', 'Northcote Rd, Glebe NSW 2037', -33.873882, 151.177460);

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
(1, 5, 'Bunyebethu Group', '2017-10-10 14:43:14', 23, 'Samsung', 'bunyebethu.group@bgsuppliers.co.za', '99999.99'),
(2, 5, 'Bunyebethu Group', '2017-10-23 13:03:07', 23, 'Samsung', 'bunyebethu.group@bgsuppliers.co.za', '53935.00'),
(3, 5, 'Bunyebethu Group', '2017-10-23 13:03:07', 12, 'Apple iPhone4s', 'bunyebethu.group@bgsuppliers.co.za', '2808.00');

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
(1, 1, 'Aspire E15', '8 GB DDR4 Memory ,\r\nNVIDIA GeForce 940MX with 2GB Dedicated VRAM,\r\nIntel Core i7-7500U 2.7Ghz with T', 'Laptop', '18000.00', '0.00', 'laptop_acer.png', '2017-10-09 23:59:20', '2017-10-09 23:59:20', '2017-10-09 23:59:20', 0, 3000, 100, NULL, 'Bunyebethu Group', 'Acer', '15000', '3000', NULL, NULL, NULL, NULL, NULL, 'PRD-75223', '9606036404080'),
(3, 1, 'Pavillion', '4 GB DDR4 Memory ,\r\nNVIDIA GeForce 940MX with 2GB Dedicated VRAM\r\nIntel Core i5-7500U 2.7Ghz', 'Laptop', '12000.00', '0.00', 'laptop_HP.jpg', '2017-10-10 00:02:04', '2017-10-10 00:02:04', '2017-10-10 00:02:04', 0, 3322, 9, NULL, 'Bunyebethu Group', 'Hewlet Parkade', '8678', '3322', NULL, NULL, NULL, NULL, NULL, 'PRD-40273', '9606036404080'),
(5, 1, 'iPhone4s', '8MP Camera,\r\n6inch Touchscreen,', 'Cellphone', '3500.00', '0.00', 'cell_apple.jpg', '2017-10-10 00:05:43', '2017-10-10 00:05:43', '2017-10-10 00:05:43', 0, 842, 8, NULL, 'Eraworth Suppliers', 'Apple', '2658', '842', NULL, NULL, NULL, NULL, NULL, 'PRD-060333', '9606036404080'),
(7, 1, 'Galaxy Note8', '12MP front Camera\r\n4K screen \r\nQuad Processor', 'Cellphone', '19000.00', '0.00', 'cell_huawei.jpg', '2017-10-10 00:08:29', '2017-10-10 00:08:29', '2017-10-10 00:08:29', 0, 1110, 2809, NULL, 'Eraworth Suppliers', 'Samsung', '17890', '1110', NULL, NULL, NULL, NULL, NULL, 'PRD-4622993', '9606036404080'),
(9, 1, 'iPhone6s', 'Lion Battery Type2300\r\n32 GB  Memory Storage\r\n4K Graphics', 'Cellphone', '16799.00', '0.00', 'cell_app.jpg', '2017-10-10 00:24:43', '2017-10-10 00:24:43', '2017-10-10 00:24:43', 0, 2299, 8, NULL, 'Bunyebethu Group', 'Apple', '14500', '2299', NULL, NULL, NULL, NULL, NULL, 'PRD-2345', '9606036404080'),
(11, 1, 'SRD0NF1', '1 Terrabite Expansion Portable Drive', 'Hardrive', '1500.00', '0.00', 'hard7.jpg', '2017-10-10 00:28:22', '2017-10-10 00:28:22', '2017-10-10 00:28:22', 0, 501, 209, NULL, 'Phungula Hardware', 'Seagate', '999', '501', NULL, NULL, NULL, NULL, NULL, 'PRD-2307322', '9606036404080'),
(13, 1, 'Samg-Exp-HDD', '1 Terrabite  Desktop Expansion Drive', 'Hardrive', '654.00', '0.00', 'hard6.jpg', '2017-10-10 00:30:08', '2017-10-10 00:30:08', '2017-10-10 00:30:08', 0, 307, 21331, NULL, 'Phungula Hardware', 'Samsung', '347', '307', NULL, NULL, NULL, NULL, NULL, 'PRD-29020', '9606036404080'),
(15, 1, 'Micro436', '2000 watts \r\nBlack\r\nLED Screen', 'Microwave', '456.00', '365.00', 'micro_samsung.jpg', '2017-10-10 00:32:26', '2017-10-11 00:00:00', '2017-11-11 00:00:00', 0, 106, 1090, NULL, 'Elwyn Court', 'Samsung', '350', '106', NULL, NULL, NULL, NULL, NULL, 'PRD-0242283', '9606036404080'),
(18, 13, 'MS3040S', 'AUTO COOKING,  AUTO REHEAT  30L CAPACITY', 'Microwave', '1200.00', '0.00', '17328529_1-zoom.jpg', '2017-10-19 12:39:35', '2017-10-19 12:39:35', '2017-10-19 12:39:35', 0, 400, 12, NULL, 'Hardsoft', 'LG', '800', '400', NULL, NULL, NULL, NULL, NULL, 'PRD-2020232', '9112245624084'),
(20, 13, 'iPad Pro', '9.7-inch iPad Pro delivers an unprecedented combination of portability and performance', 'Tablet', '10000.00', '0.00', 'apple-ipad-pro-12.9-gallery-img-4.jpg', '2017-10-19 12:46:17', '2017-10-19 12:46:17', '2017-10-19 12:46:17', 0, 1100, 10, NULL, 'Matchiel Bronz', 'Apple', '8900', '1100', NULL, NULL, NULL, NULL, NULL, 'PRD-2203262', '9603026738083'),
(22, 13, 'Galaxy S8', 'Samsung Galaxy S8 Plus, 64GB in Midnight Black', 'Cellphone', '12000.00', '0.00', 'galaxys8plus_grey_all.png', '2017-10-19 12:56:22', '2017-10-19 12:56:22', '2017-10-19 12:56:22', 0, 933, 5, NULL, 'Bunyebethu Group', 'Samsung', '11067', '933', NULL, NULL, NULL, NULL, NULL, 'PRD-0304063', '9601115694084'),
(23, 13, 'P9 Lite', 'MicroSD up to 128GB , Bluetooth 4.0', 'Cellphone', '5870.00', '0.00', 'p9lite_1.jpg', '2017-10-19 13:06:24', '2017-10-19 13:06:24', '2017-10-19 13:06:24', 0, 292, 14, NULL, 'Elwyn Court', 'Huawei', '5578', '292', NULL, NULL, NULL, NULL, NULL, 'PRD-302238', '9806135738083');

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `email`, `name`, `query`, `status`, `date`) VALUES
(0, 1, 'Mandiso04@yahoo.com', 'Mandiso', 'I haven\'t yet received my microwave', 'unanswered', '2017-10-24 21:10:37');

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
(1, 1, 'Samsung', '245.85.57.033', 'GalaxyS8', 'Battery', 'Nzuzo', 'The device Is not working screen is Broken', '235.00', '333.00', '568.00', 'Booked', 0, 5, 'BKN-3322982', 'JQT-23653339'),
(2, 3, 'Apple', '78.75.46.76', 'iPhone5s', 'Charger', 'Aminah', 'device is not working', '600.00', '200.00', '800.00', 'Booked', 0, 7, 'BKN-02430222', 'JQT-203223'),
(3, 4, 'Huawei', '82.35.89.32', 'p10 Asccend', 'Battery', 'Aminah', 'Something is wrong with my cellphone', '1245.00', '1755.00', '3000.00', 'Booked', 0, 7, 'BKN-0252423', 'JQT-020600');

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
(1, 2, 125, 34, '100.00', 1, 1),
(2, 4, 160, 20, '120.00', 2, 2),
(3, 1, 120, 12, '200.00', 3, 3),
(4, 15, 42, 0, '80.00', 4, 4),
(5, 8, 60, 0, '170.00', 5, 5),
(6, 20, 135, 0, '195.00', 6, 6);

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_num`, `custName`, `payment_method`, `total_amount`, `amount_paid`, `change`, `cashier`, `date`) VALUES
(1, 'RS-2298233', 'Lizzy Ngcobo', 0, '34252.00', 35000, '748.00', 'Mandiso', '2017-10-11'),
(2, 'RS-2202493', 'Sandile Dlamini', 0, '99999.99', 300500, '501.00', 'Mandiso', '2017-10-12'),
(3, 'RS-220530', 'Sakhile Mzila', 0, '14000.00', 14000, '0.00', 'Mandiso', '2017-10-16'),
(4, 'RS-2200232', 'Jason Statham', 0, '10000.00', 10000, '0.00', 'Mandiso', '2017-10-24'),
(5, 'RS-2200232', 'Sanele Mthembu', 0, '46000.00', 50000, '4000.00', 'Yamkela', '2017-10-24');

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
(1, 'Faraj Electronics', '', '0848083092', 'farraj@graphix.co.za', 'http://fajgraphix.co.za', '9 lerghon place Caversham Glen 3610', 'SUP-60323236'),
(2, 'Matchiel Bronz', '', '031 752 5352', 'info@matchielbrons.com', 'http://matchielbrons.com', '321 Umngeni Road Durban 4001', 'SUP-53333'),
(3, 'Elwyn Court', '', '031 828 7412', 'orders.elwyn@elwyn.co.za', 'http://elwyn.co.za', '370 Point Road Durban 4001', 'SUP-323822'),
(4, 'Eraworth Suppliers', '', '031 788 3935', 'supplies@eraworth.co.za', 'http://eraworth.co.za', '5 LeBurne Court Durban 4001', 'SUP-2703030'),
(5, 'Bunyebethu Group', '', '031 588 3935', 'bunyebethu.group@bgsuppliers.co.za', 'http://bgsuppliers.co.za', '3 Cleveland Place Pinetown 3610', 'SUP-02323232'),
(6, 'Hardsoft', '', '034 475 8435', 'hardsoft@yahoo.com', 'http://', '33 Berea Road Durban 4001', 'SUP-93373323'),
(7, 'Phungula Hardware', '', '081 964 6932', 'phungula@gmail.com', 'http://', '45 Umbilo Road Durban 4001', 'SUP-20332202');

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
(1, 'Aminah', 'Mabaso', 'mabasoamina@gmail.com', 'Hardware'),
(2, 'Nzuzo', 'Ndlovu', 'nzuzundlovu@gmail.com', 'Software'),
(3, 'Mbali', 'Ngcobo', 'mbali@gmail.com', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `techrepair`
--

CREATE TABLE `techrepair` (
  `job_id` int(11) NOT NULL,
  `diviceName` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `Dtype` varchar(255) NOT NULL,
  `recievedDate` varchar(255) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `tname` varchar(255) DEFAULT NULL,
  `cID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techrepair`
--

INSERT INTO `techrepair` (`job_id`, `diviceName`, `model`, `serialNumber`, `Dtype`, `recievedDate`, `amount`, `tname`, `cID`) VALUES
(1, 'Samsung', 'GalaxyS8', '12890365', 'Hardware', '2017/09/29', '267.00', 'Aminah', ''),
(2, 'Apple', 'iPhone4s', '1296490', 'Hardware', '2017/10/27', '1234.00', 'Nzuzo', '9606030405869'),
(14, 'hewui', 'mobile', 'Young123', 'Hardware', '2017-06-12', '100.00', 'Luthos', ''),
(15, 'LMOVO', 'mobile', 'Dell989', 'Hardware', '2017-06-12', '1324.00', 'Nzuzo', ''),
(16, 'Dell', 'mobile', 'Dell989', 'Software', '2017-04-25', '500.00', 'Luthos', ''),
(17, 'sumsung young 2', 'mobile', 'Young123', 'Hardware', '2017-06-12', '500.00', 'Nzuzo', ''),
(21, 'iBook', 'Laptop', 'Iphon80', 'Hardware', '2017-06-12', '780.00', 'Luthos', ''),
(22, 'sumsung young 2', 'mobile', 'su2', 'Hardware', '2017-03-14', '478.00', 'Simo', ''),
(24, 'LMOVO', 'mobile', 'Young123', 'Software', '2017-06-12', '500.00', 'Luthos', '');

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
(1, 'Mandiso', 'Ngwenya', '0822175681', '9606036404080', 'Durban North, KwaZulu-Natal, South Africa', 'Mandiso04@yahoo.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'admin', 0),
(2, 'Alulutho', 'Spambo', '0721172942', '9504250402085', 'Durban North, KwaZulu-Natal, South Africa', 'luthos@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'driver', 0),
(3, 'Nokubonga', 'Nxumalo', '0722420083', '9511250402085', 'Pinetown, KwaZulu-Natal, South Africa', 'nxukzaza@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'driver', 0),
(4, 'Aminah', 'Mabaso', '0796898564', '9512090615084', 'Empangeni, KwaZulu-Natal, South Africa', 'mabasoamina@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'technician', 0),
(5, 'Nzuzo', 'Ndlovu', '07953333568', '9503225945082', 'Bluff, Durban Metro, KwaZulu-Natal, South Africa', 'nzuzundlovu@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'technician', 0),
(7, 'Ebrahim', 'Zilika', '0610334843', '9306135698084', 'Umlazi, KwaZulu-Natal, South Africa', 'ebra@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(8, 'dominic', 'zilika', '0834359261', '9306135690832', 'Mariannhill, Pinetown, KwaZulu-Natal, South Africa', 'dominiczilika@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(10, 'Nhloh', 'Mbotho', '0632774879', '9603065615084', 'Durban, KwaZulu-Natal, South Africa', 'nhlombotho@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'driver', 0),
(13, 'Yamkela', 'Gcuma', '0799613088', '9812085614084', 'Harding, KwaZulu-Natal, South Africa', 'yamkela@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'admin', 0),
(14, 'Mbali', 'Ngcobo', '0824563218', '9305016654083', 'Umlazi J, Umlazi, KwaZulu-Natal, South Africa', 'mbali@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', 'technician', 0),
(15, 'Andile', 'Mbanjwa', '0624058765', '9112245624084', 'Pinetown, KwaZulu-Natal, South Africa', 'Andile@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(16, 'Nosipho', 'cele', '0867654321', '9703154378083', 'Umhlanga, KwaZulu-Natal, South Africa', 'nocipho@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(17, 'Fazila', 'Bhengu', '0610445800', '9603026738083', 'Pinetown, New Germany, KwaZulu-Natal, South Africa', 'fazila@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(18, 'Ridwan', 'Kambenje', '0817486239', '9707033789084', 'Chatsworth, KwaZulu-Natal, South Africa', 'ridwan@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(19, 'Nafisa', 'Kambenje', '0824321024', '9601115694084', 'Durban, KwaZulu-Natal, South Africa', 'nafisa@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '', 0),
(20, 'Lungisani', 'Stewart', '0610445814', '9806135738083', 'Pietermaritzburg, KwaZulu-Natal, South Africa', 'lungisani@gmail.com', 'dc647eb65e6711e155375218212b3964', '', 0),
(21, 'Njabulo', 'Mlangeni', '0769020059', '9612266073082', 'Durban, KwaZulu-Natal, South Africa', 'njabulocelamandla@gmail.com', 'e961de65b8a3c18e2f9b233798d82300', '', 0),
(22, 'Asiphe', 'Madikizela', '0798287412', '9307260145081', 'Empangeni, KwaZulu-Natal, South Africa', 'madikizelaasiphe@gmail.com', 'f058a1038eb31f22da8aae8aa1f03f86', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `idnumber` varchar(20) NOT NULL,
  `pic_url` varchar(100) NOT NULL,
  `street` int(50) NOT NULL,
  `areaCode` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-07 14:28:14'),
(3, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 14:29:44'),
(4, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 14:30:09'),
(5, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 14:40:57'),
(6, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 14:41:06'),
(7, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 15:47:34'),
(8, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 15:48:05'),
(9, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 16:58:29'),
(10, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 16:58:38'),
(11, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:08:28'),
(12, '/project/ds3/product.php?id=38', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:08:47'),
(13, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:08:57'),
(14, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:10:27'),
(15, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:10:36'),
(16, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 17:12:20'),
(17, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 18:50:00'),
(18, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 18:50:03'),
(19, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 18:50:32'),
(20, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 19:04:25'),
(21, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:13:47'),
(22, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:19:43'),
(23, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:20:52'),
(24, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:23:09'),
(25, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:24:31'),
(26, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:29:40'),
(27, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:30:06'),
(28, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:52:36'),
(29, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:54:59'),
(30, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-09 22:55:06'),
(31, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:10:12'),
(32, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:13:21'),
(33, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:15:30'),
(34, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:15:35'),
(35, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:15:58'),
(36, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:16:06'),
(37, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:16:16'),
(38, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:16:49'),
(39, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:16:49'),
(40, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:16:53'),
(41, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:03'),
(42, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:06'),
(43, '/project/ds3/product.php?id=3', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:15'),
(44, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:17'),
(45, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:24'),
(46, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:28'),
(47, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:30'),
(48, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:17:33'),
(49, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:18:03'),
(50, '/project/ds3/shop.php?cat=Lapt', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:18:17'),
(51, '/project/ds3/shop.php?cat=Lapt', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:18:26'),
(52, '/project/ds3/shop.php?cat=Cell', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:18:32'),
(53, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:18:35'),
(54, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:19:40'),
(55, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:20:26'),
(56, '/project/ds3/product.php?id=1', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:20:31'),
(57, '/project/ds3/product.php?id=5', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:20:46'),
(58, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:20:57'),
(59, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:01'),
(60, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:08'),
(61, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:11'),
(62, '/project/ds3/shop.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:25'),
(63, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:33'),
(64, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:36'),
(65, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:41'),
(66, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:21:45'),
(67, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:34:39'),
(68, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:35:46'),
(69, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:36:22'),
(70, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:36:56'),
(71, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:37:10'),
(72, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 00:37:15'),
(73, '/project/mob/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:21:28'),
(74, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:27:17'),
(75, '/project/ds3/product.php?id=38', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:27:17'),
(76, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:27:21'),
(77, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:27:25'),
(78, '/project/mob/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:39:41'),
(79, '/project/mob/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 01:39:49'),
(80, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 09:45:41'),
(81, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 09:52:23'),
(82, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:02:48'),
(83, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:08:50'),
(84, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:09:24'),
(85, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:13:00'),
(86, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:13:32'),
(87, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:26:17'),
(88, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:42:56'),
(89, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:43:06'),
(90, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-10 10:43:42'),
(91, '/ds3/ds3/index.php', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-10 14:39:34'),
(92, '/ds3/', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-10 14:57:10'),
(93, '/ds3/cart.php', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-10 14:59:19'),
(94, '/ds3/', '105.227.166.219', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'Telkom Internet', 'Telkom Internet', 'AS37457 Telkom-Internet', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:35:07'),
(95, '/ds3/shop.php', '196.21.61.172', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:35:47'),
(96, '/ds3/', '105.227.166.219', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'Telkom Internet', 'Telkom Internet', 'AS37457 Telkom-Internet', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:35:50'),
(97, '/ds3/shop.php', '196.21.61.172', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:36:26'),
(98, '/ds3/', '105.227.166.219', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'Telkom Internet', 'Telkom Internet', 'AS37457 Telkom-Internet', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:37:51'),
(99, '/ds3/index.php', '105.227.166.219', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'Telkom Internet', 'Telkom Internet', 'AS37457 Telkom-Internet', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-11 13:45:10'),
(100, '/ds3/', '196.21.61.124', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:17:28'),
(101, '/ds3/', '196.21.61.124', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:17:57'),
(102, '/ds3/', '196.21.61.124', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:18:24'),
(103, '/ds3/ds3/', '196.21.61.124', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:18:45'),
(104, '/ds3/', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:23:38'),
(105, '/ds3/', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 13:44:30'),
(106, '/ds3/index.php', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 14:21:00'),
(107, '/ds3/index.php', '196.21.61.107', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-12 14:21:18'),
(108, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:27:37'),
(109, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:27:49'),
(110, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:28:46'),
(111, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:28:58'),
(112, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:47:32'),
(113, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 14:47:51'),
(114, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 15:49:58'),
(115, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 15:50:08'),
(116, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:25:23'),
(117, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:25:31'),
(118, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:27:12'),
(119, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:28:48'),
(120, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:29:03'),
(121, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:29:43'),
(122, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:30:49'),
(123, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:34:04'),
(124, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:34:40'),
(125, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:37:13'),
(126, '/project/ds3/product.php?id=15', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:37:20'),
(127, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:37:24'),
(128, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:37:38'),
(129, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:38:04'),
(130, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:38:05'),
(131, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:38:07'),
(132, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:38:08'),
(133, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:39:10'),
(134, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:39:12'),
(135, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-12 16:39:13'),
(136, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 13:52:57'),
(137, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 13:53:23'),
(138, '/project/new/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 14:00:07'),
(139, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 14:09:33'),
(140, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 14:09:40'),
(141, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-16 14:12:02'),
(142, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 13:31:36'),
(143, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 13:31:50'),
(144, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 15:31:28'),
(145, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 15:33:27'),
(146, '/project/ds3/product.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 15:33:42'),
(147, '/project/ds3/shop.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 15:33:44'),
(148, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 15:34:51'),
(149, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:01:08'),
(150, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:01:11'),
(151, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:01:17'),
(152, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:03:37'),
(153, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:06:58'),
(154, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:09:01'),
(155, '/project/ds3/checkout.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-17 16:23:36'),
(156, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-19 15:05:23'),
(157, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-19 15:05:46'),
(158, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 11:45:39'),
(159, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 11:45:52'),
(160, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 12:12:23'),
(161, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 12:13:57'),
(162, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 12:16:52'),
(163, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 12:17:05'),
(164, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 13:34:26'),
(165, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 13:34:31'),
(166, '/project/ds3/cart.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 13:34:38'),
(167, '/project/ds3/', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 13:35:22'),
(168, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 14:25:57'),
(169, '/project/ds3/index.php', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '0', 0, 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', 'Annonymous', '2017-10-23 14:26:08'),
(170, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:05:46'),
(171, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:05:55'),
(172, '/ds3/', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:28:53'),
(173, '/ds3/', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:29:01'),
(174, '/ds3/', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:38:55'),
(175, '/ds3/product.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:42:23'),
(176, '/ds3/shop.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 13:42:24'),
(177, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 14:15:10'),
(178, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 14:15:30'),
(179, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 14:16:32'),
(180, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 14:18:48'),
(181, '/ds3/index.php', '196.21.61.136', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-23 14:19:17'),
(182, '/ds3/', '66.249.93.75', 'US', 'United States', 'Virginia', 'Ashburn', 0, 'Google', 'Google', 'AS15169 Google Inc.', '39.043800354', '-77.4873962402', 'America/New_York', '2017-10-24 17:37:40'),
(183, '/ds3/product.php?id=22', '66.249.93.73', 'US', 'United States', 'Virginia', 'Ashburn', 0, 'Google', 'Google', 'AS15169 Google Inc.', '39.043800354', '-77.4873962402', 'America/New_York', '2017-10-24 17:39:14'),
(184, '/ds3/product.php?id=20', '66.249.93.77', 'US', 'United States', 'Virginia', 'Ashburn', 0, 'Google', 'Google', 'AS15169 Google Inc.', '39.043800354', '-77.4873962402', 'America/New_York', '2017-10-24 17:39:25'),
(185, '/ds3/', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:27:11'),
(186, '/ds3/', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:28:58'),
(187, '/ds3/', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:33:18'),
(188, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:33:38'),
(189, '/ds3/product.php?id=23', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:33:59'),
(190, '/ds3/shop.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:37:43'),
(191, '/ds3/shop.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:37:44'),
(192, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:39:03'),
(193, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:39:07'),
(194, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:39:40'),
(195, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:39:46'),
(196, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 20:39:54'),
(197, '/ds3/', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:10:57'),
(198, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:11:03'),
(199, '/ds3/product.php?id=22', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:11:37'),
(200, '/ds3/cart.php', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:11:57'),
(201, '/ds3/product.php?id=23', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:12:34'),
(202, '/ds3/index.php', '105.224.177.126', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'Telkom Internet', 'Telkom Internet', 'AS37457 Telkom-Internet', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:24:13'),
(203, '/ds3/', '41.162.37.42', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 3630, 'Neotel Pty Ltd', 'Neotel Pty Ltd', 'AS36937 Neotel Pty Ltd', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-24 21:40:48'),
(204, '/ds3/', '196.21.61.201', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-25 10:03:42'),
(205, '/ds3/', '196.21.61.201', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-25 10:04:09'),
(206, '/ds3/index.php', '196.21.61.201', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-25 10:10:42'),
(207, '/ds3/index.php', '196.21.61.201', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-25 10:11:50'),
(208, '/ds3/', '196.21.61.163', 'ZA', 'South Africa', 'KwaZulu-Natal', 'Durban', 4000, 'UNINET Project', 'UNINET Project', 'AS2018 Tertiary Education', '-29.8500003815', '31.0167007446', 'Africa/Johannesburg', '2017-10-25 10:20:28');

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
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`adID`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  ADD UNIQUE KEY `deliveryID_2` (`deliveryID`),
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
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prod_code` (`prod_code`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supp_code` (`supp_code`),
  ADD UNIQUE KEY `contactNumber` (`contactNumber`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnumber` (`idnumber`),
  ADD UNIQUE KEY `cell` (`cell`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`idnumber`),
  ADD UNIQUE KEY `idnumber` (`idnumber`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `custsaleprod`
--
ALTER TABLE `custsaleprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `driverdelivery`
--
ALTER TABLE `driverdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stork`
--
ALTER TABLE `stork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suburb`
--
ALTER TABLE `suburb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tech`
--
ALTER TABLE `tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `techrepair`
--
ALTER TABLE `techrepair`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
