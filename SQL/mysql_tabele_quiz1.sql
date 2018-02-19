CREATE TABLE epoki (id INT AUTO_INCREMENT,
epoka VARCHAR(100) NOT NULL,
epoka_poczatek VARCHAR(4) NOT NULL,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id)) ENGINE=InnoDB;

CREATE TABLE epoka_content (id INT AUTO_INCREMENT,
epoka_id INT NOT NULL,
link_do_obrazka TEXT,
tytul_obrazka TEXT,
autor_obrazka TEXT,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (epoka_id) REFERENCES epoki(id)
ON UPDATE CASCADE) ENGINE=InnoDB;


CREATE TABLE user (id INT AUTO_INCREMENT,
nick VARCHAR(20) NOT NULL,
password CHAR(50) NOT NULL,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id)) ENGINE=InnoDB;

CREATE TABLE ksiega (id INT AUTO_INCREMENT,
user_id INT NOT NULL,
email VARCHAR(20) DEFAULT NULL,
wiadomosc TEXT NOT NULL,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES user(id)
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE egzamin (id INT AUTO_INCREMENT,
epoka_id INT NOT NULL,
user_id INT NOT NULL,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (epoka_id) REFERENCES epoki(id),
FOREIGN KEY (user_id) REFERENCES user(id)
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE pytania (id INT AUTO_INCREMENT,
epoka_id INT NOT NULL,
pytanie TEXT NOT NULL,
a TEXT NOT NULL,
b TEXT NOT NULL,
c TEXT NOT NULL,
d TEXT NOT NULL,
prawda VARCHAR(1) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (epoka_id) REFERENCES epoki(id)
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE odp_user (id INT AUTO_INCREMENT,
egzamin_id INT NOT NULL,
pytanie_id INT NOT NULL,
odp_usera VARCHAR(1) NOT NULL,
data TIMESTAMP NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (egzamin_id) REFERENCES egzamin(id),
FOREIGN KEY (pytanie_id) REFERENCES pytania(id)
ON UPDATE CASCADE) ENGINE=InnoDB;

INSERT INTO epoki (epoka, epoka_poczatek) values ('Królestwo Polskie po kongresie wiedeńskim', 1815);
INSERT INTO epoki (epoka, epoka_poczatek) values ('powstanie listopadowe', 1830);
INSERT INTO epoki (epoka, epoka_poczatek) values ('wielka emigracja', 1831);

INSERT INTO epoka_content (epoka_id, link_do_obrazka, tytul_obrazka, autor_obrazka) values (1, 'Aleksander_1.png', 'Portret cara Aleksandra I Romanowa', 'George Dawe');
INSERT INTO epoka_content (epoka_id, link_do_obrazka, tytul_obrazka, autor_obrazka) values (1, 'Mikolaj_1.png', 'Portret cara Mikołaja I Romanowa' , 'Émile Jean-Horace Vernet');
INSERT INTO epoka_content (epoka_id, link_do_obrazka, tytul_obrazka, autor_obrazka) values (2, 'Polish_Prometheus_1831.png', 'Obraz \"Polski Prometeusz\"', 'Émile Jean-Horace Vernet');
INSERT INTO epoka_content (epoka_id, link_do_obrazka, tytul_obrazka, autor_obrazka) values (3, 'Adam_Jerzy_Czartoryski.png', 'Portret Adama Jerzego Czartoryskiego', 'autor nieznany');
