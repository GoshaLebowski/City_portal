-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2023 г., 18:57
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portal_city_problems`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `login` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'adminWSR');

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name_application` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripton` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categories` int NOT NULL,
  `file_path` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path_proof` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_application_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `id_user`, `name_application`, `descripton`, `id_categories`, `file_path`, `file_path_proof`, `timestamp`, `id_application_status`) VALUES
(42, 3, 'Разукрашена стена в подъезде', 'Я конечно понимаю что у нас люди не культурные, но всё же. До такой наглости не доходило!', 7, 'uploads/1678738022problem1.jpeg', 'uploads/1679068868decision1.jpeg', '13.03.2023', 2),
(45, 6, 'На площадке сломана беранда ', 'Видела как несколько ребят по пьяне ломали беранду, на площадке. Пожалуйста, исправьте эту проблему!', 8, 'uploads/1678740467problem5.jpeg', 'uploads/1679071180decision5.jpeg', '13.03.2023', 2),
(47, 4, 'Сломали всё', 'Выхожу утром на работу, вижу такую картину!', 7, 'uploads/1679071616problem3.jpeg', 'uploads/1679074730decision3.jpeg', '17.03.2023', 2),
(48, 5, 'Замело всё снегом ', 'Уберите пожалуйста снег! ', 43, 'uploads/1679073236problem4.jpeg', 'uploads/1679073757', '17.03.2023', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `application_status`
--

CREATE TABLE `application_status` (
  `id_application_status` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `application_status`
--

INSERT INTO `application_status` (`id_application_status`, `status`) VALUES
(1, 'Новая'),
(2, 'Решена'),
(3, 'Отклонена ');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_categories` int NOT NULL,
  `categories` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_categories`, `categories`) VALUES
(7, 'Уборка мусора '),
(8, 'Ремонт дорог'),
(43, 'Уборка снега');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `login`, `email`, `password`) VALUES
(3, 'Русских Егор Александрович', 'russ03', 'russckikh.e@gmail.com', 'd4d8f6efa08ee1d7f932cf1e313ac77b'),
(4, 'Тупицын Никита Кирилович', 'tupic34', 'jdfksa@gmail.ru', 'd4d8f6efa08ee1d7f932cf1e313ac77b'),
(5, 'Попов Денис Иванович', 'popov13', 'popovden@gmail.com', 'd4d8f6efa08ee1d7f932cf1e313ac77b'),
(6, 'Симонова Елизавета Львовна', 'liza98', 'elizaveta15@mail.ru', 'd4d8f6efa08ee1d7f932cf1e313ac77b'),
(8, 'Петров Василий Семёнович', 'petr34', 'aksdfj@gmail.com', 'd4d8f6efa08ee1d7f932cf1e313ac77b'),
(9, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categories` (`id_categories`),
  ADD KEY `id_application_status` (`id_application_status`);

--
-- Индексы таблицы `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id_application_status`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id_application_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`id_application_status`) REFERENCES `application_status` (`id_application_status`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
