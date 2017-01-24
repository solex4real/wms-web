-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 08:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wmsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(14) NOT NULL,
  `restaurant_id` int(14) NOT NULL,
  `server_id` int(14) NOT NULL,
  `title` varchar(80) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allDay` varchar(7) NOT NULL,
  `className` varchar(20) NOT NULL,
  `tag` varchar(140) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `restaurant_id`, `server_id`, `title`, `start`, `end`, `allDay`, `className`, `tag`, `date`) VALUES
(13, 0, 1, 'Wms Meeting', '2015-09-14 00:00:00', '2015-09-14 01:00:00', '1', 'bgm-blue', 'Meet on Friday', '15-09-19 09:01:00'),
(25, 0, 1, 'Event Tag', '2015-09-14 06:00:00', '2015-09-14 11:30:00', '', 'bgm-cyan', 'Meet on Friday', '15-10-08 02:42:48'),
(28, 0, 1, 'Jacob', '2015-11-16 06:00:00', '2015-11-16 14:30:00', '', 'bgm-green', 'Meet on Friday', '15-11-03 01:16:35'),
(29, 0, 1, 'Chris', '2015-11-10 06:00:00', '2015-11-10 11:30:00', '', 'bgm-teal', 'Meet on Friday', '15-11-03 01:16:33'),
(30, 0, 1, 'Mary', '2015-11-19 12:00:00', '2015-11-19 16:30:00', '', 'bgm-orange', 'Meet on Friday', '15-11-03 01:16:39'),
(31, 0, 1, 'Jacob', '2015-11-10 12:30:00', '2015-11-10 17:00:00', '', 'bgm-green', 'Meet on Friday', '15-11-03 01:16:37'),
(32, 0, 1, 'Sam', '2015-11-27 06:00:00', '2015-11-27 12:30:00', '', 'bgm-teal', 'Meet on Friday', '15-11-27 04:57:43'),
(35, 1, 0, 'Event ', '2015-09-10 00:00:00', '2015-09-11 00:00:00', '', 'bgm-orange', 'Meet on Friday', '15-10-25 02:25:07'),
(48, 2, 0, 'Test 1', '2015-11-10 00:00:00', '2015-11-11 00:00:00', '', 'bgm-teal', '', '15-11-03 01:15:43'),
(49, 2, 0, 'Test 2', '2015-11-11 00:00:00', '2015-11-12 00:00:00', '', 'bgm-teal', '', '15-11-03 01:15:42'),
(50, 0, 1, 'Work', '2015-11-24 09:00:00', '2015-11-24 16:30:00', '', 'bgm-green', 'test note', '15-11-27 04:57:52'),
(52, 0, 8, 'Work', '2016-09-07 03:00:00', '2016-09-07 09:00:00', '', 'bgm-green', 'All night shift', '16-09-05 02:17:32'),
(53, 0, 8, 'Night Shift', '2016-08-30 17:30:00', '2016-08-30 23:00:00', '', 'bgm-teal', 'Work all night', '16-09-13 11:55:27'),
(54, 0, 8, 'Gym', '2016-09-13 09:00:00', '2016-09-13 14:30:00', '', 'bgm-teal', 'Leg Day', '16-09-26 06:36:31'),
(55, 0, 1, 'Work', '2016-08-31 04:30:00', '2016-08-31 10:30:00', '', 'bgm-teal', 'I am working all night', '16-10-29 11:21:50'),
(56, 0, 1, 'Emmanuel - Work', '2016-11-08 03:30:00', '2016-11-08 08:30:00', '', 'bgm-teal', '', '16-11-23 01:44:41'),
(57, 0, 2, 'David - Place', '2016-11-08 03:30:00', '2016-11-08 08:00:00', '', 'bgm-teal', '', '16-12-22 02:56:22'),
(59, 2, 0, 'Sales Event', '2016-11-09 00:00:00', '2016-11-10 00:00:00', '', 'bgm-gray', 'Restaurant Sales Event', '16-11-21 11:54:19'),
(60, 0, 2, 'David - Shift', '2016-11-16 06:30:00', '2016-11-16 11:30:00', '', 'bgm-teal', 'Night Shift', '16-11-21 11:57:44'),
(61, 0, 2, 'David-Work', '2016-11-15 18:00:00', '2016-11-15 22:00:00', '', 'bgm-gray', 'You are doing a night shift', '16-11-24 05:02:40'),
(74, 1, 0, 'No Work', '2016-11-03 00:00:00', '2016-11-04 00:00:00', '1', 'bgm-red', 'Enjoy Thanksgiving Weekend', '16-11-22 08:35:03'),
(75, 0, 9, 'Mayer-Changed', '2016-11-08 00:00:00', '2016-11-09 00:00:00', '1', 'bgm-lime', '', '16-11-23 01:38:35'),
(76, 1, 0, 'My Schedule', '2016-11-02 00:00:00', '2016-11-03 00:00:00', '1', 'bgm-teal', 'Test Schedule', '16-11-23 01:39:46'),
(78, 0, 1, 'Emmanuel-Work', '2016-11-21 18:30:00', '2016-11-21 23:00:00', '', 'bgm-blue', '', '16-11-26 11:13:37'),
(98, 2000000, 0, 'Christmas Day', '2016-12-01 04:30:00', '2016-12-01 05:30:00', '', 'bgm-pink', 'No Work', '16-12-27 09:14:46'),
(99, 2000000, 0, 'Christmas Day', '2016-12-09 04:30:00', '2016-12-09 05:30:00', '', 'bgm-pink', 'No Work', '16-12-08 01:35:38'),
(100, 0, 1, 'Emmanuel-Work', '2016-12-08 08:00:00', '2016-12-08 20:00:00', '', 'bgm-pink', '', '16-12-10 07:17:21'),
(101, 0, 1, 'Emmanuel-Work', '2016-12-10 08:00:00', '2016-12-10 20:00:00', '', 'bgm-teal', '', '16-12-10 07:17:07'),
(102, 0, 1, 'Emmanuel-Work', '2016-12-09 08:00:00', '2016-12-09 20:00:00', '', 'bgm-teal', '', '16-12-10 07:17:19'),
(103, 0, 1, 'Emmanuel-Work', '2016-12-27 09:00:00', '2016-12-27 18:00:00', '', 'bgm-teal', '', '16-12-24 06:01:45'),
(104, 0, 1, 'Emmanuel-Work', '2016-12-13 09:00:00', '2016-12-13 15:00:00', '', 'bgm-teal', '', '16-12-24 06:01:11'),
(105, 0, 1, 'Emmanuel-Work', '2016-12-14 09:00:00', '2016-12-14 17:00:00', '', 'bgm-teal', '', '16-12-24 06:01:15'),
(106, 0, 1, 'Emmanuel-Work', '2016-12-16 09:00:00', '2016-12-16 18:00:00', '', 'bgm-teal', '', '16-12-27 09:16:21'),
(107, 2000000, 0, 'Test', '2016-12-06 05:30:00', '2016-12-06 09:00:00', '', 'bgm-teal', 'Test', '16-12-22 08:58:00'),
(109, 0, 2, 'David-Work', '2016-12-21 08:00:00', '2016-12-21 23:00:00', '', 'bgm-gray', '', '16-12-21 07:09:18'),
(110, 2000000, 0, 'Test', '2016-12-05 05:30:00', '2016-12-05 08:00:00', '', 'bgm-teal', 'Test', '16-12-22 02:59:06'),
(111, 2000000, 0, 'Christmas Day', '2016-12-07 04:30:00', '2016-12-07 05:30:00', '', 'bgm-pink', 'No Work', '16-12-27 09:14:46'),
(112, 2000000, 0, 'My Event', '2016-12-08 09:30:00', '2016-12-08 13:00:00', '', 'bgm-teal', '', '17-01-24 01:15:40'),
(113, 0, 1, 'Emmanuel-Work', '2016-12-15 09:00:00', '2016-12-15 18:00:00', '', 'bgm-teal', '', '16-12-27 09:16:20'),
(114, 0, 8, 'Katie-Work', '2016-12-31 08:00:00', '2016-12-31 23:00:00', '', 'bgm-teal', '', '16-12-31 10:36:23'),
(115, 2000000, 0, 'My Event', '2016-12-07 09:30:00', '2016-12-07 13:00:00', '', 'bgm-teal', '', '17-01-24 01:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `chains`
--

CREATE TABLE IF NOT EXISTS `chains` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `state` varchar(80) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(80) NOT NULL,
  `date_created` varchar(80) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `name_id` varchar(30) NOT NULL,
  `type` varchar(12) NOT NULL,
  `name` varchar(80) NOT NULL,
  `rating` varchar(80) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image_path` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `name_id`, `type`, `name`, `rating`, `address`, `description`, `image_path`) VALUES
