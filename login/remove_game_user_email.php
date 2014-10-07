<?php

$table_name = 'game_user_email';

//注意页面传来的参数是{id:row.mail_id}中的id，而不是后面的mail_id

$mail_id = intval($_REQUEST['id']);

include 'conn.php';

$sql = "delete from $table_name where mail_id=$mail_id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>