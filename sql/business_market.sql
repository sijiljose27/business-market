-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 08:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_image` varchar(100) NOT NULL,
  `b_desc` varchar(300) NOT NULL,
  `b_fund_amt` varchar(100) NOT NULL,
  `b_future_plan` varchar(300) NOT NULL,
  `b_date` datetime NOT NULL DEFAULT current_timestamp(),
  `b_status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`b_id`, `u_id`, `sc_id`, `b_name`, `b_image`, `b_desc`, `b_fund_amt`, `b_future_plan`, `b_date`, `b_status`) VALUES
(1, 4, 1, 'home care services', '4d58-bde7-b2537960b6cc.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque felis vitae tincidunt euismod.', '100000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque felis vitae tincidunt euismod. Aenean vestibulum ante sagittis turpis cursus egestas. Nam imperdiet erat lectus, quis venenatis neque ultricies vitae. Phasellus sed est vel nibh mollis feugiat et in tellus. Fusce ullamcorper', '2023-07-24 08:23:52', 'Active'),
(2, 8, 2, 'Ac Care India', 'ac.jpg', 'To grow your AC business, you must begin with a solid business plan by identifying target consumers and researching potential rivals. Look up the best digital advertising methods and what would help your company rank at the top of search results. To scale up, you must be consistent and keep up with ', '1222222', 'Here is a step-by-step guide to starting an HVAC business.\r\n</br>\r\n<b>Understand Your Business</b>\r\nLike any other business, starting an HVAC business also needs a thorough knowledge of the industry. If you have been in the industry for a while, you might be well versed with the technical work invol', '2023-07-25 12:35:33', 'Active'),
(3, 4, 14, 'Dev Homes Construction', 'archit.jpg', 'Whats The Difference Between Architects & Builders? A custom home builder is a professional who can execute a custom home or condo build from start to finish. Meanwhile, an architect is tasked with creating the blueprints of what the finished property should look like.', '', 'Do I need a builder or an architect?\r\nMany experienced builders will offer specialist one-stop shops for standard-style extensions and take care of all the planning, drawing and building regulations. If you want something more bespoke or you are not quite sure how an extension would look, then an ar', '2023-07-26 07:51:41', 'Active'),
(4, 4, 1, 'Home Rent ', 'home.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque felis vitae tincidunt euismod. \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque felis vitae tincidunt euismod.', '', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque felis vitae tincidunt euismod. ', '2023-07-26 08:14:18', 'Active'),
(5, 7, 8, 'Travel Agency', 'tourism.jpg', 'Sed a elit sodales, luctus mauris eu, dapibus nibh. Cras vitae efficitur nunc. Integer venenatis in eros ac posuere. Donec pulvinar nisl vitae magna laoreet imperdiet.', '', 'estibulum fermentum sagittis tortor, et interdum eros auctor quis. Sed bibendum sed enim ac egestas. Sed quis elit tortor. Vivamus non nisl lacinia, varius orci ac, malesuada metus. Integer porta blandit iaculis. Donec nisl ligula, facilisis id maximus ut, aliquam sit amet nisl.', '2023-07-26 10:09:25', 'Active'),
(6, 7, 11, 'Grocery Store', 'Grocery-business-model.jpg', ' Grocery Store Sed a elit sodales, luctus mauris eu, dapibus nibh. Cras vitae efficitur nunc. Integer venenatis in eros ac posuere. Donec pulvinar nisl vitae magna laoreet imperdiet. Nullam imperdiet est ac semper venenatis. Vivamus tincidunt orci ex, ac consequat sem tempus a. Sed aliquet euismod l', '', ' Sed a elit sodales, luctus mauris eu, dapibus nibh. Cras vitae efficitur nunc. Integer venenatis in eros ac posuere. Donec pulvinar nisl vitae magna laoreet imperdiet. Nullam imperdiet est ac semper venenatis. Vivamus tincidunt orci ex, ac consequat sem tempus a. Sed aliquet euismod luctus. Sed eu ', '2023-07-26 10:14:34', 'Active'),
(7, 8, 3, 'Bike Service Center', 'bike.jpg', ' Sed a elit sodales, luctus mauris eu, dapibus nibh. Cras vitae efficitur nunc. Integer venenatis in eros ac posuere. Donec pulvinar nisl vitae magna laoreet imperdiet. Nullam imperdiet est ac semper venenatis. Vivamus tincidunt orci ex, ac consequat sem tempus a. Sed aliquet euismod luctus. Sed eu ', '', ' Sed a elit sodales, luctus mauris eu, dapibus nibh. Cras vitae efficitur nunc. Integer venenatis in eros ac posuere. Donec pulvinar nisl vitae magna laoreet imperdiet. Nullam imperdiet est ac semper venenatis. Vivamus tincidunt orci ex, ac consequat sem tempus a. Sed aliquet euismod luctus. Sed eu ', '2023-07-26 10:20:01', 'Active'),
(8, 4, 9, 'Wedding Planner Firm', 'wed.jpg', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2023-07-26 13:48:47', 'Active'),
(9, 8, 12, 'Movies Hall', 'movie.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean risus eros, posuere ut sapien eget, dignissim hendrerit erat. Aliquam dui metus, accumsan sed elit non, venenatis tincidunt arcu. ', '', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean risus eros, posuere ut sapien eget, dignissim hendrerit erat. Aliquam dui metus, accumsan sed elit non, venenatis tincidunt arcu. ', '2023-07-26 14:05:51', 'Active'),
(10, 4, 15, 'Interior Designer Studion', 'interior.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean risus eros, posuere ut sapien eget, dignissim hendrerit erat. Aliquam dui metus, accumsan sed elit non, venenatis tincidunt arcu. ', '', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean risus eros, posuere ut sapien eget, dignissim hendrerit erat. Aliquam dui metus, accumsan sed elit non, venenatis tincidunt arcu. ', '2023-07-26 14:09:31', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `b_users`
--

CREATE TABLE `b_users` (
  `bu_id` int(11) NOT NULL,
  `bu_name` varchar(30) NOT NULL,
  `bu_email` varchar(30) NOT NULL,
  `bu_pwd` varchar(20) NOT NULL,
  `bu_mobno` varchar(20) NOT NULL,
  `bu_type` varchar(10) NOT NULL COMMENT '1: admin 2: enterprenuer, 3: investor',
  `bu_status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `b_users`
--

INSERT INTO `b_users` (`bu_id`, `bu_name`, `bu_email`, `bu_pwd`, `bu_mobno`, `bu_type`, `bu_status`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', '1234567890', '1', 'Active'),
(4, 'ent', 'ent@gmail.com', '1234', '123123123', '2', 'Active'),
(5, 'investor', 'inv@gmail.com', '1234', '1230987123', '3', 'Active'),
(6, 'investor1', 'investor1@gmail.com', '1234', '1276093298', '3', 'Active'),
(7, 'ent1', 'ent1@gmail.com', '1234', '129800000', '2', 'Active'),
(8, 'ent3', 'ent3@gmail.com', '1234', '1111122222', '2', 'Active'),
(9, 'investor2', 'investor2@gmail.com', '1234', '1112221112', '3', 'Active'),
(10, 'investor4', 'investor4@gmail.com', '1234', '1234567822', '3', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_image` varchar(200) NOT NULL,
  `c_status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_image`, `c_status`) VALUES
(1, 'Real Estate', 'real.png', 'Active'),
(3, 'Repair & Services', 'rep.png', 'Active'),
(4, 'Event Planner', 'event.png', 'Active'),
(5, 'Daily Needs', 'daily.png', 'Active'),
(6, 'wedding Requisites', 'wedding.png', 'Active'),
(7, 'Beauty & Spa', 'beauty.png', 'Active'),
(8, 'Tutors', 'tutor.png', 'Active'),
(9, 'Home Care', 'cat1.png', 'Active'),
(10, 'others', 'other.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `c_queries`
--

CREATE TABLE `c_queries` (
  `q_id` int(11) NOT NULL,
  `q_name` varchar(20) NOT NULL,
  `q_email` varchar(50) NOT NULL,
  `q_subj` varchar(100) NOT NULL,
  `q_msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_queries`
--

INSERT INTO `c_queries` (`q_id`, `q_name`, `q_email`, `q_subj`, `q_msg`) VALUES
(2, 'divya', 'divya@gmail.com', 'hey i want to invest', 'how to invest on an idea. please help??');

-- --------------------------------------------------------

--
-- Table structure for table `interested_users`
--

CREATE TABLE `interested_users` (
  `iu_id` int(11) NOT NULL,
  `inv_u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `iu_status` varchar(20) NOT NULL COMMENT '1: interested 2: not interested',
  `iu_confirmation` varchar(20) NOT NULL COMMENT '1: confirmed, 2: Not confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interested_users`
--

INSERT INTO `interested_users` (`iu_id`, `inv_u_id`, `b_id`, `iu_status`, `iu_confirmation`) VALUES
(1, 5, 1, '1', '1'),
(2, 5, 6, '1', '2'),
(3, 10, 1, '1', '2'),
(4, 5, 5, '1', ''),
(5, 9, 6, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `l_id` int(11) NOT NULL,
  `e_u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `like_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`l_id`, `e_u_id`, `b_id`, `like_status`) VALUES
(1, 4, 2, '1'),
(2, 9, 4, '1'),
(3, 1, 2, '1'),
(4, 1, 6, '1'),
(5, 1, 1, '1'),
(6, 4, 6, '1'),
(7, 9, 6, '1'),
(8, 9, 10, '2'),
(9, 9, 1, '2'),
(10, 4, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sc_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sc_name` varchar(150) NOT NULL,
  `sc_image` varchar(200) NOT NULL,
  `sc_status` varchar(10) NOT NULL DEFAULT 'Active',
  `sc_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sc_id`, `c_id`, `sc_name`, `sc_image`, `sc_status`, `sc_date`) VALUES
(1, 1, 'Home For Rent', 'rent.png', 'Active', '2023-07-24 13:24:42'),
(2, 3, 'Home Service', 'home.jpg', 'Active', '2023-07-24 13:49:07'),
(3, 3, 'Bike Services', 'bike.jpg', 'Active', '2023-07-24 13:53:27'),
(4, 3, 'Car Services', 'car.png', 'Active', '2023-07-24 13:55:55'),
(5, 8, 'Home Tutors', 'home_tution.png', 'Active', '2023-07-24 14:01:30'),
(6, 8, 'Business Tutors', 'b_tut.png', 'Active', '2023-07-24 14:05:16'),
(7, 8, 'Music & Dance', 'music_dance.png', 'Active', '2023-07-24 14:10:37'),
(8, 4, 'Tourism & Travel ', 'tour.png', 'Active', '2023-07-24 14:15:27'),
(9, 4, 'Wedding Planner', 'wed_plan.png', 'Active', '2023-07-24 14:17:33'),
(10, 4, 'Birthday Party ', 'b_day_plan.png', 'Active', '2023-07-24 14:20:33'),
(11, 5, 'Groceries', 'groc.png', 'Active', '2023-07-24 14:25:21'),
(12, 5, 'Movies', 'cinema.png', 'Active', '2023-07-24 14:26:49'),
(13, 5, 'Bills & Recharges', 'bill_pay.jpg', 'Active', '2023-07-24 15:07:50'),
(14, 1, 'Builders/ Architects', 'building.png', 'Active', '2023-07-25 10:29:49'),
(15, 1, 'Interior Decorators', 'interior.png', 'Active', '2023-07-25 10:31:46'),
(16, 6, 'Banquets Halls', 'banquet.png', 'Active', '2023-07-25 11:53:09'),
(17, 7, 'Salon', 'salon.png', 'Active', '2023-07-25 11:54:17'),
(18, 7, 'Spa & Massages ', 'spa.png', 'Active', '2023-07-25 11:56:02'),
(19, 6, 'Caterers', 'caterer.png', 'Active', '2023-07-25 12:01:30'),
(20, 9, 'Home Nurses', 'nurses.png', 'Active', '2023-07-25 12:04:08'),
(21, 10, 'others', 'other.png', 'Active', '2023-07-25 14:29:30'),
(22, 6, 'cloths', 'cloth.png', 'Active', '2023-07-25 14:31:02'),
(23, 7, 'Cosmetics & Products', 'cosmetic.jpg', 'Active', '2023-07-25 14:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `v_id` int(11) NOT NULL,
  `v_b_id` int(11) NOT NULL,
  `v_u_id` int(11) NOT NULL,
  `v_count` int(11) NOT NULL,
  `v_status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`v_id`, `v_b_id`, `v_u_id`, `v_count`, `v_status`) VALUES
(2, 1, 9, 5, 'Active'),
(3, 2, 9, 1, 'Active'),
(4, 1, 5, 4, 'Active'),
(5, 6, 5, 3, 'Active'),
(6, 1, 10, 2, 'Active'),
(7, 0, 10, 1, 'Active'),
(8, 5, 5, 3, 'Active'),
(9, 0, 5, 1, 'Active'),
(10, 2, 5, 1, 'Active'),
(11, 4, 9, 5, 'Active'),
(12, 3, 9, 1, 'Active'),
(13, 6, 9, 9, 'Active'),
(14, 0, 9, 2, 'Active'),
(15, 10, 9, 2, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `b_users`
--
ALTER TABLE `b_users`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `c_queries`
--
ALTER TABLE `c_queries`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `interested_users`
--
ALTER TABLE `interested_users`
  ADD PRIMARY KEY (`iu_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `b_users`
--
ALTER TABLE `b_users`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `c_queries`
--
ALTER TABLE `c_queries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interested_users`
--
ALTER TABLE `interested_users`
  MODIFY `iu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
