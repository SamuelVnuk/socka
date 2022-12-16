-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 16.Dec 2022, 17:42
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Text` varchar(500) DEFAULT NULL,
  `Cover_image` varchar(50) DEFAULT NULL,
  `Autor` varchar(50) DEFAULT NULL,
  `Create_time` timestamp NULL DEFAULT current_timestamp(),
  `url_ar` varchar(255) NOT NULL,
  `id_author` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `articles`
--

INSERT INTO `articles` (`Id`, `Title`, `Text`, `Cover_image`, `Autor`, `Create_time`, `url_ar`, `id_author`, `category`) VALUES
(31, 'asda', 'dsasad', 'poznamky.jpg', 'asdsad', '2022-12-15 17:49:45', 'asda-1671126585', 49, ''),
(32, 'asdsad', 'asdsadsad', 'poznamky.jpg', 'adssaddas', '2022-12-15 17:51:03', 'asdsad-1671126663', 49, ''),
(33, 'asdsad', 'asdasdasdsda', 'stonks.jpg', 'asdasddas', '2022-12-15 17:51:07', 'asdsad-1671126667', 49, ''),
(34, 'asd', 'asd', 'stonks.jpg', 'asd', '2022-12-15 18:12:32', 'asd-1671127952', 49, 'Kultura');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
