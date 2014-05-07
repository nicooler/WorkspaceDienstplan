<!--
Autor: Florian Baumann,
Version: 2,
Userstory: 460 Als Mitarbeiter muss ich mein Passwort ändern können
Zeitaufwand Userstory: 3h
Task:
Zeitaufwand angezeigter Code: 3h
Beschreibung: Passwort kann geändert werden. Nur eingeloggter Mitarbeiter kann sein Passwort ändern nicht die der Änderen.
-->
<?php
include ('authent.php');
include('dbconnect.php')
?>
<!-- PHP Code für Passwortänderung -->
 <?php
 
 if (!empty($_POST["submit"])){
 
 $opw = $_POST['oldpassword'];
 $pw = $_POST['newpassword'];
 $pw2 = $_POST['newpassword2'];
 
 $maID = ($_SESSION['MA_Id']);
 #$mail = ($_SESSION['mail']);
 
 #gehashtes opw mit md5
 $hopw = SHA1($opw);
	
	#Überprüft ob das angebene Passwort mit Eintrag in der Tabelle übereinstimmt
	    
	$checkQuery = false; 
    $sql = "SELECT MA_Id, Passwort FROM mitarbeiter WHERE MA_Id = '$maID' AND Passwort = '$hopw'";
    $query = $hDB->query($sql) or die("Abfrage ist nicht korrekt");
		
	# Abfrage wird überprüft		
	if(mysqli_fetch_row($query)!=null){
			$checkQuery = true;				
	}
	else{
		echo"<font=red>Das eingegebene Passwort ist falsch <a href=\"pwchange.php\">Zurück</a>";
	}		
	# Wenn die Abfrage stimmt, werden die neuen Passworteingaben überprüft.	
	if($checkQuery == true) {
		if($pw != $pw2) {
			echo "<font color=red>Passwort stimmt nicht überein, Eingabe überprüfen. <a href=\"pwchange.php\">Zurück</a>";
		} 
		else {
			
			# Passwort wird mit md5 verschlüsselt
			$passworddb = SHA1($pw);
				
			# Update um neues Passwort mit altem Passwort in der Tabelle Mitarbeiter zu ersetzten.
				
			$sql = "UPDATE mitarbeiter SET Passwort = '$passworddb' WHERE MA_Id = '$maID' ";
				
			$insert = $hDB->query($sql) or die("Fehler bei Datenbankabfrage.");
				
			# Abfrage wird geprüft und entprechende Meldungen werden ausgegeben.
			if($insert == true) {
				echo "Passwort wurde erfolgreich geändert <a href=\"content.php\">Zur Hauptseite</a>";
				} else {
				echo "<font color=red>Fehler beim Ändern des Passworts";
				}
					
				# Datenbankverbindung wird geschlossen
				mysqli_close($hDB);
		}
	}
/*	
	# Passwort wird per Mail an angemeldeten Mitarbeiter verschickt.
	$at = $mail;
	$subject = 'Dienstplan - geändertes Passwort';
	$msg = "Ihr neues Passwort lautet: $pw ";
	$from = "From: Dienstplan <Dienstplan@example.de>";
	mail($at, $subject, $msg, $from);
*/					 
}		
 ?>
<html>

<meta charset="utf-8">
<title>Dienstplan - Passwort ändern</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

</style>
</head>

<body>
<div id="header" style="background-color: #ffffff; min-height: 40px">
<div style="width: 10%; float: left; margin-left: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
<a href = "content.php">
<img src="images/logo.png" width=100% height="150" />
</a>
</div>
<div style="text-align: left; margin-left:40%">

     <span class="head_title"  style="margin-bottom:20%">Passwort ändern</span>
    
      </div>
</div>
<table width="100%" border="0">
<form action="pwchange.php" method="post">
<tr>
    <td width="50%" class="pwchange_data">Passwort: </td>
    <td width="50%"><input name="oldpassword" type="text" size="30" maxlength="30">
	 	 <br><br></td>
  </tr>
  <tr>
    <td width="50%" class="pwchange_data">Neues Passwort: </td>
    <td width="50%"><input name="newpassword" type="password" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="pwchange_data">Neues Passwort wiederholen: </td>
    <td width="50%"><input name="newpassword2" type="password" size="30" maxlength="30"><br><br></td>
  </tr>
  <!--Button um Passwortänderung zu starten-->
  <tr>
    <td width="50%"></td>
    <td width="50%"><input type="submit" name="submit" value="Passwort ändern"
      onclick=""><br><br></td>
  </tr>
	<tr>
	<td>
	<span ><a href = "content.php">Zurück zur Hauptseite</a></span> 
	</td>
	</tr>
</body>
</html>