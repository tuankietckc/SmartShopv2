
<!DOCTYPE html>
<html lang="en">
<?php include 'stylepage.php' ?>
<body>
	<?php 
		include 'navigation.php'; 
	?>
	<?php include 'config.php' ?>
	<?php
		$giohang = array();
		if(isset($_SESSION["giohang"])){
			$giohang = $_SESSION["giohang"];
		} 

		if(isset($_GET["id"])){// thêm SP vào giỏ
			$id = $_GET["id"];

			for($i = 0; $i < count($giohang); $i++){
				if($giohang[$i]["masanpham"] == $id){
					$giohang[$i]["soluong"]++; // Tăng lên 
					break;
				}
			}
			
			if($i == count($giohang)){
				// Sản phẩm chưa có trong giỏ hàng

				$sqlsanpham = "SELECT * FROM sanpham Where masanpham = $id";
				$ketquasanpham = $conn->query($sqlsanpham);
				if($ketquasanpham->num_rows > 0){
					$sanpham = $ketquasanpham->fetch_assoc();
					$sanpham["soluong"] = 1; // Mới thêm vào thì so lượng = 1
					// Thêm vào giỏ hàng
					$giohang[] = $sanpham;
					$_SESSION["giohang"] = $giohang;
				}
			}
			// Cập nhật giỏ vào session
		 	$_SESSION["giohang"] = $giohang;
		}

		// Xóa sp khỏi giỏ hàng
		if(isset($_GET["xoa"]) && isset($_GET["id"])){
			$id = $_GET["id"];
			// Kiem tra sp có trong giỏ chưa
			for($i = 0; $i < count($giohang); $i++){
				if($giohang[$i]["masanpham"] == $id){
					array_splice($giohang, $i, 1); // hàm xóa phần tử của mảng tại vị trí $i, 1 là số lượng phần tử cẩn xóa
					$_SESSION["giohang"] = $giohang;
				}
			}
		}
	?>
	
	<?php 
	if(isset($_POST["capnhat"]) && isset($_POST["id"])){
		$id = $_POST["id"];
		$soluong = $_POST["soluong"];
		for($i = 0 ; $i < count($giohang); $i++){
				$giohang[$i]["soluong"] = $soluong[$i];
			}
		$_SESSION["giohang"] = $giohang;
	}
	
	?>

	<div class="page-head">
		<div class="container">
			<h3>Check Out </h3>
		</div>
	</div>
	<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<form method="POST" action="#">
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
				</thead>
					<tbody>
						<?php foreach ($giohang as $key) {
						?>
						
						<tr class="rem1">
							<td class="invert-closeb">
								<div class="rem">
									<a href="checkout.php?xoa=1&id=<?= $key["masanpham"] ?>"> Xóa</a>
								</div>
							</td>
							<td class="invert-image"><a href="single.html"><img src="<?= substr($key["hinhanh"],1) ?>" alt="" class="img-responsive"></a></td>
							<td class="invert">
								 <div class="quantity"> 
									<div class="quantity-select">
									<input type="hidden" name="id[]" value="<?= $key["masanpham"] ?>">                           
										<input type="number" name="soluong[]" value="<?= $key["soluong"] ?>">
									</div>
								</div>
							</td>
							<td class="invert"><?= $key["tensanpham"] ?></td>
							<td class="invert"><?= number_format($key["soluong"] * $key["dongia"])	 ?> VNĐ</td>
						</tr>

						<?php } ?>
			</tbody></table>
			<center>
				<?php
				$tong = 0;
				if(isset($_SESSION["giohang"])){
					foreach ($giohang as $key ) {
					 	$tong += $key["soluong"] * $key["dongia"];
					}
				}
				?>
				<h2>Tổng tiền <?= number_format($tong) ?> VNĐ</h2>
			</center>
			<center>
				<?php 
				$order = "";
				if(empty($_SESSION["giohang"]))
					$order = "checkout.php";
				else
					$order = "order";
				
				?>
				<input type="submit" name="capnhat" value="cập nhật giỏ hàng" class="btn btn-success">
				<a href="<?= $order ?>" class="btn btn-success">Thanh toán</a>
			</center>
		</div>
		</form>	
	</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>