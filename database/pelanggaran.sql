-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2021 at 12:36 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
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
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int NOT NULL,
  `nama_bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Jan'),
(2, 'Feb'),
(3, 'Mar'),
(4, 'Apr'),
(5, 'Mei'),
(6, 'Jun'),
(7, 'Jul'),
(8, 'Ags'),
(9, 'Sep'),
(10, 'Okt'),
(11, 'Nov'),
(12, 'Des');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `id_jenis_pelanggaran` int NOT NULL,
  `nama_jenis_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori_pelanggaran` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`id_jenis_pelanggaran`, `nama_jenis_pelanggaran`, `id_kategori_pelanggaran`) VALUES
(1, 'Ketertiban', 1),
(2, 'Rokok', 1),
(3, 'Buku, Majalah, atau Kaset Terlarang', 1),
(4, 'Senjata', 1),
(5, 'Obat / Minuman Terlarang', 1),
(6, 'Perkelahian', 1),
(7, 'Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan', 1),
(8, 'Keterlambatan', 2),
(9, 'Kehadiran', 2),
(10, 'Pakaian', 3),
(11, 'Badan', 3),
(12, 'Rambut', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `nama_jurusan` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

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
  `nama_kategori_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

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
  `nama_kategori_sanksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

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
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tingkat` enum('10','11','12') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_jurusan` int NOT NULL,
  `id_tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tingkat`, `id_jurusan`, `id_tahun`) VALUES
(6, 'XII RPL 1', '12', 5, 3),
(7, 'XII RPL 2', '12', 5, 3),
(8, 'XII RPL 3', '12', 5, 3),
(9, 'XII RPL 4', '12', 5, 3),
(10, 'XII RPL 5', '12', 5, 3),
(11, 'XII AKT 1', '12', 1, 3),
(12, 'XII AKT 2', '12', 1, 3),
(13, 'XII AKT 3', '12', 1, 3),
(14, 'XII AKT 4', '12', 1, 3),
(15, 'XII DKV 1', '12', 4, 3),
(16, 'XII DKV 2', '12', 4, 3),
(17, 'XII ANM', '12', 2, 3),
(18, 'XII ANM 2', '12', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_kelas`, `id_siswa`) VALUES
(7, 14, 2),
(8, 9, 1),
(9, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int NOT NULL,
  `nama_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis_pelanggaran` int NOT NULL,
  `poin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_jenis_pelanggaran`, `poin`) VALUES
