
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


<form method="post">
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Department & Products</h2>
					<ul class="cate">
                    <?php
																include_once "Department.php";
																$dept=new Department();
																$rs=$dept->GetAll();
																while($row=mysqli_fetch_assoc($rs))
																{
															?>
                        <li><a href="ProductDepart.php?dno=<?php echo($row["department_no"]);  ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo($row["DepartmentName"]) ?></a></li>
                       
                                                     <?php
																include_once "Product.php";
																$pro=new Product();
																$rs1=$pro->GetProductDepart($row["department_no"]);
																while($row1=mysqli_fetch_assoc($rs1))
																{
															?>
							<ul>
								<li><a href="ProductDetails.php?prono=<?php echo($row1["ProductNo"]) ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo($row1["ProductName"]) ?> </a></li>
								
							</ul>
                        
 <?php } ?>

                            <?php } ?>
							 
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						 
						 
						<div class="clearfix"> </div>
					</div>
				</div>
             
                <?php
																include_once "Product.php";
																$pro=new Product();
																$rs1=$pro->GetProductDepart($_GET["dno"]);
																while($row1=mysqli_fetch_assoc($rs1))
																{
															?>

					<div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="images/offer.png" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="ProductDetails.php?prono=<?php echo($row1["ProductNo"]) ?>"><img title=" " alt=" " src="Products/<?php echo($row1["ProductNo"]) ?>.jpg"></a>		
												<p> <?php echo($row1["ProductName"]) ?> </p>
                                                <h4><?php echo($row1["Price"]-($row1["Price"]*$row1["discount"]));?> <span><?php echo($row1["Price"]) ?></span></h4>
                                                <br/>
                                                <div class="stars">
															<?php
																	for($x=1;$x<=$row1["ratevalue"];$x++)
																	{
															?>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																 <?php } ?>
															
																<?php
																	for($x=1;$x<=(5-$row1["ratevalue"]);$x++)
																	{
															?>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
																<?php } ?>
															</div>
                                                            <div style="text-align:center">

                                                            <?php
                                                              
                                                                if(isset($_SESSION["id"]))
                                                                {?>
                                                            <input type="submit"  value="Add to cart" name="btncart<?php echo($row1['ProductNo']); ?>" class="btn btn-primary">
                                                            <?php } 
                                                            else { ?> 
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
                                                                            if(isset($_POST["btnlogin"]))
                                                                            {
                                                                                echo("<script> window.open('login.php', '_self')</script>");	
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
						<div class="clearfix"> </div>
			 
			 
				<nav class="numbering">
					<ul class="pagination paging">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
    </div>
                                                                    </form>
    <?php
include_once "footer.php";
?>
