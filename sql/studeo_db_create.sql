-- --------------------------------------------------------
-- Host:                         [redacted]
-- Versione server:              5.7.9 - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dump della struttura di tabella studeo.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `picture_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(Relative) Path to the image representing this course.',
  `degree_id` int(11) NOT NULL COMMENT 'FK to the degree_type table (bachelor, master, both, ...)',
  `isMandatory` tinyint(1) NOT NULL COMMENT 'Boolean value to discriminate mandatory courses from optional ones.',
  PRIMARY KEY (`id`),
  KEY `degree fk` (`degree_id`),
  CONSTRAINT `degree fk` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.courses: ~0 rows (circa)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `name`, `description`, `picture_path`, `degree_id`, `isMandatory`) VALUES
	(1, 'Programmazione I', 'Introduzione alla programmazione imperativa.', '', 1, 1);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.degrees
CREATE TABLE IF NOT EXISTS `degrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.degrees: ~3 rows (circa)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT INTO `degrees` (`id`, `name`) VALUES
	(1, 'bachelor'),
	(2, 'master'),
	(3, 'both');
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
