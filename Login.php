<?php

session_start();
 
	include_once "headerbefore.php";
	
?>


<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
					<input type="text" name="txtuser" placeholder="Username" required=" " >
					<input type="password" name="txtpass" placeholder="Password" required=" " >
					<div class="forgot">
						<a href="checkemail.php">Forgot Password?</a>
                    </div>
                    <div style="text-align:center">
                    <input type="checkbox" value="1" name="chkrem"/> Login Me
</div>

                    <input type="submit" value="Login" name="btnlogin">

					<?php

						if(isset($_COOKIE['usercookie'])){				
							echo("<script> window.open('index.php', '_self')</script>");		 
						}

					if(isset($_POST["btnlogin"]))
					{
							include_once "Customer.php";
							$cust=new Customer();
							$cust->setphone($_POST["txtuser"]);
							$cust->setemail($_POST["txtuser"]);
							$cust->setpassword($_POST["txtpass"]);
							$rs=$cust->Login();
							if($row=mysqli_fetch_assoc($rs))
							{
								$_SESSION["id"]=$row["CustomerID"];
								$_SESSION["cname"]=$row["Name"];
								if(isset($_POST["chkrem"]))
								{
									setcookie("usercookie",$_POST["txtuser"],time()+60*60*24*365);
								}
								echo("<script> window.open('index.php', '_self')</script>");	
							}
							else{
								echo("<br/><div class='alert alert-danger'> Invaild Data login </div>");
							}
					}
					?>
                    
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="register.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>

<?php
include_once "footer.php";
?>