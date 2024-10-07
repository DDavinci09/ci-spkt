-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2024 pada 19.57
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lp`
--

CREATE TABLE `tb_lp` (
  `id_lp` int(11) NOT NULL,
  `kode_lp` varchar(50) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `tgl_lp` date NOT NULL,
  `jenis_lp` varchar(50) NOT NULL,
  `isi_lp` text NOT NULL,
  `waktu_kejadian` datetime NOT NULL,
  `tempat_kejadian` text NOT NULL,
  `status_lp` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lp`
--

INSERT INTO `tb_lp` (`id_lp`, `kode_lp`, `id_pelapor`, `tgl_lp`, `jenis_lp`, `isi_lp`, `waktu_kejadian`, `tempat_kejadian`, `status_lp`, `keterangan`, `bukti`) VALUES
(11, 'LP001', 1, '2024-08-02', 'Pengaduan', 'Pengaduan adanya kecelakaan', '2024-08-16 00:34:00', 'Lima kaum ', 'Terima', 'oke', 'Use_case_diagram.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelapor`
--

CREATE TABLE `tb_pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelapor`
--

INSERT INTO `tb_pelapor` (`id_pelapor`, `username`, `password`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `nik`, `ktp`, `level`, `status`) VALUES
(1, 'Yudi', '$2y$10$cdwVy94rOF9vAkluwlWYUOCr64VpkxMAfh8ZwE7iC5m44myNJgAZu', 'Yunaidi', 'Laki-laki', 'Lima Kaum', '08999999', '1111111111', 'Use case diagram 2.png', 'Pelapor', 'Aktif'),
(3, 'Fauzi', '$2y$10$IMyHLNhrvMx6xAGwA8decOQpMUqgQuUdxWQFkS0NBREkNeUnaBxqG', 'Fauzi', 'Laki-laki', 'Balai Batu', '087777777', '1111111111', 'Collaboration Diagram Admin.png', 'Pelapor', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama`, `status`, `level`) VALUES
(1, 'Admin', '$2y$10$win7l/GEthyDYMOKYizdyOphZb5I5aDC5Y.gYO7eO8HLGdSeK67wu', 'Admin', 'Aktif', 'Admin'),
(2, 'Petugas', '$2y$10$U.q8xEjEmiKjMBy/PGTsSOsjnB.PbEhGd2ukWCEu/um1nszLhDeVe', 'Petugas', 'Aktif', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sik`
--

CREATE TABLE `tb_sik` (
  `id_sik` int(11) NOT NULL,
  `kode_sik` varchar(50) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `tgl_sik` date NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tujuan_kegiatan` text NOT NULL,
  `waktu_kegiatan` datetime NOT NULL,
  `tempat_kegiatan` text NOT NULL,
  `penanggungjawab` text NOT NULL,
  `organisasi` text NOT NULL,
  `status_sik` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sik`
--

INSERT INTO `tb_sik` (`id_sik`, `kode_sik`, `id_pelapor`, `tgl_sik`, `nama_kegiatan`, `tujuan_kegiatan`, `waktu_kegiatan`, `tempat_kegiatan`, `penanggungjawab`, `organisasi`, `status_sik`, `keterangan`, `dokumen`) VALUES
(5, 'SIK001', 1, '2024-08-22', 'Lomba 17 Agustus', 'Hari kemerdekaan 17', '2024-08-17 00:38:00', 'Lapangan bola Lima Kaum', 'Yudi', '17Agustus', 'Terima', 'Oke', 'ERD.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sktlk`
--

CREATE TABLE `tb_sktlk` (
  `id_sktlk` int(11) NOT NULL,
  `kode_sktlk` varchar(50) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `tgl_sktlk` date NOT NULL,
  `kejadian` text NOT NULL,
  `waktu_kejadian` datetime NOT NULL,
  `tempat_kejadian` text NOT NULL,
  `status_sktlk` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti` text NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sktlk`
--

INSERT INTO `tb_sktlk` (`id_sktlk`, `kode_sktlk`, `id_pelapor`, `tgl_sktlk`, `kejadian`, `waktu_kejadian`, `tempat_kejadian`, `status_sktlk`, `keterangan`, `bukti`, `dokumen`) VALUES
(10, 'SKTLK001', 1, '2024-08-03', 'Kehilangan kunci mobil dan motor 3', '2024-08-23 12:36:00', 'Lima kaum', 'Terima', 'Akan dicari', 'Activity_Diagram_Admin.png', 'Activity_Diagram_Pelapor.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_lp`
--
ALTER TABLE `tb_lp`
  ADD PRIMARY KEY (`id_lp`);

--
-- Indeks untuk tabel `tb_pelapor`
--
ALTER TABLE `tb_pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_sik`
--
ALTER TABLE `tb_sik`
  ADD PRIMARY KEY (`id_sik`);

--
-- Indeks untuk tabel `tb_sktlk`
--
ALTER TABLE `tb_sktlk`
  ADD PRIMARY KEY (`id_sktlk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_lp`
--
ALTER TABLE `tb_lp`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pelapor`
--
ALTER TABLE `tb_pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sik`
--
ALTER TABLE `tb_sik`
  MODIFY `id_sik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_sktlk`
--
ALTER TABLE `tb_sktlk`
  MODIFY `id_sktlk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
