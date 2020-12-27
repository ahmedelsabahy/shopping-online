<?php
ob_start();
session_start();
if (isset($_SESSION["id"])) {
	include_once "headerafter.php";
} else {
	include_once "headerbefore.php";
	//echo("<script> window.open('index.php', '_self')</script>");		 
}
?>
<form method="post">
	<br />
	<center>
		<h1>All Products</h1>
	</center>
	<div class="col-md-12 products-right">


		<?php
		include_once "Product.php";
		$pro = new Product();
		if (isset($_GET["se"]))
			$rs1 = $pro->Filter();
		else
			$rs1 = $pro->GetAll();
		while ($row1 = mysqli_fetch_assoc($rs1)) {
		?>

			<div class="col-md-2 top_brand_left" style="margin-top:35px">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
							<img src="images/offer.png" alt=" " class="img-responsive">
						</div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block">
									<div class="snipcart-thumb">
										<a href="ProductDetails.php?prono=<?php echo ($row1["ProductNo"]) ?>"><img title=" " alt=" " src="Products/<?php echo ($row1["ProductNo"]) ?>.jpg"></a>
										<p> <?php echo ($row1["ProductName"]) ?> </p>
										<h4><?php echo ($row1["Price"] - ($row1["Price"] * $row1["discount"])); ?> <span><?php echo ($row1["Price"]) ?></span></h4>
										<br />
										<div class="stars">
											<?php
											for ($x = 1; $x <= $row1["ratevalue"]; $x++) {
											?>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
											<?php } ?>

											<?php
											for ($x = 1; $x <= (5 - $row1["ratevalue"]); $x++) {
											?>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											<?php } ?>
										</div>
										<div style="text-align:center">

											<?php

											if (isset($_SESSION["id"])) { ?>
												<input type="submit" value="Add to cart" name="btncart<?php echo($row1['ProductNo']); ?>" class="btn btn-primary">
											<?php } else { ?>
												<input type="submit" value="Add to cart" name="btnlogin" class="btn btn-danger">
											<?php } ?>

											<?php
											if (isset($_POST["btncart".$row1['ProductNo']])) {
												include_once "Shoppingcart.php";
												$cart = new Cart();
												$cart->setprono($row1['ProductNo']);
												$cart->setproname($row1['ProductName']);
												$cart->setqty(1.0);
												$discount = $row1['Price'] - ($row1['Price'] * $row1['discount']);
												$cart->setprice($discount);
												//calculat
												
												$cart->setTotal($discount);
												$cart->setUserID($_SESSION['id']);

												$ms=$cart->Add();
												if($ms=="ok")
												echo("<br/><div class='alert alert-success'>Item In Cart</div>");
												else
													echo($ms);
											}
											if (isset($_POST["btnlogin"])) {
												echo ("<script> window.open('login.php', '_self')</script>");
											}
											?>
										</div>
									</div>

								</div>
							</figure>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>


	</div>
	<div class="clearfix"> </div>
	<br />
	</center>
</form>
<?php
include_once "Footer.php";
?>