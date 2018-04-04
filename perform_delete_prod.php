<?php
	session_start();
	include "includes/dbconnect.php";
	$product_id=$_GET['id'];
	$cart_id=$_SESSION['id'];
	$query="delete from user_cart where product_id='$product_id' and cart_id='$cart_id'";
	mysqli_query($con, $query);
	header('Location:mycart.php');
?>