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
                    if(isset($_GET['search'])){
                        if($_GET['user_query']){
                            getProductsByQuery($_GET['user_query']);
                        }
                        else{
                            getProducts();
                        }
                    }
                    else{
                        getProducts();
                    }
                ?>
            </div>
        </div>
        <?php
        include "includes/footer.php";
        ?> 
    </body>
</html>