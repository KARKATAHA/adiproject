<?php
	include "includes/dbconnect.php";//Connecting to database.

	//checking if input given is blank or not.

	if($_POST['username']==NULL or $_POST['email']==NULL or $_POST['password']==NULL){
		echo '<script language="javascript">';
		echo 'alert("Fill the Information properly")';
		echo '</script>';
  		include("index.php");
	}
	else{
		$user_name=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$query="SELECT `email` FROM `users` where `username`= '$user_name'";

		$result=mysqli_query($con, $query);
		$num_rows=mysqli_num_rows($result);

		//If username already existing in database.
		if($num_rows==1){
			echo '<script language="javascript">';
			echo 'alert("UserName Already Exist")';
			echo '</script>';
			echo "<script> location.href='login.php'; </script>";
		}


		$query="SELECT `email` FROM `users` where `email`= '$email'";
		$result=mysqli_query($con, $query);
		$num_rows=mysqli_num_rows($result);

	    //Checking email already exist or not

		if($num_rows==1){
			echo '<script language="javascript">';
			echo 'alert("Email Already Registered")';
			echo '</script>';
			echo "<script> location.href='login.php'; </script>";
		}
		else{
			$query="INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`) VALUES (NULL, '$user_name', '$password', '$email','user')";
			if(mysqli_query($con,$query)){
	     //query are in objective to access individual element convert into array
  				$_SESSION['reg']=1;
  				echo '<script language="javascript">';
				echo 'alert("Registration Succesful")';
				echo '</script>';
  				echo "<script> location.href='login.php'; </script>";
  			}
	}
	}
?>