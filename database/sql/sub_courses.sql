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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `sub_courses`
--

INSERT INTO `sub_courses` (`id`, `name`, `main_course_id`, `created_at`, `updated_at`) VALUES
(1, 'Warme voorgerechten', 1, NULL, NULL),
(2, 'Koude voorgerechten', 1, NULL, NULL),
(3, 'Visgerechten', 2, NULL, NULL),
(4, 'Vleesgerechten', 2, NULL, NULL),
(5, 'Vegetarische gerechten', 2, NULL, NULL),
(6, 'Ijs', 3, NULL, NULL),
(7, 'Mousse', 3, NULL, NULL),
(8, 'Warme dranken', 4, NULL, NULL),
(9, 'Bieren', 4, NULL, NULL),
(10, 'Huiswijnen', 4, NULL, NULL),
(11, 'Frisdranken', 4, NULL, NULL),
(12, 'Warme hapjes', 5, NULL, NULL),
(13, 'Koude hapjes', 5, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `sub_courses`
--
ALTER TABLE `sub_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_courses_main_course_id_foreign` (`main_course_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `sub_courses`
--
ALTER TABLE `sub_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `sub_courses`
--
ALTER TABLE `sub_courses`
  ADD CONSTRAINT `sub_courses_main_course_id_foreign` FOREIGN KEY (`main_course_id`) REFERENCES `main_courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
