<!DOCTYPE html>
<html lang="en">
	<?php include 'stylepage.php' ?>
	<?php include 'config.php' ?>
	<?php 

		$record_per_page = 2; // Số dòng trên 1 trang
		$current_page = 1; // Trang hiện tại
		if(isset($_REQUEST['p'])){
			$current_page = $_REQUEST['p'];
		}
		// Lấy tổng số dòng
		$sql = "SELECT * FROM sanpham WHERE trangthaisanpham = 1";
		$result = $conn->query($sql);
		$total_record = $result->num_rows;
		$num_pages = $total_record / $record_per_page; // Tổng số trang
		if($total_record % $record_per_page > 0){
			$num_pages++;
		}
		//================================================
		// Lấy các dòng dữ liệu của trang hiện tại
		$offset = ($current_page-1)*$record_per_page;
		$sql1 = "SELECT * FROM sanpham WHERE trangthaisanpham = 1 LIMIT $offset, $record_per_page";
		$result = $conn->query($sql1);

		/*$sqldanhsachsp = "SELECT * FROM sanpham WHERE trangthaisanpham = 1";
		$ketquadanhsachsp = $conn->query($sqldanhsachsp);*/ 
	?>

<body>
	<?php include 'navigation.php' ?>

	<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual">
				<!-- Slide Image Area (1000 x 424) -->
				<ul class="slide-group">
					<li><img class="img-responsive" src="images/ba1.jpg" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="images/ba2.jpg" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="images/ba3.jpg" alt="Dummy Image" /></li>
				</ul>

				<!-- Slide Description Image Area (316 x 328) -->
				<div class="script-wrap">
					<ul class="script-group">
						<li><div class="inner-script"><img class="img-responsive" src="images/baa1.jpg" alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="images/baa2.jpg" alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="images/baa3.jpg" alt="Dummy Image" /></div></li>
					</ul>
					<div class="slide-controller">
						<a href="#" class="btn-prev"><img src="images/btn_prev.png" alt="Prev Slide" /></a>
						<a href="#" class="btn-play"><img src="images/btn_play.png" alt="Start Slide" /></a>
						<a href="#" class="btn-pause"><img src="images/btn_pause.png" alt="Pause Slide" /></a>
						<a href="#" class="btn-next"><img src="images/btn_next.png" alt="Next Slide" /></a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<script type="text/javascript" src="js/pignose.layerslider.js"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
	
	<div class="product-easy">
	<div class="container">
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">		  	 
				<div class="resp-tabs-container">
					<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Latest Designs</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">	
						<?php 
						
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
						?>
						<div class="col-md-3 product-men yes-marg">		
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
										<span class="item_price"><?= number_format($row["dongia"]) ?> VNĐ</span>
									</div>
									<a href="checkout.php?id=<?= $row["masanpham"] ?>" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						
						<?php

								}
							}
							$conn->close();
						?>

					</div>	
				</div>	
			</div>
		</div>
	</div>
	</div>
	<center><?php 
	for($i=1; $i<=$num_pages; $i++){
								if($i == $current_page){
									echo $i;
								} else {
									?>
									<a href="index.php?p=<?=$i?>"><?=$i?></a>
									<?php
								}
							}
?></center>
	</div>

</div>

<?php include 'footer.php' ?>
</body>
</html>