CREATE DATABASE weather_detail;
CREATE TABLE `weather` (`id` BIGINT NOT NULL,
`name` VARCHAR(100) NOT NULL,
`coord` json DEFAULT NULL,
`main` json DEFAULT NULL,
`wind` json DEFAULT NULL,
`clouds` json DEFAULT NULL,
`sys` json DEFAULT NULL,
`timezone` VARCHAR(40) DEFAULT NULL,
`dt` VARCHAR(40) NOT NULL,
PRIMARY KEY (`id`))
ENGINE=InnoDB;
