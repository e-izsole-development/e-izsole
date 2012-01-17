SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE `e-izsole` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-izsole`;

CREATE TABLE IF NOT EXISTS `dbo_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_latvian_ci,
  `mobile_operator` int,
  `e_mail` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `user_type` char NOT NULL,
  `currency` int NOT NULL,
  `language` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_deals` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`buyer_id` INT NOT NULL,
	`seller_id` INT NOT NULL,
	`item_id` INT NOT NULL,
	`deal_date` TEXT NOT NULL,
	`deal_status` boolean NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_recently_watched` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`user_id` int not null,
	`item_id` INT NOT NULL,
	`date` TEXT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_tags` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`title` varchar(125) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_items` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`seller_id` INT NOT NULL,
	`title` varchar(255) NOT NULL,
	`photo` BLOB ,
	`Auction` boolean NOT NULL,
	`price` INT NOT NULL,
	`category` INT NOT NULL,
	`winner` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_item_description` (
	`id` INT NOT NULL,
	`description` TEXT,
	`short_description` varchar(255),
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_mobile_operators` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`title` VARCHAR(64) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_languages` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`title` VARCHAR(63) NOT NULL,
	`course` REAL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_parameter_values` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`Parameter` INT NOT NULL,
	`value` TEXT NOT NULL,
	`item_id` INT NOT NULL,
	`language` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_parameters` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`category` INT NOT NULL,
	`title` VARCHAR(255) NOT NULL,
	`language` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_categories` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`title` VARCHAR(255) NOT NULL,
	`category` INT NOT NULL,
	`language` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_user_items` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`user` INT NOT NULL,
	`item` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `dbo_languages` (
	`id` INT AUTO_INCREMENT NOT NULL,
	`title` VARCHAR(127) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

INSERT INTO `dbo_mobile_operators` (`id`, `title`) VALUES
(1,'LMT'),
(2, 'Tele 2');

INSERT INTO `dbo_languages` (`id`, `title`) VALUES
(1,'LV'),
(2,'EN'),
(3,'RU');



CREATE USER 'eizsoleuser'@'localhost' IDENTIFIED BY  'eipass123';

GRANT USAGE ON * . * TO  'eizsoleuser'@'localhost' 
    IDENTIFIED BY  'eipass123' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `e-izsole` . * TO  'eizsoleuser'@'localhost' WITH GRANT OPTION ;

