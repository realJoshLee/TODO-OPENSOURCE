-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
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
  `token` varchar(500) DEFAULT NULL,
  `otk` varchar(500) DEFAULT NULL,
  `timezone` varchar(100) NOT NULL DEFAULT 'America/Detroit',
  `verified` varchar(256) DEFAULT 'false',
  `setupcomplete` varchar(256) DEFAULT 'false',
  `status` varchar(256) DEFAULT 'active',
  `taskcompletegoal` varchar(10) NOT NULL DEFAULT '2',
  `theme` varchar(50) NOT NULL DEFAULT 'light',
  `preminum` varchar(50) NOT NULL DEFAULT 'false',
  `preminumend` varchar(50) DEFAULT NULL,
  `admin` varchar(50) NOT NULL DEFAULT 'false',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `recovery` (`recovery`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `token` (`token`),
  UNIQUE KEY `accountid` (`accountid`),
  UNIQUE KEY `otk` (`otk`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping structure for table webapps.tasks_bug
CREATE TABLE IF NOT EXISTS `tasks_bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(64) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping structure for table webapps.tasks_config
CREATE TABLE IF NOT EXISTS `tasks_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `whitelist` varchar(500) DEFAULT NULL,
  `magic_link` varchar(500) DEFAULT NULL,
  `verification` varchar(500) DEFAULT NULL,
  `logpage` varchar(500) DEFAULT NULL,
  `sharepage` varchar(500) DEFAULT NULL,
  `accountcreate` varchar(500) DEFAULT NULL,
  `bugreport` varchar(500) DEFAULT NULL,
  `theme` varchar(500) DEFAULT NULL,
  `dataexport` varchar(500) DEFAULT NULL,
  `dataappexport` varchar(500) DEFAULT NULL,
  `dataloginexport` varchar(500) DEFAULT NULL,
  `errorreporting` varchar(500) DEFAULT NULL,
  `reminderemail` varchar(500) DEFAULT NULL,
  `ipwhitelist` varchar(500) DEFAULT NULL, 
  `ipwhitelistval` varchar(500) DEFAULT NULL, 
  `contactemail` varchar(500) DEFAULT NULL,
  `rootwebsite` varchar(500) DEFAULT NULL,
  `fromemail` varchar(500) DEFAULT NULL,
  `fromname` varchar(500) DEFAULT NULL,
  `apipublic` varchar(500) DEFAULT NULL,
  `apiprivate` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tasks_config` (`id`, `content`, `whitelist`, `magic_link`, `verification`, `logpage`, `sharepage`, `accountcreate`, `bugreport`, `theme`, `dataexport`, `dataappexport`, `dataloginexport`, `errorreporting`, `reminderemail`, `contactemail`, `rootwebsite`, `fromemail`, `fromname`, `apipublic`, `apiprivate`) VALUES
	(10, 'main_settings', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'false', 'false', 'false', '0.0.0.0, 0.0.0.0', 'contact@example.com', 'tasks.example.com', 'no-reply@example.com', 'no-reply', 'na', 'na');

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
  `loginip` longtext DEFAULT NULL,
  `logindevice` longtext DEFAULT NULL,
  `loginos` longtext DEFAULT NULL,
  `loginbrowser` longtext DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1595 DEFAULT CHARSET=utf8mb4;

-- Dumping structure for table webapps.tasks_selfhost
CREATE TABLE IF NOT EXISTS `tasks_selfhost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(200) DEFAULT NULL,
  `last` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `domain` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=745 DEFAULT CHARSET=latin1;