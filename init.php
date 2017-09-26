<?php 
	$connect=mysqli_connect("localhost","root","","DOINGSDONE");
	$project_arr1 = mysqli_fetch_all(mysqli_query(
													$connect,
													'select `id_project`,`project_name` from `project`	'
													),
													MYSQLI_ASSOC
										);
		
		
		$arr_of_cases1= mysqli_fetch_all(mysqli_query(
													$connect,
													'select `id_task`,`task_name`,date(`date_execution`),`execution`,`name_user`,`project_name` 
													from `tasks`,`project`,`user` 
													where project.id_project=tasks.id_project 
													and user.id_user=tasks.id_user 
													and 
													user.id_user= (select `id_user` from `user` where user.name_user="'.strval($_SESSION['user']).'")'
													),
													MYSQLI_ASSOC
										);
	if ($connect==false)
	{
		$connect_error= mysqli_connect_error();
		$error_con=renderTemplate('templates/error.php', ['error'=>$connect_error]);
		print($error_con);
		exit;
	};

?>