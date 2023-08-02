-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 16 2022 р., 23:03
-- Версія сервера: 10.4.22-MariaDB
-- Версія PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `t_accounting`
--
CREATE DATABASE IF NOT EXISTS `t_accounting` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `t_accounting`;

-- --------------------------------------------------------

--
-- Структура таблиці `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `login`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(4, 'admin1', 'admin1', '1111'),
(6, 'admin22', 'admin2', '2');

-- --------------------------------------------------------

--
-- Структура таблиці `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `cargo`
--

INSERT INTO `cargo` (`id`, `name`) VALUES
(1, 'Пшениця'),
(18, 'Кукурудза'),
(19, 'Борошно'),
(20, 'С/г техніка'),
(21, 'Готова продукція');

-- --------------------------------------------------------

--
-- Структура таблиці `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `m_number` varchar(50) NOT NULL,
  `max_weight_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `cars`
--

INSERT INTO `cars` (`id`, `brand`, `m_number`, `max_weight_cargo`) VALUES
(1, '', 'немає', 0),
(5, 'hgbvf', 'hngfbdv', 45);

-- --------------------------------------------------------

--
-- Структура таблиці `destination`
--

CREATE TABLE `destination` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `destination`
--

INSERT INTO `destination` (`id`, `name`) VALUES
(1, 'пункт 1');

-- --------------------------------------------------------

--
-- Структура таблиці `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date_visit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `login`, `password`, `phone`, `date_visit`) VALUES
(1, 'немає', '', '', '', ''),
(3, 'Козбур Іван', 'ivan', '1111', '0325623256', '2022-05-16'),
(4, 'gnghn', 'fhbxfg', '1', 'hnfgnhg', '');

-- --------------------------------------------------------

--
-- Структура таблиці `price_for_one`
--

CREATE TABLE `price_for_one` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `price_for_one`
--

INSERT INTO `price_for_one` (`id`, `name`, `price`) VALUES
(1, 'Звичайний', 10),
(4, 'Екстра', 15),
(5, 'Економ', 5);

-- --------------------------------------------------------

--
-- Структура таблиці `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'актуально'),
(2, 'очікується'),
(3, 'завершено');

-- --------------------------------------------------------

--
-- Структура таблиці `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `km` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` varchar(11) NOT NULL,
  `date_cr_change` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_cars` int(11) NOT NULL,
  `id_type_cargo` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_price_for_one` int(11) NOT NULL,
  `id_destination` int(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `transportation`
--

INSERT INTO `transportation` (`id`, `name`, `km`, `weight`, `date_start`, `date_finish`, `date_cr_change`, `comment`, `id_status`, `id_cars`, `id_type_cargo`, `id_driver`, `id_price_for_one`, `id_destination`, `cost`) VALUES
(16, 'Перевезення 2', 900, 3, '2022-05-17', '2022-05-19', '2022-05-16', 'немає', 2, 5, 1, 1, 5, 1, 4500),
(17, 'Тернопіль - Львів', 150, 3, '2022-04-12', '2022-04-28', '', 'дороговартісний груз', 3, 2, 20, 3, 4, 0, 2250),
(19, 'Перевезення 1', 500, 4, '2022-05-07', '2022-05-11', '', '-', 1, 1, 19, 4, 4, 0, 7500);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `price_for_one`
--
ALTER TABLE `price_for_one`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблиці `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `price_for_one`
--
ALTER TABLE `price_for_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
