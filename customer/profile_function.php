<?php
function getProfilePicture(){
	global $con;
	$user_id=$_SESSION['id'];
	$query="select * from users where id='$user_id'";
	$result=mysqli_query($con,$query);
	$num_rows=mysqli_num_rows($result);
	if($num_rows==1){
		$row=mysqli_fetch_array($result);
		$imgFileName=$row['img_file_name'];
		return $imgFileName;
	}
}
?>