CREATE TABLE Personne(
   id_personne INT AUTO_INCREMENT,
   prenom VARCHAR(20),
   login VARCHAR(10),
   mdp VARCHAR(100),
   role VARCHAR(10),
   dateInscription DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_personne),
   UNIQUE(login)
)Engine=InnoDB;

CREATE TABLE Compte(
   id INT AUTO_INCREMENT,
   solde DECIMAL(15,2),
   client INT NOT NULL,
   gerant INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(client) REFERENCES Personne(id_personne),
   FOREIGN KEY(gerant) REFERENCES Personne(id_personne)
)Engine=InnoDB;
