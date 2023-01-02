-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 29.Dec 2022, 20:33
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
(34, 'asd', 'asd', 'stonks.jpg', 'asd', '2022-12-15 18:12:32', 'asd-1671127952', 49, 'Kultura'),
(35, 'qwe', 'asczxczx', 'bussiness_man.jpg', 'eqw', '2022-12-16 17:04:24', 'qwe-1671210264', 0, 'Zdravie'),
(36, 'das', 'sdvvsdvsd', 'bussiness_man.jpg', 'asdasd', '2022-12-16 17:05:09', 'das-1671210309', 45, 'Gaming'),
(37, 'sdvsdv', 'vsdvdsvds', 'bussiness_man.jpg', 'dvssdv', '2022-12-16 17:05:15', 'sdvsdv-1671210315', 45, 'Moda'),
(38, 'gfdwerg', 'hgjfgd', 'poznamky.jpg', 'tkuytr', '2022-12-16 17:05:23', 'gfdwerg-1671210323', 45, ''),
(40, 'PIKOLAS', 'FLEX', 'bussiness_man.jpg', 'dfgfgd', '2022-12-16 17:05:35', 'srgder-1671210335', 45, ''),
(41, 'hsgfddfg', 'trhhrdth', 'house.jpg', 'fdghfdgh', '2022-12-16 17:05:42', 'hsgfddfg-1671210342', 45, 'Politika'),
(42, 'fdghnfd', 'nfgdngfdntdrf', '', 'nfdgfdng', '2022-12-16 17:05:45', 'fdghnfd-1671210345', 45, ''),
(43, 'dntrfntdr', 'drtnrtdnrdnt', 'bussiness_man.jpg', 'ndtrndtrdnrt', '2022-12-16 17:05:54', 'dntrfntdr-1671210354', 45, 'Kultura'),
(44, 'nfgdfgnd', 'rtndrtndnrtd', 'stonks.jpg', 'rtndrtdh', '2022-12-16 17:06:00', 'nfgdfgnd-1671210360', 45, 'Moda'),
(45, 'zfgsdff', 'zdfg', 'bussiness_man.jpg', 'dfxhgdzfxg', '2022-12-16 17:06:07', 'zfgsdff-1671210367', 45, 'Sport'),
(46, 'fngdd', 'gmfm', 'stonks.jpg', 'fdhfhm', '2022-12-16 17:06:12', 'fngdd-1671210372', 45, 'Zdravie'),
(47, 'SAMO', 'DEBILEK', 'stonks.jpg', 'PRIMITIV', '2022-12-19 20:54:37', 'SAMO-1671483277', 45, 'Gaming'),
(48, 'nicolas', 'nicolassssss', '', 'nicolas', '2022-12-27 17:14:26', 'nicolas-1672161266', 45, ''),
(49, 'asfd', 'sgfd', '', 'sdfg', '2022-12-27 17:22:51', 'asfd-1672161771', 45, 'Kultura'),
(50, 'sdfg', 'asfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JHGHGGJL/L,LUJYTHSJJ/LJHGFDGDGJ,HJ.LJHTRGHJYJSABNHMHJHJasfjhlg.jhfsASRHKJHLKL//JH', 'stonks.jpg', 'asdf', '2022-12-27 17:25:21', 'sdfg-1672161921', 45, 'Gaming');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
