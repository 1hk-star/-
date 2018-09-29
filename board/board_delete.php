<?php

include_once "../dbconnect.php";
include_once "../session.php";

if(isset($_POST['board_id'])){
	
	$board_id = $_POST['board_id'];
	$sql = "select b_user from boards where _id = {$board_id}";

	$res = $dbconnect -> query($sql);
	$row = $res->fetch_assoc();

	if (!strcmp($row['b_user'],$_SESSION['user'])){
		$sql = "DELETE FROM `boards` WHERE _id = $board_id";
		$res = $dbconnect -> query($sql);
		
		if($res)
			echo "ok";
		else
			echo "fail";
	}
	else
		echo "세션이랑 글 작성자가 달라";
		echo $_SESSION['user'].", ".$row['b_user'];
	
	/*
	$board_id = $_POST'board_id'];

	$sql = "DELETE FROM boards WHERE _id = {$board_id}";
        $res = $dbconnect -> query($sql);
                
                if($res)
                        echo "ok";
                else
                        echo "fail";
	*/

}
else{
	echo "글 아이디도 같이 보내야지";
}
?>
