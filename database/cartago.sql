SET SESSION FOREIGN_KEY_CHECKS=0;

/* Drop Tables */

DROP TABLE IF EXISTS user_stories;




/* Create Tables */

CREATE TABLE user_stories
(
	-- Id de la historia de usuario
	uuid varchar(36) NOT NULL COMMENT 'Id de la historia de usuario',
	-- Nombre de la historia de usuaro
	name varchar(60) NOT NULL COMMENT 'Nombre de la historia de usuaro',
	PRIMARY KEY (uuid),
	UNIQUE (uuid)
);



