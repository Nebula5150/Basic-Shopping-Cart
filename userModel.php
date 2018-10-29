<?php

	class userModel {

	private $firstname;
	private $lastname;
	private $email;
	private $password;


	public function setFirstname($data){
		$this->firstname = $data;
	}
	public function getFirstname(){
		return $this->firstname;
	}
	public function setLastname($data){
		$this->lastname = $data;
	}
	public function getLastname(){
		return $this->lastname;
	}
	public function setEmail($data){
		$this->email = $data;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setPassword($data){
		$this->password = $data;
	}
	public function getPassword(){
		return $this->password;
	}

	}


?>