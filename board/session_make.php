<?php

include_once "../session.php";

$_SESSION['user'] = "hello2";
$_SESSION['nickname'] = "hellowww";

echo session_id();

?>
