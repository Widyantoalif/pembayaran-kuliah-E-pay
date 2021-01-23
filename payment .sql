-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2021 pada 15.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
('1', 'Teknik Informatika'),
('2', 'Sistem Informasi'),
('3', 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `uang_muka` varchar(50) NOT NULL,
  `sisa_pembayaran` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tahun_akademik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_user`, `nim`, `nama`, `kelas`, `biaya`, `uang_muka`, `sisa_pembayaran`, `tingkat`, `status`, `tahun_akademik`) VALUES
('MHS004', '100003', '180441180024', 'Ridho Iswahyudin', 'TI 411', '18000000', '5000000', '13000000', '1', 'aktif', '2018/2019'),
('MHS005', '100001', '180441180036', 'Alif widiyanto', 'TI 411', '16000000', '5000000', '11000000', '1', 'aktif', '2018/2019'),
('MHS006', '100004', '180441180', 'marhan', 'KA221', '16000000', '5000000', '11000000', '1', 'aktif', '2018/2019'),
('MHS007', '100004', '180441180', 'marhan', 'KA221', '20000000', '5000000', '15000000', '2', 'aktif', '2019/2020'),
('MHS008', '100004', '180441180', 'marhan', 'KA221', '16000000', '5000000', '11000000', '3', 'aktif', '2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_mahasiswa` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tanggal_rencana` date NOT NULL,
  `sisa_pembayaran` varchar(50) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tagihan_ke` varchar(50) NOT NULL,
  `tahun_akademik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_mahasiswa`, `id_user`, `tanggal_rencana`, `sisa_pembayaran`, `tanggal_bayar`, `keterangan`, `status`, `bukti`, `tagihan_ke`, `tahun_akademik`) VALUES
