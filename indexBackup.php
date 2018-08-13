<?php
session_start();
include "includes/dbconnect.php";
include "functions/function.php";
?> 
<!DOCTYPE html>
<html>
    <?php
        include "includes/header.php";
    ?>
    <body>
        <div class="main_wraper">
            
            <div class="header_wraper">
                <?php
                    include "includes/navbar.php";
                ?>
                <div class="menubar_wraper">
                
                </div>
            </div>
            <div class="content_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <?php
                                getCats();
                            ?>
                        </div>
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

                        for($i=1;$i<=$num_rows;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                            echo "<div class=\"col-md-3 col-sm-3 col-xs-9\">
                                    <div class=\"panel panel-success\">
                                        <div class=\"panel-heading\"><h4>".$row['product_name']."</h4>
                                        </div>
                                        
                                        <div class=\"panel-body\"><img src=\"images/".$row['prod_img_file']."\"class=\"img-responsive\" style=\"width:100%\" alt=\"Image\"></div>
                                        
                                        <p>Price INR ".$row['product_price']."</p>
                                        <a href=\"product_desc.php?id=".$row['product_id']."\" class=\"btn btn-danger btn-block\">View Item</a>
                                    </div>
                                  </div>";
                            if($i%4==0){
                                echo "</div> <div class=\"row\">";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>


            <div class="footer_wraper">
                
            </div>


        </div>  
    </body>
</html>