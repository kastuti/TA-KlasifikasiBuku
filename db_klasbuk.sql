-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2020 pada 09.30
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klasbuk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `email`, `password`, `foto`) VALUES
(5, 'admin', 'admin1@gmail.com', '$2y$10$4arBesffESVn/NBNg9AMauoGdGXetw10PHxem8cbK3l7SW01an6ua', 'IMG_20180610_120225.jpg'),
(8, 'kastuti', 'admin2@gmail.com', '$2y$10$rv60njAUkObe1FbXRDnrEOfPjXII4LtfC6RhG8/lR64LxBh1Tohlq', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_baseword`
--

CREATE TABLE `tb_baseword` (
  `kata` text NOT NULL,
  `kata_dasar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_baseword`
--

INSERT INTO `tb_baseword` (`kata`, `kata_dasar`) VALUES
('menyapu,menyapukan,menyapui,sapukan,sapui', 'sapu'),
('tentukan,menentukan,penentu,penentuan', 'tentu'),
('mengoperasikan,operasikan', 'operasi'),
('memetakan,pemetaan', 'peta'),
('membangun,pembangunan,dibangun,dibangunkan,kebangun', 'bangun'),
('pendekatan,mendekat,mendekatkan', 'dekat'),
('tiruan,meniru,menirukan,peniruan,peniru,tiruannya,peniruannya,niru', 'tiru'),
('dituntun,menuntun,penuntunan,penuntun', 'tuntun'),
('disabdakan,menyabdakan,sabdakan', 'sabda'),
('tanyakan,menanyakan,menanyai', 'tanya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` text DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` varchar(5) DEFAULT NULL,
  `tempat_terbit` varchar(50) DEFAULT NULL,
  `klasifikasi` varchar(256) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `cover` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `isbn`, `penerbit`, `tahun_terbit`, `tempat_terbit`, `klasifikasi`, `sinopsis`, `pengarang`, `cover`) VALUES
(22, 'Dasar Pemrograman Web Dinamis Menggunakan PHP', '978-623-01-0061-1', 'Andi', '2019', 'Yogyakarta', '000', 'Ingin membuat aplikasi web yang bersifat dinamis? menggunakan pendekatan Belajar dengan Mencoba\"\" dan pembahasan sederhana serta mudah untuk diikuti\",\"buku ini akan membantu mewujudkan keinginan anda.', 'Abdul kadir', 'cover.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datlat`
--

CREATE TABLE `tb_datlat` (
  `id_datlat` int(11) NOT NULL,
  `js_buku` text NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `hasil` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_datlat`
--

INSERT INTO `tb_datlat` (`id_datlat`, `js_buku`, `kategori`, `hasil`) VALUES
(34, 'Desain Web Interaktif dan Dinamis dengan Microsoft FrontPage XP', '000', 'desain web interaktif   dinamis   microsoft frontpage xp'),
(35, 'Web Statis dan Dinamis dengan Dreamweaver 8', '000', 'web statis   dinamis   dreamweaver  '),
(36, 'Trik Cepat Membangun Aplikasi Berbasis Web dengan Framework Codelgniter', '000', 'trik cepat bangun aplikasi berbasis web   framework codelgniter'),
(37, 'Etika Membangun Sikap Profesionalisme Sarjana', '100', 'etika membangun sikap profesionalisme sarjana'),
(38, '25 Etika Profesi', '100', '   etika profesi'),
(39, 'Etika di ruang publik : Pendekatan Politik dan Manajemen', '100', 'etika     publik   pendekatan politik   manajemen'),
(40, 'Mudah & Praktis Belajar Tajwid', '200', 'mudah   praktis belajar tajwid'),
(41, 'Semua Bisa Hafal Al-Qur\'an : Semua Umur Semua Profesi Laki-laki dan Perempuan', '200', '    hafal al-qur\'an     umur   profesi laki-laki   perempuan'),
(42, 'Dahsyatnya Bacaan Al-Qur\'an bagi Ibu Hamil', '200', 'dahsyatnya bacaan al-qur\'an   ibu hamil'),
(44, 'Pendidikan Pancasila', '300', 'pendidikan pancasila'),
(46, 'Ekonomi Mikro untuk Ilmu Pertanian', '300', 'ekonomi mikro   ilmu pertanian'),
(47, 'Kamus Mandarin Indonesia 8000 Kata', '400', 'kamus mandarin indonesia       '),
(48, 'Kamus Indonesia Inggris', '400', 'kamus indonesia inggris'),
(49, 'Siapa pun Bisa Bahasa Jerman', '400', 'siapa     bahasa jerman'),
(50, 'Fisika Dasar', '500', 'fisika dasar'),
(51, 'Mekanika Fluida edisi keempat Jilid 1', '500', 'mekanika fluida edisi keempat jilid  '),
(52, 'Pemrograman Fuzzy dan Jaringan Syaraf Tiruan untuk Sistem Kendali Cerdas', '500', 'pemrograman fuzzy   jaringan syaraf tiruan   sistem kendali cerdas'),
(53, 'Rahasia Sehat Setiap Hari', '600', 'rahasia sehat    '),
(54, 'Jam Piket Organ Tubuh', '600', 'jam piket organ tubuh'),
(55, 'Atlas Anatomi Klinik edisi 2', '600', 'atlas anatomi klinik edisi  '),
(56, '101 Tip & Trik Kamera Digital', '700', '    tip   trik kamera digital'),
(57, 'Buku Penuntun Membuat Tesis Skripsi  Disertasi  Makalah', '800', 'buku penuntun   tesis skripsi  disertasi  makalah'),
(58, 'ATLAS Hadits : Uraian lengkap seputar Nama Tempat dan Kaum yang Disabdakan Rasulullah Saw.', '900', 'atlas hadits   uraian lengkap seputar       kaum   disabdakan rasulullah saw '),
(60, 'Desain Web Interaktif dan Dinamis Dengan Microsoft FrontPage XP', '000', 'desain web interaktif   dinamis   microsoft frontpage xp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klasbuk`
--

CREATE TABLE `tb_klasbuk` (
  `id_klasbuk` int(11) NOT NULL,
  `js_buku` text NOT NULL,
  `hasil1` text DEFAULT NULL,
  `hasil2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_klasbuk`
--

INSERT INTO `tb_klasbuk` (`id_klasbuk`, `js_buku`, `hasil1`, `hasil2`) VALUES
(28, 'Web Statis dan Dinamis dengan Dreamweaver 8', 'web statis   dinamis   dreamweaver  ', '000'),
(29, 'Etika di ruang publik : Pendekatan Politik dan Manajemen', 'etika     publik   pendekatan politik   manajemen', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perhitungan`
--

CREATE TABLE `tb_perhitungan` (
  `id_perhitungan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perhitungan`
--

INSERT INTO `tb_perhitungan` (`id_perhitungan`, `id_buku`, `kategori`, `hasil`) VALUES
(35, 22, '000', 4.2736112934238e-18),
(36, 22, '100', 2.8912057932947e-19),
(37, 22, '200', 5.1849291042583e-20),
(38, 23, '000', 0.0000000000039360199173964),
(39, 23, '100', 0.0000000000054638652028807),
(40, 23, '200', 0.0000000000039360199173964),
(41, 23, '300', 0.0000000000067844991999931),
(42, 23, '400', 0.0000000000062147091912286),
(43, 23, '500', 0.000000000011902825385355),
(44, 23, '600', 0.000000000007418141600732),
(45, 23, '700', 0.0000000000032646923602852),
(46, 23, '800', 0.0000000000032646923602852),
(47, 23, '900', 0.0000000000020715697304095),
(48, 24, '000', 0.0000000000000029750717440638),
(49, 24, '100', 3.9240629150249e-16),
(50, 24, '200', 2.4792264533865e-16),
(51, 24, '300', 5.3132580468268e-16),
(52, 24, '400', 4.6992129990387e-16),
(53, 24, '500', 0.0000000000000017691476494285),
(54, 24, '600', 6.020730136135e-16),
(55, 24, '700', 2.9611722088755e-16),
(56, 24, '800', 2.9611722088755e-16),
(57, 24, '900', 1.5664043330129e-16),
(58, 25, '000', 7.26132950071e-28),
(59, 25, '100', 1.3025653312067e-28),
(60, 25, '200', 5.590641455866e-29),
(61, 25, '300', 2.2758673512135e-28),
(62, 25, '400', 1.8153323751775e-28),
(63, 25, '500', 1.6236552095084e-28),
(64, 25, '600', 2.8646773766226e-28),
(65, 25, '700', 1.9534959260102e-28),
(66, 25, '800', 1.9534959260102e-28),
(67, 25, '900', 6.0511079172583e-29),
(68, 25, 'Pilih Kategori', 3.4580370657378e-28),
(69, 24, '000', 0.0000000000000017691476494285),
(70, 24, '100', 3.6989740390068e-16),
(71, 24, '200', 2.3457621060405e-16),
(72, 24, '300', 4.9954665316233e-16),
(73, 24, '400', 4.4228691235713e-16),
(74, 24, '500', 0.0000000000000016659768877786),
(75, 24, '600', 5.6543651917112e-16),
(76, 24, '700', 2.7710713067597e-16),
(77, 24, '800', 2.7710713067597e-16),
(78, 24, '900', 1.4742897078571e-16),
(79, 24, 'Pilih Kategori', 0.0000000000000010379162364743),
(80, 24, '000', 0.0000000000000017691476494285),
(81, 24, '100', 3.6989740390068e-16),
(82, 24, '200', 2.3457621060405e-16),
(83, 24, '300', 4.9954665316233e-16),
(84, 24, '400', 4.4228691235713e-16),
(85, 24, '500', 0.0000000000000016659768877786),
(86, 24, '600', 5.6543651917112e-16),
(87, 24, '700', 2.7710713067597e-16),
(88, 24, '800', 2.7710713067597e-16),
(89, 24, '900', 1.4742897078571e-16),
(90, 24, 'Pilih Kategori', 0.0000000000000010379162364743),
(91, 24, '000', 0.0000000000000017691476494285),
(92, 24, '100', 3.6989740390068e-16),
(93, 24, '200', 2.3457621060405e-16),
(94, 24, '300', 4.9954665316233e-16),
(95, 24, '400', 4.4228691235713e-16),
(96, 24, '500', 0.0000000000000016659768877786),
(97, 24, '600', 5.6543651917112e-16),
(98, 24, '700', 2.7710713067597e-16),
(99, 24, '800', 2.7710713067597e-16),
(100, 24, '900', 1.4742897078571e-16),
(101, 24, 'Pilih Kategori', 0.0000000000000010379162364743),
(102, 26, '000', 4.5336720689361e-21),
(103, 26, '100', 2.1950296909709e-22),
(104, 26, '200', 1.1451774917291e-22),
(105, 26, '300', 3.3717976189862e-22),
(106, 26, '400', 2.8335450430851e-22),
(107, 26, '500', 2.6004672910663e-22),
(108, 26, '600', 4.0246654573837e-22),
(109, 26, '700', 2.326644903813e-22),
(110, 26, '800', 2.326644903813e-22),
(111, 26, '900', 9.4451501436168e-23),
(112, 26, 'Pilih Kategori', 8.4724882022453e-22),
(113, 26, '000', 4.5336720689361e-21),
(114, 26, '100', 2.1950296909709e-22),
(115, 26, '200', 1.1451774917291e-22),
(116, 26, '300', 3.3717976189862e-22),
(117, 26, '400', 2.8335450430851e-22),
(118, 26, '500', 2.6004672910663e-22),
(119, 26, '600', 4.0246654573837e-22),
(120, 26, '700', 2.326644903813e-22),
(121, 26, '800', 2.326644903813e-22),
(122, 26, '900', 9.4451501436168e-23),
(123, 26, 'Pilih Kategori', 8.4724882022453e-22),
(124, 26, '000', 4.5336720689361e-21),
(125, 26, '100', 2.1950296909709e-22),
(126, 26, '200', 1.1451774917291e-22),
(127, 26, '300', 3.3717976189862e-22),
(128, 26, '400', 2.8335450430851e-22),
(129, 26, '500', 2.6004672910663e-22),
(130, 26, '600', 4.0246654573837e-22),
(131, 26, '700', 2.326644903813e-22),
(132, 26, '800', 2.326644903813e-22),
(133, 26, '900', 9.4451501436168e-23),
(134, 26, 'Pilih Kategori', 8.4724882022453e-22),
(135, 26, '000', 4.5336720689361e-21),
(136, 26, '100', 2.1950296909709e-22),
(137, 26, '200', 1.1451774917291e-22),
(138, 26, '300', 3.3717976189862e-22),
(139, 26, '400', 2.8335450430851e-22),
(140, 26, '500', 2.6004672910663e-22),
(141, 26, '600', 4.0246654573837e-22),
(142, 26, '700', 2.326644903813e-22),
(143, 26, '800', 2.326644903813e-22),
(144, 26, '900', 9.4451501436168e-23),
(145, 26, 'Pilih Kategori', 8.4724882022453e-22),
(146, 26, '000', 4.5336720689361e-21),
(147, 26, '100', 2.1950296909709e-22),
(148, 26, '200', 1.1451774917291e-22),
(149, 26, '300', 3.3717976189862e-22),
(150, 26, '400', 2.8335450430851e-22),
(151, 26, '500', 2.6004672910663e-22),
(152, 26, '600', 4.0246654573837e-22),
(153, 26, '700', 2.326644903813e-22),
(154, 26, '800', 2.326644903813e-22),
(155, 26, '900', 9.4451501436168e-23),
(156, 26, 'Pilih Kategori', 8.4724882022453e-22),
(157, 26, '000', 4.5336720689361e-21),
(158, 26, '100', 2.1950296909709e-22),
(159, 26, '200', 1.1451774917291e-22),
(160, 26, '300', 3.3717976189862e-22),
(161, 26, '400', 2.8335450430851e-22),
(162, 26, '500', 2.6004672910663e-22),
(163, 26, '600', 4.0246654573837e-22),
(164, 26, '700', 2.326644903813e-22),
(165, 26, '800', 2.326644903813e-22),
(166, 26, '900', 9.4451501436168e-23),
(167, 26, 'Pilih Kategori', 8.4724882022453e-22),
(168, 26, '000', 4.5336720689361e-21),
(169, 26, '100', 2.1950296909709e-22),
(170, 26, '200', 1.1451774917291e-22),
(171, 26, '300', 3.3717976189862e-22),
(172, 26, '400', 2.8335450430851e-22),
(173, 26, '500', 2.6004672910663e-22),
(174, 26, '600', 4.0246654573837e-22),
(175, 26, '700', 2.326644903813e-22),
(176, 26, '800', 2.326644903813e-22),
(177, 26, '900', 9.4451501436168e-23),
(178, 26, 'Pilih Kategori', 8.4724882022453e-22),
(179, 26, '000', 4.5336720689361e-21),
(180, 26, '100', 2.1950296909709e-22),
(181, 26, '200', 1.1451774917291e-22),
(182, 26, '300', 3.3717976189862e-22),
(183, 26, '400', 2.8335450430851e-22),
(184, 26, '500', 2.6004672910663e-22),
(185, 26, '600', 4.0246654573837e-22),
(186, 26, '700', 2.326644903813e-22),
(187, 26, '800', 2.326644903813e-22),
(188, 26, '900', 9.4451501436168e-23),
(189, 26, 'Pilih Kategori', 8.4724882022453e-22),
(190, 26, '000', 4.5336720689361e-21),
(191, 26, '100', 2.1950296909709e-22),
(192, 26, '200', 1.1451774917291e-22),
(193, 26, '300', 3.3717976189862e-22),
(194, 26, '400', 2.8335450430851e-22),
(195, 26, '500', 2.6004672910663e-22),
(196, 26, '600', 4.0246654573837e-22),
(197, 26, '700', 2.326644903813e-22),
(198, 26, '800', 2.326644903813e-22),
(199, 26, '900', 9.4451501436168e-23),
(200, 26, 'Pilih Kategori', 8.4724882022453e-22),
(201, 26, '000', 4.5336720689361e-21),
(202, 26, '100', 2.1950296909709e-22),
(203, 26, '200', 1.1451774917291e-22),
(204, 26, '300', 3.3717976189862e-22),
(205, 26, '400', 2.8335450430851e-22),
(206, 26, '500', 2.6004672910663e-22),
(207, 26, '600', 4.0246654573837e-22),
(208, 26, '700', 2.326644903813e-22),
(209, 26, '800', 2.326644903813e-22),
(210, 26, '900', 9.4451501436168e-23),
(211, 26, 'Pilih Kategori', 8.4724882022453e-22),
(212, 26, '000', 4.5336720689361e-21),
(213, 26, '100', 2.1950296909709e-22),
(214, 26, '200', 1.1451774917291e-22),
(215, 26, '300', 3.3717976189862e-22),
(216, 26, '400', 2.8335450430851e-22),
(217, 26, '500', 2.6004672910663e-22),
(218, 26, '600', 4.0246654573837e-22),
(219, 26, '700', 2.326644903813e-22),
(220, 26, '800', 2.326644903813e-22),
(221, 26, '900', 9.4451501436168e-23),
(222, 26, 'Pilih Kategori', 8.4724882022453e-22),
(223, 26, '000', 4.5336720689361e-21),
(224, 26, '100', 2.1950296909709e-22),
(225, 26, '200', 1.1451774917291e-22),
(226, 26, '300', 3.3717976189862e-22),
(227, 26, '400', 2.8335450430851e-22),
(228, 26, '500', 2.6004672910663e-22),
(229, 26, '600', 4.0246654573837e-22),
(230, 26, '700', 2.326644903813e-22),
(231, 26, '800', 2.326644903813e-22),
(232, 26, '900', 9.4451501436168e-23),
(233, 26, 'Pilih Kategori', 8.4724882022453e-22),
(234, 26, '000', 4.5336720689361e-21),
(235, 26, '100', 2.1950296909709e-22),
(236, 26, '200', 1.1451774917291e-22),
(237, 26, '300', 3.3717976189862e-22),
(238, 26, '400', 2.8335450430851e-22),
(239, 26, '500', 2.6004672910663e-22),
(240, 26, '600', 4.0246654573837e-22),
(241, 26, '700', 2.326644903813e-22),
(242, 26, '800', 2.326644903813e-22),
(243, 26, '900', 9.4451501436168e-23),
(244, 26, 'Pilih Kategori', 8.4724882022453e-22),
(245, 26, '000', 4.5336720689361e-21),
(246, 26, '100', 2.1950296909709e-22),
(247, 26, '200', 1.1451774917291e-22),
(248, 26, '300', 3.3717976189862e-22),
(249, 26, '400', 2.8335450430851e-22),
(250, 26, '500', 2.6004672910663e-22),
(251, 26, '600', 4.0246654573837e-22),
(252, 26, '700', 2.326644903813e-22),
(253, 26, '800', 2.326644903813e-22),
(254, 26, '900', 9.4451501436168e-23),
(255, 26, 'Pilih Kategori', 8.4724882022453e-22),
(256, 26, '000', 4.5336720689361e-21),
(257, 26, '100', 2.1950296909709e-22),
(258, 26, '200', 1.1451774917291e-22),
(259, 26, '300', 3.3717976189862e-22),
(260, 26, '400', 2.8335450430851e-22),
(261, 26, '500', 2.6004672910663e-22),
(262, 26, '600', 4.0246654573837e-22),
(263, 26, '700', 2.326644903813e-22),
(264, 26, '800', 2.326644903813e-22),
(265, 26, '900', 9.4451501436168e-23),
(266, 26, 'Pilih Kategori', 8.4724882022453e-22),
(267, 26, '000', 4.5336720689361e-21),
(268, 26, '100', 2.1950296909709e-22),
(269, 26, '200', 1.1451774917291e-22),
(270, 26, '300', 3.3717976189862e-22),
(271, 26, '400', 2.8335450430851e-22),
(272, 26, '500', 2.6004672910663e-22),
(273, 26, '600', 4.0246654573837e-22),
(274, 26, '700', 2.326644903813e-22),
(275, 26, '800', 2.326644903813e-22),
(276, 26, '900', 9.4451501436168e-23),
(277, 26, 'Pilih Kategori', 8.4724882022453e-22),
(278, 26, '000', 4.5336720689361e-21),
(279, 26, '100', 2.1950296909709e-22),
(280, 26, '200', 1.1451774917291e-22),
(281, 26, '300', 3.3717976189862e-22),
(282, 26, '400', 2.8335450430851e-22),
(283, 26, '500', 2.6004672910663e-22),
(284, 26, '600', 4.0246654573837e-22),
(285, 26, '700', 2.326644903813e-22),
(286, 26, '800', 2.326644903813e-22),
(287, 26, '900', 9.4451501436168e-23),
(288, 26, 'Pilih Kategori', 8.4724882022453e-22),
(289, 26, '000', 4.5336720689361e-21),
(290, 26, '100', 2.1950296909709e-22),
(291, 26, '200', 1.1451774917291e-22),
(292, 26, '300', 3.3717976189862e-22),
(293, 26, '400', 2.8335450430851e-22),
(294, 26, '500', 2.6004672910663e-22),
(295, 26, '600', 4.0246654573837e-22),
(296, 26, '700', 2.326644903813e-22),
(297, 26, '800', 2.326644903813e-22),
(298, 26, '900', 9.4451501436168e-23),
(299, 26, 'Pilih Kategori', 8.4724882022453e-22),
(300, 24, '000', 0.0000000000000028149145272487),
(301, 24, '100', 3.6989740390068e-16),
(302, 24, '200', 2.3457621060405e-16),
(303, 24, '300', 4.9954665316233e-16),
(304, 24, '400', 4.4228691235713e-16),
(305, 24, '500', 0.0000000000000016659768877786),
(306, 24, '600', 5.6543651917112e-16),
(307, 24, '700', 2.7710713067597e-16),
(308, 24, '800', 2.7710713067597e-16),
(309, 24, '900', 1.4742897078571e-16),
(310, 24, '000', 0.0000000000000028149145272487),
(311, 24, '100', 3.6989740390068e-16),
(312, 24, '200', 2.3457621060405e-16),
(313, 24, '300', 4.9954665316233e-16),
(314, 24, '400', 4.4228691235713e-16),
(315, 24, '500', 0.0000000000000016659768877786),
(316, 24, '600', 5.6543651917112e-16),
(317, 24, '700', 2.7710713067597e-16),
(318, 24, '800', 2.7710713067597e-16),
(319, 24, '900', 1.4742897078571e-16),
(320, 24, '000', 0.0000000000000028149145272487),
(321, 24, '100', 3.6989740390068e-16),
(322, 24, '200', 2.3457621060405e-16),
(323, 24, '300', 4.9954665316233e-16),
(324, 24, '400', 4.4228691235713e-16),
(325, 24, '500', 0.0000000000000016659768877786),
(326, 24, '600', 5.6543651917112e-16),
(327, 24, '700', 2.7710713067597e-16),
(328, 24, '800', 2.7710713067597e-16),
(329, 24, '900', 1.4742897078571e-16),
(330, 24, '000', 0.0000000000000028149145272487),
(331, 24, '100', 3.6989740390068e-16),
(332, 24, '200', 2.3457621060405e-16),
(333, 24, '300', 4.9954665316233e-16),
(334, 24, '400', 4.4228691235713e-16),
(335, 24, '500', 0.0000000000000016659768877786),
(336, 24, '600', 5.6543651917112e-16),
(337, 24, '700', 2.7710713067597e-16),
(338, 24, '800', 2.7710713067597e-16),
(339, 24, '900', 1.4742897078571e-16),
(340, 24, '000', 0.0000000000000028149145272487),
(341, 24, '100', 3.6989740390068e-16),
(342, 24, '200', 2.3457621060405e-16),
(343, 24, '300', 4.9954665316233e-16),
(344, 24, '400', 4.4228691235713e-16),
(345, 24, '500', 0.0000000000000016659768877786),
(346, 24, '600', 5.6543651917112e-16),
(347, 24, '700', 2.7710713067597e-16),
(348, 24, '800', 2.7710713067597e-16),
(349, 24, '900', 1.4742897078571e-16),
(350, 24, '000', 0.0000000000000028149145272487),
(351, 24, '100', 3.6989740390068e-16),
(352, 24, '200', 2.3457621060405e-16),
(353, 24, '300', 4.9954665316233e-16),
(354, 24, '400', 4.4228691235713e-16),
(355, 24, '500', 0.0000000000000016659768877786),
(356, 24, '600', 5.6543651917112e-16),
(357, 24, '700', 2.7710713067597e-16),
(358, 24, '800', 2.7710713067597e-16),
(359, 24, '900', 1.4742897078571e-16),
(360, 24, '000', 0.0000000000000028149145272487),
(361, 24, '100', 3.6989740390068e-16),
(362, 24, '200', 2.3457621060405e-16),
(363, 24, '300', 4.9954665316233e-16),
(364, 24, '400', 4.4228691235713e-16),
(365, 24, '500', 0.0000000000000016659768877786),
(366, 24, '600', 5.6543651917112e-16),
(367, 24, '700', 2.7710713067597e-16),
(368, 24, '800', 2.7710713067597e-16),
(369, 24, '900', 1.4742897078571e-16),
(370, 24, '000', 0.0000000000000028149145272487),
(371, 24, '100', 3.6989740390068e-16),
(372, 24, '200', 2.3457621060405e-16),
(373, 24, '300', 4.9954665316233e-16),
(374, 24, '400', 4.4228691235713e-16),
(375, 24, '500', 0.0000000000000016659768877786),
(376, 24, '600', 5.6543651917112e-16),
(377, 24, '700', 2.7710713067597e-16),
(378, 24, '800', 2.7710713067597e-16),
(379, 24, '900', 1.4742897078571e-16),
(380, 24, '000', 0.00000000000035749414496058),
(381, 24, '100', 0.000000000000044017791064181),
(382, 24, '200', 0.000000000000029791178746715),
(383, 24, '300', 0.000000000000056948318460506),
(384, 24, '400', 0.000000000000051305281833427),
(385, 24, '500', 0.0000000000001949192958701),
(386, 24, '600', 0.000000000000063328890147165),
(387, 24, '700', 0.000000000000029373355851653),
(388, 24, '800', 0.000000000000029373355851653),
(389, 24, '900', 0.000000000000017101760611142),
(390, 27, '000', 1.4892804244439e-17),
(391, 27, '100', 5.2241706645107e-20),
(392, 27, '200', 1.454375414496e-20),
(393, 27, '300', 3.8438492856443e-20),
(394, 27, '400', 3.2869122499787e-20),
(395, 27, '500', 3.0425467305476e-20),
(396, 27, '600', 4.5076253122697e-20),
(397, 27, '700', 4.9324871960835e-20),
(398, 27, '800', 2.4662435980418e-20),
(399, 27, '900', 1.0956374166596e-20),
(400, 27, '000', 1.4892804244439e-17),
(401, 27, '100', 5.2241706645107e-20),
(402, 27, '200', 1.454375414496e-20),
(403, 27, '300', 3.8438492856443e-20),
(404, 27, '400', 3.2869122499787e-20),
(405, 27, '500', 3.0425467305476e-20),
(406, 27, '600', 4.5076253122697e-20),
(407, 27, '700', 4.9324871960835e-20),
(408, 27, '800', 2.4662435980418e-20),
(409, 27, '900', 1.0956374166596e-20),
(410, 28, '000', 1.6963834834681e-16),
(411, 28, '100', 2.6120853322554e-20),
(412, 28, '200', 1.454375414496e-20),
(413, 28, '300', 3.8438492856443e-20),
(414, 28, '400', 3.2869122499787e-20),
(415, 28, '500', 3.0425467305476e-20),
(416, 28, '600', 4.5076253122697e-20),
(417, 28, '700', 2.4662435980418e-20),
(418, 28, '800', 2.4662435980418e-20),
(419, 28, '900', 1.0956374166596e-20),
(420, 29, '000', 7.1001146489498e-27),
(421, 29, '100', 1.2698032079962e-22),
(422, 29, '200', 7.1001146489498e-27),
(423, 29, '300', 5.1889775607667e-26),
(424, 29, '400', 2.1057855552059e-26),
(425, 29, '500', 1.8996765951248e-26),
(426, 29, '600', 3.2084386618174e-26),
(427, 29, '700', 2.0707056815708e-26),
(428, 29, '800', 2.0707056815708e-26),
(429, 29, '900', 7.0192851840197e-27),
(430, 28, '000', 1.6963834834681e-16),
(431, 28, '100', 2.6120853322554e-20),
(432, 28, '200', 1.454375414496e-20),
(433, 28, '300', 3.8438492856443e-20),
(434, 28, '400', 3.2869122499787e-20),
(435, 28, '500', 3.0425467305476e-20),
(436, 28, '600', 4.5076253122697e-20),
(437, 28, '700', 2.4662435980418e-20),
(438, 28, '800', 2.4662435980418e-20),
(439, 28, '900', 1.0956374166596e-20),
(440, 30, '000', 1.6963834834681e-16),
(441, 30, '100', 2.6120853322554e-20),
(442, 30, '200', 1.454375414496e-20),
(443, 30, '300', 3.8438492856443e-20),
(444, 30, '400', 3.2869122499787e-20),
(445, 30, '500', 3.0425467305476e-20),
(446, 30, '600', 4.5076253122697e-20),
(447, 30, '700', 2.4662435980418e-20),
(448, 30, '800', 2.4662435980418e-20),
(449, 30, '900', 1.0956374166596e-20),
(450, 30, '000', 1.6963834834681e-16),
(451, 30, '100', 2.6120853322554e-20),
(452, 30, '200', 1.454375414496e-20),
(453, 30, '300', 3.8438492856443e-20),
(454, 30, '400', 3.2869122499787e-20),
(455, 30, '500', 3.0425467305476e-20),
(456, 30, '600', 4.5076253122697e-20),
(457, 30, '700', 2.4662435980418e-20),
(458, 30, '800', 2.4662435980418e-20),
(459, 30, '900', 1.0956374166596e-20),
(460, 31, '000', 9.1671592690662e-16),
(461, 31, '100', 3.2869122499787e-20),
(462, 31, '200', 1.8034946010402e-20),
(463, 31, '300', 7.6194985353326e-20),
(464, 31, '400', 4.1610604172815e-20),
(465, 31, '500', 3.8438492856443e-20),
(466, 31, '600', 5.7553472439538e-20),
(467, 31, '700', 3.1934030514318e-20),
(468, 31, '800', 3.1934030514318e-20),
(469, 31, '900', 1.3870201390938e-20),
(470, 31, '000', 9.1671592690662e-16),
(471, 31, '100', 3.2869122499787e-20),
(472, 31, '200', 1.8034946010402e-20),
(473, 31, '300', 7.6194985353326e-20),
(474, 31, '400', 4.1610604172815e-20),
(475, 31, '500', 3.8438492856443e-20),
(476, 31, '600', 5.7553472439538e-20),
(477, 31, '700', 3.1934030514318e-20),
(478, 31, '800', 3.1934030514318e-20),
(479, 31, '900', 1.3870201390938e-20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stopword`
--

CREATE TABLE `tb_stopword` (
  `kata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stopword`
--

INSERT INTO `tb_stopword` (`kata`) VALUES
('yang di dan itu dengan untuk tidak ini dari dalam akan pada juga saya ke karena tersebut bisa ada mereka lebih kata tahun sudah atau saat oleh menjadi orang ia telah adalah seperti sebagai bahwa dapat para harus namun kita dua satu masih hari hanya mengatakan kepada kami setelah melakukan lalu belum lain dia kalau terjadi banyak menurut  anda hingga tak baru beberapa ketika saja jalan sekitar secara dilakukan sementara tapi sangat hal sehingga  seorang bagi besar lagi selama antara waktu sebuah jika sampai jadi terhadap tiga serta pun salah merupakan atas sejak  membuat baik memiliki  kembali selain tetapi pertama kedua memang pernah apa mulai sama tentang bukan agar semua sedang kali kemudian hasil sejumlah juta persen sendiri katanya demikian masalah  mungkin umum setiap bulan bagian bila lainnya terus luar cukup termasuk sebelumnya bahkan wib tempat perlu menggunakan memberikan rabu sedangkan kamis langsung apakah pihak melalui diri mencapai  minggu aku  berada tinggi ingin sebelum tengah kini the tahu bersama depan selasa begitu  merasa  berbagai mengenai  maka jumlah masuk   katanya  mengalami sering ujar kondisi akibat hubungan empat paling mendapatkan selalu lima  meminta melihat sekarang mengaku mau kerja acara menyatakan masa proses tanpa selatan sempat  adanya hidup datang senin rasa maupun seluruh mantan lama jenis segera misalnya  mendapat bawah jangan meski terlihat akhirnya jumat  punya yakni terakhir kecil panjang badan juni of  jelas jauh tentu semakin tinggal kurang  mampu posisi  asal sekali  sesuai sebesar berat  dirinya memberi pagi  sabtu  ternyata mencari sumber ruang menunjukkan biasanya nama  sebanyak utara berlangsung barat kemungkinan yaitu  berdasarkan  sebenarnya cara utama pekan terlalu  membawa kebutuhan suatu menerima  penting  tanggal bagaimana terutama tingkat awal sedikit nanti pasti  muncul dekat lanjut ketiga biasa dulu kesempatan  ribu  akhir  membantu terkait  sebab menyebabkan khusus  bentuk ditemukan  diduga mana ya kegiatan sebagian tampil hampir bertemu usai berarti keluar pula digunakan justru  padahal menyebutkan  gedung  apalagi program  milik teman menjalani keputusan sumber a  upaya mengetahui mempunyai berjalan menjelaskan  b mengambil benar lewat belakang ikut barang meningkatkan kejadian kehidupan keterangan penggunaan masing-masing menghadapi'),
('\\'),
('dahsyat ke siapa nya edisi hari');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_datlat`
--
ALTER TABLE `tb_datlat`
  ADD PRIMARY KEY (`id_datlat`);

--
-- Indeks untuk tabel `tb_klasbuk`
--
ALTER TABLE `tb_klasbuk`
  ADD PRIMARY KEY (`id_klasbuk`);

--
-- Indeks untuk tabel `tb_perhitungan`
--
ALTER TABLE `tb_perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_datlat`
--
ALTER TABLE `tb_datlat`
  MODIFY `id_datlat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tb_klasbuk`
--
ALTER TABLE `tb_klasbuk`
  MODIFY `id_klasbuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_perhitungan`
--
ALTER TABLE `tb_perhitungan`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
