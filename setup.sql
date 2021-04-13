-- Creando la base de datos
CREATE DATABASE IF NOT EXISTS task_db;

-- Creando las tablas
CREATE TABLE IF NOT EXISTS task_db.tasks (
  id INT(11) AUTO_INCREMENT,
  user_email INT(11) NOT NULL,
  title VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_email) REFERENCES users(email)
);

CREATE TABLE IF NOT EXISTS task_db.users (
	id INT(11) AUTO_INCREMENT,
  user_name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(256) NOT NULL,
  PRIMARY KEY(id)
);