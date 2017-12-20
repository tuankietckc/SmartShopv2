<?php include 'header.php' ?>
<?php 
include '../config.php';
$masp = $_GET["id"];
$sql = "Select * from sanpham where masanpham = $masp";
$kq = $conn->query($sql);
if($kq->num_rows > 0)
{
$BangSP = $kq->fetch_assoc();  
$maloaisp = $BangSP["loaisanpham"];
$manhacc = $BangSP["Mancc"];
 ?>
<form action="xuLy_chinhsua.php" method="POST" enctype="multipart/form-data" role="form">
   <div class="themsanpham">
        <!--Tên sản phẩm-->
        <div class="row">

            <div class="col-md-2">
                <p class="psanpham" for="tensp">Tên sản phẩm</p>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" name="txttensp" value="<?= $BangSP["tensanpham"] ?>">
                </div>
            </div>
            <div class="col-md-2">
            <input type="hidden" name="txtmasp" value="<?= $masp ?>">
             </div>
        </div>
        <!--Mô tả sản phẩm-->
        <div class="row">
            <div class="col-md-2">
                <p class="psanpham">Mô tả sản phẩm</p>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" name="txtmota" value="<?= $BangSP["mota"] ?>">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!--Hình đại diện-->
        <div class="row">
            <div class="col-md-2">
                <p class="psanpham">Hình đại diện</p>
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <input type="file" class="form-control" name="fileanhdaidien" dir="<?= $BangSP["hinhanh"] ?>" >
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Số lượng -->
        <div class="row">   
            <div class="col-md-2">
                <p class="psanpham">Số lượng</p>
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <input type="text" class="form-control" name="txtsoluong" value="<?= $BangSP["soluong"] ?>">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!--Đơn giá-->
        <div class="row">

            <div class="col-md-2">
                <p class="psanpham">Đơn giá</p>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" name="txtdongia" value="<?= $BangSP["dongia"] ?>">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!--Loại sản phẩm-->
        <div class="row">
            <div class="col-md-2">
                <p class="psanpham">Loại sản phẩm</p>
            </div>

            <div class="col-md-8">
                  <select class="form-control" id="LoaiSP" name="LoaiSP" style="width: 30%">
 <?php
    $sql_layLoaiSP = "Select * from LoaiSanPham";
    $LSP = $conn->query($sql_layLoaiSP);
    if($LSP->num_rows > 0)
    {
        while($BangLoaiSP = $LSP->fetch_assoc())
        {
    ?>
                    <option selected="<?= $maloaisp ?>" value="<?= $BangLoaiSP["MaLoaiSanPham"] ?>"><?= $BangLoaiSP["TenLoaisanpham"] ?></option>
<?php 
        }
    }
?>
                  </select>
                 
            </div>
        </div>
        <!--Nhà cung cấp-->
         <div class="row">
            <div class="col-md-2">
                <p class="psanpham">Nhà cung cấp</p>
            </div>

            <div class="col-md-8">
                  <select class="form-control" id="NhaCC" name="NhaCC" style="width: 30%">
 <?php
 include '../config.php';
    $sql_layNhaCC = "Select * from nhacungcap";
    $NCC = $conn->query($sql_layNhaCC);
    if($NCC->num_rows > 0)
    {
        while($BangNhaCC = $NCC->fetch_assoc())
        {
    ?>
                    <option selected="<?= $manhacc ?>" value="<?= $BangNhaCC["mancc"] ?>"><?= $BangNhaCC["tenncc"] ?></option>
<?php 
        }
    }
}
?>
                  </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <!--href="../index.php" về trang chủ-->
                 <!--<a href="xuLy-upload.php" class="btn btn-info" role="submit">Thêm sản phẩm</a>-->
                 <input type="submit" class="btn btn-info" value="Lưu sản phẩm">
            </div>
        </div>
    </div> 
</form>

<?php include 'footer.php' ?>