USE DOINGSDONE;

CREATE TABLE `project` (
	`id_project` INT NOT NULL AUTO_INCREMENT,
	`project_name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_project`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `user` (
	`id_user` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(50) NOT NULL,
	`name_user` VARCHAR(50) NOT NULL,
	`password` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_user`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `tasks` (
	`id_task` INT(11) NOT NULL AUTO_INCREMENT,
	`task_name` VARCHAR(50) NOT NULL,
	`date_execution` DATETIME NULL DEFAULT NULL,
	`execution` BINARY(1) NULL DEFAULT NULL,
	`id_user` INT(11) NOT NULL,
	`id_project` INT(11) NOT NULL,
	PRIMARY KEY (`id_task`),
	INDEX `FK__project` (`id_project`),
	CONSTRAINT `FK__project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
	CONSTRAINT `FK_tasks_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
