-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2022 lúc 03:11 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(5, 5, '2017-03-23', 20000, 'tiền mặt', NULL, '2017-03-11 13:06:44', '2017-03-11 13:06:44'),
(6, 6, '2022-11-13', 160000, 'COD', 'không', '2022-11-12 17:03:29', '2022-11-12 17:03:29'),
(7, 7, '2022-11-13', 160000, 'COD', '2', '2022-11-13 01:56:30', '2022-11-13 01:56:30'),
(8, 8, '2022-11-13', 160000, 'COD', '2', '2022-11-13 02:26:15', '2022-11-13 02:26:15'),
(9, 9, '2022-11-13', 160000, 'COD', '2', '2022-11-13 02:34:56', '2022-11-13 02:34:56'),
(10, 10, '2022-11-13', 160000, 'COD', '2', '2022-11-13 02:35:12', '2022-11-13 02:35:12'),
(11, 11, '2022-11-13', 160000, 'COD', '2', '2022-11-13 02:35:27', '2022-11-13 02:35:27'),
(12, 12, '2022-11-13', 160000, 'COD', '2', '2022-11-13 02:36:58', '2022-11-13 02:36:58'),
(13, 13, '2022-11-13', 320000, 'COD', '333', '2022-11-13 02:43:18', '2022-11-13 02:43:18'),
(14, 14, '2022-11-13', 8000, 'COD', '2', '2022-11-13 04:43:21', '2022-11-13 04:43:21'),
(15, 15, '2022-11-13', 69000, 'COD', 'k', '2022-11-13 05:32:44', '2022-11-13 05:32:44'),
(16, 16, '2022-11-13', 69000, 'COD', 'k', '2022-11-13 05:39:07', '2022-11-13 05:39:07'),
(17, 17, '2022-11-13', 69000, 'COD', 'k', '2022-11-13 05:43:54', '2022-11-13 05:43:54'),
(18, 20, '2022-11-13', 69000, 'COD', 'h', '2022-11-13 05:46:56', '2022-11-13 05:46:56'),
(19, 21, '2022-11-13', 65000, 'COD', 'f', '2022-11-13 05:52:12', '2022-11-13 05:52:12'),
(20, 22, '2022-11-13', 134000, 'COD', '0', '2022-11-13 14:09:07', '2022-11-13 14:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 5000, '2017-03-11 13:10:10', '0000-00-00 00:00:00'),
(2, 5, 12, 1, 10000, '2017-03-11 13:08:01', '0000-00-00 00:00:00'),
(3, 16, 5, 1, 69000, '2022-11-13 05:39:07', '2022-11-13 05:39:07'),
(4, 17, 5, 1, 69000, '2022-11-13 05:43:54', '2022-11-13 05:43:54'),
(5, 18, 5, 1, 69000, '2022-11-13 05:46:56', '2022-11-13 05:46:56'),
(6, 19, 4, 1, 65000, '2022-11-13 05:52:12', '2022-11-13 05:52:12'),
(7, 20, 4, 1, 65000, '2022-11-13 14:09:07', '2022-11-13 14:09:07'),
(8, 20, 5, 1, 69000, '2022-11-13 14:09:07', '2022-11-13 14:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(5, 'Huong Huong', 'Nữ', 'huongnguyenak96@gmail.com', 'le thi rieng', '55555555', '55555555555555', '2016-11-14 08:25:57', '2016-11-14 08:25:57'),
(6, 'Vương Nguyên', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0903760949', 'không', '2022-11-12 17:03:29', '2022-11-12 17:03:29'),
(7, 'vuong', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 01:56:30', '2022-11-13 01:56:30'),
(8, 'vuong', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 02:26:15', '2022-11-13 02:26:15'),
(9, 'vuong', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 02:34:56', '2022-11-13 02:34:56'),
(10, 'vuong', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 02:35:12', '2022-11-13 02:35:12'),
(11, 'Đồ ăn', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 02:35:27', '2022-11-13 02:35:27'),
(12, 'Đồ ăn', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 02:36:58', '2022-11-13 02:36:58'),
(13, 'vuong', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0903760949', '333', '2022-11-13 02:43:18', '2022-11-13 02:43:18'),
(14, 'Đồ ăn', 'nam', '2@gmail.com', 'Tân Hòa Đông', '0903760949', '2', '2022-11-13 04:43:21', '2022-11-13 04:43:21'),
(15, 'Hoàng Anh', 'nam', 'admin@localhost.com', 'SGU', '0817281168', 'k', '2022-11-13 05:32:44', '2022-11-13 05:32:44'),
(16, 'Hoàng Anh', 'nam', 'admin@localhost.com', 'SGU', '0817281168', 'k', '2022-11-13 05:39:07', '2022-11-13 05:39:07'),
(17, 'vuong', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0906051000', 'k', '2022-11-13 05:43:54', '2022-11-13 05:43:54'),
(18, 'vuong', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0906051000', 'k', '2022-11-13 05:45:35', '2022-11-13 05:45:35'),
(19, 'vuong', 'nam', 'admin@localhost.com', 'Liên quân', '0906051000', 'd', '2022-11-13 05:46:11', '2022-11-13 05:46:11'),
(20, 'vuong', 'nam', 'admin@localhost.com', 'Pham van sang hoc mon', '0906051000', 'h', '2022-11-13 05:46:56', '2022-11-13 05:46:56'),
(21, 'vuong', 'nam', 'admin@localhost.com', 'Tân Hòa Đông', '0817281168', 'f', '2022-11-13 05:52:12', '2022-11-13 05:52:12'),
(22, 'vuong', 'nam', 'localhost@gmail.com', 'Tân Hòa Đông', '0817281168', '0', '2022-11-13 14:09:07', '2022-11-13 14:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'E-Paper A4 70gsm', 1, '', 59000, 58000, '1.jpg', 'giấy', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'E-Paper A3 70gsm', 1, '', 121000, 120000, '2.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Giấy in ảnh 1m135', 1, '', 57000, 56000, '3.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Bìa Thái A3', 6, '', 66000, 65000, '4.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'IK plus A4 70gsm', 1, '', 70000, 69000, '5.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Double A4 70 – 550 tờ', 1, '', 74000, 73000, '6.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Ford màu A4 80gsm', 1, '', 77000, 76000, '7.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bìa kiếng A4 1.2 zem', 6, '', 57000, 56000, '8.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Dấu Shiny S844', 5, '', 96000, 95000, '9.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Dấu Shiny S828R', 5, '', 186000, 185000, '10.jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Dấu Tự Động Shiny S-306 -Số Cao 3mm-Đóng Số 6 Số', 5, '', 127000, 126000, '11a.jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Pin Đại D Panasonic', 4, '', 17100, 17000, '11.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'CASIO JF 120FM', 2, '', 321000, 320000, '13.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'CASIO AX 12B', 2, '', 286000, 285000, '14.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'CASIO HL – 122TV', 2, '', 288000, 287000, '15.jpg', 'hộp', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Máy Tính Casio MJ 120D Plus', 2, '', 281000, 280000, '16.jpg', 'cai', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'MÁY TÍNH CASIO MX 120B', 2, '', 243000, 242000, '17.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Máy Tính Casio MS-20UC-BK', 2, '', 301000, 300000, '18.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Pin camelion A23', 4, '', 10000, 9000, '20.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Pin AAA Energizer', 4, '', 8000, 7000, '21.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Pin AAAA Energizer chính hãng vỉ 2 viên', 4, '', 79000, 78000, '22.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Pin AA Energizer', 4, '', 8000, 7000, '23.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Băng keo simili 3f6', 3, '', 9000, 8000, '24.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Băng keo màu 3f6', 3, '', 11000, 10000, '25.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Băng keo đục 4F8', 3, '', 12000, 11000, '26.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Hộp Cắm Bút 198', 7, '', 47800, 46800, '27.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Hộp Cắm Bút Xoay No .174', 7, '', 45200, 44200, '28.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Kìm Bấm Lỗ KwTrio 9717', 8, '', 210400, 209400, '29.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Kìm bấm 1 lỗ hình Oval KW-TriO 9772', 8, '', 236200, 235200, '30.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bút bi nước Uni-ball eye Micro UB150 nắp đậy, Màu mực viết: xanh, đỏ, đen, xanh lá.', 7, '', 29800, 28800, '31.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bút UNIBALL UB 150', 7, '', 10100, 9100, '32.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bút Bi Starup FO-039/VN', 7, '', 3200, 2200, '33.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bút Bi Calina FO-030/VN', 7, '', 6500, 5500, '34.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bút Bi Senior FO-026/VN', 7, '', 6500, 5500, '35.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bút Bi Cyber FO-025/VN', 7, '', 2800, 1800, '36.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bút Bi FO-024 (20 Cây/Hộp)', 7, '', 5200, 4200, '37.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bút Bi Snap FO-023/VN', 7, '', 4200, 3200, '38.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bút Bi Actimen FO-015/VN', 7, '', 7000, 6000, '39.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bút Bi Join Master FO-011/VN', 7, '', 5800, 4800, '40.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bút Bi Redart FO-07/VN', 7, '', 3000, 2000, '41.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Bút Bi Eslise FO-06', 7, '', 2600, 1600, '42.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Bút Bi Eromen FO-05/VN', 7, '', 9000, 8000, '43.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Bút Bi TL FO-03', 7, '', 4500, 3500, '44.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Bút Bi TL095 - Laris', 7, '', 7700, 6700, '45.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Bút Đùn Thiên Long 093 - Candee', 7, '', 3500, 2500, '46.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'Bút Đùn TL 090 -Candee', 7, '', 3000, 2000, '47.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Bút Bi Thiên Long 089 -Chipy', 7, '', 4000, 3000, '48.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bút Bi TL080', 7, '', 3800, 2800, '49.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bút Bi TL048 -Renown', 7, '', 14100, 13100, '50.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bút Lông Dầu Horse 2 Đầu - Xanh', 7, '', 16600, 15600, '51.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Hộp Cắm Bút Xukiva No.176 (Xoay)', 7, '', 45200, 44200, '52.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Sổ lò xo A7 Pgrand loại 1 dày 200 trang (6 quyển/lốc) ', 9, '', 8200, 7200, '53.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Sổ Lò Xo A5 Pgrand Mỏng 100 Trang', 9, '', 14500, 13500, '54.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Sổ Lò Xo A5 Pgrand 200 Trang', 9, '', 23900, 22900, '55.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Sổ Lò Xo A4 Pgrand Loại 1 -Mỏng 100 Trang (12 Quyển/Lốc)', 9, '', 24100, 23100, '56.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Sổ Lò Xo A4 Pgrand Loại 1-Dày 200 Trang (6 Quyển/Lốc)', 9, '', 37800, 36800, '57.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Giấy Màu Đặc Biệt A4 Pgrand Định Lượng 80gsm (500 Tờ/Ream/Màu)', 1, '', 183000, 182000, '58.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Giấy Màu Đặc Biệt A3 160gsm Pgrand (500 Tờ/Ream/Màu)', 1, '', 313000, 312000, '59.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bìa 5 Màu Đặc Biệt A4 160gsm (100 Tờ/Xấp 5 Màu)', 6, '', 76400, 75400, '60.jpg', '', 1, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Máy Tính Casio FX-570VN PLUS', 2, '', 573000, 572000, '61.jpg', 'cái', 1, NULL, NULL),
(62, 'Máy Tính CASIO FX-570 ES PLUS Chính Hãng', 2, '', 431000, 430000, '62.jpg', 'cái', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Giấy', '', '1.jpg', NULL, NULL),
(2, 'Máy tính', '', '2.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Băng keo', '', '3.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Pin', '', '4.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Dấu', '', '5.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Tập hoặc bìa', '', '6.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bút viết hoặc hộp đựng viết', '', '7.jpg', '2016-10-25 17:19:00', NULL),
(8, 'kim bấm', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Sổ', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nguyenquovuong', 'admin@localhost.com', '$2y$10$EoIRgKpRC/0LeyR.lIGZgOPhNzNH8izDXumLDO/WzIwuLlMAoL8dO', '[value-5]', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
