-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2022 pada 03.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_devisi`
--

CREATE TABLE `data_devisi` (
  `id` int(11) NOT NULL,
  `nama_devisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_devisi`
--

INSERT INTO `data_devisi` (`id`, `nama_devisi`) VALUES
(1, 'RENKINRUS'),
(2, 'SDM'),
(3, 'PP'),
(19, 'Pengadaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_inventaris`
--

CREATE TABLE `data_inventaris` (
  `id` int(11) NOT NULL,
  `id_data_devisi` int(11) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `nama_pengguna_id` int(11) NOT NULL,
  `id_data_laptop` int(11) NOT NULL,
  `id_data_monitor` int(11) NOT NULL,
  `id_data_hdd_eks` int(11) NOT NULL,
  `id_data_pc` int(11) NOT NULL,
  `id_data_printer` int(11) NOT NULL,
  `id_data_scanner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_inventaris`
--

INSERT INTO `data_inventaris` (`id`, `id_data_devisi`, `jenis_barang`, `nama_pengguna_id`, `id_data_laptop`, `id_data_monitor`, `id_data_hdd_eks`, `id_data_pc`, `id_data_printer`, `id_data_scanner`) VALUES
(1, 1, 'laptop ', 1, 1, 5, 4, 17, 8, 7),
(2, 2, 'laptop ', 2, 2, 0, 6, 0, 0, 6),
(3, 3, 'laptop ', 3, 0, 6, 0, 18, 0, 0),
(19, 19, 'pc', 13, 0, 3, 0, 16, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_laptop`
--

CREATE TABLE `data_laptop` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ssd` varchar(100) NOT NULL,
  `hdd` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL,
  `akun_email_microsoft` varchar(100) NOT NULL,
  `password_email_microsoft` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_laptop`
--

INSERT INTO `data_laptop` (`id`, `merk`, `tipe`, `processor`, `ram`, `ssd`, `hdd`, `os`, `no_seri`, `akun_email_microsoft`, `password_email_microsoft`) VALUES
(1, 'ACER', 'E210MA', 'Celeron', '4 gb', '256 gb', '', 'windows 11', '307545008', 'xxx@gmail.com', 'xxxpass'),
(2, 'asus rog STRIX ', 'v14', 'intel i5-1035G1', '12 gb', '512 gb', '', 'windows 11', '407545008', 'zzz@gmail.com', 'zzzpass');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_monitor`
--

CREATE TABLE `data_monitor` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_monitor`
--

INSERT INTO `data_monitor` (`id`, `merk`, `keterangan`, `no_seri`) VALUES
(3, 'GORILLA GLASS', '40 inc', '1215316'),
(5, 'ACER', '30 inc', '1111233'),
(6, 'BLACK SHARK', '16 inch', '5i4p8i');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pc`
--

CREATE TABLE `data_pc` (
  `id` int(11) NOT NULL,
  `computer_name` varchar(100) NOT NULL,
  `mainboard` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `vga` varchar(100) NOT NULL,
  `hdd` varchar(100) NOT NULL,
  `ssd` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `mac_address` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pc`
--

INSERT INTO `data_pc` (`id`, `computer_name`, `mainboard`, `processor`, `ram`, `vga`, `hdd`, `ssd`, `os`, `mac_address`, `no_seri`) VALUES
(16, 'Friday', 'MSI', 'AMD', '16 gb', 'Radeon RX 580', '1 tb', '256 gb', 'Windows 11', '00:54:64:11', '156tfff'),
(17, 'Jarvis', 'ROG rr', 'Intel', '32 gb', 'RTX 3060', '1 tb', '512GB', 'Windows 11', 'dfdf', 'fdfd'),
(18, 'Alexa', 'ASUS Prime', 'Intel Xeon', '64 gb', 'RTX 3090', '2 tb', '1 tb', 'Windows 11', 'wq:ER:tr:66', '1r5d6d47r5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengguna`
--

INSERT INTO `data_pengguna` (`id`, `nama`) VALUES
(1, 'Jana'),
(2, 'Jini'),
(3, 'Jono'),
(13, 'Hartanto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_printer`
--

CREATE TABLE `data_printer` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_printer`
--

INSERT INTO `data_printer` (`id`, `merk`, `tipe`, `no_seri`) VALUES
(4, 'canon', 'lp150', '21g6dg'),
(8, 'epson', 'xz21', 's1g2r641');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_scanner`
--

CREATE TABLE `data_scanner` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_scanner`
--

INSERT INTO `data_scanner` (`id`, `merk`, `tipe`, `no_seri`) VALUES
(4, 'epson', 'hftj55', '1g5vhj55'),
(6, 'axio', 'g1rd45', '55_gr_00'),
(7, 'Panasonic', 'kv-6451', 'g215d6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_software`
--

CREATE TABLE `data_software` (
  `id` int(11) NOT NULL,
  `nama_software` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `status_aktif` varchar(100) NOT NULL,
  `jumlah_lisensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_software`
--

INSERT INTO `data_software` (`id`, `nama_software`, `serial_number`, `status_aktif`, `jumlah_lisensi`) VALUES
(1, 'window 10', 'xxxx', '1 tahun', 1),
(2, 'office', 'zz-zz-55', '1 tahun', 2),
(3, 'blender', 'd5f8d5g', '6 bulan', 4),
(5, 'unity', 'd6h4-7u8t-36mq', '1 tahun', 2),
(6, 'Windows 11', '68fr-1h47-we84-1s7e', 'Selamanya', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_hdd_eks`
--

CREATE TABLE `db_hdd_eks` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_hdd_eks`
--

INSERT INTO `db_hdd_eks` (`id`, `merk`, `kapasitas`, `no_seri`) VALUES
(4, 'seagate', '2 tb', 'h5t14y'),
(6, 'WD My Passport Ultra 4 TB', '4 TB', '54984D565+Csd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `id_pc` int(11) NOT NULL,
  `id_data_software` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `software`
--

INSERT INTO `software` (`id`, `id_pc`, `id_data_software`) VALUES
(37, 17, 2),
(38, 17, 3),
(50, 16, 3),
(51, 16, 2),
(53, 17, 5),
(54, 16, 6),
(55, 18, 6),
(56, 18, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_devisi`
--
ALTER TABLE `data_devisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_inventaris`
--
ALTER TABLE `data_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_laptop`
--
ALTER TABLE `data_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_monitor`
--
ALTER TABLE `data_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pc`
--
ALTER TABLE `data_pc`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_printer`
--
ALTER TABLE `data_printer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_scanner`
--
ALTER TABLE `data_scanner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_software`
--
ALTER TABLE `data_software`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `db_hdd_eks`
--
ALTER TABLE `db_hdd_eks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_devisi`
--
ALTER TABLE `data_devisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_inventaris`
--
ALTER TABLE `data_inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_laptop`
--
ALTER TABLE `data_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `data_monitor`
--
ALTER TABLE `data_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_pc`
--
ALTER TABLE `data_pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_printer`
--
ALTER TABLE `data_printer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_scanner`
--
ALTER TABLE `data_scanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_software`
--
ALTER TABLE `data_software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `db_hdd_eks`
--
ALTER TABLE `db_hdd_eks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
