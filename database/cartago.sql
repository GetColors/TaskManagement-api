SET SESSION FOREIGN_KEY_CHECKS=0;

/* Drop Tables */

DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS user_stories;




/* Create Tables */

CREATE TABLE tasks
(
	-- id de la tarea
	-- 
	id varchar(36) NOT NULL COMMENT 'id de la tarea
',
	-- Nombre de la tarea
	name varchar(50) NOT NULL COMMENT 'Nombre de la tarea',
	-- Descripcion de la tarea
	description text COMMENT 'Descripcion de la tarea',
	-- Id de la historia de usuario
	user_story_id varchar(36) NOT NULL COMMENT 'Id de la historia de usuario',
	PRIMARY KEY (id),
	UNIQUE (id)
);


CREATE TABLE user_stories
(
	-- Id de la historia de usuario
	id varchar(36) NOT NULL COMMENT 'Id de la historia de usuario',
	-- Nombre de la historia de usuaro
	name varchar(60) NOT NULL COMMENT 'Nombre de la historia de usuaro',
	PRIMARY KEY (id),
	UNIQUE (id)
);



/* Create Foreign Keys */

ALTER TABLE tasks
	ADD FOREIGN KEY (user_story_id)
	REFERENCES user_stories (id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



