<?php
session_start();
include_once "headerbefore.php";
?>




<div class="login">
		<div class="container">
			<h2>Forget Password Form - Check Email</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
					<input type="email" name="txtemail" placeholder="Email" required=" " >
					 
					 
              

                    <input type="submit" value="Check Email" name="btncheck">

					<?php
 

					if(isset($_POST["btncheck"]))
					{
							include_once "Customer.php";
							$cust=new Customer();
							 
							$cust->setemail($_POST["txtemail"]);
						 
							$rs=$cust->GetByEmail();
							if($row=mysqli_fetch_assoc($rs))
							{
                             
                                $no=rand(1111,9999);
                                $link="http://localhost/NTI2021Shopping/UpdatePassword.php?id=".$row["CustomerID"];
                                //Send Email
                                
                            require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                                
                                $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                                $mail->IsSMTP();
                                //$mail->SMTPDebug = 1;
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 465; // or 587
                                $mail->IsHTML(true);
    
                                $mail->Username = "yourmobileapp2017@gmail.com";
                                $mail->Password = "MMMCA@123";
    
                                $mail->setFrom('yourmobileapp2017@gmail.com', 'Nti 2020 Shopping');
                              
                                

                                $mail->addAddress($_POST["txtemail"], "NTI 2020 Shopping");
                                $mail->Subject = 'Forget Password';
                         
                                $mail->Body ="Dear : ".($row["Name"])."\n Your Verfication Code is ".$no."\n Please Clike here To Update Password ".$link;
                                
                                if(!$mail->send()) {
                                  //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
                                else{
                                    $_SESSION["code"]=$no;
                                    echo("<div class='alert alert-success'> Check Your Email </div>");		 
                                } 
							}
							else{
								echo("<br/><div class='alert alert-danger'> Invaild Email , Try Again </div>");
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