<?php
$table_name = 'game_user_email';

$mail_id = intval($_REQUEST['mail_id']);
$sender_id = $_REQUEST['sender_id'];
$reader_id = $_REQUEST['reader_id'];
$mail_title = $_REQUEST['mail_title'];
$mail_content = $_REQUEST['mail_content'];

include 'conn.php';

//注意语句里没有单引号 where mail_id=$mail_id

$sql = "update $table_name set sender_id='$sender_id',reader_id='$reader_id',mail_title='$mail_title',mail_content='$mail_content' where mail_id=$mail_id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>