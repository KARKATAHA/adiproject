<?php
/*$var=\"aditya\";
$var2=\"kumar\";
$var3=$var.\"/\".$var2;
echo $var3;*/
/*function add($a,$b){
	return ($a+$b);
}
$c=add(2,4);
echo $c;*/
/*if(isset($_GET[\"id\"])){
	$var=$_GET[\"id\"];
	echo $var;
}*/

//$_POST[\"name\"]=\"Aditya\";

?>
<?php
/*
session_start();
include "includes/dbconnect.php";
include "functions/function.php";
if($_SESSION['is_logged_in']==0){
        header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html>
  <?php
        include "includes/header.php";
    ?>
<body>
    <?php
        include "includes/navbar.php";
        ?>
      <div class="container">

      <div class="row">
        <h1 class="text_center">Added Products</h1>

        <?php

        $user_id=$_SESSION['id'];
        $query="SELECT * FROM `user_cart` LEFT JOIN `products` ON `products`.`product_id`=`user_cart`.`product_id` WHERE `cart_id`= '$user_id'";

        $result=mysqli_query($con, $query);
        $sum=0;
        $num_rows=mysqli_num_rows($result);
        for($i=0;$i<$num_rows;$i++)
        {
          $row=mysqli_fetch_array($result);
          $sum=$sum+$row['product_count']*$row['product_price'];
                ?>
            <table id='cart' class='table table-hover table-condensed'>
                <?php
                  echo "<thead>
                            <tr>
                                <th style='width:30%'>Product</th>
                                <th style='width:20%'>Price</th>
                                <th style='width:8%'>Quantity</th>
                                <th style='width:22%' class='text-center'>Subtotal</th>
                                <th style='width:20%'></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-th='Product'>
                                    <div class='row'>
                                        <div class='col-sm-3 hidden-xs'><img src=\"images/".$row['prod_img_file']."\" alt='...' class='img-responsive'/></div>
                                        <div class='col-sm-9'>
                                            <h4 class='nomargin'>".$row['product_name']."</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th='Price'>".$row['product_price']."</td>
                                <td data-th='Quantity'>
                                    <input type='number' class='form-control text-center' name=\"prod_count\" value=".$row['product_count'].">
                                </td>
                                <td data-th='Subtotal' class='text-center'>".$row['product_count']*$sum."</td>
                                  <td class='actions' data-th=\"\">
                                    <a class='btn btn btn-info btn-sm' href=\"perform_update_prod.php?key="
                                    .$row['product_id']."\"><i class='fa fa-refresh'></i></a>
                                    <a class='btn btn-danger btn-sm' href=\"perform_delete_prod.php?id="
                                    .$row['product_id']."\"><i class='fa fa-trash-o'></i></a>
                                  </td>
                                
                            </tr>
                        </tbody>";
                        if(isset($_POST['update'])){
                          header('Location:index.php');
                        }
                        if(isset($_POST['delete'])){
                          header('Location:customer/my_account.php');
                        }
        }
        ?>
                    <tfoot>
                        <tr>
                            <td><a href='#' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a></td>
                            <td colspan='2' class='hidden-xs'></td>
                            <td class='hidden-xs text-center'><strong>Total <?= $sum?></strong></td>
                            <td><a href='#' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a></td>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
*/
echo "<input type='number' class='form-control text-center' name=\"prod_count\" value=2>
      <a href=\"test1.php\" value=\"submit\">submit</a>";
check($_POST['prod_name']);
?>
