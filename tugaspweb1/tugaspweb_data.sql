-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Mar 2023 pada 20.00
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_pweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_pweb`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(4) NOT NULL,
  `usrname` text(100) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `nama` text(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `usrname`, `passw`, `nama`) VALUES
(1, 'diavolo5', 'kentang', 'Diavolo'),
(2, 'diablo10', 'kucing', 'Diablo'),
(3, 'alberto2', 'gajah', 'Alberto'),
(4, 'm4rcell0', 'kapal', 'Marcello'),
(5, 'marco_', 'usus', 'Marco'),
(6, 'gio150', 'tangan', 'Giorno');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `mahasiswa`
  ADD UNIQUE (`usrname`);

ALTER TABLE `mahasiswa`
  ADD UNIQUE (`passw`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
