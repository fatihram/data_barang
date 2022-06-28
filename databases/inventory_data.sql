-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 09.29
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `categori_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`categori_id`, `name`, `created`, `updated`) VALUES
(9, 'elektronik', '2021-05-06 19:17:11', NULL),
(10, 'makanan', '2021-05-06 19:17:24', NULL),
(11, 'minuman', '2021-05-06 19:17:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `distributor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`distributor_id`, `name`, `phone`, `address`, `description`, `image`, `created`, `updated`) VALUES
(10, 'PT Abdi Darma 1', '0214700008', 'Jl Pulo Nangka Tmr II 14 Jakarta', 'Distributor', NULL, '2021-05-06 19:06:58', '2021-06-29 16:47:40'),
(11, 'PT Adibella Nugraha', '0216459206', 'Jl Danau Agung Sunter Brt Bl A-4/5 Jakarta', 'distributor', NULL, '2021-05-06 19:07:54', NULL),
(12, 'PT Agrofood Propranindo', '0215643017', 'Kompl Green Ville Bl AW/8 Jakarta', 'distributor', NULL, '2021-05-06 19:08:35', NULL),
(15, 'PT. Coca-cola Bottling Indonesia (CCBI)', '072134567890', 'Jl. Tembesu 3 No.1, Campang Raya, Kec. Tj. Karang Tim., Kota Bandar Lampung, Lampung 35122', 'pt coca cola', 'distributor-210704-70604855ed.jpeg', '2021-07-04 17:24:12', '2021-07-04 12:24:30'),
(16, 'PT.KENCANA GEMILANG (MIYAKO)', '0215960204', '16, Jl. Raya Serang No.Km, RW.8, Talaga, Kec. Cikupa, Tangerang, Banten 15710', 'pt miyako', NULL, '2021-07-04 17:26:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `gudang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kode_gudang` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`gudang_id`, `name`, `kode_gudang`, `created`, `updated`) VALUES
(5, 'gudang barang elektronik', '01A', '2021-05-06 19:09:28', '2021-07-04 11:49:30'),
(6, 'Gudang bahan makanan', '02A', '2021-05-06 19:09:49', '2021-07-04 12:26:52'),
(7, ' Gudang minuman', '03A', '2021-05-06 19:10:47', '2021-07-04 11:51:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `gudang_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `categori_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`item_id`, `distributor_id`, `gudang_id`, `unit_id`, `categori_id`, `name`, `barcode`, `stock`, `image`, `price`, `created`, `updated`) VALUES
(28, 10, 7, 6, 11, 'coca-cola', '4444', '50', 'item-210720-d4ffdec4e1.jpeg', '90000', '2021-07-02 04:55:53', '2021-07-20 18:59:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `kode_sales` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`sales_id`, `kode_sales`, `name`, `gender`, `alamat`, `handphone`, `created`, `updated`) VALUES
(6, '01', 'Roni Apriansyah', 'L', 'kemiling', '085768598736', '2021-05-06 19:11:39', NULL),
(7, '02', 'iik montasor', 'L', 'rajabasa', '08123456789', '2021-05-06 19:12:10', NULL),
(8, '03', 'Anton putra', 'L', 'gedung meneng', '08213456789', '2021-05-06 19:12:46', NULL),
(9, '04', 'anggi sefti utami', 'P', 'kedaton', '08123456788', '2021-05-06 19:13:22', NULL),
(13, '05', 'didik nurhadi', 'L', 'bandar lampung', '098765443211', '2021-07-04 18:10:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(100) NOT NULL,
  `distributor_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `distributor_id`, `qty`, `date`, `user_id`, `created`, `updated`) VALUES
(50, 28, 'in', 'barang baru', 10, 100, '2021-07-05', 1, '2021-07-05 15:34:50', NULL),
(51, 28, 'out', 'terjual oleh sales 1', NULL, 50, '2021-07-05', 1, '2021-07-05 15:36:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(1, 'pack', '2020-12-11 13:07:37', NULL),
(3, 'ball', '2020-12-17 17:41:44', NULL),
(4, 'kilogram', '2020-12-17 17:43:13', NULL),
(5, 'liter', '2020-12-17 17:43:25', NULL),
(6, 'Duss', '2021-05-06 19:15:42', NULL),
(8, ' item', '2021-06-29 21:54:13', '2021-07-04 12:28:30'),
(10, 'kuintal', '2021-07-04 17:28:22', NULL),
(11, 'box', '2021-07-04 17:28:37', NULL),
(12, 'unit', '2021-07-04 17:28:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:manager,2:admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `pendidikan`, `level`) VALUES
(1, 'administrator', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 'Mega Utami', 'Jl. Pramuka No.88, Rajabasa, Kec. Rajabasa, Kota Bandar Lampung, Lampung', 'D3 Manajmen informatika', 2),
(5, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'Apregi prata yuda', 'Jl. Pramuka, Sumber Rejo, Kec. Kemiling, Kota Bandar Lampung, Lampung 35151', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categori_id`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`distributor_id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`gudang_id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `categori_id` (`categori_id`),
  ADD KEY `distributor_id` (`distributor_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `gudang_id` (`gudang_id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `distributor_id` (`distributor_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `categori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `gudang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`categori_id`) REFERENCES `category` (`categori_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`distributor_id`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`gudang_id`) REFERENCES `gudang` (`gudang_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`distributor_id`),
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
