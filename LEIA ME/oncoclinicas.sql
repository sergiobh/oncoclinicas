/*
Navicat MySQL Data Transfer

Source Server         : MYSQL_Localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : oncoclinicas

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-08-14 17:39:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agenda
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodoId` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` char(13) NOT NULL,
  `medico` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `periodoId` (`periodoId`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`periodoId`) REFERENCES `calendario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agenda
-- ----------------------------

-- ----------------------------
-- Table structure for calendario
-- ----------------------------
DROP TABLE IF EXISTS `calendario`;
CREATE TABLE `calendario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data` (`data`,`hora`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of calendario
-- ----------------------------

-- ----------------------------
-- Table structure for hora
-- ----------------------------
DROP TABLE IF EXISTS `hora`;
CREATE TABLE `hora` (
  `id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hora
-- ----------------------------
INSERT INTO `hora` VALUES ('0');
INSERT INTO `hora` VALUES ('1');
INSERT INTO `hora` VALUES ('2');
INSERT INTO `hora` VALUES ('3');
INSERT INTO `hora` VALUES ('4');
INSERT INTO `hora` VALUES ('5');
INSERT INTO `hora` VALUES ('6');
INSERT INTO `hora` VALUES ('7');
INSERT INTO `hora` VALUES ('8');
INSERT INTO `hora` VALUES ('9');
INSERT INTO `hora` VALUES ('10');
INSERT INTO `hora` VALUES ('11');
INSERT INTO `hora` VALUES ('12');
INSERT INTO `hora` VALUES ('13');
INSERT INTO `hora` VALUES ('14');
INSERT INTO `hora` VALUES ('15');
INSERT INTO `hora` VALUES ('16');
INSERT INTO `hora` VALUES ('17');
INSERT INTO `hora` VALUES ('18');
INSERT INTO `hora` VALUES ('19');
INSERT INTO `hora` VALUES ('20');
INSERT INTO `hora` VALUES ('21');
INSERT INTO `hora` VALUES ('22');
INSERT INTO `hora` VALUES ('23');
