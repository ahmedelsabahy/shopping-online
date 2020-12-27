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

<!-- //navigation -->
<!-- breadcrumbs -->
<form method="post">
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Singlepage</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
                
            <?php
				include_once "Product.php";
				$pro=new Product();
				$rs1=$pro->GetProductBYID();
				if($row1=mysqli_fetch_assoc($rs1))
				{
			?>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="Products/a<?php  echo($row1["ProductNo"]) ?>.jpg" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php  echo($row1["ProductName"]) ?></h2>
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
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php  echo($row1["details"]) ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4 class="m-sing">Price After Discount : <?php echo($row1["Price"]-($row1["Price"]*$row1["discount"]));?> <br/><br/>Orginal Price <span><?php echo($row1["Price"]) ?></span></h4>
                            <p><br/>
                            <center>
                                <input type="number" placeholder="Quantity" <?php if(!isset($_SESSION["id"])) echo('style="display:none"'); ?> class="form-control" name="txtqty" style="width:25%;height:40px"/>
                                                                    </center>

                              

						</div>
                        
                        <div style="text-align:center">

                            <?php
                            
                                if(isset($_SESSION["id"]))
                                {?>
                            <input type="submit"  value="Add to cart" name="btncart" style="width:45%;height:50px" class="btn btn-primary">
                            <?php } 
                            else { ?> 
                                <input type="submit" value="Add to cart" name="btnlogin" style="width:45%;height:50px" class="btn btn-danger">
                                <?php } ?>



                                <?php
                                    if(isset($_POST["btncart"]))
                                    {
											include_once "Shoppingcart.php";
											$cart = new Cart();
											$cart->setprono($row1['ProductNo']);
											$cart->setproname($row1['ProductName']);
											$cart->setqty($_POST["txtqty"]);
											$p=($row1["Price"]-($row1["Price"]*$row1["discount"]));
											$cart->setprice($p);
											//calculat
											$total =($row1['Price'] - ($row1['Price'] * $row1['discount']))*$_POST["txtqty"];
											$cart->setTotal($total);
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
                        

<?php } ?>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
                                </form>

<?php
include_once "Footer.php";
?>