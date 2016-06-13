-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.48 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных neweuropatour
DROP DATABASE IF EXISTS `neweuropatour`;
CREATE DATABASE IF NOT EXISTS `neweuropatour` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `neweuropatour`;


-- Дамп структуры для таблица neweuropatour.t_countries
DROP TABLE IF EXISTS `t_countries`;
CREATE TABLE IF NOT EXISTS `t_countries` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `short_name` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `iso` varchar(3) NOT NULL,
  `top` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_countries: ~28 rows (приблизительно)
/*!40000 ALTER TABLE `t_countries` DISABLE KEYS */;
INSERT INTO `t_countries` (`id`, `name`, `short_name`, `title`, `description`, `iso`, `top`) VALUES
	(1, 'Австрия', 'aut', 'Туры в Австрию', '<p>Среди европейских столиц наибольшей популярностью пользуются Париж, Лондон, Амстердам, Рим… А туры в Австрию, хоть и могут без особых усилий сразиться за звание лучшего европейского отдыха, скромно дожидаются настоящих ценителей, для которых важна не столько реклама, сколько истинная красота.</p>\r\n<p>Видели ли вы когда-нибудь дом, из окон которого растут деревья? А завод с разноцветными башенками? Эти удивительные строения одного из самых креативных архитекторов вы сможете увидеть в Вене. Вы неравнодушны к королевской роскоши? Тогда почему бы не отравиться в Шёнсбрунн – летнюю резиденцию австрийских императоров. Строения в стиле бароко, шикарный парк с фонтанами и аллеями, да и обыкновенный зимний сад который издали не сложно спутать с настоящим дворцом.</p>\r\n<p>Визитной карточкой Вены, а может и всей Австрии, считается собор святого Стефана. Этот готический храм можно рассматривать часами, находя всё новые и новые интересные элементы декора.</p>\r\n<p>Выражение «сказки Венского леса» слышали многие. Однако вряд ли многие знают, что лес этот находится на высоких холмах, внизу которых сквозь дымку частых туманов виднеется Дунай. Прогулка по венскому лесу особенно приятна осенью. Аромат прелой листы, насыщенный увяданием природы воздух, виднеющиеся через просветы деревьев старинные монастыри и церковки – это поистине незабываемые впечатления.</p>\r\n<p>А как вы относитесь к горнолыжному отдыху? Туры в Австрию – это ещё и удивительная возможность подышать чистейшим альпийским воздухом, почувствовать прилив адреналина в кровь при лихом спуске с крутого склона, насладиться величием гор и почувствовать временность бытия на фоне бесконечной вечности.</p> \r\n<p>Туры в Австрию – это не 4 – 5 достопримечательностей, разрекламированных туристическими агентствами. Это впечатления, сменяющиеся ежеминутно и заставляющие вас забыть обо всём на свете, восторженно внимая истинной красоте.&nbsp;</p>', 'at', 0),
	(2, 'Армения', 'arm', '', '', 'am', 0),
	(3, 'Болгария', 'bgr', '', '', 'bg', 0),
	(4, 'Бразилия', 'bra', '', '', 'br', 0),
	(5, 'Великобритания', 'gbr', '', '', 'gb', 1),
	(6, 'Венгрия', 'hun', '', '', 'hu', 0),
	(7, 'Германия', 'deu', '', '', 'de', 0),
	(8, 'Греция', 'grc', '', '', 'gr', 0),
	(9, 'Грузия', 'geo', '', '', 'ge', 0),
	(10, 'Израиль', 'isr', '', '', 'il', 1),
	(11, 'Ирландия', 'irl', '', '', 'ie', 0),
	(12, 'Испания', 'esp', '', '', 'es', 1),
	(13, 'Италия', 'ita', '', '', 'it', 1),
	(14, 'Кипр', 'cyp', '', '', 'cy', 0),
	(15, 'Латвия', 'lva', '', '', 'lv', 0),
	(16, 'Литва', 'ltu', '', '', 'lt', 0),
	(17, 'Нидерланды', 'nld', '', '', 'nl', 1),
	(18, 'Перу', 'per', '', '', 'pe', 0),
	(19, 'Польша', 'pol', '', '', 'pl', 0),
	(20, 'Португалия', 'prt', '', '', 'pt', 0),
	(21, 'Россия', 'rus', '', '', 'ru', 0),
	(22, 'Скандинавские страны', 'swe', '', '', 'se', 0),
	(23, 'Словакия', 'svk', '', '', 'sk', 0),
	(24, 'Турция', 'tur', '', '', 'tr', 1),
	(25, 'Франция', 'fra', '', '', 'fr', 1),
	(26, 'Черногория', 'mne', '', '', 'me', 1),
	(27, 'Чехия', 'cze', '', '', 'cz', 1),
	(28, 'Швейцария', 'che', '', '', 'ch', 0);
