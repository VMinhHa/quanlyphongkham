-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 03:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyphongkham`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `ID_Bacsi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ID_Khoa` int(11) NOT NULL,
  `Hoten` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'anh1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`ID_Bacsi`, `id`, `ID_Khoa`, `Hoten`, `Ngaysinh`, `Gioitinh`, `image`) VALUES
(44, 2, 4, 'MaiAnhDuong', '2021-10-07', 'Nam', 'anh1.jpg'),
(49, 4, 4, 'huynhminhthu', '2021-10-23', 'Nam', '1635595320_anh1.jpg'),
(51, 7, 8, 'ha', '1999-06-08', 'Nam', '1635690720_1635686820_bacsi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `benhan`
--

CREATE TABLE `benhan` (
  `ID_Benhan` int(11) NOT NULL,
  `ID_Phongkham` int(11) NOT NULL,
  `Chuandoan` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `benhan`
--

INSERT INTO `benhan` (`ID_Benhan`, `ID_Phongkham`, `Chuandoan`, `Ngaytao`) VALUES
(1, 2, 'bị sốt', '2021-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `ID_Benhnhan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Hoten` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL CHECK (`Gioitinh` = 'Nam' or `Gioitinh` = 'Nữ')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`ID_Benhnhan`, `id`, `Hoten`, `Ngaysinh`, `Gioitinh`) VALUES
(2, 3, 'MaiAnhDuong', '2021-10-13', 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `ID_Khoa` int(11) NOT NULL,
  `Tenkhoa` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaythanhlap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`ID_Khoa`, `Tenkhoa`, `Hinhanh`, `Ngaythanhlap`) VALUES
(4, 'Khoa răng2', 'anh2.jpg', '2021-10-28'),
(6, 'Khoa tim 3', 'anh2.jpg', '2021-10-28'),
(8, 'Khoa Mắt', '1635690660_1635686520_22.jpg', '1998-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `lichhen`
--

CREATE TABLE `lichhen` (
  `id_Lichhen` int(11) NOT NULL,
  `ID_Benhnhan` int(11) NOT NULL,
  `ID_Bacsi` int(11) NOT NULL,
  `Ngayhen` date NOT NULL,
  `Giohen` time NOT NULL,
  `Trangthai` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'đang chờ',
  `NgayTao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `lichhen`
--

INSERT INTO `lichhen` (`id_Lichhen`, `ID_Benhnhan`, `ID_Bacsi`, `Ngayhen`, `Giohen`, `Trangthai`, `NgayTao`) VALUES
(2, 2, 44, '2021-10-20', '19:21:22', 'đang chờ', '2021-10-30 15:21:22'),
(3, 2, 49, '2021-10-20', '19:21:22', 'Xác nhận', '2021-10-30 15:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `ID_Lich` int(11) NOT NULL,
  `ID_Phongkham` int(11) NOT NULL,
  `ID_Bacsi` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `Giobatdau` time NOT NULL,
  `Gioketthuc` time NOT NULL,
  `Tinhtrang` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `lichlamviec`
--

INSERT INTO `lichlamviec` (`ID_Lich`, `ID_Phongkham`, `ID_Bacsi`, `Ngay`, `Giobatdau`, `Gioketthuc`, `Tinhtrang`) VALUES
(16, 2, 44, '2021-10-20', '14:55:00', '14:55:00', 'Bận'),
(17, 2, 44, '2021-10-13', '22:00:00', '23:00:00', 'Xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `phieukham`
--

CREATE TABLE `phieukham` (
  `ID_Phieukham` int(11) NOT NULL,
  `ID_Benhnhan` int(11) NOT NULL,
  `Ngaydangky` datetime NOT NULL,
  `Ngayhenkham` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phieukham`
--

INSERT INTO `phieukham` (`ID_Phieukham`, `ID_Benhnhan`, `Ngaydangky`, `Ngayhenkham`) VALUES
(3, 2, '2021-10-27 15:53:04', '2021-10-27 15:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `phongkham`
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
-- Dumping data for table `phongkham`
--

INSERT INTO `phongkham` (`ID_Phongkham`, `ID_Phieukham`, `Tenphongkham`, `Chiphi`, `Trangthai`, `Ngaykham`, `Diachi`) VALUES
(2, 3, 'Phòng tai mũi họng', 500, 'xác nhận', '2021-10-27 15:53:23', '12 Nguyen văn bảo');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `Tendangnhap` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(70) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT '827ccb0eea8a706c4c34a16891f84e7b',
  `Email` varchar(70) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phanquyen` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL CHECK (`Phanquyen` = 'Admin' or `Phanquyen` = 'Doctor' or `Phanquyen` = 'Benhnhan')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `Tendangnhap`, `Password`, `Email`, `Phanquyen`) VALUES
(1, 'duong1234', '827ccb0eea8a706c4c34a16891f84e7b', 'duonguong@123', 'Admin'),
(2, 'duong12', '827ccb0eea8a706c4c34a16891f84e7b', '124@gmail.om', 'Doctor'),
(3, 'duong123', '827ccb0eea8a706c4c34a16891f84e7b', 'đuonguong', 'Benhnhan'),
(4, 'duong', '827ccb0eea8a706c4c34a16891f84e7b', 'uonguong@123', 'Doctor'),
(5, 'huynhminhthu', '827ccb0eea8a706c4c34a16891f84e7b', '2133@gmail.com', 'Benhnhan '),
(6, 'duongduong', '827ccb0eea8a706c4c34a16891f84e7b', 'maianhduong9a6@gmail.com', 'Benhnhan'),
(7, 'minhha', '827ccb0eea8a706c4c34a16891f84e7b', 'minhha123@gmail.com', 'Doctor ');

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `ID_Thuoc` int(11) NOT NULL,
  `Tenthuoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Loaithuoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Thongtinthuoc` text COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaynhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`ID_Thuoc`, `Tenthuoc`, `Loaithuoc`, `Thongtinthuoc`, `Ngaynhap`) VALUES
(1, 'Daurang', 'F1', 'dsadsa                        ', '2021-09-09'),
(5, 'Panadol Extra', 'Cún', '                        Panadol là thuốc giảm đau, hạ sốt và chuyên điều trị các triệu chứng cảm cúm, cảm lạnh. 1                        ', '2021-10-29'),
(6, 'Thuốc Canxi', 'Calci-Extra', 'Điều trị và ngăn ngừa lượng calci trong máu thấp, loãng xương và còi xương.', '2021-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `tin`
--

CREATE TABLE `tin` (
  `ID_Bantin` int(11) NOT NULL,
  `Noidung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaydang` datetime NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `Tieude` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tin`
--

INSERT INTO `tin` (`ID_Bantin`, `Noidung`, `Ngaydang`, `Hinhanh`, `Tieude`) VALUES
(1, 'meo meos meo', '2021-09-28 12:14:00', '123214', 'meo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`ID_Bacsi`),
  ADD KEY `ID_Khoa` (`ID_Khoa`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `benhan`
--
ALTER TABLE `benhan`
  ADD PRIMARY KEY (`ID_Benhan`),
  ADD KEY `ID_Phongkham` (`ID_Phongkham`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`ID_Benhnhan`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ID_Khoa`);

--
-- Indexes for table `lichhen`
--
ALTER TABLE `lichhen`
  ADD PRIMARY KEY (`id_Lichhen`),
  ADD KEY `ID_Benhnhan` (`ID_Benhnhan`),
  ADD KEY `ID_Bacsi` (`ID_Bacsi`);

--
-- Indexes for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`ID_Lich`),
  ADD KEY `ID_Phongkham` (`ID_Phongkham`),
  ADD KEY `ID_Bacsi` (`ID_Bacsi`);

--
-- Indexes for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`ID_Phieukham`),
  ADD KEY `ID_Benhnhan` (`ID_Benhnhan`);

