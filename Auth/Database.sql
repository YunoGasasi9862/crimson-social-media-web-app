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
INSERT INTO `posts` (`postid`, `username`, `post`, `image`, `comments`, `likes`, `date`)
VALUES
    ('post1', 'hello12', 'This is the first post.', 'image1.jpg', 'comment1,comment2', 'user2,user3,user4', '2023-05-30 12:00:00'),
    ('post2', 'hello12', 'Here is another post.', 'image2.jpg', 'comment3,comment4,comment5', 'user1,user3', '2023-05-31 10:30:00'),
    ('post3', 'hello12', 'Check out this cool photo!', 'image3.jpg', 'comment6', 'user1,user2,user4,user5', '2023-05-31 15:45:00'),
    ('post4', 'iman', 'Feeling great today!', NULL, 'comment7,comment8', 'user2,user5', '2023-06-01 08:20:00'),
    ('post5', 'bilal', 'Just posted a new article.', NULL, 'comment9', 'user1,user3,user4', '2023-06-01 13:10:00');

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
  `content` tinyint(1) NOT NULL,
PRIMARY KEY (`id`)

) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
COMMIT;
