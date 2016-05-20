-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 m. Geg 20 d. 00:35
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
('Rasta', 'Jono BasanaviÄiaus g. 22, Vilnius', 54.6814099, 25.26998500000002, 'Radau gaidÄ¯', '83702544', 'pasts@gmail.com', '');

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
(1, 'tomas', 'tomas', 'Tomas', 'Balasevicius', 'tomas.balasevicius@gmail.com', 1);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
