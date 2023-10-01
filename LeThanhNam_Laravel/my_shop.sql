-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2023 at 08:36 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idCart` int NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `money` int DEFAULT NULL,
  `state` varchar(126) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idCart`, `email`, `date`, `money`, `state`) VALUES
(1, 'nammam123156@gmail.com', '2023-05-17 10:01:34', 321, 'Wait for confirmation'),
(2, 'lethanhnam330@gmail.com', '2023-05-19 17:04:49', 52480000, 'Delivering'),
(3, 'demo@gmail.com', '2023-05-19 17:11:48', 67980000, 'Delivering'),
(4, 'lethanhnam330@gmail.com', '2023-05-23 09:09:42', 39998000, 'Wait for confirmation'),
(5, 'demo@gmail.com', '2023-09-29 16:36:37', 1000000, 'hh'),
(7, 'lethanhnam330@gmail.com', '2023-09-29 17:00:52', NULL, NULL),
(8, NULL, '2023-10-01 11:11:28', NULL, 'Wait for confirmation'),
(9, NULL, '2023-10-01 11:28:04', NULL, 'Wait for confirmation'),
(10, NULL, '2023-10-01 11:28:36', NULL, 'Wait for confirmation'),
(11, NULL, '2023-10-01 11:29:30', NULL, 'Wait for confirmation'),
(12, NULL, '2023-10-01 11:33:03', NULL, 'Wait for confirmation'),
(13, NULL, '2023-10-01 11:39:04', 56970000, 'Wait for confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `idCart` int NOT NULL,
  `idProduct` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`idCart`, `idProduct`, `quantity`) VALUES
(1, 1, 1),
(2, 13, 1),
(2, 14, 1),
(3, 14, 2),
(4, 16, 2),
(12, 1, 1),
(12, 2, 2),
(13, 1, 1),
(13, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int NOT NULL,
  `idTypeProduct` int DEFAULT NULL,
  `nameProduct` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imageProduct` varchar(126) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contentProduct` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `priceProduct` int DEFAULT NULL,
  `screen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `CPU` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `RAM` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hardDrive` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `idTypeProduct`, `nameProduct`, `imageProduct`, `contentProduct`, `priceProduct`, `screen`, `CPU`, `RAM`, `hardDrive`) VALUES
