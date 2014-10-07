<?php
$table_name = 'game_user';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$user_active = $_REQUEST['user_active'];

include 'conn.php';

$sql = "insert into $table_name(username,password,user_active) values('$username','$password','$user_active')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>