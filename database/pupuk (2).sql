-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2023 at 02:36 PM
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
-- Table structure for table `tbl_data_petani`
--

CREATE TABLE `tbl_data_petani` (
  `id_data_petani` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `nik_petani` varchar(16) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kk_petani` varchar(30) NOT NULL,
  `luas_lahan` varchar(10) NOT NULL,
  `file_kk` varchar(50) NOT NULL,
  `file_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_petani`
--

INSERT INTO `tbl_data_petani` (`id_data_petani`, `id_user`, `nama_petani`, `nik_petani`, `provinsi`, `kabupaten`, `alamat`, `kk_petani`, `luas_lahan`, `file_kk`, `file_ktp`) VALUES
(1, 'nwBnuaue0', 'Sandhika', '1234567890123456', 'asdas', 'sdasdas', 'dasdsadas', '22222222222', '0.375', 'pupukb.png', 'pupukb1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_cart` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `id_pupuk` int(11) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `total_harga` varchar(40) NOT NULL,
  `status_keranjang` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jam_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_cart`, `id_user`, `id_pupuk`, `jumlah`, `total_harga`, `status_keranjang`, `tanggal_bayar`, `jam_bayar`) VALUES
(19, 'nwBnuaue0', 1, '1', '112500', 0, '2023-09-13', '18:56:08'),
(20, 'nwBnuaue0', 2, '1', '115000', 0, '2023-09-13', '19:40:53'),
(21, 'nwBnuaue0', 1, '1', '112500', 0, '2023-09-13', '19:59:41'),
(22, 'nwBnuaue0', 2, '1', '115000', 0, '2023-09-13', '19:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` varchar(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `file_bukti` varchar(40) NOT NULL,
  `tanggal_pembayaran` varchar(30) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_bank`, `nominal`, `file_bukti`, `tanggal_pembayaran`, `id_user`, `status_pembayaran`) VALUES
('0lKcn15LV', 1, '112500', 'pupukb8.png', '2023-09-13 18:56:08', 'nwBnuaue0', 0),
('IMA6GkRpR', 1, '227500', 'pupukb10.png', '2023-09-13 19:59:41', 'nwBnuaue0', 1),
('ycByPv87R', 1, '115000', 'pupukb9.png', '2023-09-13 19:40:53', 'nwBnuaue0', 0);

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
(1, 'SIP PPK', 'images-1.jpeg', 'Start-Up.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pupuk`
--

CREATE TABLE `tbl_pupuk` (
  `id_pupuk` int(11) NOT NULL,
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

INSERT INTO `tbl_pupuk` (`id_pupuk`, `nama`, `gambar`, `jenis`, `harga`, `keterangan`, `stok`, `berat`, `deskripsi`, `informasi`) VALUES
(1, 'Pupuk Urea', 'images-1.jpeg', 'pupuka', '112500', 'Pupuk kimia mengandung Nitrogen (N) berkadar tinggi yang berbentuk prill mengandung zat hara yang sangat diperlukan tanaman. Pupuk urea dengan rumus kimia NH2 CONH2 merupakan pupuk yang mudah larut dalam air dan sifatnya sangat mudah menghisap air (higroskopis).<br>', 10, '50', '<h6 style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: \"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Ciri-ciri pupuk Urea:</span></h6><ul><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Berbentuk butir-butir Kristal berwarna putih (Prilled)</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Memiliki rumus kimia NH2 CONH2.</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Mudah larut dalam air dan sifatnya sangat mudah menghisap air (higroskopis).</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Standar SNI 2801:2010</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Kandungan Nitrogen : 46,00 % Minimum</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Kandungan Biuret : 1,0 % Maximum</span></li><li style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Kandungan Moisture : 0,5 % Maximum</span></li></ul><p style=\"text-align: left; -webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\"><br></span></p><h6 style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: \"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Unsur hara Nitrogen dikandung dalam pupuk urea sangat besar kegunaannya bagi tanaman untuk pertumbuhan dan perkembangan, diantaranya :</span></h6><ul><li style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Membuat daun tanaman lebih hijau segar dan banyak mengandung butir hijau daun (chlorophyl) yang mempunyai peranan sangat penting dalam proses fotosintesa.</span></li><li style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Mempercepat pertumbuhan tanaman (tinggi, jumlah anakan, cabang dan lain-lain)</span></li><li style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Menambah kandungan protein tanaman</span></li><li style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Dapat dipakai untuk semua jenis tanaman baik tanaman pangan, holtikultura, tanaman perkebunan.</span></li><li style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Dengan pemupukan yang tepat & benar (berimbang) secara teratur, tanaman akan tumbuh segar, sehat dan memberikan hasil yang berlipat ganda dan tidak merusak struktur tanah.</span></li></ul><p style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\"><br></span></p><p style=\"-webkit-font-smoothing: antialiased; outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: \" maven=\"\" pro\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(241,=\"\" 243,=\"\" 247);\"=\"\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\";\"=\"\">Dalam rangka pengamanan dan menghindari penyalahgunaan oleh pihak yang tidak bertanggung jawab untuk Penyaluran Pupuk Bersubsidi, maka dilakukan perubahan pupuk urea berwarna PUTIH menjadi pupuk urea berwarna PINK (merah muda). Pupuk urea pink tidak mengubah komposisi dan kandungannya, pupuk urea pink tetap aman gunakan, ramah lingkungan dan tidak meracuni tanaman. Adapun bahan pewarna yang digunakan terbuat dari bahan kimia organik yang tidak berbahaya bagi tanaman karena larut dalam air.</span></p>', '<ul><li><b>Memperhatikan waktu pengaplikasiannya</b></li></ul><div>Waktu pengaplikasian pupuk urea tidak bisa sembarangan, sebab pupuk urea disarankan untuk diaplikasikan ketika suhu sedang dingin di pagi atau sore hari. Apabila suhunya terlalu dingin, maka tanah dapat membeku dan penyerapan pupuk urea pun menjadi lebih sulit. Akan tetapi, jika suhu terlalu tinggi, pupuk urea dapat menguap dan tidak akan diserap maksimal oleh tanaman.</div><div><br></div><ul><li><b>Menyiram tanaman sebelum diberi pupuk</b></li></ul><div>Sebelum mengaplikasikan pupuk urea, tanaman harus disiram lebih dulu. Penyiraman tanaman ini diperlukan agar dapat membantu pupuk urea lebih cepat dan mudah menyerap di dalam tanah.</div><div><br></div><ul><li><b>Membuat lubang untuk pemupukan</b></li></ul><div>Hal penting lainnya agar tanaman dapat menyerap pupuk urea dengan maksimal adalah dengan membuat lubang pemupukan. Lubang pemupukan ini dibuat di dekat dengan akar tanaman. Hal ini bertujuan agar pupuk lebih cepat diserap oleh akar.</div><div><br></div><ul><li><b>Menaburkan pupuk urea</b></li></ul><div>Setelah lubang pemupukan dibuat, maka langkah selanjutnya dalam pengaplikasinya pupuk adalah menaburkan pupuk urea. Pupuk urea ditaburkan untuk memastikan bahwa dosis yang diberikan pada tanaman tepat dan sesuai. Karena memberikan dosis pupuk urea yang berlebihan akan mempengaruhi produktivitas dari tanaman tersebut.</div><div><br></div><ul><li><b>Menutup lubang pemupukan</b></li></ul><div>Seperti yang telah dijelaskan sebelumnya, bahwa pupuk urea lebih mudah mengalami penguapan. Oleh karena itu, untuk mencegah pupuk menguap maka Grameds bisa menutup lubang pemupukan. Dengan begitu, maka tanaman dapat menyerap nitrogen dan unsur yang ada dalam pupuk urea lebih cepat.</div><div>Selain pupuk urea, ada beberapa jenis pupuk lainnya yang memiliki kandungan nitrogen. Akan tetapi, penggunaan pupuk urea untuk menambahkan unsur nitrogen memang lebih populer.</div><div>Demikianlah penjelasan mengenai pupuk urea adalah salah satu jenis pupuk yang memiliki kandungan nitrogen cukup tinggi.  Semoga semua pembahasan di atas bermanfaat untuk kamu. Grameds bisa menambah wawasan tentang tumbuhan, pertanian lainnya dengan membaca buku.</div>'),
(2, 'Pupuk Phonska', 'pupukb.png', 'pupukb', '115000', '<p><font color=\"#000000\">Pupuk phonska diperkaya dengan Sulfur (S) untuk meningkatkan kualitas dan daya simpan hasil panen, serta diperkaya Zink (Zn) untuk mengoptimalkan pembentukan bunga dan memperbanyak buah.</font><br></p>', 10, '50', '<p><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><b>Kandungan dlm pupuk phonska :</b></span></p><ul><li><span style=\"font-size: 1rem;\">Nitrogen(N) 15 %</span></li><li><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Phosphat(P)15 %</span></li><li><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Kalium(K) 15 %</span></li><li><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Sulfur(S) 10 %</span></li></ul><p><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Berbentuk butiran dengan warna putih<br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Mudah larut ketika terkena air.<br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Tanpa bahan kimia yg tdk membuat tanaman menjadi panas/gosong.</span></p><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Pupuk phonska sangat mudah di gunakan dengan menaburkannya pd rumput serta pohon-pohon hias.</span><br style=\"box-sizing: inherit; color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Dalam 1 kg pupuk phonska mampu berdaya sebar, khususnya rumput 15 m2.</span><br style=\"box-sizing: inherit; color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Untuk tanaman taburkan di sisi pohonnya 10-15 gram,</span><br><p></p>', '<p><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><b>Cara pemakaian :</b></span></p><ul><li><font color=\"#212121\">Taburkan pupuk ponska pd tanaman rumput.</font></li><li><span style=\"color: rgb(33, 33, 33); font-size: 1rem;\">Kemudian siram sampai larut butiran2 pupuk ponskanya.</span></li><li><font color=\"#212121\">Gunakan pupuk secukupnya.</font></li><li><span style=\"color: rgb(33, 33, 33); font-size: 1rem;\">2-3 hari sudah mulai perubahan warna daun rumputnya.</span></li></ul><p><span style=\"color: rgb(33, 33, 33); font-size: 1rem;\"><br></span></p><p><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><b>Keunggulan :</b><br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Pupuk majemuk NPK yang diperkaya dengan unsur sulfur dan zinc.<br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Mampu meningkatkan efesiensi & efektifitas penggunaan pupuk.<br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Mampu meningkatkan jumlah & mutu hasil panen.<br></span><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Hasil racikan bahan baku melalui proses produksi yang tepat sehingga menghasilkan kualitas campuran produk yang homogen.</span></p><p></p><br style=\"box-sizing: inherit; color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: rgb(33, 33, 33); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">NPK Phonska Plus merupakan pupuk non-subsidi yang diperkaya dengan unsur hara mikro Zinc (Zn) yang membedakannya dengan pupuk NPK Phonska bersubsidi (tanpa Zinc). Penambahan Zinc penting, karena berdasarkan laporan International Fertilizer Association (IFA), kandungan Zinc pada lahan pertanian dunia menurun signifikan, termasuk di Indonesia.</span><br><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pembayaran` varchar(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pembayaran`, `id_cart`, `id_user`) VALUES
(1, '0lKcn15LV', 19, 'nwBnuaue0'),
(2, 'ycByPv87R', 20, 'nwBnuaue0'),
(3, 'IMA6GkRpR', 21, 'nwBnuaue0'),
(4, 'IMA6GkRpR', 22, 'nwBnuaue0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(11) NOT NULL,
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

INSERT INTO `users` (`id_user`, `name`, `telepon`, `email`, `image`, `password`, `role_id`, `is_active`, `date_log`, `max_log`, `date_create`) VALUES
('1', 'admin', '', 'admin@gmail.com', 'default.jpg', '$2y$10$R3qMtlWVC6FaYtUfhawl3uqX1Sh5IVPSSK1vsM2Ch4fQBij/z0PuW', 1, 1, 1686968216, 0, ''),
('11', 'aries', '0822-6208-3187', 'test@gmail.com', 'default.jpg', '$2y$10$R3qMtlWVC6FaYtUfhawl3uqX1Sh5IVPSSK1vsM2Ch4fQBij/z0PuW', 2, 1, 1689753787, 0, '19 July 2023 || 08:46:48'),
('nwBnuaue0', 'Sandhika', '0822-6208-3187', 'user1@gmail.com', 'default.jpg', '$2y$10$9nUUmrwiW3rkSIyu6Zvo2eIOJSLtujmwGrBDD28eUwrWzMgYxXJki', 2, 1, 0, 0, '09 August 2023 || 12:37:28');

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
(67, 4, 'Dashboard', 'kades/index', 'nav-icon fas fa-tachometer-alt', 1),
(68, 4, 'Surat Masuk', 'kades/suratMasuk', 'nav-icon fas fa-envelope', 1),
(69, 4, 'Surat Keluar', 'kades/suratKeluar', 'nav-icon fas fa-reply', 1),
(70, 4, 'Data Penduduk', 'kades/dataPenduduk', 'nav-icon fas fa-users', 1),
(74, 5, 'Dashboard', 'sekdes/index', 'nav-icon fas fa-tachometer-alt', 1),
(75, 5, 'Surat Masuk', 'sekdes/suratmasuk', 'nav-icon fas fa-envelope', 1),
(76, 5, 'Surat Keluar', 'sekdes/suratkeluar', 'nav-icon fas fa-reply', 1),
(77, 1, 'Pupuk', 'admin/pupuk', 'nav-icon fas fa-solid fa-box', 1),
(78, 1, 'Pembayaran', 'admin/pembayaran', 'nav-icon fas fa-money-bill-wave', 1),
(79, 1, 'Bank', 'admin/bank', 'nav-icon fas fa-university', 1),
(80, 1, 'Data Petani', 'admin/dataTani', 'nav-icon fas fa-users', 1);

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
-- Indexes for table `tbl_data_petani`
--
ALTER TABLE `tbl_data_petani`
  ADD PRIMARY KEY (`id_data_petani`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pupuk` (`id_pupuk`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pupuk`
--
ALTER TABLE `tbl_pupuk`
  ADD PRIMARY KEY (`id_pupuk`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT for table `tbl_data_petani`
--
ALTER TABLE `tbl_data_petani`
  MODIFY `id_data_petani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_pengaturan_umum`
--
ALTER TABLE `tbl_pengaturan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pupuk`
--
ALTER TABLE `tbl_pupuk`
  MODIFY `id_pupuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_data_petani`
--
ALTER TABLE `tbl_data_petani`
  ADD CONSTRAINT `tbl_data_petani_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `tbl_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `tbl_keranjang_ibfk_2` FOREIGN KEY (`id_pupuk`) REFERENCES `tbl_pupuk` (`id_pupuk`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `tbl_bank` (`id_bank`),
  ADD CONSTRAINT `tbl_pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `tbl_keranjang` (`id_cart`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `tbl_pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