(28, 'MHS004', '100003', '0000-00-00', '13000000', '2020-11-02', 'Registrasi', 'Lunas', '', '', ''),
(29, 'MHS004', '100003', '2020-12-10', '1300000', '0000-00-00', 'Angsuran', 'Konfirmasi', 'Capture.PNG', 'TAGIHAN KE-001', ''),
(30, 'MHS004', '100003', '2021-01-10', '1300000', '2020-12-06', 'Angsuran', 'Lunas', '19860368112.jpg', 'TAGIHAN KE-002', ''),
(31, 'MHS004', '100003', '2020-12-21', '1300000', '2020-12-06', 'Angsuran', 'Lunas', '', 'TAGIHAN KE-003', ''),
(32, 'MHS004', '100003', '2021-03-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-004', ''),
(33, 'MHS004', '100003', '2020-12-25', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-005', ''),
(34, 'MHS004', '100003', '2021-05-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(35, 'MHS004', '100003', '2021-06-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(36, 'MHS004', '100003', '2021-07-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(37, 'MHS004', '100003', '2021-08-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(38, 'MHS004', '100003', '2021-09-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(39, 'MHS004', '100003', '2020-12-10', '1300000', '0000-00-00', 'Angsuran', 'Konfirmasi', 'WhatsApp Image 2020-11-03 at 15.30.14.jpeg', 'TAGIHAN KE-001', ''),
(40, 'MHS004', '100003', '2021-01-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-002', ''),
(41, 'MHS004', '100003', '2021-02-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-003', ''),
(42, 'MHS004', '100003', '2021-03-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-004', ''),
(43, 'MHS004', '100003', '2021-04-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-005', ''),
(44, 'MHS004', '100003', '2021-05-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(45, 'MHS004', '100003', '2021-06-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(46, 'MHS004', '100003', '2021-07-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(47, 'MHS004', '100003', '2021-08-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(48, 'MHS004', '100003', '2021-09-10', '1300000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(49, 'MHS005', '100001', '0000-00-00', '11000000', '2020-11-08', 'Registrasi', 'Lunas', '', '', ''),
(50, 'MHS005', '100001', '2020-12-16', '1100000', '2020-12-07', 'Angsuran', 'Lunas', 'bukti bayar alif.jpg', 'TAGIHAN KE-001', ''),
(51, 'MHS005', '100001', '2021-01-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-002', ''),
(52, 'MHS005', '100001', '2021-02-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-003', ''),
(53, 'MHS005', '100001', '2021-03-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-004', ''),
(54, 'MHS005', '100001', '2021-04-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-005', ''),
(55, 'MHS005', '100001', '2021-05-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(56, 'MHS005', '100001', '2021-06-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(57, 'MHS005', '100001', '2021-07-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(58, 'MHS005', '100001', '2021-08-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(59, 'MHS005', '100001', '2021-09-16', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(60, 'MHS006', '100004', '0000-00-00', '11000000', '2020-11-14', 'Registrasi', 'Lunas', '', '', ''),
(61, 'MHS006', '100004', '2020-12-10', '1100000', '2020-12-05', 'Angsuran', 'Lunas', '', 'TAGIHAN KE-001', ''),
(62, 'MHS006', '100004', '2021-01-10', '1100000', '2020-12-05', 'Angsuran', 'Lunas', 'struk-atm-bri-2013-img.jpg', 'TAGIHAN KE-002', ''),
(63, 'MHS006', '100004', '2021-02-10', '1100000', '2020-12-05', 'Angsuran', 'Lunas', 'bukti bayar.jpg', 'TAGIHAN KE-003', ''),
(64, 'MHS006', '100004', '2021-03-10', '1100000', '2020-12-05', 'Angsuran', 'Lunas', 'bukti bayar.jpg', 'TAGIHAN KE-004', ''),
(65, 'MHS006', '100004', '2021-04-10', '1100000', '0000-00-00', 'Angsuran', 'Konfirmasi', 'bukti bayar.jpg', 'TAGIHAN KE-005', ''),
(66, 'MHS006', '100004', '2021-05-10', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(67, 'MHS006', '100004', '2021-06-10', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(68, 'MHS006', '100004', '2021-07-10', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(69, 'MHS006', '100004', '2021-08-10', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(70, 'MHS006', '100004', '2021-09-10', '1100000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(71, 'MHS007', '100004', '0000-00-00', '15000000', '2020-12-06', 'Registrasi', 'Lunas', '', '', ''),
(72, 'MHS007', '100004', '2021-01-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-001', ''),
(73, 'MHS007', '100004', '2021-02-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-002', ''),
(74, 'MHS007', '100004', '2021-03-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-003', ''),
(75, 'MHS007', '100004', '2021-04-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-004', ''),
(76, 'MHS007', '100004', '2021-05-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-005', ''),
(77, 'MHS007', '100004', '2021-06-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(78, 'MHS007', '100004', '2021-07-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(79, 'MHS007', '100004', '2021-08-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(80, 'MHS007', '100004', '2021-09-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(81, 'MHS007', '100004', '2021-10-01', '1500000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(82, 'MHS008', '100004', '0000-00-00', '11000000', '2020-12-06', 'Registrasi', 'Lunas', '', '', ''),
(83, 'MHS008', '100004', '2021-01-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-001', ''),
(84, 'MHS008', '100004', '2021-02-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-002', ''),
(85, 'MHS008', '100004', '2021-03-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-003', ''),
(86, 'MHS008', '100004', '2021-04-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-004', ''),
(87, 'MHS008', '100004', '2021-05-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-005', ''),
(88, 'MHS008', '100004', '2021-06-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-006', ''),
(89, 'MHS008', '100004', '2021-07-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-007', ''),
(90, 'MHS008', '100004', '2021-08-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-008', ''),
(91, 'MHS008', '100004', '2021-09-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-009', ''),
(92, 'MHS008', '100004', '2021-10-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-010', ''),
(93, 'MHS008', '100004', '2021-11-11', '1000000', '0000-00-00', 'Angsuran', 'Belum Bayar', '', 'TAGIHAN KE-011', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nim`, `nama`, `telp`, `alamat`, `level`, `password`, `tingkat`, `prodi`, `status`, `foto`, `email`) VALUES
('100000', '123', 'admin', '021', 'cbn', 'admin', '123', '', '', 'Aktif', '', ''),
('100001', '180441180036', 'Alif widiyanto', '089671457902', 'cibinong kota', 'mahasiswa', 'sds', '1', 'mi', '', '', 'alifwidiyanto46@gmail.com'),
('100002', '1800411220', 'Chandra utama', '08967145792', 'Bogor kota', 'mahasiswa', '1234', '1', 'mi', '', 'chandra putih.jpg', 'candra23@gmail.com'),
('100003', '180441180024', 'Ridho Iswahyudin', '0834098978', 'cirimekar cibinong ', 'mahasiswa', '123', '1', 'mi', '', 'WhatsApp Image 2020-11-02 at 23.20.35.jpeg', 'alifwidiyanto46@gmail.com'),
('100004', '180441180', 'marhan', '0896714579', 'Bogor kota', 'mahasiswa', '123', '1', 'ka', '', 'WhatsApp Image 2020-11-17 at 17.57.57.jpeg', 'testingg@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
