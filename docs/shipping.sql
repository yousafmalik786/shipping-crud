-- phpMyAdmin SQL Dump
-- Host: localhost
-- Generation Time: Jan 17, 2016 at 11:04 PM
-- Server version: 5.5.37
-- PHP Version: 5.5.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(120) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `contact_person` varchar(120) NOT NULL,
  `contact_person_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company`
--


-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text,
  `charges` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `item`
--


-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(70) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ship_to` int(11) NOT NULL,
  `ship_from` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `ship_from` (`ship_from`),
  KEY `ship_to` (`ship_to`),
  KEY `user_id` (`user_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `ship_from`
--

DROP TABLE IF EXISTS `ship_from`;
CREATE TABLE IF NOT EXISTS `ship_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `frist_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(20) DEFAULT NULL,
  `country` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ship_from`
--


-- --------------------------------------------------------

--
-- Table structure for table `ship_to`
--

DROP TABLE IF EXISTS `ship_to`;
CREATE TABLE IF NOT EXISTS `ship_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `frist_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(20) DEFAULT NULL,
  `country` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ship_to`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(85) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Yousaf', 'yousafml786@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `ship_from` FOREIGN KEY (`ship_from`) REFERENCES `ship_from` (`id`),
  ADD CONSTRAINT `ship_to` FOREIGN KEY (`ship_to`) REFERENCES `ship_to` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
