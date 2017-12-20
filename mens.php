<!DOCTYPE html>
<html lang="en">
<?php include 'stylepost.php' ?>
<body>
	<?php include 'navigation.php' ?>
	<?php 
		include 'config.php';
		$id = $_GET["loai"];
		$sqllaydanhsachsp="";
		if($id == 1){
			$sqllaydanhsachsp = "SELECT * FROM sanpham WHERE loaisanpham = 'Loai1'";
		}
		else{
			$sqllaydanhsachsp = "SELECT * FROM sanpham WHERE loaisanpham = 'Loai2'";
		}
		$ketquadanhsach = $conn->query($sqllaydanhsachsp);
		
	?>
	<div class="page-head">
	<div class="container">
		<h3>Men's Wear</h3>
	</div>
	</div>
	<!--Product Womens-->
	<div class="container">
		<div class="single-pro">
		<?php 
		if($ketquadanhsach->num_rows > 0){
			while($row = $ketquadanhsach->fetch_assoc()){ ?>
				<div class="col-md-3 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="<?= substr($row["hinhanh"],1) ?>" alt="" class="pro-image-front">
							<img src="<?= substr($row["hinhanh"],1) ?>" alt="" class="pro-image-back">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="post.php?id=<?= $row["masanpham"] ?>" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>				
						</div>
						<div class="item-info-product ">
							<h4><a href="post.php?id=<?= $row["masanpham"] ?>"><?= $row["tensanpham"] ?></a></h4>
							<div class="info-product-price">
								<span class="item_price"><?= $row["dongia"] ?></span>
								
							</div>
							<a href="checkout.php?id=<?= $row["masanpham"] ?>" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				<?php }}?>
		</div>
		<!--PageNavigation-->
		
	</div>
	<?php include 'footer.php' ?>
</body>
</html>