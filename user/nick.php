<?php

	include_once "../session.php";
	
	if(isset($_SESSION['nickname']))
		echo $_SESSION['nickname'];
	else
		echo "fail";

?>
