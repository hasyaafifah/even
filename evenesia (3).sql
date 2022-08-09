-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 07:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evenesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookinggedung`
--

CREATE TABLE `tb_bookinggedung` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `keperluan` varchar(256) NOT NULL,
  `nama_pemesan` varchar(256) NOT NULL,
  `harga` varchar(256) NOT NULL,
  `tanggal` varchar(256) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bookinggedung`
--

INSERT INTO `tb_bookinggedung` (`id`, `nama`, `email`, `no_hp`, `keperluan`, `nama_pemesan`, `harga`, `tanggal`, `gambar`) VALUES
(1, '', 'tes', '21', 'dda', 'tes', '131', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookingmua`
--

CREATE TABLE `tb_bookingmua` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `jumlah_pax` varchar(256) NOT NULL,
  `timestamp` date NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `nama_pemesan` varchar(256) NOT NULL,
  `jam` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bookingmua`
--

INSERT INTO `tb_bookingmua` (`id`, `nama`, `harga`, `status`, `jumlah_pax`, `timestamp`, `alamat`, `nama_pemesan`, `jam`, `no_hp`, `gambar`) VALUES
(1, 'mua apa', '90000', '', '20', '2022-08-31', 'jl. Teratai III', 'hasya afifah', '20:10', '089765456', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(256) NOT NULL,
  `jumlah` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id`, `cabang`, `jumlah`) VALUES
(1, 'Pusat', '100'),
(2, 'Tanjung Priok', '56'),
(3, 'Teluk Bayur', '17'),
(4, 'Palembang', '34'),
(5, 'Jambi', '6'),
(6, 'Panjang', '27'),
(7, 'Bengkulu', '25'),
(8, 'Pangkal Balam', '14'),
(9, 'Pontianak', '9'),
(10, 'Banten', '37'),
(11, 'Cirebon', '22'),
(12, 'Sunda Kelapa', '16'),
(14, 'Pusat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ebook`
--

CREATE TABLE `tb_ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ebook`
--

INSERT INTO `tb_ebook` (`id`, `judul`, `tahun`, `kategori`, `file`) VALUES
(1, 'Potter', '2021', 'Fiksi', 'cover_seminar1.pdf'),
(2, 'Harry Potter', '2023', 'regulasi', 'Bukti_Tarif.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `judul`, `gambar`, `deskripsi`, `link`) VALUES
(1, 'halo guys', '', 'apa lo', 'https://dw-wp.com/'),
(2, 'sw', '99592a49617748c9c954576c54ae0f32.jpg', 'fefe', 'https://dw-wp.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `alamat_gedung` varchar(255) NOT NULL,
  `luas_gedung` varchar(255) NOT NULL,
  `tipe_vanue` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `harga_gedung` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `keterangan`, `status`) VALUES
(1, 'Anita', 'halo', 'Proses'),
(2, 'Axel reyhan', 'Saya minta surat terbaru yang terakhir desember ini', 'Non Prioritas'),
(3, 'Risna', 'asssaa', 'Non Prioritas'),
(27, 'Axel reyhan', 'tess', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mua`
--

CREATE TABLE `tb_mua` (
  `id` int(11) NOT NULL,
  `nama_mua` varchar(255) NOT NULL,
  `alamat_mua` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mua`
--

INSERT INTO `tb_mua` (`id`, `nama_mua`, `alamat_mua`, `harga`, `instagram`, `whatsapp`, `gambar`, `deskripsi`) VALUES
(1, 'ER', 'DA', 'FRE', 'DFS', '098888', '', ''),
(2, 'eysdha', 'dnajkdnkjsa', '90000', 'hasya', '089657228199', '', ''),
(3, 'mjkl', 'kl,;lkko', '800000', 'hujjkj', '09877899', 'Hasya_Afifah_Khoirunnisa_20220725-20220805.xlsx', 'b  njjnjkn'),
(4, 'jnkjnkl', 'kk;lp', '900000', 'jmkl', '00000000', 'proposal_dapuq.docx', ''),
(5, 'hasya', 'afifah', '900000', 'jmkl', '00000000', 'proposal_dapuq1.docx', ''),
(6, 'frf', 'rfrf', '454', 'vgv', '555', '8fa74d2017b647e819a2d0548b325775.jpg', 'cfc'),
(7, 'frf', 'rfrf', '454', 'vgv', '555', '12cd2501283428c6389968f4fc23696d.jpg', 'cfc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `username`, `password`, `no_hp`, `alamat`) VALUES
(1, 'tes', 'tes', 'tes', '123', 'tes'),
(2, 'tes', 'tes', 'tes', '123', 'tes'),
(3, 'test', 'test', 'tes', '123', 'test'),
(4, 'test', 'test', 'tes', '123', 'test'),
(5, 'test', 'testt', 'testt', '123', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_promo`
--

INSERT INTO `tb_promo` (`id`, `gambar`) VALUES
(1, '5230e8ca190bf6481e219081aef742bf.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_regulasi`
--

CREATE TABLE `tb_regulasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kering` int(128) NOT NULL,
  `cair` int(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_regulasi`
--

INSERT INTO `tb_regulasi` (`id`, `nama`, `kering`, `cair`, `keterangan`) VALUES
(1, 'Kontainer', 2500000, 1500000, '(Kering: Rp.2.500.000/kontainer)(Cair: Rp.1.500.000/kontainer)'),
(2, 'Ukuran', 5000000, 4000000, '(Kering: Rp.5.000.000/Ton)(Cair: Rp.4.000.000/Ton)'),
(5, 'penginapan', 5000000, 4000000, '(Kering: Rp.5.000.000/Malam)(Cair: Rp.4.000.000/malam)'),
(6, 'gas', 5000000, 4000000, '(Kering: Rp.5.000.000/Malam)(Cair: Rp.4.000.000/malam)  ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id` int(11) NOT NULL,
  `jenis` varchar(256) NOT NULL,
  `timestamp` date NOT NULL,
  `value` varchar(256) NOT NULL,
  `aktivitas` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id`, `jenis`, `timestamp`, `value`, `aktivitas`, `id_user`) VALUES
(1, 'kering', '2022-07-17', '7506000', '[{\"nama\":\"Kontainer\",\"value\":\"1\"},{\"nama\":\"Ukuran\",\"value\":\"1\"}]', 2),
(2, 'cair', '2022-07-17', '11006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"}]', 2),
(3, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(4, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(5, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(6, 'kering', '2022-07-17', '0', '[{\"nama\":\"Kontainer\",\"value\":\"\"},{\"nama\":\"Ukuran\",\"value\":\"\"}]', 2),
(7, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(8, 'kering', '2022-07-17', '0', '[{\"nama\":\"Kontainer\",\"value\":\"\"},{\"nama\":\"Ukuran\",\"value\":\"\"}]', 2),
(9, 'kering', '2022-07-17', '0', '[{\"nama\":\"Kontainer\",\"value\":\"\"},{\"nama\":\"Ukuran\",\"value\":\"\"}]', 2),
(10, 'kering', '2022-07-17', '7506000', '[{\"nama\":\"Kontainer\",\"value\":\"1\"},{\"nama\":\"Ukuran\",\"value\":\"1\"}]', 2),
(11, 'kering', '2022-07-17', '0', '[{\"nama\":\"Kontainer\",\"value\":\"\"},{\"nama\":\"Ukuran\",\"value\":\"\"}]', 2),
(12, 'kering', '2022-07-19', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(13, 'kering', '2022-07-19', '30006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"},{\"nama\":\"penginapan\",\"value\":\"2\"}]', 2),
(14, 'kering', '2022-07-20', '135006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"22\"},{\"nama\":\"gas\",\"value\":\"2\"}]', 2),
(15, 'kering', '2022-07-20', '50006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"3\"},{\"nama\":\"gas\",\"value\":\"4\"}]', 2),
(16, 'kering', '2022-07-20', '110006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"5\"},{\"nama\":\"penginapan\",\"value\":\"2\"},{\"nama\":\"gas\",\"value\":\"14\"}]', 12),
(17, 'cair', '2022-07-21', '23006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"2\"},{\"nama\":\"gas\",\"value\":\"1\"}]', 2),
(18, 'kering', '2022-07-21', '35006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"2\"},{\"nama\":\"gas\",\"value\":\"2\"}]', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'mua'),
(3, 'gedung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuspegawai`
--

CREATE TABLE `tb_statuspegawai` (
  `id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL,
  `total` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_statuspegawai`
--

INSERT INTO `tb_statuspegawai` (`id`, `status`, `total`) VALUES
(1, 'Organik Pelindo', '28'),
(2, 'Organik PTP', '4'),
(3, 'TNO', '53'),
(4, 'PKWT', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `link_ig` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `portofolio` varchar(256) NOT NULL,
  `followers` varchar(256) NOT NULL,
  `jumlah_followers` varchar(256) NOT NULL,
  `jk` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama`, `password`, `avatar`, `link_ig`, `alamat`, `no_hp`, `portofolio`, `followers`, `jumlah_followers`, `jk`, `email`, `id_role`) VALUES
(1, 'admin', 'Admin', '202cb962ac59075b964b07152d234b70', '929007b2ccc69b629cd777113ad2f378.JPG', '', '', '', '', '', '', '', '', 1),
(2, 'axelreyhan', 'Axel reyhan', '202cb962ac59075b964b07152d234b70', '929007b2ccc69b629cd777113ad2f378.JPG', '', '', '', '', '', '', '', '', 2),
(10, 'anita', 'Anita', '202cb962ac59075b964b07152d234b70', 'bad803bc46054b2ff20d9336139c29d4.jpg', '', '', '', '', '', '', '', '', 2),
(11, '12345678', 'axelll', '25d55ad283aa400af464c76d713c07ad', 'avatar.png', '', '', '', '', '', '', '', '', 2),
(12, 'risna', 'Risna', '202cb962ac59075b964b07152d234b70', 'avatar.png', '', '', '', '', '', '', '', '', 2),
(22, '123456789', 'hfhfh', '202cb962ac59075b964b07152d234b70', 'avatar.png', '', '', '', '', '', '', '', '', 1),
(23, 'tes', 'tes', '202cb962ac59075b964b07152d234b70', 'tes', '', '', '', '', '', '', '', '', 2),
(26, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '', '', '', '', '', '', '', 'admin@gmail.com', 1),
(28, 'hasya@gmail.com', 'hasya', '8d8011558583bc5e6809542e4bbb348b', 'a57263957bcdb1e8649eb2d9a290ced9.jpg', '', '', '', '', '', '', '', 'hasya@gmail.com', 3),
(29, 'kuru', 'kuru', 'c1b345b86626529c1d7e424739ee0c57', 'avatar.png', '', '', '', '', '', '', '', 'kuru@gmail.com', 3),
(30, 'dapuq@gmail.com', 'dapuq', '6138adf0c13f9f7514a7c2a6b3a86170', 'avatar.png', '', '', '', '', '', '', '', 'dapuq@gmail.com', 2),
(31, 'tes', 'ddvv', '084fe8aecafea8b2f84cca493377eb9b', 'avatar.png', 'tes', 'mua', '4343', '', '', '', 'cdd', 'cdd', 3),
(32, 'aku', 'perempuan', '89ccfac87d8d06db06bf3211cb2d69ed', 'avatar.png', 'aku', 'mua', '454', '', '', '', 'aku_aku', 'jl. aku', 3),
(33, 'kampret', 'kampret', 'b6ecbac45c48a94105a88bf44a9eaf46', 'gedung', '', 'kampret', 'kampret', '', '', '', '09876545678', 'P', 3),
(34, 'bayu', 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', 'avatar.png', 'bayu_bayu', 'jl.Bayu', '09876545678', '', '', '', 'L', 'bayu@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bookinggedung`
--
ALTER TABLE `tb_bookinggedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mua`
--
ALTER TABLE `tb_mua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_regulasi`
--
ALTER TABLE `tb_regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_statuspegawai`
--
ALTER TABLE `tb_statuspegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bookinggedung`
--
ALTER TABLE `tb_bookinggedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_mua`
--
ALTER TABLE `tb_mua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_regulasi`
--
ALTER TABLE `tb_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_statuspegawai`
--
ALTER TABLE `tb_statuspegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
