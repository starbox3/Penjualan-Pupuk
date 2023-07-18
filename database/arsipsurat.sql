-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2023 at 12:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsipsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_penduduk`
--

CREATE TABLE `tbl_data_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `golongan_darah` varchar(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt_rw` varchar(11) NOT NULL,
  `kel_desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `pekerjaan` varchar(11) NOT NULL,
  `kewarganegaraan` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan_umum`
--

CREATE TABLE `tbl_pengaturan_umum` (
  `id` int(11) NOT NULL,
  `namaweb` varchar(128) NOT NULL,
  `favicon` varchar(128) NOT NULL,
  `logo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengaturan_umum`
--

INSERT INTO `tbl_pengaturan_umum` (`id`, `namaweb`, `favicon`, `logo`) VALUES
(1, 'Arsip Surat', 'letter-gd5a82d665_1920.png', 'Start-Up.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `no_agenda` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tipe_surat` int(2) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tujuan_surat` varchar(30) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `nomor_surat_masuk` varchar(30) NOT NULL,
  `perihal` varchar(40) NOT NULL,
  `ringkasan` text NOT NULL,
  `file_surat` text NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `no_agenda` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `tipe_surat` int(2) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(40) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `ringkasan` text NOT NULL,
  `file_surat` text NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_log` int(11) NOT NULL,
  `max_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_log`, `max_log`) VALUES
(1, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$R3qMtlWVC6FaYtUfhawl3uqX1Sh5IVPSSK1vsM2Ch4fQBij/z0PuW', 1, 1, 1686968216, 0),
(5, 'users', 'rt@gmail.com', 'default.jpg', '$2y$10$GYEdF3ja.8JNqQBgHAMcBuYxZU/uK0cu6am8WuwT42x9u1ZZXy9oe', 2, 1, 0, 0),
(6, 'tess', 'kades@gmail.com', 'default.jpg', '$2y$10$qMGR9rbi2yqXHMDZie9hW.XM6//8MTM3CCdBFFde1gkXFyxkt3Ibq', 3, 1, 0, 0),
(7, 'Sekdes', 'sekdes@gmail.com', 'default.jpg', '$2y$10$OeHpRfNnm/LP1RhXU0Sn8udLZnm5qdcyk.cQHJwINKyd/Wkb0xLHO', 4, 1, 0, 0),
(8, 'rt2', 'rt2@gmail.com', 'default.jpg', '$2y$10$5WyXdUKdSJfcgQ0EWmOkiubD4pf7sEc8nGMemTgqBPmy.en1/ZXse', 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(78, 1, 1),
(81, 2, 2),
(84, 1, 3),
(85, 3, 4),
(86, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'RT'),
(3, 'PENGATURAN'),
(4, 'KADES'),
(5, 'SEKDES');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'RT'),
(3, 'Kades'),
(4, 'Sekdes');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'nav-icon fas fa-tachometer-alt', 1),
(36, 3, 'Submenu Management', 'admin/submenu', 'nav-icon fas fa-bars', 0),
(38, 3, 'Akses Menu Management', 'admin/role', 'nav-icon fas fa-users-cog', 0),
(39, 2, 'Dashboard', 'rt/index', 'nav-icon fas fa-tachometer-alt', 1),
(57, 3, 'Pengaturan Situs', 'admin/pengaturan', 'nav-icon fas fa-cogs', 0),
(60, 1, 'Surat Masuk', 'admin/suratmasuk', 'nav-icon fas fa-envelope', 1),
(61, 1, 'Surat Keluar', 'admin/suratkeluar', 'nav-icon fas fa-reply', 1),
(62, 1, 'Data Penduduk', 'admin/datapenduduk', 'nav-icon fas fa-users', 1),
(65, 3, 'Pengguna', 'admin/user', 'nav-icon fas fa-user', 1),
(66, 2, 'Data Penduduk', 'rt/dataPenduduk', 'nav-icon fas fa-users', 1),
(67, 4, 'Dashboard', 'kades/index', 'nav-icon fas fa-tachometer-alt', 1),
(68, 4, 'Surat Masuk', 'kades/suratMasuk', 'nav-icon fas fa-envelope', 1),
(69, 4, 'Surat Keluar', 'kades/suratKeluar', 'nav-icon fas fa-reply', 1),
(70, 4, 'Data Penduduk', 'kades/dataPenduduk', 'nav-icon fas fa-users', 1),
(71, 1, 'Laporan', 'admin/laporan?periode=2023', 'nav-icon fas fa-copy', 1),
(74, 5, 'Dashboard', 'sekdes/index', 'nav-icon fas fa-tachometer-alt', 1),
(75, 5, 'Surat Masuk', 'sekdes/suratmasuk', 'nav-icon fas fa-envelope', 1),
(76, 5, 'Surat Keluar', 'sekdes/suratkeluar', 'nav-icon fas fa-reply', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'www.ariesilhams@gmail.com', 'tSDmiat29KNnB/f/22dAv5bb747Y1HNsVZCyAw9nH8w=', 1639064215),
(6, 'ariesilham234@gmail.com', 'FQemuqI9SidG0Epm5yeSeLlWHKRPg234c1kg7U9IC+o=', 1663323028),
(7, 'ariesilham234@gmail.com', 'IRfFeyZKIsTVQ7npQd5BgROMlf2lQVkdA0lP6SkdHHA=', 1663329229),
(8, 'ariesilham234@gmail.com', 'isIxfB81WuCFb0tgvd01NMxueeFh6a5DyqjKUEetryg=', 1685609185),
(9, 'ariesilham234@gmail.com', 'VpBrUiHj8uGsDMJWRlUQ2W9yAI1sQG1MX247F7Q8ZQI=', 1685707318),
(10, 'ariesilham234@gmail.com', 'xMwqy4IyBhX+hf8ZGmfKqVDEjRE/AvPNGa2Bjij0sS8=', 1685707505),
(11, 'ariesilham234@gmail.com', 'yWZVw4YCqe0hHUOJbBP5JPiFOJVIpK2hOxFuaLSYliU=', 1685708812);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_penduduk`
--
ALTER TABLE `tbl_data_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`no_agenda`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`no_agenda`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_penduduk`
--
ALTER TABLE `tbl_data_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `no_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `no_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
