-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 09:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sicaperpedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'operator'),
(4, 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal_diperbarui` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `nama_barang`, `satuan`, `kategori`, `harga`, `tanggal_diperbarui`) VALUES
(1, 'A001', 'Baterai AA ', 'set', 'A', NULL, NULL),
(2, 'A002', 'Baterai AAA', 'set', 'A', NULL, NULL),
(3, 'A003', 'Fiting : Flaon', 'buah', 'A', NULL, NULL),
(4, 'A004', 'Kabel Roll 15 Meter', 'roll', 'A', NULL, NULL),
(5, 'A005', 'Lampu 12 watt', 'unit', 'A', NULL, NULL),
(6, 'A006', 'Stop Kontak 6 Lubang', 'buah', 'A', NULL, NULL),
(7, 'B001', 'Ballpoint Balliner', 'pak', 'B', NULL, NULL),
(8, 'B002', 'Ballpoint Biasa', 'pak', 'B', NULL, NULL),
(9, 'B003', 'Ballpoint Gel', 'pak', 'B', NULL, NULL),
(10, 'B004', 'Binder Clip 105', 'dus', 'B', NULL, NULL),
(11, 'B005', 'Binder Clip 111', 'dus', 'B', NULL, NULL),
(12, 'B006', 'Binder Clip 200', 'dus', 'B', NULL, NULL),
(13, 'B007', 'Binder Clip 260', 'dus', 'B', NULL, NULL),
(14, 'B008', 'Blocknote 1/2 Folio', 'buku', 'B', NULL, NULL),
(15, 'B009', 'Buku Agenda Tipis', 'buah', 'B', NULL, NULL),
(16, 'B0010', 'Buku Ekspedisi', 'buah', 'B', NULL, NULL),
(17, 'B0011', 'Buku Folio Isi 200 Lembar', 'buah', 'B', NULL, NULL),
(18, 'B0012', 'Buku Folio Isi 300 Lembar', 'buah', 'B', NULL, NULL),
(19, 'B0013', 'Cutter Besar', 'buah', 'B', NULL, NULL),
(20, 'B0014', 'Cutter Kecil', 'buah', 'B', NULL, NULL),
(21, 'B0015', 'Double Tape Besar', 'roll', 'B', NULL, NULL),
(22, 'B0016', 'Double Tape Sedang', 'roll', 'B', NULL, NULL),
(23, 'B0017', 'File Boks', 'buah', 'B', NULL, NULL),
(24, 'B0018', 'Gelang Karet Merah', 'kg', 'B', NULL, NULL),
(25, 'B0019', 'Gunting Sedang', 'buah', 'B', NULL, NULL),
(26, 'B0020', 'Hecthmachine Besar', 'buah', 'B', NULL, NULL),
(27, 'B021', 'Hecthmachine Kecil', 'buah', 'B', NULL, NULL),
(28, 'B022', 'Hectneices Besar', 'dus', 'B', NULL, NULL),
(29, 'B023', 'Hectneices Kecil', 'dus', 'B', NULL, NULL),
(30, 'B024', 'Isi Ballpoint Pentel', 'buah', 'B', NULL, NULL),
(31, 'B025', 'Isi Staples Besar', 'pak', 'B', NULL, NULL),
(32, 'B026', 'Isi Staples Kecil', 'pak', 'B', NULL, NULL),
(33, 'B027', 'Kardus Arsip', 'buah', 'B', NULL, NULL),
(34, 'B028', 'Lem Cair Kecil', 'buah', 'B', NULL, NULL),
(35, 'B029', 'Lem Cair Tanggung', 'botol', 'B', NULL, NULL),
(36, 'B030', 'Lem Kental Besar', 'buah', 'B', NULL, NULL),
(37, 'B031', 'Lem Stick', 'buah', 'B', NULL, NULL),
(38, 'B032', 'Odner Folio', 'buah', 'B', NULL, NULL),
(39, 'B033', 'Paper Clips', 'dus', 'B', NULL, NULL),
(40, 'B034', 'Penggaris Besi 60 cm', 'buah', 'B', NULL, NULL),
(41, 'B035', 'Penghapus Karet Besar', 'buah', 'B', NULL, NULL),
(42, 'B036', 'Pensil 2B', 'buah', 'B', NULL, NULL),
(43, 'B037', 'Plakban Bening', 'buah', 'B', NULL, NULL),
(44, 'B038', 'Plakban Besir', 'buah', 'B', NULL, NULL),
(45, 'B039', 'Plakban Tanggung', 'buah', 'B', NULL, NULL),
(46, 'B040', 'Plastik Roll', 'roll', 'B', NULL, NULL),
(47, 'B041', 'Snelhecter Kertas', 'pak', 'B', NULL, NULL),
(48, 'B042', 'Snelhecter Plastik', 'pak', 'B', NULL, NULL),
(49, 'B043', 'Spidol Permanent Black', 'buah', 'B', NULL, NULL),
(50, 'B044', 'Spidol Whiteboard', 'buah', 'B', NULL, NULL),
(51, 'B045', 'Stabilo Besar', 'buah', 'B', NULL, NULL),
(52, 'B046', 'Stamp Pad', 'buah', 'B', NULL, NULL),
(53, 'B047', 'Stempel Tanggal', 'buah', 'B', NULL, NULL),
(54, 'B048', 'Stopmap Biasa', 'pak', 'B', NULL, NULL),
(55, 'B049', 'Stopmap Gantung', 'buah', 'B', NULL, NULL),
(56, 'B050', 'Stopmap Plastik', 'buah', 'B', NULL, NULL),
(57, 'B051', 'Tali Rafia Besar 1 kg', 'roll', 'B', NULL, NULL),
(58, 'B052', 'Trigonal Clip/Penjepit Kertas', 'pak', 'B', NULL, NULL),
(59, 'B053', 'Ziper Bag', 'buah', 'B', NULL, NULL),
(60, 'C001', 'Amplop Besar Kertas Kissing', 'pak', 'C', 68200, NULL),
(61, 'C002', 'Amplop No. 110', 'pak', 'C', NULL, NULL),
(62, 'C003', 'Amplop No. 90', 'pak', 'C', NULL, NULL),
(63, 'C004', 'Amplop Putih No. 104', 'pak', 'C', NULL, NULL),
(64, 'C005', 'Cover Kertas Buffalo', 'lembar', 'C', NULL, NULL),
(65, 'C006', 'Kertas Foto Hitam Putih 10 R', 'pak', 'C', NULL, NULL),
(66, 'C007', 'Kertas HVS A4 70 gr', 'rim', 'C', NULL, NULL),
(67, 'C008', 'Kertas HVS A4 80 gr', 'rim', 'C', 55000, NULL),
(68, 'C009', 'Kertas HVS F4 60 gr (warna)', 'rim', 'C', NULL, NULL),
(69, 'C010', 'Kertas HVS F4 70 gr', 'rim', 'C', 55000, NULL),
(70, 'C011', 'Kertas Payung', 'lembar', 'C', NULL, NULL),
(71, 'C012', 'Kertas Tomol (mesin antrian)', 'buah', 'C', NULL, NULL),
(72, 'C013', 'Post lt Besar', 'buah', 'C', NULL, NULL),
(73, 'C014', 'Post lt Kecil', 'buah', 'C', NULL, NULL),
(74, 'D001', 'Cartridge Black Toner 85A', 'buah', 'D', NULL, NULL),
(75, 'D002', 'Cleaning Kit', 'unit', 'D', 510000, NULL),
(76, 'D003', 'Film Printer', 'buah', 'D', 1875000, NULL),
(77, 'D004', 'Flashdisk 128 GB', 'buah', 'D', NULL, NULL),
(78, 'D005', 'Flashdisk 32 GB', 'buah', 'D', NULL, NULL),
(79, 'D006', 'Flashdisk 64 GB', 'buah', 'D', NULL, NULL),
(80, 'D007', 'Ribbon KTP-el', 'buah', 'D', 3540000, NULL),
(81, 'D008', 'Tinta Printer (Black)', 'botol', 'D', NULL, NULL),
(82, 'D009', 'Tinta Printer (Colour)', 'botol', 'D', NULL, NULL),
(83, 'D010', 'Tinta Stempel', 'botol', 'D', NULL, NULL),
(84, 'E001', 'Blanko KIA', 'keping', 'E', 471750, NULL),
(85, 'E002', 'Buku Register Pencetakan Akta Lahir (20)', 'buku', 'E', 115450, NULL),
(86, 'E003', 'Buku Register Pencetakan Akta Mati (20)', 'buku', 'E', 115450, NULL),
(87, 'E004', 'Buku Register Pencetakan KK (20)', 'buku', 'E', 115450, NULL),
(88, 'E005', 'Buku Register Pencetakan KTP-el (20)', 'buku', 'E', 115450, NULL),
(89, 'E006', 'Formulir F1.01 (Pelaporan Pendaftaran Kependudukan', 'rim', 'E', 139600, NULL),
(90, 'E007', 'Formulir F1.02 (Pendaftaran Peristiwa Kependudukan', 'rim', 'E', 88000, NULL),
(91, 'E008', 'Formulir F1.03 (Pendaftaran Perpindahan Penduduk)', 'rim', 'E', 88000, NULL),
(92, 'E009', 'Formulir F1.06 (Surat Pernyataan Perubahan Elemen ', 'rim', 'E', 88000, NULL),
(93, 'E010', 'Formulir F2.01 (Pelaporan Pencatatan Sipil)', 'rim', 'E', 88000, NULL),
(94, 'E011', 'Kuitansi/Bukti Pendaftaran', 'buku', 'E', 35520, NULL),
(95, 'E012', 'Sampul Berlambang Kertas Kissing (20)', 'pack', 'E', 47190, NULL),
(96, 'E013', 'SK Kadisdukcapil / TP Capil (20)', 'rim', 'E', 94490, NULL),
(97, 'F001', 'Cairan Pembersih Badan/Tangan', 'botol', 'F', NULL, NULL),
(98, 'F002', 'Cairang Pembersih Kaca', 'jeligen', 'F', NULL, NULL),
(99, 'F003', 'Ember Plastik Besar', 'buah', 'F', NULL, NULL),
(100, 'F004', 'Gelas Gagang Beling', 'dusin', 'F', NULL, NULL),
(101, 'F005', 'Kain Lap', 'buah', 'F', NULL, NULL),
(102, 'F006', 'Kapur Barus', 'buah', 'F', NULL, NULL),
(103, 'F007', 'Keset Bahan Karpet', 'buah', 'F', NULL, NULL),
(104, 'F008', 'Keset Bakmi Meteran', 'meter', 'F', NULL, NULL),
(105, 'F009', 'Lap Kaca', 'buah', 'F', NULL, NULL),
(106, 'F010', 'Pel Karet/Sorok Air', 'buah', 'F', NULL, NULL),
(107, 'F011', 'Pembersih Lantai', 'jeligen', 'F', NULL, NULL),
(108, 'F012', 'Pewangi Mobil', 'buah', 'F', NULL, NULL),
(109, 'F013', 'Pewangi Ruangan Spray', 'kaleng', 'F', NULL, NULL),
(110, 'F014', 'Sabun Cuci Piring', 'jeligen', 'F', NULL, NULL),
(111, 'F015', 'Sapu Cemara', 'buah', 'F', NULL, NULL),
(112, 'F016', 'Sapu Lidi', 'buah', 'F', NULL, NULL),
(113, 'F017', 'Sapu Lowolowo', 'buah', 'F', NULL, NULL),
(114, 'F018', 'Spon Biasa', 'buah', 'F', NULL, NULL),
(115, 'F019', 'Tisu Basah', 'buah', 'F', NULL, NULL),
(116, 'F020', 'Tisu Gulung', 'roll', 'F', NULL, NULL),
(117, 'F021', 'Tisu Kering', 'rim', 'F', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
('A', 'Alat Listrik'),
('B', 'ATK'),
('C', 'Kertas'),
('D', 'Bahan Komputer'),
('E', 'Barang Cetakan'),
('F', 'Alat Kebersihan dan Bahan Pembersih');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok_tahunan`
--

CREATE TABLE `tbl_stok_tahunan` (
  `id_stok` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL DEFAULT '0',
  `tahun` varchar(4) NOT NULL DEFAULT '0',
  `harga` float DEFAULT 0,
  `jumlah_stok` int(11) DEFAULT NULL,
  `jumlah_stok_terbaru` int(11) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_diperbarui` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stok_tahunan`
--

INSERT INTO `tbl_stok_tahunan` (`id_stok`, `kode_barang`, `tahun`, `harga`, `jumlah_stok`, `jumlah_stok_terbaru`, `tanggal_awal`, `tanggal_diperbarui`) VALUES
(1, 'A001', '2023', NULL, 0, 0, '2023-01-01', '2023-07-12'),
(2, 'A002', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(3, 'A003', '2023', NULL, 0, 0, '2023-01-01', '2023-07-12'),
(4, 'A004', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(5, 'A005', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(6, 'A006', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(7, 'B001', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(8, 'B002', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(9, 'B003', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(10, 'B004', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(11, 'B005', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(12, 'B006', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(13, 'B007', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(14, 'B008', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(15, 'B009', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(16, 'B0010', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(17, 'B0011', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(18, 'B0012', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(19, 'B0013', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(20, 'B0014', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(21, 'B0015', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(22, 'B0016', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(23, 'B0017', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(24, 'B0018', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(25, 'B0019', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(26, 'B0020', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(27, 'B021', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(28, 'B022', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(29, 'B023', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(30, 'B024', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(31, 'B025', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(32, 'B026', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(33, 'B027', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(34, 'B028', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(35, 'B029', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(36, 'B030', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(37, 'B031', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(38, 'B032', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(39, 'B033', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(40, 'B034', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(41, 'B035', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(42, 'B036', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(43, 'B037', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(44, 'B038', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(45, 'B039', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(46, 'B040', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(47, 'B041', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(48, 'B042', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(49, 'B043', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(50, 'B044', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(51, 'B045', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(52, 'B046', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(53, 'B047', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(54, 'B048', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(55, 'B049', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(56, 'B050', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(57, 'B051', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(58, 'B052', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(59, 'B053', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(60, 'C001', '2023', 68200, 85, 85, '2023-01-01', '2023-07-12'),
(61, 'C002', '2023', NULL, 0, 0, '2023-01-01', '2023-07-05'),
(62, 'C003', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(63, 'C004', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(64, 'C005', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(65, 'C006', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(66, 'C007', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(67, 'C008', '2023', 55000, 125, 125, '2023-01-01', '2023-01-01'),
(68, 'C009', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(69, 'C010', '2023', 55000, 338, 338, '2023-01-01', '2023-01-01'),
(70, 'C011', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(71, 'C012', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(72, 'C013', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(73, 'C014', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(74, 'D001', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(75, 'D002', '2023', 510000, 18, 18, '2023-01-01', '2023-01-01'),
(76, 'D003', '2023', 1875000, 85, 85, '2023-01-01', '2023-01-01'),
(77, 'D004', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(78, 'D005', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(79, 'D006', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(80, 'D007', '2023', 3540000, 167, 167, '2023-01-01', '2023-01-01'),
(81, 'D008', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(82, 'D009', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(83, 'D010', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(84, 'E001', '2023', 4717.5, 113750, 113750, '2023-01-01', '2023-01-01'),
(85, 'E002', '2023', 115450, 66, 66, '2023-01-01', '2023-01-01'),
(86, 'E003', '2023', 115450, 31, 31, '2023-01-01', '2023-01-01'),
(87, 'E004', '2023', 115450, 53, 53, '2023-01-01', '2023-01-01'),
(88, 'E005', '2023', 115450, 95, 95, '2023-01-01', '2023-01-01'),
(89, 'E006', '2023', 139600, 10, 10, '2023-01-01', '2023-01-01'),
(90, 'E007', '2023', 88000, 10, 10, '2023-01-01', '2023-01-01'),
(91, 'E008', '2023', 88000, 10, 10, '2023-01-01', '2023-01-01'),
(92, 'E009', '2023', 88000, 10, 10, '2023-01-01', '2023-01-01'),
(93, 'E010', '2023', 88000, 20, 20, '2023-01-01', '2023-01-01'),
(94, 'E011', '2023', 35520, 900, 900, '2023-01-01', '2023-01-01'),
(95, 'E012', '2023', 47190, 234, 234, '2023-01-01', '2023-01-01'),
(96, 'E013', '2023', 94490, 50, 50, '2023-01-01', '2023-01-01'),
(97, 'F001', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(98, 'F002', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(99, 'F003', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(100, 'F004', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(101, 'F005', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(102, 'F006', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(103, 'F007', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(104, 'F008', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(105, 'F009', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(106, 'F010', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(107, 'F011', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(108, 'F012', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(109, 'F013', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(110, 'F014', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(111, 'F015', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(112, 'F016', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(113, 'F017', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(114, 'F018', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(115, 'F019', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(116, 'F020', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01'),
(117, 'F021', '2023', NULL, 0, 0, '2023-01-01', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `keterangan` text NOT NULL COMMENT 'stok, pembelian, mutasi',
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `no_bukti` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 stok, 1 in, 2 out',
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role_id`, `is_active`) VALUES
(1, 'superadmin', '1e0d5d98e358f0fb84716b91dea68b24', 1, '1'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '1'),
(6, 'opr_yusuf', '202cb962ac59075b964b07152d234b70', 3, '0'),
(7, 'visitor_yusuf', '202cb962ac59075b964b07152d234b70', 4, '1'),
(8, 'admin_yusuf', '21232f297a57a5a743894a0e4a801fc3', 2, '1'),
(9, 'admin_adam', '202cb962ac59075b964b07152d234b70', 2, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_stok_tahunan`
--
ALTER TABLE `tbl_stok_tahunan`
  ADD PRIMARY KEY (`id_stok`) USING BTREE;

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_stok_tahunan`
--
ALTER TABLE `tbl_stok_tahunan`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
