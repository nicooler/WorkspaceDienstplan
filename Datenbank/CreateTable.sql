/*DROP DATABASE dienstplan;/**/

CREATE DATABASE IF NOT EXISTS `dienstplan` /*!40100 DEFAULT CHARACTER SET utf8  */;
USE `dienstplan`;

/*  Das Hier oben nicht auf der offiziellen Seite benutzen!/**/

/*Daniela Nikolic version 1.0*/
/* Nicolas Balss version 2.0 Table Dienstplan hinzugefügt*/
/* Arzu Camdal version 3.0 Table Kommentar hinzugefügt*/
/*Daniela Nikolic version 4.0 Table Urlaubsantrag hinzugefügt*/

drop table IF EXISTS Mitarbeiter;
drop table IF EXISTS Dienstplan;
drop table IF EXISTS Kommentar1;
drop table IF EXISTS Urlaubsantrag;

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

create table Dienstplan(
week_id int NOT NULL Auto_Increment, 

MA_Id int,

work_id int not Null,

working_date date Not Null, 

startTime time Not Null, 

endTime time Not Null, 

description varchar(45) Not Null, 

Foreign Key (MA_Id)REFERENCES Mitarbeiter(MA_Id), 

Primary Key (week_id)


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
	
FOREIGN KEY (MA_Id) REFERENCES Mitarbeiter (MA_Id), 

PRIMARY KEY (urlaub_id)) ;

);










