CREATE DATABASE feegow;

USE feegow;

CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,   
    specialty_id VARCHAR(100) NOT NULL,
    professional_id VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    source_id VARCHAR(100) NOT NULL,
    birthdate VARCHAR(20) NOT NULL,
    date_time DATE
)  ENGINE=INNODB;

