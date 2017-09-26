<?php 
	$connect=mysqli_connect("localhost","root","","DOINGSDONE");
	if ($connect==false)
	{
		$connect_error= mysqli_connect_error();
		$error_con=renderTemplate('templates/error.php', ['error'=>$connect_error]);
		print($error_con);
		exit;
	};

?>