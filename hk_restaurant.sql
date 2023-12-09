-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2023 lúc 02:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hk_restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Đồ  ăn'),
(2, 'Đồ Uống'),
(3, 'Tráng Miệng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giacu` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanphamhot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanphamimage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_gia`, `sanpham_giacu`, `sanpham_active`, `sanphamhot`, `sanpham_soluong`, `sanphamimage`) VALUES
(1, 1, 'Cá Chép Om Dưa', '400000', '420000', 1, 0, 20, 'RIFF??\0WEBPVP8 ??\0???*N;>?>?J%??-?P\n?	cnLN'),
(2, 3, 'Hoa Quả Tổng Hợp', '100000', '120000', 1, 0, 0, 'hoa quả tổng hợ'),
(3, 2, '7 Up', '15000', '20000', 1, 0, 0, '7 up'),
(4, 1, 'Bánh Xèo', '30000', '25000', 1, 0, 20, 'banhxeo.png'),
(5, 1, 'Cá Chép Om Dưa', '400000', '420000', 1, 0, 0, 'lợn quay'),
(6, 1, 'Bò Hầm Rau Củ', '400000', '420000', 1, 0, 0, 'bò hầm rau củ'),
(7, 1, 'Bún Bò', '400000', '420000', 1, 0, 0, 'bun-bo-1'),
(8, 2, 'Bia Hà Nội', '15000', '20000', 1, 0, 0, 'bia hà nội'),
(9, 2, 'Pepsi', '15000', '20000', 1, 0, 0, 'pepsi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
