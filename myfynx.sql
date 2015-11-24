-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 08:38 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myfynx`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `title`, `order`, `status`) VALUES
(1, 'BipashaBasu.JPG', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 1, 1),
(2, 'KarishmaKapoor.jpg', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 2, 1),
(3, 'MSG.JPG', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 3, 1),
(4, 'NicolasAnelka.JPG', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 4, 1),
(5, 'PoojaBhatt.jpeg', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 5, 1),
(6, 'YusufPathan.JPG', 'LOREM IPSUM DOLOR SIT AMET ENIM.', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Wholesaler'),
(4, 'Press');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner1`
--

CREATE TABLE IF NOT EXISTS `banner1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `centrealign` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner1`
--

INSERT INTO `banner1` (`id`, `name`, `link`, `target`, `status`, `fromdate`, `todate`, `image`, `template`, `class`, `text`, `centrealign`) VALUES
(1, '', 'http://gobrtdhogle.com', '', 1, '0000-00-00', '0000-00-00', 'auraart_icon.png', '<p><strong><em>fhsrr</em></strong><em>dfhaeg</em>efbjewgf</p>', 'fff', 'kkkkkkk', 'jjjj');

-- --------------------------------------------------------

--
-- Table structure for table `banner2`
--

CREATE TABLE IF NOT EXISTS `banner2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner3`
--

CREATE TABLE IF NOT EXISTS `banner3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bloggerscorner`
--

CREATE TABLE IF NOT EXISTS `bloggerscorner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `isdistributer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`, `order`, `image1`, `image2`) VALUES
(1, 'Men', 0, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categorylog`
--

CREATE TABLE IF NOT EXISTS `categorylog` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorylog`
--

INSERT INTO `categorylog` (`id`, `user`, `category`, `action`, `timestamp`) VALUES
(1, 1, 1, 'Category Created', '2015-11-24 06:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `celebcorner`
--

CREATE TABLE IF NOT EXISTS `celebcorner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('debdd225dc237b4bf2926a8292125ea3', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', 1448350662, 'a:8:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:5:"email";s:17:"wohlig@wohlig.com";s:4:"name";s:6:"Wohlig";s:9:"firstname";s:6:"Wohlig";s:8:"lastname";s:6:"Wohlig";s:11:"accesslevel";s:1:"1";s:9:"logged_in";s:4:"true";}');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupontype`
--

CREATE TABLE IF NOT EXISTS `coupontype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isdefault` int(11) NOT NULL,
  `conversionrate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency_country`
--

