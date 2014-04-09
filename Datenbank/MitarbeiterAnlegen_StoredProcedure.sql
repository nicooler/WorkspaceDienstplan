DROP PROCEDURE IF EXISTS MitarbeiterAnlegen; //Arzu Camdal

DELIMITER ;;
CREATE PROCEDURE MitarbeiterAnlegen (

vorname varchar(40),
nachname varchar(40),
gebDatum date,
straße varchar(50),
ort varchar(50),
telefonNr varchar(30),
beschäftigungsgrad varchar(45),
benutzername varchar (40),
passwort varchar (40),
rolle int (4)

)
BEGIN


insert into Mitarbeiter (Vorname,Nachname,GebDatum,Straße,Ort,TelefonNr,Beschäftigungsgrad, Benutzername, Passwort, Rolle) VALUES (vorname,nachname,gebDatum,straße,ort,telefonNr,beschäftigungsgrad, benutzername, passwort, rolle);



END;;
DELIMITER ;

