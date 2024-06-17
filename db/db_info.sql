-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2024 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `cons` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `jam_buka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_tutup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id`, `nama`, `foto`, `lokasi`, `deskripsi`, `pro`, `cons`, `jam_buka`, `jam_tutup`, `instagram`) VALUES
('0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109', 'Starbuck - MERR', '../public/cafe/2023-04-14.jpg', ' Superindo - MERR, Jl. Dr. Ir. H. Soekarno, Kedung Baruk, Rungkut, Surabaya', 'Cafe zionis', '-', 'Zionis ', '07:00', '10:00', '@starbucksindonesia'),
('2548efea-8606-4553-b4d5-ff4dc92b3d6c', 'Jokopi - MERR', '../public/cafe/2023-08-27.jpg', ' Jl. Dr. Ir. H. Soekarno No.431, Penjaringan Sari, Kec. Rungkut, Surabaya,', 'Bercerita & Membudaya', 'Tempat bersih, sejuk, pelayanan ramah', 'Tempat duduk terbatas', '00:00', '-', '@jo.ko.pi'),
('5b21a87a-73c1-4303-bfe8-89cb2d3feca8', 'Bincang Cafe & Creative Space', '../public/cafe/417817520_17874672690019430_5915963017271842508_n.jpg', 'Jl. Medokan Asri Tengah No.20-22, Kali Rungkut, Kec. Rungkut, Surabaya', 'Tempat untuk berbincang dan eksplorasi kreatifitas', 'Tempatnya comfy ahh', 'makanannya agak kurang', '10.00', '00.00 ', '@bincang_space'),
('a517cbc4-6397-44e2-a2ee-452c3ecc913b', 'Kopi Serbu', '../public/cafe/364385485_3578762199117442_1707506408759898246_n.jpg', 'Medokan Ayu 1P No.23 Surabaya ', 'Nongkrong asik Surabaya timur', 'Murah', 'Ngga 24 jam', '10.00', '23.59', '@kopiserbu'),
('e4511e3d-0b50-4df3-a68c-f1cce10a6e31', 'Patdua Coffee And Eatery', '../public/cafe/Subtract.png', 'Jl. Rungkut Madya No.203, Rungkut Kidul, Kec. Rungkut, Surabaya', 'Co-working Space', 'Tempat bersih, sejuk, pelayanan ramah', 'Tukang parkir liar, tempat duduk terbatas', '09:00', '11:00', '@patdua_eatery');

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
('464e78ff-d14b-4369-998e-064e2bc82f38', '41babff4-a3c3-4610-863e-9168ee4053ac', 'saranku ojo ngopi ning kene cah', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('8d104db3-62ec-4d09-9611-d1937a24f940', '41babff4-a3c3-4610-863e-9168ee4053ac', 'nyeni tempate', '5b21a87a-73c1-4303-bfe8-89cb2d3feca8'),
('b38e209c-ab86-4af0-93b7-797a6549b8e6', '41babff4-a3c3-4610-863e-9168ee4053ac', 'sing ngopi kene zionis', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cafe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `foto`, `cafe`) VALUES
('027c2375-8b33-453b-a45d-4d6fcbcb5fd0', 'Tea Based', 10000, NULL, '5b21a87a-73c1-4303-bfe8-89cb2d3feca8'),
('0887e74e-c739-4a4d-a688-a271f175afcc', 'capcin', 200, NULL, '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('13e75da3-5419-4795-9d99-cbcc4dec88f5', 'Cappuccino', 10000, '', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('2fa82335-7338-4fcf-82cb-ae4195d7f1c2', 'Tea Based', 10000, NULL, 'a517cbc4-6397-44e2-a2ee-452c3ecc913b'),
('46882a91-5e5b-4310-9437-0fd73e435304', 'Tea Based', 15000, NULL, 'e4511e3d-0b50-4df3-a68c-f1cce10a6e31'),
('4709feef-9c47-4f82-811f-92079a721c29', 'Ramen', 17000, NULL, 'e4511e3d-0b50-4df3-a68c-f1cce10a6e31'),
('85fd88a6-fc16-4667-a03d-1964e911d635', 'Nasi Telur', 12000, NULL, 'a517cbc4-6397-44e2-a2ee-452c3ecc913b'),
('8d246b65-53b0-4ea9-9a6f-b7427698f0d2', 'kiki', 12, NULL, '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('a1d51ca8-2c96-449f-b700-7567b084c0a8', 'French Fries', 12000, NULL, '5b21a87a-73c1-4303-bfe8-89cb2d3feca8'),
('ad450cce-8191-45cd-a2f1-45e25ed8ee3b', 'kuku', 12, NULL, '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('c06e805f-9bbb-4d32-aeb9-47f46214c5a9', 'Coffe based', 18000, NULL, 'e4511e3d-0b50-4df3-a68c-f1cce10a6e31'),
('cb621898-0a69-44f5-a143-18793ceb87d0', 'Americano', 12000, '', '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('ce261c38-6a98-44b4-bfcb-fa73e1282edf', 'Coffe based', 12000, NULL, 'a517cbc4-6397-44e2-a2ee-452c3ecc913b'),
('d68e4491-4438-4fbc-bdbd-fe398600a1a1', 'bima', 15, NULL, '0c9a6e4f-0802-4ad3-8bb3-bd49f3e85109'),
('f20e3fd3-fbab-46c6-9212-06e41d8d8152', 'Coffe based', 15000, NULL, '5b21a87a-73c1-4303-bfe8-89cb2d3feca8');

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
('2d65625b-920d-4552-af77-21dc0b68d373', 'admin@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$TDByTmx0SUZSUVR6Tktacw$7kR96L2xbLEfqyFW+USLAQ', 'admin'),
('401b52ad-f896-4ef7-98a1-8514b4897f20', 'khususpby5@gmail.com', '$2y$10$7b5v8DkvA4U/85i/LocUoe9CJieTMt2vSOuPKUmBoUNyaXLDuF86u', 'user'),
('41babff4-a3c3-4610-863e-9168ee4053ac', 'elmanuk@gmail.com', '$2y$10$mVqXnxNbGI1SHLWkIKafgO/NkS262GP09JT1U3aaUjp9Pkmuyb4Be', 'user'),
('672a3367-8551-46c6-9c72-77f09aea8b95', 'khususpby@gmail.com', '$2y$10$iXJ334ZYSN.eLmcKoPw.QuzQjFdVrPjmQLhxRvEJl.5oZLdfMJX1q', 'user'),
('bd545082-f94a-4d37-9ece-619a9fd878fa', 'kocak@gmail.com', '$2y$10$aF9cXkVpub9jpzTGOCb7PuyLrITlVF/lCAs9ijVocM5foN7JnFf/q', 'user'),
('d6a39341-3a5c-4536-b276-ea47d1914cd8', 'khususpby20@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YnhZcXNmZ0J3MERvUzFiQQ$Fac1Oj8SsydDwDRK1yAwIQQebrW9pwRHilmSOjlOClw', 'user'),
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
  ADD KEY `cafe` (`cafe`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

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
