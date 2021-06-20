-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.7.17-log - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- mixas için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `mixas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mixas`;

-- tablo yapısı dökülüyor mixas.cargolist
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

-- mixas.cargolist: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `cargolist` DISABLE KEYS */;
INSERT INTO `cargolist` (`trackingno`, `namesurname`, `phone`, `ip`, `adress`, `staff`, `time`, `status`) VALUES
	('123', 'dsfsdf', '3434', '::1', 'dsfsdf', 'dfssfd', '20/06/2021', 'Received');
/*!40000 ALTER TABLE `cargolist` ENABLE KEYS */;

-- tablo yapısı dökülüyor mixas.change-address-log
CREATE TABLE IF NOT EXISTS `change-address-log` (
  `phoneno` text,
  `trackingno` text,
  `oldaddres` text,
  `newaddres` text,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- mixas.change-address-log: ~0 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `change-address-log` DISABLE KEYS */;
/*!40000 ALTER TABLE `change-address-log` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
