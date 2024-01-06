-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2024 lúc 09:29 AM
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
-- Cơ sở dữ liệu: `hk-restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `about_id` int(11) NOT NULL,
  `about_img1` varchar(255) DEFAULT NULL,
  `about_img2` varchar(255) DEFAULT NULL,
  `about_img3` varchar(255) DEFAULT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_detail` text DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`about_id`, `about_img1`, `about_img2`, `about_img3`, `about_title`, `about_detail`, `trang_thai`) VALUES
(1, 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Tiêu đề bài viết', 'Nội dung bài viết', 'Trạng thái'),
(2, 'Screenshot (1).png', 'Screenshot (1).png', 'Screenshot (3).png', 'fggg', 'gggg', NULL),
(3, '', '', '', '', '', NULL),
(4, 'Screenshot (1).png', 'Screenshot (2).png', 'Screenshot (3).png', '6yu', 'tyutyu', NULL),
(5, 'Screenshot (1).png', 'Screenshot (3).png', 'Screenshot (3).png', 't6t6', 'tưeeê', NULL),
(6, 'Screenshot (1).png', 'Screenshot (3).png', 'Screenshot (3).png', 't6t6', 'tưeeê', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`about_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abouts`
--
ALTER TABLE `abouts`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
