DROP PROCEDURE IF EXISTS NeuerAccount; // Daniela Nikolic

DELIMITER ;;
CREATE PROCEDURE NeuerAccount (
 IN mA_Id Int,
 IN benutzername varchar (40),
 IN passwort varchar (40)
   )
BEGIN

Insert into Account (MA_Id, Benutzername, Passwort) values (mA_Id, benutzername,passwort);

END;;
DELIMITER ;
