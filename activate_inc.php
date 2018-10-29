<?php
require_once "controller.php";
$userid = $_SESSION['session_userid'];
$code = (isset($_POST['activationCode'])) ? $_POST['activationCode'] : NULL;

if(!is_null($code)){
	$control = new DAOController();
	$result = $control->activateAccount($code, $userid);
		if($result == "success"){
			header("location:userViewLogin.html");
			exit;
		}else{
			echo $result;
		}
}else{
	header("location:activate.php");
			exit;
}
?>