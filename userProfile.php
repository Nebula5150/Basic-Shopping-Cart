<?php
require_once("profileModel.php");
$myName = (isset($_SESSION['session_firstname'])) ? $_SESSION['session_firstname'] : "Who are you??";
$updated = (isset($_SESSION['session_updated'])) ? $_SESSION['session_updated'] : FALSE;
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<style type="text/css">
li {
	display:inline-block;
}

</style>
 </head>
 <body>
  <h3 align="center">Welcome <?=$myName;?> to your homepage!</h3>
	<?php require_once("nav_inc.php");?>
	<?php if($updated == TRUE){?>
	<p style="color:red;">Details have been updated</p>
	<?php } 
		$_SESSION['session_updated'] = FALSE;
	?>
	<form name="update" action="userProfile.php" method="POST">
		Firstname: <input type="text" name="firstname" value="<?=$data['firstname'];?>"/><br/><br/>
		Lastname: <input type="text" name="lastname" value="<?=$data['lastname'];?>" /><br/><br/>
		Email: <input type="text" name="email" value="<?=$data['email'];?>"/><br/><br/>
		<input type="submit" value="Update details" name="submit"/>
		<input type="hidden" value="update" name="formAction"/>
	</form>
 </body>
</html>
