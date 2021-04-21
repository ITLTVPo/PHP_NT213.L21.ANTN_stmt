
<div class="clear"></div>
<div class="main">
	<?php 
		if(isset($_GET['action']) && isset($_GET['query'])){
			$tam=$_GET['action'];
			$query=$_GET['query'];
		
		}
		else{
				$tam='';
				$query='';
			
		}
		if($tam=='quanlydanhmucsanpham' && $query=='them'){
			include("modules/quanliloaisanpham/them.php");
			include("modules/quanliloaisanpham/lietke.php");
		}elseif($tam=='quanlydanhmucsanpham' && $query=='sua'){
			include("modules/quanliloaisanpham/sua.php");
		}elseif($tam=='quanlysanpham' && $query=='them'){
			include("modules/quanlisanpham/them.php");
			include("modules/quanlisanpham/lietke.php");
		}elseif($tam=='quanlysanpham' && $query=='sua'){
			include("modules/quanlisanpham/sua.php");
		}elseif($tam=='lienhe'){
			include("main/lienhe.php");
		}else{
			include("modules/dashboard.php");
		}
	 ?>
</div>