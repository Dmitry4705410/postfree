-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 21 2021 г., 21:25
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1250540_default`
--

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `dialogmassage`
--

CREATE TABLE `dialogmassage` (
  `id` int(100) NOT NULL,
  `user1` int(10) NOT NULL,
  `user2` int(10) NOT NULL,
  `new` int(1) NOT NULL DEFAULT '0',
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dialogmassage`
--

INSERT INTO `dialogmassage` (`id`, `user1`, `user2`, `new`, `data`) VALUES
(21, 21, 22, 0, '2021-05-17 23:47:14'),
(22, 22, 21, 0, '2021-05-17 23:47:14'),
(23, 21, 27, 0, '2021-05-17 23:48:27'),
(24, 27, 21, 0, '2021-05-17 23:48:27'),
(25, 21, 28, 1, '2021-05-18 09:33:24'),
(26, 28, 21, 0, '2021-05-18 09:33:24'),
(27, 21, 23, 0, '2021-05-18 13:02:46'),
(28, 23, 21, 0, '2021-05-18 13:02:46'),
(29, 21, 24, 0, '2021-05-18 15:50:12'),
(30, 24, 21, 0, '2021-05-18 15:50:12');

-- --------------------------------------------------------

--
-- Структура таблицы `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friend`
--

INSERT INTO `friend` (`id`, `user1`, `user2`) VALUES
(9, 20, 21),
(10, 22, 21),
(11, 20, 20),
(19, 20, 22),
(20, 20, 23),
(21, 20, 24),
(32, 25, 21),
(35, 26, 21),
(36, 26, 22),
(43, 21, 25),
(44, 21, 26),
(45, 21, 23),
(46, 21, 24),
(47, 21, 20),
(48, 27, 21),
(49, 21, 27),
(50, 21, 28),
(51, 28, 21),
(53, 27, 22),
(54, 21, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `massag`
--

CREATE TABLE `massag` (
  `id` int(255) NOT NULL,
  `users1` int(10) NOT NULL,
  `users2` int(11) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `massag`
--

INSERT INTO `massag` (`id`, `users1`, `users2`, `text`, `data`) VALUES
(31, 27, 21, 'Привет', '2021-05-17 23:49:08'),
(32, 21, 27, 'Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке модели развития.<br />\nИдейные соображения высшего порядка, а также начало повседневной работы по формированию позиции позволяет оценить значение модели развития.<br />\nРавным образом постоянный количественный рост и сфера нашей активности играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.', '2021-05-17 23:49:59'),
(33, 27, 21, 'Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании существенных финансовых и административных условий.<br />\nТоварищи! консультация с широким активом позволяет выполнять важные задания по разработке систем массового участия.<br />\nИдейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности позволяет оценить значение новых предложений.', '2021-05-17 23:50:13'),
(34, 21, 27, 'hgfghf', '2021-05-17 23:51:21'),
(35, 27, 21, 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации форм развития.<br />\nС другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.<br />\nРавным образом рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.', '2021-05-17 23:51:37'),
(36, 27, 21, 'С другой стороны рамки и место обучения кадров способствует подготовки и реализации модели развития.<br />\nИдейные соображения высшего порядка, а также начало повседневной работы по формированию позиции позволяет оценить значение модели развития.<br />\nИдейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании существенных финансовых и административных условий.', '2021-05-17 23:51:47'),
(37, 21, 27, 'Ооооо', '2021-05-18 09:07:38'),
(38, 21, 28, 'Привет, как дела?', '2021-05-18 09:33:59'),
(39, 28, 21, 'Отлично', '2021-05-18 09:34:29'),
(40, 27, 21, '!!!!', '2021-05-18 13:37:51'),
(41, 21, 28, 'ghjfghfg', '2021-05-18 14:59:17'),
(42, 21, 28, 'dhgdfgdfg', '2021-05-18 15:49:57');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id_post` int(100) NOT NULL,
  `id_users` int(10) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '''0''',
  `data` varchar(15) DEFAULT NULL,
  `time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id_post`, `id_users`, `text`, `img`, `data`, `time`) VALUES
(59, 22, 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации форм развития. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке модели развития.<br />\nТоварищи! консультация с широким активом позволяет выполнять важные задания по разработке систем массового участия. Разнообразный и богатый опыт консультация с широким активом обеспечивает широкому кругу. Равным образом рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.<br />\nТоварищи! сложившаяся структура организации представляет собой интересный эксперимент проверки направлений прогрессивного развития. С другой стороны рамки и место обучения кадров способствует подготовки и реализации модели развития.', '24546420210417212811698person-wearing-sunglasses-3307265.jpg', '17 апреля 2021', '21:28'),
(67, 23, 'Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции позволяет оценить значение модели развития. Товарищи! сложившаяся структура организации представляет собой интересный эксперимент проверки направлений прогрессивного развития.<br />\nПовседневная практика показывает, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании новых предложений.<br />\nС другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.', '6480720210417220721188time-lapse-photo-of-stars-on-night-924824.jpg', '17 апреля 2021', '22:07'),
(68, 24, 'Равным образом постоянный количественный рост и сфера нашей активности играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям. Таким образом реализация намеченных плановых заданий позволяет оценить значение новых предложений. Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание модели развития.<br />\nИдейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности позволяет оценить значение новых предложений. Разнообразный и богатый опыт консультация с широким активом обеспечивает широкому кругу.<br />\nЗначимость этих проблем настолько очевидна, что консультация с широким активом играет важную роль в формировании новых предложений. Равным образом рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.', '59152420210417220745522trees-surrounded-by-water-during-foggy-day-3575854.jpg', '17 апреля 2021', '22:07'),
(69, 24, 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации форм развития. С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.<br />\nИдейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом требуют определения и уточнения модели развития. С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.<br />\nПовседневная практика показывает, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Идейные соображения высшего порядка, а также рамки и место обучения кадров обеспечивает широкому кругу (специалистов) участие в формировании новых предложений.', '0', '17 апреля 2021', '22:07'),
(70, 23, 'С другой стороны укрепление и развитие структуры обеспечивает участие в формировании систем массового участия. Товарищи! сложившаяся структура организации представляет собой интересный эксперимент проверки направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий позволяет оценить значение новых предложений.<br />\nТоварищи! консультация с широким активом позволяет выполнять важные задания по разработке систем массового участия. С другой стороны рамки и место обучения кадров способствует подготовки и реализации модели развития. Равным образом консультация с широким активом требуют определения и уточнения модели развития.<br />\nРазнообразный и богатый опыт консультация с широким активом обеспечивает широкому кругу. Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание модели развития. Таким образом новая модель организационной деятельности способствует подготовки и реализации систем массового участия.', '61336420210417220812945blue-and-green-color-abstract-painting-3609832.jpg', '17 апреля 2021', '22:08'),
(71, 22, 'Товарищи! консультация с широким активом позволяет выполнять важные задания по разработке систем массового участия. Повседневная практика показывает, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития.<br />\nТоварищи! сложившаяся структура организации представляет собой интересный эксперимент проверки направлений прогрессивного развития. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации форм развития.<br />\nИдейные соображения высшего порядка, а также рамки и место обучения кадров обеспечивает широкому кругу (специалистов) участие в формировании новых предложений. Разнообразный и богатый опыт консультация с широким активом обеспечивает широкому кругу.', '68889320210417220826220white-ceramic-teacup-on-white-ceramic-saucer-on-round-table-3626734.jpg', '17 апреля 2021', '22:08'),
(75, 26, 'Салат Морская Жемчужина<br />\nСостав<br />\n•	мясо креветок или крабовые палочки - 200г, <br />\n•	морская капуста (консервированная) - 100 г, <br />\n•	рис - 2 ст.л, <br />\n•	яйца - 2 шт, <br />\n•	морковь - 1-2 шт, <br />\n•	майонез<br />\nПриготовление<br />\nКрабовые палочки некрупно порезать и положить в салатницу.<br />\n<br />\n* вместо крабовых палочек можно использовать креветки - мясо креветок отварить в небольшом количестве воды, чтобы вода едва прикрывала креветки, в течение 2-3 мин с добавлением сливочного масла или маргарина, затем охладить<br />\n<br />\nРис отварить до готовности (рис желательно не переварить, чтобы он оставался рассыпчатым).<br />\nЯйца отварить и порубить (порезать кубиками или пропустить через яйцерезку).<br />\nМорковь отварить и порезать кубиками.<br />\nМаринованную морскую капусту порезать полосочками, длиной 1,5-2 см.<br />\nК порезанным крабовым палочкам (или креветкам) добавить отварной рассыпчатый рис, рубленые яйца, отварную, порезанную кубиками морковь и порезанную маринованную морскую капусту. Салат заправить майонезом.<br />', '41445620210418111149267gfdfgfdg.jpg', '18 апреля 2021', '11:11'),
(77, 21, 'Большинство новых визуальных эффектов были разработаны одновременно с переходом игры на конвейер рендеринга высокой четкости Unity (HDRP), который мы впоследствии отказались от неудовлетворительных результатов производительности. Мы не хотели тратить зря усилия, направленные на то, чтобы игра выглядела лучше за это время, и вместо этого перенесли их на текущую версию игры.', '95268020210510181711695revamp_fields_03.jpg', '10 мая 2021', '18:17'),
(104, 25, 'Мельник,Красавчик', '18939620210511002713235648U-cnli2s.jpg', '11 мая 2021', '00:27'),
(116, 21, 'как дела?', '0', '17 мая 2021', '23:52'),
(121, 27, '♤', '54427620210518134223667WNy6SNGgcZA.jpg', '18 мая 2021', '13:42');

-- --------------------------------------------------------

--
-- Структура таблицы `previleg`
--

CREATE TABLE `previleg` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL DEFAULT 'foto.jpg',
  `statys` varchar(150) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `fam` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '2020-12-03',
  `pass` varchar(125) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `kod` int(4) NOT NULL,
  `hash` text NOT NULL,
  `profil` int(1) NOT NULL DEFAULT '1',
  `chekTel` int(1) NOT NULL DEFAULT '1',
  `chekData` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `images`, `statys`, `name`, `fam`, `tel`, `data`, `pass`, `valid`, `kod`, `hash`, `profil`, `chekTel`, `chekData`) VALUES
(20, 'foto.jpg', 'салам', 'Дмитрий', 'Толокнов', '89284605411', '2021-01-08', '$2y$10$aOx/jsTqWZiWmh/XS9EuCemTMK.w0YpuwJo2IFSX34n7pGEyZGWaO', 1, 4741, '1610105614', 1, 1, 1),
(21, 'PHOTO2552669263920210510174717286', 'GOST', 'Дмитрий', 'Толокнов', '89284605410', '2003-03-26', '$2y$10$.KCfM6l1iX3girYfxOKspOJhZvghINwiGfi7Y7yg6Q53XTR3OtKm.', 1, 7800, '1620659321', 1, 0, 1),
(22, 'PHOTO4595811627920210108153940345', 'sensei', 'Александр', 'Иванец', '89280401009', '1961-02-23', '$2y$10$FgHQ0JspMGjNbFlmdL69ueSXaChDFqz94Pjw81dNEuUv2DEjG/cqi', 1, 9689, '1610109328', 0, 1, 1),
(23, 'foto.jpg', '0', 'Елизавета', 'Юник', '89282565712', '2003-06-06', '$2y$10$yqwH9mE3s2CHb4CZhX.gT.zKDrMwBsZKtDfW4ghy6gsJ.WGZ48kt6', 1, 5265, '1610909680', 1, 1, 1),
(24, 'foto.jpg', '0', 'Марк', 'Октэин', '89284658410', '2020-12-03', '6456456464645645', 1, 4554, '', 1, 1, 1),
(25, 'PHOTO4715176575520210417225359210', '123', 'Александр', 'Малахов', '89384988366', '1999-02-17', '$2y$10$XbZyFfw/S9Y77lqo4yTvc.56KDJa7wUKQW8KFsY9HTWlWp5cdQQca', 1, 3873, '1620681853', 1, 0, 0),
(26, 'PHOTO5078467571720210418110907911', '0', 'Наталья', 'Бочарникова', '89891416684', '1984-01-18', '$2y$10$PF6DHsyboBYWhh.7M4we1.e8XhMnkCuwAuADXlT9vXGa29iq3iIZi', 1, 8949, '1618733161', 1, 0, 0),
(27, 'PHOTO2413723582920210517235845392', 'Наслаждение', 'Василий', 'Трубинин', '89284605417', '2005-02-09', '$2y$10$xdArfdZ1gVdVeCPVrrD/m.NwfZg5zy0ETAOubEEA3WItgArPUD/zW', 1, 9425, '1621279604', 1, 1, 1),
(28, 'PHOTO5601760543420210518093342950', '0', 'Масяня', 'Дрш', '89880841545', '2021-05-18', '$2y$10$7geeuAcYcYSiAETIPu3jOObOsUsZbg1cOq2rpeyGyZ7ynCtOY4QIG', 1, 8672, '1621319371', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `vost`
--

CREATE TABLE `vost` (
  `id` int(11) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `kod` int(10) NOT NULL,
  `hash` int(11) NOT NULL,
  `item` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vost`
--

INSERT INTO `vost` (`id`, `tel`, `kod`, `hash`, `item`, `time`) VALUES
(7, '89280401009', 7561, 1612453185, 0, 5),
(8, '89284605410', 7969, 1620659253, 0, 0),
(9, '89384988366', 3013, 1620681758, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dialogmassage`
--
ALTER TABLE `dialogmassage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `massag`
--
ALTER TABLE `massag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vost`
--
ALTER TABLE `vost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dialogmassage`
--
ALTER TABLE `dialogmassage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `massag`
--
ALTER TABLE `massag`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `vost`
--
ALTER TABLE `vost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
