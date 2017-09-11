<?php
    require ('functions.php');
    $page_main = renderTemplate('templates/index.php',['arr_of_cases' => $arr_of_cases,'project_arr' => $project_arr]);
    $content = renderTemplate('templates/layout.php',['title' =>'Дела в порядке', 'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' =>$page_main]);
    print ($content);
?>