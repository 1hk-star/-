<?php

include_once "../dbconnect.php";

$res_board_list = array();

if(isset($_GET["page"]) && isset($_GET["subject"])){

	$page = $_GET["page"]*10;
	$subject = $_GET["subject"];
	
	$sql = "SELECT _id, b_title, b_content, b_time, b_user FROM boards where b_subject = {$subject}";
	$sql.= " order by _id desc LIMIT {$page}, 10" ;

	$res = $dbconnect -> query($sql);

	while($row = $res->fetch_assoc()){
		$var = array(
			'_id' => $row['_id'],
			'title' => $row['b_title'],
			'content' => $row['b_content'],
			'time' => $row['b_time'],
			'nic' => $row['b_user']
		);
		array_push($res_board_list, $var);
	}
	?>
	<pre>
	<?php
	echo json_encode($res_board_list, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	?>
	</pre><?php
}
else{
	$res_board_list = "no request parameter";

	echo json_encode($res_board_list, JSON_UNESCAPED_UNICODE);
}

?>
