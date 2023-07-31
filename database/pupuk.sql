-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2023 at 11:52 AM
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
-- Database: `pupuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `nomor_rek` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `nama_pemilik`, `nomor_rek`, `logo`) VALUES
(1, 'Bank Rakyat Indonesia', 'xxxxxxxxx', 'xxxxxxxxxxxx', 'bri.png'),
(2, 'Bank Central Asia', 'xxxxxxxxxx', 'xxxxxxxxxx', 'bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_cart` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `id_pupuk` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `total_harga` varchar(40) NOT NULL,
  `status_keranjang` int(11) NOT NULL,
  `id_pembayaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_cart`, `id_user`, `id_pupuk`, `jumlah`, `total_harga`, `status_keranjang`, `id_pembayaran`) VALUES
(30, '11', '2', '2', '100000', 0, 'UHZ8w060K'),
(31, '11', '1', '2', '100010', 0, 'UHZ8w060K'),
(32, '11', '2', '2', '100000', 0, 'fjfWaok5K'),
(33, '11', '1', '3', '150015', 0, '4iiAUdi2O'),
(34, '11', '2', '1', '50000', 0, '4iiAUdi2O');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` varchar(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `file_bukti` varchar(40) NOT NULL,
  `tanggal_pembayaran` varchar(30) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nama_bank`, `nominal`, `file_bukti`, `tanggal_pembayaran`, `id_user`, `status_pembayaran`) VALUES
('4iiAUdi2O', 'Bank Rakyat Indonesia', '200015', 'logo.jpeg', '2023-07-30 10:12:52', '11', 1),
('fjfWaok5K', 'Bank Central Asia', '100000', 'c7a8c76f43671113f5f174c5c469a8ed.jpg', '2023-07-29 10:24:22', '11', 1),
('UHZ8w060K', 'Bank Rakyat Indonesia', '200010', '16724663048942.jpg', '2023-07-29 10:15:49', '11', 0);

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
(1, 'Penjualan Pupuk', 'images-1.jpeg', 'Start-Up.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pupuk`
--

CREATE TABLE `tbl_pupuk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pupuk`
--

INSERT INTO `tbl_pupuk` (`id`, `nama`, `gambar`, `jenis`, `harga`, `keterangan`, `stok`, `berat`, `deskripsi`, `informasi`) VALUES
(1, 'Pupuk tanahs', 'images-1.jpeg', 'pupuka', '50005', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 205, '50', '<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.                                     Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus                                     suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam                                     vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.                                     Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,                                     accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a                                     pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula                                     elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus                                     et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam                                     vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>', '<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.                                     Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.                                     Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam                                     sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo                                     eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.                                     Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent                                     sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac                                     diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante                                     ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;                                     Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.                                     Proin eget tortor risus.</p>'),
(2, 'pupuk orea', 'pupukb.png', 'pupukb', '50000', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 21, '', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_log` int(11) NOT NULL,
  `max_log` int(11) NOT NULL,
  `date_create` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `telepon`, `email`, `image`, `password`, `role_id`, `is_active`, `date_log`, `max_log`, `date_create`) VALUES
(1, 'admin', '', 'admin@gmail.com', 'default.jpg', '$2y$10$R3qMtlWVC6FaYtUfhawl3uqX1Sh5IVPSSK1vsM2Ch4fQBij/z0PuW', 1, 1, 1686968216, 0, ''),
(11, 'aries', '0822-6208-3187', 'test@gmail.com', 'default.jpg', '$2y$10$R3qMtlWVC6FaYtUfhawl3uqX1Sh5IVPSSK1vsM2Ch4fQBij/z0PuW', 2, 1, 1689753787, 0, '19 July 2023 || 08:46:48');

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
(84, 3, 3);

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
(2, 'PELANGGAN'),
(3, 'PUPUK');

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
(2, 'Pelanggan'),
(3, 'Pupuk');

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
(65, 3, 'Pengguna', 'admin/user', 'nav-icon fas fa-user', 1),
(66, 2, 'Data Penduduk', 'rt/dataPenduduk', 'nav-icon fas fa-users', 1),
(67, 4, 'Dashboard', 'kades/index', 'nav-icon fas fa-tachometer-alt', 1),
(68, 4, 'Surat Masuk', 'kades/suratMasuk', 'nav-icon fas fa-envelope', 1),
(69, 4, 'Surat Keluar', 'kades/suratKeluar', 'nav-icon fas fa-reply', 1),
(70, 4, 'Data Penduduk', 'kades/dataPenduduk', 'nav-icon fas fa-users', 1),
(74, 5, 'Dashboard', 'sekdes/index', 'nav-icon fas fa-tachometer-alt', 1),
(75, 5, 'Surat Masuk', 'sekdes/suratmasuk', 'nav-icon fas fa-envelope', 1),
(76, 5, 'Surat Keluar', 'sekdes/suratkeluar', 'nav-icon fas fa-reply', 1),
(77, 1, 'Pupuk', 'admin/pupuk', 'nav-icon fas fa-solid fa-box', 1),
(78, 1, 'Pembayaran', 'admin/pembayaran', 'nav-icon fas fa-money-bill-wave', 1),
(79, 1, 'Bank', 'admin/bank', 'nav-icon fas fa-university', 1);

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
(11, 'ariesilham234@gmail.com', 'yWZVw4YCqe0hHUOJbBP5JPiFOJVIpK2hOxFuaLSYliU=', 1685708812),
(12, 'test@gmail.com', 'Qm4+NhsPUwdlqPdGoS7NSAT8m62O177hlp2w6SL5GOQ=', 1689690153),
(13, 'test@gmail.com', '09xC0U9Y+SOrXvjTBLKd0eXzxg/iNKY7XGpgRKdYNmQ=', 1689731069),
(14, 'test@gmail.com', 'CyjFJ3GMFKY9hZn2IoOrOKDGyZjphbemuVJppd/18c0=', 1689731208);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pupuk`
--
ALTER TABLE `tbl_pupuk`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pupuk`
--
ALTER TABLE `tbl_pupuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
