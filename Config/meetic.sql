DROP DATABASE IF EXISTS meetic;
CREATE DATABASE meetic;

USE meetic;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS users_hobbies;
DROP TABLE IF EXISTS hobbies;

CREATE TABLE users (
    id              INT             NOT NULL AUTO_INCREMENT,
    email           VARCHAR(255)    NOT NULL UNIQUE,
    firstname       VARCHAR(255)    NOT NULL,
    lastname        VARCHAR(255)    NOT NULL,
    birthdate       DATETIME        NOT NULL,
    age             INT             NOT NULL DEFAULT 0,
    city            VARCHAR(255)    NOT NULL DEFAULT 'None',
    gender          VARCHAR(255)    NOT NULL,
    password        VARCHAR(255)    NOT NULL,
    statut          BOOLEAN         NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
);

CREATE TABLE hobbies (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE users_hobbies (
    id_user        INT             NOT NULL,
    id_hobbies     INT             NOT NULL,
    FOREIGN KEY (id_user)          REFERENCES users(id),
    FOREIGN KEY (id_hobbies)       REFERENCES hobbies(id)
);

INSERT INTO hobbies
            (name)
VALUES      ('League Of Legends'),
            ('Lecture'),
            ('Cuisine'),
            ('Voyage'),
            ('Sport'),
            ('Musique'),
            ('Cinema'),
            ('Jeux de société'),
            ('Photographie'),
            ('Art'),
            ('Danse'),
            ('Théâtre'),
            ('Jardinage'),
            ('Bricolage'),
            ('Informatique'),
            ('Science'),
            ('Histoire'),
            ('Politique'),
            ('Philosophie')
;
INSERT INTO users
            (email, firstname, lastname, birthdate, age, city, gender, password)
VALUES      ('league@yahoo.fr', 'League', 'Oflegends','1989-01-23', '36','Lyon', 'Homme','leagueoflegends'),
            ('adrew@hotmail.com', 'Adrew', 'Boum','1979-12-26','46','Paris', 'Femme','adrewboum'),
            ('test@gmail.com', 'Test', 'toto','1979-12-26','46','Paris', 'Femme','testtest'),
            ('chrisdessou@gmail.com', 'Chris', 'Desous','1980-04-25','45','Toulouse','Homme','chrisdessou')
;
-- select name from users JOIN users_hobbies ON users.id = users_hobbies.id_user JOIN hobbies On hobbies.id = users_hobbies.id_hobbies Where users.id =1;

INSERT INTO users_hobbies
            (id_user, id_hobbies)
VALUES      (1,1),
            (1,2),
            (1,3),
            (1,4),
            (2,1),
            (2,2),
            (2,3),
            (2,4),
            (3,1),
            (3,2),
            (3,3),
            (3,4)
;


