<?php
require ('userdata.php');
require('functions.php');

session_start();

if (! empty ($_POST ))
{

    $email = $_POST ['email'];
    $password = $_POST ['password' ];
    require ('error_guest_form_email.php');
    if ($email_error<>'' and $email_message<>'')
    {
        $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
            'email_e' => $email_error, 'email_m' => $email_message,
            'pass_e' => '', 'pass_e' => '']);
        print($content_guest);
    }
    else
    {
        if ($user = searchUserByEmail( $email , $users ))
        {
            If($user<>null)
            {
                if (password_verify( $password , $user ['password' ]))
                {
                    $_SESSION ['user' ] = $user ;
                    header( "Location: /index.php" );
                }
            }
            else
            {
                $email_error = ' form__input--error';
                $email_message = '<p class="form__message">Данный Email не существует</p>';
                $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '',
                    'email_e' => $email_error, 'email_m' => $email_message,
                    'pass_e' => '', 'pass_e' => '']);
                print($content_guest);
            }

        }
    }

}
else
{
    if (isset($_GET['login']))
    {
        $content_guest = renderTemplate('templates/guest.php', ['body_guest' => ' overlay', 'hidden_guest' => '']);
        print($content_guest);
    }
    else
    {
        $content_guest = renderTemplate('templates/guest.php', ['body_guest' => '', 'hidden_guest' => ' hidden']);
        print($content_guest);
    };
};







if (isset($_SESSION['name']) ) {
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
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке', 'body' => ' class = "overlay"',
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main, 'form' => $input_form]);

        } else {
            $content = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке',
                'arr_of_cases' => $arr_of_cases, 'project_arr' => $project_arr, 'main' => $page_main]);
        };

        print ($content);

    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    };
};
?>