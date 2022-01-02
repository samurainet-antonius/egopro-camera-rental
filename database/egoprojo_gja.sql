-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2022 at 09:20 PM
-- Server version: 5.7.36-log
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egoprojo_gja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '');

-- --------------------------------------------------------

--
-- Table structure for table `api_midtrans`
--

CREATE TABLE `api_midtrans` (
  `id` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `payload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_midtrans`
--

INSERT INTO `api_midtrans` (`id`, `invoice`, `payload`) VALUES
(4, '20211222040138', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"506d938b-180c-4268-8c9b-c262e17cdd5b\",\"order_id\":\"20211222040138\",\"gross_amount\":\"50000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-22 22:01:55\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884755171086584\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/11e0a3ff-d80c-437a-9405-7545816fa6cf/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211222040138&status_code=201&transaction_status=pending\"}'),
(5, '20211222040319', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"24c581af-09e7-4106-9758-6a632f821d28\",\"order_id\":\"20211222040319\",\"gross_amount\":\"450000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-22 22:03:25\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"permata_va_number\":\"475005710381432\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/1076e098-5fa0-42cb-a751-5b89849dd66c/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211222040319&status_code=201&transaction_status=pending\"}'),
(6, '20211222040859', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"43503178-bd21-438c-8164-add1447986cb\",\"order_id\":\"20211222040859\",\"gross_amount\":\"120000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-22 22:09:11\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884755131896294\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/7646ec3f-045c-40c9-afbb-0826c0174a9e/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211222040859&status_code=201&transaction_status=pending\"}'),
(7, '20211222041030', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"bded2b14-c5e0-4311-92e0-a0322d9f271a\",\"order_id\":\"20211222041030\",\"gross_amount\":\"480000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-22 22:10:37\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551419731\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551419731\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/db624497-3b4e-46c8-9372-20bf7a9edf56/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211222041030&status_code=201&transaction_status=pending\"}'),
(8, '20211223124129', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"1808ace0-a251-4d17-a809-d157f6aa07d1\",\"order_id\":\"20211223124129\",\"gross_amount\":\"60000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 06:41:44\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884755147173774\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/00e39041-ac79-4e28-bfc0-38d533b0ff92/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223124129&status_code=201&transaction_status=pending\"}'),
(9, '20211223124129', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"1808ace0-a251-4d17-a809-d157f6aa07d1\",\"order_id\":\"20211223124129\",\"gross_amount\":\"60000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 06:41:44\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884755147173774\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/00e39041-ac79-4e28-bfc0-38d533b0ff92/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223124129&status_code=201&transaction_status=pending\"}'),
(10, '20211223124519', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"ce6ca90d-4ce2-419a-8bb7-430e4bcc1150\",\"order_id\":\"20211223124519\",\"gross_amount\":\"225000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 06:45:31\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551590254\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551590254\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/2cf54c75-85db-4197-8a6e-391f361f3a12/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223124519&status_code=201&transaction_status=pending\"}'),
(11, '20211223124519', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"ce6ca90d-4ce2-419a-8bb7-430e4bcc1150\",\"order_id\":\"20211223124519\",\"gross_amount\":\"225000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 06:45:31\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551590254\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551590254\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/2cf54c75-85db-4197-8a6e-391f361f3a12/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223124519&status_code=201&transaction_status=pending\"}'),
(12, '20211223030844', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"9435cfca-f86f-47eb-aedd-58ea01584b62\",\"order_id\":\"20211223030844\",\"gross_amount\":\"520000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 09:09:35\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551823335\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551823335\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/b94747a4-ffd1-4e55-a26b-fc72ea6e9173/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223030844&status_code=201&transaction_status=pending\"}'),
(13, '20211223030843', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"dc142f12-32ef-4fe2-ad4f-c22d48c7b692\",\"order_id\":\"20211223030843\",\"gross_amount\":\"520000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 09:09:25\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551498120\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551498120\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/c30f7b4a-18e0-47a6-91f9-d0eec743130f/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223030843&status_code=201&transaction_status=pending\"}'),
(14, '20211223030843', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"dc142f12-32ef-4fe2-ad4f-c22d48c7b692\",\"order_id\":\"20211223030843\",\"gross_amount\":\"520000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-23 09:09:25\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"47551498120\"}],\"fraud_status\":\"accept\",\"bca_va_number\":\"47551498120\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/c30f7b4a-18e0-47a6-91f9-d0eec743130f/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211223030843&status_code=201&transaction_status=pending\"}'),
(15, '20211226070050', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"e06a2d13-ecdc-42fe-8d15-7a0f71661c4f\",\"order_id\":\"20211226070050\",\"gross_amount\":\"160000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-27 01:00:30\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884755153213143\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/7c894f87-e341-4654-9641-36c29d87ecc1/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211226070050&status_code=201&transaction_status=pending\"}'),
(16, '20211226070249', '{\"status_code\":\"201\",\"status_message\":\"Transaksi sedang diproses\",\"transaction_id\":\"cc4b5526-bda3-4a7c-a3b4-0a608762df2f\",\"order_id\":\"20211226070249\",\"gross_amount\":\"50000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2021-12-27 01:02:30\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"permata_va_number\":\"475009044173194\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/c008d7c9-28e0-463d-8fee-69c4c4ff87b6/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=20211226070249&status_code=201&transaction_status=pending\"}');

-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_detail_sewa` bigint(10) NOT NULL,
  `id_sewa` bigint(10) NOT NULL,
  `id_produk` bigint(10) NOT NULL,
  `produk` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `durasi_peminjaman` varchar(15) NOT NULL,
  `sub_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_detail_sewa`, `id_sewa`, `id_produk`, `produk`, `harga`, `jumlah`, `durasi_peminjaman`, `sub_total`) VALUES
(11, 20211223124129, 52, 'Yellow Bobber', 15000, 2, '2', 60000),
(12, 20211223124519, 64, 'DJI Phantom 4 Standard', 75000, 1, '3', 225000),
(13, 20211223030844, 61, 'DJI RONIN S', 260000, 1, '2', 520000),
(14, 20211223030843, 61, 'DJI RONIN S', 260000, 1, '2', 520000),
(15, 20211226070050, 58, 'Rode VideoMic PRO', 80000, 1, '2', 160000),
(16, 20211226070249, 62, 'Velbon Videomate 538', 25000, 1, '2', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` bigint(10) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `id_kategori`, `nama_jenis`) VALUES
(1, 1, 'DLSR'),
(2, 1, 'Mirorrless'),
(3, 1, 'Action Cam'),
(6, 1, 'Polaroid'),
(7, 4, 'Lensa'),
(8, 4, 'External Flash'),
(9, 4, 'Studio Lighting'),
(10, 4, 'Continous Lighting'),
(11, 4, 'Handy Recorder'),
(12, 4, 'Microphone'),
(13, 4, 'Clip On'),
(14, 4, 'Camera Stabilizer'),
(15, 4, 'Tripod'),
(16, 4, 'Monopod'),
(17, 4, 'Drone'),
(18, 4, 'Instax Share'),
(20, 4, 'GoPro');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kamera'),
(4, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` bigint(10) NOT NULL,
  `nama_merk` varchar(20) NOT NULL,
  `logo_merk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`, `logo_merk`) VALUES
(1, 'FUJIFILM', ''),
(2, 'SONY', ''),
(3, 'Canon', ''),
(4, 'GoPro', ''),
(8, 'Zoom', ''),
(9, 'Godox', ''),
(12, 'Tronic', ''),
(14, 'Rode', ''),
(15, 'Boya', ''),
(16, 'Zhiyun', ''),
(17, 'DJI', ''),
(18, 'Velbon', ''),
(19, 'JieYang', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(10) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `no_wa` varchar(14) NOT NULL,
  `sosial_media` varchar(30) NOT NULL,
  `level_pelanggan` enum('Reguler','Eksklusif') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `kode_aktivasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama`, `alamat`, `no_hp`, `no_wa`, `sosial_media`, `level_pelanggan`, `status`, `kode_aktivasi`) VALUES
(7, 'antonius@gmail.com', '4e548c10ec0c24e393228bd4963ce13db1e2021a', 'Antonius', 'Perum Palm Indah Blok G, Pagojengan, Paguyangan', '08999239159', '08999239159', '@antonius25', '', 1, ''),
(8, 'dianaristia004@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Dianaristia Rachmadhani', 'Jalan Dr. Sardjito No.3 Yogyakarta ', '08985218843', '08985218843', '@dianaristiar', '', 1, ''),
(9, 'yutikalusiamaypula1@gmail.com', 'b74794121197175e3992022f2566f2396858ce7d', 'Yutika Lusiamaypula', 'Klaten', '08976546787', '08999239159', '@yutikalusia', '', 1, ''),
(11, 'umarzaky@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'umar zaky', 'Jl. Melati no 2', 'aaaaaa', 'bbbb', '@zakyzegaf', '', 1, ''),
(12, 'kuliah.daring.zaky@gmail.com', 'fbb0194e6b7fa8b49aec9efb756a3cc6df062f8e', 'kuliah daring', '', '', '', '', '', 1, ''),
(14, 'ristiadiana6@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Dianaristia', '', '', '', '', '', 0, ''),
(20, 'antoniusardyyansah@gmail.com', '4e548c10ec0c24e393228bd4963ce13db1e2021a', 'Antonius', '', '', '', '', '', 1, '6da132bc-6671-11ec-ab61-28d244f055a2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` bigint(20) NOT NULL,
  `id_sewa` bigint(10) NOT NULL,
  `tanggal-pembayaran` date NOT NULL,
  `jenis_pembayaran` enum('Cash','Transfer') NOT NULL,
  `nominal` int(10) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nama_pemilik_rekening` varchar(30) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_jenis` bigint(10) NOT NULL,
  `id_merk` bigint(10) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk1` varchar(225) NOT NULL,
  `foto_produk2` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_jenis`, `id_merk`, `deskripsi_produk`, `harga_produk`, `stok_produk`, `foto_produk1`, `foto_produk2`) VALUES
(2, 'Fujifilm X-A2 ( Tilt Screen Off )', 2, 1, 'Fujifilm X-a2 adalah penerus dari Fujifilm X-a1 yang di di realese pada tahun 2015, kamera yang masuk dalam kategori mirrorless yang mempunyai desain ringkas ini mengusung fitur selfie dalam penggunaanya, berbeda dengan pendahulunya Fujifilm X-A1 yang lcd hanya punya fitur tilting high angel dan low angel, pada Fujifilm X-A2 sudah memiliki fitur tilting 175° LCD Screen, tentu saja dengan fitur ini penggemar selfie akan semakin dimanjakan, karena layar lcd sudah bisa di setting untuk menampilkan diri kita seperti bercermin dengan kamera menghadap pada arah kita.', 100000, 5, '20211103170634a2.jpg', ''),
(3, 'Fujifilm X-A10', 2, 1, 'Fujifilm XA10 adalah mirrorless Fujifilm seri “A”, diciptakan untuk pemula. Karena itu, harga kamera mirrorless ini tergolong murah. Soal resolusi lensa, jangan khawatir! Kamu akan dipuaskan dengan kamera beresolusi 16,3 Mp serta layar LCD sebesar tiga inci yang dapat diputar. Dengan begini, kamu bisa mengambil selfie dan foto dari sudut yang lebih kreatif!\r\n\r\nBagi kamu yang ingin berkreasi dalam fotografi tapi tidak ingin repot, Fujifilm XA10 telah dilengkapi dengan Mode Dial dimana kamu bisa memilih beberapa exporuse yang diinginkan. Misalnya, Automatic, Full Manual, Semi-Automatic dan lain-lain. Semua tombol pada Fujifilm XA10 terletak pada bagian kanan sehingga kamu bisa mengatur setting mirrorless Fujifilm ini dengan mudah, bahkan dengan satu tangan!', 100000, 2, '202111031655171.jpg', ''),
(4, 'Fujifilm X-A3', 2, 1, 'Fujifilm X-A3 memiliki desain retro yang sangat menarik untuk para generasi muda. Warna-warna yang dipilih lebih segar dan fashionable, mulai dari cokelat; silver; dan pink. Sedangkan untuk top cover, dipilih bahan logam alumunium. Sangat catchy dan favorable untuk anak muda.\r\n\r\n \r\n\r\nYang membuat ini semakin menarik adalah sistem pengoperasian kamera ini. LCD yang menyertai kamera ini dilengkapi dengan touchscreen yang dapat digunakan untuk melakukan zoom bahkan menangkap gambar.', 125000, 2, '20211103171303xa3.jpg', ''),
(5, 'Fujifilm X-T 10', 2, 1, 'Fujifilm X-T10 Kit 27mm merupakan kamera Mirrorles dari Fujifilm dengan model styling retro. Fujifilm X-T10 merupakan kamera mirrorless yang menampilkan teknologi Fujifilm dengan sensor unik, mode autofocus serbaguna, dan electronic viewfinder resolusi tinggi. Dengan kualitas sensor 16,3 MP APS-C X-Trans CMOS II dan EXR Processor II, Fujifilm X-T10 mampu melakukan continuous shooting hingga 8 fps  dan merekam video dengan Full HD 1080p / 60, dan fitur sensitivitas ISO 100-51.200.', 150000, 5, '2021112509332517169553_5c480e5c-ffa6-4c81-a0d5-0a291d7bc73f_500_500.jpg', ''),
(6, 'Fujifilm X-T20', 2, 1, 'Kamera mirrorless Fujifilm X-T20 adalah penerus dari X-T10 yang populer di kalangan pengguna entry level. Seperti pendahulunya, X-T20 tetap mengadopsi desain bergaya SLR klasik dengan dimensinya yang mungil dan tampak kokoh.\r\nX-T20 merupakan versi yang lebih compact dari X-T2. Banderol harga X-T20 juga lebih murah dibandingkan X-T2.', 175000, 2, '20211125093750xt20.jpg', ''),
(7, 'Fujifilm X-T2 ( Body Only )', 2, 1, 'Kamera Fujifilm X-T2 merupakan versi update dari produsen Fujifilm yang menyamai kamera DSLR yang memiliki sensor berbentuk APS-C. Fujifilm X-T2 ini di desain dengan mengusung resolusi 24MP dan sensor X-Trans, mirip dengan kamera X-Pro 2 dan seperti kamera X-T1 jika ingin berbicara tentang jumlah piksel yang dimiliki. Kamera ini mengusung sistem X-Trans dan masih banyak lagi fitur-fitur lainnya yang ditawarkan yang menjadikannya semakin menarik perhatian para peminat kamera mirrorless Fujifilm. Beberapa diantaranya yaitu kehandalan Sensor dan AF Tracking terbaik yang dimiliki.', 200000, 2, '20211125093947x-t2.jpg', ''),
(8, 'Instax SHARE SP-2', 18, 1, 'Instax Share SP-2 adalah printer portable dengan desain unik dan lucu. Dikeluarkan oleh Fujifilm tahun 2017 lalu. Mengusung konsep printer langsung jadi, Instax Share SP-2 jadi primadona bagi Anda pecinta polaroid. Kalau Anda suka mengabadikan momen bersama orang yang Anda sayang, tentu ada saatnya ingin mencetak foto hasil jepretan Anda tersebut.\r\nUntuk semakin memudahkan pencetakan Anda, Fujifilm menawarkan solusi untuk mengatasi kemageran mencetak foto. Pabrikan asal Jepang ini menghadirkan Instax Share SP-2. Berbeda dari kamera instan seri Fujifilm, SP-2 merupakan printer foto mungil yang bisa disambungkan ke ponsel melalui koneksi Wifi.', 30000, 5, '20211125094201instax share sp 2.jpg', ''),
(9, 'Fujifilm Instax Mini 8  (Body Only)', 6, 1, 'Instax Mini 8 merupakan pilihan terbaik untuk kamu yang suka travelling karena mampu menghasilkan hasil foto instan seukuran kartu kredit. Flash built-in nya memberikan pencahayaan tambahan untuk eksposur pada saat mengambil foto di ruang terbuka atau keadaan yang pencahayaannya kurang terang.\r\n\r\nAutomatic exposure control-nya juga dapat membantu Anda untuk menyajikan exposure yang akurat serta konsisten dalam berbagai kondisi pencahayaan. Serta dilengkapi lensa Fujinon 60mm yang mampu menghasilkan fokus sedekat kurang dari 1 meter. Hal yang paling mengesankan adalah, kamera ini super mudah digunakan dan memberikan pengalaman terbaik fotografi pada penggunanya.', 30000, 5, '20211125094806instax mini 8.jpg', ''),
(10, 'Fujifilm XC 16-50mm F3.5-5.6 OIS ( KIT LENS )', 7, 1, 'Fujifilm XC 16-50mm f/3.5-5.6 OIS adalah sebuah produk pilihan yang ditujukan untuk pengguna dengan standar tinggi. Dengan panjang fokus 35mm setara dengan 24-76mm, meliputi perspektif sudut lebar potret panjangnya. Produk ini dirancang khusus untuk kamera Fujifilm seri – X mirrorless dengan sensor APS-C.\r\nDengan sistem presisi yang tinggi, lensa kamera Fujifilm XC 16-50mm f/3.5-5.6 OIS menyediakan keunggulan dalam hal kecepatan, tingkat akurasi yang tinggi dan fokus otomatisnya yang berpindah secara halus. Dengan adanya sistem image stabilization optic (O.I.S.), lensa ini dapat mengkompensasi guncangan kamera untuk membuat gambar bebas blur, bahkan dalam cahaya yang sangat minim dan saat pengambilan gambar pada tele jarak jauh. Sistem O.I.S. sendiri bahkan dapat mengurangi efek dari gerakan kamera saat pengambilan gambar video.', 30000, 2, '20211125095547Fujifilm XC 16-50mm F3.5-5.6 OIS.jpg', ''),
(11, 'Fujifilm XF 18-55mm F2.8-4 R LM OIS ( KIT LENS )', 7, 1, 'Lensa Zoom OIS XF 18-55mm f / 2.8-4 R LM dari Fujifilm adalah lensa zoom pertama untuk pemasangan X pada kamera digital lensa seri-X yang dapat dipertukarkan, dan pasti akan menemukan rumah dalam kantong kit dari banyak penembak. yang sudah terpasang pada sistem kamera berukuran APS-C ini. XF 18-55mm yang serbaguna, lensa kompak yang dapat melakukan perjalanan dengan mudah dan menanggapi berbagai situasi pemotretan memiliki kesetaraan panjang fokus 27-84mm dalam format 35mm. Ini mencakup rentang zoom standar dari telefoto sudut lebar hingga menengah dan sangat ideal untuk kebutuhan pemotretan sehari-hari dari pemotretan grup hingga potret, pemandangan kota hingga pemandangan alami. Ini adalah lensa yang hebat untuk fotografi jalanan juga.', 50000, 5, '20211125100607Fujifilm XF 18-55mm F2.8-4 R LM OIS copy.png', ''),
(12, 'Fujifilm XF 35mm f/2 R WR', 7, 1, 'XF35mm F2 R WR merupakan lensa fix atau lensa prime dengan satu buah focal length 35mm yang tidak dapat diubah. Lensa 35mm APS-C ini ekuivalen dengan focal length 50mm pada kamera fullframe. Focal length ini cocok untuk all-around use, terlebih yang suka memotret foto potrait maupun street fotografi. Kode WR yang disematkan pada lensa ini menandakan bahwa lensa ini sudah mendukung fitur Weather Resistant, yang digadang-gadang dapat bertahan dalam kondisi hujan ringan. Saya pribadi belum mengujinya, meski beberapa kali sempat nekat memotret saat gerimis, karena kamera saya tidak mendukung WR. Fungsi WR ini dapat bekerja maksimal jika menggunakan body yang juga sudah WR seperti XT-1, XT-2 dan Xpro-2.', 75000, 2, '20211125101628111.jpg', ''),
(13, 'Fujifilm XF 35mm f/1.4 R', 7, 1, 'Fujifilm Fujinon XF 35mm f/1.4 R Lensa Kamera merupakan lensa kamera yang dibekali dengan sensor APS-C dan setara dengan 53 mm dalam format 35 mm. Lensa kamera ini memiliki aperture maksimum f/1.4 yang memungkinkan Anda mengambil gambar dalam cahaya rendah dan menyediakan bokeh (bagian out of fokus foto) dengan aperture desain 7 blade yang ideal untuk potret dramatis. Selain itu lensa ini juga memiliki angle of view 44.2, group/element 6/8, lens mount Fujifilm X, dan memiliki cincin aperture 1/3 click stop.', 100000, 2, '20211125102426Fujifilm XF 35mm F-1.4 R copy.jpg', ''),
(14, 'Fujifilm XF 23mm f/1.4 R', 7, 1, 'Fujifilm XF 23mm f/1.4 R adalah lensa bersudut pandang lebar premium yang dirancang untuk memaksimalkan kinerja sensor CMOS Fujifilm X-Trans. Panjang fokus setara dengan 35mm membuatnya cocok untuk pemotretan mode Potrait atau lanskap, dan fotografi yang umum. Aperture maksimum yang cepat F/1.4 memungkinkan Anda untuk membidik dengan mudah di kondisi pencahayaan rendah. Ditambah lagi, lensa ini memungkinkan Anda untuk menciptakan efek bokeh yang artistik. Distorsi lensa dikurangi hingga minimum dengan menggunakan koreksi optik, bukannya digital. Ini membuat kualitas gambar terlihat makin sempurna. Diafragma yang memiliki 7-bilah dan berbentuk lingkaran memastikan efek bokeh terlihat lebih halus. ', 100000, 3, '20211125102841Fujifilm XF 23mm F-1.4 R.jpg', ''),
(15, 'Fujifilm XF 56mm f/1.2 R', 7, 1, 'Lensa Fujifilm Fujinon XF 56mm F1.2 R merupakan lensa prime portrait-length yang menyediakan panjang fokus setara 35mm sebesar 85mm ketika digunakan dengan kamera fujifilm digital mirrorless berukuran APS-C. Aperture maksimum f / 1.2 yang sangat terang bermanfaat untuk kontrol fokus selektif dan juga membantu dalam memotret dalam kondisi low light. Sistem internal focusing, serta penggunaan stepping AF motor, memastikan kemampuan fokus lebih tenang, halus, dan tepat yang ideal untuk aplikasi still dan video.', 110000, 3, '20211125111923Fujifilm XF 56mm F-1.2 R.jpg', ''),
(16, 'Sony A6500', 2, 2, 'Sony alpha 6500 merupakan kamera mirrorless bersensor APS-C andalan dari Produsen Sony, serta a6500 juga dibekali dengan sekumpulan pembaruan teknologi. Kamera ini diluncurkan berselang enam bulan saja sebelum Sony juga merilis kamera Alpha 6300, meskipun waktu yang berselang tidak terhitung lama, namun kamera a6500 dirancang dengan mengusung sekumpulan fitur-fitur kunci terbaik, termasuk di dalamnya yaitu stabilisasi gambar 5 Axis untuk hasil gambar yang lebih menawan yang dapat disejajarkan dengan kamera seri Alpha Sony lainnya yang juga memiliki Sensor APS-C.', 200000, 2, '20211125112101a6500.jpg', ''),
(19, 'Sony A7ii ', 2, 2, 'Sony Alpha A7 II merupakan kamera mirrorless generasi ke 4 untuk melanjutkan series A7. Ia menggunakan sensor 24 megapixel yang sama seperti pendahulunya. Namun bedanya a7ii adalah mirrorless milik sony bersensor full frame pertama di sertai image-stabilized.  Kamera mirrorless full frame sony menawarkan performa yang bisa diandalkan dalam videography maupun photography. Peningkatan dapat dilihat dari stabilitas gambar yang sekarang dimiliki A7II menjadi 5 axis sensor stabilization, juga improvisasi kinerja pada bagian AF.\r\n\r\nPada bentuk body, tidak ada perubahan yang pesat. Desain dan tata letak kontrol mirip dengan A7. Secara fisik A7II memiliki bodi yang lebih besar, dan 25% lebih berat dari kamera pendahulunya yaitu orignial series A7.  Bodi kamera ini berbahan magnesium alloy sama seperti pendahulunya juga. ', 220000, 5, '20211125140354Sony A7ii.jpg', ''),
(20, 'Sony A7iii ', 2, 2, 'Sony A7 Mark III merupakan kamera mirrorlees serbaguna yang memiliki performa tinggi ditandai dengan tidak hanya resolusinya, tetapi juga oleh fleksibilitas multimedia. Full-frame 24.2MP Exmor R BSI CMOS sensor dan BIONZ X image processor yang diperbarui, a7R III memberikan impressive 10 fps continuous shooting rate bersama dengan peningkatan kinerja autofokus untuk pelacakan subjek yang lebih cepat dan lebih handal bersama dengan cakupan bingkai yang lebar. Sistem AF Cepat Hybrid yang diperbarui ini menggunakan kombinasi 399 phase-detection point dan 425 contrast-detection area untuk perolehan fokus yang lebih cepat dalam berbagai kondisi pencahayaan dan juga mempertahankan fokus pada subjek secara lebih efektif.', 340000, 3, '20211125140259sony a7iii.jpg', ''),
(21, 'Sigma 35mm f1.4 DG HSM ART ', 7, 2, 'Sigma 35mm F1.4 DG HSM Art for Sony E-Mount merupakan lensa first entry seri profesional dari Sigma, dengan penekanan pada artistic expression dan potensi kreatif. Dengan aperture maksimum f / 1.4 yang cerah, floating inner focusing system, dan Hyper Sonic Motor (HSM) akan memiliki kontrol cepat dan akurat atas efek artistik yang dicapai oleh elemen berkualitas tinggi dari lensa. Untuk fotografi sudut lebar, lensa 35mm ini dan aperture f/1.4 dengan circular 9-bladed memastikan kecerahan yang sangat baik dan efek latar belakang buram (bokeh). Super Multi-Layer Coating mengurangi flare dan ghosting dan memberikan gambar kontras yang tajam dan tinggi bahkan dalam kondisi backlit.', 150000, 4, '20211125141259Sigma 35mm f1.4 DG HSM ART.jpg', ''),
(22, 'Sigma 50mm f1.4 DG HSM ART ', 7, 2, 'Sigma 50mm F1.4 DG HSM Art telah didesain ulang dan direkayasa ulang untuk menetapkan standar baru untuk jalur Art. Dengan 1,4 aperture besar, Sigma 50mm F1.4 DG HSM Art adalah lensa tingkat profesional untuk pemotretan segala sesuatu termasuk fotografi potret, fotografi landscape, studio fotografi dan street photography. Sigma 50mm F1.4 DG HSM Art adalah lensa kinerja tinggi untuk sensor DSLR modern. 13 elemen dalam 8 kelompok memungkinkan untuk kinerja tak tertandingi bahkan pada lubang lebar dan fotografi close-up yang mudah dikelola dengan minimum jarak fokus 40 cm.', 150000, 3, '20211125141651Sigma 50mm f1.4 DG HSM ART.jpg', ''),
(23, 'Sony E PZ 16-50mm F3.5-5.6 OSS', 7, 2, 'Sony E PZ 16-50mm F3.5-5.6 OSS adalah lensa zoom standar aperture maksimum variabel untuk Sony E-mount, diumumkan oleh Sony pada 12 September 2012 dan dirilis Januari 2013. Lensa ini sering dibundel dengan berbagai Sony Alpha kamera mirrorless sebagai \"lensa kit\".', 30000, 4, '20211125142058Sony E PZ 16-50mm F3.5-5.6 OSS.jpg', ''),
(24, 'Sony FE 28-70mm f/3.5-5.6 OSS', 7, 2, 'Sony FE 28-70mm f/3.5-5.6 OSS Lens adalah lensa zoom sudut lebar hingga panjang potret serbaguna, ringkas, dan ringan yang dirancang khusus untuk kamera E-mount full-frame. Ini juga kompatibel dengan sensor gambar berukuran APS-C dan akan memberikan rentang panjang fokus setara 35mm dari 42-105mm. Berkenaan dengan desain optik, tiga elemen asferis dan satu elemen dispersi ekstra rendah membantu mengurangi aberasi dan distorsi sambil berkontribusi pada ketajaman dan kejernihan gambar yang menonjol. Lensa ini juga mengintegrasikan stabilisasi gambar Optical SteadyShot untuk mengurangi tampilan guncangan kamera saat bekerja dalam kondisi kurang cahaya atau dengan panjang fokus yang lebih panjang. Selain itu, konstruksi tahan debu dan kelembapan memastikan penggunaan lensa ini dalam kondisi lingkungan yang sulit.', 70000, 3, '20211125142526Sony FE 28-70mm f-3.5-5.6 OSS.jpg', ''),
(25, 'Carl Zeiss Vario-Tessar T* FE 24-70MM F4 ZA OSS', 7, 2, 'Sony Vario-Tessar T* FE 24-70mm f/4 ZA OSS Lens merupakan lensa dengan sudut lebar (wide-angle) dengan panjang potret lensa zoom yang memiliki konstan f/4 aperture maksimal untuk mendukung kinerja yang konsisten dalam hal pengaturan eksposur dan fokus penempatan seluruh rentang zoom. Lima elemen aspherical dan satu elemen dispersi bantuan ekstra–rendah untuk mengurangi penyimpangan dan distorsi dengan kontribusi untuk ketajaman gambar dan kejelasan. Carl Zeiss T * dengan lapisan anti-reflektif juga telah diterapkan untuk elemen lensa untuk mengurangi flare dan ghosting pada lensa juga untuk meningkatkan kontras dan ketepatan warna.', 170000, 4, '202111251434371222.jpg', ''),
(26, 'Sony FE 50mm f1.8', 7, 2, 'Sony FE 50mm F1.8 adalah lensa prime full-frame standar untuk Sony E-mount, yang dirilis oleh Sony pada tahun 2016. Lensa adalah salah satu penawaran lensa anggaran pertama Sony untuk panjang fokus 50mm.', 60000, 2, '20211125143736Sony FE 50mm f1.8.jpg', ''),
(27, 'Sony FE 85mm f1.8', 7, 2, 'SONY FE 85mm F/1.8 merupakan lensa short-telephoto ramping yang dirancang untuk kamera mirrorless E-mount. Dengan aperture f / 1.8 yang terang cocok digunakan dalam kondisi low-light dan juga memberikan kontrol luas terhadap kedalaman bidang saat bekerja dengan teknik selective focus.', 100000, 2, '20211125144058Sony FE 85mm f1.8.jpg', ''),
(28, 'PROCORE Adapter', 7, 3, 'Procore Mount Adapter Canon EF/EF-S to Sony E-Mount IV merupakan adapter dari lensa Canon EF/EF-S ke Sony E-Mount dan Adapter ini juga memiliki fitur Auto-Focus.\r\nProcore Mount Adapter Canon EF-NEX IV ini tidak dilengkapi optik, jadi bukanlah seri yang dilengkapi dengan speed booster. Namun, procore IV bisa diupdate firmwarenya.', 50000, 4, '20211125144835PROCORE Adapter.jpg', ''),
(29, 'Sigma MC-11 Converter', 7, 3, 'Sigma MC-11 merupakan adaptor lensa yang memungkinkan penggunaan lensa Sigma SA mount pada SONY E-mount dan mempertahankan kinerja penuh lensa, termasuk autofocus dan auto-exposure serta teknologi koreksi dalam kamera. Lens adapter ini mampu mengurangi refleksi dan mempertahankan data EXIF untuk manfaat pasca produksi dan manajemen file. Selain itu lens adapter ini memiliki sebuah LED terintegrasi.', 70000, 3, '20211125145249Sigma MC-11 Converter copy.jpg', ''),
(30, 'Canon EOS R ', 2, 3, 'Canon EOS R merupakan kamera mirrorless pertama Canon yang dibekali dengan sensor CMOS 30,3 megapiksel dan prosesor gambar DIGIC 8. Dengan itu kamera dapat menghasilkan gambar beresolusi tinggi dengan kualitas yang tajam dan detail untuk kebutuhan foto berukuran besar.', 400000, 3, '20211125145846Canon EOS R.jpg', ''),
(31, 'Canon EOS 6D WiFi', 1, 3, 'Canon EOS 6D Body without Wifi and GPS adalah kamera DLSR full frame yang teringan* dan dilengkapi sensor CMOS 20.2 megapiksel dengan ketepatan sistem AF 11 titik dan tanpa dilengkapi dukungan Wifi dan GPS. Kamera DSLR full frame ini teringan sejak 13 September 2012, survei Canon.', 250000, 2, '20211125150424Canon EOS 6D WiFi.jpg', ''),
(32, 'Canon EOS 6D Mark ii', 1, 3, 'Seri EOS 6D Mark II ini sendiri merupakan lanjutan dari Canon EOS 6D yang merupakan salah satu kamera full-frame yang cukup populer karena beratnya yang ringan.\r\nPada seri penerus dari 6D ini, Canon telah melengkapinya dengan sejumlah fitur baru yang sebelumnya tidak ditemukan dari seri pendahulunya. Selain itu, pada beberapa fitur yang sebelumnya menjadi andalan dari seri pendahulunya, dilakukan penyempurnaan pada EOS 6D Mark II ini.', 300000, 2, '20211125151759Canon EOS 6D Mark ii copy.jpg', ''),
(33, 'Canon EOS 7D', 1, 3, 'Canon EOS 7D adalah kamera APS-C unggulan pabrikan. Dirancang untuk menyaingi kamera seperti Nikon D300S, ini menggabungkan hitungan megapiksel tinggi dengan label harga yang wajar. Dalam banyak hal, kamera ini bahkan bisa menyaingi Canon 5D Mark II.', 130000, 2, '20211125153511eos 7d.jpg', ''),
(34, 'Sigma 35mm f1.4 DG HSM ART ', 7, 3, 'Sigma 35mm F1.4 DG HSM Art for Canon merupakan lensa first entry seri profesional dari Sigma, dengan penekanan pada artistic expression dan potensi kreatif. Dengan aperture maksimum f / 1.4 yang cerah, floating inner focusing system, dan Hyper Sonic Motor (HSM) akan memiliki kontrol cepat dan akurat atas efek artistik yang dicapai oleh elemen berkualitas tinggi dari lensa.', 150000, 2, '20211127064228Sigma 35mm f1.4 DG HSM Art canon.jpg', ''),
(35, 'Sigma 50mm f1.4 DG HSM Art ', 7, 3, 'Sigma 50mm F1.4 DG HSM Art adalah lensa kinerja tinggi untuk sensor DSLR modern. 13 elemen dalam 8 kelompok memungkinkan untuk kinerja tak tertandingi bahkan pada lubang lebar dan fotografi close-up yang mudah dikelola dengan minimum jarak fokus 40 cm. Sigma 50mm 1.4 lensa adalah biasa standar baru, perdana standar.', 150000, 2, '20211127064759Sigma 50mm f1.4 DG HSM Art canon.jpg', ''),
(36, 'Sigma 85mm f1.4 DG HSM Art', 7, 3, 'Sigma 85mm f-1.4 DG HSM Art merupakan lensa kamera dengan aperture f/1.4, sehingga mampu menghasilkan gambar dengan kedalaman lapangan dangkal dan bokeh halus. Lensa ini menggunakan 2 elemen SLD dan 1 elemen dispersi parsial/indeks bias-anomali serta 1 elemen aspherical untuk meminimalkan penyimpangan dan memastikan gambar tajam dan jernih. Untuk pengoperasiannya, motor Hyper Sonic AF mampu memberikan fokus cepat dan akurat serta sebuah cincin fokus besar memungkinkan penyetoran fokus manual untuk melakukan penyesuaian yang baik. Diafrahma 9-blade bulatnya juga mampu membantu membuat bokeh yang halus dan mulus. Selain itu lensa kamera ini terbuat dari material komposit termal-stabil yang ringan dan tahan lama serta memiliki mount bayonet kuningan.', 175000, 1, '20211127065344Sigma 85mm f1.4 DG HSM Art canon.jpg', ''),
(37, 'Canon EF 50mm f1.2 L USM', 7, 3, 'Canon EF 50mm F/1.2L USM merupakan lensa 50mm Canon dengan aperture atau bukaan terbesar mencapai f/1.2. Aperture yang superbesar ini memungkinkan penerimaan cahaya yang lebih banyak pada sensor kamera sehingga kamu bisa menggunakan shutter speed lebih cepat ketika memotret pada kondisi low light.', 175000, 2, '20211127072227Canon EF 50mm f1.2 L USM.jpg', ''),
(38, 'Canon EF 50mm f1.4 L USM', 7, 3, 'Canon EF 50mm f/1.4 USM Lensa Kamera adalah lensa telephoto berkualitas yang mudah dibawa. Kecepatan f/1.4 membuatnya sempurna untuk pemotretan dengan lokasi berpencahayaan cukup. Canon EF 50mm f/1.4 USM termasuk lensa yang ideal untuk zooming saat pengambilan gambar dalam kondisi cahaya rendah.', 60000, 2, '20211127072701Canon EF 50mm f1.4 L USM.jpg', ''),
(39, 'Canon EF 17-40mm f4 L USM', 7, 3, 'Lensa zoom bersudut sangat lebar memungkinkan Anda untuk memotret foto yang lebar bahkan dengan kamera SLR digital yang memiliki ukuran tampilan yang lebih kecil dari 35mm, mencakup rentang sudut sangat lebar 17mm sampai rentang standar 40mm. Tiga elemen lensa asferis yang terdiri dari dua tipe memberikan rentang zoom yang lebar dan kualitas gambar yang tinggi, sementara elemen lensa UD super menyediakan pengoreksian penyimpangan kromatik tipe perbesaran yang menakjubkan.', 120000, 2, '20211127073600Canon EF 17-40mm f4 L USM.jpg', ''),
(40, 'Canon EF 70-200mm f2.8 L USM', 7, 3, 'Canon EF 70-200mm f/2.8 L IS USM III adalah lensa zoom telefoto seri-L yang dibedakan oleh desainnya yang cerah dan optik yang canggih. Ideal untuk berbagai subjek mulai dari potret hingga olahraga, bukaan maksimum f/2.8 yang konstan cepat serta unggul dalam kondisi pencahayaan yang sulit dan juga menawarkan peningkatan kontrol pada depth of field untuk mengisolasi subjek. Tata letak optik menggunakan satu elemen fluorit dan lima elemen UD untuk menekan aberasi kromatik dan color fringing untuk mewujudkan kejelasan tingkat tinggi di seluruh rentang zoom. Air Sphere Coating juga ditampilkan, dan berfungsi untuk mengurangi flare dan ghosting untuk kesetiaan dan kontras warna yang lebih besar di semua kondisi.', 170000, 2, '20211127074355Canon EF 70-200mm f2.8 L USM.jpg', ''),
(41, 'Canon EF 100mm f2.8 L USM', 7, 3, 'Lensa EF 100mm f/2.8 Macro USM dari Canon akan fokus pada rentang penuh dari makro tak terhingga hingga ukuran sebenarnya (rasio reproduksi 1:1). Ideal untuk memotret detail dan materi subjek kecil, lensa ini juga berfungsi sebagai lensa telefoto prima yang sangat tajam untuk potret dan aplikasi lainnya. Ini memberikan kombinasi keserbagunaan, kualitas gambar, dan penanganan yang luar biasa.', 125000, 2, '20211127075048Canon EF 100mm f2.8 L USM.jpg', ''),
(42, 'GOPRO HERO 7 BLACK', 3, 4, 'GoPro Hero 7 Black merupakan kamera action yang diluncurkan oleh merk GoPro. Jadi salah satu action cam terbaik, Kamera ini merupakan spesifikasi tertinggi untuk lini Hero 7. Meski saat ini banyak action cam murah harga 1 jutaan, tapi merk GoPro sudah punya penggemarnya tersendiri.', 125000, 2, '20211127080032GOPRO HERO 7 BLACK.jpg', ''),
(43, 'GOPRO HERO 4 BLACK', 3, 4, 'GoPro HERO4 merupakan kamera aksi keluaran GoPro dengan lensa Wide Angle beresolusi 12MP. Didukung sensor CMOS, kamera aksi ini dapat merekam video dengan kualitas 4K. HERO4 mampu digunakan di dalam air hingga kedalaman 33 meter. Baterainya sendiri berkapasitas 1160mAh dan mampu bertahan selama 1.6h.', 100000, 2, '20211127081621GOPRO HERO 4 BLACK.jpg', ''),
(44, 'GOPRO HERO 4 SILVER', 3, 4, 'GoPro Hero4 Silver Edition merupakan kamera pertama GoPro yang udah dilengkapi dengan layar sentuh. Dengan layar sentuh ini kamu bisa mengubah pengaturan kamera, membidik gambar, hingga memutar ulang video yang sudah direkam.', 70000, 3, '20211127082523GOPRO HERO 4 SILVER copy.jpg', ''),
(45, 'HeadStrap', 20, 4, 'Head strap ini merupakan aksesoris Action Camera GoPro / Xiaomi Yi dan juga hp yang digunakan di kepala ataupun di helm. Dapat digunakan di semua action camera dan juga hp, untuk hp 6inch keatas silahkan tanyakan apakah muat. Head strap ini akan membantu Anda mengambil gambar dengan baik ketika melakukan aktivitas seperti hiking, climbing. Bagian dalamnya memiliki anti skid gel sehingga lebih merekat dan tidak mudah jatuh.', 15000, 3, '20211127083258HeadStrap.jpg', ''),
(46, 'WristBand', 20, 4, 'Wrist Band adalah Strap untuk memasang GoPro pada pergelangan tangan, lengan, stang sepeda, dan lainnya. Strap ini di rancang untuk bisa di atur ukurannya seperti ikat pinggang. Selain itu strap ini juga tahan air/water-resistant', 15000, 4, '20211127083805WristBand.jpg', ''),
(47, 'Chest Harness', 20, 4, 'GoPro Chest Harness berfungsi untuk memudahkan Anda merekam video dan foto lebih mendalam lagi dari GoPro yang ter-mounting chest harness ini di Dada Anda.', 15000, 4, '202111270853231212.jpg', ''),
(48, '1 Suction Cup', 20, 4, 'Suction Cup merupakan sebuah produk untuk pengguna GoPro Hero 3 / 2 / 1. Produk ini memiliki suction cup yang kuat berdiameter 9cm sehingga Anda dapat mengambil gambar dengan baik. Produk ini juga terbuat dari bahan berkualitas tinggi sehingga akan tahan lama tidak mudah rusak.', 15000, 4, '202111270859201 Suction Cup.jpg', ''),
(49, '3 Suction Cup', 20, 4, 'Suction Cup merupakan sebuah produk untuk pengguna GoPro Hero 3 / 2 / 1. Produk ini memiliki suction cup yang kuat berdiameter 9cm sehingga Anda dapat mengambil gambar dengan baik. Produk ini juga terbuat dari bahan berkualitas tinggi sehingga akan tahan lama tidak mudah rusak.', 15000, 4, '202111270901423 Suction Cup.jpg', ''),
(50, 'Handle Bar', 20, 4, 'GoPro Handlebar, SeatPost, Pole Mount adalah perangkat Mount atau bantalan khusus yang memungkinkan kamera GoPro Anda dapat dipasang di peralatan olahraga kesayangan Anda. Desain Roll Bar yang dapat disesuaikan ukurannya dengan skrup putar memudahkan Anda untuk meletakan Mount ini di stang sepeda, tongkat ski, pegangan Kite Surfing, dan masih banyak lagi. Skrup Mount dapat diputar dengan mudah agar bisa disesuaikan dengan ukuran permukaan berbentuk silinder seperti tiang atau pipa.', 15000, 3, '20211127091847Handle Bar.jpg', ''),
(51, 'Adhesive Mount', 20, 4, 'Adhesive Mount berfungsi untuk menempelkan kamera GoPro pada hampir segala macam jenis permukaan yang cenderung halus seperti papan surfing, dashboard mobil dan sejenisnya, sehingga kamu tak perlu mengebor atau memasang braket permanen. Namun sebelum kamu memakai mount adhesive alias penempel berperekat ini maka ada beberapa hal yang harus kamu ketahui tentang benda tersebut.', 15000, 3, '20211127115121Adhesive Mount.jpg', ''),
(52, 'Yellow Bobber', 20, 4, 'Yellow Bobber adalah pelampung untuk kamera GoPro Anda sehingga kamera Anda akan mengapung di atas permukaan air. Dengan Floating Hand Grip Bobber Anda tidak perlu lagi kesulitan mencari kamera Anda ketika terjatuh di dalam air. Dengan Floating Hand Grip Bobber, Anda tidak perlu lagi kesulitan mencari kamera Anda ketika terjatuh di dalam air.', 15000, 1, '20211127123517Yellow Bobber.jpg', ''),
(53, 'Godox V860ii C ', 8, 3, 'Flash Godox V860II C adalah flash TTL untuk Canon dengan fitur andalan seperti GN60, HSS dan baterainya Lithium. Flash ini bisa bekerja sebagai Master (bila dipasang diatas kamera) dan juga sebagai Slave.', 75000, 2, '20211127123910Godox V860ii C.jpg', ''),
(54, 'Godox AD600BM', 9, 9, 'GODOX WITSTRO AD600BM merupakan flash manual dengan HSS yang kompatibel juga dengan Canon/Nikon dan semua merek kamera lainnya. Godox Witstro memiliki kualitas lampu studio (GN 86), didukung dengan baterai eksternal, portable, dan mendukung pengaturan secara wireless.', 270000, 2, '20211127124403Godox AD600BM.jpg', ''),
(55, 'TRONIC TR-500', 9, 12, 'Tronic TR500e Professional Studio Flash merupakan lampu flash untuk profesional studio dengan fitur maksimal power yang mencapai 500Ws dan memiliki Guide Number 80. Selain itu Tronic TR500e Professional Studio Flash sangat cocok untuk berbagai tugas studio anda dan terbuat dari bahan berkualitas tinggi yang membuatnya terlihat begitu compact dan kokoh, untuk detail fitur TR500e memiliki Recycle Time yang cukup cepat yaitu 0.3-1.5 dan Color Temperature 5600±200K.', 150000, 2, '20211127132206TRONIC TR-500 copy.jpg', ''),
(56, 'Godox LEDP120C', 10, 9, 'Godox P-120C LED Video Light merupakan flash kamera yang dapat memberikan tingkat kecerahan dan suhu warna yang tinggi. Anda dapat secara fleksibel mengontrol kecerahan cahaya dengan menggunakan dimmer dan mengubah arah iluminasi dengan menggunakan tombol pengatur sudut. Cocok digunakan untuk pemotretan macrophotography, product shooting, photojournalistic & video recording, wedding videography dan lainnya.', 60000, 1, '20211127131418Godox LEDP120C.jpg', ''),
(57, 'Zoom H4n PRO', 11, 8, 'ZOOM H4N PRO with Accessory Pack menyediakan solusi perekaman mobile lengkap, yang sesuai untuk produksi film, podcasting, field interview, sound design, musician, dan voice-over. H4n merupakan 2-channel (in stereo mode) portable recording device dengan antarmuka USB yang sesuai dengan telapak tangan Anda. Recorder ini memiliki mikrofon stereo X / Y yang mampu menangani 140 dB SPL, serta low-noise preamp dengan kombinasi pengunci XLR / 1/4 ” input, mode perekaman multiple, efek on-board, built-in metronome, chromatic tuner dan banyak lagi yang lainnya.', 100000, 3, '20211127133318Zoom H4n PRO.jpg', ''),
(58, 'Rode VideoMic PRO', 12, 14, 'Rode VideoMic Pro adalah mikrofon shotgun yang dirancang untuk digunakan dengan camcorder, kamera DSLR, dan perekam audio portabel. Polar Pattern super-cardioid memastikan bahwa audio di sekitar diminimalkan, dan rekaman Anda difokuskan pada subjek di depan kamera. Pada bagian belakang mikrofon kontrol daya, filter, dan level mudah diakses. Selain respons mikrofon asli 40Hz-20kHz, tersedia filter high-pass pada 80Hz, yang akan mencegah kebisingan low-end seperti AC dan lalu lintas dari rekaman. Peningkatan level + 20dB dirancang untuk digunakan dengan kamera DSLR, memungkinkan pengguna untuk mengurangi level preamp kamera (atau level input mic), secara efektif mengurangi jumlah noise yang dihasilkan oleh sirkuit audio berkualitas rendah yang dimiliki kamera.', 80000, 3, '20211127133949Rode VideoMic PRO.jpg', ''),
(59, 'BOYA BY-WM8', 13, 15, 'Boya BY-WM8 adalah UHF Dual-Channel Wireless Microphone System yang telah diupgrade untuk menangkap audio dengan subjek ganda, fitur layar LCD yang mudah dibaca, wide switching RF bandwidth, PLL-synthesized tuning dan digital companding circuitry. BY-WM8 Pro K2 ini cocok untuk berbagai aplikasi nirkabel seperti wawancara, pengumpulan berita elektronik (ENG), produksi bidang elektronik (EFP), produksi film, aplikasi bisnis dan pendidikan, dan banyak lagi.', 120000, 2, '20211127135344BOYA BY-WM8.jpg', ''),
(60, 'Zhiyun Crane 2', 14, 16, 'Zhiyun Crane V2 3-Axis Stabilizer Gimbal Camera merupakan 3-axis handheld gimbal stabilizer yang menawarkan rotasi 360° di sepanjang three axes. Button-power dan continue rotasi di sepanjang pan axis dan manual, non-stop rotasi melingkar di sepanjang tilt danroll axes. Zhiyun Crane V2 dirancang khusus untuk kamera DSLR dan mirroless yang memiliki beban maksimal 1.75 kg, seperti Sony a7S dan Panasonic GH4 dan sudah mencakup dukungan lensa attachable untuk lensa tele. Crane memiliki tiga 32-bit MCUs (unit kontrol motor) yang beroperasi sejajar pada 4000 Hz dan memiliki joystick untuk fingertips yang memungkinkan beralih di antara mode yang berbeda.', 225000, 2, '20211127140810zzzz.jpg', ''),
(61, 'DJI RONIN S', 14, 17, 'DJI Ronin S merupakan gimbal stabilizer yang khusus ditujukan untuk kamera mirrorless dan kamera DSLR. Sesuai dengan fungsinya, DJI Ronin S ini membantu menstabilkan kamera saat Anda melakukan perekaman video.', 260000, 0, '20211127161215DJI RONIN S z.jpg', ''),
(62, 'Velbon Videomate 538', 15, 18, 'Velbon Videomate 538 adalah tripod berdesain deluxe yang dirancang untuk video . Velbon Videomate 538 memiliki fitur utama yaitu 3-section aluminum legs dengan radial leg brace untuk menjaga stabilitas dan kenyamanan saat merekam gambar serta geared center column dengan ketinggian maksimum hingga 1.61 meter.', 25000, 0, '20211127161923Velbon Videomate 538.jpg', ''),
(63, 'Jieyang Monopod', 16, 19, 'JieYang Video Monopod JY0506A merupakan video monopod yang serbaguna bagi semua videographer. Video monopod ini terbuat dari bahan alumunium alloy berkualitas tinggi yang mampu menampung beban hingga 4kg. Selain itu, Video Monopod juga dilengkapi dengan fluid head serta tripod flat legs.', 25000, 3, '20211127162803Jieyang Monopod.jpg', ''),
(64, 'DJI Phantom 4 Standard', 17, 17, 'DJI Phantom 4 Advanced adalah salah satu produk drone dengan posisi entri level profesional. Ia juga dilengkapi dengan berbagai Sensor pendeteksi Obstacle.\r\nAdapun berat yang dimiliki oleh drone satu ini adalah antara 1.388 g, 1.368 g dan juga 1.326 g. Berat ini sudah termasuk ke dalam baling-baling dan juga baterainya.', 75000, 2, '20211127163906DJI Phantom 4 Standard.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` bigint(10) NOT NULL,
  `no_sewa` bigint(10) NOT NULL,
  `id_admin` bigint(10) NOT NULL,
  `id_pelanggan` bigint(10) NOT NULL,
  `nama_peminjam` varchar(200) NOT NULL,
  `alamat_peminjam` text NOT NULL,
  `total_produk` bigint(15) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `tanggal_mulai_sewa` date NOT NULL,
  `tanggal_selesai_sewa` date NOT NULL,
  `jaminan` varchar(30) NOT NULL,
  `file_jaminan` varchar(200) NOT NULL,
  `tgl_sewa` datetime DEFAULT CURRENT_TIMESTAMP,
  `deadline_sewa` datetime DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas','Batal') NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `no_sewa`, `id_admin`, `id_pelanggan`, `nama_peminjam`, `alamat_peminjam`, `total_produk`, `total_harga`, `tanggal_mulai_sewa`, `tanggal_selesai_sewa`, `jaminan`, `file_jaminan`, `tgl_sewa`, `deadline_sewa`, `status_pembayaran`) VALUES
(20211223030843, 20211223030843, 1, 8, 'Zaky', 'Jogja', 1, 520000, '2021-12-23', '2021-12-25', 'SIM', '16402253235.png', '2021-12-23 09:10:46', '2021-12-24 03:10:46', 'Batal'),
(20211223030844, 20211223030844, 1, 14, 'Zaky', 'Jogja', 1, 520000, '2021-12-23', '2021-12-25', 'KTP', '1640225324604307144_kaliurang.png', '2021-12-23 09:10:17', '2021-12-24 03:10:17', 'Batal'),
(20211223124129, 20211223124129, 1, 8, 'diana', 'jetsharjo', 2, 60000, '2021-12-23', '2021-12-25', 'KTP', '16402164895.png', '2021-12-23 06:42:33', '2021-12-24 00:42:33', 'Batal'),
(20211223124519, 20211223124519, 1, 8, 'Dianaristia', 'Jetisharjo JT II', 1, 225000, '2021-12-23', '2021-12-26', 'KTP', '16402167195.png', '2021-12-23 06:45:35', '2021-12-24 00:45:35', 'Batal'),
(20211226070050, 20211226070050, 1, 20, 'Antonius', 'Jakarta', 1, 160000, '2021-12-26', '2021-12-28', 'KTP', '1640541650Jaehyuk wallpaper ©Twitter.jpg', '2021-12-27 01:01:02', '2021-12-27 19:00:59', 'Batal'),
(20211226070249, 20211226070249, 1, 20, 'Antonius', 'Jakarta', 1, 50000, '2021-12-26', '2021-12-28', 'KTP', '1640541769Jaehyuk wallpaper ©Twitter.jpg', '2021-12-27 01:03:02', '2021-12-27 19:02:59', 'Batal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `api_midtrans`
--
ALTER TABLE `api_midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD PRIMARY KEY (`id_detail_sewa`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kode_kategori` (`id_jenis`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `api_midtrans`
--
ALTER TABLE `api_midtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  MODIFY `id_detail_sewa` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_pembayaran` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20211226070250;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_sewa_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenis`
--
ALTER TABLE `jenis`
  ADD CONSTRAINT `jenis_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
