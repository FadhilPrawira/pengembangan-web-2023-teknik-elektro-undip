-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2023 pada 06.28
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kodebuku` varchar(4) NOT NULL,
  `judulbuku` varchar(75) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kodebuku`, `judulbuku`, `pengarang`, `penerbit`) VALUES
(3, 'A002', 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama'),
(9, 'B001', 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia Pustaka Utama'),
(12, 'A004', 'Matahari', 'Tere Liye', 'Gramedia Pustaka Utama'),
(13, 'A005', 'Bintang', 'Tere Liye', 'Gramedia Pustaka Utama'),
(14, 'A006', 'Ceros dan Batozar', 'Tere Liye', 'Gramedia Pustaka Utama'),
(15, 'A007', 'Komet', 'Tere Liye', 'Gramedia Pustaka Utama'),
(16, 'C001', 'Modern Control Engineering', 'Katsuhiko Ogata', 'Prentice Hall'),
(17, 'C002', 'Physics: Principles with Applications, Volume 1', 'Douglas C. Giancoli', 'Prentice Hall');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
