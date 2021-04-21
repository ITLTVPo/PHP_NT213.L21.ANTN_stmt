<?php 
	$sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
	$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
?>

<div class="menu">
	<ul class="list_menu">
		<li><a href="index.php">Trang chủ</a></li>
		<?php 
			if($query_danhmuc!=false){
			while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
		?>
		<li><a href="index.php?content=category&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
		<?php 
		}}
		?>

		<?php 
			if(isset($_SESSION['id'])){
		?>
			<li><a href="pages/main/includes/logout.inc.php">Đăng xuất</a></li>
			<li><a href="index.php?content=profile">My profile</a></li>
		<?php 
			}else{	
		?>
			<li><a href="index.php?content=signup">Login/Signup</a></li>
		<?php
		} 
		?>
	</ul>
	<p>
		<form action="index.php?content=search" method="POST">
			<input type="text" placeholder="Tìm kiếm sản phẩm" name="keyword" style="float: right;" >
			<input type="submit" name="search" value="Tìm kiếm" style="float: right;" >
			
		</form>
	</p>
</div>