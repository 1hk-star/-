<?php

include_once "../session.php";

	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$conn = mysqli_connect("localhost", "root", "awesomeflower", "awesomeflower");
	if(!$conn){
		print "Error - Could not connect to MySQL: ".mysqli_error();
		exit;
	}
	
	$sql = "SELECT * FROM `users` WHERE `u_id` = '".$user."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			if(isset($row['u_id']) && $row['u_id'] != ''){
				$password = sha1("security".$password);
				if($row['u_password'] == $password){
					#$_SESSION['login_user'] = array();
					$_SESSION['user'] = $row['u_id'];
					$_SESSION['nickname'] = $row['u_nick_name'];

					echo json_encode(['login_res' => 1, 'user' => $user, 'nick_name' => $row['u_nick_name'], 'session_id' => session_id()]);
					exit;
				}
			}
		}
	}
	

	echo "fail";
	
?>
