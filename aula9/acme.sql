create database if not exists acme;
use acme;

create table categoria(
    id int auto_increment primary key,
    nome varchar(50) unique
)engine=INNODB;

create table materia_prima(
    id int auto_increment primary key,
    id_categoria int not null,
    descricao varchar(100) not null unique,
    quantidade int default 0,
    custo decimal(15,2) not null,
    constraint `fk_materia_prima_id_categoria`
    foreign key(id_categoria) references categoria(id) 
        on delete restrict 
        on update cascade
)engine=INNODB;

insert into categoria(nome) values('Carro');
insert into categoria(nome) values('Casa');
insert into categoria(nome) values('Barco');
insert into categoria(nome) values('Contrução');

select mp.id as materia_prima_id, mp.descricao, mp.custo, mp.quantidade, c.id as categoria_id, c.nome
from materia_prima mp
join categoria c on(mp.id_categoria = c.id)