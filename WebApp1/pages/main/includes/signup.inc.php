<?php
	if (isset($_POST['signup'])){
		$name=$_POST['name'];
		$username=$_POST['username'];
		$pwd=$_POST['pwd'];
		$email=$_POST['email'];
		$rePwd=$_POST['re_Pwd'];
		
		require_once './functions.inc.php';
		require_once '../../../admincpanel/config/config.php';

		if (EmptyInputSignup($name,$username,$pwd,$email,$rePwd)!==false){
			header("location: ../../../index.php?content=signup&error=EmptyInputSignup");
			exit();
		}
		if(InvalidUsername($username)!==false){
			header("location: ../../../index.php?content=signup&error=InvalidUsername");
			exit();
		}
		if(InvalidEmail($email)!==false){
			header("location: ../../../index.php?content=signup&error=InvalidEmail");
			exit();
		}
		if(MisstypePassword($pwd,$rePwd)!==false){
			header("location: ../../../index.php?content=signup&error=MisstypePassword");
			exit();
		}
		if(ExistsUsername($mysqli, $username, $email)!==false){
			header("location: ../../../index.php?content=signup&error=ExistsUsername");
			exit();
		}
		UserSignup($mysqli,$name,$username,$pwd,$email);
	}
	else{
		header("location: ../../../index.php?content=signup");
		exit();
	}