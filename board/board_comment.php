<?php

include_once "../dbconnect.php";
include_once "../session.php";

if(isset($_POST['content']) && $_POST['board_id'] && $_SESSION['nickname']){
	$content = $_POST['content'];
	$board_id = $_POST['board_id'];
	$nic = $_SESSION['nickname'];
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO comments(c_user, c_content, c_time, c_board_id) VALUES ";
        $sql .= "('{$nic}', '{$content}', now(), {$board_id})";

        $res = $dbconnect -> query($sql);

        if($res)
                $board_comment_res = "ok";
        else
                $board_comment_res = "fail2";
	
	echo $board_comment_res;

}
else
	echo "세션이 없거나 내용이 업거나";
	#echo $_SESSION['nickname'].";";

?>
