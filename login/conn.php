<?php

$conn = @mysql_connect('127.0.0.1','root','');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('manfeng_game_test', $conn);	#设置活动的 MySQL 数据库

?>