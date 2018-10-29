<?php
		
	session_start();
require_once("userModel.php");
	class DAOController {
	
		protected $hostname;
		protected $username;
		protected $password;
		protected $db;
		protected $connect;
		protected $success;

	public function __construct(){
			$this->hostname = "localhost";
			$this->username = /*"root";*/"oceanliq_trainSq";
			$this->password = /*"";*/"HondaCivic5150";
			$this->db = /*"test";#*/"oceanliq_main";
			$this->connect = mysql_connect($this->hostname, $this->username, $this->password);
			mysql_select_db($this->db);
	}

	public function userReg($userModel){
		$firstname = $userModel->getFirstname();
		$lastname = $userModel->getLastname();
		$email = $userModel->getEmail();
		$password = $userModel->getPassword();
		$code = rand(1000, 9999);
		$sql  = "INSERT INTO user (firstname, lastname, email, password, activation_code) values('$firstname', '$lastname', '$email', '$password', $code)";
		$result = mysql_query($sql, $this->connect);
			if($result){
				$this->success = TRUE;
				return TRUE;
			}else{
				$this->success = FALSE;
				return FALSE;
			}
	}	

	public function sendMail($model){
		$email = $model->getEmail();
		$sql = "SELECT * FROM user WHERE email='$email' AND;";
		$query = mysql_query($sql, $this->connect);
		$result = mysql_fetch_assoc($query);
		$activationCode = $result['activation_code'];
		$userId = $result['userId'];
		$message = "This is your activation code: " . $activationCode. "\n http://trainsquare.oceanliquid.co.uk/activate.php?userid=" . $userId . " Click link to activate your account";
			mail($email, 'Your activation email', $message, 'tom@oceanliquid.co.uk');
		return;
	}

	public function activateAccount($activeCode, $userid){
			$checkCodeSql = "SELECT * FROM user WHERE userId=$userid;";
			$checkQuery = mysql_query($checkCodeSql, $this->connect);
			$dbCode = mysql_fetch_assoc($checkQuery);
			$result = $dbCode['activation_code'];
				if($result == $activeCode){
			$sql = "UPDATE user SET activated=1 WHERE userId=$userid;";
			$query = mysql_query($sql, $this->connect);
				if($query){
					return "success";
				}else{
					return "Failed on update query";
				}}else{
					return "Failed on code vaildation";
				}
	}		

	public function loginCheck($model){
		$email = $model->getEmail();
		$password = $model->getPassword();
		$sql ="SELECT * FROM user WHERE email='$email' AND password='$password' AND activated=1;";
		$queryReturn = mysql_query($sql, $this->connect);
		$count = mysql_num_rows($queryReturn);
		if($count == 1){
			$result = mysql_fetch_assoc($queryReturn);
			$_SESSION['session_userid'] =  $result['userId'];
			$_SESSION['session_firstname'] = $result['firstname'];
			$this->success = TRUE;
				return TRUE;
		}else{
			$this->success = FALSE;
				return FALSE;
		}
	}

	public function getMyDetails($user){
			$sql = "SELECT * FROM user WHERE userId='$user';";
			$query = mysql_query($sql, $this->connect);	
			$query = mysql_fetch_assoc($query);
			return $query;
	}
	public function updateMyDetails($userModel, $user){
		$firstname = $userModel->getFirstname();
		$lastname = $userModel->getLastname();
		$email = $userModel->getEmail();
			$sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email' WHERE userId='$user';";
			$query = mysql_query($sql, $this->connect);	
	}

}

?>