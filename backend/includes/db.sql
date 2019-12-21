--
-- Create database
--

CREATE DATABASE IF NOT EXISTS `ppe2_database` CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Drop table if exists
--

DROP TABLE IF EXISTS `users`;

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
     `user_role` int(1) NOT NULL DEFAULT '0',
     `user_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `user_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
     PRIMARY KEY (`user_id`),
     UNIQUE (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Insert Data for `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_password`, `user_birthdate`, `user_role`, `user_reg_time`, `user_enabled`) VALUES
(1, 'demo', 'demo', 'demo', 'demo@kyliandev.fr', '$2y$10$dZrt2T6RHsqRvK221LEqZeS8BBb/Zt4AUCD.0E0sJ.LhRqBPrgNX.', '2019-12-21', 1, '2019-12-21 14:36:14', 1);
