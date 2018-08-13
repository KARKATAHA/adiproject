<?php
session_start();
include "includes/dbconnect.php";//connecting to database.
include "functions/function.php";
//collecting product_id from url.
if(isset($_GET['id']) and $_GET['id']>0){
    $product_id=$_GET['id'];
    $query="SELECT * FROM `products` WHERE `product_id`=$product_id";
    $result=mysqli_query($con, $query);
    $num_rows=mysqli_num_rows($result);
    if($num_rows>0){
        $row=mysqli_fetch_array($result);
        $product_name=$row['product_name'];
        $product_price=$row['product_price'];
        $product_image=$row['prod_img_file'];
        $product_desc=$row['product_desc'];
        $product_quantity=$row['quantity'];
        $product_cat_id=$row['cat_id'];
        $product_brand_id=$row['brand_id'];
        $query="select categories.cat_title from categories where cat_id='$product_cat_id'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
        $cat_title=$row['cat_title'];
        $query="select brand.brand_title from brand where brand_id='$product_brand_id'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
        $brand_title=$row['brand_title'];
        ?>
        <html>
            <?php
                include "includes/header.php";
            ?>

        <?php

            if(isset($_SESSION['check']))
            {
                if($_SESSION['check']==3)
                {
                echo "<script type=\"text/javascript\">
                        $(document).ready(function(){
                        alert(\"Product added to cart!\");

                        })
                      </script>";

                $_SESSION['check']=0;         
                }

            }
        ?>  


            <body>
                <?php
                 include "includes/navbar.php";
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-xs-12 col-sm-4">
                                    <div class="panel-body">
                                    <img src="images/<?php echo $product_image; ?>" class="img-responsive" style="width:80%; margin-left:10%;" alt="Image"></div>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-8">
                                    <h4><a style="color:blue;width: 100%;"><?php echo $brand_title."/".$cat_title."/".$product_name; ?></a></h4>
                                    <h4><?php echo $product_name; ?></h4>
                                    <h2>Price INR &nbsp<?php echo $product_price; ?></h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                <?php if($product_quantity>0){ ?>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <a href="add_to_cart.php?id=<?php echo $product_id; ?>" class="btn btn-success btn-responsive">Add to Cart</a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <a href="add_to_cart.php?id=<?php echo $product_id; ?>" class="btn btn-success btn-md">Buy Now</a>
                                        </div>
                                    </div>
                                <?php  } 
                                       else{
                                        echo "<h3>Product Not Available</h3>";
                                       }
                                ?>

                                </div>
                                <div class="col-md-4">
                                    <h1>Product Description</h1>
                                    <p><?php  echo $product_desc; ?></p>
                                    <h1>Reviews</h1>
                                    <p>This is a review This is a review This is a review</p><hr>
                                    <p>This is a review This is a review This is a review</p><hr>
                                    <p>This is a review This is a review This is a review</p><hr>
                                    <p>This is a review This is a review This is a review</p><hr>
                                    <p>This is a review This is a review This is a review</p><hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </body>
        </html>
<?php
    }
    else{
        echo "This product does not exist.";
    }
}
else{
    echo "Invalied URL!";
}
?>
