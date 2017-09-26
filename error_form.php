<?php
 require('init.php');
if (isset($_POST['submit'])){
    $one=false;
    $two=false;
    $tree=false;
        if (!isset($_POST['name']) or ($_POST['name']=='')) {
            $_GET['add']=true;
            $name_message = '<p class="form__message">Заполните это поле</p>';
            $name_input_error = ' form__input--error';
        }
        else{
            $one=true;
        };

            if (!isset($_POST['project']) or ($_POST['project'])==0){
                $_GET['add']=true;
                $project_message =  '<p class="form__message">В этом поле нужно выбрать проект</p>';
                $project_input_error = ' form__input--error';
            }
            else{
                $two=true;
            };

                $date1 = (strtotime($_POST['date'])-strtotime(date("Y-m-d")));
                if((!isset($_POST['date']))or (!DateTime::createFromFormat('Y-m-d', $_POST['date']))
                    or ($date1 < 0) ){
                    $_GET['add']=true;
                    $date_message = '<p class="form__message">Установите корректную дату</p>';
                    $date_input_error = ' form__input--error';
                }
                else{
                    $tree=true;
                };

                if (isset($_FILES['preview'])){
                    move_uploaded_file($_FILES['preview']['tmp_name'],'./'.$_FILES['preview']['name']);
                };

    if ($one and $two and $tree){
		$sql_select_user = mysqli_fetch_all(mysqli_query($connect, 'SELECT id_user from user WHERE user.name_user="'.strval($_SESSION['user']).'"'),MYSQLI_ASSOC);
	
	
		
		$sql_insert_data = 'INSERT INTO tasks(`task_name`, `date_execution`, `execution`, `id_user`, `id_project`) VALUES 
			("'.strval($_POST['name']).'","'.$_POST['date'].'", 0, '.$sql_select_user[0] ["id_user"].', '.$_POST['project'].')';
		$query=mysqli_query($connect, $sql_insert_data);
		$_POST=[];
       
       
    };
};


?>