CREATE DATABASE IF NOT EXISTS `webapps`;
USE `webapps`;

CREATE TABLE IF NOT EXISTS `passwordlogin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(5000) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `recovery` varchar(256) DEFAULT NULL,
  `sessionid` varchar(256) DEFAULT NULL,
  `token` varchar(50000) DEFAULT NULL,
  `theme` varchar(50) NOT NULL DEFAULT 'default',
  `preminum` varchar(50) NOT NULL DEFAULT 'false',
  `monitor` varchar(50) NOT NULL DEFAULT 'false',
  `admin` varchar(50) NOT NULL DEFAULT 'false',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `sessionid` (`sessionid`),
  UNIQUE KEY `recovery` (`recovery`),
  UNIQUE KEY `username` (`username`) USING HASH,
  UNIQUE KEY `token` (`token`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(100) DEFAULT NULL,
  `name` mediumtext DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `priority` varchar(50) NOT NULL DEFAULT 'p3',
  `pin` varchar(50) DEFAULT 'false',
  `color` varchar(50) NOT NULL DEFAULT '#d1d3d5',
  `bgcolor` varchar(50) NOT NULL DEFAULT 'transparent',
  `highlight` varchar(50) NOT NULL DEFAULT 'false',
  `completed` varchar(50) NOT NULL DEFAULT 'false',
  `parenttask` varchar(50) DEFAULT NULL,
  `parenttaskid` varchar(50) DEFAULT NULL,
  `folder` varchar(50) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `datedatebackend` date NOT NULL DEFAULT current_timestamp(),
  `datebackend` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=599 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tasksfolders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) DEFAULT NULL,
  `folder` longtext DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tasksfoldertasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentfolder` varchar(500) DEFAULT NULL,
  `name` mediumtext DEFAULT NULL,
  `account` varchar(500) DEFAULT NULL,
  `priority` varchar(500) NOT NULL DEFAULT 'p3',
  `pin` varchar(500) NOT NULL DEFAULT 'false',
  `color` varchar(500) NOT NULL DEFAULT '#d1d3d5',
  `bgcolor` varchar(500) NOT NULL DEFAULT 'transparent',
  `highlight` varchar(500) NOT NULL DEFAULT 'false',
  `completed` varchar(500) NOT NULL DEFAULT 'false',
  `parenttask` varchar(500) DEFAULT NULL,
  `parenttaskid` varchar(500) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `datebackend` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;