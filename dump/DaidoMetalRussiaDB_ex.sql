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
-- Дамп данных таблицы `checked`
--

INSERT INTO `checked` (`id`, `code`, `count_of_query`, `phoneNumber`, `geo`, `comment`, `created_at`, `day_of_query`, `month_of_query`, `year_of_query`) VALUES
(7, '438428660429', 4, '79200526967', 'Nijniy', 'Проверен повторно', '2018-05-20 10:28:24', '', '', ''),
(8, '902931484004', 2, '79200526967', 'Zavolje', 'Проверен повторно', '2018-05-20 11:13:05', '', '', ''),
(10, '095808095345', 3, '7950026967', 'Novosibirsk', 'Проверен повторно', '2018-05-20 11:26:08', '', '', ''),
(11, '056484112611', 5, '79200526967', 'Moskva', 'Проверен повторно', '2018-05-20 14:13:58', '', '', '');

-- --------------------------------------------------------

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
-- Дамп данных таблицы `code`
--

INSERT INTO `code` (`id`, `code_number`, `compare`, `isChecked`, `phoneNumber`, `geo`, `comment`, `day_of_query`, `month_of_query`, `year_of_query`, `date_of_add`) VALUES
(1, '438428660429', '438428660429', 1, '79200526967', 'test', 'Оригинал', '', '', '', ''),
(2, '902931484004', '902931484004', 1, '79200526967', 'test', 'Оригинал', '', '', '', ''),
(3, '095808095345', '095808095345', 1, '7950026967', 'test', 'Оригинал', '', '', '', ''),
(4, '056484112611', '056484112611', 1, '79200526967', 'test', 'Оригинал', '', '', '', ''),
(5, '994026532432', '', 0, '', '', '', '', '', '', ''),
(6, '285232365688', '', 0, '', '', '', '', '', '', ''),
(7, '400999248480', '', 0, '', '', '', '', '', '', ''),
(8, '307871262410', '', 0, '', '', '', '', '', '', ''),
(9, '987925521652', '', 0, '', '', '', '', '', '', ''),
(10, '654329389583', '', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

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
-- Дамп данных таблицы `fake`
--

INSERT INTO `fake` (`id`, `code`, `phoneNumber`, `geo`, `comment`, `day_of_query`, `month_of_query`, `year_of_query`) VALUES
(1, '111111111111', '241214214214421', 'gg_izi', 'Контрафакт', '18', '05', '2018'),
(2, '241124214142', '241241214412', 'nijniy', 'Контрафакт', '18', '05', '2018'),
(3, '412241214214', '421124124124', 'хоба', 'Контрафакт', '18', '05', '2018'),
(4, '643346346346', '364346346634', 'хоба', 'Контрафакт', '18', '05', '2018'),
(5, '231423235235', '532253325352', 'test', 'Контрафакт', '18', '05', '2018'),
(6, '231232312312', '32121321321', 'test', 'Контрафакт', '19', '05', '2018'),
(7, '438128660429', '79200526967', 'test', 'Контрафакт', '', '', '');

-- --------------------------------------------------------

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `fake`
--
ALTER TABLE `fake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `geo`
--
ALTER TABLE `geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
