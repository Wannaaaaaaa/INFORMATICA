CREATE TABLE utente
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

INSERT 
INTO utente(id, username, password)
VALUES (1, 'Flavio', 'ciao');
