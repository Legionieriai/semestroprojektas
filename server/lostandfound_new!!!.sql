-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 m. Geg 20 d. 08:45
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostandfound`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `locations`
--

CREATE TABLE `locations` (
  `type` char(10) DEFAULT NULL,
  `address` tinytext,
  `xcoord` double DEFAULT NULL,
  `ycoord` double DEFAULT NULL,
  `comment` text,
  `telephone` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `picture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `locations`
--

INSERT INTO `locations` (`type`, `address`, `xcoord`, `ycoord`, `comment`, `telephone`, `email`, `picture`) VALUES
('Pamesta', 'Liaudies g. 4, KÄ—dainiai', 55.2855893, 23.95654650000006, 'pameÄiau opel ascona 1.8 l', '+6600450444', 'opelascona@opel.com', ''),
('Pamesta', 'SavanoriÅ³ pr. 30, Kaunas', 54.901269, 23.90933599999994, 'PameÄiau batÄ…', '+3700000021', 'bebato@gmail.com ', ''),
('Pamesta', 'StudentÅ³ g. 50, Kaunas', 54.9039245, 23.957783999999947, 'PameÄiau DeivÄ¯', '+37055555555', 'kurdeivis@pastas.lt', ''),
('Rasta', 'Jono BasanaviÄiaus g. 22, Vilnius', 54.6814099, 25.26998500000002, 'Radau gaidÄ¯', '83702544', 'pasts@gmail.com', ''),
('Rasta', 'V. Kudirkos g. 75, Å iauliai 76330, Lietuva', 55.9349085, 23.313682299999982, 'Radau piniginÄ™', '+32146416558', 'pastas@elpastas.lt', ''),
('Rasta', 'Stoties g. 33, MarijampolÄ— 68262, Lietuva', 54.5553929, 23.36261460000003, 'Radau traktoriÅ³', '51684654655', 'traktorius@traktorius.lt', ''),
('Pamesta', 'BaltÅ³ pr. 26, Kaunas 48193, Lietuva', 54.9284633, 23.881141800000023, 'pameÄiau save', '86025555', 'pameÄiau@save.lt', ''),
('Rasta', 'J. BasanaviÄiaus g. 93, Utena 28228, Lietuva', 55.5000404, 25.609384999999975, 'radau dviratÄ¯', '+370022211546', 'dviratis@dviratis.com', ''),
('Pamesta', 'RumpiÅ¡kÄ—s g. 12-14, KlaipÄ—da, Lietuva', 55.7042471, 21.14757050000003, 'dingo Å¡uo juodas dryÅ¾uotas', '2514775', 'suo@gmail.com', ''),
('Pamesta', 'LaisvÄ—s al. 63, Kaunas 44304, Lietuva', 54.8972169, 23.911917899999935, 'PAMEÄŒIAU GALVÄ„!', '+370111112224', 'galva@mail.com', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(32) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`) VALUES
(2, 'tomas1', 'asd', '', '', 'pas@pasd.ls', 1),
(3, 'tadas', 'tadastadas', '', '', 'tadas@tadas.lt', 1),
(4, 'petras', 'petraspetras', '', '', 'petras@petras.lt', 1),
(5, 'Antanas', 'antanas11', '', '', 'antanas@pastas.lt', 1),
(6, 'juozas', 'asdfghjkl', '', '', 'juozas@juozas.lt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
