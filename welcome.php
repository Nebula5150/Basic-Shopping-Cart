<?php
#session_start();
require_once "productProcess.php";
$myName = (isset($_SESSION['session_firstname'])) ? $_SESSION['session_firstname'] : "Who are you??";
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<style type="text/css">
li {
	display:inline-block;
}

</style>
 </head>
 <body>
 <p align="right"><?=getCartDetails($user);?></p>
  <h3 align="center">Welcome <?=$myName;?> to your homepage!</h3>
		<?php require_once("nav_inc.php");?>
 </body>
</html>
