<?php
	$table_name = 'game_user_email';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1; #是否设置了页码,有的话按照页码,没有的话设置当前页码为1
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; #是否设置了行数,有的话按照行数,否则每页的行数设为10
	$offset = ($page-1)*$rows;	#获取当前页码
	$result = array();			#定义结果集数组

	include 'conn.php';			#设置活动的数据库连接
	
	$rs = mysql_query("select count(*) from $table_name");	#获得记录总数
	$row = mysql_fetch_row($rs);	#获得查询结果作为数组
	$result["total"] = $row[0];		#查询结果只有一条记录$row[0],记录有几笔资料
	$rs = mysql_query("select * from $table_name limit $offset,$rows");#查询当前页码所对应的所有记录
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);#向$items数组的尾部逐一循环添加一个或多个元素（入栈），然后返回新数组的长度 
	}
	$result["rows"] = $items;		#带有字符串键的数组下标,存放实际的记录资料的阵列集

	echo json_encode($result);

?>