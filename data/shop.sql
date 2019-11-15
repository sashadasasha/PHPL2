-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Ноя 15 2019 г., 12:53
-- Версия сервера: 5.7.28
-- Версия PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`) VALUES
(111, '18ce90cb4fa86e216f774150bca2ee19', 29);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(27, 'Xiaomi RedMi', 'смартфон', 40000, 'img1.jpg'),
(28, 'Xiaomi Redmi 6A', 'надежный смартфон по доступной цене', 12000, 'img2.jpg'),
(29, 'Huawei P30 Lite Peacock Blue', 'смартфон', 20000, 'img3.jpg'),
(30, 'Huawei P30 Breathing Crystal', 'идеальный смартфон премиум качества', 40000, 'img4.jpg'),
(31, 'Samsung UE50RU7170U', 'улучшенный телевизор', 40000, 'img5.jpg'),
(32, 'Sony KDL32WE613', 'инновационный дизайн', 55000, 'img6.jpg'),
(33, 'Haier LE24K6500SA', 'прогрессивный дизайн', 47000, 'img7.jpg'),
(34, 'Philips 55PUS6503', 'Недорогой качественный телевизор', 36000, 'img8.jpg'),
(35, 'Acer Aspire A315-21G-944Q NX.GQ4ER.059', 'ноутбук', 30000, 'img9.jpg'),
(36, 'ASUS S330UA-EY027T', 'компактность и функциональность', 55000, 'img10.jpg'),
(37, 'Lenovo IdeaPad 330-15IKB (81DE02VRRU)', 'удачные пропорции', 38000, 'img11.jpg'),
(38, 'Lenovo IdeaPad L340-17IRH (81LL001HRU)', 'игровой ноутбук - удачное решение для продвинутого геймера', 80000, 'img12.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '123'),
(2, 'user', '123'),
(31, 'superuser', '1234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
