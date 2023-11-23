-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2023 lúc 07:36 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bosuutap`
--

CREATE TABLE `bosuutap` (
  `id` int(11) NOT NULL,
  `bosuutap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bosuutap`
--

INSERT INTO `bosuutap` (`id`, `bosuutap`) VALUES
(1, 'Tựu Trường'),
(2, 'Mùa Đông'),
(3, 'Thể Thao'),
(4, 'Mùa Xuân'),
(5, 'Japanese Horror Stories');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbosuutap`
--

CREATE TABLE `chitietbosuutap` (
  `id` int(11) NOT NULL,
  `idbosuutap` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbosuutap`
--

INSERT INTO `chitietbosuutap` (`id`, `idbosuutap`, `idsanpham`) VALUES
(2, 3, 3),
(3, 1, 7),
(4, 4, 7),
(5, 4, 9),
(6, 5, 9),
(7, 3, 10),
(8, 4, 10),
(9, 4, 14),
(10, 5, 14),
(16, 3, 21),
(17, 1, 22),
(18, 2, 22),
(19, 3, 22),
(20, 4, 22),
(21, 5, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `iddonhang` int(11) NOT NULL,
  `idchitietsanpham` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `iddonhang`, `idchitietsanpham`, `gia`, `soluong`) VALUES
(1, 1, 55, 120000, 2),
(2, 2, 44, 97000, 20),
(3, 2, 15, 700000, 1),
(4, 2, 45, 97000, 10),
(5, 3, 33, 490000, 1),
(6, 3, 55, 120000, 1),
(9, 6, 57, 299000, 1),
(10, 6, 58, 299000, 1),
(11, 6, 59, 299000, 1),
(12, 6, 60, 299000, 1),
(13, 6, 14, 700000, 1),
(14, 6, 15, 700000, 1),
(15, 6, 17, 700000, 1),
(16, 6, 16, 700000, 1),
(17, 6, 30, 250000, 1),
(18, 6, 31, 250000, 1),
(19, 6, 32, 250000, 1),
(20, 6, 8, 250000, 1),
(21, 6, 9, 250000, 1),
(22, 6, 10, 250000, 1),
(23, 6, 11, 250000, 1),
(24, 6, 12, 250000, 1),
(25, 6, 13, 250000, 1),
(26, 7, 47, 200000, 1),
(27, 7, 48, 200000, 1),
(28, 7, 50, 200000, 1),
(29, 7, 49, 200000, 1),
(30, 8, 64, 900000, 50),
(31, 9, 72, 209000, 10),
(32, 9, 73, 209000, 10),
(33, 10, 79, 309000, 5),
(34, 10, 80, 309000, 5),
(35, 10, 81, 309000, 5),
(36, 10, 82, 309000, 5),
(37, 10, 77, 469000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `id` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `idmausac` int(11) NOT NULL,
  `idkichthuoc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`id`, `idsanpham`, `idmausac`, `idkichthuoc`, `soluong`) VALUES
