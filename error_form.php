<?php
if (isset($_POST['submit'])){
    $one=false;
    $two=false;
    $tree=false;
    if (!isset($_POST['name']) or ($_POST['name']=='')) {
        $_GET['add']=true;
        $name_message = '<p class="form__message">Заполните это поле</p>';
        $name_input_error = ' form__input--error';
    }else{$one=true;};
    If (!isset($_POST['project']) or ($_POST['project'])==0){
        $_GET['add']=true;
        $project_message =  '<p class="form__message">В этом поле нужно выбрать проект</p>';
        $project_input_error = ' form__input--error';
    }else{$two=true;};
    $date1 = (strtotime($_POST['date'])-strtotime(date("Y-m-d")));
    if((!isset($_POST['date']))or (!DateTime::createFromFormat('Y-m-d', $_POST['date']))
        or ($date1 < 0) ){
        $_GET['add']=true;
        $date_message = '<p class="form__message">Установите корректную дату</p>';
        $date_input_error = ' form__input--error';
    }else{$tree=true;};
    if ($one and $two and $tree){
        array_unshift($arr_of_cases , ["Задача" => $_POST['name'], "Дата выполнения" => $_POST['date'],
            "Категория" =>$_POST['project'], "Выполнен" => "Нет"]);
    };
};


?>