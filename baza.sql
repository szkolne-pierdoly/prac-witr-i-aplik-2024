CREATE TABLE ankieta (
    id INT NOT NULL AUTO_INCREMENT,
    pytanie VARCHAR(128) NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE odpowiedz (
    id INT NOT NULL AUTO_INCREMENT,
    tresc VARCHAR(128) NOT NULL,
    ankieta_id INT NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (ankieta_id) REFERENCES ankieta(id)
);

CREATE TABLE glos (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ankieta_id INT NOT NULL,
    odpowiedz_id INT NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (ankieta_id) REFERENCES ankieta(id),
    FOREIGN KEY (odpowiedz_id) REFERENCES odpowiedz(id)
);