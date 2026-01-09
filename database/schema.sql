-- ===============================
-- Schema do banco: controle_de_maquinas
-- Projeto: Controle de Máquinas
-- ===============================

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS controle_de_maquinas
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE controle_de_maquinas;

CREATE TABLE IF NOT EXISTS controle_maquinas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  numero_serie VARCHAR(50) NOT NULL,
  ativacao VARCHAR(100),
  situacao_chip VARCHAR(50),
  destino VARCHAR(100),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
