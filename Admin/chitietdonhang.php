<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết hóa đơn</title>
</head>
<body>
	<?php include'header.php' ?>
<?php include '../config.php' ?>
    <?php 
    $mahoadon = $_GET["mahoadon"];
        $sqldanhsachsp = "SELECT * FROM sanpham,hoadon,chitiethoadon WHERE hoadon.MaHoaDon = chitiethoadon.MaHoaDon AND sanpham.masanpham = chitiethoadon.MaHoaDon  AND hoadon.MaHoaDon = '$mahoadon'";
        $ketquadanhsachsp = $conn->query($sqldanhsachsp);
    ?>
<div class="container-fluid">
            <h2>Danh sách sản phẩm</h2>

            <table class="table table-bordered table-hover danhsachsanpham" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Tên sản phẩm</th>
                        <th style="text-align: center;">Số lượng</th>
                        <th style="text-align: center;">Đơn giá</th>
                    </tr>
                </thead>
            <tbody>
    <?php 
        if($ketquadanhsachsp->num_rows > 0){
            while($row = $ketquadanhsachsp->fetch_assoc()){
    ?>                    
                        <tr>
                            <td>
                                <a href="#" ID="lbtnProduct" Style="text-decoration:none"><?= $row["tensanpham"] ?></a>
                            </td>
                            <td><?= $row["soluong"] ?></td>
                            <td><?= number_format($row["dongia"]) ?>VNĐ</td>
                        </tr>
    <?php 
            }
        }
    ?>
                    </tbody>
            </table>
        </div>
<?php include'footer.php' ?>
</body>
</html>