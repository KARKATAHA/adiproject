<?php
	session_start();
	include "includes/dbconnect.php";
	$product_id=$_GET['id'];
if($_SESSION['is_logged_in']==0){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
	<?php
	include "includes/header.php";
	?>
<body style="background-color: white">
	<?php
	include "includes/navbar.php";
	?>
	<div class="container">
		<div class="row">
			
			<div class="col-md-offset-2 col-md-8">
	<?php echo "<form method=\"POST\" class=\"form\" action=\"perform_product_update.php?id=".$product_id."\">"; ?>
				<div class="row">
					<div class="col-md-3">
						<h3 style="color:black">Image File</h3>
					</div>
					<div class="col-md-3" style="margin-top: 20px;">
						<input type="file" name="prod_img_filename" accept="image/gif, image/jpeg, image/png">
					</div>
					<div class="col-md-6">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<h3 style="color:black">ProductType</h3>
						<br>
						<h3 style="color:black">Name</h3>
						<br>
						<h3 style="color:black">Product Id</h3>
						<br>
						<h3 style="color:black">Price</h3>
						<br>
						<h3 style="color:black">Quantity</h3>
					</div>
					<div class="col-md-3" style="margin-top: 20px;">
						<input type="text" name="product_type">
						<p><br><br></p>
						<input type="text" name="product_name">
						<p><br><br></p>
						<h3 style="color:black"><?php echo $product_id ?></h3>
						<p><br><br></p>
						<input type="text" name="product_price">
						<p><br><br></p>
						<input type="text" name="product_quantity">
					</div>
					<div class="col-md-6">
							
					</div>		
				</div>
				<div class="row">
					<div class="col-md-3">
						<h3 style="color:black">Description</h3>
					</div>
					<div class="col-md-3" style="margin-top: 20px;">
						<textarea  rows="4" cols="30" name="product_desc"></textarea>
					</div>
					<div class="col-md-6">
							
					</div>		
				</div>

				<input id="register" type="submit" value="Save" class="btn btn-success btn-block">
				</form>
			</div>



		</div>
	</div>
</body>
</html>