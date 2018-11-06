/*CRIAR O BANCO DE DADOS*/
CREATE DATABASE IF NOT EXISTS sefa;

/*CONECTAR-SE À BASE DE DADOS CRIADA*/
USE sefa;

/*Excluir qualquer coisa que tenha no banco de dados relacionada à tabela "usuario" a ser criada*/
DROP TABLE IF EXISTS usuario;

/*Criar a tabela usuario*/
CREATE TABLE usuario(
    idUsuario   int(12)         not null   unique   auto_increment,
    nome        varchar(30)     not null,
    usuario     varchar(50)     not null   unique,
    senha       varchar(30)     not null,
    grupo       varchar(100)    not null,
    CONSTRAINT pk_usuario PRIMARY KEY(idUsuario)
);

/*Excluir qualquer coisa que tenha no banco de dados relacionada à tabela "acesso" a ser criada*/
DROP TABLE IF EXISTS acesso;

/*Criar a tabela acesso*/
CREATE TABLE acesso(
    idAcesso          int(12)         not null,
    tipo        varchar(30)     not null,
    CONSTRAINT pk_acesso PRIMARY KEY(idAcesso)
);

/*Excluir qualquer coisa que tenha no banco de dados relacionada à tabela "grupo" a ser criada*/
DROP TABLE IF EXISTS grupo;

/*Criar a tabela acesso*/
CREATE TABLE grupo(
    idGrupo          int(12)         not null,
    descricao        varchar(30)     not null,
    CONSTRAINT pk_grupo PRIMARY KEY(idGrupo)
);
