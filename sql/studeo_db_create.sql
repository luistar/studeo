-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              5.7.9 - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dump della struttura di tabella studeo.contributors
CREATE TABLE IF NOT EXISTS `contributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ext_id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ext_id` (`ext_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.contributors: ~0 rows (circa)
/*!40000 ALTER TABLE `contributors` DISABLE KEYS */;
/*!40000 ALTER TABLE `contributors` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.courses: ~0 rows (circa)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `name`, `description`, `picture_path`, `degree_id`, `isMandatory`) VALUES
	(1, 'Programmazione I', 'Introduzione alla programmazione imperativa.', 'programming.png', 1, 1),
	(2, 'Analisi I', 'Introduzione all\'analisi matematica.', 'calculus.png', 1, 1);
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


-- Dump della struttura di tabella studeo.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professorship_id` int(11) NOT NULL DEFAULT '0',
  `file_path` varchar(512) COLLATE utf8_unicode_ci DEFAULT '0',
  `date` date NOT NULL,
  `keywords` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `professorship_FK` (`professorship_id`),
  CONSTRAINT `professorship_FK` FOREIGN KEY (`professorship_id`) REFERENCES `professorships` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.exams: ~0 rows (circa)
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_FK` (`course_id`),
  CONSTRAINT `courses_FK` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.groups: ~0 rows (circa)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `course_id`, `name`, `description`) VALUES
	(1, 1, 'Gruppo 1', 'Studenti con cognome  compreso tra Aa e De');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.professors
CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.professors: ~1 rows (circa)
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` (`id`, `first_name`, `last_name`, `office`, `website`, `notes`) VALUES
	(1, 'Giuliano', 'Laccetti', 'Room XYZ Via Claudio,21', 'www.laccetti.org', 'Some notes');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.professorships
CREATE TABLE IF NOT EXISTS `professorships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_FK` (`group_id`),
  KEY `professor_FK` (`professor_id`),
  CONSTRAINT `group_FK` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `professor_FK` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.professorships: ~1 rows (circa)
/*!40000 ALTER TABLE `professorships` DISABLE KEYS */;
INSERT INTO `professorships` (`id`, `year_start`, `year_end`, `group_id`, `professor_id`) VALUES
	(1, 2009, NULL, 1, 1);
/*!40000 ALTER TABLE `professorships` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.professor_emails
CREATE TABLE IF NOT EXISTS `professor_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `professor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professors_fk` (`professor_id`),
  CONSTRAINT `professors_fk` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.professor_emails: ~1 rows (circa)
/*!40000 ALTER TABLE `professor_emails` DISABLE KEYS */;
INSERT INTO `professor_emails` (`id`, `email`, `professor_id`) VALUES
	(1, 'jules@hotmail.com', 1);
/*!40000 ALTER TABLE `professor_emails` ENABLE KEYS */;


-- Dump della struttura di tabella studeo.solutions
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `url` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  `contributor_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Boolean flag used for soft-delete',
  PRIMARY KEY (`id`),
  KEY `contributor_FK` (`contributor_id`),
  KEY `exam_FK` (`exam_id`),
  CONSTRAINT `contributor_FK` FOREIGN KEY (`contributor_id`) REFERENCES `contributors` (`id`),
  CONSTRAINT `exam_FK` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dump dei dati della tabella studeo.solutions: ~0 rows (circa)
/*!40000 ALTER TABLE `solutions` DISABLE KEYS */;
/*!40000 ALTER TABLE `solutions` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
