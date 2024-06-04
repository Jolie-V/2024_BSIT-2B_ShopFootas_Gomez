-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopfootas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `prdct_dsgn_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_info_id`, `prdct_dsgn_id`, `date_added`) VALUES
(41, 7, 29, '2024-06-04 04:39:59'),
(42, 7, 20, '2024-06-04 04:40:02'),
(43, 9, 16, '2024-06-04 04:40:30'),
(45, 9, 23, '2024-06-04 04:40:46'),
(46, 9, 22, '2024-06-04 04:40:49'),
(47, 9, 17, '2024-06-04 04:40:57'),
(48, 7, 23, '2024-06-04 05:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `com_ment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_info_id`, `com_ment`, `date_added`) VALUES
(2, 7, 'hi hello', '2024-06-03 01:23:39'),
(3, 9, 'comment', '2024-06-03 02:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `date_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_ref` varchar(9) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `prdct_dsgn_id` int(11) NOT NULL,
  `order_phase` varchar(55) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_ref`, `user_info_id`, `prdct_dsgn_id`, `order_phase`, `date_added`) VALUES
(20, 'ORD-JTMZQ', 7, 29, 'pending', '2024-06-04 04:40:11'),
(21, 'ORD-JTMZQ', 7, 20, 'pending', '2024-06-04 04:40:11'),
(22, 'ORD-EHSXI', 9, 16, 'pending', '2024-06-04 04:40:43'),
(23, 'ORD-EHSXI', 9, 30, 'pending', '2024-06-04 04:40:43'),
(24, 'ORD-M5M62', 9, 16, 'pending', '2024-06-04 04:40:54'),
(25, 'ORD-M5M62', 9, 23, 'pending', '2024-06-04 04:40:54'),
(26, 'ORD-M5M62', 9, 22, 'pending', '2024-06-04 04:40:54'),
(27, 'ORD-RX7R7', 9, 16, 'completed', '2024-06-04 04:41:02'),
(28, 'ORD-RX7R7', 9, 23, 'completed', '2024-06-04 04:41:02'),
(29, 'ORD-RX7R7', 9, 22, 'completed', '2024-06-04 04:41:02'),
(30, 'ORD-RX7R7', 9, 17, 'completed', '2024-06-04 04:41:02'),
(31, 'ORD-GX3OJ', 7, 29, 'pending', '2024-06-04 05:40:59'),
(32, 'ORD-GX3OJ', 7, 20, 'pending', '2024-06-04 05:40:59'),
(33, 'ORD-GX3OJ', 7, 23, 'pending', '2024-06-04 05:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `prdct_dsgn_id` int(11) NOT NULL,
  `sizes_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `prdct_dsgn_id`, `sizes_id`, `date_added`) VALUES
(50, 13, 1, '2024-06-01 08:53:10'),
(51, 13, 2, '2024-06-01 08:53:10'),
(52, 13, 3, '2024-06-01 08:53:10'),
(53, 13, 4, '2024-06-01 08:53:10'),
(54, 13, 5, '2024-06-01 08:53:10'),
(55, 13, 6, '2024-06-01 08:53:10'),
(56, 13, 7, '2024-06-01 08:53:10'),
(57, 14, 1, '2024-06-01 08:54:53'),
(58, 14, 2, '2024-06-01 08:54:53'),
(59, 14, 3, '2024-06-01 08:54:53'),
(60, 14, 4, '2024-06-01 08:54:53'),
(61, 14, 5, '2024-06-01 08:54:53'),
(62, 14, 6, '2024-06-01 08:54:53'),
(63, 14, 7, '2024-06-01 08:54:53'),
(64, 15, 1, '2024-06-01 08:55:52'),
(65, 15, 2, '2024-06-01 08:55:52'),
(66, 15, 3, '2024-06-01 08:55:52'),
(67, 15, 4, '2024-06-01 08:55:52'),
(68, 15, 5, '2024-06-01 08:55:52'),
(69, 15, 6, '2024-06-01 08:55:52'),
(70, 15, 7, '2024-06-01 08:55:52'),
(71, 16, 1, '2024-06-01 08:56:38'),
(72, 16, 2, '2024-06-01 08:56:38'),
(73, 16, 3, '2024-06-01 08:56:38'),
(74, 16, 4, '2024-06-01 08:56:38'),
(75, 16, 5, '2024-06-01 08:56:38'),
(76, 16, 6, '2024-06-01 08:56:38'),
(77, 16, 7, '2024-06-01 08:56:38'),
(78, 17, 1, '2024-06-01 08:57:15'),
(79, 17, 2, '2024-06-01 08:57:15'),
(80, 17, 3, '2024-06-01 08:57:15'),
(81, 17, 4, '2024-06-01 08:57:15'),
(82, 17, 5, '2024-06-01 08:57:15'),
(83, 17, 6, '2024-06-01 08:57:15'),
(84, 17, 7, '2024-06-01 08:57:15'),
(85, 18, 1, '2024-06-01 08:57:49'),
(86, 18, 2, '2024-06-01 08:57:49'),
(87, 18, 3, '2024-06-01 08:57:49'),
(88, 18, 4, '2024-06-01 08:57:49'),
(89, 18, 5, '2024-06-01 08:57:49'),
(90, 18, 6, '2024-06-01 08:57:49'),
(91, 18, 7, '2024-06-01 08:57:49'),
(92, 19, 1, '2024-06-01 09:00:14'),
(93, 19, 2, '2024-06-01 09:00:14'),
(94, 19, 3, '2024-06-01 09:00:14'),
(95, 19, 4, '2024-06-01 09:00:14'),
(96, 19, 5, '2024-06-01 09:00:14'),
(97, 19, 6, '2024-06-01 09:00:14'),
(98, 19, 7, '2024-06-01 09:00:14'),
(99, 20, 1, '2024-06-01 09:01:14'),
(100, 20, 2, '2024-06-01 09:01:14'),
(101, 20, 3, '2024-06-01 09:01:14'),
(102, 20, 4, '2024-06-01 09:01:14'),
(103, 20, 5, '2024-06-01 09:01:14'),
(104, 20, 6, '2024-06-01 09:01:14'),
(105, 20, 7, '2024-06-01 09:01:14'),
(106, 21, 1, '2024-06-01 09:02:07'),
(107, 21, 2, '2024-06-01 09:02:07'),
(108, 21, 3, '2024-06-01 09:02:07'),
(109, 21, 4, '2024-06-01 09:02:07'),
(110, 21, 5, '2024-06-01 09:02:07'),
(111, 21, 6, '2024-06-01 09:02:07'),
(112, 21, 7, '2024-06-01 09:02:07'),
(113, 22, 1, '2024-06-01 09:03:05'),
(114, 22, 2, '2024-06-01 09:03:05'),
(115, 22, 3, '2024-06-01 09:03:05'),
(116, 22, 4, '2024-06-01 09:03:05'),
(117, 22, 5, '2024-06-01 09:03:05'),
(118, 22, 6, '2024-06-01 09:03:05'),
(119, 22, 7, '2024-06-01 09:03:05'),
(120, 23, 1, '2024-06-01 09:04:13'),
(121, 23, 2, '2024-06-01 09:04:13'),
(122, 23, 3, '2024-06-01 09:04:13'),
(123, 23, 4, '2024-06-01 09:04:13'),
(124, 23, 5, '2024-06-01 09:04:13'),
(125, 23, 6, '2024-06-01 09:04:13'),
(126, 23, 7, '2024-06-01 09:04:13'),
(127, 24, 1, '2024-06-01 09:05:39'),
(128, 24, 2, '2024-06-01 09:05:39'),
(129, 24, 3, '2024-06-01 09:05:39'),
(130, 24, 4, '2024-06-01 09:05:39'),
(131, 24, 5, '2024-06-01 09:05:39'),
(132, 24, 6, '2024-06-01 09:05:39'),
(133, 24, 7, '2024-06-01 09:05:39'),
(134, 25, 1, '2024-06-01 09:06:53'),
(135, 25, 2, '2024-06-01 09:06:53'),
(136, 25, 3, '2024-06-01 09:06:53'),
(137, 25, 4, '2024-06-01 09:06:53'),
(138, 25, 5, '2024-06-01 09:06:53'),
(139, 25, 6, '2024-06-01 09:06:53'),
(140, 25, 7, '2024-06-01 09:06:53'),
(141, 26, 1, '2024-06-01 09:07:38'),
(142, 26, 2, '2024-06-01 09:07:38'),
(143, 26, 3, '2024-06-01 09:07:38'),
(144, 26, 4, '2024-06-01 09:07:38'),
(145, 26, 5, '2024-06-01 09:07:38'),
(146, 26, 6, '2024-06-01 09:07:38'),
(147, 26, 7, '2024-06-01 09:07:38'),
(148, 27, 1, '2024-06-01 09:08:13'),
(149, 27, 2, '2024-06-01 09:08:13'),
(150, 27, 3, '2024-06-01 09:08:13'),
(151, 27, 4, '2024-06-01 09:08:13'),
(152, 27, 5, '2024-06-01 09:08:13'),
(153, 27, 6, '2024-06-01 09:08:13'),
(154, 27, 7, '2024-06-01 09:08:13'),
(155, 28, 1, '2024-06-01 09:09:31'),
(156, 28, 2, '2024-06-01 09:09:31'),
(157, 28, 3, '2024-06-01 09:09:31'),
(158, 28, 4, '2024-06-01 09:09:31'),
(159, 28, 5, '2024-06-01 09:09:31'),
(160, 28, 6, '2024-06-01 09:09:31'),
(161, 28, 7, '2024-06-01 09:09:31'),
(162, 29, 1, '2024-06-01 09:10:49'),
(163, 29, 2, '2024-06-01 09:10:49'),
(164, 29, 3, '2024-06-01 09:10:49'),
(165, 29, 4, '2024-06-01 09:10:49'),
(166, 29, 5, '2024-06-01 09:10:49'),
(167, 29, 6, '2024-06-01 09:10:49'),
(168, 29, 7, '2024-06-01 09:10:49'),
(169, 30, 1, '2024-06-01 09:11:47'),
(170, 30, 2, '2024-06-01 09:11:47'),
(171, 30, 3, '2024-06-01 09:11:47'),
(172, 30, 4, '2024-06-01 09:11:47'),
(173, 30, 5, '2024-06-01 09:11:47'),
(174, 30, 6, '2024-06-01 09:11:47'),
(175, 30, 7, '2024-06-01 09:11:47'),
(183, 32, 1, '2024-06-01 09:14:05'),
(184, 32, 2, '2024-06-01 09:14:05'),
(185, 32, 3, '2024-06-01 09:14:05'),
(186, 32, 4, '2024-06-01 09:14:05'),
(187, 32, 5, '2024-06-01 09:14:05'),
(188, 32, 6, '2024-06-01 09:14:05'),
(189, 32, 7, '2024-06-01 09:14:05'),
(190, 33, 1, '2024-06-01 09:16:46'),
(191, 33, 2, '2024-06-01 09:16:46'),
(192, 33, 3, '2024-06-01 09:16:46'),
(193, 33, 4, '2024-06-01 09:16:46'),
(194, 33, 5, '2024-06-01 09:16:46'),
(195, 33, 6, '2024-06-01 09:16:46'),
(196, 33, 7, '2024-06-01 09:16:46'),
(202, 0, 4, '2024-06-03 02:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_design`
--

CREATE TABLE `product_design` (
  `prdct_dsgn_id` int(11) NOT NULL,
  `item_name` varchar(55) NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `item_description` text NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_color` varchar(55) NOT NULL,
  `item_type` varchar(55) NOT NULL,
  `item_brand` varchar(55) NOT NULL,
  `item_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_design`
--

INSERT INTO `product_design` (`prdct_dsgn_id`, `item_name`, `item_price`, `item_description`, `item_qty`, `item_color`, `item_type`, `item_brand`, `item_photo`) VALUES
(13, 'Samba OG Shoes', 6800.00, 'Regular fit, Lace closure, Full grain leather upper with gritty suede and gold foil details, Synthetic leather lining; Gum rubber cupsole, Gum rubber midsole.', 10, 'Cloud White / Core Black / Clear Granite', 'Sneakers', 'Adidas', '2.avif'),
(14, 'Superstar Mule Shoes', 3500.00, 'Regular fit, Slip-on, Adifom construction, Soft feel, Contains a minimum of 20% renewable materials', 10, 'Magic Beige / Magic Beige / Magic Beige', 'Slides', 'Adidas', '3.avif'),
(15, 'Amplimove Trainer Shoes', 3800.00, 'Regular fit, Lace closure, Seamless mesh upper with welded overlays,Textile lining, Zoned TPU support overlays in forefoot and midfoot, Sculpted Vis-Tech EVA midsole, Multidirectional rubber outsole, Contains at least 20% recycled content', 10, 'Core Black / Cloud White / Grey Six', 'Running Shoes', 'Adidas', '4.avif'),
(16, 'Mehana Sandals', 4500.00, 'Regular fit, Buckle closure, Moulded EVA upper, Textile lining, Polyurethane footbed', 10, 'Core Black / Cloud White / Core Black', 'Sandals', 'Adidas', '5.avif'),
(17, 'Bravada 2.0 Platform Mid Shoes', 3500.00, 'Regular fit, Lace closure, Canvas upper, Cloudfoam sockliner, Textile lining, Rubber outsole, Made with Better Cotton', 10, 'Cloud White / Core Black / Cloud White', 'Platform Shoes', 'Adidas', '6.avif'),
(18, 'Adicane Clogs', 2500.00, 'Regular fit, Slip-on construction, Synthetic upper, Synthetic lining, Moulded footbed liner, Bio-based EVA midsole made with 17% plant-based content derived from sugarcane, Synthetic outsole, Minimum of 50% natural and renewable materials', 10, 'Carbon / Carbon / Core Black', 'Clogs', 'Adidas', '7.avif'),
(19, 'Adicane Flip-Flops', 1900.00, 'Regular fit, Classic thong construction, Synthetic upper, Synthetic lining, Moulded footbed, Bio-based EVA midsole made with 17% plant-based content derived from sugarcane, Synthetic outsole, Minimum of 50% natural and renewable materials', 10, 'Sand Strata / Sand Strata / Sand Strata', 'Flip-Flops', 'Adidas', '8.avif'),
(20, 'Predator Elite Laceless Firm Ground Football Boots', 13000.00, 'Regular fit, Laceless construction, HybridTouch 2.0 upper with Strikeskin elements, Textile lining, Controlframe 2.0 firm ground outsole, Contains at least 20% recycled content', 10, 'Team Solar Yellow 2 / Core Black / Solar Red', 'Football Boots', 'Adidas', '9.avif'),
(21, 'AE 1 Velocity Blue Basketball Shoes', 7100.00, 'Regular fit, Textile upper, BOOST midsole, Lightstrike cushioning, Textile lining', 10, 'Lucid Blue / Green / Lucid Blue', 'Sport Shoes', 'Adidas', '10.avif'),
(22, 'Hyperturf Adventure Shoes', 5250.00, 'Regular fit, Lace closure, Nubuck, suede and mesh ripstop upper, FORMOTION, Adiprene+ cushioning, Rubber outsole, 25% of the components used to make the upper are made with a minimum of 50% recycled content', 10, 'Shadow Olive / Magic Beige / Chalky Brown', 'Adventure Shoes', 'Adidas', '11.1.avif'),
(23, 'You Trancoso Premium Sandals', 2149.00, 'Slip on our You Trancoso Premium sandals for sophistication and comfort in one pair. These trendy sandals feature a zigzag print and metallic soles and straps for a shining pair that elevates your style.', 10, 'Crocus Rose, Sand Grey, Steel Gray, Bronze', 'Sandals', 'Havaianas', '12.png'),
(24, 'Stradi', 1449.00, 'Slide into a new design of Havaianas with our Stradi! Combining our classic straps and our Slides, these pairs are comfortable and easy to wear with its slip on style and colorful lineup!', 10, 'Black, Navy Blue, Green, Blue Star, Red Crush, Orange C', 'Slides', 'Havaianas', '14.png'),
(25, 'Top Flip Flops', 999.00, 'Slip on effortless style with the Havaianas Top flip-flops in four shimmery colors. Our signature textured footbed will keep you comfortable from sand to sea and back.', 10, 'Grape Wine', 'Flip-Flops', 'Havaianas', '16.png'),
(26, 'Trend Flip Flops', 999.00, 'Always be on trend with our Trend flip-flops with its mix of color combinations and geometric shapes that works well with any outfit!', 10, 'Navy Blue/Navy Blue/Blue, Ice Grey/Nevoa, Black/Black/S', 'Flip-Flops', 'Havaianas', '17.png'),
(27, 'Luna Sparkle Sandals', 1124.00, 'Shine in style all the way with our Luna Sparkle sandals. These super charming sandals feature glittery braided straps that keep your feet secure and sparkle from front to back!', 10, 'Black, Beige, Crocus Rose', 'Sandals', 'Havaianas', '18.png'),
(28, 'Soleil Sandals', 1299.00, 'The Havaianas Soleil is the perfect sandal: just slip it on, and go! It has a secure backstrap, a square-shaped toe bed, and wavy T-straps.', 10, 'Black, Beige, Caja Yellow, Pink Flux, Crocus Rose', 'Sandals', 'Havaianas', '19.png'),
(29, 'Slides Classic Logomania', 2099.00, 'A must for Havaianaticos! Our Slide Classic Logomania features the Havaianas brand logo paired with solid, striking colors and a cozy sole that you can slip on the go to make any look stand out!', 10, 'Black, Navy Blue', 'Slides', 'Havaianas', '20.png'),
(30, 'Top Mix Flip Flops', 1149.00, 'Mix it up with a multi-color version of a Havaianas classic. The Top Mix flip-flop features our signature textured sole with bi-color contrast straps and a contrast Havaianas logo that will make this your go-to for style and comfort.', 10, 'Black/Black, Steel Grey/Steel Grey', 'Flip-Flops', 'Havaianas', '21.png'),
(32, 'HOVR Infinite 5 Running Shoes', 5025.00, 'Upper Material: Textile, Inner Material: Textile, Sole Material: Rubber, Shoe Width: Medium, Fastening: Laces, Toe Shape: Round', 10, 'Black/White/Green Breeze', 'Running Shoes', 'Under Armor', '22.png'),
(33, 'HOVR Phantom 3 SE Shoes', 5949.00, 'Inner Material: Textile, Upper Material: Textile, Sole Material: Rubber', 10, 'Purple/Metallic Black', 'Running Shoes', 'Under Armor', '27.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `sizes_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`sizes_id`, `size_name`) VALUES
(1, '36'),
(2, '37'),
(3, '38'),
(4, '39'),
(5, '40'),
(6, '41'),
(7, '42');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_status`
--

CREATE TABLE `shipping_status` (
  `shipping_status_id` int(11) NOT NULL,
  `shipping_status_desc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_status`
--

INSERT INTO `shipping_status` (`shipping_status_id`, `shipping_status_desc`) VALUES
(0, 'Cancelled'),
(1, 'Preparing to ship'),
(2, 'Left the warehouse'),
(3, 'Arrived at the sorting facility'),
(4, 'Out for Delivery'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `e_mail` text NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `add_ress` text NOT NULL,
  `birth_day` date NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'U',
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `full_name`, `user_name`, `pass_word`, `e_mail`, `contact_no`, `add_ress`, `birth_day`, `user_type`, `user_status`, `date_registered`) VALUES
(1, 'Adeline Jolie V. Gomez', 'jolieV', '1234jolie', 'adelinejoliegomez@gmail.com', '09673521640', '#46 Uranus Street, Centro Occidental, Polangui, Albay', '2004-07-19', 'A', 'A', '2024-05-31 06:48:26'),
(2, 'Alyssa Gwyn B. Namora', 'juanaG', '1234gwyn', 'juana.gwyn@gmail.com', '09154074462', 'Zone 5, Barangay Tres Maria\'s Drive, Donsol, Sorsogon', '2004-06-24', 'A', 'A', '2024-05-31 06:59:59'),
(3, 'Cheriz Bianca J. Morco', 'cherizB', '1234cheriz', 'probablycherries@gmial.com', '09927993704', 'Saudi St., San Francisco, Guinobatan, Albay', '2004-07-21', 'A', 'A', '2024-05-31 06:59:59'),
(4, 'Christine G. Boringot', 'christineG', '1234christine', 'chrstnganancial@gmail.com', '09773727409', '#0101 Bonto St., San Lorenzo, Tabaco City, Albay', '2004-08-03', 'A', 'A', '2024-05-31 06:59:59'),
(5, 'Mika Ella Mae M. Nuyles', 'mikaE', '1234mika', 'nuylesmikaellamaee@gmail.com', '09159954949', '#083 Purok 3 Poctol, Pilar, Sorsogon', '2003-07-23', 'A', 'A', '2024-05-31 06:59:59'),
(6, 'user1', 'user1', '1234', 'user1@gmail.com', '09123456789', 'user1, philippines', '2001-01-01', 'U', 'A', '2024-05-31 07:02:35'),
(7, 'Alyssa R. Sumalpong', 'alyssaR', '1234uno', 'alyssasumalpong@gmail.com', '09454499583', 'San Agustin, Oas, Albay', '2003-02-15', 'U', 'A', '2024-05-31 07:06:26'),
(8, 'user2', 'user', '123', 'user@user.com', '09123456789', 'bahay', '1001-01-01', 'U', 'A', '2024-06-02 08:33:36'),
(9, 'user', 'user2', '123', 'user2@user.com', '09123456789', 'bahay', '2001-01-01', 'U', 'A', '2024-06-03 02:46:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_design`
--
ALTER TABLE `product_design`
  ADD PRIMARY KEY (`prdct_dsgn_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`sizes_id`);

--
-- Indexes for table `shipping_status`
--
ALTER TABLE `shipping_status`
  ADD PRIMARY KEY (`shipping_status_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `product_design`
--
ALTER TABLE `product_design`
  MODIFY `prdct_dsgn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `sizes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
