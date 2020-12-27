<?php
class Database
{
    var $conn;
    function __construct()
    {
        $this->conn=mysqli_connect("mysql5031.site4now.net","a69bd5_ntidb","ABC@123456","db_a69bd5_ntidb");
    }
  //To Insert- Update - delete 
    function RunDML($statment)
    {
        if(!mysqli_query($this->conn,$statment))
            {
                return  mysqli_error($this->conn);
            }
        else
            return "ok";
    }
    //to search
  function GetData($select)
  {
    $result= mysqli_query($this->conn,$select);
    return $result;
  }

}

?>