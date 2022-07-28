-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 08.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemadam2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arduino`
--

CREATE TABLE `arduino` (
  `id` int(11) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `gas_sensor` int(11) NOT NULL,
  `flame_sensor` int(11) NOT NULL,
  `suhu_sensor` float NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jam` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arduino`
--

INSERT INTO `arduino` (`id`, `ruangan`, `gas_sensor`, `flame_sensor`, `suhu_sensor`, `tanggal`, `jam`) VALUES
(1, '1', 593, 1, 40.53, '2022-05-08', '10:33:55'),
(2, '1', 588, 1, 40.53, '2022-05-08', '10:34:05'),
(3, '1', 552, 1, 40.53, '2022-05-08', '10:34:16'),
(4, '1', 553, 1, 40.04, '2022-05-08', '10:34:26'),
(5, '1', 610, 1, 40.53, '2022-05-08', '20:17:21'),
(6, '1', 610, 1, 40.53, '2022-05-08', '20:17:31'),
(7, '1', 610, 1, 40.53, '2022-05-08', '20:17:40'),
(8, '1', 610, 1, 40.53, '2022-05-08', '20:17:46'),
(9, '1', 639, 1, 41.99, '2022-05-08', '20:38:30'),
(10, '1', 604, 1, 40.04, '2022-05-08', '20:38:40'),
(11, '1', 638, 1, 42.48, '2022-05-08', '20:38:51'),
(12, '1', 490, 1, 39.06, '2022-06-12', '17:26:14'),
(13, '1', 490, 1, 39.06, '2022-06-12', '17:26:20'),
(14, '1', 489, 1, 41.02, '2022-06-12', '17:26:28'),
(15, '1', 490, 1, 39.06, '2022-06-12', '17:26:35'),
(16, '1', 487, 1, 39.06, '2022-06-12', '17:26:43'),
(17, '1', 487, 1, 39.06, '2022-06-12', '17:26:49'),
(18, '1', 483, 1, 39.55, '2022-06-12', '17:26:57'),
(19, '1', 480, 1, 39.55, '2022-06-12', '17:27:04'),
(20, '1', 474, 1, 39.55, '2022-06-12', '17:27:12'),
(21, '1', 474, 1, 39.55, '2022-06-12', '17:27:18'),
(22, '1', 468, 1, 39.55, '2022-06-12', '17:27:30'),
(23, '1', 480, 1, 41.02, '2022-06-12', '17:27:36'),
(24, '1', 480, 1, 41.02, '2022-06-12', '17:27:42'),
(25, '1', 472, 1, 39.55, '2022-06-12', '17:27:50'),
(26, '1', 907, 1, 40.53, '2022-06-27', '17:50:40'),
(27, '1', 924, 1, 41.5, '2022-06-27', '17:50:54'),
(28, '1', 924, 1, 41.5, '2022-06-27', '17:51:01'),
(29, '1', 910, 1, 41.99, '2022-06-27', '17:51:09'),
(30, '1', 915, 1, 41.99, '2022-06-27', '17:51:16'),
(31, '1', 895, 1, 41.5, '2022-06-27', '17:51:27'),
(32, '1', 523, 1, 40.53, '2022-06-27', '18:06:08'),
(33, '1', 529, 1, 40.53, '2022-06-27', '18:06:15'),
(34, '1', 566, 1, 41.02, '2022-06-27', '18:06:26'),
(35, '1', 528, 1, 41.02, '2022-06-27', '18:06:34'),
(36, '1', 528, 1, 41.02, '2022-06-27', '18:06:41'),
(37, '1', 567, 1, 41.02, '2022-06-27', '18:06:49'),
(38, '1', 568, 1, 42.48, '2022-06-27', '18:06:58'),
(39, '1', 535, 1, 41.02, '2022-06-27', '18:07:06'),
(40, '1', 537, 1, 40.53, '2022-06-27', '18:07:33'),
(41, '1', 537, 1, 40.53, '2022-06-27', '18:07:40'),
(42, '1', 537, 1, 40.53, '2022-06-27', '18:07:47'),
(43, '1', 537, 1, 41.02, '2022-06-27', '18:15:07'),
(44, '1', 541, 1, 41.02, '2022-06-27', '18:15:15'),
(45, '1', 573, 1, 42.48, '2022-06-27', '18:15:24'),
(46, '1', 570, 1, 41.02, '2022-06-27', '18:15:35'),
(47, '1', 569, 1, 41.5, '2022-06-27', '18:15:43'),
(48, '1', 531, 1, 40.04, '2022-06-27', '18:15:50'),
(49, '1', 531, 1, 40.04, '2022-06-27', '18:15:57'),
(50, '1', 443, 0, 41.02, '2022-06-27', '21:40:57'),
(51, '1', 998, 1, 42.48, '2022-06-29', '10:09:59'),
(52, '1', 992, 1, 40.04, '2022-06-29', '10:10:11'),
(53, '1', 996, 1, 41.02, '2022-06-29', '10:10:18'),
(54, '1', 996, 1, 40.53, '2022-06-29', '10:10:26'),
(55, '1', 987, 1, 39.55, '2022-06-29', '10:10:34'),
(56, '1', 987, 1, 39.55, '2022-06-29', '10:10:40'),
(57, '1', 984, 1, 41.5, '2022-06-29', '10:10:48'),
(58, '1', 984, 1, 41.5, '2022-06-29', '10:10:54'),
(59, '1', 984, 1, 41.5, '2022-06-29', '10:11:00'),
(60, '1', 988, 1, 40.04, '2022-06-29', '10:11:42'),
(61, '1', 984, 1, 41.02, '2022-06-29', '10:11:49'),
(62, '1', 984, 1, 41.02, '2022-06-29', '10:11:55'),
(63, '1', 553, 1, 38.57, '2022-06-29', '10:12:10'),
(64, '1', 580, 1, 40.53, '2022-06-29', '10:12:18'),
(65, '1', 580, 1, 40.53, '2022-06-29', '10:12:25'),
(66, '1', 585, 1, 40.04, '2022-06-29', '10:12:34'),
(67, '1', 598, 1, 40.53, '2022-06-29', '10:12:42'),
(68, '1', 593, 1, 41.02, '2022-06-29', '10:12:49'),
(69, '1', 598, 1, 40.53, '2022-06-29', '10:13:42'),
(70, '1', 592, 1, 39.06, '2022-06-29', '10:13:49'),
(71, '1', 607, 1, 41.99, '2022-06-29', '10:13:56'),
(72, '1', 993, 0, 41.99, '2022-06-29', '10:59:27'),
(73, '1', 992, 0, 41.02, '2022-06-29', '10:59:48'),
(74, '1', 1007, 0, 42.97, '2022-06-29', '11:00:10'),
(75, '1', 1008, 0, 41.5, '2022-06-29', '11:00:20'),
(76, '1', 1008, 0, 41.5, '2022-06-29', '11:00:26'),
(77, '1', 1005, 1, 39.55, '2022-06-29', '11:00:35'),
(78, '1', 1002, 0, 39.55, '2022-06-29', '11:00:41'),
(79, '1', 1019, 1, 42.48, '2022-06-29', '11:00:51'),
(80, '1', 1023, 1, 41.02, '2022-06-29', '11:12:45'),
(81, '1', 1023, 1, 41.02, '2022-06-29', '11:12:52'),
(82, '1', 1022, 1, 40.53, '2022-06-29', '11:13:00'),
(83, '1', 1023, 1, 41.02, '2022-06-29', '11:13:10'),
(84, '1', 1022, 1, 41.5, '2022-06-29', '11:13:17'),
(85, '1', 1022, 1, 40.53, '2022-06-29', '11:13:25'),
(86, '1', 1023, 1, 40.53, '2022-06-29', '11:13:32'),
(87, '1', 516, 0, 41.99, '2022-06-29', '16:38:32'),
(88, '1', 576, 0, 94.24, '2022-06-29', '16:38:39'),
(89, '1', 576, 0, 94.24, '2022-06-29', '16:38:46'),
(90, '1', 596, 0, 57.62, '2022-06-29', '16:38:55'),
(91, '1', 608, 1, 42.48, '2022-06-29', '16:39:09'),
(92, '1', 604, 1, 53.22, '2022-06-29', '16:39:39'),
(93, '1', 604, 0, 54.2, '2022-06-29', '16:39:47'),
(94, '1', 623, 0, 92.77, '2022-06-29', '16:39:57'),
(95, '1', 604, 1, 93.75, '2022-06-29', '16:40:05'),
(96, '1', 607, 0, 101.56, '2022-06-29', '16:40:30'),
(97, 'ÿ­1', 527, 1, 41.5, '2022-06-29', '16:49:45'),
(98, '1', 553, 1, 41.5, '2022-06-29', '16:49:52'),
(99, '1', 576, 1, 41.5, '2022-06-29', '16:50:31'),
(100, '1', 567, 1, 41.5, '2022-06-29', '16:50:42'),
(101, '1', 569, 1, 41.99, '2022-06-29', '16:50:57'),
(102, '1', 565, 1, 41.5, '2022-06-29', '16:51:21'),
(103, '1', 607, 1, 41.99, '2022-06-29', '16:51:36'),
(104, '1', 611, 0, 41.5, '2022-06-29', '16:52:01'),
(105, '1', 586, 1, 40.53, '2022-06-29', '16:52:09'),
(106, '1', 578, 1, 41.5, '2022-06-29', '16:52:16'),
(107, '1', 592, 0, 41.99, '2022-06-29', '16:52:31'),
(108, '1', 580, 1, 43.46, '2022-06-29', '16:52:39'),
(109, '1', 583, 1, 41.99, '2022-06-29', '16:52:46'),
(110, '1', 580, 1, 41.99, '2022-06-29', '16:53:13'),
(111, '1', 584, 1, 41.5, '2022-06-29', '16:53:26'),
(112, '2', 610, 1, 40.53, '2022-06-29', '18:54:34'),
(113, '2', 710, 0, 41.53, '2022-06-29', '18:55:11'),
(114, '2', 406, 1, 40.4, '2022-06-29', '23:48:06'),
(115, '3', 450, 1, 39, '2022-06-29', '23:57:10'),
(116, '4', 670, 1, 42.5, '2022-06-29', '23:58:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kondisi` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama`, `kondisi`) VALUES
(1, 'ruangan 1', '1'),
(2, 'ruangan 2', '1'),
(3, 'ruangan 3', '1'),
(4, 'ruangan 4', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `tgl_lahir`, `alamat`, `no_hp`, `pekerjaan`, `password`, `foto`, `role`) VALUES
(1, 'Mevinda Aulia Firdaus', 'admin@gmail.com', '2022-03-04', 'Kutorejo', '088217071995', 'Mahasiswa', '$2y$10$zxdSnpILIinf6uAI.ssBZ.vvhuhofZygfcX.zehjuPlwQWWa7pGIy', '1654766395.jpg', 1),
(2, 'Budi ko', 'budi@gmail.com', '2022-03-06', 'Kutorejo', '082817283618', 'Mahasiswa', '$2y$10$fopNSYMQiLNjKKawp7L//etivR9xAiF3BsTHDEpukZb0H3BcB1f6q', 'default.jpeg', 3),
(3, 'Eko Prasety', 'eko@gmail.com', '2022-03-04', 'Kutorejo 3', '0828375732', 'Mahasiswa', '$2y$10$XnssA.GrxWf4OtsEGB6O/OC4zP4gPoH0JigthBocrN3yCOzeLWGcS', '', 2),
(15, 'Firdaus', 'aulia@gmail.com', '2000-05-10', 'Lamongan', '09876543', 'karyawan', '$2y$10$4sYW5rgzZs1abLmq2PNttuN4yNCQo4RUJPv5wRKK2/VBlzq9JOkXi', '1654766476.webp', 3),
(17, 'Fany Alifka', 'fany@gmail.com', '2004-10-02', 'Tuban', '08927721662', 'karyawan', '$2y$10$yiHabyFP2HZdtDM09qiegOx/6/Mto0sJu2XOgyABXJRcnf/b3EMQ2', 'default.jpeg', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arduino`
--
ALTER TABLE `arduino`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arduino`
--
ALTER TABLE `arduino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
