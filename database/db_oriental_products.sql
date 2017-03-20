-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 05:20 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oriental_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `about_us_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_us_string`) VALUES
(1, '<p>Oriental Aviation Ltd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Projector'),
(2, 'Projection Screen'),
(3, 'Interactive Whiteboard '),
(4, 'Document Camera'),
(5, 'Digital Signage');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`, `product_id`) VALUES
(1, '/storage/app/uploaded_images/fc4c74582fce75b4e6e02a189d507dd7.jpeg', 1),
(2, '/storage/app/uploaded_images/35f16cf0569c550a0058430938159c4a.jpeg', 2),
(3, '/storage/app/uploaded_images/8972a14edffef39e5330e96fcf3cfac3.jpeg', 2),
(4, '/storage/app/uploaded_images/8842637b9a605ac3eadb3c3f565b2cf1.jpeg', 2),
(50, '/storage/app/uploaded_images/084945a1a90f1f724c79204a5cd6cfc3.jpeg', 31),
(51, '/storage/app/uploaded_images/a116ba73e223ca602c72ac0be6fe8ed8.jpeg', 31),
(52, '/storage/app/uploaded_images/7b988f3b1515502dfe0f26ddb2df9454.jpeg', 31),
(82, '/storage/app/uploaded_images/de33071c4583bda860d99ae58ec70f29.png', 62),
(92, '/storage/app/uploaded_images/ebbb393ae22b6a6749d209c016d16162.jpeg', 40),
(93, '/storage/app/uploaded_images/c428301ca082c4968c7931545022af83.jpeg', 40),
(94, '/storage/app/uploaded_images/b39a263c41eb87eb9869cf8209526bbc.jpeg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_02_08_153227_create_categories_table', 1),
(25, '2017_02_08_153532_create_sub_categories_table', 1),
(26, '2017_02_08_153546_create_sub_sub_categories_table', 1),
(27, '2017_02_08_153610_create_images_table', 1),
(28, '2017_02_08_153621_create_products_table', 1),
(31, '2017_03_09_202303_create_about_uss_table', 2),
(32, '2017_03_09_220213_create_offer_table', 3),
(33, '2017_03_09_220254_create_specification_table', 3),
(34, '2017_03_09_225620_add_special_feature_to_products', 4),
(35, '2017_03_10_042222_create_video_table', 5),
(36, '2017_03_10_042642_create_pdf_offer_table', 6),
(37, '2017_03_10_042729_create_pdf_specification_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_offers`
--

CREATE TABLE `pdf_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pdf_offers`
--

INSERT INTO `pdf_offers` (`id`, `url`, `product_id`) VALUES
(3, '/storage/app/uploaded_offer_pdf/92c65119d0cff3a8c5833f304a1e141a.pdf', 40);

-- --------------------------------------------------------

--
-- Table structure for table `pdf_specifications`
--

CREATE TABLE `pdf_specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pdf_specifications`
--

