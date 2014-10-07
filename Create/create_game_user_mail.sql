# Create game_user_email table for Manfeng_Game_Test_DB
# 为漫风测试数据库创建邮件信息表,表字段包括：发信用户ID、收信用户ID、邮件ID、邮件标题、邮件正文、已阅读状态(默认未阅读)

SET NAMES utf8;
DROP TABLE IF EXISTS `game_user_email`;
#@ _CREATE_TABLE_
CREATE TABLE `game_user_email`
(
  `mail_id`		INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`mail_id`),
  `sender_id`		INT UNSIGNED NOT NULL, 
  `reader_id`		INT UNSIGNED NOT NULL, 
  `mail_title`		VARCHAR(64) NOT NULL, 
  `mail_content`	VARCHAR(1000) NOT NULL,
  `send_time`		timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  `read_mark`		ENUM('False','True') NOT NULL DEFAULT 'False',
  `delete_mark`		ENUM('False','True') NOT NULL DEFAULT 'False',  
  FOREIGN KEY (`sender_id`) REFERENCES `game_user`(`user_id`) on update cascade on delete cascade,
  FOREIGN KEY (`reader_id`) REFERENCES `game_user`(`user_id`) on update cascade on delete cascade
)ENGINE=InnoDB;
#@ _CREATE_TABLE_