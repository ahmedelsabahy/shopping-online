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

<center><h1>
    <div class="container">
 <?php echo("<br/><div class='alert alert-success'> Order Has Been sent , Your Order Number is {$_GET['orderno']} </div></br>"); 
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;   
		//html PNG location prefix
		$PNG_WEB_DIR = 'temp/';
		include "QRcode/qrlib.php";    
		//ofcourse we need rights to create temp dir
		if (!file_exists($PNG_TEMP_DIR))
			mkdir($PNG_TEMP_DIR);
		$filename = $PNG_TEMP_DIR.'test.png';
		$errorCorrectionLevel = 'H';
		$matrixPointSize = 8; 
			// user data
			$filename = $PNG_TEMP_DIR.'test'.md5($_GET['orderno'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
			QRcode::png($_GET['orderno'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
		//display generated file
		echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
 ?>





</div>
</h1><center>


<?php
include_once "Footer.php";
?>