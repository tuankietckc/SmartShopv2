<?php
include '../config.php';
$TenSP = $_POST["txttensp"];
$MoTa = $_POST["txtmota"];
$SoLuong = $_POST["txtsoluong"];
$DonGia = $_POST["txtdongia"];
$LoaiSP  = $_POST["LoaiSP"];
$NCC = $_POST["NhaCC"];
$MaSP = $_POST["txtmasp"];
$NoiLuu = '../HinhAnh';
$tmp_name = $_FILES["fileanhdaidien"]["tmp_name"];
$TenFile = basename($_FILES["fileanhdaidien"]["name"]);
if(move_uploaded_file($tmp_name, "$NoiLuu/$TenFile"))
{
	$HinhDaiDien = $NoiLuu."/".$TenFile;

	$sql_ThemSP = "UPDATE sanpham SET tensanpham = '$TenSP', mota = '$MoTa',hinhanh = '$HinhDaiDien', soluong = $SoLuong, dongia = $DonGia, loaisanpham = '$LoaiSP', Mancc = '$NCC' WHERE masanpham = '$MaSP'";
	if($conn->query($sql_ThemSP))
	{
		echo "Thêm sản phảm thành công";
	}
	else
	{
		echo "Error: ".$sql."<br>".$conn->Error;
	}
	$conn->close();
}
else
{
	echo "upload thất bại";
}

?>