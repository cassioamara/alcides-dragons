CREATE DATABASE jogo;

CREATE TABLE personagem (
id INT AUTO_INCREMENT,
servidor VARCHAR(30),
classe VARCHAR(30),
raca VARCHAR(30),
genero VARCHAR(5),
nome VARCHAR(50),

PRIMARY KEY (id)
);

INSERT INTO personagem (servidor,classe,raca,genero,nome) VALUES ("Middle-Earth", "Ranger", "Humano", "m", "Faramir");