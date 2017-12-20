<?php include'header.php' ?>
<?php include '../config.php' ?>
    <?php 
        $sqldanhsachsp = "SELECT * FROM sanpham WHERE trangthaisanpham = 1";
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
                        <th style="text-align: center;">Sửa</th>
                        <th style="text-align: center;">Xóa</th>
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
                            <td>
                                <a href="editproduct.php?id=<?= $row["masanpham"] ?>"" ID="btnSuaSPLink" CssClass="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td>
                                <a href="xuly_trangthaisanpham.php?id=<?= $row["masanpham"] ?>" ID="btnXoaSPLink" CssClass="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
    <?php 
            }
        }
    ?>
                    </tbody>
            </table>
        </div>
<?php include'footer.php' ?>