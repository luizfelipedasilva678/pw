create database acme;
use acme;

CREATE TABLE produto (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(100) NOT NULL,
	preco DECIMAL(10,2) NOT NULL,
    codigo INT NOT NULL,
    estoque INT 
) ENGINE=INNODB;

CREATE UNIQUE INDEX uidx_pcodigo
ON produto (codigo);