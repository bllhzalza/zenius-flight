-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2022 pada 09.34
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenius-flight`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'bllhzalza', 'zalzahood');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flights`
--

CREATE TABLE `flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `plane_id` int(10) UNSIGNED NOT NULL,
  `flight_gates_id` int(10) UNSIGNED NOT NULL,
  `flight_class_id` int(10) UNSIGNED NOT NULL,
  `flight_number` varchar(15) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `departure_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `flights`
--

INSERT INTO `flights` (`id`, `plane_id`, `flight_gates_id`, `flight_class_id`, `flight_number`, `arrival_id`, `departure_id`, `date`, `time`, `price`) VALUES
(1, 1, 1, 1, '547', 2, 3, '2022-07-28', '13:30:00', '6000000'),
(2, 2, 2, 3, '315', 3, 4, '2022-07-29', '09:20:00', '5000000'),
(3, 3, 1, 4, '366', 4, 2, '2022-07-30', '10:20:00', '7000000'),
(4, 4, 2, 2, '326', 1, 1, '2022-07-31', '08:20:00', '4000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flight_classes`
--

CREATE TABLE `flight_classes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `flight_classes`
--

INSERT INTO `flight_classes` (`id`, `name`) VALUES
(1, 'Economy'),
(2, 'Business'),
(3, 'Premium Economy'),
(4, 'First Class');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flight_gates`
--

CREATE TABLE `flight_gates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `flight_gates`
--

INSERT INTO `flight_gates` (`id`, `name`, `status`) VALUES
(1, 'GATE 1', 'OPEN'),
(2, 'GATE 2', 'CLOSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planes`
--

CREATE TABLE `planes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `capacity` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `planes`
--

INSERT INTO `planes` (`id`, `code`, `type`, `capacity`) VALUES
(1, 'A320', 'Boeing 737', 40),
(2, 'A550', 'Boeing 737', 30),
(3, 'A530', 'Boeing 747', 30),
(4, 'B120', 'Airbus A33', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reff_arrival`
--

CREATE TABLE `reff_arrival` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reff_arrival`
--

INSERT INTO `reff_arrival` (`id`, `name`) VALUES
(1, 'Jakarta'),
(2, 'Surabaya'),
(3, 'Bali'),
(4, 'Singapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reff_departure`
--

CREATE TABLE `reff_departure` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reff_departure`
--

INSERT INTO `reff_departure` (`id`, `name`) VALUES
(1, 'Malaysia'),
(2, 'Jakarta'),
(3, 'Bali'),
(4, 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(0, 'Feel matcha', 'shentmp+4veyo@gmail.com', '088975738358'),
(1, 'Dimas Hanifan', 'dimas.hanifan@mail.com', '085985928');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_flights`
--

CREATE TABLE `user_flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL,
  `seat_number` varchar(5) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `user_flight_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_flights`
--

INSERT INTO `user_flights` (`id`, `user_id`, `flight_id`, `seat_number`, `ticket_number`, `user_flight_code`) VALUES
(1, 1, 1, '31A', '019264019245655', '152A4F2F');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plane_fk` (`plane_id`),
  ADD KEY `flight_gates_fk` (`flight_gates_id`),
  ADD KEY `flight_class_fk` (`flight_class_id`),
  ADD KEY `arrival_id` (`arrival_id`),
  ADD KEY `departure_id` (`departure_id`);

--
-- Indeks untuk tabel `flight_classes`
--
ALTER TABLE `flight_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `flight_gates`
--
ALTER TABLE `flight_gates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reff_arrival`
--
ALTER TABLE `reff_arrival`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reff_departure`
--
ALTER TABLE `reff_departure`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_flights`
--
ALTER TABLE `user_flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `flight_fk` (`flight_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reff_arrival`
--
ALTER TABLE `reff_arrival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `reff_departure`
--
ALTER TABLE `reff_departure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flight_class_fk` FOREIGN KEY (`flight_class_id`) REFERENCES `flight_classes` (`id`),
  ADD CONSTRAINT `flight_gates_fk` FOREIGN KEY (`flight_gates_id`) REFERENCES `flight_gates` (`id`),
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`arrival_id`) REFERENCES `reff_arrival` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`departure_id`) REFERENCES `reff_departure` (`id`),
  ADD CONSTRAINT `plane_fk` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_flights`
--
ALTER TABLE `user_flights`
  ADD CONSTRAINT `flight_fk` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
