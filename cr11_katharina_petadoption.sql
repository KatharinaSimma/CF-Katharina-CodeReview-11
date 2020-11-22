-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2020 at 08:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_katharina_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_katharina_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_katharina_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoption_id` int(11) NOT NULL,
  `fk_animal_id` int(55) NOT NULL,
  `fk_user_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(55) NOT NULL,
  `animal_name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `age` int(3) NOT NULL,
  `size` enum('small','large') NOT NULL,
  `image` varchar(200) DEFAULT 'https://cdn.pixabay.com/photo/2012/03/04/00/03/jellyfish-21741_960_720.jpg',
  `description` varchar(200) NOT NULL,
  `fk_location_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_name`, `type`, `age`, `size`, `image`, `description`, `fk_location_id`) VALUES
(1, 'Mike', 'Crocodile', 9, 'large', 'https://cdn.pixabay.com/photo/2020/03/10/12/16/crocodile-4918820_960_720.jpg', 'Mike is lazy. He likes to sunbath. He eats smaller animals', 1),
(2, 'Pythonista I', 'Snake', 5, 'large', 'https://cdn.pixabay.com/photo/2019/02/06/17/09/snake-3979601_960_720.jpg', 'Pythonista I likes to loop herself around branches. She is a git conflicted about life.', 2),
(3, 'Berta', 'Beetle', 1, 'small', 'https://cdn.pixabay.com/photo/2020/03/12/22/23/greens-4926370_960_720.jpg', 'She is small, but tough and she will eat aphids. Also dots.', 1),
(4, 'Esmeralda', 'Cat', 7, 'small', 'https://cdn.pixabay.com/photo/2017/11/13/07/14/cat-eyes-2944820_960_720.jpg', '', 1),
(5, 'Frederik', 'Mouse', 3, 'small', 'https://cdn.pixabay.com/photo/2016/10/01/19/20/mouse-1708177_960_720.jpg', 'Frederik is not like other mice. He like to cuddle and tell colorful stories.', 3),
(6, 'Ruby', 'Icefox', 3, 'small', 'https://cdn.pixabay.com/photo/2017/01/14/12/59/iceland-1979445_960_720.jpg', 'Ruby is the perfect Winter Animal. She likes snow and play.', 2),
(7, 'Bernhard', 'Dog', 5, 'large', 'https://cdn.pixabay.com/photo/2017/05/13/11/53/dog-2309390_960_720.jpg', 'Bernhard is huge and he likes to eat a lot. He has to go outside three times a day.', 2),
(8, 'Nile', 'Crocodile', 19, 'large', 'https://cdn.pixabay.com/photo/2019/07/15/12/14/west-african-dwarf-crocodile-4339216_960_720.jpg', 'Crocodiles are huge animals and like water. You should have a pool or access to a lake.', 1),
(9, 'Methusalem', 'Dog', 38, 'large', 'https://cdn.pixabay.com/photo/2017/09/01/21/51/golden-retriever-2705639_960_720.jpg', 'Methusalem is a kind dog but basically done with life. He\'ll die soon. You should make arrangements.', 2),
(13, 'Pythonista II', 'Snake', 5, 'small', 'https://cdn.pixabay.com/photo/2019/02/06/17/09/snake-3979601_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur voluptua. At vero eos et accusam et justo du', 1),
(15, 'Sumsi', 'Bee', 1, 'small', 'https://cdn.pixabay.com/photo/2012/03/04/00/03/jellyfish-21741_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo du', 1),
(22, 'Sepp', 'Ant', 1, 'small', 'https://cdn.pixabay.com/photo/2012/03/04/00/03/jellyfish-21741_960_720.jpg', 'Ants are smart.', 3),
(23, 'Hans', 'Tigerbird', 99, 'small', 'https://cdn.pixabay.com/photo/2017/06/22/12/19/tiger-2430625_960_720.jpg', ' Tigerbird!!!', 2),
(25, 'Beyonce', 'Zebra', 39, 'large', 'https://cdn.pixabay.com/photo/2020/03/10/04/48/animal-4917802_960_720.jpg', 'Zebras are awesome. Fun fact: their skin is black. Also they are not horses.', 2),
(26, 'Beyonce', 'Zebra', 39, 'large', 'https://cdn.pixabay.com/photo/2020/03/10/04/48/animal-4917802_960_720.jpg', 'Zebras are awesome. Fun fact: their skin is black. Also they are not horses.', 2),
(28, 'Jake', 'Vulture', 9, 'large', 'https://cdn.pixabay.com/photo/2018/04/16/19/23/nature-3325586_960_720.jpg', 'Jake is a tender buddy who loves to cuddle and gently peck your nose', 3);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(55) NOT NULL,
  `location_name` varchar(55) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(55) NOT NULL,
  `ZIP` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `address`, `city`, `ZIP`) VALUES
(1, 'Pets! Pets! Pets!', 'Tierplatz 3', 'Vienna', 1030),
(2, 'The Zoo', 'Animal Street 4', 'London', 12345),
(3, 'Best Friends', 'Rue de Chien 7', 'Paris', 21358);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(55) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `pass`, `status`) VALUES
(1, 'Fritz Mueller', 'fritz@mueller.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(2, 'Hansi', 'hans@solo.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(3, 'CaptainKathi', 'kath@ri.na', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(4, 'Sandra Bullock', 'sandy@b.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(5, 'Karl Marx', 'karl@communism.uk', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(6, 'Theo Patkos', 'theo@codefactory.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_3` FOREIGN KEY (`fk_animal_id`) REFERENCES `animal` (`animal_id`),
  ADD CONSTRAINT `adoption_ibfk_4` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
