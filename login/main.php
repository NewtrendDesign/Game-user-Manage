 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta charset="UTF-8">
    <title>EasyUI LayOut后台框架</title>  
    <script src="../jquery-easyui-1.4/jquery.min.js" type="text/javascript"></script>  
    <script src="../jquery-easyui-1.4/jquery.easyui.min.js" type="text/javascript"></script>  
    <link href="../jquery-easyui-1.4/themes/default/easyui.css" rel="stylesheet" type="text/css" />  
    <link href="../jquery-easyui-1.4/themes/icon.css" rel="stylesheet" type="text/css" />

<script language="JavaScript">  
	function addTab(title, url){
		if ($('#tab_home').tabs('exists', title)){
			$('#tab_home').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tab_home').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
</script>  
<style>  
    .footer {  
            width: 100%;  
            text-align: center;  
            line-height: 35px;  
        }  
    .top-bg {  
            background-color: #d8e4fe;  
            height: 80px;  
        }  
</style>
</head>
	<body class="easyui-layout"><!--layout布局-->
	
		<div region="north" border="true" split="true" style="overflow: hidden; height: 80px;"><!--头部--> 
			<div class="top-bg"></div>  
		</div> 
		<div region="south" border="true" split="true" style="overflow: hidden; height: 40px;">  
			<div class="footer">版权所有：<a href="http://www.manacg.com">漫风工作室</a></div><!--页脚-->
		</div>  
		
		<!--左侧-->
		<div region="west" split="true" title="导航菜单" style="overflow: hidden; width: 250px;"> 

		<?php

		$mail_manage =  <<<STR
            <div title="邮件管理" iconcls="icon-email-open" style="overflow: auto; padding: 10px;">  
			
				<!--树状菜单,动画切换效果-->
                <ul class="easyui-tree" , data-options="animate:true">  
				    <li iconcls="icon-email-add" >  
                        <span><a onclick="addTab('写信','http://localhost/wordpress/JEasyUI/User-and-Email-Reply/write_email.html' )">写信</a></span>  
                    </li>  
                    <li>  
                        <span><a onclick="addTab('信件管理','http://www.baidu.com')">信件管理</a></span>  
                        <ul>  
                            <li  iconcls="icon-email">  
                                <span><a onclick="addTab('未阅读','http://www.baidu.com')">未阅读</a></span>  

                            </li>  
                            <li iconcls="icon-email-open">  
                                <span><a onclick="addTab('已阅读','http://www.baidu.com')">已阅读</a></span>  
                            </li>  
                            <li iconcls="icon-email-reply">  
                                <span><a onclick="addTab('已回复','http://www.baidu.com')">已回复</a></span>  
                            </li>  
							<li iconcls="icon-email-delete">  
                                <span><a onclick="addTab('已删除','http://www.baidu.com')">已删除</a></span>  
                            </li>  
                        </ul>  
                    </li>  

                </ul>  
            </div>
STR;
			 
		$user_manage = <<<EOF
			
            <div title="用户管理" iconcls="icon-group" style="padding: 10px;">  
                <ul class="easyui-tree">  
					<li  iconcls="icon-group">  
                        <span><a onclick="addTab('用户管理','http://localhost/wordpress/JEasyUI/User-and-Email-Reply/game_user.html')">用户管理</a></span>  
						</li>	
				</ul>		
            </div>  
EOF;

		$system_maintence = <<<EOF
            <div title="系统维护" iconcls="icon-group-key"  style="padding: 10px;">  
            <ul class="easyui-tree">  		
			    <li iconcls="icon-group">  
                    <span><a onclick="addTab('系统用户管理','http://localhost/wordpress/JEasyUI/User-and-Email-Reply/system_user.html')">系统用户</a></span>  
                </li>  					
			</ul>		
            </div>
EOF;

		$system_help = 	<<<EOF
			<div title="系统帮助" iconcls="icon-help"  style="padding: 10px;">
			<h3>说明:</h3>
			<span style="padding-left:1em">由超级用户维护系统的用户信息,由管理用户对普通用户增、删、改、查，普通用户能够收发自身邮件。</span>
			</div>
EOF;
		$nav_head = <<<EOF
		
			<!--采用可折叠分类菜单-->
			<div id="aa" class="easyui-accordion" multiple="true" style="position: absolute; top: 27px; left: 0px; right: 0px; bottom: 0px;">
EOF;
		$nav_end = 	<<<EOF
			<!--分类菜单内容-->
			</div>  
		</div>  
EOF;
		if (!session_id()) session_start();
		echo $nav_head;
			
			if ( 'Normal' == $_SESSION["member_type"] ){
			echo $mail_manage;
			echo $system_help;} else if ('Member' == $_SESSION["member_type"])
			{ 
			echo $mail_manage; 
			echo $user_manage;
			echo $system_help;} else if ('Super' == $_SESSION["member_type"])
			{
			echo $mail_manage; 
			echo $user_manage;
			echo $system_maintence;
			echo $system_help;
			}
		echo $nav_end;
?>
	<!--内容区-->					
    <div id="mainPanle" region="center" style="overflow: hidden;">  	
		<div id="tab_home" class="easyui-tabs" style="padding: 0px; overflow: hidden; width:100%; height:560px;">  
            <div title="主页">
				<h3>Welcome to jQuery UI!</h3>
			</div>
        </div>  
    </div>  
	
</body>  
</html>