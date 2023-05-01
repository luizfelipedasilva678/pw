create database if not exists aula07;
use aula07;

create table if not exists conta(
    id int not null auto_increment primary key,
    saldo decimal(15,2) default 0,
    cpf char(11) not null unique,
    dono varchar(50) not null,
    senha char(64) not null
)engine=INNODB;