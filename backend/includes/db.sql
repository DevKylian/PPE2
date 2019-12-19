--
-- Create database
--

CREATE DATABASE IF NOT EXISTS `ppe2_database` CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Drop table if exists
--

DROP TABLE IF EXISTS `roles`, `users`;

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
     `role_id` int(11) NOT NULL AUTO_INCREMENT,
     `role_name` varchar(255) NOT NULL DEFAULT 'user',
     PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
     `user_id` int(11) NOT NULL AUTO_INCREMENT,
     `user_firstname` varchar(255) NOT NULL,
     `user_lastname` varchar(255) NOT NULL,
     `user_username` varchar(255) NOT NULL,
     `user_email` varchar(255) NOT NULL,
     `user_password` varchar(255) NOT NULL,
     `user_birthdate` varchar(255) NOT NULL,
     `user_role` int(1) NOT NULL DEFAULT '1',
     `user_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `user_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
     PRIMARY KEY (`user_id`),
     UNIQUE (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;