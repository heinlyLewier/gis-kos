-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2023 pada 12.09
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kos`
--

CREATE TABLE `tb_kos` (
  `id_kos` int(11) NOT NULL,
  `pemilik_kos` varchar(255) DEFAULT NULL,
  `nama_kos` varchar(255) DEFAULT NULL,
  `jenis_kos` enum('Laki - laki','Perempuan','Campuran') DEFAULT NULL,
  `jumlah_kamar` varchar(255) DEFAULT NULL,
  `sisa_kamar` varchar(255) DEFAULT NULL,
  `alamat_kos` text DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `no_wa` varchar(13) DEFAULT NULL,
  `biaya_kos` varchar(255) DEFAULT NULL,
  `fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kos`
--

INSERT INTO `tb_kos` (`id_kos`, `pemilik_kos`, `nama_kos`, `jenis_kos`, `jumlah_kamar`, `sisa_kamar`, `alamat_kos`, `kecamatan`, `latitude`, `longitude`, `no_wa`, `biaya_kos`, `fasilitas`, `deskripsi`, `gambar1`, `id_user`) VALUES
(71, 'Ita Tuwankotta', 'Thespat', 'Campuran', '8', '4', 'Tanah tinggi, lorong kedondong', 'Sirimau', '-3.692800519264815', '128.1868202984333', '6281287442169', '1000000', 'WIFI,Kamar mandi dalam,Tempat tidur,Dapur umum,AC,Meja belajar,Ruang tamu,', '-', '', 17),
(72, 'Keluarga Sambonu', 'Kos Panjang', 'Campuran', '5', '0', 'Wainitu ', 'Nusaniwe', '-3.7035685765971835', '128.16958844661715', '6281247338444', '500000', '', 'Kos Terbuat dari setengah Beton memliki 24 Kamar dan memliki kamar mandi umum 4 dan 2 WC umum.', '', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `username`, `password`, `level`, `status`, `img`) VALUES
(17, 'Armando Heinly Lewier', 'admin', '$2y$10$1VqOHVr0PF.SRSkZIZ3YH.3f/oL19VLFAF77WFZZwNubZ.VvTHht.', 'Admin', 'Tidak Aktif', 'profil-230731-817f4b4dee.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kos`
--
ALTER TABLE `tb_kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `fk` (`id_user`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kos`
--
ALTER TABLE `tb_kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
