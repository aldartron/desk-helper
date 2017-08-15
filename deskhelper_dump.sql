-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "deskhelper" ----------------------------
CREATE DATABASE IF NOT EXISTS `deskhelper` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `deskhelper`;
-- ---------------------------------------------------------


-- CREATE TABLE "issues" -----------------------------------
-- CREATE TABLE "issues" ---------------------------------------
CREATE TABLE `issues` ( 
	`hash` VarChar( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`publicated` DateTime NOT NULL,
	`edited` DateTime NOT NULL,
	`info` MediumText CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`status_id` Int( 63 ) NULL,
	`user_id` VarChar( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`short_info` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`have_news` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`admin_id` VarChar( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`image_id` Int( 255 ) NULL,
	`image` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 54;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "messages" ---------------------------------
-- CREATE TABLE "messages" -------------------------------------
CREATE TABLE `messages` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`is_system` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`publicated` DateTime NOT NULL,
	`issue_id` Int( 255 ) NOT NULL,
	`text` MediumText CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`style` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`is_admin` TinyInt( 1 ) NOT NULL DEFAULT '0',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 172;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "organizations" ----------------------------
-- CREATE TABLE "organizations" --------------------------------
CREATE TABLE `organizations` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`info` VarChar( 1023 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "statuses" ---------------------------------
-- CREATE TABLE "statuses" -------------------------------------
CREATE TABLE `statuses` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 63 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`info` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`name` VarChar( 63 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`surename` VarChar( 63 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`login` VarChar( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`organization_id` Int( 255 ) NULL,
	`info` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`is_admin` TinyInt( 1 ) NOT NULL,
	`phone` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `login` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "issues" -----------------------------------
INSERT INTO `issues`(`hash`,`publicated`,`edited`,`info`,`status_id`,`user_id`,`short_info`,`have_news`,`id`,`admin_id`,`image_id`,`image`) VALUES ( 'ses6x6', '2017-07-27 01:58:22', '2017-07-27 01:59:39', 'Странные звуки при попытке печати и ничего не происходит', '5', 'useruser2', 'Не работает принтер', '0', '50', 'adminadmin1', NULL, 'useruser2-1501088301.png' );
INSERT INTO `issues`(`hash`,`publicated`,`edited`,`info`,`status_id`,`user_id`,`short_info`,`have_news`,`id`,`admin_id`,`image_id`,`image`) VALUES ( 'apjgxl', '2017-07-27 02:41:44', '2017-07-27 02:42:47', 'Пора спать', '3', 'useruser1', 'Тест отображения имен', '0', '51', 'adminadmin1', NULL, NULL );
INSERT INTO `issues`(`hash`,`publicated`,`edited`,`info`,`status_id`,`user_id`,`short_info`,`have_news`,`id`,`admin_id`,`image_id`,`image`) VALUES ( '90ag3i', '2017-07-28 15:44:52', '2017-07-28 15:44:52', '', '1', 'useruser1', 'Эту заявку нужно отменить', '0', '52', 'adminadmin1', NULL, NULL );
INSERT INTO `issues`(`hash`,`publicated`,`edited`,`info`,`status_id`,`user_id`,`short_info`,`have_news`,`id`,`admin_id`,`image_id`,`image`) VALUES ( 'jw2b71', '2017-07-28 15:45:31', '2017-07-28 15:45:33', '', '5', 'useruser1', 'Эту заявку нужно отменить', '0', '53', 'adminadmin1', NULL, NULL );
-- ---------------------------------------------------------


-- Dump data of "messages" ---------------------------------
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '159', '1', '2017-07-27 01:58:22', '50', 'Заявка зарегистрирована под идентификатором <strong>ses6x6</strong>', 'list-group-item-warning', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '160', '1', '2017-07-27 01:59:39', '50', 'Пользователь изменил cтатус заявки. Текущий статус: <strong>Отменено</strong>', 'list-group-item-danger', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '161', '1', '2017-07-27 02:41:44', '51', 'Заявка зарегистрирована под идентификатором <strong>apjgxl</strong>', 'list-group-item-warning', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '162', '1', '2017-07-27 02:42:27', '51', 'Администратор изменил cтатус заявки. Текущий статус: <strong>Выполняется</strong>', 'list-group-item-info', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '163', '1', '2017-07-27 02:42:33', '51', 'Администратор изменил cтатус заявки. Текущий статус: <strong>В ожидании</strong>', 'list-group-item', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '164', '1', '2017-07-27 02:42:37', '51', 'Администратор изменил cтатус заявки. Текущий статус: <strong>Выполняется</strong>', 'list-group-item-info', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '165', '1', '2017-07-27 02:42:41', '51', 'Пользователь изменил cтатус заявки. Текущий статус: <strong>В ожидании</strong>', 'list-group-item', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '166', '1', '2017-07-27 02:42:44', '51', 'Администратор изменил cтатус заявки. Текущий статус: <strong>Выполняется</strong>', 'list-group-item-info', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '167', '1', '2017-07-27 02:42:45', '51', 'Администратор изменил cтатус заявки. Текущий статус: <strong>Подтверждение</strong>', 'list-group-item-warning', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '168', '1', '2017-07-27 02:42:47', '51', 'Пользователь изменил cтатус заявки. Текущий статус: <strong>Выполнено</strong>', 'list-group-item-success', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '169', '1', '2017-07-28 15:44:52', '52', 'Заявка зарегистрирована под идентификатором <strong>90ag3i</strong>', 'list-group-item-warning', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '170', '1', '2017-07-28 15:45:31', '53', 'Заявка зарегистрирована под идентификатором <strong>jw2b71</strong>', 'list-group-item-warning', '0' );
INSERT INTO `messages`(`id`,`is_system`,`publicated`,`issue_id`,`text`,`style`,`is_admin`) VALUES ( '171', '1', '2017-07-28 15:45:33', '53', 'Пользователь изменил cтатус заявки. Текущий статус: <strong>Отменено</strong>', 'list-group-item-danger', '0' );
-- ---------------------------------------------------------


-- Dump data of "organizations" ----------------------------
INSERT INTO `organizations`(`id`,`name`,`address`,`info`) VALUES ( '1', 'Министерство территориального развития Забайкальского края', 'ул. Чкалова, 136', 'Информация об организации. Направление, контактные данные, справочна информация и др.' );
-- ---------------------------------------------------------


-- Dump data of "statuses" ---------------------------------
INSERT INTO `statuses`(`id`,`name`,`info`) VALUES ( '1', 'В ожидании', 'Заявка зарегестрирована в системе, однако еще не принята в работу системным администратором' );
INSERT INTO `statuses`(`id`,`name`,`info`) VALUES ( '2', 'Выполняется', 'Заявка принята во внимание системным администратором и проводится работа по её устранению' );
INSERT INTO `statuses`(`id`,`name`,`info`) VALUES ( '3', 'Выполнено', 'Проблема успешно решена' );
INSERT INTO `statuses`(`id`,`name`,`info`) VALUES ( '4', 'Подтверждение', 'Системный администратор устранил проблему, ожидается подтверждение выполнения заявки пользователем' );
INSERT INTO `statuses`(`id`,`name`,`info`) VALUES ( '5', 'Отменено', 'По какой-либо причине заявка более не актуальна' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`name`,`surename`,`login`,`password`,`organization_id`,`info`,`is_admin`,`phone`,`email`) VALUES ( 'Сергей', 'Николаев', 'adminadmin1', '25e4ee4e9229397b6b17776bfceaf8e7', '1', 'Специалист технической поддержки', '1', '+7 924 123 4567', 'adminadmin1@mail.ru' );
INSERT INTO `users`(`name`,`surename`,`login`,`password`,`organization_id`,`info`,`is_admin`,`phone`,`email`) VALUES ( 'Андрей', 'Александров', 'adminadmin2', '25e4ee4e9229397b6b17776bfceaf8e7', '1', 'Глава информационного отдела', '1', '+7 914 111 2234', 'adminadmin2@mail.ru' );
INSERT INTO `users`(`name`,`surename`,`login`,`password`,`organization_id`,`info`,`is_admin`,`phone`,`email`) VALUES ( 'Виталий', 'Вавилов', 'usersuer3', '63e780c3f321d13109c71bf81805476e', '1', 'Секретарь', '0', NULL, NULL );
INSERT INTO `users`(`name`,`surename`,`login`,`password`,`organization_id`,`info`,`is_admin`,`phone`,`email`) VALUES ( 'Иван', 'Иванов', 'useruser1', '63e780c3f321d13109c71bf81805476e', '1', 'Главный бухгалтер', '0', NULL, NULL );
INSERT INTO `users`(`name`,`surename`,`login`,`password`,`organization_id`,`info`,`is_admin`,`phone`,`email`) VALUES ( 'Борис', 'Борисов', 'useruser2', '63e780c3f321d13109c71bf81805476e', '1', 'Секретарь', '0', NULL, NULL );
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_images_issues" ------------------------
-- CREATE INDEX "lnk_images_issues" ----------------------------
CREATE INDEX `lnk_images_issues` USING BTREE ON `issues`( `image_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_statuses_issues" ----------------------
-- CREATE INDEX "lnk_statuses_issues" --------------------------
CREATE INDEX `lnk_statuses_issues` USING BTREE ON `issues`( `status_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_users_issues" -------------------------
-- CREATE INDEX "lnk_users_issues" -----------------------------
CREATE INDEX `lnk_users_issues` USING BTREE ON `issues`( `user_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_users_issues_2" -----------------------
-- CREATE INDEX "lnk_users_issues_2" ---------------------------
CREATE INDEX `lnk_users_issues_2` USING BTREE ON `issues`( `admin_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_issues_messages" ----------------------
-- CREATE INDEX "lnk_issues_messages" --------------------------
CREATE INDEX `lnk_issues_messages` USING BTREE ON `messages`( `issue_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_organizations_users" ------------------
-- CREATE INDEX "lnk_organizations_users" ----------------------
CREATE INDEX `lnk_organizations_users` USING BTREE ON `users`( `organization_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_statuses_issues" -----------------------
-- CREATE LINK "lnk_statuses_issues" ---------------------------
ALTER TABLE `issues`
	ADD CONSTRAINT `lnk_statuses_issues` FOREIGN KEY ( `status_id` )
	REFERENCES `statuses`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_users_issues" --------------------------
-- CREATE LINK "lnk_users_issues" ------------------------------
ALTER TABLE `issues`
	ADD CONSTRAINT `lnk_users_issues` FOREIGN KEY ( `user_id` )
	REFERENCES `users`( `login` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_users_issues_2" ------------------------
-- CREATE LINK "lnk_users_issues_2" ----------------------------
ALTER TABLE `issues`
	ADD CONSTRAINT `lnk_users_issues_2` FOREIGN KEY ( `admin_id` )
	REFERENCES `users`( `login` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_issues_messages" -----------------------
-- CREATE LINK "lnk_issues_messages" ---------------------------
ALTER TABLE `messages`
	ADD CONSTRAINT `lnk_issues_messages` FOREIGN KEY ( `issue_id` )
	REFERENCES `issues`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_organizations_users" -------------------
-- CREATE LINK "lnk_organizations_users" -----------------------
ALTER TABLE `users`
	ADD CONSTRAINT `lnk_organizations_users` FOREIGN KEY ( `organization_id` )
	REFERENCES `organizations`( `id` )
	ON DELETE Set NULL
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


