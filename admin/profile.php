<?php
session_start();
include "includes/dbconnect.php";

if($_SESSION['is_logged_in']==0){
    header('Location: ../index.php');
}
?> 
<!DOCTYPE html>
<html>

	<?php
		include "includes/header.php";
	?>

	<body style="background-color:#fff">
		<?php
         include "includes/navbar.php";
        ?>
        
        <div class="container">
    		<div class="row">
    			<div class="col-md-offset-2 col-md-8">
    				<div class="row">
    					<div class="col-md-1">
    						
    					</div>
    					<div class="col-md-3">
    						<h4>Items</h4>
    					</div>
    					<div class="col-md-2">
    						<h4>Quantity</h4>
    					</div>
    					<div class="col-md-6">
    						<h4>Status</h4>
    					</div>
    				</div>
    			</div>
	    		<?php

	    		$query="SELECT * FROM `products`";

	    		$result=mysqli_query($con, $query);

	    		$num_rows=mysqli_num_rows($result);	    		

	    		for($i=0;$i<$num_rows;$i++)
	    		{
	    			$row=mysqli_fetch_array($result);
	    			$status="Not Aailable";
	    			$quantity=0;
	    			if($row['quantity']>0){
	    				$status="Aailable";
	    				$quantity=$row['quantity'];
	    			}
	    			echo "<div class=\"col-md-offset-2 col-md-8\" style=\"height:120px;margin-bottom:20px\">
    					<div class=\"row\">
	    					<div class=\"col-md-2\">
	    						<img src=\"../images/".$row['prod_img_file']."\" style=\"width:100%;height:120px\">
	    					</div>
	    					<div class=\"col-md-2\">
	    						<h3 >".$row['product_name']."</h3>
	    						<h5>Price INR ".$row['product_price']."</h5>
	    					</div>
	    					<div class=\"col-md-2\">
	    						<h3 style=\"margin-left:20px;\">$quantity</h3>
	    					</div>
	    					<div class=\"col-md-2\">
	    						<h3>$status</h3>
	    					</div>
	    					<div class=\"col-md-2\" style=\"margin-top:10px;\">
	    						<a href=\"product_update.php?id=".$row['product_id']."\"class=\"btn btn-primary btn-lg btn-block\">Update</a>
	    					</div>
	    					<div class=\"col-md-2\" style=\"margin-top:10px;\">
	    						<a href=\"perform_delete_prod.php?id=".$row['product_id']."\"class=\"btn btn-danger btn-lg btn-block\">Delete</a>
	    					</div>
    					</div>
    				</div>";

	    		}
	    		?>
	    		<div class="col-md-4">
	    			
	    		</div>
	    		<div class="col-md-4">
	    			<a href="add_new_prod.php" class="btn btn-danger btn-lg btn-block">Add New Product</a>
	    		</div>
	    		<div class="col-md-4">

	    		</div>
    		</div>
    	</div> 	
	</body>
</html>