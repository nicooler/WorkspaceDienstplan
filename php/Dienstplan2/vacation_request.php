 <?php
 /*
  * User Story 200 - Als Mitarbeiter möchte ich einen Urlaubsantrag stellen können
  *
  * Autor: Daniela Nikolic
  *
  * Urlaubsantrag
  *
  * Version 2.0
 */
	include 'authent.php';
	
	// Unsere Daten von POST.
	$user_start_date = $_POST['start_date'];
	$user_end_date = $_POST['end_date'];
	$vacCmnt = $_POST['comment'];
	
	// Wandelt Benutzerdatum in MySQL Datum um
	$vacStartDate = date("Y-m-d", strtotime($user_start_date));
	$vacEndDate = date("Y-m-d", strtotime($user_end_date));
	
	// Überptüft ob Benutzer Datum eingegeben hat, das nicht früher ist als Morgen
	$today = date("Y-m-d");
	$start_day = new DateTime($vacStartDate);
	if ( $today >= $vacStartDate ) {
		echo "Das Datum ist älter als das aktuelle Datum!";
		$_SESSION['vac_request_status'] = -1;
		header('Location: vacation_form.php');
		exit();	
	}
	
	// Datenbankverbindung
	include 'dbconnect.php';
	$user_id = $_SESSION['MA_Id'];
	
	// Überprüft ob bereits eine Anfrage des Benutzers vorhanden ist
	$query = "SELECT * FROM Urlaubsantrag WHERE MA_Id = '$user_id' AND urlaub_genehmigt = -1;";
	$result = $hDB->query($query);
	$row_cnt = $result->num_rows;
	if ($row_cnt > 0) {
		echo "Eine Anfrage existiert bereits!";
		$_SESSION['vac_request_status'] = -2;
		header('Location: vacation_form.php');
		exit();	
	}
	
	// Neuen Antrag in die Tabelle Urlaubsantrag einfügen
	$query = "INSERT INTO Urlaubsantrag ( MA_Id, start_date, end_date, kmnt ) VALUES ( '$user_id', '$vacStartDate', '$vacEndDate', '$vacCmnt' );";
	$hDB->query($query);
	$hDB->close();
	
	// Anfrage erfolgreich gesendet.
	$_SESSION['vac_request_status'] = 1;
	header('Location: vacation_form.php');
	
?>