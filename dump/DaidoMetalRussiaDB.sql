-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `checked`;
CREATE TABLE `checked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `count_of_query` int(11) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_number` varchar(12) NOT NULL,
  `compare` varchar(12) NOT NULL,
  `isChecked` int(1) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `date_of_add` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `fake`;
CREATE TABLE `fake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `geo`;
CREATE TABLE `geo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_query` varchar(255) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `city_name_ru` text NOT NULL,
  `region_name_ru` text NOT NULL,
  `iso_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1,	'Qurmesond',	'$2y$10$D7JsaWqPms9TCd3vIpBPJeOv9COrdTLJZf/i4XNAhGi4IG5gsfGtG'),
(2,	'Qalanyaur',	'$2y$10$UKS.cjj0SSed09qxQ/Xy.e8.ayUdMpvFFEUBi2yXDyRgz8tI0rCm.');

-- 2018-05-24 13:53:34
