-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 06:13 AM
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
-- Database: `sicaperdia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `nama_barang`, `satuan`, `kategori`) VALUES
(1, 'A001', 'Baterai AA ', 'set', 'A'),
(2, 'A002', 'Baterai AAA', 'set', 'A'),
(3, 'A003', 'Fiting : Flaon', 'buah', 'A'),
(4, 'A004', 'Kabel Roll 15 Meter', 'roll', 'A'),
(5, 'A005', 'Lampu 12 watt', 'unit', 'A'),
(6, 'A006', 'Stop Kontak 6 Lubang', 'buah', 'A'),
(7, 'B001', 'Ballpoint Balliner', 'pak', 'B'),
(8, 'B002', 'Ballpoint Biasa', 'pak', 'B'),
(9, 'B003', 'Ballpoint Gel', 'pak', 'B'),
(10, 'B004', 'Binder Clip 105', 'dus', 'B'),
(11, 'B005', 'Binder Clip 111', 'dus', 'B'),
(12, 'B006', 'Binder Clip 200', 'dus', 'B'),
(13, 'B007', 'Binder Clip 260', 'dus', 'B'),
(14, 'B008', 'Blocknote 1/2 Folio', 'buku', 'B'),
(15, 'B009', 'Buku Agenda Tipis', 'buah', 'B'),
(16, 'B0010', 'Buku Ekspedisi', 'buah', 'B'),
(17, 'B0011', 'Buku Folio Isi 200 Lembar', 'buah', 'B'),
(18, 'B0012', 'Buku Folio Isi 300 Lembar', 'buah', 'B'),
(19, 'B0013', 'Cutter Besar', 'buah', 'B'),
(20, 'B0014', 'Cutter Kecil', 'buah', 'B'),
(21, 'B0015', 'Double Tape Besar', 'roll', 'B'),
(22, 'B0016', 'Double Tape Sedang', 'roll', 'B'),
(23, 'B0017', 'File Boks', 'buah', 'B'),
(24, 'B0018', 'Gelang Karet Merah', 'kg', 'B'),
(25, 'B0019', 'Gunting Sedang', 'buah', 'B'),
(26, 'B0020', 'Hecthmachine Besar', 'buah', 'B'),
(27, 'B021', 'Hecthmachine Kecil', 'buah', 'B'),
(28, 'B022', 'Hectneices Besar', 'dus', 'B'),
(29, 'B023', 'Hectneices Kecil', 'dus', 'B'),
(30, 'B024', 'Isi Ballpoint Pentel', 'buah', 'B'),
(31, 'B025', 'Isi Staples Besar', 'pak', 'B'),
(32, 'B026', 'Isi Staples Kecil', 'pak', 'B'),
(33, 'B027', 'Kardus Arsip', 'buah', 'B'),
(34, 'B028', 'Lem Cair Kecil', 'buah', 'B'),
(35, 'B029', 'Lem Cair Tanggung', 'botol', 'B'),
(36, 'B030', 'Lem Kental Besar', 'buah', 'B'),
(37, 'B031', 'Lem Stick', 'buah', 'B'),
(38, 'B032', 'Odner Folio', 'buah', 'B'),
(39, 'B033', 'Paper Clips', 'dus', 'B'),
(40, 'B034', 'Penggaris Besi 60 cm', 'buah', 'B'),
(41, 'B035', 'Penghapus Karet Besar', 'buah', 'B'),
(42, 'B036', 'Pensil 2B', 'buah', 'B'),
(43, 'B037', 'Plakban Bening', 'buah', 'B'),
(44, 'B038', 'Plakban Besir', 'buah', 'B'),
(45, 'B039', 'Plakban Tanggung', 'buah', 'B'),
(46, 'B040', 'Plastik Roll', 'roll', 'B'),
(47, 'B041', 'Snelhecter Kertas', 'pak', 'B'),
(48, 'B042', 'Snelhecter Plastik', 'pak', 'B'),
(49, 'B043', 'Spidol Permanent Black', 'buah', 'B'),
(50, 'B044', 'Spidol Whiteboard', 'buah', 'B'),
(51, 'B045', 'Stabilo Besar', 'buah', 'B'),
(52, 'B046', 'Stamp Pad', 'buah', 'B'),
(53, 'B047', 'Stempel Tanggal', 'buah', 'B'),
(54, 'B048', 'Stopmap Biasa', 'pak', 'B'),
(55, 'B049', 'Stopmap Gantung', 'buah', 'B'),
(56, 'B050', 'Stopmap Plastik', 'buah', 'B'),
(57, 'B051', 'Tali Rafia Besar 1 kg', 'roll', 'B'),
(58, 'B052', 'Trigonal Clip/Penjepit Kertas', 'pak', 'B'),
(59, 'B053', 'Ziper Bag', 'buah', 'B'),
(60, 'C001', 'Amplop Besar Kertas Kissing', 'pak', 'C'),
(61, 'C002', 'Amplop No. 110', 'pak', 'C'),
(62, 'C003', 'Amplop No. 90', 'pak', 'C'),
(63, 'C004', 'Amplop Putih No. 104', 'pak', 'C'),
(64, 'C005', 'Cover Kertas Buffalo', 'lembar', 'C'),
(65, 'C006', 'Kertas Foto Hitam Putih 10 R', 'pak', 'C'),
(66, 'C007', 'Kertas HVS A4 70 gr', 'rim', 'C'),
(67, 'C008', 'Kertas HVS A4 80 gr', 'rim', 'C'),
(68, 'C009', 'Kertas HVS F4 60 gr (warna)', 'rim', 'C'),
(69, 'C010', 'Kertas HVS F4 70 gr', 'rim', 'C'),
(70, 'C011', 'Kertas Payung', 'lembar', 'C'),
(71, 'C012', 'Kertas Tomol (mesin antrian)', 'buah', 'C'),
(72, 'C013', 'Post lt Besar', 'buah', 'C'),
(73, 'C014', 'Post lt Kecil', 'buah', 'C'),
(74, 'D001', 'Cartridge Black Toner 85A', 'buah', 'D'),
(75, 'D002', 'Cleaning Kit', 'unit', 'D'),
(76, 'D003', 'Film Printer', 'buah', 'D'),
(77, 'D004', 'Flashdisk 128 GB', 'buah', 'D'),
(78, 'D005', 'Flashdisk 32 GB', 'buah', 'D'),
(79, 'D006', 'Flashdisk 64 GB', 'buah', 'D'),
(80, 'D007', 'Ribbon KTP-el', 'buah', 'D'),
(81, 'D008', 'Tinta Printer (Black)', 'botol', 'D'),
(82, 'D009', 'Tinta Printer (Colour)', 'botol', 'D'),
(83, 'D010', 'Tinta Stempel', 'botol', 'D'),
(84, 'E001', 'Blanko KIA', 'keping', 'E'),
(85, 'E002', 'Buku Register Pencetakan Akta Lahir (20)', 'buku', 'E'),
(86, 'E003', 'Buku Register Pencetakan Akta Mati (20)', 'buku', 'E'),
(87, 'E004', 'Buku Register Pencetakan KK (20)', 'buku', 'E'),
(88, 'E005', 'Buku Register Pencetakan KTP-el (20)', 'buku', 'E'),
(89, 'E006', 'Formulir F1.01 (Pelaporan Pendaftaran Kependudukan', 'rim', 'E'),
(90, 'E007', 'Formulir F1.02 (Pendaftaran Peristiwa Kependudukan', 'rim', 'E'),
(91, 'E008', 'Formulir F1.03 (Pendaftaran Perpindahan Penduduk)', 'rim', 'E'),
(92, 'E009', 'Formulir F1.06 (Surat Pernyataan Perubahan Elemen ', 'rim', 'E'),
(93, 'E010', 'Formulir F2.01 (Pelaporan Pencatatan Sipil)', 'rim', 'E'),
(94, 'E011', 'Kuitansi/Bukti Pendaftaran', 'buku', 'E'),
(95, 'E012', 'Sampul Berlambang Kertas Kissing (20)', 'pack', 'E'),
(96, 'E013', 'SK Kadisdukcapil / TP Capil (20)', 'rim', 'E'),
(97, 'F001', 'Cairan Pembersih Badan/Tangan', 'botol', 'F'),
(98, 'F002', 'Cairang Pembersih Kaca', 'jeligen', 'F'),
(99, 'F003', 'Ember Plastik Besar', 'buah', 'F'),
(100, 'F004', 'Gelas Gagang Beling', 'dusin', 'F'),
(101, 'F005', 'Kain Lap', 'buah', 'F'),
(102, 'F006', 'Kapur Barus', 'buah', 'F'),
(103, 'F007', 'Keset Bahan Karpet', 'buah', 'F'),
(104, 'F008', 'Keset Bakmi Meteran', 'meter', 'F'),
(105, 'F009', 'Lap Kaca', 'buah', 'F'),
(106, 'F010', 'Pel Karet/Sorok Air', 'buah', 'F'),
(107, 'F011', 'Pembersih Lantai', 'jeligen', 'F'),
(108, 'F012', 'Pewangi Mobil', 'buah', 'F'),
(109, 'F013', 'Pewangi Ruangan Spray', 'kaleng', 'F'),
(110, 'F014', 'Sabun Cuci Piring', 'jeligen', 'F'),
(111, 'F015', 'Sapu Cemara', 'buah', 'F'),
(112, 'F016', 'Sapu Lidi', 'buah', 'F'),
(113, 'F017', 'Sapu Lowolowo', 'buah', 'F'),
(114, 'F018', 'Spon Biasa', 'buah', 'F'),
(115, 'F019', 'Tisu Basah', 'buah', 'F'),
(116, 'F020', 'Tisu Gulung', 'roll', 'F'),
(117, 'F021', 'Tisu Kering', 'rim', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

CREATE TABLE `tbl_harga` (
  `id_harga` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `tgl_diperbarui` date DEFAULT NULL,
  `harga` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_harga`
