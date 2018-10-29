<?php
	require_once("controller.php");
	$firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : NULL;
		$lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : NULL;
			$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
				$password = (isset($_POST['password'])) ? $_POST['password'] : NULL;
					$formType = $_POST['formAction'];

if($formType == "login"){
	$model = new userModel();
	$model->setEmail($email);
	$model->setPassword($password);
	$loginCheck = new DAOController();
	$result = $loginCheck->loginCheck($model);
	if($result){
			header("location:welcome.php");
			exit;
		}else{
			header("location:error2.html");
			exit;
		}
}elseif($formType == "register"){
	$model = new userModel();
	$model->setFirstname($firstname);
	$model->setLastname($lastname);
	$model->setEmail($email);
	$model->setPassword($password);
	$control = new DAOController();
	$result = $control->userReg($model);
		if($result){
			$control->sendMail($model);
			header("location:success.html");
			exit;
		}else{
			header("location:error.html");
			exit;
		}
}else{
 header("location:userViewLogin.html");
exit;
}
?>