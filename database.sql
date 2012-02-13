SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `cabinets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabinet_code` varchar(10) DEFAULT NULL,
  `lines` smallint(6) DEFAULT NULL,
  `columns` smallint(6) DEFAULT NULL,
  `cellar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cellar_id` (`cellar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `cabinets` (`id`, `cabinet_code`, `lines`, `columns`, `cellar_id`) VALUES
(2, 'Cab 1 ', 4, 8, 1),
(3, 'Cab 2', 3, 5, 1),
(4, 'Cab 3', 5, 5, 1);

CREATE TABLE IF NOT EXISTS `cellars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellar_name` varchar(50) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `block` varchar(20) DEFAULT NULL,
  `apt` varchar(10) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `cellars` (`id`, `cellar_name`, `street`, `block`, `apt`, `zip`, `city`, `state`, `country`) VALUES
(1, 'Baco', 'The wine street', '100', '', '', 'New York', 'NY', 'USA');

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  `country_code` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `countries` (`id`, `country_name`, `country_code`) VALUES
(1, 'Portugal', 'PT'),
(2, 'Italy', 'IT'),
(3, 'Spain', 'ES'),
(4, 'France', 'FR'),
(5, 'Germany', 'DE'),
(6, 'Brazil', 'BR'),
(7, 'Chile', 'CL'),
(8, 'Argentina', 'AR');

CREATE TABLE IF NOT EXISTS `grapetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grape_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `grapetypes` (`id`, `grape_name`) VALUES
(1, 'Cabernet Sauvignon'),
(2, 'Carménère'),
(3, 'Chardonnay'),
(4, 'Merlot'),
(5, 'Malbec'),
(6, 'Pinot Noir'),
(7, 'Sauvignon Blanc'),
(8, 'Other');

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `members` (`id`, `username`, `password`, `created`, `modified`) VALUES
(6, 'admin', 'd2a7c369e0ae9fe76fcf779d4c30c5c6f2a8e3b1', '0000-00-00 00:00:00', '2011-12-23 15:47:14');

CREATE TABLE IF NOT EXISTS `producers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producer_name` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

INSERT INTO `producers` (`id`, `producer_name`, `country_id`) VALUES
(1, 'Herdade do Esporão', 1),
(2, 'Herdade de São Miguel', 1),
(3, 'Bernard Magrez ', 1),
(4, 'Chryseia ', 1),
(5, 'Quinta do Crasto', 1),
(6, 'Bago de Touriga', 1),
(7, 'Monte do Pintor ', 1),
(8, 'Quinta do Noval ', 1),
(9, 'Herdade da Figueira de Cima', 1),
(10, 'Château de Laverdasse ', 4),
(11, 'Baron Philippe de Rothschild', 4),
(12, 'Tenuta Sant'' Antonio', 2),
(13, 'Ruggeri', 2),
(14, 'Bodegas Muga', 3),
(15, 'San Pedro Regalado', 3);

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `regions` (`id`, `region_name`, `country_id`) VALUES
(1, 'Alentejo', 1),
(2, 'Douro ', 1),
(3, 'Bierzo ', 3),
(4, 'Ribera de Duero', 3),
(5, 'Rioja ', 3),
(6, 'Medoc', 4),
(7, 'Bordeaux', 4),
(8, 'Valpolicella Veneto', 2),
(9, 'Veneto', 2);

CREATE TABLE IF NOT EXISTS `storages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_number` smallint(6) DEFAULT NULL,
  `column_number` smallint(6) DEFAULT NULL,
  `cabinet_id` int(11) DEFAULT NULL,
  `wine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cabinet_id` (`cabinet_id`),
  KEY `wine_id` (`wine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

INSERT INTO `storages` (`id`, `line_number`, `column_number`, `cabinet_id`, `wine_id`) VALUES
(1, 1, 8, 2, 1),
(2, 1, 1, 2, 3),
(3, 1, 2, 2, 3),
(4, 1, 3, 2, 8),
(5, 2, 1, 2, 2),
(6, 1, 4, 2, 8),
(7, 2, 2, 2, 7),
(8, 2, 3, 2, 5),
(9, 2, 4, 2, 7),
(10, 1, 1, 4, 5),
(11, 1, 5, 2, 7),
(12, 2, 5, 2, 7),
(13, 1, 2, 4, 1);

CREATE TABLE IF NOT EXISTS `wines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wine_name` varchar(50) DEFAULT NULL,
  `vintage` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `rating` smallint(6) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `winetype_id` int(11) DEFAULT NULL,
  `grapetype_id` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grapetype_id` (`grapetype_id`),
  KEY `winetype_id` (`winetype_id`),
  KEY `region_id` (`region_id`),
  KEY `producer_id` (`producer_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

INSERT INTO `wines` (`id`, `wine_name`, `vintage`, `price`, `rating`, `country_id`, `producer_id`, `region_id`, `winetype_id`, `grapetype_id`, `picture`) VALUES
(1, 'Esporão Alandra Tinto', NULL, 9, NULL, 1, 1, 1, 1, 8, 'img/wines/esporao_alandra_tinto.jpg'),
(2, 'Esporão Touriga Nacional', 2007, NULL, NULL, 1, 1, 1, 1, 8, 'img/wines/esporao_touriga.jpg'),
(3, 'Esporão Vinho da Defesa Branco', 2008, 22, NULL, 1, 1, 1, 1, 8, 'img/wines/esporao_defesa_branco.jpg'),
(4, 'Esporão 2 Castas Branco', 2009, 20, NULL, 1, 1, 1, 2, 8, NULL),
(5, 'Esporão 4 Castas Tinto', 2008, 30, NULL, 1, 1, 1, 1, 8, 'img/wines/esporao_quatro_castas.jpg'),
(6, 'Esporão Reserva Branco', 2009, 29, NULL, 1, 1, 1, 1, 8, NULL),
(7, 'Esporão Alicante Bouschet', 2008, 40, NULL, 1, 1, 1, 1, 8, 'img/wines/esporao_alicante.jpg'),
(8, 'Esporão Vinha da Defesa Rose', 2008, 20, NULL, 1, 1, 1, 3, 8, 'img/wines/esporao_defesa_rose.jpg'),
(9, 'Herdade de São Miguel Reserva', 2006, NULL, NULL, 1, 2, 1, 1, 1, 'img/wines/herdade_sao_miguel.jpg'),
(10, 'Chateau de Laverdasse Cru Bourgeois', 2006, 50, NULL, 4, 10, 6, 1, 1, 'img/wines/laverdasse.jpg'),
(11, 'La Bélière Rouge ', 2009, 15, NULL, 4, 11, 7, 1, 4, 'img/wines/la_beliere_rouge.jpg'),
(12, 'Valpolicella Superiore Ripasso Monti', 2008, 35, NULL, 2, 12, 8, 1, 8, 'img/wines/valpolicella.jpg'),
(13, 'Muga Aro', 2006, 300, NULL, 3, 14, 5, 1, 8, 'img/wines/muga.jpg'),
(14, 'Embocadero', 2009, 16, NULL, 3, 15, 4, 1, 8, 'img/wines/embocadero.jpg');

CREATE TABLE IF NOT EXISTS `winetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `winetype_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `winetypes` (`id`, `winetype_name`) VALUES
(1, 'Red'),
(2, 'White'),
(3, 'Rose');


ALTER TABLE `cabinets`
  ADD CONSTRAINT `cabinets_ibfk_1` FOREIGN KEY (`cellar_id`) REFERENCES `cellars` (`id`) ON UPDATE CASCADE;

ALTER TABLE `producers`
  ADD CONSTRAINT `producers_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE;

ALTER TABLE `storages`
  ADD CONSTRAINT `storages_ibfk_2` FOREIGN KEY (`wine_id`) REFERENCES `wines` (`id`),
  ADD CONSTRAINT `storages_ibfk_1` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`id`);

ALTER TABLE `wines`
  ADD CONSTRAINT `wines_ibfk_11` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wines_ibfk_10` FOREIGN KEY (`grapetype_id`) REFERENCES `grapetypes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wines_ibfk_7` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wines_ibfk_8` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wines_ibfk_9` FOREIGN KEY (`winetype_id`) REFERENCES `winetypes` (`id`) ON UPDATE CASCADE;
