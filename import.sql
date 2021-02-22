-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `webapps`;

-- Dumping structure for table webapps.passwordlogin
CREATE TABLE IF NOT EXISTS `passwordlogin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `verified` varchar(256) DEFAULT 'false',
  `status` varchar(256) DEFAULT 'active',
  `verifycode` varchar(256) DEFAULT NULL,
  `taskcompletegoal` varchar(10) NOT NULL DEFAULT '2',
  `recovery` varchar(256) DEFAULT NULL,
  `sessionid` varchar(256) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `theme` varchar(50) NOT NULL DEFAULT 'default',
  `preminum` varchar(50) NOT NULL DEFAULT 'false',
  `preminumend` varchar(50) DEFAULT NULL,
  `monitor` varchar(50) NOT NULL DEFAULT 'false',
  `admin` varchar(50) NOT NULL DEFAULT 'false',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `sessionid` (`sessionid`),
  UNIQUE KEY `recovery` (`recovery`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table webapps.taskable_folders
CREATE TABLE IF NOT EXISTS `taskable_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folderid` varchar(64) NOT NULL DEFAULT '0',
  `account` varchar(640) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `color` varchar(50) DEFAULT 'grey-folder',
  `name` mediumtext DEFAULT NULL,
  `notes` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `folderid` (`folderid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table webapps.taskable_log
CREATE TABLE IF NOT EXISTS `taskable_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(500) DEFAULT NULL,
  `item` mediumtext DEFAULT NULL,
  `cfdata` longtext DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3057 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table webapps.taskable_notes
CREATE TABLE IF NOT EXISTS `taskable_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(500) NOT NULL DEFAULT '0',
  `noteid` varchar(500) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `title` varchar(500) NOT NULL DEFAULT '0',
  `content` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `noteid` (`noteid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table webapps.taskable_promos
CREATE TABLE IF NOT EXISTS `taskable_promos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  `claimby` varchar(64) DEFAULT NULL,
  `claims` mediumint(9) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table webapps.taskable_tasks
CREATE TABLE IF NOT EXISTS `taskable_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` varchar(64) NOT NULL,
  `account` varchar(500) DEFAULT NULL,
  `name` longtext DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `priority` varchar(100) NOT NULL DEFAULT 'p3',
  `pinned` varchar(100) NOT NULL DEFAULT 'false',
  `folderid` varchar(100) DEFAULT NULL,
  `parenttaskid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `completed` varchar(64) NOT NULL DEFAULT 'false',
  `cweekday` varchar(64) DEFAULT NULL,
  `cmonth` varchar(64) DEFAULT NULL,
  `cdate` varchar(64) DEFAULT NULL,
  `cyear` varchar(64) DEFAULT NULL,
  `datebackend` date NOT NULL DEFAULT current_timestamp(),
  `datetimebackend` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `taskid` (`taskid`)
) ENGINE=InnoDB AUTO_INCREMENT=469 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
