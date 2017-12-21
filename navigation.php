<?php 
	include 'config.php';
	$sql_layLoaiSP1 = "Select * from LoaiSanPham";
    $LSP1 = $conn->query($sql_layLoaiSP1);
?>
<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com"> info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="index.php"><img src="images/logo3.jpg"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form method="GET" action="search.php">
				<div class="search">
					<input type="search" placeholder="Search" required="" name="tensp">
				</div>
				<div class="section_room">
				
					<select id="country" onchange="change_country(this.value)" class="frm-field required" name="loai">
						<?php 
							if($LSP1->num_rows > 0){
						        while($BangLoaiSP = $LSP1->fetch_assoc()){
						?>
						<option value="<?= $BangLoaiSP["MaLoaiSanPham"] ?>"><?= $BangLoaiSP["TenLoaisanpham"] ?></option>     
						<?php
								}
							}
						?>
					</select>

				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				</form>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<li>
				<?php
					
					$login_register = "";
					$tenkh = "";
					if(!isset($_SESSION["TenKhachHang"]) && !isset($_SESSION["TaiKhoan"])){
						$login_register = "login-register.php";
						$tenkh = "";

					}
					else{
						$login_register = "./user/profile.php?taikhoan=".$_SESSION["TaiKhoan"];
						$tenkh = $_SESSION["TenKhachHang"];
					}
					
				?>
					<a href="<?= $login_register ?>" class="use1"></a>
				</li>
				<a href="<?= $login_register ?>" class="use1"><?= $tenkh ?></a>
			</ul>
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item "><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="mens.php?loai=1">Quần áo</a></li>
					<li class=" menu__item"><a class="menu__link" href="mens.php?loai=2">Giày thể thao</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
					<?php
						$checkout = "";
							if(isset($_SESSION["TenKhachHang"]) && isset($_SESSION["TaiKhoan"]))
								$checkout = "checkout.php";
							else
								$checkout = "login-register.php";
						
					?>
						<a href="<?= $checkout ?>">
							<?php 
								$tongtien = 0;
								$soluong = 0;

								if(isset($_SESSION["giohang"]))
								{
									$giohang = array();
									$giohang = $_SESSION["giohang"];
									foreach ($giohang as $key) {
										$tongtien += $key["soluong"] * $key["dongia"];
										$soluong += $key["soluong"];
									}
								}
							?>
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								<span class="simpleCart_total"><?= $tongtien ?></span> <span id="simpleCart_quantity" class="simpleCart_quantity"></span> VNĐ</div>
								
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Trong giỏ có <?= $soluong ?> sản phẩm</a></p>
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>