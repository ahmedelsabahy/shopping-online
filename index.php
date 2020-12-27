<?php
 ob_start();
 session_start();
if(isset($_SESSION["id"]))
{
	include_once "headerafter.php";
}
else{
	include_once "headerbefore.php";
	//echo("<script> window.open('index.php', '_self')</script>");		 
}
?>


	<!-- main-slider -->
		<ul id="demo1">

		<?php
				include_once "Ads.php";
				$ad=new Ads();
				$rs=$ad->GetAll();
				while($ros=mysqli_fetch_assoc($rs))
				{
		?>
			<li>
				<img src="Ads/<?php echo($ros["AdsNo"]); ?>.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3><?php echo($ros["Title"]); ?></h3>
					<br/>
					<a href="<?php echo($ros["Link"]); ?>" style="width:20%;padding:15px" target="_blank" class="btn btn-primary">Visite Us </a>
				</div>
			</li>
			 <?php } ?>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->


	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Department</h3>
				<div class="agile_top_brands_grids">

						<?php
							include_once "Department.php";
							$dept=new Department();
							$rs=$dept->GetAll();
							while($row=mysqli_fetch_assoc($rs))
							{
						?>

					<div class="col-md-3 top_brand_left-1" style="margin-top:30px">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								 
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="ProductDepart.php?dno=<?php echo($row["department_no"]);  ?>"><img title=" " alt=" " src="Department/<?php echo($row["department_no"]); ?>.jpg"></a>		
												<p><h4> <?php echo($row["DepartmentName"]); ?> </h4></p>
												 
												
											</div>
											 
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
				 <?php  } ?>
						<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top selling offers</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Latest Products</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Product Discount</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							 
								<?php
									include_once "Product.php";
									$pro=new Product();
									$rs=$pro->GetLast();
									while($row=mysqli_fetch_assoc($rs))
									{

								?>

								<div class="col-md-4 top_brand_left" style="margin-top:30px">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="ProductDetails.php?prono=<?php echo($row["ProductNo"]) ?>"><img title=" " alt=" " src="Products/<?php echo($row["ProductNo"]) ?>.jpg" /></a>		
															<p> <?php echo($row["ProductName"]) ?></p>
															<div class="stars">
															<?php
																	for($x=1;$x<=$row["ratevalue"];$x++)
																	{
															?>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																 <?php } ?>
															
																<?php
																	for($x=1;$x<=(5-$row["ratevalue"]);$x++)
																	{
															?>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
																<?php } ?>
															</div>
															<h4><?php echo($row["Price"]-($row["Price"]*$row["discount"]));?> <span><?php echo($row["Price"]) ?></span></h4>
														</div>
														<br/>
													 <form method="post">
														<div style="text-align:center">


<?php

if (isset($_SESSION["id"])) { ?>
	<input type="submit" value="Add to cart" name="btncart<?php echo($row['ProductNo']); ?>" class="btn btn-primary">
<?php } else { ?>
	<input type="submit" value="Add to cart" name="btnlogin" class="btn btn-danger">
<?php } ?>

<?php
if (isset($_POST["btncart".$row['ProductNo']])) {
	include_once "Shoppingcart.php";
	$cart = new Cart();
	$cart->setprono($row['ProductNo']);
	$cart->setproname($row['ProductName']);
	$cart->setqty(1.0);
	$discount = $row['Price'] - ($row['Price'] * $row['discount']);
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
</form>




													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
							 
							 <?php } ?>

								<div class="clearfix"> </div>
							 
							 
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							
							 
						<?php
									include_once "Product.php";
									$pro=new Product();
									$rs=$pro->GetDiscount();
									while($row=mysqli_fetch_assoc($rs))
									{

								?>

								<div class="col-md-4 top_brand_left" style="margin-top:30px">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="ProductDetails.php?prono=<?php echo($row["ProductNo"]) ?>"><img title=" " alt=" " src="Products/<?php echo($row["ProductNo"]) ?>.jpg" /></a>		
															<p> <?php echo($row["ProductName"]) ?></p>
															<div class="stars">
															<?php
																	for($x=1;$x<=$row["ratevalue"];$x++)
																	{
															?>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																 <?php } ?>
															
																<?php
																	for($x=1;$x<=(5-$row["ratevalue"]);$x++)
																	{
															?>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
																<?php } ?>
															</div>
															<h4><?php echo($row["Price"]-($row["Price"]*$row["discount"]));?> <span><?php echo($row["Price"]) ?></span></h4>
														</div>
													 <br/>
													 <form method="post">
														<div style="text-align:center">


<?php

if (isset($_SESSION["id"])) { ?>
	<input type="submit" value="Add to cart" name="btncart<?php echo($row['ProductNo']); ?>" class="btn btn-primary">
<?php } else { ?>
	<input type="submit" value="Add to cart" name="btnlogin" class="btn btn-danger">
<?php } ?>

<?php
if (isset($_POST["btncart".$row['ProductNo']])) {
	include_once "Shoppingcart.php";
	$cart = new Cart();
	$cart->setprono($row['ProductNo']);
	$cart->setproname($row['ProductName']);
	$cart->setqty(1.0);
	$discount = $row['Price'] - ($row['Price'] * $row['discount']);
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
</form>


													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
							 
							 <?php } ?>
								<div class="clearfix"> </div>
							 
							 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.html"> <img class="first-slide" src="images/b1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="personalcare.html"> <img class="second-slide " src="images/b3.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="household.html"><img class="third-slide " src="images/b1.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="images/p2.jpg" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="images/p3.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="images/p4.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="images/111.jpg" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
<!--banner-bottom-->
<!--brands-->
	<div class="brands">
		<div class="container">
		<h3>Brand Store</h3>
			<div class="brands-agile">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="brands-agile-1">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="brands-agile-2">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Lorem</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>	
<!--//brands-->
<!-- new -->
	
<!-- //new -->
<!-- //footer -->
<?php
include_once "footer.php";
?>