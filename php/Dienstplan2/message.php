<?php
/*	Autor: Arzu Camdal
 *	Version 1.0
 * 	Userstory: 440 Als Mitarbeiter möchte ich meinen Kollegen Nachrichten schreiben und empfangen können
 * 	Arbeitszeit 10h
 *	File: message.php
 */

	include 'header.php';
	
	$user_name = $_SESSION['FirstName'];
	$user_id = $_SESSION['MA_Id'];
	
	$query = "SELECT Email FROM Mitarbeiter WHERE MA_Id = '$user_id';";
	$result = $hDB->query($query);
	$row = $result->fetch_row();
	$user_mail = $row[0];
	
	if ( isset($_GET['action']) ) { $action = $_GET['action']; }
	else { $action = ""; }
	if ( isset($_GET['receive']) ) { $receive = $_GET['receive']; }
	else { $receive = ''; }
	if ( isset($_GET['sbjct']) ) { $sbjct = "RE: ".$_GET['sbjct']; }  // Antworten auf eine Nachricht mit RE Betreff
	else { $sbjct = ''; }
	
	if ($action == "") {
		
		// Zählt die Nachrichten im Posteingang
		$query_in = "SELECT * FROM Message WHERE to_user = '$user_mail';";
		$result = $hDB->query($query_in);
		$count_in = $result->num_rows;
		$result->free();
		
		// Zählt die Nachrichten im Postausgang
		$query_out = "SELECT * FROM Message WHERE from_user = '$user_mail';";
		$result = $hDB->query($query_out);
		$count_out = $result->num_rows;
		$result->free();
		echo "
			<table align='left' border='0'>
				<tr>
					<td>
						<h2> Nachrichten </h2>
					</td>
				</tr>
				<tr>
					<td>
						<a href='message.php?action=send'>Nachricht schreiben</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href='message.php?action=inbox'>Posteingang (".$count_in.")</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href='message.php?action=outbox'>Postausgang (".$count_out.")</a>
					</td>
				</tr>
			</table>
			";
	}
	if ($action == 'send') {
		
		$status_on_send = "";
		if ( isset($_POST['submit']) ) {
			$sender = $_POST['sender'];
			$recipient = $_POST['recipient'];
			$subject = $_POST['subject'];
			$text = nl2br( $_POST['text'] ); // nl2b - "new line to break" Zeilenumbruch in HTML
			
			$querytouser = "SELECT * FROM Mitarbeiter WHERE Email = '$recipient'";
			$result = $hDB->query($querytouser);
			$count = $result->num_rows;
			
			if ($count == 1) {  # Empfänger (z.B. email) gefunden.
				$query = "INSERT INTO Message (from_user, to_user, ms_subject, msg) VALUES ('$user_mail', '$recipient', '$subject', '$text');";
				$hDB->query($query);
				//echo "Deine Nachricht wurde erfolgreich gesendet";
				$status_on_send = "Deine Nachricht wurde erfolgreich gesendet.";
			}
			else {
				//echo "Fehler! Empfaenger existiert nicht.";
				$status_on_send = "Fehler! Empfaenger existiert nicht.";
			}
		}
		echo "
			<form action='message.php?action=send' method ='POST'>
				<table border='0'>
					<tr >
						<td style='height:30px' colspan='2'>
							".$status_on_send."
						</td>
					</tr>
					<tr>
						<td>
							Von:
						</td>
						<td>
							<input type='text' name='sender' value='".$user_name."' readonly >
						</td>
					</tr>
					<tr>
						<td>
							An:
						</td>
						<td>
							<input type='email' name='recipient' value='".$receive."' placeholder='user@mail.com' required>
						</td>
					</tr>
					<tr>
						<td>
							Betreff:
						</td>
						<td>
							<input type='text' name='subject' value='".$sbjct."' required>
						</td>
					</tr>
				</table>
				Text:<br />
				<textarea name='text' rows='10' cols='45' required></textarea><br />
				<input type='submit' name='submit' value='Senden'>
			</form>
		";
	}
	
	if ($action == 'inbox') {
	
		$query = "SELECT * FROM Message WHERE to_user = '$user_mail' ORDER BY ms_id DESC;";
		if( !$result = $hDB->query($query) ) {
			die('Error! Die Abfrgae ist fehlerhaft. [' . $hDB->error . ']');
		}
		
		echo "<table border='1'>";
		while ( $row = $result->fetch_assoc() ) {
			$from = $row['from_user'];
			$subject = $row['ms_subject'];
			$text = $row['msg'];
			
			//Findet den Namen der die Nachricht gesendet hat
			$find_name = "SELECT Vorname FROM Mitarbeiter WHERE Email = '$from';";
			$rslt = $hDB->query($find_name);
			$row_1 = $rslt->fetch_row();
			$from_name = $row_1[0];
			$rslt->free();
			
			echo "
				<tr>
					<td>Nachricht von ".$from_name.":</td>
					<td><b>".$from."</b></td>
				</tr>
				<tr>
					<td>Betreff:</td>
					<td><b>".$subject."</b></td>
				</tr>
				<tr>
					<td>Text:</td>
					<td>".$text."</td>
				</tr>
				<tr>
					<td colspan='2'><a href='message.php?action=send&receive=".$from."&sbjct=".$subject."'>Antworten</a></td>
				</tr>
			";
		}
		echo "</table>";
		$result->free();
		echo "<a href='message.php'>Zurück zu den Nachrichten</a>";
	}
	
	if ($action == 'outbox') {
		
		$query = "SELECT * FROM Message WHERE from_user = '$user_mail' ORDER BY ms_id DESC;";
		if( !$result = $hDB->query($query) ) {
			die('There was an error running the query [' . $hDB->error . ']');
		}
		
		echo "<table border='1'>";
		while ( $row = $result->fetch_assoc() ) {
			$to = $row['to_user'];
			$subject = $row['ms_subject'];
			$text = $row['msg'];
			
			// Findet den Namen an wem die Nachricht versendet wurde
			$find_name = "SELECT Vorname FROM Mitarbeiter WHERE Email = '$to';";
			$rslt = $hDB->query($find_name);
			$row_1 = $rslt->fetch_row();
			$to_name = $row_1[0];
			$rslt->free();
			
			echo "
				<tr>
					<td>Nachricht an ".$to_name.":</td>
					<td><b>".$to."</b></td>
				</tr>
				<tr>
					<td>Betreff:</td>
					<td><b>".$subject."</b></td>
				</tr>
				<tr>
					<td>Text:</td>
					<td>".$text."</td>
				</tr>
				<tr>
					<td colspan='2'><a href='message.php?action=send&receive=".$to."&sbjct=".$subject."'>Antworten</a></td>
				</tr>
			";
		}
		echo "</table>";
		$result->free();
		echo "<a href='message.php'>Zurück zu den Nachrichten</a>";
	
	}

?>
