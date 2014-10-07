# Create game_user table for Manfeng_Game_Test_DB
# 为漫风测试数据库创建游戏用户表,表字段包括：用户ID、用户名、口令、创建时间、激活状态(默认值激活)

SET NAMES utf8;
DROP TABLE IF EXISTS game_user;
#@ _CREATE_TABLE_
CREATE TABLE game_user
(	user_id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (user_id),
  username  		VARCHAR(32) NOT NULL UNIQUE KEY, 
  password			VARCHAR(64) NOT NULL, 
  user_active		ENUM('True','False') NOT NULL DEFAULT 'True',
  create_time		timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP)
  ENGINE=InnoDB;

UPDATE game_user SET `password` = MD5(`password`);
#@ _CREATE_TABLE_