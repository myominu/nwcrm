-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2015 at 12:50 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nw_crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipts`
--

CREATE TABLE IF NOT EXISTS `cash_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` text,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `payment_amount` decimal(10,0) DEFAULT NULL,
  `balance_amount` decimal(10,0) DEFAULT NULL,
  `confirm_flg` int(4) NOT NULL DEFAULT '0',
  `balance_flg` int(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cash_receipts`
--

INSERT INTO `cash_receipts` (`id`, `name`, `client_id`, `description`, `total_amount`, `payment_amount`, `balance_amount`, `confirm_flg`, `balance_flg`, `created`, `modified`) VALUES
(1, 'Minlan- Seafood website first payment', 3, 'Minlan- Seafood website first payment', '850000', '850000', '600000', 1, 0, '2015-08-05 10:41:51', '2015-08-10 12:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipts_sales`
--

CREATE TABLE IF NOT EXISTS `cash_receipts_sales` (
  `cash_receipt_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `cash_type` varchar(255) NOT NULL,
  PRIMARY KEY (`cash_receipt_id`,`sale_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_receipts_sales`
--

INSERT INTO `cash_receipts_sales` (`cash_receipt_id`, `sale_id`, `cash_type`) VALUES
(1, 3, 'contract');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, NULL, 1, 2, 'Web Development', 'Web Development services', '2015-08-03 18:09:16', '2015-08-03 18:09:16'),
(2, NULL, 3, 4, 'Mobile Application Development', 'Mobile Application Development services', '2015-08-03 18:09:33', '2015-08-03 18:09:33'),
(3, NULL, 5, 6, 'Online Advertising services', 'Online Advertising services', '2015-08-03 18:09:50', '2015-08-03 18:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `parent_id`, `state_id`, `created`, `modified`) VALUES
(1, 'Yangon', NULL, 1, '2015-08-03 18:07:19', '2015-08-03 18:07:19'),
(2, 'Hlaing', 1, 1, '2015-08-03 18:07:39', '2015-08-03 18:07:39'),
(3, 'Bahan', 1, 1, '2015-08-03 18:07:59', '2015-08-03 18:07:59'),
(4, 'Kamaryut', 1, 1, '2015-08-03 18:08:33', '2015-08-03 18:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_phone_number` varchar(50) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_address` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `comment` text,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `contact_person`, `contact_phone_number`, `contact_email`, `contact_address`, `city_id`, `state_id`, `zip`, `country_id`, `comment`, `created`, `modified`) VALUES
(1, 'Prince Winner Co., Ltd', 'Ko Aung Soe', '09-5504786,01- 388789', '', 'No.249,4th Floor, Between 29th st & 30th St, Anawratha Rd, Pabedan Tsp.', 1, 1, '', 1, '', '2015-08-04 14:38:13', '2015-08-04 14:46:51'),
(2, 'Pandora Trading Co., Ltd', 'U Sai Yu Wai', '09-500 2486', '', 'address', 1, 1, '', 1, '', '2015-08-04 16:46:41', '2015-08-04 16:46:41'),
(3, 'Minlan- Seafood Co., Ltd', 'Ko Kyaw Swar Htun', '01-558548, 09-259 539989', '', 'No.70/B,Koh Min Koh Chin St, Koh Min Koh Chin Quarter,Bahan Tsp.', 1, 1, '', 1, '', '2015-08-05 10:10:01', '2015-08-05 10:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Myanmar', '2015-08-03 18:05:33', '2015-08-03 18:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hostings`
--

CREATE TABLE IF NOT EXISTS `hostings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) DEFAULT NULL,
  `hosting_server_id` int(11) NOT NULL,
  `db_name` varchar(255) DEFAULT NULL,
  `db_username` varchar(255) DEFAULT NULL,
  `db_password` varchar(255) DEFAULT NULL,
  `ftp_username` varchar(255) DEFAULT NULL,
  `ftp_password` varchar(255) DEFAULT NULL,
  `administrator_info` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `hosting_server_id` (`hosting_server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hosting_servers`
--

CREATE TABLE IF NOT EXISTS `hosting_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `server_dns` varchar(255) NOT NULL,
  `server_ip` varchar(255) NOT NULL,
  `ftp_host` varchar(255) NOT NULL,
  `db_host` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hosting_servers`
--

INSERT INTO `hosting_servers` (`id`, `name`, `server_dns`, `server_ip`, `ftp_host`, `db_host`, `created`, `modified`) VALUES
(1, 'micchanmyanmar.com', 'ns61.domaincontrol.com, ns62.domaincontrol.com', '103.1.175.1', '103.1.175.1', '"dbname".db.10295291.hostedresource.com', '2015-08-03 18:27:11', '2015-08-03 18:27:11'),
(2, 'fbtapapp.com', 'ns71.domaincontrol.com, ns72.domaincontrol.com', '23.229.135.141', 'ftp.fbtapapp.com', 'localhost', '2015-08-03 18:27:49', '2015-08-03 18:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `payment_amount` decimal(10,0) DEFAULT NULL,
  `balance_amount` decimal(10,0) DEFAULT NULL,
  `confirm_flg` int(4) NOT NULL DEFAULT '0',
  `balance_flg` int(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `client_id`, `description`, `total_amount`, `payment_amount`, `balance_amount`, `confirm_flg`, `balance_flg`, `created`, `modified`) VALUES
(1, 'upcommin', 2, 'jk', '910000', '250000', '660000', 1, 1, '2015-08-10 11:32:21', '2015-08-10 11:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_sales`
--

CREATE TABLE IF NOT EXISTS `invoices_sales` (
  `invoice_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `cash_type` varchar(225) NOT NULL,
  PRIMARY KEY (`invoice_id`,`sale_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices_sales`
--

INSERT INTO `invoices_sales` (`invoice_id`, `sale_id`, `cash_type`) VALUES
(1, 1, 'first'),
(1, 2, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `item_number` varchar(50) NOT NULL,
  `description` text,
  `item_cost_price` decimal(10,0) DEFAULT '0',
  `item_extend_price` decimal(10,0) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category_id`, `item_number`, `description`, `item_cost_price`, `item_extend_price`, `created`, `modified`) VALUES
(1, 'Static Standard', 1, 'WEB0001', 'Static Standard', '300000', '180000', '2015-08-03 18:11:00', '2015-08-03 18:11:00'),
(2, 'CMS Basic', 1, 'WEB0002', 'CMS Basic', '600000', '225000', '2015-08-03 18:11:52', '2015-08-03 18:11:52'),
(3, 'CMS Standard', 1, 'WEB0003', 'CMS Standard', '900000', '325000', '2015-08-03 18:12:24', '2015-08-03 18:12:24'),
(4, 'CMS Advanced', 1, 'WEB0004', 'CMS Advanced', '1200000', '425000', '2015-08-03 18:13:01', '2015-08-03 18:13:01'),
(5, 'Domain sales', 1, 'DOM0001', 'Domain sales', '15000', '15000', '2015-08-03 18:14:10', '2015-08-03 18:15:07'),
(6, 'Email sales', 1, 'EMA0001', 'Email sales', '10000', '10000', '2015-08-03 18:14:46', '2015-08-03 18:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `log_cash_receipts`
--

CREATE TABLE IF NOT EXISTS `log_cash_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` text,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `payment_amount` decimal(10,0) DEFAULT NULL,
  `balance_amount` decimal(10,0) DEFAULT NULL,
  `balance_flg` int(4) NOT NULL DEFAULT '0',
  `receipt_date` datetime NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_cash_receipts_sales`
--

CREATE TABLE IF NOT EXISTS `log_cash_receipts_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_cash_receipt_id` int(11) NOT NULL,
  `sale_description` text NOT NULL,
  `sale_amount` decimal(10,0) NOT NULL,
  `cash_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `log_cash_receipt_id` (`log_cash_receipt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_tasks`
--

CREATE TABLE IF NOT EXISTS `marketing_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `task_type` varchar(255) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `market_resource_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `market_resource_id` (`market_resource_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `marketing_tasks`
--

INSERT INTO `marketing_tasks` (`id`, `title`, `description`, `task_type`, `client_id`, `market_resource_id`, `user_id`, `appointment_date`, `created`, `modified`) VALUES
(1, 'To go and meet Win Unity Hotel''s Manager', 'To go and meet Win Unity Hotel''s Manager. To explain and discuss about they want to make new website for their hotel.', 'cash_receiving', NULL, NULL, 1, '2015-08-11 15:04:00', '2015-08-06 14:52:28', '2015-08-10 16:33:13'),
(2, 'To meet Cherry Queen Hotel''s Manager', 'To meet Cherry Queen Hotel''s Manager . .. . To meet Cherry Queen Hotel''s Manager . .. . To meet Cherry Queen Hotel''s Manager . .. .', 'appointment', 1, NULL, 1, '2015-08-12 15:05:00', '2015-08-06 14:56:37', '2015-08-10 12:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `market_resources`
--

CREATE TABLE IF NOT EXISTS `market_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_info` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `market_resources`
--

INSERT INTO `market_resources` (`id`, `name`, `contact_info`, `created`, `modified`) VALUES
(1, 'United Eleven', 'United Eleven Co., Ltd\r\nContact Person:\r\nPhone No:\r\nAddress:\r\n', '2015-08-04 16:59:43', '2015-08-04 16:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE IF NOT EXISTS `masters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `var1` varchar(255) NOT NULL,
  `var2` varchar(255) NOT NULL,
  `var3` varchar(255) NOT NULL,
  `icon1_file_name` varchar(255) DEFAULT NULL,
  `icon2_file_name` varchar(255) DEFAULT NULL,
  `icon3_file_name` varchar(255) DEFAULT NULL,
  `text` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `parent_id`, `name`, `lft`, `rght`, `var1`, `var2`, `var3`, `icon1_file_name`, `icon2_file_name`, `icon3_file_name`, `text`, `created`, `modified`) VALUES
(1, 0, 'Cash type', 1, 12, 'Cash type', 'Cash type', 'Cash type', '', '', '', '', '2015-08-05 15:45:48', '2015-08-05 15:45:48'),
(2, 1, 'Contract Payment', 2, 3, 'contract', 'contract', 'contract', '', '', '', '', '2015-08-05 15:48:23', '2015-08-05 16:09:14'),
(3, 1, 'First Payment', 4, 5, 'first', 'first', 'first', '', '', '', '', '2015-08-05 16:08:35', '2015-08-05 16:08:35'),
(4, 1, 'Second Payment', 6, 7, 'second', 'second', 'second', '', '', '', '', '2015-08-05 16:09:50', '2015-08-05 16:09:50'),
(5, 1, 'Extend Payment', 8, 9, 'extend', 'extend', 'extend', '', '', '', '', '2015-08-05 16:10:19', '2015-08-05 16:10:19'),
(6, 1, 'Sale Payment', 10, 11, 'sale', 'sale', 'sale', '', '', '', '', '2015-08-05 16:11:09', '2015-08-05 16:11:09'),
(7, 0, 'Market type', 13, 20, 'Market type', 'Market type', 'Market type', '', '', '', '', '2015-08-05 18:18:57', '2015-08-05 18:18:57'),
(8, 7, 'Quotation', 14, 15, 'quotation', 'quotation', 'quotation', '', '', '', '', '2015-08-05 18:19:41', '2015-08-05 18:19:41'),
(9, 7, 'Appointment', 16, 17, 'appointment', 'appointment', 'appointment', '', '', '', '', '2015-08-05 18:21:38', '2015-08-05 18:21:38'),
(10, 0, 'Task type', 21, 34, 'task_type', 'task_type', 'task_type', '', '', '', '', '2015-08-06 15:25:47', '2015-08-06 15:25:47'),
(11, 10, 'Appointment', 22, 23, 'appointment', 'appointment', 'appointment', '', '', '', '', '2015-08-06 15:26:17', '2015-08-06 15:26:17'),
(12, 10, 'Quotation', 24, 25, 'quotation', 'quotation', 'quotation', '', '', '', '', '2015-08-06 15:26:47', '2015-08-06 15:26:47'),
(13, 10, 'Follow up', 26, 27, 'follow_up', 'follow_up', 'follow_up', '', '', '', '', '2015-08-06 15:27:12', '2015-08-06 15:57:00'),
(14, 7, 'Follow up', 18, 19, 'follow_up', 'follow_up', 'follow_up', '', '', '', '', '2015-08-06 15:27:52', '2015-08-06 15:56:29'),
(15, 10, 'Contract', 28, 29, 'contact', 'contact', 'contact', '', '', '', '', '2015-08-06 15:29:01', '2015-08-06 15:29:01'),
(16, 10, 'Cash receiving', 30, 31, 'cash_receiving', 'cash_receiving', 'cash_receiving', '', '', '', '', '2015-08-06 15:30:05', '2015-08-06 15:30:05'),
(17, 10, 'Other', 32, 33, 'other', 'other', 'other', '', '', '', '', '2015-08-06 15:36:12', '2015-08-06 15:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20150803111311, '2015-08-03 11:31:55', '2015-08-03 11:31:57'),
(20150804044725, '2015-08-04 05:23:49', '2015-08-04 05:23:49'),
(20150804044726, '2015-08-04 05:30:41', '2015-08-04 05:30:41'),
(20150804044727, '2015-08-04 10:25:10', '2015-08-04 10:25:10'),
(20150804044728, '2015-08-04 10:54:39', '2015-08-04 10:54:40'),
(20150805085118, '2015-08-05 08:53:16', '2015-08-05 08:53:16'),
(20150806061034, '2015-08-06 07:28:48', '2015-08-06 07:28:48'),
(20150806061035, '2015-08-06 08:02:06', '2015-08-06 08:02:06'),
(20150806112946, '2015-08-06 11:37:49', '2015-08-06 11:37:49'),
(20150806113418, '2015-08-06 11:37:49', '2015-08-06 11:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `description` text,
  `sale_item_cost_price` decimal(10,0) NOT NULL DEFAULT '0',
  `sale_item_extend_price` decimal(10,0) DEFAULT '0',
  `item_unit` int(6) NOT NULL DEFAULT '1',
  `item_extend_start_date` date DEFAULT NULL,
  `item_extend_end_date` date DEFAULT NULL,
  `item_domain_url` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `item_id`, `client_id`, `description`, `sale_item_cost_price`, `sale_item_extend_price`, `item_unit`, `item_extend_start_date`, `item_extend_end_date`, `item_domain_url`, `created`, `modified`) VALUES
(1, 'Pandora Trading website', 4, 2, 'Pandora Trading website, included many products.', '850000', '300000', 1, '2014-08-07', '2015-08-07', 'http://pandoramyanmar.com', '2015-08-04 16:49:13', '2015-08-10 11:53:05'),
(2, 'pandora.com.mm', 5, 2, 'pandora.com.mm domain sales', '60000', '60000', 1, '2014-08-07', '2015-08-07', 'http://pandora.com.mm', '2015-08-04 16:50:57', '2015-08-10 11:53:05'),
(3, 'Minlan- Seafood website', 4, 3, '', '850000', '432000', 1, '2015-02-03', '2016-02-03', 'http://minlanseafood.com ', '2015-08-05 10:40:59', '2015-08-05 10:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created`, `modified`) VALUES
(1, 'Yangon', 1, '2015-08-03 18:06:53', '2015-08-03 18:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Administrator', 'admin', '$2y$10$kjMHdE6gYRmoARRUWqDYD.lZ2boPZNxTi2Nya3VZDd5JDSDubHJgG', 'admin', '2015-08-03 18:04:35', '2015-08-03 18:04:35'),
(2, 'Developer', 'developer', '$2y$10$xhnAymTa1G3YM6Dti7YqoOszcafLhmbDFppjP1Qojxt5ZwphSH7iy', 'developer', '2015-08-03 18:29:13', '2015-08-03 18:29:13'),
(3, 'Marketing', 'marketing', '$2y$10$kyhhP2w8bKhors/9FtE9qutaHq3tdh.J8cJn6.3zMkmr4ufXjNLba', 'marketing', '2015-08-03 18:29:33', '2015-08-03 18:29:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_receipts`
--
ALTER TABLE `cash_receipts`
  ADD CONSTRAINT `cash_receipts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `cash_receipts_sales`
--
ALTER TABLE `cash_receipts_sales`
  ADD CONSTRAINT `cash_receipts_sales_ibfk_1` FOREIGN KEY (`cash_receipt_id`) REFERENCES `cash_receipts` (`id`),
  ADD CONSTRAINT `cash_receipts_sales_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `hostings`
--
ALTER TABLE `hostings`
  ADD CONSTRAINT `hostings_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `hostings_ibfk_2` FOREIGN KEY (`hosting_server_id`) REFERENCES `hosting_servers` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `invoices_sales`
--
ALTER TABLE `invoices_sales`
  ADD CONSTRAINT `invoices_sales_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoices_sales_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `log_cash_receipts`
--
ALTER TABLE `log_cash_receipts`
  ADD CONSTRAINT `log_cash_receipts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `log_cash_receipts_sales`
--
ALTER TABLE `log_cash_receipts_sales`
  ADD CONSTRAINT `log_cash_receipts_sales_ibfk_1` FOREIGN KEY (`log_cash_receipt_id`) REFERENCES `log_cash_receipts` (`id`);

--
-- Constraints for table `marketing_tasks`
--
ALTER TABLE `marketing_tasks`
  ADD CONSTRAINT `marketing_tasks_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `marketing_tasks_ibfk_2` FOREIGN KEY (`market_resource_id`) REFERENCES `market_resources` (`id`),
  ADD CONSTRAINT `marketing_tasks_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
