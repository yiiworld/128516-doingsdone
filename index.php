<?php
require('functions.php');
   if (array_key_exists($_GET['tab'],$project_arr)) {
       $page_main = renderTemplate('templates/index.php', ['arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr]);
       $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main]);
       print ($content);
   }else{
       header("HTTP/1.0 404 Not Found");
       exit;
   }
?>