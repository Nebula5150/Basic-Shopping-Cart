<?php
require_once("controller.php");
require_once("productModel.php");
	class productControl extends DAOController {

		public function getAllProducts(){
			$products = array();
			$sql = "SELECT * FROM product ORDER BY product_name;";
			$query = mysql_query($sql, $this->connect);
				while($result = mysql_fetch_assoc($query))
			{
				$product = new productModel();
				$product->setProductname($result['product_name']);
				$product->setProductdescription($result['product_description']);
				$product->setProductprice($result['product_price']);
				$product->setProductid($result['product_id']);

				$products[] = $product;
			}
			return $products;
		}

		public function addToCart($prod_id, $user_id){
			$productid = $prod_id->getProductid();
			$sql = "INSERT INTO cart (product_id, user_id)values('$productid', '$user_id');";
			$data = mysql_query($sql, $this->connect);
				if($data){
					return TRUE;
				}else{
					return FALSE;
				}
		}

		public function getMyCart($user){
			$sql = "SELECT COUNT(*) FROM cart WHERE user_id='$user';";
			$data = mysql_query($sql, $this->connect);
			$row = mysql_fetch_row($data);
		return $row[0];
		}
		
		public function viewCartItems($user){
			$sql = "SELECT * FROM product, cart WHERE product.product_id=cart.product_id AND cart.user_id='$user';";
			$data = mysql_query($sql, $this->connect);
				while($result = mysql_fetch_assoc($data)){
					$products = new productModel();
					$products->setProductname($result['product_name']);
					$products->setProductdescription($result['product_description']);
					$products->setProductprice($result['product_price']);
					$products->setProductid($result['product_id']);

					$productList[]=$products;
				}
					return $productList;
		}

		public function removeItem($user, $productid){
				$sql = "DELETE FROM cart WHERE product_id=$productid AND user_id=$user;";
				$query = mysql_query($sql, $this->connect);
		}


	}

?>