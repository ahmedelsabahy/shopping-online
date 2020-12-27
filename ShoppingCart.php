<?php
ob_start();
include_once "Operation.php";
include_once "Database.php";

class Cart  extends Database implements Operation 
{
    var $prono;var	$proname;	var $qty;	var $price; var $Total;	var $UserID;

    public function getprono(){
        return $this->prono;
    }
    public function setprono($value){
          $this->prono=$value;
    }

    public function getproname(){
        return $this->proname;
    }
    public function setproname($value){
          $this->proname=$value;
    }

    public function getqty(){
        return $this->qty;
    }
    public function setqty($value){
          $this->qty=$value;
    }

    public function getprice(){
        return $this->price;
    }
    public function setprice($value){
          $this->price=$value;
    }

    public function getTotal(){
        return $this->Total;
    }
    public function setTotal($value){
          $this->Total=$value;
    }

    public function getUserID(){
        return $this->UserID;
    }
    public function setUserID($value){
          $this->UserID=$value;
    }

    
    public function Add(){ 
        return parent::RunDML("insert into ordertemp values('".$this->getprono()."','".$this->getproname()."','".$this->getqty()."','".$this->getprice()."','".$this->getTotal()."','".$this->getUserID()."')");    
    }
    public function Update(){
        
    } 
    public function Delete()
    {

    } 
    public function DeleteCart($prno){
        return parent::RunDML("delete from OrderTemp where prono='".$prno."' and UserID='".$_SESSION["id"]."'"); 
    }
    public function UpdateQTYP($prno){
        return parent::RunDML("update OrderTemp set qty=qty+1,total=qty*price where prono='".$prno."' and UserID='".$_SESSION["id"]."'"); 
    }
    public function UpdateQTYM($prno){
        return parent::RunDML("update OrderTemp set qty=qty-1,total=qty*price where prono='".$prno."' and UserID='".$_SESSION["id"]."'"); 
    }
    public function GetAll(){
        return parent::GetData("select * from OrderTemp where userid='".$_SESSION["id"]."'"); 

    }
    public function GetView($s){
        return parent::GetData("select * from viewsales where customerid='".$_SESSION["id"]."' and status='".$s."'"); 

    }
    public function GetCount()
    {
        return parent::GetData("select count(*) as count from OrderTemp where userid='".$_SESSION["id"]."'"); 
    }
    public function GetSum()
    {
        return parent::GetData("select sum(total) as total from OrderTemp where userid='".$_SESSION["id"]."'"); 
    }
}


?>