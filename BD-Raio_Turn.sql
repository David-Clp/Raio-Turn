create database raio_turn;
use raio_turn;

create table usuarios(
	id int(11) not null auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf varchar(20) not null,
    cidade varchar(50) not null,
    estado char(2) not null,
    senha varchar(255) not null,
    avatar varchar(255) not null,
    is_admin tinyint(1) not null
);

create table classe_material(
id int(2) not null auto_increment primary key,
designacao char(5) not null,
imagem varchar(255) not null,
voltagem varchar(3),
material varchar(255)
);

