DROP DATABASE IF EXISTS db_STI_projet1;
CREATE DATABASE db_STI_projet1;
USE db_STI_projet1;

CREATE TABLE Utilisateur(
   IdUser INT AUTO_INCREMENT,
   Prenom VARCHAR(255),
   Nom VARCHAR(255) NOT NULL,
   MotDePasse VARCHAR(70) NOT NULL,
   Actif boolean NOT NULL,
   NomUtilisateur VARCHAR(50) NOT NULL,
   Role INT NOT NULL,
   PRIMARY KEY(IdUser)
);

CREATE TABLE Message(
   IdMsg INT AUTO_INCREMENT,
   DateReception DATETIME NOT NULL,
   Sujet VARCHAR(50),
   Contenu VARCHAR(255),
   fk_emetteur INT NOT NULL,
   fk_recepteur INT NOT NULL,
   PRIMARY KEY(IdMsg),
   FOREIGN KEY(fk_emetteur) REFERENCES Utilisateur(IdUser) ON DELETE CASCADE,
   FOREIGN KEY(fk_recepteur) REFERENCES Utilisateur(IdUser) ON DELETE CASCADE
);

CREATE TABLE Reponse(
   IdRsp INT,
   fk_msg INT,
   PRIMARY KEY(IdRsp, fk_msg),
   FOREIGN KEY(IdRsp) REFERENCES Message(IdMsg) ON DELETE CASCADE,
   FOREIGN KEY(fk_msg) REFERENCES Message(IdMsg) ON DELETE CASCADE
);

INSERT INTO `utilisateur` (`IdUser`, `Prenom`, `Nom`, `MotDePasse`, `Actif`, `NomUtilisateur`, `Role`) VALUES
	(1, '', 'Admin', 'admin', 1, 'admin', 1),
	(2, '', 'Collab', 'collab', 1, 'collab', 0);

