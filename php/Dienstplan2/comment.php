<?php
/*Autor: Arzu Camdal
 * Version 1.0
 * Version 2.0 bearbeitet am 24.04.2014
 * Version 3.0 bearbeitet am 29.04.2014
 * Userstory: 341 Nachrichten PHP (Kommentarfeld) 
 * Arbeitszeit 10h
 * 
 */
	
	include 'header.php';
	// Authentifikation wird geprüft
	//include 'authent.php';		
	
	// DB Verbindung
	//include 'dbconnect.php';	


	
	$user_name = $_SESSION['FirstName'];
	$user_id = $_SESSION['MA_Id'];
	
	if ( isset($_POST['submit']) ) {
		$submit = $_POST['submit'];
	}
	
	if (isset($submit)) {
		$name = $_POST['name'];
		$text = $_POST['text'];
		$query = "INSERT INTO Kommentar(MA_Id, vorname_komm, text_komm) VALUES('$user_id', '$name', '$text');" ;
		$hDB->query($query);
		echo "Das Kommentar wurde gespeichert!<br />" ;
	}
	
	if (isset($user_name)) {
		echo "
			<table border='0'>
			<div class='Dfont'>
			<h2> Kommentar verfassen: </h2><br />
			<form action='kommentar.php' method='post' >
				Name: <input type='text' name='name' value='".$user_name."' readonly><br />
				Kommentar:<br />
				<textarea name='text' rows='5' cols='30' wrap='hard' required></textarea><br />
				<input type='submit' name='submit' value='Absenden'>
			</form>
			</div>
			</table>
		";
	}
	else {
		echo "Nur angemeldete Benutzer können Kommentare verfassen!<br />"; 
	}
	echo"<hr>";
	echo "<div class='Dfont'><h2>Kommentare:</h2> </div><br>";
	$query = "SELECT * FROM Kommentar ORDER BY komm_id DESC;" ;   //  DESC für das Schreiben der Kommentare mit der last_in-first_out Methode
	if( !$result = $hDB->query($query) ) {                                  
		die('Es ist ein Fehler aufgetreten [' . $hDB->error . ']');  //Fehler bei der Ausführung der query
	}
	$rowcount = mysqli_num_rows($result);
	if ($rowcount != 0) {
		echo "<table border='1'>";
		while ( $row = $result->fetch_assoc() ) {
			$name = $row['vorname_komm'];
			$text = $row['text_komm'];
			echo "
				<div class='Dfont'>
				<tr>
					<td>Kommentar von: $name</td>
				</tr>
				<tr>
					<td>$text</td>
				</tr>
				</div>
			";
		}
		// in der while ($row..) werden alle Kommentare angezeigt, die in der daba drin sind
		// fetch_assoc gibt ein assoziatives Array zurück.. that corresponds to the fetched row or NULL if there are no more rows.
		echo "</table>";
		// Free result set.
		$result->free();
	}
	else {
		echo "Keine Kommentare wurden erfasst!<br />" ;
	}
	
?>