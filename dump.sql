-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.48 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица neweuropatour.t_currency
CREATE TABLE IF NOT EXISTS `t_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT '0',
  `value` float DEFAULT '0',
  `preffix` varchar(50) DEFAULT '0',
  `affix` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_currency: ~3 rows (приблизительно)
DELETE FROM `t_currency`;
/*!40000 ALTER TABLE `t_currency` DISABLE KEYS */;
INSERT INTO `t_currency` (`id`, `default`, `name`, `value`, `preffix`, `affix`) VALUES
	(1, 1, 'us', 1, '', '$'),
	(2, 0, 'ru', 65.44, '', ' руб.'),
	(3, 0, 'uk', 24.9, '', ' грн.');
/*!40000 ALTER TABLE `t_currency` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
