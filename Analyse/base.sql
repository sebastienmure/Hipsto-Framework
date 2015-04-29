#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_us       Int NOT NULL ,
        username_us Varchar (30) NOT NULL ,
        pass_us     Varchar (200) NOT NULL ,
        hash        Varchar (200) NOT NULL ,
        PRIMARY KEY (id_us ) ,
        INDEX (username_us )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: zone
#------------------------------------------------------------

CREATE TABLE zone(
        zone_id      Int NOT NULL ,
        country_code Char (2) NOT NULL ,
        zone_name    Varchar (35) NOT NULL ,
        PRIMARY KEY (zone_id ) ,
        UNIQUE (zone_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: voit
#------------------------------------------------------------

CREATE TABLE voit(
        id_us   Int NOT NULL ,
        zone_id Int NOT NULL ,
        PRIMARY KEY (id_us ,zone_id )
)ENGINE=InnoDB;

ALTER TABLE voit ADD CONSTRAINT FK_voit_id_us FOREIGN KEY (id_us) REFERENCES user(id_us);
ALTER TABLE voit ADD CONSTRAINT FK_voit_zone_id FOREIGN KEY (zone_id) REFERENCES zone(zone_id);
