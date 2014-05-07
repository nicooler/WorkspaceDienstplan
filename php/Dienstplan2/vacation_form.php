<!-- 

 * User Story 200 - Als Mitarbeiter möchte ich einen Urlaubsantrag stellen können
 *
 * Autor: Daniela Nikolic
 *
 * Urlaubsantrag 
 *
 * Version 1.0 
 -->
 
 <?php
	include 'header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<title>Urlaubsntrag</title>
		
	</head>
	<body>
		
		<table width="100%" height="600" border="0" cellspacing="0" cellpadding="0">
				<td style="text-align:center" width="25%">
					<?php
						if( isset($_SESSION['Success_status']) ) {
							echo "<font size='4' color='red'><b><i>Antrag erfolgreich gesendet!</i></b></font>";
							unset($_SESSION['Success_status']);
						} 
					?>
				</td>
				
			<tr style="background-color:#ffffff">
				<td width="25%"></td>
				<td width="50%">
					<table style="background-color:#E1F1F1" class="Dfont" width="100%" height="300" border="0">
							<tr>
								<th colspan="2">
									<h2><FONT COLOR="#000000">Urlaubsantrag</FONT></h2>
								</th>
							</tr>
						<form name="vac_req" action="urlaubsantrag.php" method="post">
						<tr> 
						    <td width="40%" style="text-align:right">Vorname:</td>
							<td <td width="60%"><input type="text" name="vorname" value="<?php echo $_SESSION['FirstName']; ?>" size="15" maxlength="10" readonly></td>
							</tr>
							<tr> 
						    <td width="40%" style="text-align:right">Nachname:</td>
							<td <td width="60%"><input type="text" name="vorname" value="<?php echo $_SESSION['LastName']; ?>" size="15" maxlength="10" readonly></td>
							</tr>
							<tr>
								<td width="40%" style="text-align:right">Von:</td>
								<td width="60%"><input type="date" name="start_date" size="10" maxlength="10" placeholder="yyyy-mm-dd" required></td>
							</tr>
							<tr>
								<td style="text-align:right">Bis:</td>
								<td><input type="date" name="end_date" size="10" maxlength="10" placeholder="yyyy-mm-dd" required></td>
							</tr>
							<tr>
								<td style="text-align:right">Kommentar:</td>
								<td><textarea name='comment' rows="4" cols="30" maxlength="100" placeholder="Beschreibe deinen Antrag"></textarea></td>
							</tr>
							<tr>
								<td style="text-align:center" colspan="2"><input type="submit" value="Antrag senden"/></td>
							</tr>
						</form>
					</table>
				</td>
				<td width="25%"></td>
			</tr>
			
		</table>

	</body>
</html> 