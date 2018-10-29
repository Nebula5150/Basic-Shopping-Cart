<?php
	require_once"productControl.php";
	$user = $_SESSION['session_userid'];
$productID = (isset($_POST['productID'])) ? $_POST['productID'] : NULL;

	function productList(){
		$display="";
	$control = new productControl();
	$products = $control->getAllProducts();
		foreach($products as $value){
			$display .= <<<HTML
			<tr><td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductname()}</td>
			<td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductdescription()}</td>
			 <td width="25%" style="padding:10px 5px 10px 5px;">{$value->getProductprice()}</td>
				<td width="25%" style="padding:10px 5px 10px 5px;"><form name="add" action="products.php" method="POST">
				<input type="submit" value="Add to cart" name="addToCart"/>
				<input type="hidden" name="productID" value="{$value->getProductid()}"/>
				</form></td>
				</tr>
HTML;
		}
		return $display;
	}


	if(!is_null($productID)){
		$model = new productModel();
		$model->setProductid($productID);
		$control = new productControl();
		$addToCart = $control->addToCart($model, $user);
			/*if($addToCart){
				
			}else{

			}*/
	}

	function getCartDetails($user){
			$control = new productControl();
			$cartDetails = $control->getMyCart($user);
				if($cartDetails == 0){
					echo "Your cart is empty";
				}elseif($cartDetails == 1){
					echo "You have <a href='viewCart.php'>$cartDetails</a>  item in your cart";
				}else{
					echo "You have <a href='viewCart.php'>$cartDetails</a> items in your cart";
					}
	}		
?>