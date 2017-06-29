-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 jun 2017 om 20:52
-- Serverversie: 5.7.11
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_application_v2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Kies een kaart...'),
(2, 'Lunch'),
(3, 'Diner'),
(4, 'Dessert');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `subcategories_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `dishes`
--

INSERT INTO `dishes` (`id`, `categories_id`, `subcategories_id`, `title`, `description`, `price`) VALUES
(1, 1, 2, 'Caesar salade', 'met dressing.', 2.5),
(2, 2, 3, 'Tomatensoep', 'met kruiden.', 2.25),
(3, 3, 5, 'Softijs', 'met chocoladesaus.', 2.75),
(4, 2, 4, 'Varkenshaasmedaillons', 'met aardappelen en saus.', 15.75);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderlists`
--

CREATE TABLE `orderlists` (
  `id` int(11) NOT NULL,
  `reservations_id` int(11) NOT NULL,
  `dishes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orderlists`
--

INSERT INTO `orderlists` (`id`, `reservations_id`, `dishes_id`) VALUES
(1, 2, 1),
(2, 2, 4),
(3, 2, 2),
(4, 2, 3),
(5, 2, 2),
(6, 2, 1),
(7, 2, 2),
(8, 2, 4),
(9, 2, 3),
(10, 2, 3),
(56, 2, 2),
(57, 2, 1),
(58, 2, 2),
(59, 2, 4),
(60, 2, 3),
(61, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `persons` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephonenumber` varchar(45) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_date`, `reservation_time`, `persons`, `lastname`, `email`, `telephonenumber`, `company_name`) VALUES
(2, '2017-07-31', '18:45:00', 1, 'Kroondijk', 'f.kroondijk@fcroc.nl', '0612345678', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `subcategory` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory`) VALUES
(1, 'Kies een categorie...'),
(2, 'Broodjes'),
(3, 'Salade'),
(4, 'Voorgerecht - Soep'),
(5, 'Hoofdgerecht - Vlees'),
(6, 'IJs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Demo', '$2y$10$7stZtONHltRzbD4ZQ4iVQesWPGYrsLYGfHCy4JSXC0Rw9pzINrddK');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dishes_categories_idx` (`categories_id`),
  ADD KEY `fk_dishes_subcategories1_idx` (`subcategories_id`);

--
-- Indexen voor tabel `orderlists`
--
ALTER TABLE `orderlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderlists_has_dishes_dishes1_idx` (`dishes_id`),
  ADD KEY `fk_orderlists_has_dishes_orderlists1_idx` (`reservations_id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `orderlists`
--
ALTER TABLE `orderlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `fk_dishes_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dishes_subcategories1` FOREIGN KEY (`subcategories_id`) REFERENCES `subcategories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `orderlists`
--
ALTER TABLE `orderlists`
  ADD CONSTRAINT `fk_orderlists_has_dishes_dishes1` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderlists_has_dishes_orderlists1` FOREIGN KEY (`reservations_id`) REFERENCES `reservations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
