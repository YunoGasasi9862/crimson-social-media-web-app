SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `profile` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `DOB` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users`(`email`, `password`, `username`, `name`, `surname`, `profile`, `DOB`) VALUES 
('root@gmail.com', '$2y$10$dV7UJZd8g9IKvmdjCwIlJeMKrdx2.2tU37aUf63PBwSJFTQL4u2sy', 'hello12','root', 'root', NULL, '19-02-2000');
INSERT INTO `users`(`email`, `password`, `username`, `name`, `surname`, `profile`, `DOB`) VALUES 
('iman@gmail.com', '$2y$10$dV7UJZd8g9IKvmdjCwIlJeMKrdx2.2tU37aUf63PBwSJFTQL4u2sy', 'imanzahid','iman', 'zahid', NULL, '19-02-2000');
COMMIT;


DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `userEmail` varchar(500) NOT NULL,
  `FriendEmail` varchar(500) NOT NULL,
  PRIMARY KEY (`userEmail`, `FriendEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("m.bilal9862@gmail.com", "iman@gmail.com");
INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("root@gmail.com", "iman@gmail.com");
INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("iman@gmail.com", "m.bilal9862@gmail.com");
INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("iman@gmail.com", "root@gmail.com");
COMMIT;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postid` varchar(100) NOT NULL,
  `username` varchar(500) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `comments` varchar(500),
  `likes` varchar(500),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `postid` (`postid`),
  KEY `likes` (`likes`),
  KEY `date` (`date`),
  KEY `comments` (`comments`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);
COMMIT;


DROP TABLE IF EXISTS `LUikes`;
CREATE TABLE IF NOT EXISTS `LUikes` (
  `username` varchar(100) NOT NULL,
  `postid` varchar(100) NOT NULL,
  `liked` varchar(100)  ,
PRIMARY KEY (`username`, `postid`)

) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
COMMIT;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `postid` varchar(100) NOT NULL,
  `comment` varchar(500)  ,
PRIMARY KEY (`id`, `username`, `postid`)

) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
COMMIT;

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fromUserEmail` varchar(100) NOT NULL,
  `toUserEmail` varchar(100) NOT NULL,
  `content` varchar(500)  ,
PRIMARY KEY (`id`)

) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
COMMIT;