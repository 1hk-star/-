<?php

include_once "../dbconnect.php";
include_once "../session.php";

if(isset($_GET['board_id'])){
	
	$board_id = $_GET['board_id'];	

	$sql = "select b_title, b_time, b_user, b_subject, b_content from boards wherer id = {$board_id}";
	$res = $dbconnect -> query($sql);

	if($res){
		$row = $res -> fetch_assoc();
		

	}

	
}

?>
