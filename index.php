<?php
session_start();
include "includes/dbconnect.php";

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
                if(isset($_SESSION['is_logged_in'])){
                    if($_SESSION['is_logged_in']==1){
                    //header('Location: profile.php');
                        $user_id=$_SESSION['id'];
                        $query="SELECT * FROM users WHERE id='$user_id'";
                        $result=mysqli_query($con, $query);

                        $row=mysqli_fetch_array($result);

                        if($row['type']=="newuser"){?>

                            <p class="text-warning">Looks like you have not verified your email.please verify!</p>
                    
                <?php    }
                        else{

                        }
                    }
                    
                 }
                    
                

                $query="SELECT * FROM `products`";

                $result=mysqli_query($con, $query);

                $num_rows=mysqli_num_rows($result);             

                for($i=0;$i<$num_rows;$i++)
                {
                    $row=mysqli_fetch_array($result);
                    echo "<div class=\"col-md-3\">
                            <div class=\"product\">
                                <img src=\"images/".$row['prod_img_file']."\" style=\"width:100%;height:250px\">
                                <h4 class=\"text_center\"><b>".$row['product_name']."</b></h4>
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