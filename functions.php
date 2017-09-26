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

//функция подсчета соличества задач по категориям
function sum_of_cases($arr1,$str){
    $input = 0;
    $study = 0;
    $work = 0;
    $home_of_cases = 0;
    $auto = 0;
    $my_all = 0;
    foreach ($arr1 as $key =>$value){
        switch ($value['project_name']){
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

//Шаблонизатор
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

//активный проект
function action_project($index){
    if ($index == $_GET['tab']) {
        return print('main-navigation__list-item--active">');
    } else {
        return print('">');
    }
};

//поиск user по email
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

//помошник, db_get_prepare_stmt
require('mysql_helper.php');


//Ф1
function select_data($link,$sql,$array=[])
{
	if ($link==false)
	{
		$result=[];
	}
	else
	{
		db_get_prepare_stmt($link,$sql,$array);
		$result = mysqli_fetch_all(tmysqli_stmt_execute($stmt),MYSQLI_ASSOC);
	}
	return $result;
};


//Ф2

function insert_data($link,$table_name,$param=[])
{
	if($link == false)
	{
		$result=false;
	}
	else
	{
		$placeholder='';
		$param_name='';
		$arr_param=[];
		foreach($param as $key => $value){
			$placeholder.='?,';
			$param_name .= '`'.strval($key).'`,';
			$arr_param[] = $value;
		};
		
		$placeholder = substr($placeholder,0,-1);
		$param_name = substr($param_name,0,-1);
		
		$sql='INSERT INTO `'.$lable_name.'`('.$param_name.') VALUES ('.$placeholder.');';
		db_get_prepare_stmt($link,$sql,$arr_param);
		if (tmysqli_stmt_execute($stmt))
		{
			$result =mysqli_insert_id(tmysqli_stmt_execute($stmt));
		}
		else
		{
			$result=false;
		}
	}
	
	return $result;
};

//Ф3
function exec_query($link,$sql,$array=[])
{
	if ($link==false)
	{
		$result=false;
	}
	else
	{
		db_get_prepare_stmt($link,$sql,$array);
		$result = tmysqli_stmt_execute($stmt);
	}
	return $result;
};




?>