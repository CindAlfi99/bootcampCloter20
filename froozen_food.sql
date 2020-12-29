-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 12.19
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `froozen food`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id`, `names`, `alamat`) VALUES
(1, 'PT Indomieeh', 'Jl.Merdeka raya 101, palembang'),
(2, 'PT Sasa', 'Jl.Kemuning No.12, Kalimantan'),
(3, 'PT Sashio', 'Jl.Kemunang No.210, jakarta selatan'),
(4, 'PT Indomiah', 'Jl. Abadi Jaya no. 123, lembang'),
(5, 'PT Achoka', 'Jl. Kemayu 12 No.13, Aceh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `namesP` varchar(50) NOT NULL,
  `photos` varchar(35) NOT NULL,
  `descc` varchar(100) NOT NULL,
  `nutrisi` varchar(50) NOT NULL,
  `serving_size` varchar(50) NOT NULL,
  `id_distribusi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `namesP`, `photos`, `descc`, `nutrisi`, `serving_size`, `id_distribusi`) VALUES
(1, 'Pasta', 'pasta.jpg', 'Pasta adalah makanan sehat yg bergizi dan enak', 'nutrisi 1800 kal', '1', '1'),
(2, 'Chicken nugget', '5fe48694541c0.jpg', 'Makanan sehat', '1000 kalori dan sehat', '1', '2'),
(3, 'Nugget', 'nuggetfish.jpg', 'nugget adalah makanan sehat yg berguna untuk nutrisi', 'nutrisi 1800 kal', '1', '3'),
(9, 'Nugget Bakso', 'nuggetfish.jpg', 'Nugget makanan bergizi dan enak', 'Kalori: 57% lemak, 22% karb, 21% prot.', '1', '5'),
(20, 'FIONA', '5fe34b7b8a796.jpg', '123', '123', '1', '4'),
(21, 'Sosis Nugget', '5fe34c4d6f9eb.jpg', 'Nugget wenak', 'Kalori: 57% lemak, 22% karb, 21% prot.', '1', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
