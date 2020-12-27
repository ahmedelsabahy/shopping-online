<?php
session_start();
   session_destroy();
   setcookie("usercookie","",time()-1);
   echo("<script> window.open('login.php', '_self')</script>");	
?>