/*!40000 ALTER TABLE `t_countries` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_posts
DROP TABLE IF EXISTS `t_posts`;
CREATE TABLE IF NOT EXISTS `t_posts` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `catg` varchar(4) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `is_news` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_posts: 1 rows
/*!40000 ALTER TABLE `t_posts` DISABLE KEYS */;
INSERT INTO `t_posts` (`id`, `title`, `text`, `catg`, `tags`, `url`, `is_news`) VALUES
	(1, 'ПРАЗДНИК СЕРЕДИНЫ ЛЕТА В ШВЕЦИИ!', 'В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.\r\nВ этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.\r\nВ этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.', '', '', '', 1);
/*!40000 ALTER TABLE `t_posts` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_reviews
DROP TABLE IF EXISTS `t_reviews`;
CREATE TABLE IF NOT EXISTS `t_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `city` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `check` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_reviews: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `t_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reviews` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_reviews_comments
DROP TABLE IF EXISTS `t_reviews_comments`;
CREATE TABLE IF NOT EXISTS `t_reviews_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `message` text,
  `review_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_reviews_comments_t_reviews` (`review_id`),
  CONSTRAINT `FK_t_reviews_comments_t_reviews` FOREIGN KEY (`review_id`) REFERENCES `t_reviews` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_reviews_comments: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `t_reviews_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reviews_comments` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_storage
DROP TABLE IF EXISTS `t_storage`;
CREATE TABLE IF NOT EXISTS `t_storage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_storage: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `t_storage` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_storage` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_tours
DROP TABLE IF EXISTS `t_tours`;
CREATE TABLE IF NOT EXISTS `t_tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `route` text,
  `days` varchar(255) DEFAULT NULL,
  `program` text,
  PRIMARY KEY (`id`),
  KEY `FK_t_tours_t_tour_themes` (`theme_id`),
  KEY `FK_t_tours_t_countries` (`country_id`),
  CONSTRAINT `FK_t_tours_t_countries` FOREIGN KEY (`country_id`) REFERENCES `t_countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_t_tours_t_tour_themes` FOREIGN KEY (`theme_id`) REFERENCES `t_tour_themes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_tours: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `t_tours` DISABLE KEYS */;
