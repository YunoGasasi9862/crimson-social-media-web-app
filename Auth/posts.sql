SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postid` bigint NOT NULL,
  `userid` bigint NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int NOT NULL,
  `likes` int NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `postid` (`postid`),
  KEY `userid` (`userid`),
  KEY `likes` (`likes`),
  KEY `date` (`date`),
  KEY `comments` (`comments`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);
COMMIT;

