-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jan 2023 um 08:09
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `blog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `tbl_categories`
--

INSERT INTO `tbl_categories` (`categ_id`, `categ_name`) VALUES
(1, 'Web-Development'),
(2, 'Microsoft Office'),
(3, 'Webdesign');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id` int(11) NOT NULL,
  `posts_header` varchar(50) NOT NULL,
  `posts_body` text NOT NULL,
  `posts_img` varchar(255) NOT NULL,
  `posts_img_alt` varchar(100) NOT NULL,
  `posts_users_id_ref` int(11) NOT NULL,
  `posts_categ_id_ref` int(11) NOT NULL,
  `posts_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `posts_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Blog-Beiträge';

--
-- Daten für Tabelle `tbl_posts`
--

INSERT INTO `tbl_posts` (`posts_id`, `posts_header`, `posts_body`, `posts_img`, `posts_img_alt`, `posts_users_id_ref`, `posts_categ_id_ref`, `posts_created_at`, `posts_updated_at`) VALUES
(1, 'PHP', 'PHP ist eine Serverseitige Scriptsprache. Aktuell in der Version 7 ist PHP weit verbreitet und findet Anwendung in CMS, Blog-Systemen und anderen Applikationen.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/320px-PHP-logo.svg.png', 'Das PHP-Logo', 1, 1, '2023-01-04 10:01:33', '2023-01-04 10:03:44'),
(2, 'HTML', 'HTML ist eine Auszeichnungssprache, die zum Anzeigen von Webseiten im Internet Verwendung findet.\r\nZusammen mit CSS kann hiermit die Struktur und das Layout einer Website festgehalten werden.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/240px-HTML5_logo_and_wordmark.svg.png', 'Das HTML-Logo', 2, 2, '2023-01-04 10:01:33', '2023-01-05 12:17:33'),
(3, 'CSS', 'CSS wird häufig zusammen mit HTML, XML und ähnlichen Auszeichnungssprachen verwendet um die durch diese Auszeichnungssprachen gefertigte Struktur in ein Layout zu bringen.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/170px-CSS3_logo_and_wordmark.svg.png', 'Das Logo von CSS', 3, 3, '2023-01-04 10:01:33', '2023-01-05 12:17:55'),
(4, 'JavaScript', 'JavaScript ist eine Skript-Sprache, die meist im Browser verwendet wird um Webseiten dynamischer zu gestalten.\r\nSeit Kurzem gibt es mit Node-JS auch eine serverseitige Variante.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/240px-Unofficial_JavaScript_logo_2.svg.png', 'JavaScript', 1, 1, '2023-01-04 10:01:33', '2023-01-05 12:19:48'),
(5, 'Bootstrap', 'Build fast, responsive sites with Bootstrap.\r\nPowerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/150px-Bootstrap_logo.svg.png', 'Bootstrap', 2, 3, '2023-01-05 14:43:01', '2023-01-05 14:58:22'),
(6, 'Java', 'Die Java-Technik ist eine ursprünglich von Sun (heute Oracle-Gruppe) entwickelte Sammlung von Spezifikationen, die zum einen die Programmiersprache Java und zum anderen verschiedene Laufzeitumgebungen für Computerprogramme definieren. Diese Computerprogramme werden meistens in Java geschrieben.', 'images/java.png', 'Java', 3, 3, '2023-01-06 09:18:40', '2023-01-06 11:06:33'),
(7, 'Python', 'Python ist eine universelle, üblicherweise interpretierte, höhere Programmiersprache. Sie hat den Anspruch, einen gut lesbaren, knappen Programmierstil zu fördern. So werden beispielsweise Blöcke nicht durch geschweifte Klammern, sondern durch Einrückungen strukturiert.', 'images/python.png', 'Python', 3, 2, '2023-01-06 09:19:48', '2023-01-06 09:31:32');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL,
  `users_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `users_name` varchar(100) NOT NULL,
  `users_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_created_at`, `users_name`, `users_password`) VALUES
(1, '2023-01-04 11:14:34', 'Michael Jordan', '$2y$10$ORcFi4mQ7UqLlKlokYMH8ebTbEOyQvLkkdFG1r8aXv.prKzrzcP4a'),
(2, '2023-01-04 12:42:03', 'Elon Musk', '$2y$10$nxF4A83VXk93rs7TBv1fjO0uA53TkeyaiKAQpJac3yuQxgS8FpI5e'),
(3, '2023-01-04 13:08:01', 'Tiger Woods', '$2y$10$v1sW4jcwBB7zYDAvmTy9/.90J1zRhLgUv6s26CtOZd2JxGlHm5m5e');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indizes für die Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indizes für die Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `idx_users_name` (`users_name`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
