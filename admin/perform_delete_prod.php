<?php
	include "includes/dbconnect.php";
	$product_id=$_GET['id'];
	$query="delete from products where product_id=$product_id";
	mysqli_query($con, $query);
	header("Location:profile.php");
?>