<?php
session_start();

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
?>


<!--<script type="text/javascript">
    $(document).ready(function(){
      $('#para').click(function(){
        $('.register_form').addClass('vanish');
        $('.login_form').removeClass('vanish');
      })

      $('#para2').click(function(){
        $('.login_form').addClass('vanish');
        $('.register_form').removeClass('vanish');
      })
    })
</script>
-->


<body>

	<?php
        include "includes/navbar.php";
    ?>


    <div class="container">
    	<div class="row">
    		<div class="col-md-7">
    			<h1 class="text_center super_large white" >Project on Web Dewelopment</h1>
    		</div>
    		<div class="col-md-5">

    			<div class="register_form white">
    				<form class="form" method="POST" action="Perform_reg.php">
                        <label>Username:</label><br>
                        <input type="text" class="form-control" name="username"><br>
	    				<label>Email:</label><br>
	    				<input type="email" class="form-control" name="email"><br>
	    				<label>Password:</label><br>
	    				<input type="password" class="form-control" name="password"><br>
	    				<input id="register" type="submit" value="Register Me" class="btn btn-success btn-block">
	    			</form>
	    			<a href="login.php">Already a member? Sign In</a>
    			</div>

    			
    			
    		</div>    		
    	</div>
    </div>
<?php
//include 'includes/footer.php';
?>
</body>
</html>