INSERT INTO `pdf_specifications` (`id`, `url`, `product_id`) VALUES
(3, '/storage/app/uploaded_specification_pdf/66d20c6d7faac0a1d9ec756e4c4a800a.pdf', 40);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_specification` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `sub_sub_cat_id` int(11) DEFAULT NULL,
  `update_version` int(11) DEFAULT NULL,
  `product_special_feature` mediumtext COLLATE utf8_unicode_ci,
  `product_specification_pdf_id` int(11) DEFAULT NULL,
  `product_offer_pdf_id` int(11) DEFAULT NULL,
  `product_video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_specification`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `update_version`, `product_special_feature`, `product_specification_pdf_id`, `product_offer_pdf_id`, `product_video_id`) VALUES
(1, 'Hitachi CP-RX 250', '<table style="border-width: 0px 0px 1px; border-image: initial; font-family: sans-serif, Arial; margin: 0px 0px 30px; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; width: 800px; color: #404040; height: 261px; border-color: initial initial #eeeeee initial; border-style: initial initial solid initial;" width="611">\r\n<tbody style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Brand</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">HITACHI</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Country of Origin</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Japan</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Made In</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">China</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Model</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">CP-RX250EF</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Resulation</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">1024 X 768</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Brightness</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">2700 lm</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Contrast Ratio</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">2000:1</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Lamp Life</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">6000/5000 hr</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Weight</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">3.0 kg</td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">Standard Accessories</td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;">As per manual book</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 1, 1, 0, NULL, NULL, NULL, NULL),
(2, 'Hitachi CP-WX3041WN', '<table style="border-width: 0px 0px 1px; border-image: initial; font-family: sans-serif, Arial; margin: 0px 0px 30px; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; width: 800px; color: #404040; height: 252px; border-color: initial initial #eeeeee initial; border-style: initial initial solid initial;" width="474">\r\n<tbody style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Brand</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">HITACHI</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Country of Origin</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Japan</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Made In</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">China</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Model</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">CP-WX3041WN</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Resulation</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">wXGA 1280 x 800</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Brightness</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">3000 ANSI Lumens</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Contrast Ratio</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">10000:1</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Lamp Life</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">5000 hours (Normal Mode)</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Weight</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">3.0 kg</span></td>\r\n</tr>\r\n<tr style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Standard Accessories</span></td>\r\n<td style="border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 10px 10px 8px 0px; vertical-align: baseline; border-color: #eeeeee initial initial initial; border-style: solid initial initial initial;"><span style="border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">As per manual book</span></td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 1, 2, 0, NULL, NULL, NULL, NULL),
(31, 'test ', 'sadsad', 3, 6, -1, 0, NULL, NULL, NULL, NULL),
(40, 'Video Test', '<p>sadasd</p>', 2, -1, -1, 12, '<table style="box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; border-width: 0px 0px 1px; border-image: initial; font-family: sans-serif, Arial; margin: 0px 0px 30px; outline: 0px; padding: 0px; vertical-align: baseline; width: 800px; color: #404040; height: 252px;" width="474">\r\n<tbody style="box-sizing: border-box; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<tr style="box-sizing: border-box; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Brand</span></td>\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">HITACHI</span></td>\r\n</tr>\r\n<tr style="box-sizing: border-box; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Country of Origin</span></td>\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Japan</span></td>\r\n</tr>\r\n<tr style="box-sizing: border-box; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Made In</span></td>\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">China</span></td>\r\n</tr>\r\n<tr style="box-sizing: border-box; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Model</span></td>\r\n<td style="box-sizing: border-box; padding: 10px 10px 8px 0px; border-width: 1px 0px 0px; border-image: initial; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; vertical-align: baseline;"><span style="box-sizing: border-box; border: 0px; font-family: verdana, geneva; font-size: 10pt; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">CP-WX3041WN</span></td>\r\n</tr>\r\n</tbody>\r\n</table>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `sub_cat_name`) VALUES
(1, 1, 'Hitachi'),
(2, 1, 'Casio'),
(3, 1, 'Optima'),
(4, 2, 'Meiki'),
(5, 3, 'Iq Board-IR'),
(6, 3, 'LT'),
(7, 3, 'DVT'),
(8, 3, 'PS'),
(9, 4, 'AVER'),
(10, 5, 'ViewSonic');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_sub_cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `sub_cat_id`, `sub_sub_cat_name`) VALUES
(1, 1, 'Portable'),
(2, 1, 'Multi Purpose'),
(3, 1, 'Short Throw'),
(4, 1, 'Ultra Short Throw'),
(5, 1, 'Professional & Installation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Habibur Rahman Ovie', 'ovie@gmail.com', '$2y$10$.nETpJ2oNziWyc0bcAd7J.fXs0ieDkgojU7km.rkl.MhkHd4XyYpC', 'UkphzMICKRA5mbi0VWKqQ3gkXYy1DwW2KeDI8ncSTHmuPmsyE667la5yznVQ', '2017-02-21 10:41:30', '2017-02-21 12:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_url`, `product_id`) VALUES
(25, '/storage/app/uploaded_video/6cb64d2f403a95799e758aa53b8acb70.mp4', 40),
(26, '/storage/app/uploaded_video/dd7f62c23e09975e73fcbe2b63bddc75.mp4', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pdf_offers`
--
ALTER TABLE `pdf_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_specifications`
--
ALTER TABLE `pdf_specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pdf_offers`
--
ALTER TABLE `pdf_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pdf_specifications`
--
ALTER TABLE `pdf_specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
