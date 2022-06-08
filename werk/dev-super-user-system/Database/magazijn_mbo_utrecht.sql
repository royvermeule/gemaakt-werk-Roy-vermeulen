-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 feb 2022 om 20:10
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazijn_mbo_utrecht`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roll`
--

DROP TABLE IF EXISTS `roll`;
CREATE TABLE IF NOT EXISTS `roll` (
  `rollName` varchar(100) NOT NULL,
  `Omschrijving` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rollName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roll`
--

INSERT INTO `roll` (`rollName`, `Omschrijving`) VALUES
('Student', 'de leerlingen'),
('SuperUser', 'The main man');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `location` (`Location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `infix` text,
  `lastname` varchar(255) NOT NULL,
  `UserRoll` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userRoll` (`UserRoll`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `firstname`, `infix`, `lastname`, `UserRoll`) VALUES
(3, 'skylorvd@gmail.com', '123', 'sky', 'van', 'duss', 'SuperUser');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `LocationID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location` (`LocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserRoll`) REFERENCES `roll` (`rollName`);

--
-- Beperkingen voor tabel `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`LocationID`) REFERENCES `userinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
