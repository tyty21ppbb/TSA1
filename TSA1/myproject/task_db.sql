SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `created_at`) VALUES
(10, 'Gym', '1', '2026-09-27', '2026-09-27 00:00:00'),
(11, 'Trip to Vietnam', '0', '2026-09-30', '2026-09-27 00:00:00'),
(13, 'Trip to Thailand', '0', '2026-09-26', '2026-09-27 00:00:00'),
(15, 'Hellmerry Concert', '0', '2026-11-28', '2026-09-27 00:00:00'),
(16, 'Car Show in Marikina', '0', '2026-10-04', '2026-09-27 00:00:00'),
(17, 'Cisco (CCST) Certification', '0', '2026-10-07', '2026-09-27 00:00:00'),
(18, 'Cleaning the House', '0', '2026-09-27', '2026-09-27 00:00:00'),
(19, 'Interview the client in capstone', '0', '2026-10-02', '2026-09-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'art_panulde', 'Art Panulde', 'art.panulde@example.com', '$2y$10$92IUNpkjO0RoQ5bMi.Ye4oKoEa3Ro9IIC/.og/at2...', '2026-10-08 22:46:48'),
(2, 'Pantropiko7', 'Gwen Apuli', 'panulde.artlaurenze21@gmail.com', '$2y$10$7Qzl3ylB3gS0syXnaPdqiukcBREyMYeHTRtKvLFAPO...', NULL);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;