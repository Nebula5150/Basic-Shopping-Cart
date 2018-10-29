<?php
session_start();
$_SESSION['session_userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : NULL;
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Activate your account</title>
 </head>
 <body>
  <form name="login" action="activate_inc.php" method="POST">
		Activation code: <input type="text" name="activationCode" /><br/><br/>
		<input type="submit" value="Activate" name="activate"/>
		<input type="hidden" name="activation" value="active"/>
  </form>
 </body>
</html>