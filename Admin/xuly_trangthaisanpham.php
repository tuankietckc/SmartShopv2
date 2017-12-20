<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý trạng thái sản phẩm</title>
</head>
<body>
	<?php
		include '../config.php'; 
		$masp = $_GET["id"];
		$sqlcapnhat = "UPDATE sanpham SET trangthaisanpham = 0 WHERE masanpham = $masp";
		if($conn->query($sqlcapnhat)){
			echo "<script>alert(\"Đã xóa sản phẩm\"); 
					window.location.href = 'listproduct	.php';
				</script>";
		}
	?>
</body>
</html>