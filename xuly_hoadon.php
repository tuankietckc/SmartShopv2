<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý hóa đơn</title>
</head>
<body>
	<?php
		session_start(); 
		include 'config.php';

		$sqldemhoadon = "select * from hoadon";
		$kq = $conn->query($sqldemhoadon);
		$mahd =  $kq->num_rows + 1;

		$tentaikhoan = $_SESSION["TaiKhoan"];
		

		$utc = new DateTimeZone('UTC');
		$pdt = new DateTimeZone('Asia/Ho_Chi_Minh');
		$midnight_utc = new DateTime('today midnight', $utc);
		$midnight_utc->setTimeZone($pdt);
		
		$thoigian =  $midnight_utc->format('Y-m-d');
		
		$diachi =  $_POST["txtdiachi"];
		$sdt = $_POST["txtsdt"];

		$giohang = array();
		$giohang = $_SESSION["giohang"];
		$TongTien = 0;
		foreach ($giohang as $key ) {
			$TongTien += $key["soluong"] * $key["dongia"];
		}
		echo $TongTien;
		$sqlthemhoadon = "INSERT INTO hoadon(MaHoaDon,TenTaiKhoan,TongTien,diachigiaohang,sodienthoaigiaohang,ngaylap,trangthai) VALUES ('$mahd','$tentaikhoan',$TongTien, '$diachi','$sdt','$thoigian',1)";
		if($conn->query($sqlthemhoadon)){
				$giohang = array();
				$giohang = $_SESSION["giohang"];
				foreach ($giohang as $key ) {
					$masp = $key["masanpham"];
					$solg = $key["soluong"];
					$sqlthemchitiet = "INSERT INTO chitiethoadon(MaHoaDon,masanpham,soluong) VALUES ('$mahd','$masp', $solg)";
					
					$conn->query($sqlthemchitiet);	
					$_SESSION["giohang"] = null;
					echo 'Thêm hóa đơn thành công';
				}

			


			}





	?>
</body>
</html>