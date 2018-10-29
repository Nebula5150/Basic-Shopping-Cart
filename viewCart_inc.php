<?php
require_once"productControl.php";
	function displayMyCart($user){
			$display="";
			$control = new productControl();
			$cartDetails = $control->viewCartItems($user);
		foreach($cartDetails as $value){
$display .= <<<HTML
			<tr><td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductname()}</td>
			<td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductdescription()}</td>
			 <td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductprice()}</td>
				<td width="25%" style="padding:10px 5px 10px 5px;"><form name="remove" action="products.php" method="POST" onSubmit="removeFromCart()">
				<input type="button" value="Remove Item" name="b1" onclick="removeFromCart(this.form)"/>
				<input type="hidden" name="productID" id="productID" value="{$value->getProductid()}"/>
				</form></td>
				</tr>
HTML;
		}
		return $display;
	}
?>