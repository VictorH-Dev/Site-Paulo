CREATE DATABASE IF NOT EXISTS agenda;
USE agenda;
CREATE TABLE IF NOT EXISTS Consultas (
    -- definições da tabela
);
Use agenda;
CREATE TABLE IF NOT EXISTS Consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    servico VARCHAR(255) NOT NULL,
    doutor VARCHAR(255),
    mensagem TEXT
);INSERT INTO Consultas (nome, telefone, servico, doutor, mensagem) VALUES ('Nome do Paciente', 'Telefone', 'Serviço', 'Doutor', 'Mensagem');
Use agenda;
SELECT * FROM Consultas;