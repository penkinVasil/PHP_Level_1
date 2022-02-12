-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2022 г., 16:29
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_b` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_b`, `session_id`, `goods_id`) VALUES
(4, '2278tbo6mjt444lr1eono668q21adsn9', 3),
(5, '2278tbo6mjt444lr1eono668q21adsn9', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(255) NOT NULL,
  `product` varchar(100) NOT NULL,
  `description` text,
  `price` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `product`, `description`, `price`) VALUES
(1, 'gloves', 'Артикул: 4768644;<br>\r\nСостав: 100% кожа;<br>\r\nЦвет: Черный;<br>\r\nУзор: Однотонный;<br>\r\nСезон: Зима;<br>\r\nСтиль: Повседневный;<br>', 20),
(2, 'hat', 'Артикул: 4713555;<br>\r\nСостав: 100% полиэстер;<br>\r\nЦвет: Коричневый;<br>\r\nУзор: Однотонный с чёрной лентой;<br>\r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: 48;<br>', 30),
(3, 'jacket', 'Артикул: 4712575;<br>\r\nСостав: 100% полиэстер;<br>\r\nЦвет: Серый;<br>\r\nУзор: Чёрные рукава;<br>\r\nСезон: Осень-весна;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: XXL;<br>', 100),
(4, 'pants', 'Артикул: 47115424;<br>\r\nСостав: 100% хлопок;<br>\r\nЦвет: Коричневый;<br>\r\nУзор: Однотонный ;<br>\r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: 50;<br>', 80),
(5, 'vest', 'Артикул: 2355237;<br>\r\nСостав: Полиэстер, хлопок;<br>\r\nЦвет: Белый/Коричневый;<br>\r\nУзор: Однотонный;<br>\r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: XXL;<br>', 110),
(6, 'shirt', 'Артикул: 4712321;<br>\r\nСостав: 100% полиэстер;<br>\r\nЦвет: Белый;<br>\r\nУзор: Однотонный;<br>\r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: XXL;<br>', 60),
(7, 'shoes', 'Артикул: 4323422;<br>\r\nСостав: 100% кожа;<br>\r\nЦвет: Чёрный;<br>\r\nУзор: Однотонный;<br> \r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: 43;<br>', 70),
(8, 'socks', 'Артикул: 2352511;<br>\r\nСостав: 100% хлопок;<br>\r\nЦвет: На выбор;<br>\r\nУзор: Однотонный;<br>\r\nСезон: Лето;<br>\r\nСтиль: Повседневный;<br>\r\nРазмер: 39-42;<br>', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `filename`, `views`) VALUES
(1, 'gloves.jpg', 93),
(2, 'hat.jpg', 306),
(3, 'jacket.jpg', 63),
(4, 'pants.jpg', 38),
(5, 'vest.jpg', 26),
(6, 'shirt.jpg', 23),
(7, 'shoes.jpg', 20),
(8, 'socks.jpg', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(11) CHARACTER SET utf8 NOT NULL,
  `pass` text CHARACTER SET utf8 NOT NULL,
  `passHash` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `passHash`) VALUES
(1, 'admin', '123', '$2y$10$mU3iwTCpm4XabkB/LL.QluNf1ODXXKwIMkjOjNvP1Ln7Ee2uhz9XO'),
(2, 'guest', '12345', '$2y$10$wq2JSZ8qeLsf.YoslVGknOyz8XkPMvOd7Aum.At2O6VAtGGb9vPUK'),
(3, 'user', '321', '$2y$10$c4sYSFQc6NE.SVGs12X.gOP8m3PLG5KdfLFKJmoz.sogcoOA5qGDy'),
(4, 'unknown', '555', '$2y$10$3YfQCJcdlqTE2rhmJvaA2OFHienGgoev68MEGqm2nrTBzA8wui2L2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_b`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
