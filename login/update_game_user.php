<?php

$table_name = 'game_user';

$user_id = $_REQUEST['user_id'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$user_active = $_REQUEST['user_active'];

include 'conn.php';

$sql = "update $table_name set username='$username',password='$password',user_active='$user_active' where user_id=$user_id ";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>