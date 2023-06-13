create database if not exists xpto;
use xpto;

create table noticia (
    id int auto_increment primary key,
    titulo varchar(100) not null,
    conteudo varchar(500) not null,
    usuario varchar(100) not null,
    created_at timestamp default current_timestamp
) engine=InnoDB;

