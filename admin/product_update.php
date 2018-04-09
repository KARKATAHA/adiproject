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

	<?php echo "<form method=\"POST\" class=\"form\" action=\"perform_product_update.php?id=".$product_id."\">"; ?>
			<div class="col-md-6">
				<h1>New Info</h1>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Image File</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="file" name="prod_img_filename" accept="image/gif, image/jpeg, image/png">
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Product Type</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="text" name="product_type" style="margin: 0px;">
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Name</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="text" name="product_name">
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Product Id</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;"><?php echo $product_id; ?></p>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Price</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="text" name="product_price">
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Quantity</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="text" name="product_quantity">
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p style="color:black; font-size: 20px;">Description</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<textarea  rows="1" cols="30" name="product_desc"></textarea>
					</div>		
				</div>
				<input id="register" type="submit" value="Save" class="btn btn-success btn-block">
				</form>
			</div>


			<div class="col-md-6">
				<?php
					$query="select * from products where product_id=$product_id";
					$result=mysqli_query($con, $query);
					$num_rows=mysqli_num_rows($result);
					if($num_rows==1){
					$row=mysqli_fetch_array($result);
			    ?>
				<h1>Old Info</h1>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Image File</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['prod_img_file']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">ProductType</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['type']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Name</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['product_name']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Product Id</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['product_id']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Price</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['product_price']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Quantity</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['quantity']; ?></h3>
					</div>		
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3 style="color:black">Description</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h3><?php echo $row['product_desc']; ?></h3>
					</div>		
				</div>
				<?php
					}
					else{
				?>
				<div class="row">
					<h1>Old Info</h1>
					<h3>No data found</h3>		
				</div>
				<?php	
					}
				?>
				 
			</div>


		</div>
	</div>
</body>
</html>