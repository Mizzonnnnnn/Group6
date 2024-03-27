-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 02:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb_webdongho`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SKU_UPC_MPN` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `lengthBuy` int(255) NOT NULL DEFAULT 1 COMMENT 'sô lượng sản phẩm mua ',
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `brand` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sizeHeadder` int(30) NOT NULL,
  `userName` varchar(30) CHARACTER SET utf8mb4 NOT NULL COMMENT 'người mua hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng giỏ hàng';

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `product_id`, `SKU_UPC_MPN`, `price`, `discount`, `lengthBuy`, `image_url`, `brand`, `gender`, `sizeHeadder`, `userName`) VALUES
(5, 'Daniel-Wellington-DW00100630', 'DW00100630', 6380, 20, 1, 'img/products/104-453347516-560362573.png', 'Daniel Wellington', ' nam', 40, 'daoquocviet'),
(6, 'SRWatch-SL3002.4102CV', 'SL3002.4102CV', 1150, 10, 1, 'img/products/SL3002.4102CV-2-1675999610828.png', 'SRWatch', ' nữ', 30, 'daoquocviet'),
(11, 'Frederique_ConstantA11', 'FC-312N4S6', 55810, 2, 3, 'img/products/FC-312N4S6-1-712068579-921437586.png', 'Frederique', ' nam', 40, 'dangthanhhai'),
(12, 'casio', 'casio-5500-bwlg-2002', 17000, 30, 1, 'img/products/465.jpg', 'Calvin KleinN', ' nam', 36, 'dangthanhhai'),
(650253053, 'Fossil-WEE13306-BMW-1990', 'WEE13306-BMW-1990', 400000, 90, 1, 'img/products/SNZG09K1.jpg', 'Zenith', ' nam', 35, 'dangthanhhai');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id danh mục',
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `high_class` int(30) NOT NULL COMMENT 'hàng cao cấp hay không '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='mô tả danh mục ';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `high_class`) VALUES
('id_Calvin_Klein', 'Calvin KleinN', 1),
('id_Certina', 'Certina', 2),
('id_Daniel_Wellington', 'Daniel Wellington', 2),
('id_Fossil', 'Fossil', 2),
('id_Frederique_Constant', 'Frederique Constant', 2),
('id_Hublot', 'Hublot', 1),
('id_MauriceLacroix', 'MauriceLacroix', 0),
('id_Montblanc', 'Montblanc', 0),
('id_Movado', 'Movado', 0),
('id_SevenFriday', 'SevenFriday', 0),
('id_Thomas_Earnshaw', 'Thomas Earnshaw', 0),
('id_Zenith', 'Zenith', 0),
('idBentley', 'Bentley', 1),
('idBulova', 'Bulova', 0),
('idCarnival', 'Carnival', 2),
('idCasio', 'Casio', 1),
('idCitizen', 'Citizen', 2),
('idFrederique', 'Frederique', 1),
('idFreelook', 'Freelook', 1),
('idLongines', 'Longines', 2),
('idMido', 'Mido', 1),
('idOirent', 'Oirent', 2),
('idOrent', 'Orent', 1),
('idOrient_star', 'Orient Star', 2),
('idPossil', 'Possil', 1),
('idRolex', 'Rolex', 1),
('idSeiko', 'Seiko', 0),
('idSRWatch', 'SRWath', 0),
('idTissot', 'Tissot', 0),
('idVerSace', 'VerSace', 2);

-- --------------------------------------------------------

--
-- Table structure for table `infor_orders`
--

CREATE TABLE `infor_orders` (
  `id` int(11) NOT NULL,
  `SKU_UPC_MPN` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `lengthBuy` int(255) NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `brand` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sizeHeadder` int(30) NOT NULL,
  `userName` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infor_orders`
--

INSERT INTO `infor_orders` (`id`, `SKU_UPC_MPN`, `price`, `discount`, `lengthBuy`, `image_url`, `brand`, `gender`, `sizeHeadder`, `userName`) VALUES
(871693279, 'WEE13306-BMW-1990', 400000, 90, 1, 'img/products/SNZG09K1.jpg', 'Zenith', ' nam', 35, 'buingocan'),
(871693279, 'CA4559-13A', 9900, 25, 1, 'img/products/CA4559-13A.png', 'Citizen', ' nam', 43, 'buingocan'),
(1203887740, 'casio-5500-bwlg-2002', 17000, 30, 1, 'img/products/465.jpg', 'Calvin KleinN', ' nam', 36, 'dangthanhhai'),
(1203887740, 'BL1831-15MKWD', 10040, 50, 3, 'img/products/BL1831-15MKWD-3-1869775477-910942131.png', 'Calvin KleinN', ' nam', 40, 'dangthanhhai'),
(358760901, 'FC-312N4S6', 55810, 2, 3, 'img/products/FC-312N4S6-1-712068579-921437586.png', 'Frederique', ' nam', 40, 'dangthanhhai'),
(358760901, 'casio-5500-bwlg-2002', 17000, 30, 1, 'img/products/465.jpg', 'Calvin KleinN', ' nam', 36, 'dangthanhhai');

-- --------------------------------------------------------

--
-- Table structure for table `list_orders`
--

CREATE TABLE `list_orders` (
  `idList` int(255) NOT NULL COMMENT 'hóa đơn',
  `namePeople` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'người mua hàng',
  `address` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ mua hàng',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email người mua',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumbers` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số điện thoại',
  `status` int(30) NOT NULL DEFAULT 0 COMMENT 'tình trạng đơn',
  `dateOder` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ngày mua hàng',
  `price` double NOT NULL,
  `userName` varchar(32) CHARACTER SET utf8mb4 NOT NULL COMMENT 'in hóa đơn người mua'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng danh sách gọi ';

