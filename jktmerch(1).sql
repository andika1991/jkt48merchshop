-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 08:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jktmerch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'andikapsw30@gmail.com', 'adm123456'),
(2, 'minato828g@gmail.com', 'amin123');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `gambar_artikel` blob DEFAULT NULL,
  `isi` varchar(5000) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `gambar_artikel`, `isi`, `judul`) VALUES
(3, 0x696d672f47726f757020322e6a7067, 'dfgbhgfdfgh', 'fghjhgfdfghj'),
(6, 0x696d672f50656d6261796172616e206b65726574612e6a7067, 'tyyyyyyyyyyyyyyeeeeeeeeeeeeeeeeee', 'SERBU!!!!!!!! PROMO MENDADAK'),
(7, 0x696d672f47726f757020322e6a7067, 'ffggggggggggggggg', 'fffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `daftarprodukpesanan`
--

CREATE TABLE `daftarprodukpesanan` (
  `id_daftarprodukpesanan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarprodukpesanan`
--

INSERT INTO `daftarprodukpesanan` (`id_daftarprodukpesanan`, `id_produk`, `id_pengguna`, `jumlah`) VALUES
(8, 17, 5, 1),
(9, 19, 5, 2),
(10, 20, 5, 1),
(11, 17, 5, 1),
(12, 20, 5, 1),
(13, 19, 5, 1),
(20, 19, NULL, 1),
(21, 17, NULL, 1),
(22, 17, 5, 1),
(23, 19, 5, 1),
(24, 17, 5, 1),
(25, 20, 5, 2),
(26, 17, 5, 1),
(27, 19, 5, 1),
(28, 20, 5, 1),
(29, 17, 5, 1),
(30, 19, 5, 1),
(31, 20, 5, 2),
(32, 17, 3, 1),
(33, 19, 3, 1),
(34, 20, 3, 1),
(35, 19, 3, 1),
(36, 17, 3, 1),
(37, 17, 3, 1),
(38, 19, 3, 2),
(39, 20, 3, 1),
(40, 19, 3, 1),
(41, 17, 3, 1),
(42, 19, 3, 1),
(43, 17, 3, 1),
(44, 17, 5, 1),
(45, 20, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `datacheckout`
--

CREATE TABLE `datacheckout` (
  `id_datacheckout` int(11) NOT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `alamat_detail` varchar(500) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `total_pembayaran` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datacheckout`
--

INSERT INTO `datacheckout` (`id_datacheckout`, `nama_penerima`, `alamat_detail`, `id_produk`, `id_pengguna`, `total_pembayaran`) VALUES
(1, 'Andika Fikri Azhari', 'ygfddy', 17, 5, '113400'),
(2, 'Andika Fikri Azhari', 'dfgfdsdfhgfdrsesfdgfgfd', 17, 5, '67600'),
(3, '5 Diamonds', 'evfdfgbfvcdsx', 19, 5, '20800'),
(7, 'Andika Fikri Azhari', 'bffgbgfgbgfggggg', NULL, 5, '52000'),
(8, 'ahmad nur', 'sdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL, 5, '108000'),
(9, 'Andika Fikri Azhari', 'tghgd', NULL, 5, '88400'),
(10, 'Andika Fikri Azhari', 'mjdfigjijitjtijhiutti', NULL, 5, '129600'),
(11, 'Andika Fikri Azhari', 'JL BUMI KEDATON BDL', NULL, 3, '88400'),
(12, 'Andika Fikri Azhari', 'ramadan sananta', NULL, 3, '52000'),
(13, 'Alan maulana', 'Malang Raya 110', NULL, 3, '113400'),
(14, 'aman', 'SBY', NULL, 3, '52000'),
(15, 'Andika Fikri Azhari', 'Jetis tabanan sukoharjo', NULL, 3, '52000'),
(16, 'ahmad dani', 'tengger', NULL, 5, '67600');

-- --------------------------------------------------------

--
-- Table structure for table `detail_checkout`
--

CREATE TABLE `detail_checkout` (
  `id_detail` int(11) NOT NULL,
  `id_datacheckout` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_checkout`
--

INSERT INTO `detail_checkout` (`id_detail`, `id_datacheckout`, `id_produk`, `jumlah`) VALUES
(3, 7, 17, 1),
(4, 7, 19, 1),
(5, 8, 17, 1),
(6, 8, 20, 2),
(7, 9, 17, 1),
(8, 9, 19, 1),
(9, 9, 20, 1),
(10, 10, 17, 1),
(11, 10, 19, 1),
(12, 10, 20, 2),
(13, 11, 17, 1),
(14, 11, 19, 1),
(15, 11, 20, 1),
(16, 12, 19, 1),
(17, 12, 17, 1),
(18, 13, 17, 1),
(19, 13, 19, 2),
(20, 13, 20, 1),
(21, 14, 19, 1),
(22, 14, 17, 1),
(23, 15, 19, 1),
(24, 15, 17, 1),
(25, 16, 17, 1),
(26, 16, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_pengguna`, `jumlah`) VALUES
(3, 19, 4, 4),
(4, 17, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `id_metodepembayaran` int(11) NOT NULL,
  `nama_metodepembayaran` varchar(200) DEFAULT NULL,
  `nomor_metode` varchar(255) DEFAULT NULL,
  `kategori_metode` varchar(255) DEFAULT NULL,
  `petunjuk_pembayaran` longtext DEFAULT NULL,
  `logo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`id_metodepembayaran`, `nama_metodepembayaran`, `nomor_metode`, `kategori_metode`, `petunjuk_pembayaran`, `logo`) VALUES
(11, 'Gopay', '085279549708 An.Andika Fikri Azhari', 'E-Wallet', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f676f7061792e706e67),
(12, 'DANA', '08252522526 An.Packngo', 'E-Wallet', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f44616e612e706e67),
(13, 'Bank BCA', '9878765456', 'E-Wallet', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f6263612e706e67),
(14, 'Link Aja', '08767654', 'E-Wallet', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f4c494e4b414a452e706e67),
(15, 'Bank Mandiri', '34543453434', 'Bank', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f6d616e646972692e706e67),
(16, 'Bank BRI', '876545676543', 'Bank', '1.Buka Aplikasi GOPAY: Mulai aplikasi GOPAY di perangkat Anda.\r\n2.Pilih GOPAY : Temukan ikon GOPAY pada beranda.\r\n3.Pilih Kirim atau Transfer: Pilih opsi ini untuk mengirim uang.\r\n4.Pilih Metode Pengiriman:\r\n5.Masukkan nomor telepon penerima\r\n6.Masukkan Jumlah Uang: Tentukan jumlah saldo yang ingin dikirim.\r\n7.Tambahkan Catatan (Opsional): Tambahkan pesan jika diperlukan.\r\n8.Konfirmasi dan Lanjutkan: Periksa informasi, lalu klik Transfer atau Kirim\r\n9.Masukkan PIN GOPAY: Masukkan PIN untuk konfirmasi keamanan.', 0x696d672f6272692e706e67),
(17, 'OVOR', 'RRRRR54543', 'E-Wallet', 'GGFEVGF', 0x696d672f6f766f2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fotoprofil` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `email`, `password`, `fotoprofil`) VALUES
(3, 'ANDIKA', 'andikapsw30@gmail.com', '$2y$10$spgQGfOjzAifQuYbGkAR7ellQ5e93DWWQ5p/LqUG3HH3hkrTqP0DW', NULL),
(4, '2257051005', 'minato828g@gmail.com', '$2y$10$4fPEgJcu41fq01r.1bkUg.Pdm.ZfD8MSSmFYwpvuCEdNC4byVrgf6', NULL),
(5, 'dkamondshopp', 'amin123@gmail.com', '$2y$10$sJjALzLR77Rf.3.y/VC30ebwrGRsNnuQab8/3BLt5avGs2wvHJu..', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `penilaian` varchar(50) DEFAULT NULL,
  `komentar` varchar(5000) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `penilaian`, `komentar`, `id_produk`, `id_pengguna`) VALUES
(1, 'Baik', 'Produknya baik pengiriman cepat-Top pokoknya', 17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `timeorder` datetime DEFAULT NULL,
  `bukti_bayar` blob DEFAULT NULL,
  `status_pesanan` varchar(30) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_datacheckout` int(11) DEFAULT NULL,
  `id_metodepembayaran` int(11) DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `invoice_id`, `timeorder`, `bukti_bayar`, `status_pesanan`, `total_harga`, `id_pengguna`, `id_datacheckout`, `id_metodepembayaran`, `expired`) VALUES
(14, 'JKTMERC000001', '2024-06-01 12:20:32', NULL, 'Menunggu Pembayaran', 113400, 3, 13, 11, '2024-06-02 12:20:32'),
(15, 'JKTMERC000002', '2024-06-01 12:21:02', 0x696d672f62756b74695f70656d6261796172616e5f363635616166633930653762665f63626537636430322d373464342d343966302d613763322d3030396539336162333366662e6a7067, 'Menunggu Pembayaran', 52000, 3, 14, 11, '2024-06-02 12:21:02'),
(16, 'JKTMERC000003', '2024-06-01 12:26:27', NULL, 'Menunggu Pembayaran', 52000, 3, 14, 11, '2024-06-02 12:26:27'),
(17, 'JKTMERC000004', '2024-06-01 12:27:04', 0x696d672f62756b74695f70656d6261796172616e5f363635616231333935666133375f6564697470726f66696c2e6a7067, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 12:27:04'),
(18, 'JKTMERC000005', '2024-06-01 12:28:19', NULL, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 12:28:19'),
(19, 'JKTMERC000006', '2024-06-01 12:28:20', 0x696d672f62756b74695f70656d6261796172616e5f363635616231376236333561395f50696c69682050656d6261796172616e206b65726574612e6a7067, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 12:28:20'),
(20, 'JKTMERC000007', '2024-06-01 12:41:55', NULL, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 12:41:55'),
(21, 'JKTMERC000008', '2024-06-01 12:41:56', 0x696d672f62756b74695f70656d6261796172616e5f363635616234623133613165615f576861747341707020496d61676520323032342d30352d31362061742031302e30302e35335f63663636663963342e6a7067, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 12:41:56'),
(22, 'JKTMERC000009', '2024-06-01 12:43:46', 0x696d672f62756b74695f70656d6261796172616e5f363635616235313631613364375f576861747341707020496d61676520323032342d30352d31362061742031302e30302e35335f63663636663963342e6a7067, 'Diproses', 52000, 3, 15, 11, '2024-06-02 12:43:46'),
(23, 'JKTMERC000010', '2024-06-01 13:18:29', NULL, 'Menunggu Pembayaran', 52000, 3, 15, 11, '2024-06-02 13:18:29'),
(24, 'JKTMERC000011', '2024-06-01 13:21:46', 0x696d672f62756b74695f70656d6261796172616e5f363635616265303362613233385f746820283233292e6a706567, 'Diproses', 67600, 5, 16, 11, '2024-06-02 13:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `foto_produk` blob DEFAULT NULL,
  `deskripsi_produk` varchar(3000) DEFAULT NULL,
  `kategori_produk` varchar(30) DEFAULT NULL,
  `promo` varchar(15) DEFAULT NULL,
  `harga_normal` decimal(10,0) DEFAULT NULL,
  `harga_promo` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `deskripsi_produk`, `kategori_produk`, `promo`, `harga_normal`, `harga_promo`) VALUES
(17, 'Paket Merchendise Lengkap JKT48', 0x696d672f4c6f676f41692d6a6b743438206d657263682d4d6f636b757073322e6a7067, 'Bukuponieeeeeeeeeeee', 'Musik', 'Aktif', '35000', '30000'),
(18, 'JKT48 High Tension (CD+DVD)', 0x696d672f4a4b54343820486967682054656e73696f6e202843442b445644292e6a7067, 'REGULAR/CD-DVD VERSION\r\n\r\nHigh Tension\r\n01. High Tension\r\n02. Musim yang Selanjutnya - Tsugi no Season (次のSeason)\r\n03. After Rain\r\n04. Kesucian Hati Hingga Umur 19 Tahun - Junjou U-19 (純情U-19)\r\n05. Kenyataan yang Ternoda - Kagereteiru Shinjitsu (汚れてる真実)\r\n\r\n\r\nDVD\r\n01. High Tension Music Video\r\n02. Musim yang Selanjutnya Music Video\r\n03. High Tension Behind the Scenes\r\n\r\n\r\nBonus :\r\n- 1 Lembar Photopack Senbatsu High Tension (Random)\r\n- 6 Hak Vooting Request Hour 2019 s.d tgl 13 April 2019', 'Musik', 'Nonaktif', '80000', '0'),
(19, 'JKT48 Birthday T-Shirt Freya Jayawardana 2024 (L,M,XL)', 0x696d672f63626537636430322d373464342d343966302d613763322d3030396539336162333366662e6a7067, 'JKT48 Birthday T-Shirt Freya Jayawardana 2024\r\n\r\nMari rayakan ulang tahun oshi kamu dengan memakai T-Shirt yang didesain sendiri oleh membernya! Periode pemesanan telah berlangsung. Kamu bisa order produk ini di official Tokopedia JKT48. Pasti seru bisa kembaran baju dengan Freya!\r\n\r\n𝙁𝙧𝙚𝙮𝙖 𝙢𝙚𝙢𝙖𝙠𝙖𝙞 𝙏-𝙎𝙝𝙞𝙧𝙩 𝙎𝙞𝙯𝙚 𝙇\r\n𝙎𝙞𝙯𝙞𝙣𝙜: 𝙍𝙚𝙜𝙪𝙡𝙖𝙧 𝘾𝙪𝙩\r\n𝘽𝙖𝙝𝙖𝙣: 𝘾𝙤𝙩𝙩𝙤𝙣 𝘾𝙤𝙢𝙗𝙚𝙙 24𝙨\r\n𝙎𝙖𝙗𝙡𝙤𝙣: 𝙋𝙡𝙖𝙨𝙩𝙞𝙨𝙤𝙡\r\n𝙒𝙖𝙧𝙣𝙖 𝙏-𝙎𝙝𝙞𝙧𝙩: 𝘾𝙤𝙛𝙛𝙚𝙚', 'Pakaian', 'Aktif', '40000', '20000'),
(20, 'JKT48 Kachuusa Uza (CD+DVD)', 0x696d672f31323136383736345f32343366636337382d666361332d343035332d386163362d3836306230383736353161645f313437365f313533352e6a7067, 'CD VERSI REGULER\r\n\r\nEveryday, Kachuusha/UZA\r\n\r\n01. Everyday, Kachuusha (Everyday,)\r\n02. UZA\r\n03. Sekarang Para-Para - Imapara \r\n04. Wahai Kesatria - Tsuyokimono yo \r\n05. Seesaw Game Penuh Air Mata - Namida no Seesaw Game\r\n\r\nDVD\r\n01. Everyday, Kachuusha (Music Video)\r\n02. UZA (Music Video)\r\n03. MV Behind the Scene\r\n\r\n\r\nBONUS\r\n- Photopack member (1 lembar random)\r\n- Nomor serial untuk Pemilihan Member Single ke-20 JKT48 (berbentuk fisik) 6 suara', 'Musik', 'Aktif', '50000', '35000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `daftarprodukpesanan`
--
ALTER TABLE `daftarprodukpesanan`
  ADD PRIMARY KEY (`id_daftarprodukpesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `datacheckout`
--
ALTER TABLE `datacheckout`
  ADD PRIMARY KEY (`id_datacheckout`),
  ADD KEY `fk_kerch_roduk` (`id_produk`),
  ADD KEY `fk_kang_pengguna` (`id_pengguna`);

--
-- Indexes for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_datacheckout` (`id_datacheckout`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_produk` (`id_produk`),
  ADD KEY `fk_keranjang_pengguna` (`id_pengguna`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`id_metodepembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `ID_PENGGUNAIBFK` (`id_pengguna`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pesanan_pengguna` (`id_pengguna`),
  ADD KEY `fk_pesanan_datacheckout` (`id_datacheckout`),
  ADD KEY `fk_pesanan_metodepembayarab` (`id_metodepembayaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftarprodukpesanan`
--
ALTER TABLE `daftarprodukpesanan`
  MODIFY `id_daftarprodukpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `datacheckout`
--
ALTER TABLE `datacheckout`
  MODIFY `id_datacheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `id_metodepembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftarprodukpesanan`
--
ALTER TABLE `daftarprodukpesanan`
  ADD CONSTRAINT `daftarprodukpesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `daftarprodukpesanan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `datacheckout`
--
ALTER TABLE `datacheckout`
  ADD CONSTRAINT `fk_kang_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_kerch_roduk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  ADD CONSTRAINT `detail_checkout_ibfk_1` FOREIGN KEY (`id_datacheckout`) REFERENCES `datacheckout` (`id_datacheckout`),
  ADD CONSTRAINT `detail_checkout_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_keranjang_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `ID_PENGGUNAIBFK` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_datacheckout` FOREIGN KEY (`id_datacheckout`) REFERENCES `datacheckout` (`id_datacheckout`),
  ADD CONSTRAINT `fk_pesanan_metodepembayarab` FOREIGN KEY (`id_metodepembayaran`) REFERENCES `metodepembayaran` (`id_metodepembayaran`),
  ADD CONSTRAINT `fk_pesanan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
