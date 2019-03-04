-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 12:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `title`, `author`, `article`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, 'Heart attack', 'U Ko Lwin', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veritatis voluptas ipsa, sit fugit dolore, et eos ullam aperiam amet provident quidem, possimus repudiandae illo? Quae cum explicabo odit sunt!', 'Blog_image_5abafd032a811.jpg', '2018-03-28 02:25:07', '0000-00-00 00:00:00'),
(2, 2, 'Nose', 'U Mg Mg Lwin', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veritatis voluptas ipsa, sit fugit dolore, et eos ullam aperiam amet provident quidem, possimus repudiandae illo? Quae cum explicabo odit sunt!', 'Blog_image_5abafd27a5424.jpg', '2018-03-28 02:25:43', '0000-00-00 00:00:00'),
(3, 1, 'HeadAche', 'Dr.MgMg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In perferendis nihil ea id illum voluptatem totam at quae, harum a, voluptas, assumenda, eum facilis ipsum fugit odit dolorem magni mollitia?', 'Blog_image_5aed8bfdc62c0.jpg', '2018-05-05 10:48:29', '0000-00-00 00:00:00'),
(4, 1, 'HeadAche', 'Dr.MgKoLwin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In perferendis nihil ea id illum voluptatem totam at quae, harum a, voluptas, assumenda, eum facilis ipsum fugit odit dolorem magni mollitia?', 'Blog_image_5aed8c08de495.jpg', '2018-05-05 10:48:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_name`) VALUES
(1, 'Heart'),
(2, 'Nose');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `reply_id` int(11) NOT NULL DEFAULT '0',
  `created_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_up` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `name`, `email`, `comment`, `status`, `reply_id`, `created_up`, `updated_up`) VALUES
(1, 3, 'MgMg', 'mgmg@email.com', 'Thank you', 0, 0, '2018-05-06 03:46:34', '0000-00-00 00:00:00'),
(2, 3, 'koko', 'koko@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In perferendis nihil ea id illum voluptatem totam at quae, harum a, voluptas, assumenda, eum facilis ipsum fugit odit dolorem magni mollitia?', 0, 0, '2018-05-06 10:11:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carrer`
--

CREATE TABLE `carrer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_experience` varchar(255) NOT NULL,
  `job_salary` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `cv_form` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `doctor_profile_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrer`
--

INSERT INTO `carrer` (`id`, `name`, `email`, `phone`, `gender`, `date_of_birth`, `address`, `img`, `qualification`, `position`, `department_id`, `job_experience`, `job_salary`, `job_description`, `cv_form`, `status`, `doctor_profile_status`) VALUES
(1, 'Dr.Mg Ko Lwin', 'kyaw@gmail.com', 925848, 'male', '27-3-1993', 'haha', 'cv_img_5ac19fa423429.jpg', 'M.B.B.S', 'doctor', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae sapiente, nostrum laborum perspiciatis distinctio laboriosam nemo ipsum accusantium eligendi tempora numquam? Neque quos at, aliquam velit fuga ducimus molestias et.', '25555', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore nostrum tenetur nemo, repudiandae repellat rerum quos animi voluptatem necessitatibus quidem nobis dolores, provident perferendis dolorum officia cumque assumenda eligendi voluptate!', 'wcms_224211.pdf', 1, 0),
(2, 'Dr.ko kyaw', 'kyaw@gmail.com', 925848, 'male', '27-3-1993', '\nhaha', 'cv_img_5ac1b8f108ce1.jpg', 'M.B.B.S', 'doctor', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae sapiente, nostrum laborum ', '25555', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore nostrum tenetur nemo, repudiandae repellat rerum quos animi voluptatem necessitatibus quidem nobis dolores, provident perferendis dolorum officia cumque assumenda eligendi voluptate!', 'wcms_224211.pdf', 1, 0),
(3, 'koko', 'koko@gmial.com', 925848, 'other', '27-3-1993', 'AddressAddressAddressAddress', 'cv_img_5ac44969230ad.jpg', 'M.B.B.S', 'cleaner', 0, 'Job ExperienceJob ExperienceJob ExpJob Experience', '25555', 'Job Job ExJob ExperienceJob ExperienceJob ExperienceJob ExperienceperienceExperienceence', 'wcms_224211.pdf', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `img`, `description`) VALUES
(1, 'X-ray', 'X-ray_5ac5aa0b3ee12.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. '),
(4, 'Operation', 'Operation_5ac5aa14886be.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit porro id omnis facere quia eaque, cumque. Repellendus nihil, blanditiis quidem. Nemo delectus magnam sit ipsa error quidem vel nihil doloribus!');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `carrer_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

CREATE TABLE `duty` (
  `id` int(11) NOT NULL,
  `carrer_id` int(11) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `duty_in` varchar(255) NOT NULL,
  `duty_out` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`id`, `carrer_id`, `department_id`, `day`, `duty_in`, `duty_out`, `created_at`, `updated_at`) VALUES
(2, 2, '1', 'a:5:{i:0;s:3:"mon";i:1;s:3:"tue";i:2;s:3:"wed";i:3;s:3:"thu";i:4;s:3:"fri";}', 'a:5:{i:0;s:5:"07:00";i:1;s:5:"07:00";i:2;s:5:"07:00";i:3;s:5:"21:00";i:4;s:5:"12:00";}', 'a:5:{i:0;s:5:"21:00";i:1;s:5:"12:09";i:2;s:5:"21:00";i:3;s:5:"06:00";i:4;s:5:"21:00";}', '2018-04-05 03:57:07', '0000-00-00 00:00:00'),
(3, 1, '1', 'a:5:{i:0;s:3:"mon";i:1;s:3:"tue";i:2;s:3:"wed";i:3;s:3:"thu";i:4;s:3:"fri";}', 'a:5:{i:0;s:5:"00:00";i:1;s:5:"00:00";i:2;s:5:"00:00";i:3;s:5:"00:00";i:4;s:5:"00:00";}', 'a:5:{i:0;s:5:"00:00";i:1;s:5:"00:00";i:2;s:5:"00:00";i:3;s:5:"00:00";i:4;s:5:"00:00";}', '2018-04-05 03:58:47', '0000-00-00 00:00:00'),
(4, 1, '1', 'a:5:{i:0;s:3:"mon";i:1;s:3:"tue";i:2;s:3:"wed";i:3;s:3:"thu";i:4;s:3:"fri";}', 'a:5:{i:0;s:5:"12:00";i:1;s:5:"12:00";i:2;s:5:"12:00";i:3;s:5:"12:00";i:4;s:5:"12:00";}', 'a:5:{i:0;s:5:"12:00";i:1;s:5:"12:00";i:2;s:5:"12:00";i:3;s:5:"12:00";i:4;s:5:"12:00";}', '2018-04-05 04:00:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `img`) VALUES
(1, 'World Cancer Day 2018, 4th February', 'OSC á€±á€†á€¸á€›á€¶á€¯á‚€á€€á€®á€¸á€á€¼á€„á€¹ World Cancer Day á€€á€¯á€­ á€‚á€¯á€á€¹á€»á€•á€³á€±á€žá€¬á€¡á€¬á€¸á€»á€–á€„á€¹á€· á€™á€­á€˜á€»á€•á€Šá€¹á€žá€°á€™á€ºá€¬á€¸á€¡á€¬á€¸ á€€á€„á€¹á€†á€¬á€±á€›á€¬á€‚á€«á€™á€½ á€€á€„á€¹á€¸á€±á€á€¸á€±á€…á€›á€”á€¹ á€†á€¯á€™á€¼á€”á€¹á€±á€€á€¬á€„á€¹á€¸á€±á€á€¬á€„á€¹á€¸á€•á€«á€›á€±á€…á‹  OSC á€±á€†á€¸á€›á€¶á€¯á€á€¼á€„á€¹ Cancer Screening Package á€€á€¯á€­ (Feb: 1) á€™á€½ (Feb: 28) á€¡á€‘á€­ (20%) á€±á€œá€ºá€¬á‚”á€±á€…á€ºá€¸á€»á€–á€„á€·á€¹ á€…á€…á€¹á€±á€†á€¸á€±á€•á€¸á€±á€”á€•á€«á¿á€•á€®á‹  á€¡á€‘á€°á€¸á€¡á€…á€®á€¡á€…á€¥á€¹á€á€›á€•á€¹á€¡á€±á€”á€»á€–á€„á€¹á€· ............ á€¡á€™á€ºá€­á€³á€¸á€žá€™á€®á€¸á€‘á€¯á€¡á€¬á€¸ á¿á€á€­á€™á€¹á€¸á€±á€»á€á€¬á€€á€¹á€±á€”á€±á€žá€¬ á€žá€¬á€¸á€¡á€­á€™á€¹á€±á€á€«á€„á€¹á€¸á€€á€„á€¹á€†á€¬ á‚€á€€á€­á€³á€á€„á€¹á€…á€…á€¹á€±á€†á€¸á€»á€á€„á€¹á€¸ á‚á€½á€„á€¹á€· á€€á€¬á€€á€¼á€šá€¹á€±á€†á€¸á€‘á€­á€¯á€¸á€»á€á€„á€¹á€¸ á€¡á€…á€®á€¡á€…á€¥á€¹á€™á€ºá€¬á€¸á€€á€­á€¯ á€±á€–á€±á€–á€¬á€¹á€á€«á€›á€®(á)á€œá€œá€¶á€¯á€¸ á€¡á€‘á€°á€¸á‚á‚ˆá€”á€¹á€¸á€»á€–á€„á€¹á€· á€á€”á€¹á€±á€†á€¬á€„á€¹á€™á‚ˆá€±á€•á€¸á€±á€”á€•á€«á€žá€Šá€¹á‹  á€…á€…á€¹á€±á€†á€¸á€»á€á€„á€¹á€¸ + á€€á€¬á€€á€¼á€šá€¹á€±á€†á€¸á€‘á€­á€¯á€¸á€»á€á€„á€¹á€¸ (áƒ) á‚€á€€á€­á€™á€¹ = á‚á€½á€…á€¹á€á€¯á€±á€•á€«á€„á€¹á€¸ á€¡á€‘á€°á€¸á€±á€…á€ºá€¸á‚á‚ˆá€”á€¹á€¸ á€»á€–á€„á€¹á€· á€±á€–á€±á€–á€¬á€¹á€á€«á€›á€®á€œ (á)á€œá€œá€¶á€¯á€¸á€á€”á€¹á€±á€†á€¬á€„á€¹á€™á‚ˆá€±á€•á€¸á€±á€”á€•á€«á€žá€Šá€¹á‹âœ¨âœ¨  á€…á€…á€¹á€±á€†á€¸á€™á‚ˆá€á€­á€¯á€„á€¹á€¸á€á€¼á€„á€¹ á€‘á€•á€¹á€†á€„á€¹á€·á€œá€€á€¹á€±á€†á€¬á€„á€¹á€¡á€±á€”á€»á€–á€„á€¹á€· OSC Wall Calendar á€¡á€™á€½á€á€¹â€‹á€á€›á€œá€€á€¹â€‹â€‹á€±á€†á€¬á€„á€¹â€‹á€±á€•á€¸á€±á€”á€•á€«á¿á€•á€®â€‹á€±á€”á€¬á€¹â€‹á‹', 'Event_image_5ae2a9027c2f9.jpg'),
(2, 'á€”á€šá€¹á€œá€½á€Šá€¹á€· á€€á€ºá€”á€¹á€¸á€™á€¬á€±á€›á€¸á€±á€…á€¬á€€á€¹á€±á‚á€½á€¬á€€á€¹á€™á‚ˆ á€¡á€…á€® á€¡á€…á€¥á€¹', 'á€á€«á€¸á€á€šá€¹á€™á€»á€™á€­á€³á‚•á€”á€šá€¹ áŠ á€†á€°á€¸á€á€¼á€„á€¹á€¸á€»á€™á€…á€¹á€€á€±á€œá€¸ á€±á€€á€ºá€¸á€›á€¼á€¬ á€á€¼á€„á€¹ á€»á€•á€³á€œá€¯á€•á€¹á€á€²á€·á€±á€žá€¬ á€”á€šá€¹á€œá€½á€Šá€¹á€· á€€á€ºá€”á€¹á€¸á€™á€¬á€±á€›á€¸á€±á€…á€¬á€€á€¹á€±á‚á€½á€¬á€€á€¹á€™á‚ˆ á€¡á€…á€® á€¡á€…á€¥á€¹  4.2.2018 á€±á€”á‚”á€á€¼á€„á€¹ á€á€«á€¸á€á€šá€¹á€™á€»á€™á€­á€³á‚•á€”á€šá€¹ áŠ á€†á€°á€¸á€á€¼á€„á€¹á€¸á€»á€™á€…á€¹á€€á€±á€œá€¸ á€±á€€á€ºá€¸á€›á€¼á€¬ á€á€¼á€„á€¹  Chest Physician Prof; Daw Yee Yee Naing  á‚á€½á€„á€¹á€· OSC á€±á€†á€¸á€›á€¶á€¯á€™á€½  Dr. Khaing Aung Myint ,  Dr. Myo Win Aye ,  Dr. Phyo Ei Ei Win ,  á€á€­á€¯á‚” á€±á€á€«á€„á€¹á€¸á€±á€†á€¬á€„á€¹á á€±á€†á€¸á€›á€¶á€¯á€á€”á€¹á€‘á€™á€¹á€¸á€™á€ºá€¬á€¸á‚á€½á€„á€¹á€· á€…á€¯á€…á€¯á€±á€•á€«á€„á€¹á€¸ áá€ á€±á€šá€¬á€€á€¹á€¡á€–á€¼á€²á‚•á€™á€½ á€œá€°á€”á€¬ áƒáƒá‰ á€±á€šá€¬á€€á€¹á€€á€­á€¯ á€™á€”á€€á€¹ áá€ á€”á€¬á€›á€® á€™á€½ á€Šá€±á€” áƒ á€”á€¬á€›á€®á€á€¼á€² á€¡á€á€ºá€­á€”á€¹á€‘á€­ á€±á€†á€¸á€€á€¯á€žá€±á€•á€¸á€á€²á€·á€•á€«á€žá€Šá€¹á‹', 'Event_image_5ae2a9543ea2a.jpg'),
(3, 'Medical Checkup (á€€á€ºá€”á€¹á€¸á€™á€¬á€±á€›á€¸á€±á€†á€¸á€…á€…á€¹á€»á€á€„á€¹á€¸)', 'Medical Checkup (á€€á€ºá€”á€¹á€¸á€™á€¬á€±á€›á€¸á€±á€†á€¸á€…á€…á€¹á€»á€á€„á€¹á€¸) á€¡á€‘á€°á€¸ Promotion á€™á€ºá€¬á€¸á€€á€­á€¯ February á€œá€€á€¯á€”á€¹á€‘á€­ á€‘á€€á€¹á€™á€¶á€á€­á€¯á€¸á€»á€™á€½á€„á€¹á€· á€»á€á€„á€¹á€¸á‹  Medical Checkup (á€€á€ºá€”á€¹á€¸á€™á€¬á€±á€›á€¸á€±á€†á€¸á€…á€…á€¹á€»á€á€„á€¹á€¸) á€¡á€‘á€°á€¸ Promotion á€™á€ºá€¬á€¸á€€á€­á€¯ February á€œá€€á€¯á€”á€¹á€‘á€­ á€‘á€€á€¹á€™á€¶á€á€­á€¯á€¸á€»á€™á€½á€„á€¹á€·á€œá€­á€¯á€€á€¹á€•á€«á€•á€®á€›á€½á€„á€¹á‹âœ¨âœ¨  á€™á€­á€™á€­á€á€ºá€…á€¹á€á€„á€¹á€±á€œá€¸á€…á€¬á€¸á€›á€žá€°á€™á€ºá€¬á€¸á€€á€­á€¯ á€¡á€žá€„á€¹á‚”á€±á€á€¬á€¹á€†á€¶á€¯á€¸ á€‚á€«á€›á€á€»á€•á€³á€œá€€á€¹á€±á€†á€¬á€„á€¹á€™á€ºá€¬á€¸ á€±á€•á€¸á€œá€¯á€­á€€á€¹á€›á€±á€¡á€¬á€„á€¹ ', 'Event_image_5ae2a9bb678e8.jpg'),
(4, 'OSC á€±á€†á€¸á€›á€¶á€¯á Zumba á€¡á€€ á€œá‚ˆá€•á€¹á€›á€½á€¬á€¸á€™á‚ˆá€™á€ºá€¬á€¸', 'OSC á€±á€†á€¸á€›á€¶á€¯á€™á€½ Zumba á€¡á€€ á€œá‚ˆá€•á€¹á€›á€½á€¬á€¸á€™á‚ˆá€™á€ºá€¬á€¸ á€€á€­á€¯ á€±á€»á€™á€¬á€€á€¹á€¥á€€á á€œá€¬ á€›á€½á€­ Fun Valley á€•á€”á€¹á€¸á€»á€á€¶á€á€¼á€„á€¹ á€’á€®á€‡á€„á€¹á€˜á€¬á€œ á á€›á€€á€¹á€±á€”á‚•á€á€¼á€„á€¹ á€±á€•á€ºá€¬á€¹á€›á‚Šá€„á€¹á€…á€¼á€¬ á€€á€ºá€„á€¹á€¸á€•á€á€²á€·á€•á€«á€žá€Šá€¹á‹', 'Event_image_5ae2aa03b2a9f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `img`) VALUES
(7, 'title1', 'text1', 'Gallery_image_5ab4b3415f6fd.jpg'),
(8, 'adsf', 'sfafasf', 'Gallery_image_5ae285443c037.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_form`
--

CREATE TABLE `job_form` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `job_salary` varchar(255) NOT NULL,
  `job_vacancy` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `last_date_of_cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_form`
--

INSERT INTO `job_form` (`id`, `department_id`, `job_position`, `job_salary`, `job_vacancy`, `job_description`, `last_date_of_cv`) VALUES
(1, 1, 'Cleaner', '25555', '2', '\r\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, aliquid eius doloribus quod ipsum quo, quas officiis accusantium sapiente at vitae veritatis numquam unde, rerum explicabo soluta voluptatem in sit.', '2-4-2018'),
(2, 1, 'Cleaner', '35000', '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam doloribus, facere excepturi, dolorum, cupiditate sit praesentium quaerat sapiente voluptatem architecto mollitia ut ipsa inventore fuga. Vitae corrupti totam, ea voluptatem.', '3-4-2018');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `img`) VALUES
(4, 'Partner_image_5ab4e164d40ad.jpg'),
(10, 'Partner_image_5aba0abdb4ea4.jpg'),
(11, 'Partner_image_5abca4ebd7b5c.jpg'),
(12, 'Partner_image_5abca4f13eddc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrer`
--
ALTER TABLE `carrer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_form`
--
ALTER TABLE `job_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carrer`
--
ALTER TABLE `carrer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `duty`
--
ALTER TABLE `duty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `job_form`
--
ALTER TABLE `job_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
