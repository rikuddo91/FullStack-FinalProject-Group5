SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
​
-- --------------------------------------------------------



CREATE TABLE `user` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `birthday` date DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
​
--
-- Dumping data for table `user`
--
​
INSERT INTO `user` (`users_id`, `first_name`, `last_name`, `email`, `password`, `roles`, `birthday`) VALUES
(1, 'Ibrahim','Saliev','m@gmail.com', '$2y$13$pKfre.Gun4MIysdwluPQn.eTPeuJd1wtlPRjefcNRXuwHnLsfC/s6','[\"ROLE_ADMIN\"]', '2017-01-01'),
(2, 'Magdalena','Pejic','ma@gmail.com', '$2y$13$pKfrf.Gun4MIysdwluPQn.eTPeuJd1wtlPRjefcNRXuwHnLsfC/s6','[\"ROLE_USER\"]', '2016-01-01'),
(3, 'Kristina','Trifunovic','kt@gmail.com', '$2y$13$pKfrp.Gun4MIysdwluPQn.eTPeuJd1wtlPRjefcNRXuwHnLsfC/s6','[\"ROLE_USER1\"]', '2015-01-01');