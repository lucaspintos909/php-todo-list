-- Creando la base de datos
CREATE DATABASE IF NOT EXISTS `php-mysql`;

-- Creando tablas
CREATE TABLE IF NOT EXISTS `php-mysql`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));
