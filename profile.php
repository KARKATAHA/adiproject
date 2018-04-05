<?php
session_start();
include "includes/dbconnect.php";

if($_SESSION['is_logged_in']==0){
    header('Location: index.php');
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

    			<?php
    				$user_id=$_SESSION['id'];
    				$query="SELECT * FROM users WHERE id='$user_id'";
    				$result=mysqli_query($con, $query);

	    			$row=mysqli_fetch_array($result);

	    			if($row['type']=="newuser"){?>

	    				<p class="text-warning">Looks like you have not verified your email.please verify!</p>
	    			
	    		<?php }
	    			else if($row['type']=="admin"){
	    				header('Location:admin/profile.php');
	    			}
	    		

	    		$query="SELECT * FROM `products`";

	    		$result=mysqli_query($con, $query);

	    		$num_rows=mysqli_num_rows($result);	    		

	    		for($i=0;$i<$num_rows;$i++)
	    		{
	    			$row=mysqli_fetch_array($result);
                    echo "<div class=\"col-md-3\">
                            <div class=\"panel panel-success\">
                                <div class=\"panel-heading\">".$row['product_name']."</div>
                                
                                <div class=\"panel-body\"><img src=\"images/".$row['prod_img_file']."\"class=\"img-responsive\" style=\"width:100%\" alt=\"Image\"></div>
                                
                                <p>Price INR ".$row['product_price']."</p>
                                <a href=\"product_desc.php?id=".$row['product_id']."\" class=\"btn btn-danger btn-block\">View Item</a>
                            </div>
                          </div>";
	    		}

	    		?>
    		</div>
    	</div> 	
	</body>
</html>