(1, 1, 'nameProduct222', 'image_1.png', 'Laptop Asus TUF Gaming FX506HF-HN017W i5 11400H/16GB/512GB/GeForce RTX 2050 4GB/Win11', 19990000, '15.6 inch, FHD (1920 x 1080), IPS, 144 Hz, Anti - Glare', 'Intel, Core i5, 11400H', '16 GB (2 thanh 8 GB), DDR4, 3200 MHz', 'SSD 512 GB'),
(2, 1, 'Laptop Asus Vivobook 15 OLED A1505VA-L1113W i5', 'image_2.png', 'Sở hữu thiết kế sang trọng vốn có và cấu hình mạnh mẽ từ CPU AMD R5 cùng với 16GB DDR4, bạn chắc chắn sẽ hài lòng với hiệu năng mà nó đem lại. Những nâng cấp mới và hiện đại nhất như màn hình OLED, hệ thống tản nhiệt kép, kết nối thế hệ mới,...cũng đ', 18490000, '15.6 inch, 1920 x 1080 Pixels, IPS, 60 Hz, 600 nits, FHD', 'Intel, Core i5, 13500H', '16 GB, DDR4, 3200 MHz', 'SSD 512 GB'),
(3, 1, 'Laptop Asus Vivobook Pro M6500QC-MA002W R5 5600H', 'image_3.png', 'Vivobook Pro M6500QC-MA0 được trang bị cấu hình khủng không thua kém dòng laptop cao cấp nào. CPU AMD Ryzen 5, bộ nhớ RAM 16GB DDR4, hỗ trợ SSD 512GB PCIe và card đồ họa NVIDIA GeForce RTX 3050, laptop Asus Vivobook Pro 15 OLED cung cấp sức mạnh ', 22990000, '15.6 inch Chính:, 2880 x 1620 Pixels, OLED, 120 Hz, 600 nits, OLED Chính:', 'AMD, Ryzen 5, 5600H', '16 GB (1 thanh 16 GB), DDR4, 3200 MHz', 'SSD 512 GB'),
(4, 1, 'Laptop Asus Vivobook M3500QC-L1516W R9 5900HX', 'image_4.png', 'ASUS Vivobook M3500QC-L1516W R9 5900  mang lại trải nghiệm hình ảnh tốt hơn với trang bị màn hình OL, sở hữu một màu xanh đen đẹp mắt với thiết kế vuông vắn đầy tinh tế. Bản lề được thiết kế tự tạo một góc nghiêng vừa phải khi mở nắp máy tính lên. ', 18999000, '15.6 inch Chính:, 1920 x 1080 Pixels, OLED, 60 Hz, 600 nits, OLED Chính:', 'AMD, Ryzen 9, 5900HX', '16 GB (1 thanh 16 GB), DDR4, 3200 MHz', 'SSD 512 GB'),
(5, 2, 'Laptop Acer Aspire 7 A715 76 57CY', 'image_5.png', 'Acer Aspire 7 A715 76 57CY sở hữu ngoại hình thon gọn và thanh mảnh quen thuộc thường thấy ở những model laptop văn phòng. Khoác lên mình chiếc áo khoác đen mạnh mẽ, Acer Aspire 7 được chau chuốt từng chi tiết nhỏ khiến tổng thể máy trông sang trọng ', 15999000, '15.6\" FHD (1920 x 1080) IPS SlimBezel, Anti-Glare, 60Hz', 'Intel Core  i5-12450H Up to 4,40Ghz ,8 Cores 12 Threads, 12 MB Intel® Smart Cache', '8GB DDR4 (2x SO-DIMM socket, up to 32GB SDRAM)', '512GB PCIe® NVMe™ M.2 SSD'),
(6, 2, 'Laptop Acer Aspire 3 A315 59 321N', 'image_6.png', 'Một trong những chiếc laptop giá rẻ dành cho học sinh sinh viên và nhân viên không thể không nhắc đến là Acer Aspire 3 A315 59 321N. Thiết kế nhỏ gọn, hoàn thiện từng chi tiết, cấu hình mạnh đáp ứng các yêu cầu học tập và làm việc mỗi ngày. Hứa hẹn s', 11990000, '15.6\" FHD (1920 x 1080), 60Hz, Acer ComfyView LED-backlit TFT LCD', 'Intel® Core™ i3-1215U, upto 4.40GHz, 10 MB Intel® Smart Cache', '8GB (1 x 8GB) DDR4 2400MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '256GB PCIe NVMe SSD (nâng cấp tối đa 1 TB SSD PCIe Gen3)'),
(7, 3, 'Laptop HP Pavilion 15 EG2036TX 6K782PA', 'image_7.png', 'Thiết kế trên từng chi tiết của HP Pavilion 15 EG2036TX 6K782PA được trau chuốt và sắp đặt kĩ càng nhằm bộc lộ hết vẻ đẹp hiện đại và thời thượng của chiếc máy. Khoác lên vỏ lớp màu Natural Silver sang trọng cùng viền màn hình được thiết kế siêu mỏng', 19490000, '15.6 inch FHD (1920 x 1080) IPS, micro-edge, BrightView, 250 nits, 45% NTSC', 'Intel Core i5-1235U 1.3GHz up to 4.4GHz 12MB', '8GB (4x2) DDR4 3200MHz (2x SO-DIMM socket, up to 16GB SDRAM)', '512GB PCIe NVMe M.2 SSD (1 slot)'),
(8, 3, 'Laptop HP Pavilion 15 EG0513TU 46M12PA', 'image_8.png', 'Laptop HP Pavilion 15 EG0513TU 46M12PA có kích thước màn hình 15.6 inch, độ dày chỉ 17.9 mm và cân nặng 1.75 kg. Với kích thước mỏng nhẹ này bạn hoàn toàn có thể cầm máy bằng 1 tay dễ dàng, phù hợp với những ai thường xuyên thay đổi vị trí làm việc.\r\n', 14190000, '15.6\" FHD (1920 x 1080) IPS, micro-edge, BrightView, 250 nits, 45% NTSC', 'Intel Core i3-1125G4 2.0GHz up to 3.7GHz 8MB', '4GB (4GBx1) DDR4 3200MHz (2x SO-DIMM socket, up to 16GB SDRAM)', '256GB PCIe NVMe M.2 SSD'),
(9, 4, 'Laptop MSI Modern 15 B7M 231VN', 'image_9.png', 'Laptop MSI Modern 15 B7M 231VN là dòng laptop sinh viên sở hữu cấu hình hoạt động tốt, ngoại hình trẻ trung, năng động. Phân khúc giá \"dễ chịu\" sẽ mang lại nhiều trải nghiệm mới mẻ trong học tập và công việc hằng ngày', 14990000, '15.6\" FHD (1920 x 1080) IPS-Level, 60Hz, 45% NTSC, Thin Bezel, 65% sRGB', 'Ryzen 5 7530U 2.0GHz up to 4.5GHz, 6 Cores 12 Threads,  16MB', '16GB DDR4 3200Mhz Onboard (Không nâng cấp)', '512GB NVMe PCIe Gen 3x4 SSD (1 Slot)'),
(10, NULL, 'Laptop MSI Modern 15 C13M 438VN', 'image_10.png', 'MSI Modern 15 C13M 438VN dòng Laptop sinh viên - học sinh sở hữu cấu hình mạnh có thể cân được mọi tác vụ học tập và cả chơi game giải trí vô cùng mượt mà. Cùng với thiết kế khá gọn gàng để bạn có thể cất gọn trong balo để di chuyển và có thể sử dụng', 17990000, '15.6\" FHD (1920 x 1080) IPS-Level, 60Hz, 45% NTSC, Thin Bezel, 65% sRGB', 'Intel Core i5-1335U 1.3GHz up to 4.6GHz 12MB', '512GB NVMe PCIe Gen 3x4 SSD (1 Slot)', '15.6\" FHD (1920 x 1080) IPS-Level, 60Hz, 45% NTSC, Thin Bezel, 65% sRGB'),
(11, 5, 'Laptop Dell Vostro 3520 5M2TT2', 'image_11.png', 'Laptop Dell Vostro 3520 5M2TT2 là dòng laptop sinh viên sở hữu thiết kế mỏng nhẹ với nhiều tính năng nổi bật giúp bạn nâng cao thành tích học tập, tăng thêm trải nghiệm với các tựa game mình yêu thích. Đặc biệt, với trọng lượng chưa đến 2kg ', 17490000, '15.6 inch FHD (1920 x 1080), 120Hz, WVA, Anti-Glare, 250 nit, Narrow Border, LED-Backlit', 'Intel Core i5-1235U upto 4.40 GHz, 10 cores 12 threads, 12 Mb Cache', '8GB (8x1) DDR4 3200MHz (2x SO-DIMM socket, up to 16GB SDRAM)', '512GB SSD M.2 PCIE'),
(12, 5, 'Laptop Dell Gaming Alienware m15 R6 i7', 'image_12.png', 'Laptop Dell Gaming Alienware m15 R6 i7 11800H/32GB/1TB SSD/6GB RTX3060/165Hz/Office H&S/Win11 (P109F001DBL)', 47490000, '15.6\"Full HD (1920 x 1080) 165Hz', 'i711800H2.30 GHz', '32 GBDDR4 2 khe (1 khe 16 GB + 1 khe 16 GB)3200 MHz', '1 TB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2 TB M.2 2280 PCIe Gen 4 x 4 NVMe / 1 TB M.2 2280 PCIe Gen 3 x 4 NVMe)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)'),
(13, 6, 'MacBook Air 13', 'image__1.png', 'Chiếc MacBook Air có hiệu năng đột phá nhất từ trước đến nay đã xuất hiện. Bộ vi xử lý Apple M1 hoàn toàn mới đưa sức mạnh của MacBook Air M1 13 inch 2020 vượt xa khỏi mong đợi người dùng, có thể chạy được những tác vụ nặng ', 18490000, '13.3 inch, 2560 x 1600 Pixels, IPS, IPS LCD LED Backlit, True Tone', 'Apple, M1', '8 GB, LPDDR4', 'SSD 256 GB'),
(14, 6, 'MacBook Air M2 2022 13 inch 8CPU 8GPU 16GB 256GB', 'image_14.png', 'Được cải tiến để có hiệu năng vượt trội, MacBook Air M2 2022 giờ đây đạt tới ngưỡng sức mạnh cao nhất trên phiên bản RAM 16GB. Bạn sẽ dễ dàng thực hiện cùng lúc nhiều tác vụ nặng, đa nhiệm xuất sắc và có thể chỉnh sửa nhiều luồng video 4K và 8K ', 33990000, '13.6 inch, 2560 x 1644 Pixels, IPS, 60 Hz, 500 nits, Liquid Retina', 'Apple, M2, 8 - Core', '16 GB, LPDDR4, 3200 MHz', 'SSD 256 GB'),
(16, 1, 'Laptop Acer Nitro Gaming AN515-57-54MV i5 demo 2', 'image__3.png', 'demo', 19999000, '15.6 inch, 1920 x 1080 Pixels, IPS, 144 Hz, Acer ComfyView LED-backlit', 'Intel, Core i5, 11400H', '8 GB (1 thanh 8 GB), DDR4, 3200 MHz', 'SSD 512 GB'),
(18, 5, 'Laptop Acer Nitro Gaming AN515-57-54MV i5', 'image__5.png', '321', 18000000, '321', '321', '3213', '21'),
(27, 1, '2', 'image_6517f35d45e42.png', '2', 2, '2', '2', '22', '2'),
(28, 1, '3', 'image_6517f36602755.png', '3', 3, '3', '3', '3', '3'),
(29, 1, '5', 'image_6518c6ebec7b9.png', '5', 5, '5', '5', '5', '5'),
(30, 1, '3fdsfds', 'image_65192b493cdb3.png', '3', 3, '5', '5', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `idRule` int NOT NULL,
  `nameRule` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`idRule`, `nameRule`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE `typeproduct` (
  `idTypeProduct` int NOT NULL,
  `nameTypeProduct` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imageTypeProduct` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`idTypeProduct`, `nameTypeProduct`, `imageTypeProduct`) VALUES
(1, 'Asus', NULL),
(2, 'Acer', NULL),
(3, 'HP', NULL),
(4, 'MSI', NULL),
(5, 'DELL', NULL),
(6, 'MacBook', NULL),
(7, 'Asus2', NULL),
(8, 'Oppo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idRule` int NOT NULL,
  `token` int DEFAULT NULL,
  `dateresetpass` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `idRule`, `token`, `dateresetpass`) VALUES
('admin@gmail.com', '$2y$10$TkclFa86qJOuA3jjKNyTX.f/nNCur1/3bFrRwJugGQcgAiroSMZYK', 1, NULL, '2023-05-16 09:17:45'),
('dangthao352002@gmail.com', '$2y$10$hoLThSC8KcNpHzKTk6mrXObG0b4LI0B8FOuECBtH86OhnEZfmdVjS', 2, NULL, '2023-05-16 09:58:56'),
('demo2@gmail.com', '$2y$10$ZEexSBrbNqpkH0dndPmDK.ZgXgEj5Z5IJLQS1PD3eVBEkMfxyc1cO', 2, NULL, '2023-05-19 17:16:12'),
('demo@gmail.com', '$2y$10$U9qU0bF.CeykZUiHBaKrIerbzvdNuAFZ00/lIHs84iPlB26clz8We', 2, NULL, '2023-05-19 17:09:44'),
('lethanhnam330@gmail.com', '$2y$10$OoMbWMBS0wj4K5KtYzua/uwFwMbeku2Vr/LcFL8PinBnI5hUybwTi', 2, 6995, '2023-05-23 09:19:21'),
('nammam123156@gmail.com', '$2y$10$OM.R3L7nIcaVYiDZPitGfuzDQnJr117pAiLRfosWR1mQdnIVHIwoa', 2, 3346, '2023-05-19 17:21:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`idCart`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idTypeProduct` (`idTypeProduct`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`idRule`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `idRule` (`idRule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `idRule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `idTypeProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`idCart`) REFERENCES `cart` (`idCart`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `cartitem_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idTypeProduct`) REFERENCES `typeproduct` (`idTypeProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRule`) REFERENCES `rule` (`idRule`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
