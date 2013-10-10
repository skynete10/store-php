-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2013 at 07:40 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `name` varchar(33) NOT NULL,
  `color` varchar(33) NOT NULL,
  `size` varchar(33) NOT NULL,
  `qteitems` int(33) NOT NULL,
  KEY `name` (`name`),
  KEY `name_2` (`name`),
  KEY `name_3` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`name`, `color`, `size`, `qteitems`) VALUES
('baby kids', 'blue', 'large', 1),
('bikini', 'red', 'large', 1),
('bikini', 'blue', 'large', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `IDuser` int(33) NOT NULL,
  `IDmessage` int(33) NOT NULL AUTO_INCREMENT,
  `date` varchar(33) NOT NULL,
  `text` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL,
  `to` varchar(33) NOT NULL,
  PRIMARY KEY (`IDmessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `IDuser` int(33) NOT NULL,
  `IDorder` int(33) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `size_order` varchar(33) NOT NULL,
  `color_order` varchar(33) NOT NULL,
  `qte_order` int(33) NOT NULL,
  `price_order` decimal(33,0) NOT NULL,
  `price_total` double NOT NULL,
  PRIMARY KEY (`IDorder`),
  KEY `name` (`name`),
  KEY `IDuser` (`IDuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`IDuser`, `IDorder`, `name`, `size_order`, `color_order`, `qte_order`, `price_order`, `price_total`) VALUES
(1, 16, 'bikini', 'large', 'red', 1, '30', 30),
(1, 17, 'baby kids', 'large', 'blue', 1, '30', 30);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `IDproducts` int(33) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `cod` varchar(33) NOT NULL,
  `price` float(33,0) NOT NULL,
  `details` varchar(100) NOT NULL,
  `image` varchar(33) NOT NULL,
  `qteproducts` int(33) NOT NULL,
  PRIMARY KEY (`IDproducts`),
  KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`IDproducts`, `name`, `cod`, `price`, `details`, `image`, `qteproducts`) VALUES
(1, 'baby kids', '3-1', 30, 'alalla', 'images/201304161755471.jpg', 1),
(2, 'bikini', '1-2', 30, 'alalla', 'images/p3.gif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `recycle`
--

CREATE TABLE IF NOT EXISTS `recycle` (
  `IDrecycle` int(33) NOT NULL AUTO_INCREMENT,
  `IDproducts` int(33) NOT NULL,
  `name` varchar(33) NOT NULL,
  `cod` varchar(33) NOT NULL,
  `price` decimal(33,0) NOT NULL,
  `details` varchar(33) NOT NULL,
  `image` varchar(33) NOT NULL,
  `qteproducts` int(33) NOT NULL,
  `qteitems` int(33) NOT NULL,
  `color` varchar(33) NOT NULL,
  `size` varchar(33) NOT NULL,
  PRIMARY KEY (`IDrecycle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `name` varchar(33) NOT NULL,
  `color` varchar(33) NOT NULL,
  `size` varchar(33) NOT NULL,
  `qteitems` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`name`, `color`, `size`, `qteitems`) VALUES
('baby kids', 'blue', 'large', 1),
('bikini', 'red', 'large', 1),
('bikini', 'blue', 'large', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IDuser` int(33) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT',
  `lastname` varchar(33) NOT NULL,
  `firstname` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `rpassword` varchar(33) NOT NULL,
  `username` varchar(33) NOT NULL,
  `city` varchar(33) NOT NULL,
  `street` varchar(33) NOT NULL,
  `mobilephone` varchar(33) NOT NULL,
  `homephone` varchar(33) NOT NULL,
  `code` varchar(33) NOT NULL,
  `like/unlike` varchar(33) NOT NULL,
  PRIMARY KEY (`IDuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDuser`, `lastname`, `firstname`, `email`, `password`, `rpassword`, `username`, `city`, `street`, `mobilephone`, `homephone`, `code`, `like/unlike`) VALUES
(1, 'el dakdouki', 'mohamed', 'mohamed.dakdouki@hotmail.co.uk', 'sabine10', 'sabine10', 'skynete10', 'barja', 'kroum', '76651409', '       07920187', '333', ''),
(2, 'seif', 'mohamed', 'mohamed.dakdouki@hotmail.com', 'sabine10', 'sabine10', 'seifo10', 'barja', 'kroum', '7012212', '1923123', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
