-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 13 2019 г., 23:53
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
(58, 'Фотоурок', 'Фотосесиия в лесу ', 'general', 'c7a34ad0cb3ecc39c3c24cea08b003b0.jpg', 28),
(59, 'php', 'проверка заданий', 'general', 'dcfdbf8846e2b87ee95bca2d7ef26e18.jpg', 28),
(60, 'выезд на полеты', 'Сторожевое - прогноз на воскресенье положительный ', 'general', '68d5535b971d558f594f10a5affd0a71.jpg', 16),
(61, 'Написать друзьям', 'Написать друзьяи  КВИРТУ', 'general', 'c1ca21486463f85f68a7960f2880fee2.jpg', 16),
(62, 'Позвонить', 'Позвонить Luis\r\nсуперкарго Новорос -Джакарта', 'private', 'ab00d430cec7b5a4aaf5cf9f26a14d8d.jpg', 16),
(63, 'Провести тренировку', 'Пятница 19-00 тренирока Айкидо', 'general', 'a09a636b3f088be8816ad1a438d12f31.jpg', 16),
(64, 'Подвох', 'Подготовить оборудование  для ПодВох', 'draft', 'd981a8b1fae6a56cbfd792de36a93677.jpg', 16),
(65, 'Проект ООП', 'Пройти 3и урока ', 'general', 'b5e8c8445e53f39a0250ffc949f6c30d.jpg', 29),
(66, 'Сын', 'Уделить время семье', 'private', 'b5e8c8445e53f39a0250ffc949f6c30d.jpg', 29);

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
(16, 'Hardy', 'hardy@mail.ru', '202cb962ac59075b964b07152d234b70'),
(28, 'Marlin', 'Marlin@mail.ru', '202cb962ac59075b964b07152d234b70'),
(29, 'Max', 'Max@mail.ru', '202cb962ac59075b964b07152d234b70');

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
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
