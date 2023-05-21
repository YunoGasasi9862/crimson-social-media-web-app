SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postid` bigint NOT NULL,
  `username` varchar(500) NOT NULL,
  `post` text,
  `image` varchar(500),
  `comments` int NOT NULL,
  `likes` int NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `postid` (`postid`),
  KEY `likes` (`likes`),
  KEY `date` (`date`),
  KEY `comments` (`comments`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

INSERT INTO `posts`(`postid`, `username`, `post`, `comments`, `likes`) 
VALUES ('1234','busecgn','this is a description','0','0');

COMMIT;
