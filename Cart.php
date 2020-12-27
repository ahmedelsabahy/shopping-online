
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
<!-- //navigation -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span><?php

include_once "Shoppingcart.php";
$cart = new Cart();
$rss=$cart->GetCount();
if($ro=mysqli_fetch_assoc($rss))
        echo($ro["count"]);


?> Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
							<th>Remove</th>
						</tr>
                    </thead>
                      <?php
                           	include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rs=$cart->GetAll();
                            $x=1;
                            while($row=mysqli_fetch_assoc($rs))
                            {
                               
                      ?>  


					<tr class="rem1">
						<td class="invert"><?php echo($x); ?></td>
						<td class="invert-image"><a href="single.html"><img src="Products/<?php echo($row["prono"]); ?>.jpg" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<input type="submit" name="btnmin<?php echo($row["prono"]); ?>" class="entry value-minus" value="-"/>
									<div class="entry value"><span><?php echo($row["qty"]); ?></span></div>
                                    <input type="submit" name="btnplus<?php echo($row["prono"]); ?>" class="value-plus active" value="+"/>
                                    <?php
                                        if(isset($_POST["btnmin".$row["prono"]]))
                                        {
                                            include_once "Shoppingcart.php";
                                            $cart = new Cart();
                                            $rss=$cart->UpdateQTYM($row["prono"]);
                                            echo("<script> window.open('cart.php', '_self')</script>");	
                                        }
                                        if(isset($_POST["btnplus".$row["prono"]]))
                                        {
                                            include_once "Shoppingcart.php";
                                            $cart = new Cart();
                                            $rss=$cart->UpdateQTYP($row["prono"]);
                                            echo("<script> window.open('cart.php', '_self')</script>");	
                                        }
                                    ?>


								</div>
							</div>
						</td>
						<td class="invert"><?php echo($row["proname"]); ?>	<?php

							include_once "Shoppingcart.php";
							$cart = new Cart();
							$rss=$cart->GetCount();
							if($ro=mysqli_fetch_assoc($rss))
									echo($ro["count"]);
						
						
						?></td>
						
                        <td class="invert"><?php echo($row["price"]); ?></td>
                        <td class="invert"><?php echo($row["Total"]); ?></td>
						<td class="invert">
							<div class="rem">
                              
                                <input type="submit" class="close1" name="delete<?php echo($row["prono"]); ?>"/>
                            </div>
                            <?php
                                    if(isset($_POST["delete".$row["prono"]]))
                                    {
                                        include_once "Shoppingcart.php";
                                        $cart = new Cart();
                                        $rss=$cart->DeleteCart($row["prono"]);
                                        echo("<script> window.open('cart.php', '_self')</script>");	

                                    }
                            ?>
							 
						   </script>
						</td>
					</tr>
					 <?php  $x++; } ?>
				 
							 
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
					 
					
                        <li>Total <i></i> 
                         
                        <span>
                        <?php
                            include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rss=$cart->GetSum();
                            if($ro=mysqli_fetch_assoc($rss))
                                    echo($ro["total"]." LE");
                        ?>
                        </span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					 
                        
                <input type="submit" class="btn btn-warning" style="width:100%;height:50px" name="btnconfirm" value="Continue Shopping"/>
               <?php
               if(isset($_POST["btnconfirm"]))
               {
                include_once "Database.php";
                $db=new Database();
                $msg=$db->RunDML("insert into orders values(Default,Default,'Pending','".$_SESSION["id"]."','0')");
                if($msg=="ok")
                {
                    $mx=$db->GetData("select max(orderno) as  max from orders where customerid='".$_SESSION["id"]."'");
                    if($rowmax=mysqli_fetch_assoc($mx))
                    {
                        $max=$rowmax["max"];

                    include_once "Shoppingcart.php";
                    $cart = new Cart();
                    $rss=$cart->GetAll();
                    while($ro=mysqli_fetch_assoc($rss))
                    {
                         $ms= $db->RunDML("insert into sales values(Default,'".$ro["prono"]."','".$max."','".$ro["qty"]."','".$ro["price"]."','".$ro["Total"]."')");
                          
                    }
                   
                        $db->RunDML("Delete from OrderTemp where userid='".$_SESSION["id"]."'");
                       
                        echo("<script> window.open('cartMSG.php?orderno=$max', '_self')</script>");	
                }
                }
               }
                    ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
<!-- //footer -->

            </form>
<?php
include_once "footer.php";
?>