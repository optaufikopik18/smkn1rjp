-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Feb 2018 pada 12.18
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn1rjp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `stok` int(3) NOT NULL,
  `status_barang` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok`, `status_barang`) VALUES
('10117001', 'Baju Praktek TKJ', '50000', 19, 'aktif'),
('10117002', 'Baju Praktek TKR', '85000', 20, 'aktif'),
('10117003', 'Baju Praktek TGB', '50000', 20, 'aktif'),
('10117004', 'Baju Praktek AK', '55000', 20, 'aktif'),
('10117005', 'Baju Praktek PM', '50000', 20, 'aktif'),
('10117006', 'Celana HItam', '40000', 19, 'aktif'),
('10117007', 'Dasi', '8000', 8, 'aktif'),
('10117008', 'Sabuk', '6500', 16, 'aktif'),
('10117009', 'Skoder ', '5500', 17, 'aktif'),
('10117010', 'Topi', '12500', 0, 'aktif'),
('10117011', 'Atribut Pramuka ', '100000', 20, 'aktif'),
('10117012', 'Rompi', '40000', 17, 'aktif'),
('10117013', 'Logo Sekolah', '2000', 6, 'aktif'),
('10117014', 'Logo Merah Putih', '1000', 7, 'aktif'),
('10117015', 'Tip - Ex (kenko)', '3500', 12, 'aktif'),
('10117016', 'Bolpoin Standard AE-7', '2000', 22, 'aktif'),
('10117017', 'Pensil 2B -Â FaberÂ Castle', '3000', 11, 'aktif'),
('10117018', 'Serutan', '1000', 1, 'aktif'),
('10117019', 'Isi Pensil', '4000', 17, 'aktif'),
('10117020', 'Busur', '2500', 13, 'aktif'),
('10117021', 'Pensil Mekanik (pentel)', '9000', 15, 'aktif'),
('10117022', 'Penghapus Pentel', '2000', 12, 'aktif'),
('10117023', 'Stabillo', '3000', 12, 'aktif'),
('10117024', 'Buku Gambar A3', '7000', 20, 'aktif'),
('10117025', 'Kertas Gambar A3', '1500', 20, 'aktif'),
('10117026', 'Milimeter Block', '7000', 19, 'aktif'),
('10117027', 'Kertas Milimeter Block', '1000', 19, 'aktif'),
('10117028', 'Penghapus Boxy', '6000', 15, 'aktif'),
('10117029', 'Kertas Folio Bergaris', '500', 48, 'aktif'),
('10117030', 'Penggaris 30 cm', '4000', 15, 'aktif'),
('10117031', 'Penggaris 15 cm', '2000', 15, 'aktif'),
('10117032', 'Gantungan HP', '3000', 10, 'aktif'),
('10117033', 'Stiker', '1000', 20, 'aktif'),
('10117034', 'Pin Besar', '5000', 10, 'aktif'),
('10117035', 'Pin Kecil', '2000', 10, 'aktif'),
('10117036', 'Pin Sedang', '3000', 10, 'aktif'),
('10117037', 'Gelas', '20000', 10, 'aktif'),
('10117038', 'Kotak Pensil', '8000', 10, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_order` varchar(25) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `harga_barang` decimal(10,0) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_order`, `id_barang`, `harga_barang`, `kuantitas`, `total`) VALUES
('OR/290118/0001', '10117018', '1000', 1, '1000'),
('OR/290118/0001', '10117013', '2000', 2, '4000'),
('OR/290118/0002', '10117010', '12500', 1, '12500'),
('OR/290118/0002', '10117013', '2000', 1, '2000'),
('OR/300118/0003', '10117007', '7000', 2, '14000'),
('OR/300118/0003', '10117013', '2000', 1, '2000'),
('OR/050218/0004', '10117018', '1000', 1, '1000'),
('OR/060218/0005', '10117010', '12500', 14, '175000'),
('OR/060218/0006', '10117010', '12500', 4000, '50000000'),
('OR/060218/0007', '10117018', '1000', 7, '7000'),
('OR/090218/0008', '10117019', '4000', 1, '4000'),
('OR/090218/0008', '10117017', '3000', 1, '3000'),
('OR/140218/0009', '10117019', '4000', 1, '4000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(25) NOT NULL,
  `tingkat` varchar(25) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `status_kelas` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `jurusan`, `ruangan`, `status_kelas`) VALUES
('KA01', 'X', 'AK', '1', 'aktif'),
('KA02', 'X', 'PM', '1', 'aktif'),
('KA03', 'X', 'TGB', '1', 'aktif'),
('KA04', 'X', 'TKR', '1', 'aktif'),
('KA05', 'X', 'TKJ', '1', 'aktif'),
('KA06', 'X', 'AK', '2', 'aktif'),
('KA07', 'X', 'AK', '3', 'aktif'),
('KA08', 'X', 'AK', '4', 'aktif'),
('KA09', 'XI', 'AK', '1', 'aktif'),
('KA10', 'XI', 'AK', '2', 'aktif'),
('KA11', 'XI', 'AK', '3', 'aktif'),
('KA12', 'XI', 'AK', '4', 'aktif'),
('KA13', 'XII', 'AK', '1', 'aktif'),
('KA14', 'XII', 'AK', '2', 'aktif'),
('KA15', 'XII', 'AK', '3', 'aktif'),
('KA16', 'XII', 'AK', '4', 'aktif'),
('KA17', 'X', 'PM', '2', 'aktif'),
('KA18', 'X', 'PM', '3', 'aktif'),
('KA19', 'X', 'PM', '4', 'aktif'),
('KA20', 'XI', 'PM', '1', 'aktif'),
('KA21', 'XI', 'PM', '2', 'aktif'),
('KA22', 'XI', 'PM', '3', 'aktif'),
('KA23', 'XI', 'PM', '4', 'aktif'),
('KA24', 'XII', 'PM', '1', 'aktif'),
('KA25', 'XII', 'PM', '2', 'aktif'),
('KA26', 'XII', 'PM', '3', 'aktif'),
('KA27', 'XII', 'PM', '4', 'aktif'),
('KA28', 'X', 'TGB', '2', 'aktif'),
('KA29', 'X', 'TGB', '3', 'aktif'),
('KA30', 'X', 'TGB', '4', 'aktif'),
('KA31', 'XI', 'TGB', '1', 'aktif'),
('KA32', 'XI', 'TGB', '2', 'aktif'),
('KA33', 'XI', 'TGB', '3', 'aktif'),
('KA34', 'XI', 'TGB', '4', 'aktif'),
('KA35', 'XII', 'TGB', '1', 'aktif'),
('KA36', 'XII', 'TGB', '2', 'aktif'),
('KA37', 'XII', 'TGB', '3', 'aktif'),
('KA38', 'XII', 'TGB', '4', 'aktif'),
('KA39', 'X', 'TKR', '2', 'aktif'),
('KA40', 'X', 'TKR', '3', 'aktif'),
('KA41', 'X', 'TKR', '4', 'aktif'),
('KA42', 'XI', 'TKR', '1', 'aktif'),
('KA43', 'XI', 'TKR', '2', 'aktif'),
('KA44', 'XI', 'TKR', '3', 'aktif'),
('KA45', 'XI', 'TKR', '4', 'aktif'),
('KA46', 'XII', 'TKR', '1', 'aktif'),
('KA47', 'XII', 'TKR', '2', 'aktif'),
('KA48', 'XII', 'TKR', '3', 'aktif'),
('KA49', 'XII', 'TKR', '4', 'aktif'),
('KA50', 'X', 'TKJ', '2', 'aktif'),
('KA51', 'X', 'TKJ', '3', 'aktif'),
('KA52', 'X', 'TKJ', '4', 'aktif'),
('KA53', 'XI', 'TKJ', '1', 'aktif'),
('KA54', 'XI', 'TKJ', '2', 'aktif'),
('KA55', 'XI', 'TKJ', '3', 'aktif'),
('KA56', 'XI', 'TKJ', '4', 'aktif'),
('KA57', 'XII', 'TKJ', '1', 'aktif'),
('KA58', 'XII', 'TKJ', '2', 'aktif'),
('KA59', 'XII', 'TKJ', '3', 'aktif'),
('KA60', 'XII', 'TKJ', '4', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_order` varchar(25) NOT NULL,
  `id_siswa` varchar(25) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` decimal(10,0) NOT NULL,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_order`, `id_siswa`, `tgl_pembelian`, `jumlah`, `id_petugas`) VALUES