--
-- Indexes for table `phongkham`
--
ALTER TABLE `phongkham`
  ADD PRIMARY KEY (`ID_Phongkham`),
  ADD KEY `ID_Phieukham` (`ID_Phieukham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`ID_Thuoc`);

--
-- Indexes for table `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`ID_Bantin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `ID_Bacsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `benhan`
--
ALTER TABLE `benhan`
  MODIFY `ID_Benhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `ID_Benhnhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ID_Khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lichhen`
--
ALTER TABLE `lichhen`
  MODIFY `id_Lichhen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `ID_Lich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `ID_Phieukham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phongkham`
--
ALTER TABLE `phongkham`
  MODIFY `ID_Phongkham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `ID_Thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tin`
--
ALTER TABLE `tin`
  MODIFY `ID_Bantin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`ID_Khoa`) REFERENCES `khoa` (`ID_Khoa`),
  ADD CONSTRAINT `bacsi_ibfk_3` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `benhan`
--
ALTER TABLE `benhan`
  ADD CONSTRAINT `benhan_ibfk_1` FOREIGN KEY (`ID_Phongkham`) REFERENCES `phongkham` (`ID_Phongkham`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `lichhen`
--
ALTER TABLE `lichhen`
  ADD CONSTRAINT `lichhen_ibfk_2` FOREIGN KEY (`ID_Benhnhan`) REFERENCES `benhnhan` (`ID_Benhnhan`),
  ADD CONSTRAINT `lichhen_ibfk_3` FOREIGN KEY (`ID_Bacsi`) REFERENCES `bacsi` (`ID_Bacsi`);

--
-- Constraints for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviec_ibfk_1` FOREIGN KEY (`ID_Phongkham`) REFERENCES `phongkham` (`ID_Phongkham`),
  ADD CONSTRAINT `lichlamviec_ibfk_2` FOREIGN KEY (`ID_Bacsi`) REFERENCES `bacsi` (`ID_Bacsi`);

--
-- Constraints for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD CONSTRAINT `phieukham_ibfk_1` FOREIGN KEY (`ID_Benhnhan`) REFERENCES `benhnhan` (`ID_Benhnhan`);

--
-- Constraints for table `phongkham`
--
ALTER TABLE `phongkham`
  ADD CONSTRAINT `phongkham_ibfk_1` FOREIGN KEY (`ID_Phieukham`) REFERENCES `phieukham` (`ID_Phieukham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
