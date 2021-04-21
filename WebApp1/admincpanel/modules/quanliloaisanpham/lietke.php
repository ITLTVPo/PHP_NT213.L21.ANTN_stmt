<?php 
	$sql_lietke="SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
	$row_lietke=mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Tên danh mục</th>
    <th>Quản lí</th>
  </tr>
  <?php
  	$i=0;
  	while($row=mysqli_fetch_array($row_lietke)){
  		$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
    	<a href="modules/quanliloaisanpham/xuli.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>