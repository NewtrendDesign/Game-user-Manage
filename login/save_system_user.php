<?php
$table_name = 'system_user_table';

$member_name = $_REQUEST['member_name'];
$member_password = $_REQUEST['member_password'];
$member_type = $_REQUEST['member_type'];
$member_active = $_REQUEST['member_active'];

include 'conn.php';

$sql = "insert into $table_name(member_name,member_password,member_type,member_active) values('$member_name','$member_password','$member_type','$member_active')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>