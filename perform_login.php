<?php
	session_start();
	include("includes/dbconnect.php");//connecting to dataBase Project

	$user_name=$_POST['username'];
	$user_password=$_POST['password'];
	$query="SELECT * FROM `users` WHERE `username` = '$user_name' AND `password` = '$user_password'";
	$result=mysqli_query($con, $query);
	$num_rows=mysqli_num_rows($result);

	if($num_rows==1)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['username']=$row['username'];
		$_SESSION['id']=$row['id'];
		$_SESSION['is_logged_in']=1;
		if($row['type']=="user" or $row['type']=="newuser")
		{
  			header("Location:index.php");
		}
		else if($row['type']=="admin")
		{
			header('Location: admin/profile.php');
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Please Check your Email or password")';
		echo '</script>';
		session_destroy();
  		echo "<script> location.href='login.php'; </script>";
	}
?>