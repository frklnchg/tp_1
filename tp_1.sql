CREATE DATABASE tp_1;

CREATE TABLE maison(
    matricule INT AUTO_INCREMENT NOT NULL,
    prix INT,
    annee_construite INT, 
    pied_carre INT,
    nb_chambre INT);

INSERT INTO maison(prix, annee_construite, pied_carre, nb_chambre)
VALUES 
    (20000, 1999, 3000, 4),
    (25000, 2005, 2800, 3),
    (18000, 2001, 3200, 5);