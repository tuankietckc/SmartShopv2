<?php include 'header.php' ?>
<?php include '../config.php'; ?>
<?php 
    $sqldanhsachtaikhoan = "SELECT * FROM hoadon";
    $ketquadanhsachhoadon = $conn->query($sqldanhsachtaikhoan);
?>
        <h2>Danh sách tài khoản</h2>
       
        <table class="table table-bordered table-hover danhsachsanpham" style="text-align: center;">
            <thead>
                <tr>
                    <th style="text-align: center;">Mã hóa đơn</th>
                    <th style="text-align: center;">Tên tài khoản</th>
                    <th style="text-align: center;">Địa chỉ giao hàng</th>
                    <th style="text-align: center;">Ngày lập hóa đơn</th>
                    <th style="text-align: center;">trạng thái</th>
                    <th style="text-align: center;">Chi tiết</th>
                    <th style="text-align: center;">Xử lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($ketquadanhsachhoadon->num_rows > 0){
                        while($row = $ketquadanhsachhoadon->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $row["MaHoaDon"] ?></td>
                        <td><?= $row["TenTaiKhoan"] ?></td>
                        <td><?= $row["diachigiaohang"] ?></td>
                        <td><?= $row["ngaylap"] ?></td>
                    <?php 
                        $trangthai = "";
                        if($row["trangthai"] == 1)
                            $trangthai = "chưa giao";
                        else
                            $trangthai = "đã giao";
                    ?>    
                        <td><?= $trangthai ?></td>
                    <?php 
                        $urlUpdate = "xuly_trangthaidonhang.php?mahoadon=" .$row["MaHoaDon"]."&trangthai=".$row["trangthai"];
                        $urlDetail = "chitietdonhang.php?mahoadon=" .$row["MaHoaDon"];
                    ?> 
                        <td><a href="<?= $urlDetail ?>" ID="btnSuaSPLink" CssClass="btn btn-success btn-xs"><span class="glyphicon glyphicon-open"></span></a></td>
                        <td><a href="<?= $urlUpdate ?>" ID="btnSuaSPLink" CssClass="btn btn-success btn-xs"><span class="glyphicon glyphicon-check"></span></a></td>
                    </tr>
                <?php
                        }
                    }
                ?>        
            </tbody>
        </table>
<?php include 'footer.php' ?>