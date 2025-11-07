-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2025 at 07:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintangcanopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah_singkat` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi_struktur` text DEFAULT NULL,
  `jumlah_proyek` int(11) NOT NULL DEFAULT 0,
  `jumlah_mitra` int(11) NOT NULL DEFAULT 0,
  `persentase_pengerjaan` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `sejarah_singkat`, `visi`, `misi`, `tagline`, `deskripsi_struktur`, `jumlah_proyek`, `jumlah_mitra`, `persentase_pengerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Didirikan dengan semangat menghadirkan solusi konstruksi modern yang kokoh dan estetis, Bintang Canopy telah tumbuh menjadi salah satu penyedia jasa kanopi, pagar besi, dan atap baja ringan terpercaya di Indonesia.\r\nBerawal dari proyek-proyek lokal berskala kecil, kini kami telah melayani berbagai kebutuhan pelanggan mulai dari rumah tinggal hingga bangunan komersial di berbagai kota besar dan daerah di seluruh Indonesia.\r\nKeberhasilan ini kami capai berkat dedikasi tim profesional, penggunaan material unggulan, serta komitmen terhadap hasil kerja yang rapi, kuat, dan tepat waktu.', 'Menjadi perusahaan penyedia jasa kanopi dan konstruksi ringan yang terpercaya, inovatif, dan berstandar nasional, dengan pelayanan terbaik untuk setiap pelanggan di seluruh Indonesia.', 'Memberikan hasil pekerjaan berkualitas tinggi yang mengutamakan kekuatan, ketepatan, dan keindahan desain.\r\nMenyediakan layanan yang transparan dan responsif melalui komunikasi yang profesional.\r\nMengembangkan jaringan mitra di seluruh Indonesia untuk memperluas jangkauan layanan.\r\nMeningkatkan keahlian dan kesejahteraan tim sebagai bagian penting dari keberhasilan perusahaan.', 'Kuat, Rapi, Estetis — Solusi Konstruksi Modern dari Bintang Canopy.', 'Tim Lapangan dan Mitra Teknis : Tersebar di berbagai kota di Indonesia', 500, 30, 100.00, '2025-11-04 19:37:14', '2025-11-04 19:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Aziz Nurul Hidayat', 'azizfitb@gmail.com', 'Tolong tingkatkan lagi kualitas konten dari Bintang Canopy', '2025-11-06 19:11:06', '2025-11-06 19:11:06'),
(2, 'Sri Wahyuni', 'sriwahyuni@gmail.com', 'Tolong harganya di permudah di perjelas', '2025-11-06 19:12:42', '2025-11-06 19:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_slides`
--

CREATE TABLE `home_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_slides`
--

