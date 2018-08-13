<?php
	session_start();
	include "includes/dbconnect.php";
	$product_id=$_GET['product_id'];
	$cart_id=$_SESSION['id'];
	$count=$_POST['prod_count'];
	echo $product_id."  ".$cart_id." ".$count;
?>