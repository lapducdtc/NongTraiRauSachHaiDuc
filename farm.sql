-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 04:12 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `cat_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cat_mota` char(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucsp`
--

INSERT INTO `danhmucsp` (`cat_id`, `cat_name`, `cat_mota`) VALUES
('R1', 'Rau Ăn Lá', ''),
('R2', 'Rau Ăn Thân Hoa', ''),
('R3', 'Rau Ăn Qủa/Hạt', ''),
('R4', 'Rau Ăn Củ', ''),
('R5', 'Rau Gia Vị', '');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(10) NOT NULL,
  `sp_id` int(10) NOT NULL,
  `url` char(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `sp_id`, `url`) VALUES
(1, 1, 'bi ngon.jpg'),
(2, 2, 'chum ngay.jpg'),
(3, 3, 'mung toi.jpg'),
(4, 4, 'bap cai.jpg'),
(5, 5, 'cai xoong.jpg'),
(6, 6, 'cai be xanh.jpg'),
(7, 7, 'cai thao.jpg'),
(8, 8, 'rau day.jpg'),
(9, 9, 'rau den.jpg'),
(10, 10, 'hoa thien ly.jpg'),
(11, 11, 'mang bat bo.jpg'),
(12, 12, 'mang tay.jpg'),
(13, 13, 'su hao.jpg'),
(14, 14, 'sup lo.jpg'),
(15, 15, 'bau.jpg'),
(16, 16, 'bi co tien.jpg'),
(17, 17, 'bi ngo.jpg'),
(18, 18, 'ca bat.jpg'),
(19, 19, 'ca chua.jpg'),
(20, 20, 'cu cai.jpg'),
(21, 21, 'ca rot.jpg'),
(22, 22, 'khoai mon.jpg'),
(23, 23, 'khoai so.jpg'),
(24, 24, 'khoai ray.jpg'),
(25, 25, 'gieng.jpg'),
(26, 26, 'gung.jpg'),
(27, 27, 'hanh hoa.jpg'),
(28, 28, 'hanh cu.jpg'),
(29, 29, 'sa.jpg'),
(30, 30, 'Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `con_id` int(10) NOT NULL,
  `con_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_phone` int(12) NOT NULL,
  `con_content` char(254) COLLATE utf8_unicode_ci NOT NULL,
  `con_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) NOT NULL,
  `con_title` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_address` char(254) COLLATE utf8_unicode_ci NOT NULL,
  `con_live` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` int(10) NOT NULL,
  `cat_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `sp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sp_gia` int(50) NOT NULL,
  `sp_mota` char(254) COLLATE utf8_unicode_ci NOT NULL,
  `sp_trangthai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `cat_id`, `user_id`, `sp_name`, `sp_gia`, `sp_mota`, `sp_trangthai`) VALUES
(1, 'R1', 1, 'Bí ngọn', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(2, 'R1', 1, 'Chùm Ngây', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(3, 'R1', 1, 'Mùng tơi', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(4, 'R2', 1, 'Bắp cải', 15000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(5, 'R1', 1, 'Cải xoong', 8000, 'SELECT * FROM `sanpham` WHERE `sp_name` LIKE "%bí%"', 1),
(6, 'R1', 1, 'Cải bẹ xanh', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(7, 'R2', 1, 'Cải thảo', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(8, 'R1', 1, 'Rau đay', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(9, 'R1', 1, 'Rau dền', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(10, 'R2', 1, 'Hoa thiên lý', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(11, 'R2', 1, 'Măng bát bộ', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(12, 'R2', 1, 'Măng tây', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(13, 'R2', 1, 'Su hào', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(14, 'R2', 1, 'Súp lơ', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(15, 'R3', 1, 'Bầu', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(16, 'R3', 1, 'Bí cô tiên', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(17, 'R3', 1, 'Bí ngô', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(18, 'R3', 1, 'Cà bát', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(19, 'R3', 1, 'Cà chua', 10000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(20, 'R4', 1, 'Củ cải', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(21, 'R4', 1, 'Cà rôt', 12000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(22, 'R4', 1, 'Khoai môn', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(23, 'R4', 1, 'Khoai sọ', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(24, 'R4', 1, 'Khoai tây', 20000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(25, 'R5', 1, 'Giềng', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(26, 'R5', 1, 'Gừng', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(27, 'R5', 1, 'Hành hoa', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(28, 'R5', 1, 'Hành củ', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1),
(29, 'R5', 1, 'Củ sả', 5000, 'sản phẩm được trồng trong nhà kính đảm bảo tiêu chuẩn VietGap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(254) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(2) NOT NULL,
  `age` int(3) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `phone`, `fullname`, `address`, `email`, `sex`, `age`, `level`) VALUES
(1, 'admin', 'YWRtaW4=', 1646449533, 'nguyen lap duc', 'ha nam', 'lapducdtc@gmail.com', 1, 23, 1),
(7, 'quantrivien', 'MTIzMTIz', 1234567890, 'quan tri vien', 'thai nguyen', 'quantrivien@gmail.com', 1, 23, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
