<?php
/*
 * User Story ...  - userdata_change.php
 *
 * Autor: Daniela Nikolic
 *
 * Change user data.
 *
 * Version 1.0 
*/

	include 'authent.php';
	
	// Unsere daten von POST
	
	$user_id = $_SESSION['MA_Id'];
	$user_street = $_POST['street_name'];
	$user_place = $_POST['user_place'];
	$user_tel = $_POST['tel_num'];
	
	if ( $user_street != "" ||  $user_place != "" || $user_tel != "" ) {
	
		include 'dbconnect.php';
		
		// Daten aktualisieren
		
		if ( $user_street != "" ) {
			$query = "UPDATE Mitarbeiter SET Strasse = '$user_street' WHERE MA_Id = '$user_id';";
			$hDB->query($query);
		}
		if ( $user_place != "" ) {
			$query = "UPDATE Mitarbeiter SET Ort = '$user_place' WHERE MA_Id = '$user_id';";
			$hDB->query($query);
		}
		if ( $user_tel != "" ) {
			$query = "UPDATE Mitarbeiter SET TelefonNr = '$user_tel' WHERE MA_Id = '$user_id';";
			$hDB->query($query);
		}
		
		$hDB->close();
	}
	
	header('Location: profil.php');
	
?>