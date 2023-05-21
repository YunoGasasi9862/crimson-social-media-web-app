SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `userEmail` varchar(500) NOT NULL,
  `FriendEmail` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `friendsposts` (`userEmail`, `FriendEmail`) VALUES
("m.bilal9862@gmail.com", "iman@gmail.com")
COMMIT;