(1, '2', '3', 'r', 'Chipotle', '4.8', 'Volusia Market Place, 2400 W International Speedway', 'Enjoy gourmet Mexican Food from our variety of selection.', 'restaurant_icon/3.png'),
(2, '1', '1', 'r', 'McDonalds', '3.2', '151 Ridgewood Ave', 'Enjoy our top burgers for $1.99', 'restaurant_icon/1.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(30) NOT NULL,
  `product_id` int(12) NOT NULL,
  `restaurant_id` varchar(30) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` varchar(20) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `image_path` varchar(80) NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `product_id`, `restaurant_id`, `name`, `type`, `description`, `price`, `tag`, `image_path`, `status`) VALUES
(1, 100, '2', 'Milk Shake', 'Drinks', 'Cold Milk Shake', '2.99', 'shakes', '', 0),
(17, 105, '2', 'Pizza', 'Lunch', 'Hot Cheesy Pizza ', '12.99', 'cheese', 'wms/images/restaurants/products/211122015101929.jpg', 1),
(18, 106, '2', 'Test', 'test', 'test', '22.99', 'test', 'wms/images/restaurants/products/211122015163345.jpg', 1),
(19, 107, '2', 'Test', 'test', 'test', '2.99', 'test', 'wms/images/restaurants/products/211122015163600.jpg', 0),
(24, 112, '2', 'Coke', 'Drink', 'Cold coke', '1.59', 'soda', 'wms/images/restaurants/products/211122015170319.jpg', 1),
(25, 113, '2', 'Bread', 'breakfast', 'Hot fresh bread', '2.99', 'bread', 'wms/images/restaurants/products/211122015170440.jpg', 1),
(26, 114, '2', 'Rice', 'Lunch', 'Fried Rice', '4.99', 'rice', 'wms/images/restaurants/products/211122015170744.jpg', 1),
(27, 115, '2', 'Pasta', 'Lunch', 'Hot pasta', '6.99', 'pasta', 'wms/images/restaurants/products/211122015171049.jpg', 1),
(31, 116, '2', 'Steak', 'Lunch', 'Hot spicy ribs', '13.49', 'steak', 'wms/images/restaurants/products/211122015173433.jpg', 1),
(34, 101, '7', 'Pork Fried Rice', 'Lunch', 'Fried Rice with pork and Vegetables', '6.99', 'Rice', 'wms/images/restaurants/products/701012016190406.jpg', 1),
(36, 102, '7', 'Cheese Burger', 'Lunch', 'Hot tasty cheese burger with fresh bun. ', '3.49', 'Burger', 'wms/images/restaurants/products/701012016190613.jpg', 1),
(37, 103, '7', 'Toasted bread and eggs', 'Breakfast', 'Italian toasted bread with eggs on the side', '4.49', 'egg', 'wms/images/restaurants/products/701012016191644.jpg', 1),
(48, 104, '7', 'Steak', 'Lunch and Dinner', 'Hot beef steak', '12', 'beef', 'wms/images/restaurants/products/701012016210035.jpg', 1),
(56, 105, '7', 'Test ', 'test', 'Pizza', '12', 'test', 'wms/images/restaurants/products/703012016045947.jpg', 1),
(58, 117, '2', 'Cheese Cake', 'Lucnh', 'Creamy cheese cake', '12.99', 'cheese', '', 1),
(59, 118, '2', 'Spaghetti', 'Lunch', 'Hot Spaghetti', '18.99', 'Lunch, Dinner', 'wms/images/restaurants/products/218112016202756.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `link_id` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `user_id`, `restaurant_id`, `link_id`) VALUES
(1, 2, 0, '8lP5TLUyGtuYgSOiZk6A1nHB');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `server_id` int(12) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `reference_id` int(12) NOT NULL,
  `user` varchar(24) NOT NULL,
  `type` varchar(24) NOT NULL,
  `message` varchar(140) NOT NULL,
  `viewed` int(2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `server_id`, `restaurant_id`, `reference_id`, `user`, `type`, `message`, `viewed`, `date`) VALUES
(1, 2, 2, 2000000, 1, 'user', 'reservation-user', 'Your reservation has been updated', 1, '2016-12-23 05:54:52'),
(2, 2, 2, 2000000, 1, 'user', 'reservation-user', 'Your reservation has been updated', 1, '2016-12-23 05:57:37'),
(3, 2, 2, 2000000, 1, 'user', 'reservation-user', 'Your reservation has been updated', 1, '2016-12-23 05:58:03'),
(4, 2, 2, 2000000, 1, 'user', 'reservation-user', 'Your reservation has been updated', 1, '2016-12-23 06:01:17'),
(5, 2, 1, 2000000, 2, 'user', 'reservation', 'You have a new Reservation', 1, '2016-12-23 19:01:09'),
(6, 2, 1, 2000000, 2, 'user', 'reservation', 'Your reservation has been removed', 1, '2016-12-24 17:52:34'),
(7, 1, 1, 2000000, 2, 'user', 'reservation', 'You have a new Reservation', 1, '2016-12-24 18:02:40'),
(8, 1, 1, 2000000, 2, 'user', 'reservation', 'Your reservation has been removed', 1, '2016-12-24 18:05:11'),
(9, 0, 8, 2000000, 0, 'user', 'request-update', 'Server Request Approved', 1, '2016-12-25 02:26:06'),
(10, 0, 1, 2000000, 0, 'user', 'request-update', 'Server Request Declined', 1, '2016-12-25 03:30:51'),
(11, 0, 1, 2000000, 0, 'user', 'request-update', 'Server Request Approved', 1, '2016-12-25 03:55:19'),
(15, 0, 1, 2000000, 0, 'user', 'request-update', 'Server Request Declined', 1, '2016-12-25 04:33:17'),
(16, 0, 1, 2000000, 0, 'user', 'request-update', 'Server Request Approved', 1, '2016-12-25 04:33:43'),
(17, 8, 1, 2000000, 2, 'user', 'reservation', 'You have a new Reservation', 1, '2016-12-26 04:24:08'),
(18, 1, 2, 2000000, 3, 'user', 'reservation', 'You have a new Reservation', 1, '2016-12-27 21:18:55'),
(19, 1, 8, 2000000, 4, 'user', 'reservation', 'You have a new Reservation', 1, '2016-12-31 22:37:23'),
(20, 1, 8, 2000000, 5, 'user', 'reservation', 'You have a new Reservation', 1, '2017-01-02 06:40:03'),
(21, 1, 8, 2000000, 4, 'user', 'reservation-user', 'Your reservation has been updated', 0, '2017-01-19 16:53:18'),
(22, 1, 8, 2000000, 4, 'user', 'reservation-user', 'Your reservation has been updated', 0, '2017-01-19 16:53:33'),
(23, 0, 11, 2000000, 0, 'user', 'server-request', 'Restaurant Request', 0, '2017-01-24 01:12:09'),
(24, 0, 11, 2000000, 0, 'user', 'request-update', 'Server Request Approved', 0, '2017-01-24 01:13:29'),
(25, 11, 1, 2000000, 6, 'user', 'reservation', 'You have a new Reservation', 0, '2017-01-24 01:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(18) NOT NULL,
  `order_id` int(18) NOT NULL,
  `customer_id` int(18) NOT NULL,
  `restaurant_id` int(18) NOT NULL,
  `order` varchar(500) NOT NULL,
  `notes` varchar(400) NOT NULL,
  `status` varchar(12) NOT NULL,
  `date_sent` varchar(80) NOT NULL,
  `date_modified` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `restaurant_id`, `order`, `notes`, `status`, `date_sent`, `date_modified`) VALUES
(4, 20006, 10, 2, 'Chicken', 'no pepper on all foods ', '2', '7.12.2015 5:05', '17.11.2016 20:18'),
(6, 20008, 10, 2, 'test', 'test', '0', '10.12.2015 00.24', '13.09.2016 12:07');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `server_id` varchar(30) NOT NULL,
  `restaurant_id` varchar(80) NOT NULL,
  `type` varchar(12) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `service` varchar(150) NOT NULL,
  `personality` varchar(150) NOT NULL,
  `aesthetics` varchar(150) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `date` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `server_id`, `restaurant_id`, `type`, `rating`, `service`, `personality`, `aesthetics`, `comments`, `date`) VALUES
(1, '10', '2', '2', '1', '5', '5', '5', '5', 'Pellentesque lacinia sagittis libero et feugiat. Etiam volutpat adipiscing tortor non luctus. Vivamus venenatis vitae metus et aliquet. Praesent vitae justo purus. In hendrerit lorem nisl', '23/12/2015 07:44'),
(13, '2', '11', '2', '1', '5', '5', '5', '5', 'Final test', '23/12/2015 20:34'),
(14, '2', '11', '2', '1', '5', '5', '5', '5', 'Test 1', '23/12/2015 20:41'),
(15, '2', '9', '2', '1', '5', '5', '5', '5', 'Great job', '07/09/2016 04:48'),
(16, '2', '2', '2', '1', '4.33', '4', '4', '5', 'Great Service and awesome meals. She is very polite and friendly, and she provides fast services during request', '13/09/2016 10:17'),
(17, '2', '2', '2', '1', '4.6', '5', '4', '5', 'Great Server!', '13/09/2016 11:53'),
(18, '1', '2', '1', '1', '5', '5', '5', '5', 'Great service from server', '14/11/2016 01:09'),
(20, '2', '1', '1', '1', '4.67', '5', '4', '5', 'Amazing Job from server!', '22/11/2016 01:18'),
(21, '1', '1', '1', '1', '5', '5', '5', '5', 'Great Customer Service.', '01/12/2016 07:08'),
(22, '1', '1', '1', '1', '5', '5', '5', '5', 'Great experience!', '01/12/2016 07:10'),
(23, '1', '1', '1', '1', '5', '5', '5', '5', 'Quick service', '01/12/2016 07:13'),
(26, '1', '1', '1', '1', '5', '5', '5', '5', 'Awesome personality!', '01/12/2016 07:21'),
(27, '2', '2', '2000000', '1', '5', '5', '5', '5', 'Great Service', '28/12/2016 02:34'),
(28, '2', '2', '2000000', '1', '5', '5', '5', '5', 'Great Service', '28/12/2016 02:35'),
(29, '2', '2', '2000000', '1', '5', '5', '5', '5', 'Great Service', '28/12/2016 02:39'),
(30, '2', '2', '2000000', '1', '5', '5', '5', '5', 'Great Server!', '28/12/2016 02:40'),
(36, '1', '2', '2000000', '1', '5', '5', '5', '5', 'My experience was great!', '28/12/2016 04:31'),
(37, '2', '2', '2000000', '1', '5', '5', '5', '5', 'Great service experience during reservation. ', '28/12/2016 04:40'),
(38, '1', '8', '2000000', '1', '5', '5', '5', '5', 'I had a great experience!', '02/01/2017 01:35'),
(39, '1', '8', '2000000', '1', '5', '5', '5', '5', 'Great Server', '02/01/2017 06:40'),
(40, '2000000', '2', '2000000', '1', '5', '5', '5', '5', 'David is an amazing server', '05/01/2017 23:46');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE IF NOT EXISTS `recent` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `name_id` varchar(30) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(120) NOT NULL,
  `rating` varchar(80) NOT NULL,
  `type` varchar(12) NOT NULL,
  `icon_path` varchar(80) NOT NULL,
  `date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(12) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `restaurant_id` int(12) NOT NULL,
  `server_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `notes` varchar(350) NOT NULL,
  `res_notes` varchar(500) NOT NULL,
  `customer_size` int(3) NOT NULL,
  `table_num` int(3) NOT NULL,
  `table_data` text NOT NULL,
  `reservation_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `turn_time` time NOT NULL DEFAULT '01:00:00',
  `is_rated` int(2) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL,
  `date` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_id`, `restaurant_id`, `server_id`, `user_id`, `notes`, `res_notes`, `customer_size`, `table_num`, `table_data`, `reservation_time`, `arrival_time`, `turn_time`, `is_rated`, `status`, `date`, `date_modified`) VALUES
(1, 20001, 1, 9, 9, 'We have a group of five individuals coming for dinner.', '', 5, 2, '', '2017-01-18 12:20:25', '2017-01-18 12:20:25', '01:00:00', 0, 0, '2016-10-03 00:00:00', '2016-12-12 02:52:27'),
(2, 20002, 1, 2, 10, 'I prefer the table outside', '', 1, 1, '', '2017-01-19 11:25:20', '2017-01-19 11:25:20', '01:00:00', 0, 2, '2016-11-09 00:00:00', '2016-11-22 03:27:24'),
(3, 20003, 1, 2, 1, '', '', 1, 1, '', '2017-01-19 15:30:00', '2017-01-19 15:30:00', '01:00:00', 0, 2, '2016-11-09 00:00:00', '2016-11-22 03:38:28'),
(4, 20004, 1, 2, 1, 'I would like a table inside', '', 1, 1, '', '2017-01-19 13:30:00', '2017-01-19 13:30:00', '01:00:00', 0, 1, '2016-11-09 23:01:39', '0000-00-00 00:00:00'),
(5, 20005, 1, 2, 1, 'Please save round table for this reservation', '', 1, 1, '', '2017-01-19 14:40:00', '2017-01-19 14:40:00', '01:00:00', 0, 0, '2016-11-10 00:07:31', '2016-11-12 21:56:17'),
(8, 20008, 1, 8, 1, 'I will be bringing a friend', '', 1, 1, '', '2017-01-19 15:40:00', '2017-01-19 15:40:00', '01:00:00', 0, 1, '2016-11-10 19:41:56', '2016-11-10 19:41:56'),
(9, 20009, 1, 8, 1, 'I will just spend 5mins', '', 1, 1, '', '2017-01-19 16:30:00', '2017-01-19 16:30:00', '01:00:00', 0, 1, '2016-11-10 19:44:43', '2016-11-10 19:44:43'),
(10, 20010, 1, 8, 1, 'I will be needing a large table', '', 4, 1, '', '2017-01-18 11:30:00', '2017-01-18 11:30:00', '01:00:00', 0, 1, '2016-11-10 19:46:43', '2016-11-10 19:46:43'),
(11, 20011, 5, 1, 2, '', '', 2, 1, '', '2017-01-19 10:30:00', '2017-01-19 10:30:00', '01:00:00', 0, 2, '2016-11-13 04:07:55', '2016-11-21 03:54:36'),
(12, 20012, 5, 1, 2, '', '', 1, 1, '', '2017-01-17 15:00:00', '2017-01-17 15:00:00', '01:00:00', 0, 1, '2016-11-13 04:14:24', '2016-11-13 04:14:24'),
(13, 20013, 5, 1, 2, '', '', 8, 1, '', '2017-01-18 15:00:00', '2017-01-18 15:00:00', '01:00:00', 0, 1, '2016-11-13 04:15:59', '2016-11-13 04:15:59'),
(14, 20014, 5, 1, 2, '', '', 8, 1, '', '2017-01-27 16:00:00', '2017-01-27 16:00:00', '01:00:00', 0, 1, '2016-11-13 04:17:48', '2016-11-13 04:17:48'),
(15, 20015, 5, 1, 2, '', '', 1, 1, '', '2017-01-19 16:00:00', '2017-01-19 16:00:00', '01:00:00', 0, 1, '2016-11-13 04:21:57', '2016-11-13 04:21:57'),
(16, 20011, 1, 8, 1, 'I will be coming with a friend!', '', 1, 1, '', '2017-01-19 15:00:00', '2017-01-19 15:00:00', '01:00:00', 0, 1, '2016-11-15 00:37:36', '2016-11-15 00:37:36'),
(17, 20012, 1, 9, 2, '', '', 1, 1, '', '2017-01-27 14:00:00', '2017-01-27 14:00:00', '01:00:00', 0, 2, '2016-11-23 04:01:59', '2016-12-12 03:00:15'),
(18, 20013, 1, 2, 1, '', '', 1, 1, '', '2017-01-25 15:00:00', '2017-01-25 15:00:00', '01:00:00', 0, 2, '2016-11-30 22:01:50', '2016-11-30 22:01:50'),
(19, 1, 2000000, 2, 2, '', '', 3, 8, '', '2017-01-24 14:00:00', '2017-01-24 14:00:00', '01:00:00', 1, 2, '2016-12-20 05:10:35', '2016-12-23 06:01:17'),
(20, 2, 2000000, 1, 8, '', '', 1, 8, '', '2017-01-19 15:00:00', '2017-01-19 15:00:00', '01:00:00', 0, 1, '2016-12-26 04:24:08', '2016-12-26 04:24:08'),
(21, 3, 2000000, 2, 1, '', '', 1, 8, '', '2017-01-19 09:00:00', '2017-01-19 09:00:00', '01:00:00', 1, 2, '2016-12-27 21:18:55', '2016-12-27 21:18:55'),
(22, 4, 2000000, 8, 1, '', '', 1, 8, '', '2017-01-19 14:30:00', '2017-01-19 14:30:00', '01:00:00', 1, 3, '2016-12-31 22:37:22', '2017-01-19 16:53:33'),
(23, 5, 2000000, 8, 1, '', '', 1, 8, '', '2017-01-19 11:30:00', '2017-01-19 11:30:00', '01:00:00', 1, 2, '2017-01-02 06:40:03', '2017-01-02 06:40:03'),
(24, 6, 2000000, 1, 11, 'I will like a table outside', '', 2, 8, '', '2016-12-15 10:36:00', '2016-12-15 10:36:00', '01:00:00', 0, 2, '2017-01-24 01:43:44', '2017-01-24 01:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tables`
--

CREATE TABLE IF NOT EXISTS `reservation_tables` (
  `id` int(12) NOT NULL,
  `restaurant_id` int(12) NOT NULL,
  `reservation_id` int(12) NOT NULL,
  `table_size` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_tables`
--

INSERT INTO `reservation_tables` (`id`, `restaurant_id`, `reservation_id`, `table_size`) VALUES
(1, 5, 20013, 2),
(2, 5, 20013, 4),
(3, 5, 20013, 4),
(4, 2000000, 1, 4),
(5, 2000000, 2, 2),
(6, 2000000, 3, 2),
(7, 2000000, 4, 2),
(8, 2000000, 5, 2),
(9, 2000000, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(30) NOT NULL,
  `restaurant_id` int(25) NOT NULL,
  `restaurant_username` varchar(24) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `county` varchar(120) NOT NULL,
  `state` varchar(80) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(80) NOT NULL,
  `start_time` time NOT NULL DEFAULT '09:00:00',
  `end_time` time NOT NULL DEFAULT '21:00:00',
  `start_day` varchar(12) NOT NULL DEFAULT 'Monday',
  `end_day` varchar(12) NOT NULL DEFAULT 'Sunday',
  `description` varchar(400) NOT NULL,
  `table_size` int(4) NOT NULL DEFAULT '4',
  `data_text` text NOT NULL,
  `contact` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `url` varchar(255) NOT NULL,
  `owner_first_name` varchar(25) NOT NULL,
  `owner_last_name` varchar(25) NOT NULL,
  `owner_contact` varchar(25) NOT NULL,
  `owner_email` varchar(70) NOT NULL,
  `banner_path` varchar(200) NOT NULL,
  `banner_wide_path` varchar(250) NOT NULL,
  `icon_path` varchar(200) NOT NULL,
  `date_created` varchar(80) NOT NULL,
  `date_modified` varchar(80) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2000003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_id`, `restaurant_username`, `password`, `salt`, `name`, `address`, `county`, `state`, `zip`, `country`, `start_time`, `end_time`, `start_day`, `end_day`, `description`, `table_size`, `data_text`, `contact`, `email`, `url`, `owner_first_name`, `owner_last_name`, `owner_contact`, `owner_email`, `banner_path`, `banner_wide_path`, `icon_path`, `date_created`, `date_modified`, `status`) VALUES
(1, 1, 'mcdonalds1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Mcdonalds', '2345 Road Street', 'Place', 'Florida', '12122', 'US', '08:00:00', '21:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '\n                               \n                               <span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; line-height: 16.12px;"><span style="font-weight: bold;">Bonefish Grill</span> is an American casual dining seafood restaurant chain owned and operated by Bloomin'' Brands, headquartered in Tampa, Florida. The company was founded on January 15, 2000 in St. Petersburg, Florida by Tim Curci and Chris Parker.</span>\n                                                                                                                   ', '123-868-6767', 'emmanuelacd@gmail.com', '', 'Mark', 'Hall', '234-576-2222', 'owner@email.com', 'wms/images/restaurants/banner/1.jpg', '', 'wms/images/restaurants/icon/1.png', '2/19/2015 10:50', '16-11-22 03:38:17', 0),
(2, 2, 'steak.shake1', '$2y$12$gflyGsSNQeqy4YCTofBvPu1ZTsRvNEinNgCUU6mhzeEXekRabKxse', 'gflyGsSNQeqy4YCTofBvP4', 'Steak n'' Shake', '450 International Speedway', '', 'Florida', '', 'US', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '\n                               \n                               Test content for Steak and Shake restaurant', '2223337777', 'test@mail.com', '', 'Mark', 'Hall', '234-576-2222', 'owner@email.com', 'wms/images/restaurants/banner/2.jpg', '', 'wms/images/restaurants/icon/2.jpg', '2/19/2015 10:50', '24/12/2016 17:40', 0),
(3, 3, 'chipotle1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Chipotle ', 'Volusia Market Place, 2400 W International Speedway Blvd #730\n', 'Daytona Beach', 'FL', '32114', 'US', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '1234445555', '', '', '', '', '', '', 'wms/images/restaurants/banner/3.jpg', '', 'wms/images/restaurants/icon/3.png', '2/19/2015 10:15', '', 1),
(4, 4, 'five.guys1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Five Guys', '2470 International Speedway Blvd\nVolusia Market Place', 'Daytona Beach', 'FL', '32114', 'US', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '1234445555', '', '', '', '', '', '', 'wms/images/restaurants/banner/4.jpg', '', 'wms/images/restaurants/icon/4.jpg', '2/19/2015 10:15', '', 0),
(5, 5, 'starbucks1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Starbucks', '110 South Ocean Avenue', 'Daytona Beach', 'FL', '32118', 'US', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '1234445555', '', '', '', '', '', '', 'wms/images/restaurants/banner/5.jpg', '', 'wms/images/restaurants/icon/5.jpg', '2/19/2015 10:56', '', 0),
(6, 6, 'pie.five1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Pie Five', '1781 Dunlawton Ave', 'Port Orange', 'FL', '32127', 'US', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '1234445555', '', '', '', '', '', '', 'wms/images/restaurants/banner/6.jpg', '', 'wms/images/restaurants/icon/6.jpg', '2/19/2015 10:56', '', 0),
(7, 7, 'panda.express1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Panda Express', '1700 ISB Road', 'Volusia Couty', 'Florida', '32116', '', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '<span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; line-height: 16.12px;"><span style="font-weight: bold;">Panda Express</span> is a fast casual restaurant chain which serves American Chinese cuisine. It operates mainly in the United States, where it was founded, and is the largest chain of its kind in that country.</span>\n                                                           ', '6468371213', '', '', 'Luke', 'Smith', '346-222-2222', 'test@mail.com', 'wms/images/restaurants/banner/7.jpg', 'wms/images/restaurants/banner-wide/7.png', 'wms/images/restaurants/icon/7.png', '31/12/2015 08:07', '01/01/2016 00:38', 1),
(8, 8, 'bonefish.grill1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'BoneFish Grill', '2060 Renaissance Park Pl', 'Cary', 'North Carolina', '27513', '', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '545-333-3333', 'test@mail.com', '', '', '', '', '', 'wms/images/restaurants/banner/8.jpg', '', 'wms/images/restaurants/icon/8.png', '31/12/2015 08:28', '15-12-31 08:42:31', 1),
(9, 9, 'demo.restaurant1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Demo Restaurant', '', '', '', '', '', '00:00:00', '00:00:00', 'Monday', 'Sunday', 'Gabri''s Lounge & Restaurant will feature an outstanding New American-Swedish menu with a touch of Asian influence in an upscale and cozy atmosphere.The menu is inspired from different cuisine''s specialties and will appeal to a wide and varied clientele. ', 4, '', '234-456-1212', 'demo@mail.com', '', '', '', '', '', '', 'wms/images/restaurants/banner-wide/9.png', 'wms/images/restaurants/icon/9.png', '15/11/2016 01:15', '15/11/2016 03:29', 1),
(10, 10, 'angus.barn1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Angus Barn', '9401 Glenwood Ave', 'Raleigh', 'North Carolina', '27617', '', '09:00:00', '21:00:00', 'Monday', 'Sunday', 'The Angus Barn is world renowned for its service and helps to set industry standards in hospitality. We also offer multiple facilities and private rooms to accommodate weddings, corporate events, family get together or just about any special event that you can dream of! Welcome, you are our guest. We also offer gift certificates for friends and associates.\n', 4, '', '919-781-2444', 'angusbarn@angusbarn.com', '', '', '', '', '', 'wms/images/restaurants/banner/10.jpg', '', 'wms/images/restaurants/icon/10.png', '01/12/2016 07:41', '16-12-01 08:37:10', 1),
(2000000, 2000000, 'second.empire1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Second Empire', '330 Hillsborough Street', 'Raleigh', 'North Carolina', '27603', '', '09:00:00', '21:00:00', 'Monday', 'Sunday', 'If you''re looking for the perfect spot to entertain clients, customers, or just friends and family, let us show you our private dining facilities. We can accommodate everything from small dinners to receptions and business events. Second Empire is also the perfect setting for an elegant wedding, reception, rehearsal dinner or bridesmaid luncheon.', 5, '', '(919) 829-3663', 'specialevents@second-empire.com', '', '', '', '', '', 'wms/images/restaurants/banner/2000000.jpg', '', 'wms/images/restaurants/icon/2000000.gif', '01/12/2016 08:02', '17-01-19 06:28:19', 1),
(2000001, 2000001, 'coquette.brasserie1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Coquette Brasserie', '4351 The Circle at North Hills', 'Raleigh', 'North Carolina', '27609', '', '09:00:00', '21:00:00', 'Monday', 'Sunday', 'Welcome to Coquette– a true French brasserie located in Raleigh''s North Hills. Coquette, continuously open through the day and well into the night, pleases from the moment you enter. Chef Paul Gagne prepares top notch food with French flair and serves it in hip surroundings to a clientele ready to settle in for fun with friends.', 4, '', '(919) 789-0606', 'pr@urbanfoodgroup.com', '', '', '', '', '', 'wms/images/restaurants/banner/2000001.jpg', '', 'wms/images/restaurants/icon/2000001.jpg', '01/12/2016 08:19', '01/12/2016 08:34', 1),
(2000002, 2000002, 'firebird1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'FireBird', 'North Hills, 4350 Lassiter at North Hills Avenue', 'Raleigh', 'North Carolina', '27609', '', '09:00:00', '21:00:00', 'Monday', 'Sunday', 'Firebirds Wood Fired Grill is located at Monmouth Mall. We offer authentic wood-fired steaks, seafood, specialty cocktails and select wines. We offer top-notch service and upscale dining at a modest price. ', 4, '', '(233)-456-4321', 'emmanuelacd@gmail.com', '', '', '', '', '', 'wms/images/restaurants/banner/2000002.jpg', '', 'wms/images/restaurants/icon/2000002.jpg', '21/12/2016 20:23', '21/12/2016 21:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_data`
--

CREATE TABLE IF NOT EXISTS `restaurant_data` (
  `id` int(12) NOT NULL,
  `restaurant_id` varchar(12) NOT NULL,
  `data_text` text NOT NULL,
  `date_modified` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_data`
--

INSERT INTO `restaurant_data` (`id`, `restaurant_id`, `data_text`, `date_modified`) VALUES
(1, '1', '\n                               <span style="line-height: 18.5714px;"><span style="font-style: italic;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> Fusce euismod quam vel lacinia facilisis. Sed condimentum nisi vel ante maximus, sit amet vestibulum leo euismod. Curabitur viverra faucibus nisi eu molestie. Donec convallis finibus felis porttitor tristique. Nulla pretium est et ante dignissim,</span>\n                               \n                                                        ', '15-11-03 01:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables`
--

CREATE TABLE IF NOT EXISTS `restaurant_tables` (
  `id` int(12) NOT NULL,
  `table_id` int(3) NOT NULL,
  `restaurant_id` int(12) NOT NULL,
  `size` int(3) NOT NULL,
  `quantity` int(4) NOT NULL,
  `description` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_tables`
--

INSERT INTO `restaurant_tables` (`id`, `table_id`, `restaurant_id`, `size`, `quantity`, `description`, `location`) VALUES
(2, 1, 2000000, 4, 4, '', 'Inside'),
(5, 2, 2000000, 6, 4, '', 'Inside'),
(6, 3, 2000000, 8, 2, '', 'Inside'),
(7, 4, 2000000, 2, 6, '', 'Outside'),
(8, 1, 5, 2, 4, '', 'Inside'),
(9, 2, 5, 4, 4, '', 'Inside'),
(10, 3, 5, 6, 2, '', 'Inside'),
(11, 4, 5, 8, 2, '', 'Inside');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL DEFAULT '9',
  `title` varchar(140) NOT NULL,
  `server_limit` int(2) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `user_id`, `restaurant_id`, `title`, `server_limit`, `status`) VALUES
(1, 11, 2000000, 'Server', 8, 1),
(2, 2, 2000000, 'Server', 12, 0),
(8, 9, 1, 'Server', 8, 1),
(9, 1, 2000000, 'Server', 20, 1),
(10, 8, 2000000, 'Server', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(20) unsigned NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `table_id` int(20) NOT NULL,
  `num_chairs` int(3) NOT NULL,
  `top_pos` int(50) DEFAULT NULL,
  `left_pos` int(50) DEFAULT NULL,
  `size_h` double NOT NULL DEFAULT '1',
  `size_w` double NOT NULL DEFAULT '1',
  `orientation` int(11) NOT NULL,
  `type` varchar(80) NOT NULL,
  `section_id` int(20) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `restaurant_id`, `table_id`, `num_chairs`, `top_pos`, `left_pos`, `size_h`, `size_w`, `orientation`, `type`, `section_id`, `status`, `date`) VALUES
(4, 2000000, 4, 4, 23, 391, 1, 1, -4, 'draggable-circle-four', 1, '1', '2017-01-14 19:06:55'),
(11, 2000000, 5, 4, 23, 243, 1, 1, 0, 'draggable-circle-four', 1, '1', '2017-01-14 21:15:31'),
(14, 2000000, 7, 8, 54, 124, 2.125, 2.6625, 20, 'draggable-rectangle-eight-large', 2, '1', '2017-01-14 22:50:59'),
(24, 2000000, 13, 4, 236, 367, 0.97, 0.94, 0, 'draggable-circle-four', 2, '1', '2017-01-16 01:35:34'),
(32, 2000000, 14, 4, 23, 81, 1, 1, 0, 'draggable-circle-four', 1, '1', '2017-01-16 21:29:41'),
(33, 2000000, 15, 8, 212, 78, 1.325, 1.7, -339, 'draggable-rectangle-eight-large', 2, '1', '2017-01-17 00:18:09'),
(45, 2000000, 16, 4, 26, 540, 1, 1, 0, 'draggable-circle-four', 1, '1', '2017-01-19 17:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `table_sections`
--

CREATE TABLE IF NOT EXISTS `table_sections` (
  `id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `section_id` int(20) NOT NULL,
  `section_name` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_sections`
--

INSERT INTO `table_sections` (`id`, `restaurant_id`, `section_id`, `section_name`) VALUES
(1, 2000000, 1, 'Section 1'),
(2, 2000000, 2, 'Section 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(80) NOT NULL,
  `gender` varchar(12) NOT NULL DEFAULT 'Male',
  `phone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `about` text NOT NULL,
  `date_created` varchar(80) NOT NULL,
  `date_modified` varchar(80) NOT NULL,
  `server` int(11) NOT NULL,
  `restaurant_owner` int(11) NOT NULL,
  `image_path` varchar(140) NOT NULL,
  `icon_path` varchar(140) NOT NULL,
  `notification` int(3) NOT NULL DEFAULT '2',
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `gender`, `phone`, `email`, `about`, `date_created`, `date_modified`, `server`, `restaurant_owner`, `image_path`, `icon_path`, `notification`, `status`) VALUES
(1, 'solex', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Emmanuel', 'Male', '1112224444', 'solex@mail.com', '', '2/19/2015 10:34', '22/11/2016 03:23', 0, 0, '', 'wms/images/users/1.jpg', 2, 1),
(2, 'admin', '$2y$12$cR1WCmINzN/EAESeBD0zYeRrhsjwUwKV6EiSEvd/FwVRHZQoAjAUG', 'cR1WCmINzN/EAESeBD0zYm', 'David', 'Male', '2223337777', 'test@mail.com', 'I like music', '2/19/2015 10:34', '28/12/2016 05:01', 1, 0, '', 'wms/images/users/2.jpg', 2, 1),
(7, 'username1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Sola', 'Male', '8964982937', 'emmanuel@mail.com', '', '08/06/2015 07:44', '01/01/2016 00:16', 0, 0, '', 'wms/images/users/7.jpg', 2, 1),
(8, 'username_1', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Katie', 'Female', '349650983', 'email@mail.com', '', '08/06/2015 07:48', '01/12/2016 17:51', 1, 0, '', 'wms/images/users/8.jpg', 2, 1),
(9, 'Mayer', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Mayer', 'Male', '364374992', 'dmayer@mail.com', '', '23/06/2015 02:22', '23/06/2015 02:22', 1, 0, '', 'wms/images/users/9.jpg', 2, 0),
(10, 'Morgan', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Chase', 'Male', '84982390912', 'chase@mail.com', '', '23/06/2015 04:22', '23/06/2015 04:22', 1, 0, '', 'wms/images/users/10.jpg', 2, 1),
(11, 'test', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'Chris', 'Male', '390450394', '1test@mail.com', '', '23/06/2015 04:26', '23/06/2015 04:26', 1, 0, '', 'wms/images/users/11.jpg', 2, 0),
(12, 'newuser', '$2y$12$TFbADHQ2FN0/Lw6kasF1eOlJDnI9T/2X8YzaHOjhvovKTAfHn79E.', 'TFbADHQ2FN0/Lw6kasF1eW', 'new user', 'Male', '15555215554', '2test@mail.com', '', '04/09/2016 21:01', '04/09/2016 21:01', 0, 0, '', 'wms/images/users/12.jpg', 2, 1),
(13, 'james.nike', '$2y$12$7QTEGRCGrS.dx0QVH4qgUezuLLKXhd5wXyT2r1fSt93GQgFtqE4I6', '7QTEGRCGrS.dx0QVH4qgUe', 'James Nike', 'Male', '1236578835', 'james@mail.com', '', '23/12/2016 21:59', '23/12/2016 21:59', 0, 0, '', '', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chains`
--
ALTER TABLE `chains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_tables`
--
ALTER TABLE `reservation_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_data`
--
ALTER TABLE `restaurant_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_sections`
--
ALTER TABLE `table_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `chains`
--
ALTER TABLE `chains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `reservation_tables`
--
ALTER TABLE `reservation_tables`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2000003;
--
-- AUTO_INCREMENT for table `restaurant_data`
--
ALTER TABLE `restaurant_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `table_sections`
--
ALTER TABLE `table_sections`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
