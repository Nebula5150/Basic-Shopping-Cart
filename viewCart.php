<?php
	require_once"productProcess.php";
	require_once"viewCart_inc.php";
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
  <title>View Cart</title>
  <script>
		function removeFromCart(x){
		var id = x.productID.value;
		var xmlhttp = new XMLHttpRequest();
	
		xmlhttp.onreadystatechange = function(){
			
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					x.b1.disabled=true;
						//document.getElementById("myCart").innerHTML = xmlhttp.responseText;
				}
		}
			xmlhttp.open("get", "removeCartItem.php?productid="+id, true);
			xmlhttp.send();
}
  </script>
 </head>
 <body>
 <h3 align="center">View Cart</h3>
  <?php require_once "nav_inc.php";?>
  <div id="myCart">
  <table width="80%" align="center" border="1" style="border-collapse:collapse;">
		<?=displayMyCart($user);?>
  </table>
  </div>
 </body>
</html>
<!--TUTOR>Krish-->