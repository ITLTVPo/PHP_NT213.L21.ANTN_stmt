<?php 
	$id = $_GET['id'];
	$sql_product="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc=? ORDER BY id_sanpham ASC";
	$stmt = mysqli_stmt_init($mysqli);
	if (!mysqli_stmt_prepare($stmt,$sql_product)){
		printf("Error: %s\n", mysqli_stmt_error($stmt));
    	exit();
	}
	mysqli_stmt_bind_param($stmt,'i',$id);
	mysqli_stmt_execute($stmt);
	$query_pro = mysqli_stmt_get_result($stmt);

	$sql_category="SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc=? LIMIT 1";
	$stmt = mysqli_stmt_init($mysqli);
	if (!mysqli_stmt_prepare($stmt,$sql_category)){
		printf("Error: %s\n", mysqli_stmt_error($mysqli));
    	exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$id);
	mysqli_stmt_execute($stmt);
	$query_category = mysqli_stmt_get_result($stmt);
	$row_title = mysqli_fetch_array($query_category);
	mysqli_stmt_close($stmt);
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?> </h3> 
				<ul class="product_list">
					<?php 
					while($row_pro=mysqli_fetch_array($query_pro)){
					?>
					<li>
						<a href="index.php?content=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
							<img src="https://nordiccoder.com/app/uploads/2020/01/6ab1641f-fb02-4f84-b09d-b8f001063b66.png">
							<p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
							<p class="price">Giá : <?php echo number_format($row_pro['giasp'],0,',','.').' vnd' ?></p>
						</a>
					</li>
					<?php 
					}
					?>
				</ul>

