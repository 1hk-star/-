<?php

$host = "localhost";
$user = "root";
$pw = "awesomeflower";
$dbname = "awesomeflower";

$dbconnect = new mysqli($host, $user, $pw, $dbname);
$dbconnect->set_charset("utf8");

if(mysqli_connect_errno()){
	echo "데이터베이스 접속 실패";
	echo mysqli_connect_errno();
}

?>
