-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2020 pada 04.04
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Roi Burhan', 'admin', '$2y$10$9702eQ5HAGt2R9iCOH0pOOU08rcR.91w2Qjaalqj87kEjbkWFxHl6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `kode_obat`, `jumlah`) VALUES
(8, 8, 'BTDN', 1),
(9, 9, 'ENTR01', 1),
(10, 10, 'SLDX', 1);

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok_obat` BEFORE INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	DECLARE stok_sisa INT;
    SELECT stok INTO stok_sisa FROM obat WHERE kode = NEW.kode_obat;
    IF stok_sisa < NEW.jumlah THEN
    	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stok tidak mencukupi';
    END IF;
	UPDATE obat SET stok = stok - NEW.jumlah WHERE kode = NEW.kode_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `produsen` varchar(100) NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode`, `supplier_id`, `nama_obat`, `produsen`, `stok`, `foto`, `harga`) VALUES
('BTDN', 1, 'Bethadine', 'Ovo', 1, '2019-07-04-11-23-20_5d1e27f85dc0b.jpg', 10000),
('ENTR01', 3, 'Entro Stop', 'Elevina', 14, '2019-07-04-11-22-33_5d1e27c92eb50.jpg', 5000),
('INST', 1, 'Insto', 'Limo', 12, '2019-07-04-11-27-04_5d1e28d83a4df.jpg', 15000),
('PRMG', 0, 'PROMAG', 'Budi', 10, '', 10000),
('SLDX', 1, 'Siladex', 'Limo', 19, '2019-07-04-11-26-06_5d1e289e36909.jpg', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `kota`, `telp`) VALUES
(1, 'Froksas', 'Padang Bulan', 'Medan', '021123123'),
(2, 'Abu Jaya', 'Kemunciran', 'Jakarta', '021123123'),
(3, 'Limas Supplier', 'Sei Borin', 'Medan', '0213123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl`, `nama_pembeli`, `admin_id`) VALUES
(8, '2020-09-04 01:36:46', 'Muhamad Rizqi', 1),
(9, '2020-09-05 06:59:40', 'Rizqi', 1),
(10, '2020-09-06 08:03:33', 'Hendar', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode`),
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
