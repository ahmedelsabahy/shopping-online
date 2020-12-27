<?php
session_start();
 
include_once "headerbefore.php";
?>




<div class="login">
		<div class="container">
			<h2>Forget Password Form - Update</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">

					<input type="text" name="txtcode" placeholder="Verfication Code" required=""/>
                    <input type="password" name="txtpass" placeholder="New Password" required=""/>
                    <input type="password" name="txtconfirm" placeholder="Confirm New Password" required=""/>
              
                    <input type="submit" value="Update Password" name="btnupdate">
                    <?php
                    if(isset($_POST["btnupdate"]))
                    {
                            include_once "Customer.php";
                            $cust=new Customer();
                            if($_SESSION["code"]==$_POST["txtcode"])
                            {
                              if($_POST["txtpass"]==$_POST["txtconfirm"]){
                                  $cust->setpassword($_POST["txtpass"]);
                                      $ms=$cust->UpdatePW();
                                      echo("<br/><div class='alert alert-success'> Your Password Has been Updated </div>");
                              }
                              else
                              echo("<br/><div class='alert alert-danger'>Confirm must be match password , Try Again </div>");
                            }
                            else
                            echo("<br/><div class='alert alert-danger'> Invaild Code , Try Again </div>");
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