INSERT INTO `t_tours` (`id`, `country_id`, `theme_id`, `code`, `price`, `title`, `description`, `route`, `days`, `program`) VALUES
	(1, 1, 2, NULL, NULL, 'Экскурсионный тур в АВСТРИЮ', NULL, 'ВЕНА — дворец Шёнбрунн* — ЗАЛЬЦБУРГ — Озерный край ЗАЛЬЦКАММЕРГУТ* — Инсбрук* — музей Сваровски* — КЛАГЕНФУРТ — ГРАЦ — Венский лес', '7 дней / 6ночей, без ночных переездов', '<p><strong>1&nbsp;день</strong> Отправление автобуса из&nbsp;Минска в&nbsp;05:00. Прохождение белорусско-польской границы, транзит по&nbsp;территории&nbsp;РП и&nbsp;Чехии. Прибытие в&nbsp;транзитный отель в&nbsp;ЧЕХИИ. Размещение в&nbsp;отеле. <strong>Ночлег в&nbsp;отеле</strong>.</p>\r\n<p><strong>2&nbsp;день Завтрак</strong>. Отъезд в&nbsp;Вену. <strong>Обзорная автобусно-пешеходная экскурсия по&nbsp;Вене</strong>: Ринг (Парламент, Ратуша, костёл Благодарения, Университет, площадь Марии Терезии), Хофбург, костел Святого Петра, собор Святого Стефана, Венская опера и&nbsp;др. Экскурсия в&nbsp;дворцово-парковый комплекс Шёнбрунн* (доплата 10€+ входной билет +аудиогид 11.5евро)&nbsp;— венская резиденция австрийских императоров. Свободное время. <strong>Ночлег в&nbsp;Вене</strong>.</p>\r\n<p><strong>3&nbsp;день Завтрак</strong>. Переезд в&nbsp;<strong>Зальцбург</strong>&nbsp;— город епископов и&nbsp;Моцарта<strong>. Обзорная пешеходная экскурсия по&nbsp;городу</strong> знакомит с&nbsp;дворцом и&nbsp;садом Мирабель, набережной реки Зальцах, торговой улицей Гетрайдгассе, домом Моцарта, соборной площадью, аббатством Святого Петра, церковью Францисканцев, крепостью Хоензальцбург (внешний осмотр, без подъема). Поездка в&nbsp;район Зальцкаммергут* (доплата 20€) красивейший озерный край: Сент-Гильтен&nbsp;— родина матери Моцарта, Сент-Вольфгант&nbsp;— настоящий летний рай, Бад- Ишль- где находиться летняя резиденция императора Франца Иосифа, панорамные виды на&nbsp;озера и&nbsp;горы. Свободное время в&nbsp;Зальцбурге. <strong>Ночлег в&nbsp;р-не Зальцбурга.</strong></p>\r\n<p><strong>4&nbsp;день Завтрак</strong>. Свободное время в&nbsp;Зальцбурге. Для желающих экскурсия Инсбрук + Кристаллические миры Сваровски* (доплата 30евро) Обзорная экскурсия по&nbsp;городу&nbsp;— живописному альпийскому городку, административному центру федеральной земли Тироль, успевшему за&nbsp;свою многовековую историю стать центром Священной Римской Империи, летней резиденцией Габсбургов, и&nbsp;даже дважды столицей зимней олимпиады. Осмотр города&nbsp;— Хофбург, Хофкирхе, «Золотыя крыша», ставшая визитной карточкой города и&nbsp;др. По&nbsp;желанию группы заезд в&nbsp;музей Сваровски*(входн.билет 15евро)&nbsp;— удивительный мир кристаллов, расположившийся среди альпийских вершин в&nbsp;г.Ваттене. <strong>Ночлег в&nbsp;р-не Зальцбурга</strong>.</p>\r\n<p><strong>5&nbsp;день Завтрак</strong>. Выезд в&nbsp;Каринтию. <strong>Пешеходная экскурсия по&nbsp;городу Клагенфурт</strong>&nbsp;— улочки и&nbsp;дома Старого города, площадь Альтерплац с&nbsp;фонтаном Дракона, дом позолоченного гуся, Ратуша и&nbsp;др.. Выезд в&nbsp;Штирию. <strong>Обзорная экскурсия по&nbsp;городу Грац</strong>&nbsp;— второй по&nbsp;величине город Австрии, столица Штирии, исторический центр охраняется Юнеско: Бург, готический собор и&nbsp;мавзолей Фридриха III, театр, Иезуитский университет, Глокеншпильплац, главная площадь с&nbsp;городской ратушей, гора Шлоссберг с&nbsp;часовой башней Грац. <strong>Ночлег в&nbsp;транзитном отеле</strong>.</p>\r\n<p><strong>6&nbsp;день Завтрак</strong>. Выселение из&nbsp;отеля. <strong>Экскурсия в&nbsp;Венский Лес</strong>&nbsp;— прогулка по&nbsp;южному пригороду Вены с&nbsp;осмотром курорта Баден, монастыря Хайлигенкройц и&nbsp;внешним осмотром замка Лихтенштейн. <strong>Ночлег на&nbsp;территории Польши. </strong></p>\r\n<p><strong>7&nbsp;день Завтрак</strong>, выселение из&nbsp;отеля. Транзит по&nbsp;территории Польши и&nbsp;Беларуси. Прибытие в&nbsp;Минск во&nbsp;второй половине дня.</p>\r\n<p><strong>Даты заездов: </strong></p>\r\n<p><nobr>20.03.2016-26.03.2016,</nobr> <nobr>24.04.2016-30.04.2016,</nobr> <nobr>29.05.2016-04.06.2016,</nobr> <nobr>03.07.2016-09.07.2016,</nobr> <nobr>14.08.2016-20.08.2016,</nobr> <nobr>02.10.2016-08.10.2016,</nobr> <nobr>18.12.2016-24.12.2016,</nobr> <nobr>04.01.2017-10.01.2017,</nobr> <nobr>19.03.2017-25.03.2017,</nobr> <nobr>23.04.2017-29.04.2017</nobr></p>\r\n<p><strong>Стоимость тура для 1&nbsp;человека </strong></p>\r\n<ul>\r\n	<li>Размещение в&nbsp;2-3-х местном номере 320 евро + 600&nbsp;000&nbsp;бел. руб.</li>\r\n	<li>Размещение в&nbsp;1&nbsp;местном номере 400 евро + 600&nbsp;000&nbsp;бел. руб.</li>\r\n	<li>Примечание: возможно изменение стоимости тура!</li>\r\n</ul>\r\n<p><strong><strong>В&nbsp;стоимость тура входит: </strong></strong></p>\r\n<ul>\r\n	<li>проезд на&nbsp;автобусе марки Setra, Neoplan, Daf, Vanhool (аудио-видео,)</li>\r\n	<li>1&nbsp;ночлег в&nbsp;Чехии, 4&nbsp;в Австрии, 1&nbsp;ночь в&nbsp;Польше</li>\r\n	<li>завтраки в&nbsp;отелях (ассортимент блюд утверждается отелем)</li>\r\n	<li>экскурсионное обслуживание без входных билетов.</li>\r\n</ul>\r\n<p><strong><strong>В&nbsp;стоимость тура не&nbsp;входит: </strong></strong></p>\r\n<ul>\r\n	<li>консульский сбор (для граждан РБ&nbsp;— 60&nbsp;евро),</li>\r\n	<li>медицинская страховка&nbsp;— 3&nbsp;евро ( до&nbsp;65&nbsp;лет, после 65&nbsp;лет —согласно тарифам)</li>\r\n	<li>дополнительные экскурсии и&nbsp;входные билеты</li>\r\n</ul>\r\n<p>Примечание: Туроператор оставляет за&nbsp;собой право вносить некоторые изменения в&nbsp;программу тура без уменьшения общего объема и&nbsp;качества услуг, в&nbsp;том числе предоставлять замену отеля на&nbsp;равнозначный. Туроператор не&nbsp;несет ответственности за&nbsp;задержки на&nbsp;границах и&nbsp;пробках на&nbsp;дорогах.</p>\r\n<p>&nbsp;</p>');
/*!40000 ALTER TABLE `t_tours` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_tour_themes
DROP TABLE IF EXISTS `t_tour_themes`;
CREATE TABLE IF NOT EXISTS `t_tour_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_tour_themes: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `t_tour_themes` DISABLE KEYS */;
INSERT INTO `t_tour_themes` (`id`, `theme`, `name`) VALUES
	(1, 'france', 'Истинная Франция'),
	(2, 'europe', 'Туры по европейским столицам'),
	(3, 'sea', 'Отдых на море из Минска'),
	(4, 'week-end', 'Отдых выходного дня'),
	(5, 'octoberfest', 'Октоберфест'),
	(6, 'spa', 'SPA и лечение'),
	(7, 'individual', 'Индивидуальные туры'),
	(8, 'exotic', 'Экзотические страны');
/*!40000 ALTER TABLE `t_tour_themes` ENABLE KEYS */;


-- Дамп структуры для таблица neweuropatour.t_users
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE IF NOT EXISTS `t_users` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы neweuropatour.t_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `t_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
