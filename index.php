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
            
        <div class="header_wraper">
            <?php
                include "includes/navbar.php";
            ?>
        </div>
        <div class="container">
            <div class="row">
                <?php checkVerification();?>
            </div>
            <div class="row">
                <?php
                    echo "<br>";
                    if(isset($_GET['cat_id']) and $_GET['cat_id']>0){
                        getProductsByCategory($_GET['cat_id']);
                    }
                    elseif(!isset($_GET['cat_id'])){
                        getProducts();
                    }
                    else{
                        echo "Invalied URL!";
                    }
                ?>
            </div>
        </div>
        <?php
        include "includes/footer.php";
        ?> 
    </body>
</html>