-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 29.Dec 2022, 20:34
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
-- Štruktúra tabuľky pre tabuľku `comm`
--

CREATE TABLE `comm` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `text_comm` varchar(500) NOT NULL,
  `id_article` varchar(255) NOT NULL,
  `id_comm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `comm`
--

INSERT INTO `comm` (`id_user`, `name_user`, `text_comm`, `id_article`, `id_comm`) VALUES
(45, '654', 'PIKO do nosa', 'sdfg-1672161921', 16);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `comm`
--
ALTER TABLE `comm`
  ADD PRIMARY KEY (`id_comm`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `comm`
--
ALTER TABLE `comm`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
