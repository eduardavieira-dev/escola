-- Criar o banco de dados
CREATE DATABASE Sistema_escolar;

-- Selecionar o banco de dados
USE Sistema_escolar;

-- Criar a tabela cadastrar_aluno
CREATE TABLE cadastrar_aluno (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Matricula_aluno INT UNIQUE,
    Nome_aluno VARCHAR(100),
    Cpf_aluno VARCHAR(11),
    Turma VARCHAR(50),
    Senha_aluno VARCHAR(255)
);


-- Inserir massa de dados
INSERT INTO cadastrar_aluno (Matricula_aluno, Nome_aluno, Cpf_aluno, Turma, Senha_aluno)
VALUES
(1001, 'Alice Silva', '12345678901', 'Turma A', 'senha123'),
(1002, 'Bruno Lima', '23456789012', 'Turma B', 'senha123'),
(1003, 'Carla Souza', '34567890123', 'Turma A', 'senha123'),
(1004, 'Daniel Alves', '45678901234', 'Turma C', 'senha123'),
(1005, 'Eva Pereira', '56789012345', 'Turma B', 'senha123');
