<?php
error_reporting(0);

//预定义数据库连接参数
$mysql_servername = "127.0.0.1";	//主机地址
$mysql_username = "root";			//数据库用户名
$mysql_password = "";				//数据库用户密码
$mysql_database = "manfeng_game_test";		//数据库名称
$database_table = "system_user_table";		//登录表

//登录连接数据库
$conn = mysql_connect($mysql_servername, $mysql_username, $mysql_password);
if (!$conn)
  {  die('Could not connect: ' . mysql_error());
  }
  //else{echo 'connect mysql ok!' . '<br/>';}
$db_selected = mysql_select_db($mysql_database,$conn);

if (!$db_selected)
  {  die ("Can\'t use db : " . mysql_error());
	 mysql_close($con);
  }
  //else{echo 'db select ok!' . '<br/>';}

/*对登录用户输入字段进行值过滤*/
$name = addslashes(htmlspecialchars($_POST['username']));
$passsword = addslashes(htmlspecialchars($_POST['password']));

//echo 'User = ' . $name .'<br/>';
//echo 'Password = ' . $passsword .'<br/>';
 
//if (1){
$sql = "SELECT member_type FROM $database_table WHERE member_name = '$name' and member_password='$passsword'";
$res = mysql_query($sql);
$row = mysql_fetch_row($res);	#将获得的查询结果作为数组保存起来，这个数组将只有一个成员变量
//print_r($row);

//将唯一的一条数组记录作为SESSION变量保存
session_start();
$_SESSION["member_type"]=$row[0];
$_SESSION["member_user"]=$name;

//echo $_SESSION["member_type"];
//echo '<br /><a href="http://localhost/wordpress/JEasyUI/User-and-Email-Reply/main.php">index</a>';

//mysql_num_rowsPHP函数，取查询结果集当中行的数目.命令只对SELECT语句有效。
$rows = mysql_num_rows($res);
if($rows){
//如果用户名密码匹配正确则成功跳转页面，否则退回登录页面
echo "<script>location.href='http://localhost/wordpress/JEasyUI/User-and-Email-Reply/main.php';</script>";
exit;
}else{
echo "<script language=javascript charset= \"utf-8\">alert('UserName or Password Error!Please Rerty again!');history.back(); </script>";}
?>