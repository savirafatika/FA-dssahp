-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 07:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'spkasdos@gmail.com', 'Admin SPK AHP');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_a` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ntm` varchar(24) NOT NULL,
  `ntw` varchar(24) NOT NULL,
  `nta` varchar(24) NOT NULL,
  `total` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jml`
--

CREATE TABLE `jml` (
  `id_j` varchar(10) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jml`
--

INSERT INTO `jml` (`id_j`, `jumlah`, `tipe`) VALUES
('tm', '1.5', 'kriteria'),
('tw', '4.3', 'kriteria'),
('ta', '9', 'kriteria'),
('kp', '0', 'tm'),
('kr', '0', 'tm'),
('tdk', '0', 'tm'),
('baik', '1.33', 'tw'),
('ckp', '6.33', 'tw'),
('krg', '11', 'tw'),
('ti', '1.33', 'ta'),
('se', '6.33', 'ta'),
('re', '11', 'ta');

-- --------------------------------------------------------

--
-- Table structure for table `kepentingan`
--

CREATE TABLE `kepentingan` (
  `id_k` int(11) NOT NULL,
  `intensitas` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepentingan`
--

INSERT INTO `kepentingan` (`id_k`, `intensitas`, `keterangan`) VALUES
(1, '1', 'Kedua Elemen sama pentingnya'),
(2, '2', 'Nilai - nilai antara 2 nilai pertimbangan yang berdekatan'),
(3, '3', 'Elemen yang satu sedikit lebih penting dari elemen yang lainnya '),
(4, '4', 'Nilai - nilai antara 2 nilai pertimbangan yang berdekatan'),
(5, '5', 'Elemen yang satu lebih penting dari elemen yang lainnya '),
(6, '6', 'Nilai - nilai antara 2 nilai pertimbangan yang berdekatan'),
(7, '7', 'Satu elemen jelas lebih mutlak penting daripada elemen lainnya'),
(8, '8', 'Nilai - nilai antara 2 nilai pertimbangan yang berdekatan'),
(9, '9', 'Satu elemen mutlak penting daripada elemen lainnya'),
(10, '0.5', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(11, '0.33', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(12, '0.25', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(13, '0.2', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(14, '0.16', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(15, '0.14', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(16, '0.125', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i'),
(17, '0.111', 'Jika untuk aktivitas i mendapat 1 angka dibanding dengan aktivitas j, maka j mempunyai nilai kebalikannya dibanding dengan i');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `nilai`) VALUES
(1, 'Tes Microteaching', 'Kompeten'),
(2, 'Tes Microteaching', 'Kurang Kompeten'),
(3, 'Tes Microteaching', 'Tidak Kompeten'),
(4, 'Tes Wawancara', 'Baik'),
(5, 'Tes Wawancara', 'Cukup'),
(6, 'Tes Wawancara', 'Kurang'),
(7, 'Tes Akademik', 'Tinggi'),
(8, 'Tes Akademik', 'Sedang'),
(9, 'Tes Akademik', 'Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `pb_kriteria`
--

CREATE TABLE `pb_kriteria` (
  `id_pbk` int(11) NOT NULL,
  `tm` varchar(4) NOT NULL,
  `tw` varchar(4) NOT NULL,
  `ta` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_kriteria`
--

INSERT INTO `pb_kriteria` (`id_pbk`, `tm`, `tw`, `ta`) VALUES
(1, '0', '0', '0'),
(2, '0', '0', '0'),
(3, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pb_ta`
--

CREATE TABLE `pb_ta` (
  `id_pbta` int(11) NOT NULL,
  `tinggi` varchar(4) NOT NULL,
  `sedang` varchar(4) NOT NULL,
  `rendah` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_ta`
--

INSERT INTO `pb_ta` (`id_pbta`, `tinggi`, `sedang`, `rendah`) VALUES
(1, '0', '0', '0'),
(2, '0', '0', '0'),
(3, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pb_tm`
--

CREATE TABLE `pb_tm` (
  `id_pbtm` int(11) NOT NULL,
  `kompeten` varchar(4) NOT NULL,
  `kurang` varchar(4) NOT NULL,
  `tidak` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_tm`
--

INSERT INTO `pb_tm` (`id_pbtm`, `kompeten`, `kurang`, `tidak`) VALUES
(1, '0', '0', '0'),
(2, '0', '0', '0'),
(3, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pb_tw`
--

CREATE TABLE `pb_tw` (
  `id_pbtw` int(11) NOT NULL,
  `baik` varchar(4) NOT NULL,
  `cukup` varchar(4) NOT NULL,
  `kurang` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_tw`
--

INSERT INTO `pb_tw` (`id_pbtw`, `baik`, `cukup`, `kurang`) VALUES
(1, '0', '0', '0'),
(2, '0', '0', '0'),
(3, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `s_kr`
--

CREATE TABLE `s_kr` (
  `id_s` int(11) NOT NULL,
  `tm` varchar(4) NOT NULL,
  `tw` varchar(4) NOT NULL,
  `ta` varchar(4) NOT NULL,
  `j` varchar(4) NOT NULL,
  `p` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_kr`
--

INSERT INTO `s_kr` (`id_s`, `tm`, `tw`, `ta`, `j`, `p`) VALUES
(1, '0.67', '0.7', '0.56', '1.93', '0.64'),
(2, '0.2', '0.23', '0.33', '0.76', '0.25'),
(3, '0.13', '0.07', '0.11', '0.31', '0.1');

-- --------------------------------------------------------

--
-- Table structure for table `s_ta`
--

CREATE TABLE `s_ta` (
  `id_sta` int(11) NOT NULL,
  `ti` varchar(4) NOT NULL,
  `se` varchar(4) NOT NULL,
  `re` varchar(4) NOT NULL,
  `j` varchar(4) NOT NULL,
  `p` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_ta`
--

INSERT INTO `s_ta` (`id_sta`, `ti`, `se`, `re`, `j`, `p`) VALUES
(1, '0.75', '0.79', '0.64', '2.18', '0.73'),
(2, '0.15', '0.16', '0.27', '0.58', '0.19'),
(3, '0.1', '0.05', '0.09', '0.24', '0.08');

-- --------------------------------------------------------

--
-- Table structure for table `s_tm`
--

CREATE TABLE `s_tm` (
  `id_stm` int(11) NOT NULL,
  `kp` varchar(4) NOT NULL,
  `kr` varchar(4) NOT NULL,
  `tdk` varchar(4) NOT NULL,
  `j` varchar(4) NOT NULL,
  `p` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_tm`
--

INSERT INTO `s_tm` (`id_stm`, `kp`, `kr`, `tdk`, `j`, `p`) VALUES
(1, '0', '0', '0', '0', '0'),
(2, '0', '0', '0', '0', '0'),
(3, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN');

-- --------------------------------------------------------

--
-- Table structure for table `s_tw`
--

CREATE TABLE `s_tw` (
  `id_stw` int(11) NOT NULL,
  `b` varchar(4) NOT NULL,
  `c` varchar(4) NOT NULL,
  `k` varchar(4) NOT NULL,
  `j` varchar(4) NOT NULL,
  `p` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_tw`
--

INSERT INTO `s_tw` (`id_stw`, `b`, `c`, `k`, `j`, `p`) VALUES
(1, '0.75', '0.79', '0.64', '2.18', '0.73'),
(2, '0.15', '0.16', '0.27', '0.58', '0.19'),
(3, '0.1', '0.05', '0.09', '0.24', '0.08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `kepentingan`
--
ALTER TABLE `kepentingan`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pb_kriteria`
--
ALTER TABLE `pb_kriteria`
  ADD PRIMARY KEY (`id_pbk`);

--
-- Indexes for table `pb_ta`
--
ALTER TABLE `pb_ta`
  ADD PRIMARY KEY (`id_pbta`);

--
-- Indexes for table `pb_tm`
--
ALTER TABLE `pb_tm`
  ADD PRIMARY KEY (`id_pbtm`);

--
-- Indexes for table `pb_tw`
--
ALTER TABLE `pb_tw`
  ADD PRIMARY KEY (`id_pbtw`);

--
-- Indexes for table `s_kr`
--
ALTER TABLE `s_kr`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `s_ta`
--
ALTER TABLE `s_ta`
  ADD PRIMARY KEY (`id_sta`);

--
-- Indexes for table `s_tm`
--
ALTER TABLE `s_tm`
  ADD PRIMARY KEY (`id_stm`);

--
-- Indexes for table `s_tw`
--
ALTER TABLE `s_tw`
  ADD PRIMARY KEY (`id_stw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepentingan`
--
ALTER TABLE `kepentingan`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pb_kriteria`
--
ALTER TABLE `pb_kriteria`
  MODIFY `id_pbk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pb_ta`
--
ALTER TABLE `pb_ta`
  MODIFY `id_pbta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pb_tm`
--
ALTER TABLE `pb_tm`
  MODIFY `id_pbtm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pb_tw`
--
ALTER TABLE `pb_tw`
  MODIFY `id_pbtw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_kr`
--
ALTER TABLE `s_kr`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_ta`
--
ALTER TABLE `s_ta`
  MODIFY `id_sta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_tm`
--
ALTER TABLE `s_tm`
  MODIFY `id_stm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_tw`
--
ALTER TABLE `s_tw`
  MODIFY `id_stw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
