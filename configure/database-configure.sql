-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps`;
USE `webapps`;

-- Dumping structure for table webapps.passwordlogin
CREATE TABLE IF NOT EXISTS `passwordlogin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `accountid` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `recovery` varchar(256) DEFAULT NULL,
  `sessionid` varchar(256) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `timezone` varchar(100) NOT NULL DEFAULT 'America/Detroit',
  `verified` varchar(256) DEFAULT 'false',
  `setupcomplete` varchar(256) DEFAULT 'false',
  `status` varchar(256) DEFAULT 'active',
  `verifycode` varchar(256) DEFAULT NULL,
  `taskcompletegoal` varchar(10) NOT NULL DEFAULT '2',
  `theme` varchar(50) NOT NULL DEFAULT 'light',
  `preminum` varchar(50) NOT NULL DEFAULT 'false',
  `preminumend` varchar(50) DEFAULT NULL,
  `monitor` varchar(50) NOT NULL DEFAULT 'false',
  `admin` varchar(50) NOT NULL DEFAULT 'false',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `sessionid` (`sessionid`),
  UNIQUE KEY `recovery` (`recovery`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `token` (`token`),
  UNIQUE KEY `accountid` (`accountid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping structure for table webapps.tasks_bug
CREATE TABLE IF NOT EXISTS `tasks_bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(64) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping structure for table webapps.tasks_folders
CREATE TABLE IF NOT EXISTS `tasks_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) DEFAULT NULL,
  `fid` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT '575b68',
  `created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `fid` (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping structure for table webapps.tasks_log
CREATE TABLE IF NOT EXISTS `tasks_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `cfdata` longtext DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1106 DEFAULT CHARSET=utf8mb4;

-- Dumping structure for table webapps.tasks_tasks
CREATE TABLE IF NOT EXISTS `tasks_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(500) DEFAULT NULL,
  `tid` varchar(24) NOT NULL,
  `parenttid` varchar(24) DEFAULT NULL,
  `folderid` varchar(100) DEFAULT NULL,
  `name` mediumtext DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `priority` varchar(100) NOT NULL DEFAULT 'p3',
  `shareable` varchar(100) NOT NULL DEFAULT 'false',
  `scheduledate` varchar(100) DEFAULT NULL,
  `completed` varchar(64) NOT NULL DEFAULT 'false',
  `dateshowcomplete` varchar(64) DEFAULT NULL,
  `completehour` varchar(64) DEFAULT NULL,
  `completemonth` varchar(64) DEFAULT NULL,
  `completeyear` varchar(64) DEFAULT NULL,
  `datecompleted` datetime DEFAULT NULL,
  `backenddate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `taskid` (`tid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=725 DEFAULT CHARSET=latin1;