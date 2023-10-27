-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 06:36 PM
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
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`taikhoan`, `matkhau`, `hoten`) VALUES
('admin', '12345678', 'Nguyễn Văn Phát');

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
(1, 'Trang phục mùa xuân'),
(2, 'Trang phục mùa hè'),
(3, 'Trang phục mùa thu'),
(4, 'Trang phục mùa đông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbosuutap`
--

CREATE TABLE `chitietbosuutap` (
  `id` int(11) NOT NULL,
  `idbosuutap` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(2, 2, 9, 32000, 7),
(14, 14, 2, 190000, 7),
(15, 15, 3, 190000, 12),
(16, 16, 4, 90000, 12),
(17, 17, 13, 367000, 5);

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
(1, 1, 8, 3, 1260),
(2, 1, 8, 5, 1193),
(3, 1, 8, 6, 114),
(4, 2, 8, 4, 111),
(5, 2, 8, 5, 8000),
(6, 2, 8, 6, 1263),
(7, 3, 9, 3, 1232),
(8, 3, 10, 5, 450),
(9, 3, 11, 5, 671),
(10, 4, 11, 4, 127),
(11, 4, 10, 5, 459),
(12, 4, 12, 5, 34),
(13, 5, 13, 3, 555),
(14, 5, 13, 4, 600),
(15, 5, 13, 6, 226),
(16, 6, 4, 5, 498),
(17, 6, 10, 5, 1544),
(18, 6, 11, 4, 349),
(19, 7, 10, 3, 560),
(20, 7, 13, 4, 600),
(21, 7, 13, 5, 226),
(22, 8, 10, 3, 560),
(23, 8, 13, 4, 600),
(24, 8, 13, 5, 226),
(25, 9, 10, 4, 498),
(26, 9, 10, 5, 144),
(27, 9, 10, 6, 349),
(28, 9, 11, 4, 498),
(29, 9, 11, 5, 154),
(30, 9, 11, 6, 349),
(31, 10, 9, 3, 560),
(32, 10, 9, 4, 600),
(33, 10, 9, 5, 226),
(34, 11, 10, 5, 467),
(35, 11, 11, 5, 300),
(36, 12, 10, 3, 560),
(37, 12, 10, 4, 600),
(38, 12, 10, 5, 226),
(39, 13, 1, 1, 467),
(40, 13, 10, 1, 300),
(41, 13, 11, 1, 987),
(42, 14, 9, 3, 560),
(43, 14, 9, 4, 600),
(44, 14, 9, 5, 226),
(45, 15, 10, 4, 44),
(46, 15, 10, 5, 67),
(47, 15, 9, 4, 45),
(48, 15, 9, 5, 50),
(49, 16, 10, 3, 560),
(50, 16, 10, 4, 600),
(51, 16, 10, 5, 226),
(52, 17, 9, 3, 560),
(53, 17, 9, 4, 600),
(54, 17, 9, 5, 226),
(55, 18, 12, 3, 560),
(56, 18, 12, 4, 600),
(57, 18, 12, 5, 226);

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
(1, 'Áo'),
(2, 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idkhachhang` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `idkhachhang`, `ghichu`, `tongtien`, `trangthai`, `thoigian`) VALUES
(2, 2, 'giao nhanh len', 1200000, 'Thành Công', '2023-09-15 15:05:53'),
(14, 14, 'giao nhanh len', 1000000, 'Chờ xử lý', '2023-10-20 15:59:18'),
(15, 15, 'giao nhanh len', 1000000, 'Chờ xử lý', '2023-10-25 16:02:40'),
(16, 16, 'giao nhanh len', 2500000, 'Chờ xử lý', '2023-10-25 16:03:47'),
(17, 17, 'giao nhanh len', 2000000, 'Chờ xử lý', '2023-10-25 16:05:38');

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
(1, 1, 'public/assets/img/products/cda8b8c8-21d9-4a35-a42b-bdb253053795.png'),
(2, 1, 'public/assets/img/products/b3ca7b9a-9d81-4020-8a37-e183ea02cd6c.png'),
(3, 1, 'public/assets/img/products/d8ea4b25-d822-4aa7-b246-7ee0e82d63aa.png'),
(4, 1, 'public/assets/img/products/d981742b-40b3-4401-914a-34b281eb5bf0.png'),
(5, 2, 'public/assets/img/products/5bcb006a-e8d9-4495-b365-341067cacc99.png'),
(6, 2, 'public/assets/img/products/45466af4-3d2e-4229-991c-29db7c7d6e3a.png'),
(7, 2, 'public/assets/img/products/5168d7b5-afb8-418e-8f64-ffe0085e4ea6.png'),
(8, 2, 'public/assets/img/products/d994b5ac-d369-41a1-be1c-ccd74533a1c8.png'),
(9, 3, 'public/assets/img/products/a9bd6184-295e-434b-8fde-e1107be3c2f9.png'),
(10, 3, 'public/assets/img/products/f610aa81-64f7-4ffd-80e7-eba2756a2517.png'),
(11, 3, 'public/assets/img/products/9e0c8338-e03a-4c65-a35a-c4a5a0fa444d.png'),
(12, 3, 'public/assets/img/products/2b705834-4a94-4687-9b11-c53fc5d97fd1.png'),
(13, 4, 'public/assets/img/products/a3e3453c-9133-414e-bba4-2191a37d8744.png'),
(14, 4, 'public/assets/img/products/429f6589-eb49-41ac-aee6-1a6d6694d941.png'),
(15, 4, 'public/assets/img/products/5121433f-1801-4256-b572-dfe70353cdb4.png'),
(16, 4, 'public/assets/img/products/4537014e-6296-44f0-bcd2-f356e5a2de02.png'),
(17, 5, 'public/assets/img/products/eeeb5e19-e775-4166-9a89-d734e8df4586.png'),
(18, 5, 'public/assets/img/products/be1bee8a-4498-4d4e-8a50-fd1662bddb70.png'),
(19, 6, 'public/assets/img/products/2d8c310a-9f03-4163-b8c4-320dc23c4e30.png'),
(20, 6, 'public/assets/img/products/37ab5111-6976-4324-b960-3609d2afe923.png'),
(21, 6, 'public/assets/img/products/d9c8ca8a-494f-4d47-b694-b3f837222bc1.png'),
(22, 7, 'public/assets/img/products/ca7f4b49-bb59-4f85-9523-8287c2b6fdad.png'),
(23, 7, 'public/assets/img/products/e0d9e82e-f6b8-4193-8cf9-d05f3d6691eb.png'),
(24, 8, 'public/assets/img/products/67469705-fd3b-4724-8f48-247c073cc319.png'),
(25, 8, 'public/assets/img/products/6496c25e-d096-42cc-88c8-852519b0eb73.png'),
(26, 9, 'public/assets/img/products/cb5e07a0-e6f3-41b4-95b3-bc7491ea1c0f.png'),
(27, 9, 'public/assets/img/products/5614ca56-1a80-4431-8984-0aac5892e35e.png'),
(28, 10, 'public/assets/img/products/2a096e68-1dbe-41bf-860a-10fe7c282bf7.png'),
(29, 10, 'public/assets/img/products/35d8ce69-1498-4ae0-a09c-94cfa825b986.png'),
(30, 11, 'public/assets/img/products/e9e54602-040f-4dbd-b43b-a49833dce5e1.png'),
(31, 11, 'public/assets/img/products/bd7e89f9-0a2b-47ba-b4ed-12cb4a971420.png'),
(32, 11, 'public/assets/img/products/c4669383-54b0-4401-b49b-090ab894cd16.png'),
(33, 12, 'public/assets/img/products/4275bcef-2812-47f1-a912-f4c2b9b3963d.png'),
(34, 12, 'public/assets/img/products/a635feb3-9cbd-4b57-9caa-96661c8da237.png'),
(35, 13, 'public/assets/img/products/f6dec09e-8ac0-4e25-9181-283903d725b0.png'),
(36, 13, 'public/assets/img/products/6cf417d8-2ff4-4906-b80a-5932304efe80.png'),
(37, 13, 'public/assets/img/products/384c79be-17aa-4a0e-a45c-a86f7eccb192.png'),
(38, 14, 'public/assets/img/products/00b4a8ca-fffd-4b3f-a0d4-78975d5916ef.png'),
(39, 14, 'public/assets/img/products/4e3125a3-a6e1-40e9-8db5-15b0be7136dd.png'),
(40, 15, 'public/assets/img/products/f5f9ebf7-1738-4d28-b425-06deec9f1977.png'),
(41, 15, 'public/assets/img/products/30ac9576-5e80-4e6d-908c-b818af4e8aa8.png'),
(42, 16, 'public/assets/img/products/af7bd19e-7795-43cc-977a-c11f901f61aa.png'),
(43, 16, 'public/assets/img/products/27f608e8-cb10-4185-8710-ef7c06aec64f.png'),
(44, 17, 'public/assets/img/products/6d9244f9-348e-404a-bfb5-fbdcfc8fe52e.png'),
(45, 17, 'public/assets/img/products/b93d0e75-4143-40ca-88a8-bbef6f1113a8.png'),
(46, 18, 'public/assets/img/products/cb10cd29-e48b-4c13-8f2c-e5143a17b338.png'),
(47, 18, 'public/assets/img/products/c18ab8b4-1c86-4687-a4ce-78a036fb9071.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `hoten`, `sodienthoai`, `diachi`, `email`) VALUES
(2, 'Nguyễn Văn Phát', '0123456789', 'an hoa can tho', 'nguyenphatssj0612@gmail.com'),
(14, 'minhluan', '0335226656', 'an hoa can tho', 'nguyenphatssjs0612@gmail.com'),
(15, 'minhluan123', '0917916496', 'an hoa can tho', 'nguyenphatssjs0612@gmail.com'),
(16, 'minhluan123', '0917916496', 'an hoa can tho', 'nguyenphatssjs0612@gmail.com'),
(17, 'minhluan123', '0917916496', 'an hoa can tho', 'nguyenphatssjs0612@gmail.com');

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
(1, 'Oversize'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '3XL');

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
(1, 'Đỏ'),
(2, 'Cam'),
(3, 'Vàng'),
(4, 'Lục'),
(5, 'Lam'),
(6, 'Chàm'),
(7, 'Tím'),
(8, 'Không'),
(9, 'Xám'),
(10, 'Đen'),
(11, 'Trắng'),
(12, 'Be'),
(13, 'camo');

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
(1, 'Áo Thun Thi Đấu T1 CKTG 2023-MSI 2023-LCK 2023-LCK 2022-CKTG 2022 FULL LOGO Bởi QUR STUDIO[In Tên-Ghi Chú Tên Vào Đơn ]', 'ĐẶT ÁO TẶNG NGAY BỘ CARD T1 30 LÁ- TRỊ GIÁ 69K\n[IN TÊN-GHI CHÚ VÀO ĐƠN]\nÁO THUN THỂ THAO T1 LCK 2023 - CKTG 2022 - LCK 2022 BỞI QUR STUDIO\nMô Tả Sản Phẩm:\n- Chất Liệu: Thun Lạnh Thể Thao, Thấm Hút Mồ Hôi Tốt, Độ Co Giãn Cực Tốt\n- Màu Sắc: Đen, Đen Đỏ, Đen Trắng\n- Điểm Đặc Biệt: Họa Tiết In Chìm\n- Khối Lượng: 100g\n- Năm Sản Xuất: 2023.\n-----------------------------------------------------\nBảng size tham khảo Áo Thun \nM: 1m55 – 1m65 | 55 – 62kg\nL: 1m65 – 1m70 | 62 – 70kg\nXL: 1m70 – 1m76 | 70 – 76kg\nXXL: 1m76 – 1m82 | 76– 82kg\n------------------------------------------------------\n', 190000, 0, 1, '2023-10-25 13:03:40'),
(2, 'Áo Thun In Hình GAM Esports Worlds 2022 Jersey 3D', 'Kích thước: XXS / XS / S / M / L / XL / XXL / XXXL / 4XL / 5XL / 6XL\nĐám đông: Nam, Nữ, Nam\nThoáng khí, khô nhanh\n\nBảng kích thước\nXxs: Vai: 38cm, Ngực: 41cm, Dài: 61cm, Dài tay: 19cm\nXs: Vai: 40cm, Ngực: 44cm, Dài: 63cm, Dài tay: 20,5cm \nS: Vai: 42cm, Ngực: 47cm, Dài: 65cm, Dài tay: 22cm \nM: Vai: 44cm, Ngực: 50cm, Dài: 68cm, Dài tay: 23,5cm \nL: Vai: 46cm, Ngực: 53cm, Dài: 71cm, Dài tay: 25cm \nXl: Vai: 48cm, Ngực: 56cm, Dài: 74cm, Dài tay: 26,5cm \nXxl: Vai: 50cm, Ngực: 59cm, Dài: 77cm, Dài tay: 28cm \n3xl: Vai: 52cm, Ngực: 62cm, Dài: 79cm, Dài tay: 29,5cm \n4xl: Vai: 54cm, Ngực: 65cm, Dài: 81cm, Dài tay: 31cm \n5xl: Vai: 56cm, Ngực: 68cm, Dài: 84cm, Dài tay: 32,5cm \n6xl: Vai: 58cm, Ngực: 71cm, Dài: 87cm, Dài tay: 34cm\n\nCác bạn thân mến, cảm ơn các bạn đã ủng hộ. Do đo lường thủ công, kích thước sẽ thay đổi 1-3 cm. Cảm ơn bạn đã thông cảm! Chúc bạn sống hạnh phúc!', 90000, 0, 1, '2023-10-25 13:17:44'),
(3, 'Áo Thun Lạnh co giãn 4 Chiều, Áo Thể Thao Nam ép vân [40-100kg] Có Video, Dvin_fashion', 'CÁC ANH HAY THAN THỞ LÀ ĐỒ NỮ  THÌ NHIỀU MẪU MÃ  ĐẸP , MÀ ĐỒ NAM  THÌ QUANH ĐI QUẨN LẠI CŨNG VÀI BA MẪU ,NHƯNG KHÔNG PHẢI ĐÂU Ạ. ĐỒ NAM CŨNG NHIỀU KIỂU LẮM VÀ CHỈ CẦN BIẾN TẤU MỘT CHÚT LÀ MÌNH ĐÃ CÓ NGAY BỘ ĐỒ ???????? THẬT CHẤT VÀ LỊCH LÃM ĐẤY Ạ !\n\n✔️THÔNG TIN SẢN PHẨM \n -Áo thun nam dập vân được Làm bằng vải thun lạnh cao cấp nhằm tạo cảm giác thoáng mát tối đa. Ngoài ra, vải co giãn 4 chiều, giúp người mặc có cảm giác tự do vận động, thư giãn\n - Chất vải hàng xuất khẩu nên khách hàng yên tâm\n - Đảm bảo không bong tróc, không bị phai màu\n - Họa tiết dập vân chìm cực đẹp, phù hợp cho mọi lứa tuổi.\n - có logo, logo in tùy theo đợt(nike,adidas,sports, aribar,...)\n - Siêu thoáng mát.\n - Vải nhẹ, khô thoáng, có độ dày vừa phải và khả năng thấm hút tốt.\n - Áo thun nam thể thao với kiểu dáng trẻ trung , tỉ mỉ trên từng chi tiết & đường may.\n - Shop đảm bảo Áo Thun Nam Thể Thao chất vải không nhăn, không xù lông, không phai màu, trơn basic cực kì đẹp.\n\n✔️CAM KẾT CỦA SHOP\n  - Cam kết chất lượng và mẫu mã sản phẩm giống với hình ảnh và video. HÌNH SAO HÀNG VẬY!!!\n  - Hỗ trợ đổi hàng trong vòng 7 ngày khi không vừa size hoặc sản phẩm bị lỗi.\n  - Luôn tư vấn nhiệt tình, giải đáp mọi thắc mắc của khách hàng.\n\n✔️THÔNG TIN SIZE\n   +Size : 40-52kg\n   +Size : 53-60kg\n   +Size : 61-70kg\n   +Size : 71-77kg\n   +Size : 78-85kg\n   +Size :86-100kg\n\n#aothunnamthethao #ao_thun_nam_thể_thao #aothunnamcotron #aothunnamthethao #aothunlanh #aothunthethaonam #aothunnamdep #aothunnamgiare #aothunnam #aothunnamthethaocotron #ao+thun+nam+the+thao #aothuncotronnam#aothunnam #aothunnamdep #ao #nam #quanaothethao #aothun #thun #satnach #balo #gugostar #shoppeemenclub #áothunnam #áothun #áophôngnam #áothunnamđẹp #áothuncổtròn #áothunnamcổtròn #áothểthaonam  \n\nCẢM ƠN  BẠN ĐÃ TIN TƯỞNG  CHÚNG TÔI, THỂ HIỆN NIỀM TIN VÀO CHÚNG TÔI VÀ CHO CHÚNG TÔI BIẾT RẰNG BẠN SẼ THEO DÕI VÀ ĐỒNG HÀNH CÙNG SHOP', 32000, 0, 1, '2023-10-25 13:24:29'),
(4, 'Áo polo nam thể thao chất vải thun cá sấu phối sọc viền tay cổ Everest', 'Thông tin sản phẩm:\n\n - Chất liệu: Vải thun cá sấu cao cấp, 4 chiều co dãn mềm mại, thấm hút mồ hôi tốt, không nóng bức khi vận động nhiều, không nhăn, không co rút sau khi giặt.\n\nĐặc điểm nổi bật: \n\n- Cổ áo và tay áo phối sọc tinh tế tạo điểm nhấn thời trang bắt mắt\n\n- Thiết kế trang nhã, màu sắc ấn tượng, tiện dụng và thoải mái mang đến vẻ thanh lịch, tự tin cho người mặc.\n\n - Form áo suông phù hợp với mọi độ tuổi, tay áo bo nhẹ khỏe khoắn.\n\n - Áo Thun có cổ rất đa năng, mặc được trong nhiều dịp khác nhau, đi dạo phố cùng bạn bè, đi phượt, mặc hàng ngày...\n\n - Với thiết kế đơn giản nhưng đẳng cấp, cùng với sự tiện dụng và thoải mái khi mặc.\n\n-	Xuất xứ: Việt Nam\n\n-	Size: S-M-L-XL-XXL-3XL (Tham khảo bảng size ở hình ảnh kỹ hơn)\n\nĐÔI NÉT VỀ SẢN PHẨM ÁO THUN NAM\n\nÁo thun nam là trang phục cơ bản và tiện dụng nhất đối với phái mạnh. Hầu như người đàn ông nào cũng đều phải có vài chiếc áo pull nam trong tủ áo của mình. Việc mua áo thun nam cũng được bàn tán sôi nổi trên khắp các diễn đàn hay blog cá nhân. Với những ưu điểm tuyệt vời như phong cách đa dạng, kiểu dáng đơn giản và chất liệu thoáng mát, áo thun nam Hàn Quốc được phái mạnh yêu thích và lựa chọn khi đến công sở hay dạo phố. Bên cạnh đó, áo thun nam cổ trụ cũng được các chàng trai văn phòng yêu thích vì nét lịch sự và trẻ trung. Chỉ cần kết hợp áo thun nam body với quần jeans nam hay quần kaki nam và những phụ kiện đi kèm như ví nam, túi du lịch nam hay đơn giản hơn là chiếc balo laptop nam năng động, bạn đã có ngay bộ cánh đơn giản mà hiện đại.\n\nHướng dẫn sử dụng\n\n- Khuyến khích giặt tay\n\n- Không nên dùng bột giặt có chất tẩy mạnh\n\n- Ủi nhẹ ở nhiệt độ thấp\n\n#aothun #aopolo #aothuncotru #aothunpolonam #aopolonam #aothuncasau #aocasau #áocásấu #aothunnam #aothunnu #aonam #aonu #aothunden #aothuneverest #everest', 60000, 0, 1, '2023-10-25 13:48:19'),
(5, 'Quần Cargo Pant unisex form rộng màu camo chính hãng', 'Thông tin sản phẩm\n\n- Chất liệu: Vải Păng-Zin Hàn cao cấp, chất thoáng\n2\n- Form: Oversize\n\n- Màu sắc: Camo\n\n- Thiết kế: Basic', 367000, 0, 2, '2023-10-25 13:50:46'),
(6, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', '???? ????????????̂???????? ???????????? ????????̉???? ????????????̂̉????:\n???? Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)', 80000, 0, 1, '2023-10-25 13:54:26'),
(7, 'Quần short nam TENJI QJ232TJ chất bò co dãn ,jean xám', 'Sản phẩm QUẦN SHORT NAM được đặt may riêng theo mẫu thiết kế của Tenji Store  shop tại tp HCM. \n\nQuần short nam với thiết kế mới thời trang hơn, mang lại sự tự tin tối đa cho người mặc trước những người xung quanh\n\nQuần may bằng vải denim nên rất mềm và thoải mái khi mặc, đảm bảo sẽ không hề cảm thấy gò bó ngay cả khi di chuyển nhiều.\n\nDáng quần short ống trẻ trung ôm dáng tạo nên form cực chuẩn cho người mặc túi quần lớn rất thuận tiện cho việc đựng smart phone hoặc ví cỡ bự.\n\nMàu sắc quần đùi nam chuẩn được nhuộm kỹ đến hai lần giúp hạn chế tối đa việc phai màu khi sử dụng.\n\nVài jeans ảnh chụp cận cảnh để làm rõ thêm sự sắc nét của từng đường may, sớ vải.\n\nSize: 28 đến 34\n\nXuất xứ: Chịu Trách Nhiệm Về Sản Phẩm Tenji Store \n\nđường Linh Trung/Phường Linh Trung/Tp Thủ Đức /Tp Hồ Chí Minh.\n\n------------\n\nTên Sản Phẩm: Quần short nam TENJI QJ232TJ chất bò co dãn họa tiết rách size (28-34)\n\nBảng chọn size QUẦN SHORT NAM \n\nSize 28  (Từ 43 - 48kg Cao Dưới 1m65)  Vòng bụng 79cm\n\nSize 29  (Từ 49 - 54kg Cao Dưới 1m65)  Vòng bụng 80cm\n\nSize 30  (Từ 55 - 59kg Cao Dưới 1m70)  Vòng bụng 81cm\n\nSize 31  ( Từ 60- 64kg Cao Dưới 1m75)  Vòng bụng 83cm\n\nSize 32  (Từ 65 - 69kg Cao Dưới 1m78)  Vòng bụng 85cm\n\nSize 34 (Từ 70 - 75KG cao Dướ 1m80)  Vòng Bụng 87cm\n\n  LƯU Ý: những bạn có bụng nên lấy lớn hơn 1 size so với bảng trên ạ.\n\nLoại  : quần short nam, quần đùi nam,quần short jean nam\n\nThích hợp : quần short nam thích hợp cho Đi Chơi, Đời Thường, du lịch\n\nChất liệu  : quần short nam được làm từ chất jeans co giãn\n\nkiểu dáng: quần short nam, quần đùi nam, quần đùi jean nam mặc nhà\n\n------------------------------------\n\n:package:  HƯỚNG DẪN BẢO QUẢN VÀ SỬ DỤNG.\n\nLộn trái quần short nam ra và sử dụng nước giặt giúp quần mau sạch và hạn chế phai màu.\n\nĐể quần đùi nam khô tự nhiên, phơi trong bóng râm thoáng mát.\n\nKhông sử dụng hóa chất, thuốc tẩy trực tiếp lên sản phẩm quần short nam, không ngâm quá lâu trong dung dịch tẩy.\n\nLà ủi quần đùi nam ở nhiệt độ dưới 110 độ C.\n\ncảm ơn bạn đã quan tâm đến sản phẩm: Quần short nam, xám, rách, rin ngắn, chất bò jeans co giãn, short mặc nhà jean ngắn đẹp SH232 nhiều mẫu', 129000, 0, 2, '2023-10-25 13:59:10'),
(8, 'Quần dài AOKANG phối họa tiết rằn ri phong cách thời trang cho nam', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\n\n\n\nPhong cách: Thanh niên pop\n\nPhong cách: Quần áo\n\nKiểu quần áo: Dáng rộng\n\nChiều dài: Quần dài\n\nKiểu eo: Buộc dây\n\nCó thắt lưng không: Không\n\nKiểu quần: Bo ống quần\n\nĐộ dày: Thông thường\n\nHọa tiết: Rằn ri\n\nMùa thích hợp: 4 mùa\n\nDành cho: Thanh thiếu niên\n\nTên vải: Cotton\n\nThành phần vải: Sợi polyester (polyester)\n\nHàm lượng của thành phần vải chính: 65 (%)\n\nKiểu dáng: Ống nhỏ\n\nThủ công: Cắt dán/ khâu\n\nChi tiết phong cách: Nhiều túi\n\nĐộ co giãn: Co giãn nhẹ\n\nChất liệu: Cotton\n\nMàu sắc: Màu đen\n\nKích thước: S, M, L, XL, 2XL, 3XL\n\nChúng tôi chỉ muốn mang đến cho bạn những sản phẩm tốt nhất, hợp xu hướng nhất, chất lượng nhất và giá rẻ nhất.\n\nCửa hàng tập trung vào hướng phát triển và xu hướng quần áo thời trang, có khả năng thiết kế và phong cách thiết kế riêng, thế mạnh về xưởng sản xuất, được khách hàng vô cùng yêu thích\n\nCửa hàng mang đến cho bạn màu sắc của thế giới, dịch vụ trước và sau bán hàng hoàn hảo, để mọi người biết đến chúng tôi đều cảm động và thu hoạch\n\n#aokangdian thời trang thực sự rất đơn giản\n\nNếu bạn muốn chọn một kích thước, vui lòng tham khảo bảng kích thước. Nếu bạn không chắc mình mặc cỡ nào, bạn có thể cung cấp chiều cao và cân nặng của mình và chúng tôi sẽ tư vấn cho bạn.\n\nTất cả sản phẩm được vận chuyển từ Trung Quốc trong thời gian sớm nhất sau khi đặt hàng. Sản phẩm sẽ được giao cho bạn sớm nhất có thể. Sau khi chúng tôi gửi hàng, hệ thống kho vận sẽ không hiển thị rằng sản phẩm đã được gửi đi, vì những sản phẩm này sẽ được gửi đến kho trung chuyển quốc tế trước. Sau khi nhân viên kho gửi các sản phẩm này, hệ thống sẽ cập nhật thông tin hậu cần.\n\nNếu nút quần jean hoặc quần áo denim không được mở, đừng lo lắng. Chúng không phải là sản phẩm lỗi chưa hoàn thành. Tất cả thương hiệu quần jean mới từ Trung Quốc đại lục đều đảm bảo tính toàn vẹn của sản phẩm ở mức độ cao nhất và sẽ không có trường hợp mở ngẫu nhiên!\n\nChúng tôi sẽ kiểm tra cẩn thận trước khi giao, đôi khi cũng có sai sót. Nếu bạn phát hiện lỗi, thiếu sót và các vấn đề về chất lượng sau khi nhận được. Vui lòng liên hệ với chúng tôi.\n\nNếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi, vui lòng cho chúng tôi 5 sao.\n\nMỗi điểm số đều quan trọng đối với cửa hàng.\n\nChúng tôi sẽ luôn có sản phẩm mới. Hãy tiếp tục chú ý đến chúng tôi.\n\nVui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không. Nếu có lỗi xảy ra trước khi nhấp vào đơn hàng, chúng tôi không thể thay đổi hoặc sửa đổi.\n\nBởi vì các phương pháp đo khác nhau, vui lòng cho phép sai số 2-5cm.\n\nChúng tôi gửi hàng từ Trung Quốc đại lục. Kích thước khác với Việt Nam. Bạn có thể kiểm tra kích thước khi đặt hàng để tránh những tổn thất không đáng có. Cảm ơn bạn\n\nChúng tôi biết rằng sản phẩm của chúng tôi không thể làm hài lòng tất cả mọi người. Nếu bạn tìm thấy vấn đề, bạn có thể liên hệ với chúng tôi, chúng tôi sẽ giải quyết vấn đề cho bạn.', 240000, 0, 2, '2023-10-25 14:06:00'),
(9, 'Áo sơ mi ngắn tay form rộng, thời trang hiện đại unisex chất liệu vải lụa mềm chống nhăn', 'Shop cam kết luôn mang lại chất lượng sản phẩm tốt nhất dành cho khách hàng với chăm ngon : “Trao đi giá trị, nhận lại yêu thương”\nÁO SƠ MI NGẮN TAY FORM RỘNG, THỜI TRANG HIỆN ĐẠI UNISEX CHẤT LIỆU VẢI LỤA MỀM CHỐNG NHĂN\n-	Chất liệu: Lụa hàn.\n-	Công dụng: Chống nhăn, giãn nhẹ, êm ái, mềm mịn và mát da.\n-	Phong cách: Unisex, Form rộng, Sweetwear.\n-	Dành cho: Nam và Nữ.\n-	Xu xướng: Hiện đại 2023.\n-	Xuất xứ: Made in Việt Nam.\nÁO SƠ MI NGẮN TAY FORM RỘNG, THỜI TRANG HIỆN ĐẠI UNISEX CHẤT LIỆU VẢI LỤA MỀM CHỐNG NHĂN\n-	Quần short -> Tạo nên phong cách vô cùng đơn giản nhưng không kém phần cuốn hút. Đặc biệt mang đến cảm giác thoải mái cho người mặc. Phù hợp để đi dạo phố và trà sữa cùng bạn bè.\n-	Quần jean, kaki, âu dài -> Tạo nên phong cách cá tính và năng động, chiếc quần rách sẽ làm trang phục có thêm điểm nhấn. Phù hợp để đi chơi xa, đi dạo phố, đi đám cưới, tiệc tùng sinh nhật.', 87000, 0, 1, '2023-10-25 14:06:19'),
(10, 'Quần Túi Hộp Chiến Thuật Eagllage Senior Chống Thấm Nước Màu Xám Cho Nam KBZ01', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\n\nDanh mục sản phẩm: Quần dài\nĐặc điểm: Chống thấm nước\nChất liệu: Cotton Polyester\nHọa tiết: Màu trơn\nPhong cách: Unisex\nLớp lót: Không có lớp lót\nCó lớp lót: Không có lớp lót\nCấp độ chống thấm nước: 1000mm\nMã số sản phẩm: ZG-KBZ01\nDịp sử dụng thích hợp: Cắm trại, Đi bộ đường dài\nMàu sắc: Đen, Xám xanh lá, Kaki', 633000, 0, 2, '2023-10-25 14:10:21'),
(11, 'Áo ba lỗ nam chuẩn gym ???????????????????? ????????.???????? Ao tanktop nam trơn thun cotton thoáng mát', 'Shop cam kết luôn mang lại chất lượng sản phẩm tốt nhất dành cho khách hàng với chăm ngon : “Trao đi giá trị, nhận lại yêu thương”\nÁO SƠ MI NGẮN TAY FORM RỘNG, THỜI TRANG HIỆN ĐẠI UNISEX CHẤT LIỆU VẢI LỤA MỀM CHỐNG NHĂN\n-	Chất liệu: Lụa hàn.\n-	Công dụng: Chống nhăn, giãn nhẹ, êm ái, mềm mịn và mát da.\n-	Phong cách: Unisex, Form rộng, Sweetwear.\n-	Dành cho: Nam và Nữ.\n-	Xu xướng: Hiện đại 2023.\n-	Xuất xứ: Made in Việt Nam.\nÁO SƠ MI NGẮN TAY FORM RỘNG, THỜI TRANG HIỆN ĐẠI UNISEX CHẤT LIỆU VẢI LỤA MỀM CHỐNG NHĂN\n-	Quần short -> Tạo nên phong cách vô cùng đơn giản nhưng không kém phần cuốn hút. Đặc biệt mang đến cảm giác thoải mái cho người mặc. Phù hợp để đi dạo phố và trà sữa cùng bạn bè.\n-	Quần jean, kaki, âu dài -> Tạo nên phong cách cá tính và năng động, chiếc quần rách sẽ làm trang phục có thêm điểm nhấn. Phù hợp để đi chơi xa, đi dạo phố, đi đám cưới, tiệc tùng sinh nhật.', 55000, 0, 1, '2023-10-25 14:12:41'),
(12, 'Quần dài INCERUN thời trang nam màu trơn co giãn thiết kế cắt xẻ', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\n\nKích thước:S,M,L,XL,2XL,3XL,4XL,5XL\nChất liệu vải:100% Polyester\nKiểu dáng:Vừa vặn\nPhong cách:Khái niệm cơ bản\nDịp phù hợp:Giải trí\nHoa văn:Phối màu\nĐộ dày:Trung bình\nMàu sắc:Hồng\nMô tả sản phẩm:Quần dài phối màu dành cho nam\n\nGói hàng bao gồm:\n1 * quần\n\nXin lưu ý:\nMong bạn thông cảm sai số 2 cm / 1 inch do các phép đo thủ công.', 228000, 0, 2, '2023-10-25 14:17:12'),
(13, 'Áo hoodie nam - Áo khoác hoodie Nỉ Nam', '- Chất vải nỉ trơn mềm mại co giãn nhẹ, áo thu đông nỉ mặc mềm mại dễ chịu nhưng vẫn tôn lên phong cách năng động.\n- Thiết kế áo nỉ có mũ, tay dài phối họa tiết trẻ trung.\n- Kiểu dáng gọn nhẹ, thể thao, năng động của áo Unisex giúp bạn thêm phong cách.\n- Phù hợp nhiều hoàn cảnh: mặc ở nhà, thể thao, đi chơi, du lịch.\n- Xuất xứ: Việt Nam\n- Kích thước: Freesize phù hợp với những bạn từ 40-65 kg có phụ thuộc vào chiều cao.\n- Chất liệu nỉ cao cấp, không xỉn màu, không sờn vải sau nhiều lần giặt.', 75000, 0, 1, '2023-10-25 14:18:11'),
(14, 'Quần INCERUN ống rộng màu tối thời trang cá tính cho nam', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\n\nThương hiệu：INCERUN\nKích thước: S, M, L, XL, 2XL, 3XL, 4XL,5XL\nChất Liệu vải: 100%Polyester\nMàu sắc: Đen, Trắng, Xám\nPhong cách:Cơ Bản\nDịp sử dụng: Giải trí\nHoa văn: Màu trơn\nĐộ dày: Vừa phải\nMô tả sản phẩm : Quần dài nam màu trơn.\nNhãn mác: CÓ\n\nGói hàng bao gồm:\n1 * Quần\n\nXin lưu ý:\nMong bạn thông cảm, kích thước có thể sai số 2 cm / 1 inch do đo lường thủ công.', 142000, 0, 2, '2023-10-25 14:20:45'),
(15, 'Áo sơ mi nam Basic chất kaki cao cấp cực đẹp', '⭐ Tên sản phẩm : Áo sơ mi kaki basic cao cấp\n\n⭐ Chất Liệu: Chất kaki xuất hàn xịn\n⭐ Đặc Tính: Chất vải áo là chất kaki cao cấp dày dặn, dễ phối hợp đồ, nam nữ mặc đều đẹp ạ', 125000, 0, 1, '2023-10-25 14:22:38'),
(16, 'Quần âu nam hàn quốc trơn màu GINDY quần tây nam đen vải chống nhăn thời trang công sở học sinh sinh viên Q028', 'Quần tây nam hàn quốc GINDY quần âu nam đen co dãn tốt vải chống nhăn thời trang công sở học sinh sinh viên Q028 Q12106\n\n???? TẠI SAO NÊN MUA HÀNG CHÍNH HÃNG TẠI GINDY? ????\n\n✅ HÀNG ĐẸP 99% GIỐNG HÌNH, 1% DO ÁNH SÁNG\n\n✅ ĐƯỢC ĐỔI, TRẢ HÀNG NẾU CÓ BẤT CỨ LỖI NÀO TRONG 7 NGÀY\n\n✅ CHẤT LIỆU ĐƯỢC LỰA CHỌN KỸ LƯỠNG PHÙ HỢP VỚI THIẾT KẾ, TỐT NHẤT TRONG TẦM GIÁ\n\n✅ THIẾT KẾ PHÙ HỢP VỚI VÓC DÁNG NGƯỜI VIỆT NAM\n\n-------------------------\n\nNẾU BẠN MUỐN TÌM KIẾM NHỮNG SET ĐỒ BỘ THỜI TRANG, PHỤ KIỆN NỮ HOT NHẤT HIỆN NAY. HÃY ĐẾN VỚI GINDY !\n\nGindy sẽ mang đến cho bạn những trải nghiệm mua sắm thời trang tuyệt vời. Với rất nhiều những mẫu thiết kế quần tây, quần vải,quần nỉ dài, quần jogger, quần dài, quần thể thao trẻ trung, năng động, phù hợp với mọi lứa tuổi, thời trang công sở, đi học, đi chơi.\n\n-------------------------\n\nQuần tây được thiết kế dựa trên ý tưởng về chiếc quần truyền thống được cải tiến gọn gàng và hợp thời trang. Quần tây (quần vải) với thiết kế đơn giản, trẻ trung, năng động, phù hợp với nhiều hoàn cảnh.\n\n???? CHẤT LIỆU:\n\nQuần tây Gindy với chất liệu được may từ vải mềm mại, mặc mát mùa hè, ấm áp mùa đông phù hợp với nhu cầu thời trang cũng như theo trend của giới trẻ. Chất liệu được tuyển chọn kỹ lưỡng mang đến những chiếc quần chuẩn form. \n\nHãy để Gindy giúp bạn cảm nhận rõ như thế nào là những chiếc quần tây/quần vải trẻ trung, năng động.\n\n-------------------------\n\n???? THIẾT KẾ:\n\n-  Quần tây form chuẩn được thiết kế hướng đến thời trang basic, đơn giản, dễ phối đồ.\n\n- Quần tây baggy /quần vải thích hợp cho bạn mặc đi tập, đi học, đi chơi, \n\n- Sản phẩm được đảm bảo, có tem mác . Cam kết 100% y hình.\n\n-------------------------\n\n???? KÍCH THƯỚC:\n\nQuần tây ( quần vải) có đủ size cho bạn lựa chọn\n\n>>> Size số sản phẩm phụ thuộc vào cả chiều cao và cân nặng của mỗi người, khách yêu nhắn tin ngay cho Gindy để được hỗ trợ tư vấn size chuẩn nhất nhé!\n\n-------------------------\n\n???????????? GINDY CAM KẾT:\n\n- Hàng thiết kế và may đo tỉ mỉ, chắc chắn, tinh tế qua từng đường chỉ.\n\n- Sản phẩm đảm bảo 100% y hình và đẹp hơn hình.\n\n- Đổi trả hàng nếu có bất cứ lỗi gì từ nhà sản xuất. GINDY đổi trả hàng cho quý khách nếu hàng không y hình hay không như những gì Gindy đã quảng cáo.\n\n VỚI NHỮNG LÝ DO TRÊN KHÔNG CÒN LÝ DO GÌ ĐỂ KHÔNG RINH NGAY VÀI EM ĐÚNG KHÔNG NÀO?\n\n-------------------------\n\n❗️❗️❗️ GINDY LƯU Ý:\n\nVề màu sắc: Do màn hình và điều kiện ánh sáng khác nhau nên màu sắc thực tế của sản phẩm của Gindy có thể chênh lệch khoảng 5-10%. Tuy nhiên độ lệch màu ít giữa sản phẩm thực tế và hình ảnh minh họa sẽ không gây ảnh hưởng đến vấn đề chất lượng nên bạn yên tâm đặt hàng nha\n\nVề chất lượng sản phẩm: Hàng giá rẻ sẽ có chất lượng kém hơn, xin bạn đừng so sánh với sản phẩm chất lượng cao của Gindy sản xuất\n\nTrong trường hợp nhận được các sản phẩm có vấn đề không đáng kể như bề mặt hơi bẩn có thể hết sau khi giặt, có chỉ thừa...Gindy hy vọng bạn có thể tự mình khắc phục được các vấn đề đó nhé bạn. Nếu có lưu ý thêm gì về sản phẩm thì hãy nhắn tin ngay với gindy nha\n\nTrong trường hợp cân nặng của bạn quá cỡ thì hãy cân nhắc kỹ trước khi đặt mua sản phẩm này vì việc chọn sai kích cỡ sẽ khiến bạn không hài lòng và có thể đưa ra những đánh giá, phản hồi tiêu cực và đây cũng là điều gindy không mong muốn, chúc bạn chọn được sản phẩm ưng ý nhé!', 150000, 0, 2, '2023-10-25 14:25:01'),
(17, 'Quần Kaki Nam Nữ co dãn Unisex thời trang Bigsize Sói Store', 'THÔNG TIN SẢN PHẨM\n\n\n\n- Thương hiệu: No Brand\n\n\n\n- Xuất xứ: Việt Nam\n\n\n\n- Chất liệu: Kaki co giãn ạ. Thấm hút tốt, giặt nhanh khô, trời nồm cũng k sợ ạ.\n\n\n\n- Màu sắc: Đen, xanh rêu, Xám ghi\n\n\n\n- Các đặc điểm khác và công dụng của sản phẩm:\n\n\n\n. Túi sâu và rộng, khách để ví, điện thoại,.....thoải mái ạ + Túi phía sau tiện lợi.\n\n\n\n. Lưng quần may dằn thun to, nhiều đường may, tạo cảm giác thoải mái.\n\n\n\n. Quần baggy nam - nữ. Có thể mặc đi chơi, đi dạo, tập thể thao, đi học...\n\n\n\n. Các bạn có thể mặc như đồ đôi, đồ nhóm, lớp.\n\n\n\n. Quần jogger mang đến sự thoáng mát và thoải mái cho người mặc trong mọi hoạt động\n\n\n\n. Quần có thể kết hợp được với nhiều loại trang phục khác\n\n\n\n. Phù hợp mặc đi chơi, đi dã ngoại, tập thể thao,…\n\n\n\n- Kiểu dáng thiết kế:\n\n\n\nTuỳ vào khách muốn mặc ôm vào chân hoặc rộng thoải mái bên mình tư vấn size phù hợp ạ.\n\n\n\n- Form dáng:\n\n\n\nQuần jogger rất dễ mặc, có thể mặc ngắn hoặc dài xíu vẫn đẹp ạ.\n\n\n\nBẢNG SIZE CHO BẠN:\n\n\n\nSize 1(60-73kg)\n\n\n\nSize 2(70-82kg)\n\n\n\nSize 3(83-92kg)\n\n\n\nSize 4(93-102kg)', 200000, 0, 2, '2023-10-25 14:28:27'),
(18, 'Quần Kaki Baggy Nam Cotton Cao Cấp Vicenzo Cạp Thun Ống Đứng Mềm Sau Khi Giặt', '1. THÔNG TIN SẢN PHẨM \n\n- Chất liệu: Kaki \n\n- Màu sắc: Đen, Be, Nâu\n\n- Thiết kế:\n\n- Size:S,  M, L, XL, XXL\n\n\n\n2. BẢNG SIZE\n\nSIZE / CÂN NẶNG / CHIỀU CAO / VÒNG_MONG / VÒNG_ĐÙI / CHIỀU DÀI QUẦN\n\n- Size S: 40 - 45kg /1m50 - 1m55 / 88cm / 50cm / 90cm\n\n- Size M: 45 - 52kg / 1m55 - 1m60 / 90cm / 53cm / 92cm\n\n- Size L: 52 - 60kg / 1m60 - 1m67 / 94cm / 56cm / 94cm\n\n- Size XL: 60 - 68kg / 1m67 - 1m73 / 100cm / 58cm / 97cm\n\n- Size XXL: 68 - 78kg / 1m73 - 1m78 / 104cm / 60cm / 99cm\n\n (Sản phẩm sẽ bị sai số 1-2cm)\n\n\n\n3.	CHÍNH SÁCH BÁN HÀNG\n\nVICENZO OFFICIAL cam kết với khách hàng về sản phẩm\n\n- Sản phẩm thật cam kết như mô tả \n\n- Tư vấn nhiệt tình, chu đáo luôn lắng nghe khách hàng \n\n- Giao hàng nhanh nhất có thể \n\n- Sản phẩm được kiểm tra kỹ càng, cẩn thận trước khi gói giao hàng cho Quý khách. \n\n- Hàng có sẵn, giao ngay khi phát sinha đơn. \n\n- Đổi trả theo quy định chính sách của Shopee. \n\n- Giao hàng toàn quốc, nhận hàng thanh toán. \n\n\n\n4.	CHÍNH SÁCH ĐỔI TRẢ\n\n- Các trường hợp được chấp nhận đổi trả \n\n+ Hàng hoá vẫn còn mới nguyên tem mác, chưa qua sử dụng. \n\n+ Hàng hoá bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất. \n\n- Các trường hợp không được đổi trả: \n\n+ Quá 07 ngày kể từ khi Quý khách nhận hàng từ shopee. \n\n+ Gửi lại hàng không đúng mẫu mã, không phải sản phẩm của shop.\n\n\n\n5.	LƯU Ý\n\n- Do màn hình và điều kiện ánh sáng khác nhau, màu sắc thực tế của sản phẩm có thể chênh lệch khoảng 3-5%.\n\n- Bảng size chỉ mang tính chất tham khảo, vui lòng nhắn tin cho shop để được tư vấn size chuẩn nhất.\n\n\n\n6.	HƯỚNG DẪN SỬ DỤNG VÀ KHUYẾN NGHỊ: \n\n- Đối với những sản phẩm giặt lần đầu, nên giặt bằng tay và giặt riêng từng sản phẩm.\n\n- Giặt mặt trái, nhẹ tay, giặt xong phơi ngay, không ngâm trong nước quá lâu. \n\n- Màu rắng, be - màu đậm nên chia ra giặt riêng, không giặt chung. \n\n- Khi áo in giặt nhớ giũ thẳng áo để hình in ko bị dính vào nhau.\n\n- Sử dụng máy sấy và ủi ở nhiệt độ thích hợp. \n\n- Lộn mặt trái của sản phẩm trước khi giặt và phơi để tránh bị phai màu', 250000, 0, 2, '2023-10-25 14:31:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`taikhoan`);

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
  ADD KEY `idkhachhang` (`idkhachhang`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bosuutap`
--
ALTER TABLE `bosuutap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chitietbosuutap`
--
ALTER TABLE `chitietbosuutap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhang` (`id`);

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
