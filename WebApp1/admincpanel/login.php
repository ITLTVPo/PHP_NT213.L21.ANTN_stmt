<?php 
	session_start();
	include("config/config.php");
	if(isset($_POST['login'])){
		$taikhoan=$_POST['username'];
		$matkhau=md5($_POST['password']);
		$sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."'AND password='".$matkhau."' LIMIT 1";
		$query=mysqli_query($mysqli,$sql);
		$count=mysqli_num_rows($query);
		if($count>0){
			$_SESSION['login']=$taikhoan;
			header("Location:index.php");
		}else{
			echo'<script>alert("Tài khoản hoặc mật khẩu sai")</script>';
			header("Location:login.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login to Administrator</title>
	<style type="text/css">
		body{
			background: #f2f2f2;
		}
		.wrapper{
			width: 20%;
			margin: 0 auto;
		}
		table.login{
			width: 100%;
		}
		table.login tr td{
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<form action="" method="POST">
			<table border="1" class="login" style="text-align: center;border-collapse: collapse;">
				<tr>
					<td colspan="2"><h3>Đăng nhập</h3></td>
				</tr>
				<tr>
					<td>Tải khoản</td>
					<td><input type="text"  name="username"></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input type="password"  name="password"></td>
				</tr>
				<tr>
					<td colspan="2" > <input type="submit" name="login" value="Login"></td>
				</tr>
			</table>
		</form>
	</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
