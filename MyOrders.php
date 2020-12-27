<?php
ob_start();
session_start();
if (isset($_SESSION["id"])) {
    include_once "headerafter.php";
} else {
    include_once "headerbefore.php";
    //echo("<script> window.open('index.php', '_self')</script>");		 
}
?>

<div clas="container">
    <div class="row">
        <center>
        </br>
            <h1>My Pending Orders </h1>
            </br>
            <table class="table table-border table-striped" style="margin:25px;width:75%">
                <tr>
                    <th>Order No </th>
                    <th>Order Date </th>
                    <th>Order Status </th>
                    <th>Product No </th>
                    <th>Product Name</th>
                    <th>Image </th>
                    <th>Quantity </th>
                    <th>Price </th>
                    <th>Total </th>

                </tr>
                <?php
                include_once "Shoppingcart.php";
                $cart = new Cart();
                $rss = $cart->GetView('Pending');
                while ($row = mysqli_fetch_assoc($rss)) {
                ?>
                    <tr>
                        <td><?php echo ($row["OrderNo"]); ?></td>
                        <td><?php echo ($row["OrderDate"]); ?></td>
                        <td><?php echo ($row["Status"]); ?></td>
                        <td><?php echo ($row["ProductNo"]); ?></td>
                        <td><?php echo ($row["ProductName"]); ?></td>
                        <td> <img src="Products/<?php echo ($row["ProductNo"]); ?>.jpg" /></td>
                        <td><?php echo ($row["qty"]); ?></td>
                        <td><?php echo ($row["Price"]); ?></td>
                        <td><?php echo ($row["total"]); ?></td>
                    </tr>
                <?php  } ?>
            </table>

      
    </div>


    <div class="row">
        <center>
        </br>
            <h1>My Finished Orders </h1>
            </br>
            <table class="table table-border table-striped" style="margin:25px;width:75%">
                <tr>
                    <th>Order No </th>
                    <th>Order Date </th>
                    <th>Order Status </th>
                    <th>Product No </th>
                    <th>Product Name</th>
                    <th>Image </th>
                    <th>Quantity </th>
                    <th>Price </th>
                    <th>Total </th>

                </tr>
                <?php
                include_once "Shoppingcart.php";
                $cart = new Cart();
                $rss = $cart->GetView('Finished');
                while ($row = mysqli_fetch_assoc($rss)) {
                ?>
                    <tr>
                        <td><?php echo ($row["OrderNo"]); ?></td>
                        <td><?php echo ($row["OrderDate"]); ?></td>
                        <td><?php echo ($row["Status"]); ?></td>
                        <td><?php echo ($row["ProductNo"]); ?></td>
                        <td><?php echo ($row["ProductName"]); ?></td>
                        <td> <img src="Products/<?php echo ($row["ProductNo"]); ?>.jpg" /></td>
                        <td><?php echo ($row["qty"]); ?></td>
                        <td><?php echo ($row["Price"]); ?></td>
                        <td><?php echo ($row["total"]); ?></td>
                    </tr>
  <?php  } ?>
            </table>

      
    </div>



</div>
<?php
include_once "Footer.php";
?>