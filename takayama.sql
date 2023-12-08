-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takayama`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_index` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `add_by` varchar(255) NOT NULL,
  `add_in` date NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_index`, `product_id`, `add_by`, `add_in`, `count`) VALUES
(101, 'CH-805go', 'phanhuy@gmail.com', '2023-11-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_index` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_int` int(11) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_insize` varchar(100) DEFAULT '""',
  `product_outsize` varchar(100) DEFAULT '""',
  `product_weight` varchar(10) NOT NULL,
  `floor_space` varchar(10) NOT NULL,
  `tana_load` varchar(50) DEFAULT '""',
  `yuka_load` varchar(100) DEFAULT '""',
  `product_series` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `amazon_link` varchar(1000) DEFAULT NULL,
  `rakuten_link` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_index`, `product_id`, `product_img`, `product_name`, `product_price`, `product_price_int`, `product_color`, `product_insize`, `product_outsize`, `product_weight`, `floor_space`, `tana_load`, `yuka_load`, `product_series`, `product_size`, `amazon_link`, `rakuten_link`) VALUES
(1, 'TCH-06T', '[\"TCH-06T\",\"TCH-06Ts\"]', '米収納庫 TCH-06T', '49,800', 49800, 'シルーバ', '109.5✕49✕70Cm', '120✕50✕73Cm', '22kg', '0.36m²', '', '', 'TCH', 'rice', NULL, NULL),
(2, 'TCH-12T', '[\"TCH-12T\",\"TCH-12Ts\"]', '米収納庫 TCH-12T', '49,800', 49800, 'ブルー', '109.5✕74.5✕70Cm', '120✕80✕73Cm', '30kg', '0.58m²', '', '', 'TCH', 'rice', NULL, NULL),
(3, 'TCH-18T', '[\"TCH-18T\",\"TCH-18Ts\"]', '米収納庫 TCH-18T', '49,800', 49800, 'ダークブラウン', '109.5✕114✕70Cm', '120✕120✕73Cm', '35kg', '0.87m²', '', '', 'TCH', 'rice', NULL, NULL),
(4, 'TJS-0150-B', '[\"TJS-0150-B\",\"TJS-0150s\"]', 'ワイドシリーズ TJS-0150-B', '31,800', 31800, 'ブラウン', '', '100✕155✕55Cm', '', '', '', '', 'TJS', 'small', 'https://www.amazon.co.jp/%E3%82%BF%E3%82%AB%E3%83%A4%E3%83%9E-%E7%89%A9%E7%BD%AE-%E3%83%96%E3%83%A9%E3%82%A6%E3%83%B3-TJS-0150-B/dp/B06XNKFGCJ/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=306U56GHL9PVJ&keywords=TJS-0150-B&qid=1701134064&sprefix=tjs-0150-b%2Caps%2C157&sr=8-1', NULL),
(5, 'TJS-0150-R', '[\"TJS-0150-R\",\"TJS-0150s\"]', 'ワイドシリーズ TJS-0150-R', '31,800', 31800, 'ローズ', '', '100✕155✕55Cm', '', '', '', '', 'TJS', 'small', 'https://www.amazon.co.jp/%E3%82%BF%E3%82%AB%E3%83%A4%E3%83%9E-%E7%89%A9%E7%BD%AE-%E3%83%AD%E3%83%BC%E3%82%BA-TJS-0150-R/dp/B06XKKDCNY/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=I4BJIEP7OL7&keywords=%E3%82%BF%E3%82%AB%E3%83%A4%E3%83%9E%E7%89%A9%E7%BD%AE+TJS-0150-R&qid=1701134117&sprefix=%E3%82%BF%E3%82%AB%E3%83%A4%E3%83%9E%E7%89%A9%E7%BD%AE+tjs-0150-r%2Caps%2C148&sr=8-1', NULL),
(6, 'TJS-0150-S', '[\"TJS-0150-S\",\"TJS-0150s\"]', 'ワイドシリーズ TJS-0150-S', '31,800', 31800, 'シルバー', '', '100✕155✕55Cm', '', '', '', '', 'TJS', 'small', 'https://www.amazon.co.jp/%E3%82%BF%E3%82%AB%E3%83%A4%E3%83%9E-%E7%89%A9%E7%BD%AE-%E3%82%B7%E3%83%AB%E3%83%90%E3%83%BC-TJS-0150-S/dp/B06XKKZJG9/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=3DID700E1H134&keywords=TJS-0150-S&qid=1701134161&sprefix=tjs-0150-s%2Caps%2C147&sr=8-1', NULL),
(7, 'TJS-0915-B', '[\"TJS-0915-B\",\"TJS-0915s\"]', '中型収納庫ディープシリーズ TJS-0915-B', '31,800', 31800, 'ブラウン', '', '150✕95✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(8, 'TJS-0915-R', '[\"TJS-0915-R\",\"TJS-0915s\"]', '中型収納庫ディープシリーズ TJS-0915-R', '31,800', 31800, 'ローズ', '', '150✕95✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(9, 'TJS-0915-S', '[\"TJS-0915-S\",\"TJS-0915s\"]', '中型収納庫ディープシリーズ TJS-0915-S', '31,800', 31800, 'シルーバ', '', '150✕95✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(10, 'TJS-0915AN-B', '[\"TJS-0915AN-B\"]', 'アニマル柄収納庫 TJS-0915AN-B', '36,800', 36800, 'ブルー', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(11, 'TJS-0915AN-D', '[\"TJS-0915AN-D\"]', 'アニマル柄収納庫 TJS-0915AN-D', '36,800', 36800, 'ダークブラウン', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(12, 'TJS-0915AN-S', '[\"TJS-0915AN-S\"]', 'アニマル柄収納庫 TJS-0915AN-S', '36,800', 36800, 'シルーバ', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(13, 'TJS-0915HB-B', '[\"TJS-0915HB-B\"]', 'ブロック柄収納庫 TJS-0915HB-B', '36,800', 36800, 'ブルー', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(14, 'TJS-0915HB-D', '[\"TJS-0915HB-D\"]', 'ブロック柄収納庫 TJS-0915HB-D', '36,800', 36800, 'ダークブラウン', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(15, 'TJS-0915HB-S', '[\"TJS-0915HB-S\"]', 'ブロック柄収納庫 TJS-0915HB-S', '36,800', 36800, 'シルーバ', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(16, 'TJS-0915TK-B', '[\"TJS-0915TK-B\"]', '竹林柄収納庫 TJS-0915TK-B', '36,800', 36800, 'ブルー', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(17, 'TJS-0915TK-D', '[\"TJS-0915TK-D\"]', '竹林柄収納庫 TJS-0915TK-D', '36,800', 36800, 'ダークブラウン', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(18, 'TJS-0915TK-S', '[\"TJS-0915TK-S\"]', '竹林柄収納庫 TJS-0915TK-S', '36,800', 36800, 'シルーバ', '145✕89.5✕65Cm', '150✕95✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(19, 'TJS-1215-B', '[\"TJS-1215-B\",\"TJS-1215s\"]', '中型収納庫ディープシリーズ TJS-1215-B', '38,800', 38800, 'ブラウン', '', '150✕125✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(20, 'TJS-1215-R', '[\"TJS-1215-R\",\"TJS-1215s\"]', '中型収納庫ディープシリーズ TJS-1215-R', '38,800', 38800, 'ローズ', '', '150✕125✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(21, 'TJS-1215-S', '[\"TJS-1215-S\",\"TJS-1215s\"]', '中型収納庫ディープシリーズ TJS-1215-S', '38,800', 38800, 'シルーバ', '', '150✕125✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(22, 'TJS-1215AN-B', '[\"TJS-1215AN-B\"]', 'アニマル柄収納庫 TJS-1215AN-B', '42,800', 42800, 'ブルー', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(23, 'TJS-1215AN-D', '[\"TJS-1215AN-D\"]', 'アニマル柄収納庫 TJS-1215AN-D', '42,800', 42800, 'ダークブラウン', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(24, 'TJS-1215AN-S', '[\"TJS-1215AN-S\"]', 'アニマル柄収納庫 TJS-1215AN-S', '42,800', 42800, 'シルーバ', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(25, 'TJS-1215HB-B', '[\"TJS-1215HB-B\"]', 'ブロック柄収納庫 TJS-1215HB-B', '42,800', 42800, 'ブルー', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(26, 'TJS-1215HB-D', '[\"TJS-1215HB-D\"]', 'ブロック柄収納庫 TJS-1215HB-D', '42,800', 42800, 'ダークブラウン', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(27, 'TJS-1215HB-S', '[\"TJS-1215HB-S\"]', 'ブロック柄収納庫 TJS-1215HB-S', '42,800', 42800, 'シルーバ', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(28, 'TJS-1215TK-B', '[\"TJS-1215TK-B\"]', '竹林柄収納庫 TJS-1215TK-B', '42,800', 42800, 'ブルー', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(29, 'TJS-1215TK-D', '[\"TJS-1215TK-D\"]', '竹林柄収納庫 TJS-1215TK-D', '42,800', 42800, 'ダークブラウン', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(30, 'TJS-1215TK-S', '[\"TJS-1215TK-S\"]', '竹林柄収納庫 TJS-1215TK-S', '42,800', 42800, 'シルーバ', '145✕119.5✕65Cm', '150✕125✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(31, 'TJS-1515-B', '[\"TJS-1515-B\",\"TJS-1515s\"]', '中型収納庫ディープシリーズ TJS-1515-B', '45,800', 45800, 'ブラウン', '', '150✕155✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(32, 'TJS-1515-R', '[\"TJS-1515-R\",\"TJS-1515s\"]', '中型収納庫ディープシリーズ TJS-1515-R', '45,800', 45800, 'ローズ', '', '150✕155✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(33, 'TJS-1515-S', '[\"TJS-1515-S\",\"TJS-1515s\"]', '中型収納庫ディープシリーズ TJS-1515-S', '45,800', 45800, 'シルーバ', '', '150✕155✕82Cm', '', '', '', '', 'TJS', 'medium', NULL, NULL),
(34, 'TJS-1515AN-B', '[\"TJS-1515AN-B\"]', 'アニマル柄収納庫 TJS-1515AN-B', '49,800', 49800, 'ブルー', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(35, 'TJS-1515AN-D', '[\"TJS-1515AN-D\"]', 'アニマル柄収納庫 TJS-1515AN-D', '49,800', 49800, 'ダークブラウン', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(36, 'TJS-1515AN-S', '[\"TJS-1515AN-S\"]', 'アニマル柄収納庫 TJS-1515AN-S', '49,800', 49800, 'シルーバ', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(37, 'TJS-1515HB-B', '[\"TJS-1515HB-B\"]', 'ブロック柄収納庫 TJS-1515HB-B', '49,800', 49800, 'ブルー', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(38, 'TJS-1515HB-D', '[\"TJS-1515HB-D\"]', 'ブロック柄収納庫 TJS-1515HB-D', '49,800', 49800, 'ダークブラウン', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(39, 'TJS-1515HB-S', '[\"TJS-1515HB-S\"]', 'ブロック柄収納庫 TJS-1515HB-S', '49,800', 49800, 'シルーバ', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(40, 'TJS-1515TK-B', '[\"TJS-1515TK-B\",\"TJS-1515TKs\"]', '竹林柄収納庫 TJS-1515TK-B', '49,800', 49800, 'ブルー', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(41, 'TJS-1515TK-D', '[\"TJS-1515TK-D\",\"TJS-1515TKs\"]', '竹林柄収納庫 TJS-1515TK-D', '49,800', 49800, 'ダークブラウン', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(42, 'TJS-1515TK-S', '[\"TJS-1515TK-S\",\"TJS-1515TKs\"]', '竹林柄収納庫 TJS-1515TK-S', '49,800', 49800, 'シルーバ', '145✕149.5✕65Cm', '150✕165✕82Cm', '', '', '', '', 'TJS', 'pattern', NULL, NULL),
(43, 'TMH-1167', '[\"TMH-1167\",\"TMH-1167s\"]', 'TMHシリーズ TMH-1167', '19,800', 19800, 'ダークグレー', '', '112✕74.5✕68Cm', '', '', '', '', 'TMH', 'small', NULL, NULL),
(44, 'TMH-1667', '[\"TMH-1667\",\"TMH-1667s\"]', 'TMHシリーズ TMH-1667', '29,800', 29800, 'ダークグレー', '', '160✕74.5✕68Cm', '', '', '', '', 'TMH', 'small', NULL, NULL),
(45, 'TMR-0809', '[\"TMR-0809\"]', 'エコノミープラス TMR-0809', '11,800', 11800, 'ダークグレー', '', '90✕80✕65Cm', '', '', '', '', 'TMR', 'small', NULL, NULL),
(46, 'TMR-0813', '[\"TMR-0813\"]', 'エコノミープラス TMR-0813', '19,800', 19800, 'ダークグレー', '', '130✕80✕65Cm', '', '', '', '', 'TMR', 'small', NULL, NULL),
(47, 'TMR-0815', '[\"TMR-0815\"]', 'エコノミープラス TMR-0815', '22,800', 22800, 'ダークグレー', '', '150✕80✕65Cm', '', '', '', '', 'TMR', 'small', NULL, NULL),
(48, 'TMR-1209', '[\"TMR-1209\"]', 'エコノミープラス TMR-1209', '19,800', 19800, 'ダークグレー', '', '90✕115✕65Cm', '', '', '', '', 'TMR', 'small', NULL, NULL),
(49, 'TMS-008', '[\"TMS-008\"]', 'スーパーエコノミープラス TMS-008', '9,800', 9800, 'ホワイト', '', '80✕80✕50Cm', '', '', '', '', 'TMS', 'small', NULL, NULL),
(50, 'TMS-130H', '[\"TMS-130H\"]', 'エコノミープラス TMS-130H', '17,800', 17800, 'ブルー', '', '131.5✕90✕50Cm', '', '', '', '', 'TMS', 'small', NULL, NULL),
(51, 'TMS-160H', '[\"TMS-160H\"]', 'エコノミープラス TMS-160H', '21,800', 21800, 'ブルー', '', '161.5✕90✕50Cm', '', '', '', '', 'TMS', 'small', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saveproduct`
--

