<?php
include_once "headerbefore.php";
?>
  
 
  <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
        <form method="post">
		<div class="container">
            <h2>Register Page</h2>
            <center>

      

         <table class="table table-border table-striped" style="width:80%">
         <tr><td colspan="2">
         <?php
           if(isset($_POST["btnregister"]))
           {

            $reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if(preg_match($reg,$_POST["txtpass"]))
            {
               include_once "Customer.php";
               $cust=new Customer();
               $cust->setname($_POST["txtname"]);
               $cust->setpassword($_POST["txtpass"]);
               $cust->setphone($_POST["txtphone"]);
               $cust->setemail($_POST["txtemail"]);
               $cust->setcountry($_POST["scountry"]);
               $cust->setcity($_POST["txtcity"]);
               $cust->setgender($_POST["rdgender"]);
               $cust->setstreet($_POST["txtaddress"]);

               $ms=$cust->Add();
               if($ms=="ok")
               {
                   echo("<div class='alert alert-success'> Your Account has been created </div>");
               }
               else if(strpos($ms,"Phone"))
               {
                echo("<div class='alert alert-warning'>This Phone Is Used</div>");
               }
               else if(strpos($ms,"Email"))
               {
                echo("<div class='alert alert-warning'>This Email Is Used</div>");
               }
               else{
                   echo("<div class='alert alert-danger'>$ms</div>");
               }
               }
               else
               {echo("<div class='alert alert-warning'>This Password Is Weak , Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>");

               }
           }
       ?>
       </td></tr>
             <tr> <td> Full name </td>
             <td><input type="text" class="form-control" required name="txtname"/></td></tr>
             <tr> <td> Password </td>
             <td><input type="password" class="form-control" required name="txtpass"/></td></tr>
             <tr> <td> Phone </td>
             <td><input type="text" class="form-control" required name="txtphone"/></td></tr>
             <tr> <td> Email </td>
             <td><input type="email" class="form-control" required name="txtemail"/></td></tr>
             <tr> <td> Country </td>
             <td> 
             <select mbsc-dropdown data-input-style="box" id="demo-country-filter-desktop" name="scountry"></select>
             </td></tr>
             <tr> <td> City </td>
             <td><input type="text" class="form-control" required name="txtcity"/></td></tr>
             <tr> <td> Gender </td>
             <td><input type="radio"   required name="rdgender" value="Male" style="margin:10px"/>Male 
             <input type="radio"  required name="rdgender" value="Female" style="margin:10px"/>Female
            </td></tr>
            <tr> <td> Address </td>
             <td><input type="text" class="form-control" required name="txtaddress"/></td></tr>
             <tr> <td> <input type="checkbox" required name="checkaggree"/> </td>
             <td> I Agree your terms & Condaitions</td></tr>
             <tr> 
             <td colspan="2" style="text-align:center"><input type="submit" class="btn btn-success" style="width:35%" required name="btnregister" /></td></tr>
</table>

</center>
</div>
</div> 


<script>

    mobiscroll.settings = {
        lang: 'en',                      // Specify language like: lang: 'pl' or omit setting to use default
        theme: 'ios',                    // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light'            // More info about themeVariant: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-themeVariant
    };
    
    var remoteData = {
        url: 'https://trial.mobiscroll.com/content/countries.json',
        type: 'json'
    };
    
    mobiscroll.select('#demo-country-filter', {
        display: 'bubble',               // Specify display mode like: display: 'bottom' or omit setting to use default
        data: remoteData,                // More info about data: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-data
        filter: true,                    // More info about filter: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-filter
        group: {                         // More info about group: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-group
            groupWheel: false,
            header: false
        },
        width: 400,                      // More info about width: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-width
        placeholder: 'Please Select...'  // More info about placeholder: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-placeholder
    });
    
    mobiscroll.select('#demo-country-group', {
        display: 'bubble',               // Specify display mode like: display: 'bottom' or omit setting to use default
        data: remoteData,                // More info about data: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-data
        group: true,                     // More info about group: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-group
        width: [40, 240],                // More info about width: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-width
        placeholder: 'Please Select...'  // More info about placeholder: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-placeholder
    });
    
    mobiscroll.select('#demo-country-filter-desktop', {
        display: 'bubble',               // Specify display mode like: display: 'bottom' or omit setting to use default
        touchUi: false,                  // More info about touchUi: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-touchUi
        data: remoteData,                // More info about data: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-data
        filter: true,                    // More info about filter: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-filter
        group: {                         // More info about group: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-group
            groupWheel: false,
            header: false
        },
        width: 400,                      // More info about width: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-width
        placeholder: 'Please Select...'  // More info about placeholder: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-placeholder
    });
    
    mobiscroll.select('#demo-country-group-desktop', {
        display: 'bubble',               // Specify display mode like: display: 'bottom' or omit setting to use default
        touchUi: false,                  // More info about touchUi: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-touchUi
        data: remoteData,                // More info about data: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-data
        group: true,                     // More info about group: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-group
        placeholder: 'Please Select...'  // More info about placeholder: https://docs.mobiscroll.com/4-10-7/javascript/select#opt-placeholder
    });
</script>
<?php
include_once "Footer.php";
?>