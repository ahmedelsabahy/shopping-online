<?php
include_once "Operation.php";
include_once "Database.php";

class Department extends Database implements Operation 
{
    public function Add(){      
    }
    public function Update(){
        
    } 
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("select * from Department");
        
    }
}


?>