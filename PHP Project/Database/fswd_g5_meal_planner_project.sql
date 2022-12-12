-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 12:46 PM
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
-- Database: `fswd_g5_meal_planner_project`
--
CREATE DATABASE IF NOT EXISTS `fswd_g5_meal_planner_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd_g5_meal_planner_project`;

-- --------------------------------------------------------

--
-- Table structure for table `meal_plan`
--

CREATE TABLE `meal_plan` (
  `meal_plan_id` int(11) NOT NULL,
  `fk_users_id` int(11) NOT NULL,
  `fk_recipe_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_recipe_manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `ingredients` varchar(650) NOT NULL,
  `description` varchar(650) NOT NULL,
  `prep_time` decimal(4,0) NOT NULL,
  `calories` int(4) NOT NULL,
  `diet` enum('regular','vegetarian','high-protein','low-carb') NOT NULL,
  `url` varchar(130) NOT NULL,
  `picture` varchar(260) DEFAULT NULL,
  `type` enum('breakfast','lunch','dinner','') DEFAULT NULL,
  `typeindex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `name`, `ingredients`, `description`, `prep_time`, `calories`, `diet`, `url`, `picture`, `type`, `typeindex`) VALUES
(60, 'Next level paella', '3 tbsp olive oil 10 large raw tiger prawns in their shells, heads removed and kept small bunch of parsley, leaves and stalks separated, leaves roughly chopped 100ml dry sherry or white wine 500g mussels large pinch of saffron strands 150g cooking chorizo, cut into chunks 1 onion, finely chopped 3 garlic cloves, finely chopped 1 medium squid (about 300g), cleaned and cut into rings with tentacles intact 2 ripe tomatoes, roughly chopped 250g paella rice 100g frozen podded broad beans or peas (or a mixture of the two), defrosted 1 lemon, finely zested then cut into wedges smoked sea salt (optional)', 'Choose the freshest ingredients for a world-class paella with our ultimate recipe. Serve this classic Spanish seafood dish in the pan to impress your guests', '90', 600, 'vegetarian', 'https://www.bbcgoodfood.com/recipes/next-level-paella', 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/paella-308c905.jpg?quality=90&webp=true&resize=300,272', 'dinner', 3),
(61, 'Next level paella', '3 tbsp olive oil 10 large raw tiger prawns in their shells, heads removed and kept small bunch of parsley, leaves and stalks separated, leaves roughly chopped 100ml dry sherry or white wine 500g mussels large pinch of saffron strands 150g cooking chorizo, cut into chunks 1 onion, finely chopped 3 garlic cloves, finely chopped 1 medium squid (about 300g), cleaned and cut into rings with tentacles intact 2 ripe tomatoes, roughly chopped 250g paella rice 100g frozen podded broad beans or peas (or a mixture of the two), defrosted 1 lemon, finely zested then cut into wedges smoked sea salt (optional)', 'Choose the freshest ingredients for a world-class paella with our ultimate recipe. Serve this classic Spanish seafood dish in the pan to impress your guests', '90', 600, 'vegetarian', 'https://www.bbcgoodfood.com/recipes/next-level-paella', 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/paella-308c905.jpg?quality=90&webp=true&resize=300,272', 'dinner', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_manager`
--

CREATE TABLE `recipe_manager` (
  `recipe_manager_id` int(11) NOT NULL,
  `fk_recipe_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_manager`
--

INSERT INTO `recipe_manager` (`recipe_manager_id`, `fk_recipe_id`, `fk_user_id`, `date`) VALUES
(26, 60, 21, '2022-12-11 16:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(65) NOT NULL,
  `last_name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(260) NOT NULL,
  `user_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `first_name`, `last_name`, `email`, `password`, `image`, `user_status`) VALUES
(21, 'John', 'Doe', 'test@admin.com', '597f5441e7d174b607873874ed54b974674986ad543e7458e28a038671c9f64c', 'https://cdn.pixabay.com/photo/2012/04/26/19/47/penguin-42936_960_720.png', 'adm'),
(22, 'John', 'Doe', 'test@user.com', 'ae5deb822e0d71992900471a7199d0d95b8e7c9d05c40a8245a281fd2c1d6684', 'https://cdn.pixabay.com/photo/2013/07/13/01/24/bunny-155674_960_720.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_plan`
--
ALTER TABLE `meal_plan`
  ADD PRIMARY KEY (`meal_plan_id`),
  ADD KEY `fk_users_id` (`fk_users_id`),
  ADD KEY `fk_recipe_id` (`fk_recipe_id`);

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
  ADD KEY `fk_recipe_id` (`fk_recipe_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

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
  MODIFY `meal_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `recipe_manager`
--
ALTER TABLE `recipe_manager`
  MODIFY `recipe_manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_plan`
--
ALTER TABLE `meal_plan`
  ADD CONSTRAINT `fk_recipe_id` FOREIGN KEY (`fk_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`fk_users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_manager`
--
ALTER TABLE `recipe_manager`
  ADD CONSTRAINT `recipe_manager_ibfk_1` FOREIGN KEY (`fk_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_manager_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
