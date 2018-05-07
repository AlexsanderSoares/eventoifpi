create database eventoifpi;

use eventoifpi;

create table usuarios(
	nome varchar(100),
    login varchar(50),
    senha varchar(50)
);

insert into usuarios(nome, login, senha) values ("Alexsander", "alex123", "123456789");