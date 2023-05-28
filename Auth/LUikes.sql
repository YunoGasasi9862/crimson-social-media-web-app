SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS `LUikes`;
CREATE TABLE IF NOT EXISTS `LUikes` (
  `username` varchar(100) NOT NULL,
  `postid` varchar(100) NOT NULL,
  `liked` varchar(100)  ,
PRIMARY KEY (`username`, `postid`)

) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
COMMIT;
