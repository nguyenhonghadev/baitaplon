-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 07:05 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

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
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `numberphone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `numberphone`) VALUES
('admin', 'admin@123', '0967851017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(50) NOT NULL,
  `ct_email` varchar(100) NOT NULL,
  `ct_numberphone` varchar(15) NOT NULL,
  `ct_problem` varchar(150) NOT NULL,
  `ct_detail` text NOT NULL,
  `ct_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prd_id` varchar(15) NOT NULL,
  `prd_name` varchar(150) NOT NULL,
  `prd_detail` text NOT NULL,
  `prd_price` decimal(15,2) NOT NULL,
  `prd_quantity` int(11) NOT NULL,
  `prd_img` varchar(200) DEFAULT NULL,
  `prd_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `prd_detail`, `prd_price`, `prd_quantity`, `prd_img`, `prd_category`) VALUES
('DA01', 'Cá chép om dưa', 'Cá chép om dưa là một món ăn truyền thống của nền ẩm thực Việt Nam, thể hiện sự tinh tế trong cách kết hợp giữa cá chép tươi ngon và hương vị đặc trưng của rau củ và dưa tươi. Món ăn này đem đến hương vị đậm đà, ngọt ngon và độc đáo. Cá chép được nấu chín mềm, hòa quyện với nước dùng ngọt ngon, cùng với các loại rau sống tươi ngon và dưa tươi tạo nên một sự pha trộn hài hòa về vị ngon và hương thơm. Mỗi nguyệt cầm khi nhấm nháp, bạn sẽ cảm nhận được sự hài hòa, cân đối và đậm đà trong mỗi miếng ăn. Cá chép om dưa không chỉ là một món ăn ngon miệng mà còn là biểu tượng của sự hòa quyện, gắn kết trong bữa ăn gia đình và là điểm nhấn đặc biệt trong bất kỳ dịp lễ, hội tụ gia đình.', '400000.00', 10, 'cá chép om dưa.webp', 'Đồ ăn'),
('DA02', 'Bò Bít Tết', 'Bò Bít Tết', '300000.00', 10, 'bò bit tết.jpg', 'Đồ ăn'),
('DA03', 'Bò hầm rau củ', 'Bò hầm rau củ', '200000.00', 10, 'bò hầm rau củ.jpg', 'Đồ ăn'),
('DU01', '7 Up', '7up', '15000.00', 10, '7 up.jpg', 'Đồ uống'),
('DU02', 'Coca', 'Coca-Cola (hay còn gọi là Coca, Coke) là một thương hiệu nước ngọt có ga chứa nước cacbon dioxide bão hòa được sản xuất bởi Công ty Coca-Cola. Coca-Cola được điều chế bởi dược sĩ John Pemberton vào cuối thế kỷ XIX với mục đích ban đầu là trở thành một loại biệt dược.', '15000.00', 10, 'cacacola.png', 'Đồ uống'),
('DU03', 'Rượu Nếp', 'Rượu nếp quê là rượu được ủ từ gạo nếp và được chưng cất theo phương pháp gia truyền. Không chỉ là đồ uống, rượu nếp cũng được dùng rất nhiều trong nấu ăn. Đây cũng là loại gia vị có chức năng khử mùi hiệu quả.', '50000.00', 20, 'rượu nếp.png', 'Đồ uống'),
('TM01', 'Cam siêu ngọt', 'Cam siêu ngọt', '150000.00', 20, 'cam.jpg', 'Tráng miệng'),
('TM02', 'Dâu Tây', 'quả đỏ, mọng nước, hương thơm mùi kẹo ngọt và có vị ngọt thanh đậm đà, khác với tất cả các loại dâu khác đang được trồng tại Đà Lạt và vùng lân cận hiện nay: Dâu tây nhật Đà Lạt – mê hoặc từ vị ngon! Dâu tây Nhật được xem là giống dâu cao cấp hiện nay được trồng tại Đà Lạt.', '50000.00', 20, 'dâu tây.jpg', 'Tráng miệng'),
('TM03', 'Dưa Hấu', 'đa dạng về hình dạng và màu sắc, thường có màu xanh nhạt và có những đường kẻ từ trên xuống dưới. Hình dạng được xem xét với mặt phẳng cắt ngang từ cuống trái đến đuôi trái dưa. Có các dạng chính sau: dạng thuôn dài, dạng trái oval, dạng trái tròn. Hạt dưa cũng rất đa dạng về kích cỡ (lớn, trung bình, nhỏ).', '45000.00', 10, 'dưa hấu.jpg', 'Tráng miệng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_noibat`
--

CREATE TABLE `sp_noibat` (
  `sp_id` varchar(15) NOT NULL,
  `sp_name` varchar(150) NOT NULL,
  `sp_image` varchar(200) NOT NULL,
  `sp_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_noibat`
--

INSERT INTO `sp_noibat` (`sp_id`, `sp_name`, `sp_image`, `sp_price`) VALUES
('DA01', 'Cá chép om dưa', 'cá chép om dưa.webp', '400000.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `numberphone` varchar(15) NOT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `numberphone`, `address`) VALUES
('manhkien', '2042003Kien', '0967851017', 'Bắc Giang'),
('manhkien1', '2042003K', '0967851017', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ct_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `sp_noibat`
--
ALTER TABLE `sp_noibat`
  ADD PRIMARY KEY (`sp_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
