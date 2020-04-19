-- Dumping structure for table webapps.todofolders
CREATE TABLE IF NOT EXISTS `todofolders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(50) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table webapps.todotasks
CREATE TABLE IF NOT EXISTS `todotasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5000) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `folder` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `special` varchar(50) NOT NULL DEFAULT 'none',
  `priority` varchar(50) NOT NULL DEFAULT '3',
  `done` tinyint(4) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table webapps.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `recovery` varchar(50) NOT NULL DEFAULT '0',
  `donor` tinyint(1) NOT NULL DEFAULT 0,
  `theme` varchar(50) NOT NULL DEFAULT 'light',
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COMMENT='Users for all web apps.\r\n';