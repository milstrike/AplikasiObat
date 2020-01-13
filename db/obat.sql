-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Agu 2017 pada 18.16
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bon`
--

CREATE TABLE IF NOT EXISTS `bon` (
  `id` int(11) NOT NULL,
  `id_bon` text NOT NULL,
  `tanggal` text NOT NULL,
  `periode` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bon`
--

INSERT INTO `bon` (`id`, `id_bon`, `tanggal`, `periode`) VALUES
(10, 'BON-ZjsuO', '2017-09-08', '2017-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bon`
--

CREATE TABLE IF NOT EXISTS `detail_bon` (
  `id` int(11) NOT NULL,
  `id_bon` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lpbon`
--

CREATE TABLE IF NOT EXISTS `detail_lpbon` (
  `id` int(11) NOT NULL,
  `id_bon` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `jumlah_permintaan` text NOT NULL,
  `tanggal_permintaan` text NOT NULL,
  `penerimaan_lalu` text NOT NULL,
  `stok` text NOT NULL,
  `pemakaian` text NOT NULL,
  `rusak` text NOT NULL,
  `sisa_stok` text NOT NULL,
  `stok_optimum` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lpbon`
--

INSERT INTO `detail_lpbon` (`id`, `id_bon`, `id_obat`, `nama_obat`, `jumlah_permintaan`, `tanggal_permintaan`, `penerimaan_lalu`, `stok`, `pemakaian`, `rusak`, `sisa_stok`, `stok_optimum`) VALUES
(1, 'BON-DzqvJ', 'BET001', 'Betadine Ukuran Sedang', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(2, 'BON-DzqvJ', 'BET002', 'Betadine Ukuran Besar', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(3, 'BON-DzqvJ', 'BET003', 'Albendazole', '1110', '2017-07', '0', '650', '570', '50', '30', '1140'),
(4, 'BON-DzqvJ', 'VK001', 'Vicks Formula 44', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(5, 'BON-DzqvJ', 'AMOX_1', 'Amoxycillin', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(6, 'BON-DzqvJ', 'AMOX_2', 'Amoxycillin 10%', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(7, 'BON-DzqvJ', 'BOD_1', 'Bodrex Anak', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(8, 'BON-DzqvJ', 'BOD_2', 'Bodrex Dewasa', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(9, 'BON-NYIsC', '100101', 'Albendazole 400 mg', '-300', '2017-07', '0', '300', '0', '0', '300', '0'),
(10, 'BON-NYIsC', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(11, 'BON-0ysV8', '100101', 'Albendazole 400 mg', '-300', '2017-07', '0', '300', '0', '0', '300', '0'),
(12, 'BON-0ysV8', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(13, 'BON-Vnq8K', '100101', 'Albendazole 400 mg', '-300', '2017-07', '0', '0', '0', '0', '300', '0'),
(14, 'BON-Vnq8K', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(15, 'BON-L8qNN', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(16, 'BON-ho59o', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-07', '0', '0', '0', '0', '0', '0'),
(17, 'BON-UW7Z5', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-08', '0', '0', '0', '0', '0', '0'),
(18, 'BON-UW7Z5', '100101', 'Albendazole 400 mg', '-300', '2017-08', '0', '0', '0', '0', '300', '0'),
(19, 'BON-UW7Z5', '100102', 'Allopurinol 100 mg', '-350', '2017-08', '0', '0', '0', '0', '350', '0'),
(20, 'BON-UW7Z5', '100102', 'Allopurinol 100 mg', '-350', '2017-08', '0', '0', '0', '0', '350', '0'),
(21, 'BON-9eBjV', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-08', '0', '0', '0', '0', '0', '0'),
(22, 'BON-9eBjV', '100101', 'Albendazole 400 mg', '360', '2017-08', '0', '0', '220', '0', '80', '440'),
(23, 'BON-9eBjV', '100102', 'Allopurinol 100 mg', '550', '2017-08', '0', '0', '300', '0', '50', '600'),
(24, 'BON-9eBjV', '100102', 'Allopurinol 100 mg', '550', '2017-08', '0', '0', '300', '0', '50', '600'),
(25, 'BON-jwqqo', '100108', 'Amoksilin syr kering 125 mg/5 ml', '-160', '2017-08', '0', '0', '0', '0', '160', '0'),
(26, 'BON-jwqqo', '100101', 'Albendazole 400 mg', '-110', '2017-08', '0', '100', '0', '0', '110', '0'),
(27, 'BON-jwqqo', '100102', 'Allopurinol 100 mg', '-60', '2017-08', '0', '40', '0', '0', '60', '0'),
(28, 'BON-jwqqo', '100104', 'Ambroxol 30 mg', '-170', '2017-08', '0', '105', '0', '0', '170', '0'),
(29, 'BON-jwqqo', '100204', 'Benzocain Jelly', '-100', '2017-08', '0', '0', '0', '0', '100', '0'),
(30, 'BON-jwqqo', '100202', 'Betametason krem', '-80', '2017-08', '0', '0', '0', '0', '80', '0'),
(31, 'BON-jwqqo', '100303', 'Cetirizine 10 mg', '-200', '2017-08', '0', '0', '0', '0', '200', '0'),
(32, 'BON-jwqqo', '100401', 'Dexamethason 0,5 mg', '-170', '2017-08', '0', '0', '0', '0', '170', '0'),
(33, 'BON-jwqqo', '100413', 'Domperidon 10 mg', '-130', '2017-08', '0', '0', '0', '0', '130', '0'),
(34, 'BON-jwqqo', '100707', 'Gliserin', '-145', '2017-08', '0', '0', '0', '0', '145', '0'),
(35, 'BON-jwqqo', '100802', 'Haloperidol 1.5 mg', '-175', '2017-08', '0', '0', '0', '0', '175', '0'),
(36, 'BON-jwqqo', '100901', 'Ibuprofen 200 mg', '-130', '2017-08', '0', '0', '0', '0', '130', '0'),
(37, 'BON-ZjsuO', '100108', 'Amoksilin syr kering 125 mg/5 ml', '-160', '2017-09', '0', '0', '0', '0', '160', '0'),
(38, 'BON-ZjsuO', '100101', 'Albendazole 400 mg', '-120', '2017-09', '0', '70', '0', '0', '120', '0'),
(39, 'BON-ZjsuO', '100102', 'Allopurinol 100 mg', '30', '2017-09', '0', '0', '30', '0', '30', '60'),
(40, 'BON-ZjsuO', '100104', 'Ambroxol 30 mg', '-170', '2017-09', '0', '0', '0', '0', '170', '0'),
(41, 'BON-ZjsuO', '100204', 'Benzocain Jelly', '-80', '2017-09', '0', '0', '0', '0', '80', '0'),
(42, 'BON-ZjsuO', '100202', 'Betametason krem', '-60', '2017-09', '0', '0', '0', '0', '60', '0'),
(43, 'BON-ZjsuO', '100303', 'Cetirizine 10 mg', '-200', '2017-09', '0', '0', '0', '0', '200', '0'),
(44, 'BON-ZjsuO', '100401', 'Dexamethason 0,5 mg', '-105', '2017-09', '0', '10', '0', '0', '105', '0'),
(45, 'BON-ZjsuO', '100413', 'Domperidon 10 mg', '-100', '2017-09', '0', '0', '0', '0', '100', '0'),
(46, 'BON-ZjsuO', '100707', 'Gliserin', '-145', '2017-09', '0', '0', '0', '0', '145', '0'),
(47, 'BON-ZjsuO', '100802', 'Haloperidol 1.5 mg', '-151', '2017-09', '0', '0', '0', '0', '151', '0'),
(48, 'BON-ZjsuO', '100901', 'Ibuprofen 200 mg', '-80', '2017-09', '0', '0', '0', '0', '80', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lplpo`
--

CREATE TABLE IF NOT EXISTS `detail_lplpo` (
  `_id` int(11) NOT NULL,
  `id_laporan` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `satuan` text NOT NULL,
  `stok_awal` text NOT NULL,
  `penerimaan` text NOT NULL,
  `persediaan` text NOT NULL,
  `pemakaian` text NOT NULL,
  `rusak` text NOT NULL,
  `sisa_stok` text NOT NULL,
  `stok_optimum` text NOT NULL,
  `permintaan` text NOT NULL,
  `pemberian` text NOT NULL,
  `bon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lplpo`
--

INSERT INTO `detail_lplpo` (`_id`, `id_laporan`, `id_obat`, `nama_obat`, `satuan`, `stok_awal`, `penerimaan`, `persediaan`, `pemakaian`, `rusak`, `sisa_stok`, `stok_optimum`, `permintaan`, `pemberian`, `bon`) VALUES
(1, 'LPLPO - xnBpY', '100108', 'Amoksilin syr kering 125 mg/5 ml', 'Botol', '180', '0', '180', '20', '0', '160', '40', '0', '0', '0'),
(2, 'LPLPO - xnBpY', '100101', 'Albendazole 400 mg', 'Tablet', '0', '0', '0', '30', '0', '10', '60', '50', '0', '0'),
(3, 'LPLPO - xnBpY', '100102', 'Allopurinol 100 mg', 'Tablet', '0', '0', '0', '30', '0', '20', '60', '40', '0', '0'),
(4, 'LPLPO - xnBpY', '100104', 'Ambroxol 30 mg', 'Tablet', '150', '0', '150', '85', '0', '65', '170', '105', '0', '0'),
(5, 'LPLPO - xnBpY', '100204', 'Benzocain Jelly', 'Tube', '100', '0', '100', '0', '0', '100', '0', '0', '0', '0'),
(6, 'LPLPO - xnBpY', '100202', 'Betametason krem', 'Tube', '120', '0', '120', '40', '0', '80', '80', '0', '0', '0'),
(7, 'LPLPO - xnBpY', '100303', 'Cetirizine 10 mg', 'Tablet', '200', '0', '200', '0', '0', '200', '0', '0', '0', '0'),
(8, 'LPLPO - xnBpY', '100401', 'Dexamethason 0,5 mg', 'Tablet', '170', '0', '170', '0', '0', '170', '0', '0', '0', '0'),
(9, 'LPLPO - xnBpY', '100413', 'Domperidon 10 mg', 'Tablet', '190', '0', '190', '60', '0', '130', '120', '0', '0', '0'),
(10, 'LPLPO - xnBpY', '100707', 'Gliserin', 'Tube', '145', '0', '145', '0', '0', '145', '0', '0', '0', '0'),
(11, 'LPLPO - xnBpY', '100802', 'Haloperidol 1.5 mg', 'Tablet', '175', '0', '175', '0', '0', '175', '0', '0', '0', '0'),
(12, 'LPLPO - xnBpY', '100901', 'Ibuprofen 200 mg', 'Botol', '200', '0', '200', '70', '0', '130', '140', '10', '0', '0'),
(13, 'LPLPO - 1iUxU', '100108', 'Amoksilin syr kering 125 mg/5 ml', 'Botol', '0', '0', '0', '0', '0', '160', '0', '0', '0', '0'),
(14, 'LPLPO - 1iUxU', '100101', 'Albendazole 400 mg', 'Tablet', '50', '50', '100', '60', '0', '50', '120', '70', '0', '0'),
(15, 'LPLPO - 1iUxU', '100102', 'Allopurinol 100 mg', 'Tablet', '0', '40', '40', '0', '0', '30', '0', '-60', '0', '0'),
(16, 'LPLPO - 1iUxU', '100104', 'Ambroxol 30 mg', 'Tablet', '0', '105', '105', '0', '0', '170', '0', '0', '0', '0'),
(17, 'LPLPO - 1iUxU', '100204', 'Benzocain Jelly', 'Tube', '0', '0', '0', '20', '0', '80', '40', '0', '0', '0'),
(18, 'LPLPO - 1iUxU', '100202', 'Betametason krem', 'Tube', '0', '0', '0', '20', '0', '60', '40', '0', '0', '0'),
(19, 'LPLPO - 1iUxU', '100303', 'Cetirizine 10 mg', 'Tablet', '0', '0', '0', '0', '0', '200', '0', '0', '0', '0'),
(20, 'LPLPO - 1iUxU', '100401', 'Dexamethason 0,5 mg', 'Tablet', '0', '0', '0', '75', '0', '95', '150', '55', '0', '0'),
(21, 'LPLPO - 1iUxU', '100413', 'Domperidon 10 mg', 'Tablet', '0', '0', '0', '30', '0', '100', '60', '0', '0', '0'),
(22, 'LPLPO - 1iUxU', '100707', 'Gliserin', 'Tube', '0', '0', '0', '0', '0', '145', '0', '0', '0', '0'),
(23, 'LPLPO - 1iUxU', '100802', 'Haloperidol 1.5 mg', 'Tablet', '0', '0', '0', '24', '0', '151', '48', '0', '0', '0'),
(24, 'LPLPO - 1iUxU', '100901', 'Ibuprofen 200 mg', 'Botol', '0', '10', '10', '60', '0', '80', '120', '40', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE IF NOT EXISTS `detail_resep` (
  `id` int(11) NOT NULL,
  `no_resep` text NOT NULL,
  `tanggal` text NOT NULL,
  `umur` text NOT NULL,
  `dokter` text NOT NULL,
  `nama_obat` text NOT NULL,
  `no_batch` text NOT NULL,
  `dosis` text NOT NULL,
  `keterangan` text NOT NULL,
  `asuransi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id`, `no_resep`, `tanggal`, `umur`, `dokter`, `nama_obat`, `no_batch`, `dosis`, `keterangan`, `asuransi`) VALUES
(6, 'AP-010', '2017-07-01', '22', 'Almira', 'Ambroxol 30 mg', 'BAT001', '15', '3x3 sehari', 'Mandiri'),
(7, 'AP-010', '2017-07-01', '22', 'Almira', 'Ibuprofen 200 mg', 'BAT013', '10', '2x1 pagi dan malam', 'Mandiri'),
(8, 'AP-006', '2017-07-01', '32', 'Almira', 'Albendazole 400 mg', 'BAT002', '30', '3x3 sehari', 'BPJS Kesehatan'),
(9, 'AP-006', '2017-07-01', '32', 'Almira', 'Allopurinol 100 mg', 'BAT003', '30', '3x3 sehari', 'BPJS Kesehatan'),
(10, 'AP-006', '2017-07-01', '32', 'Almira', 'Domperidon 10 mg', 'BAT008', '60', '3x1 sehari', 'Mandiri'),
(11, 'AP-006', '2017-07-01', '32', 'Almira', 'Ambroxol 30 mg', 'BAT001', '40', '2x1 pagi dan malam', 'Mandiri'),
(12, 'AP-002', '2017-07-01', '25', 'Sinta', 'Amoksilin syr kering 125 mg/5 ml', 'BAT112', '20', '2x2 pagi dan malam', 'Mandiri'),
(13, 'AP-002', '2017-07-01', '25', 'Sinta', 'Ibuprofen 200 mg', 'BAT013', '60', '3x1 sesudah makan', 'Mandiri'),
(14, 'AP-001', '2017-07-01', '19', 'Almira', 'Ambroxol 30 mg', 'BAT001', '30', '3x1 sesudah makan', 'Mandiri'),
(15, 'AP-001', '2017-07-01', '19', 'Almira', 'Betametason krem', 'BAT005', '40', '2x2 sebelum dan sesudah makan', 'Mandiri'),
(16, 'AP-003', '2017-08-15', '18', 'Sinta', 'Betametason krem', 'BAT005', '20', '2x1 pagi dan malam', 'BPJS Kesehatan'),
(17, 'AP-003', '2017-08-15', '18', 'Sinta', 'Dexamethason 0,5 mg', 'BAT007', '30', '3x1 setelah makan', 'BPJS Kesehatan'),
(18, 'AP-008', '2017-08-15', '27', 'Almira', 'Albendazole 400 mg', 'BAT002', '10', '1x1 sebelum tidur malam', 'Mandiri'),
(19, 'AP-009', '2017-08-15', '33', 'Evy', 'Albendazole 400 mg', 'BAT002', '50', '3x1 sebelum makan', 'BPJS Kesehatan'),
(20, 'AP-004', '2017-08-16', '27', 'Almira', 'Dexamethason 0,5 mg', 'BAT007', '45', '3x3 sesudah makan', 'BPJS Kesehatan'),
(21, 'AP-004', '2017-08-16', '27', 'Almira', 'Ibuprofen 200 mg', 'BAT112', '60', '3xx1 sebelum makan', 'BPJS Kesehatan'),
(22, 'AP-009', '2017-08-16', '33', 'Evy', 'Benzocain Jelly', 'BAT004', '20', '1x1 sebelumm tidur', 'Mandiri'),
(23, 'AP-009', '2017-08-16', '33', 'Evy', 'Domperidon 10 mg', 'BAT008', '30', '3x3 sebelum makan', 'Mandiri'),
(24, 'AP-009', '2017-08-16', '33', 'Evy', 'Haloperidol 1.5 mg', 'BAT010', '24', '2x2 pagi dan malam', 'Mandiri'),
(25, 'AP-003', '2017-09-08', '18', 'Sinta', 'Allopurinol 100 mg', 'BAT003', '30', '3x3 sebelum makan', 'BPJS Kesehatan'),
(26, 'AP-010', '2017-08-20', '23', 'Sinta', 'Albendazole 400 mg', 'BAT777', '1', '1x sehari pada jam yang sama', 'Mandiri'),
(27, 'AP-009', '2017-08-20', '33', 'Sinta', 'Albendazole 400 mg', 'BAT777', '1', '1x sehari pada jam yang sama', 'BPJS Kesehatan'),
(28, 'AP-005', '2017-08-20', '28', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', '1x  setelah makan pada jam yang sama', 'BPJS Kesehatan'),
(29, 'AP-001', '2017-08-23', '19', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', '3x1 setelah makan', 'Mandiri'),
(30, 'AP-001', '2017-08-23', '19', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', 'sekalisehari', 'Mandiri'),
(31, 'AP-010', '2017-08-27', '23', 'Sinta', 'Albendazole 400 mg', 'BAT777', '10', '3x1 setelah makan', 'Mandiri'),
(32, 'AP-010', '2017-08-27', '23', 'Sinta', 'Albendazole 400 mg', 'BAT777', '10', '3x1 setelah makan', 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id` int(11) NOT NULL,
  `id_retur` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `batch` text NOT NULL,
  `jumlah` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `id_poli` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nip`, `nama`, `id_poli`, `alamat`, `telepon`) VALUES
(3, '3125311010', 'Evy', 'POL001', 'Sleman, Yogyakarta', '081234564890'),
(4, '3125311011', 'Sinta', 'POL002', 'Bantul, Yogyakarta', '081234543456'),
(5, '3125311012', 'Almira', 'POL003', 'Sleman, Yogyakarta', '081234564876');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang_obat`
--

CREATE TABLE IF NOT EXISTS `gudang_obat` (
  `_id` int(11) NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `batch` text NOT NULL,
  `tanggal_kadaluarsa` text NOT NULL,
  `kadaluarsa` text NOT NULL,
  `stok` text NOT NULL,
  `rusak` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gudang_obat`
--

INSERT INTO `gudang_obat` (`_id`, `id_obat`, `nama_obat`, `batch`, `tanggal_kadaluarsa`, `kadaluarsa`, `stok`, `rusak`) VALUES
(4, '100102', 'Allopurinol 100 mg', 'BAT003', '2017-11-08', '0', '0', '0'),
(5, '100104', 'Ambroxol 30 mg', 'BAT001', '2017-10-24', '0', '65', '0'),
(6, '100204', 'Benzocain Jelly', 'BAT004', '2017-11-16', '0', '80', '0'),
(7, '100202', 'Betametason krem', 'BAT005', '2017-12-22', '0', '60', '0'),
(8, '100303', 'Cetirizine 10 mg', 'BAT006', '2017-11-16', '0', '190', '0'),
(9, '100401', 'Dexamethason 0,5 mg', 'BAT007', '2017-12-31', '0', '95', '0'),
(10, '100413', 'Domperidon 10 mg', 'BAT008', '2017-10-25', '0', '100', '0'),
(11, '100707', 'Gliserin', 'BAT009', '2017-11-01', '0', '145', '0'),
(12, '100802', 'Haloperidol 1.5 mg', 'BAT010', '2017-10-09', '0', '151', '0'),
(13, '100901', 'Ibuprofen 200 mg', 'BAT013', '2017-12-09', '0', '80', '0'),
(14, '100108', 'Amoksilin syr kering 125 mg/5 ml', 'BAT112', '2018-01-18', '0', '160', '0'),
(16, '100101', 'Albendazole 400 mg', 'BAT777', '2017-11-25', '0', '25', '0'),
(17, '100102', 'Allopurinol 100 mg', 'BAT789', '2017-11-29', '0', '30', '0'),
(18, '100104', 'Ambroxol 30 mg', 'BAT908', '2017-12-29', '0', '105', '0'),
(19, '100101', 'Albendazole 400 mg', 'BAT', '2017-11-22', '0', '70', '0'),
(20, '100401', 'Dexamethason 0,5 mg', 'BAT1', '2017-11-22', '0', '10', '0'),
(21, '100102', 'Allopurinol 100 mg', 'BAT89', '2017-10-19', '0', '90', '0'),
(22, '100204', 'Benzocain Jelly', 'BAT80', '2017-11-16', '0', '80', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartustok`
--

CREATE TABLE IF NOT EXISTS `kartustok` (
  `id` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `masuk` text NOT NULL,
  `keluar` text NOT NULL,
  `stok_akhir` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kartustok`
--

INSERT INTO `kartustok` (`id`, `tanggal`, `id_obat`, `nama_obat`, `masuk`, `keluar`, `stok_akhir`, `keterangan`) VALUES
(10, '2017/07/01', '100104', 'Ambroxol 30 mg', '150', '0', '150', '07/2017'),
(11, '2017/07/01', '100204', 'Benzocain Jelly', '100', '0', '100', '07/2017'),
(12, '2017/07/01', '100202', 'Betametason krem', '120', '0', '120', '07/2017'),
(13, '2017/07/01', '100303', 'Cetirizine 10 mg', '200', '0', '200', '07/2017'),
(14, '2017/07/01', '100401', 'Dexamethason 0,5 mg', '170', '0', '170', '07/2017'),
(15, '2017/07/01', '100413', 'Domperidon 10 mg', '190', '0', '190', '07/2017'),
(16, '2017/07/01', '100707', 'Gliserin', '145', '0', '145', '07/2017'),
(17, '2017/07/01', '100802', 'Haloperidol 1.5 mg', '175', '0', '175', '07/2017'),
(18, '2017/07/01', '100901', 'Ibuprofen 200 mg', '200', '0', '200', '07/2017'),
(19, '2017/07/01', '100108', 'Amoksilin syr kering 125 mg/5 ml', '180', '0', '180', '07/2017'),
(20, '2017/07/01', '100104', 'Ambroxol 30 mg', '0', '15', '135', '07/2017'),
(21, '2017/07/01', '100901', 'Ibuprofen 200 mg', '0', '10', '190', '07/2017'),
(22, '2017/07/01', '100101', 'Albendazole 400 mg', '0', '30', '10', '07/2017'),
(23, '2017/07/01', '100102', 'Allopurinol 100 mg', '0', '30', '20', '07/2017'),
(24, '2017/07/01', '100413', 'Domperidon 10 mg', '0', '60', '130', '07/2017'),
(25, '2017/07/01', '100104', 'Ambroxol 30 mg', '0', '40', '95', '07/2017'),
(26, '2017/07/01', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '20', '160', '07/2017'),
(27, '2017/07/01', '100901', 'Ibuprofen 200 mg', '0', '60', '130', '07/2017'),
(28, '2017/07/01', '100104', 'Ambroxol 30 mg', '0', '30', '65', '07/2017'),
(29, '2017/07/01', '100202', 'Betametason krem', '0', '40', '80', '07/2017'),
(30, '2017/08/15', '100101', 'Albendazole 400 mg', '50', '0', '60', '08/2017'),
(31, '2017/08/15', '100101', 'Albendazole 400 mg', '50', '0', '110', '08/2017'),
(32, '2017/08/15', '100102', 'Allopurinol 100 mg', '40', '0', '60', '08/2017'),
(33, '2017/08/15', '100104', 'Ambroxol 30 mg', '105', '0', '170', '08/2017'),
(34, '2017/08/15', '100901', 'Ibuprofen 200 mg', '10', '0', '140', '08/2017'),
(35, '2017/08/15', '100202', 'Betametason krem', '0', '20', '60', '08/2017'),
(36, '2017/08/15', '100401', 'Dexamethason 0,5 mg', '0', '30', '140', '08/2017'),
(37, '2017/08/15', '100101', 'Albendazole 400 mg', '0', '10', '100', '08/2017'),
(38, '2017/08/15', '100101', 'Albendazole 400 mg', '0', '50', '50', '08/2017'),
(39, '2017/08/16', '100401', 'Dexamethason 0,5 mg', '0', '45', '95', '08/2017'),
(40, '2017/08/16', '100901', 'Ibuprofen 200 mg', '0', '60', '80', '08/2017'),
(41, '2017/08/16', '100204', 'Benzocain Jelly', '0', '20', '80', '08/2017'),
(42, '2017/08/16', '100413', 'Domperidon 10 mg', '0', '30', '100', '08/2017'),
(43, '2017/08/16', '100802', 'Haloperidol 1.5 mg', '0', '24', '151', '08/2017'),
(44, '2017/09/08', '100102', 'Allopurinol 100 mg', '0', '30', '30', '09/2017'),
(45, '2017/09/08', '100101', 'Albendazole 400 mg', '70', '0', '120', '09/2017'),
(46, '2017/09/08', '100401', 'Dexamethason 0,5 mg', '10', '0', '105', '09/2017'),
(47, '2017/09/08', '100102', 'Allopurinol 100 mg', '90', '0', '120', '09/2017'),
(48, '2017/09/08', '100204', 'Benzocain Jelly', '80', '0', '160', '09/2017'),
(49, '2017/08/20', '100101', 'Albendazole 400 mg', '0', '1', '119', '08/2017'),
(50, '2017/08/20', '100101', 'Albendazole 400 mg', '0', '1', '118', '08/2017'),
(51, '2017/08/20', '100101', 'Albendazole 400 mg', '0', '1', '117', '08/2017'),
(52, '2017/08/23', '100101', 'Albendazole 400 mg', '0', '1', '116', '08/2017'),
(53, '2017/08/23', '100101', 'Albendazole 400 mg', '0', '1', '115', '08/2017'),
(54, '2017/08/27', '100101', 'Albendazole 400 mg', '0', '10', '105', '08/2017'),
(55, '2017/08/27', '100101', 'Albendazole 400 mg', '0', '10', '95', '08/2017'),
(56, '2017/08/27', '100303', 'Cetirizine 10 mg', '0', '10', '190', '08/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `id_user` text NOT NULL,
  `nama_user` text NOT NULL,
  `aktivitas` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1625 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `tanggal`, `id_user`, `nama_user`, `aktivitas`) VALUES
(1, '2017-07-27 09:02:45', 'NP001', 'Hani K. Faizah', 'Flush Table Log'),
(2, '2017-07-27 09:02:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(3, '2017-07-27 09:02:52', 'NP001', 'Hani K. Faizah', 'Menambah Data Retur dengan ID: RTR-VLj0z, Tanggal: 2017-07-27, Jumlah: 0'),
(4, '2017-07-27 09:02:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(5, '2017-07-27 09:02:55', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-yaMyC, Tanggal: 2017-07-27'),
(6, '2017-07-27 09:02:55', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(7, '2017-07-27 09:16:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(8, '2017-07-27 09:16:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(9, '2017-07-27 09:17:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(10, '2017-07-27 09:17:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Penyimpanan'),
(11, '2017-07-27 09:17:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Penyimpanan'),
(12, '2017-07-27 09:18:01', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(13, '2017-07-27 09:18:28', 'NP001', 'Hani K. Faizah', 'Menambah data Satuan Kemasan: ID: SAT001, Satuan Kemasan: Kotak @ 100'),
(14, '2017-07-27 09:18:29', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(15, '2017-07-27 09:18:39', 'NP001', 'Hani K. Faizah', 'Menambah data Satuan Kemasan: ID: SAT002, Satuan Kemasan: Botol 60 ml'),
(16, '2017-07-27 09:18:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(17, '2017-07-27 09:18:43', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(18, '2017-07-27 09:18:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(19, '2017-07-27 09:18:53', 'NP001', 'Hani K. Faizah', 'Memilih data Satuan Kemasan dengan ID: 7'),
(20, '2017-07-27 09:18:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(21, '2017-07-27 09:19:02', 'NP001', 'Hani K. Faizah', 'Mengupdate data Satuan Kemasan dengan ID(7): ID: SK001, Satuan Kemasan: Kotak @ 100'),
(22, '2017-07-27 09:19:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(23, '2017-07-27 09:19:05', 'NP001', 'Hani K. Faizah', 'Memilih data Satuan Kemasan dengan ID: 8'),
(24, '2017-07-27 09:19:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(25, '2017-07-27 09:19:12', 'NP001', 'Hani K. Faizah', 'Mengupdate data Satuan Kemasan dengan ID(8): ID: SK002, Satuan Kemasan: Botol 60 ml'),
(26, '2017-07-27 09:19:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(27, '2017-07-27 09:19:16', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(28, '2017-07-27 09:19:32', 'NP001', 'Hani K. Faizah', 'Menambah data Satuan dengan ID Satuan: SAT001, Satuan: Tablet, ID Satuan Kemasan: SK001'),
(29, '2017-07-27 09:19:32', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(30, '2017-07-27 09:19:40', 'NP001', 'Hani K. Faizah', 'Menambah data Satuan dengan ID Satuan: SAT002, Satuan: Botol, ID Satuan Kemasan: SK002'),
(31, '2017-07-27 09:19:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(32, '2017-07-27 09:19:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Penyimpanan'),
(33, '2017-07-27 09:20:00', 'NP001', 'Hani K. Faizah', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK01, Nama Penyimpanan: Rak 01'),
(34, '2017-07-27 09:20:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Penyimpanan'),
(35, '2017-07-27 09:20:07', 'NP001', 'Hani K. Faizah', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK02, Nama Penyimpanan: Rak 02'),
(36, '2017-07-27 09:20:08', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Penyimpanan'),
(37, '2017-07-27 09:20:11', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(38, '2017-07-27 09:20:31', 'NP001', 'Hani K. Faizah', 'Menambah data Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, ID Satuan: SAT001Harga : 305, ID Penyimpanan: RAK01'),
(39, '2017-07-27 09:20:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(40, '2017-07-27 09:20:52', 'NP001', 'Hani K. Faizah', 'Menambah data Obat dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, ID Satuan: SAT002Harga : 2445, ID Penyimpanan: RAK02'),
(41, '2017-07-27 09:20:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(42, '2017-07-27 09:20:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(43, '2017-07-27 09:21:14', 'NP001', 'Hani K. Faizah', 'Menambah Data Stok Gudang Obat dengan ID: 100101, Nama Obat: Albendazole 400 mg, No Batch:BAT001, Tanggal Kadaluarsa: 2017-11-22, Jumlah Stok: 300'),
(44, '2017-07-27 09:21:14', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Akhir: 300'),
(45, '2017-07-27 09:21:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(46, '2017-07-27 09:21:29', 'NP001', 'Hani K. Faizah', 'Menambah Data Stok Gudang Obat dengan ID: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, No Batch:BAT002, Tanggal Kadaluarsa: 2017-10-31, Jumlah Stok: 0'),
(47, '2017-07-27 09:21:29', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, Stok Akhir: 0'),
(48, '2017-07-27 09:21:30', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(49, '2017-07-27 09:21:39', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Stok Gudang Obat dengan ID: 1, Status Kadaluarsa: 1, Jumlah Stok: 300, Stok Rusak: 0'),
(50, '2017-07-27 09:21:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(51, '2017-07-27 09:21:41', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(52, '2017-07-27 09:21:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(53, '2017-07-27 09:21:52', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Retur dengan ID: RTR-VLj0z'),
(54, '2017-07-27 09:21:55', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Retur dengan ID: RTR-VLj0z'),
(55, '2017-07-27 09:22:49', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-yaMyC'),
(56, '2017-07-27 09:22:57', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-yaMyC'),
(57, '2017-07-27 09:23:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(58, '2017-07-27 09:23:20', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(59, '2017-07-27 09:23:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(60, '2017-07-27 09:23:26', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(61, '2017-07-27 09:24:28', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(62, '2017-07-27 09:24:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(63, '2017-07-27 09:24:37', 'NP001', 'Hani K. Faizah', 'Menghapus Data Bon dengan ID: BON-yaMyC'),
(64, '2017-07-27 09:24:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(65, '2017-07-27 09:24:39', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-NYIsC, Tanggal: 2017-07-27'),
(66, '2017-07-27 09:24:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(67, '2017-07-27 09:24:41', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-NYIsC'),
(68, '2017-07-27 09:26:50', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-NYIsC'),
(69, '2017-07-27 09:26:55', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-NYIsC'),
(70, '2017-07-27 09:26:59', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(71, '2017-07-27 09:28:16', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(72, '2017-07-27 09:28:20', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Stok Gudang Obat dengan ID: 1, Status Kadaluarsa: 0, Jumlah Stok: 300, Stok Rusak: 0'),
(73, '2017-07-27 09:28:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(74, '2017-07-27 09:28:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(75, '2017-07-27 09:29:02', 'NP001', 'Hani K. Faizah', 'user login'),
(76, '2017-07-27 09:29:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(77, '2017-07-27 09:29:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(78, '2017-07-27 09:29:08', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(79, '2017-07-27 09:29:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(80, '2017-07-27 09:29:19', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(81, '2017-07-27 09:29:25', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(82, '2017-07-27 09:29:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(83, '2017-07-27 09:29:30', 'NP001', 'Hani K. Faizah', 'Menghapus Data Bon dengan ID: BON-NYIsC'),
(84, '2017-07-27 09:29:30', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(85, '2017-07-27 09:29:32', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-0ysV8, Tanggal: 2017-07-27'),
(86, '2017-07-27 09:29:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(87, '2017-07-27 09:30:24', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(88, '2017-07-27 09:30:30', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(89, '2017-07-27 09:30:37', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(90, '2017-07-27 09:30:40', 'NP001', 'Hani K. Faizah', 'Menghapus Detaiil Bon dengan ID: BON-0ysV8dan ID Obat: 100108'),
(91, '2017-07-27 09:30:41', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(92, '2017-07-27 09:30:46', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(93, '2017-07-27 09:30:50', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-0ysV8'),
(94, '2017-07-27 09:30:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(95, '2017-07-27 09:30:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(96, '2017-07-27 09:31:07', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(97, '2017-07-27 09:31:23', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(98, '2017-07-27 09:31:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(99, '2017-07-27 09:31:31', 'NP001', 'Hani K. Faizah', 'Menghapus Data Stok Gudang Obat dengan ID: 1'),
(100, '2017-07-27 09:31:32', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(101, '2017-07-27 09:31:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(102, '2017-07-27 09:31:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(103, '2017-07-27 09:31:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(104, '2017-07-27 09:32:05', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(105, '2017-07-27 09:32:09', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(106, '2017-07-27 09:32:11', 'NP001', 'Hani K. Faizah', 'Menghapus Data Bon dengan ID: BON-0ysV8'),
(107, '2017-07-27 09:32:11', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(108, '2017-07-27 09:32:14', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-Vnq8K, Tanggal: 2017-07-27'),
(109, '2017-07-27 09:32:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(110, '2017-07-27 09:32:16', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-Vnq8K'),
(111, '2017-07-27 09:32:21', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-Vnq8K'),
(112, '2017-07-27 09:32:23', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(113, '2017-07-27 09:32:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(114, '2017-07-27 09:32:43', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(115, '2017-07-27 09:32:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(116, '2017-07-27 09:32:52', 'NP001', 'Hani K. Faizah', 'Menghapus data Obat dengan ID: 1'),
(117, '2017-07-27 09:32:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(118, '2017-07-27 09:33:01', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(119, '2017-07-27 09:33:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(120, '2017-07-27 09:33:11', 'NP001', 'Hani K. Faizah', 'Menghapus Data Bon dengan ID: BON-Vnq8K'),
(121, '2017-07-27 09:33:11', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(122, '2017-07-27 09:33:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(123, '2017-07-27 09:33:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(124, '2017-07-27 09:33:29', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(125, '2017-07-27 09:33:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Supplier'),
(126, '2017-07-27 09:33:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(127, '2017-07-27 09:33:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(128, '2017-07-27 09:33:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(129, '2017-07-27 09:33:50', 'NP001', 'Hani K. Faizah', 'Menghapus Data Retur dengan ID: 1'),
(130, '2017-07-27 09:33:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(131, '2017-07-27 09:33:53', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-L8qNN, Tanggal: 2017-07-27'),
(132, '2017-07-27 09:33:53', 'NP001', 'Hani K. Faizah', 'Menambah Data Bon dengan ID: BON-ho59o, Tanggal: 2017-07-27'),
(133, '2017-07-27 09:33:54', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(134, '2017-07-27 09:33:59', 'NP001', 'Hani K. Faizah', 'Menghapus Data Bon dengan ID: BON-ho59o'),
(135, '2017-07-27 09:33:59', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(136, '2017-07-27 09:34:01', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-L8qNN'),
(137, '2017-07-27 09:34:05', 'NP001', 'Hani K. Faizah', 'Mengupdate Data Bon dengan ID: BON-L8qNN'),
(138, '2017-07-27 14:12:17', 'NP001', 'Hani K. Faizah', 'user login'),
(139, '2017-07-27 14:12:17', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(140, '2017-07-27 14:12:28', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(141, '2017-07-27 14:12:34', 'NP001', 'Hani K. Faizah', 'Menghapus data Dokter dengan ID: 1'),
(142, '2017-07-27 14:12:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(143, '2017-07-27 14:12:38', 'NP001', 'Hani K. Faizah', 'Menghapus data Dokter dengan ID: 2'),
(144, '2017-07-27 14:12:39', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(145, '2017-07-27 14:13:10', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Poli'),
(146, '2017-07-27 14:13:19', 'NP001', 'Hani K. Faizah', 'Menambah data Poli dengan ID: POL001, Nama Poli: Poli Anak'),
(147, '2017-07-27 14:13:20', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Poli'),
(148, '2017-07-27 14:13:43', 'NP001', 'Hani K. Faizah', 'Menambah data Poli dengan ID: POL002, Nama Poli: Poli Gigi'),
(149, '2017-07-27 14:13:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Poli'),
(150, '2017-07-27 14:14:08', 'NP001', 'Hani K. Faizah', 'Menambah data Poli dengan ID: POL003, Nama Poli: Poli Umum'),
(151, '2017-07-27 14:14:08', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Poli'),
(152, '2017-07-27 14:14:13', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(153, '2017-07-27 14:15:01', 'NP001', 'Hani K. Faizah', 'Menambah Data Dokter denga NIP: 3125311010, Nama Dokter: Evy, ID Poli: POL001, Alamat: Sleman, Yogyakarta, No Telepon: 081234564890'),
(154, '2017-07-27 14:15:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(155, '2017-07-27 14:15:47', 'NP001', 'Hani K. Faizah', 'Menambah Data Dokter denga NIP: 3125311011, Nama Dokter: Sinta, ID Poli: POL002, Alamat: Bantul, Yogyakarta, No Telepon: 081234543456'),
(156, '2017-07-27 14:15:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(157, '2017-07-27 14:16:18', 'NP001', 'Hani K. Faizah', 'Menambah Data Dokter denga NIP: 3125311012, Nama Dokter: Almira, ID Poli: POL003, Alamat: Sleman, Yogyakarta, No Telepon: 081234564876'),
(158, '2017-07-27 14:16:19', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(159, '2017-07-27 14:16:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pegawai'),
(160, '2017-07-27 14:17:44', 'NP001', 'Hani K. Faizah', 'Menambah Data Pegawai dengan NIP: 3125311076, Nama: Erna Tri Wijayanti, S.Farm, Apt, Jenis Kelamin: Perempuan, Jabatan: Apoteker'),
(161, '2017-07-27 14:17:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pegawai'),
(162, '2017-07-27 14:17:55', 'NP001', 'Hani K. Faizah', 'Menambah Data Pegawai dengan NIP: 3125311077, Nama: Linda Darmawan, S.Farm, Jenis Kelamin: Perempuan, Jabatan: Asisten Apoteker'),
(163, '2017-07-27 14:17:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pegawai'),
(164, '2017-07-27 14:18:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data User'),
(165, '2017-07-27 14:18:37', 'NP001', 'Hani K. Faizah', 'Menambah data User dengan ID: NP002, Username: erna, NIP: 3125311076'),
(166, '2017-07-27 14:18:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data User'),
(167, '2017-07-27 14:18:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pegawai'),
(168, '2017-07-27 14:18:48', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(169, '2017-07-27 14:18:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan Kemasan'),
(170, '2017-07-27 14:19:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Satuan'),
(171, '2017-07-27 14:19:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(172, '2017-07-27 14:19:42', 'NP001', 'Hani K. Faizah', 'Menambah data Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, ID Satuan: SAT001Harga : 305, ID Penyimpanan: RAK01'),
(173, '2017-07-27 14:19:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(174, '2017-07-27 14:19:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(175, '2017-07-27 14:19:58', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(176, '2017-07-27 14:20:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(177, '2017-07-27 14:20:54', 'NP001', 'Hani K. Faizah', 'Menambah Data Stok Gudang Obat dengan ID: 100101, Nama Obat: Albendazole 400 mg, No Batch:BAT002, Tanggal Kadaluarsa: 2017-12-08, Jumlah Stok: 300'),
(178, '2017-07-27 14:20:55', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Akhir: 300'),
(179, '2017-07-27 14:20:55', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(180, '2017-07-27 14:20:59', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(181, '2017-07-27 14:22:13', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(182, '2017-07-27 14:22:19', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Supplier'),
(183, '2017-07-27 14:22:42', 'NP001', 'Hani K. Faizah', 'Menambah Data Supplier dengan ID: SUP002, Nama Supplier: Gudang Farmasi Yogyakarta, Alamat: Yogyakarta, Telepon: 0274555777'),
(184, '2017-07-27 14:22:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Supplier'),
(185, '2017-07-27 14:22:52', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(186, '2017-07-27 14:22:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(187, '2017-07-27 14:27:15', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(188, '2017-07-27 14:27:18', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER1'),
(189, '2017-07-27 14:27:23', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(190, '2017-07-27 14:27:39', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(191, '2017-07-27 14:28:13', 'NP001', 'Hani K. Faizah', 'Menambah data Obat dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, ID Satuan: SAT001Harga : 86, ID Penyimpanan: RAK01'),
(192, '2017-07-27 14:28:13', 'NP001', 'Hani K. Faizah', 'Menambah data Obat dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, ID Satuan: SAT001Harga : 86, ID Penyimpanan: RAK01'),
(193, '2017-07-27 14:28:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(194, '2017-07-27 14:28:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(195, '2017-07-27 14:28:53', 'NP001', 'Hani K. Faizah', 'Menambah Data Stok Gudang Obat dengan ID: 100102, Nama Obat: Allopurinol 100 mg, No Batch:BAT003, Tanggal Kadaluarsa: 2017-11-08, Jumlah Stok: 350'),
(196, '2017-07-27 14:28:53', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Akhir: 350'),
(197, '2017-07-27 14:28:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(198, '2017-08-01 14:29:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(199, '2017-08-01 14:29:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(200, '2017-08-01 14:29:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(201, '2017-08-01 14:29:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(202, '2017-08-01 14:29:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Bon dengan ID: BON-L8qNN'),
(203, '2017-08-01 14:29:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(204, '2017-08-01 14:29:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Bon dengan ID: BON-UW7Z5, Tanggal: 2017-08-01'),
(205, '2017-08-01 14:29:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(206, '2017-08-01 14:29:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-UW7Z5'),
(207, '2017-08-01 14:30:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-UW7Z5'),
(208, '2017-08-01 14:30:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Detaiil Bon dengan ID: BON-UW7Z5dan ID Obat: 100108'),
(209, '2017-08-01 14:30:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Detaiil Bon dengan ID: BON-UW7Z5dan ID Obat: 100108'),
(210, '2017-08-01 14:30:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-UW7Z5'),
(211, '2017-08-01 14:30:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-UW7Z5'),
(212, '2017-08-01 14:31:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(213, '2017-08-01 14:31:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(214, '2017-08-01 14:31:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-UW7Z5'),
(215, '2017-08-01 14:32:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(216, '2017-08-01 14:32:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(217, '2017-08-01 14:32:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(218, '2017-08-01 14:33:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(219, '2017-08-01 14:33:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(220, '2017-08-01 14:33:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(221, '2017-08-01 14:33:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(222, '2017-08-01 14:33:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(223, '2017-08-01 14:34:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Masuk: 0, Stok Keluar: 150, Stok Akhir: 200, Keterangan: 08/2017'),
(224, '2017-08-01 14:34:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 100, Stok Akhir: 200, Keterangan: 08/2017'),
(225, '2017-08-01 14:34:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Masuk: 0, Stok Keluar: 150, Stok Akhir: 50, Keterangan: 08/2017'),
(226, '2017-08-01 14:34:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 2 resep dengan No Resep: AP-001'),
(227, '2017-08-01 14:34:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(228, '2017-08-01 14:34:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(229, '2017-08-01 14:35:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(230, '2017-08-01 14:35:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(231, '2017-08-01 14:35:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 120, Stok Akhir: 80, Keterangan: 08/2017'),
(232, '2017-08-01 14:35:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 1 resep dengan No Resep: AP-002'),
(233, '2017-08-01 14:35:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(234, '2017-08-01 14:35:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(235, '2017-08-01 14:35:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Bon dengan ID: BON-UW7Z5'),
(236, '2017-08-01 14:35:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(237, '2017-08-01 14:35:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Bon dengan ID: BON-9eBjV, Tanggal: 2017-08-01'),
(238, '2017-08-01 14:35:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(239, '2017-08-01 14:35:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(240, '2017-08-01 14:36:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(241, '2017-08-01 14:36:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(242, '2017-08-01 14:36:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(243, '2017-08-01 14:36:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(244, '2017-07-31 09:44:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(245, '2017-08-02 11:39:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(246, '2017-08-02 11:39:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(247, '2017-08-02 11:39:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(248, '2017-08-02 11:39:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(249, '2017-08-02 11:39:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(250, '2017-08-02 11:39:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(251, '2017-08-02 11:39:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(252, '2017-08-02 11:39:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(253, '2017-08-02 11:40:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(254, '2017-08-02 11:40:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(255, '2017-08-02 11:40:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(256, '2017-08-02 11:40:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(257, '2017-08-02 11:40:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(258, '2017-08-02 11:40:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(259, '2017-08-02 11:41:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(260, '2017-08-02 11:41:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(261, '2017-08-02 11:41:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(262, '2017-08-02 12:02:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(263, '2017-08-02 12:02:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(264, '2017-08-02 12:02:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(265, '2017-08-02 12:03:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(266, '2017-08-02 12:03:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(267, '2017-08-02 12:04:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(268, '2017-08-02 12:04:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(269, '2017-08-02 12:04:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(270, '2017-08-02 12:07:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(271, '2017-08-02 12:07:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(272, '2017-08-02 12:07:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(273, '2017-08-02 12:18:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(274, '2017-08-02 12:22:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(275, '2017-08-02 12:24:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(276, '2017-08-02 12:24:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(277, '2017-08-02 12:26:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(278, '2017-08-02 12:26:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(279, '2017-08-02 12:37:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(280, '2017-08-02 12:37:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(281, '2017-08-02 12:38:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(282, '2017-08-02 12:38:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(283, '2017-08-02 12:38:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(284, '2017-08-02 12:38:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(285, '2017-08-02 12:38:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(286, '2017-08-02 12:38:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(287, '2017-08-02 12:38:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(288, '2017-08-02 12:38:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(289, '2017-08-02 12:38:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(290, '2017-08-02 12:39:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(291, '2017-08-02 12:39:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(292, '2017-08-02 12:39:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(293, '2017-08-02 12:40:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(294, '2017-08-02 12:42:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(295, '2017-08-02 12:42:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(296, '2017-08-02 12:42:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(297, '2017-08-02 12:42:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(298, '2017-08-02 12:42:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(299, '2017-08-02 12:42:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(300, '2017-08-02 12:42:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(301, '2017-08-02 12:42:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(302, '2017-08-02 12:42:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(303, '2017-08-02 12:43:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(304, '2017-08-02 12:43:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(305, '2017-08-02 12:44:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(306, '2017-08-02 12:44:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(307, '2017-08-02 12:44:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(308, '2017-08-02 12:44:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(309, '2017-08-02 12:44:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(310, '2017-08-02 12:45:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(311, '2017-08-02 12:46:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(312, '2017-08-02 12:46:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(313, '2017-08-02 12:46:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(314, '2017-08-02 12:46:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(315, '2017-08-02 12:46:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(316, '2017-08-02 12:47:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(317, '2017-08-02 12:50:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(318, '2017-08-02 12:51:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(319, '2017-08-02 12:51:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(320, '2017-08-02 12:51:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(321, '2017-08-02 12:52:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(322, '2017-08-02 12:52:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-08-2017'),
(323, '2017-08-02 12:52:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-08-2017'),
(324, '2017-08-02 12:52:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(325, '2017-08-02 12:52:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Real data Kartu Stok'),
(326, '2017-08-02 12:52:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(327, '2017-08-02 12:53:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Retur dengan ID: RTR-tR5I5, Tanggal: 2017-08-02, Jumlah: 0'),
(328, '2017-08-02 12:53:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(329, '2017-08-02 12:53:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-tR5I5'),
(330, '2017-08-02 12:53:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(331, '2017-08-02 12:54:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(332, '2017-08-02 12:58:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(333, '2017-08-05 08:49:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(334, '2017-08-05 08:49:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(335, '2017-08-05 08:49:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(336, '2017-08-05 08:49:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(337, '2017-08-05 08:49:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(338, '2017-08-05 08:49:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(339, '2017-08-05 08:49:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(340, '2017-08-05 08:49:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(341, '2017-08-05 08:49:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(342, '2017-08-05 08:49:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(343, '2017-08-05 08:49:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(344, '2017-08-05 08:50:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(345, '2017-08-05 08:50:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(346, '2017-08-05 08:50:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(347, '2017-08-05 08:50:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(348, '2017-08-05 08:50:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(349, '2017-08-05 08:50:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(350, '2017-08-05 08:50:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(351, '2017-08-05 08:50:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(352, '2017-08-05 08:50:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(353, '2017-08-05 08:50:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(354, '2017-08-05 08:50:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(355, '2017-08-05 08:50:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Pengaturan Akun'),
(356, '2017-08-05 08:50:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(357, '2017-08-05 08:51:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(358, '2017-08-10 13:29:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(359, '2017-08-10 13:29:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(360, '2017-08-10 13:29:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Pengaturan Akun'),
(361, '2017-08-10 13:29:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(362, '2017-08-10 13:30:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(363, '2017-08-10 13:30:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(364, '2017-08-10 13:30:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(365, '2017-08-10 13:30:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(366, '2017-08-10 13:30:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(367, '2017-08-10 13:30:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(368, '2017-08-10 13:30:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(369, '2017-08-10 13:30:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(370, '2017-08-10 14:05:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(371, '2017-08-10 14:05:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(372, '2017-08-10 14:06:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(373, '2017-08-10 14:06:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Real data Kartu Stok'),
(374, '2017-08-10 14:06:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Real data Kartu Stok'),
(375, '2017-08-10 14:07:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Real data Kartu Stok'),
(376, '2017-08-10 14:07:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(377, '2017-08-10 14:07:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(378, '2017-08-10 14:09:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(379, '2017-08-10 14:09:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(380, '2017-08-10 14:09:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(381, '2017-08-10 14:10:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(382, '2017-08-10 14:44:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(383, '2017-08-10 14:44:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(384, '2017-08-10 14:44:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(385, '2017-08-10 14:44:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(386, '2017-08-10 14:44:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(387, '2017-08-10 14:44:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(388, '2017-08-10 14:45:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(389, '2017-08-10 14:45:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(390, '2017-08-10 14:45:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(391, '2017-08-10 14:45:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(392, '2017-08-10 14:45:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(393, '2017-08-10 14:45:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(394, '2017-08-10 14:46:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(395, '2017-08-10 14:46:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(396, '2017-08-10 14:46:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(397, '2017-08-10 14:46:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(398, '2017-08-10 14:47:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Supplier dengan ID: SUP003, Nama Supplier: Pedagang Besar Farmasi, Alamat: Yogyakarta, Telepon: 0274555788'),
(399, '2017-08-10 14:47:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(400, '2017-08-10 14:47:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Supplier dengan ID: 2'),
(401, '2017-08-10 14:47:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(402, '2017-08-10 14:47:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Supplier dengan ID: SUP002, Nama Supplier: Gudang Farmasi, Alamat: Yogyakarta, Telepon: 0274555777'),
(403, '2017-08-10 14:47:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(404, '2017-08-10 14:47:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(405, '2017-08-10 14:47:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(406, '2017-08-10 14:47:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(407, '2017-08-10 14:47:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(408, '2017-08-10 14:47:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(409, '2017-08-10 14:48:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(410, '2017-08-10 14:48:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Pengaturan Akun'),
(411, '2017-08-10 14:48:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(412, '2017-08-10 14:48:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(413, '2017-08-12 11:21:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(414, '2017-08-12 11:21:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(415, '2017-08-12 11:21:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(416, '2017-08-12 11:57:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(417, '2017-08-12 11:57:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(418, '2017-08-12 12:01:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(419, '2017-08-12 12:14:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(420, '2017-08-12 12:16:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(421, '2017-08-12 12:16:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(422, '2017-08-12 12:16:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(423, '2017-08-12 12:16:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(424, '2017-08-12 12:16:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(425, '2017-08-12 12:16:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(426, '2017-08-12 12:16:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(427, '2017-08-12 12:16:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(428, '2017-08-12 12:16:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(429, '2017-08-12 12:21:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(430, '2017-08-12 12:24:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(431, '2017-08-12 12:24:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(432, '2017-08-12 12:25:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(433, '2017-08-12 12:25:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengcetak data Resep dengan ID; 1'),
(434, '2017-08-12 12:25:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(435, '2017-08-12 12:27:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(436, '2017-08-12 12:27:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(437, '2017-08-12 12:27:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(438, '2017-08-12 12:31:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(439, '2017-08-12 12:34:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(440, '2017-08-12 12:34:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(441, '2017-08-12 12:43:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(442, '2017-08-12 12:44:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(443, '2017-08-12 12:44:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(444, '2017-08-12 12:44:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(445, '2017-08-12 12:44:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(446, '2017-08-12 14:35:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(447, '2017-08-12 14:35:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(448, '2017-08-12 14:36:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(449, '2017-08-12 14:36:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(450, '2017-08-12 14:36:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(451, '2017-08-12 14:36:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(452, '2017-08-12 14:36:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(453, '2017-08-12 14:36:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(454, '2017-08-12 14:38:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(455, '2017-08-12 14:38:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(456, '2017-08-12 14:38:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(457, '2017-08-12 14:38:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(458, '2017-08-12 14:38:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(459, '2017-08-12 14:38:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(460, '2017-08-12 14:41:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(461, '2017-08-12 14:41:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(462, '2017-08-12 14:41:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(463, '2017-08-13 19:37:30', 'NP001', 'Hani K. Faizah', 'user login'),
(464, '2017-08-13 19:37:31', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(465, '2017-08-13 19:55:56', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(466, '2017-08-13 19:59:54', 'NP001', 'Hani K. Faizah', 'user login'),
(467, '2017-08-13 19:59:54', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(468, '2017-08-13 20:01:18', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(469, '2017-08-13 20:01:25', 'NP001', 'Hani K. Faizah', 'user login'),
(470, '2017-08-13 20:01:25', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(471, '2017-08-13 20:01:50', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(472, '2017-08-13 20:01:57', 'NP001', 'Hani K. Faizah', 'user login'),
(473, '2017-08-13 20:01:57', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(474, '2017-08-13 20:05:42', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(475, '2017-08-13 20:05:53', 'NP001', 'Hani K. Faizah', 'user login'),
(476, '2017-08-13 20:05:53', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(477, '2017-08-13 20:06:27', 'NP001', 'Hani K. Faizah', 'user login'),
(478, '2017-08-13 20:06:27', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(479, '2017-08-13 20:09:26', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(480, '2017-08-13 20:10:28', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(481, '2017-08-13 20:11:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(482, '2017-08-13 20:14:31', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(483, '2017-08-13 20:17:40', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(484, '2017-08-13 20:19:30', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(485, '2017-08-13 20:19:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(486, '2017-08-13 20:19:50', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(487, '2017-08-13 20:19:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(488, '2017-08-13 20:19:54', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(489, '2017-08-13 20:21:10', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(490, '2017-08-13 20:21:13', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan');
INSERT INTO `log` (`id`, `tanggal`, `id_user`, `nama_user`, `aktivitas`) VALUES
(491, '2017-08-13 20:28:17', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(492, '2017-08-13 20:46:08', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(493, '2017-08-13 20:46:10', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(494, '2017-08-13 20:46:11', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(495, '2017-08-13 20:46:20', 'NP001', 'Hani K. Faizah', 'User Logout'),
(496, '2017-08-13 20:47:52', 'NP001', 'Hani K. Faizah', 'user login'),
(497, '2017-08-13 20:47:52', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(498, '2017-08-13 20:48:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(499, '2017-08-13 20:57:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(500, '2017-08-13 21:01:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(501, '2017-08-13 21:04:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(502, '2017-08-13 21:04:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(503, '2017-08-13 21:04:09', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(504, '2017-08-13 21:04:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(505, '2017-08-13 21:04:49', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(506, '2017-08-13 21:05:20', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(507, '2017-08-13 21:05:23', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: '),
(508, '2017-08-13 21:07:40', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(509, '2017-08-13 21:10:05', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(510, '2017-08-13 21:11:06', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(511, '2017-08-13 21:11:08', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(512, '2017-08-13 21:11:18', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(513, '2017-08-13 21:11:51', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(514, '2017-08-13 21:16:20', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(515, '2017-08-13 21:21:25', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(516, '2017-08-13 21:21:58', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(517, '2017-08-13 21:28:44', 'NP001', 'Hani K. Faizah', 'user login'),
(518, '2017-08-13 21:28:44', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(519, '2017-08-13 21:28:47', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(520, '2017-08-13 21:29:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(521, '2017-08-13 21:29:15', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(522, '2017-08-13 21:29:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(523, '2017-08-13 21:29:20', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pemakaian'),
(524, '2017-08-13 21:29:22', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(525, '2017-08-13 21:30:10', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(526, '2017-08-13 21:30:14', 'NP001', 'Hani K. Faizah', 'User Logout'),
(527, '2017-08-14 22:04:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(528, '2017-08-14 22:04:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(529, '2017-08-14 22:04:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(530, '2017-08-14 22:37:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(531, '2017-08-14 23:08:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(532, '2017-08-14 23:08:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(533, '2017-08-14 23:09:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(534, '2017-08-14 23:10:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(535, '2017-08-14 23:10:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(536, '2017-08-14 23:10:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(537, '2017-08-14 23:10:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(538, '2017-08-14 23:10:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mencari data Log User dengan kategori: 1 dan keyword: NP002'),
(539, '2017-08-14 23:11:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mencari data Log User dengan kategori: 1 dan keyword: '),
(540, '2017-08-14 23:11:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mencari data Log User dengan kategori: 1 dan keyword: NP002'),
(541, '2017-08-14 23:11:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(542, '2017-08-14 23:14:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 40, Stok Akhir: 40, Keterangan: 08/2017'),
(543, '2017-08-14 23:14:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 1 resep dengan No Resep: AP-001'),
(544, '2017-08-14 23:15:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(545, '2017-08-14 23:15:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(546, '2017-08-14 23:16:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(547, '2017-08-14 23:16:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(548, '2017-08-14 23:16:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(549, '2017-08-14 23:16:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Retur dengan ID: RTR-ga5vu, Tanggal: 2017-08-14, Jumlah: 0'),
(550, '2017-08-14 23:16:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(551, '2017-08-14 23:16:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-ga5vu'),
(552, '2017-08-14 23:17:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(553, '2017-08-14 23:17:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(554, '2017-08-14 23:17:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Retur dengan ID: 2'),
(555, '2017-08-14 23:17:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(556, '2017-08-14 23:17:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(557, '2017-08-14 23:17:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Detaiil Bon dengan ID: BON-9eBjVdan ID Obat: 100108'),
(558, '2017-08-14 23:17:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(559, '2017-08-14 23:18:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(560, '2017-08-14 23:18:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(561, '2017-08-14 23:18:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-08-2017'),
(562, '2017-08-14 23:18:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(563, '2017-08-14 23:19:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(564, '2017-08-14 23:20:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(565, '2017-08-14 23:20:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(566, '2017-08-14 23:20:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(567, '2017-08-14 23:20:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(568, '2017-08-14 23:20:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(569, '2017-08-14 23:20:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(570, '2017-08-14 23:21:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(571, '2017-08-14 23:22:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(572, '2017-08-14 23:23:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Real data Kartu Stok'),
(573, '2017-08-14 23:23:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(574, '2017-08-14 23:24:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Pengaturan Akun'),
(575, '2017-08-14 23:24:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(576, '2017-08-14 23:24:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Pengaturan Akun'),
(577, '2017-08-14 23:24:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(578, '2017-08-14 23:25:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pegawai dengan ID: 1'),
(579, '2017-08-14 23:25:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(580, '2017-08-14 23:25:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(581, '2017-08-14 23:25:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(582, '2017-08-15 10:34:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(583, '2017-08-15 10:34:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(584, '2017-08-15 10:41:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(585, '2017-08-15 10:41:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(586, '2017-08-15 10:41:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(587, '2017-08-15 10:52:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(588, '2017-08-15 10:52:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(589, '2017-08-15 10:52:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(590, '2017-08-15 10:52:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(591, '2017-08-15 10:53:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(592, '2017-08-15 10:53:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(593, '2017-08-15 10:53:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(594, '2017-08-15 10:53:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(595, '2017-08-15 10:53:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(596, '2017-08-15 10:53:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(597, '2017-08-15 10:53:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(598, '2017-08-15 10:53:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(599, '2017-08-15 10:54:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(600, '2017-08-15 10:55:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(601, '2017-08-15 10:57:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(602, '2017-08-15 10:57:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(603, '2017-08-15 10:59:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(604, '2017-08-15 10:59:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(605, '2017-08-15 10:59:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(606, '2017-08-15 10:59:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(607, '2017-08-15 10:59:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(608, '2017-08-15 10:59:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(609, '2017-07-01 13:54:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(610, '2017-07-01 13:54:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(611, '2017-07-01 13:54:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(612, '2017-07-01 13:54:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(613, '2017-07-01 13:54:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(614, '2017-07-01 13:54:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(615, '2017-07-01 13:54:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(616, '2017-07-01 13:54:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(617, '2017-07-01 13:55:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(618, '2017-07-01 13:55:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(619, '2017-07-01 13:55:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(620, '2017-07-01 13:55:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(621, '2017-07-01 13:55:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(622, '2017-07-01 13:55:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(623, '2017-07-01 13:55:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(624, '2017-07-01 13:55:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(625, '2017-07-01 13:55:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(626, '2017-07-01 13:56:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Poli dengan ID: POL004, Nama Poli: Poli Lansia'),
(627, '2017-07-01 13:56:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(628, '2017-07-01 13:56:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Poli dengan ID: POL005, Nama Poli: Poli KIA (Kesehatan Ibu dan Anak)'),
(629, '2017-07-01 13:56:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(630, '2017-07-01 13:56:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Poli dengan ID: POL006, Nama Poli: Poli Gizi'),
(631, '2017-07-01 13:56:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(632, '2017-07-01 13:57:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Poli dengan ID: POL007, Nama Poli: Poli Psikologi'),
(633, '2017-07-01 13:57:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(634, '2017-07-01 13:57:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Poli dengan ID: POL008, Nama Poli: Poli Laboratorium'),
(635, '2017-07-01 13:57:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(636, '2017-07-01 13:57:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(637, '2017-07-01 13:57:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(638, '2017-07-01 13:57:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(639, '2017-07-01 13:58:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(640, '2017-07-01 13:58:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(641, '2017-07-01 13:58:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(642, '2017-07-01 13:58:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(643, '2017-07-01 13:58:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(644, '2017-07-01 13:58:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(645, '2017-07-01 13:58:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(646, '2017-07-01 13:58:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(647, '2017-07-01 13:59:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(648, '2017-07-01 13:59:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(649, '2017-07-01 13:59:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(650, '2017-07-01 13:59:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Pasien dengan ID: 1'),
(651, '2017-07-01 13:59:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(652, '2017-07-01 14:00:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Pasien dengan ID: 1, Nama: Bella, Jenis Kelamin: Perempuan, Tempat Lahir: Bantul, Tanggal Lahir: 1998-02-13, Alamat: Bantul, Yogyakarta, Telepon: 081234564876'),
(653, '2017-07-01 14:00:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(654, '2017-07-01 14:00:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Pasien dengan ID: 2'),
(655, '2017-07-01 14:00:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(656, '2017-07-01 14:01:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Pasien dengan ID: 2, Nama: Gigi, Jenis Kelamin: Perempuan, Tempat Lahir: Kalimantan, Tanggal Lahir: 1991-08-15, Alamat: Sleman, Yogyakarta, Telepon: 08676747459'),
(657, '2017-07-01 14:01:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(658, '2017-07-01 14:01:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Pasien dengan ID: 3'),
(659, '2017-07-01 14:01:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(660, '2017-07-01 14:01:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Pasien dengan ID: 3, Nama: Anwar, Jenis Kelamin: Laki-laki, Tempat Lahir: Sleman, Tanggal Lahir: 1999-07-10, Alamat: Patangpuluhan, Yogyakarta, Telepon: 0274567837432'),
(661, '2017-07-01 14:01:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(662, '2017-07-01 14:02:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-004, Nama: Kendall, Jenis Kelamin: Perempuan, Tempat Lahir: Semarang, Tanggal Lahir: 1989-10-24, Alamat: Bantul, Yogyakarta, Telepon: 081234564890'),
(663, '2017-07-01 14:02:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(664, '2017-07-01 14:03:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-005, Nama: Kylie, Jenis Kelamin: Perempuan, Tempat Lahir: Surabaya, Tanggal Lahir: 1988-08-25, Alamat: Umbulharjo, Yogyakarta, Telepon: 0274567837'),
(665, '2017-07-01 14:03:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(666, '2017-07-01 14:03:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(667, '2017-07-01 14:04:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(668, '2017-07-01 14:04:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(669, '2017-07-01 14:04:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(670, '2017-07-01 14:05:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(671, '2017-07-01 14:05:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(672, '2017-07-01 14:05:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Pegawai dengan NIP: 3125311078, Nama: Faril Gunanti, S.Farm, Jenis Kelamin: Perempuan, Jabatan: Asisten Apoteker'),
(673, '2017-07-01 14:05:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(674, '2017-07-01 14:05:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Pegawai dengan NIP: 3125311079, Nama: Ambarsari Prihatiningsih, Jenis Kelamin: Perempuan, Jabatan: Asisten Apoteker'),
(675, '2017-07-01 14:05:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(676, '2017-07-01 14:06:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(677, '2017-07-01 14:06:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(678, '2017-07-01 14:06:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data User dengan ID: NP003, Username: faril, NIP: 3125311078'),
(679, '2017-07-01 14:06:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(680, '2017-07-01 14:07:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(681, '2017-07-01 14:07:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(682, '2017-07-01 14:08:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Satuan Kemasan dengan ID: 7'),
(683, '2017-07-01 14:08:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(684, '2017-07-01 14:09:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Satuan Kemasan dengan ID(7): ID: SK001, Satuan Kemasan: Kotak @ 30'),
(685, '2017-07-01 14:09:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(686, '2017-07-01 14:09:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Satuan Kemasan dengan ID: 8'),
(687, '2017-07-01 14:09:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(688, '2017-07-01 14:09:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Satuan Kemasan dengan ID(8): ID: SK002, Satuan Kemasan: Kotak @ 100'),
(689, '2017-07-01 14:09:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(690, '2017-07-01 14:09:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK003, Satuan Kemasan: Botol 100 ml'),
(691, '2017-07-01 14:09:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(692, '2017-07-01 14:10:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK004, Satuan Kemasan: Kotak @ 50'),
(693, '2017-07-01 14:10:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(694, '2017-07-01 14:10:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK005, Satuan Kemasan: Kotak @ 30 tab'),
(695, '2017-07-01 14:10:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(696, '2017-07-01 14:10:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK006, Satuan Kemasan: Botol 60 ml'),
(697, '2017-07-01 14:10:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(698, '2017-07-01 14:11:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK007, Satuan Kemasan: Kotak @ 10'),
(699, '2017-07-01 14:11:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(700, '2017-07-01 14:11:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK008, Satuan Kemasan: Botol 20 ml'),
(701, '2017-07-01 14:11:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(702, '2017-07-01 14:12:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK009, Satuan Kemasan: tube 5 gram'),
(703, '2017-07-01 14:12:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(704, '2017-07-01 14:12:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK010, Satuan Kemasan: Botol 500 ml'),
(705, '2017-07-01 14:12:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(706, '2017-07-01 14:12:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(707, '2017-07-01 14:13:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(708, '2017-07-01 14:13:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Satuan dengan ID: 8'),
(709, '2017-07-01 14:13:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(710, '2017-07-01 14:13:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengubah data Satuan dengan ID Satuan: SAT002, Satuan: Tablet, ID Satuan Kemasan: SK002'),
(711, '2017-07-01 14:13:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(712, '2017-07-01 14:14:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT003, Satuan: Botol, ID Satuan Kemasan: SK003'),
(713, '2017-07-01 14:14:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(714, '2017-07-01 14:14:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT004, Satuan: Tablet, ID Satuan Kemasan: SK004'),
(715, '2017-07-01 14:14:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(716, '2017-07-01 14:14:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT005, Satuan: Tablet, ID Satuan Kemasan: SK005'),
(717, '2017-07-01 14:14:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(718, '2017-07-01 14:15:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT006, Satuan: Botol, ID Satuan Kemasan: SK006'),
(719, '2017-07-01 14:15:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(720, '2017-07-01 14:15:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT007, Satuan: Biji, ID Satuan Kemasan: SK007'),
(721, '2017-07-01 14:15:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(722, '2017-07-01 14:16:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT008, Satuan: Flacon, ID Satuan Kemasan: SK008'),
(723, '2017-07-01 14:16:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(724, '2017-07-01 14:16:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT009, Satuan: Tube, ID Satuan Kemasan: SK009'),
(725, '2017-07-01 14:16:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(726, '2017-07-01 14:17:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT010, Satuan: Botol, ID Satuan Kemasan: SK010'),
(727, '2017-07-01 14:17:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(728, '2017-07-01 14:17:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(729, '2017-07-01 14:18:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(730, '2017-07-01 14:18:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK03, Nama Penyimpanan: Rak 03'),
(731, '2017-07-01 14:18:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(732, '2017-07-01 14:18:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK04, Nama Penyimpanan: Rak 04'),
(733, '2017-07-01 14:18:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(734, '2017-07-01 14:18:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK05, Nama Penyimpanan: Rak 05'),
(735, '2017-07-01 14:18:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(736, '2017-07-01 14:19:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK06, Nama Penyimpanan: Rak 06'),
(737, '2017-07-01 14:19:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(738, '2017-07-01 14:19:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK07, Nama Penyimpanan: Rak 07'),
(739, '2017-07-01 14:19:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(740, '2017-07-01 14:19:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK08, Nama Penyimpanan: Rak 08'),
(741, '2017-07-01 14:19:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(742, '2017-07-01 14:19:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK09, Nama Penyimpanan: Rak 09'),
(743, '2017-07-01 14:19:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(744, '2017-07-01 14:20:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK10, Nama Penyimpanan: Rak 10'),
(745, '2017-07-01 14:20:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(746, '2017-07-01 14:20:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(747, '2017-07-01 14:20:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 2'),
(748, '2017-07-01 14:20:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(749, '2017-07-01 14:20:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, ID Satuan: SAT010Harga : 2445, ID Penyimpanan: RAK01'),
(750, '2017-07-01 14:20:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(751, '2017-07-01 14:20:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 3'),
(752, '2017-07-01 14:20:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(753, '2017-07-01 14:20:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, ID Satuan: SAT010Harga : 305, ID Penyimpanan: RAK02'),
(754, '2017-07-01 14:20:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(755, '2017-07-01 14:20:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 4'),
(756, '2017-07-01 14:20:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(757, '2017-07-01 14:20:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, ID Satuan: SAT010Harga : 86, ID Penyimpanan: RAK03'),
(758, '2017-07-01 14:20:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(759, '2017-07-01 14:21:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 2'),
(760, '2017-07-01 14:21:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(761, '2017-07-01 14:21:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, ID Satuan: SAT006Harga : 2445, ID Penyimpanan: RAK01'),
(762, '2017-07-01 14:21:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(763, '2017-07-01 14:21:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 3'),
(764, '2017-07-01 14:21:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(765, '2017-07-01 14:21:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, ID Satuan: SAT001Harga : 305, ID Penyimpanan: RAK02'),
(766, '2017-07-01 14:21:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(767, '2017-07-01 14:22:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 4'),
(768, '2017-07-01 14:22:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(769, '2017-07-01 14:22:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, ID Satuan: SAT002Harga : 86, ID Penyimpanan: RAK03'),
(770, '2017-07-01 14:22:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(771, '2017-07-01 14:22:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100104, Nama Obat: Ambroxol 30 mg, ID Satuan: SAT002Harga : 125, ID Penyimpanan: RAK04'),
(772, '2017-07-01 14:22:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(773, '2017-07-01 14:23:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(774, '2017-07-01 14:23:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK011, Satuan Kemasan: Tube'),
(775, '2017-07-01 14:23:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(776, '2017-07-01 14:23:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(777, '2017-07-01 14:23:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT011, Satuan: Tube, ID Satuan Kemasan: SK011'),
(778, '2017-07-01 14:23:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(779, '2017-07-01 14:23:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(780, '2017-07-01 14:24:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100204, Nama Obat: Benzocain Jelly, ID Satuan: SAT011Harga : 86250, ID Penyimpanan: RAK05'),
(781, '2017-07-01 14:24:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(782, '2017-07-01 14:24:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(783, '2017-07-01 14:25:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan Kemasan: ID: SK012, Satuan Kemasan: Tube 5 gram'),
(784, '2017-07-01 14:25:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(785, '2017-07-01 14:25:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(786, '2017-07-01 14:26:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Satuan dengan ID Satuan: SAT012, Satuan: Tube, ID Satuan Kemasan: SK012'),
(787, '2017-07-01 14:26:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(788, '2017-07-01 14:26:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(789, '2017-07-01 14:26:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100202, Nama Obat: Betametason krem, ID Satuan: SAT012Harga : 1520, ID Penyimpanan: RAK06'),
(790, '2017-07-01 14:26:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(791, '2017-07-01 14:28:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100303, Nama Obat: Cetirizine 10 mg, ID Satuan: SAT004Harga : 11250, ID Penyimpanan: RAK07'),
(792, '2017-07-01 14:28:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(793, '2017-07-01 14:28:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100401, Nama Obat: Dexamethason 0,5 mg, ID Satuan: SAT002Harga : 68, ID Penyimpanan: RAK08'),
(794, '2017-07-01 14:28:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(795, '2017-07-01 14:29:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100413, Nama Obat: Domperidon 10 mg, ID Satuan: SAT002Harga : 167, ID Penyimpanan: RAK09'),
(796, '2017-07-01 14:29:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(797, '2017-07-01 14:30:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100707, Nama Obat: Gliserin, ID Satuan: SAT003Harga : 4180, ID Penyimpanan: RAK01'),
(798, '2017-07-01 14:30:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(799, '2017-07-01 14:30:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih data Obat dengan ID: 12'),
(800, '2017-07-01 14:30:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(801, '2017-07-01 14:30:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate data Obat dengan ID Obat: 100707, Nama Obat: Gliserin, ID Satuan: SAT012Harga : 4180, ID Penyimpanan: RAK10'),
(802, '2017-07-01 14:30:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(803, '2017-07-01 14:30:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(804, '2017-07-01 14:31:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK11, Nama Penyimpanan: Rak 11'),
(805, '2017-07-01 14:31:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(806, '2017-07-01 14:31:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK12, Nama Penyimpanan: Rak 12'),
(807, '2017-07-01 14:31:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(808, '2017-07-01 14:31:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK13, Nama Penyimpanan: Rak 13'),
(809, '2017-07-01 14:31:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(810, '2017-07-01 14:31:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK14, Nama Penyimpanan: Rak 14'),
(811, '2017-07-01 14:31:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(812, '2017-07-01 14:32:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Penyimpanan dengan ID Penyimpanan: RAK15, Nama Penyimpanan: Rak 15'),
(813, '2017-07-01 14:32:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(814, '2017-07-01 14:32:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(815, '2017-07-01 14:32:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100802, Nama Obat: Haloperidol 1.5 mg, ID Satuan: SAT002Harga : 69, ID Penyimpanan: RAK11'),
(816, '2017-07-01 14:32:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(817, '2017-07-01 14:33:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Obat dengan ID Obat: 100901, Nama Obat: Ibuprofen 200 mg, ID Satuan: SAT003Harga : 110, ID Penyimpanan: RAK12'),
(818, '2017-07-01 14:33:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(819, '2017-07-01 14:33:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(820, '2017-07-01 14:33:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(821, '2017-07-01 14:34:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(822, '2017-07-01 14:34:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(823, '2017-07-01 14:34:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(824, '2017-07-01 14:34:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(825, '2017-07-01 14:35:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100104, Nama Obat: Ambroxol 30 mg, No Batch:BAT001, Tanggal Kadaluarsa: 2017-10-24, Jumlah Stok: 150'),
(826, '2017-07-01 14:35:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100104, Nama Obat: Ambroxol 30 mg, Stok Akhir: 150'),
(827, '2017-07-01 14:35:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(828, '2017-07-01 14:36:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100204, Nama Obat: Benzocain Jelly, No Batch:BAT004, Tanggal Kadaluarsa: 2017-11-16, Jumlah Stok: 100'),
(829, '2017-07-01 14:36:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100204, Nama Obat: Benzocain Jelly, Stok Akhir: 100'),
(830, '2017-07-01 14:36:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(831, '2017-07-01 14:36:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100202, Nama Obat: Betametason krem, No Batch:BAT005, Tanggal Kadaluarsa: 2017-12-22, Jumlah Stok: 120'),
(832, '2017-07-01 14:36:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100202, Nama Obat: Betametason krem, Stok Akhir: 120'),
(833, '2017-07-01 14:36:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(834, '2017-07-01 14:37:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100303, Nama Obat: Cetirizine 10 mg, No Batch:BAT006, Tanggal Kadaluarsa: 2017-11-16, Jumlah Stok: 200'),
(835, '2017-07-01 14:37:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100303, Nama Obat: Cetirizine 10 mg, Stok Akhir: 200'),
(836, '2017-07-01 14:37:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(837, '2017-07-01 14:37:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100401, Nama Obat: Dexamethason 0,5 mg, No Batch:BAT007, Tanggal Kadaluarsa: 2017-12-31, Jumlah Stok: 170'),
(838, '2017-07-01 14:37:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100401, Nama Obat: Dexamethason 0,5 mg, Stok Akhir: 170'),
(839, '2017-07-01 14:37:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(840, '2017-07-01 14:38:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100413, Nama Obat: Domperidon 10 mg, No Batch:BAT008, Tanggal Kadaluarsa: 2017-10-25, Jumlah Stok: 190'),
(841, '2017-07-01 14:38:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100413, Nama Obat: Domperidon 10 mg, Stok Akhir: 190'),
(842, '2017-07-01 14:38:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(843, '2017-07-01 14:38:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100707, Nama Obat: Gliserin, No Batch:BAT009, Tanggal Kadaluarsa: 2017-11-01, Jumlah Stok: 145'),
(844, '2017-07-01 14:38:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100707, Nama Obat: Gliserin, Stok Akhir: 145'),
(845, '2017-07-01 14:38:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(846, '2017-07-01 14:39:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100802, Nama Obat: Haloperidol 1.5 mg, No Batch:BAT010, Tanggal Kadaluarsa: 2017-10-09, Jumlah Stok: 175'),
(847, '2017-07-01 14:39:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100802, Nama Obat: Haloperidol 1.5 mg, Stok Akhir: 175'),
(848, '2017-07-01 14:39:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(849, '2017-07-01 14:40:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Stok Gudang Obat dengan ID: 100901, Nama Obat: Ibuprofen 200 mg, No Batch:BAT013, Tanggal Kadaluarsa: 2017-12-09, Jumlah Stok: 200'),
(850, '2017-07-01 14:40:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: 100901, Nama Obat: Ibuprofen 200 mg, Stok Akhir: 200'),
(851, '2017-07-01 14:40:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(852, '2017-07-01 14:40:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(853, '2017-07-01 14:40:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(854, '2017-07-01 14:41:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, Stok Masuk: 180, Stok Keluar: 0, Stok Akhir: , Keterangan: '),
(855, '2017-07-01 14:41:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-9eBjV'),
(856, '2017-07-01 14:41:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(857, '2017-07-01 14:41:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(858, '2017-07-01 14:41:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(859, '2017-07-01 14:41:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(860, '2017-07-01 14:42:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(861, '2017-07-01 14:42:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(862, '2017-07-01 14:42:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-tR5I5'),
(863, '2017-07-01 14:42:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Retur dengan ID: 1'),
(864, '2017-07-01 14:42:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(865, '2017-07-01 14:42:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(866, '2017-07-01 14:42:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(867, '2017-07-01 14:43:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(868, '2017-07-01 14:43:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(869, '2017-07-01 14:43:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(870, '2017-07-01 14:43:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(871, '2017-07-01 14:43:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(872, '2017-07-01 14:43:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(873, '2017-07-01 14:43:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(874, '2017-07-01 14:43:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(875, '2017-07-01 14:44:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(876, '2017-07-01 14:44:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(877, '2017-07-01 14:44:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(878, '2017-07-01 14:44:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(879, '2017-07-01 14:44:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(880, '2017-07-01 14:44:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(881, '2017-07-01 14:44:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Supplier'),
(882, '2017-07-01 14:44:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(883, '2017-07-01 14:45:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(884, '2017-07-01 14:45:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(885, '2017-07-01 14:45:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(886, '2017-07-01 14:46:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(887, '2017-07-01 14:47:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(888, '2017-07-01 14:48:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(889, '2017-07-01 14:56:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(890, '2017-07-01 14:57:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-006, Nama: Elsa, Jenis Kelamin: Perempuan, Tempat Lahir: Jakarta, Tanggal Lahir: 1985-06-18, Alamat: Kulonprogo, Yogyakarta, Telepon: 0274555777'),
(891, '2017-07-01 14:57:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(892, '2017-07-01 14:57:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-007, Nama: Lily, Jenis Kelamin: Perempuan, Tempat Lahir: Samarinda, Tanggal Lahir: 1998-03-12, Alamat: Gunungkidul, Yogyakarta, Telepon: 0274567837'),
(893, '2017-07-01 14:57:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(894, '2017-07-01 14:58:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-008, Nama: Travis, Jenis Kelamin: Laki-laki, Tempat Lahir: Bandung, Tanggal Lahir: 1989-11-22, Alamat: Magelang, Telepon: 081225795547'),
(895, '2017-07-01 14:58:48', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(896, '2017-07-01 14:59:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-009, Nama: Asap, Jenis Kelamin: Laki-laki, Tempat Lahir: Cinere, Tanggal Lahir: 1984-07-25, Alamat: Semarang, Telepon: 081234564890'),
(897, '2017-07-01 14:59:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(898, '2017-07-01 15:00:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah data Pasien dengan ID: AP-010, Nama: Harry, Jenis Kelamin: Laki-laki, Tempat Lahir: Bandung, Tanggal Lahir: 1994-08-01, Alamat: Bandung, Telepon: 081234543456'),
(899, '2017-07-01 15:00:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(900, '2017-07-01 15:00:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(901, '2017-07-01 15:00:52', 'NP003', 'Faril Gunanti, S.Farm', 'user login'),
(902, '2017-07-01 15:00:53', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(903, '2017-07-01 15:01:02', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pegawai'),
(904, '2017-07-01 15:01:10', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data User'),
(905, '2017-07-01 15:01:15', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(906, '2017-07-01 15:01:41', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(907, '2017-07-01 15:01:42', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Penerimaan'),
(908, '2017-07-01 15:01:45', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Retur'),
(909, '2017-07-01 15:01:51', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pemakaian'),
(910, '2017-07-01 15:01:56', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu laporan transaksi');
INSERT INTO `log` (`id`, `tanggal`, `id_user`, `nama_user`, `aktivitas`) VALUES
(911, '2017-07-01 15:01:59', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(912, '2017-07-01 15:02:00', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(913, '2017-07-01 15:10:33', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(914, '2017-07-01 15:12:36', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(915, '2017-07-01 15:13:13', 'NP003', 'Faril Gunanti, S.Farm', 'Menghapus Data Stok Gudang Obat dengan ID: 2'),
(916, '2017-07-01 15:13:14', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(917, '2017-07-01 15:13:20', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(918, '2017-07-01 15:15:06', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100104, Nama Obat: Ambroxol 30 mg, Stok Masuk: 0, Stok Keluar: 15, Stok Akhir: 135, Keterangan: 07/2017'),
(919, '2017-07-01 15:15:07', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100901, Nama Obat: Ibuprofen 200 mg, Stok Masuk: 0, Stok Keluar: 10, Stok Akhir: 190, Keterangan: 07/2017'),
(920, '2017-07-01 15:15:07', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-010'),
(921, '2017-07-01 15:16:05', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(922, '2017-07-01 15:16:09', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(923, '2017-07-01 15:16:23', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(924, '2017-07-01 15:17:22', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 10, Keterangan: 07/2017'),
(925, '2017-07-01 15:17:22', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 20, Keterangan: 07/2017'),
(926, '2017-07-01 15:17:23', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-006'),
(927, '2017-07-01 15:17:27', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(928, '2017-07-01 15:17:31', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(929, '2017-07-01 15:18:05', 'NP003', 'Faril Gunanti, S.Farm', 'Mengcetak data Resep dengan ID; 6'),
(930, '2017-07-01 15:18:09', 'NP003', 'Faril Gunanti, S.Farm', 'Mengexport ke excel data Resep'),
(931, '2017-07-01 15:19:32', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(932, '2017-07-01 15:19:34', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(933, '2017-07-01 15:19:38', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(934, '2017-07-01 15:19:47', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(935, '2017-07-01 15:19:56', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(936, '2017-07-01 15:20:19', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(937, '2017-07-01 15:21:05', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(938, '2017-07-01 15:21:30', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(939, '2017-07-01 15:29:51', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(940, '2017-07-01 15:29:53', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Penerimaan'),
(941, '2017-07-01 15:29:54', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Retur'),
(942, '2017-07-01 15:29:58', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(943, '2017-07-01 15:30:02', 'NP003', 'Faril Gunanti, S.Farm', 'User Logout'),
(944, '2017-07-01 15:30:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(945, '2017-07-01 15:30:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(946, '2017-07-01 15:30:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(947, '2017-07-01 15:30:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(948, '2017-07-01 15:32:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(949, '2017-07-01 15:32:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(950, '2017-07-01 15:33:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(951, '2017-07-01 15:33:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(952, '2017-07-01 15:33:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(953, '2017-07-01 15:50:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(954, '2017-07-01 16:02:01', 'NP001', 'Hani K. Faizah', 'user login'),
(955, '2017-07-01 16:02:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(956, '2017-07-01 16:02:06', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(957, '2017-07-01 16:05:04', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(958, '2017-07-01 16:05:17', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(959, '2017-07-01 16:06:09', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(960, '2017-07-01 16:07:16', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(961, '2017-07-01 16:07:19', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(962, '2017-07-01 16:07:47', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(963, '2017-07-01 16:08:29', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(964, '2017-07-01 16:08:39', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(965, '2017-07-01 16:08:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(966, '2017-07-01 16:09:34', 'NP001', 'Hani K. Faizah', 'User Logout'),
(967, '2017-07-01 16:12:15', 'NP001', 'Hani K. Faizah', 'user login'),
(968, '2017-07-01 16:12:16', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(969, '2017-07-01 16:12:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(970, '2017-07-01 16:12:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(971, '2017-07-01 16:12:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(972, '2017-07-01 16:13:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Obat'),
(973, '2017-07-01 16:24:22', 'NP001', 'Hani K. Faizah', 'user login'),
(974, '2017-07-01 16:24:22', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(975, '2017-07-01 16:24:29', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(976, '2017-07-01 16:25:44', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(977, '2017-07-01 16:25:59', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(978, '2017-07-01 16:26:22', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(979, '2017-07-01 16:26:39', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(980, '2017-07-01 16:31:50', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(981, '2017-07-01 16:35:46', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(982, '2017-07-01 16:36:04', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(983, '2017-07-01 16:49:37', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(984, '2017-07-01 16:50:33', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(985, '2017-07-01 16:53:10', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(986, '2017-07-01 16:55:28', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(987, '2017-07-01 16:55:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(988, '2017-07-01 16:55:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(989, '2017-07-01 16:55:44', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(990, '2017-07-01 16:55:46', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(991, '2017-07-01 16:55:48', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(992, '2017-07-01 16:57:50', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(993, '2017-07-01 16:57:53', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(994, '2017-07-01 16:58:12', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(995, '2017-07-01 16:58:39', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(996, '2017-07-01 16:58:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(997, '2017-07-01 16:58:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(998, '2017-07-01 16:58:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(999, '2017-07-01 16:58:53', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1000, '2017-07-01 16:59:59', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1001, '2017-07-01 17:00:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1002, '2017-07-01 17:00:27', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1003, '2017-07-01 17:10:41', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1004, '2017-07-01 17:12:03', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1005, '2017-07-01 17:12:08', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1006, '2017-07-01 17:13:53', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1007, '2017-07-01 17:14:10', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1008, '2017-07-01 17:14:16', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1009, '2017-07-01 17:15:38', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1010, '2017-07-01 17:17:42', 'NP001', 'Hani K. Faizah', 'user login'),
(1011, '2017-07-01 17:17:42', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1012, '2017-07-01 17:18:46', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1013, '2017-07-01 17:18:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1014, '2017-07-01 17:22:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Dokter'),
(1015, '2017-07-01 17:24:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1016, '2017-07-01 17:24:37', 'NP001', 'Hani K. Faizah', 'Menambah Data Retur dengan ID: RTR-vZVFY, Tanggal: 2017-07-01, Jumlah: 0'),
(1017, '2017-07-01 17:24:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1018, '2017-07-01 17:24:41', 'NP001', 'Hani K. Faizah', 'Menghapus Data Retur dengan ID: 2'),
(1019, '2017-07-01 17:24:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1020, '2017-07-01 17:24:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1021, '2017-07-01 17:24:53', 'NP001', 'Hani K. Faizah', 'Menambah Data Retur dengan ID: RTR-4dKUO, Tanggal: 2017-07-01, Jumlah: 0'),
(1022, '2017-07-01 17:24:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1023, '2017-07-01 17:24:55', 'NP001', 'Hani K. Faizah', 'Menghapus Data Retur dengan ID: 3'),
(1024, '2017-07-01 17:24:55', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1025, '2017-07-01 17:26:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1026, '2017-07-01 17:26:39', 'NP001', 'Hani K. Faizah', 'Menambah Data Retur dengan ID: RTR-3faH1, Tanggal: 2017-07-01, Jumlah: 0'),
(1027, '2017-07-01 17:26:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1028, '2017-07-01 17:27:16', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1029, '2017-07-01 17:27:21', 'NP001', 'Hani K. Faizah', 'Menghapus Data Retur dengan ID: 4'),
(1030, '2017-07-01 17:27:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1031, '2017-07-01 19:45:01', 'NP003', 'Faril Gunanti, S.Farm', 'user login'),
(1032, '2017-07-01 19:45:01', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(1033, '2017-07-01 19:45:09', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1034, '2017-07-01 19:45:33', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1035, '2017-07-01 19:52:52', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1036, '2017-07-01 19:53:37', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100413, Nama Obat: Domperidon 10 mg, Stok Masuk: 0, Stok Keluar: 60, Stok Akhir: 130, Keterangan: 07/2017'),
(1037, '2017-07-01 19:53:37', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100104, Nama Obat: Ambroxol 30 mg, Stok Masuk: 0, Stok Keluar: 40, Stok Akhir: 95, Keterangan: 07/2017'),
(1038, '2017-07-01 19:53:38', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-006'),
(1039, '2017-07-01 19:54:35', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(1040, '2017-07-01 19:54:59', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1041, '2017-07-01 19:59:31', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1042, '2017-07-01 20:00:33', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100108, Nama Obat: Amoksilin syr kering 125 mg/5 ml, Stok Masuk: 0, Stok Keluar: 20, Stok Akhir: 160, Keterangan: 07/2017'),
(1043, '2017-07-01 20:00:33', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100901, Nama Obat: Ibuprofen 200 mg, Stok Masuk: 0, Stok Keluar: 60, Stok Akhir: 130, Keterangan: 07/2017'),
(1044, '2017-07-01 20:00:34', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-002'),
(1045, '2017-07-01 20:00:46', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(1046, '2017-07-01 20:00:54', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1047, '2017-07-01 20:01:12', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1048, '2017-07-01 20:02:21', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100104, Nama Obat: Ambroxol 30 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 65, Keterangan: 07/2017'),
(1049, '2017-07-01 20:02:22', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100202, Nama Obat: Betametason krem, Stok Masuk: 0, Stok Keluar: 40, Stok Akhir: 80, Keterangan: 07/2017'),
(1050, '2017-07-01 20:02:22', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-001'),
(1051, '2017-07-01 20:02:29', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(1052, '2017-07-01 20:02:39', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1053, '2017-07-01 20:02:45', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1054, '2017-07-01 20:02:47', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(1055, '2017-08-15 20:04:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(1056, '2017-08-15 20:04:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1057, '2017-08-15 20:06:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1058, '2017-08-15 20:06:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1059, '2017-08-15 20:06:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1060, '2017-08-15 20:06:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(1061, '2017-08-15 20:07:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(1062, '2017-08-15 20:09:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1063, '2017-08-15 20:09:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1064, '2017-08-15 20:10:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1065, '2017-08-15 20:10:51', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1066, '2017-08-15 20:11:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1067, '2017-08-15 20:11:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1068, '2017-08-15 20:11:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1069, '2017-08-15 20:12:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1070, '2017-08-15 20:12:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1071, '2017-08-15 20:13:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1072, '2017-08-15 20:18:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1073, '2017-08-15 20:19:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1074, '2017-08-15 20:19:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1075, '2017-08-15 20:19:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1076, '2017-08-15 20:19:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1077, '2017-08-15 20:19:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Bon dengan ID: BON-9eBjV'),
(1078, '2017-08-15 20:19:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1079, '2017-08-15 20:19:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Bon dengan ID: BON-jwqqo, Tanggal: 2017-08-15'),
(1080, '2017-08-15 20:19:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1081, '2017-08-15 20:19:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1082, '2017-08-15 20:19:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1083, '2017-08-15 20:20:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1084, '2017-08-15 20:27:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1085, '2017-08-15 20:27:33', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1086, '2017-08-15 20:27:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1087, '2017-08-15 20:28:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1088, '2017-08-15 20:28:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengexport ke excel data Penerimaan'),
(1089, '2017-08-15 20:29:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Data Penerimaan dengan ID: PER1'),
(1090, '2017-08-15 20:30:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1091, '2017-08-15 20:30:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1092, '2017-08-15 20:30:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Stok Gudang Obat dengan ID: 3, Status Kadaluarsa: 0, Jumlah Stok: 10, Stok Rusak: 10'),
(1093, '2017-08-15 20:30:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1094, '2017-08-15 20:30:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1095, '2017-08-15 20:30:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Retur dengan ID: RTR-5f9uq, Tanggal: 2017-08-15, Jumlah: 0'),
(1096, '2017-08-15 20:30:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1097, '2017-08-15 20:30:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-5f9uq'),
(1098, '2017-08-15 20:30:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-5f9uq'),
(1099, '2017-08-15 20:31:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mencetak data Retur dengan ID: RTR-5f9uq'),
(1100, '2017-08-15 20:31:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mencetak Data Bon dengan ID: BON-jwqqo'),
(1101, '2017-08-15 20:31:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-5f9uq'),
(1102, '2017-08-15 20:31:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Retur dengan ID: RTR-5f9uq'),
(1103, '2017-08-15 20:31:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1104, '2017-08-15 20:32:17', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(1105, '2017-08-15 20:32:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-07-2017'),
(1106, '2017-08-15 20:32:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-07-2017'),
(1107, '2017-08-15 20:33:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(1108, '2017-08-15 20:34:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1109, '2017-08-15 20:34:24', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1110, '2017-08-15 20:34:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(1111, '2017-08-15 20:34:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER1'),
(1112, '2017-08-15 20:34:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1113, '2017-08-15 20:34:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER1'),
(1114, '2017-08-15 20:34:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Cetak Data Penerimaan dengan ID: PER1'),
(1115, '2017-08-15 20:37:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1116, '2017-08-15 20:37:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1117, '2017-08-15 20:37:56', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1118, '2017-08-15 20:38:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1119, '2017-08-15 20:38:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(1120, '2017-08-15 20:38:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: '),
(1121, '2017-08-15 20:38:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-07-2017'),
(1122, '2017-08-15 20:38:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 01-07-2017'),
(1123, '2017-08-15 20:44:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(1124, '2017-08-15 20:44:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(1125, '2017-08-15 20:44:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1126, '2017-08-15 20:44:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1127, '2017-08-15 20:45:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1128, '2017-08-15 20:45:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1129, '2017-08-15 20:45:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1130, '2017-08-15 20:45:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1131, '2017-08-15 20:45:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1132, '2017-08-15 20:45:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(1133, '2017-08-15 20:46:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1134, '2017-08-15 20:46:02', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1135, '2017-08-15 20:46:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1136, '2017-08-15 20:46:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1137, '2017-08-15 20:46:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1138, '2017-08-15 20:46:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(1139, '2017-08-15 20:46:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu laporan transaksi'),
(1140, '2017-08-15 20:46:45', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(1141, '2017-08-15 20:46:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(1142, '2017-08-15 20:46:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1143, '2017-08-15 20:48:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(1144, '2017-08-15 20:48:24', 'NP001', 'Hani K. Faizah', 'user login'),
(1145, '2017-08-15 20:48:24', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1146, '2017-08-15 20:57:26', 'NP003', 'Faril Gunanti, S.Farm', 'user login'),
(1147, '2017-08-15 20:57:26', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(1148, '2017-08-15 20:58:03', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Dokter'),
(1149, '2017-08-15 20:58:08', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Poli'),
(1150, '2017-08-15 20:58:12', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Pasien'),
(1151, '2017-08-15 20:58:17', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pegawai'),
(1152, '2017-08-15 20:58:21', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data User'),
(1153, '2017-08-15 20:58:45', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(1154, '2017-08-15 20:58:58', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Satuan Kemasan'),
(1155, '2017-08-15 20:59:01', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Satuan'),
(1156, '2017-08-15 20:59:06', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Penyimpanan'),
(1157, '2017-08-15 20:59:10', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Obat'),
(1158, '2017-08-15 20:59:18', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1159, '2017-08-15 20:59:51', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Kartu Stok'),
(1160, '2017-08-15 21:00:16', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Supplier'),
(1161, '2017-08-15 21:00:19', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1162, '2017-08-15 21:00:31', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(1163, '2017-08-15 21:00:34', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1164, '2017-08-15 21:00:38', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(1165, '2017-08-15 21:00:40', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1166, '2017-08-15 21:00:49', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Permintaan'),
(1167, '2017-08-15 21:02:01', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Penerimaan'),
(1168, '2017-08-15 21:02:03', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Retur'),
(1169, '2017-08-15 21:02:07', 'NP003', 'Faril Gunanti, S.Farm', 'Menghapus Data Retur dengan ID: 5'),
(1170, '2017-08-15 21:02:07', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Retur'),
(1171, '2017-08-15 21:02:11', 'NP003', 'Faril Gunanti, S.Farm', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1172, '2017-08-15 21:02:22', 'NP003', 'Faril Gunanti, S.Farm', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1173, '2017-08-15 21:02:37', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pemakaian'),
(1174, '2017-08-15 21:02:44', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu laporan transaksi'),
(1175, '2017-08-15 21:03:12', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu laporan transaksi'),
(1176, '2017-08-15 21:04:44', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Pengaturan Akun'),
(1177, '2017-08-15 21:04:54', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pegawai'),
(1178, '2017-08-15 21:04:57', 'NP003', 'Faril Gunanti, S.Farm', 'Memilih Data Pegawai dengan ID: 3'),
(1179, '2017-08-15 21:04:58', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Pegawai'),
(1180, '2017-08-15 21:05:04', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Obat'),
(1181, '2017-08-15 21:12:12', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1182, '2017-08-15 21:13:15', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100202, Nama Obat: Betametason krem, Stok Masuk: 0, Stok Keluar: 20, Stok Akhir: 60, Keterangan: 08/2017'),
(1183, '2017-08-15 21:13:15', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100401, Nama Obat: Dexamethason 0,5 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 140, Keterangan: 08/2017'),
(1184, '2017-08-15 21:13:16', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 2 resep dengan No Resep: AP-003'),
(1185, '2017-08-15 21:13:20', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1186, '2017-08-15 21:13:27', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1187, '2017-08-15 21:13:44', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Kartu Stok'),
(1188, '2017-08-15 21:14:41', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1189, '2017-08-15 21:14:48', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1190, '2017-08-15 21:15:47', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1191, '2017-08-15 21:16:07', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 10, Stok Akhir: 100, Keterangan: 08/2017'),
(1192, '2017-08-15 21:16:07', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 1 resep dengan No Resep: AP-008'),
(1193, '2017-08-15 21:16:42', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1194, '2017-08-15 21:16:46', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1195, '2017-08-15 21:16:52', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Kartu Stok'),
(1196, '2017-08-15 21:17:47', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1197, '2017-08-15 21:17:53', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1198, '2017-08-15 21:18:25', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 50, Stok Akhir: 50, Keterangan: 08/2017'),
(1199, '2017-08-15 21:18:25', 'NP003', 'Faril Gunanti, S.Farm', 'Menambah 1 resep dengan No Resep: AP-009'),
(1200, '2017-08-15 21:18:29', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1201, '2017-08-15 21:18:35', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Kartu Stok'),
(1202, '2017-08-15 21:18:46', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1203, '2017-08-15 21:18:50', 'NP003', 'Faril Gunanti, S.Farm', 'Menghapus Data Stok Gudang Obat dengan ID: 3'),
(1204, '2017-08-15 21:18:50', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1205, '2017-08-15 21:18:54', 'NP003', 'Faril Gunanti, S.Farm', 'Menghapus Data Stok Gudang Obat dengan ID: 15'),
(1206, '2017-08-15 21:18:55', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1207, '2017-08-15 21:19:26', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Kartu Stok'),
(1208, '2017-08-15 21:19:47', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Resep'),
(1209, '2017-08-15 21:20:53', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Beranda'),
(1210, '2017-08-15 21:20:55', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu Data Retur'),
(1211, '2017-08-15 21:20:57', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke Penerimaan Resep'),
(1212, '2017-08-15 21:21:06', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1213, '2017-08-15 21:21:25', 'NP003', 'Faril Gunanti, S.Farm', 'Masuk ke menu data Gudang Obat'),
(1214, '2017-08-16 04:55:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(1215, '2017-08-16 04:55:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1216, '2017-08-16 04:55:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(1217, '2017-08-16 04:55:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(1218, '2017-08-16 04:55:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1219, '2017-08-16 04:56:14', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1220, '2017-08-16 04:56:20', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1221, '2017-08-16 04:56:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1222, '2017-08-16 04:56:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-jwqqo'),
(1223, '2017-08-16 04:56:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1224, '2017-08-16 04:58:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100401, Nama Obat: Dexamethason 0,5 mg, Stok Masuk: 0, Stok Keluar: 45, Stok Akhir: 95, Keterangan: 08/2017'),
(1225, '2017-08-16 04:58:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100901, Nama Obat: Ibuprofen 200 mg, Stok Masuk: 0, Stok Keluar: 60, Stok Akhir: 80, Keterangan: 08/2017'),
(1226, '2017-08-16 04:58:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 2 resep dengan No Resep: AP-004'),
(1227, '2017-08-16 04:58:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1228, '2017-08-16 04:58:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(1229, '2017-08-16 04:59:29', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1230, '2017-08-16 05:01:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100204, Nama Obat: Benzocain Jelly, Stok Masuk: 0, Stok Keluar: 20, Stok Akhir: 80, Keterangan: 08/2017'),
(1231, '2017-08-16 05:01:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100413, Nama Obat: Domperidon 10 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 100, Keterangan: 08/2017'),
(1232, '2017-08-16 05:01:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100802, Nama Obat: Haloperidol 1.5 mg, Stok Masuk: 0, Stok Keluar: 24, Stok Akhir: 151, Keterangan: 08/2017'),
(1233, '2017-08-16 05:01:16', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 3 resep dengan No Resep: AP-009'),
(1234, '2017-08-16 05:01:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1235, '2017-08-16 05:01:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1236, '2017-08-16 05:02:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Stok Gudang Obat dengan ID: 19'),
(1237, '2017-08-16 05:02:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1238, '2017-08-16 05:03:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1239, '2017-08-16 05:06:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1240, '2017-08-16 05:07:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(1241, '2017-08-16 05:07:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(1242, '2017-09-08 12:36:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'user login'),
(1243, '2017-09-08 12:36:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1244, '2017-09-08 12:36:34', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(1245, '2017-09-08 12:36:37', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(1246, '2017-09-08 12:36:40', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(1247, '2017-09-08 12:36:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Dokter'),
(1248, '2017-09-08 12:36:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Poli'),
(1249, '2017-09-08 12:37:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(1250, '2017-09-08 12:37:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pegawai'),
(1251, '2017-09-08 12:38:19', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data User'),
(1252, '2017-09-08 12:40:06', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Resep'),
(1253, '2017-09-08 12:45:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan Kemasan'),
(1254, '2017-09-08 12:45:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Satuan'),
(1255, '2017-09-08 12:45:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Obat'),
(1256, '2017-09-08 12:46:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Penyimpanan'),
(1257, '2017-09-08 12:46:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1258, '2017-09-08 12:49:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1259, '2017-09-08 12:49:26', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Pasien'),
(1260, '2017-09-08 12:50:21', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1261, '2017-09-08 12:50:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Masuk: 0, Stok Keluar: 30, Stok Akhir: 30, Keterangan: 09/2017'),
(1262, '2017-09-08 12:50:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah 1 resep dengan No Resep: AP-003'),
(1263, '2017-09-08 12:51:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1264, '2017-09-08 12:51:18', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1265, '2017-09-08 12:52:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Penerimaan Resep'),
(1266, '2017-09-08 12:52:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1267, '2017-09-08 12:52:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1268, '2017-09-08 12:52:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1269, '2017-09-08 12:54:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(1270, '2017-09-08 12:55:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1271, '2017-09-08 12:55:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1272, '2017-09-08 12:57:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(1273, '2017-09-08 12:59:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1274, '2017-09-08 12:59:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1275, '2017-09-08 13:01:35', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu data Gudang Obat'),
(1276, '2017-09-08 13:01:39', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(1277, '2017-09-08 13:02:28', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1278, '2017-09-08 13:02:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1279, '2017-09-08 13:02:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Kartu Stok'),
(1280, '2017-09-08 13:03:47', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1281, '2017-09-08 13:03:50', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1282, '2017-09-08 13:03:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1283, '2017-09-08 13:03:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1284, '2017-09-08 13:04:12', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER2'),
(1285, '2017-09-08 13:08:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1286, '2017-09-08 13:08:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1287, '2017-09-08 13:09:25', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1288, '2017-09-08 13:09:27', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1289, '2017-09-08 13:09:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER2'),
(1290, '2017-09-08 13:10:10', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1291, '2017-09-08 13:10:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER2'),
(1292, '2017-09-08 13:10:36', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1293, '2017-09-08 13:10:53', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Penerimaan'),
(1294, '2017-09-08 13:11:00', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1295, '2017-09-08 13:11:13', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1296, '2017-09-08 13:11:15', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER3'),
(1297, '2017-09-08 13:11:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1298, '2017-09-08 13:11:42', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1299, '2017-09-08 13:11:49', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1300, '2017-09-08 13:11:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Penerimaan dengan ID: PER3'),
(1301, '2017-09-08 13:12:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1302, '2017-09-08 13:12:41', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER3'),
(1303, '2017-09-08 13:12:43', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER3'),
(1304, '2017-09-08 13:13:58', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER3'),
(1305, '2017-09-08 13:14:01', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1306, '2017-09-08 13:14:03', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1307, '2017-09-08 13:14:07', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menghapus Data Bon dengan ID: BON-jwqqo'),
(1308, '2017-09-08 13:14:08', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1309, '2017-09-08 13:14:11', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke Beranda'),
(1310, '2017-09-08 13:18:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Permintaan'),
(1311, '2017-09-08 13:18:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Permintaan dengan ID: PER3'),
(1312, '2017-09-08 13:22:44', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Penerimaan'),
(1313, '2017-09-08 13:22:46', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1314, '2017-09-08 13:22:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Bon dengan ID: BON-ZjsuO, Tanggal: 2017-09-08'),
(1315, '2017-09-08 13:22:55', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Retur'),
(1316, '2017-09-08 13:22:57', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1317, '2017-09-08 13:23:54', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1318, '2017-09-08 13:24:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1319, '2017-09-08 13:24:30', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1320, '2017-09-08 13:25:04', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1321, '2017-09-08 13:25:31', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100102, Nama Obat: Allopurinol 100 mg, Stok Masuk: 90, Stok Keluar: 0, Stok Akhir: , Keterangan: '),
(1322, '2017-09-08 13:25:32', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1323, '2017-09-08 13:26:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Menambah Data Kartu Stok dengan ID Obat: 100204, Nama Obat: Benzocain Jelly, Stok Masuk: 80, Stok Keluar: 0, Stok Akhir: , Keterangan: '),
(1324, '2017-09-08 13:26:38', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Mengupdate Data Bon dengan ID: BON-ZjsuO'),
(1325, '2017-09-08 13:26:52', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Masuk ke menu Data Pemakaian'),
(1326, '2017-09-08 13:26:59', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 08-09-2017'),
(1327, '2017-09-08 13:27:05', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 15-08-2017'),
(1328, '2017-09-08 13:27:09', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 16-08-2017'),
(1329, '2017-09-08 13:27:22', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'Memilih Data Pemakaian tanggal: 08-09-2017'),
(1330, '2017-09-08 13:36:23', 'NP002', 'Erna Tri Wijayanti, S.Farm, Apt', 'User Logout'),
(1331, '2017-09-08 13:36:32', 'NP001', 'Hani K. Faizah', 'user login'),
(1332, '2017-09-08 13:36:33', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1333, '2017-09-08 13:37:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Pemakaian'),
(1334, '2017-09-08 13:37:17', 'NP001', 'Hani K. Faizah', 'Memilih Data Pemakaian tanggal: 01-07-2017'),
(1335, '2017-09-08 13:37:25', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1336, '2017-09-08 13:37:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu laporan transaksi'),
(1337, '2017-09-08 13:38:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(1338, '2017-09-08 13:40:20', 'NP001', 'Hani K. Faizah', 'Mencari data Kartu Stok dengan kategori: 1 dan keyword: '),
(1339, '2017-09-08 13:40:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Gudang Obat'),
(1340, '2017-08-18 13:30:36', 'NP001', 'Hani K. Faizah', 'user login'),
(1341, '2017-08-18 13:30:37', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1342, '2017-08-18 13:30:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1343, '2017-08-18 13:30:59', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1344, '2017-08-18 13:31:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1345, '2017-08-18 13:31:08', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1346, '2017-08-18 13:31:13', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1347, '2017-08-18 13:33:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(1348, '2017-08-18 13:33:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1349, '2017-08-18 13:33:39', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1350, '2017-08-18 13:35:25', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Retur'),
(1351, '2017-08-18 13:35:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1352, '2017-08-18 13:35:51', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1353, '2017-08-18 13:36:16', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1354, '2017-08-18 13:37:29', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1355, '2017-08-18 13:37:33', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1356, '2017-08-18 13:37:33', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1357, '2017-08-18 13:37:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(1358, '2017-08-18 13:37:49', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1359, '2017-08-18 13:38:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1360, '2017-08-18 13:38:25', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(1361, '2017-08-18 13:38:27', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1362, '2017-08-18 13:39:35', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1363, '2017-08-18 13:40:54', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER3'),
(1364, '2017-08-18 13:41:01', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER3'),
(1365, '2017-08-18 13:41:07', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1366, '2017-08-18 13:41:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1367, '2017-08-18 13:41:23', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1368, '2017-08-18 13:41:35', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1369, '2017-08-18 13:42:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(1370, '2017-08-18 13:43:49', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1371, '2017-08-18 13:45:07', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Kartu Stok'),
(1372, '2017-08-18 13:45:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(1373, '2017-08-18 13:45:33', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1374, '2017-08-18 13:45:37', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1375, '2017-08-18 13:46:08', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1376, '2017-08-18 13:46:14', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER3'),
(1377, '2017-08-18 13:46:17', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1378, '2017-08-18 13:46:21', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1379, '2017-08-18 13:46:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Permintaan'),
(1380, '2017-08-18 13:46:43', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1381, '2017-08-18 13:46:50', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1382, '2017-08-18 13:46:57', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1383, '2017-08-18 13:47:08', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1384, '2017-08-18 13:47:10', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1385, '2017-08-18 13:47:10', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1386, '2017-08-18 13:47:43', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1387, '2017-08-18 13:47:43', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1388, '2017-08-18 13:48:19', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1389, '2017-08-18 13:48:29', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER1'),
(1390, '2017-08-18 13:48:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Penerimaan'),
(1391, '2017-08-18 13:48:59', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1');
INSERT INTO `log` (`id`, `tanggal`, `id_user`, `nama_user`, `aktivitas`) VALUES
(1392, '2017-08-18 13:49:22', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1393, '2017-08-18 13:50:36', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER3'),
(1394, '2017-08-18 13:50:39', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER1'),
(1395, '2017-08-18 13:50:47', 'NP001', 'Hani K. Faizah', 'Memilih Data Penerimaan dengan ID: PER2'),
(1396, '2017-08-18 13:50:55', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1397, '2017-08-18 13:50:56', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER2'),
(1398, '2017-08-18 13:51:02', 'NP001', 'Hani K. Faizah', 'Memilih Data Permintaan dengan ID: PER3'),
(1399, '2017-08-18 13:53:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1400, '2017-08-20 13:52:19', 'NP001', 'Hani K. Faizah', 'user login'),
(1401, '2017-08-20 13:52:19', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1402, '2017-08-20 13:55:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Poli'),
(1403, '2017-08-20 13:55:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1404, '2017-08-20 13:59:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1405, '2017-08-20 14:00:54', 'NP001', 'Hani K. Faizah', 'Masuk ke menu laporan transaksi'),
(1406, '2017-08-20 14:05:39', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1407, '2017-08-20 14:05:51', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1408, '2017-08-20 14:06:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1409, '2017-08-20 14:06:20', 'NP001', 'Hani K. Faizah', 'Memilih data Pasien dengan ID: 1'),
(1410, '2017-08-20 14:07:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1411, '2017-08-20 14:07:26', 'NP001', 'Hani K. Faizah', 'Memilih data Pasien dengan ID: 3'),
(1412, '2017-08-20 14:07:26', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1413, '2017-08-20 14:07:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1414, '2017-08-20 14:08:04', 'NP001', 'Hani K. Faizah', 'Memilih data Pasien dengan ID: 3'),
(1415, '2017-08-20 14:08:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1416, '2017-08-20 14:08:06', 'NP001', 'Hani K. Faizah', 'Mengupdate data Pasien dengan ID: 3, Nama: Anwar, Jenis Kelamin: Laki-laki, Tempat Lahir: Sleman, Tanggal Lahir: 1999-07-10, Alamat: Patangpuluhan, Yogyakarta, Telepon: 0274567837432'),
(1417, '2017-08-20 14:08:07', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1418, '2017-08-20 21:05:26', 'NP001', 'Hani K. Faizah', 'user login'),
(1419, '2017-08-20 21:05:26', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1420, '2017-08-20 21:05:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1421, '2017-08-20 21:21:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1422, '2017-08-20 21:22:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1423, '2017-08-20 21:22:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1424, '2017-08-20 21:23:06', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1425, '2017-08-20 21:23:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1426, '2017-08-20 21:24:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1427, '2017-08-20 21:24:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1428, '2017-08-20 21:24:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1429, '2017-08-20 21:24:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1430, '2017-08-20 21:25:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1431, '2017-08-20 21:26:06', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1432, '2017-08-20 21:26:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1433, '2017-08-20 21:27:23', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1434, '2017-08-20 21:27:38', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1435, '2017-08-20 21:28:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1436, '2017-08-20 21:28:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1437, '2017-08-20 21:30:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1438, '2017-08-20 21:30:28', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1439, '2017-08-20 21:30:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1440, '2017-08-20 21:32:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1441, '2017-08-20 21:32:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1442, '2017-08-20 21:32:37', 'NP001', 'Hani K. Faizah', 'Mengexport ke excel data Resep'),
(1443, '2017-08-20 21:34:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1444, '2017-08-20 21:38:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1445, '2017-08-20 21:39:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1446, '2017-08-20 21:39:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1447, '2017-08-20 21:39:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1448, '2017-08-20 21:39:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1449, '2017-08-20 21:40:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1450, '2017-08-20 21:40:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1451, '2017-08-20 21:41:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1452, '2017-08-20 21:41:30', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1453, '2017-08-20 21:41:34', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1454, '2017-08-20 21:43:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1455, '2017-08-20 21:44:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1456, '2017-08-20 21:45:11', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1457, '2017-08-20 21:47:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1458, '2017-08-20 21:51:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1459, '2017-08-20 21:55:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1460, '2017-08-20 21:55:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1461, '2017-08-20 21:56:14', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1462, '2017-08-20 21:56:15', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1463, '2017-08-20 21:57:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1464, '2017-08-20 22:02:40', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1465, '2017-08-20 22:03:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1466, '2017-08-20 22:03:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1467, '2017-08-20 22:05:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1468, '2017-08-20 22:05:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1469, '2017-08-20 22:05:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1470, '2017-08-20 22:05:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1471, '2017-08-20 22:07:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1472, '2017-08-20 22:07:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1473, '2017-08-20 22:09:24', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1474, '2017-08-20 22:09:27', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1475, '2017-08-20 22:09:29', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1476, '2017-08-20 22:09:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1477, '2017-08-20 22:10:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1478, '2017-08-20 22:11:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1479, '2017-08-20 22:11:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1480, '2017-08-20 22:12:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1481, '2017-08-20 22:12:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1482, '2017-08-20 22:13:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1483, '2017-08-20 22:13:07', 'NP001', 'Hani K. Faizah', 'Mengcetak data Resep dengan ID; 20'),
(1484, '2017-08-20 22:13:49', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1485, '2017-08-20 22:13:54', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1486, '2017-08-20 22:15:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1487, '2017-08-20 22:15:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1488, '2017-08-20 22:15:28', 'NP001', 'Hani K. Faizah', 'user login'),
(1489, '2017-08-20 22:15:28', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1490, '2017-08-20 22:15:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1491, '2017-08-20 22:15:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1492, '2017-08-20 22:15:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1493, '2017-08-20 22:15:38', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1494, '2017-08-20 22:15:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1495, '2017-08-20 22:15:43', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1496, '2017-08-20 22:15:44', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1497, '2017-08-20 22:15:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1498, '2017-08-20 22:15:49', 'NP001', 'Hani K. Faizah', 'Mengexport ke excel data Resep'),
(1499, '2017-08-20 22:17:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1500, '2017-08-20 22:17:55', 'NP001', 'Hani K. Faizah', 'Mencari data Resep dengan kategori: 3 dan keyword: bella'),
(1501, '2017-08-20 22:19:51', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1502, '2017-08-20 22:20:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1503, '2017-08-20 22:20:09', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1504, '2017-08-20 22:20:13', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1505, '2017-08-20 22:20:19', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1506, '2017-08-20 22:20:25', 'NP001', 'Hani K. Faizah', 'Mencari data Resep dengan kategori: 3 dan keyword: Bella'),
(1507, '2017-08-20 22:21:31', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1508, '2017-08-20 22:21:40', 'NP001', 'Hani K. Faizah', 'Mencari data Resep dengan kategori: 3 dan keyword: bella'),
(1509, '2017-08-20 22:21:41', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1510, '2017-08-20 22:25:01', 'NP001', 'Hani K. Faizah', 'Mencari data Resep dengan kategori: 3 dan keyword: bella'),
(1511, '2017-08-20 22:25:04', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1512, '2017-08-20 22:25:06', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1513, '2017-08-20 22:28:59', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1514, '2017-08-20 22:29:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1515, '2017-08-20 22:29:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1516, '2017-08-20 22:29:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1517, '2017-08-20 22:29:23', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1518, '2017-08-20 22:29:39', 'NP001', 'Hani K. Faizah', 'Mengcetak data Resep dengan ID; 25'),
(1519, '2017-08-20 22:31:15', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1520, '2017-08-20 22:31:17', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1521, '2017-08-20 22:33:22', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1522, '2017-08-20 22:33:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1523, '2017-08-20 22:33:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1524, '2017-08-20 22:36:11', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1525, '2017-08-20 22:36:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1526, '2017-08-20 22:36:48', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1527, '2017-08-20 22:37:36', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1528, '2017-08-20 22:37:55', 'NP001', 'Hani K. Faizah', 'user login'),
(1529, '2017-08-20 22:37:55', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1530, '2017-08-20 22:38:10', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1531, '2017-08-20 22:38:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1532, '2017-08-20 22:38:26', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1533, '2017-08-20 22:39:01', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 1, Stok Akhir: 119, Keterangan: 08/2017'),
(1534, '2017-08-20 22:39:01', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-010'),
(1535, '2017-08-20 22:39:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1536, '2017-08-20 22:39:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1537, '2017-08-20 22:41:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1538, '2017-08-20 22:41:56', 'NP001', 'Hani K. Faizah', 'Memilih data Pasien dengan ID: 9'),
(1539, '2017-08-20 22:41:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1540, '2017-08-20 22:41:59', 'NP001', 'Hani K. Faizah', 'Mengupdate data Pasien dengan ID: 9, Nama: Asap, Jenis Kelamin: Laki-laki, Tempat Lahir: Cinere, Tanggal Lahir: 1984-07-25, Alamat: Semarang, Telepon: 081234564890'),
(1541, '2017-08-20 22:42:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1542, '2017-08-20 22:42:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1543, '2017-08-20 22:42:20', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 1, Stok Akhir: 118, Keterangan: 08/2017'),
(1544, '2017-08-20 22:42:20', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-009'),
(1545, '2017-08-20 22:42:35', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1546, '2017-08-20 22:42:37', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1547, '2017-08-20 22:43:06', 'NP001', 'Hani K. Faizah', 'Masuk ke menu laporan transaksi'),
(1548, '2017-08-20 22:43:18', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1549, '2017-08-20 22:43:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1550, '2017-08-20 22:46:59', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1551, '2017-08-20 22:47:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1552, '2017-08-20 22:47:51', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1553, '2017-08-20 22:47:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1554, '2017-08-20 22:47:58', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1555, '2017-08-20 22:48:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1556, '2017-08-20 22:48:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1557, '2017-08-20 22:48:07', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1558, '2017-08-20 22:48:12', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1559, '2017-08-20 22:48:20', 'NP001', 'Hani K. Faizah', 'Memilih data Pasien dengan ID: 5'),
(1560, '2017-08-20 22:48:20', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1561, '2017-08-20 22:48:25', 'NP001', 'Hani K. Faizah', 'Mengupdate data Pasien dengan ID: 5, Nama: Kylie, Jenis Kelamin: Perempuan, Tempat Lahir: Surabaya, Tanggal Lahir: 1988-08-25, Alamat: Umbulharjo, Yogyakarta, Telepon: 0274567837'),
(1562, '2017-08-20 22:48:26', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1563, '2017-08-20 22:48:30', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1564, '2017-08-20 22:48:52', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 1, Stok Akhir: 117, Keterangan: 08/2017'),
(1565, '2017-08-20 22:48:53', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-005'),
(1566, '2017-08-20 22:48:57', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1567, '2017-08-20 22:49:00', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1568, '2017-08-20 22:49:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu laporan transaksi'),
(1569, '2017-08-23 03:42:10', 'NP001', 'Hani K. Faizah', 'user login'),
(1570, '2017-08-23 03:42:11', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1571, '2017-08-23 03:42:21', 'NP001', 'Hani K. Faizah', 'Masuk ke menu data Pasien'),
(1572, '2017-08-23 03:42:32', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1573, '2017-08-23 03:42:46', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1574, '2017-08-23 03:42:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1575, '2017-08-23 03:50:22', 'NP001', 'Hani K. Faizah', 'User Logout'),
(1576, '2017-08-23 10:19:21', 'NP001', 'Hani K. Faizah', 'user login'),
(1577, '2017-08-23 10:19:21', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1578, '2017-08-23 10:19:24', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1579, '2017-08-23 10:20:17', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 1, Stok Akhir: 116, Keterangan: 08/2017'),
(1580, '2017-08-23 10:20:18', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-001'),
(1581, '2017-08-23 10:20:33', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1582, '2017-08-23 10:20:35', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1583, '2017-08-23 10:20:39', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1584, '2017-08-23 10:20:48', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1585, '2017-08-23 10:21:19', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1586, '2017-08-23 10:21:45', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 1, Stok Akhir: 115, Keterangan: 08/2017'),
(1587, '2017-08-23 10:21:45', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-001'),
(1588, '2017-08-23 10:21:53', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1589, '2017-08-23 10:21:56', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1590, '2017-08-23 10:21:58', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1591, '2017-08-23 10:21:59', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1592, '2017-08-27 22:28:56', 'NP001', 'Hani K. Faizah', 'user login'),
(1593, '2017-08-27 22:28:57', 'NP001', 'Hani K. Faizah', 'Masuk ke Beranda'),
(1594, '2017-08-27 22:29:03', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1595, '2017-08-27 22:40:02', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1596, '2017-08-27 22:40:05', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1597, '2017-08-27 22:58:45', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1598, '2017-08-27 22:59:01', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1599, '2017-08-27 22:59:06', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1600, '2017-08-27 22:59:42', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1601, '2017-08-27 22:59:48', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1602, '2017-08-27 22:59:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1603, '2017-08-27 22:59:51', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1604, '2017-08-27 22:59:52', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1605, '2017-08-27 22:59:54', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1606, '2017-08-27 22:59:55', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1607, '2017-08-27 23:03:19', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1608, '2017-08-27 23:03:41', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 10, Stok Akhir: 105, Keterangan: 08/2017'),
(1609, '2017-08-27 23:03:42', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-010'),
(1610, '2017-08-27 23:05:24', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100101, Nama Obat: Albendazole 400 mg, Stok Masuk: 0, Stok Keluar: 10, Stok Akhir: 95, Keterangan: 08/2017'),
(1611, '2017-08-27 23:05:25', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-010'),
(1612, '2017-08-27 23:07:02', 'NP001', 'Hani K. Faizah', 'Masuk ke Penerimaan Resep'),
(1613, '2017-08-27 23:07:36', 'NP001', 'Hani K. Faizah', 'Menambah Data Kartu Stok dengan ID Obat: 100303, Nama Obat: Cetirizine 10 mg, Stok Masuk: 0, Stok Keluar: 10, Stok Akhir: 190, Keterangan: 08/2017'),
(1614, '2017-08-27 23:07:37', 'NP001', 'Hani K. Faizah', 'Menambah 1 resep dengan No Resep: AP-007'),
(1615, '2017-08-27 23:07:47', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1616, '2017-08-27 23:07:50', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1617, '2017-08-27 23:07:53', 'NP001', 'Hani K. Faizah', 'Mengcetak data Resep dengan ID; 33'),
(1618, '2017-08-27 23:09:29', 'NP001', 'Hani K. Faizah', 'Mencetak data Resep dengan ID; 33'),
(1619, '2017-08-27 23:09:36', 'NP001', 'Hani K. Faizah', 'Mencetak data Resep dengan ID; 33'),
(1620, '2017-08-27 23:15:54', 'NP001', 'Hani K. Faizah', 'Menghapus Data Resep dengan ID: AP-007'),
(1621, '2017-08-27 23:15:55', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1622, '2017-08-27 23:16:08', 'NP001', 'Hani K. Faizah', 'Mencari data Resep dengan kategori: 1 dan keyword: AP-004'),
(1623, '2017-08-27 23:16:10', 'NP001', 'Hani K. Faizah', 'Masuk ke menu Data Resep'),
(1624, '2017-08-27 23:16:19', 'NP001', 'Hani K. Faizah', 'User Logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lplpo`
--

CREATE TABLE IF NOT EXISTS `lplpo` (
  `_id` int(11) NOT NULL,
  `id_laporan` text NOT NULL,
  `periode` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lplpo`
--

INSERT INTO `lplpo` (`_id`, `id_laporan`, `periode`) VALUES
(1, 'LPLPO - xnBpY', '08/2017'),
(2, 'LPLPO - 1iUxU', '09/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(11) NOT NULL,
  `id_obat` text NOT NULL,
  `obat` text NOT NULL,
  `id_satuan` text NOT NULL,
  `harga` text NOT NULL,
  `id_penyimpanan` text NOT NULL,
  `stok` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `id_obat`, `obat`, `id_satuan`, `harga`, `id_penyimpanan`, `stok`) VALUES
(2, '100108', 'Amoksilin syr kering 125 mg/5 ml', 'SAT006', '2445', 'RAK01', '160'),
(3, '100101', 'Albendazole 400 mg', 'SAT001', '305', 'RAK02', '95'),
(4, '100102', 'Allopurinol 100 mg', 'SAT002', '86', 'RAK03', '120'),
(6, '100104', 'Ambroxol 30 mg', 'SAT002', '125', 'RAK04', '170'),
(7, '100204', 'Benzocain Jelly', 'SAT011', '86250', 'RAK05', '160'),
(8, '100202', 'Betametason krem', 'SAT012', '1520', 'RAK06', '60'),
(9, '100303', 'Cetirizine 10 mg', 'SAT004', '11250', 'RAK07', '190'),
(10, '100401', 'Dexamethason 0,5 mg', 'SAT002', '68', 'RAK08', '105'),
(11, '100413', 'Domperidon 10 mg', 'SAT002', '167', 'RAK09', '100'),
(12, '100707', 'Gliserin', 'SAT012', '4180', 'RAK10', '145'),
(13, '100802', 'Haloperidol 1.5 mg', 'SAT002', '69', 'RAK11', '151'),
(14, '100901', 'Ibuprofen 200 mg', 'SAT003', '110', 'RAK12', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` text NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `jaminan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `id_pasien`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `jaminan`) VALUES
(1, 'AP-001', 'Bella', 'Perempuan', 'Bantul', '1998-02-13', 'Bantul, Yogyakarta', '081234564876', 'Mandiri'),
(2, 'AP-002', 'Gigi', 'Perempuan', 'Kalimantan', '1991-08-15', 'Sleman, Yogyakarta', '08676747459', 'Mandiri'),
(3, 'AP-003', 'Anwar', 'Laki-laki', 'Sleman', '1999-07-10', 'Patangpuluhan, Yogyakarta', '0274567837432', 'BPJS Kesehatan'),
(4, 'AP-004', 'Kendall', 'Perempuan', 'Semarang', '1989-10-24', 'Bantul, Yogyakarta', '081234564890', 'Mandiri'),
(5, 'AP-005', 'Kylie', 'Perempuan', 'Surabaya', '1988-08-25', 'Umbulharjo, Yogyakarta', '0274567837', 'BPJS Kesehatan'),
(6, 'AP-006', 'Elsa', 'Perempuan', 'Jakarta', '1985-06-18', 'Kulonprogo, Yogyakarta', '0274555777', 'Mandiri'),
(7, 'AP-007', 'Lily', 'Perempuan', 'Samarinda', '1998-03-12', 'Gunungkidul, Yogyakarta', '0274567837', 'Mandiri'),
(8, 'AP-008', 'Travis', 'Laki-laki', 'Bandung', '1989-11-22', 'Magelang', '081225795547', 'Mandiri'),
(9, 'AP-009', 'Asap', 'Laki-laki', 'Cinere', '1984-07-25', 'Semarang', '081234564890', 'BPJS Kesehatan'),
(10, 'AP-010', 'Harry', 'Laki-laki', 'Bandung', '1994-08-01', 'Bandung', '081234543456', 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jenis_kelamin`, `jabatan`) VALUES
(1, '3125311009', 'Hani K. Faizah', 'Perempuan', 'Administrator Sistem'),
(3, '3125311076', 'Erna Tri Wijayanti, S.Farm, Apt', 'Perempuan', 'Apoteker'),
(4, '3125311077', 'Linda Darmawan, S.Farm', 'Perempuan', 'Asisten Apoteker'),
(5, '3125311078', 'Faril Gunanti, S.Farm', 'Perempuan', 'Asisten Apoteker'),
(6, '3125311079', 'Ambarsari Prihatiningsih', 'Perempuan', 'Asisten Apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian`
--

CREATE TABLE IF NOT EXISTS `pemakaian` (
  `id` int(11) NOT NULL,
  `no_resep` text NOT NULL,
  `tanggal` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `no_batch` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `no_resep`, `tanggal`, `id_obat`, `nama_obat`, `no_batch`, `jumlah`) VALUES
(6, 'AP-010', '01-07-2017', '100104', 'Ambroxol 30 mg', 'BAT001', '15'),
(7, 'AP-010', '01-07-2017', '100901', 'Ibuprofen 200 mg', 'BAT013', '10'),
(8, 'AP-006', '01-07-2017', '100101', 'Albendazole 400 mg', 'BAT002', '30'),
(9, 'AP-006', '01-07-2017', '100102', 'Allopurinol 100 mg', 'BAT003', '30'),
(10, 'AP-006', '01-07-2017', '100413', 'Domperidon 10 mg', 'BAT008', '60'),
(11, 'AP-006', '01-07-2017', '100104', 'Ambroxol 30 mg', 'BAT001', '40'),
(12, 'AP-002', '01-07-2017', '100108', 'Amoksilin syr kering 125 mg/5 ml', 'BAT112', '20'),
(13, 'AP-002', '01-07-2017', '100901', 'Ibuprofen 200 mg', 'BAT013', '60'),
(14, 'AP-001', '01-07-2017', '100104', 'Ambroxol 30 mg', 'BAT001', '30'),
(15, 'AP-001', '01-07-2017', '100202', 'Betametason krem', 'BAT005', '40'),
(16, 'AP-003', '15-08-2017', '100202', 'Betametason krem', 'BAT005', '20'),
(17, 'AP-003', '15-08-2017', '100401', 'Dexamethason 0,5 mg', 'BAT007', '30'),
(18, 'AP-008', '15-08-2017', '100101', 'Albendazole 400 mg', 'BAT002', '10'),
(19, 'AP-009', '15-08-2017', '100101', 'Albendazole 400 mg', 'BAT002', '50'),
(20, 'AP-004', '16-08-2017', '100401', 'Dexamethason 0,5 mg', 'BAT007', '45'),
(21, 'AP-004', '16-08-2017', '100901', 'Ibuprofen 200 mg', 'BAT112', '60'),
(22, 'AP-009', '16-08-2017', '100204', 'Benzocain Jelly', 'BAT004', '20'),
(23, 'AP-009', '16-08-2017', '100413', 'Domperidon 10 mg', 'BAT008', '30'),
(24, 'AP-009', '16-08-2017', '100802', 'Haloperidol 1.5 mg', 'BAT010', '24'),
(25, 'AP-003', '08-09-2017', '100102', 'Allopurinol 100 mg', 'BAT003', '30'),
(26, 'AP-010', '20-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '1'),
(27, 'AP-009', '20-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '1'),
(28, 'AP-005', '20-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '1'),
(29, 'AP-001', '23-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '1'),
(30, 'AP-001', '23-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '1'),
(31, 'AP-010', '27-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '10'),
(32, 'AP-010', '27-08-2017', '100101', 'Albendazole 400 mg', 'BAT777', '10'),
(33, 'AP-007', '27-08-2017', '100303', 'Cetirizine 10 mg', 'BAT006', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id` int(11) NOT NULL,
  `id_permintaan` text NOT NULL,
  `tanggal_permintaan` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `tanggal` text NOT NULL,
  `tgl_kadaluarsa` text NOT NULL,
  `jumlah` text NOT NULL,
  `supplier` text NOT NULL,
  `no_batch` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `id_permintaan`, `tanggal_permintaan`, `id_obat`, `nama_obat`, `tanggal`, `tgl_kadaluarsa`, `jumlah`, `supplier`, `no_batch`, `status`) VALUES
(1, 'PER1', '2017-08', '100101', 'Albendazole 400 mg', '2017-08-20', '2017-11-25', '50', 'Gudang Farmasi', 'BAT777', '1'),
(2, 'PER1', '2017-08', '100102', 'Allopurinol 100 mg', '2017-08-20', '2017-11-29', '40', 'Gudang Farmasi', 'BAT789', '1'),
(3, 'PER1', '2017-08', '100104', 'Ambroxol 30 mg', '2017-08-20', '2017-12-29', '105', 'Gudang Farmasi', 'BAT908', '1'),
(4, 'PER1', '2017-08', '100901', 'Ibuprofen 200 mg', '2017-08-20', '2017-11-30', '10', 'Gudang Farmasi', 'BAT112', '1'),
(5, 'PER2', '2017-09', '100101', 'Albendazole 400 mg', '2017-09-10', '2017-11-22', '70', 'Gudang Farmasi', 'BAT', '1'),
(6, 'PER2', '2017-09', '100401', 'Dexamethason 0,5 mg', '2017-09-10', '2017-11-22', '10', 'Gudang Farmasi', 'BAT1', '1'),
(7, 'PER2', '2017-09', '100901', 'Ibuprofen 200 mg', '', '', '', '', '', '0'),
(8, 'PER3', '2017-09', '100401', 'Dexamethason 0,5 mg', '', '', '', '', '', '0'),
(9, 'PER3', '2017-09', '100901', 'Ibuprofen 200 mg', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan`
--

CREATE TABLE IF NOT EXISTS `penyimpanan` (
  `id` int(11) NOT NULL,
  `id_penyimpanan` text NOT NULL,
  `penyimpanan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyimpanan`
--

INSERT INTO `penyimpanan` (`id`, `id_penyimpanan`, `penyimpanan`) VALUES
(1, 'RAK01', 'Rak 01'),
(2, 'RAK02', 'Rak 02'),
(3, 'RAK03', 'Rak 03'),
(4, 'RAK04', 'Rak 04'),
(5, 'RAK05', 'Rak 05'),
(6, 'RAK06', 'Rak 06'),
(7, 'RAK07', 'Rak 07'),
(8, 'RAK08', 'Rak 08'),
(9, 'RAK09', 'Rak 09'),
(10, 'RAK10', 'Rak 10'),
(11, 'RAK11', 'Rak 11'),
(12, 'RAK12', 'Rak 12'),
(13, 'RAK13', 'Rak 13'),
(14, 'RAK14', 'Rak 14'),
(15, 'RAK15', 'Rak 15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE IF NOT EXISTS `permintaan` (
  `id` int(11) NOT NULL,
  `id_permintaan` text NOT NULL,
  `id_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `jumlah_permintaan` text NOT NULL,
  `tanggal_permintaan` text NOT NULL,
  `penerimaan_lalu` text NOT NULL,
  `stok` text NOT NULL,
  `pemakaian` text NOT NULL,
  `rusak` text NOT NULL,
  `sisa_stok` text NOT NULL,
  `stok_optimum` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_permintaan`, `id_obat`, `nama_obat`, `jumlah_permintaan`, `tanggal_permintaan`, `penerimaan_lalu`, `stok`, `pemakaian`, `rusak`, `sisa_stok`, `stok_optimum`) VALUES
(3, 'PER1', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-08', '0', '180', '20', '0', '160', '40'),
(4, 'PER1', '100101', 'Albendazole 400 mg', '50', '2017-08', '0', '0', '30', '0', '10', '60'),
(5, 'PER1', '100102', 'Allopurinol 100 mg', '40', '2017-08', '0', '0', '30', '0', '20', '60'),
(6, 'PER1', '100104', 'Ambroxol 30 mg', '105', '2017-08', '0', '150', '85', '0', '65', '170'),
(7, 'PER1', '100204', 'Benzocain Jelly', '0', '2017-08', '0', '100', '0', '0', '100', '0'),
(8, 'PER1', '100202', 'Betametason krem', '0', '2017-08', '0', '120', '40', '0', '80', '80'),
(9, 'PER1', '100303', 'Cetirizine 10 mg', '0', '2017-08', '0', '200', '0', '0', '200', '0'),
(10, 'PER1', '100401', 'Dexamethason 0,5 mg', '0', '2017-08', '0', '170', '0', '0', '170', '0'),
(11, 'PER1', '100413', 'Domperidon 10 mg', '0', '2017-08', '0', '190', '60', '0', '130', '120'),
(12, 'PER1', '100707', 'Gliserin', '0', '2017-08', '0', '145', '0', '0', '145', '0'),
(13, 'PER1', '100802', 'Haloperidol 1.5 mg', '0', '2017-08', '0', '175', '0', '0', '175', '0'),
(14, 'PER1', '100901', 'Ibuprofen 200 mg', '10', '2017-08', '0', '200', '70', '0', '130', '140'),
(15, 'PER2', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-09', '0', '0', '0', '0', '160', '0'),
(16, 'PER2', '100101', 'Albendazole 400 mg', '70', '2017-09', '50', '100', '60', '0', '50', '120'),
(17, 'PER2', '100102', 'Allopurinol 100 mg', '-60', '2017-09', '40', '40', '0', '0', '30', '0'),
(18, 'PER2', '100104', 'Ambroxol 30 mg', '0', '2017-09', '105', '105', '0', '0', '170', '0'),
(19, 'PER2', '100204', 'Benzocain Jelly', '0', '2017-09', '0', '0', '20', '0', '80', '40'),
(20, 'PER2', '100202', 'Betametason krem', '0', '2017-09', '0', '0', '20', '0', '60', '40'),
(21, 'PER2', '100303', 'Cetirizine 10 mg', '0', '2017-09', '0', '0', '0', '0', '200', '0'),
(22, 'PER2', '100401', 'Dexamethason 0,5 mg', '55', '2017-09', '0', '0', '75', '0', '95', '150'),
(23, 'PER2', '100413', 'Domperidon 10 mg', '0', '2017-09', '0', '0', '30', '0', '100', '60'),
(24, 'PER2', '100707', 'Gliserin', '0', '2017-09', '0', '0', '0', '0', '145', '0'),
(25, 'PER2', '100802', 'Haloperidol 1.5 mg', '0', '2017-09', '0', '0', '24', '0', '151', '48'),
(26, 'PER2', '100901', 'Ibuprofen 200 mg', '40', '2017-09', '10', '10', '60', '0', '80', '120'),
(27, 'PER3', '100108', 'Amoksilin syr kering 125 mg/5 ml', '0', '2017-09', '0', '0', '0', '0', '160', '0'),
(28, 'PER3', '100101', 'Albendazole 400 mg', '0', '2017-09', '50', '100', '60', '0', '120', '120'),
(29, 'PER3', '100102', 'Allopurinol 100 mg', '-60', '2017-09', '40', '40', '0', '0', '30', '0'),
(30, 'PER3', '100104', 'Ambroxol 30 mg', '0', '2017-09', '105', '105', '0', '0', '170', '0'),
(31, 'PER3', '100204', 'Benzocain Jelly', '0', '2017-09', '0', '0', '20', '0', '80', '40'),
(32, 'PER3', '100202', 'Betametason krem', '0', '2017-09', '0', '0', '20', '0', '60', '40'),
(33, 'PER3', '100303', 'Cetirizine 10 mg', '0', '2017-09', '0', '0', '0', '0', '200', '0'),
(34, 'PER3', '100401', 'Dexamethason 0,5 mg', '45', '2017-09', '0', '0', '75', '0', '105', '150'),
(35, 'PER3', '100413', 'Domperidon 10 mg', '0', '2017-09', '0', '0', '30', '0', '100', '60'),
(36, 'PER3', '100707', 'Gliserin', '0', '2017-09', '0', '0', '0', '0', '145', '0'),
(37, 'PER3', '100802', 'Haloperidol 1.5 mg', '0', '2017-09', '0', '0', '24', '0', '151', '48'),
(38, 'PER3', '100901', 'Ibuprofen 200 mg', '40', '2017-09', '10', '10', '60', '0', '80', '120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
  `id` int(11) NOT NULL,
  `id_poli` text NOT NULL,
  `nama_poli` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `id_poli`, `nama_poli`) VALUES
(1, 'POL001', 'Poli Anak'),
(2, 'POL002', 'Poli Gigi'),
(3, 'POL003', 'Poli Umum'),
(4, 'POL004', 'Poli Lansia'),
(5, 'POL005', 'Poli KIA (Kesehatan Ibu dan Anak)'),
(6, 'POL006', 'Poli Gizi'),
(7, 'POL007', 'Poli Psikologi'),
(8, 'POL008', 'Poli Laboratorium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `id` int(11) NOT NULL,
  `no_resep` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `no_resep`, `nama`) VALUES
(6, 'AP-010', 'AP-010'),
(7, 'AP-010', 'AP-010'),
(8, 'AP-006', 'AP-006'),
(9, 'AP-006', 'AP-006'),
(10, 'AP-006', 'AP-006'),
(11, 'AP-006', 'AP-006'),
(12, 'AP-002', 'AP-002'),
(13, 'AP-002', 'AP-002'),
(14, 'AP-001', 'AP-001'),
(15, 'AP-001', 'AP-001'),
(16, 'AP-003', 'AP-003'),
(17, 'AP-003', 'AP-003'),
(18, 'AP-008', 'AP-008'),
(19, 'AP-009', 'AP-009'),
(20, 'AP-004', 'AP-004'),
(21, 'AP-004', 'AP-004'),
(22, 'AP-009', 'AP-009'),
(23, 'AP-009', 'AP-009'),
(24, 'AP-009', 'AP-009'),
(25, 'AP-003', 'AP-003'),
(26, 'AP-010', 'AP-010'),
(27, 'AP-009', 'AP-009'),
(28, 'AP-005', 'AP-005'),
(29, 'AP-001', 'AP-001'),
(30, 'AP-001', 'AP-001'),
(31, 'AP-010', 'AP-010'),
(32, 'AP-010', 'AP-010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_bak`
--

CREATE TABLE IF NOT EXISTS `resep_bak` (
  `id` int(11) NOT NULL,
  `no_resep` text NOT NULL,
  `tanggal` text NOT NULL,
  `nama` text NOT NULL,
  `umur` text NOT NULL,
  `dokter` text NOT NULL,
  `nama_obat` text NOT NULL,
  `no_batch` text NOT NULL,
  `dosis` text NOT NULL,
  `keterangan` text NOT NULL,
  `asuransi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep_bak`
--

INSERT INTO `resep_bak` (`id`, `no_resep`, `tanggal`, `nama`, `umur`, `dokter`, `nama_obat`, `no_batch`, `dosis`, `keterangan`, `asuransi`) VALUES
(6, 'AP-010', '2017-07-01', 'AP-010', '22', 'Almira', 'Ambroxol 30 mg', 'BAT001', '15', '3x3 sehari', 'Mandiri'),
(7, 'AP-010', '2017-07-01', 'AP-010', '22', 'Almira', 'Ibuprofen 200 mg', 'BAT013', '10', '2x1 pagi dan malam', 'Mandiri'),
(8, 'AP-006', '2017-07-01', 'AP-006', '32', 'Almira', 'Albendazole 400 mg', 'BAT002', '30', '3x3 sehari', 'BPJS Kesehatan'),
(9, 'AP-006', '2017-07-01', 'AP-006', '32', 'Almira', 'Allopurinol 100 mg', 'BAT003', '30', '3x3 sehari', 'BPJS Kesehatan'),
(10, 'AP-006', '2017-07-01', 'AP-006', '32', 'Almira', 'Domperidon 10 mg', 'BAT008', '60', '3x1 sehari', 'Mandiri'),
(11, 'AP-006', '2017-07-01', 'AP-006', '32', 'Almira', 'Ambroxol 30 mg', 'BAT001', '40', '2x1 pagi dan malam', 'Mandiri'),
(12, 'AP-002', '2017-07-01', 'AP-002', '25', 'Sinta', 'Amoksilin syr kering 125 mg/5 ml', 'BAT112', '20', '2x2 pagi dan malam', 'Mandiri'),
(13, 'AP-002', '2017-07-01', 'AP-002', '25', 'Sinta', 'Ibuprofen 200 mg', 'BAT013', '60', '3x1 sesudah makan', 'Mandiri'),
(14, 'AP-001', '2017-07-01', 'AP-001', '19', 'Almira', 'Ambroxol 30 mg', 'BAT001', '30', '3x1 sesudah makan', 'Mandiri'),
(15, 'AP-001', '2017-07-01', 'AP-001', '19', 'Almira', 'Betametason krem', 'BAT005', '40', '2x2 sebelum dan sesudah makan', 'Mandiri'),
(16, 'AP-003', '2017-08-15', 'AP-003', '18', 'Sinta', 'Betametason krem', 'BAT005', '20', '2x1 pagi dan malam', 'BPJS Kesehatan'),
(17, 'AP-003', '2017-08-15', 'AP-003', '18', 'Sinta', 'Dexamethason 0,5 mg', 'BAT007', '30', '3x1 setelah makan', 'BPJS Kesehatan'),
(18, 'AP-008', '2017-08-15', 'AP-008', '27', 'Almira', 'Albendazole 400 mg', 'BAT002', '10', '1x1 sebelum tidur malam', 'Mandiri'),
(19, 'AP-009', '2017-08-15', 'AP-009', '33', 'Evy', 'Albendazole 400 mg', 'BAT002', '50', '3x1 sebelum makan', 'BPJS Kesehatan'),
(20, 'AP-004', '2017-08-16', 'AP-004', '27', 'Almira', 'Dexamethason 0,5 mg', 'BAT007', '45', '3x3 sesudah makan', 'BPJS Kesehatan'),
(21, 'AP-004', '2017-08-16', 'AP-004', '27', 'Almira', 'Ibuprofen 200 mg', 'BAT112', '60', '3xx1 sebelum makan', 'BPJS Kesehatan'),
(22, 'AP-009', '2017-08-16', 'AP-009', '33', 'Evy', 'Benzocain Jelly', 'BAT004', '20', '1x1 sebelumm tidur', 'Mandiri'),
(23, 'AP-009', '2017-08-16', 'AP-009', '33', 'Evy', 'Domperidon 10 mg', 'BAT008', '30', '3x3 sebelum makan', 'Mandiri'),
(24, 'AP-009', '2017-08-16', 'AP-009', '33', 'Evy', 'Haloperidol 1.5 mg', 'BAT010', '24', '2x2 pagi dan malam', 'Mandiri'),
(25, 'AP-003', '2017-09-08', 'AP-003', '18', 'Sinta', 'Allopurinol 100 mg', 'BAT003', '30', '3x3 sebelum makan', 'BPJS Kesehatan'),
(26, 'AP-010', '2017-08-20', 'AP-010', '23', 'Sinta', 'Albendazole 400 mg', 'BAT777', '1', '1x sehari pada jam yang sama', 'Mandiri'),
(27, 'AP-009', '2017-08-20', 'AP-009', '33', 'Sinta', 'Albendazole 400 mg', 'BAT777', '1', '1x sehari pada jam yang sama', 'BPJS Kesehatan'),
(28, 'AP-005', '2017-08-20', 'AP-005', '28', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', '1x  setelah makan pada jam yang sama', 'BPJS Kesehatan'),
(29, 'AP-001', '2017-08-23', 'AP-001', '19', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', '3x1 setelah makan', 'Mandiri'),
(30, 'AP-001', '2017-08-23', 'AP-001', '19', 'Evy', 'Albendazole 400 mg', 'BAT777', '1', 'sekalisehari', 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id` int(11) NOT NULL,
  `id_retur` text NOT NULL,
  `tanggal` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(11) NOT NULL,
  `id_satuan` text NOT NULL,
  `satuan` text NOT NULL,
  `id_satuan_kemasan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `id_satuan`, `satuan`, `id_satuan_kemasan`) VALUES
(7, 'SAT001', 'Tablet', 'SK001'),
(8, 'SAT002', 'Tablet', 'SK002'),
(9, 'SAT003', 'Botol', 'SK003'),
(10, 'SAT004', 'Tablet', 'SK004'),
(11, 'SAT005', 'Tablet', 'SK005'),
(12, 'SAT006', 'Botol', 'SK006'),
(13, 'SAT007', 'Biji', 'SK007'),
(14, 'SAT008', 'Flacon', 'SK008'),
(15, 'SAT009', 'Tube', 'SK009'),
(16, 'SAT010', 'Botol', 'SK010'),
(17, 'SAT011', 'Tube', 'SK011'),
(18, 'SAT012', 'Tube', 'SK012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_kemasan`
--

CREATE TABLE IF NOT EXISTS `satuan_kemasan` (
  `id` int(11) NOT NULL,
  `id_satuan_kemasan` text NOT NULL,
  `satuan_kemasan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_kemasan`
--

INSERT INTO `satuan_kemasan` (`id`, `id_satuan_kemasan`, `satuan_kemasan`) VALUES
(7, 'SK001', 'Kotak @ 30'),
(8, 'SK002', 'Kotak @ 100'),
(9, 'SK003', 'Botol 100 ml'),
(10, 'SK004', 'Kotak @ 50'),
(11, 'SK005', 'Kotak @ 30 tab'),
(12, 'SK006', 'Botol 60 ml'),
(13, 'SK007', 'Kotak @ 10'),
(14, 'SK008', 'Botol 20 ml'),
(15, 'SK009', 'tube 5 gram'),
(16, 'SK010', 'Botol 500 ml'),
(17, 'SK011', 'Tube'),
(18, 'SK012', 'Tube 5 gram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL,
  `id_supplier` text NOT NULL,
  `supplier` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `id_supplier`, `supplier`, `alamat`, `telepon`) VALUES
(1, 'SUP001', 'PT. Kimia Farma', 'Jakarta Indonesia', '021 980234'),
(2, 'SUP002', 'Gudang Farmasi', 'Yogyakarta', '0274555777'),
(3, 'SUP003', 'Pedagang Besar Farmasi', 'Yogyakarta', '0274555788');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `_id` int(11) NOT NULL,
  `id_pasien` text NOT NULL,
  `nama_pasien` text NOT NULL,
  `transaksi` text NOT NULL,
  `bpjs` text NOT NULL,
  `mandiri` text NOT NULL,
  `lainnya` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `periode` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`_id`, `id_pasien`, `nama_pasien`, `transaksi`, `bpjs`, `mandiri`, `lainnya`, `tanggal`, `periode`) VALUES
(6, 'AP-010', 'Harry', 'Ambroxol 30 mg (15 dosis @125)', '', '1875', '', '2017-07-01 08:15:07', '2017-07'),
(7, 'AP-010', 'Harry', 'Ibuprofen 200 mg (10 dosis @110)', '', '1100', '', '2017-07-01 08:15:07', '2017-07'),
(8, 'AP-006', 'Elsa', 'Albendazole 400 mg (30 dosis @305)', '9150', '', '', '2017-07-01 08:17:22', '2017-07'),
(9, 'AP-006', 'Elsa', 'Allopurinol 100 mg (30 dosis @86)', '2580', '', '', '2017-07-01 08:17:22', '2017-07'),
(10, 'AP-006', 'Elsa', 'Domperidon 10 mg (60 dosis @167)', '', '10020', '', '2017-07-01 12:53:37', '2017-07'),
(11, 'AP-006', 'Elsa', 'Ambroxol 30 mg (40 dosis @125)', '', '5000', '', '2017-07-01 12:53:37', '2017-07'),
(12, 'AP-002', 'Gigi', 'Amoksilin syr kering 125 mg/5 ml (20 dosis @2445)', '', '48900', '', '2017-07-01 13:00:33', '2017-07'),
(13, 'AP-002', 'Gigi', 'Ibuprofen 200 mg (60 dosis @110)', '', '6600', '', '2017-07-01 13:00:34', '2017-07'),
(14, 'AP-001', 'Bella', 'Ambroxol 30 mg (30 dosis @125)', '', '3750', '', '2017-07-01 13:02:21', '2017-07'),
(15, 'AP-001', 'Bella', 'Betametason krem (40 dosis @1520)', '', '60800', '', '2017-07-01 13:02:22', '2017-07'),
(16, 'AP-003', 'Anwar', 'Betametason krem (20 dosis @1520)', '30400', '', '', '2017-08-15 14:13:15', '2017-08'),
(17, 'AP-003', 'Anwar', 'Dexamethason 0,5 mg (30 dosis @68)', '2040', '', '', '2017-08-15 14:13:15', '2017-08'),
(18, 'AP-008', 'Travis', 'Albendazole 400 mg (10 dosis @305)', '', '3050', '', '2017-08-15 14:16:07', '2017-08'),
(19, 'AP-009', 'Asap', 'Albendazole 400 mg (50 dosis @305)', '15250', '', '', '2017-08-15 14:18:25', '2017-08'),
(20, 'AP-004', 'Kendall', 'Dexamethason 0,5 mg (45 dosis @68)', '3060', '', '', '2017-08-15 21:58:05', '2017-08'),
(21, 'AP-004', 'Kendall', 'Ibuprofen 200 mg (60 dosis @110)', '6600', '', '', '2017-08-15 21:58:06', '2017-08'),
(22, 'AP-009', 'Asap', 'Benzocain Jelly (20 dosis @86250)', '', '1725000', '', '2017-08-15 22:01:15', '2017-08'),
(23, 'AP-009', 'Asap', 'Domperidon 10 mg (30 dosis @167)', '', '5010', '', '2017-08-15 22:01:15', '2017-08'),
(24, 'AP-009', 'Asap', 'Haloperidol 1.5 mg (24 dosis @69)', '', '1656', '', '2017-08-15 22:01:16', '2017-08'),
(25, 'AP-003', 'Anwar', 'Allopurinol 100 mg (30 dosis @86)', '2580', '', '', '2017-09-08 05:50:50', '2017-09'),
(26, 'AP-010', 'Harry', 'Albendazole 400 mg (1 dosis @305)', '', '305', '', '2017-08-20 15:39:01', '2017-08'),
(27, 'AP-009', 'Asap', 'Albendazole 400 mg (1 dosis @305)', '305', '', '', '2017-08-20 15:42:20', '2017-08'),
(28, 'AP-005', 'Kylie', 'Albendazole 400 mg (1 dosis @305)', '305', '', '', '2017-08-20 15:48:52', '2017-08'),
(29, 'AP-001', 'Bella', 'Albendazole 400 mg (1 dosis @305)', '', '305', '', '2017-08-23 03:20:17', '2017-08'),
(30, 'AP-001', 'Bella', 'Albendazole 400 mg (1 dosis @305)', '', '305', '', '2017-08-23 03:21:45', '2017-08'),
(31, 'AP-010', 'Harry', 'Albendazole 400 mg (10 dosis @305)', '', '3050', '', '2017-08-27 16:03:42', '2017-08'),
(32, 'AP-010', 'Harry', 'Albendazole 400 mg (10 dosis @305)', '', '3050', '', '2017-08-27 16:05:24', '2017-08'),
(33, 'AP-007', 'Lily', 'Cetirizine 10 mg (10 dosis @11250)', '', '112500', '', '2017-08-27 16:07:37', '2017-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nip` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_user`, `username`, `password`, `nip`) VALUES
(1, 'NP001', 'admin', '21232f297a57a5a743894a0e4a801fc3', '3125311009'),
(3, 'NP002', 'erna', '035b3c6377652bd7d49b5d2e9a53ef40', '3125311076'),
(4, 'NP003', 'faril', 'e403aa14efe7780f5fc356e0d9f9e7a2', '3125311078');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bon`
--
ALTER TABLE `bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bon`
--
ALTER TABLE `detail_bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_lpbon`
--
ALTER TABLE `detail_lpbon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_lplpo`
--
ALTER TABLE `detail_lplpo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_retur`
--
ALTER TABLE `detail_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang_obat`
--
ALTER TABLE `gudang_obat`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `kartustok`
--
ALTER TABLE `kartustok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lplpo`
--
ALTER TABLE `lplpo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep_bak`
--
ALTER TABLE `resep_bak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_kemasan`
--
ALTER TABLE `satuan_kemasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bon`
--
ALTER TABLE `bon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_bon`
--
ALTER TABLE `detail_bon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_lpbon`
--
ALTER TABLE `detail_lpbon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `detail_lplpo`
--
ALTER TABLE `detail_lplpo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `detail_retur`
--
ALTER TABLE `detail_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gudang_obat`
--
ALTER TABLE `gudang_obat`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kartustok`
--
ALTER TABLE `kartustok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1625;
--
-- AUTO_INCREMENT for table `lplpo`
--
ALTER TABLE `lplpo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `resep_bak`
--
ALTER TABLE `resep_bak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `satuan_kemasan`
--
ALTER TABLE `satuan_kemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
