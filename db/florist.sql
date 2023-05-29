-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 04. 05 2023 kl. 13:43:09
-- Serverversion: 10.4.27-MariaDB
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florist`
--
CREATE DATABASE IF NOT EXISTS `florist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `florist`;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plants`
--

CREATE TABLE `plants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_fk` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `latin_name` varchar(100) NOT NULL,
  `price_DKK` smallint(5) UNSIGNED NOT NULL,
  `min_hight_cm` float NOT NULL,
  `max_hight_cm` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `season` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `plants`
--

INSERT INTO `plants` (`id`, `family_fk`, `name`, `latin_name`, `price_DKK`, `min_hight_cm`, `max_hight_cm`, `color`, `season`) VALUES
(1, 1, 'Apple tree', 'Malus domestica', 150, 200, 900, 'White flowers with a pink fade', 'Spring'),
(2, 2, 'Arrowwood ', 'Cornus florida', 200, 400, 1000, 'Greenish-yellow flowers', 'Spring'),
(3, 3, 'Bird of paradise', 'Strelitzia reginae', 450, 100, 200, 'Orange sepals and purplish-blue or white petals', 'Summer'),
(4, 1, 'Blackberry', 'Rubus allegheniensis', 150, 300, 900, 'White flowers', 'Autumn'),
(5, 4, 'Black-eyed Susan', 'Rudbeckia hirta', 100, 30, 100, 'Yellow petals', 'Late summer and early autumn'),
(6, 5, 'Butterfly weed', 'Asclepias tuberosa', 125, 30, 100, 'Orange, yellow or red flowers', 'Autumn'),
(7, 4, 'Florist\'s daisy', 'Chrysanthemum ', 400, 30, 90, 'Green, white, yellow, pink or purple flowers', 'Spring'),
(8, 6, 'Coffee plant', 'Coffea', 300, 300, 400, 'White flowers', 'Summer'),
(9, 7, 'Corydalis', 'Corydalis cava', 50, 15, 30, 'Mauve, purple, red, or white flowers', 'Spring'),
(10, 8, 'Cotton plant', 'Gossypium ', 350, 100, 200, 'Unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plants_family`
--

CREATE TABLE `plants_family` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `plants_family`
--

INSERT INTO `plants_family` (`id`, `name`) VALUES
(1, 'Rosaceae'),
(2, 'Cornaceae'),
(3, 'Strelitziaceae'),
(4, 'Asteraceae'),
(5, 'Apocynaceae'),
(6, 'Rubiaceae'),
(7, 'Papaveraceae'),
(8, 'Malvaceae');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `plants`
--
ALTER TABLE `plants`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `family_fk` (`family_fk`);

--
-- Indeks for tabel `plants_family`
--
ALTER TABLE `plants_family`
  ADD UNIQUE KEY `id` (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `plants`
--
ALTER TABLE `plants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tilføj AUTO_INCREMENT i tabel `plants_family`
--
ALTER TABLE `plants_family`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`family_fk`) REFERENCES `plants_family` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
