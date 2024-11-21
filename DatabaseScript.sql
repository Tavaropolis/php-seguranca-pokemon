CREATE DATABASE IF NOT EXISTS pokedatabase;
USE pokedatabase;

-- Criação da tabela Pokémon
CREATE TABLE IF NOT EXISTS pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo1 VARCHAR(50) NOT NULL,
    tipo2 VARCHAR(50),
    evolucao VARCHAR(100),
    geracao INT NOT NULL
);

CREATE TABLE IF NOT EXISTS roles (
	id INT AUTO_INCREMENT PRIMARY KEY,
    userRole VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
	salt VARCHAR(50) NOT NULL,
    userPassword VARCHAR(300) NOT NULL,
    pepper VARCHAR(50) NOT NULL,
    roleId INT NOT NULL,
    FOREIGN KEY(roleId) REFERENCES roles(id)
); 

-- Inserção de registros
INSERT INTO roles (userRole) VALUES 
('admin'), 
('user');

INSERT INTO users (username, email, salt, userPassword, pepper, roleId) VALUES
('admin', 'admin@admin.com', '681a1303f52a4c5711bace5dec18877b', 
'26e1fd2e3a035019b90a484e93a8a287a4eba507298a7fcc17489ef6ea636bda', '86c68d6d3d335a4065cdc144daf199ed', 1);

INSERT INTO users (username, email, salt, userPassword, pepper, roleId) VALUES
('user', 'user@user.com', '4e6b379b7fc6e71892fae7e2e62a62ad', 
'6950cd18e178c9d48475b2670b45012252aea53cd8d14dc9fa6a8c3d5895ec9e', 'd77d331eb5ee2f0be72192832e333514', 2);

INSERT INTO pokemon (nome, tipo1, tipo2, evolucao, geracao) VALUES
('Bulbasaur', 'Planta', 'Venenoso', 'Ivysaur', 1),
('Ivysaur', 'Planta', 'Venenoso', 'Venusaur', 1),
('Venusaur', 'Planta', 'Venenoso', NULL, 1),
('Charmander', 'Fogo', NULL, 'Charmeleon', 1),
('Charmeleon', 'Fogo', NULL, 'Charizard', 1),
('Charizard', 'Fogo', 'Voador', NULL, 1),
('Squirtle', 'Água', NULL, 'Wartortle', 1),
('Wartortle', 'Água', NULL, 'Blastoise', 1),
('Blastoise', 'Água', NULL, NULL, 1),
('Pikachu', 'Elétrico', NULL, 'Raichu', 1),
('Pidgey', 'Normal', 'Voador', 'Pidgeotto', 1),
('Pidgeotto', 'Normal', 'Voador', 'Pidgeot', 1),
('Pidgeot', 'Normal', 'Voador', NULL, 1),
('Rattata', 'Normal', NULL, 'Raticate', 1),
('Raticate', 'Normal', NULL, NULL, 1),
('Ekans', 'Venenoso', NULL, 'Arbok', 1),
('Arbok', 'Venenoso', NULL, NULL, 1),
('Zubat', 'Venenoso', 'Voador', 'Golbat', 1),
('Golbat', 'Venenoso', 'Voador', NULL, 1),
('Machop', 'Lutador', NULL, 'Machoke', 1),
('Machoke', 'Lutador', NULL, 'Machamp', 1),
('Machamp', 'Lutador', NULL, NULL, 1),
('Gastly', 'Fantasma', 'Venenoso', 'Haunter', 1),
('Haunter', 'Fantasma', 'Venenoso', 'Gengar', 1),
('Gengar', 'Fantasma', 'Venenoso', NULL, 1),
('Geodude', 'Pedra', 'Terrestre', 'Graveler', 1),
('Graveler', 'Pedra', 'Terrestre', 'Golem', 1),
('Golem', 'Pedra', 'Terrestre', NULL, 1),
('Onix', 'Pedra', 'Terrestre', 'Steelix', 2),
('Steelix', 'Aço', 'Terrestre', NULL, 2),
('Chikorita', 'Planta', NULL, 'Bayleef', 2),
('Bayleef', 'Planta', NULL, 'Meganium', 2),
('Meganium', 'Planta', NULL, NULL, 2),
('Cyndaquil', 'Fogo', NULL, 'Quilava', 2),
('Quilava', 'Fogo', NULL, 'Typhlosion', 2),
('Typhlosion', 'Fogo', NULL, NULL, 2),
('Totodile', 'Água', NULL, 'Croconaw', 2),
('Croconaw', 'Água', NULL, 'Feraligatr', 2),
('Feraligatr', 'Água', NULL, NULL, 2),
('Hoothoot', 'Normal', 'Voador', 'Noctowl', 2),
('Noctowl', 'Normal', 'Voador', NULL, 2),
('Ledyba', 'Inseto', 'Voador', 'Ledian', 2),
('Ledian', 'Inseto', 'Voador', NULL, 2),
('Pineco', 'Inseto', NULL, 'Forretress', 2),
('Forretress', 'Inseto', 'Aço', NULL, 2),
('Teddiursa', 'Normal', NULL, 'Ursaring', 2),
('Ursaring', 'Normal', NULL, NULL, 2),
('Slugma', 'Fogo', NULL, 'Magcargo', 2),
('Magcargo', 'Fogo', 'Pedra', NULL, 2),
('Remoraid', 'Água', NULL, 'Octillery', 2),
('Octillery', 'Água', NULL, NULL, 2);

INSERT INTO pokemon (nome, tipo1, tipo2, evolucao, geracao) VALUES
('Treecko', 'Planta', NULL, 'Grovyle', 3),
('Grovyle', 'Planta', NULL, 'Sceptile', 3),
('Sceptile', 'Planta', NULL, NULL, 3),
('Torchic', 'Fogo', NULL, 'Combusken', 3),
('Combusken', 'Fogo', 'Lutador', 'Blaziken', 3),
('Blaziken', 'Fogo', 'Lutador', NULL, 3),
('Mudkip', 'Água', NULL, 'Marshtomp', 3),
('Marshtomp', 'Água', 'Terrestre', 'Swampert', 3),
('Swampert', 'Água', 'Terrestre', NULL, 3),
('Zangoose', 'Normal', NULL, NULL, 3),
('Seviper', 'Venenoso', NULL, NULL, 3),
('Castform', 'Normal', NULL, NULL, 3),
('Beldum', 'Aço', 'Psíquico', 'Metang', 3),
('Metang', 'Aço', 'Psíquico', 'Metagross', 3),
('Metagross', 'Aço', 'Psíquico', NULL, 3),
('Wailmer', 'Água', NULL, 'Wailord', 3),
('Wailord', 'Água', NULL, NULL, 3),
('Corphish', 'Água', NULL, 'Crawdaunt', 3),
('Crawdaunt', 'Água', 'Siniestro', NULL, 3),
('Shroomish', 'Planta', NULL, 'Breloom', 3);

-- Consulta dos dados inseridos
SELECT * FROM pokemon;
SELECT * FROM users;