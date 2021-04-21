<?php 
	$sql_lietke="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
	$row_lietke=mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sản phẩm</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lí</th>
  </tr>
  <?php
  	$i=0;
  	while($row=mysqli_fetch_array($row_lietke)){
  		$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){ echo 'Kích hoạt';}else{echo 'Ẩn';} ?></td>
    <td>
    	<a href="modules/quanlisanpham/xuli.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>