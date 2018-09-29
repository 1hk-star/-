<?php

include_once "../dbconnect.php";

$sql = "SELECT _id, a_title, a_like FROM activity order by a_like desc limit 10";

$res = $dbconnect -> query($sql);

$list = array();

while($row = $res->fetch_assoc()){

	$var = array(
	'_id' => $row['_id'],
	'title'=> $row['a_title'],
	'likes'=> $row['a_like']
	);
	
	array_push($list, $var);

}

echo json_encode($list, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

?>
