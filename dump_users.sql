-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2018 г., 18:53
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` text,
  `age` int(11) DEFAULT NULL,
  `description` longtext,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `photo`) VALUES
(46, 'Mishal2000', '$6$rounds=5458$yopta23GDs43yopt$2HeVoh3IzljCJRgDdRxavUKIrN9XINapKc0RR5ABKdKbk3jmTC8TUlSSaqYvpx19vmqX.s6XAN0DSXYByv8fN1', 'Миша', 15, 'школьник', 'Mishal2000_simpsons-avatar_oze1t.jpg'),
(47, 'epick', '$6$rounds=5458$yopta23GDs43yopt$BasU.VCo0BaHa5vX5OBTlcQhBvMWByEYXljeEyYAhV4EOzmHVuiCuNW3MSFkVS7/IKU/9nu1ZrWYCJfTaycvN/', 'Александр', 25, 'менеджер по прадажам', 'epick_kung_fu_panda.jpg'),
(48, 'anton18', '$6$rounds=5458$yopta23GDs43yopt$PIOySBqE0ucdcv5e9tSr.IcmvUJl89rMMrpOlDLwS7Q6cxaCBAB1MmWQwaAmGIDw9L1CSfy5Uc8huxu4M4Nnf/', 'Антон', 30, 'Преподаватель в университете', 'anton18_supportmale.png'),
(49, 'AntonForever', '$6$rounds=5458$yopta23GDs43yopt$FzLAomHnIBtO39gQA66bmebLoPBksHq2G8b94JmNCQESepYzItR3dVmfCXuA0UIaMWSwZnuwNkQwEs0d6RuU90', 'Антон', 35, 'Предприниматель', 'AntonForever_Uill_Smit_v_filme_Henkok.jpg'),
(50, 'DimonTuv', '$6$rounds=5458$yopta23GDs43yopt$TYLv5by5A5XkifTCtIepf9nb70lW6kxZU7.mrfXQ2h97z/Iogp3SBqnnmN6lMmbK8IKk.xInHMr6P410kPafX/', 'Дмитрий', 29, 'консультант', 'DimonTuv_ava2.jpg'),
(51, 'Maks', '$6$rounds=5458$yopta23GDs43yopt$7hQH6GoVkamoh2OHw2Fz5hV16oaGhPBtNerQsVnUF8GHYbUUYEC.XhbrrTnj2B0/PqeraTHlq96ZnOhClhwOg0', 'Максим', 32, 'девелопер', 'Maks_avatarki.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_uindex` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;