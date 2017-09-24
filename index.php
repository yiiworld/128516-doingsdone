<?php


session_start();


echo ($_SESSION['user']);


if ($_SESSION['user']<>'Игнат') {



    require ('userdata.php');
    require('functions.php');








    if (!empty ($_POST)) {

        $email = htmlspecialchars($_POST ['email']);
        $password = htmlspecialchars($_POST ['password']);

        require('error_guest_form_email.php');

        if ($email_error <> '' and $email_message <> '') {
            $_GET['login'] = true;
            $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
                'email_e' => $email_error, 'email_val' => $email, 'email_m' => $email_message,
                'pass_e' => '', 'pass_val' => $password, 'pass_e' => '']);
            print($content_guest);
        } else {

            $user = searchUserByEmail($email, $users);


            If ($user <> null) {


                if (password_verify($password, $user ['password'])) {

                    $_SESSION['user'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    header('Location: http://localhost/doingsdone/128516-doingsdone/index.php');

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

require ('functions.php');


    if (isset($_GET['logout'])){

        unset($_SESSION['email']);
        unset($_SESSION['user']);

        header('Location: http://localhost/doingsdone/128516-doingsdone/index.php');

    };

    If (!isset($_GET['tab'])) {
        $_GET['tab'] = 0;
    }
    if (array_key_exists($_GET['tab'], $project_arr)) {

        require('error_form.php');

        $page_main = renderTemplate('templates/index.php', ['arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr]);

        if (isset($_GET['add'])) {
            $input_form = renderTemplate('form.php', ['project_arr' => $project_arr, 'message_name' => $name_message, 'input_error_name' => $name_input_error,
                'message_project' => $project_message, 'input_error_project' => $project_input_error,
                'message_date' => $date_message, 'input_error_date' => $date_input_error]);
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'userName'=>$_SESSION['name'], 'body' => ' class = "overlay"',
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main, 'form' => $input_form]);

        } else {
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'userName'=>$_SESSION['name'],
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main]);
        };

        print ($content);

    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    };
};



?>
