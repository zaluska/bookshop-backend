-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 10 mars 2019 kl 12:33
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bookshop-backend`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(8, 0, 2, 1),
(9, 0, 3, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cat_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Jack Vance', 'jack-vance'),
(2, 'Stephen King ', 'stephen-king'),
(3, 'J.K. Rowling ', 'j-k-rowling ');

-- --------------------------------------------------------

--
-- Tabellstruktur `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(1, 3, 'Harry Potter and the Chamber of Secrets', '<p>The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.\r\n</p>\r\n', 'Harry-Potter-and-the-Chamber-of-Secrets', 150, 'harry1.jpg', '2019-03-09', 17),
(2, 2, 'Elevation', '<p>In the small town of Castle Rock, the setting of many of King’s most iconic stories, Scott is engaged in a low grade—but escalating—battle with the lesbians next door whose dog regularly drops his business on Scott’s lawn. One of the women is friendly; the other, cold as ice. Both are trying to launch a new restaurant, but the people of Castle Rock want no part of a gay married couple, and the place is in trouble. When Scott finally understands the prejudices they face–including his own—he tries to help. Unlikely alliances, the annual foot race, and the mystery of Scott’s affliction bring out the best in people who have indulged the worst in themselves and others.</p>\r\n', 'elevation', 79, 'King1.jpg', '2019-03-09', 76),
(3, 1, 'Tales of the Dying Earth', '<p>Jack Vance is one of the most remarkable talents to ever grace the world of science fiction. His unique, stylish voice has been beloved by generations of readers. One of his enduring classics is his 1964 novel, The Dying Earth, and its sequels--a fascinating, baroque tale set on a far-future Earth, under a giant red sun that is soon to go out forever.\r\n\r\nThis omnibus volume comprised all four books in the series, The Dying Earth, The Eyes of the Overworld, Cugel\'s Saga and Rialto the Magnificent. It is a must-read for every sf fan.</p>\r\n', 'Tales-of-the-Dying-Earth', 79, 'jack1.jpg', '2019-03-09', 53),
(4, 1, 'The Jack Vance Treasury', '<p>Nebula and World Fantasy Grand Master Jack Vance is one of the most admired and cherished writers of science fiction and fantasy in the world, and is one of the truly important and influential storytellers of the 20th century. From his first published story \"The World Thinker\" in 1945 to his final novel Lurulu in 2004, Vance has shown an astonishing range of inventiveness, versatility and sheer storytelling power, as well as a gift for language and world-building second to none. Winner of the Hugo, Nebula, World Fantasy and Edgar awards, his acclaimed first book The Dying Earth and its sequels helped shape the face of modern heroic fantasy for generations of readers -- and writers! In more than sixty novels, he has done more than any other author to define science fantasy and its preeminent form: the planetary adventure. Born in San Francisco in 1916, Vance wrote much of what you\'ll find between these covers both abroad and at home in the hills above Oakland, either while serving in the merchant marine or traveling the world with his wife Norma, all the while pursuing his great love of fine cuisine and traditional jazz. Now, at last, the very best of Vance\'s mid-length and shorter work has been collected in a single landmark volume. With a Preface by Vance himself and a foreword by long-time Vance reader George R.R. Martin, it stands as the capstone to a splendid career and makes the perfect introduction to a very special writer.</p>', 'the-jack-vance-treasury', 79, 'jack2.jpg', '0000-00-00', 2),
(5, 1, 'The Demon Princes', 'In a far-off future, criminals have the freedom to pursue their most violent passions among the civilized worlds of the Oikumene, assured that justice cannot follow when they escape into the lawless Beyond—a vast playground where the most elusive and monomaniacal murderers, thieves, and slavers can conquer a world of their own, play out complex fantasies of bloodlust, pursue revenge and immortality over generations, give themselves to a psychotic world of self-absorption, and devalue their neighbors\' property values.', 'the-demon-princes', 99, 'jack3.jpg', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sales_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `address`, `postcode`, `city`, `created_on`) VALUES
(23, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 17:51:35'),
(24, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 17:58:52'),
(25, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 18:15:47'),
(26, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 18:19:13'),
(27, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 18:20:03'),
(28, 'test@gmail.se', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:34:50'),
(29, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:37:42'),
(30, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:40:39'),
(31, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:40:46'),
(32, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:41:49'),
(33, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:43:59'),
(34, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 19:45:05'),
(35, 'cvlpa1@gmail.com', 'Sureerat', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 20:03:21'),
(36, 'sureerat1988@gmail.com', 'Mikael', 'Albertsson', 'FalkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 20:08:16'),
(37, 'fumie.svenhard@yh.nackademin.se', 'Fumie', 'Svenhard', 'JJJJJ', '12345', 'stockholm', '2019-03-09 20:44:35'),
(38, 'nataliia.zaluska@yh.nackademin.se', 'Nataliia', 'Zaluska', 'JJJJJ', '12345', 'stockholm', '2019-03-09 20:49:24'),
(39, 'sureerat1988@gmail.com', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-09 20:52:21'),
(40, 'nataliia.zaluska@yh.nackademin.se', 'Nataliia', 'Zaluska', 'jjjjj', ' 39', 'hjuy', '2019-03-09 20:56:56'),
(41, 'fumie.svenhard@yh.nackademin.se', 'Fumie', 'Svenhard', 'JJJJJ', '12345', 'stockholm', '2019-03-09 20:57:09'),
(42, 'sureerat1988@gmail.com', 'Sureerat', 'Albertsson', 'FolkÃ¶pingsvÃ¤gen 13', '121 39', 'Johanneshov', '2019-03-10 11:50:35');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
