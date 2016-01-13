/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : shipping

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-01-14 01:42:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `orderNo` varchar(70) DEFAULT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemDescription` varchar(250) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `MSRP` float(10,2) DEFAULT NULL,
  `charges` float(10,2) DEFAULT NULL,
  `createdOn` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', null, 'test name', 'test discrtipint', '1', '1540.00', '10.00', null);
