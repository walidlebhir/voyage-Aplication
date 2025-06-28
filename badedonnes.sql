#creation de base de donnes 

CREATE DATABASE voyage ; 

USE voyage ;
#--> tableaux pour les informations sur client 
CREATE TABLE compt (
    idcompt INT PRIMARY KEY AUTO_INCREMENT , 
    Nom VARCHAR(20) NOT NULL  ,
    email VARCHAR(80) NOT NULL ,
    password VARCHAR(15) ,
    date_creation DATE 
);

#--> tableaux du comtact : 
CREATE TABLE contact(
    id_contact INT PRIMARY KEY AUTO_INCREMENT , 
    id_compt INT NOT NULL ,
    email VARCHAR(80) NOT NULL ,
    massage TEXT ,
    FOREIGN KEY (id_compt) REFERENCES compt(idcompt) 
);

#--> tableaux contient des informations sur voyage organisé 
CREATE TABLE voyag(
    id_voyage INT PRIMARY KEY AUTO_INCREMENT ,
    Nom_voyage VARCHAR(29) NOT NULL ,
    description TEXT NOT NULL ,
    prix_voyage FLOAT 
);

ALTER TABLE voyag ADD COLUMN Nom_img VARCHAR(20) ;
ALTER TABLE voyag ADD COLUMN type_img VARCHAR(20) ; 
ALTER TABLE voyag ADD COLUMN tail INT NOT NULL ;
ALTER TABLE voyag ADD COLUMN binimg LONGBLOB ; 

USE voyage ; 

CREATE TABLE reservation (
    id_reservation INT PRIMARY KEY AUTO_INCREMENT ,
    id_compt INT NOT NULL , 
    idvoyage INT NOT NULL , 
    Nom VARCHAR(20) ,
    Email VARCHAR(50),
    date_experation DATE ,
    code_securite INT NOT NULL ,
    FOREIGN KEY(id_compt ) REFERENCES compt(idcompt) ,
    FOREIGN KEY(idvoyage) REFERENCES voyag(id_voyage)

);

#==> ajouter une colone qui represente le numero de carte  bancaire 
ALTER TABLE reservation ADD COLUMN numero_cart INT NOT NULL ; 

USE voyage ; 

ALTER TABLE voyag ADD COLUMN date_voyage DATE  ;

USE voyage ; 
CREATE TABLE admintable (
    idempl INT PRIMARY KEY AUTO_INCREMENT ,
    nom TEXT NOT NULL ,
    email VARCHAR(50) , 
    passwordemp VARCHAR(10) 
);

INSERT INTO admintable (nom , email , passwordemp) VALUES ('oualid' , 'oualid@gmail.com' , 'oualid1234')