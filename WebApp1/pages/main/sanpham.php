<h3 style="margin:10px;padding: 20px;text-align: center;">Chi tiết sản phẩm</h3>

<?php 
	$id=$_GET['id'];
	$sql_chitiet="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham=? LIMIT 1";
	$stmt = mysqli_stmt_init($mysqli);
	if (!mysqli_stmt_prepare($stmt,$sql_chitiet)){
		printf("Error: %s\n", mysqli_error($mysqli));
    	exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$id);
	mysqli_stmt_execute($stmt);
	$query_chitiet = mysqli_stmt_get_result($stmt);
	if (!$query_chitiet) {
    	printf("Error: %s\n", mysqli_error($mysqli));
    	exit();
	}
	while($row_chitiet=mysqli_fetch_array($query_chitiet)){
?>

<div class="wrapper_chitiet">
	<div class="hinhanhsanpham" style="width: 45%">
		<img  width="100%" style="height: 100%;width:300px;" src="https://nordiccoder.com/app/uploads/2020/01/6ab1641f-fb02-4f84-b09d-b8f001063b66.png">
	</div>
	<div class="chitiet_sp" style="font-size: 15px">
		<p style="font-size: 18px;">Tên sản phẩm : <?php echo $row_chitiet['tensanpham'] ?></p>
		<p style="font-size: 18px;">Mã sản phẩm : <?php echo $row_chitiet['masp'] ?></p>
		<p style="font-size: 18px;">Giá sản phẩm : <?php echo number_format($row_chitiet['giasp'],0,',','.').' vnd' ?></p>
		<p style="font-size: 18px;">Số lượng sản phẩm : <?php echo $row_chitiet['soluong'] ?></p>
		<p style="font-size: 18px;">Danh mục sản phẩm : <?php echo $row_chitiet['tendanhmuc'] ?></p>
	</div>
	<div class="clear_sanpham"></div>

	<?php 
		if(isset($_POST['submit']))
		{
			$ten=$_POST['ten'];
			$sdt=$_POST['sdt'];
			$binhluan=$_POST['binhluan'];
			$ngay_gio=date("Y-m-d H:i:s");
			$idsp=$_GET['id'];
			if(isset($ten)&&isset($sdt)&&isset($binhluan)){
				$sql="INSERT INTO tbl_binhluan(ten,sdt,binhluan,ngaygio,idsp) VALUES (?,?,?,?,?)";
				$stmt = mysqli_stmt_init($mysqli);
				if (!mysqli_stmt_prepare($stmt,$sql)){
					printf("error: %s\n",mysqli_stmt_error($stmt));
					exit();
				}
				mysqli_stmt_bind_param($stmt,'sssss',$ten,$sdt,$binhluan,$ngay_gio,$idsp);
				mysqli_stmt_execute($stmt);
				header("Location:index.php?content=sanpham&id=".$idsp);
				mysqli_stmt_close($stmt);
			}
		}
	?>

	<div class="binhluan">
		<h3>Bình luận sản phẩm</h3>
		<form method="POST" action="">
			<div class="form_group">
				<label style="font-size: 18px">Họ và tên:<?php echo "     " ?></label>
				<input style="margin:5px;padding:5px;width: 40%" type="text" name="ten" required="" class="form-control" placeholder="Họ và tên">
			</div>
			<div class="form_group">
				<label style="font-size:18px;">Điện thoại</label>
				<input style="margin:5px;padding:5px;width: 40%" type="text" name="sdt" required="" class="form-control" placeholder="Số điện thoại">
			</div>
			<div class="form_group">
				<label style="font-size:18px;">Nội dung:</label> 
				<textarea style="margin: 5px;padding: 5px;" rows="10" cols="100%" class="form-control" name="binhluan" required="" placeholder="Nội dung bình luận"></textarea>
			</div>
			<button style="padding:5px;margin: 10px;font-size: 16px;font-weight: bold;" type="submit" name="submit" class="comment"> Bình luận</button>
		</form>
	</div>

	<?php 
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else{
			$page=1;
		}
		$rowperpage=3;
		$perRow=$page*$rowperpage-$rowperpage;
		$sql_binhluan="SELECT * FROM tbl_binhluan WHERE idsp=? ORDER BY id_binhluan DESC LIMIT $perRow,$rowperpage";
		$stmt = mysqli_stmt_init($mysqli);
		if(!mysqli_stmt_prepare($stmt,$sql_binhluan)){
			printf("error: %s\n",mysqli_stmt_error($stmt));
			exit();
		}
		mysqli_stmt_bind_param($stmt,'s',$id);
		mysqli_stmt_execute($stmt);
		$query = mysqli_stmt_get_result($stmt);
		//tong so ban ghi tong so binh luan cua san pham do
		$sql = "SELECT * FROM tbl_binhluan WHERE idsp=?";
		$stmt = mysqli_stmt_init($mysqli);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			printf("error: %s\n",mysqli_stmt_error($stmt));
			exit();
		}
		mysqli_stmt_bind_param($stmt,'s',$id);
		mysqli_stmt_execute($stmt);
		$row = mysqli_stmt_get_result($stmt);
		$total_rows=mysqli_num_rows($row);
		//tổng số trang
		$total_pages=ceil($total_rows/$rowperpage);

		//xây dựng thanh phân trang
		$list_page='';
		for($i=1;$i<=$total_pages;$i++){
			if($page==$i){
				$list_page.='<li class="active" style="margin:5px;padding:5px;float:left; margin: 3px; border: solid 1px gray;list-style: none;"><a href="index.php?content=sanpham&id='.$id.'&page='.$i.'">'.$i.'</a></li>';
			}
			else{
				$list_page.='<li style="margin:5px;padding:5px;float:left; margin: 3px; border: solid 1px gray;list-style: none;"><a href="index.php?content=sanpham&id='.$id.'&page='.$i.'">'.$i.'</a></li>';
			}
		}
		$count=mysqli_num_rows($query);
		if($count>0){
	?>
	<div class="db_binhluan">
		<?php 
		while($row=mysqli_fetch_array($query)){
		?>
		<ul style="border:1px solid #2b5454">
			<li class="ten" style="list-style: none;font-size: 18px;font-weight: bold;"><?php echo $row['ten'] ?></li>
			<li class="time" style="list-style: none"><?php echo $row['ngaygio'] ?></li>
			<li class="detail" style="list-style: none;font-size:18px">
				<p>
					<?php echo $row['binhluan'] ?>
				</p>
			</li>
		</ul>
		<?php 
		}
		?>
	</div>
	<?php 
	}
	?>
</div>
<div class="phantrang">
	<nav aria-label="Page navigation" >
		<ul class="pagination">
			<?php 
				echo $list_page;
			?>

		</ul>
	</nav>
</div>
<?php 
} 
?>