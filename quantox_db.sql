-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 04:55 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quantox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) CHARACTER SET macce COLLATE macce_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'milos', '$2y$12$901903341159a003da640uuilW7hfBnc4Bhk4cUXNm9KTrs5cZVkW', 'milos_kg_@hotmail.com'),
(2, 'milan', '$2y$12$214064881559a00bf3b2aO/fJwyDsrR.7.QTMpioN9X4/wVw5nXDO', 'milan@mail.com'),
(3, 'mica', '$2y$12$64424465859a0324586dauTGAQyIcq0yiiXMzXiU4HID.DDuJCHne', 'mica@mail.com'),
(4, 'stefan', '$2y$12$714164987659a0372c63auEPyFhyNWKgM0BT.xnTBoEXhsLsVvdQS', 'stefan@mail.com'),
(5, 'test', '$2y$12$107426275259a0381d219uRLo/WP/p/JWOYPm7hw05jWxFMn5AvLq', 'test@mail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
