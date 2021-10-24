-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 04:24 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyphongkham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacsi`
--

CREATE TABLE `bacsi` (
  `ID_Bacsi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ID_Khoa` int(11) NOT NULL,
  `Hoten` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL CHECK (`Gioitinh` = 'Nam' or `Gioitinh` = 'Nu')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bacsi`
--

INSERT INTO `bacsi` (`ID_Bacsi`, `id`, `ID_Khoa`, `Hoten`, `Ngaysinh`, `Gioitinh`) VALUES
(1, 1, 1, 'ddddfdd', '2021-10-23', 'Nam'),
(14, 2, 1, 'Huynhminhhtu', '2021-10-08', 'nam'),
(18, 2, 1, 'Duongcute1', '2021-10-02', 'nam'),
(25, 2, 1, '12', '2021-10-07', 'nam'),
(26, 2, 1, '54', '2021-10-03', 'nam'),
(27, 2, 1, '', '2021-10-23', 'nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhan`
--

CREATE TABLE `benhan` (
  `ID_Benhan` int(11) NOT NULL,
  `ID_Phongkham` int(11) NOT NULL,
  `Chuandoan` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaytao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `benhan`
--

INSERT INTO `benhan` (`ID_Benhan`, `ID_Phongkham`, `Chuandoan`, `Ngaytao`) VALUES
(1, 1, 'siueuu cuaaaa', '2021-09-28 13:49:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `ID_Benhnhan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Tendangnhap` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Matkhau` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Hoten` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaysinh` datetime NOT NULL,
  `Gioitinh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL CHECK (`Gioitinh` = 'Nam' or `Gioitinh` = 'Nữ')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`ID_Benhnhan`, `id`, `Tendangnhap`, `Matkhau`, `Hoten`, `Ngaysinh`, `Gioitinh`) VALUES
(1, 1, 'Nguyeenx van B', '12345', 'DuongDung', '2021-09-28 13:31:47', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `ID_Khoa` int(11) NOT NULL,
  `Tenkhoa` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaythanhlap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ID_Khoa`, `Tenkhoa`, `Hinhanh`, `Ngaythanhlap`) VALUES
(1, 'Rang ham mat', 'eqwe', '2021-09-28 12:16:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `ID_Lich` int(11) NOT NULL,
  `ID_Phongkham` int(11) NOT NULL,
  `ID_Bacsi` int(11) NOT NULL,
  `Ngay` datetime NOT NULL,
  `Giobatdau` datetime NOT NULL,
  `Gioketthuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`ID_Lich`, `ID_Phongkham`, `ID_Bacsi`, `Ngay`, `Giobatdau`, `Gioketthuc`) VALUES
(1, 1, 1, '2021-09-28 13:47:44', '2021-09-28 13:47:44', '2021-09-28 13:47:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukham`
--

CREATE TABLE `phieukham` (
  `ID_Phieukham` int(11) NOT NULL,
  `ID_Benhnhan` int(11) NOT NULL,
  `Ngaydangky` datetime NOT NULL,
  `Ngayhenkham` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukham`
--

INSERT INTO `phieukham` (`ID_Phieukham`, `ID_Benhnhan`, `Ngaydangky`, `Ngayhenkham`) VALUES
(1, 1, '2021-09-28 13:37:06', '2021-09-28 13:37:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongkham`
--

CREATE TABLE `phongkham` (
  `ID_Phongkham` int(11) NOT NULL,
  `ID_Phieukham` int(11) NOT NULL,
  `Tenphongkham` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Chiphi` int(11) NOT NULL,
  `Trangthai` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaykham` datetime NOT NULL,
  `Diachi` varchar(60) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phongkham`
--

INSERT INTO `phongkham` (`ID_Phongkham`, `ID_Phieukham`, `Tenphongkham`, `Chiphi`, `Trangthai`, `Ngaykham`, `Diachi`) VALUES
(1, 1, 'Doctor Duong', 20000, '123', '2021-09-28 13:40:15', 'Go vap');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `Hoten` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Tendangnhap` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Sodienthoai` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phanquyen` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL CHECK (`Phanquyen` = 'Admin' or `Phanquyen` = 'Doctor' or `Phanquyen` = 'Benhnhan')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `Hoten`, `Tendangnhap`, `Password`, `Email`, `Sodienthoai`, `Phanquyen`) VALUES
(1, 'Mai ANh Duong', 'duong123', '12345', 'đuonguong', '1323456', 'Admin'),
(2, 'Mai ANh Duong1', 'duong123', '12345', 'đuonguong', '1323456', 'Doctor'),
(3, 'Mai ANh Duong2', 'duong123', '12345', 'đuonguong', '1323456', 'Benhnhan'),
(4, 'Bacso', 'duong123', '12345', 'uonguong@123', '213', 'Doctor');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `ID_Thuoc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Tenthuoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Loaithuoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Thongtinthuoc` text COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaynhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`ID_Thuoc`, `id`, `Tenthuoc`, `Loaithuoc`, `Thongtinthuoc`, `Ngaynhap`) VALUES
(1, 1, 'Daurang', 'F1', '', '2021-09-09'),
(2, 2, 'Daurang', 'F1', '', '2021-09-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin`
--

CREATE TABLE `tin` (
  `ID_Bantin` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Noidung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaydang` datetime NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `Tieude` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tin`
--

INSERT INTO `tin` (`ID_Bantin`, `id`, `Noidung`, `Ngaydang`, `Hinhanh`, `Tieude`) VALUES
(1, 1, 'meo meos meo', '2021-09-28 12:14:00', '123214', 'meo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`ID_Bacsi`),
  ADD KEY `ID_Taikhoan` (`id`),
  ADD KEY `ID_Khoa` (`ID_Khoa`);

--
-- Chỉ mục cho bảng `benhan`
--
ALTER TABLE `benhan`
  ADD PRIMARY KEY (`ID_Benhan`),
  ADD KEY `ID_Phongkham` (`ID_Phongkham`);

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`ID_Benhnhan`),
  ADD KEY `ID_Taikhoan` (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ID_Khoa`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`ID_Lich`),
  ADD KEY `ID_Phongkham` (`ID_Phongkham`),
  ADD KEY `ID_Bacsi` (`ID_Bacsi`);

--
-- Chỉ mục cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`ID_Phieukham`),
  ADD KEY `ID_Benhnhan` (`ID_Benhnhan`);

--
-- Chỉ mục cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  ADD PRIMARY KEY (`ID_Phongkham`),
  ADD KEY `ID_Phieukham` (`ID_Phieukham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`ID_Thuoc`),
  ADD KEY `ID_Taikhoan` (`id`);

--
-- Chỉ mục cho bảng `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`ID_Bantin`),
  ADD KEY `ID_Taikhoan` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `ID_Bacsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `benhan`
--
ALTER TABLE `benhan`
  MODIFY `ID_Benhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `ID_Benhnhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ID_Khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `ID_Lich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `ID_Phieukham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  MODIFY `ID_Phongkham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `ID_Thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tin`
--
ALTER TABLE `tin`
  MODIFY `ID_Bantin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`ID_Khoa`) REFERENCES `khoa` (`ID_Khoa`);

--
-- Các ràng buộc cho bảng `benhan`
--
ALTER TABLE `benhan`
  ADD CONSTRAINT `benhan_ibfk_1` FOREIGN KEY (`ID_Phongkham`) REFERENCES `phongkham` (`ID_Phongkham`);

--
-- Các ràng buộc cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviec_ibfk_1` FOREIGN KEY (`ID_Phongkham`) REFERENCES `phongkham` (`ID_Phongkham`),
  ADD CONSTRAINT `lichlamviec_ibfk_2` FOREIGN KEY (`ID_Bacsi`) REFERENCES `bacsi` (`ID_Bacsi`);

--
-- Các ràng buộc cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  ADD CONSTRAINT `phieukham_ibfk_1` FOREIGN KEY (`ID_Benhnhan`) REFERENCES `benhnhan` (`ID_Benhnhan`);

--
-- Các ràng buộc cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  ADD CONSTRAINT `phongkham_ibfk_1` FOREIGN KEY (`ID_Phieukham`) REFERENCES `phieukham` (`ID_Phieukham`);

--
-- Các ràng buộc cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `thuoc_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `tin`
--
ALTER TABLE `tin`
  ADD CONSTRAINT `tin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
