/*CRIAR O BANCO DE DADOS*/
CREATE DATABASE IF NOT EXISTS sefa;

/*CONECTAR-SE À BASE DE DADOS CRIADA*/
USE sefa;

/*Excluir qualquer coisa que tenha no banco de dados*/
DROP TABLE IF EXISTS usuario;

/*Criar a tabela produto*/
CREATE TABLE usuario(
    id          int(12) zerofill not null auto_increment,
    nome        varchar(30)     not null,
    usuario   varchar(50)     not null unique,
    senha   varchar(30) not null,
    grupo   varchar(100) not null,
    CONSTRAINT pk_usuario PRIMARY KEY(id)
);
