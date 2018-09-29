<?php 

include_once "../dbconnect.php";

if(isset($_GET['board_id']) && isset($_GET['type'])){

	$file_path = "../img/";
	$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
        $board_id = $_GET['board_id'];
	$type = $_GET['type'];
	
	if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        	echo "success";
	}
	else{
        	echo "fail";
	}

	$file_name = basename( $_FILES['uploaded_file']['name']);
	
	$sql = "INSERT INTO pic(p_type, p_origin, p_title) VALUES ";
	$sql .= "VALUES ({$board_id}, {$type}, '{$file_name}')";

	$res = $dbconnect -> query($sql);

	if($res)
		echo "ok";
	else
		echo "fail";
}
else
	echo "아이디, 타입 없음";

?>

