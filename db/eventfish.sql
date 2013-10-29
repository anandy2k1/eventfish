-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 06:22 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventfish`
--
CREATE DATABASE IF NOT EXISTS `eventfish` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eventfish`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_type` enum('EVENT','VENDOR') DEFAULT NULL,
  `category_description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `category_name`, `category_image`, `category_type`, `category_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Religious', '8d5fec0d0b40196b55bee13984c86935.jpg', 'EVENT', 'Religious', 1, '2013-10-22 17:35:58', '2013-10-25 21:11:45'),
(3, 0, 'Love', NULL, 'EVENT', 'Love', 1, '2013-10-25 21:21:11', '2013-10-25 21:21:11'),
(4, 0, 'Birthdays', NULL, 'EVENT', 'Birthdays', 1, '2013-10-25 21:21:35', '2013-10-25 21:21:35'),
(5, 0, 'Conferences', NULL, 'EVENT', 'Conferences', 1, '2013-10-25 21:22:04', '2013-10-25 21:22:04'),
(6, 0, 'Business', NULL, 'EVENT', 'Business', 1, '2013-10-25 21:22:20', '2013-10-25 21:22:20'),
(7, 0, 'Holidays', NULL, 'EVENT', 'Holidays', 1, '2013-10-25 21:22:31', '2013-10-25 21:22:31'),
(8, 0, 'Achievements', NULL, 'EVENT', 'Achievements', 1, '2013-10-25 21:22:46', '2013-10-25 21:22:46'),
(9, 0, 'Boys/Girls Nights', NULL, 'EVENT', 'Boys/Girls Nights', 1, '2013-10-25 21:22:59', '2013-10-25 21:22:59'),
(10, 0, 'Non Profit', NULL, 'EVENT', 'Non Profit', 1, '2013-10-25 21:23:13', '2013-10-25 21:23:13'),
(11, 0, 'Music', NULL, 'VENDOR', 'Music', 1, '2013-10-25 21:23:30', '2013-10-25 21:23:30'),
(12, 0, 'Food', NULL, 'VENDOR', 'Food', 1, '2013-10-25 21:23:41', '2013-10-25 21:23:41'),
(13, 0, 'Entertainer', NULL, 'VENDOR', 'Entertainer', 1, '2013-10-25 21:24:02', '2013-10-25 21:24:02'),
(14, 0, 'Rental', NULL, 'VENDOR', 'Rental', 1, '2013-10-25 21:24:19', '2013-10-25 21:24:19'),
(15, 0, 'Transportation', NULL, 'VENDOR', 'Transportation', 1, '2013-10-25 21:24:36', '2013-10-25 21:24:36'),
(16, 0, 'Photographer', NULL, 'VENDOR', 'Photographer', 1, '2013-10-25 21:24:48', '2013-10-25 21:24:48'),
(17, 0, 'Server', NULL, 'VENDOR', 'Server', 1, '2013-10-25 21:25:04', '2013-10-25 21:25:04'),
(18, 0, 'Decor', NULL, 'VENDOR', 'Decor', 1, '2013-10-25 21:25:13', '2013-10-25 21:25:13'),
(19, 0, 'Videographer', NULL, 'VENDOR', 'Videographer', 1, '2013-10-25 21:25:33', '2013-10-25 21:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `country_code` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `country_code_iso3` char(3) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `is_publish` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `IDX_COUNTRIES_NAME` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=240 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `country`, `country_code`, `country_code_iso3`, `is_publish`) VALUES
(1, 'United States', 'US', 'USA', 1),
(2, 'Canada', 'CA', 'CAN', 1),
(3, 'United Kingdom', 'GB', 'GBR', 1),
(4, 'Afghanistan', 'AF', 'AFG', 1),
(5, 'Albania', 'AL', 'ALB', 1),
(6, 'Algeria', 'DZ', 'DZA', 1),
(7, 'American Samoa', 'AS', 'ASM', 1),
(8, 'Andorra', 'AD', 'AND', 1),
(9, 'Angola', 'AO', 'AGO', 1),
(10, 'Anguilla', 'AI', 'AIA', 1),
(11, 'Antarctica', 'AQ', 'ATA', 1),
(12, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(13, 'Argentina', 'AR', 'ARG', 1),
(14, 'Armenia', 'AM', 'ARM', 1),
(15, 'Aruba', 'AW', 'ABW', 1),
(16, 'Australia', 'AU', 'AUS', 1),
(17, 'Austria', 'AT', 'AUT', 1),
(18, 'Azerbaijan', 'AZ', 'AZE', 1),
(19, 'Bahamas', 'BS', 'BHS', 1),
(20, 'Bahrain', 'BH', 'BHR', 1),
(21, 'Bangladesh', 'BD', 'BGD', 1),
(22, 'Barbados', 'BB', 'BRB', 1),
(23, 'Belarus', 'BY', 'BLR', 1),
(24, 'Belgium', 'BE', 'BEL', 1),
(25, 'Belize', 'BZ', 'BLZ', 1),
(26, 'Benin', 'BJ', 'BEN', 1),
(27, 'Bermuda', 'BM', 'BMU', 1),
(28, 'Bhutan', 'BT', 'BTN', 1),
(29, 'Bolivia', 'BO', 'BOL', 1),
(30, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(31, 'Botswana', 'BW', 'BWA', 1),
(32, 'Bouvet Island', 'BV', 'BVT', 1),
(33, 'Brazil', 'BR', 'BRA', 1),
(34, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(35, 'Brunei Darussalam', 'BN', 'BRN', 1),
(36, 'Bulgaria', 'BG', 'BGR', 1),
(37, 'Burkina Faso', 'BF', 'BFA', 1),
(38, 'Burundi', 'BI', 'BDI', 1),
(39, 'Cambodia', 'KH', 'KHM', 1),
(40, 'Cameroon', 'CM', 'CMR', 1),
(41, 'Cape Verde', 'CV', 'CPV', 1),
(42, 'Cayman Islands', 'KY', 'CYM', 1),
(43, 'Central African Republic', 'CF', 'CAF', 1),
(44, 'Chad', 'TD', 'TCD', 1),
(45, 'Chile', 'CL', 'CHL', 1),
(46, 'China', 'CN', 'CHN', 1),
(47, 'Christmas Island', 'CX', 'CXR', 1),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(49, 'Colombia', 'CO', 'COL', 1),
(50, 'Comoros', 'KM', 'COM', 1),
(51, 'Congo', 'CG', 'COG', 1),
(52, 'Cook Islands', 'CK', 'COK', 1),
(53, 'Costa Rica', 'CR', 'CRI', 1),
(54, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(55, 'Croatia', 'HR', 'HRV', 1),
(56, 'Cuba', 'CU', 'CUB', 1),
(57, 'Cyprus', 'CY', 'CYP', 1),
(58, 'Czech Republic', 'CZ', 'CZE', 1),
(59, 'Denmark', 'DK', 'DNK', 1),
(60, 'Djibouti', 'DJ', 'DJI', 1),
(61, 'Dominica', 'DM', 'DMA', 1),
(62, 'Dominican Republic', 'DO', 'DOM', 1),
(63, 'East Timor', 'TP', 'TMP', 1),
(64, 'Ecuador', 'EC', 'ECU', 1),
(65, 'Egypt', 'EG', 'EGY', 1),
(66, 'El Salvador', 'SV', 'SLV', 1),
(67, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(68, 'Eritrea', 'ER', 'ERI', 1),
(69, 'Estonia', 'EE', 'EST', 1),
(70, 'Ethiopia', 'ET', 'ETH', 1),
(71, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(72, 'Faroe Islands', 'FO', 'FRO', 1),
(73, 'Fiji', 'FJ', 'FJI', 1),
(74, 'Finland', 'FI', 'FIN', 1),
(75, 'France', 'FR', 'FRA', 1),
(76, 'France, Metropolitan', 'FX', 'FXX', 1),
(77, 'French Guiana', 'GF', 'GUF', 1),
(78, 'French Polynesia', 'PF', 'PYF', 1),
(79, 'French Southern Territories', 'TF', 'ATF', 1),
(80, 'Gabon', 'GA', 'GAB', 1),
(81, 'Gambia', 'GM', 'GMB', 1),
(82, 'Georgia', 'GE', 'GEO', 1),
(83, 'Germany', 'DE', 'DEU', 1),
(84, 'Ghana', 'GH', 'GHA', 1),
(85, 'Gibraltar', 'GI', 'GIB', 1),
(86, 'Greece', 'GR', 'GRC', 1),
(87, 'Greenland', 'GL', 'GRL', 1),
(88, 'Grenada', 'GD', 'GRD', 1),
(89, 'Guadeloupe', 'GP', 'GLP', 1),
(90, 'Guam', 'GU', 'GUM', 1),
(91, 'Guatemala', 'GT', 'GTM', 1),
(92, 'Guinea', 'GN', 'GIN', 1),
(93, 'Guinea-bissau', 'GW', 'GNB', 1),
(94, 'Guyana', 'GY', 'GUY', 1),
(95, 'Haiti', 'HT', 'HTI', 1),
(96, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(97, 'Honduras', 'HN', 'HND', 1),
(98, 'Hong Kong', 'HK', 'HKG', 1),
(99, 'Hungary', 'HU', 'HUN', 1),
(100, 'Iceland', 'IS', 'ISL', 1),
(101, 'India', 'IN', 'IND', 1),
(102, 'Indonesia', 'ID', 'IDN', 1),
(103, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(104, 'Iraq', 'IQ', 'IRQ', 1),
(105, 'Ireland', 'IE', 'IRL', 1),
(106, 'Israel', 'IL', 'ISR', 1),
(107, 'Italy', 'IT', 'ITA', 1),
(108, 'Jamaica', 'JM', 'JAM', 1),
(109, 'Japan', 'JP', 'JPN', 1),
(110, 'Jordan', 'JO', 'JOR', 1),
(111, 'Kazakhstan', 'KZ', 'KAZ', 1),
(112, 'Kenya', 'KE', 'KEN', 1),
(113, 'Kiribati', 'KI', 'KIR', 1),
(114, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(115, 'Korea, Republic of', 'KR', 'KOR', 1),
(116, 'Kuwait', 'KW', 'KWT', 1),
(117, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(118, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(119, 'Latvia', 'LV', 'LVA', 1),
(120, 'Lebanon', 'LB', 'LBN', 1),
(121, 'Lesotho', 'LS', 'LSO', 1),
(122, 'Liberia', 'LR', 'LBR', 1),
(123, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(124, 'Liechtenstein', 'LI', 'LIE', 1),
(125, 'Lithuania', 'LT', 'LTU', 1),
(126, 'Luxembourg', 'LU', 'LUX', 1),
(127, 'Macau', 'MO', 'MAC', 1),
(128, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1),
(129, 'Madagascar', 'MG', 'MDG', 1),
(130, 'Malawi', 'MW', 'MWI', 1),
(131, 'Malaysia', 'MY', 'MYS', 1),
(132, 'Maldives', 'MV', 'MDV', 1),
(133, 'Mali', 'ML', 'MLI', 1),
(134, 'Malta', 'MT', 'MLT', 1),
(135, 'Marshall Islands', 'MH', 'MHL', 1),
(136, 'Martinique', 'MQ', 'MTQ', 1),
(137, 'Mauritania', 'MR', 'MRT', 1),
(138, 'Mauritius', 'MU', 'MUS', 1),
(139, 'Mayotte', 'YT', 'MYT', 1),
(140, 'Mexico', 'MX', 'MEX', 1),
(141, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(142, 'Moldova, Republic of', 'MD', 'MDA', 1),
(143, 'Monaco', 'MC', 'MCO', 1),
(144, 'Mongolia', 'MN', 'MNG', 1),
(145, 'Montserrat', 'MS', 'MSR', 1),
(146, 'Morocco', 'MA', 'MAR', 1),
(147, 'Mozambique', 'MZ', 'MOZ', 1),
(148, 'Myanmar', 'MM', 'MMR', 1),
(149, 'Namibia', 'NA', 'NAM', 1),
(150, 'Nauru', 'NR', 'NRU', 1),
(151, 'Nepal', 'NP', 'NPL', 1),
(152, 'Netherlands', 'NL', 'NLD', 1),
(153, 'Netherlands Antilles', 'AN', 'ANT', 1),
(154, 'New Caledonia', 'NC', 'NCL', 1),
(155, 'New Zealand', 'NZ', 'NZL', 1),
(156, 'Nicaragua', 'NI', 'NIC', 1),
(157, 'Niger', 'NE', 'NER', 1),
(158, 'Nigeria', 'NG', 'NGA', 1),
(159, 'Niue', 'NU', 'NIU', 1),
(160, 'Norfolk Island', 'NF', 'NFK', 1),
(161, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(162, 'Norway', 'NO', 'NOR', 1),
(163, 'Oman', 'OM', 'OMN', 1),
(164, 'Pakistan', 'PK', 'PAK', 1),
(165, 'Palau', 'PW', 'PLW', 1),
(166, 'Panama', 'PA', 'PAN', 1),
(167, 'Papua New Guinea', 'PG', 'PNG', 1),
(168, 'Paraguay', 'PY', 'PRY', 1),
(169, 'Peru', 'PE', 'PER', 1),
(170, 'Philippines', 'PH', 'PHL', 1),
(171, 'Pitcairn', 'PN', 'PCN', 1),
(172, 'Poland', 'PL', 'POL', 1),
(173, 'Portugal', 'PT', 'PRT', 1),
(174, 'Puerto Rico', 'PR', 'PRI', 1),
(175, 'Qatar', 'QA', 'QAT', 1),
(176, 'Reunion', 'RE', 'REU', 1),
(177, 'Romania', 'RO', 'ROM', 1),
(178, 'Russian Federation', 'RU', 'RUS', 1),
(179, 'Rwanda', 'RW', 'RWA', 1),
(180, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(181, 'Saint Lucia', 'LC', 'LCA', 1),
(182, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(183, 'Samoa', 'WS', 'WSM', 1),
(184, 'San Marino', 'SM', 'SMR', 1),
(185, 'Sao Tome and Principe', 'ST', 'STP', 1),
(186, 'Saudi Arabia', 'SA', 'SAU', 1),
(187, 'Senegal', 'SN', 'SEN', 1),
(188, 'Seychelles', 'SC', 'SYC', 1),
(189, 'Sierra Leone', 'SL', 'SLE', 1),
(190, 'Singapore', 'SG', 'SGP', 1),
(191, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(192, 'Slovenia', 'SI', 'SVN', 1),
(193, 'Solomon Islands', 'SB', 'SLB', 1),
(194, 'Somalia', 'SO', 'SOM', 1),
(195, 'South Africa', 'ZA', 'ZAF', 1),
(196, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(197, 'Spain', 'ES', 'ESP', 1),
(198, 'Sri Lanka', 'LK', 'LKA', 1),
(199, 'St. Helena', 'SH', 'SHN', 1),
(200, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(201, 'Sudan', 'SD', 'SDN', 1),
(202, 'Suriname', 'SR', 'SUR', 1),
(203, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(204, 'Swaziland', 'SZ', 'SWZ', 1),
(205, 'Sweden', 'SE', 'SWE', 1),
(206, 'Switzerland', 'CH', 'CHE', 1),
(207, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(208, 'Taiwan', 'TW', 'TWN', 1),
(209, 'Tajikistan', 'TJ', 'TJK', 1),
(210, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(211, 'Thailand', 'TH', 'THA', 1),
(212, 'Togo', 'TG', 'TGO', 1),
(213, 'Tokelau', 'TK', 'TKL', 1),
(214, 'Tonga', 'TO', 'TON', 1),
(215, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(216, 'Tunisia', 'TN', 'TUN', 1),
(217, 'Turkey', 'TR', 'TUR', 1),
(218, 'Turkmenistan', 'TM', 'TKM', 1),
(219, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(220, 'Tuvalu', 'TV', 'TUV', 1),
(221, 'Uganda', 'UG', 'UGA', 1),
(222, 'Ukraine', 'UA', 'UKR', 1),
(223, 'United Arab Emirates', 'AE', 'ARE', 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_format`
--

