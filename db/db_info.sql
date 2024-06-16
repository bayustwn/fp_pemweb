-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2024 at 11:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cons` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id`, `nama`, `foto`, `lokasi`, `deskripsi`, `pro`, `cons`) VALUES
('0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109', 'PatDua', '', 'Jl.Depan Upn', 'Cafe view depan upn', 'tempat bersih, sejuk, pelayanan ramah', 'tukang parkir liar, tempat duduk terbatas');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `komentar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cafe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_user`, `komentar`, `cafe`) VALUES
('6d5acea2-77b7-4d67-b491-41d1c34bbd9b', '21ab2171-0abb-482d-bcdf-ec35eb9f5395', 'wow keren', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cafe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `foto`, `cafe`) VALUES
('13e75da3-5419-4795-9d99-cbcc4dec88f5', 'Cappuccino', 10000, '', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('cb621898-0a69-44f5-a143-18793ceb87d0', 'Americano', 12000, '', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109');

-- --------------------------------------------------------

--
-- Table structure for table `saran_cafe`
--

CREATE TABLE `saran_cafe` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cons` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saran_menu`
--

CREATE TABLE `saran_menu` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cafe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
('21ab2171-0abb-482d-bcdf-ec35eb9f5395', 'bayuset@gmail.com', '$2y$10$EN3z2Ce329kRIl8Y79IYlulCkF/4ozjNCe3SxWfxCM0s/gt.zE.r2', 'user'),
('401b52ad-f896-4ef7-98a1-8514b4897f20', 'khususpby5@gmail.com', '$2y$10$7b5v8DkvA4U/85i/LocUoe9CJieTMt2vSOuPKUmBoUNyaXLDuF86u', 'user'),
('672a3367-8551-46c6-9c72-77f09aea8b95', 'khususpby@gmail.com', '$2y$10$iXJ334ZYSN.eLmcKoPw.QuzQjFdVrPjmQLhxRvEJl.5oZLdfMJX1q', 'user'),
('bd545082-f94a-4d37-9ece-619a9fd878fa', 'kocak@gmail.com', '$2y$10$aF9cXkVpub9jpzTGOCb7PuyLrITlVF/lCAs9ijVocM5foN7JnFf/q', 'user'),
('d6a39341-3a5c-4536-b276-ea47d1914cd8', 'khususpby55@gmail.com', '$2y$10$Z.boyHxjpreTB/h821NZKuySwH09UDwfMiNvWb/CGnQwfYwEbXBSe', 'user'),
('f1c7fd6d-af53-46c4-a755-61584f259bb6', 'bayu@gmail.com', '$2y$10$CcAlbBW5vw3a7mSPgWr1n.e4npe.RRzrfAq.zQ01QoizapsLJt/y6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `cafe` (`cafe`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cafe` (`cafe`) USING BTREE;

--
-- Indexes for table `saran_cafe`
--
ALTER TABLE `saran_cafe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `menu` (`menu`);

--
-- Indexes for table `saran_menu`
--
ALTER TABLE `saran_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cafe` (`cafe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`cafe`) REFERENCES `cafe` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`cafe`) REFERENCES `cafe` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `saran_cafe`
--
ALTER TABLE `saran_cafe`
  ADD CONSTRAINT `saran_cafe_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `saran_menu`
--
ALTER TABLE `saran_menu`
  ADD CONSTRAINT `saran_menu_ibfk_1` FOREIGN KEY (`cafe`) REFERENCES `saran_cafe` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
