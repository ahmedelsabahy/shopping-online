<?php
 ob_start();
 session_start();
if(isset($_SESSION["id"]))
{
	include_once "headerafter.php";
}
else{
	echo("<script> window.open('login.php', '_self')</script>");		 
}
?>
<div clas="container">
<div class="row">
    <center>
        <h1>Profile Page </h1>
    <table class="table table-border table-striped" style="margin:25px;width:75%" >
    <?php
        include_once "Customer.php";
        $cust=new Customer();
        $rs=$cust->GetByID();
        if($row=mysqli_fetch_assoc($rs))
		{
    ?>
 <tr><td colspan="2"  style="text-align:center">
  <img src="Customer/<?php echo($_SESSION["id"]) ?>.jpg" width="200px" height="200px"/> </td> </tr>


 <tr><td>Full Name </td><td> <?php echo($row["Name"]); ?> </td></tr>
 <tr><td>Phone </td><td> <?php echo($row["Phone"]); ?>  </td></tr>
 <tr><td>Email </td><td> <?php echo($row["Email"]); ?>  </td></tr>
 <tr><td>Country </td><td> <?php echo($row["Country"]); ?>  </td></tr>
 <tr><td>City </td><td><?php echo($row["City"]); ?>   </td></tr>
 <tr><td>Gender </td><td> <?php echo($row["Gender"]); ?>  </td></tr>
 <tr><td>Address </td><td> <?php echo($row["Street"]); ?>  </td></tr>
 
 <tr><td colspan="2" style="text-align:center"> <a href="updateprofile.php" class="btn btn-warning" >Update My Profile</a>  </td></tr>
 <tr><td colspan="2" style="text-align:center"> <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" >Delete My Account</a>  </td></tr>

        <?php  } ?>

</table>
</center>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Unsubscribe User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						 
						<div class="form-group alert alert-danger">
						Are you sure delete your accoount ? 
							
						</div>
						<div class="right-w3l">
							<input type="submit" style="width:200px" class="btn btn-danger" value="Yes" name="btnyes">
							<a href="MyProfile.php" style="width:200px;height:45px"  class="btn btn-success">
							No </a>
						</div>
						 

						<?php
					 
						 
								if(isset($_POST["btnyes"]))
								{
							
									include_once "Customer.php";
									$cust=new Customer();
									 $msg=$cust->Delete();
									 if($msg=="ok")
										{
											$dir="customer/";
											$img=$_SESSION['id'];
											$fdir= $dir.$img.".jpg";
											unlink($fdir);
										   echo("<script> window.open('logout.php', '_self')</script>");		 
										}
										else
										   echo("<div class='alert alert-danger'> ".$msg."</div>");		
								}

							?>
					</form>
				</div>
			</div>
		</div>


<?php
include_once "footer.php";

?>