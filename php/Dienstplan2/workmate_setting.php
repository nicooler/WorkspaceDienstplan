<!--
Autor: Florian Baumann,
Version: 1,
Userstory:
Zeitaufwand Userstory:
Task:
Zeitaufwand angezeigter Code:
Beschreibung:
-->
<!-- Schaltet Warnungen bzw. Notizen ab -->
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Mitarbeiter anlegen</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="header" style="background-color: #ffffff; min-height: 40px">
<div style="width: 10%; float: left; margin-left: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
<a href = "content.php">
<img src="images/logo.png" width=100% height="150" />
</a>
</div>
<div style="text-align: left; margin-left:40%">

     <span class="head_title"  style="margin-bottom:20%">Mitarbeiter anlegen</span>
    
      </div>
</div>
<table width="100%" border="0">
<form action="workmate_setting.php?page=2" method="post">
 
  <tr>
    <td width="50%" class="workmateset_data">Vorname: </td>
    <td width="50%"><input name="forename" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="workmateset_data">Nachname: </td>
    <td width="50%"><input name="lastname" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="workmateset_data">Geburtstag: </td>
    <td width="50%"><input name="birthday" type="date" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="workmateset_data">Straße: </td>
    <td width="50%"><input name="street" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="workmateset_data">Ort: </td>
    <td width="50%"><input name="place" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="workmateset_data">Telefonnummer: </td>
    <td width="50%"><input name="phone" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
  <tr>
    <td width="50%" class="workmateset_data">Beschäftigungsgrad: </td>
    <td width="50%"><input name="BG" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
  <tr>
    <td width="50%" class="workmateset_data">E-Mail: </td>
    <td width="50%"><input name="email" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
   <tr>
    <td width="50%" class="workmateset_data">Passwort: </td>
    <td width="50%"><input name="pw" type="password" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
   <tr>
    <td width="50%" class="workmateset_data">Rolle: </td>
    <td width="50%"><input name="role" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td style="text-align: left" ><input type="submit" name="MAanlegen" value="Mitarbeiter anlegen"
      onclick="" alt="register"><br><br></td>
  </form>
</table>
</body>
</html>
<!-- Daten aus den Eingabefeldern werden in Datenbank geschrieben -->
<?php
if(isset($_GET["page"])) {
    if($_GET["page"] == "2") {
    $forename= $_POST['forename'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $street = $_POST['street'];
	$place = $_POST['place'];
    $phone = $_POST['phone'];
    $BG = $_POST['BG'];
	$mail = $_POST['mail'];
	$pw = $_POST['pw'];
	$role = $_POST['role'];
      
	  
    
			//Passwort wird mit md5 verschlüsselt
            $passworddb = md5($pw);
            include('dbconnect.php');
              
           
            $sql = 
            "INSERT INTO mitarbeiter (Vorname, Nachname, GebDatum, Strasse, Ort, TelefonNr, Beschaeftigungsgrad, , Email, Passwort, Rolle)
            VALUES  ('$forename', '$lastname', '$birthday', '$street', '$place', '$phone', '$BG', '$mail', '$passworddb', '$role')";
  			
            $insert = $hDB->query($sql);
			
			if($insert == true) {
                echo "Mitarbeiter wurde angelegt<a href=\"index.php\">Anmelden</a>";
            } else {
                echo "<font color=red>Fehler beim Anlegen des Mitarbeiters";
            }
            
            $hDB->close();
       
}
}
?>