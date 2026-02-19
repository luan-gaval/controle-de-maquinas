CREATE DATABASE IF NOT EXISTS controle_de_maquinas
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;

USE controle_de_maquinas;

CREATE TABLE IF NOT EXISTS ativacoes (
  id INT NOT NULL AUTO_INCREMENT,
  numero_ativacao VARCHAR(6) DEFAULT NULL,
  nome VARCHAR(100) NOT NULL,
  cnpj VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS controle_maquinas (
  id INT NOT NULL AUTO_INCREMENT,
  numero_serie VARCHAR(50) NOT NULL,
  ativacao_id INT NOT NULL,
  situacao_chip VARCHAR(50) NOT NULL DEFAULT '',
  destino VARCHAR(100) NOT NULL DEFAULT '',
  descricao TEXT,
  PRIMARY KEY (id),
  KEY idx_ativacao (ativacao_id),
  CONSTRAINT fk_ativacao
    FOREIGN KEY (ativacao_id)
    REFERENCES ativacoes (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
