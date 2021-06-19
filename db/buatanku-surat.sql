-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 04:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buatanku-surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `jenis_surat`) VALUES
(1, 'Surat Undangan'),
(2, 'Surat Perintah'),
(3, 'Surat Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(130) DEFAULT NULL,
  `perihal` varchar(256) DEFAULT NULL,
  `id_jenis_surat` int(5) DEFAULT NULL,
  `pengirim` varchar(256) DEFAULT NULL,
  `ditujukan` varchar(30) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `id_petugas` int(11) UNSIGNED DEFAULT NULL,
  `sifat_surat` enum('Rahasia','Penting','Segera','Biasa') DEFAULT NULL,
  `dibuat_pada` int(11) NOT NULL,
  `berkas_surat` varchar(256) NOT NULL,
  `no_urut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_surat`, `perihal`, `id_jenis_surat`, `pengirim`, `ditujukan`, `deskripsi`, `id_petugas`, `sifat_surat`, `dibuat_pada`, `berkas_surat`, `no_urut`) VALUES
(44, '023', 'Surat Keterangan', 3, 'Kepala Kemenag', 'Kepala Madrasah', '', 1, 'Penting', 1619992642, '1f3920e722fa59abbe6365d482d595e0.jpg', '2'),
(51, '024', 'Surat Keterangan', 2, 'Kepala Kantor Pendidikan Madrasah', 'Kepala Madrasah', '', 1, 'Biasa', 1622286421, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(130) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `perihal` varchar(256) DEFAULT NULL,
  `id_jenis_surat` int(5) DEFAULT NULL,
  `pengirim` varchar(256) DEFAULT NULL,
  `ditujukan` varchar(30) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `id_petugas` int(11) UNSIGNED DEFAULT NULL,
  `sifat_surat` enum('Rahasia','Penting','Segera','Biasa') DEFAULT NULL,
  `status_disposisi` varchar(2) DEFAULT NULL,
  `dibuat_pada` int(11) NOT NULL,
  `berkas_surat` varchar(256) NOT NULL,
  `disposisi_kepada` varchar(100) NOT NULL,
  `instruksi` varchar(256) NOT NULL,
  `no_urut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_surat`, `tgl_surat`, `perihal`, `id_jenis_surat`, `pengirim`, `ditujukan`, `deskripsi`, `id_petugas`, `sifat_surat`, `status_disposisi`, `dibuat_pada`, `berkas_surat`, `disposisi_kepada`, `instruksi`, `no_urut`) VALUES
(43, 'B-3532/jjsh12', '2021-05-20', 'Surat Memohon Izin Menggunakan Auditorium untuk digunakan mengaji bersama andalan', 2, 'Kepala Kemenag', 'Kepala Madrasah', '', 1, 'Segera', '1', 1619989650, 'images.jpg', 'Kepala Perpustakaan', 'Lanjutkan', '1'),
(53, 'B-123/H.0012/LM/12/2012', '2021-06-11', 'Surat Undangan', 1, 'Dekan IAIN Tulungagung', 'Kepala Madrasah', '', NULL, 'Segera', '0', 1623967200, '', '', '', ''),
(54, 'B-123/H.0012/LM/12/2334', '2021-06-04', 'Surat Undangan', 1, 'Kepala Madrasah', 'Kepala Madrasah', '', 0, 'Biasa', '0', 1623967200, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_penelitian`
--

CREATE TABLE `surat_penelitian` (
  `id` int(11) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `asal_surat` varchar(128) NOT NULL,
  `tanggal_asal` date NOT NULL,
  `nomor_asal` varchar(128) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nim_mahasiswa` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `judul_skripsi` varchar(200) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nomor_surat` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `no_suket` varchar(50) NOT NULL,
  `tanggal_suket` date DEFAULT NULL,
  `awal_penelitian` date DEFAULT NULL,
  `akhir_penelitian` date DEFAULT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_penelitian`
--

INSERT INTO `surat_penelitian` (`id`, `penulis`, `asal_surat`, `tanggal_asal`, `nomor_asal`, `nama_mahasiswa`, `nim_mahasiswa`, `fakultas`, `jurusan`, `prodi`, `no_hp`, `judul_skripsi`, `tanggal_surat`, `nomor_surat`, `keterangan`, `no_suket`, `tanggal_suket`, `awal_penelitian`, `akhir_penelitian`, `is_active`) VALUES
(19, 'Dekan', 'IAIN Tulungagung', '2021-05-01', 'B-034/In.12/F.II/TL.00/01/2021', 'Lailatur Rosidah', '12204173007', '', 'Tadris Matematika', '', '085807230313', 'Pengembangan yang berbau agama dengan kemanfaatan sosial sendiri', '2021-05-01', '031', '', '032', '2021-05-01', '2021-05-05', '2021-05-29', 1),
(20, 'Dekan', 'IAIN Kediri', '2021-05-13', 'B-3794/In.12/F.II/TL.00/11/2020', 'Ani Ni\'matus Surur', '12204173007', '', 'Pendidikan Agama Islam', '', '08563637463', 'Pengampuan yang bersalah dengan semua orang yang bergabung', '2021-05-02', '016', '', '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Mohamad Riduwan', 'riduwan.boban@gmail.com', '_DSC9855.jpg', '$2y$10$eqRcU5c/KwmBwXSuIp9Heu0A3oSlpNzcrb6ZND98QQ75G4R9yqhmW', 1, 1, 1552120289),
(16, 'Mohamad Riduwan', 'guru1@guruku.com', 'default.jpg', '$2y$10$DuqJ0onCeeSdJ3gfUJZ9ZeFHnCV7/drifaNvuFvUvRnpEI6AspvjK', 2, 1, 1618983762),
(17, 'ALFATIH', 'riduwan@madrasah.com', 'default.jpg', '$2y$10$d0boppkHay76PbCfETPw4uWtTcs1n4iStOdRqZqsRGvyN5wthJFT2', 2, 1, 1624032848);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(15, 1, 6),
(26, 1, 4),
(27, 2, 4),
(28, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Izin'),
(6, 'Arsip');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-users-cog', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Dashboard Izin', 'izin', 'fas fa-fw fa-tachometer-alt', 1),
(10, 4, 'Surat Balasan', 'izin/suratbalasan', 'fas fa-fw fa-file-export', 1),
(11, 4, 'Surat Selesai', 'izin/selesai', 'fas fa-fw fa-envelope', 1),
(12, 1, 'Pengguna', 'admin/pengguna', 'fas fa-fw fa-user-tie', 1),
(14, 6, 'Dashboard Arsip', 'arsip', 'fas fa-fw fa-tachometer-alt', 1),
(15, 6, 'Jenis Surat', 'arsip/jenissurat', 'fas fa-fw fa-clipboard-list', 1),
(16, 6, 'Surat Masuk', 'arsip/suratmasuk', 'fas fa-fw fa-envelope-open-text', 1),
(17, 6, 'Surat Keluar', 'arsip/suratkeluar', 'fas fa-fw far fa-paper-plane', 1),
(18, 6, 'Disposisi Surat', 'arsip/disposisisurat', 'fas fa-fw far fa-share-square', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_surat_masuk_jenis_surat1` (`id_jenis_surat`),
  ADD KEY `fk_surat_masuk_petugas1` (`id_petugas`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_surat_masuk_jenis_surat1` (`id_jenis_surat`),
  ADD KEY `fk_surat_masuk_petugas1` (`id_petugas`);

--
-- Indexes for table `surat_penelitian`
--
ALTER TABLE `surat_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `surat_penelitian`
--
ALTER TABLE `surat_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
