<?php
/*
 * User Story 420 ...  - Als Mitarbeiter möchte ich ein Profil haben
 *
 * Autor: Daniela Nikolic
 *
 * Upload file. 
 *
 * Version 1.0 
*/

	include 'authent.php';
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$tempArray = explode(".", $_FILES["file"]["name"]);
	$extension = end($tempArray);
	// Dateigröße muss unter 1MB sein.. UND.. Datei muss .gif, .jpeg, .jpg oder .png typ sein
	if ( ($_FILES["file"]["size"] < 1048576) && in_array($extension, $allowedExts) ) {
			if ($_FILES["file"]["error"] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			} 
			else {
				$user_dir = 'images/'.$_SESSION['MA_Id'];
				
				// Wenn Benutzerordner nicht existiert, mache einen
				if ( !is_dir($user_dir) ) {
					mkdir($user_dir, true);
				}
				$user_file_path = $user_dir. "/pic.jpg";
				move_uploaded_file($_FILES["file"]["tmp_name"], $user_file_path);
				header('Location: profil.php');
			}
	} 
	else {
		echo "Invalid file";
		header('Location: profil.php');
	}
?> 