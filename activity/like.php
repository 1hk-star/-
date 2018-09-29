<?php

	include_once "../dbconnect.php";

	if(isset($_GET['like'])&& isset($_GET['_id'])){
		
		$_id = $_GET['_id'];
		
		if($_GET['like']==1){
			$sql = "UPDATE activity SET a_like = a_like + 1 where _id = {$_id}";
		}
		else{
			$sql = "UPDATE activity SET a_like = a_like - 1 where _id = {$_id}";
		}
		$res = $dbconnect -> query($sql);

		if($res)
			echo "ok";
		else 
			echo "fail";
	}
	else
		echo "no param";

?>
