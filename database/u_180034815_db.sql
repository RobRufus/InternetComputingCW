-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2020 at 05:27 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.3.17-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_180034815_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` enum('pet','phone','jewelry') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pet',
  `foundTime` date DEFAULT NULL,
  `foundUser` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foundPlace` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` enum('black','grey','white','brown','red','orange','yellow','green','blue','purple','pink','gold','silver','bronze') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'black',
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category`, `foundTime`, `foundUser`, `foundPlace`, `colour`, `image`, `description`, `created_at`, `updated_at`) VALUES
(13, 'jewelry', '2020-05-17', 'Barry Manalow', 'lost in the park', 'grey', 'fte3005-silver-grey-gray-leather-minimalist-wrist-womens-ladies-petite-watch-fte-freedom-to-exist_1588288384.jpg', 'it has the initials PG engraved on the back', '2020-04-30 22:13:04', '2020-04-30 22:13:04'),
(12, 'phone', '2020-04-18', 'Jerry Springer', 'on a starbucks table', 'yellow', 'icr,iphone_11_soft,back,a,x1000-bg,f8f8f8.u8_1588288251.jpg', 'has a banana wallpaper', '2020-04-30 22:10:51', '2020-04-30 22:10:51'),
(11, 'pet', '2020-05-03', 'Jeff Goldbloom', 'in the seat of a buss', 'black', 'testboi_1588287999.jpg', 'he has a collar that says jerry', '2020-04-30 22:06:39', '2020-04-30 22:06:39'),
(14, 'pet', '2020-04-18', 'Kitty', 'At the train station', 'brown', 'Florida_Box_Turtle_Digon3_re-edited_1588289096.jpg', 'Its a friggin turtle named harold (his belly has a pink spot)', '2020-04-30 22:18:29', '2020-04-30 22:24:56'),
(15, 'phone', '2020-02-07', 'Edgar', 'in the lobby of a hotel', 'blue', 'huawei_1588289228.jpg', 'the hotel was the mariot and it has a neptune wallpaper screen', '2020-04-30 22:27:08', '2020-04-30 22:27:08'),
(16, 'jewelry', '2020-03-06', 'Rue Paul', 'found beside a wedding cake', 'grey', '61nl0EV8iKL._AC_UL1200__1588289315.jpg', 'pendant thing with the name mark engraved on the back', '2020-04-30 22:28:35', '2020-04-30 22:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `itmreqs`
--

CREATE TABLE `itmreqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requestedByID` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requestedItemID` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` enum('processing','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itmreqs`
--

INSERT INTO `itmreqs` (`id`, `requestedByID`, `requestedItemID`, `request_reason`, `request_status`, `created_at`, `updated_at`) VALUES
(2, '1', '12', 'I think this is mine, it should have a cute picture of a monkey with a banana on the front for the wallpaper', 'approved', '2020-04-30 22:34:02', '2020-04-30 22:34:51'),
(3, '1', '16', 'My name is dave, i got this for my husband mark at our wedding, i thin lost it. please give it back it has his name on the back. Thank you.', 'approved', '2020-04-30 22:36:58', '2020-04-30 22:45:35'),
(4, '3', '13', 'This watch looks like the one i lost, my name is Paul Gasgoine and it has PG on the back if it belongs to me.', 'approved', '2020-04-30 22:39:59', '2020-04-30 22:45:31'),
(5, '3', '14', 'HAROLD! my best frined is a turtle and you found him! he got lost at the trainstation on our way home. he has a cute little pink spot on his shelly belly.', 'approved', '2020-04-30 22:41:17', '2020-04-30 22:45:37'),
(6, '3', '11', 'I lost my dog on the bus the other day, i think he must have fallen down the back of the seat. it was a 907 buss if i recall (incorrectly).', 'declined', '2020-04-30 22:42:49', '2020-04-30 22:45:49'),
(7, '3', '15', 'This phone is mine it has a bulgarian flag wallpaper and wont stop playing music at all times of the day', 'processing', '2020-04-30 22:43:45', '2020-04-30 22:43:45'),
(8, '3', '12', 'I just dont like the look of this phone, i mean what the heck dood. get it away from me.', 'processing', '2020-04-30 22:44:49', '2020-04-30 22:44:49'),
(9, '4', '15', 'hello is me\r\nthe phone is mine you see\r\nsend it back \r\nneed to order a snack\r\n\r\nit has a planet on the wallpaper\r\nneptune-san \r\nowo', 'processing', '2020-04-30 22:50:46', '2020-04-30 22:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('registered','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'registered',
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `password`, `created_at`, `updated_at`) VALUES
(1, 'MasterAdmin', 'Admin1@example.com', 'admin', '$2y$10$PYPKDTrY3ygQUHzUgT36k.kQ0I.ThU6Q0LRCKINdt/wni23P802Pm', '2020-04-30 13:47:25', '2020-04-30 13:47:25'),
(3, 'Bobby', 'AverageUser@Gmail.com', 'registered', '$2y$10$RXCBzKSOqEDcJ08obM.ke.Rip/X7KtyakfPqUKNVAmLTsr4Q8BRHO', '2020-04-30 22:38:34', '2020-04-30 22:38:34'),
(4, 'Kitty', 'kruczekx3@gmail.com', 'registered', '$2y$10$pQrHkwma3KQh6V8x6Y74SOPMvaOYREry8VhEFst2iX5Jm576Wcrni', '2020-04-30 22:49:05', '2020-04-30 22:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itmreqs`
--
ALTER TABLE `itmreqs`
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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `itmreqs`
--
ALTER TABLE `itmreqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
