/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : shipping

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-01-16 01:51:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(120) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `contact_person` varchar(120) NOT NULL,
  `contact_person_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'South Logistics', 'Boriñaur enparantza, 21\n07750 Ferreries', 'Charlene A. Saddler', '671 347 895');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text,
  `charges` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'a small box', 'A box with soaps', '15.00', '1');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(70) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ship_to` int(11) NOT NULL,
  `ship_from` int(11) NOT NULL,
  `item_id` int(255) NOT NULL COMMENT 'Comma sperated item ids',
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', 'advd4514', '2016-01-14', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `ship_from`
-- ----------------------------
DROP TABLE IF EXISTS `ship_from`;
CREATE TABLE `ship_from` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ship_from
-- ----------------------------
INSERT INTO `ship_from` VALUES ('1', 'DianeJFrazier@dayrep.com', 'Diane', 'J. Frazier', '753 278 634', 'C/ Canarias, 88\n20212 Olaberria', 'Olaberria', '20212', 'Spain');

-- ----------------------------
-- Table structure for `ship_to`
-- ----------------------------
DROP TABLE IF EXISTS `ship_to`;
CREATE TABLE `ship_to` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ship_to
-- ----------------------------
INSERT INTO `ship_to` VALUES ('1', 'RosellaTThomas@rhyta.com', 'Rosella', 'T. Thomas', '01.75.43.68.60', '42, Rue du Palais\n91150 ÉTAMPES', 'ÉTAMPES', '91150', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(85) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Yousaf', 'yousafml786@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');