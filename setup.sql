-- Creando la base de datos
CREATE DATABASE IF NOT EXISTS task_system;

-- Creando tablas
CREATE TABLE IF NOT EXISTS task_system.task (
  id INT(11) AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS task_system.users (
	id INT(11) AUTO_INCREMENT,
    user_name VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL,
    password VARCHAR(256) NOT NULL,
    primary key(id)
);