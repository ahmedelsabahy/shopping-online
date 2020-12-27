<?php
include_once "Operation.php";
include_once "Database.php";
ob_start();
 
class Customer extends Database implements  Operation {

   private $CustomerID;
   private $Name;
   private $Password;
   private $Phone;
   private $Email;
   private $Country;
   private $City;
   private $Gender;
   private $Street;
    
    public function getcustid(){
        return $this->CustomerID;
    }
    public function getname(){
        return $this->Name;
    }
    public function getpassword(){
        return $this->Password;
    }
    public function getphone(){
        return $this->Phone;
    }
    public function getemail(){
        return $this->Email;
    }
    public function getcountry(){
        return $this->Country;
    }
    public function getcity(){
        return $this->City;
    }
    public function getgender(){
        return $this->Gender;
    }
    public function getstreet(){
        return $this->Street;
    }


    public function setcustid($value){
          $this->CustomerID=$value;
    }
    public function setname($value){
         $this->Name=$value;
    }
    public function setpassword($value){
          $this->Password=$value;
    }
    public function setphone($value){
          $this->Phone=$value;
    }
    public function setemail($value){
          $this->Email=$value;
    }
    public function setcountry($value){
          $this->Country=$value;
    }
    public function setcity($value){
          $this->City=$value;
    }
    public function setgender($value){
          $this->Gender=$value;
    }
    public function setstreet($value){
          $this->Street=$value;
    }

    public function Add(){
        return parent::RunDML("insert into customer values (Default,'".$this->getname()."','".$this->getpassword()."','".$this->getphone()."','".$this->getemail()."','".$this->getcountry()."','".$this->getcity()."','".$this->getgender()."','".$this->getstreet()."')");
    }
    public function Update(){
        return parent::RunDML("update customer set Name='".$this->getname()."',Password='".$this->getpassword()."',Phone='".$this->getphone()."',Email='".$this->getemail()."',Country='".$this->getcountry()."',City='".$this->getcity()."',Gender='".$this->getgender()."',Street='".$this->getstreet()."' where customerid='".$_SESSION["id"]."'");
    }
    public function UpdatePW(){
        return parent::RunDML("update customer set  Password='".$this->getpassword()."' where customerid='".$_GET["id"]."'");
    }
    public function Delete(){
        return parent::RunDML("delete from customer  where customerid='".$_SESSION["id"]."'");
    }
    public function GetAll(){
        $rs=parent::GetData("select * from customer");
        return $rs;
    }
    public function Login(){
        $rs=parent::GetData("select * from customer where (email='".$this->getemail()."' or phone='".$this->getphone()."')  and password ='".$this->getpassword()."'");
        return $rs;
    }
    public function GetByID(){
        $rs=parent::GetData("select * from customer where customerid='".$_SESSION["id"]."'");
        return $rs;
    }
    public function GetByEmail(){
        $rs=parent::GetData("select * from customer where email='".$this->getemail()."'");
        return $rs;
    }
}

?>