-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 06 2019 г., 14:34
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
(1, 'Задача 1', 'Описание задачи 1', 'draft', '', 16),
(2, 'Задача 2', 'Описание задачи 2', 'private', '', 16),
(3, 'Задача 3', 'Описание 3', 'general', '', 16),
(4, 'Задача 4', 'Описание 4', 'general', '', 16),
(5, 'sfdh8', '888888888888888888888888888888888', 'draft', '', 16),
(6, 'задача 9', 'Описание 9 задачи', 'general', '', 16),
(7, 'задача 1', 'Описание задачи 1', 'general', '', 15),
(8, 'Запись 10', 'Описание записи 10 Приватная', 'private', '', 16),
(9, 'Запись 11', 'Описание 11 записи Общедоступная', 'general', '', 16),
(10, 'Запись 12', 'Описание записи 12 Доступная ', 'general', '', 16);

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
(17, '2', '2@2.ru', 'c4ca4238a0b923820dcc509a6f75849b');

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
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
