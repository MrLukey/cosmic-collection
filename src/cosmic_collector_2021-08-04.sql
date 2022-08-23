# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: cosmic_collector
# Generation Time: 2021-08-04 11:04:43 +0000
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
  `caused_by` varchar(120) NOT NULL DEFAULT '',
  `creates_effect` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cosmic_events` WRITE;
/*!40000 ALTER TABLE `cosmic_events` DISABLE KEYS */;

INSERT INTO `cosmic_events` (`id`, `name`, `caused_by`, `creates_effect`)
VALUES
	(1,'Big Bang','Unknown','Fusion'),
	(2,'Cosmic Rays','Big Bang','Fission'),
	(3,'Exploding Massive Stars','Gravity','Supernova'),
	(4,'Dying Low Mass Stars','Gravity','Plantery Nebula'),
	(5,'Merging Neutron Stars','Gravity','Black Hole'),
	(6,'Exploding White Dwarfs','Gravity','Type 1A Supernova'),
	(7,'Humanity','Unknown','Technological Synthesis');

/*!40000 ALTER TABLE `cosmic_events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table elements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `elements`;

CREATE TABLE `elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL DEFAULT '',
  `chemical_symbol` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `chemical_symbol` (`chemical_symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `elements` WRITE;
/*!40000 ALTER TABLE `elements` DISABLE KEYS */;

