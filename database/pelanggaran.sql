-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2021 at 07:16 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `kd_data_kelas` varchar(35) NOT NULL,
  `kd_kelas` varchar(35) NOT NULL,
  `kd_tahun` varchar(35) NOT NULL,
  `nis` varchar(35) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`kd_data_kelas`, `kd_kelas`, `kd_tahun`, `nis`, `keterangan`) VALUES
('KLSRPL12021001', 'RPL12020', '2020', '2021001', '-'),
('KLSRPL12021002', 'RPL12020', '2020', '2021002', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `id_jenis_pelanggaran` int NOT NULL,
  `nama_jenis_pelanggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`id_jenis_pelanggaran`, `nama_jenis_pelanggaran`) VALUES
(1, 'Ketertiban'),
(2, 'Rokok'),
(3, 'Buku, Majalan, atau Kaset Terlarang'),
(4, 'Senjata'),
(5, 'Obat / Minuman Terlarang'),
(6, 'Perkelahian'),
(7, 'Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan'),
(8, 'Keterlambatan'),
(9, 'Kehadiran'),
(10, 'Pakaian'),
(11, 'Badan');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `nama_jurusan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Animasi'),
(3, 'Bisnis Daring dan Pemasaran'),
(4, 'Desain Komunikasi Visual'),
(5, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelanggaran`
--

CREATE TABLE `kategori_pelanggaran` (
  `id_kategori_pelanggaran` int NOT NULL,
  `nama_kategori_pelanggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_pelanggaran`
--

INSERT INTO `kategori_pelanggaran` (`id_kategori_pelanggaran`, `nama_kategori_pelanggaran`) VALUES
(1, 'Kepribadian'),
(2, 'Kerajinan'),
(3, 'Kerapihan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sanksi`
--

CREATE TABLE `kategori_sanksi` (
  `id_kategori_sanksi` int NOT NULL,
  `nama_kategori_sanksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_sanksi`
--

INSERT INTO `kategori_sanksi` (`id_kategori_sanksi`, `nama_kategori_sanksi`) VALUES
(1, 'Ringan'),
(2, 'Sedang'),
(3, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jurusan_id` int NOT NULL,
  `tahun_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan_id`, `tahun_id`) VALUES
(6, 'XII RPL 1', 5, 3),
(7, 'XII RPL 2', 5, 3),
(8, 'XII RPL 3', 5, 3),
(9, 'XII RPL 4', 5, 3),
(10, 'XII RPL 5', 5, 3),
(11, 'XII AKT 1', 1, 3),
(12, 'XII AKT 2', 1, 3),
(13, 'XII AKT 3', 1, 3),
(14, 'XII AKT 4', 1, 3),
(15, 'XII DKV 1', 4, 3),
(16, 'XII DKV 2', 4, 3),
(17, 'XII ANM', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int NOT NULL,
  `nama_pelanggaran` varchar(255) NOT NULL,
  `kategori_pelanggaran_id` int NOT NULL,
  `jenis_pelanggaran_id` int NOT NULL,
  `poin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `kategori_pelanggaran_id`, `jenis_pelanggaran_id`, `poin`) VALUES
(2, 'Membuat keributan/ kegaduhan dalam kelas pada saat berlangsungnya pelajaran', 1, 1, 10),
(3, 'Masuk dan keluar lingkungan sekolah tidak melalui gerbang sekolah', 1, 1, 20),
(4, 'Berkata tidak jujur, tidak sopan/kasar', 1, 1, 10),
(5, 'Mengotori (mencorat-coret) barang milik sekolah,guru,karyawan atau teman', 1, 1, 35),
(6, 'Merusak atau ,menghilangkan barang milik sekolah,guru,karyawan atau teman', 1, 1, 50),
(7, 'Mengambil (mencuri) barang milik sekolah,guru,karyawan atau teman', 1, 1, 50),
(8, 'Makan dan minum di dalam kelas saat berlangsungnya pembelajaran', 1, 1, 5),
(9, 'Mengaktifkan alat komunikasi didalam kelas saat embelajaran berlangsung', 1, 1, 5),
(10, 'Membuang sampah tidak pada tempatnya', 1, 1, 5),
(11, 'Membawa teman selain siswa SMK Bakti Nusantara 666 maupun dengan sekolah lain atau pihak lain', 1, 1, 10),
(12, 'Membawa benda yang tidak ada kaitannya dengan proses belajar mengajar', 1, 1, 15),
(13, 'Bertengkar / bertentangan dengan teman di lingkungan sekolah', 1, 1, 40),
(14, 'Menggunakan / menggelapkan SPP dari orang tua', 1, 1, 40),
(15, 'Membentuk organisasi selain OSIS maupun kegiatan lainnya tanpa seijin kepala sekolah', 1, 1, 15),
(16, 'Menyalahgunakan Uang SPP', 1, 1, 45),
(17, 'Berbuat Asusila', 1, 1, 100),
(18, 'Membawa rokok', 1, 1, 25),
(19, 'Merokok / menghisap rokok di sekolah', 1, 1, 40),
(20, 'Merokok / menghisap rokok di luar sekolah memakai seragam sekolah', 1, 1, 40),
(21, 'Membawa buku, majalan, atau kaset terlarang atau HP berisi gambar dan film porno', 1, 1, 25),
(22, 'Memperjual belikan buku, majalan, atau kaset terlarang', 1, 1, 75),
(23, 'Membawa senjata tajam tanpa ijin', 1, 1, 40),
(24, 'Memperjual belikan senjata tajam tanpa di sekolah', 1, 1, 40),
(25, 'Menggunakan senjata tajam untuk mengancam', 1, 1, 75),
(26, 'Menggunakan senjata tajam untuk melukai', 1, 1, 75),
(27, 'Membawa obat / minuman terlarang', 1, 1, 75),
(28, 'Menggunakan obat / minuman terlarang di dalam /  di luar sekolah', 1, 1, 100),
(29, 'Memperjual belikan obat / minuman terlarang di dalam /  di luar sekolah', 1, 1, 100),
(30, 'Disebabkan oleh siswa di dalam sekolah', 1, 1, 75),
(31, 'Disebabkan oleh sekolah lain', 1, 1, 25),
(32, 'Antara siswa SMK Bakti Nusantara 666', 1, 1, 75),
(33, 'Disertai ancaman', 1, 1, 75),
(34, 'Disertai pemukulan', 1, 1, 100),
(35, 'Terlambat masuk sekolah lebih dari 15 menit (satu kali)', 1, 1, 2),
(36, 'Terlambat masuk sekolah lebih dari 15 menit (dua kali)', 1, 1, 3),
(37, 'Terlambat masuk sekolah lebih dari 15 menit (tiga kali)', 1, 1, 5),
(38, 'Terlambat masuk karena izin', 1, 1, 3),
(39, 'Terlambat masuk karena diberi tugas guru', 1, 1, 5),
(40, 'Terlambat masuk karena alasan yang di buat-buat', 1, 1, 10),
(41, 'Siswa tidak masuk karena (sakit tanpa keterangan/surat)', 1, 1, 2),
(42, 'Siswa tidak masuk karena izin tanpa keterangan/surat)', 1, 1, 2),
(43, 'Alpa', 1, 1, 5),
(44, 'Tidak mengikuti pelajaran (membolos)', 1, 1, 10),
(45, 'Siswa tidak masuk dengan membuat keterangan (surat) palsu', 1, 1, 10),
(46, 'Siswa keluar kelas saat proses belajar mengajar berlangsung tanpa izin', 1, 1, 5),
(47, 'Memakai seragam tidak rapi / tidak dimasukan', 1, 1, 5),
(48, 'Siswa putri memakai seragam yang ketat / rok pendek', 1, 1, 5),
(49, 'Tidak memakai perlengkapan upacara bendera (topi)', 1, 1, 5),
(50, 'Salah memakai baju, rok atau celana', 1, 1, 5),
(51, 'Salah atau tidak memakai ikat pinggang', 1, 1, 5),
(52, 'Salah memakai sepatu (tidak sesuai ketentuan)', 1, 1, 5),
(53, 'Tidak memakai kaos kaki', 1, 1, 5),
(54, 'Salah / tidak memakai kaos dalam', 1, 1, 5),
(55, 'Memakai topi yang bukan topi sekolah di lingkungan sekolah', 1, 1, 5),
(56, 'Siswa putri memakai perhiasan berlebihan', 1, 1, 5),
(57, 'Siswa putra memakai perhiasan atau aksesoris (kalung, gelang, dll)', 1, 1, 5),
(58, 'Potongan rambut putra tidak sesuai dengan ketentuan sekolah', 1, 1, 15),
(59, 'Dicat / di warna warni (putra-putri)', 1, 1, 15),
(60, 'Bertato', 1, 1, 100),
(61, 'Kuku di cat', 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_data`
--

CREATE TABLE `pelanggaran_data` (
  `kd_data_pelanggaran` varchar(35) NOT NULL,
  `kd_pelanggaran` varchar(35) NOT NULL,
  `pelaku` varchar(35) NOT NULL,
  `tanggal_pelanggaran` date NOT NULL,
  `status_pelanggaran` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggaran_data`
--

INSERT INTO `pelanggaran_data` (`kd_data_pelanggaran`, `kd_pelanggaran`, `pelaku`, `tanggal_pelanggaran`, `status_pelanggaran`, `keterangan`) VALUES
('PEL20210524073707', '2A01A', '2021001', '2021-05-24', 'Telah Ditindak Lanjut', ''),
('PEL20210525073707', '2A01B', '2021001', '2021-05-25', 'Telah Ditindak Lanjut', ''),
('PEL20210527131249', '2A01C', '2021001', '2021-05-27', 'Menunggu Tindak Lanjut', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int NOT NULL,
  `kategori_sanksi_id` int NOT NULL,
  `nama_sanksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `min_poin` int NOT NULL,
  `max_poin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanksi`
--

INSERT INTO `sanksi` (`id_sanksi`, `kategori_sanksi_id`, `nama_sanksi`, `min_poin`, `max_poin`) VALUES
(1, 1, 'Teguran', 1, 5),
(2, 2, 'Dicatat', 6, 10),
(3, 2, 'Konseling', 11, 15),
(4, 3, 'Pemanggilan orang tua dengan perjanjian siswa diatas materai', 16, 20),
(5, 3, 'Perjanjian orang tua dengan perjanjian siswa diatas materai', 21, 25),
(6, 3, 'Skorsing selama 3 hari', 26, 30),
(7, 3, 'Skorsing selama 7 hari', 31, 35),
(8, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu dua minggu', 36, 40),
(9, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu satu bulan', 41, 90),
(10, 3, 'dikembalikan kepada orang tua (keluar dari SMK Bakti Nusantara 666)', 90, 100);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nis` varchar(35) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `kelas_id` int NOT NULL,
  `kata_sandi` varchar(45) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas_id`, `kata_sandi`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`) VALUES
(6, '18191207084', 'Indra Mahesa', 9, '18191207085', 'L', 'Bandung', '2003-01-30', 'Bumi Harapan', '085321757616'),
(10, '181912070085', 'Nita Oktapiani', 12, '181912070085', 'P', 'Sumedang', '2021-07-12', 'Taman Bukit Makmur', '085321757616');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int NOT NULL,
  `nama_tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `nama_tahun`) VALUES
(1, '2019 - 2020'),
(2, '2020 - 2021'),
(3, '2021 - 2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_user` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` enum('admin','kesiswaan','bk','walikelas') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `level`, `password`) VALUES
(1, 'admin', 'Indra Mahesa', 'admin', '$2y$10$ToRTla30Hq/xMVacfrqWZ.I8o63XgN.oBVLUiaFeo6gfLDJXGX8Zi'),
(3, 'nita', 'Nita Oktapiani', 'kesiswaan', '$2y$10$7iHvTuY6Nue9rrw79w/ry.AegZqvBUrtF6JG5J4x0ZKRP./IjjxYC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`kd_data_kelas`);

--
-- Indexes for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jenis_pelanggaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_kategori_pelanggaran`);

--
-- Indexes for table `kategori_sanksi`
--
ALTER TABLE `kategori_sanksi`
  ADD PRIMARY KEY (`id_kategori_sanksi`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `pelanggaran_data`
--
ALTER TABLE `pelanggaran_data`
  ADD PRIMARY KEY (`kd_data_pelanggaran`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_sanksi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `id_jenis_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  MODIFY `id_kategori_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_sanksi`
--
ALTER TABLE `kategori_sanksi`
  MODIFY `id_kategori_sanksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
