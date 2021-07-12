-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 03:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`kd_data_kelas`, `kd_kelas`, `kd_tahun`, `nis`, `keterangan`) VALUES
('KLSRPL12021001', 'RPL12020', '2020', '2021001', '-'),
('KLSRPL12021002', 'RPL12020', '2020', '2021002', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` varchar(35) NOT NULL,
  `nama_jurusan` varchar(45) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`, `keterangan`) VALUES
('AKT', 'Akuntansi', '-'),
('ANM', 'Animasi', '-'),
('BPD', 'Bisnis Daring dan Pemasaran', '-'),
('DKV', 'Desain Komunikasi Visual', '-'),
('RPL', 'Rekayasa Perangkat Lunak', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` varchar(25) NOT NULL,
  `kd_jurusan` varchar(35) NOT NULL,
  `nama_kelas` varchar(35) NOT NULL,
  `kd_tahun` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `kd_jurusan`, `nama_kelas`, `kd_tahun`) VALUES
('RPL12020', 'RPL', 'RPL 1', '2020'),
('RPL22020', 'RPL', 'RPL 2', '2020'),
('RPL32020', 'RPL', 'RPL 3', '2020'),
('RPL42020', 'RPL', 'RPL 4', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `kd_pelanggaran` varchar(35) NOT NULL,
  `kategori_pelanggaran` varchar(35) NOT NULL,
  `jenis_pelanggaran` varchar(55) NOT NULL,
  `pelanggaran` varchar(255) NOT NULL,
  `poin` int(45) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`kd_pelanggaran`, `kategori_pelanggaran`, `jenis_pelanggaran`, `pelanggaran`, `poin`, `keterangan`) VALUES
('1A01', 'Kepribadian', 'Ketertiban', 'Membuat keributan/ kegaduhan dalam kelas pada saat berlangsungnya pelajaran', 10, ''),
('1A02', 'Kepribadian', 'Ketertiban', 'Masuk dan keluar lingkungan sekolah tidak melalui gerbang sekolah', 20, ''),
('1A03', 'Kepribadian', 'Ketertiban', 'Berkata tidak jujur, tidak sopan/kasar', 10, ''),
('1A04', 'Kepribadian', 'Ketertiban', 'Mengotori (mencorat-coret) barang milik sekolah,guru,karyawan atau teman', 35, ''),
('1A05', 'Kepribadian', 'Ketertiban', 'Merusak atau ,menghilangkan barang milik sekolah,guru,karyawan atau teman', 50, ''),
('1A06', 'Kepribadian', 'Ketertiban', 'Mengambil (mencuri) barang milik sekolah,guru,karyawan atau teman', 50, ''),
('1A07', 'Kepribadian', 'Ketertiban', 'Makan dan minum di dalam kelas saat berlangsungnya pembelajaran', 5, ''),
('1A08', 'Kepribadian', 'Ketertiban', 'Mengaktifkan alat komunikasi didalam kelas saat embelajaran berlangsung', 5, ''),
('1A09', 'Kepribadian', 'Ketertiban', 'Membuang sampah tidak pada tempatnya', 5, ''),
('1A10', 'Kepribadian', 'Ketertiban', 'Membawa teman selain siswa SMK Bakti Nusantara 666 maupun dengan sekolah lain atau pihak lain', 10, ''),
('1A11', 'Kepribadian', 'Ketertiban', 'Membawa benda yang tidak ada kaitannya dengan proses belajar mengajar', 15, ''),
('1A12', 'Kepribadian', 'Ketertiban', 'Bertengkar / bertentangan dengan teman di lingkungan sekolah', 40, ''),
('1A13', 'Kepribadian', 'Ketertiban', 'Menggunakan / menggelapkan SPP dari orang tua', 40, ''),
('1A14', 'Kepribadian', 'Ketertiban', 'Membentuk organisasi selain OSIS maupun kegiatan lainnya tanpa seijin kepala sekolah', 15, ''),
('1A15', 'Kepribadian', 'Ketertiban', 'Menyalahgunakan Uang SPP', 40, ''),
('1A16', 'Kepribadian', 'Ketertiban', 'Berbuat Asusila', 100, ''),
('1B01', 'Kepribadian', 'Rokok', 'Membawa rokok', 25, ''),
('1B02', 'Kepribadian', 'Rokok', 'Merokok / menghisap rokok di sekolah', 40, ''),
('1B03', 'Kepribadian', 'Rokok', 'Merokok / menghisap rokok di luar sekolah memakai seragam sekolah', 40, ''),
('1C01', 'Kepribadian', 'Buku, Majalan, atau Kaset Terlarang', 'Membawa buku, majalan, atau kaset terlarang atau HP berisi gambar dan film porno', 25, ''),
('1C02', 'Kepribadian', 'Buku, Majalan, atau Kaset Terlarang', 'Memperjual belikan buku, majalan, atau kaset terlarang', 75, ''),
('1D01', 'Kepribadian', 'Senjata', 'Membawa senjata tajam tanpa ijin', 40, ''),
('1D02', 'Kepribadian', 'Senjata', 'Memperjual belikan senjata tajam tanpa di sekolah', 40, ''),
('1D03', 'Kepribadian', 'Senjata', 'Menggunakan senjata tajam untuk mengancam', 75, ''),
('1D04', 'Kepribadian', 'Senjata', 'Menggunakan senjata tajam untuk melukai', 75, ''),
('1E01', 'Kepribadian', 'Obat / Minuman Terlarang', 'Membawa obat / minuman terlarang', 75, ''),
('1E02', 'Kepribadian', 'Obat / Minuman Terlarang', 'Menggunakan obat / minuman terlarang di dalam /  di luar sekolah', 100, ''),
('1E03', 'Kepribadian', 'Obat / Minuman Terlarang', 'Memperjual belikan obat / minuman terlarang di dalam /  di luar sekolah', 100, ''),
('1F01', 'Kepribadian', 'Perkelahian', 'Disebabkan oleh siswa di dalam sekolah', 75, ''),
('1F02', 'Kepribadian', 'Perkelahian', 'Disebabkan oleh sekolah lain', 25, ''),
('1F03', 'Kepribadian', 'Perkelahian', 'Antara siswa SMK Bakti Nusantara 666', 75, ''),
('1G01', 'Kepribadian', 'Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan', 'Disertai ancaman', 75, ''),
('1G02', 'Kepribadian', 'Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan', 'Disertai pemukulan', 100, ''),
('2A01A', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk sekolah lebih dari 15 menit (satu kali)', 2, ''),
('2A01B', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk sekolah lebih dari 15 menit (dua kali)', 3, ''),
('2A01C', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk sekolah lebih dari 15 menit (tiga kali)', 5, ''),
('2A02', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk karena izin', 3, ''),
('2A03', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk karena diberi tugas guru', 5, ''),
('2A04', 'Kerajinan', 'Keterlambatan', 'Terlambat masuk karena alasan yang di buat-buat', 10, ''),
('2B01A', 'Kerajinan', 'Kehadiran', 'Siswa tidak masuk karena (sakit tanpa keterangan/surat)', 2, ''),
('2B01B', 'Kerajinan', 'Kehadiran', 'Siswa tidak masuk karena izin tanpa keterangan/surat)', 2, ''),
('2B01C', 'Kerajinan', 'Kehadiran', 'Alpa', 5, ''),
('2B02', 'Kerajinan', 'Kehadiran', 'Tidak mengikuti pelajaran (membolos)', 10, ''),
('2B03', 'Kerajinan', 'Kehadiran', 'Siswa tidak masuk dengan membuat keterangan (surat) palsu', 10, ''),
('2B04', 'Kerajinan', 'Kehadiran', 'Siswa keluar kelas saat proses belajar mengajar berlangsung tanpa izin', 5, ''),
('3A01', 'Kerapihan', 'Pakaian', 'Memakai seragam tidak rapi / tidak dimasukan', 5, ''),
('3A02', 'Kerapihan', 'Pakaian', 'Siswa putri memakai seragam yang ketat / rok pendek', 5, ''),
('3A03', 'Kerapihan', 'Pakaian', 'Tidak memakai perlengkapan upacara bendera (topi)', 5, ''),
('3A04', 'Kerapihan', 'Pakaian', 'Salah memakai baju, rok atau celana', 5, ''),
('3A05', 'Kerapihan', 'Pakaian', 'Salah atau tidak memakai ikat pinggang', 5, ''),
('3A06', 'Kerapihan', 'Pakaian', 'Salah memakai sepatu (tidak sesuai ketentuan)', 5, ''),
('3A07', 'Kerapihan', 'Pakaian', 'Tidak memakai kaos kaki', 5, ''),
('3A08', 'Kerapihan', 'Pakaian', 'Salah / tidak memakai kaos dalam', 5, ''),
('3A09', 'Kerapihan', 'Pakaian', 'Memakai topi yang bukan topi sekolah di lingkungan sekolah', 5, ''),
('3A10', 'Kerapihan', 'Pakaian', 'Siswa putri memakai perhiasan berlebihan', 5, ''),
('3A11', 'Kerapihan', 'Pakaian', 'Siswa putra memakai perhiasan atau aksesoris (kalung, gelang, dll)', 5, ''),
('3B01', 'Kerapihan', 'Rambut', 'Potongan rambut putra tidak sesuai dengan ketentuan sekolah', 15, ''),
('3B02', 'Kerapihan', 'Rambut', 'Dicat / di warna warni (putra-putri)', 15, ''),
('3C01', 'Kerapihan', 'Badan', 'Bertato', 100, ''),
('3C02', 'Kerapihan', 'Badan', 'Kuku di cat', 20, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `kd_sanksi` varchar(35) NOT NULL,
  `kategori_sanksi` varchar(45) NOT NULL,
  `jenis_sanksi` varchar(100) NOT NULL,
  `total_poin` varchar(45) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanksi`
--

INSERT INTO `sanksi` (`kd_sanksi`, `kategori_sanksi`, `jenis_sanksi`, `total_poin`, `keterangan`) VALUES
('SNK01', 'Ringan', 'Teguran', '1 -  5', ''),
('SNK02', 'Sedang', 'Dicatat', '6 - 10', ''),
('SNK03', 'Sedang', 'Konseling', '11 - 15', ''),
('SNK04', 'Berat', 'Pemanggilan orang tua dengan perjanjian siswa diatas materai', '16 - 20', ''),
('SNK05', 'Berat', 'Perjanjian orang tua dengan perjanjian siswa diatas materai', '21 - 25', ''),
('SNK06', 'Berat', 'Skorsing selama 3 hari', '26  - 30', ''),
('SNK07', 'Berat', 'Skorsing selama 7 hari', '31 - 35', ''),
('SNK08', 'Berat', 'diserahkan kepada orang tua untuk dibina dalam jangka waktu dua minggu', '36 - 40', ''),
('SNK09', 'Berat', 'diserahkan kepada orang tua untuk dibina dalam jangka waktu satu bulan', '41 - 90', ''),
('SNK10', 'Berat', 'dikembalikan kepada orang tua (keluar dari SMK Bakti Nusantara 666)', '90 - 100', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(35) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `kata_sandi` varchar(45) NOT NULL,
  `jk_siswa` varchar(35) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(35) NOT NULL,
  `rw` varchar(35) NOT NULL,
  `desa` varchar(45) NOT NULL,
  `kecamatan` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `kode_pos` varchar(45) NOT NULL,
  `telepon` varchar(35) NOT NULL,
  `kebutuhan_khusus` varchar(45) NOT NULL,
  `tahun_masuk` varchar(45) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `kata_sandi`, `jk_siswa`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `kode_pos`, `telepon`, `kebutuhan_khusus`, `tahun_masuk`, `keterangan`) VALUES
('2021001', 'Ilham Zhafir', '123', 'Laki-laki', 'Bandung', '1994-12-05', 'Islam', 'Rancaekek', '001', '004', 'Jelegong', 'Rancaekek', 'Bandung', '20394', '087722728570', '-', '2010', '-'),
('2021002', 'Zhafir', '123', 'Laki-laki', 'Bandung', '1994-12-05', 'Islam', 'Rancaekek', '001', '004', 'Jelegong', 'Rancaekek', 'Bandung', '20394', '087722728570', '-', '2010', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `kd_tahun` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`kd_tahun`, `tahun_ajaran`, `keterangan`) VALUES
('2019', '2019-2020', '-'),
('2020', '2020-2021', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nipy` varchar(35) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `kata_sandi` varchar(45) NOT NULL,
  `jk` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nipy`, `nama`, `jabatan`, `kata_sandi`, `jk`, `alamat`, `status`) VALUES
('1342214', 'Ilham Zhafir', 'Kesiswaan', '123', 'Laki-laki', 'Rancaekek', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`kd_data_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`kd_pelanggaran`);

--
-- Indexes for table `pelanggaran_data`
--
ALTER TABLE `pelanggaran_data`
  ADD PRIMARY KEY (`kd_data_pelanggaran`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`kd_sanksi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`kd_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nipy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
