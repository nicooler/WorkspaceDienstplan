DROP PROCEDURE IF EXISTS MitarbeiterAnlegen; //Arzu Camdal

DELIMITER ;;
CREATE PROCEDURE MitarbeiterAnlegen (

vorname varchar(40),
nachname varchar(40),
gebDatum date,
straße varchar(50),
ort varchar(50),
telefonNr varchar(30),
beschäftigungsgrad varchar(45)

)
BEGIN


insert into Mitarbeiter (Vorname,Nachname,GebDatum,Straße,Ort,TelefonNr,Beschäftigungsgrad) VALUES (vorname,nachname,gebDatum,straße,ort,telefonNr,beschäftigungsgrad);



END;;
DELIMITER ;