(5, 2, 11, 2, 12),
(6, 2, 11, 4, 34),
(7, 2, 11, 5, 32),
(8, 3, 1, 2, 29),
(9, 3, 1, 3, 29),
(10, 3, 1, 4, 29),
(11, 3, 8, 2, 29),
(12, 3, 8, 3, 29),
(13, 3, 8, 4, 29),
(14, 4, 12, 2, 33),
(15, 4, 12, 4, 38),
(16, 4, 5, 3, 33),
(17, 4, 5, 4, 33),
(18, 5, 1, 2, 100),
(19, 5, 1, 3, 150),
(20, 5, 1, 4, 100),
(21, 5, 1, 5, 100),
(22, 5, 8, 2, 100),
(23, 5, 8, 3, 100),
(24, 5, 8, 4, 100),
(25, 5, 8, 5, 100),
(26, 5, 13, 2, 100),
(27, 5, 13, 3, 100),
(28, 5, 13, 4, 100),
(29, 5, 13, 5, 100),
(30, 6, 8, 3, 22),
(31, 6, 8, 4, 9),
(32, 6, 8, 5, 14),
(33, 7, 8, 2, 49),
(34, 7, 8, 3, 50),
(35, 7, 8, 4, 50),
(36, 8, 8, 2, 20),
(37, 8, 11, 3, 23),
(38, 8, 8, 4, 30),
(39, 8, 8, 5, 5),
(40, 9, 1, 2, 50),
(41, 9, 1, 3, 50),
(42, 9, 1, 4, 50),
(43, 9, 1, 5, 50),
(44, 10, 10, 2, 0),
(45, 10, 10, 3, 10),
(46, 10, 10, 4, 20),
(47, 11, 8, 3, 11),
(48, 11, 8, 4, 10),
(49, 11, 9, 4, 29),
(50, 11, 9, 3, 20),
(51, 12, 8, 6, 23),
(52, 12, 8, 7, 11),
(53, 12, 10, 6, 5),
(54, 12, 10, 7, 23),
(55, 13, 12, 2, 37),
(56, 13, 13, 3, 20),
(57, 14, 8, 2, 49),
(58, 14, 8, 3, 49),
(59, 14, 8, 4, 49),
(60, 14, 8, 5, 49),
(64, 17, 1, 2, 100),
(65, 18, 8, 2, 150),
(66, 18, 8, 3, 150),
(67, 18, 8, 4, 150),
(72, 20, 8, 2, 90),
(73, 20, 8, 3, 90),
(74, 20, 8, 4, 100),
(75, 20, 8, 5, 100),
(76, 21, 7, 2, 200),
(77, 21, 7, 3, 195),
(78, 21, 7, 4, 200),
(79, 22, 1, 1, 95),
(80, 22, 1, 2, 95),
(81, 22, 1, 3, 95),
(82, 22, 1, 4, 95);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `danhmuc`) VALUES
(1, 'Quần'),
(2, 'Áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idtaikhoan` int(11) DEFAULT NULL,
  `idgiaohang` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `idtaikhoan`, `idgiaohang`, `ghichu`, `tongtien`, `trangthai`, `thoigian`) VALUES
