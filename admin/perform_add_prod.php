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
		$prod_id=$_POST['product_id'];
		$prod_name=$_POST['product_name'];
		$prod_img_file=$_POST['prod_img_filename'];
		$prod_price=$_POST['product_price'];
		$prod_quantity=$_POST['product_quantity'];
		$prod_desc=$_POST['product_desc'];
		$prod_cat_name=$_POST['product_cat'];
		$prod_brand_name=$_POST['product_brand'];

		$query="select * from categories where cat_title='$prod_cat_name'";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$prod_cat_id=$row['cat_id'];

		$query="select * from brand where brand_title='$prod_brand_name'";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$prod_brand_id=$row['brand_id'];

		$query="SELECT * FROM `products` where `product_id`= '$prod_id'";
		$result=mysqli_query($con, $query);
		$num_rows=mysqli_num_rows($result);

	//Checking user already exist or not

		if($num_rows==1)
		{
			echo '<script language="javascript">';
			echo 'alert("Product Already Exist")';
			echo '</script>';
			include("../admin/profile.php");
		}
		else{
			$query="INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `prod_img_file`, `product_desc`, `quantity`,`cat_id`,`brand_id`) VALUES ('$prod_id', '$prod_name', '$prod_price', '$prod_img_file', '$prod_desc', '$prod_quantity','$prod_cat_id','$prod_brand_id')";
			if(mysqli_query($con,$query)){
				//Moving arbitrary image file to domain file.
				//$product_image=$_FILES['prod_img_filename']['name'];
				//$product_image_tmp=$_FILES['prod_img_filename']['tmp_name'];
				//move_uploaded_file($product_image_tmp,"../images/$product_image");
  				echo '<script language="javascript">';
				echo 'alert("Product added Succesfully")';
				echo '</script>';
  				include("../admin/profile.php");
  			}
  			else{
  				echo "query not running";
  			}
		}
	}
?>