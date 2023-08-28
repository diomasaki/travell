-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2023 pada 13.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.3.16

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
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_destinations` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(170, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(171, '2023_08_15_020358_users_table', 1),
(172, '2023_08_15_020457_destinations_table', 1),
(173, '2023_08_15_020529_restaurants_table', 1),
(174, '2023_08_15_020557_reviews_table', 1),
(175, '2023_08_15_020619_wisatas_table', 1),
(176, '2023_08_18_010959_category_table', 1),
(177, '2023_08_18_063329_paket_wisata_table', 1),
(178, '2023_08_20_053631_create_payments_table', 1),
(179, '2023_08_23_101856_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paketwisata`
--

CREATE TABLE `paketwisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paket_wisata` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `img_paketwisata` text NOT NULL,
  `keterangan` text NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `itinerary` text NOT NULL,
  `slot1` varchar(255) DEFAULT NULL,
  `slot2` varchar(255) DEFAULT NULL,
  `slot3` varchar(255) DEFAULT NULL,
  `slot4` varchar(255) DEFAULT NULL,
  `slot5` varchar(255) DEFAULT NULL,
  `slot6` varchar(255) DEFAULT NULL,
  `slot7` varchar(255) DEFAULT NULL,
  `slot8` varchar(255) DEFAULT NULL,
  `slot9` varchar(255) DEFAULT NULL,
  `slot10` varchar(255) DEFAULT NULL,
  `slot11` varchar(255) DEFAULT NULL,
  `slot12` varchar(255) DEFAULT NULL,
  `slot13` varchar(255) DEFAULT NULL,
  `slot14` varchar(255) DEFAULT NULL,
  `slot15` varchar(255) DEFAULT NULL,
  `slot16` varchar(255) DEFAULT NULL,
  `slot17` varchar(255) DEFAULT NULL,
  `slot18` varchar(255) DEFAULT NULL,
  `slot19` varchar(255) DEFAULT NULL,
  `slot20` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paketwisata`
--

INSERT INTO `paketwisata` (`id`, `paket_wisata`, `budget`, `kota`, `kategori`, `img_paketwisata`, `keterangan`, `ratings`, `itinerary`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`, `slot9`, `slot10`, `slot11`, `slot12`, `slot13`, `slot14`, `slot15`, `slot16`, `slot17`, `slot18`, `slot19`, `slot20`, `created_at`, `updated_at`) VALUES
(1, 'Paket Wisata Murah 1', 700000, 'Denpasar', 'Alam', 'mykonos.jpg', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', '7.8', '06:00 = Berangkat.\n10:00 = Istirahat.\n12:30 = Makan siang.\n15:00 = Explore tempat wisata.\n18:00 = Kembali ke penginapan.\n20:00 = Makan malam.\n22:00 = Istirahat.\n23:00 = Perjalanan pulang.\n24:00 = Sampai di villa.', NULL, 'Gunung Rinjani', 'Gunung Latimojong', 'Gunung Puncak Jaya', 'Pantai Pailus', 'Gunung Merapi', 'Gunung Semeru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 15:49:52', '2023-08-27 03:17:52'),
(5, 'Paket Wisata Murah 2', 1900000, 'Surabaya', 'Alam', 'santorini.jpg', 'Keindahan alam', '9.9', '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat. 23:00 = Perjalanan pulang. 24:00 = Sampai di villa.', NULL, 'Gunung Rinjani', NULL, 'Gunung Puncak Jaya', 'Pantai Pailus', NULL, 'Gunung Semeru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-27 03:18:56', '2023-08-27 03:18:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_link` varchar(255) NOT NULL,
  `external_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `checkout_link`, `external_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://checkout-staging.xendit.co/v2/64e68eb8c231e9ff36d288a8', 'b85cf821-f6c2-4ea4-9549-149a6defdb08', 'pending', '2023-08-23 15:56:58', '2023-08-23 15:56:58'),
(2, 'https://checkout-staging.xendit.co/v2/64e806376327e60dcc39533f', '5a16a2b8-8e3c-4396-a926-08fa1bf6982f', 'pending', '2023-08-24 18:39:04', '2023-08-24 18:39:04'),
(3, 'https://checkout-staging.xendit.co/v2/64e806398001fb557e104e21', '9bccaebf-ecff-4c6f-8ed6-becd053bf131', 'pending', '2023-08-24 18:39:06', '2023-08-24 18:39:06'),
(4, 'https://checkout-staging.xendit.co/v2/64e808f539ef65c197c211fe', 'e13fe505-3673-499b-8346-f8868b82f036', 'pending', '2023-08-24 18:50:46', '2023-08-24 18:50:46'),
(5, 'https://checkout-staging.xendit.co/v2/64e94ecd6327e6452d3b10f0', 'eaaf34f1-433f-43e0-b7b2-a247b56a3381', 'pending', '2023-08-25 18:01:03', '2023-08-25 18:01:03'),
(6, 'https://checkout-staging.xendit.co/v2/64eb1f7da7a38d6b9ca0d5b9', '5ced7bb5-9960-4d4d-b29a-373248e9c0f9', 'pending', '2023-08-27 03:03:43', '2023-08-27 03:03:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_restaurant` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
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
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(2, 'callmegod', 'sendeross99@gmail.com', NULL, '$2y$10$lb5hXJ5ECX5DPhQXbAQQV.gw2.KidTPcQN8vHJEeqeVJgr0nnibqW', NULL, 0, NULL, '2023-08-24 18:38:52', '2023-08-24 18:38:52', '112727630075676932508'),
(3, 'admin', 'admin@protonmail.com', NULL, '$2y$10$75vPQSNov5XFF6whfyYSMeyTFCJSvmZKXFj35xrC0Xlk3phth5Fcu', '11111111', 1, NULL, '2023-08-25 18:58:46', '2023-08-27 02:50:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_wisata` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `name`, `description`, `img_wisata`, `price`, `kota`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 'Gunung Bromo', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'bromo.jpg', 400000, 'Malang', '9.9', '2023-08-23 15:44:42', '2023-08-23 15:44:42'),
(2, 'Gunung Rinjani', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'rinjani.jpg', 700000, 'Malang', '7.8', '2023-08-23 15:45:01', '2023-08-23 15:45:01'),
(3, 'Gunung Latimojong', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'latimojong.jpg', 800000, 'Denpasar', '8.9', '2023-08-23 15:45:19', '2023-08-23 15:45:19'),
(4, 'Gunung Puncak Jaya', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'puncakjaya.jpg', 790000, 'Denpasar', '7.8', '2023-08-23 15:45:39', '2023-08-23 15:45:39'),
(5, 'Pantai Pailus', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'pantaipailus.jpeg', 680000, 'Malang', '7.8', '2023-08-23 15:46:09', '2023-08-23 15:46:09'),
(6, 'Gunung Merapi', 'Bali dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'merapi.jpg', 740000, 'Denpasar', '6.9', '2023-08-23 15:46:33', '2023-08-23 15:46:33'),
(8, 'Gunung Semeru', 'Gunung Semeru dikenal dengan sebutan \"Pulau Dewata\" karena memiliki beragam tempat suci, upacara adat, dan kebudayaan yang sangat kaya. Pulau ini menawarkan berbagai atraksi dan aktivitas untuk para wisatawan, mulai dari pantai-pantai yang menakjubkan, sawah hijau yang indah, hingga gunung-gunung yang mempesona.', 'semeru.jpg', 900000, 'Lumajang', '9.9', '2023-08-25 18:23:14', '2023-08-25 18:23:14');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `paketwisata`
--
ALTER TABLE `paketwisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
