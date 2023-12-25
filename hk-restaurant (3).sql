-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2023 lúc 01:13 PM
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
  `ct_id` varchar(10) NOT NULL,
  `ct_name` varchar(50) NOT NULL,
  `ct_email` varchar(100) NOT NULL,
  `ct_numberphone` varchar(15) NOT NULL,
  `ct_problem` varchar(150) NOT NULL,
  `ct_detail` text NOT NULL,
  `ct_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`ct_id`, `ct_name`, `ct_email`, `ct_numberphone`, `ct_problem`, `ct_detail`, `ct_time`) VALUES
('oBy9B', 'Hà Mạnh Kiên', 'nguyenvulam2606@gmail.com', '0967851017', 'Đồ ăn của cửa hàng         ', ' Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI Anh là anh toàn AI ', '2023-12-25 10:35:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(11) NOT NULL,
  `oder_username` varchar(100) NOT NULL,
  `oder_prd` varchar(150) NOT NULL,
  `oder_quantity` int(11) NOT NULL,
  `type_pay` varchar(150) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) NOT NULL,
  `order_total` varchar(15) DEFAULT NULL,
  `order_address` varchar(250) DEFAULT NULL,
  `trang_thai` varchar(150) NOT NULL DEFAULT 'Đơn mới'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `oder_username`, `oder_prd`, `oder_quantity`, `type_pay`, `order_date`, `order_status`, `order_total`, `order_address`, `trang_thai`) VALUES
('Do9vl', 'Kiênpr0123', 'Rượu Nếp', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '50,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đã duyệt'),
('DrqXK', 'Kiênpr0123', 'Rươu vang Chile', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '170,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đã duyệt'),
('FoxlL', 'Kiênpr0123', 'Coca', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '15,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đang vận chuyển'),
('JMrTD', 'Kiênpr0123', 'Bò Bít Tết', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '300,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đang vận chuyển'),
('JxGrx', 'Kiênpr0123', 'Thanh long trắng', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '50,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Giao hàng thành công'),
('kcfUe', 'Kiênpr0123', 'Cam siêu ngọt', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '150,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đơn mới'),
('LrHiN', 'Kiênpr0123', 'Cá chép om dưa', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '400,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Giao hàng thành công'),
('vQTIF', 'Kiênpr0123', 'Dâu Tây', 1, 'Thanh toán khi nhận hàng', '2023-12-25 10:22:03', 'giao hàng nhanh', '50,000.00', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang', 'Đơn mới');

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
('DA01', 'Cá chép om dưa', 'Cá chép om dưa', '400000.00', 20, 'cá chép om dưa.webp', 'Đồ ăn'),
('DA02', 'Bò Bít Tết', 'Bò Bít Tết', '300000.00', 19, 'bò bit tết.jpg', 'Đồ ăn'),
('DA03', 'Bò hầm rau củ', 'Bò hầm rau củ', '200000.00', 68, 'bò hầm rau củ.jpg', 'Đồ ăn'),
('DA04', 'Bún bò Huế', 'Bún bò huế nổi tiếng xứ Huế', '50000.00', 20, 'bun-bo-1.jpg', 'Đồ ăn'),
('DA05', 'Bánh xèo Hà Nội', 'bánh xèo', '75000.00', 20, 'bánh xeo.jpg', 'Đồ ăn'),
('DA06', 'Gà đồi chiên mắm tỏi', 'Gà đồi chiên mắm tỏi', '300000.00', 20, 'gà chiên mắm tỏi.jpg', 'Đồ ăn'),
('DU01', '7 Up', '7up', '15000.00', 20, '7 up.jpg', 'Đồ uống'),
('DU02', 'Coca', 'Coca-Cola (hay còn gọi là Coca, Coke) là một thương hiệu nước ngọt có ga chứa nước cacbon dioxide bão hòa được sản xuất bởi Công ty Coca-Cola. Coca-Cola được điều chế bởi dược sĩ John Pemberton vào cuối thế kỷ XIX với mục đích ban đầu là trở thành một loại biệt dược.', '15000.00', 19, 'cacacola.png', 'Đồ uống'),
('DU03', 'Rượu Nếp', 'Rượu nếp quê là rượu được ủ từ gạo nếp và được chưng cất theo phương pháp gia truyền. Không chỉ là đồ uống, rượu nếp cũng được dùng rất nhiều trong nấu ăn. Đây cũng là loại gia vị có chức năng khử mùi hiệu quả.', '50000.00', 19, 'rượu nếp.png', 'Đồ uống'),
('DU04', 'Rươu vang Chile', 'Rươu vang Chile', '170000.00', 49, 'rượu vang đỏ chile.jpg', 'Đồ uống'),
('DU05', 'Rượu ngô Tây Bắc', 'Rượu ngô Tây Bắc', '60000.00', 49, 'rượu ngô.jpg', 'Đồ uống'),
('DU06', 'Rượu mơ ', 'Rượu mơ -đậm đà từng ly', '75000.00', 50, 'rượu mơ.jpeg', 'Đồ uống'),
('TM01', 'Cam siêu ngọt', 'Cam siêu ngọt', '150000.00', 19, 'cam.jpg', 'Tráng miệng'),
('TM02', 'Dâu Tây', 'quả đỏ, mọng nước, hương thơm mùi kẹo ngọt và có vị ngọt thanh đậm đà, khác với tất cả các loại dâu khác đang được trồng tại Đà Lạt và vùng lân cận hiện nay: Dâu tây nhật Đà Lạt – mê hoặc từ vị ngon! Dâu tây Nhật được xem là giống dâu cao cấp hiện nay được trồng tại Đà Lạt.', '50000.00', 17, 'dâu tây.jpg', 'Tráng miệng'),
('TM03', 'Dưa Hấu', 'đa dạng về hình dạng và màu sắc, thường có màu xanh nhạt và có những đường kẻ từ trên xuống dưới. Hình dạng được xem xét với mặt phẳng cắt ngang từ cuống trái đến đuôi trái dưa. Có các dạng chính sau: dạng thuôn dài, dạng trái oval, dạng trái tròn. Hạt dưa cũng rất đa dạng về kích cỡ (lớn, trung bình, nhỏ).', '45000.00', 20, 'dưa hấu.jpg', 'Tráng miệng'),
('TM04', 'Thanh long trắng', 'Thanh long trắng', '50000.00', 19, 'thanh long.jpg', 'Tráng miệng'),
('TM05', 'Kem dâu', 'Kem dâu -với dâu tây xay nguyên chất 100%', '18000.00', 20, 'kem dâu.jpg', 'Tráng miệng'),
('TM06', 'Dưa leo', 'Dưa leo bổ dọc', '15000.00', 20, 'dưa leo.jpg', 'Tráng miệng');

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
('DA02', 'Bò Bít Tết', 'bò bit tết.jpg', '300000.00'),
('DA03', 'Bò hầm rau củ', 'bò hầm rau củ.jpg', '200000.00'),
('DA04', 'Bún bò Huế', 'bun-bo-1.jpg', '50000.00'),
('DA05', 'Bánh xèo Hà Nội', 'bánh xeo.jpg', '75000.00'),
('DA06', 'Gà đồi chiên mắm tỏi', 'gà chiên mắm tỏi.jpg', '300000.00'),
('DU01', '7 Up', '7 up.jpg', '15000.00'),
('DU02', 'Coca', 'cacacola.png', '15000.00'),
('DU03', 'Rượu Nếp', 'rượu nếp.png', '50000.00'),
('DU04', 'Rươu vang Chile', 'rượu vang đỏ chile.jpg', '170000.00'),
('DU05', 'Rượu ngô Tây Bắc', 'rượu ngô.jpg', '60000.00'),
('DU06', 'Rượu mơ ', 'rượu mơ.jpeg', '75000.00'),
('TM01', 'Cam siêu ngọt', 'cam.jpg', '150000.00'),
('TM02', 'Dâu Tây', 'dâu tây.jpg', '50000.00'),
('TM04', 'Thanh long trắng', 'thanh long.jpg', '50000.00'),
('TM05', 'Kem dâu', 'kem dâu.jpg', '18000.00'),
('TM06', 'Dưa leo', 'dưa leo.jpg', '15000.00');

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
('Kiênpr0123', '2042003K', '0975562225', 'hà manh kiên, 0866539033, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang'),
('manhkien', '2042003K', '0967851017', 'hà manh kiên, 0865544662, Thôn quyền ,ngọc sơn hiệp hòa ,bắc giang'),
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
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `oder_username` (`oder_username`),
  ADD KEY `product_id` (`oder_prd`);

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

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`oder_username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `sp_noibat`
--
ALTER TABLE `sp_noibat`
  ADD CONSTRAINT `sp_noibat_ibfk_1` FOREIGN KEY (`sp_id`) REFERENCES `products` (`prd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
