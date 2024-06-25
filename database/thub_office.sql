-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 02:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thub_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments_tbl`
--

CREATE TABLE `appointments_tbl` (
  `appointment_id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` longtext NOT NULL,
  `service` varchar(255) NOT NULL,
  `images` longtext NOT NULL,
  `location` longtext NOT NULL,
  `lead_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `follow_up_date` date NOT NULL,
  `close_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments_tbl`
--

INSERT INTO `appointments_tbl` (`appointment_id`, `client`, `status`, `remarks`, `service`, `images`, `location`, `lead_type`, `date`, `follow_up_date`, `close_status`) VALUES
(4, 'IVY OVERSEAS', 'Client meeting', 'Need to change quotation', 'Bulk WhatsApp', '', '16.9840344,82.2404355', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(5, 'Foundation hospital', 'Client meeting', 'Need time', 'H M S', '', '16.9658778,82.2447714', 'hot', '2022-05-23', '2022-05-30', 'closing'),
(6, 'PRIME HOSPITAL', 'Visit', 'Meeting at 6pm today', 'Website', '', '16.9658778,82.2447714', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(7, 'Furniture world', 'Client meeting', 'Need to change plan', '', '', '16.9621092,82.235745', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(8, 'Tanishqgold jewellery', 'Visit', 'Need to discuss with MD', 'Social media marketing', '', '16.9470732,82.2318993', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(9, 'Sri Raj jewellery mall', 'Visit', 'Call after two days', 'Digital marketing', '', '16.9475939,82.2319507', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(10, 'Jain jewelly mall', 'Visit', 'If need they will call', '', '', '16.9476437,82.2320207', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(11, 'PSV jewellery', 'Visit', 'He will call', 'Digital marketing', '', '16.9480715,82.2319942', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(12, 'Sri Ram jems and jewellery', 'Visit', 'He will call ..', 'Digital marketing', '', '16.9484351,82.2319817', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(13, 'Jewel park', 'Visit', 'Call after 5', '', '', '16.9491842,82.2320491', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(14, 'Raj jewellery mall', 'Visit', 'Manager will discuss with MD and then he will call', 'Social media marketing', '', '16.9500543,82.2323769', 'hot', '2022-05-24', '2022-05-31', 'non-closing'),
(15, 'VAYYAARE ART', 'Client meeting', 'Need tome', 'Website', '', '16.95074,82.2320153', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(16, 'LAXMI HOSPITAL', 'Visit', 'Takes time ,they will call', '', '', '16.9725297,82.2486651', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(17, 'VASUNDARA SILVERS', 'Visit', 'Call after two days', '', '', '16.9482594,82.2315323', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(18, 'PSR&SONS JEWELLERY', 'Visit', 'If need he will call', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(19, 'Sri Lalitha jewellery', 'Visit', 'He will call if need', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(20, 'Sriya jewellery', 'Visit', 'If need he will call', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(21, 'Jhani diamonds and jewellery', 'Visit', 'Call after two\'days', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(22, 'RAJDEEP JEWELLERY', 'Visit', 'Not interested', '', '', '16.9709223,82.2360165', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(23, 'Sri  Lakshmi pearl and jewellery', 'Visit', 'He will call', '', '', '16.9728779,82.236722', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(24, 'Sri  Lakshmi pearl and jewellery', 'Visit', 'He will call', '', '', '17.0245085,82.2329142', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(25, 'Aditya developes', 'Client meeting', 'Bulk WhatsApp', '', '', '16.9841034,82.2408633', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(26, 'SRI BHAVANI MULTYSPESALITY DENTAL HOSPITAL', 'Visit', 'Meet doctor at 7 pm', 'Website', '', '16.9710295,82.235975', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(27, 'City hospital', 'Client meeting', 'Meet him tomorrow', '', '', '16.9953165,82.2473855', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(28, 'HOME COMFORTS', 'Visit', 'If need any service they will call(hr)', '', '', '16.9947512,82.2444259', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(29, 'Aditya developes', 'Client meeting', 'Follow up', '', '', '16.9842693,82.2408675', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(30, 'Greenwood school', 'Visit', 'They will call', 'Social media marketing', '', '16.9921692,82.2461046', 'cold', '2022-05-31', '2022-06-07', 'non-closing'),
(31, 'City hospital', 'Client meeting', 'Send the quotation', 'All services', '', '16.9952695,82.2473629', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(32, 'Delhi public kids school', 'Visit', 'Need to visit head office', '', '', '17.0017628,82.2623591', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(33, 'Sunrise school kkd', 'Visit', 'No need', '', '', '16.9983399,82.2631323', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(34, 'My value vision opticals', 'Visit', 'Call after two days', 'Bulk WhatsApp', '', '16.9513007,82.2353418', 'hot', '2022-06-01', '2022-06-08', 'non-closing'),
(35, 'M m car care', 'Visit', 'He will call in twodays', 'Website', '', '16.9573028,82.2335794', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(36, 'SUBHANIKETAN SCHOOL', 'Visit', 'If need any service they will call', '', '', '16.9977089,82.2302496', 'cold', '2022-06-02', '2022-06-09', 'non-closing'),
(37, 'Delhi public school', 'Visit', 'Brouchers required', '', '', '17.0127786,82.2321289', 'hot', '2022-06-02', '2022-06-09', 'non-closing'),
(38, 'Apex super spesality dental hospital', 'Visit', 'Contact next week', 'Website', '', '16.9718354,82.246849', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(39, 'Sri bhemeswara real-estate', 'Visit', 'Contact monday', '', '', '16.9678448,82.2426104', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(40, 'Atharva constructions', 'Visit', 'Need to call ', '', '', '16.9678159,82.2426633', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(41, 'Honeygroup', 'Visit', 'They will call ', '', '', '16.9675559,82.2441467', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(42, 'First cry ', 'Visit', 'Follow up', 'Bulk WhatsApp', '', '16.9531293,82.2343305', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(43, 'Tru moto', 'Visit', 'He will call', '', '', '16.9536454,82.2362838', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(44, 'Sri AP medicals', 'Visit', 'Need to contact owner', '', '', '16.9491209,82.2340392', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(45, 'Penta ramchandra and sons', 'Visit', 'They will call', '', '', '16.9490265,82.2342443', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(46, 'B new mobiles', 'Visit', '', '', '', '16.9490265,82.2342443', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(47, 'Sri Srinivasa furniture', 'Visit', 'He will call', 'Website', '', '16.9581294,82.233692', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(48, 'Ballons zone and decoration', 'Visit', 'Need time', 'Website', '', '16.9507147,82.2332945', 'cold', '2022-06-06', '2022-06-13', 'non-closing'),
(49, 'Rainbow restaurent', 'Visit', 'Call after two\'days', 'Website', '', '16.9722391,82.2332186', 'cold', '2022-06-06', '2022-06-13', 'non-closing'),
(50, 'Elite luxury family spa', 'Visit', 'They will call', 'Website', '', '16.9725031,82.2331178', 'cold', '2022-06-06', '2022-06-13', 'non-closing');

-- --------------------------------------------------------

--
-- Table structure for table `clients_invoices`
--

CREATE TABLE `clients_invoices` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `invoice` text NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_invoices`
--

INSERT INTO `clients_invoices` (`id`, `client_id`, `invoice`, `date`) VALUES
(1, '5', 'uploads/project-files/Screenshot_2024-05-29_153241.png', '2024-06-22'),
(2, '5', 'Screenshot_2024-05-21_195100.png', '2024-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `clients_tbl`
--

CREATE TABLE `clients_tbl` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL DEFAULT '',
  `client_email` varchar(255) NOT NULL DEFAULT '',
  `client_mobile` varchar(255) NOT NULL DEFAULT '',
  `client_address` longtext NOT NULL DEFAULT '',
  `client_details` longtext NOT NULL,
  `refered_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_on` datetime NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_tbl`
--

INSERT INTO `clients_tbl` (`client_id`, `client_name`, `client_email`, `client_mobile`, `client_address`, `client_details`, `refered_by`, `status`, `updated_on`, `added_on`) VALUES
(2, 'uday', 'udaykumarks84@gmail.com', '8712454545', 'Hyderabad', 'NA', 'Pavan', 1, '2023-10-19 22:22:53', '2023-10-19 21:30:59'),
(4, 'uday', 'udaykumarks84@gmail.com', '8712454545', 'Hyderabad', 'Na', 'Pavan', 1, '2024-02-20 12:43:53', '2024-02-20 07:13:32'),
(5, 'Raj', 'phaneendradigitalmarketing@gmail.com', '9642343434', 'sazxgvf sdaxxb vvcdxss', 'zsxbv cxzb scdxnb fsdcb ', 'phani', 1, '0000-00-00 00:00:00', '2024-02-20 08:19:12'),
(10, 'dfcghbj', 'dxvcbgnhjm@test.com', 'kfcbgvnhjkl', 'cfbvgnhjmkl', 'fbvgnmj,k', 'fbgvnhjmk', 1, '0000-00-00 00:00:00', '2024-06-25 01:04:59'),
(11, 'xdfcgvhb', 'fdxghbjnk@test.com', 'dghjk', 'dxfcghbjk', 'dxfcgvhbjm', 'dxfghjk', 1, '0000-00-00 00:00:00', '2024-06-25 01:05:33'),
(12, 'xdfcgvhb', 'fdxghbjnk@test.com', 'dghjk', 'dxfcghbjk', 'dxfcgvhbjm', 'dxfghjk', 1, '0000-00-00 00:00:00', '2024-06-25 01:05:44'),
(13, 'xdfcgvhb', 'fdxghbjnk@test.com', 'dghjk', 'dxfcghbjk', 'dxfcgvhbjm', 'dxfghjk', 1, '0000-00-00 00:00:00', '2024-06-25 01:06:22'),
(14, 'dfcgvhj', 'fghjk@test.com', 'dfcgvhbjk', 'fcgvhbjklm', 'fcghbjkl', 'dfcghbjk', 1, '0000-00-00 00:00:00', '2024-06-25 17:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients_updates`
--

CREATE TABLE `clients_updates` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_updates`
--

INSERT INTO `clients_updates` (`id`, `client_id`, `date`, `descriptions`) VALUES
(1, '5', 'fcgvhbj', '[\"fcgvhbjnkfgvhbjnk\",\"dfcgvhjk\"]'),
(2, '5', '2024-06-12', '[\"dfgchjk\"]'),
(3, '4', '2024-06-26', '[\"dxfghjk\"]');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assign_staff_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `work_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `desc_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `project_id`, `assign_staff_id`, `emp_id`, `work_type`, `date`, `content`, `desc_content`, `created_at`) VALUES
(5, 13, 63, 68, 'Facebook', '2024-05-17', 'gdjsnglsdbgl;sd', 'snlgkdjbsd;jkgb', '2024-05-02 10:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
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
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `city`, `added_on`) VALUES
(0, 'Admin', '', '2024-04-30 06:42:22'),
(2, 'Admin', 'Kakinada', '2024-04-30 06:46:38'),
(3, 'Social Media Management', 'Kakinada', '2024-04-30 06:49:17'),
(4, 'Designing', 'Kakinada', '2024-04-30 06:49:31'),
(5, 'Content Writer', 'Kakinada', '2024-04-30 06:49:59'),
(6, 'Website Development', 'Kakianda', '2024-04-30 06:50:55'),
(7, 'SEO specialist', 'Kakinada', '2024-04-30 06:50:31'),
(8, 'SEO Analyst', 'Kakinada', '2024-04-30 06:50:42'),
(9, 'Marketing', 'Kakianda', '2024-04-30 06:51:40'),
(10, 'Technical', 'Kakinada', '2024-04-30 06:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `holidays_tbl`
--

CREATE TABLE `holidays_tbl` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `holidays_tbl`
--

INSERT INTO `holidays_tbl` (`id`, `holiday_name`, `holiday_date`, `holiday_status`) VALUES
(16, 'Sri rama Navami', '2024-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_reason` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `updated_on` date NOT NULL,
  `applied_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(1, 2, 'Headache', 'Headache', 1, '2019-10-07', '2019-10-09', '0000-00-00', '2019-10-04'),
(2, 5, 'Casual Leave', 'allow me foe leave', 1, '2022-04-12', '2022-04-12', '0000-00-00', '2022-04-11'),
(3, 6, 'Casual Leave', 'refgtf', 2, '2022-04-24', '2022-04-24', '0000-00-00', '2022-04-22'),
(4, 6, 'personal', 'personal work', 0, '2022-04-27', '2022-04-28', '0000-00-00', '2022-04-27'),
(5, 15, 'For Hospital Lab Tests', 'please Approve my leave', 0, '2022-05-31', '2022-06-01', '0000-00-00', '2022-05-30'),
(6, 10, 'My brother marriage ', 'My brother marriage on 9th june 2022. So i have to attend please grant my leave', 0, '2022-06-08', '2022-06-10', '0000-00-00', '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `login_records_tbl`
--

CREATE TABLE `login_records_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_records_tbl`
--

INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(6, 6, '2022-04-14 17:18:22', '2022-04-14 17:28:44', '::1', 1),
(7, 1, '2022-04-14 17:29:09', '2022-04-14 17:30:03', '::1', 1),
(8, 1, '2022-04-14 17:30:58', '2022-04-14 17:31:08', '::1', 1),
(9, 1, '2022-04-16 15:59:15', '2022-04-16 16:00:04', '::1', 1),
(10, 1, '2022-04-16 16:00:11', '2022-04-16 16:48:49', '::1', 1),
(11, 6, '2022-04-16 16:48:54', '2022-04-16 16:50:16', '::1', 1),
(12, 6, '2022-04-16 16:50:19', '2022-04-16 17:00:35', '::1', 1),
(13, 6, '2022-04-16 17:00:37', '2022-04-16 17:33:52', '::1', 1),
(14, 1, '2022-04-16 17:33:58', '2022-04-16 17:35:49', '::1', 1),
(15, 6, '2022-04-16 17:35:53', '2022-04-16 17:36:16', '::1', 1),
(16, 1, '2022-04-16 17:36:19', NULL, '::1', 1),
(17, 1, '2022-04-20 15:47:43', '2022-04-20 16:07:57', '::1', 1),
(18, 6, '2022-04-20 16:08:01', NULL, '::1', 1),
(19, 6, '2022-04-20 16:46:54', '2022-04-20 17:03:50', '::1', 1),
(20, 1, '2022-04-20 17:03:54', '2022-04-20 17:15:31', '::1', 1),
(21, 6, '2022-04-20 17:15:34', '2022-04-20 17:16:40', '::1', 1),
(22, 1, '2022-04-20 17:16:44', '2022-04-20 17:20:02', '::1', 1),
(23, 6, '2022-04-20 17:20:05', NULL, '::1', 1),
(24, 1, '2022-04-22 08:03:09', '2022-04-22 08:16:24', '::1', 1),
(25, 6, '2022-04-22 08:16:28', '2022-04-22 08:16:49', '::1', 1),
(26, 1, '2022-04-22 08:16:54', '2022-04-22 08:21:20', '::1', 1),
(27, 6, '2022-04-22 08:21:25', '2022-04-22 08:21:51', '::1', 1),
(28, 1, '2022-04-22 08:21:56', '2022-04-22 08:22:11', '::1', 1),
(29, 6, '2022-04-22 08:22:15', '2022-04-22 09:10:09', '::1', 1),
(30, 1, '2022-04-22 09:10:13', '2022-04-22 09:40:22', '::1', 1),
(31, 6, '2022-04-22 09:40:25', '2022-04-22 09:46:54', '::1', 1),
(32, 1, '2022-04-22 09:46:58', '2022-04-22 09:52:41', '::1', 1),
(33, 6, '2022-04-22 09:52:45', '2022-04-22 09:58:21', '::1', 1),
(34, 1, '2022-04-22 09:58:24', NULL, '::1', 1),
(35, 1, '2022-04-23 09:32:09', NULL, '::1', 1),
(36, 1, '2022-04-23 15:47:04', NULL, '::1', 1),
(37, 1, '2022-04-25 12:26:45', '2022-04-25 13:23:09', '::1', 1),
(38, 6, '2022-04-25 13:23:24', '2022-04-25 13:24:31', '::1', 1),
(39, 1, '2022-04-25 13:24:40', '2022-04-25 13:28:10', '::1', 1),
(40, 1, '2022-04-25 15:33:38', '2022-04-25 15:34:13', '::1', 1),
(41, 6, '2022-04-25 15:34:17', '2022-04-25 15:43:02', '::1', 1),
(42, 1, '2022-04-25 15:43:06', '2022-04-25 15:43:55', '::1', 1),
(43, 6, '2022-04-25 15:43:58', '2022-04-25 16:45:40', '::1', 1),
(44, 1, '2022-04-25 16:45:49', '2022-04-25 17:26:16', '::1', 1),
(45, 6, '2022-04-25 17:26:19', '2022-04-25 17:34:09', '::1', 1),
(46, 6, '2022-04-25 17:34:12', '2022-04-25 17:37:43', '::1', 1),
(47, 1, '2022-04-25 17:37:47', '2022-04-25 17:38:48', '::1', 1),
(48, 1, '2022-04-25 17:38:51', NULL, '::1', 1),
(49, 1, '2022-04-25 12:28:56', NULL, '175.101.26.36', 1),
(50, 1, '2022-04-25 12:30:49', '2022-04-25 12:33:16', '175.101.26.36', 1),
(51, 6, '2022-04-25 12:33:32', NULL, '175.101.26.36', 1),
(52, 1, '2022-04-25 12:40:54', NULL, '175.101.26.36', 1),
(53, 1, '2022-04-25 12:49:13', '2022-04-25 12:56:02', '175.101.26.36', 1),
(54, 6, '2022-04-25 12:56:23', '2022-04-25 12:56:51', '175.101.26.36', 1),
(55, 1, '2022-04-25 13:16:05', '2022-04-25 13:17:42', '175.101.26.36', 1),
(56, 1, '2022-04-27 00:44:05', '2022-04-27 02:22:11', '49.156.148.14', 1),
(57, 6, '2022-04-27 02:23:25', NULL, '49.156.148.14', 1),
(58, 1, '2022-04-27 10:43:43', '2022-04-27 10:46:37', '175.101.26.36', 1),
(59, 6, '2022-04-27 10:46:45', '2022-04-27 11:05:47', '175.101.26.36', 1),
(60, 1, '2022-04-27 11:00:34', '2022-04-27 11:08:09', '49.156.148.14', 1),
(61, 1, '2022-04-27 11:05:50', '2022-04-27 11:06:26', '175.101.26.36', 1),
(62, 6, '2022-04-27 11:08:37', '2022-04-27 11:10:16', '49.156.148.14', 1),
(63, 1, '2022-04-27 11:10:21', '2022-04-27 11:17:27', '49.156.148.14', 1),
(64, 1, '2022-04-27 11:12:29', NULL, '175.101.26.36', 1),
(65, 6, '2022-04-27 11:17:32', '2022-04-27 11:18:16', '49.156.148.14', 1),
(66, 1, '2022-04-27 11:18:21', NULL, '49.156.148.14', 1),
(67, 1, '2022-04-28 08:59:10', '2022-04-28 08:59:43', '49.156.148.14', 1),
(68, 6, '2022-04-28 08:59:47', NULL, '49.156.148.14', 1),
(69, 1, '2022-04-28 12:14:07', NULL, '175.101.26.36', 1),
(70, 6, '2022-04-28 13:16:09', NULL, '49.205.210.160', 1),
(71, 1, '2022-04-29 07:18:44', NULL, '49.156.148.14', 1),
(72, 1, '2022-04-30 04:52:25', NULL, '49.156.148.14', 1),
(73, 1, '2022-04-30 09:46:56', NULL, '175.101.26.36', 1),
(74, 1, '2022-04-30 10:25:01', NULL, '175.101.26.36', 1),
(75, 1, '2022-04-30 11:39:55', NULL, '175.101.26.36', 1),
(76, 1, '2022-04-30 12:46:05', NULL, '175.101.26.36', 1),
(77, 1, '2022-05-02 05:01:22', '2022-05-02 05:02:41', '175.101.26.36', 1),
(78, 1, '2022-05-02 05:02:51', '2022-05-02 05:03:16', '175.101.26.36', 1),
(79, 1, '2022-05-02 11:37:03', '2022-05-02 11:40:04', '175.101.26.36', 1),
(80, 1, '2022-05-03 11:55:36', NULL, '175.101.26.36', 1),
(81, 1, '2022-05-03 13:27:39', '2022-05-03 13:28:48', '49.156.148.14', 1),
(82, 1, '2022-05-06 07:19:40', NULL, '49.156.148.14', 1),
(83, 1, '2022-05-06 07:36:08', NULL, '49.156.148.14', 1),
(84, 1, '2022-05-06 12:22:16', '2022-05-06 12:35:21', '175.101.26.36', 1),
(85, 14, '2022-05-06 12:35:31', '2022-05-06 12:38:56', '175.101.26.36', 1),
(86, 1, '2022-05-07 10:41:56', NULL, '49.156.148.14', 1),
(87, 14, '2022-05-09 18:50:00', '2022-05-09 22:06:42', '175.101.26.36', 1),
(88, 1, '2022-05-09 21:05:56', NULL, '175.101.26.36', 1),
(89, 1, '2022-05-09 21:31:59', NULL, '49.156.148.14', 1),
(90, 1, '2022-05-09 22:06:51', '2022-05-09 22:12:32', '175.101.26.36', 1),
(91, 1, '2022-05-09 22:13:15', '2022-05-09 22:18:28', '175.101.26.36', 1),
(92, 14, '2022-05-09 22:18:38', '2022-05-09 22:21:15', '175.101.26.36', 1),
(93, 1, '2022-05-09 22:32:10', '2022-05-09 22:35:30', '175.101.26.36', 1),
(94, 14, '2022-05-09 22:35:35', '2022-05-09 22:36:02', '175.101.26.36', 1),
(95, 1, '2022-05-09 22:36:07', '2022-05-09 22:36:38', '175.101.26.36', 1),
(96, 14, '2022-05-09 22:36:42', '2022-05-09 22:37:53', '175.101.26.36', 1),
(97, 1, '2022-05-10 09:53:47', NULL, '49.156.148.14', 1),
(98, 1, '2022-05-10 12:42:17', NULL, '49.156.148.14', 1),
(99, 14, '2022-05-10 19:17:31', NULL, '175.101.26.36', 1),
(100, 14, '2022-05-10 21:49:01', '2022-05-10 22:01:02', '175.101.26.36', 1),
(101, 14, '2022-05-12 18:47:13', '2022-05-12 22:05:22', '175.101.26.36', 1),
(102, 14, '2022-05-14 19:09:10', NULL, '175.101.26.36', 1),
(103, 14, '2022-05-14 21:43:41', '2022-05-14 21:45:48', '175.101.26.36', 1),
(104, 14, '2022-05-16 19:03:19', NULL, '175.101.26.36', 1),
(105, 1, '2022-05-16 22:19:18', '2022-05-16 22:22:09', '175.101.26.36', 1),
(106, 1, '2022-05-16 23:13:46', NULL, '49.156.148.14', 1),
(107, 1, '2022-05-17 10:19:27', NULL, '106.217.213.192', 1),
(108, 11, '2022-05-17 11:00:52', NULL, '115.98.12.54', 1),
(109, 14, '2022-05-17 19:00:10', '2022-05-17 21:58:31', '175.101.26.36', 1),
(111, 1, '2022-05-18 15:13:11', NULL, '49.156.148.14', 1),
(112, 14, '2022-05-18 19:05:26', NULL, '175.101.26.36', 1),
(113, 14, '2022-05-18 21:35:07', '2022-05-18 22:00:31', '175.101.26.36', 1),
(114, 14, '2022-05-19 18:57:43', NULL, '175.101.26.36', 1),
(115, 14, '2022-05-19 22:13:08', '2022-05-19 22:13:50', '175.101.26.36', 1),
(116, 14, '2022-05-20 19:03:30', '2022-05-20 22:07:28', '175.101.26.36', 1),
(117, 1, '2022-05-20 22:07:40', '2022-05-20 22:09:10', '175.101.26.36', 1),
(118, 1, '2022-05-21 20:02:13', '2022-05-21 21:40:32', '175.101.26.36', 1),
(119, 14, '2022-05-21 21:40:42', '2022-05-21 21:41:59', '175.101.26.36', 1),
(120, 14, '2022-05-21 21:44:14', NULL, '175.101.26.36', 1),
(121, 1, '2022-05-22 10:29:10', NULL, '49.156.148.14', 1),
(122, 14, '2022-05-22 19:26:00', NULL, '175.101.26.36', 1),
(123, 14, '2022-05-22 21:37:27', '2022-05-22 21:40:17', '175.101.26.36', 1),
(124, 14, '2022-05-22 21:40:21', NULL, '175.101.26.36', 1),
(125, 14, '2022-05-22 21:42:45', '2022-05-22 21:44:26', '175.101.26.36', 1),
(126, 1, '2022-05-22 21:43:05', '2022-05-22 21:53:57', '175.101.26.36', 1),
(127, 14, '2022-05-22 21:44:29', '2022-05-22 21:46:28', '175.101.26.36', 1),
(128, 14, '2022-05-22 21:46:32', '2022-05-22 21:51:50', '175.101.26.36', 1),
(129, 14, '2022-05-22 21:48:10', NULL, '175.101.26.36', 1),
(130, 14, '2022-05-22 21:52:17', '2022-05-22 21:52:22', '175.101.26.36', 1),
(131, 14, '2022-05-22 21:52:40', '2022-05-22 21:52:48', '175.101.26.36', 1),
(132, 1, '2022-05-23 09:15:55', NULL, '49.156.148.14', 1),
(133, 16, '2022-05-23 09:41:28', NULL, '49.156.148.14', 1),
(134, 15, '2022-05-23 09:41:39', NULL, '49.156.148.14', 1),
(135, 10, '2022-05-23 09:45:30', NULL, '49.156.148.14', 1),
(136, 17, '2022-05-23 09:47:21', NULL, '49.156.148.14', 1),
(137, 17, '2022-05-23 09:58:44', NULL, '49.156.148.14', 1),
(138, 15, '2022-05-23 15:32:14', NULL, '49.156.148.14', 1),
(139, 15, '2022-05-23 15:34:53', NULL, '223.187.76.176', 1),
(140, 10, '2022-05-23 15:34:59', NULL, '49.156.148.14', 1),
(141, 17, '2022-05-23 16:39:22', NULL, '117.246.72.72', 1),
(142, 15, '2022-05-23 18:35:05', NULL, '49.156.148.14', 1),
(143, 16, '2022-05-23 18:40:29', NULL, '49.156.148.14', 1),
(144, 14, '2022-05-23 18:57:22', NULL, '175.101.26.36', 1),
(145, 14, '2022-05-23 21:43:01', NULL, '175.101.26.36', 1),
(146, 15, '2022-05-24 09:36:33', NULL, '223.187.76.186', 1),
(147, 16, '2022-05-24 10:03:39', NULL, '49.156.148.14', 1),
(148, 17, '2022-05-24 11:18:48', NULL, '223.187.56.185', 1),
(149, 17, '2022-05-24 17:45:00', NULL, '49.156.148.14', 1),
(150, 16, '2022-05-24 18:26:46', NULL, '49.156.148.14', 1),
(151, 15, '2022-05-24 18:28:07', NULL, '49.156.148.14', 1),
(152, 14, '2022-05-24 19:07:26', NULL, '175.101.26.36', 1),
(153, 14, '2022-05-24 22:05:47', NULL, '175.101.26.36', 1),
(154, 16, '2022-05-25 10:00:27', NULL, '49.156.148.14', 1),
(155, 17, '2022-05-25 10:02:48', NULL, '49.156.148.14', 1),
(156, 17, '2022-05-25 10:53:57', NULL, '117.249.159.93', 1),
(157, 15, '2022-05-25 18:45:08', NULL, '49.156.148.14', 1),
(158, 16, '2022-05-25 18:49:23', NULL, '49.156.148.14', 1),
(159, 14, '2022-05-25 19:03:49', NULL, '175.101.26.36', 1),
(160, 14, '2022-05-25 22:07:05', '2022-05-25 22:07:26', '175.101.26.36', 1),
(161, 17, '2022-05-26 11:02:49', NULL, '117.249.159.93', 1),
(162, 16, '2022-05-26 11:20:27', NULL, '49.156.148.14', 1),
(163, 17, '2022-05-26 17:37:04', NULL, '117.249.159.93', 1),
(164, 15, '2022-05-26 18:32:17', NULL, '49.156.148.14', 1),
(165, 16, '2022-05-26 18:41:43', NULL, '49.156.148.14', 1),
(166, 14, '2022-05-26 18:54:36', NULL, '175.101.26.36', 1),
(167, 15, '2022-05-27 10:08:39', NULL, '49.156.148.14', 1),
(168, 16, '2022-05-27 18:30:38', NULL, '49.156.148.14', 1),
(169, 14, '2022-05-27 18:47:14', '2022-05-27 22:04:33', '175.101.26.36', 1),
(170, 15, '2022-05-27 18:48:06', NULL, '49.156.148.14', 1),
(171, 15, '2022-05-28 15:03:56', NULL, '223.185.92.167', 1),
(172, 15, '2022-05-28 15:03:57', NULL, '223.185.92.167', 1),
(173, 14, '2022-05-28 18:55:40', NULL, '175.101.26.36', 1),
(174, 14, '2022-05-28 22:07:01', '2022-05-28 22:07:17', '175.101.26.36', 1),
(175, 17, '2022-05-30 10:34:11', NULL, '117.251.237.0', 1),
(176, 15, '2022-05-30 17:00:51', NULL, '49.156.148.14', 1),
(177, 14, '2022-05-30 18:53:06', NULL, '175.101.26.36', 1),
(178, 14, '2022-05-30 22:05:07', '2022-05-30 22:05:53', '175.101.26.36', 1),
(179, 15, '2022-05-31 00:21:50', NULL, '223.185.108.181', 1),
(180, 16, '2022-05-31 10:35:54', NULL, '49.156.148.14', 1),
(181, 17, '2022-05-31 10:56:25', NULL, '117.246.80.32', 1),
(182, 1, '2022-05-31 12:39:16', NULL, '49.37.152.17', 1),
(183, 14, '2022-05-31 19:02:08', NULL, '175.101.26.36', 1),
(184, 14, '2022-05-31 22:01:30', '2022-05-31 22:02:24', '175.101.26.36', 1),
(185, 16, '2022-06-01 10:02:36', NULL, '49.156.148.14', 1),
(186, 17, '2022-06-01 11:12:25', NULL, '117.246.80.32', 1),
(187, 17, '2022-06-01 16:16:17', NULL, '117.246.80.32', 1),
(188, 16, '2022-06-01 18:53:04', NULL, '49.156.148.14', 1),
(189, 15, '2022-06-01 18:53:39', NULL, '49.156.148.14', 1),
(190, 14, '2022-06-01 20:05:28', NULL, '175.101.26.36', 1),
(191, 17, '2022-06-02 11:24:15', NULL, '117.246.177.197', 1),
(192, 15, '2022-06-02 18:32:00', NULL, '49.156.148.14', 1),
(193, 16, '2022-06-02 18:42:09', NULL, '49.156.148.14', 1),
(194, 14, '2022-06-02 18:57:19', NULL, '175.101.26.36', 1),
(195, 17, '2022-06-03 11:53:28', NULL, '117.246.205.38', 1),
(196, 15, '2022-06-03 12:43:24', NULL, '49.156.148.14', 1),
(197, 15, '2022-06-03 17:59:45', NULL, '49.156.148.14', 1),
(198, 16, '2022-06-03 18:20:28', NULL, '49.156.148.14', 1),
(199, 1, '2022-06-03 20:14:15', '2022-06-03 20:15:27', '106.217.245.240', 1),
(200, 14, '2022-06-03 20:15:34', NULL, '106.217.245.240', 1),
(201, 14, '2022-06-03 21:41:24', NULL, '175.101.26.36', 1),
(202, 17, '2022-06-04 10:23:15', NULL, '49.156.148.14', 1),
(203, 17, '2022-06-04 15:48:17', NULL, '49.156.148.14', 1),
(204, 14, '2022-06-04 19:24:00', NULL, '175.101.26.36', 1),
(205, 16, '2022-06-04 19:25:42', NULL, '49.156.148.14', 1),
(206, 1, '2022-06-05 09:08:12', NULL, '43.241.66.98', 1),
(207, 16, '2022-06-06 11:54:56', NULL, '106.217.231.3', 1),
(208, 10, '2022-06-06 11:59:14', NULL, '106.76.212.94', 1),
(209, 17, '2022-06-06 16:31:13', NULL, '117.242.89.189', 1),
(210, 15, '2022-06-06 18:05:55', '2022-06-06 18:10:28', '49.156.148.14', 1),
(211, 16, '2022-06-06 18:10:46', NULL, '106.77.162.0', 1),
(212, 14, '2022-06-06 18:52:14', NULL, '175.101.26.36', 1),
(213, 14, '2022-06-06 21:03:55', NULL, '175.101.26.36', 1),
(214, 10, '2022-06-07 18:48:48', NULL, '106.77.166.27', 1),
(215, 16, '2022-06-07 18:56:10', '2022-06-07 18:56:44', '106.77.166.27', 1),
(216, 15, '2022-06-07 18:56:51', NULL, '106.77.166.27', 1),
(217, 14, '2022-06-07 18:58:22', NULL, '175.101.26.36', 1),
(218, 16, '2022-06-07 19:00:27', NULL, '106.77.166.27', 1),
(219, 14, '2022-06-07 21:41:11', NULL, '175.101.26.36', 1),
(220, 15, '2022-06-08 18:11:19', '2022-06-08 18:19:27', '49.156.148.14', 1),
(221, 14, '2022-06-08 19:05:25', NULL, '175.101.26.36', 1),
(222, 14, '2022-06-08 22:05:47', NULL, '175.101.26.36', 1),
(223, 15, '2022-06-09 18:32:16', NULL, '49.156.148.14', 1),
(224, 16, '2022-06-09 18:43:28', NULL, '49.156.148.14', 1),
(225, 14, '2022-06-09 19:09:37', NULL, '175.101.26.36', 1),
(226, 14, '2022-06-09 21:42:26', NULL, '175.101.26.36', 1),
(227, 16, '2022-06-10 18:52:14', NULL, '49.156.148.14', 1),
(228, 15, '2022-06-10 18:52:22', NULL, '49.156.148.14', 1),
(229, 14, '2022-06-11 19:19:03', NULL, '175.101.26.36', 1),
(230, 14, '2022-06-11 21:50:07', '2022-06-11 21:50:25', '175.101.26.36', 1),
(231, 15, '2022-06-13 18:26:55', '2022-06-13 18:29:51', '49.156.148.14', 1),
(232, 1, '2022-06-13 22:16:34', '2022-06-13 22:26:29', '175.101.26.36', 1),
(233, 1, '2022-06-13 22:29:25', NULL, '49.156.148.14', 1),
(234, 10, '2022-06-14 09:39:34', NULL, '49.156.148.14', 1),
(235, 14, '2022-06-14 12:22:48', '2022-06-14 12:23:07', '175.101.26.36', 1),
(236, 15, '2022-06-14 18:02:37', NULL, '49.156.148.14', 1),
(237, 16, '2022-06-14 18:02:39', NULL, '49.156.148.14', 1),
(238, 14, '2022-06-14 19:12:26', NULL, '175.101.26.36', 1),
(239, 14, '2022-06-14 22:15:54', NULL, '175.101.26.36', 1),
(240, 10, '2022-06-15 10:00:46', NULL, '49.156.148.14', 1),
(241, 10, '2022-06-15 18:42:17', NULL, '49.156.148.14', 1),
(242, 16, '2022-06-15 18:59:00', NULL, '49.156.148.14', 1),
(243, 14, '2022-06-15 21:54:27', NULL, '175.101.26.36', 1),
(244, 15, '2022-06-16 18:24:21', NULL, '49.156.148.14', 1),
(245, 14, '2022-06-16 19:00:09', NULL, '175.101.26.36', 1),
(246, 14, '2022-06-16 22:02:40', NULL, '175.101.26.36', 1),
(247, 15, '2022-06-17 18:29:50', NULL, '49.156.148.14', 1),
(248, 16, '2022-06-17 18:30:37', NULL, '49.156.148.14', 1),
(249, 1, '2022-06-18 21:50:57', '2022-06-18 21:58:09', '175.101.26.36', 1),
(250, 14, '2022-06-18 21:58:14', NULL, '175.101.26.36', 1),
(251, 1, '2022-06-18 23:42:35', NULL, '49.156.148.14', 1),
(252, 10, '2022-06-20 11:28:47', NULL, '49.156.148.14', 1),
(253, 10, '2022-06-20 18:26:11', NULL, '49.156.148.14', 1),
(254, 16, '2022-06-20 18:26:16', NULL, '49.156.148.14', 1),
(255, 15, '2022-06-20 18:26:48', NULL, '49.156.148.14', 1),
(256, 1, '2022-06-21 11:33:38', NULL, '49.156.148.14', 1),
(257, 1, '2022-06-21 11:34:27', '2022-06-21 11:43:36', '175.101.26.36', 1),
(258, 15, '2022-06-21 18:21:56', NULL, '49.156.148.14', 1),
(259, 10, '2022-06-21 18:34:53', NULL, '49.156.148.14', 1),
(260, 1, '2022-06-21 19:10:44', NULL, '49.156.148.14', 1),
(261, 15, '2022-06-22 18:51:04', NULL, '49.156.148.14', 1),
(262, 16, '2022-06-22 18:59:02', NULL, '49.156.148.14', 1),
(263, 15, '2022-06-23 18:38:34', NULL, '49.156.148.14', 1),
(264, 16, '2022-06-23 18:41:37', NULL, '49.156.148.14', 1),
(265, 16, '2022-06-23 18:41:38', NULL, '49.156.148.14', 1),
(266, 15, '2022-06-24 18:50:35', NULL, '49.156.148.14', 1),
(267, 1, '2022-06-25 10:54:30', NULL, '49.156.148.14', 1),
(268, 16, '2022-06-27 18:26:49', NULL, '49.156.148.14', 1),
(269, 15, '2022-06-27 18:40:03', NULL, '49.156.148.14', 1),
(270, 16, '2022-06-28 19:22:19', NULL, '49.156.148.14', 1),
(271, 15, '2022-06-29 18:35:52', NULL, '49.156.148.14', 1),
(272, 16, '2022-06-29 18:42:38', NULL, '49.156.148.14', 1),
(273, 10, '2022-06-30 15:02:50', NULL, '49.156.148.14', 1),
(274, 16, '2022-06-30 18:53:07', NULL, '49.156.148.14', 1),
(275, 15, '2022-06-30 18:53:22', NULL, '49.156.148.14', 1),
(276, 16, '2022-07-01 18:23:42', NULL, '49.156.148.14', 1),
(277, 15, '2022-07-01 18:23:58', NULL, '49.156.148.14', 1),
(278, 16, '2022-07-01 18:24:25', NULL, '49.156.148.14', 1),
(279, 16, '2022-07-02 18:17:33', NULL, '49.156.148.14', 1),
(280, 15, '2022-07-02 18:25:32', NULL, '49.156.148.14', 1),
(281, 10, '2022-07-04 17:04:47', '2024-04-15 15:57:07', '49.156.148.14', 1),
(282, 15, '2022-07-04 18:28:18', '2022-07-04 18:32:23', '49.156.148.14', 1),
(283, 10, '2022-07-05 17:36:17', NULL, '49.156.148.14', 1),
(284, 15, '2022-07-05 18:41:24', NULL, '49.156.148.14', 1),
(285, 15, '2022-07-07 18:31:22', '2024-06-20 23:27:14', '49.156.148.14', 1),
(286, 15, '2022-07-08 18:34:35', NULL, '49.156.148.14', 1),
(287, 17, '2022-07-13 12:35:07', NULL, '106.77.166.113', 1),
(288, 10, '2022-07-14 14:19:36', NULL, '223.185.98.81', 1),
(289, 15, '2022-07-15 18:14:33', NULL, '49.156.148.14', 1),
(290, 1, '2022-07-18 22:08:03', '2022-07-18 22:11:12', '175.101.26.36', 1),
(291, 10, '2022-07-19 14:37:59', NULL, '49.156.148.14', 1),
(292, 10, '2022-07-19 18:28:33', NULL, '49.156.148.14', 1),
(293, 10, '2022-07-20 18:28:36', NULL, '49.156.148.14', 1),
(294, 1, '2022-07-25 15:56:53', '2022-07-25 15:59:34', '49.156.148.14', 1),
(295, 14, '2022-07-25 15:59:40', '2022-07-25 17:10:33', '49.156.148.14', 1),
(296, 1, '2022-07-25 17:10:39', NULL, '49.156.148.14', 1),
(297, 10, '2022-07-28 19:54:46', NULL, '49.156.148.14', 1),
(298, 1, '2022-07-29 18:31:16', NULL, '106.217.199.52', 1),
(299, 1, '2022-08-25 11:25:59', NULL, '49.156.148.14', 1),
(300, 1, '2022-08-29 11:02:39', NULL, '175.101.26.34', 1),
(301, 1, '2022-08-30 11:53:52', NULL, '223.185.67.132', 1),
(302, 1, '2022-09-16 12:05:12', NULL, '223.227.105.202', 1),
(303, 15, '2022-09-18 11:26:41', NULL, '157.48.217.163', 1),
(304, 1, '2022-09-21 14:56:47', NULL, '106.217.199.56', 1),
(305, 1, '2022-10-08 11:58:14', NULL, '223.185.115.154', 1),
(306, 1, '2022-10-08 13:41:01', NULL, '106.0.38.71', 1),
(307, 1, '2022-10-08 17:49:02', NULL, '144.48.225.121', 1),
(308, 1, '2022-10-20 15:16:27', NULL, '106.217.199.28', 1),
(309, 1, '2022-10-22 12:39:59', NULL, '106.217.199.18', 1),
(310, 1, '2022-10-25 10:17:19', NULL, '223.187.51.134', 1),
(311, 1, '2022-10-25 18:23:55', NULL, '106.0.38.71', 1),
(312, 1, '2022-10-25 18:26:05', '2022-10-25 18:34:07', '43.241.66.6', 1),
(313, 1, '2022-11-05 16:02:55', NULL, '223.187.44.176', 1),
(314, 1, '2022-11-05 21:09:36', NULL, '202.133.63.227', 1),
(315, 1, '2022-11-05 21:56:23', NULL, '49.37.130.25', 1),
(316, 1, '2022-11-26 19:11:37', NULL, '106.0.38.29', 1),
(317, 1, '2022-11-26 19:25:41', NULL, '202.133.63.227', 1),
(318, 15, '2023-03-10 12:42:11', '2023-03-10 12:42:53', '203.109.75.147', 1),
(319, 1, '2023-04-15 16:12:14', NULL, '202.133.63.226', 1),
(320, 1, '2023-04-15 16:14:22', NULL, '202.133.63.226', 1),
(321, 1, '2023-04-20 16:16:29', NULL, '223.187.35.152', 1),
(322, 1, '2023-04-20 17:05:08', NULL, '202.133.63.226', 1),
(323, 1, '2023-10-12 20:39:35', NULL, '152.58.197.30', 1),
(324, 14, '2023-10-12 20:58:51', NULL, '152.58.197.30', 1),
(325, 1, '2023-10-17 19:47:10', NULL, '106.195.75.152', 1),
(326, 1, '2023-10-18 00:25:16', NULL, '49.37.131.102', 1),
(327, 1, '2023-10-18 06:23:58', NULL, '202.133.63.226', 1),
(328, 1, '2023-10-18 21:30:57', NULL, '202.133.63.226', 1),
(329, 20, '2023-10-18 21:35:29', NULL, '202.133.63.226', 1),
(330, 1, '2023-10-19 09:52:13', NULL, '49.47.232.38', 1),
(331, 1, '2023-10-19 22:21:50', NULL, '202.133.63.226', 1),
(332, 1, '2023-10-21 12:35:40', NULL, '202.133.63.226', 1),
(333, 1, '2023-11-25 21:12:44', NULL, '202.133.63.226', 1),
(334, 1, '2023-11-27 14:32:14', NULL, '106.195.77.131', 1),
(335, 1, '2023-11-30 16:18:30', NULL, '49.47.234.112', 1),
(336, 1, '2023-12-28 15:59:09', NULL, '202.133.63.226', 1),
(337, 1, '2023-12-28 16:54:47', NULL, '202.133.63.226', 1),
(338, 1, '2023-12-28 20:34:35', NULL, '49.47.233.205', 1),
(339, 1, '2023-12-28 20:38:19', NULL, '202.133.63.226', 1),
(340, 1, '2023-12-29 10:36:05', NULL, '49.47.233.205', 1),
(341, 1, '2023-12-29 10:37:23', NULL, '49.47.233.205', 1),
(342, 1, '2023-12-29 11:46:25', NULL, '202.133.63.226', 1),
(343, 36, '2023-12-29 15:37:46', '2023-12-29 15:39:43', '49.47.233.205', 1),
(344, 24, '2023-12-29 19:14:48', NULL, '223.187.2.131', 1),
(345, 1, '2023-12-29 19:16:22', NULL, '223.187.2.131', 1),
(346, 1, '2023-12-30 08:58:44', NULL, '49.47.233.205', 1),
(347, 28, '2023-12-30 16:59:09', NULL, '49.47.233.205', 1),
(348, 23, '2023-12-30 17:05:03', NULL, '49.47.233.205', 1),
(349, 24, '2024-01-02 10:39:21', NULL, '49.47.233.205', 1),
(350, 24, '2024-01-03 11:20:10', NULL, '49.47.233.214', 1),
(351, 24, '2024-01-06 11:50:42', NULL, '49.47.232.33', 1),
(352, 1, '2024-01-06 13:13:29', NULL, '49.47.232.33', 1),
(353, 23, '2024-01-06 13:20:25', NULL, '49.47.232.33', 1),
(354, 22, '2024-01-06 13:22:47', NULL, '49.47.232.33', 1),
(355, 30, '2024-01-06 13:22:58', NULL, '49.47.232.33', 1),
(356, 22, '2024-01-06 13:27:24', NULL, '49.47.232.33', 1),
(357, 32, '2024-01-06 13:33:33', NULL, '49.47.232.33', 1),
(358, 27, '2024-01-06 13:37:37', NULL, '49.47.232.33', 1),
(359, 28, '2024-01-06 13:38:24', NULL, '49.47.232.33', 1),
(360, 34, '2024-01-06 13:50:37', NULL, '49.205.99.183', 1),
(361, 31, '2024-01-06 14:33:39', NULL, '49.47.232.33', 1),
(362, 22, '2024-01-06 14:40:50', NULL, '157.47.60.35', 1),
(363, 26, '2024-01-06 20:17:27', NULL, '122.173.150.5', 1),
(364, 24, '2024-01-10 15:11:27', NULL, '49.43.202.40', 1),
(365, 24, '2024-01-11 10:27:22', NULL, '49.43.202.40', 1),
(366, 30, '2024-01-11 11:49:17', NULL, '49.43.202.40', 1),
(367, 26, '2024-01-17 19:23:20', '2024-01-17 19:38:14', '171.78.187.194', 1),
(368, 25, '2024-01-17 19:24:32', '2024-01-17 19:39:53', '223.196.193.159', 1),
(369, 32, '2024-01-17 19:25:43', '2024-01-17 19:38:46', '203.109.75.215', 1),
(370, 32, '2024-01-17 19:38:58', '2024-01-17 19:39:09', '203.109.75.215', 1),
(371, 25, '2024-01-17 19:39:57', NULL, '223.196.193.159', 1),
(372, 25, '2024-01-17 23:06:40', NULL, '223.196.193.159', 1),
(373, 27, '2024-01-18 09:29:08', NULL, '49.43.202.214', 1),
(374, 23, '2024-01-18 09:29:33', NULL, '157.47.107.155', 1),
(375, 24, '2024-01-18 09:31:50', NULL, '223.238.62.109', 1),
(376, 27, '2024-01-18 09:31:52', NULL, '49.43.202.214', 1),
(377, 30, '2024-01-18 09:32:37', NULL, '49.43.202.214', 1),
(378, 26, '2024-01-18 09:33:34', NULL, '49.43.202.214', 1),
(379, 31, '2024-01-18 09:33:51', NULL, '49.43.202.214', 1),
(380, 33, '2024-01-18 09:34:23', NULL, '152.58.197.239', 1),
(381, 22, '2024-01-18 09:36:59', NULL, '157.47.30.109', 1),
(382, 28, '2024-01-18 09:37:13', NULL, '49.43.202.214', 1),
(383, 25, '2024-01-18 09:39:46', NULL, '49.43.202.214', 1),
(384, 21, '2024-01-18 09:42:10', NULL, '49.43.202.214', 1),
(385, 32, '2024-01-18 09:44:58', NULL, '49.43.202.214', 1),
(386, 1, '2024-01-18 10:07:30', NULL, '49.43.202.214', 1),
(387, 29, '2024-01-18 10:15:43', NULL, '49.43.202.214', 1),
(388, 22, '2024-01-18 18:18:39', '2024-01-18 18:19:06', '49.43.202.214', 1),
(389, 23, '2024-01-18 18:21:02', NULL, '49.43.202.214', 1),
(390, 31, '2024-01-18 18:26:58', NULL, '49.43.202.214', 1),
(391, 31, '2024-01-18 18:26:58', '2024-01-18 18:32:30', '49.43.202.214', 1),
(392, 25, '2024-01-18 18:32:06', '2024-01-18 18:32:40', '49.43.202.214', 1),
(393, 28, '2024-01-18 18:33:43', NULL, '49.43.202.214', 1),
(394, 29, '2024-01-18 18:37:04', NULL, '49.43.202.214', 1),
(395, 29, '2024-01-18 18:37:04', NULL, '49.43.202.214', 1),
(396, 27, '2024-01-18 18:40:32', NULL, '49.43.202.214', 1),
(397, 22, '2024-01-19 09:16:42', NULL, '157.47.25.239', 1),
(398, 30, '2024-01-19 09:24:40', NULL, '49.43.202.214', 1),
(399, 31, '2024-01-19 09:27:16', NULL, '49.43.202.214', 1),
(400, 27, '2024-01-19 09:28:12', NULL, '157.48.188.13', 1),
(401, 27, '2024-01-19 09:28:27', NULL, '157.48.188.13', 1),
(402, 26, '2024-01-19 09:30:59', NULL, '49.43.202.214', 1),
(403, 32, '2024-01-19 09:33:59', NULL, '49.43.202.214', 1),
(404, 25, '2024-01-19 09:34:21', NULL, '49.43.202.214', 1),
(405, 24, '2024-01-19 09:36:43', NULL, '223.238.62.109', 1),
(406, 28, '2024-01-19 09:37:58', NULL, '49.43.202.214', 1),
(407, 36, '2024-01-19 09:39:27', NULL, '49.37.134.153', 1),
(408, 21, '2024-01-19 09:42:26', NULL, '49.43.202.214', 1),
(409, 33, '2024-01-19 09:43:45', NULL, '152.58.197.55', 1),
(410, 33, '2024-01-19 09:43:46', NULL, '152.58.197.55', 1),
(411, 1, '2024-01-19 09:49:43', NULL, '49.43.202.214', 1),
(412, 29, '2024-01-19 09:50:05', NULL, '223.185.86.19', 1),
(413, 1, '2024-01-19 11:28:51', '2024-01-19 11:32:27', '202.133.63.226', 1),
(414, 22, '2024-01-19 18:37:16', '2024-01-19 18:38:02', '49.43.202.214', 1),
(415, 25, '2024-01-19 18:40:31', NULL, '49.43.202.214', 1),
(416, 25, '2024-01-19 18:40:32', '2024-01-19 18:40:37', '49.43.202.214', 1),
(417, 31, '2024-01-19 18:41:06', NULL, '49.43.202.214', 1),
(418, 31, '2024-01-19 18:41:07', '2024-01-19 18:41:17', '49.43.202.214', 1),
(419, 32, '2024-01-19 18:41:37', '2024-01-19 18:41:59', '49.43.202.214', 1),
(420, 26, '2024-01-19 18:42:10', '2024-01-19 18:42:17', '49.43.202.214', 1),
(421, 28, '2024-01-19 18:42:47', NULL, '49.43.202.214', 1),
(422, 28, '2024-01-19 18:42:57', NULL, '49.43.202.214', 1),
(423, 28, '2024-01-19 18:43:08', '2024-01-19 18:43:12', '49.43.202.214', 1),
(424, 33, '2024-01-19 18:43:38', '2024-01-19 18:43:43', '152.59.194.251', 1),
(425, 27, '2024-01-20 09:22:13', NULL, '157.48.165.105', 1),
(426, 23, '2024-01-20 09:25:39', NULL, '157.47.3.105', 1),
(427, 26, '2024-01-20 09:30:07', NULL, '49.43.202.214', 1),
(428, 30, '2024-01-20 09:30:22', NULL, '49.43.202.214', 1),
(429, 31, '2024-01-20 09:32:12', NULL, '106.195.68.212', 1),
(430, 25, '2024-01-20 09:36:25', NULL, '157.47.97.37', 1),
(431, 22, '2024-01-20 09:46:55', NULL, '157.48.66.80', 1),
(432, 28, '2024-01-20 09:47:18', NULL, '49.43.202.214', 1),
(433, 29, '2024-01-20 09:47:22', NULL, '223.187.22.7', 1),
(434, 28, '2024-01-20 09:47:27', NULL, '49.43.202.214', 1),
(435, 36, '2024-01-20 09:49:10', NULL, '49.43.202.214', 1),
(436, 32, '2024-01-20 09:49:30', NULL, '49.43.202.214', 1),
(437, 24, '2024-01-20 09:49:55', NULL, '223.238.62.109', 1),
(438, 25, '2024-01-20 18:34:03', '2024-01-20 18:34:08', '49.43.202.214', 1),
(439, 28, '2024-01-20 18:35:39', NULL, '49.43.202.214', 1),
(440, 28, '2024-01-20 18:35:40', '2024-01-20 18:35:43', '49.43.202.214', 1),
(441, 22, '2024-01-20 18:38:30', '2024-01-20 18:39:08', '157.48.73.214', 1),
(442, 36, '2024-01-20 18:38:32', NULL, '49.43.202.214', 1),
(443, 36, '2024-01-20 18:38:33', NULL, '49.43.202.214', 1),
(444, 28, '2024-01-20 18:38:55', '2024-01-20 18:39:16', '49.43.202.214', 1),
(445, 28, '2024-01-20 18:39:20', NULL, '49.43.202.214', 1),
(446, 23, '2024-01-22 09:21:54', NULL, '157.47.117.206', 1),
(447, 25, '2024-01-22 09:24:31', NULL, '49.43.202.214', 1),
(448, 30, '2024-01-22 09:28:44', NULL, '49.43.202.214', 1),
(449, 31, '2024-01-22 09:29:38', NULL, '49.43.202.214', 1),
(450, 27, '2024-01-22 09:30:11', NULL, '49.43.202.214', 1),
(451, 26, '2024-01-22 09:30:54', NULL, '49.43.202.214', 1),
(452, 32, '2024-01-22 09:40:11', NULL, '49.43.202.214', 1),
(453, 28, '2024-01-22 09:43:22', NULL, '49.43.202.214', 1),
(454, 24, '2024-01-22 09:50:56', NULL, '223.238.62.109', 1),
(455, 29, '2024-01-22 09:51:16', NULL, '49.43.202.214', 1),
(456, 36, '2024-01-22 09:55:12', NULL, '49.43.202.214', 1),
(457, 1, '2024-01-22 11:19:52', NULL, '49.43.202.214', 1),
(458, 24, '2024-01-22 11:22:37', NULL, '49.43.202.214', 1),
(459, 32, '2024-01-22 12:06:26', NULL, '49.43.202.214', 1),
(460, 32, '2024-01-22 12:10:20', NULL, '49.43.202.214', 1),
(461, 28, '2024-01-22 18:46:37', '2024-01-22 18:46:42', '49.43.202.214', 1),
(462, 25, '2024-01-22 18:46:40', NULL, '49.43.202.214', 1),
(463, 25, '2024-01-22 18:46:41', '2024-01-22 18:46:48', '49.43.202.214', 1),
(464, 29, '2024-01-22 18:51:20', NULL, '49.43.202.214', 1),
(465, 25, '2024-01-23 08:13:18', NULL, '49.43.202.214', 1),
(466, 31, '2024-01-23 09:14:36', NULL, '49.43.202.214', 1),
(467, 31, '2024-01-23 09:14:37', NULL, '49.43.202.214', 1),
(468, 30, '2024-01-23 09:30:50', NULL, '157.47.125.253', 1),
(469, 24, '2024-01-23 09:36:29', NULL, '49.43.202.214', 1),
(470, 27, '2024-01-23 09:37:10', NULL, '49.43.202.214', 1),
(471, 36, '2024-01-23 09:44:11', NULL, '49.43.202.214', 1),
(472, 36, '2024-01-23 09:44:12', NULL, '49.43.202.214', 1),
(473, 28, '2024-01-23 10:03:29', NULL, '49.43.202.214', 1),
(474, 28, '2024-01-23 18:44:03', '2024-01-23 18:44:07', '49.43.203.193', 1),
(475, 28, '2024-01-23 18:44:17', NULL, '49.43.203.193', 1),
(476, 31, '2024-01-23 18:45:12', '2024-01-23 18:45:15', '49.43.203.193', 1),
(477, 23, '2024-01-24 08:58:44', NULL, '49.43.203.193', 1),
(478, 30, '2024-01-24 09:22:24', NULL, '49.43.203.193', 1),
(479, 26, '2024-01-24 09:23:12', NULL, '49.43.203.193', 1),
(480, 31, '2024-01-24 09:25:36', NULL, '49.43.203.193', 1),
(481, 31, '2024-01-24 09:25:36', NULL, '49.43.203.193', 1),
(482, 22, '2024-01-24 09:29:46', NULL, '49.43.203.193', 1),
(483, 27, '2024-01-24 09:30:09', NULL, '157.48.173.92', 1),
(484, 28, '2024-01-24 09:30:11', NULL, '49.43.203.193', 1),
(485, 36, '2024-01-24 09:30:28', NULL, '49.43.203.193', 1),
(486, 36, '2024-01-24 09:30:29', NULL, '49.43.203.193', 1),
(487, 21, '2024-01-24 09:30:37', NULL, '49.43.203.193', 1),
(488, 32, '2024-01-24 09:33:58', NULL, '49.43.203.193', 1),
(489, 25, '2024-01-24 09:35:52', NULL, '157.47.38.22', 1),
(490, 25, '2024-01-24 09:35:52', NULL, '157.47.38.22', 1),
(491, 24, '2024-01-24 09:39:55', NULL, '223.187.2.150', 1),
(492, 29, '2024-01-24 09:56:40', NULL, '223.187.54.0', 1),
(493, 32, '2024-01-24 15:16:06', NULL, '49.43.203.193', 1),
(494, 28, '2024-01-24 18:37:27', '2024-01-24 18:37:32', '49.43.203.193', 1),
(495, 25, '2024-01-24 18:39:11', '2024-01-24 18:39:17', '49.43.203.193', 1),
(496, 26, '2024-01-24 18:42:36', '2024-01-24 18:42:42', '49.43.203.193', 1),
(497, 30, '2024-01-25 09:21:52', NULL, '49.43.203.193', 1),
(498, 25, '2024-01-25 09:24:29', NULL, '49.43.203.193', 1),
(499, 27, '2024-01-25 09:31:47', NULL, '157.47.59.152', 1),
(500, 1, '2024-01-25 09:33:09', NULL, '49.43.203.193', 1),
(501, 32, '2024-01-25 09:34:12', NULL, '49.43.203.193', 1),
(502, 24, '2024-01-25 09:34:15', NULL, '223.187.34.135', 1),
(503, 22, '2024-01-25 09:41:08', NULL, '49.43.203.193', 1),
(504, 36, '2024-01-25 09:41:12', NULL, '49.43.203.193', 1),
(505, 36, '2024-01-25 09:41:13', NULL, '49.43.203.193', 1),
(506, 32, '2024-01-25 12:23:55', NULL, '49.43.203.193', 1),
(507, 1, '2024-01-25 12:24:23', NULL, '49.43.203.193', 1),
(508, 1, '2024-01-25 12:25:11', '2024-01-25 12:32:29', '49.43.203.193', 1),
(509, 1, '2024-01-25 12:31:06', NULL, '202.133.63.226', 1),
(510, 32, '2024-01-25 12:32:36', '2024-01-25 12:44:01', '49.43.203.193', 1),
(511, 1, '2024-01-25 12:44:08', NULL, '49.43.203.193', 1),
(512, 1, '2024-01-25 15:29:27', NULL, '49.43.203.193', 1),
(513, 25, '2024-01-25 18:29:25', '2024-01-25 18:29:29', '49.43.203.193', 1),
(514, 25, '2024-01-25 18:29:34', NULL, '49.43.203.193', 1),
(515, 1, '2024-01-27 00:18:40', '2024-01-27 00:21:18', '202.133.63.226', 1),
(516, 29, '2024-01-27 09:12:24', NULL, '106.221.185.39', 1),
(517, 25, '2024-01-27 09:20:47', NULL, '157.47.93.128', 1),
(518, 27, '2024-01-27 09:28:01', NULL, '49.43.203.193', 1),
(519, 30, '2024-01-27 09:29:48', NULL, '49.43.203.193', 1),
(520, 23, '2024-01-27 09:30:23', NULL, '157.47.53.0', 1),
(521, 26, '2024-01-27 09:31:29', NULL, '49.43.203.193', 1),
(522, 32, '2024-01-27 09:33:29', NULL, '49.43.203.193', 1),
(523, 22, '2024-01-27 09:59:17', NULL, '49.43.203.193', 1),
(524, 22, '2024-01-27 09:59:18', '2024-01-27 09:59:52', '49.43.203.193', 1),
(525, 36, '2024-01-27 09:59:43', NULL, '49.43.203.193', 1),
(526, 24, '2024-01-27 09:59:50', NULL, '49.43.203.193', 1),
(527, 23, '2024-01-27 16:25:03', NULL, '49.43.203.193', 1),
(528, 22, '2024-01-27 18:52:11', '2024-01-27 18:52:18', '49.43.203.193', 1),
(529, 25, '2024-01-27 18:53:20', '2024-01-27 18:53:23', '49.43.203.193', 1),
(530, 29, '2024-01-27 18:53:45', NULL, '223.185.118.26', 1),
(531, 25, '2024-01-29 09:20:34', NULL, '49.43.203.193', 1),
(532, 31, '2024-01-29 09:21:16', NULL, '49.43.203.193', 1),
(533, 31, '2024-01-29 09:21:17', NULL, '49.43.203.193', 1),
(534, 26, '2024-01-29 09:21:59', NULL, '49.43.203.193', 1),
(535, 30, '2024-01-29 09:23:32', NULL, '157.48.220.151', 1),
(536, 23, '2024-01-29 09:25:37', NULL, '157.48.192.145', 1),
(537, 23, '2024-01-29 09:25:38', NULL, '157.48.192.145', 1),
(538, 27, '2024-01-29 09:37:59', NULL, '157.48.143.141', 1),
(539, 22, '2024-01-29 09:45:56', NULL, '157.47.55.24', 1),
(540, 32, '2024-01-29 09:57:51', NULL, '49.43.203.193', 1),
(541, 1, '2024-01-29 11:19:33', NULL, '202.133.63.226', 1),
(542, 24, '2024-01-29 12:33:55', NULL, '223.187.2.131', 1),
(543, 32, '2024-01-29 17:24:43', NULL, '49.43.203.193', 1),
(544, 25, '2024-01-29 18:27:44', '2024-01-29 18:31:02', '49.43.203.193', 1),
(545, 26, '2024-01-29 18:29:13', '2024-01-29 18:31:09', '49.43.203.193', 1),
(546, 32, '2024-01-30 09:08:45', NULL, '49.43.203.193', 1),
(547, 30, '2024-01-30 09:19:10', NULL, '157.47.45.228', 1),
(548, 25, '2024-01-30 09:21:51', NULL, '157.47.68.146', 1),
(549, 23, '2024-01-30 09:23:40', NULL, '157.47.11.57', 1),
(550, 23, '2024-01-30 09:23:41', NULL, '157.47.11.57', 1),
(551, 26, '2024-01-30 09:25:08', NULL, '49.43.203.193', 1),
(552, 22, '2024-01-30 09:33:30', NULL, '157.47.49.242', 1),
(553, 27, '2024-01-30 09:35:42', NULL, '49.43.203.193', 1),
(554, 36, '2024-01-30 09:38:10', NULL, '49.43.203.193', 1),
(555, 24, '2024-01-30 09:59:45', NULL, '223.185.114.154', 1),
(556, 26, '2024-01-30 18:29:55', '2024-01-30 18:30:16', '49.43.203.193', 1),
(557, 32, '2024-01-30 18:30:13', '2024-01-30 18:30:22', '49.43.203.193', 1),
(558, 25, '2024-01-30 18:30:14', '2024-01-30 18:30:20', '49.43.203.193', 1),
(559, 23, '2024-01-31 09:05:34', NULL, '49.43.203.193', 1),
(560, 30, '2024-01-31 09:23:12', NULL, '157.47.101.126', 1),
(561, 26, '2024-01-31 09:24:51', NULL, '49.43.203.193', 1),
(562, 31, '2024-01-31 09:30:12', NULL, '49.43.203.193', 1),
(563, 25, '2024-01-31 09:31:49', NULL, '157.47.67.201', 1),
(564, 1, '2024-01-31 09:36:23', NULL, '49.43.203.193', 1),
(565, 27, '2024-01-31 09:39:01', NULL, '49.43.203.193', 1),
(566, 24, '2024-01-31 09:51:20', NULL, '27.59.217.72', 1),
(567, 25, '2024-01-31 19:06:30', '2024-01-31 19:06:40', '49.43.203.193', 1),
(568, 23, '2024-02-01 09:13:58', NULL, '157.47.58.125', 1),
(569, 23, '2024-02-01 09:14:14', NULL, '157.47.58.125', 1),
(570, 30, '2024-02-01 09:24:10', NULL, '157.47.62.131', 1),
(571, 26, '2024-02-01 09:25:41', NULL, '49.43.203.193', 1),
(572, 31, '2024-02-01 09:26:34', NULL, '49.43.203.193', 1),
(573, 25, '2024-02-01 09:29:06', NULL, '157.47.80.77', 1),
(574, 27, '2024-02-01 09:35:52', NULL, '157.47.38.222', 1),
(575, 36, '2024-02-01 09:56:27', NULL, '49.43.203.193', 1),
(576, 22, '2024-02-01 09:56:41', '2024-02-01 10:00:50', '49.43.203.193', 1),
(577, 25, '2024-02-01 18:31:08', '2024-02-01 18:31:12', '49.43.203.193', 1),
(578, 26, '2024-02-01 18:31:38', '2024-02-01 18:31:47', '49.43.203.193', 1),
(579, 31, '2024-02-01 18:37:24', NULL, '49.43.203.193', 1),
(580, 31, '2024-02-01 18:37:25', '2024-02-01 18:37:30', '49.43.203.193', 1),
(581, 30, '2024-02-02 09:22:52', NULL, '157.48.179.71', 1),
(582, 31, '2024-02-02 09:23:11', NULL, '49.43.203.193', 1),
(583, 31, '2024-02-02 09:23:11', NULL, '49.43.203.193', 1),
(584, 32, '2024-02-02 09:23:45', NULL, '49.43.203.193', 1),
(585, 26, '2024-02-02 09:31:57', NULL, '49.43.203.193', 1),
(586, 22, '2024-02-02 09:33:58', '2024-02-02 09:34:04', '157.47.65.44', 1),
(587, 36, '2024-02-02 09:34:23', NULL, '49.43.203.193', 1),
(588, 23, '2024-02-02 09:36:32', NULL, '49.43.203.193', 1),
(589, 23, '2024-02-02 17:06:12', NULL, '49.43.203.193', 1),
(590, 32, '2024-02-02 17:41:27', NULL, '49.43.203.193', 1),
(591, 23, '2024-02-03 09:22:51', NULL, '49.43.203.193', 1),
(592, 22, '2024-02-03 09:31:33', NULL, '157.47.76.118', 1),
(593, 36, '2024-02-03 09:32:09', NULL, '49.43.203.193', 1),
(594, 36, '2024-02-03 09:32:10', NULL, '49.43.203.193', 1),
(595, 25, '2024-02-03 09:36:29', NULL, '49.43.203.193', 1),
(596, 31, '2024-02-03 09:38:21', NULL, '152.59.196.169', 1),
(597, 31, '2024-02-03 09:38:22', NULL, '152.59.196.169', 1),
(598, 29, '2024-02-03 09:47:26', NULL, '49.43.203.193', 1),
(599, 27, '2024-02-03 09:48:22', NULL, '49.43.203.193', 1),
(600, 25, '2024-02-03 11:42:31', NULL, '49.43.203.193', 1),
(601, 25, '2024-02-03 18:47:09', '2024-02-03 18:47:13', '49.43.203.193', 1),
(602, 26, '2024-02-03 18:47:48', '2024-02-03 18:47:53', '49.43.203.193', 1),
(603, 31, '2024-02-03 18:50:54', NULL, '152.59.196.158', 1),
(604, 31, '2024-02-03 18:50:54', '2024-02-03 18:50:56', '152.59.196.158', 1),
(605, 23, '2024-02-05 09:18:11', NULL, '157.48.158.245', 1),
(606, 25, '2024-02-05 09:35:27', NULL, '49.43.203.193', 1),
(607, 31, '2024-02-05 09:36:17', NULL, '49.43.203.193', 1),
(608, 31, '2024-02-05 09:36:18', NULL, '49.43.203.193', 1),
(609, 26, '2024-02-05 09:39:42', NULL, '49.43.203.193', 1),
(610, 30, '2024-02-05 09:47:47', NULL, '157.48.82.171', 1),
(611, 27, '2024-02-05 09:49:42', NULL, '49.43.203.193', 1),
(612, 32, '2024-02-05 09:55:21', NULL, '49.43.203.193', 1),
(613, 23, '2024-02-06 09:20:40', NULL, '49.43.203.193', 1),
(614, 25, '2024-02-06 09:31:22', NULL, '157.47.25.140', 1),
(615, 26, '2024-02-06 09:32:08', NULL, '49.43.203.193', 1),
(616, 30, '2024-02-06 09:36:18', NULL, '157.47.38.236', 1),
(617, 31, '2024-02-06 09:36:50', NULL, '49.43.203.193', 1),
(618, 27, '2024-02-06 10:12:16', NULL, '49.43.203.193', 1),
(619, 22, '2024-02-07 09:28:38', NULL, '49.43.203.193', 1),
(620, 30, '2024-02-07 09:30:46', NULL, '157.47.22.192', 1),
(621, 25, '2024-02-07 09:32:33', NULL, '157.47.2.148', 1),
(622, 32, '2024-02-07 09:33:18', NULL, '49.43.203.193', 1),
(623, 31, '2024-02-07 09:34:07', NULL, '152.58.196.28', 1),
(624, 31, '2024-02-07 09:34:08', NULL, '152.58.196.28', 1),
(625, 25, '2024-02-07 18:30:41', '2024-02-07 18:30:45', '49.43.203.193', 1),
(626, 23, '2024-02-08 09:10:25', NULL, '49.43.203.193', 1),
(627, 30, '2024-02-08 09:18:10', NULL, '157.48.200.187', 1),
(628, 32, '2024-02-08 09:21:54', NULL, '49.43.203.193', 1),
(629, 31, '2024-02-08 09:32:01', NULL, '49.43.203.193', 1),
(630, 31, '2024-02-08 09:32:01', NULL, '49.43.203.193', 1),
(631, 22, '2024-02-08 09:34:12', NULL, '157.47.83.127', 1),
(632, 25, '2024-02-08 09:35:06', NULL, '49.43.203.193', 1),
(633, 26, '2024-02-08 09:37:14', NULL, '49.43.203.193', 1),
(634, 27, '2024-02-08 09:41:43', NULL, '157.48.205.68', 1),
(635, 25, '2024-02-08 18:30:52', '2024-02-08 18:30:56', '49.43.203.193', 1),
(636, 32, '2024-02-09 09:10:18', NULL, '49.43.203.193', 1),
(637, 26, '2024-02-09 09:26:39', NULL, '49.43.203.193', 1),
(638, 22, '2024-02-09 09:32:03', NULL, '157.48.190.241', 1),
(639, 31, '2024-02-09 09:35:00', NULL, '49.43.203.193', 1),
(640, 31, '2024-02-09 09:35:01', NULL, '49.43.203.193', 1),
(641, 25, '2024-02-09 09:36:40', NULL, '49.43.203.193', 1),
(642, 27, '2024-02-09 09:49:09', NULL, '49.43.203.193', 1),
(643, 25, '2024-02-09 18:29:23', '2024-02-09 18:32:18', '49.43.203.193', 1),
(644, 29, '2024-02-09 18:30:17', NULL, '49.43.203.193', 1),
(645, 29, '2024-02-09 18:30:17', NULL, '49.43.203.193', 1),
(646, 31, '2024-02-10 09:18:28', NULL, '49.43.203.193', 1),
(647, 31, '2024-02-10 09:18:28', NULL, '49.43.203.193', 1),
(648, 26, '2024-02-10 09:26:25', NULL, '49.43.203.193', 1),
(649, 27, '2024-02-10 09:33:31', NULL, '157.48.66.174', 1),
(650, 32, '2024-02-10 09:37:38', NULL, '49.43.203.193', 1),
(651, 29, '2024-02-10 09:41:05', NULL, '223.187.22.6', 1),
(652, 25, '2024-02-10 09:46:39', NULL, '49.43.203.193', 1),
(653, 30, '2024-02-10 09:47:29', NULL, '157.48.246.161', 1),
(654, 1, '2024-02-10 15:19:32', NULL, '202.133.63.226', 1),
(655, 1, '2024-02-10 15:19:46', '2024-02-10 15:20:22', '202.133.63.226', 1),
(656, 20, '2024-02-10 15:20:57', '2024-02-10 15:21:12', '202.133.63.226', 1),
(657, 25, '2024-02-10 18:40:05', '2024-02-10 18:40:07', '49.43.203.193', 1),
(658, 29, '2024-02-10 18:46:35', NULL, '49.43.203.193', 1),
(659, 30, '2024-02-12 09:27:08', NULL, '157.47.116.13', 1),
(660, 23, '2024-02-12 09:30:26', NULL, '157.47.56.65', 1),
(661, 26, '2024-02-12 09:33:47', NULL, '49.43.203.193', 1),
(662, 36, '2024-02-12 09:35:17', NULL, '49.43.203.193', 1),
(663, 22, '2024-02-12 09:35:29', NULL, '49.43.203.193', 1),
(664, 27, '2024-02-12 09:41:40', NULL, '49.43.203.193', 1),
(665, 29, '2024-02-12 09:50:08', NULL, '223.185.86.3', 1),
(666, 25, '2024-02-12 18:11:10', NULL, '49.43.203.193', 1),
(667, 30, '2024-02-13 09:23:56', NULL, '157.47.64.205', 1),
(668, 31, '2024-02-13 09:32:52', NULL, '49.43.203.193', 1),
(669, 22, '2024-02-13 09:38:34', NULL, '157.48.247.165', 1),
(670, 1, '2024-02-13 09:39:00', NULL, '49.43.203.193', 1),
(671, 32, '2024-02-13 09:39:14', NULL, '49.43.203.193', 1),
(672, 25, '2024-02-13 09:42:18', NULL, '49.43.203.193', 1),
(673, 26, '2024-02-13 09:46:10', '2024-02-13 09:49:41', '49.43.203.193', 1),
(674, 25, '2024-02-13 18:30:31', '2024-02-13 18:30:36', '49.43.203.193', 1),
(675, 31, '2024-02-14 09:23:30', NULL, '49.43.203.193', 1),
(676, 29, '2024-02-14 09:29:52', NULL, '49.43.203.193', 1),
(677, 25, '2024-02-14 09:31:01', NULL, '49.43.203.193', 1),
(678, 26, '2024-02-14 09:32:37', NULL, '49.43.203.193', 1),
(679, 27, '2024-02-14 09:48:49', NULL, '49.43.203.193', 1),
(680, 25, '2024-02-14 13:29:27', NULL, '49.43.203.193', 1),
(681, 23, '2024-02-14 14:00:20', NULL, '157.47.89.176', 1),
(682, 25, '2024-02-14 18:26:02', '2024-02-14 18:30:31', '49.43.203.193', 1),
(683, 23, '2024-02-15 09:18:34', NULL, '157.47.55.193', 1),
(684, 26, '2024-02-15 09:23:17', NULL, '49.43.203.193', 1),
(685, 31, '2024-02-15 09:24:34', NULL, '49.43.203.193', 1),
(686, 32, '2024-02-15 09:28:03', NULL, '49.43.203.193', 1),
(687, 25, '2024-02-15 09:28:34', NULL, '49.43.203.193', 1),
(688, 25, '2024-02-15 09:28:41', NULL, '49.43.203.193', 1),
(689, 25, '2024-02-15 18:49:17', '2024-02-15 18:49:20', '49.43.203.193', 1),
(690, 30, '2024-02-16 09:27:34', NULL, '157.48.234.8', 1),
(691, 23, '2024-02-16 09:28:27', NULL, '49.43.203.193', 1),
(692, 26, '2024-02-16 09:31:28', NULL, '49.43.203.193', 1),
(693, 31, '2024-02-16 09:31:30', NULL, '49.43.203.193', 1),
(694, 25, '2024-02-16 09:36:27', NULL, '49.43.203.193', 1),
(695, 27, '2024-02-16 09:45:58', NULL, '49.43.203.193', 1),
(696, 32, '2024-02-16 09:46:25', NULL, '49.43.203.193', 1),
(697, 25, '2024-02-16 19:44:27', '2024-02-16 19:44:31', '49.43.203.193', 1),
(698, 1, '2024-02-16 19:50:38', '2024-02-16 20:00:50', '202.133.63.226', 1),
(699, 1, '2024-02-16 19:56:53', NULL, '203.109.75.192', 1),
(700, 1, '2024-02-16 20:01:12', NULL, '202.133.63.226', 1),
(701, 30, '2024-02-19 09:20:27', NULL, '157.47.56.1', 1),
(702, 23, '2024-02-19 09:25:40', NULL, '49.43.203.193', 1),
(703, 31, '2024-02-19 09:29:16', NULL, '49.43.203.193', 1),
(704, 32, '2024-02-19 09:43:45', '2024-02-19 09:43:55', '49.43.203.193', 1),
(705, 1, '2024-02-19 09:44:06', NULL, '49.43.203.193', 1),
(706, 26, '2024-02-19 09:45:25', NULL, '49.43.203.193', 1),
(707, 25, '2024-02-19 09:45:32', NULL, '49.43.203.193', 1),
(708, 26, '2024-02-19 09:50:28', NULL, '49.43.203.193', 1),
(709, 26, '2024-02-19 12:57:51', '2024-02-19 12:58:16', '49.43.203.193', 1),
(710, 26, '2024-02-19 12:58:18', NULL, '49.43.203.193', 1),
(711, 25, '2024-02-19 18:36:04', '2024-02-19 18:36:07', '49.43.203.193', 1),
(712, 1, '2024-02-19 20:35:02', NULL, '202.133.63.226', 1),
(713, 30, '2024-02-20 09:25:58', NULL, '157.48.244.208', 1),
(714, 27, '2024-02-20 09:34:13', NULL, '49.43.203.193', 1),
(715, 32, '2024-02-20 09:36:01', '2024-02-20 09:48:45', '49.43.203.193', 1),
(716, 1, '2024-02-20 09:37:10', '2024-02-20 09:40:11', '49.43.203.193', 1),
(717, 31, '2024-02-20 09:37:30', NULL, '49.43.203.193', 1),
(718, 26, '2024-02-20 09:39:59', NULL, '49.43.203.193', 1),
(719, 25, '2024-02-20 09:47:21', NULL, '49.43.203.193', 1),
(720, 32, '2024-02-20 09:48:28', NULL, '49.43.203.193', 1),
(721, 1, '2024-02-20 09:48:50', NULL, '49.43.203.193', 1),
(722, 26, '2024-02-20 09:49:00', NULL, '49.43.203.193', 1),
(723, 1, '2024-02-20 12:38:15', NULL, '202.133.63.226', 1),
(724, 1, '2024-02-20 12:41:46', NULL, '49.43.203.193', 1),
(725, 1, '2024-02-20 12:52:46', NULL, '49.43.203.193', 1),
(726, 22, '2024-02-20 14:31:00', NULL, '157.48.248.166', 1),
(727, 23, '2024-02-20 14:31:04', NULL, '157.48.164.120', 1),
(728, 1, '2024-02-20 14:54:00', NULL, '49.43.203.193', 1),
(729, 1, '2024-02-20 15:16:16', NULL, '49.43.203.193', 1),
(730, 1, '2024-02-20 15:26:29', NULL, '49.43.203.193', 1),
(731, 1, '2024-02-20 16:35:45', NULL, '49.43.203.193', 1),
(732, 44, '2024-02-21 09:29:10', NULL, '49.43.203.193', 1),
(733, 51, '2024-02-21 09:29:25', NULL, '157.47.34.220', 1),
(734, 46, '2024-02-21 09:32:39', NULL, '49.43.203.193', 1),
(735, 47, '2024-02-21 09:38:44', NULL, '49.43.203.193', 1),
(736, 43, '2024-02-21 09:52:15', NULL, '157.48.154.5', 1),
(737, 46, '2024-02-21 18:36:42', '2024-02-21 18:36:46', '49.43.203.193', 1),
(738, 47, '2024-02-22 09:37:24', NULL, '49.43.203.193', 1),
(739, 46, '2024-02-22 09:44:49', NULL, '49.43.203.193', 1),
(740, 44, '2024-02-22 10:07:18', NULL, '49.43.203.193', 1),
(741, 46, '2024-02-22 18:59:22', '2024-02-22 18:59:25', '49.43.203.193', 1),
(742, 46, '2024-02-23 11:58:04', NULL, '49.43.201.135', 1),
(743, 46, '2024-02-23 18:48:24', '2024-02-23 18:48:31', '49.43.201.135', 1),
(744, 51, '2024-02-24 09:18:03', NULL, '157.48.228.77', 1),
(745, 53, '2024-02-24 09:18:07', NULL, '49.43.201.135', 1),
(746, 44, '2024-02-24 09:24:09', NULL, '49.43.201.135', 1),
(747, 46, '2024-02-24 09:42:01', NULL, '49.43.201.135', 1),
(748, 47, '2024-02-24 09:42:21', NULL, '49.43.201.135', 1),
(749, 52, '2024-02-24 09:42:41', NULL, '49.43.201.135', 1),
(750, 46, '2024-02-24 18:48:09', '2024-02-24 18:48:11', '49.43.201.135', 1),
(751, 51, '2024-02-26 09:25:19', NULL, '49.43.201.135', 1),
(752, 46, '2024-02-26 09:35:08', NULL, '49.43.201.135', 1),
(753, 51, '2024-02-27 09:22:49', NULL, '157.47.100.191', 1),
(754, 46, '2024-02-27 09:48:22', NULL, '49.43.201.135', 1),
(755, 1, '2024-02-27 12:12:25', NULL, '49.43.201.135', 1),
(756, 46, '2024-02-27 18:31:13', '2024-02-27 18:31:16', '49.43.201.135', 1),
(757, 47, '2024-02-29 09:21:58', '2024-02-29 09:22:30', '49.43.201.135', 1),
(758, 51, '2024-02-29 09:28:16', NULL, '157.47.115.205', 1),
(759, 46, '2024-02-29 09:35:24', NULL, '49.43.201.135', 1),
(760, 52, '2024-02-29 09:44:46', NULL, '49.43.201.135', 1),
(761, 53, '2024-02-29 09:46:05', NULL, '49.43.201.135', 1),
(762, 52, '2024-03-01 09:24:29', NULL, '49.43.201.229', 1),
(763, 46, '2024-03-01 09:30:49', NULL, '49.43.201.229', 1),
(764, 46, '2024-03-01 18:43:15', '2024-03-01 18:43:18', '49.43.201.229', 1),
(765, 46, '2024-03-02 09:44:55', NULL, '49.43.201.229', 1),
(766, 46, '2024-03-02 18:49:54', '2024-03-02 18:49:59', '49.43.201.229', 1),
(767, 51, '2024-03-04 09:21:08', NULL, '157.48.221.149', 1),
(768, 46, '2024-03-04 09:21:10', NULL, '49.43.201.229', 1),
(769, 47, '2024-03-04 09:25:26', NULL, '49.43.201.229', 1),
(770, 53, '2024-03-04 09:34:54', NULL, '49.43.201.229', 1),
(771, 46, '2024-03-04 19:05:37', '2024-03-04 19:05:40', '49.43.201.229', 1),
(772, 47, '2024-03-05 09:33:59', NULL, '49.43.201.229', 1),
(773, 46, '2024-03-05 09:34:50', NULL, '49.43.201.229', 1),
(774, 46, '2024-03-05 18:41:06', '2024-03-05 18:41:09', '49.43.201.229', 1),
(775, 47, '2024-03-06 09:30:16', NULL, '49.43.201.229', 1),
(776, 46, '2024-03-06 09:30:16', NULL, '49.43.201.229', 1),
(777, 46, '2024-03-06 18:42:30', '2024-03-06 18:42:34', '49.43.201.229', 1),
(778, 47, '2024-03-07 09:34:30', NULL, '49.43.201.229', 1),
(779, 46, '2024-03-07 09:37:03', NULL, '49.43.201.229', 1),
(780, 52, '2024-03-07 09:37:39', NULL, '49.43.201.229', 1),
(781, 46, '2024-03-07 12:33:53', NULL, '49.43.201.229', 1),
(782, 46, '2024-03-07 19:02:31', '2024-03-07 19:02:35', '49.43.201.229', 1),
(783, 52, '2024-03-09 09:23:35', NULL, '49.43.201.229', 1),
(784, 46, '2024-03-09 09:30:10', NULL, '49.43.201.229', 1),
(785, 1, '2024-03-09 12:44:38', NULL, '49.43.201.229', 1),
(786, 44, '2024-03-09 18:42:16', NULL, '49.43.201.229', 1),
(787, 46, '2024-03-09 18:57:59', '2024-03-09 18:58:03', '49.43.201.229', 1),
(788, 1, '2024-03-09 20:24:13', NULL, '123.201.175.13', 1),
(789, 53, '2024-03-09 20:28:17', NULL, '123.201.175.13', 1),
(790, 52, '2024-03-10 09:31:27', NULL, '49.43.201.229', 1),
(791, 46, '2024-03-10 09:33:38', NULL, '49.43.201.229', 1),
(792, 47, '2024-03-10 09:34:30', NULL, '49.43.201.229', 1),
(793, 53, '2024-03-10 09:35:05', NULL, '49.43.201.229', 1),
(794, 43, '2024-03-10 09:35:59', NULL, '178.162.227.75', 1),
(795, 43, '2024-03-10 09:36:00', NULL, '178.162.227.75', 1),
(796, 1, '2024-03-10 12:04:26', NULL, '49.43.201.229', 1),
(797, 44, '2024-03-10 13:23:21', NULL, '49.43.201.229', 1),
(798, 46, '2024-03-10 18:49:13', '2024-03-10 18:49:16', '49.43.201.229', 1),
(799, 53, '2024-03-11 09:12:20', NULL, '49.43.201.229', 1),
(800, 51, '2024-03-11 09:23:50', NULL, '157.48.175.24', 1),
(801, 46, '2024-03-11 09:27:20', NULL, '49.43.201.229', 1),
(802, 47, '2024-03-11 09:30:40', NULL, '49.43.201.229', 1),
(803, 43, '2024-03-11 09:38:04', NULL, '49.43.201.229', 1),
(804, 52, '2024-03-11 10:05:01', NULL, '49.43.201.229', 1),
(805, 1, '2024-03-11 10:15:58', NULL, '122.181.217.226', 1),
(806, 49, '2024-03-11 10:25:24', NULL, '49.43.201.229', 1),
(807, 1, '2024-03-11 17:10:03', NULL, '122.181.217.226', 1),
(808, 46, '2024-03-11 18:29:06', '2024-03-11 18:30:21', '49.43.201.229', 1),
(809, 47, '2024-03-12 09:26:35', NULL, '49.43.201.229', 1),
(810, 51, '2024-03-12 09:32:53', NULL, '157.47.97.91', 1),
(811, 43, '2024-03-12 09:36:40', NULL, '157.48.127.181', 1),
(812, 52, '2024-03-12 11:25:39', NULL, '49.43.201.229', 1),
(813, 46, '2024-03-12 18:40:07', '2024-03-12 18:40:10', '49.43.201.229', 1),
(814, 47, '2024-03-13 09:28:08', NULL, '49.43.201.229', 1),
(815, 51, '2024-03-13 09:29:09', NULL, '157.47.12.203', 1),
(816, 46, '2024-03-13 09:34:36', NULL, '49.43.201.229', 1),
(817, 43, '2024-03-13 09:45:21', NULL, '157.48.172.253', 1),
(818, 46, '2024-03-13 18:50:44', '2024-03-13 18:50:47', '49.43.201.229', 1),
(819, 51, '2024-03-14 09:32:59', NULL, '157.48.192.4', 1),
(820, 46, '2024-03-14 09:35:25', NULL, '49.43.201.229', 1),
(821, 43, '2024-03-14 09:39:10', NULL, '157.48.221.115', 1),
(822, 46, '2024-03-14 18:40:49', NULL, '49.43.201.229', 1);
INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(823, 51, '2024-03-15 09:31:19', NULL, '157.47.98.166', 1),
(824, 46, '2024-03-15 09:36:32', NULL, '49.43.201.229', 1),
(825, 43, '2024-03-15 09:37:14', NULL, '157.48.203.157', 1),
(826, 43, '2024-03-19 09:26:38', NULL, '157.47.126.81', 1),
(827, 43, '2024-03-20 09:34:58', NULL, '157.48.66.196', 1),
(828, 46, '2024-03-20 09:38:12', NULL, '49.43.201.229', 1),
(829, 46, '2024-03-21 09:34:39', NULL, '49.43.203.93', 1),
(830, 47, '2024-03-21 09:45:32', NULL, '49.43.203.93', 1),
(831, 53, '2024-03-21 11:05:41', NULL, '49.43.203.93', 1),
(832, 46, '2024-03-21 18:41:58', '2024-03-21 18:42:03', '49.43.203.93', 1),
(833, 46, '2024-03-21 18:42:04', NULL, '49.43.203.93', 1),
(834, 43, '2024-03-22 09:34:11', NULL, '49.43.203.93', 1),
(835, 46, '2024-03-22 09:36:21', NULL, '49.43.203.93', 1),
(836, 46, '2024-03-22 18:38:36', '2024-03-22 18:38:42', '49.43.203.93', 1),
(837, 46, '2024-03-25 09:33:42', NULL, '49.43.203.162', 1),
(838, 46, '2024-03-25 18:44:30', '2024-03-25 18:44:34', '49.43.203.162', 1),
(839, 46, '2024-03-25 18:47:57', NULL, '49.43.203.162', 1),
(840, 46, '2024-03-26 09:30:35', NULL, '49.43.203.162', 1),
(841, 43, '2024-03-26 09:31:16', NULL, '157.48.226.200', 1),
(842, 47, '2024-03-26 09:31:51', NULL, '49.43.203.162', 1),
(843, 1, '2024-03-26 10:16:54', '2024-03-26 10:31:15', '49.43.203.162', 1),
(844, 47, '2024-03-26 10:20:53', NULL, '49.43.203.162', 1),
(845, 53, '2024-03-26 10:31:21', NULL, '49.43.203.162', 1),
(846, 47, '2024-03-26 10:31:29', NULL, '49.43.203.162', 1),
(847, 46, '2024-03-26 18:35:41', '2024-03-26 18:35:45', '49.43.203.162', 1),
(848, 43, '2024-03-27 09:28:18', NULL, '157.47.42.20', 1),
(849, 46, '2024-03-27 09:32:33', NULL, '49.43.203.162', 1),
(850, 47, '2024-03-27 09:32:40', NULL, '49.43.203.162', 1),
(851, 46, '2024-03-27 18:34:57', '2024-03-27 18:35:00', '49.43.203.162', 1),
(852, 46, '2024-03-28 09:24:03', NULL, '49.43.203.162', 1),
(853, 43, '2024-03-28 09:40:56', NULL, '157.48.95.67', 1),
(854, 47, '2024-03-30 10:27:26', NULL, '49.43.203.162', 1),
(855, 46, '2024-03-30 10:27:28', NULL, '49.43.203.162', 1),
(856, 47, '2024-03-30 10:27:34', NULL, '49.43.203.162', 1),
(857, 46, '2024-03-30 18:39:56', '2024-03-30 18:39:59', '49.37.135.47', 1),
(858, 43, '2024-04-01 09:30:48', NULL, '157.47.29.222', 1),
(859, 46, '2024-04-01 09:31:34', NULL, '49.37.135.47', 1),
(860, 47, '2024-04-01 09:35:13', NULL, '49.37.135.47', 1),
(861, 43, '2024-04-02 09:26:01', NULL, '157.48.74.222', 1),
(862, 43, '2024-04-03 09:30:06', NULL, '157.48.90.148', 1),
(863, 46, '2024-04-03 09:31:59', NULL, '49.37.128.239', 1),
(864, 46, '2024-04-03 18:42:29', '2024-04-03 18:42:32', '49.37.128.147', 1),
(865, 43, '2024-04-04 09:16:20', NULL, '49.37.128.147', 1),
(866, 47, '2024-04-04 09:22:32', NULL, '49.37.128.147', 1),
(867, 46, '2024-04-04 09:32:33', NULL, '49.37.128.147', 1),
(868, 46, '2024-04-04 18:44:44', '2024-04-04 18:44:46', '49.37.128.147', 1),
(869, 43, '2024-04-05 09:29:47', NULL, '49.37.128.147', 1),
(870, 43, '2024-04-06 09:29:12', NULL, '157.47.22.84', 1),
(871, 46, '2024-04-06 09:38:33', NULL, '49.37.128.147', 1),
(872, 46, '2024-04-06 18:34:46', '2024-04-06 18:34:50', '49.37.128.147', 1),
(873, 46, '2024-04-08 09:29:19', NULL, '49.37.128.147', 1),
(874, 46, '2024-04-08 18:39:17', '2024-04-08 18:39:27', '49.37.128.147', 1),
(875, 46, '2024-04-08 18:39:30', NULL, '49.37.128.147', 1),
(876, 46, '2024-04-10 09:31:57', NULL, '49.37.128.147', 1),
(877, 43, '2024-04-10 09:33:51', NULL, '157.47.24.160', 1),
(878, 1, '2024-04-10 12:16:24', NULL, '49.37.128.147', 1),
(879, 46, '2024-04-10 18:34:45', '2024-04-10 18:34:47', '49.37.128.147', 1),
(880, 46, '2024-04-11 09:31:45', NULL, '49.37.133.228', 1),
(881, 43, '2024-04-11 09:31:46', NULL, '157.47.11.148', 1),
(882, 46, '2024-04-12 09:48:49', NULL, '49.37.133.228', 1),
(883, 43, '2024-04-13 09:33:36', NULL, '157.48.128.54', 1),
(884, 46, '2024-04-13 09:58:15', NULL, '49.37.133.228', 1),
(885, 46, '2024-04-13 18:50:05', '2024-04-13 18:50:08', '49.37.133.228', 1),
(886, 43, '2024-04-15 09:24:38', NULL, '49.37.133.228', 1),
(887, 46, '2024-04-15 10:43:59', NULL, '49.37.133.228', 1),
(888, 1, '2024-04-15 11:56:01', NULL, '49.37.133.228', 1),
(889, 1, '2024-04-15 11:57:08', NULL, '49.37.133.228', 1),
(890, 1, '2024-04-15 12:00:01', NULL, '103.80.14.111', 1),
(891, 51, '2024-04-15 12:02:24', NULL, '49.37.133.228', 1),
(892, 1, '2024-04-15 14:39:21', NULL, '49.37.133.228', 1),
(893, 53, '2024-04-15 15:49:42', NULL, '::1', 1),
(894, 53, '2024-04-15 15:52:26', '2024-04-15 15:58:28', '::1', 1),
(895, 55, '2024-04-15 15:58:05', '2024-04-15 15:58:57', '::1', 1),
(896, 1, '2024-04-15 15:59:01', '2024-04-15 15:59:48', '::1', 1),
(897, 55, '2024-04-15 15:59:58', '2024-04-15 16:12:21', '::1', 1),
(898, 1, '2024-04-15 16:12:27', '2024-04-15 17:02:14', '::1', 1),
(899, 1, '2024-04-15 17:06:25', '2024-04-15 17:09:30', '::1', 1),
(900, 55, '2024-04-15 17:09:45', NULL, '::1', 1),
(901, 55, '2024-04-15 17:10:04', '2024-04-15 17:12:39', '::1', 1),
(902, 1, '2024-04-15 17:12:44', '2024-04-15 18:09:20', '::1', 1),
(903, 1, '2024-04-15 18:09:33', NULL, '::1', 1),
(904, 1, '2024-04-16 10:20:12', '2024-04-16 11:17:18', '::1', 1),
(905, 1, '2024-04-16 11:17:45', '2024-04-16 11:18:06', '::1', 1),
(906, 55, '2024-04-16 11:18:09', NULL, '::1', 1),
(907, 1, '2024-04-16 11:18:20', '2024-04-16 11:18:42', '::1', 1),
(908, 55, '2024-04-16 11:18:46', '2024-04-16 11:18:51', '::1', 1),
(909, 1, '2024-04-16 11:22:58', NULL, '::1', 1),
(910, 1, '2024-04-18 10:11:15', '2024-04-18 10:17:55', '::1', 1),
(911, 41, '2024-04-18 10:18:06', NULL, '::1', 1),
(912, 1, '2024-04-18 10:21:20', NULL, '::1', 1),
(913, 1, '2024-04-29 18:19:39', NULL, '::1', 1),
(914, 1, '2024-04-30 11:00:45', NULL, '::1', 1),
(915, 55, '2024-04-30 11:24:12', '2024-04-30 13:15:33', '::1', 1),
(916, 41, '2024-04-30 11:30:30', NULL, '::1', 1),
(917, 61, '2024-04-30 13:23:17', '2024-04-30 14:49:23', '::1', 1),
(918, 61, '2024-04-30 14:50:07', '2024-04-30 15:45:04', '::1', 1),
(919, 68, '2024-04-30 15:47:26', NULL, '::1', 1),
(920, 1, '2024-05-02 09:28:29', NULL, '::1', 1),
(921, 68, '2024-05-02 09:30:44', '2024-05-02 10:49:22', '::1', 1),
(922, 68, '2024-05-02 10:49:30', NULL, '::1', 1),
(923, 1, '2024-05-02 15:54:25', NULL, '::1', 1),
(924, 53, '2024-05-02 15:55:02', '2024-05-02 16:23:55', '::1', 1),
(925, 64, '2024-05-02 16:24:34', NULL, '::1', 1),
(926, 61, '2024-06-20 23:27:45', NULL, '::1', 1),
(927, 1, '2024-06-24 12:29:26', '2024-06-24 22:10:43', '::1', 1),
(928, 61, '2024-06-24 22:10:53', '2024-06-24 22:29:39', '::1', 1),
(929, 1, '2024-06-24 22:29:45', '2024-06-24 22:35:30', '::1', 1),
(930, 61, '2024-06-24 22:35:35', '2024-06-24 22:39:47', '::1', 1),
(931, 61, '2024-06-24 22:40:44', '2024-06-24 23:10:48', '::1', 1),
(932, 1, '2024-06-24 23:10:51', '2024-06-25 00:53:29', '::1', 1),
(933, 61, '2024-06-25 00:53:34', '2024-06-25 01:02:18', '::1', 1),
(934, 1, '2024-06-25 01:02:29', '2024-06-25 01:07:02', '::1', 1),
(935, 75, '2024-06-25 01:07:09', NULL, '::1', 1),
(936, 75, '2024-06-25 01:11:16', NULL, '::1', 1),
(937, 1, '2024-06-25 01:11:22', NULL, '::1', 1),
(938, 1, '2024-06-25 01:11:46', '2024-06-25 01:12:28', '::1', 1),
(939, 75, '2024-06-25 01:11:57', NULL, '::1', 1),
(940, 75, '2024-06-25 01:12:12', NULL, '::1', 1),
(941, 75, '2024-06-25 01:12:32', NULL, '::1', 1),
(942, 1, '2024-06-25 01:12:36', '2024-06-25 01:12:48', '::1', 1),
(943, 75, '2024-06-25 01:12:44', NULL, '::1', 1),
(944, 75, '2024-06-25 01:12:52', NULL, '::1', 1),
(945, 75, '2024-06-25 01:13:00', NULL, '::1', 1),
(946, 75, '2024-06-25 01:13:05', NULL, '::1', 1),
(947, 1, '2024-06-25 01:13:46', '2024-06-25 01:16:22', '::1', 1),
(948, 75, '2024-06-25 01:16:26', NULL, '::1', 1),
(949, 75, '2024-06-25 01:16:51', NULL, '::1', 1),
(950, 75, '2024-06-25 01:17:10', NULL, '::1', 1),
(951, 75, '2024-06-25 01:18:02', NULL, '::1', 1),
(952, 75, '2024-06-25 01:18:16', NULL, '::1', 1),
(953, 75, '2024-06-25 01:18:49', NULL, '::1', 1),
(954, 75, '2024-06-25 01:20:57', NULL, '::1', 1),
(955, 75, '2024-06-25 01:21:14', NULL, '::1', 1),
(956, 75, '2024-06-25 01:21:21', NULL, '::1', 1),
(957, 75, '2024-06-25 01:23:05', NULL, '::1', 1),
(958, 75, '2024-06-25 01:24:49', '2024-06-25 01:25:58', '::1', 1),
(959, 1, '2024-06-25 01:26:02', '2024-06-25 01:52:34', '::1', 1),
(960, 1, '2024-06-25 01:52:39', '2024-06-25 02:03:42', '::1', 1),
(961, 75, '2024-06-25 02:03:46', '2024-06-25 02:04:04', '::1', 1),
(962, 1, '2024-06-25 02:04:09', '2024-06-25 02:38:58', '::1', 1),
(963, 75, '2024-06-25 02:39:02', NULL, '::1', 1),
(964, 75, '2024-06-25 02:39:51', '2024-06-25 02:42:42', '::1', 1),
(965, 75, '2024-06-25 02:42:47', NULL, '::1', 1),
(966, 1, '2024-06-25 17:52:01', '2024-06-25 17:53:41', '::1', 1),
(967, 75, '2024-06-25 17:53:45', '2024-06-25 17:54:51', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `dept_id`, `status`) VALUES
(1, 'bhavicreations', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 1),
(60, 'rajkumar16371@gmail.com', '8fffa09391a77d0481a69128077cd173', 2, 0, 1),
(61, 'satya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0, 1),
(62, 'abhi@gmail.com', 'a5d383946c1544fb87f31bfc40c3bf33', 2, 0, 1),
(63, 'dileep@gmail.com', '0f7e44a922df352c05c5f73cb40ba115', 2, 0, 1),
(64, 'teja@gmail.com', '909bf518f91a15cd2522022409588b5b', 2, 0, 1),
(68, 'ram@gmail.com', '8fffa09391a77d0481a69128077cd173', 2, 4, 1),
(70, 'FDXCGHJK@test.com', '83432deff5add3e3e5f724deda0b4faa', 3, 0, 1),
(71, 'fdcghjbk@test.com', 'd74713f152910edc13858416dfc84926', 3, 0, 1),
(72, 'fdxcgvhbjkl@test.com', 'b55c5bd9d47a4b74846202ea8696fa99', 3, 0, 1),
(73, 'fdxghbjnk@test.com', 'bd20169e6a639ef3ba15e2069502ffc0', 3, 0, 1),
(74, 'fdxghbjnk@test.com', 'bd20169e6a639ef3ba15e2069502ffc0', 3, 0, 1),
(75, 'fdxghbjnk@test.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 0, 1),
(76, 'fghjk@test.com', '02a88de3d1487bf698c4d77b88bcbd40', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE `permissions_tbl` (
  `permission_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`permission_id`, `staff_id`, `module`, `permission`) VALUES
(2, 17, 'marketing', 'edit_access'),
(3, 11, 'marketing', 'edit_access'),
(4, 60, 'marketing', 'edit_access');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `expiry_date` date NOT NULL,
  `original_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `supplier` int(11) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `quantity_left` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `brand_name`, `category`, `date_added`, `expiry_date`, `original_price`, `selling_price`, `supplier`, `quantity`, `quantity_left`, `status`) VALUES
(1, 'Shampoo', 'Clinic Plus', 'shampoo', '2022-06-17', '2022-06-30', 9, 10, 4, 100, 80, 1),
(2, 'Hair Conditioner', 'Clinic Plus', 'Conditioner', '2022-06-17', '2022-07-10', 200, 225, 4, 50, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_tbl`
--

CREATE TABLE `projects_tbl` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_fb_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_insta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_pint_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_youtube_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_web_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_details` longtext NOT NULL,
  `project_files` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `project_end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects_tbl`
--

INSERT INTO `projects_tbl` (`id`, `project_name`, `project_fb_link`, `project_insta_link`, `project_pint_link`, `project_youtube_link`, `project_web_link`, `project_details`, `project_files`, `status`, `date_time`, `project_end_date`) VALUES
(13, 'earth-based', 'test', 'test', 'test', 'test', 'test', 'test', '', 1, '2024-04-30 00:00:00', '2024-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks_tbl`
--

CREATE TABLE `project_tasks_tbl` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_details` longtext NOT NULL,
  `task_daily` int(11) NOT NULL,
  `task_priority` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `completed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_tasks_tbl`
--

INSERT INTO `project_tasks_tbl` (`id`, `project_id`, `assigned_to`, `department`, `task_name`, `task_details`, `task_daily`, `task_priority`, `task_status`, `due_date`, `completed_date`) VALUES
(155, 13, '62', 2, 'fcgvh', 'fcgvhj', 0, 'low', 'test', '2024-06-21', '2024-06-27'),
(156, 13, '61', 9, 'cv bhghj: fgvhbjnk, cfgvhbj: fgvhbjn, dxfcgvhbjkbgyt6ygvh: fcgvhbjnk', 'cv bhghj: fgvhbjnk, cfgvhbj: fgvhbjn, dxfcgvhbjkbgyt6ygvh: fcgvhbjnk', 0, 'low', 'cfgvhbj', '2024-06-21', '2024-07-02'),
(157, 13, '61', 5, 'dxfcgvh: fdcgvhbjnk, drcfgvhj: dfcgvhjk', 'dxfcgvh: fdcgvhbjnk, drcfgvhj: dfcgvhjk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(158, 13, '61', 5, 'dxfcgvh: fdcgvhbjnk, drcfgvhj: dfcgvhjk', 'dxfcgvh: fdcgvhbjnk, drcfgvhj: dfcgvhjk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(159, 13, '61', 5, 'dxfcgvh: fdcgvhbjnk', 'dxfcgvh: fdcgvhbjnk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(160, 13, '61', 5, 'dxfcgvh: fdcgvhbjnk', 'dxfcgvh: fdcgvhbjnk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(161, 13, '63', 5, 'dxfcgvh: fdcgvhbjnk', 'dxfcgvh: fdcgvhbjnk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(162, 13, '63', 5, 'dxfcgvh: fdcgvhbjnk', 'dxfcgvh: fdcgvhbjnk', 0, 'low', 'test', '2024-06-14', '2024-06-20'),
(163, 13, '61', 2, 'dfcgvhj: dcfgvhbjk', 'dfcgvhj: dcfgvhbjk', 0, 'low', 'dxfcgv', '2024-06-27', '2024-06-19'),
(164, 13, '61', 2, 'dfcgvhj: dcfgvhbjk', 'dfcgvhj: dcfgvhbjk', 0, 'low', 'dxfcgv', '2024-06-27', '2024-06-19'),
(165, 13, '66', 7, 'dfcgvhbj: dfcgvhbjn, dfcgvhbj: fcgvhbj', 'dfcgvhbj: dfcgvhbjn, dfcgvhbj: fcgvhbj', 0, 'low', 'dxfgvhj', '2024-06-13', '2024-06-19'),
(166, 13, '66', 7, 'dfcgvhbj: dfcgvhbjn, dfcgvhbj: fcgvhbj', 'dfcgvhbj: dfcgvhbjn, dfcgvhbj: fcgvhbj', 0, 'low', 'dxfgvhj', '2024-06-13', '2024-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_duration` varchar(255) NOT NULL,
  `digital_services` longtext NOT NULL,
  `images` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `SEO` longtext NOT NULL,
  `links` longtext NOT NULL,
  `payment_installments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `client_id`, `project_duration`, `digital_services`, `images`, `description`, `SEO`, `links`, `payment_installments`) VALUES
(2, 6, '5 months', 'FB Insta', 'monthly', 'NA', 'NA', 'NA', 1),
(3, 7, '10 months', 'pintrest', 'yearly', 'rajkumar', 'NA', 'http://localhost/bhavi-oms/edit-client/7', 3),
(4, 4, '5 months', 'FB INSTA YOUTUBE', 'day', 'NA', 'NA', 'NA', 3),
(5, 5, '1 yeart', '', 'not-selected', '', '', '', 0),
(6, 6, '', '', 'not-selected', '', '', '', 0),
(7, 7, '', '', 'not-selected', '', '', '', 0),
(8, 8, '', '', 'not-selected', '', '', '', 0),
(9, 9, 'dfcghjbk', 'fghjkl', 'not-selected', 'fdxcgvhbjk', '', 'fdcghjkl', 3),
(10, 10, '', '', 'not-selected', '', '', '', 0),
(11, 11, '', '', 'not-selected', '', '', '', 0),
(12, 12, '', '', 'not-selected', '', '', '', 0),
(13, 13, '', '', 'not-selected', '', '', '', 0),
(14, 14, '', '', 'not-selected', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

CREATE TABLE `salary_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  `allowance` bigint(20) NOT NULL,
  `working_days` int(11) NOT NULL,
  `worked_days` int(11) NOT NULL,
  `no_of_leaves` int(11) NOT NULL,
  `salary_per_day` double NOT NULL,
  `total` bigint(20) NOT NULL,
  `payslip` text DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `basic_salary`, `allowance`, `working_days`, `worked_days`, `no_of_leaves`, `salary_per_day`, `total`, `payslip`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 2, 20000, 0, 31, 31, 0, 0, 20000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(2, 3, 18000, 0, 31, 31, 0, 0, 18000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(3, 4, 15000, 2500, 31, 31, 0, 0, 17500, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(6, 6, 20000, 2000, 31, 31, 0, 0, 22000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(8, 10, 15000, 0, 31, 31, 0, 0, 15000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(9, 12, 15000, 0, 31, 31, 0, 0, 15000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(10, 13, 6000, 0, 31, 31, 0, 0, 6000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(11, 14, 15000, 0, 31, 31, 0, 0, 15000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(13, 9, 50000, 0, 31, 31, 0, 0, 50000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(14, 11, 15000, 0, 31, 31, 0, 0, 15000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(15, 17, 30000, 0, 31, 31, 0, 0, 30000, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(17, 15, 2400, 0, 31, 31, 0, 0, 2400, NULL, 1, '0000-00-00', '2022-05-06 16:45:46'),
(20, 14, 10000, 0, 30, 30, 0, 333.33, 10000, NULL, 1, '0000-00-00', '2023-10-12 15:32:44'),
(21, 14, 10000, 0, 30, 30, 0, 333.33, 10000, NULL, 1, '0000-00-00', '2023-10-12 15:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL DEFAULT 'default-pic.jpg',
  `files` longtext NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `employee_id`, `blood_group`, `address`, `city`, `state`, `country`, `department_id`, `pic`, `files`, `added_by`, `updated_on`, `added_on`) VALUES
(60, 'Rajkumar Giduthuri', 'Male', 'rajkumar16371@gmail.com', 7981885538, '2024-04-18', '2024-04-30', '3434', '', '', 'Kakinada, Andhra Pradesh', 'Andhra Pradesh', 'India', 6, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 07:15:23'),
(61, 'satya', 'Male', 'satya@gmail.com', 9392220278, '2024-04-30', '2024-04-30', '1111', '', '', 'Kakinada, Andhra Pradesh', 'Andhra Pradesh', 'India', 5, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 07:47:32'),
(62, 'abhi', 'Male', 'abhi@gmail.com', 9505582768, '2024-04-30', '2024-04-30', '2222', '', '', 'Kakinada, Andhra Pradesh', 'Andhra Pradesh', 'India', 3, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 07:48:24'),
(63, 'dileep', 'Male', 'dileep@gmail.com', 1234567891, '2024-04-30', '2024-04-30', '122211', '', '', 'Kakinada, Andhra Pradesh', 'Andhra Pradesh', 'India', 7, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 07:49:41'),
(64, 'teja', 'Male', 'teja@gmail.com', 7418529631, '2024-04-16', '2024-04-30', '3434', '', '', 'Kakinada, Andhra Pradesh', 'Andhra Pradesh', 'India', 4, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 07:51:53'),
(65, 'raj', 'Male', 'raj@gmail.com', 7730052238, '2001-11-05', '2024-05-10', '7869', '', '', 'kakinada', 'ap', 'India', 5, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 09:46:33'),
(66, 'ram', 'Male', 'ram@gmail.com', 2385131789, '2000-04-05', '2024-11-05', '4561', '', '', 'kkd', 'ap', 'India', 6, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 09:50:27'),
(67, 'ram@gmaildn', 'Female', 'drams@fgmail.com', 7979484670, '2015-11-05', '2024-10-05', '7546', '', '', 'kkd', 'ap', 'India', 6, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 09:52:02'),
(68, 'dadsa', 'Male', 'ram@gmail.com', 9876548768, '2050-11-05', '2222-04-08', '56214', '', '', 'kkd', 'ap', 'British Indian Ocean Territory', 4, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 09:54:47'),
(69, 'fsdfsd', 'Male', 'taj@gmail.com', 7894257869, '2024-04-30', '2024-04-30', '7589', '', '', 'kkd', 'ap', 'India', 8, 'default-pic.jpg', '', 1, '0000-00-00', '2024-04-30 09:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_tbl`
--

CREATE TABLE `suppliers_tbl` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suppliers_tbl`
--

INSERT INTO `suppliers_tbl` (`id`, `supplier_name`, `address`, `contact_name`, `contact_phone`, `notes`) VALUES
(4, 'ABC Dealers', 'vijaywada', 'uday', '7326372632', 'assdvgfh'),
(5, 'ABC General Supplier	', 'kakinada', 'uday', '87123324251', 'general dealer'),
(7, 'SURYA', 'ADDRESS', 'SURYA', '383948393', 'GADAGDGDAS '),
(8, 'SURYA', 'ADDRESS', 'SURYA', '383948393', 'GADAGDGDAS ');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_tbl`
--

CREATE TABLE `worksheet_tbl` (
  `id` int(11) NOT NULL,
  `project_task_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `work_type_designer` varchar(255) DEFAULT NULL,
  `work_type_socialmedia` varchar(255) DEFAULT NULL,
  `website_type` varchar(255) DEFAULT NULL,
  `desc_designer` longtext DEFAULT NULL,
  `desc_socialmedia` longtext DEFAULT NULL,
  `desc_website` longtext DEFAULT NULL,
  `desc_SEO` longtext DEFAULT NULL,
  `ref_link_designer` longtext DEFAULT NULL,
  `content_designer` longtext DEFAULT NULL,
  `ref_file_designer` varchar(255) DEFAULT NULL,
  `p_kw_SEO` longtext DEFAULT NULL,
  `target_kw_SEO` longtext DEFAULT NULL,
  `gmb_SEO` longtext DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `fb_ads_socialmedia` longtext DEFAULT NULL,
  `g_ads_socialmedia` longtext DEFAULT NULL,
  `work_type_content` varchar(255) DEFAULT NULL,
  `desc_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worksheet_tbl`
--

INSERT INTO `worksheet_tbl` (`id`, `project_task_id`, `department`, `staff_id`, `client_name`, `assign_date`, `work_type_designer`, `work_type_socialmedia`, `website_type`, `desc_designer`, `desc_socialmedia`, `desc_website`, `desc_SEO`, `ref_link_designer`, `content_designer`, `ref_file_designer`, `p_kw_SEO`, `target_kw_SEO`, `gmb_SEO`, `delivery_date`, `fb_ads_socialmedia`, `g_ads_socialmedia`, `work_type_content`, `desc_content`) VALUES
(1, 152, 19, 55, 'uday', '2024-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Poster', 'give content for a poster'),
(2, 152, 19, 55, 'uday', '2024-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'give content for a reel which includes doctors'),
(3, 153, 11, 41, 'Raj', '2024-04-30', 'phamplet', NULL, NULL, 'test', NULL, NULL, NULL, 'iuhdfhdgodfih', 'nbidflghdflgndflgooiiiiiiii', 'a:2:{i:0;s:27:\"assets/designer_imgs/d3.jpg\";i:1;s:27:\"assets/designer_imgs/d2.jpg\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 153, 11, 41, 'uday', '2024-04-30', 'video', NULL, NULL, 'test', NULL, NULL, NULL, 'gdfg', 'tdgdfgdfg', 'a:2:{i:0;s:31:\"assets/designer_imgs/logo3.avif\";i:1;s:31:\"assets/designer_imgs/logo2.avif\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 165, 7, 66, 'uday', '2024-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dxfghjk', 'dxfcghj', 'dxfcgvhbjk', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_reports_tbl`
--

CREATE TABLE `work_reports_tbl` (
  `id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `work_details` longtext NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `on_date` date NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_reports_tbl`
--

INSERT INTO `work_reports_tbl` (`id`, `project_id`, `task_id`, `staff_id`, `work_details`, `work_status`, `on_date`, `added_by`) VALUES
(1, '4', '1', 32, 'test', 'pending', '2024-01-25', 0),
(2, '5', '3', 53, 'uday sir work is half complete and half pending and new website landing page completed', 'pending', '2024-03-09', 0),
(3, '10', '11', 41, 'hggjfj', 'jgfjgf', '2024-04-18', 0),
(4, '13', '13', 61, 'dfghgceuhwj', 'dfghjk', '2024-06-20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments_tbl`
--
ALTER TABLE `appointments_tbl`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `clients_invoices`
--
ALTER TABLE `clients_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `clients_updates`
--
ALTER TABLE `clients_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_tbl`
--
ALTER TABLE `country_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worksheet_tbl`
--
ALTER TABLE `worksheet_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments_tbl`
--
ALTER TABLE `appointments_tbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `clients_invoices`
--
ALTER TABLE `clients_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients_updates`
--
ALTER TABLE `clients_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `worksheet_tbl`
--
ALTER TABLE `worksheet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
