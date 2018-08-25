<?php

include_once "../dbconnect.php";
include_once "../session.php";

if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["subject"])){
	
	$file_path = "../img/";
	$title = $_POST["title"];
	$content = $_POST["content"];
	$subject = $_POST["subject"];
	$user = $_SESSION["user"];

	$sql = "INSERT INTO `boards`(`_id`, `b_title`, `b_content`, `b_time`, `b_user`, `b_subject`) VALUES";
	$sql .= "('', '{$title}', '{$content}', now(), '{$user}', {$subject})";

	$res = $dbconnect -> query($sql);

	if($res)
		$board_write_res = "ok";
	else
		$board_write_res = "fail2";
	
	#$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    	
	#if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        #	echo "success";
    	#} 
	#else{
        #	echo "fail";
    	#}


	echo $board_write_res;
	
}
else{
	$board_write_res = "parameter error";
	
	echo $board_write_res;
}

?>
