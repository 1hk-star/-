<?php
	$user = $_POST['user'];
	$password = $_POST['password'];
	$nick_name = $_POST['nick_name'];
	
	$conn = mysqli_connect("localhost", "root", "awesomeflower", "awesomeflower");
	$conn->set_charset("utf8"); #한글 설정

	if(!$conn){
		print "Error - Could not connect to MySQL: ".mysqli_error();
		exit;
	}
	
	$sql = "SELECT * FROM `users` WHERE `u_id` = '".$user."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			if(isset($row['u_id']) && $row['u_id'] != ''){
				echo "2";
				exit;
			}
		}
	}
	
	
	$sql = "SELECT * FROM `users` WHERE `u_nick_name` = '".$nick_name."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			if(isset($row['u_nick']) && $row['u_nick'] != ''){
				echo "2";
				exit;
			}
		}
	}
	

	$password = sha1("security".$password);
	//======INSERT INTO `users` (`_id`, `u_id`, `u_nick_name`, `u_password`) VALUES ('0', 'asd', 'asd', 'sad');
	$sql = "INSERT INTO `users` (`_id`, `u_id`, `u_nick_name`, `u_password`) VALUES ('0', '".$user."', '".$nick_name."', '".$password."')";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo "1";
	}
	exit;
?>
