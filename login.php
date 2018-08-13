			
<?php
session_start();
include "functions/function.php";
if(isset($_SESSION['is_logged_in'])){
    if($_SESSION['is_logged_in']==1){
        header('Location: profile.php');
    }
}
?>

<!DOCTYPE html>
<html>

<?php
    include "includes/header.php";
    include "script/login_reg_form.jsp";
?>
<body>

	<?php
        include "includes/navbar.php";
    ?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                include('login_form.php');
                                include('registration_form.php');
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//include 'includes/footer.php';
?>
</body>
</html>
