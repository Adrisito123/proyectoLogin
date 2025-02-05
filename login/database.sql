-- filepath: /c:/Users/manue/Desktop/OTROS/login/database.sql
CREATE DATABASE loginAdr;
USE loginAdr;

CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL
);

INSERT INTO login (user, pass) VALUES ('admin', 'admin');