-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2022 pada 08.47
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
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Production', '2022-09-14 06:18:39', '2022-09-14 06:18:39'),
(2, 'HRD', '2022-09-14 06:19:44', '2022-09-14 06:19:44'),
(4, 'Marketing', '2022-09-14 00:07:32', '2022-09-14 00:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'SDM', '2022-09-07 00:05:31', '2022-09-07 00:05:31'),
(2, 'PP', '2022-09-07 20:54:45', '2022-09-07 20:54:45'),
(3, 'RENKINRUS', '2022-09-07 21:20:21', '2022-09-07 21:20:38'),
(4, 'Pengadaan', '2022-09-07 21:20:56', '2022-09-07 21:20:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'HARDWARE', '2022-09-14 06:20:24', '2022-09-14 06:20:24'),
(2, 'SOFTWARE', '2022-09-14 06:20:51', '2022-09-14 06:20:51'),
(3, 'NETWORK', '2022-09-14 06:21:06', '2022-09-14 06:21:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_09_07_062733_create_divisi_table', 2),
(4, '2022_09_07_063652_create_divisis_table', 3),
(5, '2022_09_07_064658_create_divisis_table', 4),
(6, '2022_09_07_065051_create_divisi_table', 5),
(7, '2022_09_07_070101_create_divisi_table', 6),
(8, '2022_09_07_070443_create_divisis_table', 7),
(9, '2022_09_08_021448_create_kategoris_table', 8),
(10, '2022_09_08_022537_create_tickets_table', 9),
(11, '2022_09_14_060936_create_kategori_table', 10),
(12, '2022_09_14_061443_create_departemen_table', 11),
(13, '2022_09_14_062228_create_tiket_table', 12),
(14, '2022_09_15_030840_create_karyawan_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oleh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `id_users`, `id_kategori`, `deskripsi`, `status`, `tgl_mulai`, `tgl_selesai`, `prioritas`, `keterangan`, `oleh`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'jfjfjfjfj jfjfjfjjfj jfjfjfj jfjjffj', 2, '2022-09-16', '2022-09-19', NULL, 'rebes...', 'Robert', '2022-09-15 19:45:25', '2022-09-18 20:59:57'),
(4, 1, 1, 'jfkslfjsi elrguhf slhfeijf ehgielje', 2, '2022-09-17', '2022-09-30', 1, NULL, NULL, '2022-09-16 00:26:57', '2022-09-16 00:30:15'),
(5, 4, 1, 'dhfbyrgyb bfjwyfgbkjaq bghjawyrvhb tg yatk vtghjat4kat vtjakrg gtjah4t vtj4atvy uatghyhej nejkawug bae4.', 2, '2022-09-19', '2022-09-19', NULL, 'siap maszeh', 'Robert', '2022-09-18 20:33:28', '2022-09-18 21:25:55'),
(6, 1, 3, 'ngelaggg', 2, '2022-09-19', '2022-09-19', 1, 'beres maszehh', 'Robert', '2022-09-18 21:07:24', '2022-09-18 21:29:12'),
(7, 8, 2, 'Harddisk Muncul Pesan “Operating System Not Found”', 2, '2022-09-21', '2022-09-21', 1, 'it\'s done', 'Kevin', '2022-09-20 18:45:40', '2022-09-20 18:52:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `npk`, `id_divisi`, `id_departemen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pengguna', 'user', '0123', 1, 1, '$2y$10$g1tcADFB/epLlDQvKH0YPuCYPKTHTr2iGoSVyL6a9ohHln/2nGVF.', 'KwB1EXdPczmfiPt5IabgZOV69OzhP8wZu0ysJMeArFz7lnM2S79xikzfb1TR', '2022-09-06 20:46:13', '2022-09-06 20:46:13'),
(2, 'admin', 'admin', '123', 2, 2, '$2y$10$q8PEJoiOUWhKDYi.8Am9meRvAJOE3573xOH3Xvm77XX.MV7GSySte', 'lcGhdo0w3PeU1zT42wusR0NWCjUG0nJIZDRJKtlTyddGtv7TZs8I3oMdGAFY', '2022-09-07 00:28:36', '2022-09-07 00:28:36'),
(4, 'Suep', 'user', '12345', 4, 1, '$2y$10$hdmRDCbdh1Ia5QvEHakTDOiLjohWX7kwRkU3m69Igeq1Yu8vq54DO', 'tXXUBjmgsnKbCYl6SvFIAhz3LvmB8zgsgg2YYrXnYzBlUSVRsW5VEA0cVvuB', '2022-09-14 23:37:36', '2022-09-15 00:33:21'),
(5, 'Tono', 'admin', '1234', 3, 2, '$2y$10$TTFg4LNd/U.dQQ.jmxApT.oQhS0nqyTZQaxQv7lqra9IHqYAJHrci', 'ZfKe7tdbNDUKE3ZLonM2oZZAX4INkyUOWKNnrCk5tSBz5kg9BegoTVp728aJ', '2022-09-14 23:40:16', '2022-09-15 00:32:07'),
(7, 'Robert', 'pic', '111', 3, 1, '$2y$10$zwiputhXcQq8n9xYMuviBuPESs5hl984CW.i/ZkYC..YdzbC4B2k2', 'vamVnZklxXPfBjp04cAoAubsyXW6T1outHPPHxYWOuL679BA9wCXPtT4OWXf', '2022-09-18 20:39:57', '2022-09-18 20:39:57'),
(8, 'Snowman', 'user', '555', 1, 4, '$2y$10$/I8ZOjxLku5ET9y9NGqtuuA.WQO3cpFwivch4FNLqppe/b.1E.8LW', '5whBK559qKjAX62Sy6M31W6NOBzL0GJ5UqLaaf4WNnfKZ8cirgv50x9JUi85', '2022-09-20 18:42:56', '2022-09-20 18:42:56'),
(9, 'Kevin', 'pic', '999', 2, 1, '$2y$10$ONJyukkte9NP4KN4AZJMPu8MNj0m4yvBUYwZfGt9XCHpx7cu8.MXa', 'jywDgJzhhXSvu7XuLlGPuULlcdBVhDWbegsqfatsxN6mijCWAMfgkuyvnJP3', '2022-09-20 18:48:53', '2022-09-20 18:48:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
