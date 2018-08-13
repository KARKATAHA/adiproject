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
<body style="background-color: white">
	<?php
	include "includes/navbar.php";
	?>
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<form method="POST" class="form" action="perform_add_prod.php">
					<table align="center" width="800" border="2" bgcolor="gray">
						<tr>
							<td>
								<h3 style="color:black">Image File</h3>
							</td>
							<td>
								<input type="file" name="prod_img_filename" accept="image/gif, image/jpeg, image/png">
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">ProductCategory</h3>
							</td>
							<td>
								<select name="product_cat">
									<option>
										Select a category
									</option>
									<?php
										$query="select * from categories";
										$res=mysqli_query($con,$query);
										$num_rows=mysqli_num_rows($res);
										for($i=1;$i<=$num_rows;$i++){
											$row=mysqli_fetch_array($res);
											//$cat_id=$row['cat_id'];
											$cat_title=$row['cat_title'];
											echo "<option value='$cat_title'>$cat_title</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">ProductBrand</h3>
							</td>
							<td>
								<select name="product_brand">
									<option>
										Select Your Brand
									</option>
									<?php
										$query="select * from brand";
										$res=mysqli_query($con,$query);
										$num_rows=mysqli_num_rows($res);
										for($i=1;$i<=$num_rows;$i++){
											$row=mysqli_fetch_array($res);
											$brand_id=$row['brand_id'];
											$brand_title=$row['brand_title'];
											echo "<option value='$brand_title'>$brand_title</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">Name</h3>
							</td>
							<td>
								<input type="text" name="product_name">
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">Product Id</h3>
							</td>
							<td>
								<input type="text" name="product_id">
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">Price</h3>
							</td>
							<td>
								<input type="text" name="product_price">
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">Quantity</h3>
							</td>
							<td>
								<input type="text" name="product_quantity">
							</td>
						</tr>
						<tr>
							<td>
								<h3 style="color:black">Description</h3>
							</td>
							<td>
								<textarea  rows="4" cols="30" name="product_desc"></textarea>
							</td>
						</tr>
					</table>
					<br>
				<input id="register" type="submit" value="Save" class="btn btn-success btn-block">
				</form>
			</div>
			<div class="col-md-6">
				
			</div>


		</div>
	</div>
</body>
</html>