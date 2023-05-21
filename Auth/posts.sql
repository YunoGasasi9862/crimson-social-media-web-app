SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postid` bigint NOT NULL,
  `username` varchar(500) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `comments` int NOT NULL,
  `likes` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `postid` (`postid`),
  KEY `likes` (`likes`),
  KEY `date` (`date`),
  KEY `comments` (`comments`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `posts` (`id`, `postid`, `username`, `post`, `image`, `comments`, `likes`, `date`) VALUES
(12, 632027717095717, 'root2525', 'Are you ready for a new adventure? Where are the kids?', 'd6f74ba5a378ee7a5e565d7b1cdcaabbcbcf12d4.jpg', 0, 0, '2023-05-21 19:34:23'),
(10, 80038883, 'root2525', 'This lovely bird eats some pizza :)', '6b48ed9fba4b1e1efd295ce7bed39f556cf8c8e4.jpg', 0, 0, '2023-05-21 19:31:50'),
(11, 2621430541036, 'root2525', 'Someone is trying to imitate my voice :D', '766fe79ccbcf440e06f3d2890a4d4bf4df72624c.jpeg', 0, 0, '2023-05-21 19:33:04'),
(13, 81368725267205, 'root2525', 'He looks like my grandpa :D', 'e332613671505a86ae20e8974b275744d8e02426.jpg', 0, 0, '2023-05-21 19:36:25');

ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);
COMMIT;
