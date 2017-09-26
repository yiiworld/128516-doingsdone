
INSERT INTO `project`( `project_name`) VALUES ('Все');
INSERT INTO `project`( `project_name`) VALUES ('Входящие');
INSERT INTO `project`( `project_name`) VALUES ('Учеба');
INSERT INTO `project`( `project_name`) VALUES ('Работа');
INSERT INTO `project`( `project_name`) VALUES ('Домашние дела');
INSERT INTO `project`( `project_name`) VALUES ('Авто');

INSERT INTO `user`(`email`, `name_user`, `password`) VALUES 
('ignat.v@gmail.com','Игнат','$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka');
INSERT INTO `user`( `email`, `name_user`, `password`) VALUES 
('kitty_93@li.ru','Леночка','$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa');
INSERT INTO `user`( `email`, `name_user`, `password`) VALUES 
('warrior07@mail.ru','Руслан','$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW');

INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
('Собеседование в IT компании',"2018-06-01",0,1,(SELECT `id_project` FROM `project` WHERE `project_name` = "Работа"));
INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
("Выполнить тестовое задание","2018-05-25",0,1,(SELECT `id_project` FROM `project` WHERE `project_name` = "Работа"));
INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
("Сделать задание первого раздела","2018-04-21",1,1,(SELECT `id_project` FROM `project` WHERE `project_name` = "Учеба"));
INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
("Встреча с другом","2018-04-22",0,1,(SELECT `id_project` FROM `project` WHERE `project_name` = "Входящие"));
INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
("Купить корм для кота",null,0,2,(SELECT `id_project` FROM `project` WHERE `project_name` = "Домашние дела"));
INSERT INTO `tasks`(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
("Заказать пиццу",null,0,3,(SELECT `id_project` FROM `project` WHERE `project_name` = "Домашние дела"));

/* получить список из всех проектов для одного пользователя:*/
SELECT 
	`project_name` 
FROM 
	`tasks`,`project` 
	WHERE 
		tasks.id_user=2 
		and 
		tasks.id_project=project.id_project;

/*получить список из всех задач для одного проекта:*/
SELECT 
	`task_name` 
FROM 
	`tasks`,`project` 
	WHERE 
		project.project_name="Работа" 
		and 
		tasks.id_project=project.id_project;

/*пометить задачу как выполненную:*/
UPDATE 
	`tasks` 
SET 
	`execution`=1 
	WHERE 
		tasks.id_user=(SELECT `id_user` FROM `user` WHERE user.name_user="Леночка") 
		AND 
		tasks.id_project=(SELECT `id_project` FROM `project` WHERE project.project_name="Домашние дела");
		
/*получить все задачи для завтрашнего дня:*/
SELECT 
	`task_name` 
FROM 
	`tasks` 
	WHERE 
		YEAR(date_execution)=YEAR(CURDATE())
	AND 
		MONTH(date_execution)=MONTH(CURDATE())
	AND 
		DAY(date_execution)=DAY(DATE_ADD(CURDATE(),INTERVAL 1 DAY));		

/*обновить название задачи по её идентификатору:*/
UPDATE 
	`tasks` 
SET 
	`task_name`=`task_name` 
	WHERE 
		id_task=3;