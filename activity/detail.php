<?php

include_once "../dbconnect.php";

if(isset($_GET['_id'])){

	$_id = $_GET['_id'];

	$sql = "select a_title, a_time, a_end_time, a_content, a_type from activity where _id = {$_id}";

	$res = $dbconnect -> query($sql);

	if($res){
		$row = $res -> fetch_assoc();
		$var = array(
			'title'=> $row['a_title'],
			'locate' => $row['a_type'],
			'date' => $row['a_time']." ~ ".$row['a_end_time'],
			'content' => $row['a_content']
		);
		echo json_encode($var, JSON_UNESCAPED_UNICONDE|JSON_PRETTY_PRINT);
			
	}
	else
		echo "fail!";
}
else
	echo "no  id";

?>
