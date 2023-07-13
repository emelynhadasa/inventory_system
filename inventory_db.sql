-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2023 pada 18.41
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
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_menu`
--

CREATE TABLE `access_menu` (
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `access_menu`
--

INSERT INTO `access_menu` (`menu_id`, `user_id`, `role_id`) VALUES
(1, 1, 0),
(1, 2, 1),
(1, 3, 1),
(1, 4, 2),
(1, 5, 0),
(1, 6, 2),
(2, 1, 0),
(2, 2, 1),
(2, 3, 1),
(2, 4, 2),
(2, 5, 0),
(2, 6, 2),
(3, 2, 1),
(3, 3, 1),
(3, 4, 2),
(3, 6, 2),
(4, 2, 1),
(4, 3, 1),
(4, 4, 2),
(4, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locator`
--

CREATE TABLE `locator` (
  `locator_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `l_date` date NOT NULL,
  `current_loc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `locator`
--

INSERT INTO `locator` (`locator_id`, `product_id`, `l_date`, `current_loc`) VALUES
(1, 3, '2022-09-09', 'B01'),
(2, 5, '2022-08-07', 'A09'),
(3, 10, '2022-01-08', 'A10'),
(4, 1, '2022-01-08', 'A11'),
(5, 9, '2022-11-09', 'C02'),
(6, 2, '2022-11-09', 'C03'),
(7, 4, '2022-01-09', 'A12'),
(8, 6, '2022-02-01', 'A13'),
(9, 7, '2022-02-01', 'A14'),
(10, 8, '2023-01-01', 'C04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `quantity`) VALUES
(1, 'Atenolol', 'stripes', 66),
(2, 'Levoxyl', 'stripes', 4),
(3, 'Bystolic', 'stripes', 91),
(4, 'Albuterol', 'stripes', 63),
(5, 'Seroquel', 'bottles', 58),
(6, 'Singulair', 'stripes', 45),
(7, 'Lisinopril', 'stripes', 70),
(8, 'Metoprolol Tartrate', 'stripes', 69),
(9, 'Penicillin VK', 'jar', 76),
(10, 'Methylprednisolone', 'stripes', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_trans`
--

CREATE TABLE `product_trans` (
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_trans`
--

INSERT INTO `product_trans` (`transaction_id`, `product_id`, `quantity`) VALUES
(1, 5, 10),
(2, 1, 20),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`) VALUES
(0),
(1),
(2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_name` varchar(100) DEFAULT NULL,
  `t_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `transaction_name`, `t_date`) VALUES
(1, 3, 'outbound', '2022-02-14'),
(2, 3, 'outbound', '2022-09-25'),
(3, 2, 'inbound', '2022-09-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `role_id`, `position`) VALUES
(1, 'warsinahsubandi@gmail.com', 'warsinah02', 'warsinah0011', 0, 'guest'),
(2, 'herryyang@gmail.com', 'herryyang', 'herryyang900', 1, 'staff'),
(3, 'jovankawijaya@gmail.com', 'jovankawijaya', 'jowijaya780', 1, 'staff'),
(4, 'rudywijaya@gmail.com', 'rudywijaya', 'ruwijaya', 2, 'manager'),
(5, 'juanwidodo@gmail.com', 'juanwidodo', 'judodo90', 0, 'guest'),
(6, 'emilyelizabeth@gmail.com', 'emilyelizabeth', 'emilyzabeth1010', 2, 'manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  ADD KEY `FKmenu_id` (`menu_id`),
  ADD KEY `FKuser_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `locator`
--
ALTER TABLE `locator`
  ADD PRIMARY KEY (`locator_id`),
  ADD KEY `FKproduct_id` (`product_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `product_trans`
--
ALTER TABLE `product_trans`
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FKrole_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `locator`
--
ALTER TABLE `locator`
  MODIFY `locator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  ADD CONSTRAINT `FKmenu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `FKuser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Ketidakleluasaan untuk tabel `locator`
--
ALTER TABLE `locator`
  ADD CONSTRAINT `FKproduct_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Ketidakleluasaan untuk tabel `product_trans`
--
ALTER TABLE `product_trans`
  ADD CONSTRAINT `product_trans_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`),
  ADD CONSTRAINT `product_trans_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKrole_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
