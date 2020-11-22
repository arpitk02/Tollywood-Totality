<?php
	include 'connect.php';

	$cname=$_POST['cname'];

	$sql = "INSERT INTO `category`(`c_name`) VALUES ('$cname')";
	
	if (mysqli_query($con, $sql)) {
		
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

 


?>