CREATE TABLE `saveproduct` (
  `product_index` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `add_by` varchar(255) NOT NULL,
  `add_in` date NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saveproduct`
--

INSERT INTO `saveproduct` (`product_index`, `product_id`, `add_by`, `add_in`, `count`) VALUES
(32, 'CH-805go', 'phandinh@gmail.com', '2023-11-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name_romaji` text NOT NULL,
  `lastname_romaji` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel_head` varchar(3) NOT NULL,
  `tel_body` varchar(4) NOT NULL,
  `tel_foot` varchar(4) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date DEFAULT NULL,
  `login_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name_romaji`, `lastname_romaji`, `name`, `lastname`, `gender`, `email`, `tel_head`, `tel_body`, `tel_foot`, `phonenumber`, `password`, `signup_date`, `login_key`) VALUES
(33, 'ファン', 'ファン', 'phan', 'phan', 'male', 'phandinh@gmail.com', '080', '1233', '1233', '08012331233', '$2y$10$GV0WZD5fh6ZYG8I7CjxlzO2EFUZ.daSRCJurWmuqfO4JdwG8z9aOq', '2023-11-14', '$2y$10$llmSSBRCRfnkjmIW90b1n.0j9rJPcWQ3vrzZgwM75FdS.YDribbM6'),
(34, 'フイ', 'フアン', 'huy', 'phan', 'male', 'phanhuy@gmail.com', '023', '9243', '1216', '02392431216', '$2y$10$fKLOKSoofNk9Xq1aze9.luoGYXJzW/x.6mimNlIeYGJlQVGWMAbQ.', '2023-11-17', '$2y$10$xT8I0HjeNRK20iWowVPAme5sYjQVPuZTSo4iySa1nfCcF90XvzOlK'),
(35, 'フイ', 'ファン', 'huy phan', 'phan', 'male', 'huydinh@gmail.com', '032', '3434', '2111', '04492432111', '$2y$10$Kicv/pOq8g5dinZltZik..PWqMPll/UY8DYo0O6/Ixlz4q3TJkBcq', '2023-11-21', '$2y$10$AfUuB.OIKtE4JoWXerFT9.9.eq1/II7auDYFMhsnwpyZ3pbpSzMwq');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_index` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zipcode_head` int(3) NOT NULL,
  `zipcode_foot` int(4) NOT NULL,
  `ken` varchar(255) NOT NULL,
  `shi` varchar(255) NOT NULL,
  `banchi` varchar(255) NOT NULL,
  `tatemono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_index`, `email`, `zipcode_head`, `zipcode_foot`, `ken`, `shi`, `banchi`, `tatemono`) VALUES
(1, '27', 12, 12, 'sdf', 'fsda', 'sdfsdf', 'hahaha'),
(2, '28', 12, 545, 'rewrewr', 'dfgfdg', 'dfgfg', 'gdfdfg'),
(3, '30', 423, 2344, 'dfsgsdfg', 'sdfg', 'sdfgdf', 'dsfgfdg'),
(4, '31', 423, 2344, 'dfsgsdfg', 'sdfg', 'sdfgdf', 'dsfgfdg'),
(5, '32', 423, 2344, 'dfsgsdfg', 'sdfg', 'sdfgdf', 'dsfgfdg'),
(6, '33', 423, 2344, 'dfsgsdfg', 'sdfg', 'sdfgdf', 'dsfgfdg'),
(7, '33', 555, 1551, 'fsdfsdg', 'sdgsdag', 'dsgsdg', 'dsgsdg'),
(8, '0', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(9, '0', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(10, '33', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(11, '33', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(12, '33', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(13, '33', 234, 4324, 'gdfsg', 'dfgdfsg', 'sdfg', 'dfgfdg'),
(0, 'huydinh@gmail.com', 333, 3333, 'aaaaaaaaa', 'aaaaaa', 'aaaaa', 'aaaaaaaaaaaaaaaaa'),
(1, 'huydinh@gmail.com', 222, 222, 'fsdfffffffff', 'fffffffffffff', 'ffffffff', 'ffffffffffff'),
(0, 'phandinh@gmail.com', 333, 3333, 'aaaaaaaaa', 'aaaaaa', 'aaaaa', 'aaaaaaaaaaaaaaaaa'),
(1, 'phandinh@gmail.com', 333, 3333, 'bbbbbbbbbbb', 'bbbbbbb', 'bbbbb', 'bbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `email` varchar(255) NOT NULL,
  `verifyCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`email`, `verifyCode`) VALUES
('phanhuyhhfgh@gmail.com', 8317);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `product_index` (`product_index`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_index`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `saveproduct`
--
ALTER TABLE `saveproduct`
  ADD PRIMARY KEY (`product_index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `product_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `saveproduct`
--
ALTER TABLE `saveproduct`
  MODIFY `product_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
