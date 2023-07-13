-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2022 pada 14.51
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amerta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `selling_tbl`
--

CREATE TABLE `selling_tbl` (
  `sell_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` int(100) DEFAULT NULL,
  `perfume_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `selling_tbl`
--

INSERT INTO `selling_tbl` (`sell_id`, `name`, `email`, `address`, `phone_number`, `perfume_type`) VALUES
(1, 'Emelyn Hadasa', 'emelyndhadasa@gmail.com', 'Waterfront Estate, South Silvercreek III No. 35, Lippo Cikarang Selatan.', 2147483647, 'Sweet Vanilla'),
(2, 'Sheren Yang', 'sheren17yang@gmail.com', 'SBH', 2147483647, 'Jasmine');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `selling_tbl`
--
ALTER TABLE `selling_tbl`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `selling_tbl`
--
ALTER TABLE `selling_tbl`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