--
-- Dumping data for table `list_orders`
--

INSERT INTO `list_orders` (`idList`, `namePeople`, `address`, `email`, `note`, `phoneNumbers`, `status`, `dateOder`, `price`, `userName`) VALUES
(358760901, 'đặng thanh hải', '41 thượng lỗi phường lộc vượng nam định', 'danghoanghai2k2@gmail.com', 'giao vào buổi trưa và buổi chiều ', '0387249884', 3, '15h-21m-40s  08/11/2023', 175981.4, 'dangthanhhai'),
(871693279, 'đặng thanh hải', '41 thượng lỗi phường lộc vượng nam định', 'danghoanghai2k2@gmail.com', 'không', '0387249884', 0, '23h-40m-40s  07/11/2023', 47425, 'buingocan'),
(1203887740, 'đặng thanh hải', '41 thượng lỗi phường lộc vượng nam định', 'danghoanghai2k2@gmail.com', 'không', '0387249884', 0, '00h-29m-25s  08/11/2023', 26960, 'dangthanhhai');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm',
  `SKU_UPC_MPN` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tải sản phẩm',
  `price` float(255,0) NOT NULL COMMENT 'giá cả',
  `discount` float DEFAULT 0 COMMENT 'giảm giá sản phẩm\r\n',
  `length` int(255) NOT NULL COMMENT 'só lượng',
  `image_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh mô tả sảng phẩm',
  `category_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'khóa ngoại danh mục ',
  `brand` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'nhà sản xuất',
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'giới tính đeo',
  `sizeHeadder` int(30) NOT NULL COMMENT 'size mặt đồng hồ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng mô tả sản phẩm ';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `SKU_UPC_MPN`, `description`, `price`, `discount`, `length`, `image_url`, `category_id`, `brand`, `gender`, `sizeHeadder`) VALUES
