
/*  Das Hier oben nicht auf der offiziellen Seite benutzen!/**/

/*Daniela Nikolic version 1.0*/
/* Nicolas Balss version 2.0 Table Dienstplan hinzugefügt*/
/* Arzu Camdal version 3.0 Table Kommentar hinzugefügt*/
/*Daniela Nikolic version 4.1 Table Urlaubsantrag bearbeitet (4.0 hinzugefügt) */
/*Arzu Camdal Version 5.0 Table Message hinzugefügt*/



drop table IF EXISTS Message;
drop table IF EXISTS MitarbeiterArbeiten;
drop table IF EXISTS Dienstplan;
drop table IF EXISTS Dienst;
drop table IF EXISTS Kommentar;
drop table IF EXISTS Urlaubsantrag;
drop table IF EXISTS Mitarbeiter;

create Table Mitarbeiter(
MA_Id Int NOT NULL Auto_Increment, 
Vorname varchar (40) Not Null, 
Nachname varchar(40) Not Null, 
GebDatum date Not Null, 
Strasse varchar(45) Not Null, 
Ort varchar(45) Not Null, 
TelefonNr varchar (30) Not Null, 
Beschaeftigungsgrad varchar (45) Not null, 
Email varchar (40) Not Null,
Passwort varchar(40) Not Null,
Rolle int(4),
Primary Key (MA_Id),
UNIQUE (Email)
/*
Rolle:0 = Admin
Rolle:1 = Personalleitung
Rolle:2 = Mitarbeiter
/**/
);
CREATE TABLE Dienst (
	Rangfolge INT,
	DienstBezeichnung VARCHAR(40) NOT NULL,
	
	StartZeit TIME NOT NULL,
	EndZeit TIME NOT NULL,
	AnzahlTage INT NOT NULL,
	
PRIMARY KEY (Rangfolge)
);
create table Dienstplan(
PlanID int NOT NULL Auto_Increment, 
Rangfolge INT NOT NULL,
StartDatum date Not Null, 
Beschreibung varchar(45) Not Null, 
Foreign Key (Rangfolge)REFERENCES Dienst(Rangfolge), 
Primary Key (PlanID)
);
CREATE TABLE MitarbeiterArbeiten (
	PlanID INT NOT NULL,
	MA_Id INT NOT NULL,
FOREIGN KEY (PlanID) REFERENCES Dienstplan (PlanID),
FOREIGN KEY (MA_Id) REFERENCES Mitarbeiter (MA_Id)
);
CREATE TABLE Kommentar (
	komm_id INT NOT NULL AUTO_INCREMENT,
	
	MA_Id INT NOT NULL,
	
	vorname_komm VARCHAR(40) NOT NULL,
	
	text_komm TEXT NOT NULL,
	
FOREIGN KEY (MA_Id) REFERENCES Mitarbeiter (MA_Id), 
PRIMARY KEY (komm_id)) ;
CREATE TABLE Urlaubsantrag (
    urlaub_id INT NOT NULL AUTO_INCREMENT,
	
	MA_Id INT NOT NULL,
	
	start_date DATE NOT NULL,
	
	end_date DATE NOT NULL,
	
	kmnt VARCHAR(100) DEFAULT NULL,
	
	urlaub_genehmigt TINYINT DEFAULT -1,	/* -1=in bearbeitung,  0=nicht genehmigt,  1=genehmigt */

	user_notified BOOL DEFAULT 0,			/* 0=Benutzer nicht benachrichtigt,  1=benachrichtigt*/
	
	
FOREIGN KEY (MA_Id) REFERENCES Mitarbeiter (MA_Id), 
PRIMARY KEY (urlaub_id)) ;


CREATE TABLE Message (

	ms_id INT NOT NULL AUTO_INCREMENT,

	from_user VARCHAR(50) NOT NULL,	/* Email */

	to_user VARCHAR(50) NOT NULL,   /* Email */

	ms_subject VARCHAR(50) DEFAULT NULL,

	msg TEXT,

PRIMARY KEY (ms_id)
);