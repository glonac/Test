-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "knowledge" -----------------------------
CREATE DATABASE IF NOT EXISTS `knowledge` CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `knowledge`;
-- ---------------------------------------------------------


-- CREATE TABLE "_test" ----------------------------------------
CREATE TABLE `_test`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`phone` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`comment` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`htoto` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 30;
-- -------------------------------------------------------------


-- Dump data of "_test" ------------------------------------
INSERT INTO `_test`(`id`,`name`,`email`,`phone`,`comment`,`htoto`,`created_at`,`updated_at`) VALUES 
( '11', 'Konstantin Podlomaev', 'glonas22808@mail.ru', '+79996928356', 'Нужно больше данных!', 'asfdgcvhb', '2020-09-09 15:39:57', '2020-09-09 15:39:57' ),
( '12', 'Tape', 'dekanat_fitu@mail.ru', '+79996928356', 'коммент', 'DASFGHJKL;', '2020-09-09 16:01:05', '2020-10-27 15:01:11' ),
( '13', 'Tape', 'dekanat_fitu@mail.ru', '+79996928356', 'Jesus', 'DASFGHJKL;', '2020-09-09 16:01:19', '2020-09-09 16:01:19' ),
( '14', 'Tape', 'dekanat_fitu@mail.ru', '+79996928356', 'Еще какой-то комментарий', 'DASFGHJKL;', '2020-09-09 16:01:27', '2020-10-27 13:55:52' ),
( '15', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', 'Russa', 'aswdefrgthygjukilo;p', '2020-09-10 09:38:27', '2020-09-10 09:38:27' ),
( '17', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', 'fdsgjhkl;\'
;lkjhgfdvs', 'aswdefrgthygjukilo;p', '2020-09-19 18:01:38', '2020-09-19 18:01:38' ),
( '18', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', 'ьощрпзахиъвм
эывзщпо', 'DASFGHJKL;', '2020-09-30 08:53:18', '2020-09-30 08:53:18' ),
( '19', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', 'sasasa', 'aswdefrgthygjukilo;p', '2020-10-13 17:31:14', '2020-10-13 17:31:14' ),
( '21', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', '12345', '1234567', '2020-10-13 21:04:34', '2020-10-13 21:04:34' ),
( '22', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '+79996928356', '231edsd', 'aswdefrgthygjukilo;p', '2020-10-13 21:04:50', '2020-10-13 21:04:50' ),
( '24', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', '45454545', 'gfhfhfhh', 'aswdefrgthygjukilo;p', '2020-10-13 21:29:04', '2020-10-13 21:29:04' ),
( '25', 'Ульяна', 'ul@mail.ru', '+79996928356', 'ASDFCGVHBNJ,.', 'asdfghjkl;', '2020-10-14 08:19:34', '2020-10-27 13:56:07' ),
( '27', 'Владимир', 'Vladimir@vova.com', '00000000000', 'И еще что-то', 'Что же', '2020-10-26 13:22:38', '2020-10-26 13:22:38' ),
( '28', 'Руслан', 'ruslan@ruslan.ru', '89996696293', 'wait', 'Wait', '2020-10-27 15:02:41', '2020-10-27 15:02:41' ),
( '29', 'Конс Подламаев', 'glonas22808@mail.ru', '+79996928356', 'енролд', 'укенгшщ', '2020-10-28 11:39:36', '2020-10-28 11:39:36' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


-- CREATE TABLE "user" -----------------------------------------
CREATE TABLE `user`( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`titleimg` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`img` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- Dump data of "user" -------------------------------------
INSERT INTO `user`(`id`,`name`,`email`,`password`,`titleimg`,`img`,`created_at`,`updated_at`) VALUES 
( '1', 'Констанин Игоревич Пономарев', 'glonas22808@mail.ru', 'testtest', 'images/iYPam9TordAQ2fmqNyFWJhIbIf7qZJ32j6YwX7bv.jpeg', 'images/9sJfBKfENgtEBa1sxkwb4ICoTMoyVKj3SyJyEPL3.png', '2020-09-19 12:16:44', '2020-10-16 17:44:22' ),
( '3', 'Констанин Игоревич Пономарев', 'decanat@mail.ru', 'testtest', 'images/default.png', 'defaultimg', '2020-09-19 12:20:36', '2020-09-19 12:20:36' ),
( '4', 'Gmn', 'loh@loh.com', '12345678', 'images/default.png', 'defaultimg', '2020-09-24 12:50:08', '2020-09-24 12:50:08' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


