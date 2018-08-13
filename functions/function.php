<?php 
try {
	include "includes/dbconnect.php";	
}
catch (Exception $e){
	echo $e;
}
function getCats(){
	global $con;
	$query="select * from categories";
	$res=mysqli_query($con,$query);
	$num_rows=mysqli_num_rows($res);
	for($i=1;$i<=$num_rows;$i++){
		$row=mysqli_fetch_array($res);
		$cat_id=$row['cat_id'];
		$cat_title=$row['cat_title'];
		echo "<li><a href='index.php?cat_id=".$cat_id."'>$cat_title</a></li>";
	}
}
function checkVerification(){
	global $con;
    if(isset($_SESSION['is_logged_in'])){
        if($_SESSION['is_logged_in']==1){
            //header('Location: profile.php');
            $user_id=$_SESSION['id'];
            $query="SELECT * FROM users WHERE id='$user_id'";
            $result=mysqli_query($con, $query);

            $row=mysqli_fetch_array($result);

         	if($row['type']=="newuser"){

            echo "Looks like you have not verified your email.please verify!";
                            
            }
            else{

            }
       	}                            
    }
}

function getProducts(){
	global $con;
	$query="SELECT * FROM `products`";
	$result=mysqli_query($con, $query);

    $num_rows=mysqli_num_rows($result);             

    for($i=1;$i<=$num_rows;$i++)
    {
        $row=mysqli_fetch_array($result);
        echo "<div class=\"col-md-3 col-sm-4 col-xs-12\">
        <div class=\"panel panel-success\">
        <div class=\"panel-heading\"><h4>".$row['product_name']."</h4>
        </div>                                        
        <div class=\"panel-body\"><img src=\"images/".$row['prod_img_file']."\"class=\"img-responsive\" style=\"width:100%; height:200px;\" alt=\"Image\"></div>                                       
        <p>Price INR ".$row['product_price']."</p>
        <a href='product_desc.php?id=".$row['product_id']."' class=\"btn btn-danger btn-block\">View Item</a>
        </div>
        </div>";
        if($i%4==0){
            echo "</div> <div class=\"row\">";
        }
    }

}
function getProductsByCategory($category_id){
    global $con;
    $query="select * from products where cat_id='$category_id'";
    $result=mysqli_query($con, $query);

    $num_rows=mysqli_num_rows($result);             
    if($num_rows>0){
        for($i=1;$i<=$num_rows;$i++)
        {
            $row=mysqli_fetch_array($result);
            echo "<div class=\"col-md-3 col-sm-4 col-xs-12\">
            <div class=\"panel panel-success\">
            <div class=\"panel-heading\"><h4>".$row['product_name']."</h4>
            </div>                                        
            <div class=\"panel-body\"><img src=\"images/".$row['prod_img_file']."\"class=\"img-responsive\" style=\"width:100%; height:200px;\" alt=\"Image\"></div>                                       
            <p>Price INR ".$row['product_price']."</p>
            <a href='product_desc.php?id=".$row['product_id']."' class=\"btn btn-danger btn-block\">View Item</a>
            </div>
            </div>";
            if($i%4==0){
                echo "</div> <div class=\"row\">";
            }
        }
    }
    else{
        echo "Sorry For Inconvenience! There is no product in this Category.";
    }
}
function getProductsByQuery($var){
    global $con;
    $query="SELECT * FROM products p inner join keywords k on p.product_id=k.product_id where k.product_keywords like '%$var%'";
    $result=mysqli_query($con, $query);

    $num_rows=mysqli_num_rows($result);             

    if($num_rows>0){ 
        for($i=1;$i<=$num_rows;$i++)
        {
            $row=mysqli_fetch_array($result);
            echo "<div class=\"col-md-3 col-sm-4 col-xs-12\">
            <div class=\"panel panel-success\">
            <div class=\"panel-heading\"><h4>".$row['product_name']."</h4>
            </div>                                        
            <div class=\"panel-body\"><img src=\"images/".$row['prod_img_file']."\"class=\"img-responsive\" style=\"width:100%; height:200px;\" alt=\"Image\"></div>                                       
            <p>Price INR ".$row['product_price']."</p>
            <a href='product_desc.php?id=".$row['product_id']."' class=\"btn btn-danger btn-block\">View Item</a>
            </div>
            </div>";
            if($i%4==0){
                echo "</div> <div class=\"row\">";
            }
        }
    }
    else{
        echo "Sorry we can not find anything......";
    }

}

?>