<?php
	include "includes/dbconnect.php";
	if($_POST['product_name']==NULL or $_POST['prod_img_filename']==NULL or $_POST['product_price']==NULL or 
		$_POST['product_quantity']==NULL)
	{
		echo '<script language="javascript">';
		echo 'alert("Fill the Information properly")';
		echo '</script>';
  		include("../admin/profile.php");
	}
	else
	{
		$prod_id=$_GET['id'];
		$prod_type=$_POST['product_type'];
		$prod_name=$_POST['product_name'];
		$prod_img_file=$_POST['prod_img_filename'];
		$prod_price=$_POST['product_price'];
		$prod_quantity=$_POST['product_quantity'];
		$prod_desc=$_POST['product_desc'];
		$query="SELECT * FROM `products` where `product_id`= '$prod_id'";
		$result=mysqli_query($con, $query);
		$num_rows=mysqli_num_rows($result);

	//Checking user already exist or not

		if($num_rows==1)
		{
			$query="UPDATE `products` SET `product_name` = '$prod_name', `product_price` = '$prod_price', `prod_img_file` = '$prod_img_file', `product_desc` = '$prod_desc', `quantity` = '$prod_quantity',`type`='$prod_type' WHERE `products`.`product_id` = '$prod_id'";
			if(mysqli_query($con,$query)){

  				echo '<script language="javascript">';
				echo 'alert("Product updated Succesfully")';
				echo '</script>';
  				include("../admin/profile.php");
  			}
		}
		else{
			echo "Somthing is not right";
		}
	}
?>