('Bentley-BL1831-15MKWD', 'BL1831-15MKWD', 'Dây da, Kính Sapphire, Vỏ thép không gỉ, Mặt tròn, Màu vỏ Vàng, Màu mặt Mặt Vàng', 10040, 50, 15, 'img/products/BL1831-15MKWD-3-1869775477-910942131.png', 'id_Calvin_Klein', 'Calvin KleinN', 'nam', 40),
('Bentley-BL1831-25MWNN ', 'BL1831-25MWNN ', 'Dây da, Kính Sapphire, Vỏ thép không gỉ, Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt xanh', 6300, 30, 20, 'img/products/BL1831-25MWNN-1-1654749818317.png', 'id_Calvin_Klein', 'Bentley', 'nam', 41),
('Bulova-96L273', '96L273', 'Dây kim loại, Kính Khoáng, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt đen, ', 5200, 32, 0, 'img/products/96L273.png', 'idBulova', 'Bulova', 'nữ', 32),
('Bulova-98A224', '98A224', 'Dây Kim Loại, Kính Khoáng, Vỏ Thép Không Gỉ, Hình Dạng Mặt Tròn, Màu Vỏ Bạc, Màu Mặt Mặt Đen,', 9990, 28, 11, 'img/products/96L273.png', 'idBulova', 'Bulova', 'nam', 36),
('casio', 'casio-5500-bwlg-2002', 'đồng hồ chính hãng giá rẻ, sản xuất ở thụy sĩ, mặt tròn đep, màu vàng kim óng, kháng nước', 17000, 30, 8, 'img/products/465.jpg', 'id_Calvin_Klein', 'Calvin KleinN', 'nam', 36),
('Casio_AE1200', 'AE-1200WHD-1AVDF', 'Dây kim loại, Kính Nhựa, Vỏ nhựa, Mặt vuông, Màu xám', 6550, 7, 16, 'img/products/1-KHUNG-SP-6676612-1785849039.png', 'idCasio', 'Casio', 'nam', 42),
('Casio_AE1222', 'LA670WA-7DF', 'Dây kim loại, Kính Nhựa, Mặt vuông, Màu xám, Đồng hồ Nhật,Vỏ nhựa', 5000, 5, 5, 'img/products/LA670WA-7DF.png', 'idCasio', 'Casio', 'nữ', 25),
('Casio_AE1223', 'LW-204-4ADF', 'Dây Nhựa,Kính Nhựa, Đồng Hồ Nhật , Vỏ Nhựa , Màu Hồng, Mặt chữ nhật', 3500, 0, 10, 'img/products/LW-204-4ADF.jpg', 'idCasio', 'Casio', 'nữ', 35),
('Casio_MTP1374', 'MTP-1374L-1AVDF', 'Kính Khoáng, Đồng hồ Nhật, Vỏ thép không gỉ, Mặt tròn ,Mặt đen ,Dây da', 2990, 25, 11, 'img/products/1-KHUNG-SP-1-1818542633-1853976209.png', 'idCasio', 'Casio', 'nam', 44),
('Casio_MTPVT01', 'MTP-VT01L-1BUDF', 'Dây da, Kính Khoáng, Vỏ thép không gỉ, Đồng hồ Nhật, Mặt tròn', 108800, 26, 0, 'img/products/1-KHUNG-SP-1295457203-1427251284.png', 'idCasio', 'Casio', 'nam', 40),
('Citizen-BI1054-12E ', 'BI1054-12E ', 'Dây da, Kính Khoáng, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt đen', 3650, 25, 20, 'img/products/Bi1054-12E-773718459-520019565.png', 'idCitizen', 'Citizen ', 'nam', 40),
('Citizen-CA4559-13A', 'CA4559-13A', 'Dây da, Kính Khoáng, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt bạc', 9900, 25, 19, 'img/products/CA4559-13A.png', 'idCitizen', 'Citizen', 'nam', 43),
('Citizen-EU6060-55D', 'EU6060-55D', 'Dây kim loai, Kính Khoáng, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt bạc', 4000, 10, 20, 'img/products/EU6060-55D-1368129322-1310029729.png', 'idCitizen', 'Citizen ', 'nữ', 26),
('Citizen-NH8363-14H', 'NH8363-14H', 'Dây da, Kính Khoáng, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt bạc', 5500, 25, 30, 'img/products/NH8363-14H-392544854-264900313.png', 'idCitizen', 'Citizen', 'nam', 41),
('Daniel-Wellington-DW00100617', 'DW00100617', 'Pin/Quartz, Dây kim loại, Kính Khoáng, Hình dạng\r\nMặt tròn, Màu vỏ Đen, Màu mặt Mặt đen', 5450, 20, 0, 'img/products/95-1812737348-1074726461.png', 'id_Daniel_Wellington', 'Daniel Wellington', 'nữ', 28),
('Daniel-Wellington-DW00100630', 'DW00100630', 'Pin/Quartz, Dây kim loại, Kính Khoáng, Hình dạng\r\nMặt tròn, Màu vỏ Đen, Màu mặt Mặt đen', 6380, 20, 18, 'img/products/104-453347516-560362573.png', 'id_Daniel_Wellington', 'Daniel Wellington', 'nam', 40),
('Fossil-WEE13306-BMW-1990', 'WEE13306-BMW-1990', 'không', 400000, 90, 9, 'img/products/SNZG09K1.jpg', 'id_Zenith', 'Zenith', 'nam', 35),
('Frederique Constant_FC_50N4H4', 'FC-750N4H4', 'Dây da, Kính Sapphire, Đồng hồ Thụy Sỹ, Vàng & thép không gỉ, Mặt tròn ,Màu vỏ Đen ,Màu mặt Mặt xanh', 113000, 20, 10, 'img/products/FC-750N4H4.png', 'id_Frederique_Constant', 'Frederique Constant', 'nam', 42),
('Frederique_Constant_ FC_718DGW', 'FC-718DGWM4H4', 'Dây da, Kính Sapphire, Vỏ thép không gỉ, Mặt tròn, Màu vỏ Vàng hồng, Màu mặt Mặt đen', 110000, 20, 10, 'img/products/FC-718DGWM4H4-1-255745138-2087854650.png', 'id_Frederique_Constant', 'Frederique Constant', 'nam', 42),
('Frederique_Constant_FC_718NWM4', 'FC-718NWM4H6', 'Dây da, Kính Sapphire, Đồng hồ Thụy Sỹ, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc', 107620, 20, 10, 'img/products/FC-718NWM4H6-1-1675157716186.png', 'id_Frederique_Constant', 'Frederique Constant', 'nam', 42),
('Frederique_ConstantA11', 'FC-312N4S6', 'Cơ/Automatic, Kính Sapphire, Đồng hồ Thụy Sỹ, Vỏ thép không gỉ, Mặt tròn, Màu bạc', 55810, 2, 7, 'img/products/FC-312N4S6-1-712068579-921437586.png', 'idFrederique', 'Frederique', 'nam', 40),
('Frederique-Constant-FC-710N4S4', 'FC-710N4S4', 'Dây da, Kính Sapphire, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Vàng hồng, Màu mặt Mặt xanh', 740000, 20, 20, 'img/products/FC-710N4S4-1-1282919101-1490375643.png', 'id_Frederique_Constant', 'Frederique Constant', 'nam', 42),
('Frederique-Constant-FC-718DGWM', 'FC-718DGWM4H4 ', 'Dòng máy Cơ/Automatic,Chất liệu dây,Dây da,Kính Sapphire, Chất liệu vỏ, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Vàng hồng, Màu mặt Mặt đen', 98000, 30, 20, 'img/products/FC-718DGWM4H4-1-255745138-2087854650.png', 'id_Frederique_Constant', 'Frederique Constant', 'nam', 42),
('Hublo-550.NS.1800.RX.ORL19', '550.NS.1800.RX.ORL19', '', 290000, 20, 13, 'img/products/550.NS.1800.RX.ORL19-1-1658982112522.png', 'id_Hublot', 'Hublot ', 'nam', 40),
('Hublot- 465.SX.1170.RX.1604', '465.SX.1170.RX.1604', 'Big Bang, Dây cao su, Đồng hồ Thụy Sỹ, Vỏ thép không gỉ, Hình dạng Mặt tròn ,Màu vỏ\r\nBạc', 600000, 20, -4, 'img/products/465-813045092-212636212.png', 'id_Hublot', 'Hublot ', 'nam', 39),
('Hublot-547.NX.0170.LR.1104', '547.NX.0170.LR.1104', '', 500000, 43, 13, 'img/products/5-1667646897986.png', 'id_Hublot', 'Hublot', 'nam', 42),
('Hublot-550.OS.1800.RX.ORL19', '550.OS.1800.RX.ORL19', 'Classic Fusion, Dây da, Kính Sapphire, Đồng hồ Nhật, Hình dạng Mặt tròn ,Màu vỏ Bạc', 500000, 20, 6, 'img/products/5-1667646897986.png', 'id_Hublot', 'Hublot', 'nam', 42),
('Hublot-OS.2200.RW.ORL20', '550.OS.2200.RW.ORL20', 'Classic Fusion, Dây da, Kính Sapphire, Đồng hồ Nhật, Hình dạng Mặt tròn ,Màu vỏ Bạc', 467500, 10, 14, 'img/products/550-1664255757-1588057472.png', 'id_Hublot', 'Hublot', 'nam', 40),
('Longines_385N', 'L2.628.4.97.0', 'Master Collection, Dây da, \r\nKính Sapphire, Đồng hồ Thụy Sỹ ,Vỏ thép không gỉ, Mặt tròn , Màu Bạc', 69000, 28, 3, 'img/products/L2-1631370034-625115582.png', 'idLongines', 'Longines', 'nam', 39),
('Longines_Indexes', 'L4.921.2.52.7', 'Presence, Dây kim loại, Kính Sapphire, Đồng hồ Thụy Sỹ, Vỏ thép không gỉ, Mặt tròn, Màu Vàng', 35000, 0, 30, 'img/products/l4.921.2.52.7-1-1667212899073.png', 'idLongines', 'Longines', 'Nam', 39),
('Longines_L2_798_5_72_7', 'L2.798.5.72.7', 'Dây da, Kính Sapphire, Đồng hồ Thụy Sỹ, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc', 85000, 26, 10, 'img/products/L2-1167662682-671655372.png', 'idLongines', 'Longines', 'nam', 42),
('Longines_L2_8215_57_7', 'L2.821.5.57.7', 'Vàng & thép không gỉ, Kính Sapphire,Đồng hồ Thụy Sỹ, Mặt tròn, Màu vỏ Bạc ,Màu mặt Mặt xanh', 104000, 46, 20, 'img/products/L2.821.5.57.7-1-1653299675411.jpg', 'idLongines', 'Longines', 'Nam', 40),
('Longines-L4.274.8.27.2', 'L4.274.8.27.2', 'Dây da, Kính Sapphire, Đồng hồ Thụy Sỹ, Hình dạng Mặt tròn, Màu vỏ Vàng hồng', 90000, 10, 10, 'img/products/L2-293863347-379593281.png', 'idLongines', 'Longines', 'nữ', 26),
('Longines-L4.705.2.11.2', 'L4.705.2.11.2', 'Chất liệu dây,Dây da,Kính Sapphire, Chất liệu vỏ, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Vàng hồng, Màu mặt Mặt đen', 23200, 20, 10, 'img/products/L4-166199694-1928318497.png', 'idLongines', 'Longines ', 'nữ', 37),
('Rolex- M126715CHNR-0001', 'M126715CHNR-0001', 'Đáy vặn, Oyster mối nối 3 mảnh chắc chắn, Cơ/Automatic, Dạ Quang, Hình dạng Mặt tròn, Màu mặt Mặt đen', 300000, 20, 6, 'img/products/M126715CHNR-0001.png', 'idRolex', 'Rolex', 'nữ', 40),
('Rolex-M124060-0001', 'M124060-0001', 'Đáy vặn, Oyster mối nối 3 mảnh chắc chắn, Cơ/Automatic, Dạ Quang, Chất liệu vỏ Thép Oystersteel, Hình dạng Mặt tròn ,Màu mặt Mặt đen', 315000, 5, 13, 'img/products/M124060-0001.png\r\n', 'idRolex', 'Rolex', 'nam', 41),
('Rolex-M126500LN-0001', 'M126500LN-0001', 'Đáy vặn, Loại dây Mối Nối 3 Mảnh, Cơ/Automatic, Dạ Quang, Kính Sapphire, Hình dạng Mặt tròn, Màu mặt Mặt trắng', 650000, 50, 10, 'img/products/M126500LN-0001-1552426128-976540737.jpg', 'idRolex', 'Rolex', 'nữ', 40),
('Rolex-M126505-0001', 'M126505-0001', 'Loại dây Mối Nối 3 Mảnh, Cơ/Automatic, Dạ Quang, Kính Sapphire, Hình dạng Mặt tròn,Màu mặt Mặt đen ', 500000, 40, 12, 'img/products/M126505-0001.jpg', 'idRolex', 'Rolex ', 'nam', 40),
('Rolex-M126710BLNR-0003', 'M126710BLNR-0003', 'Đáy vặn, Oyster mối nối 3 mảnh chắc chắn, Cơ/Automatic, Dạ Quang, Hình dạng Mặt tròn, Màu mặt Mặt Xanh', 300000, 10, 7, 'img/products/M126710BLNR-0003.png', 'idRolex', 'Rolex', 'nữ', 40),
('Seiko-SFQ803 ', 'SFQ803 ', 'Dây kim loại,Chất liệu kính  Hardlex Crystal,  Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ trắng,Màu mặt hồng', 5500, 30, 20, 'img/products/SFQ803.png', 'idSeiko', 'Seiko', 'nữ', 30),
('Seiko-SNDV29P1', 'SNDV29P1', '', 5000, 0, 10, 'img/products/dong-ho-seiko-sndv292_1-ims.png', 'idSeiko', 'Seiko', 'nữ', 33),
('Seiko-SNK809K2', 'SNK809K2', 'Dây dù/vải,Chất liệu kính  Hardlex Crystal,  Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc,Màu mặt Mặt đen', 5500, 10, 20, 'img/products/SNZG15K1-1627374858892.png', 'idSeiko', 'Seiko', 'nam', 37),
('Seiko-SNZG09K1', 'SNZG09K1', 'Dây dù/vải, Chất liệu kính Hardlex Crystal, \r\nHình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Xanh lục, Vỏ thép không gỉ', 58000, 10, 14, 'img/products/SNZG09K1.jpg', 'idSeiko', 'Seiko', 'nam', 42),
('Seiko-SNZG13K1', 'SNZG13K1', 'Dây kim loại, Đồng hồ Nhật, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt đen', 5100, 13, 20, 'img/products/SNZG13K1.png', 'idSeiko', 'Seiko ', 'nam', 42),
('Seiko-SUR638P1', 'SUR638P1', 'Dây da, Đồng hồ Nhật, Vỏ thép không gỉ, Hình dạng Mặt tròn, Màu vỏ vàng, Màu mặt Mặt đen', 5050, 10, 20, 'img/products/SUR638P1.png', 'idSeiko', 'Seiko', 'nữ', 29),
('Seiko-SYMG42K1', 'SYMG42K1', 'Dây kim loại, Chất liệu kính Hardlex Crystal, \r\nHình dạng Mặt tròn, Màu vỏ vàng, Màu mặt Xanh vàng, Vỏ thép không gỉ', 63500, 30, 20, 'img/products/SYMG42K1.png', 'idSeiko', 'Seiko', 'nữ', 26),
('SRWatch-SG99993.4601GLA', 'SG99993.4601GLA', 'Kính Sapphire , Vỏ thép không gỉ, Đồng hồ Nhật, Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt trắng, ', 9995, 10, 5, 'img/products/SG99993.4601GLA-2-1641636027301.png', 'idSRWatch', 'SRWatch', 'nam', 41),
('SRWatch-SL3002.4102CV', 'SL3002.4102CV', 'Kính Sapphire , Vỏ thép không gỉ, Đồng hồ Nhật, Mặt tròn, Màu vỏ Bạc, Màu mặt Mặt trắng, ', 1150, 10, 13, 'img/products/SL3002.4102CV-2-1675999610828.png', 'idSRWatch', 'SRWatch', 'nữ', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `userName` varchar(32) NOT NULL COMMENT 'tên người dùng',
  `passWord` varchar(32) NOT NULL COMMENT 'mật khẩu',
  `Name` varchar(32) NOT NULL COMMENT 'tên người dùng',
  `role` varchar(10) NOT NULL DEFAULT 'user' COMMENT 'quyền truy cập'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bảng đăng nhập';

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`userName`, `passWord`, `Name`, `role`) VALUES
('administrator', '0192023a7bbd73250516f069df18b500', 'thanh hải', 'admin'),
('buingocan', 'a5a1cb054c749ccaf714b2f9dac45531', 'ngọc an', 'user'),
('danghoanghai', '47afacc69a6c53999baf39d598679504', 'hoàng hải', 'user'),
('dangthanhhai', '788a6cdc890262a079be83c3236a803a', 'thanh hải', 'user'),
('daoquocviet', '7b62af5c577d0a1a1ecf14e2258ffeb1', 'việt đào', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `list_orders`
--
ALTER TABLE `list_orders`
  ADD PRIMARY KEY (`idList`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650253054;

--
-- AUTO_INCREMENT for table `list_orders`
--
ALTER TABLE `list_orders`
  MODIFY `idList` int(255) NOT NULL AUTO_INCREMENT COMMENT 'hóa đơn', AUTO_INCREMENT=1543071812;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user_admin` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list_orders`
--
ALTER TABLE `list_orders`
  ADD CONSTRAINT `list_orders_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user_admin` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
