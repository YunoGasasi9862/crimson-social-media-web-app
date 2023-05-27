
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `userEmail` varchar(500) NOT NULL,
  `FriendEmail` varchar(500) NOT NULL,
  PRIMARY KEY (`userEmail`, `FriendEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("m.bilal9862@gmail.com", "iman@gmail.com");
INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("iman@gmail.com", "m.bilal9862@gmail.com");
INSERT INTO `friends` (`userEmail`, `FriendEmail`) VALUES
("iman@gmail.com", "root@gmail.com");
COMMIT;
