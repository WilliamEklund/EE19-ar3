-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 31 jan 2022 kl 08:36
-- Serverversion: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP-version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `movie_db`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `movies`
--

CREATE TABLE `movies` (
  `Titel` varchar(45) DEFAULT NULL,
  `Inkomst` varchar(11) DEFAULT NULL,
  `Datum` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `movies`
--

INSERT INTO `movies` (`Titel`, `Inkomst`, `Datum`) VALUES
('Avatar', '$2787965087', 2009),
('Titanic', '$2187463944', 1997),
('Star Wars: The Force Awakens', '$2068223624', 2015),
('Avengers: Infinity War', '$2048359754', 2018),
('Jurassic World', '$1671713208', 2015),
('Avengers: Endgame film currently playing', '$1664151786', 2019),
('The Avengers', '$1518812988', 2012),
('Furious 7', '$1516045911', 2015),
('Avengers: Age of Ultron', '$1405403694', 2015),
('Black Panther', '$1346913161', 2018),
('Harry Potter and the Deathly Hallows – Part 2', '$1341693157', 2011),
('Star Wars: The Last Jedi', '$1332539889', 2017),
('Jurassic World: Fallen Kingdom', '$1309484461', 2018),
('Frozen', '$1290000000', 2013),
('Beauty and the Beast', '$1263521126', 2017),
('Incredibles 2', '$1242805359', 2018),
('The Fate of the Furious', '$1238764765', 2017),
('Iron Man 3', '$1214811252', 2013),
('Minions', '$1159398397', 2015),
('Captain America: Civil War', '$1153304495', 2016),
('Aquaman film currently playing', '$1147661807', 2018),
('Transformers: Dark of the Moon', '$1123794079', 2011),
('The Lord of the Rings: The Return of the King', '$1120237002', 2003),
('Captain Marvel film currently playing', '$1112776609', 2019),
('Skyfall', '$1108561013', 2012),
('Transformers: Age of Extinction', '$1104054072', 2014),
('The Dark Knight Rises', '$1084939099', 2012),
('Toy Story 3', '$1066969703', 2010),
('Pirates of the Caribbean: Dead Man\'s Chest', '$1066179725', 2006),
('Rogue One: A Star Wars Story', '$1056057273', 2016),
('Pirates of the Caribbean: On Stranger Tides', '$1045713802', 2011),
('Despicable Me 3', '$1034799409', 2017),
('Jurassic Park', '$1029939903', 1993),
('Finding Dory', '$1028570889', 2016),
('Star Wars: Episode I – The Phantom Menace', '$1027044677', 1999),
('Alice in Wonderland', '$1025467110', 2010),
('Zootopia', '$1023784195', 2016),
('The Hobbit: An Unexpected Journey', '$1021103568', 2012),
('The Dark Knight', '$1004558444', 2008),
('Harry Potter and the Philosopher\'s Stone', '$975051288', 2001),
('Despicable Me 2', '$970761885', 2013),
('The Lion King', '$968483777', 1994),
('The Jungle Book', '$966550600', 2016),
('Pirates of the Caribbean: At World\'s End', '$963420425', 2007),
('Jumanji: Welcome to the Jungle', '$962126927', 2017),
('Harry Potter and the Deathly Hallows – Part 1', '$960431568', 2010),
('The Hobbit: The Desolation of Smaug', '$958366855', 2013),
('The Hobbit: The Battle of the Five Armies', '$956019788', 2014),
('Finding Nemo', '$940335536', 2003),
('Harry Potter and the Order of the Phoenix', '$940018451', 2007);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
