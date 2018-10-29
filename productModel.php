<?php

	class productModel {
	
	private $productid;
	private $productname;
	private $productdescription;
	private $productprice;


	public function setProductid($data){
		$this->productid = $data;
	}
	public function getProductid(){
		return $this->productid;
	}
	public function setProductname($data){
		$this->productname = $data;
	}
	public function getProductname(){
		return $this->productname;
	}
	public function setProductdescription($data){
		$this->productdescription = $data;
	}
	public function getProductdescription(){
		return $this->productdescription;
	}
	public function setProductprice($data){
		$this->productprice = $data;
	}
	public function getProductprice(){
		return $this->productprice;
	}

	}


?>