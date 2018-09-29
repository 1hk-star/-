<?php

include_once "../dbconnect.php";
include_once "../session.php";

if(isset($_GET['board_id']) && isset($_GET['subject'])){
	
	$board_id = $_GET['board_id'];	
	$res_board_detail = array();	

	$sql = "select b_title, b_time, b_user, b_content from boards where _id = {$board_id}";
	$res = $dbconnect -> query($sql);

	if($res){
		$row = $res -> fetch_assoc();
		$var = array(
                        'b_title' => $row['b_title'],
                        'b_content' => $row['b_content'],
                        'b_time' => $row['b_time'],
                        'b_nic' => $row['b_user']
                );
	        array_push($res_board_detail, $var);

		$sql = "select c_user, c_content, c_time from comments where c_board_id = {$board_id}";
		$res2 = $dbconnect -> query($sql);
		
		while($row2 = $res2->fetch_assoc()){
			$var2 = array(
                        'c_nic' => $row2['c_user'],
                        'c_content' => $row2['c_content'],
                        'c_time' => $row2['c_time'],
                	);
		array_push($res_board_detail, $var2);
		}
		
		echo json_encode($res_board_detail, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	else
		echo "fail!!";
	
	
}
else{
	echo "값이 없어요";
}

?>
