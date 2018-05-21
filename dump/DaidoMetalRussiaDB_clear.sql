-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2018 г., 07:02
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `DaidoMetalRussiaDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `checked`
--

CREATE TABLE `checked` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `count_of_query` int(11) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `day_of_query` text NOT NULL,
  `month_of_query` text NOT NULL,
  `year_of_query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code_number` varchar(12) NOT NULL,
  `compare` varchar(12) NOT NULL,
  `isChecked` int(1) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `day_of_query` text NOT NULL,
  `month_of_query` text NOT NULL,
  `year_of_query` text NOT NULL,
  `date_of_add` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `fake`
--

CREATE TABLE `fake` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `geo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `day_of_query` text NOT NULL,
  `month_of_query` text NOT NULL,
  `year_of_query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `geo`
--

CREATE TABLE `geo` (
  `id` int(11) NOT NULL,
  `id_query` varchar(255) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `city_name_ru` text NOT NULL,
  `region_name_ru` text NOT NULL,
  `iso_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) CHARACTER SET utf8 NOT NULL,
  `password` varchar(191) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'Qurmesond', '$2y$10$D7JsaWqPms9TCd3vIpBPJeOv9COrdTLJZf/i4XNAhGi4IG5gsfGtG'),
(2, 'Qalanyaur', '$2y$10$UKS.cjj0SSed09qxQ/Xy.e8.ayUdMpvFFEUBi2yXDyRgz8tI0rCm.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fake`
--
ALTER TABLE `fake`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `geo`
--
ALTER TABLE `geo`
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
-- AUTO_INCREMENT для таблицы `checked`
--
ALTER TABLE `checked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT для таблицы `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT для таблицы `fake`
--
ALTER TABLE `fake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT для таблицы `geo`
--
ALTER TABLE `geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