CREATE TABLE IF NOT EXISTS `currency_country` (
  `currency` int(11) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE IF NOT EXISTS `designers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `noofdesigns` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`id`, `name`, `email`, `location`, `noofdesigns`) VALUES
(2, '0', '0', '0', 0),
(3, '0', '0', '0', 0),
(4, 'wohlig1', 'pooja.wohl1ig@gmail.com', 'Colaba1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE IF NOT EXISTS `designs` (
  `id` int(11) NOT NULL,
  `fromuser` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `fromuser`, `image`, `timestamp`, `status`) VALUES
(2, 26, 'delorean.jpg', '0000-00-00 00:00:00', 3),
(3, 1, 'download_(2)1.jpg', '2015-11-06 08:25:12', 4),
(4, 4, 'download_(2)2.jpg', '2015-11-10 08:46:47', 1),
(7, 4, 'delorean1.jpg', '2015-11-10 10:08:31', 1),
(8, 4, 'download_(3)2.jpg', '2015-11-10 10:52:24', 1),
(9, 4, 'images.jpg', '2015-11-10 10:57:13', 1),
(10, 4, '41D5vU4I1NL.jpg', '2015-11-10 10:58:44', 1),
(11, 4, 'download_(3)3.jpg', '2015-11-10 11:00:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discountcoupon`
--

CREATE TABLE IF NOT EXISTS `discountcoupon` (
  `id` int(11) NOT NULL,
  `coupontype` int(11) NOT NULL,
  `discountpercent` double NOT NULL,
  `discountamount` double NOT NULL,
  `couponcode` varchar(255) NOT NULL,
  `minamount` double NOT NULL,
  `xproducts` int(11) NOT NULL,
  `yproducts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discountproducts`
--

CREATE TABLE IF NOT EXISTS `discountproducts` (
  `discountcoupon` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homecategoryproduct`
--

CREATE TABLE IF NOT EXISTS `homecategoryproduct` (
  `id` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `limitedstock`
--

CREATE TABLE IF NOT EXISTS `limitedstock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(6, 'Products', '', '', 'site/viewproduct', 1, 0, 1, 2, 'icon-user'),
(7, 'Home Slides', '', '', 'site/viewbanner1', 1, 0, 1, 3, 'icon-user'),
(8, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 4, 'icon-user'),
(9, 'Offer', '', '', 'site/viewoffer', 1, 0, 1, 5, 'icon-user'),
(12, 'Navigation', '', '', 'site/viewnavigation', 1, 11, 1, 1, 'icon-user'),
(13, 'Page', '', '', 'site/viewpage', 1, 11, 1, 2, 'icon-user'),
(14, 'Slider', '', '', 'site/viewslider', 1, 11, 1, 3, 'icon-user'),
(15, 'Color', '', '', 'site/viewcolor', 1, 0, 1, 4, 'icon-user'),
(16, 'Size Chart', '', '', 'site/viewsizechart', 1, 0, 1, 5, 'icon-user'),
(17, 'Size', '', '', 'site/viewsize', 1, 0, 1, 6, 'icon-user'),
(18, 'Celeb Corner', '', '', 'site/viewcelebcorner', 1, 11, 1, 7, 'icon-user'),
(19, 'Bloggers Corner', '', '', 'site/viewbloggerscorner', 1, 11, 1, 8, 'icon-user'),
(22, 'Orders', '', '', 'site/vieworder', 1, 0, 1, 10, 'icon-user'),
(23, 'Pending Orders', '', '', 'site/viewpendingorder', 1, 0, 1, 11, 'icon-user'),
(24, 'Newsletter', '', '', 'site/newsletter', 1, 0, 1, 12, 'icon-user'),
(25, 'Contact Us', '', '', 'site/viewcontact', 1, 0, 1, 13, 'icon-user'),
(26, 'Designers', '', '', 'site/viewdesigners', 1, 0, 1, 2, 'icon-user'),
(27, 'Config', '', '', 'site/viewconfig', 1, 0, 1, 15, 'icon-user'),
(28, 'Types', '', '', 'site/viewtype', 1, 0, 1, 3, 'icon-user'),
(29, 'Sub-Category', '', '', 'site/viewsubcategory', 1, 0, 1, 5, 'icon-user');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newarrival`
--

CREATE TABLE IF NOT EXISTS `newarrival` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newslettermail`
--

CREATE TABLE IF NOT EXISTS `newslettermail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `scheduletime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newslettermailuser`
--

CREATE TABLE IF NOT EXISTS `newslettermailuser` (
  `newslettermail` int(11) NOT NULL,
  `newsletteremail` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletterusers`
--

CREATE TABLE IF NOT EXISTS `newsletterusers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offerproduct`
--

CREATE TABLE IF NOT EXISTS `offerproduct` (
  `id` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `defaultcurrency` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalamount` double NOT NULL,
  `discountamount` double NOT NULL,
  `finalamount` double NOT NULL,
  `discountcoupon` int(11) NOT NULL,
  `paymentmethod` int(11) NOT NULL,
  `orderstatus` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `trackingcode` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingmethod` int(11) DEFAULT NULL,
  `shippingname` varchar(255) NOT NULL,
  `shippingtel` varchar(255) NOT NULL,
  `customernote` varchar(255) NOT NULL,
  `billingcontact` varchar(255) NOT NULL,
  `shippingcontact` varchar(255) NOT NULL,
  `design` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `defaultcurrency`, `timestamp`, `totalamount`, `discountamount`, `finalamount`, `discountcoupon`, `paymentmethod`, `orderstatus`, `currency`, `trackingcode`, `billingpincode`, `shippingmethod`, `shippingname`, `shippingtel`, `customernote`, `billingcontact`, `shippingcontact`, `design`) VALUES
(1, 0, 'Wohlig', 'Wohlig', 'wohlig@wohlig.com', 'Laxmi Nivas', 'Sion', 'Maharashtra', 'India', 'Laxmi Nivas', 'Sion', 'India', 'Maharashtra', '400709', '', '2015-09-16 09:31:13', 0, 0, 7886, 0, 0, 1, 0, '', '5686', 0, 'xt', '', 'ytry', '022298756432', '9820564589', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `finalprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order`, `product`, `quantity`, `price`, `discount`, `finalprice`) VALUES
(1, 1, 1, 1, 500, 200, 300);

-- --------------------------------------------------------

--
-- Table structure for table `orderlog`
--

CREATE TABLE IF NOT EXISTS `orderlog` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlog`
--

INSERT INTO `orderlog` (`id`, `user`, `order`, `action`, `timestamp`) VALUES
(0, 1, 1, 'Order Address Updated', '2015-11-24 07:23:40'),
(1, 1, 154, 'Order Address Updated', '2015-06-06 06:27:44'),
(2, 1, 154, 'Order Address Updated', '2015-07-10 07:58:08'),
(3, 1, 728, 'Order Address Updated', '2015-08-17 10:34:16'),
(4, 1, 728, 'Order Address Updated', '2015-08-17 10:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE IF NOT EXISTS `paymentgateway` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isdefault` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pickofweak`
--

CREATE TABLE IF NOT EXISTS `pickofweak` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL,
  `wholesaleprice` varchar(255) DEFAULT NULL,
  `firstsaleprice` varchar(255) DEFAULT NULL,
  `secondsaleprice` varchar(255) DEFAULT NULL,
  `specialpriceto` date DEFAULT NULL,
  `specialpricefrom` date DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metadesc` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `modelnumber` varchar(255) NOT NULL,
  `brandcolor` varchar(255) NOT NULL,
  `eanorupc` varchar(255) NOT NULL,
  `eanorupcmeasuringunits` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `compatibledevice` varchar(255) NOT NULL,
  `compatiblewith` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `design` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `depth` varchar(255) NOT NULL,
  `portsize` varchar(255) NOT NULL,
  `packof` varchar(255) NOT NULL,
  `salespackage` varchar(255) NOT NULL,
  `keyfeatures` text NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `modelname` varchar(255) NOT NULL,
  `finish` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `domesticwarranty` varchar(255) NOT NULL,
  `domesticwarrantymeasuringunits` varchar(255) NOT NULL,
  `internationalwarranty` varchar(255) NOT NULL,
  `internationalwarrantymeasuringunits` varchar(255) NOT NULL,
  `warrantysummary` varchar(255) NOT NULL,
  `warrantyservicetype` varchar(255) NOT NULL,
  `coveredinwarranty` varchar(255) NOT NULL,
  `notcoveredinwarranty` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `typename` varchar(255) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sizechart` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `description`, `url`, `visibility`, `price`, `wholesaleprice`, `firstsaleprice`, `secondsaleprice`, `specialpriceto`, `specialpricefrom`, `metatitle`, `metadesc`, `metakeyword`, `quantity`, `status`, `modelnumber`, `brandcolor`, `eanorupc`, `eanorupcmeasuringunits`, `type`, `compatibledevice`, `compatiblewith`, `material`, `color`, `design`, `width`, `height`, `depth`, `portsize`, `packof`, `salespackage`, `keyfeatures`, `videourl`, `modelname`, `finish`, `weight`, `domesticwarranty`, `domesticwarrantymeasuringunits`, `internationalwarranty`, `internationalwarrantymeasuringunits`, `warrantysummary`, `warrantyservicetype`, `coveredinwarranty`, `notcoveredinwarranty`, `size`, `typename`, `subcategory`, `category`, `sizechart`) VALUES
(3, 'Polo Tshirt', 'A11', 'Polo Tshirt description', '0', 1, 500, '0', '0', '0', '0000-00-00', '0000-00-00', '0', '0', '0', 10, 1, '0', '0', '0', '0', '0', '0', '0', '0', '1', '', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '2', '0', 5, 1, ''),
(4, 'JAck & Jones', 'A12', 'JAck & Jones Description', '0', 1, 800, '0', '0', '0', '0000-00-00', '0000-00-00', '0', '0', '0', 5, 1, '0', '0', '0', '0', '0', '0', '0', '0', '1', '', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '3', '0', 5, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `productbrand`
--

CREATE TABLE IF NOT EXISTS `productbrand` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `product` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_default` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productimagecroncheck`
--

CREATE TABLE IF NOT EXISTS `productimagecroncheck` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productlog`
--

CREATE TABLE IF NOT EXISTS `productlog` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlog`
--

INSERT INTO `productlog` (`id`, `user`, `product`, `action`, `timestamp`) VALUES
(0, 1, 3, 'Product Created', '2015-11-24 06:55:51'),
(0, 1, 3, 'Product Details Edited', '2015-11-24 07:00:39'),
(0, 1, 3, 'Product Details Edited', '2015-11-24 07:02:50'),
(0, 1, 4, 'Product Created', '2015-11-24 07:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE IF NOT EXISTS `productrating` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productreturn`
--

CREATE TABLE IF NOT EXISTS `productreturn` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `orderitem` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE IF NOT EXISTS `producttype` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productwaiting`
--

CREATE TABLE IF NOT EXISTS `productwaiting` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relatedproduct`
--

CREATE TABLE IF NOT EXISTS `relatedproduct` (
  `product` int(11) NOT NULL,
  `relatedproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(2, 'xl'),
(3, 'xxl');

-- --------------------------------------------------------

--
-- Table structure for table `sizechart`
--

CREATE TABLE IF NOT EXISTS `sizechart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizechart`
--

INSERT INTO `sizechart` (`id`, `name`, `image`) VALUES
(1, 'For Tshirt ', 'yhst-36415648955918_2214_4892944.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category`, `status`, `order`, `image1`, `image2`) VALUES
(5, 'Tshirt', 1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `timestamp`) VALUES
(0, 'V-neck', '2015-11-24 06:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `billingaddress` varchar(255) DEFAULT NULL,
  `billingcity` varchar(255) DEFAULT NULL,
  `billingstate` varchar(255) DEFAULT NULL,
  `billingcountry` varchar(255) DEFAULT NULL,
  `shippingaddress` varchar(255) DEFAULT NULL,
  `shippingcity` varchar(255) DEFAULT NULL,
  `shippingcountry` varchar(255) DEFAULT NULL,
  `shippingstate` varchar(255) DEFAULT NULL,
  `shippingpincode` varchar(255) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `credits` double DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyregistrationno` varchar(255) DEFAULT NULL,
  `vatnumber` bigint(20) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `dob` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `billingpincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `firstname`, `lastname`, `email`, `phone`, `password`, `accesslevel`, `status`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `currency`, `credits`, `companyname`, `companyregistrationno`, `vatnumber`, `country`, `fax`, `image`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `google`, `twitter`, `timestamp`, `username`, `gender`, `billingpincode`) VALUES
(1, 'Wohlig', 'Wohlig', 'Wohlig', 'wohlig@wohlig.com', '9898989', 'a63526467438df9566c508027d9cb06b', 1, 1, 'sec-4 airoli', 'NaviMumbai', 'MAharashtra', 'India', 'dombivili', 'kalyan', 'Australia', 'maharashtra', '400125', 1, 0, 'waW', '123', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '2015-10-26 08:07:54', '', 0, '400708');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE IF NOT EXISTS `usercart` (
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fromuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `user`, `action`, `timestamp`, `fromuser`) VALUES
(0, 27, 'User Created', '2015-09-23 11:29:37', 1),
(1, 49, 'User Details Edited', '2015-05-06 07:39:13', 1),
(2, 36, 'User Details Edited', '2015-06-01 12:38:10', 1),
(3, 1, 'User Details Edited', '2015-08-18 07:56:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userwishlist`
--

CREATE TABLE IF NOT EXISTS `userwishlist` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner1`
--
ALTER TABLE `banner1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner2`
--
ALTER TABLE `banner2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner3`
--
ALTER TABLE `banner3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloggerscorner`
--
ALTER TABLE `bloggerscorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorylog`
--
ALTER TABLE `categorylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `celebcorner`
--
ALTER TABLE `celebcorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupontype`
--
ALTER TABLE `coupontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountcoupon`
--
ALTER TABLE `discountcoupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecategoryproduct`
--
ALTER TABLE `homecategoryproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limitedstock`
--
ALTER TABLE `limitedstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuaccess`
--
ALTER TABLE `menuaccess`
  ADD UNIQUE KEY `menu` (`menu`,`access`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newarrival`
--
ALTER TABLE `newarrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslettermail`
--
ALTER TABLE `newslettermail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslettermailuser`
--
ALTER TABLE `newslettermailuser`
  ADD PRIMARY KEY (`newslettermail`);

--
-- Indexes for table `newsletterusers`
--
ALTER TABLE `newsletterusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerproduct`
--
ALTER TABLE `offerproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlog`
--
ALTER TABLE `orderlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickofweak`
--
ALTER TABLE `pickofweak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productbrand`
--
ALTER TABLE `productbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimagecroncheck`
--
ALTER TABLE `productimagecroncheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productrating`
--
ALTER TABLE `productrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreturn`
--
ALTER TABLE `productreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productwaiting`
--
ALTER TABLE `productwaiting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizechart`
--
ALTER TABLE `sizechart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userwishlist`
--
ALTER TABLE `userwishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banner1`
--
ALTER TABLE `banner1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorylog`
--
ALTER TABLE `categorylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `celebcorner`
--
ALTER TABLE `celebcorner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `coupontype`
--
ALTER TABLE `coupontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `discountcoupon`
--
ALTER TABLE `discountcoupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homecategoryproduct`
--
ALTER TABLE `homecategoryproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `limitedstock`
--
ALTER TABLE `limitedstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newarrival`
--
ALTER TABLE `newarrival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletterusers`
--
ALTER TABLE `newsletterusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sizechart`
--
ALTER TABLE `sizechart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
