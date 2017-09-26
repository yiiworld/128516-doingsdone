<?php
session_start();

require ('functions.php');
require('init.php');

if (!isset($_SESSION['user'])) {


    if (!empty ($_POST)) {
        $email = htmlspecialchars($_POST ['email']);
        $password = htmlspecialchars($_POST ['password']);
        require('error_guest_form_email.php');
        if ($email_error <> '' and $email_message <> '') {
			/*РЕГИСТРАЦИЯ*/
			
			
			
			
			
			
			
			
            $_GET['login'] = true;
            $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
                'email_e' => $email_error, 'email_val' => $email, 'email_m' => $email_message,
                'pass_e' => '', 'pass_val' => $password, 'pass_e' => '']);
            print($content_guest);
        } else {
			$user_sql_arr=mysqli_fetch_all(mysqli_query($connect, 'SELECT * from user'),MYSQLI_ASSOC);
			
            $user = searchUserByEmail($email, $user_sql_arr);
	
            if ($user <> null) {
                if (password_verify($password, $user ['password'])) {
                    $_SESSION['user'] = $user["name_user"];
                    $_SESSION['email'] = $user["email"];
					 
					if(isset($_COOKIE['show_completed']))
					{
						header('Location: index.php?show_completed='.$_COOKIE['show_completed']);
					}
                   
                } else {
                    $_GET['login'] = true;
                    $pass_error = ' form__input--error';
                    $pass_message = '<p class="form__message">Неверный пароль</p>';
                    $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
                        'email_e' => '', 'email_val' => $email, 'email_m' => '',
                        'pass_e' => $pass_error, 'pass_val' => $password, 'pass_m' => $pass_message]);
                    print($content_guest);
                }
            } else {
                $_GET['login'] = true;
                $email_error = ' form__input--error';
                $email_message = '<p class="form__message">Данный Email не существует</p>';
                $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
                    'email_e' => $email_error, 'email_val' => $email, 'email_m' => $email_message,
                    'pass_e' => '', 'pass_val' => $password, 'pass_m' => '']);
                print($content_guest);
            }
        }
    } else {
        if (isset($_GET['login'])) {
            $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '']);
            print($content_guest);
        } else {
            $content_guest = renderTemplate('templates/guest.php', ['body_guest' => '', 'hidden_guest' => ' hidden']);
            print($content_guest);
        };
    };
}
else {

	
	
	if (isset($_GET['show_completed']))
	{
		setcookie('show_completed', $_GET['show_completed'], strtotime("31-12-2020"));
	}



    if (isset($_GET['logout'])){
        unset($_SESSION['email']);
        unset($_SESSION['user']);
        header('Location: index.php');
    };
	
    if (!isset($_GET['tab'])) {
        $_GET['tab'] = 0;
    };
    if (array_key_exists($_GET['tab'], $project_arr1)) {
        require('error_form.php');
        $page_main = renderTemplate('templates/index.php', ['arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr]);
        if (isset($_GET['add'])) {
            $input_form = renderTemplate('form.php', ['project_arr' => $project_arr, 'message_name' => $name_message, 'input_error_name' => $name_input_error,
                'message_project' => $project_message, 'input_error_project' => $project_input_error,
                'message_date' => $date_message, 'input_error_date' => $date_input_error]);
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'userName'=>$_SESSION['user'], 'body' => ' class = "overlay"',
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main, 'form' => $input_form]);
        } else {
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'userName'=>$_SESSION['user'],
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main]);
        };
        print ($content);
    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    };
};
?>