-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:35 PM
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
-- Database: `fswd_g5_meal_planner`
--
CREATE DATABASE IF NOT EXISTS `fswd_g5_meal_planner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd_g5_meal_planner`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221211125325', '2022-12-11 13:53:54', 105),
('DoctrineMigrations\\Version20221211130044', '2022-12-11 14:01:00', 77),
('DoctrineMigrations\\Version20221211130509', '2022-12-11 14:06:21', 81),
('DoctrineMigrations\\Version20221211130904', '2022-12-11 14:09:19', 71);

-- --------------------------------------------------------

--
-- Table structure for table `meal_plan`
--

CREATE TABLE `meal_plan` (
  `meal_plan_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_recipe_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_recipe_manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(650) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(650) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prep_time` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `diet` enum('regular','vegetarian','high-protein','low-carb') COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('breakfast','lunch','dinner','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_index` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `name`, `ingredients`, `description`, `prep_time`, `calories`, `diet`, `url`, `picture`, `type`, `type_index`) VALUES
(1, 'Easy classic lasagne', '1 tbsp olive oil\r\n2 rashers smoked streaky bacon\r\n1 onion , finely chopped\r\n1 celery stick, finely chopped\r\n1 medium carrot , grated\r\n2 garlic cloves , finely chopped\r\n500g beef mince\r\n1 tbsp tomato puree\r\n2 x 400g cans chopped tomatoes\r\n1 tbsp clear honey\r\n500g pack fresh egg lasagne sheets\r\n400ml creme fraiche\r\n125g ball mozzarella , roughly torn\r\n50g freshly grated parmesan\r\nlarge handful basil leaves , torn (optional)', 'Kids will love to help assemble this easiest ever pasta bake with streaky bacon, beef mince, a crème fraîche sauce and gooey mozzarella', 42, 242, 'vegetarian', 'https://www.bbcgoodfood.com/recipes/classic-lasagne', 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/classic-lasange-4a66137.jpg?quality=90&webp=true&resize=300,272', 'lunch', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_manager`
--

CREATE TABLE `recipe_manager` (
  `recipe_manager_id` int(11) NOT NULL,
  `fk_recipes_id` int(11) DEFAULT NULL,
  `fk_users_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `meal_plan`
--
ALTER TABLE `meal_plan`
  ADD PRIMARY KEY (`meal_plan_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_recipe_id` (`fk_recipe_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `recipe_manager`
--
ALTER TABLE `recipe_manager`
  ADD PRIMARY KEY (`recipe_manager_id`),
  ADD KEY `fk_users_id` (`fk_users_id`),
  ADD KEY `fk_recipes_id` (`fk_recipes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_plan`
--
ALTER TABLE `meal_plan`
  MODIFY `meal_plan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe_manager`
--
ALTER TABLE `recipe_manager`
  MODIFY `recipe_manager_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_plan`
--
ALTER TABLE `meal_plan`
  ADD CONSTRAINT `fk_recipe_id` FOREIGN KEY (`fk_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;

--
-- Constraints for table `recipe_manager`
--
ALTER TABLE `recipe_manager`
  ADD CONSTRAINT `fk_recipes_id` FOREIGN KEY (`fk_recipes_id`) REFERENCES `recipe` (`recipe_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`fk_users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
