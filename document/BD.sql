CREATE TABLE Utilisateur(
   Id COUNTER,
   Prenom VARCHAR(255),
   Nom VARCHAR(255) NOT NULL,
   MotDePasse VARCHAR(70),
   Actif LOGICAL,
   NomUtilisateur VARCHAR(50),
   Role INT,
   PRIMARY KEY(Id)
);

CREATE TABLE Message(
   Id COUNTER,
   DateReception DATETIME NOT NULL,
   Sujet VARCHAR(50),
   Contenu VARCHAR(255) NOT NULL,
   Id_1 INT NOT NULL,
   Id_2 INT NOT NULL,
   PRIMARY KEY(Id),
   FOREIGN KEY(Id_1) REFERENCES Utilisateur(Id),
   FOREIGN KEY(Id_2) REFERENCES Utilisateur(Id)
);

CREATE TABLE Reponse(
   Id INT,
   Id_1 INT,
   PRIMARY KEY(Id, Id_1),
   FOREIGN KEY(Id) REFERENCES Message(Id),
   FOREIGN KEY(Id_1) REFERENCES Message(Id)
);
