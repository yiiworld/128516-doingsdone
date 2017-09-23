<?php
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = strtotime ("28.08.2017");

// в эту переменную запишите кол-во дней до даты задачи
$days_until_deadline = ($task_deadline_ts - $date_deadline)/86400;


function sum_of_cases($arr1,$str){
    $input = 0;
    $study = 0;
    $work = 0;
    $home_of_cases = 0;
    $auto = 0;
    $my_all = 0;
    foreach ($arr1 as $key =>$value){
        switch ($value['Категория']){
            case 'Входящие':
                $input +=1;
                break;
            case 'Учеба':
                $study +=1;
                break;
            case 'Работа':
                $work +=1;
                break;
            case 'Домашние дела':
                $home_of_cases +=1;
                break;
            case 'Авто':
                $auto +=1;
                break;
        };
        $my_all +=1;
    }
    switch ($str) {
        case "Входящие":
            return $input;
        case "Учеба":
            return $study;
        case "Работа":
            return $work;
        case "Домашние дела":
            return $home_of_cases;
        case "Авто":
            return $auto;
        case "Все":
            return $my_all;
    }
};

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

function action_project($index){
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

function searchUserByEmail($email,$users){
  $result=null;
  foreach ($users as $user){
      if($user['email']==$email){
          $result=$user;
          break;
      }
  }
    return $result;
};

?>