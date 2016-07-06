-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 06 2016 г., 23:27
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_catalog` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `status` enum('active','passive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_catalog`, `title`, `status`) VALUES
(1, 'Процессоры', 'active'),
(2, 'Материнские платы', 'active'),
(3, 'Видеоадаптеры', 'active'),
(4, 'Жёсткие диски', 'active'),
(5, 'Оперативная память', 'active'),
(6, 'Блоки питания', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `date_order` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('state1','state2','state3') NOT NULL DEFAULT 'state1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `date_order`, `status`) VALUES
(1, 3, '2005-01-04 10:39:38', 'state2'),
(2, 6, '2005-02-10 09:40:29', 'state1'),
(3, 1, '2005-02-18 13:41:05', 'state3'),
(4, 3, '2005-03-10 18:20:00', 'state1'),
(5, 3, '2005-03-17 19:15:36', 'state3'),
(6, 4, '2016-07-13 05:28:07', 'state2');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `id_order`, `id_product`, `price`, `count`) VALUES
(1, 5, 22, '2093.00', 3),
(2, 1, 12, '2289.00', 5),
(3, 3, 24, '2468.00', 7),
(4, 4, 30, '1717.00', 2),
(5, 2, 14, '2518.00', 1),
(6, 6, 7, '7259.00', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `price` decimal(7,2) DEFAULT '0.00',
  `count` int(11) DEFAULT '0',
  `mark` tinytext NOT NULL,
  `description` text,
  `id_catalog` int(11) NOT NULL DEFAULT '0',
  `status` enum('active','passive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `count`, `mark`, `description`, `id_catalog`, `status`) VALUES
(5, 'Celeron D 325 2.53GHz', '2747.00', 6, 'Celeron', 'Процессор Celeron® D 325 2.53GHz, 256kb, 478-PGA, 533Mhz, OEM ', 1, 'active'),
(7, 'Intel Pentium 4 3.2GHz', '7259.00', 5, 'Intel', 'Процессор Intel® Pentium®4 3.2GHz, 1Mb, 478-PGA, 800Mhz, Hyper-Threading, OEM ', 1, 'active'),
(12, 'Gigabyte GA-8IPE1000G', '2289.00', 6, 'Gigabyte', 'Материнская плата Socket-478 Gigabyte GA-8IPE1000G i865PE(800/533/400Mhz),2ch400/333/266DDR,PCI/AGP,U-100,AC`97,Lan(1Gb),S-ATA,USB 2.0, ATX', 2, 'active'),
(14, 'Asustek P4P800-VM\\L i865G', '2518.00', 6, 'Asustek', 'Материнская плата Socket-478 Asustek P4P800-VM\\L i865G FSB800/533/400, 2chDDR400/333/266(4слота),AGP,video,3PCI,ATA-100,S-ATA,lan ,M-ATX', 2, 'active'),
(18, 'SAPPHIRE 256MB RADEON 9550', '2730.00', 3, 'Sapphire', 'ВИДЕОКАРТА SAPPHIRE 256MB RADEON 9550, TV-out, DVI, OEM ', 3, 'active'),
(19, 'GIGABYTE AGP GV-N59X128D', '5886.00', 6, 'Gigabyte', 'ВИДЕОКАРТА GIGABYTE AGP GV-N59X128D FX5900XT OEM ', 3, 'active'),
(22, 'Samsung SP0812C', '2093.00', 5, 'Samsung', 'Винчестер 80 GB Samsung SP0812C, SATA, 7200rpm SpinPoint P80 SerialATA Буферная кэш-память 8 MB  7200об/мин  Интерфейс Serial ATA 1.0', 4, 'active'),
(24, 'Seagate ST3120026A', '2468.00', 8, 'Seagate', 'Винчестер 120 GB Seagate ST3120026A, UDMA-100, 7200rpm, 8MB ', 4, 'active'),
(28, 'Kingston DDR-400 512MB', '1932.00', 20, 'Kingston', 'Оперативная память DDR-400 512MB Kingston ', 5, 'active'),
(30, 'Hynix DDR-400 512MB', '1717.00', 8, 'Hynix', 'Оперативная память DDR-400 512MB Hynix ', 5, 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` tinytext,
  `lastname` tinytext,
  `birthday` date DEFAULT NULL,
  `email` tinytext,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00',
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','passive','lock','gold') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `lastname`, `birthday`, `email`, `password`, `is_active`, `reg_date`, `last_update`, `status`) VALUES
(1, 'Андрей', 'Зубов', '1974-06-12', 'zubov@email.ru', 'qwe1', 1, '0000-00-00 00:00:00', '2016-07-06 23:52:26', 'active'),
(2, 'Валерий', 'Петров', '1982-09-05', 'petrov@email.ru', 'qwe2', 0, '2016-07-06 23:49:22', '2016-07-06 23:52:26', 'passive'),
(3, 'Михаил', 'Сидоров', '1985-01-07', 'sidorov@email.ru', 'qwe3', 1, '2016-07-06 23:49:22', '2016-07-06 23:52:26', 'active'),
(4, 'Виктор', 'Иванов', '1989-10-03', 'ivanov@email.ru', 'qwe4', 0, '2016-07-06 23:49:22', '2016-07-06 23:52:26', 'active'),
(5, 'Александр', 'Хорев', '1979-05-29', 'horev@email.ru', 'qwe5', 1, '2016-07-06 23:49:22', '2016-07-06 23:52:26', 'lock'),
(6, 'Василий', 'Егоров', '1993-11-24', 'egorov@email.ru', 'qwe6', 1, '2016-07-06 23:49:22', '2016-07-06 23:52:26', 'gold');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catalog` (`id_catalog`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
