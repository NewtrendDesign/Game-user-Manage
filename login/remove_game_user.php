<?php

$id = intval($_REQUEST['id']);
$table_name = 'game_user';
$id_field = 'user_id';

include 'conn.php';

//注意页面传来的参数是{id:row.user_id}中的id，而不是后面的user_id
$sql = "delete from $table_name where $id_field = $id";

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>