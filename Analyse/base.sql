#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


CREATE TABLE User(
        id_us       int (11) Auto_increment  NOT NULL ,
        username_us Varchar (30) NOT NULL ,
        PRIMARY KEY (id_us ) ,
        UNIQUE (username_us )
)ENGINE=InnoDB;


CREATE TABLE Horloge(
        id_ho  int (11) Auto_increment  NOT NULL ,
        nom_ho Varchar (30) NOT NULL ,
        id_vi  Int NOT NULL ,
        PRIMARY KEY (id_ho ) ,
        UNIQUE (nom_ho )
)ENGINE=InnoDB;


CREATE TABLE Ville(
        id_vi     int (11) Auto_increment  NOT NULL ,
        nom_vi    Varchar (40) NOT NULL ,
        ufc_vi    Varchar (6) NOT NULL ,
        fuseau_vi Varchar (5) ,
        PRIMARY KEY (id_vi ) ,
        UNIQUE (nom_vi )
)ENGINE=InnoDB;


CREATE TABLE voit(
        id_us Int NOT NULL ,
        id_ho Int NOT NULL ,
        PRIMARY KEY (id_us ,id_ho )
)ENGINE=InnoDB;

ALTER TABLE Horloge ADD CONSTRAINT FK_Horloge_id_vi FOREIGN KEY (id_vi) REFERENCES Ville(id_vi);
ALTER TABLE voit ADD CONSTRAINT FK_voit_id_us FOREIGN KEY (id_us) REFERENCES User(id_us);
ALTER TABLE voit ADD CONSTRAINT FK_voit_id_ho FOREIGN KEY (id_ho) REFERENCES Horloge(id_ho);
