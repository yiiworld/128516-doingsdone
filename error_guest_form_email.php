<?php
    if(!empty($_POST['email']))
    {
        if(preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email']))
        {
            $One_email=true;
            $email_message='';
            $email_error='';
        }
        else
        {
            $email_message='<p class="form__message">Ввели неверный Email</p>';
            $email_error=' form__input--error';
            $_GET['login']=true;
        };
    }
    else
    {
        $email_message='<p class="form__message">Введите Email</p>';
        $email_error=' form__input--error';
        $_GET['login']=true;
    };
?>