CREATE DATABASE IF NOT EXISTS `mixas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mixas`;

CREATE TABLE IF NOT EXISTS `cargolist` (
  `trackingno` text,
  `namesurname` text,
  `phone` text,
  `ip` text,
  `adress` text,
  `staff` text,
  `time` text,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `change-address-log` (
  `phoneno` text,
  `trackingno` text,
  `oldaddres` text,
  `newaddres` text,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
