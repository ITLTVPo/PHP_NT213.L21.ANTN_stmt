<?php
	if(isset($_POST['login'])){
		
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		require_once './functions.inc.php';
		require_once '../../../admincpanel/config/config.php';

		if (EmptyInputLogin($username, $pwd)!==false){
			header("location: ../../../index.php?content=login&error=EmptyInputLogin");
			exit();
		}
		if (!ExistsUsername($mysqli, $username, $username)){
			header("location: ../../../index.php?content=login&error=WrongLogin");
			exit();
		}
		else{
			UserLogin($mysqli,$username,$pwd);
		}
	}
	else{
		header('location: ../../../index.php?content=login');
		exit();
	}