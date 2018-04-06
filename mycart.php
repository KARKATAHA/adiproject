<?php
session_start();
include "includes/dbconnect.php";
if($_SESSION['is_logged_in']==0){
        header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
	<?php
	include "includes/navbar.php";
	?>
<body>
		<?php
        include "includes/header.php";
    	?>
    	<div class="container">

    	<div class="row">
    		<h1 class="text_center">Added Products</h1>

    		<?php

    		$user_id=$_SESSION['id'];
    		$query="SELECT * FROM `user_cart` LEFT JOIN `products` ON `products`.`product_id`=`user_cart`.`product_id` WHERE `cart_id`= '$user_id'";

    		$result=mysqli_query($con, $query);
		    $sum=0;
    		$num_rows=mysqli_num_rows($result);
    		for($i=0;$i<$num_rows;$i++)
    		{
    			$row=mysqli_fetch_array($result);
    			$sum=$sum+$row['product_count']*$row['product_price'];
    			echo "<div class=\"col-md-10 col-sm-10\" style=\"height:120px;margin-bottom:20px\">
    				    <div class=\"row\">
    					   <div class=\"col-md-3 col-sm-3 col-xs-4\">
    						<img src=\"images/".$row['prod_img_file']."\" class=\"img-responsive\">
    					   </div>
    					   <div class=\"col-md-3 col-sm-4 col-xs-8\">
	    					<h3 >".$row['product_name']."</h3>
	    					<h5 style=\"width:100%\">Price INR".$row['product_price']."</h5>
    					   </div>
                           <div class=\"col-md-1 col-sm-1 col-xs-5\">
                            <h3 style=\"text-align:centre;\">".$row['product_count']."</h3>
                           </div>
    					   <div class=\"col-md-2 col-sm-2 col-xs-7\">
    						<h3>No Offers</h3>
    					   </div>
                           <div class=\"col-md-3 col-sm-2 col-xs-12\" style=\"color:white;\">
                            <a href=\"perform_delete_prod.php?id=".$row['product_id']."\"class=\"btn btn-danger btn-lg btn-block\">Delete</a>
                           </div>
    				    </div>
                        <div class=\"row\">
                            <div>
                                <br>
                            </div>
                        </div>
    			     </div>";

    		}
    		?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5 col-xs-5">         
                <a class="btn btn-primary btn-lg btn-block"><?php echo $sum ?></a>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-5">          
                <a href="haha.php"class="btn btn-primary btn-lg btn-block">CheckOut</a>
            </div>
        </div>
    </div>	
        
</body>
</html>
