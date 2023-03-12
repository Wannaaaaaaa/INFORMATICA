CREATE DATABASE es05;

CREATE TABLE utente
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(64) NOT NULL,
    pasword VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=100;

INSERT 
INTO utente(id, username, pasword)
VALUES (NULL, 'Flavio', 'ciao');
