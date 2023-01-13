-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jan 2023 um 08:48
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
-- Datenbank: `hotel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `bkngs_id` int(11) NOT NULL,
  `bkngs_num_persons` tinyint(1) NOT NULL,
  `bkngs_rooms_id_ref` int(11) NOT NULL,
  `bkngs_users_id_ref` int(11) NOT NULL,
  `bkngs_arr_day` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(Anreisetag)',
  `bkngs_dep_day` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(Abreisetag)',
  `bkngs_status` varchar(1) NOT NULL COMMENT '(mögl.Werte: a=angefragt,b=bestätigt)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Blog-Beiträge';

--
-- Daten für Tabelle `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`bkngs_id`, `bkngs_num_persons`, `bkngs_rooms_id_ref`, `bkngs_users_id_ref`, `bkngs_arr_day`, `bkngs_dep_day`, `bkngs_status`) VALUES
(1, 0, 1, 1, '2023-01-04 10:01:33', '2023-01-04 10:03:44', ''),
(11, 2, 2, 3, '2023-01-15 00:00:00', '2023-01-18 00:00:00', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `rooms_id` int(11) NOT NULL,
  `rooms_typ` varchar(10) NOT NULL,
  `rooms_num_beds` tinyint(4) NOT NULL,
  `rooms_img` varchar(100) DEFAULT NULL,
  `rooms_extrabed` tinyint(1) NOT NULL,
  `rooms_equipment` varchar(255) NOT NULL,
  `rooms_price_overnight` decimal(6,2) NOT NULL COMMENT '(Preis pro Übernachtung)',
  `rooms_price_breakfast` decimal(6,2) NOT NULL COMMENT '(Preis Frühstück)',
  `rooms_price_halfboard` decimal(6,2) NOT NULL COMMENT '(Preis Halbpension)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`rooms_id`, `rooms_typ`, `rooms_num_beds`, `rooms_img`, `rooms_extrabed`, `rooms_equipment`, `rooms_price_overnight`, `rooms_price_breakfast`, `rooms_price_halfboard`) VALUES
(1, 'Standard', 1, 'images/standard1.jpg', 0, 'Schreibtisch\r\nKlimaanlage\r\nKaffeemaschine\r\nWasserkocher\r\nFlachbild TV', '20.00', '10.00', '40.00'),
(2, 'Suite', 1, 'images/suite1.jpeg', 1, 'Balkon\r\nSchreibtisch\r\nKlimaanlage\r\nKaffeemaschine\r\nWasserkocher\r\nFlachbild TV', '30.00', '10.00', '50.00'),
(3, 'Superior', 2, 'images/superior1.png', 2, 'Terrasse\r\nAussicht\r\nSchreibtisch\r\nKlimaanlage\r\nKaffeemaschine\r\nWasserkocher\r\nFlachbild TV', '40.00', '10.00', '60.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL,
  `users_forename` varchar(50) DEFAULT NULL,
  `users_lastname` varchar(50) NOT NULL,
  `users_salutation` varchar(10) NOT NULL COMMENT '(Anrede)',
  `users_email` varchar(100) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_company` varchar(50) DEFAULT NULL,
  `users_street` varchar(70) NOT NULL COMMENT '(inkl.Hausnummer)',
  `users_city` varchar(40) NOT NULL,
  `users_tel` varchar(20) NOT NULL,
  `users_status` varchar(1) NOT NULL COMMENT '(mögl.Werte:a=Admin,c=Customer)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_forename`, `users_lastname`, `users_salutation`, `users_email`, `users_password`, `users_company`, `users_street`, `users_city`, `users_tel`, `users_status`) VALUES
(1, 'Admin', 'Admin', ' ', 'admin@mail.com', '$2y$10$Hl0HCdhY2SENnawKom.oIOdhaf95FRLyd2sPDN3kcutbbjxRO6D8u', 'IAD', 'Maximilian Welsch Str. 4', '99084 Erfurt', '0326541', 'a'),
(2, 'Wassili', 'Kulesch', 'Herr', 'wassili@mail.com', '$2y$10$YUbGBzL1nPA66HbOfWX95.4v1aidva0v1luJ0ZfBgS/ofp0N2Hi2y', '', 'Erfurter Straße 123', '99084 Erfurt', '01518745959', 'c'),
(3, 'Maria', 'Xantopol', 'Frau', 'maria@mail.com', '$2y$10$PW5wCPkcEslpjrThGpQc2ufrWDg0R667mUeEFIDiEL1RY.AnuCI1e', '', 'Geile Straße 9', '99099 Melchendorf', '01518745959', 'c'),
(4, 'Dawid', 'Jach', ' ', 'dawid@mail.com', '$2y$10$Jbef6G4vQW/vCUh8fuzyquMDoqr1sRXsEeeee2ajS2AiVlJbROIuK', '', 'Erfurter Straße 123', '99099 Melchendorf', '01518745959', 'c');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`bkngs_id`);

--
-- Indizes für die Tabelle `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`rooms_id`);

--
-- Indizes für die Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `idx_users_name` (`users_email`),
  ADD UNIQUE KEY `users_email` (`users_email`),
  ADD UNIQUE KEY `users_email_2` (`users_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `bkngs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