INSERT INTO `elements` (`id`, `name`, `chemical_symbol`)
VALUES
	(1,'Hydrogen','H'),
	(2,'Helium','He'),
	(3,'Lithium','Li'),
	(4,'Beryllium','Be'),
	(5,'Boron','B'),
	(6,'Carbon','C'),
	(7,'Nitrogen','N'),
	(8,'Oxygen','O'),
	(9,'Fluorine','F'),
	(10,'Neon','Ne'),
	(11,'Sodium','Na'),
	(12,'Magnesium','Mg'),
	(13,'Aluminium','Al'),
	(14,'Silicon','Si'),
	(15,'Phosphorus','P'),
	(16,'Sulfur','S'),
	(17,'Chlorine','Cl'),
	(18,'Argon','Ar'),
	(19,'Potassium','K'),
	(20,'Calcium','Ca'),
	(21,'Scandium','Sc'),
	(22,'Titanium','Ti'),
	(23,'Vanadium','V'),
	(24,'Chromium','Cr'),
	(25,'Manganese','Mn'),
	(26,'Iron','Fe'),
	(27,'Cobalt','Co'),
	(28,'Nickel','Ni'),
	(29,'Copper','Cu'),
	(30,'Zinc','Zn'),
	(31,'Gallium','Ga'),
	(32,'Germanium','Ge'),
	(33,'Arsenic','As'),
	(34,'Selenium','Se'),
	(35,'Bromine','Br'),
	(36,'Krypton','Kr'),
	(37,'Rubidium','Rb'),
	(38,'Strontium','Sr'),
	(39,'Yttrium','Y'),
	(40,'Zirconium','Zr'),
	(41,'Niobium','Nb'),
	(42,'Molybdenum','Mo'),
	(43,'Technetium','Tc'),
	(44,'Ruthenium','Ru'),
	(45,'Rhodium','Rh'),
	(46,'Palladium','Pd'),
	(47,'Silver','Ag'),
	(48,'Cadmium','Cd'),
	(49,'Indium','In'),
	(50,'Tin','Sn'),
	(51,'Antimony','Sb'),
	(52,'Tellurium','Te'),
	(53,'Iodine','I'),
	(54,'Xenon','Xe'),
	(55,'Caesium','Cs'),
	(56,'Barium','Ba'),
	(57,'Lanthanum','La'),
	(58,'Cerium','Ce'),
	(59,'Praseodymium','Pr'),
	(60,'Neodymium','Nd'),
	(61,'Promethium','Pm'),
	(62,'Samarium','Sm'),
	(63,'Europium','Eu'),
	(64,'Gadolinium','Gd'),
	(65,'Terbium','Tb'),
	(66,'Dysprosium','Dy'),
	(67,'Holmium','Ho'),
	(68,'Erbium','Er'),
	(69,'Thulium','Tm'),
	(70,'Ytterbium','Yb'),
	(71,'Lutetium','Lu'),
	(72,'Hafnium','Hf'),
	(73,'Tantalum','Ta'),
	(74,'Tungsten','W'),
	(75,'Rhenium','Re'),
	(76,'Osmium','Os'),
	(77,'Iridium','Ir'),
	(78,'Platinum','Pt'),
	(79,'Gold','Au'),
	(80,'Mercury','Hg'),
	(81,'Thallium','Tl'),
	(82,'Lead','Pb'),
	(83,'Bismuth','Bi'),
	(84,'Polonium','Po'),
	(85,'Astatine','At'),
	(86,'Radon','Rn'),
	(87,'Francium','Fr'),
	(88,'Radium','Ra'),
	(89,'Actinium','Ac'),
	(90,'Thorium','Th'),
	(91,'Protactinium','Pa'),
	(92,'Uranium','U'),
	(93,'Neptunium','Np'),
	(94,'Plutonium','Pu'),
	(95,'Americium','Am'),
	(96,'Curium','Cm'),
	(97,'Berkelium','Bk'),
	(98,'Californium','Cf'),
	(99,'Einsteinium','Es'),
	(100,'Fermium','Fm'),
	(101,'Mendelevium','Md'),
	(102,'Nobelium','No'),
	(103,'Lawrencium','Lr'),
	(104,'Rutherfordium','Rf'),
	(105,'Dubnium','Db'),
	(106,'Seaborgium','Sg'),
	(107,'Bohrium','Bh'),
	(108,'Hassium','Hs'),
	(109,'Meitnerium','Mt'),
	(110,'Damstadtium','Ds'),
	(111,'Roentgenium','Rg'),
	(112,'Copernicium','Cn'),
	(113,'Nihonium','Nh'),
	(114,'Flerovium','Fl'),
	(115,'Moscovium','Mc'),
	(116,'Livermorium','Lv'),
	(117,'Tennessine','Ts'),
	(118,'Oganesson','Og');

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
	(13,3,12),
	(14,3,13),
	(15,3,14),
	(16,3,15),
	(17,3,16),
	(18,3,17),
	(19,3,18),
	(20,3,19),
	(21,3,20),
	(22,3,21),
	(23,3,22),
	(24,3,23),
	(25,3,24),
	(26,3,25),
	(27,3,26),
	(28,3,27),
	(29,3,28),
	(30,3,29),
	(31,3,30),
	(32,3,31),
	(33,3,32),
	(34,3,33),
	(35,3,34),
	(36,3,35),
	(37,3,36),
	(38,3,37),
	(39,3,38),
	(40,3,39),
	(41,3,40),
	(42,4,3),
	(43,4,6),
	(44,4,7),
	(45,4,38),
	(46,4,39),
	(47,4,40),
	(48,4,41),
	(49,4,42),
	(50,4,44),
	(51,4,45),
	(52,4,46),
	(53,4,47),
	(54,4,48),
	(55,4,49),
	(56,4,50),
	(57,4,51),
	(58,4,52),
	(59,4,53),
	(60,4,54),
	(61,4,55),
	(62,4,56),
	(63,4,57),
	(64,4,58),
	(65,4,59),
	(66,4,60),
	(67,4,62),
	(68,4,63),
	(69,4,64),
	(70,4,65),
	(71,4,66),
	(72,4,67),
	(73,4,68),
	(74,4,69),
	(75,4,70),
	(76,4,71),
	(77,4,72),
	(78,4,73),
	(79,4,74),
	(80,4,75),
	(81,4,76),
	(82,4,77),
	(83,4,78),
	(84,4,79),
	(85,4,80),
	(86,4,81),
	(87,4,82),
	(88,4,83),
	(89,6,14),
	(90,6,15),
	(91,6,16),
	(92,6,17),
	(93,6,18),
	(94,6,19),
	(95,6,20),
	(96,6,21),
	(97,6,22),
	(98,6,23),
	(99,6,24),
	(100,6,25),
	(101,6,26),
	(102,6,27),
	(103,6,28),
	(104,6,29),
	(105,6,30),
	(106,5,41),
	(107,5,42),
	(108,5,44),
	(109,5,45),
	(110,5,46),
	(111,5,47),
	(112,5,48),
	(113,5,49),
	(114,5,50),
	(115,5,51),
	(116,5,52),
	(117,5,53),
	(118,5,54),
	(119,5,55),
	(120,5,56),
	(121,5,57),
	(122,5,58),
	(123,5,59),
	(124,5,60),
	(125,5,62),
	(126,5,63),
	(127,5,64),
	(128,5,65),
	(129,5,66),
	(130,5,67),
	(131,5,68),
	(132,5,69),
	(133,5,70),
	(134,5,71),
	(135,5,72),
	(136,5,73),
	(137,5,74),
	(138,5,75),
	(139,5,76),
	(140,5,77),
	(141,5,78),
	(142,5,79),
	(143,5,80),
	(144,5,81),
	(145,5,82),
	(146,5,83),
	(147,5,84),
	(148,5,85),
	(149,5,86),
	(150,5,87),
	(151,5,88),
	(152,5,89),
	(153,5,90),
	(154,5,91),
	(155,5,92),
	(156,5,93),
	(157,5,94),
	(159,7,43),
	(160,7,61),
	(161,7,95),
	(162,7,96),
	(163,7,97),
	(164,7,98),
	(165,7,99),
	(166,7,100),
	(167,7,101),
	(168,7,102),
	(169,7,103),
	(170,7,104),
	(171,7,105),
	(172,7,106),
	(173,7,107),
	(174,7,108),
	(175,7,109),
	(176,7,110),
	(177,7,111),
	(178,7,112),
	(179,7,113),
	(180,7,114),
	(181,7,115),
	(182,7,116),
	(183,7,117),
	(184,7,118);

/*!40000 ALTER TABLE `event_elements` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
