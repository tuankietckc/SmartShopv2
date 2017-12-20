<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý đăng ký</title>
</head>
<body>
	<?php 
		include 'config.php';
		if($_SESSION["TenKhachHang"] != null)
			header('Location: localhost/smartshop/');
		else if($_POST['txttaikhoan'] =="" || $_POST['txtmatkhau'] =='' || $_POST['txthoten'] ==''|| $_POST['txtemail'] ==''){
			echo "<script>alert(\"Đăng ký thất bại\"); 
					window.location.href = 'login-register.php';
				</script>";
	
		}
		else{
			$taikhoan = $_POST['txttaikhoan'];
			$matkhau = $_POST['txtmatkhau'];
			$hoten = $_POST['txthoten'];
			$email = $_POST['txtemail'];
			$loaitaikhoan = 0;
			$trangthai = 1;
			
			$sql1 = "INSERT INTO `nguoidung` (`HoTen`, `Emai`, `TenTaiKhoan`, `MatKhau`, `TrangThai`, `LoaiTaiKhoan`) VALUES ('$hoten', '$email', '$taikhoan', '$matkhau', '$trangthai', '$loaitaikhoan');";

			if($conn->query($sql1)){
				echo "<script>alert(\"Đăng ký thành công\"); 
					window.location.href = 'login-register.php';
				</script>";
				
			}
			else{
				echo "Error: ".$sql."<br>".$conn->Error;
			}
			$conn->close();
		}
 ?>
</body>
</html>