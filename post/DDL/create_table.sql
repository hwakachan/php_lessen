create table `post` (`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`name` varchar(100) COLLATE utf8_Unicode_ci NOT NULL COMMENT 'Name',
`contents` varchar(100) COLLATE utf8_Unicode_ci NOT NULL COMMENT 'Contents',
`time` datetime DEFAULT NULL COMMENT 'Time',
PRIMARY KEY (`id`));