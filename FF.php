<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Name <input type="text" name="txtname" class="form-control"/>
        Parent ID <select name="suser">
        <?php
                include_once "Customer.php";
                $cust=new Customer();
                $rs=$cust->GetAll();
                while($row=mysqli_fetch_assoc($rs))
                {
        ?>
            <option value="<?php echo($row["CustomerID"]); ?>"> <?php echo($row["Name"]); ?> </option>

            <?php } ?>
        </select>
<input type="submit" name="btn" />
<?php
if(isset($_POST["btn"]))
{
    echo($_POST["suser"]);
}
?>


    </form>
</body>
</html>