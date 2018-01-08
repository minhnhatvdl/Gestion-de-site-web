-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 10:38 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dyn_menu`
--

CREATE TABLE IF NOT EXISTS `dyn_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uri',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dyn_group_id` int(11) NOT NULL DEFAULT '0',
  `position` int(5) NOT NULL DEFAULT '0',
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `show_menu` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `dyn_group_id - normal` (`dyn_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `dyn_menu`
--

INSERT INTO `dyn_menu` (`id`, `title`, `link_type`, `page_id`, `module_name`, `url`, `uri`, `dyn_group_id`, `position`, `target`, `parent_id`, `is_parent`, `show_menu`) VALUES
(1, 'Hang Cho Thue', 'page', 1, '', 'http://www.category1.com', '', 1, 0, '', 0, 1, '1'),
(2, 'Hang Ban', 'page', 2, '', 'http://www.category2.com', '', 1, 0, '', 0, 0, '1'),
(5, 'Do dung thiet yeu', 'page', 5, '', 'http://www.category11.com', '', 1, 0, '', 1, 0, '1'),
(7, 'Ghe An, Xich Du, Noi An', 'page', 5, '', 'http://www.category121.com', '', 1, 0, '', 5, 0, '1'),
(8, 'Category 1 - 2 - 2', 'page', 8, '', 'http://www.category122.com', '', 1, 0, '', 6, 1, '1'),
(9, 'Category 1 - 2 - 2 - 1', 'page', 9, '', 'http://www.category1221.com', '', 1, 0, '', 8, 0, '1'),
(10, 'Category 1 - 2 - 2 - 2', 'page', 10, '', 'http://www.category1222.com', '', 1, 0, '', 8, 0, '1'),
(12, 'Category 3 - 2', 'page', 12, '', 'http://www.category32.com', '', 1, 0, '', 3, 0, '1'),
(13, 'Category 3 - 3', 'page', 13, '', 'http://www.category33.com', '', 1, 0, '', 3, 0, '1'),
(14, 'Category 3 - 4', 'page', 14, '', 'http://www.category34.com', '', 1, 0, '', 3, 0, '1'),
(15, 'Category 3 - 5', 'page', 15, '', 'http://www.category35.com', '', 1, 0, '', 3, 0, '1'),
(16, 'Category 3 - 6', 'page', 16, '', 'http://www.category36.com', '', 1, 0, '', 3, 0, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
