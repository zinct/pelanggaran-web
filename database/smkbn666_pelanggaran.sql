/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : smkbn666_pelanggaran

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/07/2021 02:55:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absen
-- ----------------------------
DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen`  (
  `kd_data_kelas` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kd_kelas` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kd_tahun` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nis` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_data_kelas`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of absen
-- ----------------------------
INSERT INTO `absen` VALUES ('KLSRPL12021001', 'RPL12020', '2020', '2021001', '-');
INSERT INTO `absen` VALUES ('KLSRPL12021002', 'RPL12020', '2020', '2021002', '-');

-- ----------------------------
-- Table structure for jenis_pelanggaran
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pelanggaran`;
CREATE TABLE `jenis_pelanggaran`  (
  `id_jenis_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori_pelanggaran` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pelanggaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_pelanggaran
-- ----------------------------
INSERT INTO `jenis_pelanggaran` VALUES (1, 'Ketertiban', 1);
INSERT INTO `jenis_pelanggaran` VALUES (2, 'Rokok', 1);
INSERT INTO `jenis_pelanggaran` VALUES (3, 'Buku, Majalah, atau Kaset Terlarang', 1);
INSERT INTO `jenis_pelanggaran` VALUES (4, 'Senjata', 1);
INSERT INTO `jenis_pelanggaran` VALUES (5, 'Obat / Minuman Terlarang', 1);
INSERT INTO `jenis_pelanggaran` VALUES (6, 'Perkelahian', 1);
INSERT INTO `jenis_pelanggaran` VALUES (7, 'Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan', 1);
INSERT INTO `jenis_pelanggaran` VALUES (8, 'Keterlambatan', 2);
INSERT INTO `jenis_pelanggaran` VALUES (9, 'Kehadiran', 2);
INSERT INTO `jenis_pelanggaran` VALUES (10, 'Pakaian', 3);
INSERT INTO `jenis_pelanggaran` VALUES (11, 'Badan', 3);
INSERT INTO `jenis_pelanggaran` VALUES (12, 'Rambut', 3);

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jurusan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES (1, 'Akuntansi');
INSERT INTO `jurusan` VALUES (2, 'Animasi');
INSERT INTO `jurusan` VALUES (3, 'Bisnis Daring dan Pemasaran');
INSERT INTO `jurusan` VALUES (4, 'Desain Komunikasi Visual');
INSERT INTO `jurusan` VALUES (5, 'Rekayasa Perangkat Lunak');

-- ----------------------------
-- Table structure for kategori_pelanggaran
-- ----------------------------
DROP TABLE IF EXISTS `kategori_pelanggaran`;
CREATE TABLE `kategori_pelanggaran`  (
  `id_kategori_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori_pelanggaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_pelanggaran
-- ----------------------------
INSERT INTO `kategori_pelanggaran` VALUES (1, 'Kepribadian');
INSERT INTO `kategori_pelanggaran` VALUES (2, 'Kerajinan');
INSERT INTO `kategori_pelanggaran` VALUES (3, 'Kerapihan');

-- ----------------------------
-- Table structure for kategori_sanksi
-- ----------------------------
DROP TABLE IF EXISTS `kategori_sanksi`;
CREATE TABLE `kategori_sanksi`  (
  `id_kategori_sanksi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_sanksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori_sanksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_sanksi
-- ----------------------------
INSERT INTO `kategori_sanksi` VALUES (1, 'Ringan');
INSERT INTO `kategori_sanksi` VALUES (2, 'Sedang');
INSERT INTO `kategori_sanksi` VALUES (3, 'Berat');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tingkat` enum('10','11','12') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (6, 'XII RPL 1', '12', 5, 3);
INSERT INTO `kelas` VALUES (7, 'XII RPL 2', '12', 5, 3);
INSERT INTO `kelas` VALUES (8, 'XII RPL 3', '12', 5, 3);
INSERT INTO `kelas` VALUES (9, 'XII RPL 4', '12', 5, 3);
INSERT INTO `kelas` VALUES (10, 'XII RPL 5', '12', 5, 3);
INSERT INTO `kelas` VALUES (11, 'XII AKT 1', '12', 1, 3);
INSERT INTO `kelas` VALUES (12, 'XII AKT 2', '12', 1, 3);
INSERT INTO `kelas` VALUES (13, 'XII AKT 3', '12', 1, 3);
INSERT INTO `kelas` VALUES (14, 'XII AKT 4', '12', 1, 3);
INSERT INTO `kelas` VALUES (15, 'XII DKV 1', '12', 4, 3);
INSERT INTO `kelas` VALUES (16, 'XII DKV 2', '12', 4, 3);
INSERT INTO `kelas` VALUES (17, 'XII ANM', '12', 2, 3);
INSERT INTO `kelas` VALUES (18, 'XII ANM 2', '12', 2, 3);

-- ----------------------------
-- Table structure for kelas_siswa
-- ----------------------------
DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE `kelas_siswa`  (
  `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_siswa
-- ----------------------------
INSERT INTO `kelas_siswa` VALUES (2, 12, 10);
INSERT INTO `kelas_siswa` VALUES (4, 9, 11);
INSERT INTO `kelas_siswa` VALUES (5, 6, 6);

-- ----------------------------
-- Table structure for pelanggaran
-- ----------------------------
DROP TABLE IF EXISTS `pelanggaran`;
CREATE TABLE `pelanggaran`  (
  `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis_pelanggaran` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggaran
-- ----------------------------
INSERT INTO `pelanggaran` VALUES (2, 'Membuat keributan/ kegaduhan dalam kelas pada saat berlangsungnya pelajaran', 1, 10);
INSERT INTO `pelanggaran` VALUES (3, 'Masuk dan keluar lingkungan sekolah tidak melalui gerbang sekolah', 1, 20);
INSERT INTO `pelanggaran` VALUES (4, 'Berkata tidak jujur, tidak sopan/kasar', 1, 10);
INSERT INTO `pelanggaran` VALUES (5, 'Mengotori (mencorat-coret) barang milik sekolah,guru,karyawan atau teman', 1, 35);
INSERT INTO `pelanggaran` VALUES (6, 'Merusak atau ,menghilangkan barang milik sekolah,guru,karyawan atau teman', 1, 50);
INSERT INTO `pelanggaran` VALUES (7, 'Mengambil (mencuri) barang milik sekolah,guru,karyawan atau teman', 1, 50);
INSERT INTO `pelanggaran` VALUES (8, 'Makan dan minum di dalam kelas saat berlangsungnya pembelajaran', 1, 5);
INSERT INTO `pelanggaran` VALUES (9, 'Mengaktifkan alat komunikasi didalam kelas saat pembelajaran berlangsung', 1, 5);
INSERT INTO `pelanggaran` VALUES (10, 'Membuang sampah tidak pada tempatnya', 1, 5);
INSERT INTO `pelanggaran` VALUES (11, 'Membawa teman selain siswa SMK Bakti Nusantara 666 maupun dengan sekolah lain atau pihak lain', 1, 10);
INSERT INTO `pelanggaran` VALUES (12, 'Membawa benda yang tidak ada kaitannya dengan proses belajar mengajar', 1, 15);
INSERT INTO `pelanggaran` VALUES (13, 'Bertengkar / bertentangan dengan teman di lingkungan sekolah', 1, 40);
INSERT INTO `pelanggaran` VALUES (14, 'Menggunakan / menggelapkan SPP dari orang tua', 1, 40);
INSERT INTO `pelanggaran` VALUES (15, 'Membentuk organisasi selain OSIS maupun kegiatan lainnya tanpa seijin kepala sekolah', 1, 15);
INSERT INTO `pelanggaran` VALUES (16, 'Menyalahgunakan Uang SPP', 1, 45);
INSERT INTO `pelanggaran` VALUES (17, 'Berbuat Asusila', 1, 100);
INSERT INTO `pelanggaran` VALUES (18, 'Membawa rokok', 2, 25);
INSERT INTO `pelanggaran` VALUES (19, 'Merokok / menghisap rokok di sekolah', 2, 40);
INSERT INTO `pelanggaran` VALUES (20, 'Merokok / menghisap rokok di luar sekolah memakai seragam sekolah', 2, 40);
INSERT INTO `pelanggaran` VALUES (21, 'Membawa buku, majalah, atau kaset terlarang atau HP berisi gambar dan film porno', 3, 25);
INSERT INTO `pelanggaran` VALUES (22, 'Memperjual belikan buku, majalan, atau kaset terlarang', 3, 75);
INSERT INTO `pelanggaran` VALUES (23, 'Membawa senjata tajam tanpa ijin', 4, 40);
INSERT INTO `pelanggaran` VALUES (24, 'Memperjual belikan senjata tajam tanpa di sekolah', 4, 40);
INSERT INTO `pelanggaran` VALUES (25, 'Menggunakan senjata tajam untuk mengancam', 4, 75);
INSERT INTO `pelanggaran` VALUES (26, 'Menggunakan senjata tajam untuk melukai', 4, 75);
INSERT INTO `pelanggaran` VALUES (27, 'Membawa obat / minuman terlarang', 5, 75);
INSERT INTO `pelanggaran` VALUES (28, 'Menggunakan obat / minuman terlarang di dalam /  di luar sekolah', 5, 100);
INSERT INTO `pelanggaran` VALUES (29, 'Memperjual belikan obat / minuman terlarang di dalam /  di luar sekolah', 5, 100);
INSERT INTO `pelanggaran` VALUES (30, 'Disebabkan oleh siswa di dalam sekolah', 6, 75);
INSERT INTO `pelanggaran` VALUES (31, 'Disebabkan oleh sekolah lain', 6, 25);
INSERT INTO `pelanggaran` VALUES (32, 'Antara siswa SMK Bakti Nusantara 666', 6, 75);
INSERT INTO `pelanggaran` VALUES (33, 'Pelanggaran disertai ancaman', 7, 75);
INSERT INTO `pelanggaran` VALUES (34, 'Pelanggaran disertai pemukulan', 7, 100);
INSERT INTO `pelanggaran` VALUES (35, 'Terlambat masuk sekolah lebih dari 15 menit (satu kali)', 8, 2);
INSERT INTO `pelanggaran` VALUES (36, 'Terlambat masuk sekolah lebih dari 15 menit (dua kali)', 8, 3);
INSERT INTO `pelanggaran` VALUES (37, 'Terlambat masuk sekolah lebih dari 15 menit (tiga kali)', 8, 5);
INSERT INTO `pelanggaran` VALUES (38, 'Terlambat masuk karena izin', 8, 3);
INSERT INTO `pelanggaran` VALUES (39, 'Terlambat masuk karena diberi tugas guru', 8, 5);
INSERT INTO `pelanggaran` VALUES (40, 'Terlambat masuk karena alasan yang di buat-buat', 8, 10);
INSERT INTO `pelanggaran` VALUES (41, 'Siswa tidak masuk karena sakit tanpa keterangan/surat', 9, 2);
INSERT INTO `pelanggaran` VALUES (42, 'Siswa tidak masuk karena izin tanpa keterangan/surat', 9, 2);
INSERT INTO `pelanggaran` VALUES (43, 'Siswa tidak masuk tanpa keterangan/surat (alpha)', 9, 5);
INSERT INTO `pelanggaran` VALUES (44, 'Tidak mengikuti pelajaran (membolos)', 9, 10);
INSERT INTO `pelanggaran` VALUES (45, 'Siswa tidak masuk dengan membuat keterangan (surat) palsu', 9, 10);
INSERT INTO `pelanggaran` VALUES (46, 'Siswa keluar kelas saat proses belajar mengajar berlangsung tanpa izin', 9, 5);
INSERT INTO `pelanggaran` VALUES (47, 'Memakai seragam tidak rapi / tidak dimasukan', 10, 5);
INSERT INTO `pelanggaran` VALUES (48, 'Siswa putri memakai seragam yang ketat / rok pendek', 10, 5);
INSERT INTO `pelanggaran` VALUES (49, 'Tidak memakai perlengkapan upacara bendera (topi)', 10, 5);
INSERT INTO `pelanggaran` VALUES (50, 'Salah memakai baju, rok atau celana', 10, 5);
INSERT INTO `pelanggaran` VALUES (51, 'Salah atau tidak memakai ikat pinggang', 10, 5);
INSERT INTO `pelanggaran` VALUES (52, 'Salah memakai sepatu (tidak sesuai ketentuan)', 10, 5);
INSERT INTO `pelanggaran` VALUES (53, 'Tidak memakai kaos kaki', 10, 5);
INSERT INTO `pelanggaran` VALUES (54, 'Salah / tidak memakai kaos dalam', 10, 5);
INSERT INTO `pelanggaran` VALUES (55, 'Memakai topi yang bukan topi sekolah di lingkungan sekolah', 10, 5);
INSERT INTO `pelanggaran` VALUES (56, 'Siswa putri memakai perhiasan berlebihan', 10, 5);
INSERT INTO `pelanggaran` VALUES (57, 'Siswa putra memakai perhiasan atau aksesoris (kalung, gelang, dll)', 10, 5);
INSERT INTO `pelanggaran` VALUES (58, 'Potongan rambut putra tidak sesuai dengan ketentuan sekolah', 12, 15);
INSERT INTO `pelanggaran` VALUES (59, 'Dicat / di warna warni (putra-putri)', 12, 15);
INSERT INTO `pelanggaran` VALUES (60, 'Bertato', 11, 100);
INSERT INTO `pelanggaran` VALUES (61, 'Kuku di cat', 11, 20);
INSERT INTO `pelanggaran` VALUES (62, 'Izin keluar saat proses belajar berlangsung dan tidak kembali', 8, 10);
INSERT INTO `pelanggaran` VALUES (63, 'Pulang tanpa izin', 8, 10);

-- ----------------------------
-- Table structure for pelanggaran_data
-- ----------------------------
DROP TABLE IF EXISTS `pelanggaran_data`;
CREATE TABLE `pelanggaran_data`  (
  `id_pelanggaran_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ptk` int(11) NOT NULL,
  `tgl` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `poin` int(11) NULL DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_tahun` int(11) NULL DEFAULT NULL,
  `id_sanksi` int(11) NULL DEFAULT NULL,
  `status` enum('Jatuh Sanksi','Disetujui','Anulir') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Jatuh Sanksi',
  PRIMARY KEY (`id_pelanggaran_data`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggaran_data
-- ----------------------------
INSERT INTO `pelanggaran_data` VALUES (1, 2, 11, 8, '2021-07-21 02:44:10', 5, '-', 3, 1, 'Jatuh Sanksi');
INSERT INTO `pelanggaran_data` VALUES (2, 10, 10, 8, '2021-07-21 02:44:12', 5, '', 3, 1, 'Jatuh Sanksi');
INSERT INTO `pelanggaran_data` VALUES (3, 47, 6, 8, '2021-07-21 02:44:16', 5, 'catatan', 3, 1, 'Jatuh Sanksi');
INSERT INTO `pelanggaran_data` VALUES (4, 35, 11, 1, '2021-07-20 19:45:51', 7, '', 3, 2, 'Jatuh Sanksi');
INSERT INTO `pelanggaran_data` VALUES (5, 20, 11, 1, '2021-07-20 19:48:33', 40, 'percobaan', 3, 8, 'Jatuh Sanksi');

-- ----------------------------
-- Table structure for ptk
-- ----------------------------
DROP TABLE IF EXISTS `ptk`;
CREATE TABLE `ptk`  (
  `id_ptk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ptk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_ptk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ptk
-- ----------------------------
INSERT INTO `ptk` VALUES (1, 'SUPRIATNA, M.Pd\r');
INSERT INTO `ptk` VALUES (2, 'DENI IRAWAN, S.Pd.I\r');
INSERT INTO `ptk` VALUES (3, 'ELINA APIANI, A.Md\r');
INSERT INTO `ptk` VALUES (4, 'IIS SABIAH, S.Pd., M.Hum\r');
INSERT INTO `ptk` VALUES (5, 'SLAMET RIYADI, S.T\r');
INSERT INTO `ptk` VALUES (6, 'MONI MORITHA ZELLY, M.Pd,');
INSERT INTO `ptk` VALUES (7, 'Asep Ramdani');
INSERT INTO `ptk` VALUES (8, 'Fazrin Tauvan, S.Psi.');

-- ----------------------------
-- Table structure for sanksi
-- ----------------------------
DROP TABLE IF EXISTS `sanksi`;
CREATE TABLE `sanksi`  (
  `id_sanksi` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_sanksi_id` int(11) NOT NULL,
  `nama_sanksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `min_poin` int(11) NOT NULL,
  `max_poin` int(11) NOT NULL,
  PRIMARY KEY (`id_sanksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sanksi
-- ----------------------------
INSERT INTO `sanksi` VALUES (1, 1, 'Dicatat dan Konseling', 1, 5);
INSERT INTO `sanksi` VALUES (2, 2, 'Peringatan Lisan', 6, 10);
INSERT INTO `sanksi` VALUES (3, 2, 'Peringatan Tertulis dengan perjanjian', 11, 15);
INSERT INTO `sanksi` VALUES (4, 3, 'Pemanggilan orang tua dengan perjanjian siswa diatas materai', 16, 20);
INSERT INTO `sanksi` VALUES (5, 3, 'Perjanjian orang tua dengan perjanjian siswa diatas materai', 21, 25);
INSERT INTO `sanksi` VALUES (6, 3, 'Skorsing selama 3 hari', 26, 30);
INSERT INTO `sanksi` VALUES (7, 3, 'Skorsing selama 7 hari', 31, 35);
INSERT INTO `sanksi` VALUES (8, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu 2 (dua) minggu', 36, 40);
INSERT INTO `sanksi` VALUES (9, 3, 'diserahkan kepada orang tua untuk dibina dalam jangka waktu 1 (satu) bulan', 41, 90);
INSERT INTO `sanksi` VALUES (10, 3, 'dikembalikan kepada orang tua (keluar dari SMK Bakti Nusantara 666)', 90, 100);

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_siswa` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (6, '18191207084', 'Indra Mahesa', 'L', 'Bandung', '2003-01-30', 'Bumi Harapan', '085321757616');
INSERT INTO `siswa` VALUES (10, '181912070085', 'Nita Oktapiani', 'P', 'Sumedang', '2021-07-12', 'Taman Bukit Makmur', '085321757616');
INSERT INTO `siswa` VALUES (11, '123456789', 'Asep', 'L', 'Garut', '1998-09-06', 'Kp. Cipondoh Girang', '085795331159');

-- ----------------------------
-- Table structure for tahun
-- ----------------------------
DROP TABLE IF EXISTS `tahun`;
CREATE TABLE `tahun`  (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_aktif` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_tahun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tahun
-- ----------------------------
INSERT INTO `tahun` VALUES (1, '2019 - 2020', 0);
INSERT INTO `tahun` VALUES (2, '2020 - 2021', 0);
INSERT INTO `tahun` VALUES (3, '2021 - 2022', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','kesiswaan','bk','walikelas','siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_ref` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '$2y$10$Zd3ej2ecBoE/8HxbHZQlDOm9cfWruDdZHFjYpG6eZftf8QHdWD.W2', 'admin', 7);
INSERT INTO `user` VALUES (3, 'kesiswaan1', '$2y$10$VPeaUiFLzGU79sd10BY1H.TH5ik5sHkmuNrN4WvvtkyckO9KtGSsG', 'kesiswaan', 1);
INSERT INTO `user` VALUES (4, '123456789', '$2y$10$jhL.BxU9HmIl1SJ71tDEt.qWkT6tVPB7M7l2kcrAPzfgxo5lrvLsK', 'siswa', 11);
INSERT INTO `user` VALUES (6, 'bk1', '$2y$10$kUbZf0VCoqETe8crLnBpJOa3SWJ8aOrMdeHplWtvsa7bZAv.rMbLu', 'bk', 8);
INSERT INTO `user` VALUES (9, '18191207084', '$2y$10$23fbpsh33oNGuymYgrmZPuvBZ11g5Rd9xiqE3T1N8H/f7JummN3Ze', 'siswa', 6);
INSERT INTO `user` VALUES (10, 'slametriyadi', '$2y$10$VY70d4lQ5fHePg3DcZia1OIgSHDN0irvpe7n04/ltQ7wZbw7gAIEy', 'walikelas', 5);

-- ----------------------------
-- Table structure for wali_kelas
-- ----------------------------
DROP TABLE IF EXISTS `wali_kelas`;
CREATE TABLE `wali_kelas`  (
  `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_ptk` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_wali_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wali_kelas
-- ----------------------------
INSERT INTO `wali_kelas` VALUES (1, 2, 9);
INSERT INTO `wali_kelas` VALUES (2, 4, 12);
INSERT INTO `wali_kelas` VALUES (3, 5, 11);
INSERT INTO `wali_kelas` VALUES (5, 3, 13);

SET FOREIGN_KEY_CHECKS = 1;
