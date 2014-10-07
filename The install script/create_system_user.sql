# Create system_user_table for Manfeng_Game_Test_DB
# 为漫风测试数据库创建系统用户表,表字段包括：系统用户ID、用户名、口令、创建时间、成员类型、激活状态(默认未激活)

SET NAMES utf8;
DROP TABLE IF EXISTS `system_user_table`;
#@ _CREATE_TABLE_
CREATE TABLE `system_user_table`
(
  `member_id`  		INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`member_id`),
  `member_name`		VARCHAR(32) NOT NULL UNIQUE KEY, 
  `member_password` VARCHAR(64) NOT NULL, 
  `member_type`		ENUM('Super','Normal','Member') NOT NULL  DEFAULT 'Normal',  
  `member_active`	ENUM('True','False') NOT NULL DEFAULT 'True',
  `create_time`		timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)  ENGINE=InnoDB;

UPDATE system_user_table SET `member_password` = MD5(`member_password`);
#@ _CREATE_TABLE_