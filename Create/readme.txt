======================================

MySQL系统当中导入sql的命令行如下:
Import the sql files in MySQL SHELL:

source  "Pathname"+*/*.sql

======================================
首先登录MySQL /Login MySQL

c:\>mysql -u root -p
	
mysql>	source  E:/test/create_db.sql;
mysql>	use manfeng_game_test; 

mysql>	status;

source  E:/test/create_game_user.sql;
source  E:/test/insert_game_user.sql;

mysql>	select * from game_user;

source  E:/test/create_system_user.sql;
source  E:/test/insert_system_user.sql;

mysql>	select *from system_user_table;

source  E:/test/create_game_user_mail.sql;
source  E:/test/insert_game_user_mail.sql;

mysql>	select *from game_user_email;