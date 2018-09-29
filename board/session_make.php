<?php

include_once "../session.php";

$_SESSION['user'] = "hello";
$_SESSION['nickname'] = "hellowww";

echo session_id();

?>
