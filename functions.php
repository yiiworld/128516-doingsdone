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

$page_main = renderTemplate('templates/index.php',['arr_of_cases' => $arr_of_cases]);



$content = renderTemplate('templates/layout.php',['title' =>'Дела в порядке', 'arr_of_cases' => $arr_of_cases, 'main' =>$page_main]);
print ($content);

?>