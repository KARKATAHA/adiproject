<?php
session_start();

include "includes/dbconnect.php";
if(!isset($_SESSION['is_logged_in'])){
	header('Location:login.php');
}
else{
	$product_id=$_GET['id'];
	$user_id=$_SESSION['id'];

//checking in one row same product id and cart id is present or not.
$query="select * from user_cart where cart_id=$user_id and product_id=$product_id";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$num_rows=mysqli_num_rows($result);
//if present then update it add one extra product_count.
if($num_rows==1){
	$count=$row['product_count'];
	$count=$count+1;
	$query="update user_cart set product_count=$count where cart_id=$user_id and product_id=$product_id";
	mysqli_query($con,$query);
	$_SESSION['check']=3;
	header('Location: product_desc.php?id='.$product_id);
}
else{
	$query="INSERT INTO `user_cart` (`cart_id`, `product_id`,`product_count`) VALUES ('$user_id', '$product_id',1)";

	if(mysqli_query($con, $query))
	{
		$_SESSION['check']=3;
		header('Location: product_desc.php?id='.$product_id);
	}
	else{
		echo "not won=rking";
	}
}
}


?>