--

INSERT INTO `tbl_harga` (`id_harga`, `kode_barang`, `tgl_diperbarui`, `harga`) VALUES
(1, 'A001', NULL, NULL),
(2, 'A002', NULL, NULL),
(3, 'A003', NULL, NULL),
(4, 'A004', NULL, NULL),
(5, 'A005', NULL, NULL),
(6, 'A006', NULL, NULL),
(7, 'B001', NULL, NULL),
(8, 'B002', NULL, NULL),
(9, 'B003', NULL, NULL),
(10, 'B004', NULL, NULL),
(11, 'B005', NULL, NULL),
(12, 'B006', NULL, NULL),
(13, 'B007', NULL, NULL),
(14, 'B008', NULL, NULL),
(15, 'B009', NULL, NULL),
(16, 'B010', NULL, NULL),
(17, 'B011', NULL, NULL),
(18, 'B012', NULL, NULL),
(19, 'B013', NULL, NULL),
(20, 'B014', NULL, NULL),
(21, 'B015', NULL, NULL),
(22, 'B016', NULL, NULL),
(23, 'B017', NULL, NULL),
(24, 'B018', NULL, NULL),
(25, 'B019', NULL, NULL),
(26, 'B020', NULL, NULL),
(27, 'B021', NULL, NULL),
(28, 'B022', NULL, NULL),
(29, 'B023', NULL, NULL),
(30, 'B024', NULL, NULL),
(31, 'B025', NULL, NULL),
(32, 'B026', NULL, NULL),
(33, 'B027', NULL, NULL),
(34, 'B028', NULL, NULL),
(35, 'B029', NULL, NULL),
(36, 'B030', NULL, NULL),
(37, 'B031', NULL, NULL),
(38, 'B032', NULL, NULL),
(39, 'B033', NULL, NULL),
(40, 'B034', NULL, NULL),
(41, 'B035', NULL, NULL),
(42, 'B036', NULL, NULL),
(43, 'B037', NULL, NULL),
(44, 'B038', NULL, NULL),
(45, 'B039', NULL, NULL),
(46, 'B040', NULL, NULL),
(47, 'B041', NULL, NULL),
(48, 'B042', NULL, NULL),
(49, 'B043', NULL, NULL),
(50, 'B044', NULL, NULL),
(51, 'B045', NULL, NULL),
(52, 'B046', NULL, NULL),
(53, 'B047', NULL, NULL),
(54, 'B048', NULL, NULL),
(55, 'B049', NULL, NULL),
(56, 'B050', NULL, NULL),
(57, 'B051', NULL, NULL),
(58, 'B052', NULL, NULL),
(59, 'B053', NULL, NULL),
(60, 'C001', NULL, NULL),
(61, 'C002', NULL, NULL),
(62, 'C003', NULL, NULL),
(63, 'C004', NULL, NULL),
(64, 'C005', NULL, NULL),
(65, 'C006', NULL, NULL),
(66, 'C007', NULL, NULL),
(67, 'C008', NULL, NULL),
(68, 'C009', NULL, NULL),
(69, 'C010', NULL, NULL),
(70, 'C011', NULL, NULL),
(71, 'C012', NULL, NULL),
(72, 'C013', NULL, NULL),
(73, 'C014', NULL, NULL),
(74, 'D001', NULL, NULL),
(75, 'D002', NULL, NULL),
(76, 'D003', NULL, NULL),
(77, 'D004', NULL, NULL),
(78, 'D005', NULL, NULL),
(79, 'D006', NULL, NULL),
(80, 'D007', NULL, NULL),
(81, 'D008', NULL, NULL),
(82, 'D009', NULL, NULL),
(83, 'D010', NULL, NULL),
(84, 'E001', NULL, NULL),
(85, 'E002', NULL, NULL),
(86, 'E003', NULL, NULL),
(87, 'E004', NULL, NULL),
(88, 'E005', NULL, NULL),
(89, 'E006', NULL, NULL),
(90, 'E007', NULL, NULL),
(91, 'E008', NULL, NULL),
(92, 'E009', NULL, NULL),
(93, 'E010', NULL, NULL),
(94, 'E011', NULL, NULL),
(95, 'E012', NULL, NULL),
(96, 'E013', NULL, NULL),
(97, 'F001', NULL, NULL),
(98, 'F002', NULL, NULL),
(99, 'F003', NULL, NULL),
(100, 'F004', NULL, NULL),
(101, 'F005', NULL, NULL),
(102, 'F006', NULL, NULL),
(103, 'F007', NULL, NULL),
(104, 'F008', NULL, NULL),
(105, 'F009', NULL, NULL),
(106, 'F010', NULL, NULL),
(107, 'F011', NULL, NULL),
(108, 'F012', NULL, NULL),
(109, 'F013', NULL, NULL),
(110, 'F014', NULL, NULL),
(111, 'F015', NULL, NULL),
(112, 'F016', NULL, NULL),
(113, 'F017', NULL, NULL),
(114, 'F018', NULL, NULL),
(115, 'F019', NULL, NULL),
(116, 'F020', NULL, NULL),
(117, 'F021', NULL, NULL);

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
  `harga` int(11) NOT NULL DEFAULT 0,
  `tanggal_diperbarui` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`id_harga`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_stok_tahunan`
--
ALTER TABLE `tbl_stok_tahunan`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
