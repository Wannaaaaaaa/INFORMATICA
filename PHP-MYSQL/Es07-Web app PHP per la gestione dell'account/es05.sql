//creazione database es05
CREATE DATABASE es05;

//creazione tabella utente
CREATE TABLE utente
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    pasword VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1;

//inserimento dati nuova istanza istanza 
INSERT 
INTO utente(id, username, pasword)
VALUES (NULL, 'Flavio', 'ciao');

//aggiunti nuovi attributi
ALTER TABLE utente ADD COLUMN
(
    mail CHAR(20),
    nascita DATE
);

//modifica dati istanza id 1
UPDATE utente
SET mail='flaviociao@gmail.com'
WHERE id='1'

//modifica dati istanza id 1
UPDATE utente
SET nascita='2004-01-27' 
WHERE id='1';

//inserimento dati per nuova istanza
INSERT 
INTO utente(id, username, pasword,mail,nascita)
VALUES (NULL, 'Andrea', 'prova','andreaprova@gmail.com','2000-09-12');

//aggiunti nuovi attributi
ALTER TABLE utente ADD COLUMN(
    nome CHAR(20),
    cognome CHAR(20)
);

UPDATE utente
SET nome='Flavio'
WHERE id='1'

UPDATE utente
SET cognome='Wannaku'
WHERE id='1'
