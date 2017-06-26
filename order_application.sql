-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jun 2017 om 11:49
-- Serverversie: 5.7.11
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_application`
--
CREATE DATABASE order_application;
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'Q%w$(dK4UAvLbrKu';
GRANT ALL PRIVILEGES ON order_application . * TO 'admin'@'localhost';
USE order_application;
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `category` enum('Lunch','Diner','Dessert') DEFAULT NULL,
  `subcategory` enum('Broodjes','Clubs','Wraps','Salades','Soep','Warm','Kids','Stevige hap','Voorgerecht - Koud','Voorgerecht - Soep','Voorgerecht - Warm','Voorgerecht - Salades','Hoofdgerecht - Vis','Hoofdgerecht - Vegetarisch','Hoofdgerecht - Vlees','IJs') DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `dishes`
--

INSERT INTO `dishes` (`id`, `category`, `subcategory`, `title`, `description`, `price`, `created`, `modified`) VALUES
(17, 'Lunch', 'Broodjes', 'Broodje gezond met ham á la Ruurd', 'met ham - kaas - sla - ei.', 2.3, '2017-06-23 15:31:13', '2017-06-24 12:02:32'),
(18, 'Lunch', 'Wraps', 'Honing mosterd wrap', 'met honing mosterd saus - sla - tomaat - verse stukken kip.', 3.75, '2017-06-23 15:38:40', '2017-06-24 18:21:32'),
(19, 'Diner', 'Voorgerecht - Koud', 'Brood & boter', 'verschillende broodsoorten met aïoli, kruidenboter en een wisselende dip.', 5.2, '2017-06-24 12:19:35', '2017-06-24 12:19:35'),
(20, 'Diner', 'Voorgerecht - Soep', 'Tomatensoep', 'met een scheutje pesto.', 4.9, '2017-06-24 12:20:03', '2017-06-24 12:20:03'),
(21, 'Diner', 'Hoofdgerecht - Vlees', 'Varkenshaasmedaillons', 'met champignons en gorgonzolasaus.', 19.1, '2017-06-24 12:20:45', '2017-06-24 12:20:45'),
(23, 'Dessert', 'IJs', 'Softijs', 'met chocoladesaus en nootjes', 1.5, '2017-06-24 16:01:26', '2017-06-24 17:25:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderlists`
--

CREATE TABLE `orderlists` (
  `id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `persons` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephonenumber` varchar(45) NOT NULL,
  `copmany_name` varchar(45) DEFAULT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orderlists`
--

INSERT INTO `orderlists` (`id`, `reservation_date`, `reservation_time`, `persons`, `lastname`, `email`, `telephonenumber`, `copmany_name`, `dish_id`, `created`, `modified`) VALUES
(1, '2017-06-28', '19:45:00', 1, 'Kroondijk', 'f.kroondijk@fcroc.nl', '0612345678', '', NULL, '2017-06-23 12:07:57', '2017-06-23 12:07:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(2, 'SupremeMaster', '$2y$10$KlVV61OvoCbmHY.dAiA86O4FVblht2IBrYW2KkAMRe1xdMt3RYkUy', '2017-06-19 07:39:14', '2017-06-19 07:39:14'),
(3, 'Demo', '$2y$10$qoegzKukQzd5FAAP.lVRqe5AYuG8VSC6JrGcS6Ur/3vG.5/fVAJAC', '2017-06-24 15:34:53', '2017-06-24 15:34:53');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexen voor tabel `orderlists`
--
ALTER TABLE `orderlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_id` (`dish_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT voor een tabel `orderlists`
--
ALTER TABLE `orderlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orderlists`
--
ALTER TABLE `orderlists`
  ADD CONSTRAINT `orderlists_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
