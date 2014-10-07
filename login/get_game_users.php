<?php
	$table_name = 'game_user';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1; #是否预先设置了页码,如有按设定的页码,没有则设置当前页码为1
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; #是否预先设置了页面行数,如有按设定的行数,否则每页的行数为10
	$offset = ($page-1)*$rows;	#根据当前页码设置记录偏移量
	$result = array();			#定义结果集数组

	include 'conn.php';			#设置当前活动的数据库连接
	
	$rs = mysql_query("select count(*) from $table_name");	#获得记录总数
	$row = mysql_fetch_row($rs);	#获得查询结果作为数组
	$result["total"] = $row[0];		#查询结果只有一条记录$row[0],记录表当中究竟有几笔记录
	$rs = mysql_query("select * from $table_name limit $offset,$rows");#当前页面显示当前页码所对应的所有记录
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);	#向items数组尾部逐一循环添加一个记录元素（入栈），然后返回新数组的长度 
	}
	$result["rows"] = $items;		#带有字符串键的数组下标,存放实际的记录资料的阵列集

	echo json_encode($result);

?>