INSERT INTO `home_slides` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Bintang Canopy', 'Kuat, Rapi, Estetis.\r\nSolusi Kaponi & Kontruksi Modern,\r\ndi Seluruh Indonesia', 'home_slides/ICI4uPT90jhWzjhjKVsrwgYlAlN7aDpuflwAINpo.webp', '2025-11-04 05:47:10', '2025-11-04 05:47:10'),
(7, 'Bintang Canopy', '“Kuat, Rapi, Estetis.\r\n Solusi Konstruksi Modern dari Bintang Canopy.”', 'home_slides/li3uXnHD6sjeWqUQFDAbpHvlj83CBWuKUdwmhJAf.jpg', '2025-11-04 19:18:58', '2025-11-05 22:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_04_103626_create_home_slides_table', 2),
(5, '2025_11_05_023008_create_about_table', 3),
(6, '2025_11_05_023008_create_organization_structures_table', 3),
(7, '2025_11_05_030955_create_services_info_and_services_tables', 4),
(8, '2025_11_05_035644_create_portfolio_info_table', 5),
(9, '2025_11_05_035721_create_portfolios_table', 5),
(10, '2025_11_05_035747_create_portfolio_photos_table', 5),
(11, '2025_11_05_121916_create_mitra_deskripsis_table', 6),
(12, '2025_11_05_122007_create_mitras_table', 6),
(13, '2025_11_06_011111_create_contacts_table', 7),
(14, '2025_11_06_012527_create_seo_settings_table', 8),
(15, '2025_11_06_014053_create_taglines_table', 9),
(16, '2025_11_06_020242_create_logos_table', 10),
(17, '2025_11_06_020622_create_site_logos_table', 11),
(18, '2025_11_06_025752_create_social_media_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mitras`
--

CREATE TABLE `mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitras`
--

INSERT INTO `mitras` (`id`, `nama`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'PLN', 'mitra/5DPCABLHm5z5MmRcGDXJIkTpP8X1dcI1G6NZLLZT.png', '2025-11-05 05:44:31', '2025-11-05 05:44:31'),
(2, 'Gojek', 'mitra/XKxY9d04p6GafsYIOuPT227jmT1WtonGpI9DfC0o.png', '2025-11-05 05:45:07', '2025-11-05 05:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `mitra_deskripsis`
--

CREATE TABLE `mitra_deskripsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra_deskripsis`
--

INSERT INTO `mitra_deskripsis` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Dengan jaringan yang terus berkembang, Bintang Canopy hadir di berbagai kota besar di Indonesia untuk melayani Anda dengan cepat, tepat, dan profesional.\r\nKami percaya bahwa kedekatan lokasi berarti pelayanan yang lebih responsif dan efisien bagi setiap klien.', '2025-11-05 05:44:12', '2025-11-05 05:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `organization_structures`
--

CREATE TABLE `organization_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_structures`
--

INSERT INTO `organization_structures` (`id`, `foto`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
(2, 'organization/wzSzCFLxLmA609gB0Nv7QpMDh1RaGy3RdvvqoAWG.jpg', 'Sri Wahyuni', 'Marketing', '2025-11-04 20:00:32', '2025-11-04 20:00:32'),
(3, 'organization/XQrWaWZZcrM7Ih3y5Rq4wg56GtY6YNVzg4ZnnIjj.jpg', 'Rudi', 'Owner', '2025-11-04 20:03:26', '2025-11-04 20:03:26'),
(4, 'organization/NJD0HXMstSAbMmR5oOJizZJXJBpNQC1h1K9mbXP2.jpg', 'Zafran', 'Marketing', '2025-11-04 20:05:19', '2025-11-04 20:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `jenis_pekerjaan` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `nama_klien` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `thumbnail`, `judul`, `jenis_pekerjaan`, `kategori`, `lokasi`, `nama_klien`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'portfolio/zeInE5WGq45wLXWFUaIOiz5GT58iNeOpHpWRLhmG.jpg', 'Canopy Rumah Minimalis – Bandung (2025)', 'Kanopi baja ringan + atap polycarbonate', 'Kanopi', 'Bandung, Jawa Barat', 'Ibu Dina Pratiwi', 'Desain kanopi modern untuk area carport rumah dua lantai, menggunakan rangka baja ringan dan atap polycarbonate bening yang memberi kesan terang dan elegan.\r\nHasil rapi, presisi, dan selaras dengan arsitektur rumah minimalis modern.', '2025-11-04 21:40:14', '2025-11-04 21:40:14'),
(2, 'portfolio/VPEqYU7sDkgwDkqs3e3qfTUetUMU4gPfsvZanwvX.jpg', 'Pagar Besi Minimalis – Surabaya (2024)', 'Pagar besi hollow dengan finishing powder coating', 'Pagar Besi & Stainless', 'Surabaya, Jawa Timur', 'Bapak Agus Mulyana', 'Pagar besi desain horizontal dengan kombinasi frame tebal dan warna hitam doff elegan.\r\n\r\nMeningkatkan keamanan sekaligus mempercantik tampilan fasad rumah.', '2025-11-04 23:24:25', '2025-11-04 23:24:25'),
(3, 'portfolio/pzkmypAzu6UuHysb87VPj99uW7WXg9V3BfDaIjIk.png', 'Atap Baja Ringan Gudang – Cikarang (2024)', 'Jenis Pekerjaan: Rangka atap baja ringan + genteng metal', 'Atap Baja Ringan', 'Kawasan Industri Cikarang', 'PT. Sentra Logistik Abadi', 'Proyek pemasangan atap untuk gudang industri seluas 1.200 m².\r\nMenggunakan baja ringan galvanis berkualitas tinggi dengan struktur tahan beban besar.\r\nSolusi efisien, cepat, dan kuat untuk kebutuhan industri berskala besar.', '2025-11-06 00:19:09', '2025-11-06 00:19:09'),
(4, 'portfolio/kFXy5ZIe4DFfCgGJxiAIvOiMthuhiVRUXxKbG7p8.png', 'Carport Modern – Jakarta Selatan (2023)', 'Jenis Pekerjaan: Carport rangka baja ringan + atap kaca tempered', 'Atap Baja Ringan', 'Jakarta Selatan', 'Bapak Dimas Kurnia', 'Carport elegan bergaya semi-industrial, menonjolkan struktur hitam matte dan kaca bening.\r\nMemberikan kesan premium untuk hunian perkotaan modern.', '2025-11-06 00:20:33', '2025-11-06 00:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_info`
--

CREATE TABLE `portfolio_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_info`
--

INSERT INTO `portfolio_info` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Kami bangga telah dipercaya oleh ratusan klien di seluruh Indonesia — mulai dari rumah tinggal hingga bangunan komersial dan publik.\r\nSetiap proyek adalah bukti komitmen kami terhadap kekuatan, ketepatan, dan keindahan hasil kerja.', '2025-11-04 21:20:16', '2025-11-04 21:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_photos`
--

CREATE TABLE `portfolio_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_photos`
--

INSERT INTO `portfolio_photos` (`id`, `portfolio_id`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'portfolio/SjQBatTmUIZwLrlopwc1lV0uDqhTcD79XNSXBUpE.jpg', '2025-11-04 21:40:14', '2025-11-04 21:40:14'),
(2, 2, 'portfolio/aLQt8dSpq4ubrIeWkznNtVAQZjAAH26h1r3U3cHD.jpg', '2025-11-04 23:24:25', '2025-11-04 23:24:25'),
(3, 2, 'portfolio/G7Bem1Mt2Ldw0fAEqhGnZQ25aSGgRUXOl4pJgglI.jpg', '2025-11-04 23:24:26', '2025-11-04 23:24:26'),
(4, 3, 'portfolio/B7MY7O6oFPi8HZEhQtfFOMDkfEB3FJaFb349rwGw.jpg', '2025-11-06 00:19:09', '2025-11-06 00:19:09'),
(5, 3, 'portfolio/Wd3U4dS1b0uABMDO1hlR0z8xQYVt8xd3nyrOIF7B.jpg', '2025-11-06 00:19:09', '2025-11-06 00:19:09'),
(6, 4, 'portfolio/qWQa8LiBzP2rG7CqMIPQRJMNx8r9jUsKLRHqpbzx.png', '2025-11-06 00:20:33', '2025-11-06 00:20:33'),
(7, 4, 'portfolio/FNNb5jztrvVwdVrW23X5PEbTcOAvIU9q4jC3LWj3.png', '2025-11-06 00:20:33', '2025-11-06 00:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `og_image`, `created_at`, `updated_at`) VALUES
(1, 'Bintang Canopy | Spesialis Canopy & Atap Galvalum Terbaik di Indonesia', 'Bintang Canopy menyediakan jasa pembuatan dan pemasangan canopy, atap galvalum, baja ringan, dan rangka besi profesional. Desain modern, kuat, dan tahan lama. Gratis survei & konsultasi!', 'canopy, bintang canopy, jasa canopy, atap galvalum, baja ringan, canopy minimalis, pasang canopy, canopy rumah, canopy carport, canopy Bandung, canopy besi hollow, harga canopy', 'Bintang Canopy – Jasa Pembuatan Canopy & Atap Galvalum Terpercaya', 'Percayakan kebutuhan canopy dan atap galvalum Anda pada Bintang Canopy. Layanan profesional, bahan berkualitas, dan hasil rapi untuk rumah, kantor, atau bangunan komersial.', 'seo/BfLeVCBawtdrHUboztVarC96UUriWt8OsLmx1FXD.png', '2025-11-05 18:36:47', '2025-11-05 18:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `judul_material` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `foto`, `kategori`, `judul_material`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'services/0lSsZA5SWANlcYajn6SYWiFk0Rj9yITL8L4UACGC.jpg', 'Kanopi', 'Material: Baja ringan, polycarbonate, alderon, kaca, spandek, dan variasi custom.', 'Bintang Canopy menghadirkan berbagai pilihan kanopi modern yang tidak hanya melindungi area rumah atau tempat usaha Anda dari panas dan hujan, tetapi juga memperindah tampilan bangunan.\r\nSetiap desain dibuat menyesuaikan kebutuhan ruang, gaya arsitektur, dan anggaran Anda.\r\n\r\n🌤️ Kuat, tahan lama, dan tampak elegan untuk segala jenis bangunan.', '2025-11-04 20:40:58', '2025-11-04 20:40:58'),
(2, 'services/Gv6houqgyIZtKobyzWFaMNolVpPIErNmS5sJbkQf.jpg', 'Pagar Besi & Stainless', 'Material: Besi hollow, plat, stainless steel, finishing powder coating.', 'Kami menyediakan layanan pembuatan dan pemasangan pagar besi dan stainless minimalis dengan desain menyesuaikan selera dan kebutuhan keamanan.\r\nKombinasi antara kekuatan struktur dan keindahan detail menjadikan pagar Anda tidak hanya fungsional, tapi juga bernilai estetika tinggi.\r\n\r\n🛡️ Elegan, kokoh, dan aman — melindungi properti Anda dengan gaya modern.', '2025-11-04 20:41:54', '2025-11-04 20:41:54'),
(3, 'services/nUekOTmE7KqwT4ajTA4y7uZIuaJnaZPYyhUEMVk5.jpg', 'Atap Baja Ringan', 'Material: Rangka baja ringan, genteng metal, spandek, dan insulasi termal.', 'Solusi atap berkualitas tinggi yang tahan lama, anti karat, dan ringan untuk berbagai jenis bangunan.\r\nDengan perhitungan struktur yang presisi, tim kami memastikan hasil pemasangan aman terhadap cuaca ekstrem dan tetap estetis.\r\n\r\n🏡 Pilihan terbaik untuk rumah tinggal, gudang, hingga area komersial.', '2025-11-04 20:43:36', '2025-11-04 20:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `services_info`
--

CREATE TABLE `services_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_info`
--

INSERT INTO `services_info` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Bintang Canopy menghadirkan berbagai pilihan kanopi modern yang tidak hanya melindungi area rumah atau tempat usaha Anda dari panas dan hujan, tetapi juga memperindah tampilan bangunan.\r\nSetiap desain dibuat menyesuaikan kebutuhan ruang, gaya arsitektur, dan anggaran Anda.\r\n\r\n🌤️ Kuat, tahan lama, dan tampak elegan untuk segala jenis bangunan.', '2025-11-04 20:17:49', '2025-11-04 20:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kEnhB6fKOA1H2rrECEzfbn3DR11mqDAnrTiJtlUS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0M1bVQ1VnlHR21rRG5rZlZ5OVJrR2szYm9IbU9lNVIxMm1WcHZxeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJiZXJhbmRhIjt9fQ==', 1762496120),
('KuER4pNK41R6bTMxQ8cVwEdkxLtAV7rjyquz5RRS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0lhc0x5c1MzcEZNWlJHT3NoR3ZaQXhuZTBVWUEwY2ozNU5EdkFSUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJiZXJhbmRhIjt9fQ==', 1762496428);

-- --------------------------------------------------------

--
-- Table structure for table `site_logos`
--

CREATE TABLE `site_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_logos`
--

INSERT INTO `site_logos` (`id`, `path`, `created_at`, `updated_at`) VALUES
(1, 'uploads/logo/06o7ELWcjPlPQ8MnCxWue6jCkmWpeJr8ZhhTfZM0.png', '2025-11-05 19:10:30', '2025-11-05 19:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `whatsapp`, `instagram`, `tiktok`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '081220209566', '@bintangcanopyofficial', '@bintangcanopyofficial', '@bintangcanopyofficial', '2025-11-05 20:04:25', '2025-11-05 20:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `taglines`
--

CREATE TABLE `taglines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taglines`
--

INSERT INTO `taglines` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Tampil Rapi, Tahan Lama, Bersama Bintang Canopy', 'Solusi canopy modern untuk rumah, carport, dan bangunan komersial dengan bahan premium dan pengerjaan terpercaya di seluruh Indonesia.', '2025-11-05 18:50:51', '2025-11-05 18:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bintangcanopy.com', NULL, '$2y$12$muuGw2A.GLD6BHYxZzO47u7Cb5MEtDt99kHyuzflmH55uDUYa7zIO', NULL, '2025-11-04 03:08:06', '2025-11-04 03:08:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_slides`
--
ALTER TABLE `home_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra_deskripsis`
--
ALTER TABLE `mitra_deskripsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_structures`
--
ALTER TABLE `organization_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_info`
--
ALTER TABLE `portfolio_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_photos_portfolio_id_foreign` (`portfolio_id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_info`
--
ALTER TABLE `services_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_logos`
--
ALTER TABLE `site_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taglines`
--
ALTER TABLE `taglines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_slides`
--
ALTER TABLE `home_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mitra_deskripsis`
--
ALTER TABLE `mitra_deskripsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_structures`
--
ALTER TABLE `organization_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio_info`
--
ALTER TABLE `portfolio_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services_info`
--
ALTER TABLE `services_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_logos`
--
ALTER TABLE `site_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taglines`
--
ALTER TABLE `taglines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  ADD CONSTRAINT `portfolio_photos_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
