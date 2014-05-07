 <?php
 /*
  * User Story 430 - Als Mitarbeiter möchte ich sehen ob mein Urlaubsantrag genehmigt wurde
  *
  * Autor: Daniela Nikolic
  *
  * Urlaub check.
  *
  * File: vacation_check.php 
  *
  * Version 1.0
  *
 */
 
	
	function remaining_total($hDB) {
		
		$today = date("Y-m-d");
		$current_year = date('Y');
		$max_days = 24; // Maximum verfügbare Urlaubstage.
		$total_spent = 0;
		$user_id = $_SESSION['MA_Id'];
		$query = "SELECT * FROM Urlaubsantrag WHERE MA_Id = '$user_id' AND urlaub_genehmigt = 1 AND YEAR(start_date) = '$current_year'";
		if( !$result = $hDB->query($query) ) {
			die('Ein Fehler ist aufgetreten [' . $hDB->error . ']');
		}
		$row_cnt = $result->num_rows;
		if ($row_cnt > 0) {
			while ( $row = $result->fetch_assoc() ) {
				// Berechnung  der Tage zwischen zwei Datume
				$s_date = new DateTime($row['start_date']);
				$e_date = new DateTime($row['end_date']);
				$interval = date_diff($s_date, $e_date);
				$total_spent += $interval->format('%a');
			}
		}
		return ($max_days - $total_spent);	
	}
	
	function is_granted ($hDB) {
	
		$today = date("Y-m-d");
		$user_id = $_SESSION['MA_Id'];
	
		$query = "SELECT * FROM Urlaubsantrag WHERE MA_Id = '$user_id' AND start_date >= '$today' AND user_notified = 0 
														AND (urlaub_genehmigt = 0 OR urlaub_genehmigt = 1);";
		if( !$result = $hDB->query($query) ) {
			die('Eine Fehler ist aufgetreten [' . $hDB->error . ']');
		}
		$row_cnt = $result->num_rows;
		if ($row_cnt > 0) {
			$row = $result->fetch_assoc();
			$s_date = strtotime($row['start_date']);
			$granted = $row['urlaub_genehmigt'];
			
			return array ($granted, $s_date);
		}
		
		else return array (-1, $today);
	}
	
	function notification_change ($hDB, $vac_start_date) {
	
		$user_id = $_SESSION['MA_Id'];
		// Wandelt benutzerdatum in SQL Datum um
		$vacStartDate = date( "Y-m-d", $vac_start_date );
		$query = "UPDATE Urlaubsantrag SET user_notified = 1 WHERE MA_Id = '$user_id' AND start_date = '$vacStartDate';";
		$hDB->query($query);
	
	}
	
?>