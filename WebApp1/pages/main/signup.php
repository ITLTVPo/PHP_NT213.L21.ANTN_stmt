<h3>Đăng ký thành viên</h3>
<style type="text/css">
	table.dangky tr td{
		padding:5px;
	}
</style>
<form action="./pages/main/includes/signup.inc.php" method="POST">
	<table class="dangky" border="1" style="border-collapse: collapse;" width="50%">
		<tr>
			<td>Họ và tên</td>
			<td><input type="text" name="name" size="50"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" size="50"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pwd" size="50"></td>
		</tr>
		<tr>
			<td>Confirm your password</td>
			<td><input type="password" name="re_Pwd" size="50"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" size="50"></td>
		</tr>
		<tr>
			<td ><input type="submit" name="signup" size="50" value=" Đăng ký"></td>
			<td><a href="index.php?content=login">Đăng nhập nếu đã có tài khoản</a></td>
		</tr>
	</table>
</form>
<?php
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		if($error=="EmptyInputSignup"){
			echo "<bold>Please fill in all the fields!</bold>";
		}
		if($error=="InvalidUsername"){
			echo "<bold>Please use the correct format of username!</bold>";
		}
		if($error=="InvalidEmail"){
			echo "<bold>Please use the correct format of Email!</bold>";
		}
		if($error=="MisstypePassword"){
			echo "<bold>Password is does not match!</bold>";
		}
		if($error=="ExistsUsername"){
			echo "<bold>The username has already in use!</bold>";
		}
		if ($error=="stmtfailed"){
			echo "<bold>Something is wrong, please contact your admin!</bold>";
		}
		if($error=="none"){
			echo "<bold>Sign Up successful!</bold>";
		}
	}
?>