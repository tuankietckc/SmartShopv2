<!DOCTYPE html>
<html lang="en">
    <?php include 'stylepage.php' ?>
    <?php include 'config.php' ?>
    <body>
        <?php include 'navigation.php' ?>
        
        <div class="containerdathang">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    
                    <form method="POST" action="xuly_hoadon.php">
                    <div class="form-group">
                        <label>Tên tài khoản:</label>
                        <input type="text" name="txttentaikhoan" class="form-control" value="<?= $_SESSION["TaiKhoan"] ?>" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" name="txtdiachi" class="form-control" value=''  />
                    </div>
                    <div class="form-group">
                        <label for="diachi">SDT</label>
                        <input type="text" name="txtsdt" class="form-control" value=''  />
                    </div>
                    <div class="col-md-3"></div>
                    <input type="submit" name="dongy" value="đồng ý" class="btn btn-success">
                    </form>
                    
            </div>
        </div>
    </div>
    </body>
</html>