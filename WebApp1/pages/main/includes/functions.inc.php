<?php
function EmptyInputSignup($name,$username,$pwd,$email,$rePwd){
	$result;
	if(empty($name) ||  empty($username) ||empty($pwd) ||empty($email) ||empty($rePwd)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function InvalidUsername($username){
	$result;
	if(!preg_match(('/^[a-zA-Z0-9]*$/'),$username)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function InvalidEmail($email){
	$result;
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}
function MisstypePassword($pwd,$rePwd){
	$result = true;
	if($pwd!==$rePwd){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function ExistsUsername($conn, $username, $email){
	$sql = "SELECT * FROM users WHERE username= ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: /WebApp1/index.php?content=signup&error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$username, $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($result)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function UserSignup($conn, $name,$username,$pwd,$email){
	$sql = "INSERT INTO users (name, username, pwd, email) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../../../index.php?content=signup&error=stmtfailed");
		exit();
	}
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "ssss", $name,$username,$pwd,$email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../../index.php?content=signup&error=none");
	exit();
}

function EmptyInputLogin($username, $pwd){
	$result;
	if(empty($username)||empty($pwd)){
		$result = true;
	}
	else{
		$result =false;
	}
	return $result;
}

function UserLogin($conn,$username,$pwd){
	$user = ExistsUsername($conn, $username, $username);
	if (!$user){
		header("location: ../../../index.php?content=login&error=WrongLogin");
		exit();
	}
	$check = password_verify($pwd, $user["pwd"]);
	if (!$check){
		header("location: ../../../index.php?content=login&error=WrongLogin");
		exit();
	}
	else if ($check == true){
		session_start();
		$_SESSION["id"] = $user["id"];
		$_SESSION["name"] = $user["name"];
		header("location: ../../../index.php?content=index.php");
		exit();
	}
}

