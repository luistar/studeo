-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              5.7.14 - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dump della struttura di tabella studeo.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `cfu` tinyint(4) NOT NULL,
  `logo` varchar(512) DEFAULT NULL COMMENT 'path to logo in /img/ folder',
  `description` varchar(512) DEFAULT NULL,
  `year` tinyint(4) NOT NULL COMMENT '1,2,3 -> bachelor 4,5->master 6->free choice',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella studeo.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professorship_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(512) DEFAULT NULL,
  `path` varchar(512) DEFAULT NULL COMMENT 'path to local file, if uploaded',
  `isExercise` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'flag for assignment',
  `date` date DEFAULT NULL,
  `info` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_professorship` (`professorship_id`),
  CONSTRAINT `FK_professorship` FOREIGN KEY (`professorship_id`) REFERENCES `professorships` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella studeo.professors
CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `website` varchar(256) DEFAULT NULL COMMENT 'Link to personal website',
  `docentiWebsite` varchar(256) DEFAULT NULL COMMENT 'Link to docenti.unina page',
  `email1` varchar(256) DEFAULT NULL,
  `email2` varchar(256) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Table to store data on professors';

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella studeo.professorships
CREATE TABLE IF NOT EXISTS `professorships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `start_date` smallint(6) DEFAULT NULL,
  `end_date` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_professor` (`professor_id`),
  KEY `FK_course` (`course_id`),
  CONSTRAINT `FK_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_professor` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella studeo.solutions
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `authorAlt` varchar(256) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `url` varchar(512) NOT NULL,
  `info` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_exam` (`exam_id`),
  CONSTRAINT `FK_exam` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
