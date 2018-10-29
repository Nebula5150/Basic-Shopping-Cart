<?php
	require_once"productProcess.php";
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
td{
	text-align:center;
}

</style>
  <title>Product List</title>
 </head>
 <body>
 <h3 align="center">View Products</h3>
  <?php require_once "nav_inc.php";?>
  <table width="80%" align="center" border="1" style="border-collapse:collapse;">
	
		<?=productList();?>

  </table>
 </body>
</html>
