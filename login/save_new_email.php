<?php
$table_name = 'game_user_email';

$sender_id = $_REQUEST['sender_id'];
$reader_id = $_REQUEST['reader_id'];
$mail_title = $_REQUEST['mail_title'];
$mail_content = $_REQUEST['mail_content'];

include 'conn.php';

$sql = "insert into $table_name(sender_id,reader_id,mail_title,mail_content) values('$sender_id','$reader_id','$mail_title','$mail_content')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>