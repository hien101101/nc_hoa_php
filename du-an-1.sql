-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 03, 2023 lúc 05:33 AM
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
-- Cơ sở dữ liệu: `du-an-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh_san_pham`
--

CREATE TABLE `anh_san_pham` (
  `id` int(10) NOT NULL,
  `id_san_pham` int(10) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anh_san_pham`
--

INSERT INTO `anh_san_pham` (`id`, `id_san_pham`, `img`) VALUES
(4, 3, 'id_3_1.webp'),
(5, 3, 'id_3_2.webp'),
(6, 3, 'id_3_3.webp'),
(13, 8, 'sp1.png'),
(14, 8, 'sp2.png'),
(15, 8, 'sp3.png'),
(16, 9, 'sp4.png'),
(17, 9, 'sp5.png'),
(18, 9, 'sp6.png'),
(19, 10, 'sp7.png'),
(20, 10, 'sp8.png'),
(21, 10, 'sp9.png'),
(22, 11, 'sp10.png'),
(23, 11, 'sp11.png'),
(24, 11, 'sp12.png'),
(25, 12, 'sp13.png'),
(26, 12, 'sp14.png'),
(27, 12, 'sp15.png'),
(28, 13, 'sp16.png'),
(29, 13, 'sp17.png'),
(30, 13, 'sp18.png'),
(31, 14, 'sp19.png'),
(32, 14, 'sp20.png'),
(33, 14, 'sp21.png'),
(34, 15, 'sp22.png'),
(35, 15, 'sp23.png'),
(36, 15, 'sp24.png'),
(40, 17, 'sp28.png'),
(41, 17, 'sp29.png'),
(42, 17, 'sp30.png'),
(43, 18, 'sp31.png'),
(44, 18, 'sp32.png'),
(45, 18, 'sp33.png'),
(46, 19, 'sp34.png'),
(47, 19, 'sp35.png'),
(48, 19, 'sp36.png'),
(49, 20, 'sp37.png'),
(50, 20, 'sp38.png'),
(51, 20, 'sp39.png'),
(52, 21, 'sp40.png'),
(53, 21, 'sp41.png'),
(54, 21, 'sp42.png'),
(55, 22, 'sp43.png'),
(56, 22, 'sp44.png'),
(57, 22, 'sp45.png'),
(58, 23, 'sp46.png'),
(59, 23, 'sp47.png'),
(60, 23, 'sp48.png'),
(61, 24, 'sp49.png'),
(62, 24, 'sp50.png'),
(63, 24, 'sp51.png'),
(64, 25, 'sp52.png'),
(65, 25, 'sp53.png'),
(66, 25, 'sp54.png'),
(67, 26, 'sp55.png'),
(68, 26, 'sp56.png'),
(69, 26, 'sp57.png'),
(73, 28, 'sp58.png'),
(74, 28, 'sp59.png'),
(75, 28, 'sp60.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(10) NOT NULL,
  `id_san_pham` int(10) NOT NULL,
  `id_dung_tich` int(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `gia` int(10) NOT NULL,
  `id_don_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_san_pham`, `id_dung_tich`, `so_luong`, `gia`, `id_don_hang`) VALUES
(7, 26, 1, 2, 380000, 5),
(8, 24, 1, 1, 247000, 5),
(11, 28, 2, 1, 220000, 9),
(12, 12, 53, 1, 730000, 10),
(13, 15, 1, 7, 311000, 14),
(14, 20, 2, 1, 520000, 14),
(15, 26, 1, 1, 380000, 15),
(16, 8, 2, 1, 420000, 15),
(17, 15, 53, 1, 970000, 16),
(18, 24, 2, 2, 482000, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_sp`
--

CREATE TABLE `chi_tiet_sp` (
  `id` int(10) NOT NULL,
  `id_sanPham` int(10) NOT NULL,
  `id_theTich` int(10) NOT NULL,
  `gia` int(5) NOT NULL,
  `so_luong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_sp`
--

INSERT INTO `chi_tiet_sp` (`id`, `id_sanPham`, `id_theTich`, `gia`, `so_luong`) VALUES
(9, 8, 1, 250000, 0),
(10, 8, 2, 420000, 12),
(11, 8, 53, 849000, 44),
(12, 9, 1, 380000, 54),
(13, 9, 2, 510000, 34),
(14, 9, 53, 765000, 23),
(15, 10, 1, 320000, 35),
(16, 10, 2, 550000, 21),
(17, 10, 53, 880000, 39),
(18, 11, 1, 280000, 55),
(19, 11, 2, 488000, 30),
(20, 11, 53, 760000, 41),
(21, 12, 1, 220000, 51),
(22, 12, 2, 460000, 29),
(23, 12, 53, 730000, 33),
(24, 13, 1, 253000, 12),
(25, 13, 2, 389000, 24),
(26, 13, 53, 650000, 43),
(27, 14, 1, 220000, 12),
(28, 14, 2, 387000, 22),
(29, 14, 53, 570000, 35),
(30, 15, 1, 311000, 42),
(31, 15, 2, 589000, 37),
(32, 15, 53, 970000, 35),
(36, 17, 1, 242000, 4),
(37, 17, 2, 410000, 13),
(38, 17, 53, 760000, 39),
(39, 18, 1, 341000, 47),
(40, 18, 2, 649000, 20),
(41, 18, 53, 1150000, 34),
(42, 19, 1, 730000, 15),
(43, 19, 2, 1440000, 11),
(44, 19, 53, 2650000, 28),
(45, 20, 1, 275000, 22),
(46, 20, 2, 520000, 8),
(47, 20, 53, 1200000, 11),
(48, 21, 1, 248000, 26),
(49, 21, 2, 510000, 11),
(50, 21, 53, 1480000, 20),
(51, 22, 1, 222000, 4),
(52, 22, 2, 460000, 10),
(53, 22, 53, 1130000, 7),
(54, 23, 1, 316000, 6),
(55, 23, 2, 610000, 37),
(56, 23, 53, 1180000, 22),
(57, 24, 1, 247000, 16),
(58, 24, 2, 482000, 1),
(59, 24, 53, 931000, 24),
(60, 25, 1, 624000, 24),
(61, 25, 2, 1220000, 13),
(62, 25, 53, 2680000, 11),
(63, 26, 1, 380000, 12),
(64, 26, 2, 770000, 9),
(65, 26, 53, 1849000, 17),
(69, 28, 1, 220000, 12),
(70, 28, 2, 220000, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(10) NOT NULL,
  `id_khach_hang` int(10) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` int(10) NOT NULL DEFAULT 0,
  `id_vc` int(10) NOT NULL,
  `ten_kh` varchar(100) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `tong_tien` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_khach_hang`, `dia_chi`, `trang_thai`, `id_vc`, `ten_kh`, `sdt`, `tong_tien`, `date`) VALUES
(5, 3, 'hà nội', 0, 2, 'nguyễn xuân Mừng', '0962013945', 1033000, '2023-04-20'),
(9, 3, 'Hà nội', 4, 1, 'Mừng Lolicon', '01234567', 244000, '2023-06-05'),
(10, 3, 'Hà nội', 0, 1, 'Mừng Lolicon', '01234567', 754000, '2023-07-22'),
(14, 3, 'Hà nội', 3, 2, 'nguyễn xuân Mừng', '01234567', 2723000, '2023-05-17'),
(15, 3, 'Thôn 10, Thạch Hòa, Thạch Hoà, Thạch Thất, Hà Nội, Việt Nam', 0, 2, 'Nguyễn Văn A', '0962013945', 826000, '2023-09-03'),
(16, 3, '559 Trường Chinh, Vị Xuyên, TP. Nam Định, Việt Nam', 0, 1, 'Trịnh Anh Tuấn', '084910083', 994000, '2023-09-03'),
(17, 3, 'Hà nội', 0, 1, 'Nguyễn Thị Hà', '01234567', 988000, '2023-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dung_tich`
--

CREATE TABLE `dung_tich` (
  `id` int(10) NOT NULL,
  `dungTichThuc` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dung_tich`
--

INSERT INTO `dung_tich` (`id`, `dungTichThuc`) VALUES
(1, 10),
(2, 20),
(53, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(10) NOT NULL,
  `id_khach_hang` int(10) NOT NULL,
  `id_san_pham` int(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `id_dt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`id`, `name`) VALUES
(2, 'Gucci'),
(3, 'Louis Vuitton'),
(4, 'Viktor & Rolf'),
(5, 'Falavia'),
(6, 'Hermes'),
(7, 'Mancera'),
(8, 'Armaf'),
(9, 'Diptyque'),
(10, 'Parfums'),
(11, 'Maison');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `name`, `anh`) VALUES
(1, 'Nước hoa nam', 'product_banner_1.webp'),
(2, 'Nước hoa nữ', 'sec_group_product_banner_2.webp'),
(3, 'Nước hoa unisex', 'sec_group_product_banner_3.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `id_loai` int(10) NOT NULL,
  `id_hang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `mo_ta`, `id_loai`, `id_hang`) VALUES
(3, 'nuoc hoa gucci', '', 2, 2),
(8, 'Viktor & Rolf Spicebomb Extreme', 'Nước hoa nam Viktor & Rolf Spicebomb Extreme có mùi hương ngọt ngào, khá dễ chịu, cuốn hút hơn phiên bản cũ, khiến phái đẹp mê đắm. Chính sự kết hợp hoàn hảo và táo bạo không theo quy tắc, Spicebomb Extreme được đánh giá là một trong 10 loại nước hoa dành', 1, 4),
(9, 'Elite EDP', 'Nếu bạn là 1 Fan của nước hoa nam Roja Elysium thì nước hoa nam Flavia Elite EDP  sẽ là lựa chọn tối ưu hơn về chi phí bởi đây chính là bản dupe hoàn hảo của Elysium với mùi hương sang trọng, lịch lãm, thời thượng cùng độ bám toả tốt.', 1, 5),
(10, 'Un Jardin SurleToit EDT', 'Nước hoa unisex Hermes Un Jardin Sur Le Toit EDT là chai nước hoa rất sống động, sắc sảo và mới lạ. Mùi hương của nó gợi cho ta về một khu vườn bí ẩn và xinh đẹp, nằm giữa thành phố ánh sáng Paris.', 2, 6),
(11, 'Sicily EDP', 'Nước hoa Mancera Sicily EDP  là một mùi hương của sự vui tươi, hạnh phúc. Hương thơm của Sicily không đại trà, không dễ bị lẫn vào đám đông nhốn nháo các mùi hương khác, hoàn toàn vượt mặt đàn anh Credat Boise dù nó im lìm và không được quảng cáo rầm rộ.', 3, 7),
(12, 'De Nuit Imperial For Women EDP', 'Mùi của những quả vải chín mọng đầy ngọt ngào lại được hòa cùng những cánh hoa hồng Thổ Nhĩ Kỳ đầy uyển chuyển và vani ngọt ấm. Với một mùi hương ngọt ngào như Club De Nuit Iimperiale EDP chắc chắn sẽ khiến mỗi nơi bạn bước qua đều để lại một dấu ấn riêng', 2, 8),
(13, 'Do So EDP ', 'Đây sẽ là một chai nước hoa xứng đáng được đứng dầu danh sách cho những ai có niềm đam mê những chai nước hoa có mùi hương chủ đạo về hoa huệ. Hương thơm trong Do Son sẽ nữ tính, gần gũi và ngập tràn ánh nắng, màu sắc sẽ tươi sáng như hình ảnh bãi biển Đồ', 2, 7),
(14, 'Margiela Replica Whispers in the Library EDT', 'Nước hoa Replica Whispers in the Library khiến người ta mường tượng tới những cuốn sách cổ cũ và hiếm trong một thư viện cổ nhuốm màu bụi thời gian. Tay với lên những kệ sách, mùi gỗ sáp thoang thoảng vờn qua mũi. Lật những quyển sách trên kệ, mùi da thuộ', 3, 11),
(15, 'De Marly Herod EDP', 'Nước hoa nam hương thuốc lá Herod không đơn thuần chỉ là một chai nước hoa, Herod tựa như một bộ suit khoác trên mình một người đàn ông trưởng thành với thần thái và khí chất ngút ngàn. Đây sẽ là một kiểu mùi thuốc lá chỉ dành cho những ai thật sự có sự t', 1, 6),
(17, 'Jacobs Daisy EauSo Fresh EDT', 'Không ngừng lại ở vẻ ngoài điệu đà, nữ tính, nước hoa Marc Jacobs Daisy Eau So Fresh mang đến một sự kết hợp đầy hoàn hảo giữa hương thơm hoa cỏ và trái cây vừa đậm đà, vừa thuần tuý như đưa Nàng đến một khu vườn cổ tích rợp sắc hương.', 2, 11),
(18, 'DoveAmber', 'Trong một biển các mùi hương theo phong cách Hoa Hồng - Trầm Hương Rose Aoud, chắc chắn một điều, Roja Dove Amber Aoud là mùi hương được hoàn thiện chắc tay, vui thú, chất lượng, giá trị nhất và hoàn toàn xứng đáng để sưu tầm.', 2, 2),
(19, 'Apogee EDP', 'Nước hoa nữ LV Apogée được đánh giá là một trong 3 mùi bán chạy nhất trong bộ sưu tập mới nhất Les Parfums của thương hiệu Louis Vuitton, hương thơm mở ra những khía cạnh nữ tính, thuần khiết và tinh tế hơn trong nét đẹp của phụ nữ.', 2, 3),
(20, 'Hilfiger Boy EDT', 'Nước hoa Tommy Hilfiger sẽ mang đến một sự hấp dẫn khó có thể chối từ với hương thơm tươi mới, trẻ trung năng động nên rất phù hợp với những chàng trai trẻ.', 1, 6),
(21, 'Paris Black Gold EDP', 'Nước hoa nam Mancera Paris Black Gold EDP là một trong số những tầng hương đem đến sự tao nhã, thanh lịch dành cho các quý ông muốn khẳng định bản thân mình, muốn tìm kiếm sự độc tôn và khác biệt.', 1, 7),
(22, 'Ani Extrait De Parfum', 'Nước hoa unisex Nishane Ani Extrait De Parfum tạo ấn tượng ngay từ những giây phút đầu tiên vì những nốt hương quá tinh tế.', 3, 5),
(23, 'Fuel For Lief EDT', 'Nước hoa nam Diesel Fuel For Life EDT là một mùi hương tuyệt vời dùng khi các quý ông tham gia các hoạt động sôi nổi như đi vũ trường. Đặc biệt hương vị của chai nước hoa cao cấp này có thể dùng vào tất cả các mùa trong năm và trong mọi sự kiện, chắc chắn', 1, 9),
(24, 'Herrera 212 Sexy Woman EDP', 'Nước hoa nữ 212 Sexy Women EDP tạo nên một sức hút quyến rũ cho phái đẹp ngay từ lần xịt đầu tiên đến tận nốt hương cuối cùng.', 2, 5),
(25, 'De Marly Delina EDP', 'Nếu nhà Parfums De Marly cho ra mắt nhưng mùi hương dành cho nam giới mang một sức hút mãnh liệt và kiêu ngạo thì ngược lại, những mùi hương dành cho nữ như nước hoa Delina  đều toát lên một vẻ đẹp tao nhã nhưng lại có sức hút đến bất ngờ. ', 2, 3),
(26, 'Icon For Men EDP', 'Chai nước hoa Dunhill Icon được thiết kế dành riêng cho nam giới luôn được các tín đồ yêu thích nước hoa săn đón với mùi hương đặc biệt nam tính, sang trọng. Người đàn ông khoác lên mình hương thơm Icon là một quý ông nam tính và tinh tế.', 1, 9),
(28, 'fiurnder', 'nvmijsvjks', 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vai_tro` bit(5) NOT NULL DEFAULT b'0',
  `mat_khau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `user_name`, `email`, `vai_tro`, `mat_khau`) VALUES
(1, 'admin', '', b'00001', 'admin'),
(3, 'mung12', 'munglolicon12@gmail.com', b'00000', 'mung12'),
(13, 'vitule', 'mbvte@gmail.com', b'00000', '123'),
(14, 'codon', 'mung@gmail.vn', b'00000', 'mung123'),
(15, 'fsfs', 'munglolicon2k2@gmail.com', b'00000', '123'),
(16, 'mung', 'munglolicon2k2@gmail.com', b'00000', 'munglolicon0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van_chuyen`
--

CREATE TABLE `van_chuyen` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `van_chuyen`
--

INSERT INTO `van_chuyen` (`id`, `name`, `gia`) VALUES
(1, 'Giao hàng tiết kiệm', 24000),
(2, 'Giao hàng nhanh', 26000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeu_thich`
--

CREATE TABLE `yeu_thich` (
  `id` int(10) NOT NULL,
  `id_san_pham` int(10) NOT NULL,
  `id_khach_hang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `yeu_thich`
--

INSERT INTO `yeu_thich` (`id`, `id_san_pham`, `id_khach_hang`) VALUES
(7, 8, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anh_san_pham_ibfk_1` (`id_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dung_tich` (`id_dung_tich`),
  ADD KEY `id_san_pham` (`id_san_pham`),
  ADD KEY `chi_tiet_don_hang_ibfk_4` (`id_don_hang`);

--
-- Chỉ mục cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theTich` (`id_theTich`),
  ADD KEY `gia_chi_tiet_ibfk_1` (`id_sanPham`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_vc` (`id_vc`);

--
-- Chỉ mục cho bảng `dung_tich`
--
ALTER TABLE `dung_tich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_ibfk_1` (`id_khach_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`),
  ADD KEY `id_dt` (`id_dt`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hang` (`id_hang`),
  ADD KEY `id_loai` (`id_loai`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `van_chuyen`
--
ALTER TABLE `van_chuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `yeu_thich_ibfk_2` (`id_san_pham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `dung_tich`
--
ALTER TABLE `dung_tich`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `van_chuyen`
--
ALTER TABLE `van_chuyen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD CONSTRAINT `anh_san_pham_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_dung_tich`) REFERENCES `dung_tich` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_4` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD CONSTRAINT `chi_tiet_sp_ibfk_1` FOREIGN KEY (`id_sanPham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_sp_ibfk_2` FOREIGN KEY (`id_theTich`) REFERENCES `dung_tich` (`id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_vc`) REFERENCES `van_chuyen` (`id`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `tai_khoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `gio_hang_ibfk_3` FOREIGN KEY (`id_dt`) REFERENCES `dung_tich` (`id`);

--
-- Các ràng buộc cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  ADD CONSTRAINT `yeu_thich_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `yeu_thich_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
