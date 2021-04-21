<?php 
	$sql_product="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham ASC LIMIT 20";
	$query_pro=mysqli_query($mysqli,$sql_product);
?>

<h3>Sản phẩm mới nhất</h3>
				<ul class="product_list">
					<?php 
					while($row=mysqli_fetch_array($query_pro)){
					?>
					<li>
						<a href="index.php?content=sanpham&id=<?php echo $row['id_sanpham'] ?>">
							<img src="https://nordiccoder.com/app/uploads/2020/01/6ab1641f-fb02-4f84-b09d-b8f001063b66.png">
							<p class="title_product"><?php echo $row['tensanpham'] ?></p>
							<p class="price">Giá : <?php echo number_format($row['giasp'],0,',','.').' vnd' ?></p>
							<p class="cate_pro" style="text-align: center; font-size: 18px;">Danh mục : <?php echo $row['tendanhmuc'] ?></p>
						</a>
					</li>
					<?php
					} 
					?>
				</ul>