-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 15. jun 2017 ob 05.08
-- Različica strežnika: 10.1.21-MariaDB
-- Različica PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `turistika`
--

-- --------------------------------------------------------

--
-- Struktura tabele `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `destination_id`, `content`, `date_add`) VALUES
(1, 1, 1, 'To je TOP destinacija!', '2015-06-01 07:12:25'),
(2, 2, 1, 'Malo moram popraviti zamike!', '2015-06-01 07:59:45'),
(3, 2, 1, 'asdasdasd', '2015-06-01 07:59:48'),
(5, 2, 1, 'sdfsdfsdf', '2015-06-05 08:50:01');

-- --------------------------------------------------------

--
-- Struktura tabele `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `short` varchar(5) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `countries`
--

INSERT INTO `countries` (`id`, `title`, `short`) VALUES
(9, 'Avstrija', 'AUT'),
(8, 'Bosna in hercegovina', 'BiH'),
(6, 'SLOVENIJA', 'SLO'),
(7, 'Italija', 'ITA');

-- --------------------------------------------------------

--
-- Struktura tabele `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci,
  `www` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `lat` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `destinations`
--

INSERT INTO `destinations` (`id`, `user_id`, `country_id`, `title`, `description`, `www`, `lat`, `alt`) VALUES
(1, 4, 6, 'Trg mladost 3', 'Najboljša šola na svetu', 'vss.scv.si', '46.8437568', '15.98234765'),
(5, 4, 8, 'VELENJE', 'saf,msdbnlfsndlkjfnsdlkjf', 'sdfbsdkfjnkl.net', '32', '34'),
(3, 1, 7, 'Bled', 'Lep otok s cerkvijo.', 'www.bled.si', '32', '12'),
(4, 1, 7, 'Hradčani222', 'asfdasdfsdf', 'www.nevem.com', '123', '123');

-- --------------------------------------------------------

--
-- Struktura tabele `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `destionation_id` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `pictures`
--

INSERT INTO `pictures` (`id`, `destionation_id`, `url`, `title`) VALUES
(1, 1, 'slike/20150522090447000000Lighthouse.jpg', 'asdasdasd'),
(2, 3, 'slike/20150522090518000000Penguins.jpg', 'asdasdasdasdasd'),
(3, 3, 'slike/20150522094140000000Chrysanthemum.jpg', 'sdfsdf'),
(4, 3, 'slike/20150522094211000000VSO-LAB7.doc', 'tzhtrzr'),
(5, 3, 'slike/20150522100118000000Chrysanthemum.jpg', 'asdasdasd'),
(6, 3, 'slike/20150522100126000000Lighthouse.jpg', 'asdasdasdasdasd'),
(7, 3, 'slike/20150522100146000000Penguins.jpg', 'asdasdasdasdasd'),
(8, 4, 'slike/20150522101340000000Lighthouse.jpg', 'asdasd'),
(9, 1, 'slike/20150522101353000000Chrysanthemum.jpg', 'asdasd');

-- --------------------------------------------------------

--
-- Struktura tabele `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `destination_id`, `date_add`, `rate`) VALUES
(1, 3, 5, '2017-06-08 10:57:43', 5),
(2, 3, 1, '2017-06-08 11:17:07', 3);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `first_name`, `last_name`, `avatar`, `admin`) VALUES
(1, 'islam.music@gmail.com', '3f36904e6a37768f747cbdf0c63831a84529d738', 'Islam', 'Mušić', NULL, 1),
(2, 'qqq@qq.qq', '3149b3a425530c3adf8b8b2daac40d0bf35882bf', 'qqq', 'qqq', NULL, 0),
(6, 'glogovsekgal@gmail.com', '9f1fca93faada6099bcfa8069e71c06326b9b1ed', 'Gal', 'Glogovsek', NULL, 0),
(4, 'glogovsekgal1@gmail.com', '9f1fca93faada6099bcfa8069e71c06326b9b1ed', 'Gal', 'Glogovšek', NULL, 1),
(5, 'kesa@gmail.com', '42034bc91aff3a878ae06d88d113ea464034d60a', 'kesa', 'kesa', NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `vacations`
--

CREATE TABLE `vacations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci ROW_FORMAT=COMPACT;

--
-- Odloži podatke za tabelo `vacations`
--

INSERT INTO `vacations` (`id`, `user_id`, `destination_id`, `start_date`, `end_date`) VALUES
(1, 4, 1, '2017-06-14', '2017-06-16'),
(2, 4, 5, '2017-06-05', '2017-06-09'),
(3, 5, 5, '2017-06-16', '2017-06-28'),
(4, 5, 5, '2017-06-14', '2017-06-16'),
(5, 5, 5, '2017-06-01', '2017-06-04'),
(6, 5, 5, '2017-05-10', '2017-05-12'),
(7, 5, 5, '2018-01-01', '2018-01-03'),
(8, 6, 1, '2017-06-15', '2017-06-19');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destionation_id` (`destionation_id`);

--
-- Indeksi tabele `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksi tabele `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT tabele `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT tabele `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT tabele `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
