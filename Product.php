<?php
include_once "Operation.php";
include_once "Database.php";

class Product extends Database implements Operation 
{
    public function Add(){      
    }
    public function Update(){
        
    } 
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("select * from products");
    }
    
    public function Filter(){
        return parent::GetData("select * from products where ProductName like '".$_GET["se"]."%'");
    }
    public function GetProductDepart($dno){
        return parent::GetData("select * from products where departmento='".$dno."'");
    }

    public function GetProductBYID(){
        return parent::GetData("select * from products where ProductNo ='".$_GET["prono"]."'");
    }

    public function GetLast(){
        return parent::GetData("select * from products order by ProductNo desc limit 6");
    }

    public function GetDiscount(){
        return parent::GetData("select * from products where discount > 0");
    }

}


?>