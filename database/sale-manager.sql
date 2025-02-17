-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 17, 2025 lúc 04:15 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sale-manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Bạn cần gì mà SHOP-KT không có?', 'Tại SHOP-KT, chúng tôi tự hào mang đến cho bạn tất cả những gì bạn cần để thể hiện phong cách và cá tính riêng biệt. Từ những bộ trang phục thanh lịch cho công sở, những bộ đồ năng động cho các hoạt động ngoài trời, đến những phụ kiện thời trang độc đáo, chúng tôi có tất cả. Với cam kết cung cấp những sản phẩm chất lượng cao, đa dạng mẫu mã và phù hợp với mọi nhu cầu, SHOP-KT chính là điểm đến lý tưởng giúp bạn hoàn thiện phong cách sống. Đến với chúng tôi và khám phá ngay những món đồ không thể thiếu trong tủ đồ của bạn – bạn cần gì, SHOP-KT luôn có!', '2024-12-18 18:32:18', '2024-12-28 07:30:52'),
(3, 'Vì sao bạn nên chọn Shop-KT', '\"Hãy trân trọng những giá trị bền vững, và bộ sưu tập WRINKLE FREE với những chiếc áo sơ mi tinh tế chính là lựa chọn hoàn hảo đồng hành cùng bạn trên hành trình này. Những thiết kế vượt thời gian, không chỉ đem đến sự thoải mái và tự tin mà còn thể hiện sự tinh tế trong từng chi tiết. Được làm từ chất liệu cao cấp, với khả năng chống nhăn tuyệt vời, mỗi chiếc áo trong bộ sưu tập WRINKLE FREE là biểu tượng của sự tiện lợi và đẳng cấp. Dù bạn là người bận rộn, luôn di chuyển hay yêu thích phong cách thanh lịch mỗi ngày, bộ sưu tập này sẽ luôn là người bạn đồng hành đáng tin cậy. Hãy để chúng tôi giúp bạn tạo dựng phong cách vượt thời gian và vững bền theo năm tháng.\"', '2024-12-18 18:34:10', '2024-12-28 07:31:20'),
(4, 'Vì tại Kt tự do mua sắm', 'Bạn không cần đắn đo về sự lựa chọn, hơn 2000 mẫu mới mỗi năm\r\nluôn ưu tiên phát triển chất liệu và chất lượng', '2024-12-18 18:48:36', '2024-12-18 18:48:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baners`
--

CREATE TABLE `baners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baners`
--

INSERT INTO `baners` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Khoảnh Khắc', '1735413290.jpg', 'hãy để chúng tôi là bạn đồng hành của bạn trong mọi khoảnh khắc', '2024-12-18 10:47:26', '2024-12-28 12:22:11'),
(4, 'Tôn Vinh', '1735414089.jpg', 'hãy tôn vinh phong cách riêng biệt.', '2024-12-28 12:28:09', '2024-12-28 12:29:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'áo đẹp lắm mọi người ơi', 12, 25, '2024-12-28 10:41:35', '2024-12-28 10:41:35'),
(2, 'quần đẹp quá...!', 4, 24, '2024-12-28 10:50:18', '2024-12-28 10:50:18'),
(3, 'Đẹp thiệt..!', 12, 24, '2024-12-28 10:50:44', '2024-12-28 10:50:44'),
(4, 'Quần này được..!', 12, 30, '2024-12-28 10:51:55', '2024-12-28 10:51:55'),
(5, 'Áo này viipp', 12, 19, '2024-12-29 12:14:34', '2024-12-29 12:14:34'),
(6, 'AAAAAAAAAAAAAAAA.!', 16, 19, '2025-01-04 05:46:34', '2025-01-04 05:46:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
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
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Văn A', 'anguyevan@gmail.com', 'tôi đang đã đạt hàng nhưng khi nhận hàng sản phẩm không như mẫu.!', '2024-12-29 16:29:00', '2024-12-29 16:29:00'),
(3, 'Nguyễn Văn B', 'bnguyevan@gmail.com', 'tôi hài lòng về dịch vụ của các bạn', '2024-12-29 16:30:42', '2024-12-29 16:30:42'),
(4, 'Ka Ra Nuy', 'Nuy@gmail.com', 'Nuy ngu xa ẹ ùn cra, vao clau vlâng,.......................', '2025-01-13 15:15:38', '2025-01-13 15:15:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2024_11_21_074410_add_timestamps_to_products_table', 1),
(42, '2024_11_21_125139_add_timestamps_to_user', 2),
(43, '2024_11_21_153032_create_product_table', 3),
(44, '2024_11_21_174828_create_users_table', 4),
(45, '2024_11_21_175007_create_password_reset_tokens_table', 5),
(46, '2024_11_22_120936_create_product_categories_table', 5),
(47, '2024_11_22_133859_create_product_table', 6),
(49, '2024_11_22_143425_create_product_categories_table', 7),
(50, '2024_11_22_143738_create_products_table', 7),
(51, '2024_11_23_064748_create_roles_table', 8),
(53, '2024_11_23_081517_create_roles_table', 9),
(54, '2024_11_28_032711_create_oder_table', 10),
(55, '2024_11_28_075425_create_sliders_table', 11),
(56, '2024_12_11_031706_create_sliders_table', 12),
(57, '2024_12_12_081842_create_sliders_table', 13),
(58, '2024_12_15_160723_create_shipping_table', 14),
(59, '2024_12_16_081750_create_shippingse_table', 15),
(60, '2024_12_16_081750_create_shipping_table', 16),
(61, '2024_12_16_081751_create_shipping_table', 17),
(62, '2024_12_16_084502_create_shipping_table', 18),
(63, '2024_12_16_084633_create_shipping_table', 19),
(64, '2024_12_18_150813_create_shipping_table', 20),
(65, '2024_12_18_161024_create_term_table', 21),
(66, '2024_12_18_161315_create_terms_table', 22),
(67, '2024_12_18_171318_create_baner_table', 23),
(68, '2024_12_18_171642_create_baners_table', 24),
(69, '2024_12_18_191436_create_articles_table', 25),
(70, '2024_12_24_102044_create_shipping_table', 26),
(71, '2024_12_28_160749_create_coments_table', 27),
(72, '2024_12_29_222413_create_contact_table', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('cart','pending','completed','cancelled') NOT NULL DEFAULT 'cart',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 11, 'cart', '2024-12-26 12:09:09', '2024-12-26 12:09:09'),
(11, 4, 'cart', '2024-12-26 13:21:25', '2024-12-26 13:21:25'),
(12, 12, 'cart', '2024-12-27 03:38:24', '2024-12-27 03:38:24'),
(13, 1, 'cart', '2024-12-29 12:04:50', '2024-12-29 12:04:50'),
(15, 16, 'cart', '2025-01-04 05:28:07', '2025-01-04 05:28:07'),
(16, 17, 'cart', '2025-01-13 15:10:56', '2025-01-13 15:10:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(19, '1735387297.jpg', 'Biker jacket in leather', 'Màu sắc XANH ĐEN Thành phần Da bò 100%. Chăm sóc không rửa Không ủi Đừng sấy khô Không tẩy trắng Không giặt khô', 12600000.00, 33, 3, NULL, NULL),
(20, '1735387161.jpg', 'crystals and pearls', 'Màu sắc Cappuccino màu be Thành phần 100% bông. Chăm sóc Giặt tay, nhiệt độ tối đa (40°C) Ủi ở nhiệt độ mặt đế tối đa (110°C) không sử dụng hơi nước Khô phẳng Không tẩy trắng Không giặt khô', 980000.00, 26, 6, NULL, NULL),
(24, '1735380084.jpg', 'Tapered demin pant - Gucci', 'Bộ sưu tập Cruise 2025 mang đến phong cách denim mới mẻ với những chi tiết tinh tế nâng tầm vẻ ngoài hàng ngày. Được cắt từ chất liệu denim cotton đã được chứng nhận, chiếc quần denim ống côn này để lộ phần cạp quần bằng vải GG và nhãn hiệu Gucci jacron.', 12000000.00, 30, 2, NULL, NULL),
(25, '1732778885.png', 'Chanel-Coco Classic', 'Sang trọng, thời thượng', 2650000.00, 32, 3, NULL, NULL),
(29, '1735381908.jpg', 'Padded jacket in mixed fabrics', 'Màu sắc SÔCÔLA Thành phần 100% polyamit tái chế. Chất độn: 100% polyester. Chăm sóc Giặt tối đa 30°C, chu trình giặt nhẹ nhàng Ủi ở nhiệt độ mặt đế tối đa (110°C) không sử dụng hơi nước Đừng sấy khô Không tẩy trắng Không giặt khô', 18000000.00, 21, 3, NULL, NULL),
(30, '1735380289.jpg', 'Supper baggy jeans', 'Quần jean 5 túi bằng cotton denim cứng. Ống lượn tròn và dáng baggy từ vòng ba cho tới gấu với toàn bộ ống quần rộng rãi. Đũng hạ thấp và trùng ở mắt cá. Cạp thường và nẹp khoá kéo. Đây là tất cả những gì bạn cần để diện một bộ denim hoàn hảo.', 6000000.00, 32, 2, NULL, NULL),
(32, '1733996687.jpg', 'Gucci-Double E', 'Áo đẹp lắm mọi người ơi', 2850000.00, 34, 3, NULL, NULL),
(33, '1735383408.jpg', 'T-shirt in cotton with Hubert', 'Màu sắc ĐEN Thành phần 100% bông. Chăm sóc Giặt tối đa 30°C, chu trình giặt nhẹ nhàng Ủi ở nhiệt độ mặt đế tối đa (110°C) không sử dụng hơi nước Đừng sấy khô Không tẩy trắng Không giặt khô', 1200000.00, 16, 6, NULL, NULL),
(34, '1734577130.jpg', 'H&M-Casual Cool', 'Quần ngắn chất liệu jeans xám, thoáng mát không phai màu', 300000.00, 30, 7, NULL, NULL),
(35, '1734577193.jpg', 'Yame-Casual Cool', 'Quần ngắn chất liệu thun co giăn xám, thoáng mát không phai màu, phù hợp đi làm, đi chơi', 460000.00, 30, 7, NULL, NULL),
(36, '1736780904.jpg', 'Regular Fit', 'Áo bằng vải nỉ nặng với mặt trái chải xù mềm. Cổ đứng, khoá kéo bên trên, vai ráp trễ và tay dài. Cổ tay và gấu bo gân nổi. Dáng vừa để mặc thoải mái và tạo dáng cổ điển.  Chiều cao: Chiều dài bình thường Chiều dài tay áo: Tay dài Độ vừa vặn: Ôm vừa Phong cách: Cổ kéo khoá, Áo nỉ Đường viền cổ áo: Cổ lọ Mô tả: Màu be nhạt, Màu trơn', 339100.00, 20, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Quần dài', 'Tuyển chọn những thiết kế quần dài đẳng cấp, mang lại vẻ lịch lãm và thoải mái cho mọi dịp quan trọng.', '2024-11-22 08:41:34', '2024-12-28 05:17:41'),
(3, 'Áo khoác', 'Bộ sưu tập áo khoác thời thượng, kết hợp giữa sự tinh tế và khả năng giữ ấm hoàn hảo.', '2024-11-22 11:15:23', '2024-12-28 05:17:58'),
(6, 'Áo thun', 'Áo thun cao cấp với thiết kế hiện đại, thể hiện cá tính và gu thẩm mỹ riêng biệt của phái mạnh.', '2024-12-18 19:55:03', '2024-12-28 05:18:36'),
(7, 'Quần ngắn', 'Quần ngắn lịch lãm, vừa thoải mái vừa thời trang, lý tưởng cho những ngày hè năng động.', '2024-12-18 19:56:34', '2024-12-28 05:19:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `status` enum('pending','delivered') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `product_id`, `quantity`, `price`, `shipping_address`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(14, 11, 20, 1, 2950000.00, 'q6, hcm', 'delivered', '2024-12-26 13:21:31', '2024-12-26 13:28:44', 4),
(21, 12, 19, 1, 2950000.00, '33 vĩnh viễn,p13,q10', 'delivered', '2024-12-27 03:40:13', '2024-12-27 03:42:19', 12),
(41, 10, 20, 1, 980000.00, '278, Đường Mã Lò, Phường Bình Trị Đông A, Quận Bình Tân, Thành phố Hồ Chí Minh, 73118, Việt Nam', 'pending', '2024-12-28 23:11:14', '2024-12-28 23:11:14', 11),
(56, 11, 19, 1, 12600000.00, '33 vĩnh viễn,p13,q10', 'pending', '2025-01-01 22:39:29', '2025-01-01 22:39:29', 4),
(57, 15, 30, 1, 6000000.00, 'nhựt tảo 123', 'delivered', '2025-01-04 05:29:36', '2025-01-20 16:07:43', 16),
(58, 15, 19, 1, 12600000.00, 'nhưt tảo 123', 'delivered', '2025-01-04 05:43:00', '2025-01-04 05:48:40', 16),
(59, 16, 30, 1, 6000000.00, 'Đường tỉnh 726, Đạ Cọ, Xã Đồng Nai Thượng, Huyện Đạ Huoai, Tỉnh Lâm Đồng, Việt Nam', 'delivered', '2025-01-13 15:13:14', '2025-02-17 11:47:10', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(6, 'WELLCOM TO KT_SHOP', '1734030221.jpg', 'Vẻ đẹp thời thượng tạo nên giá trị cho bảng thân bạn', '2024-12-12 12:03:41', '2024-12-28 07:33:53'),
(7, 'VÌ SAO BẠN NÊN CHỌN SHOP-KT', '1735475106.jpg', 'Sang trọng lịch lẵm, thể hiện cá tính và gu thẩm mỹ riêng biệt của phái mạnh.', '2024-12-12 12:11:28', '2024-12-29 12:25:06'),
(8, 'HÃY ĐẾN ĐÂY.!', '1735393760.jpeg', 'Để bản thân bạn biết được đâu là chân ái đích thực của cuộc đời mình.', '2024-12-12 12:13:49', '2025-01-16 15:02:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `terms`
--

INSERT INTO `terms` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Khám Phá', '1735394497.jpg', 'nơi mà mỗi sản phẩm đều được chọn lọc kỹ lưỡng để mang đến cho bạn những trải nghiệm mua sắm tuyệt vời nhất. Từ những bộ quần áo thời trang, giày dép đến các phụ kiện cao cấp, tất cả đều được thiết kế để tôn vinh phong cách riêng biệt của bạn', '2024-12-18 09:43:17', '2024-12-28 07:01:37'),
(3, 'Sự Hoàn Hảo', '1734541798.jpg', 'mỗi sản phẩm tại Shop KT đều được chăm chút tỉ mỉ để bạn cảm nhận được sự hoàn hảo trong từng chi tiết. Từ những bộ trang phục thanh lịch đến những món đồ thời trang cá tính, chúng tôi luôn cập nhật những xu hướng mới nhất để bạn luôn nổi bật', '2024-12-18 10:09:58', '2024-12-28 07:05:01'),
(4, 'Tự Tin', '1734548891.jpg', 'luôn đồng hành cùng bạn, giúp bạn tìm kiếm và tạo dựng phong cách riêng biệt, đến với Shop KT và để chúng tôi giúp bạn tỏa sáng trong mọi khoảnh khắc, từ những ngày dạo phố đến những sự kiện đặc biệt!', '2024-12-18 12:08:11', '2024-12-28 07:07:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `image`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'admin', 'Anonymous', '1735391309.png', 'Anonymous', 'admin@gmail.com', NULL, '$2y$10$F1GjR.fvs8s9kk5ySiRkf.Tyig7vhAo2ag6sjNwd1kwSj8hg4g6BK', NULL, '2024-12-28 06:06:39', '2024-12-28 06:08:29', 1),
(4, 'kietem', '33 vĩnh viễn,p13,q10', '1735390850.jpg', '01234567', 'kietem@gmail.com', NULL, '$2y$10$VVfRXU5dU1a5QJSPXt79J.wgCT.efuq32/SBGrPK4G5cAkhS7oBpi', NULL, '2024-12-12 12:18:33', '2024-12-28 06:00:50', 2),
(11, 'thiên kim', '123 hòa bình', '1735391474.png', '0798976032', 'nhoc@gmail.com', NULL, '$2y$10$NZ/3U2d/3Hfo89BiyyuJcusHJgeeEWcZSmMB/2LSmH7RbzW3QWbVW', NULL, '2024-12-26 12:08:34', '2025-02-17 15:10:47', 2),
(12, 'kem', '', '1735391537.png', '0378123197', 'kem@gmail.com', NULL, '$2y$10$MyxkSGqwG6e6QUi6SFfFMOYq6F2y6fdIvzXc/HmrTn46b8ZLUe7q6', NULL, '2024-12-27 03:38:04', '2024-12-29 15:11:56', 2),
(16, 'phu', 'nhựt tảo 123', '1736955648.jpg', '034567890', 'phu1@gmail.com', NULL, '$2y$10$5p11UVYAcJhTz1cdoMB9suo2mzc1F7.lcPzW/T4kBVAJshef8lUV6', NULL, '2025-01-04 05:27:30', '2025-01-15 15:43:06', 2),
(17, 'Ka Nuy', NULL, '1736781034.jpg', '01234567', 'Nuy@gmail.com', NULL, '$2y$10$rOkIeOnEanatYRqvrAGSHOZltln9wpJDqwCMWYzeEM5Adhmbw79f2', NULL, '2025-01-13 15:09:59', '2025-01-13 15:13:07', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baners`
--
ALTER TABLE `baners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
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
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_order_id_foreign` (`order_id`),
  ADD KEY `shipping_product_id_foreign` (`product_id`),
  ADD KEY `shipping_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `baners`
--
ALTER TABLE `baners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shipping_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shipping_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
