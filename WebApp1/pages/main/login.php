<form action="./pages/main/includes/login.inc.php" method="POST">
			<table border="1" class="login" style="text-align: center;border-collapse: collapse;padding: 10px;margin: 10px;width: 50%">
				<tr>
					<td colspan="2"><h3>Đăng nhập</h3></td>
				</tr>
				<tr>
					<td>Tải khoản</td>
					<td><input style="width: 95%" required="" type="text"  name="username" placeholder="username..."></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input style="width: 95%" required="" type="password"  name="pwd" placeholder="password..."></td>
				</tr>
				<tr>
					<td colspan="2" > <input type="submit" name="login" value="Đăng nhập"></td>
				</tr>
			</table>
		</form>