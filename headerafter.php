<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 -->
<!DOCTYPE html>
<html>
<head>
<title>May For Construction</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers" style="width:30%">
				<p>May For Constructions . <a href="allproducts.php">SHOP NOW</a></p>
			</div>
			<div class="product_list_header" >  
					<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<a href="cart.php" class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
						<span class="badge badge-warning">
						<?php

							include_once "Shoppingcart.php";
							$cart = new Cart();
							$rss=$cart->GetCount();
							if($ro=mysqli_fetch_assoc($rss))
									echo($ro["count"]);
						
						
						?>
						</span>
					</form>  
			</div>
			<div class="agile-login right" style="width:40%">
				<ul>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="contact.html">Help</a></li>
					<li><a href="MyProfile.php"> Welcome : <?php echo($_SESSION["cname"]); ?></a></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
	
		<div class="container">
			<div class="w3ls_logo_products_left " style="width:70%">
			<table><tr><td>
			<img src="logo2.png"/>	</td><td>
			<h1 style="margin-left:35px"><a href="index.php">May For Construction</a></h1>	</td></tr></table>			
			</div>

			<div class="w3l_search">
			<form  method="post"  style="margin-top:35px">
				<input type="search" name="Search" placeholder="Search for a Product..." >
				<button type="submit" name="btnsearch" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<?php
					if(isset($_POST["Search"]))
					{
						$search=$_POST["Search"];
						echo("<script> window.open('AllProducts.php?se=$search', '_self')</script>");	
					}
				?>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
    </div>
    <!-- //header -->
<!-- navigation -->
 
<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Department<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Department</h6>
															<?php
																include_once "Department.php";
																$dept=new Department();
																$rs=$dept->GetAll();
																while($row=mysqli_fetch_assoc($rs))
																{
															?>

														<li><a href="ProductDepart.php?dno=<?php echo($row["department_no"]);  ?>"><?php echo($row["DepartmentName"]);  ?></a></li>
														 <?php  } ?>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									 
									<li><a href="AllProducts.php">Products</a></li>
									 
								 
                                    <li><a href="MyOrders.php">My Orders</a></li>
                                    <li><a href="offers.html">My Favourite</a></li>
                                    <li><a href="offers.html">Offers</a></li>
                                    <li><a href="logout.php">Logout</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->