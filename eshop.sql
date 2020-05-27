-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 11:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_description`, `brand_status`, `created_at`, `updated_at`) VALUES
(18, 'ZARA Fashion', 'NEW LOOK NEW STYLE', 1, NULL, NULL),
(19, 'CATS EYE', 'QUALITY PRODUCT', 1, NULL, NULL),
(20, 'IPHONE', 'A USA PRODUCTION', 1, NULL, NULL),
(21, 'SAMSUNG GALAXY', 'A CHINESE PRODUCT', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_email`, `cus_password`, `cus_mobile`, `created_at`, `updated_at`) VALUES
(1, 'Pulak', 'pulak@gmail.com', '123456', '01720573689', NULL, NULL);

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
(1, '2020_05_22_083805_create_tbl_admin_table', 1),
(2, '2020_05_22_153242_create_tbl_catagory_table', 2),
(3, '2020_05_22_211004_create_brands_table', 3),
(4, '2020_05_23_065505_create_products_table', 4),
(5, '2020_05_24_100511_create_sliders_table', 5),
(6, '2020_05_26_073033_create_customers_table', 6),
(7, '2020_05_26_153002_create_shippings_table', 7),
(8, '2020_05_26_193722_create_payments_table', 8),
(9, '2020_05_26_193748_create_orders_table', 9),
(10, '2020_05_26_193821_create_order_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_id`, `ship_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 10, '1400', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(9, 6, 13, 'T_SHIRT-21', '500', '1', NULL, NULL),
(10, 6, 32, 'JEANS--104', '900', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(10, 'handcash', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `catagory_id`, `brand_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_quantity`, `product_color`, `product_status`, `created_at`, `updated_at`) VALUES
(3, '1', '18', 'SUIT - 11', 'COMFORT SUIT . GOOD DESIGN', '<span style=\"font-size: 13.3333px;\">COMFORT SUIT . GOOD DESIGN</span>', '4000', 'product/image/1667558216139744.jpg', 'L,XL', '3', 'WRITE,BLACK', '1', NULL, NULL),
(4, '1', '19', 'SHIRT-12', 'COMFORTABLE AND FITTED&nbsp;', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '780', 'product/image/1667558309867695.jpg', 'L,XL,XXL', '4', 'BLUE', '1', NULL, NULL),
(5, '1', '18', 'SHIRT-13', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '900', 'product/image/1667558369973807.jpg', 'L,XL,XXL', '7', 'NAVY BLUE', '1', NULL, NULL),
(6, '1', '18', 'T_SHIRT-14', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '300', 'product/image/1667558431021545.jpg', 'L,XL,XXL', '5', 'BACKISH ASH', '1', NULL, NULL),
(7, '1', '19', 'T_SHIRT-15', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '560', 'product/image/1667558494551145.jpeg', 'L,XL,XXL', '6', 'STRIPE RED AND BLACLK', '1', NULL, NULL),
(8, '1', '19', 'T_SHIRT-15', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '800', 'product/image/1667558553683628.jpg', 'L,XL,XXL', '6', 'DARK RED', '1', NULL, NULL),
(9, '1', '18', 'T_SHIRT-16', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667558612408087.png', 'L,XL,XXL', '6', 'OFF WHITE', '1', NULL, NULL),
(10, '1', '18', 'T_SHIRT-17', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '650', 'product/image/1667558676071695.jpg', 'L,XL,XXL', '6', 'WHITE', '1', NULL, NULL),
(11, '1', '18', 'T_SHIRT-18', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '780', 'product/image/1667558720481311.jpeg', 'L,XL,XXL', '6', 'RED', '1', NULL, NULL),
(12, '1', '19', 'T_SHIRT-20', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '900', 'product/image/1667558763736860.jpeg', 'L,XL,XXL', '6', 'DARK RED', '1', NULL, NULL),
(13, '2', '19', 'T_SHIRT-21', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667558799162803.jpg', 'L,XL,XXL', '6', 'BLUE', '1', NULL, NULL),
(14, '2', '19', 'T_SHIRT-22', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667558830059766.jpg', 'L,XL,XXL', '6', 'BACKISH ASH', '1', NULL, NULL),
(15, '2', '18', 'T_SHIRT-23', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '450', 'product/image/1667558869898827.jpg', 'L,XL,XXL', '6', 'RED', '1', NULL, NULL),
(16, '1', '18', 'PANT_HALF-25', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667558928753294.jpg', 'L,XL,XXL', '6', 'BLACK', '1', NULL, NULL),
(17, '1', '18', 'PANT_HALF-26', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667558976672403.jpg', 'L,XL,XXL', '6', 'BROWN', '1', NULL, NULL),
(18, '1', '19', 'PANT_HALF-27', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '780', 'product/image/1667559014210613.jpg', 'L,XL,XXL', '6', 'ASH', '1', NULL, NULL),
(19, '1', '19', 'SUIT-28', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '3500', 'product/image/1667559065923232.jpeg', 'L,XL,XXL', '6', 'BLUE', '1', NULL, NULL),
(20, '1', '19', 'PUNJABI-30', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '1200', 'product/image/1667559129078237.jpg', 'L,XL,XXL', '6', 'RED', '1', NULL, NULL),
(21, '1', '18', 'SHERWANI-32', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '1700', 'product/image/1667559175123093.jpg', 'L,XL,XXL', '6', 'WHITE', '1', NULL, NULL),
(22, '1', '18', 'SHERWANI-33', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '1800', 'product/image/1667559241610009.jpg', 'L,XL,XXL', '6', 'BLACK', '1', NULL, NULL),
(23, '1', '19', 'SHERWANI-34', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '2600', 'product/image/1667559372057122.jpg', 'L,XL,XXL', '6', 'BROWN', '1', NULL, NULL),
(24, '5', '20', 'Iphone11', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '52000', 'product/image/1667559421622899.jpg', 'L,XL,XXL', '6', 'YELLOW', '1', NULL, NULL),
(25, '5', '20', 'Iphone11', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '60000', 'product/image/1667559465371476.jpg', '12 inch', '6', 'BLACK', '1', NULL, NULL),
(26, '5', '20', 'Iphone7', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '35000', 'product/image/1667559509213059.jpg', '12 inch', '6', 'RED', '1', NULL, NULL),
(27, '5', '21', 'SAMSUNG NOTE 8', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '80000', 'product/image/1667559557947215.jpg', '12 inch', '6', 'WATER GLASS', '1', NULL, NULL),
(28, '5', '21', 'SAMSUNG NOTE 10', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '45000', 'product/image/1667559601116186.jpg', '12 inch', '6', 'BLUE', '1', NULL, NULL),
(29, '2', '18', 'JEANS--101', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '500', 'product/image/1667559639588596.jpg', 'L,XL,XXL', '6', 'BLUE', '1', NULL, NULL),
(30, '2', '19', 'JEANS--102', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '780', 'product/image/1667559670399982.jpg', 'L,XL,XXL', '6', 'BLUE', '1', NULL, NULL),
(31, '2', '18', 'JEANS--103', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '900', 'product/image/1667559700457324.jpg', 'L,XL,XXL', '6', 'WHITE_BLUE', '1', NULL, NULL),
(32, '2', '18', 'JEANS--104', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '<span style=\"font-size: 13.3333px;\">COMFORTABLE AND FITTED&nbsp;</span>', '900', 'product/image/1667559749829090.jpg', 'L,XL,XXL', '6', 'BLUE', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_mobile` int(11) NOT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`ship_id`, `ship_email`, `ship_first_name`, `ship_last_name`, `ship_address`, `ship_mobile`, `ship_city`, `created_at`, `updated_at`) VALUES
(4, 'ppcc@tgmail.com', 'tulan', 'chy', 'ma 27/2', 123456, 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, 'product/image/1667576302673118.jpg', 0, NULL, NULL),
(4, 'product/image/1667578971422611.jpg', 0, NULL, NULL),
(5, 'product/image/1667578985169849.jpg', 1, NULL, NULL),
(7, 'product/image/1667581385693828.jpg', 1, NULL, NULL),
(8, 'product/image/1667581393906311.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'ppcctulan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pritam Chowdhury', '01720573689', '2020-05-22 08:51:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_pub_st` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`catagory_id`, `catagory_name`, `catagory_description`, `cat_pub_st`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'This a man Catagory', 1, NULL, NULL),
(2, 'Woman', 'This a man Catagory', 1, NULL, NULL),
(5, 'ELECTRONICS', 'YOU CAN FIND DIFFERENT BRAND AND DIFFERENT ITEMS HERE', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `catagory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
