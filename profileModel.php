<?php
require_once("controller.php");
	$user = $_SESSION['session_userid'];
	$formSubmit = (isset($_POST['formAction'])) ? $_POST['formAction'] : NULL;

if(!is_null($formSubmit) && $formSubmit == "update"){
	$model = new userModel();
	$model->setFirstname($_POST['firstname']);
	$model->setLastname($_POST['lastname']);
	$model->setEmail($_POST['email']);
			$control = new DAOController();
			$control->updateMyDetails($model, $user);
			$_SESSION['session_updated'] = TRUE;
			header("location:userProfile.php");
			exit();
		}else{
			$control = new DAOController();
			$data = $control->getMyDetails($user);
		}
?>