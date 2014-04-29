 <?php
 /*
  * User Story 200 - Als Mitarbeiter möchte ich einen Urlaubsantrag stellen können
  *
  * Autor: Daniela Nikolic
  *
  * Urlaubsantrag  
  *
  *Version 1.0
 */
	include 'authent.php';
	
	// Unsere Daten von POST.
	$vacStartDate = $_POST['start_date'];
	$vacEndDate = $_POST['end_date'];
	$vacCmnt = $_POST['comment'];
	
	// Benutzereingaben überprüfen...
	if($vacStartDate == '' or $vacEndDate == '') {
		header('Location: urlaubsantrag_form.php');  
		exit;
	}
	// DB Verbindung
	include 'dbconnect.php';
	
	// Daten in die Tabelle Urlaubsantrag einfügen
	$user_id = $_SESSION['MA_Id'];
	$query = "INSERT INTO Urlaubsantrag ( MA_Id, start_date, end_date, kmnt ) VALUES ( '$user_id', '$vacStartDate', '$vacEndDate', '$vacCmnt' );";
	$hDB->query($query);
	$hDB->close();;
	
	// Erfolgreich versendet
	$_SESSION['Success_status'] = TRUE;
    header('Location: urlaubsantrag_form.php'); 
	
?>