CREATE TABLE IF NOT EXISTS `email_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` enum('0','1','2') NOT NULL COMMENT '''0-Visitor Login'',''1-Individual'',''2-Group''',
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `email_format`
--

INSERT INTO `email_format` (`id`, `title`, `subject`, `body`, `file_name`, `last_updated`, `status`) VALUES
(1, '0', 'Welcome to your Twinkle Star Dance account', '<table width="98%" cellspacing="0" cellpadding="0" style="border: solid 2px #a6a6a6; font-family:Arial, Helvetica, sans-serif">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="left" style="background:#cccccc; border-bottom:solid 2px #a6a6a6; font-size:22px; padding:5px 10px; font-family:''Times New Roman'', Times, serif !important"><span style="color:#bf0a22; font-size:22px; ">Twinkle </span>Star <span style="color:#bf0a22; font-size:22px; ">Dance</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" align="left">\r\n            <table width="630" height="216" cellspacing="0" cellpadding="10" border="0" align="center">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" align="left">\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Hi <strong>{USERNAME}</strong>,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Your <span style="font-size: larger;"><span style="color: rgb(255, 0, 255);"><strong>Twinkle Star Dance&trade;</strong></span></span>&nbsp;instructor account has been created. &nbsp;Your login details are below.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Username: <strong>{USERNAME}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Password:&nbsp;<strong>{PASSWORD}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif"><a href="http://www.twinklestardance.com/index/login" target="_blank"><strong>Click here to get started.</strong></a></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Be sure to add us to your safe list so all of your requests from <strong>Twinkle Star Dance</strong> arrive directly in your inbox rather than junk mail.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Warm regards,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">The Twinkle Star Dance Team</p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'WELCOME_INSTRUCTOR', '2012-08-08 00:00:00', '1'),
(2, '0', 'Forgot your password?', '<table width="98%" cellspacing="0" cellpadding="0" style="border: solid 2px #a6a6a6; font-family:Arial, Helvetica, sans-serif">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="left" style="background:#cccccc; border-bottom:solid 2px #a6a6a6; font-size:22px; padding:5px 10px; font-family:''Times New Roman'', Times, serif !important"><span style="color:#bf0a22; font-size:22px; ">Twinkle </span>Star <span style="color:#bf0a22; font-size:22px; ">Dance</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" align="left">\r\n            <table width="630" cellspacing="0" cellpadding="10" border="0" align="center" height="216">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" align="left">\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Hi <strong>{USERNAME}</strong>,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Your <span style="color:#bf0a22;">Twinkle Star Dance&trade;</span> account login details are below.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Username: <strong>{USERNAME}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Password:&nbsp;<strong>{PASSWORD}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif"><a href="http://www.twinklestardance.com/index/login" target="_blank"><span style="font-size: larger;"><strong>Click here to login now.</strong></span></a></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Be sure to add us to your safe list so all of your requests from <strong>TwinkleStarDance</strong> arrive directly in your inbox rather than junk mail.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Warm regards,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">The TwinkleStarDance Team</p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'FORGOT_PASSWORD', '2013-02-22 00:00:00', '1'),
(3, '0', 'Thank you for subscribing to Twinkle Star Dance', '<table width="98%" cellspacing="0" cellpadding="0" style="border: solid 2px #a6a6a6; font-family:Arial, Helvetica, sans-serif">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="left" style="background:#cccccc; border-bottom:solid 2px #a6a6a6; font-size:22px; padding:5px 10px; font-family:''Times New Roman'', Times, serif !important"><span style="color:#bf0a22; font-size:22px; ">Twinkle </span>Star <span style="color:#bf0a22; font-size:22px; ">Dance</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" align="left">\r\n            <table width="630" height="216" cellspacing="0" cellpadding="10" border="0" align="center">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" align="left">\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">&nbsp;</p>\r\n                        <span style="font-family: Arial, Helvetica, sans-serif;">Hi</span><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp;</span><strong style="font-family: Arial, Helvetica, sans-serif;">{USERNAME}</strong><span style="font-family: Arial, Helvetica, sans-serif;">,</span>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">&nbsp;</p>\r\n                        <span style="font-family: Arial, Helvetica, sans-serif;">Your</span><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: larger;"><span style="color: rgb(255, 0, 255);"><strong>Twinkle Star Dance&trade;</strong></span></span><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp;studio account has been created. &nbsp;Your login details are below.</span>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">Username:&nbsp;<strong>{USERNAME}</strong></p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">Password:&nbsp;<strong>{PASSWORD}</strong></p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;"><a href="http://www.twinklestardance.com/index/login" target="_blank"><span style="font-size: larger;"><strong>Click here to login.</strong></span></a></p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">&nbsp;</p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">Be sure to add us to your safe list so all of your requests from&nbsp;<strong>Twinkle Star Dance</strong>&nbsp;arrive directly in your inbox rather than junk mail.</p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">Warm regards,</p>\r\n                        <p style="font-family: Arial, Helvetica, sans-serif;">The Twinkle Star Dance Team</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">&nbsp;</p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'WELCOME_STUDIO', '2013-03-21 00:00:00', '1'),
(4, '0', 'Welcome to your Twinkle Star Dance account', '<table width="98%" cellspacing="0" cellpadding="0" style="border: solid 2px #a6a6a6; font-family:Arial, Helvetica, sans-serif">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="left" style="background:#cccccc; border-bottom:solid 2px #a6a6a6; font-size:22px; padding:5px 10px; font-family:''Times New Roman'', Times, serif !important"><span style="color:#bf0a22; font-size:22px; ">Twinkle </span>Star <span style="color:#bf0a22; font-size:22px; ">Dance</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" align="left">\r\n            <table width="630" height="216" cellspacing="0" cellpadding="10" border="0" align="center">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" align="left">\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Hi <strong>{USERNAME}</strong>,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">&nbsp;</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Your <span style="color:#bf0a22;">Twinkle Star Dance&trade;</span> account has been created! &nbsp;You may now access videos uploaded by your studio. &nbsp;</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Your login details are below.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Username: <strong>{USERNAME}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Password:&nbsp;<strong>{PASSWORD}</strong></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif"><a href="http://www.twinklestardance.com/index/login" target="_blank"><strong><span style="font-size: larger;">Click here to login and view your video(s).</span></strong></a></p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Be sure to add us to your safe list so all of your requests from <strong>TwinkleStarDance</strong> arrive directly in your inbox rather than junk mail.</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">Warm regards,</p>\r\n                        <p style="font-size:12px; font-family:Arial, Helvetica, sans-serif">The TwinkleStarDance Team</p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'WELCOME_DANCER', '2013-03-21 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_code` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `version` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_code`, `version`, `is_publish`) VALUES
(1, 'admin', '1.0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_pages`
--

CREATE TABLE IF NOT EXISTS `mst_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `custom_url_key` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `meta_title` text,
  `meta_keyword` text,
  `meta_description` text,
  `pos` int(11) DEFAULT '0',
  `created_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active, 2=deleted',
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `updated_user_id` (`updated_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Content Management' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_pages`
--

INSERT INTO `mst_pages` (`id`, `title`, `custom_url_key`, `content`, `meta_title`, `meta_keyword`, `meta_description`, `pos`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'About Us', 'about_us', '<p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>', NULL, NULL, NULL, 0, 1, 1, '2013-10-22 15:53:44', '2013-10-25 20:56:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_image_management`
--

CREATE TABLE IF NOT EXISTS `slider_image_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider_image_management`
--

INSERT INTO `slider_image_management` (`id`, `caption`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Donec gravida ultrices metus', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'e03f6abffc2ab43d2909f8ffa0fdced1.jpg', 1, '2013-10-24 23:32:53', '2013-10-25 23:33:47'),
(2, 'Donec gravida ultrices netus', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem\r\n', '57c2302293ab374daa2ecd3401bf5ee7.jpg', 1, '2013-10-25 19:37:57', '2013-10-25 23:33:57'),
(3, 'Donec gravida ultrices cetus', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem', '1f9efae589d33ce35a6df23e7c48a805.jpg', 1, '2013-10-25 19:38:54', '2013-10-25 23:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `state_abbv` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `country_id`, `state_name`, `state_abbv`, `status`) VALUES
(1, 1, 'Alaska', 'AK', 1),
(2, 1, 'Alabama', 'AL', 1),
(3, 1, 'Arkansas', 'AR', 1),
(4, 1, 'Arizona', 'AZ', 1),
(5, 1, 'California', 'CA', 1),
(6, 1, 'Colorado', 'CO', 1),
(7, 1, 'Connecticut', 'CT', 1),
(8, 1, 'Dist Of Col', 'DC', 1),
(9, 1, 'Delaware', 'DE', 1),
(10, 1, 'Florida', 'FL', 1),
(11, 1, 'Georgia', 'GA', 1),
(12, 1, 'Hawaii', 'HI', 1),
(13, 1, 'Iowa', 'IA', 1),
(14, 1, 'Idaho', 'ID', 1),
(15, 1, 'lllinois', 'IL', 1),
(16, 1, 'Indiana', 'IN', 1),
(17, 1, 'Kansas', 'KS', 1),
(18, 1, 'Kentucky', 'KY', 1),
(19, 1, 'Louisiana', 'LA', 1),
(20, 1, 'Massachusetts', 'MA', 1),
(21, 1, 'Maryland', 'MD', 1),
(22, 1, 'Maine', 'ME', 1),
(23, 1, 'Michigan', 'MI', 1),
(24, 1, 'Minnesota', 'MN', 1),
(25, 1, 'Missouri', 'MO', 1),
(26, 1, 'Mississippi', 'MS', 1),
(27, 1, 'Montana', 'MT', 1),
(28, 1, 'North Carolina', 'NC', 1),
(29, 1, 'North Dakota', 'ND', 1),
(30, 1, 'Nebraska', 'NE', 1),
(31, 1, 'New Hampshire', 'NH', 1),
(32, 1, 'New Jersey', 'NJ', 1),
(33, 1, 'New Mexico', 'NM', 1),
(34, 1, 'Nevada', 'NV', 1),
(35, 1, 'New York', 'NY', 1),
(36, 1, 'Ohio', 'OH', 1),
(37, 1, 'Oklahoma', 'OK', 1),
(38, 1, 'Oregon', 'OR', 1),
(39, 1, 'Pennsylvania', 'PA', 1),
(40, 1, 'Rhode Island', 'RI', 1),
(41, 1, 'South Carolina', 'SC', 1),
(42, 1, 'South Dakota', 'SD', 1),
(43, 1, 'Tennessee', 'TN', 1),
(44, 1, 'Texas', 'TX', 1),
(45, 1, 'Utah', 'UT', 1),
(46, 1, 'Virginia', 'VA', 1),
(47, 1, 'Vermont', 'VT', 1),
(48, 1, 'Washington', 'WA', 1),
(49, 1, 'Wisconsin', 'WI', 1),
(50, 1, 'West Virginia', 'WV', 1),
(51, 1, 'Wyoming', 'WY', 1),
(52, 16, 'NSW', '1', 1),
(53, 16, 'QLD', '1', 1),
(54, 16, 'VIC', '1', 1),
(55, 16, 'SA', '1', 1),
(56, 16, 'WA', '1', 1),
(57, 16, 'ACT', '1', 1),
(58, 16, 'TAS', '1', 1),
(59, 16, 'NT', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `is_fblogin` tinyint(1) NOT NULL DEFAULT '0',
  `ssn_number` varchar(255) DEFAULT NULL,
  `routing_number` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address_1` text,
  `address_2` text,
  `city` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_type` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `ethnicity` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `matial_status` varchar(255) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Admin,2-EventPlanner,3-Vendor',
  `user_type2` enum('INDIVDUAL','COMPANY') NOT NULL DEFAULT 'INDIVDUAL',
  `short_description` text,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active, 2-InActive',
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `role_id`, `email`, `password`, `facebook_id`, `is_fblogin`, `ssn_number`, `routing_number`, `account_number`, `bank_name`, `first_name`, `last_name`, `address_1`, `address_2`, `city`, `state_id`, `country_id`, `zip`, `phone`, `phone_type`, `date_of_birth`, `gender`, `ethnicity`, `income`, `matial_status`, `user_type`, `user_type2`, `short_description`, `start_time`, `end_time`, `available_days`, `status`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, NULL, NULL, NULL, NULL, 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, 1, 'INDIVDUAL', NULL, NULL, NULL, NULL, 1, NULL, '2013-10-22 00:00:00', '2013-10-22 00:00:00'),
(2, 0, 2, 'prakash@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, '85565SDF654565', 'SDF56SDF5', '5564955336', 'Corporate Bank', 'Prakash', 'Panchal', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, 2, 'INDIVDUAL', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE IF NOT EXISTS `user_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE IF NOT EXISTS `user_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_planner_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `event_planner_id` (`event_planner_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE IF NOT EXISTS `user_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Role ID',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Parent Role ID',
  `tree_level` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Role Tree Level',
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Role Sort Order',
  `role_name` varchar(50) NOT NULL COMMENT 'Role Name',
  `role_type` enum('admin','event_planner','vendor') NOT NULL COMMENT 'Role Type',
  `role_desc` text NOT NULL COMMENT 'RoleShort Descriptions',
  `is_publish` tinyint(1) NOT NULL COMMENT 'is published or not 1 or 0',
  PRIMARY KEY (`id`),
  KEY `IDX_ADMIN_ROLE_PARENT_ID_SORT_ORDER` (`parent_id`,`sort_order`),
  KEY `IDX_ADMIN_ROLE_TREE_LEVEL` (`tree_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='User Role Table' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `parent_id`, `tree_level`, `sort_order`, `role_name`, `role_type`, `role_desc`, `is_publish`) VALUES
(1, 0, 0, 0, 'Administrator', 'admin', 'Admininistror backend', 1),
(2, 0, 0, 0, 'Event Planner', 'event_planner', 'Event Planner Frontend', 1),
(3, 0, 0, 0, 'Vendor', 'vendor', 'Vendor Frontend', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_rules`
--

CREATE TABLE IF NOT EXISTS `user_rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Rule ID',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Role ID',
  `module_id` int(10) unsigned NOT NULL COMMENT 'Module ID',
  `role_desc` varchar(255) DEFAULT NULL COMMENT 'Role Descriptions',
  `privileges_controller` varchar(255) DEFAULT NULL COMMENT 'Privileges - Controller',
  `privileges_actions` varchar(255) DEFAULT NULL COMMENT 'Privileges - Action,Action',
  `permission` enum('allow','deny') DEFAULT NULL COMMENT 'Permission - 1 AND 0',
  `permission_type` varchar(255) DEFAULT NULL COMMENT 'Permission type *=allow all user, @=authenticate user only, ''<str>'' = allow specific user type | multiple[, comma seperated]',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniquedata` (`role_id`,`module_id`,`privileges_controller`,`privileges_actions`,`permission`,`permission_type`),
  KEY `FK_user_rules_user_role` (`role_id`),
  KEY `FK_user_rules_module` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='User Rule Table' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_rules`
--

INSERT INTO `user_rules` (`id`, `role_id`, `module_id`, `role_desc`, `privileges_controller`, `privileges_actions`, `permission`, `permission_type`) VALUES
(1, 1, 1, 'Login ,Logout', 'IndexController', 'login,logout', 'allow', 'admin'),
(2, 1, 1, 'Dashboard', 'IndexController', 'index,changepassword', 'allow', 'admin'),
(3, 1, 1, 'CMS pages', 'PagesController', 'create,update,delete,admin', 'allow', 'admin'),
(4, 1, 1, 'Category', 'CategoryController', 'create,update,delete,admin', 'allow', 'admin'),
(5, 1, 1, 'Users', 'UsersController', 'create,update,delete,admin', 'allow', 'admin'),
(6, 1, 1, 'Slider Image Management', 'SliderImageManagementController', 'create,update,delete,admin', 'allow', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_rules_menu`
--

CREATE TABLE IF NOT EXISTS `user_rules_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Menu Id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Menu Parent Id',
  `rule_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Rule ID',
  `module_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Rule ID',
  `label` varchar(50) NOT NULL COMMENT 'label text',
  `url` varchar(255) NOT NULL COMMENT 'menu url',
  `position` mediumint(5) unsigned NOT NULL COMMENT 'position for sortby',
  `is_active` tinyint(1) unsigned NOT NULL COMMENT 'is active',
  PRIMARY KEY (`id`),
  KEY `FK_user_rules_menu_user_rules` (`rule_id`),
  KEY `FK_user_rules_menu_module` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='User Rules Menu Table' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_rules_menu`
--

INSERT INTO `user_rules_menu` (`id`, `parent_id`, `rule_id`, `module_id`, `label`, `url`, `position`, `is_active`) VALUES
(1, 0, 1, 1, 'Home', '/admin/index/index', 1, 1),
(2, 0, 2, 1, 'CMS', '/admin/pages/admin', 4, 1),
(3, 0, 1, 1, 'Category', '/admin/category/admin', 2, 1),
(4, 0, 1, 1, 'Users', '/admin/users/admin', 3, 1),
(5, 0, 1, 1, 'Slider Management', '/admin/sliderImageManagement/admin', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_top5_questions`
--

CREATE TABLE IF NOT EXISTS `user_top5_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `question` text,
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_pages`
--
ALTER TABLE `mst_pages`
  ADD CONSTRAINT `mst_pages_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mst_pages_ibfk_2` FOREIGN KEY (`updated_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `state_master`
--
ALTER TABLE `state_master`
  ADD CONSTRAINT `state_master_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country_master` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `country_master` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `user_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD CONSTRAINT `user_comments_ibfk_1` FOREIGN KEY (`event_planner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_comments_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `user_photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_top5_questions`
--
ALTER TABLE `user_top5_questions`
  ADD CONSTRAINT `user_top5_questions_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
