-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 nov 2019 om 11:13
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sub_course_id`, `created_at`, `updated_at`)
VALUES (1, 'Tomatensoep', 4.95, 1, NULL, NULL),
       (2, 'Groentesoep', 3.95, 1, NULL, NULL),
       (3, 'Aspergesoep', 4.95, 1, NULL, NULL),
       (4, 'Uiensoep', 3.95, 1, NULL, NULL),
       (5, 'Salade met geitenkaas', 4.95, 2, NULL, NULL),
       (6, 'Tonijnsalade', 5.95, 2, NULL, NULL),
       (7, 'Zalmsalade', 5.95, 2, NULL, NULL),
       (8, 'Gebakken makreel', 8.95, 3, NULL, NULL),
       (9, 'Mosselen uit pan', 9.95, 3, NULL, NULL),
       (10, 'Biefstuk in champignonsaus', 11.95, 4, NULL, NULL),
       (11, 'Wienerschnitzel', 9.95, 4, NULL, NULL),
       (12, 'Bonengerecht met diverse groenten', 11.95, 5, NULL, NULL),
       (13, 'Gebakken banaan', 10.95, 5, NULL, NULL),
       (14, 'Black Lady', 4.95, 6, NULL, NULL),
       (15, 'Vruchtenijs', 2.95, 6, NULL, NULL),
       (16, 'Choccolademousse', 4.95, 7, NULL, NULL),
       (17, 'Vanillemousse', 3.95, 7, NULL, NULL),
       (18, 'Koffie', 2.45, 8, NULL, NULL),
       (19, 'Thee', 2.45, 8, NULL, NULL),
       (20, 'Chocolademelk', 2.95, 8, NULL, NULL),
       (21, 'Espresso', 2.45, 8, NULL, NULL),
       (22, 'Koffie verkeerd', 2.95, 8, NULL, NULL),
       (23, 'Latte Macchiato', 3.95, 8, NULL, NULL),
       (24, 'Pilsner', 2.95, 9, NULL, NULL),
       (25, 'Weizen', 3.95, 9, NULL, NULL),
       (26, 'Stender', 2.95, 9, NULL, NULL),
       (27, 'Palm', 3.60, 9, NULL, NULL),
       (28, 'Kasteel donker', 4.75, 9, NULL, NULL),
       (29, 'Brugse Zotte', 3.95, 9, NULL, NULL),
       (30, 'Grimbergen dubbel', 3.95, 9, NULL, NULL),
       (31, 'Per glas', 3.95, 10, NULL, NULL),
       (32, 'Per fles', 17.95, 10, NULL, NULL),
       (33, 'Seizoenswijn', 3.95, 10, NULL, NULL),
       (34, 'Rode port', 3.60, 10, NULL, NULL),
       (35, 'Tonic', 2.95, 11, NULL, NULL),
       (36, 'Seven Up', 2.95, 11, NULL, NULL),
       (37, 'Verse Jus', 3.95, 11, NULL, NULL),
       (38, 'Chaudfontaine rood', 2.75, 11, NULL, NULL),
       (39, 'Chaudfontaine blauw', 2.75, 11, NULL, NULL),
       (40, 'Bitterballen met mosterd', 4.00, 12, NULL, NULL),
       (41, 'Vlammetjes met chilisaus', 4.00, 12, NULL, NULL),
       (42, 'Kipbites', 5.00, 12, NULL, NULL),
       (43, 'Portie kaas met mosterd', 4.00, 13, NULL, NULL),
       (44, 'Brood met kruidenboter', 5.00, 13, NULL, NULL),
       (45, 'Portie salami wordt', 4.00, 13, NULL, NULL);


--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`),
    ADD KEY `products_sub_course_id_foreign` (`sub_course_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 24;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
    ADD CONSTRAINT `products_sub_course_id_foreign` FOREIGN KEY (`sub_course_id`) REFERENCES `sub_courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
