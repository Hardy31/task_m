-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 08 2019 г., 00:11
-- Версия сервера: 5.7.25-0ubuntu0.18.04.2
-- Версия PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id_post` int(11) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_descrip` text NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_picture` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id_post`, `post_name`, `post_descrip`, `post_status`, `post_picture`, `id_user`) VALUES
(21, 'Задание1', 'Описание задания 1', 'draft', 'f81c1ff0b355d7300db5225260dcf1f0.jpg', 16),
(26, 'Задание2', 'Описание задания 2', 'private', '0cac2fa1d9eeb87069e388a5b2b7e747.jpg 	', 16),
(27, 'Задача33', 'Описание задачи 33', 'general', '0b57b2ab2cc44144e93cd1f30f333fe5.jpg', 16),
(30, 'Проект', '', 'draft', 'd55d83138d34e9e22d8dfe0aacb0e483.jpg', 16),
(31, 'ЗадачаПользователя1', 'Описание задачи1 пользлвателя 1', 'draft', 'f8e071bdc8d93d6edc7f66dc7335ca7a.jpg', 15),
(32, 'Задача 2 Пользователя 1', 'Описание Задача 2 Пользователя 1', 'general', 'f8e071bdc8d93d6edc7f66dc7335ca7a.jpg', 15),
(33, 'Задача', 'Jgbcfybt Задача Jon 1', 'draft', '0cac2fa1d9eeb87069e388a5b2b7e747.jpg', 18),
(34, 'Задача', 'Описание Задача Jon 2', 'draft', 'f8e071bdc8d93d6edc7f66dc7335ca7a.jpg', 18),
(35, '55', '5555', 'draft', '399201c4ea2f17ad043a25335a957c99.jpg', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `pw` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `pw`) VALUES
(12, 'Gosha2', 'Gosh2@mail.ru', 'e10adc3949ba59abbe56e057f20f883e'),
(15, '1', '1@1.ru', 'c4ca4238a0b923820dcc509a6f75849b'),
(16, 'Hardy', 'alex-vav@list.ru', '202cb962ac59075b964b07152d234b70'),
(17, '2', '2@2.ru', 'c4ca4238a0b923820dcc509a6f75849b'),
(18, 'jon', 'jon@dou.com', '202cb962ac59075b964b07152d234b70');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
