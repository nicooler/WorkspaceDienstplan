<!-- 

 * User Story 200 - Als Mitarbeiter möchte ich einen Urlaubsantrag stellen können
 *
 * Autor: Daniela Nikolic
 *
 * Urlaubsantrag 
 *
 * Version 2.0 - bearbeitet
 -->
 
<?php
	include 'header.php';
	include 'vacation_check.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<title>Urlaubsantrag</title>	
		
	</head>
	<body>
		
		<table width="100%" height="600" border="0" cellspacing="0" cellpadding="0">
			<br /><br />
			<tr style="background-color:#FAFAFA">
				<td width="25%" valign="top" align="left">
				</td>
				<td style="text-align:center" height="50px" width="50%">
					<?php
					
						if ( isset($_SESSION['vac_request_status']) ) {
							if( $_SESSION['vac_request_status'] == 1 ) {
								echo "<font size='4' style='color:blue'><b><i>Antrag erfolgreich gesendet!</i></b></font>";
							}
							elseif ( $_SESSION['vac_request_status'] == -1 ) {
								echo "<font size='4' style='color:blue'><b><i>Das Datum ist abgelaufen, bitte versuchen Sie es nocheinaml.</i></b></font>";
							}
							elseif ( $_SESSION['vac_request_status'] == -2 ) {
								echo "<font size='4' style='color:blue'><b><i>Es existiert bereits eine Anfrage!</i></b></font>";
							}
							unset($_SESSION['vac_request_status']);
						}
						
						
						list($check_granted, $req_date) = is_granted ($hDB);
						if ($check_granted != -1) {
							if ($check_granted == 1) {
								echo "<font size='4' ><b><i>Your vacation request for ".date("d-m-Y", $req_date)." is granted.</i></b></font><br />";
							}
							elseif ($check_granted == 0) {
								echo "<font size='4' ><b><i>Your vacation request for ".date("d-m-Y", $req_date)." is NOT granted.</i></b></font><br />";
							}
							// Zeigt Benachrichtung an, entweder genehmigt oder nicht
							notification_change ($hDB, $req_date);
						}
						
					?>
				</td>
				<td width="25%" valign="top" align="right">
				</td>
			</tr>
				
			<tr style="background-color:#ffffff">
				<td width="25%"></td>
				<td width="50%" valign="top">
					<table style="background-color:#E1F1F1" class="Dfont" width="100%" height="300" border="0">
						<tr>
							<th colspan="2">
								<h2><FONT style="color:#000000">Urlaubsantrag</FONT></h2>
							</th>
						</tr>
						<form name="vac_req" action="vacation_request.php" method="post">
							<tr> 
								<td width="40%" style="text-align:right">Vorname:</td>
								<td width="60%"><input type="text" name="vorname" value="<?php echo $_SESSION['FirstName']; ?>" size="15" maxlength="10" readonly></td>
							</tr>
							<tr> 
								<td width="40%" style="text-align:right">Nachname:</td>
								<td width="60%"><input type="text" name="nachname" value="<?php echo $_SESSION['LastName']; ?>" size="15" maxlength="10" readonly></td>
							</tr>
							<tr>
								<td width="40%" style="text-align:right">Von:</td>
								<td width="60%"><input type="date" name="start_date" size="10" maxlength="10" placeholder="dd-mm-yyyy" required></td>
							</tr>
							<tr>
								<td style="text-align:right">Bis:</td>
								<td><input type="date" name="end_date" size="10" maxlength="10" placeholder="dd-mm-yyyy" required></td>
							</tr>
							<tr>
								<td style="text-align:right">Resturlaub:</td>
								<td><input type="number" name="days_left" value="<?php echo remaining_total($hDB)?>" size="10" maxlength="10" readonly></td>
							</tr>
							<tr>
								<td style="text-align:right">Kommentar:</td>
								<td><textarea name='comment' rows="4" cols="30" maxlength="100" placeholder="Beschreibe deinen Antrag"></textarea></td>
							</tr>
							<tr>
								<td style="text-align:center" colspan="2">
								<input type="submit" value="Antrag senden"/></td>
							</tr>
						</form>
					</table>
				</td>
				<td width="25%"></td>
			</tr>
			
		</table>

	</body>
</html> 