(1, 5, 1, '', 240000, 'hoàn thành', '2023-11-23 08:31:52'),
(2, 1, 2, 'KH MUA', 3610000, 'hoàn thành', '2023-11-23 09:26:42'),
(3, 1, 3, 'hhhhh', 610000, 'hoàn thành', '2023-11-23 09:42:01'),
(6, 2, 6, 'đóng gói che tên', 6246000, 'bị hủy', '2023-11-23 17:02:16'),
(7, 2, 7, 'nếu sđt gọi khong dc thì gọi số 1234567890', 800000, 'chờ xử lý', '2023-11-23 17:03:22'),
(8, -1, 8, 'anh là so 1', 45000000, 'bị hủy', '2023-11-23 17:26:51'),
(9, 2, 9, '', 4180000, 'đang giao hàng', '2023-11-23 17:47:35'),
(10, 2, 10, '101-93 Phan Huy Chú, Hoà Xuân, Thành phố Buôn Ma Thuột, Đắk Lắk', 8525000, 'chờ xử lý', '2023-11-23 18:03:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `idsanpham`, `hinhanh`) VALUES
(6, 2, 'public/assets/img/products/0a89eb11-b59d-4ec4-8015-c306e392280f.png'),
(7, 2, 'public/assets/img/products/aa594dde-2c11-4c56-ac97-63e852baff65.png'),
(8, 3, 'public/assets/img/products/c317518c-08c9-4750-b2d6-6fd5a3d053b1.png'),
(9, 3, 'public/assets/img/products/ac78d763-b706-44ad-9fd1-56ba858c2611.png'),
(10, 3, 'public/assets/img/products/8fd400b9-b109-45ff-8e74-6703817bb021.png'),
(11, 3, 'public/assets/img/products/1d0f6dce-272e-4f97-ac15-67db4eaac406.png'),
(12, 3, 'public/assets/img/products/e38c7bfe-01f0-41d9-8e4c-f90fe84cb29e.png'),
(13, 3, 'public/assets/img/products/f280f281-49a4-4de0-b8b2-471fb21895e9.png'),
(14, 4, 'public/assets/img/products/e1066266-0787-4e63-b323-3c994dd29314.png'),
(15, 4, 'public/assets/img/products/fe4d118e-75b2-4d5b-887f-e3cc28b03f59.png'),
(16, 5, 'public/assets/img/products/8bb99f17-9d17-4522-94f5-dbb9608eb27f.png'),
(17, 5, 'public/assets/img/products/0a9dfb83-daae-40d3-b86b-16326ce2a3fe.png'),
(18, 5, 'public/assets/img/products/a0f2e392-982a-4433-81e6-b23dd75cc60c.png'),
(19, 6, 'public/assets/img/products/e9031d69-48a5-46ac-939e-bf61287a61c7.png'),
(20, 6, 'public/assets/img/products/8360eed1-b3d7-4ee4-ba7e-262e45e5bc63.png'),
(21, 6, 'public/assets/img/products/c5d4e74b-7c25-4600-9900-880652797d38.png'),
(22, 7, 'public/assets/img/products/9a258593-5299-40be-ae43-53567a6a8836.png'),
(23, 7, 'public/assets/img/products/033d377e-ea1c-41d4-bfa5-42579fef771c.png'),
(24, 7, 'public/assets/img/products/9309711c-dfbe-49c6-9fdb-0ab3ea68696d.png'),
(25, 7, 'public/assets/img/products/50e7584b-b7fa-4310-af7e-667dc3877d1c.png'),
(26, 7, 'public/assets/img/products/c86ad193-12b1-43b9-b314-1fc622bc4b82.png'),
(27, 8, 'public/assets/img/products/48f75b9b-96bf-4411-b0e0-e49ac01b29bb.png'),
(28, 8, 'public/assets/img/products/f2db7065-23ea-480a-a80e-97a550e7b269.png'),
(29, 8, 'public/assets/img/products/104d0741-6815-4538-afd1-b77253c05d2a.png'),
(30, 8, 'public/assets/img/products/3170c5fd-0351-4da9-bd0c-0f5fe286d6e9.png'),
(31, 8, 'public/assets/img/products/d6bdcb3b-f7cf-4a90-8343-c80719fd8277.png'),
(32, 9, 'public/assets/img/products/efb388f2-dc8e-440d-a763-a6566cb20d92.png'),
(33, 9, 'public/assets/img/products/d1a24284-7df2-4d86-932a-b9a9e3cb9473.png'),
(34, 9, 'public/assets/img/products/9805cf5b-7a6a-4700-95b3-41ac82597447.png'),
(35, 9, 'public/assets/img/products/f2585dd8-dc83-41d9-a748-3d27e4bbff83.png'),
(36, 10, 'public/assets/img/products/b7143a62-2792-4975-a3ee-d30c7ac34694.png'),
(37, 10, 'public/assets/img/products/bd229d6e-b24f-4311-acad-e710814db32c.png'),
(38, 10, 'public/assets/img/products/418d6c90-f6db-48d9-955b-08d94b1903ca.png'),
(39, 10, 'public/assets/img/products/5d30c53d-15b5-449d-a69a-5660913f03ce.png'),
(40, 10, 'public/assets/img/products/f96bb156-5069-4b2c-bf97-9fbc68d49cf8.png'),
(41, 10, 'public/assets/img/products/e6d9421b-4e0e-47f8-9727-16f8b3b1145f.png'),
(42, 11, 'public/assets/img/products/a44565b7-5a2d-4a15-a65c-6a4050334c88.png'),
(43, 11, 'public/assets/img/products/b0d395e3-430b-4aee-ba87-0c15c6ad1999.png'),
(44, 11, 'public/assets/img/products/02ecf299-ef67-4137-8fae-70abae1d1566.png'),
(45, 11, 'public/assets/img/products/13d88a76-fc88-42f2-96ef-6aa36451231b.png'),
(46, 12, 'public/assets/img/products/3ba0d36b-90ab-4b92-9d9a-e61b2de75b3b.png'),
(47, 12, 'public/assets/img/products/9db6e307-675b-49a3-9b9e-95623241eea5.png'),
(48, 12, 'public/assets/img/products/2ed4d11f-14a5-4aee-af87-0659bd6be266.png'),
(49, 12, 'public/assets/img/products/f5e08304-5627-4690-8773-331b6a5052af.png'),
(50, 13, 'public/assets/img/products/2b3f2827-5a4a-47c2-84aa-2fe10439c37a.png'),
(51, 13, 'public/assets/img/products/f5c96b1e-58ac-49d7-90b2-42ca95816779.png'),
(52, 14, 'public/assets/img/products/cb924525-bfd3-45d1-a3fe-029c4f16a851.png'),
(53, 14, 'public/assets/img/products/765bdd00-e22e-4647-80a6-527abdfca823.png'),
(54, 14, 'public/assets/img/products/5e7131af-72ae-4e84-ae4a-e7f5cc831b65.png'),
(55, 14, 'public/assets/img/products/0d7ef3ec-2bf6-429a-acdf-dfb5e5cc12a8.png'),
(56, 14, 'public/assets/img/products/44454324-e14e-4403-b863-b9b4ebfaa787.png'),
(57, 14, 'public/assets/img/products/a863b615-5403-40ae-892a-6ea7e45ab37e.png'),
(58, 14, 'public/assets/img/products/e008cdca-d08d-45be-9642-a61d78db4353.png'),
(59, 14, 'public/assets/img/products/26751a1d-0f4f-43cc-a2b9-09dcb205df8b.png'),
(60, 14, 'public/assets/img/products/cabb8154-b9f9-4849-a3e4-5a22f93bf657.png'),
(61, 14, 'public/assets/img/products/f4251f5f-fdbd-4963-9838-3523ad5a597a.png'),
(67, 17, 'public/assets/img/products/0a0fe757-7dbb-4ae9-a962-683dc9dbf234.png'),
(68, 17, 'public/assets/img/products/303239be-d78b-433d-950c-6417a7e43682.png'),
(69, 17, 'public/assets/img/products/9cc354e7-59d1-4430-a2c3-651f63f069b5.png'),
(70, 17, 'public/assets/img/products/c4f01700-8490-4138-bdf6-3fbe492384fe.png'),
(71, 17, 'public/assets/img/products/20ac3bd0-3687-4089-b7b8-fbf2fa093f3f.png'),
(72, 17, 'public/assets/img/products/b7b50f14-98eb-4117-b77c-40344730341e.png'),
(73, 18, 'public/assets/img/products/1c32b067-ce23-4e54-a2fa-46d0bc9f9046.png'),
(74, 18, 'public/assets/img/products/de910dfa-5914-42a3-b724-e4b20ef741e4.png'),
(75, 18, 'public/assets/img/products/6fd86d8d-dea1-49af-b810-7b4c8864f581.png'),
(76, 18, 'public/assets/img/products/51ae7019-021f-42e0-9681-12281845d07f.png'),
(81, 20, 'public/assets/img/products/b7d09957-e531-4fd7-a0b1-b9b988cb8a65.png'),
(82, 20, 'public/assets/img/products/d6487863-1bc1-4b1a-8702-adb865daa6b6.png'),
(83, 20, 'public/assets/img/products/ae3943c1-f490-464f-8431-fd07d6c64b2c.png'),
(84, 20, 'public/assets/img/products/274b4956-2de3-4cd4-863d-688e83e21a4a.png'),
(85, 21, 'public/assets/img/products/9a18108b-bac8-4e5f-bd63-35f96fbfce04.png'),
(86, 21, 'public/assets/img/products/63ece351-3844-4ea0-8b7a-616228d071f7.png'),
(87, 21, 'public/assets/img/products/6ef40b85-3dd6-4c6e-be52-77d58370af0c.png'),
(88, 21, 'public/assets/img/products/35c181f2-297b-41c8-bbc1-48fbdf0110e8.png'),
(89, 21, 'public/assets/img/products/3bf6940c-e074-4777-8da1-bb12e9513ca9.png'),
(90, 22, 'public/assets/img/products/83088bd8-0cdd-4142-9384-7aeff99737ae.png'),
(91, 22, 'public/assets/img/products/20d8dea4-b570-4ddb-ba71-b33fc7edcf1c.png'),
(92, 22, 'public/assets/img/products/63b03e72-2eec-4a95-92d4-d54abf804c3d.png'),
(93, 22, 'public/assets/img/products/196c3cd6-3251-4fcb-b2be-10851c9fdb6b.png'),
(94, 22, 'public/assets/img/products/4c250a21-6599-4ec3-a461-2ab010f46189.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichthuoc`
--

CREATE TABLE `kichthuoc` (
  `id` int(11) NOT NULL,
  `kichthuoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `kichthuoc`
--

INSERT INTO `kichthuoc` (`id`, `kichthuoc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, '32'),
(7, '33'),
(8, '34'),
(9, '35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `id` int(11) NOT NULL,
  `mausac` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`id`, `mausac`) VALUES
(1, 'Trắng'),
(2, 'Cam'),
(3, 'Đỏ'),
(4, 'Vàng'),
(5, 'Be'),
(6, 'Camo'),
(7, 'Hồng'),
(8, 'Đen'),
(9, 'Xanh lá'),
(10, 'Xanh dương'),
(11, 'Caro'),
(12, 'Nâu'),
(13, 'Xám'),
(14, 'Kem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `otp`
--

CREATE TABLE `otp` (
  `email` varchar(255) NOT NULL,
  `otp` int(4) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `otp`
--

INSERT INTO `otp` (`email`, `otp`, `thoigian`) VALUES
('camdaica20003@gmail.com', 251128, '2023-11-23 07:06:40'),
('nguyenphatssj0612@gmail.com', 762310, '2023-11-23 07:05:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `gia` int(11) NOT NULL,
  `daban` int(11) NOT NULL DEFAULT 0,
  `iddanhmuc` int(11) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `mota`, `gia`, `daban`, `iddanhmuc`, `thoigian`) VALUES
(2, 'Áo sơ mi tay dài unisex', 'Form: Loose\r\nChất liệu: Cotton', 400000, 0, 2, '2023-11-23 07:18:27'),
(3, 'Quần Short Thun Nam 1 Sọc Thể Thao Tập Gym X9 - X073', 'Bạn là người mặc đồ thể thao nhưng cùng phải thời trang, hiện đại nhưng không quá cầu kỳ thì đây là mẫu quần short thun nam cho bạn', 250000, 0, 1, '2023-11-23 07:24:24'),
(4, 'Áo Khoác Bomber Nam Da Lộn Trơn Dây Kéo Form Regular', 'Áo Khoác Bomber Nam Da Lộn Trơn Dây Kéo Form Regular là mẫu áo khoác bomber trơn đơn giản luôn nhận được sự săn đón của các chàng trai trẻ, yêu thích phong cách cá tính, năng động:\r\nChất liệu Polyester cứng cáp bên ngoài, mềm mại bên trong giữ độ bền, áo luôn trong tình trạng suông thẳng, không bị nhàu khi giặt máy\r\nForm Regular là kiểu dáng đem lại sự thoải mái, dễ dàng hoạt động chân tay, không bị vướng víu, gò bó. \r\n2 màu trung tính nhã nhặn, quý phái, đem lại vẻ lịch sự cho chàng trai mong muốn có diện mạo thanh lịch, gọn gàng\r\nBo chun cổ, tay và phần lai áo mang sự năng động, trẻ trung cho người mặc.\r\nLà kiểu áo đa năng có thể thoải mái mix&match để đi làm, đi chơi hay du lịch đều được.', 700000, 1, 2, '2023-11-23 07:28:04'),
(5, 'Áo POLO unisex phối màu tay lỡ, from rộng thêu logo ngực phong cách thời trang hàn quốc dành cho nam.', 'Áo POLO unisex phối màu tay lỡ, from rộng thêu logo ngực.\r\n\r\nChất Cotton Tổ Ong Dày Dặn Mềm Mại Không bai xù thấm hút mồ hôi tốt\r\n\r\nĐường may chắc chắn tỷ mỉ, thiết kế đơn giản phối màu ở áo tạo điểm nhấn, dễ dàng mix đồ nam nữ đều mặc được', 230000, 0, 2, '2023-11-23 07:29:07'),
(6, 'Quần Jean Nam Trơn Form Skinny', '', 250000, 0, 1, '2023-11-23 07:32:24'),
(7, 'Quần âu nam cao cấp - Q109', 'Quần âu nam cao cấp Santino mới nhất với các ưu điểm vượt trội:\r\n\r\nKhả năng co giãn tuyệt vời giúp người mặc dễ dàng vận động.\r\nThấm hút mồ hôi tốt, thoáng khí giúp cơ thể không bị mùi khó chịu và thoải mái cả ngày.\r\nKhông phai màu sau nhiều lần giặt, bền và sử dụng lâu dài.\r\nChất liệu vải chống nhăn, chống bai xù, mềm mịn và an toàn với làn da.', 490000, 1, 1, '2023-11-23 07:32:55'),
(8, 'Áo Khoác Nam Flannel Tay Dài Khóa Kéo Kẻ Caro Form Regular', 'Áo Khoác Nam Flannel Tay Dài Khóa Kéo Kẻ Caro Form Regular được xem là một trong những mẫu áo nổi bật nhất nằm trong bộ sưu tập thu đông nhà Routine luôn được săn đón mỗi dịp thu đến đông về bởi những điểm thiết kế ấn tượng:\r\n\r\nChất vải flannel được làm từ sợi bông tự nhiên mềm mịn, ấm áp được cào bông hai mặt phá cách\r\nForm áo có độ rộng nhẹ thoải mái cho người mặc, phù hợp mọi vóc dáng\r\nÁo tay dài, cổ khóa tô điểm vẻ lịch sự, thích hợp đi học, đi làm, đi dạo phố, đi ăn uống cùng bạn bè,...\r\nNhững đường kẻ caro độc đáo, đơn giản, nhiều kiểu dáng từ mỏng nhẹ đến caro ô lớn, và thường sử dụng gam màu retro hợp xu hướng.\r\nLà kiểu áo đa năng được sử dụng trong nhiều hoàn cảnh khác nhau và có thể mix&match theo nhiều phong cách khác nhau. ', 640000, 0, 2, '2023-11-23 07:36:28'),
(9, 'Áo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế JHS 39', 'Áo thun cổ tròn tay ngắn, chế tạo từ vải cotton 2 chiều cao cấp, thoáng khí và thấm hút mồ hôi tốt. Biểu tượng thiết kế dáng rộng, tạo sự thoải mái và phóng khoáng. Với màu sắc trẻ trung và chất liệu chất lượng, chiếc áo này là lựa chọn lý tưởng cho phong cách năng động và thoải mái hàng ngày.', 357000, 0, 2, '2023-11-23 07:40:15'),
(10, 'Quần Dài Lưng Thun Ống Ôm Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế Bbuff Ver7', 'Quần dài lưng thun, ôm sát với chất liệu vải dù chống nước, đứng dáng tốt. Thiết kế ống ôm tôn lên vóc dáng, tạo vẻ quyến rũ. Dáng rộng ở phần chân mang đến sự thoải mái và phong cách đương đại. Với biểu tượng dáng rộng, chiếc quần này không chỉ làm nổi bật phong cách mà còn đảm bảo sự thoải mái trong mọi hoạt động. Lựa chọn hoàn hảo cho sự thoải mái và phong cách.', 97000, 30, 1, '2023-11-23 07:47:27'),
(11, 'Áo Sơ Mi Tay Dài Nam Sợi Coffee Trơn Form Fitted', 'Ngày nay, chúng ta không chỉ bắt gặp những chiếc áo sơ mi tay dài trong môi trường công sở như trước đây mà còn có thể thường xuyên nhìn thấy những bộ outfit có sự kết hợp với áo sơ mi trong đời sống thường ngày, các buổi tiệc sang trọng,… Sở dĩ, sơ mi tay dài phổ biến trong thời trang bởi vì khả năng dễ phối đồ, tính linh hoạt phù hợp trong nhiều hoàn cảnh và cuối cùng chính là làm nổi bật được vẻ thanh lịch, chỉn chu và sang trọng cho người mặc\r\n\r\nÁo Sơ Mi Tay Dài Sợi Coffee với thiết kế theo phong cách đơn giản, form áo ôm vừa vặn đủ mang lại sự thoải mái cho người mặc. Đặc biệt chính là chất vải coffee pha nhẹ bền và hấp thụ mùi cơ thể cực tốt. Đây cũng là một trong những chất vải mới bảo vệ môi trường được sử dụng phổ biến gần đây.', 200000, 0, 2, '2023-11-23 07:47:30'),
(12, 'Quần Jean Nam Rách Gối Trơn Form Skinny', 'Quần Jean Nam Rách Gối Trơn Form Skinny luôn có sức hút đặc biệt khi vừa mang tới nét cá tính, vừa vô cùng thời trang và khác biệt. Chiếc quần jeans rách với những đường cắt xẻ sẽ giúp chiếc quần của bạn thêm phần cá tính và khác biệt, tạo nên một outfit vừa cool ngầu vừa mạnh mẽ. Được sử dụng chất vải jeans dày dặn, giữ form chuẩn kết hợp form quần ôm sát từ trên xuống dưới tạo được hiệu ứng thon gọn và giữu form tốt hơn. Ngoài ra, quần jean rách cũng là một item hot hit dễ mặc, dễ phối đồ, nhiều màu wash và kiểu dáng cũng ít bị lỗi thời.\r\n\r\nQua nhiều năm phát triển, quần jean hay còn gọi là quần bò đã trở thành một món đồ rất thông dụng trong tủ quần áo của nam giới. Quần jean trơn sở hữu form dáng trẻ trung, năng động cùng màu sắc basic dễ dàng ứng dụng trong thời trang hàng ngày nhưng vẫn nổi bật được cá tính riêng chính là item được các bạn nam yêu thích hiện nay.', 250000, 0, 1, '2023-11-23 07:52:50'),
(13, 'Áo len Khỉ', '_ Len dày đan mốc , màu như hình , thích hợp mùa xuân đông\r\n-Frssize : <75kg\r\n_- Cám ơn bạn rất nhiều , shopphidieu luôn chào đón và mong sự trở lại mua hàng của bạn trong những lần sau ,, để shop có cơ hội phục vụ bạn tốt hơn nữa .. \r\n_Giao màu ngẫu nhiên nhé ... nhưng vẫn ưu tiẻn cho khách ghi chú màu .. nếu ko có sẽ giao ngẫu nhiên .\r\n\r\n_ Thanks for everything , see you again', 120000, 3, 2, '2023-11-23 07:54:25'),
(14, 'Áo polo GOAT BROS // Black', 'Chất liệu: 100% cotton 2 chiều, định lượng 250 gsm, dày dặn, hầu như không chảy nhão, bo cổ bền bỉ, thấm hút cực tốt và mát mẻ. Giặt máy thoải mái.\r\n\r\n. Hình in: kéo lụa mực Plastisol.\r\n\r\n. Hoạ tiết trên tay áo: thêu.', 299000, 0, 2, '2023-11-23 07:58:55'),
(17, 'áo Mẹ Âu Cơ giữa núi non sâu thẳm', ' mo tảmo tảmo tảmo tảmo tả', 900000, 50, 2, '2023-11-23 17:25:02'),
(18, 'Áo thun Con Rồng tay ngắn // Đen', 'Rồng là sáng tạo của tổ tiên người Việt, những nước khác thấy “xịn” nên đã đem về cải biên và thêm vào văn hoá của mình, mà điển hình ở đây là rồng Trung Hoa. Từ xa xưa, khi người cổ còn chưa biết phải gọi con vật trong truyền thuyết ấy là gì, thì người Việt đã tự xưng mình là con của Rồng rồi. Cùng với văn hoá du mục, cướp bóc và xâm thực mạnh, họ đã dần đồng hoá đến mức thế giới (và cả người Việt) nghĩ rằng rồng là linh vật do tổ tiên họ tạo ra.', 141000, 0, 2, '2023-11-23 17:40:13'),
(20, 'Áo thun Cháu Tiên tay ngắn v.01', 'Vì sự ngạo nghễ của dòng máu nóng vẫn cuồn cuộn trong huyết quản.\r\n\r\nVà vì chúng tôi muốn được cùng tất cả anh em người Việt khắp thế giới khoác lên mình cội nguồn chính xác của dân tộc.', 209000, 0, 2, '2023-11-23 17:43:37'),
(21, 'Jogger Hồng', 'Khả năng bảo vệ khỏi tia UV của vải theo phương pháp thử EN 13758-1:2001 là 115. Chỉ số UPF của vải khi trên 50 có nghĩa là chỉ cho phép 2% số tia UVA và UVB xuyên qua và được gán khả năng bảo vệ Tuyệt Vời. Tuy nhiên chỉ số UPF của vải nỉ Grimm DC đạt đến 115. Gấp đôi mức độ này.', 469000, 0, 1, '2023-11-23 17:58:26'),
(22, 'ÁO HẬU DUỆ NHÀ HỌ NGUYỄN // WHITE', 'Độ bền màu giặt A1S; 40 độ C (cấp): ISO 105-C06:2010 hay còn gọi là Colour fastness to domestic and commercial laundering (Độ bền màu với tẩy gia đình và tẩy thương mại).', 309000, 0, 2, '2023-11-23 18:00:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `sodienthoai` varchar(12) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` int(1) NOT NULL DEFAULT 0,
  `quyen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taikhoan`, `matkhau`, `hoten`, `sodienthoai`, `ngaysinh`, `gioitinh`, `quyen`) VALUES
(1, 'nguyenphatssj0612@gmail.com', '$2y$10$BleWXxpTq4y6Exx5ESkvmOIGtA8oHRAnfReha73ach50vRcmdhJRW', 'Nguyễn Văn Phát', '0382909902', '2003-12-06', 0, 1),
(2, 'camdaica20003@gmail.com', '$2y$10$GS5uRsiy9XFNToGW4Iyq0e6Qtha9nQNEXmqpc5QYXBxWK2KdRSAki', 'Cam Đại Hưng', '0354514832', '2003-09-16', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtingiaohang`
--

CREATE TABLE `thongtingiaohang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtingiaohang`
--

INSERT INTO `thongtingiaohang` (`id`, `hoten`, `sodienthoai`, `diachi`) VALUES
(1, 'hưng', '0332555566', '55'),
(2, 'GAU GAU', '0123456789', '12DFHJ GHKBN STYIK'),
(3, 'GAU GAU', '0123456789', '12DFHJ GHKBN STYIK'),
(5, 'cam dai hung', '0354514832', 'sdsafafs'),
(6, 'Cam Đại Hưng', '0354514832', '66 lê hồng phong quận 7 TP HCM'),
(7, 'Cam Đại Hưng', '0354514832', '66 lê hồng phong quận 7 TP HCM'),
(8, 'Cam Đại Hưng', '0354514832', '66 lê hồng phong quận 7 TP HCM'),
(9, 'Cam Đại Hưng', '0354514832', 'Số 989 Đường 2-9, Phường 11, Thành phố Vũng Tầu, Bà Rịa - Vũng Tàu\\'),
(10, 'Cam Đại Hưng', '0354514832', 'Số 989 Đường 2-9, Phường 11, Thành phố Vũng Tầu, Bà Rịa - Vũng Tàu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bosuutap`
--
ALTER TABLE `bosuutap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietbosuutap`
--
ALTER TABLE `chitietbosuutap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbosuutap` (`idbosuutap`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idchitietsanpham` (`idchitietsanpham`),
  ADD KEY `iddonhang` (`iddonhang`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsanpham` (`idsanpham`),
  ADD KEY `idkichthuoc` (`idkichthuoc`),
  ADD KEY `idmausac` (`idmausac`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgiaohang` (`idgiaohang`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtingiaohang`
--
ALTER TABLE `thongtingiaohang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bosuutap`
--
ALTER TABLE `bosuutap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chitietbosuutap`
--
ALTER TABLE `chitietbosuutap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongtingiaohang`
--
ALTER TABLE `thongtingiaohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietbosuutap`
--
ALTER TABLE `chitietbosuutap`
  ADD CONSTRAINT `chitietbosuutap_ibfk_1` FOREIGN KEY (`idbosuutap`) REFERENCES `bosuutap` (`id`),
  ADD CONSTRAINT `chitietbosuutap_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idchitietsanpham`) REFERENCES `chitietsanpham` (`id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`idkichthuoc`) REFERENCES `kichthuoc` (`id`),
  ADD CONSTRAINT `chitietsanpham_ibfk_3` FOREIGN KEY (`idmausac`) REFERENCES `mausac` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idgiaohang`) REFERENCES `thongtingiaohang` (`id`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddanhmuc`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
