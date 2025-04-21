CREATE DATABASE teste_criar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use teste_criar

SHOW databases;
SHOW tables;
CREATE USER 'claudia_criar'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON nome_do_banco.* TO 'claudia_criar'@'localhost';
