-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2023 pada 11.56
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
-- Database: `travelapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_destinations` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(190, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(191, '2023_08_15_020358_users_table', 1),
(192, '2023_08_15_020457_destinations_table', 1),
(193, '2023_08_15_020529_restaurants_table', 1),
(194, '2023_08_15_020557_reviews_table', 1),
(195, '2023_08_15_020619_wisatas_table', 1),
(196, '2023_08_18_010959_category_table', 1),
(197, '2023_08_18_063329_paket_wisata_table', 1),
(198, '2023_08_20_053631_create_payments_table', 1),
(199, '2023_08_23_101856_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paketwisata`
--

CREATE TABLE `paketwisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paket_wisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int(11) NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_paketwisata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int(11) DEFAULT NULL,
  `slot1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot15` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot16` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot17` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot18` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot19` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot20` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paketwisata`
--

INSERT INTO `paketwisata` (`id`, `paket_wisata`, `budget`, `kota`, `kategori`, `img_paketwisata`, `keterangan`, `ratings`, `itinerary`, `durasi`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`, `slot9`, `slot10`, `slot11`, `slot12`, `slot13`, `slot14`, `slot15`, `slot16`, `slot17`, `slot18`, `slot19`, `slot20`, `created_at`, `updated_at`) VALUES
(1, 'Paket Wisata Alam', 1000000, 'Denpasar', 'Alam', 'mykonos.jpg', 'Keindahan alam', '4.8', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat.', NULL, 'Gunung Rinjani', 'Gunung Latimojong', 'Gunung Puncak Jaya', 'Gunung Merapi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 06:59:17'),
(2, 'Paket Wisata Puncak Jaya 4D3N', 1500000, 'Denpasar', 'Budaya', 'puncakjaya.jpg', 'Keindahan wisata puncak jaya', '8.7', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat. 23:00 = Perjalanan pulang. 24:00 = Sampai di villa.', 4, 'Gunung Rinjani', 'Gunung Semeru', 'Gunung Bromo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 05:07:04', '2023-09-03 06:57:32'),
(3, 'Paket Wisata 2D1N', 970000, 'Makassar', 'Pantai, Religi, Minat Khusus', 'santorini.jpg', 'Keindahan pantai makassar, dan juga minat khusus wisatawan', '8.9', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat. 23:00 = Perjalanan pulang. 24:00 = Sampai di villa.', 2, 'Gunung Rinjani', 'Gunung Latimojong', 'Gunung Semeru', 'Gunung Puncak Jaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 07:02:09', '2023-09-03 07:02:09'),
(4, 'Paket Wisata Denpasar 7D6N', 6700000, 'Denpasat', 'Budaya, Pantai, Religi, Alam, Minat Khusus', 'semeru.jpg', 'Bali memiliki keindahan alam terbaik, paling popular', '10.0', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat. 23:00 = Perjalanan pulang. 24:00 = Sampai di villa.', 7, 'Gunung Puncak Jaya', 'Gunung Bromo', 'Gunung Latimojong', 'Gunung Merapi', 'Gunung Semeru', 'Pantai Pailus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 07:16:18', '2023-09-03 07:16:18'),
(5, 'Paket Wisata 10D9N', 8100000, 'Makassar', 'Budaya, Religi, Minat Khusus', 'bromo.jpg', 'Makassar keindahan alam yang disukai oleh banyak wisatawan', '8.6', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat. 23:00 = Perjalanan pulang. 24:00 = Sampai di villa.', 10, NULL, 'Gunung Bromo', 'Gunung Latimojong', NULL, NULL, 'Pantai Pailus', 'Gunung Rinjani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 07:17:34', '2023-09-03 07:17:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `checkout_link`, `external_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://checkout-staging.xendit.co/v2/64f47f6bcbdd91f0798fa955', '75fe9909-5b13-4a0b-b2be-192a45a04c52', 'pending', '2023-09-03 05:43:24', '2023-09-03 05:43:24'),
(2, 'https://checkout-staging.xendit.co/v2/64f486f2cbdd915b138fb335', 'ae862b1c-efd8-4f6b-a7c1-c949527aa0c9', 'pending', '2023-09-03 06:15:31', '2023-09-03 06:15:31'),
(3, 'https://checkout-staging.xendit.co/v2/64f48726cbdd9177548fb36d', 'efe03ebf-8d2b-4ee1-bc71-88c091a16213', 'pending', '2023-09-03 06:16:22', '2023-09-03 06:16:22'),
(4, 'https://checkout-staging.xendit.co/v2/64f48772cbdd91588c8fb3c7', '4a806e9a-1138-4263-bca4-4b2cd60a272f', 'pending', '2023-09-03 06:17:39', '2023-09-03 06:17:39'),
(5, 'https://checkout-staging.xendit.co/v2/64f48814587067619d443fbc', 'cdb76e93-e74f-4a64-8562-9b6c93ae6f11', 'pending', '2023-09-03 06:20:20', '2023-09-03 06:20:20'),
(6, 'https://checkout-staging.xendit.co/v2/64f48ce3ef7cf6385c5773b0', '0b5ced63-3796-409d-83ad-68fe4710cc30', 'pending', '2023-09-03 06:40:51', '2023-09-03 06:40:51'),
(7, 'https://checkout-staging.xendit.co/v2/64f48d0f587067609744463a', '7c7c7374-c0fe-49d0-a41c-45ae2007ed26', 'pending', '2023-09-03 06:41:35', '2023-09-03 06:41:35'),
(8, 'https://checkout-staging.xendit.co/v2/64f490605870679681444a0d', 'e1dbe6be-3e69-43e6-a2ed-41de3a60adc0', 'pending', '2023-09-03 06:55:46', '2023-09-03 06:55:46'),
(9, 'https://checkout-staging.xendit.co/v2/64f49609ec8859c8d7343fc4', 'dba281ad-b7f9-44c9-a77b-e6b01d4131ec', 'pending', '2023-09-03 07:19:54', '2023-09-03 07:19:54'),
(10, 'https://checkout-staging.xendit.co/v2/64f496dd587067120c4451c0', '17ff7db1-4c46-4980-ad2c-4e78c4804072', 'pending', '2023-09-03 07:23:25', '2023-09-03 07:23:25'),
(11, 'https://checkout-staging.xendit.co/v2/64f49c9acbdd913d608fcefc', '78ae5737-9235-4633-8e1b-c30e10cf97c8', 'pending', '2023-09-03 07:47:55', '2023-09-03 07:47:55'),
(12, 'https://checkout-staging.xendit.co/v2/64f4bb8dcbdd91bd008ff66d', 'f45cf554-93e0-4846-b7c0-2d901add3f13', 'pending', '2023-09-03 09:59:57', '2023-09-03 09:59:57'),
(13, 'https://checkout-staging.xendit.co/v2/64f5a75ddba969783666e8bb', 'cf573e93-2fbd-4a99-9f7f-2fc1f8837bbe', 'pending', '2023-09-04 02:46:06', '2023-09-04 02:46:06'),
(14, 'https://checkout-staging.xendit.co/v2/64f5a791164f8d3a327f8f3a', 'a24f6b1d-ff44-4da3-9c48-29f8f0926487', 'pending', '2023-09-04 02:46:56', '2023-09-04 02:46:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurant`
--

CREATE TABLE `restaurant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destinations_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_restaurant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destinations_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'admin', 'admin@protonmail.com', NULL, '$2y$10$wBwOBtdnQQzY5mmEQKIl6ORgnrdzr1JCkryeSlJeL7jOAWP4ADjy6', '111111111', 1, NULL, '2023-09-03 05:04:44', '2023-09-03 05:04:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_wisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `name`, `description`, `img_wisata`, `price`, `kota`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 'Gunung Puncak Jaya', 'Puncak jaya adalah gunung yang memiliki keistimewaan alam', 'puncakjaya.jpg', 1200000, 'Puncak Jaya', '10.0', '2023-09-03 07:03:18', '2023-09-03 07:03:18'),
(2, 'Gunung Bromo', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'bromo.jpg', 200000, 'Yogyakarta.', '4.8', NULL, NULL),
(3, 'Gunung Latimojong', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'latimojong.jpg', 400000, 'Malang.', '4.8', NULL, NULL),
(4, 'Gunung Merapi', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'merapi.jpg', 600000, 'Denpasar.', '4.8', NULL, NULL),
(5, 'Gunung Semeru', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'semeru.jpg', 800000, 'Bandung.', '4.8', NULL, NULL),
(6, 'Pantai Pailus', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'pantaipailus.jpeg', 700000, 'Jakarta.', '4.8', NULL, NULL),
(7, 'Gunung Rinjani', 'Yogyakarta, atau lebih dikenal dengan sebutan \"Jogja,\" adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.', 'rinjani.jpg', 360000, 'Pangandaran.', '4.8', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paketwisata`
--
ALTER TABLE `paketwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_destinations_id_foreign` (`destinations_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_destinations_id_foreign` (`destinations_id`),
  ADD KEY `review_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `paketwisata`
--
ALTER TABLE `paketwisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_destinations_id_foreign` FOREIGN KEY (`destinations_id`) REFERENCES `destinations` (`id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_destinations_id_foreign` FOREIGN KEY (`destinations_id`) REFERENCES `destinations` (`id`),
  ADD CONSTRAINT `review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