('OR/050218/0004', 'SW-18-0001', '2018-02-05 09:55:30', '1000', 'PT-007'),
('OR/060218/0005', 'SW-18-0001', '2018-02-06 03:23:07', '175000', 'PT-007'),
('OR/060218/0006', 'SW-18-0001', '2018-02-06 03:24:34', '50000000', 'PT-007'),
('OR/060218/0007', 'SW-18-0003', '2018-02-06 03:28:51', '7000', 'PT-007'),
('OR/090218/0008', 'SW-18-0001', '2018-02-09 04:14:46', '7000', 'PT-007'),
('OR/140218/0009', 'SW-18-0001', '2018-02-14 03:53:29', '4000', 'PT-007'),
('OR/290118/0001', 'SW-18-0002', '2018-01-28 23:55:06', '5000', 'PT-007'),
('OR/290118/0002', 'SW-18-0001', '2018-01-28 23:55:57', '14500', 'PT-007'),
('OR/300118/0003', 'SW-18-0001', '2018-01-30 02:15:03', '16000', 'PT-007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status_petugas` enum('aktif','nonaktif') NOT NULL,
  `hak_akses` enum('admin','koperasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nip`, `nama`, `username`, `password`, `status_petugas`, `hak_akses`) VALUES
('PT-001', '197701262010012003 ', 'Reni Dirgahari', 'dirgahari1', '9fddee2dfbb5a910b96edf3b5d9ba020', 'aktif', 'admin'),
('PT-007', '196312151983031013', 'Lilis Kurniati', 'kurniati1', '42163b4623db0cb079b6c2fe73c488e9', 'aktif', 'koperasi'),
('PT-008', '14585458', 'Ahmad Safe\'i, S.IP', 'ahmad1', '25786794351d14fe0814b32fe03dfe7d', 'nonaktif', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `status_siswa` enum('aktif','nonaktif') NOT NULL,
  `tgl_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `uid`, `nis`, `nama`, `nohp`, `id_kelas`, `status_siswa`, `tgl_pembuatan`, `id_petugas`) VALUES
('SW-18-0001', '1946062320', '125154065', 'Dian Tri Handayani', '+6281323066414', 'KA27', 'aktif', '2018-01-28 23:52:27', 'PT-007'),
('SW-18-0002', '1945516160', '122162205', 'Fauzan Zaman', '+6282316318723', 'KA43', 'aktif', '2018-01-28 23:53:49', 'PT-007'),
('SW-18-0003', '1945615744', '123456789', 'Udin Petot', '+6281221184422', 'KA15', 'aktif', '2018-02-06 03:27:28', 'PT-007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_siswa` varchar(10) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `jenis` enum('tarik','tambah','belanja') NOT NULL,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_siswa`, `saldo`, `nominal`, `jenis`, `id_petugas`) VALUES
('TR01-0001', '2018-01-28 23:54:18', 'SW-18-0002', '45000', '45000', 'tambah', 'PT-007'),
('TR01-0002', '2018-01-28 23:54:32', 'SW-18-0001', '100000', '100000', 'tambah', 'PT-007'),
('TR01-0003', '2018-02-06 03:22:06', 'SW-18-0001', '1000053500', '1000000000', 'tambah', 'PT-007'),
('TR01-0004', '2018-02-06 03:28:14', 'SW-18-0003', '2000000000', '2000000000', 'tambah', 'PT-007'),
('TR01-0005', '2018-02-07 10:15:59', 'SW-18-0002', '50000', '10000', 'tambah', 'PT-007'),
('TR01-0006', '2018-02-09 03:51:37', 'SW-18-0001', '949883500', '5000', 'tambah', 'PT-007'),
('TR01-0007', '2018-02-09 03:51:46', 'SW-18-0001', '949888500', '5000', 'tambah', 'PT-007'),
('TR01-0008', '2018-02-09 03:55:37', 'SW-18-0001', '949898500', '10000', 'tambah', 'PT-007'),
('TR01-0009', '2018-02-09 03:57:32', 'SW-18-0001', '949908500', '10000', 'tambah', 'PT-007'),
('TR01-0010', '2018-02-09 03:57:37', 'SW-18-0001', '949918500', '10000', 'tambah', 'PT-007'),
('TR01-0011', '2018-02-09 03:58:01', 'SW-18-0001', '949923500', '5000', 'tambah', 'PT-007'),
('TR01-0012', '2018-02-09 04:01:28', 'SW-18-0001', '949928500', '5000', 'tambah', 'PT-007'),
('TR01-0013', '2018-02-09 04:04:10', 'SW-18-0001', '949933500', '5000', 'tambah', 'PT-007'),
('TR01-0014', '2018-02-14 03:52:16', 'SW-18-0001', '949906500', '5000', 'tambah', 'PT-007'),
('TR02-0001', '2018-01-28 23:56:32', 'SW-18-0001', '70500', '15000', 'tarik', 'PT-007'),
('TR02-0002', '2018-02-07 10:15:24', 'SW-18-0003', '1999983000', '10000', 'tarik', 'PT-007'),
('TR02-0003', '2018-02-09 04:06:10', 'SW-18-0001', '949908500', '25000', 'tarik', 'PT-007'),
('TR02-0004', '2018-02-14 03:52:45', 'SW-18-0001', '949806500', '100000', 'tarik', 'PT-007'),
('TR03-0001', '2018-01-28 23:55:06', 'SW-18-0002', '40000', '5000', 'belanja', 'PT-007'),
('TR03-0002', '2018-01-28 23:55:59', 'SW-18-0001', '85500', '14500', 'belanja', 'PT-007'),
('TR03-0003', '2018-01-30 02:15:03', 'SW-18-0001', '54500', '16000', 'belanja', 'PT-007'),
('TR03-0004', '2018-02-05 09:55:30', 'SW-18-0001', '53500', '1000', 'belanja', 'PT-007'),
('TR03-0005', '2018-02-06 03:23:07', 'SW-18-0001', '999878500', '175000', 'belanja', 'PT-007'),
('TR03-0006', '2018-02-06 03:24:36', 'SW-18-0001', '949878500', '50000000', 'belanja', 'PT-007'),
('TR03-0007', '2018-02-06 03:28:53', 'SW-18-0003', '1999993000', '7000', 'belanja', 'PT-007'),
('TR03-0008', '2018-02-09 04:14:46', 'SW-18-0001', '949901500', '7000', 'belanja', 'PT-007'),
('TR03-0009', '2018-02-14 03:53:29', 'SW-18-0001', '949802500', '4000', 'belanja', 'PT-007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `fk_barang1` (`id_barang`),
  ADD KEY `fk_order1` (`id_order`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_petugas3` (`id_petugas`),
  ADD KEY `fk_nasabah2` (`id_siswa`),
  ADD KEY `fk_order1` (`id_order`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_petugas2` (`id_petugas`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_nasabah1` (`id_siswa`),
  ADD KEY `fk_petugas1` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_order1` FOREIGN KEY (`id_order`) REFERENCES `pembelian` (`id_order`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_nasabah2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `fk_petugas3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_petugas2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_nasabah1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `fk_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
