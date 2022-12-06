-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 05:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpbanglore`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `quantitytype` double NOT NULL,
  `taxrate` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemcode`, `itemname`, `quantity`, `price`, `quantitytype`, `taxrate`, `status`, `file`, `file_path`, `totalamount`, `created_at`, `updated_at`) VALUES
(1, 'B12', 'Biriyani', 20, 100, 1, 5, 0, '1670242217388.jpg', '/uploads/1670242217388.jpg', '2000', '2022-12-05 01:07:10', '2022-12-05 06:40:17'),
(2, 'D12', 'Dosa', 10, 10, 1, 5, 0, '1670230851602.jpg', '/uploads/1670230851602.jpg', '100', '2022-12-05 03:30:51', '2022-12-05 03:30:51'),
(3, 'C12', 'chutney', 20, 30, 1, 5, 0, '1670231428469.jpg', '/uploads/1670231428469.jpg', '600', '2022-12-05 03:40:28', '2022-12-05 04:30:56'),
(4, 'S12', 'sambar', 10, 40, 1, 5, 0, '1670231458341.jpg', '/uploads/1670231458341.jpg', '400', '2022-12-05 03:40:58', '2022-12-05 03:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_17_103925_create_productcategories_table', 1),
(6, '2022_08_17_120331_create_products_table', 1),
(7, '2022_08_18_071724_create_stocks_table', 1),
(8, '2022_08_18_103459_create_purchases_table', 1),
(9, '2022_08_19_073340_create_purchase_products_table', 1),
(10, '2022_08_19_100821_create_sales_table', 1),
(12, '2022_08_26_103159_add_clm_to_category_table', 1),
(13, '2022_08_26_103759_add_clm_to_purchase_table', 1),
(15, '2022_09_28_112122_create_quantity_types_table', 1),
(19, '2022_08_19_101458_create_saleproducts_table', 3),
(20, '2022_09_28_111656_create_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`id`, `categoryname`, `created_at`, `updated_at`, `status`) VALUES
(1, 'product', '2022-10-17 06:50:17', '2022-10-17 06:50:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `productid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `productname`, `quantity`, `create_by`, `status`, `productid`, `created_at`, `updated_at`) VALUES
(1, '1', 'laptop', '104', '1', 0, 1, '2022-10-17 06:51:11', '2022-10-17 06:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suppliername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `quantities` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantity_types`
--

CREATE TABLE `quantity_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantityTypes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantity_types`
--

INSERT INTO `quantity_types` (`id`, `quantityTypes`, `created_at`, `updated_at`) VALUES
(1, 'kg', '2022-10-17 06:33:54', '2022-10-17 06:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `saleproducts`
--

CREATE TABLE `saleproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleid` int(11) NOT NULL,
  `quantities` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saleproducts`
--

INSERT INTO `saleproducts` (`id`, `productName`, `saleid`, `quantities`, `create_by`, `price_id`, `tax_id`, `created_at`, `updated_at`) VALUES
(1, '1', 7, 10, 1, 1222222, 5, '2022-11-21 05:05:07', '2022-11-21 05:05:07'),
(4, '2', 9, 104, 1, 10000000, 5, '2022-12-01 03:44:59', '2022-12-01 03:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suppliername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `number`, `suppliername`, `create_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-10-17', 'BS_1022_00001', 'anas', 1, 1, '2022-10-17 06:37:59', '2022-11-22 02:16:41'),
(2, '2022-11-18', 'BS_1122_00002', 'anas', 1, 1, '2022-11-18 03:39:26', '2022-11-22 02:16:38'),
(3, '2022-11-18', 'BS_1122_00003', 'name', 1, 1, '2022-11-18 03:45:51', '2022-11-22 02:16:34'),
(4, '2022-11-19', 'BS_1122_00004', 'akash k p', 1, 1, '2022-11-19 04:19:19', '2022-11-22 02:16:28'),
(5, '2022-11-19', 'BS_1122_00005', 'anas', 1, 1, '2022-11-19 05:52:47', '2022-11-22 02:16:23'),
(6, '2022-11-21', 'BS_1122_00006', 'name', 1, 1, '2022-11-21 04:14:12', '2022-11-22 02:16:19'),
(7, '2022-11-21', 'BS_1122_00007', 'anas', 1, 0, '2022-11-21 05:05:07', '2022-11-21 05:05:07'),
(8, '2022-11-22', 'BS_1122_00008', 'anas', 1, 0, '2022-11-22 02:03:35', '2022-11-22 02:03:35'),
(9, '2022-12-01', 'BS_1222_00009', 'ajith', 1, 0, '2022-12-01 03:44:59', '2022-12-01 03:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodctid` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_count`, `prodctid`, `create_by`, `created_at`, `updated_at`) VALUES
(1, '-43', 1, 1, '2022-10-17 06:35:00', '2022-11-23 00:42:48'),
(2, '104', 1, 1, '2022-10-17 06:51:11', '2022-10-17 06:51:11'),
(3, '-103', 2, 1, '2022-10-17 23:17:57', '2022-12-01 03:44:59'),
(4, '10', 1, 1, '2022-11-21 01:34:14', '2022-11-21 01:34:14'),
(5, '104', 2, 1, '2022-11-21 04:16:01', '2022-11-21 04:16:01'),
(6, '10', 3, 1, '2022-12-02 06:43:15', '2022-12-02 06:43:15'),
(7, '10', 4, 1, '2022-12-02 06:43:36', '2022-12-02 06:43:36'),
(8, '1', 5, 1, '2022-12-02 06:45:17', '2022-12-02 06:45:17'),
(9, '10', 6, 1, '2022-12-02 06:49:04', '2022-12-02 06:49:04'),
(10, '1', 7, 1, '2022-12-02 06:49:21', '2022-12-02 06:49:21'),
(11, '10', 8, 1, '2022-12-02 06:49:38', '2022-12-02 06:49:38'),
(12, '10', 9, 1, '2022-12-02 06:55:38', '2022-12-02 06:55:38'),
(13, '10', 10, 1, '2022-12-02 06:55:50', '2022-12-02 06:55:50'),
(14, '1', 11, 1, '2022-12-02 06:56:05', '2022-12-02 06:56:05'),
(15, '10', 12, 1, '2022-12-02 06:56:22', '2022-12-02 06:56:22'),
(16, '104', 13, 1, '2022-12-02 06:56:52', '2022-12-02 06:56:52'),
(17, '10', 14, 1, '2022-12-02 06:58:49', '2022-12-02 06:58:49'),
(18, '10', 1, 1, '2022-12-05 01:07:10', '2022-12-05 01:07:10'),
(19, '10', 2, 1, '2022-12-05 03:30:51', '2022-12-05 03:30:51'),
(20, '20', 3, 1, '2022-12-05 03:40:28', '2022-12-05 03:40:28'),
(21, '10', 4, 1, '2022-12-05 03:40:58', '2022-12-05 03:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$Dy1NYULYqUlp1K14H5fvLe8rxevVEjIM.JIXgn/m6cFJ8X1oft2v2', NULL, NULL, '2022-10-17 06:31:18', '2022-10-17 06:31:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productcategories_categoryname_unique` (`categoryname`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_productname_unique` (`productname`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity_types`
--
ALTER TABLE `quantity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleproducts`
--
ALTER TABLE `saleproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quantity_types`
--
ALTER TABLE `quantity_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saleproducts`
--
ALTER TABLE `saleproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
