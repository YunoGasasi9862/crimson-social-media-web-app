SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

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
