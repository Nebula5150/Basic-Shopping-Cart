<?php
require_once"productControl.php";
$userid = $_SESSION['session_userid'];
$productId = $_GET['productid'];

$control = new productControl();

$control->removeItem($userid, $productId);

?>