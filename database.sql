--
-- Data base: `certificate`
--

CREATE DATABASE `certificate`;

-- --------------------------------------------------------

--
-- Table structure `certificate`
--

CREATE TABLE `certificate` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `licensed` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `testimonial_id` int(5) NOT NULL,
  `date_sign` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `date_event` date NOT NULL,
  `workload` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;