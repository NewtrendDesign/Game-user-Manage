<?php

$table_name = 'system_user_table';
$member_id = $_REQUEST['member_id'];
$member_name = $_REQUEST['member_name'];
$member_password = $_REQUEST['member_password'];
$member_type = $_REQUEST['member_type'];
$member_active = $_REQUEST['member_active'];

include 'conn.php';

$sql = "update $table_name set member_name='$member_name',member_password='$member_password',member_type='$member_type',member_active='$member_active' where member_id=$member_id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>