SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `friendsposts`;
CREATE TABLE IF NOT EXISTS `friendsposts` (
  `id` bigint NOT NULL,
  `userEmail` varchar(500) NOT NULL,
  `FriendEmail` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `friendsposts` (`id`, `userEmail`, `FriendEmail`) VALUES
(1,"", "")
COMMIT;
