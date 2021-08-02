# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: lukes_cosmic_events
# Generation Time: 2021-08-02 10:53:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cosmic_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cosmic_events`;

CREATE TABLE `cosmic_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL DEFAULT '',
  `caused_by` varchar(120) DEFAULT '',
  `creates_effect` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cosmic_events` WRITE;
/*!40000 ALTER TABLE `cosmic_events` DISABLE KEYS */;

INSERT INTO `cosmic_events` (`id`, `name`, `caused_by`, `creates_effect`)
VALUES
	(1,'Big Bang','Unknown','Fusion'),
	(2,'Cosmic Rays','Big Bang','Fission'),
	(3,'Massive Stars','Gravity','New Elements'),
	(4,'Low Mass Stars','Gravity','New Elements'),
	(5,'Merging Neutron Stars','Gravity','New Elements'),
	(6,'White Dwarf Stars','Gravity','New Elements');

/*!40000 ALTER TABLE `cosmic_events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table elements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `elements`;

CREATE TABLE `elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL DEFAULT '',
  `atomic_mass` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `elements` WRITE;
/*!40000 ALTER TABLE `elements` DISABLE KEYS */;

INSERT INTO `elements` (`id`, `name`, `atomic_mass`)
VALUES
	(1,'hydrogen',1),
	(2,'helium',2),
	(3,'lithium',3),
	(4,'beryllium',4),
	(5,'boron',5),
	(6,'carbon',6),
	(7,'nitrogen',7),
	(8,'oxygen',8),
	(9,'fluorine',9),
	(10,'neon',10),
	(11,'sodium',11),
	(12,'magnesium',12);

/*!40000 ALTER TABLE `elements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_elements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_elements`;

CREATE TABLE `event_elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event_elements` WRITE;
/*!40000 ALTER TABLE `event_elements` DISABLE KEYS */;

INSERT INTO `event_elements` (`id`, `event_id`, `element_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,2,3),
	(5,2,4),
	(6,2,5),
	(7,3,6),
	(8,3,7),
	(9,3,8),
	(10,3,9),
	(11,3,10),
	(12,3,11),
	(13,3,12);

/*!40000 ALTER TABLE `event_elements` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
