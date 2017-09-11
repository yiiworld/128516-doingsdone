<?php
function renderTemplate($path, $arr){

    if (file_exists($path)){
      ob_start();
        extract($arr);
        require_once $path;
        $html = ob_get_clean();
        return $html;
    }else {
        return "";
    }

};

function url_add($int){
    $_GET['tab'] = $int;
   return ('http://localhost/doingsdone/128516-doingsdone/index.php?tab='.$_GET['tab']);
};

function action_progect($index){
    if ($index == $_GET['tab']) {
       return print('main-navigation__list-item--active">');
    } else {
        return print('">');
    }
};

$arr_of_cases = array(
    array("Задача" => "Собеседование в IT компании", "Дата выполнения" => "01.06.2018",
        "Категория" =>"Работа", "Выполнен" => "Нет"),
    array("Задача" => "Выполнить тестовое задание", "Дата выполнения" => "25.05.2018",
        "Категория" =>"Работа", "Выполнен" => "Нет"),
    array("Задача" => "Сделать задание первого раздела", "Дата выполнения" => "21.04.2018",
        "Категория" =>"Учеба", "Выполнен" => "Да"),
    array("Задача" => "Встреча с другом", "Дата выполнения" => "22.04.2018",
        "Категория" =>"Входящие", "Выполнен" => "Нет"),
    array("Задача" => "Купить корм для кота", "Дата выполнения" => "Нет",
        "Категория" =>"Домашние дела", "Выполнен" => "Нет"),
    array("Задача" => "Заказать пиццу", "Дата выполнения" => "Нет",
        "Категория" =>"Домашние дела", "Выполнен" => "Нет"),
);

$project_arr = array(0 => "Все", 1 => "Входящие", 2 => "Учеба",
    3 => "Работа", 4 => "Домашние дела", 5 => "Авто");


?>