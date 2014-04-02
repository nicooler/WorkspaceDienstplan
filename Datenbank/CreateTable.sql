CREATE DATABASE  IF NOT EXISTS `dienstplan` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dienstplan`;

drop table IF EXISTS Account;
drop table IF EXISTS Mitarbeiter;

create Table Mitarbeiter(
MA_Id Int NOT NULL Auto_Increment, 
Vorname varchar (40) Not Null, 
Nachname varchar(40) Not Null, 
GebDatum date Not Null, 
Straße varchar(45) Not Null, 
Ort varchar(45) Not Null, 
TelefonNr varchar (30) Not Null, 
Beschäftigungsgrad varchar (45) Not null, 
Primary Key (MA_Id));

create Table Account(
ACC_Id Int Not Null Auto_Increment,
MA_Id Int Not Null ,
Benutzername varchar (40) Not Null,
Passwort varchar(40) Not Null,

Primary Key (ACC_Id));

Alter table account add Foreign Key (MA_Id) references Mitarbeiter (MA_Id) on delete restrict on update restrict;










