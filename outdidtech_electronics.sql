-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 06:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outdidtech_electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_list`
--

CREATE TABLE `admin_user_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `admin_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user_list`
--

INSERT INTO `admin_user_list` (`id`, `name`, `email`, `password`, `reset_link_token`, `exp_date`, `phone`, `admin_profile`) VALUES
(1, 'Kesavan D', 'kesavankesavan20342@gmail.com', 'Admin@2424', '', '', '9715756116', 'Kesavan D - 2023.04.21 - 02.35.37pm.jpg'),
(2, 'Admin', 'admin@2424gmail.com', 'Admin@2424', '', '', '9715756116', 'Admin - 2023.11.20 - 05.47.09am.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_p_qty` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quantity` varchar(2) NOT NULL,
  `qty_price_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `category_id`, `main_title`, `sub_title`) VALUES
(1, 1, 'Raspberry Pi', 'Boards / Kits'),
(2, 1, 'Raspberry Pi', 'Displays'),
(3, 1, 'Raspberry Pi', 'Cameras'),
(4, 1, 'Raspberry Pi', 'HATs'),
(5, 1, 'Raspberry Pi', 'All-in-one'),
(6, 1, 'Raspberry Pi', 'Robots'),
(7, 1, 'Raspberry Pi', 'Portable Gaming'),
(8, 1, 'Raspberry Pi', 'Accessories'),
(9, 2, 'Ai', 'Boards / Kits'),
(10, 2, 'Ai', 'Displays'),
(11, 2, 'Ai', 'Cameras'),
(12, 2, 'Ai', 'Expansions'),
(13, 2, 'Ai', 'Robots'),
(14, 2, 'Ai', 'Accessories'),
(17, 5, 'Displays', 'LCD'),
(18, 5, 'Displays', 'OLED'),
(19, 5, 'Displays', 'e-Paper'),
(20, 5, 'Displays', 'Accessories'),
(21, 6, 'IoT / Communication', 'Long Range Wireless'),
(22, 6, 'IoT / Communication', 'Short Range Wireless'),
(23, 6, 'IoT / Communication', 'Wired Comm / Converter'),
(24, 7, 'Misc Modules', 'Cameras / Audio / Video'),
(25, 7, 'Misc Modules', 'Sensors'),
(26, 7, 'Misc Modules', 'Motors / Servos '),
(27, 7, 'Misc Modules', 'Others'),
(28, 8, 'Robotics', 'Mobile Robots\n'),
(29, 8, 'Robotics', 'Dog-like Robots'),
(30, 8, 'Robotics', 'Drivers Sensors'),
(31, 8, 'Robotics', 'Motors / Servos'),
(32, 8, 'Robotics', 'Robot Arm / Control'),
(33, 8, 'Robotics', 'Robotic Components'),
(34, 9, 'Arduino-Related Nucleo', 'Boards / Kits'),
(35, 9, 'Arduino-Related Nucleo', 'Shields'),
(36, 9, 'Arduino-Related Nucleo', 'Robots'),
(37, 10, 'micro:bit', 'Boards / Kits'),
(38, 10, 'micro:bit', 'Expansions'),
(39, 10, 'micro:bit', 'Robots'),
(40, 11, 'MCU / ARM', 'Core Boards / Compact Boards'),
(41, 11, 'MCU / ARM', 'Development Boards / Expansions'),
(42, 11, 'MCU / ARM', 'Debugger / Programmer'),
(43, 11, 'MCU / ARM', 'Programming Adapters'),
(44, 12, 'FPGA', 'Core Boards / Compact Boards'),
(45, 12, 'FPGA', 'Development Boards / Expansions'),
(46, 12, 'FPGA', 'Programmer'),
(47, 13, 'Sockets / Adapters', 'Specific Programming Adapters'),
(48, 13, 'Sockets / Adapters', 'QFP'),
(49, 13, 'Sockets / Adapters', 'QFN / MLF'),
(50, 13, 'Sockets / Adapters', 'SOP'),
(51, 13, 'Sockets / Adapters', 'SSOP / TSSOP'),
(52, 13, 'Sockets / Adapters', 'TSOP / MSOP / SOT'),
(53, 13, 'Sockets / Adapters', 'PLCC\n'),
(54, 14, 'Accessories', 'Adapters / Cables / Antennas'),
(55, 14, 'Accessories', 'Motors / Servos'),
(56, 14, 'Accessories', 'Power / Heat Sinks'),
(57, 14, 'Accessories', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address_list`
--

CREATE TABLE `delivery_address_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `deliveryoption` varchar(255) NOT NULL,
  `paymentoption` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_quantity` varchar(255) NOT NULL,
  `tracking_code` varchar(255) NOT NULL,
  `estimated_time` varchar(255) NOT NULL,
  `confirmed` varchar(255) NOT NULL,
  `packed` varchar(255) NOT NULL,
  `shipped` varchar(255) NOT NULL,
  `arriving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_address_list`
--

INSERT INTO `delivery_address_list` (`id`, `name`, `phone`, `email`, `address`, `pincode`, `deliveryoption`, `paymentoption`, `p_img`, `p_name`, `p_price`, `p_quantity`, `tracking_code`, `estimated_time`, `confirmed`, `packed`, `shipped`, `arriving`) VALUES
(173, 'Kesavan D', '8946259842', 'kesavankesavan20342@gmail.com', 'BTM Layout', '560076', '', 'Credit or Debit Card', 'jetbot-ros-ai-kit-1.jpg', 'Boards/Kits JetBot Professional Version ROS AI Kit B, Dual Controllers AI Robot, Lidar Mapping, Vision Processing, comes with Waveshare Jetson Nano Dev Kit.', 780, '3', 'OTDTC002', '2023-05-11', '2023-05-08', '2023-05-08', '', ''),
(174, 'Sivasankar K', '9172548036', 'kesavankesavan20342@gmail.com', 'BTM Layout, Bangalore', '560076', '', 'Cash On Delivery', 'images (3).jpg', 'Test', 56576, '2', 'OTDTC003', '2023-05-16', '2023-05-08', '', '', ''),
(175, 'Vicky', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage, Bangalore', '560076', '', 'Credit or Debit Card', 'images (3).jpg', 'Test', 56576, '3', 'OTDTC004', '2023-05-16', '2023-05-08', '', '', ''),
(176, 'Kesavan D', '8946259842', 'kesavankesavan20342@gmail.com', 'BTM Layout', '560076', '', 'Credit or Debit Card', 'ov2710_2mp_usb_camera_a_.jpg', 'OV5640 5MP USB Camera, 1080P Video Recording, Available In AF/FF', 1800, '1', '', '', '', '', '', ''),
(177, 'DS Kesavan', '8946259842', 'kesavankesavan20342@gmail.com', 'TamilNadu', '635304', '', 'Cash On Delivery', 'images (3).jpg', 'Test', 56576, '1', '', '', '', '', '', ''),
(179, 'Kesavan D', '8946259842', 'kesavankesavan20342@gmail.com', 'BTM Layout', '560076', '', 'Cash On Delivery', 'lcd1602-i2c-module-1.jpg', 'LCD1602 I2C Module', 580, '1', '', '', '', '', '', ''),
(180, 'Kesavan D', '8946259842', 'kesavankesavan20342@gmail.com', 'BTM Layout', '560076', '', 'Cash On Delivery', 'usb-to-rs232-485-422-ttl-1.jpg', 'FT232RNL USB TO RS232/485/422/TTL Interface Converter, Industrial Isolation was added to your shopping cart.', 690, '1', '', '', '', '', '', ''),
(181, 'Kesavan D', '8946259842', 'kesavankesavan20342@gmail.com', 'BTM Layout', '560076', '', 'Cash On Delivery', 'xcore407i_l.jpg', 'XCore407I, STM32F4 Core Board', 9000, '1', '', '', '', '', '', ''),
(182, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'ov2710_2mp_usb_camera_a_.jpg', 'OV5640 5MP USB Camera, 1080P Video Recording, Available In AF/FF', 1800, '4', '', '', '', '', '', ''),
(183, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'barcode-scanner-module-c-1.jpg', '2D Codes Scanner Module (C), Supports High Accuracy Barcode Scanning, Barcode/QR code Reader', 4350, '2', '', '', '', '', '', ''),
(184, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Credit or Debit Card', 'pcie-x1-to-pcie-x16-cable-1.jpg', 'PCIe X1 to PCIe X16 Expander, Using With M.2 to PCIe 4-Ch Expander', 325, '1', '', '', '', '', '', ''),
(185, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'm2-pcie-switch-4p-1.jpg', 'M.2 to PCIe 4-Ch Expander, Using With PCIe X1 to PCIe X16 Expander', 220, '1', '', '', '', '', '', ''),
(186, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'Robot-Chassis-details-1.jpg', 'Robot-Chassis Series Smart Mobile Robot Chassis Kit, Options for wheels and chassis', 24556, '1', '', '', '', '', '', ''),
(187, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'lcd1602-i2c-module-1.jpg', 'LCD1602 I2C Module', 580, '1', '', '', '', '', '', ''),
(188, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Credit or Debit Card', 'jetbot-ros-ai-kit-1.jpg', 'Boards/Kits JetBot Professional Version ROS AI Kit B, Dual Controllers AI Robot, Lidar Mapping, Vision Processing, comes with Waveshare Jetson Nano Dev Kit.', 780, '1', 'OTD0010', '2023-11-24', '2023-11-20', '2023-11-21', '2023-11-22', ''),
(189, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'ws0202505-1.jpg', 'M12 Long Focal Length Lens, 5MP, 25mm Focal length, Large Aperture, Compatible with Raspberry Pi High Quality Camera M12', 530, '1', 'OTD008', '2023-11-20', '2023-11-21', '', '', ''),
(190, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'images (3).jpg', 'Test', 56576, '1', 'OTD005', '2023-11-24', '2023-11-20', '2023-11-21', '2023-11-22', '2023-11-24'),
(191, 'Kesavan D', '9715756116', 'kesavan@gmail.com', 'BTM Layout, 2nd Stage', '560076', '', 'Cash On Delivery', 'esp32-s3-touch-lcd-1.28-1.jpg', 'ESP32-S3 Development Board, with 1.28inch Round Touch LCD, Compact size, Accelerometer And Gyroscope Sensor', 215, '2', 'OTD007', '2023-11-25', '2023-11-20', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `select_show` varchar(255) NOT NULL,
  `dly_charges` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `main_categorys` varchar(255) NOT NULL,
  `sub_categorys` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `des_heading_1` varchar(255) NOT NULL,
  `des_paragraph_1` varchar(255) NOT NULL,
  `des_heading_2` varchar(255) NOT NULL,
  `des_paragraph_2` varchar(255) NOT NULL,
  `user_link` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `product_qty`, `select_show`, `dly_charges`, `part_number`, `sku`, `main_categorys`, `sub_categorys`, `img_2`, `img_3`, `img_4`, `des_heading_1`, `des_paragraph_1`, `des_heading_2`, `des_paragraph_2`, `user_link`, `package`, `specialty`, `weight`, `brand`, `manufacturer`) VALUES
(2, 'LCD1602 I2C Module', '580', 'lcd1602-i2c-module-1.jpg', '6', '6', '80', 'LCD1602 I2C Module', '23991', 'Raspberry Pi', 'Boards / Kits', 'lcd1602-i2c-module-3.jpg', 'lcd1602-i2c-module-7.jpg', 'lcd1602-i2c-module-6.jpg', 'Features At A Glance', 'Incorporates character LCD panel LCD1602 I2C control interface, only two signal pins are required, saving the IO resource', 'Compatible With Multiple Platforms', 'Provides Raspberry Pi/Raspberry Pi Pico/Jetson Nano/ESP32/Arduino/STM32 Demos And User Manuals, Easier To Develop And Integrate, And Better Expansibility', 'newPdf.pdf', 'LCD1602 RGB Module x1 <br>PH2.0 4PIN wire x1', 'Communication Interface-(I2C),LCD Controller-(AiP31068) Operating Voltage-(3.3 ~ 5V),Operating Temperature-(-20 ~ +70℃)<br> Display Panel Character LCD DisplaySize-(64.5 × 16.0mm) Characters-(16 × 2),Dimensions-(87.0 × 32.0 × 13.0mm)<br>RS232-(Connector-D', '0.038 kg', 'Outdid Tech', 'Outdid Unified LLP'),
(3, 'FT232RNL USB TO RS232/485/422/TTL Interface Converter, Industrial Isolation was added to your shopping cart.', '690', 'usb-to-rs232-485-422-ttl-1.jpg', '12', '12', '80', 'USB TO RS232/485/422/TTL', '23996', 'Raspberry Pi', 'Boards / Kits', 'usb-to-rs232-485-422-ttl-2.jpg', 'usb-to-rs232-485-422-ttl-4.jpg', 'usb-to-rs232-485-422-ttl-5.jpg', 'Features At A Glance', 'Adopt original FT232RNL chip, fast communicating, stable and reliable, better compatibility Supports multiple communication interface conversion: USB to RS232, USB to RS485, USB to RS422, USB to TTL', 'Safer Isolated Design', 'Onboard unibody power supply isolation, provides stable isolated voltage, needs no extra power supply for the isolated terminal Onboard unibody digital isolation, allows signal isolation, high reliability, strong anti-interference, low power consumption', 'newPdf.pdf', 'USB TO RS232/485/422/TTL x1<br>Rail-mount buckle x1<br> USB type A to type B cable ~1.2m x1<br>Screwdriver x1', 'USB-(Operating voltage-5V,Connector-USB-B,Protection-200mA self-recovery fuse, isolated output)', '0.104 kg', 'Outdid Tech', 'Outdid Unified LLP'),
(4, 'PCIe X1 to PCIe X16 Expander, Using With M.2 to PCIe 4-Ch Expander', '325', 'pcie-x1-to-pcie-x16-cable-1.jpg', '9', '9', '80', 'PCIe-X1-TO-PCIe-X16-Cable', '24003', 'Raspberry Pi', 'Boards / Kits', 'pcie-x1-to-pcie-x16-cable-2.jpg', 'pcie-x1-to-pcie-x16-cable-3.jpg', 'pcie-x1-to-pcie-x16-cable-6.jpg', 'For M.2 M Interface To PCIe Ports', 'M2-PCIe-Switch-4P Supports 1-Ch M.2 M To 4-Ch PCIe X1 (Note: The Output Are PCIe X1 Ports, Not The USB Ports) PCIe-X1-TO-PCIe-X16-Cable Supports PCIe X1 To PCIe X16', 'Neat Interface Layout', 'Can Effectively Reduce Interface Interference And Ensure Stable Data Transmission', 'newPdf.pdf', 'PCIe-X1-TO-PCIe-X16-Cable x1<br> 6PIN to SATA cable x1<br>Dual plug USB 3.0 Type A cable x1<br> PCIe connection board x1', 'Model-(M2-pcie-switch-4p),Transfer Interface-(Pcie X1 Female Port × 4, M.2 Mkey Male Port × 1)<br>Operating System-(Windows / Linux),Dimensions-(80.0 × 22.0mm)', '0.108 kg', 'Outdid Tech', 'Outdid Unified LLP'),
(38, 'M12 Long Focal Length Lens, 5MP, 25mm Focal length, Large Aperture, Compatible with Raspberry Pi High Quality Camera M12', '530', 'ws0202505-1.jpg', '9', '9', '', 'WS0202505', '24054', 'Raspberry Pi', 'Cameras', 'ws0202505-2.jpg', 'ws0202505-3.jpg', 'ws0202505-4.jpg', 'M12 Long Focal Length Lens', 'WS0202505 Is An M12 Lens With 5MP Resolution, 25mm Long Focal Length, And F1.7 Large Aperture. Suitable For M12 Mount Camera Module Such As Raspberry Pi HQ Camera M12', 'Mounting To The M12 Camera Module', 'Suitable For Raspberry Pi High Quality Camera M12', 'newPdf.pdf', 'WS0202505 ×1', 'M12 Lens Selection: <br>MODEL<br>FOCAL LENGTH<br>BACK FOCUSLENGTH	<br>MOUNT<br>CONSTRUCTION', '0.009 kg', 'Outdid Tech', 'Outdid Unified LLP'),
(39, 'M.2 to PCIe 4-Ch Expander, Using With PCIe X1 to PCIe X16 Expander', '220', 'm2-pcie-switch-4p-1.jpg', '14', '14', '', 'M2-PCIe-Switch-4P', '23316', 'Raspberry Pi', 'Boards / Kits', 'm2-pcie-switch-4p-2.jpg', 'm2-pcie-switch-4p-3.jpg', 'm2-pcie-switch-4p-5.jpg', 'M.2 To PCIe 4-Ch Expander', 'Using With PCIe X1 to PCIe X16 Expander', 'For M.2 M Interface To PCIe Ports', 'M2-PCIe-Switch-4P Supports 1-Ch M.2 M To 4-Ch PCIe X1(Note: The Output Are PCIe X1 Ports, Not The USB Ports)PCIe-X1-TO-PCIe-X16-Cable Supports PCIe X1 To PCIe X16', 'Sensedge-outdid-Application MOM-19_04_23.pdf', 'M2-PCIe-Switch-4P x1', 'MODEL:M2-PCIe-Switch-4P,TRANSFER INTERFACE:PCIe X1 female port × 4, M.2 Mkey male port × 1<br>OPERATING SYSTEM:Windows / Linux,DIMENSIONS:80.0 × 22.0mm', '0.017 kg', 'Outdid Tech', 'Outdid Unified LLP'),
(40, 'Test', '56576', 'images (3).jpg', '13', '13', '', 'CWC787', 'tut', 'IoT / Communication', 'Short Range Wireless', 'images (4).jpg', 'ws0202505-1.jpg', 'images.png', 'Ai display', 'this i sdemo image', 'Demo 2', 'De om22', 'images (3).jpg', 'Check', 'DOM', '12kg', 'OTD', 'OTD'),
(41, 'Boards/Kits JetBot Professional Version ROS AI Kit B, Dual Controllers AI Robot, Lidar Mapping, Vision Processing, comes with Waveshare Jetson Nano Dev Kit.', '780', 'jetbot-ros-ai-kit-1.jpg', '18', '18', '', 'JetBot1602 I2C Module', '23894', 'Ai', 'Boards / Kits', 'jetbot-ros-ai-kit-2.jpg', 'jetbot-ros-ai-kit-3.jpg', 'jetbot-ros-ai-kit-7.jpg', 'JetBot ROS AI Robot', 'It meets the needs of scientific research algorithm verification in various fields such as Lidar mapping, autonomous navigation, autonomous self driving, intelligent speech, target detection, face recognition', 'Jetson Nano Developer Kit (B01)', 'Jetson Nano Developer Kit (B01) is the official N-VIDIA kit with a variety of onboard interfaces including the 40PIN GPIO expansion header, Gigabit Ethernet port, USB 3.0 ports', 'epfo_kesavan.pdf', 'OPTIONS Jetson Nano Dev Kit <br>OPTIONS TF Card 64GB x 1', 'It meets the needs of scientific research algorithm verification in various fields such as Lidar mapping, autonomous navigation, autonomous self driving, intelligent speech, target detection, face recognition,', '025kg', 'OTD', 'OTD'),
(42, 'Robot-Chassis Series Smart Mobile Robot Chassis Kit, Options for wheels and chassis', '24556', 'Robot-Chassis-details-1.jpg', '149', '149', '', 'ROB-001', '22', 'Robotics', 'Motors / Servos', 'Robot-Chassis-details-1 (1).jpg', 'Robot-Chassis-details-3.jpg', 'Robot-Chassis-details-3 (1).jpg', 'Robot-Chassis Series Smart Mobile Robot Chassis Kit', 'Adopts Lightweight Shock-Absorbing Structure While Ensuring Good Strength And Reliability, Improves The Accuracy Of IMU Data And Solves The Problem That It Was Hard For Rigid Chassis To Land On All Four Wheels At The Same Time', 'Lightweight Shock-Absorbing Structure', 'Robot-Chassis Series Smart Mobile Robot Chassis Kit, Options for wheels and chassis', 'images.png', 'Wheels (4PCS) ×1', 'Mobile robot mounting plate (large size) ×1Mobile robot mounting plate (middle size) ×1', '0.100', 'OTD', 'Waveshare'),
(43, '2D Codes Scanner Module (C), Supports High Accuracy Barcode Scanning, Barcode/QR code Reader', '4350', 'barcode-scanner-module-c-1.jpg', '17', '17', '', 'Barcode Scanner Module (C)', '24468', 'Misc Modules', 'Sensors', 'barcode-scanner-module-c-2.jpg', 'barcode-scanner-module-c-3.jpg', 'barcode-scanner-module-c-4.jpg', '2D Codes Scanner Module (C), Supports High Accuracy Barcode Scanning, Barcode/QR Code Reader', 'Barcode Scanner Module (C) x1USB type A plug to micro B plug cable x1PH2.0 4Pin cable x1', '2D Codes Scanner Module', 'The Barcode Scanner Module (C) is a Barcode/QR codes scanner module, by using the intelligent image recognition algorithm, it can decode the 1D or 2D code on paper or screen fastly and accurately. Supports a variety of barcode formats and high accuracy, h', 'epfo_kesavan.pdf', 'Weight: 0.059 kg  Barcode Scanner Module (C) x1 USB type A plug to micro B plug cable x1 PH2.0 4Pin cable x1', '2D Codes Scanner Module (C), Supports High Accuracy Barcode Scanning, Barcode/QR code Reader', '0.059 kg', 'OTD', 'Waveshare'),
(44, 'XCore407I, STM32F4 Core Board', '9000', 'xcore407i_l.jpg', '20', '20', '', 'XCore407I', '7696', 'MCU / ARM', 'Core Boards / Compact Boards', 'XCore407I-2_380.jpg', 'XCore407I-4_380.jpg', 'XCore407I-intro.jpg', 'STM32 MCU Core Board, STM32F407IGT6, IO Expander, USB HS/FS, Ethernet, NandFlash', 'Clock circuit, USB power managementOnboard devices: USB HS PHY、Ethernet PHY、1G Bit NandFlash', 'STM-32', 'All the idle I/O ports are accessible on the pin headers2.0mm pin header pitch, smaller size, easier to integrate into user system', 'about-us.svg', 'stm32-1', 'All the idle I/O ports are accessible on the pin headers2.0mm pin header pitch, smaller size, easier to integrate into user system', '0.123 kg', 'OTD', 'Waveshare'),
(45, 'OV5640 5MP USB Camera, 1080P Video Recording, Available In AF/FF', '1800', 'ov2710_2mp_usb_camera_a_.jpg', '8', '8', '', 'OV5640 5MP USB Camera', '123', 'Misc Modules', 'Cameras / Audio / Video', 'imx258-13mp-ois-usb-camera-a-3.jpg', 'imx335-5mp-usb-camera-a-1_2.jpg', 'ov2710_2mp_usb_camera_a_.jpg', '5MP CAMERA MODULE', 'Select OV5640 5MP USB Camera (B) for Auto-focus,Select OV5640 5MP USB Camera (C) for Fixed-focus,Except for the focus mechanism, the two cameras are exactly the same.', 'USB - CAMERA', 'OV5640 5MP USB Camera, 1080P Video Recording, Available In AF/FF', 'epfo_kesavan.pdf', 'pck-001', 'spl12', '0.689kg', 'OTD', 'Waveshare'),
(70, 'ESP32-S3 Development Board, with 1.28inch Round Touch LCD, Compact size, Accelerometer And Gyroscope Sensor', '215', 'esp32-s3-touch-lcd-1.28-1.jpg', '208', '208', '', 'ESP32-S3-Touch-LCD-1.28', '25098', 'Displays', 'LCD', 'esp32-s3-touch-lcd-1.28-2.jpg', 'esp32-s3-touch-lcd-1.28-3.jpg', 'esp32-s3-touch-lcd-1.28-5.jpg', 'ESP32-S3-Touch-LCD-1.28', 'ESP32-S3-Touch-LCD-1.28 is a low-cost, high-performance MCU board designed by Waveshare, tiny size, with onboard 1.28inch capacitive touch display, Li-ion battery recharge manager, 6-axis sensor (3-axis accelerometer and 3-axis gyroscope), and so on, whic', 'Small Size, Touch More Possibilities', 'Suitable For Various Smart Devices Development, Can Realize Human-Computer Interaction Function', 'Outdid Logo.pdf', 'ESP32-S3R2', 'ESP32-S3R2The SoC with WiFi and Bluetooth, up to 240MHz operating frequency, with onboard 2MB PSRAM', '0.013 kg', 'Outdid', 'Outdid');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `name`, `email`, `password`, `reset_link_token`, `exp_date`, `phone`, `gender`, `birthday`, `user_profile`, `address`, `country`, `city`, `pincode`) VALUES
(1, 'Kesavan D', 'kesavan@gmail.com', '123456@kD', '420b3614161a03132acd2cde22762e1f4214', '2023-11-07 16:34:03 ', '9715756116', 'Male', '1999-06-06', 'Kesavan D - 2023.03.27 - 07.03.48am.jpg', 'BTM Layout, 2nd Stage', 'India', 'Bangalore', '560076'),
(2, 'Kesavan D', 'kesavankesavan20342@gmail.com', '12345@kD', '', '', '8946259842', '', '2023-03-16', 'Kesavan D - 2023.04.20 - 08.43.50am.jpg', 'BTM Layout', 'India', 'Bangalore, Karnataka', '560076'),
(6, 'Pandidurai', 'pandidurai@outdidtech.com', 'Pandi@123', '', '', '9879413654', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user_list`
--
ALTER TABLE `admin_user_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address_list`
--
ALTER TABLE `delivery_address_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user_list`
--
ALTER TABLE `admin_user_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `delivery_address_list`
--
ALTER TABLE `delivery_address_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
