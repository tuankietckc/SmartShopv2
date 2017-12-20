<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý trạng thái Hóa đơn</title>
</head>
<body>
	<?php 
	include '../config.php';
	$mahoadon = $_GET["mahoadon"];
	$trangthai = $_GET["trangthai"];
	var_dump($mahoadon);
	var_dump($trangthai);
	$sqlsuatrangthai = "";
	if($trangthai == "0")
		$sqlsuatrangthai = "UPDATE hoadon SET trangthai = 1 WHERE MaHoaDon = '$mahoadon'";
	else
		$sqlsuatrangthai = "UPDATE hoadon SET trangthai = 0 WHERE MaHoaDon = '$mahoadon'";

	if($conn->query($sqlsuatrangthai)){
		echo "<script>alert(\"Cập nhật trạng thái thành công\"); 
					window.location.href = 'danhsachdonhang.php';
				</script>";
	}
	else
		echo "fail nhen";
	$conn->close(); 
?>
</body>
</html>