(2, 'Membuat keributan/ kegaduhan dalam kelas pada saat berlangsungnya pelajaran', 1, 10),
(3, 'Masuk dan keluar lingkungan sekolah tidak melalui gerbang sekolah', 1, 20),
(4, 'Berkata tidak jujur, tidak sopan/kasar', 1, 10),
(5, 'Mengotori (mencorat-coret) barang milik sekolah,guru,karyawan atau teman', 1, 35),
(6, 'Merusak atau ,menghilangkan barang milik sekolah,guru,karyawan atau teman', 1, 50),
(7, 'Mengambil (mencuri) barang milik sekolah,guru,karyawan atau teman', 1, 50),
(8, 'Makan dan minum di dalam kelas saat berlangsungnya pembelajaran', 1, 5),
(9, 'Mengaktifkan alat komunikasi didalam kelas saat pembelajaran berlangsung', 1, 5),
(10, 'Membuang sampah tidak pada tempatnya', 1, 5),
(11, 'Membawa teman selain siswa SMK Bakti Nusantara 666 maupun dengan sekolah lain atau pihak lain', 1, 10),
(12, 'Membawa benda yang tidak ada kaitannya dengan proses belajar mengajar', 1, 15),
(13, 'Bertengkar / bertentangan dengan teman di lingkungan sekolah', 1, 40),
(14, 'Menggunakan / menggelapkan SPP dari orang tua', 1, 40),
(15, 'Membentuk organisasi selain OSIS maupun kegiatan lainnya tanpa seijin kepala sekolah', 1, 15),
(16, 'Menyalahgunakan Uang SPP', 1, 45),
(17, 'Berbuat Asusila', 1, 100),
(18, 'Membawa rokok', 2, 25),
(19, 'Merokok / menghisap rokok di sekolah', 2, 40),
(20, 'Merokok / menghisap rokok di luar sekolah memakai seragam sekolah', 2, 40),
(21, 'Membawa buku, majalah, atau kaset terlarang atau HP berisi gambar dan film porno', 3, 25),
(22, 'Memperjual belikan buku, majalan, atau kaset terlarang', 3, 75),
(23, 'Membawa senjata tajam tanpa ijin', 4, 40),
(24, 'Memperjual belikan senjata tajam tanpa di sekolah', 4, 40),
(25, 'Menggunakan senjata tajam untuk mengancam', 4, 75),
(26, 'Menggunakan senjata tajam untuk melukai', 4, 75),
(27, 'Membawa obat / minuman terlarang', 5, 75),
(28, 'Menggunakan obat / minuman terlarang di dalam /  di luar sekolah', 5, 100),
(29, 'Memperjual belikan obat / minuman terlarang di dalam /  di luar sekolah', 5, 100),
(30, 'Disebabkan oleh siswa di dalam sekolah', 6, 75),
(31, 'Disebabkan oleh sekolah lain', 6, 25),
(32, 'Antara siswa SMK Bakti Nusantara 666', 6, 75),
(33, 'Pelanggaran disertai ancaman', 7, 75),
(34, 'Pelanggaran disertai pemukulan', 7, 100),
(35, 'Terlambat masuk sekolah lebih dari 15 menit (satu kali)', 8, 2),
(36, 'Terlambat masuk sekolah lebih dari 15 menit (dua kali)', 8, 3),
(37, 'Terlambat masuk sekolah lebih dari 15 menit (tiga kali)', 8, 5),
(38, 'Terlambat masuk karena izin', 8, 3),
(39, 'Terlambat masuk karena diberi tugas guru', 8, 5),
(40, 'Terlambat masuk karena alasan yang di buat-buat', 8, 10),
(41, 'Siswa tidak masuk karena sakit tanpa keterangan/surat', 9, 2),
(42, 'Siswa tidak masuk karena izin tanpa keterangan/surat', 9, 2),
(43, 'Siswa tidak masuk tanpa keterangan/surat (alpha)', 9, 5),
(44, 'Tidak mengikuti pelajaran (membolos)', 9, 10),
(45, 'Siswa tidak masuk dengan membuat keterangan (surat) palsu', 9, 10),
(46, 'Siswa keluar kelas saat proses belajar mengajar berlangsung tanpa izin', 9, 5),
(47, 'Memakai seragam tidak rapi / tidak dimasukan', 10, 5),
(48, 'Siswa putri memakai seragam yang ketat / rok pendek', 10, 5),
(49, 'Tidak memakai perlengkapan upacara bendera (topi)', 10, 5),
(50, 'Salah memakai baju, rok atau celana', 10, 5),
(51, 'Salah atau tidak memakai ikat pinggang', 10, 5),
(52, 'Salah memakai sepatu (tidak sesuai ketentuan)', 10, 5),
(53, 'Tidak memakai kaos kaki', 10, 5),
(54, 'Salah / tidak memakai kaos dalam', 10, 5),
(55, 'Memakai topi yang bukan topi sekolah di lingkungan sekolah', 10, 5),
(56, 'Siswa putri memakai perhiasan berlebihan', 10, 5),
(57, 'Siswa putra memakai perhiasan atau aksesoris (kalung, gelang, dll)', 10, 5),
(58, 'Potongan rambut putra tidak sesuai dengan ketentuan sekolah', 12, 15),
(59, 'Dicat / di warna warni (putra-putri)', 12, 15),
(60, 'Bertato', 11, 100),
(61, 'Kuku di cat', 11, 20),
(62, 'Izin keluar saat proses belajar berlangsung dan tidak kembali', 8, 10),
(63, 'Pulang tanpa izin', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_data`
--

CREATE TABLE `pelanggaran_data` (
  `id_pelanggaran_data` int NOT NULL,
  `id_pelanggaran` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_ptk` int NOT NULL,
  `tgl` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `poin` int DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_tahun` int DEFAULT NULL,
  `id_sanksi` int DEFAULT NULL,
  `status` enum('Jatuh Sanksi','Disetujui','Anulir') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Jatuh Sanksi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pelanggaran_data`
--

INSERT INTO `pelanggaran_data` (`id_pelanggaran_data`, `id_pelanggaran`, `id_siswa`, `id_ptk`, `tgl`, `poin`, `catatan`, `id_tahun`, `id_sanksi`, `status`) VALUES
(1, 59, 1, 7, '2021-06-08 12:33:02', 15, 'Dilarang ada jamet di sekolah ini!', 3, 3, 'Disetujui'),
(2, 35, 2, 7, '2021-07-01 12:31:06', 2, 'Jalanan macet soalnya rumah di sumedang', 3, 1, 'Disetujui'),
(3, 32, 3, 7, '2021-07-01 12:32:09', 75, 'Terjadi Baku hantam', 3, 9, 'Disetujui'),
(4, 47, 1, 7, '2021-12-01 12:34:27', 5, '', 3, 1, 'Disetujui'),
(5, 35, 1, 7, '2021-04-01 12:33:04', 2, '', 3, 1, 'Disetujui'),
(6, 50, 3, 7, '2021-08-01 12:33:25', 5, '', 3, 1, 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `ptk`
--

CREATE TABLE `ptk` (
  `id_ptk` int NOT NULL,
  `nama_ptk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ptk`
--

INSERT INTO `ptk` (`id_ptk`, `nama_ptk`) VALUES
(1, 'SUPRIATNA, M.Pd\r'),
(2, 'DENI IRAWAN, S.Pd.I\r'),
(3, 'ELINA APIANI, A.Md\r'),
(4, 'IIS SABIAH, S.Pd., M.Hum\r'),
(5, 'SLAMET RIYADI, S.T\r'),
(6, 'MONI MORITHA ZELLY, M.Pd,'),
(7, 'Asep Ramdani'),
(8, 'Fazrin Tauvan, S.Psi.'),
(9, 'ASHIAP'),
(10, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int NOT NULL,
  `kategori_sanksi_id` int NOT NULL,
  `nama_sanksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `min_poin` int NOT NULL,
  `max_poin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sanksi`
--

INSERT INTO `sanksi` (`id_sanksi`, `kategori_sanksi_id`, `nama_sanksi`, `min_poin`, `max_poin`) VALUES
(1, 1, 'Dicatat dan Konseling', 1, 5),
(2, 2, 'Peringatan Lisan', 6, 10),
(3, 2, 'Peringatan Tertulis dengan perjanjian', 11, 15),
(4, 3, 'Pemanggilan orang tua dengan perjanjian siswa diatas materai', 16, 20),
(5, 3, 'Perjanjian orang tua dengan perjanjian siswa diatas materai', 21, 25),
(6, 3, 'Skorsing selama 3 hari', 26, 30),
(7, 3, 'Skorsing selama 7 hari', 31, 35),
(8, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu 2 (dua) minggu', 36, 40),
(9, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu 1 (satu) bulan', 41, 90),
(10, 3, 'dikembalikan kepada orang tua (keluar dari SMK Bakti Nusantara 666)', 90, 100);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nis` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_siswa` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `keterangan`, `password`, `status`) VALUES
(1, '181912070084', 'Indra Mahesa', 'L', 'Bandung', '2021-08-01', 'Cibiru, Komp Bumi Harapan blok cc 3 no 10', '081234567891', '', '$2y$10$4tnjCZfoKB25s0KrUG59rObIMCGVu6Xe7QXj9nA20EMfqBr36aewO', 1),
(2, '181912070085', 'Nita Oktapiani', 'P', 'Sumedang', '2021-08-01', 'Sumedang, Taman bukit makmur', '081234567891', NULL, '$2y$10$/PCLyz72ia32Q4bx3elJueZfs/5pXr3a3MdsyhSHaToIF.YZ96Pxy', 1),
(3, '181912070086', 'David Fadlillah', 'L', 'Bandung', '2021-08-01', 'Cileunyi', '081234567891', 'Memiliki penyakit hati', '$2y$10$1u/MCHiEL.nYNS2VwIYs2etgvQZozQSQw2vfvJkHNMdJ52HKyjOau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int NOT NULL,
  `nama_tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_aktif` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `nama_tahun`, `is_aktif`) VALUES
(1, '2019 - 2020', 0),
(2, '2020 - 2021', 0),
(3, '2021 - 2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','kesiswaan','bk','walikelas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_ref` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `id_ref`) VALUES
(1, 'admin', '$2y$10$Zd3ej2ecBoE/8HxbHZQlDOm9cfWruDdZHFjYpG6eZftf8QHdWD.W2', 'admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int NOT NULL,
  `id_ptk` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_ptk`, `id_kelas`) VALUES
(1, 2, 9),
(2, 4, 12),
(3, 5, 11),
(5, 3, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jenis_pelanggaran`) USING BTREE;

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`) USING BTREE;

--
-- Indexes for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_kategori_pelanggaran`) USING BTREE;

--
-- Indexes for table `kategori_sanksi`
--
ALTER TABLE `kategori_sanksi`
  ADD PRIMARY KEY (`id_kategori_sanksi`) USING BTREE;

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE;

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`) USING BTREE;

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`) USING BTREE;

--
-- Indexes for table `pelanggaran_data`
--
ALTER TABLE `pelanggaran_data`
  ADD PRIMARY KEY (`id_pelanggaran_data`) USING BTREE;

--
-- Indexes for table `ptk`
--
ALTER TABLE `ptk`
  ADD PRIMARY KEY (`id_ptk`) USING BTREE;

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_sanksi`) USING BTREE;

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `id_jenis_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  MODIFY `id_kategori_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_sanksi`
--
ALTER TABLE `kategori_sanksi`
  MODIFY `id_kategori_sanksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pelanggaran_data`
--
ALTER TABLE `pelanggaran_data`
  MODIFY `id_pelanggaran_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ptk`
--
ALTER TABLE `ptk`
  MODIFY `id_ptk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
