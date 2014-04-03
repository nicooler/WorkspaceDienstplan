﻿CREATE DATABASE  IF NOT EXISTS `dienstplan` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dienstplan`;

drop table IF EXISTS Account;
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
Primary Key (MA_Id)
Benutzername varchar (40) Not Null,
Passwort varchar(40) Not Null,
Rolle int()
/*
Rolle:0 = Admin
Rolle:1 = Personalleitung
Rolle:2 = Mitarbeiter
/**/
);











