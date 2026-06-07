CREATE DATABASE scme;
USE scme;

-- ====================================
-- TABELA DE USUÁRIOS
-- ====================================
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('Administrador','Tecnico') DEFAULT 'Tecnico',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ====================================
-- TABELA DE TÉCNICOS
-- ====================================
CREATE TABLE tecnicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(150),
    especialidade VARCHAR(100),
    status ENUM('Ativo','Inativo') DEFAULT 'Ativo'
);

-- ====================================
-- TABELA DE EQUIPAMENTOS
-- ====================================
CREATE TABLE equipamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    patrimonio VARCHAR(50),
    modelo VARCHAR(100),
    fabricante VARCHAR(100),
    setor VARCHAR(100),
    data_aquisicao DATE,
    status ENUM(
        'Operacional',
        'Em Manutenção',
        'Inativo'
    ) DEFAULT 'Operacional'
);

-- ====================================
-- TABELA DE MANUTENÇÕES
-- ====================================
CREATE TABLE manutencoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipamento_id INT NOT NULL,
    tecnico_id INT NOT NULL,

    tipo ENUM(
        'Preventiva',
        'Corretiva',
        'Preditiva'
    ) NOT NULL,

    descricao TEXT,
    data_abertura DATE NOT NULL,
    data_conclusao DATE,

    status ENUM(
        'Aberta',
        'Em Andamento',
        'Concluida',
        'Cancelada'
    ) DEFAULT 'Aberta',

    FOREIGN KEY (equipamento_id)
        REFERENCES equipamentos(id),

    FOREIGN KEY (tecnico_id)
        REFERENCES tecnicos(id)
);

-- ====================================
-- HISTÓRICO DAS MANUTENÇÕES
-- ====================================
CREATE TABLE historico_manutencao (
    id INT AUTO_INCREMENT PRIMARY KEY,

    manutencao_id INT NOT NULL,

    observacao TEXT,

    data_registro TIMESTAMP
    DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (manutencao_id)
        REFERENCES manutencoes(id)
);