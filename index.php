<?php

require('functions.php');

If (!isset($_GET['tab'])){$_GET['tab']=0;}
   if (array_key_exists($_GET['tab'],$project_arr)) {
       $page_main = renderTemplate('templates/index.php', ['arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr]);
var_dump($arr_of_cases);
require ('error_form.php');
           if (isset($_GET['add'])){
               $input_form=renderTemplate('form.php',['project_arr' =>$project_arr ,'message_name' => $name_message, 'input_error_name'=>$name_input_error,
                   'message_project' => $project_message, 'input_error_project' => $project_input_error,
                   'message_date'=>$date_message, 'input_error_date'=>$date_input_error]);
               $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'body' =>' class = "overlay"',
                   'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main, 'form' => $input_form]);

           }else{
                   $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке',
                       'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main]);
           };
       print ($content);
   }else{
       header("HTTP/1.0 404 Not Found");
       exit;
   }
?>