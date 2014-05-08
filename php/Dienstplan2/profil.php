<!-- 
 * User Story 420 ... Als Mitarbeiter möchte ich ein Profil haben
 *
 * Autor: Daniela Nikolic
 *
 * Profil
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
		<title>Profil</title>
	</head>
	<body>
		
		<?php
	
			$user_id = $_SESSION['MA_Id'];
			$user_fname = $_SESSION['FirstName'];
			$user_lname = $_SESSION['LastName'];
			$query = "SELECT GebDatum, Strasse, Ort, TelefonNr, Beschaeftigungsgrad, Email FROM Mitarbeiter WHERE MA_Id = '$user_id';";
			if( !$result = $hDB->query($query) ) {
				die('Ein Fehler ist aufgetreten [' . $hDB->error . ']');
			}
			// Fetch object array.
			$row = $result->fetch_object();
			$php_date = strtotime($row->GebDatum);
			$user_birth = date("d-m-Y", $php_date);
			$user_street = $row->Strasse;
			$user_place = $row->Ort;
			$user_tel = $row->TelefonNr;
			$user_joblvl = $row->Beschaeftigungsgrad;
			$user_email = $row->Email;
			// Variabel $result, freisetzen.
			$result->close();
			// Verbindung schließen.
			$hDB->close();
		?>
		<table width="100%" height="350" border="0" cellspacing="0" cellpadding="0">
		<br/><br/>
			<tr style="background-color:#ffffff">
				<td width="25%"></td>
				<td style="vertical-align:top;text-align:center" width="25%">
			
					<form action="upload_file.php" method="post" enctype="multipart/form-data">
						<label for="file">
					<?php
						// Überprüfen ob file existiert.
						$user_dir = 'images/' .$_SESSION['MA_Id']. '/pic.jpg';
						if (file_exists($user_dir)) {
							echo "<img src='".$user_dir."' height='50%' width='50%' />";
						} 
						else {
							echo "<img src='images/default_profile.jpg' alt='Bild_kommt_hier_her' height='70%' width='70%' />";
						}
					?>
						</label>
					
						<input type="file" name="file" id="file" style="width:80px; height:25px; overflow:hidden;" hidden><br /><br />
						<input type="submit" name="submit" value="Upload">
					</form>
					
				</td>
				<td style="vertical-align:top" width="25%">
					<table style="background-color:#E1F1F1" width="100%" border="0">
						<form name="change_data" action="userdata_change.php" method="post">
						<tr>
							<td style="text-align:right"><b><i>Vorname:</i></b></td>
							<td style="text-align:left"><input type="text" name="f_name" size="25" maxlength="15" placeholder="<?php echo $user_fname; ?>" readonly></td>
						</tr>
						<tr>	
							<td style="text-align:right"><b><i>Nachname:</i></b></td>
							<td style="text-align:left"><input type="text" name="l_name" size="25" maxlength="15" placeholder="<?php echo $user_lname; ?>" readonly></td>
						</tr>
						<tr>	
							<td style="text-align:right"><b><i>Geburtsdatum:</i></b></td>
							<td style="text-align:left"><input type="date" name="birth_date" size="25" maxlength="10" placeholder="<?php echo $user_birth; ?>" readonly></td>
						</tr>
						<tr>
							<td style="text-align:right"><b><i>Straße:</i></b></td>
							<td style="text-align:left"><input type="text" name="street_name" size="25" maxlength="20" placeholder="<?php echo $user_street; ?>"></td>
						</tr>
						<tr>
							<td style="text-align:right"><b><i>Ort:</i></b></td>
							<td style="text-align:left"><input type="text" name="user_place" size="25" maxlength="20" placeholder="<?php echo $user_place; ?>"></td>
						</tr>
						<tr>	
							<td style="text-align:right"><b><i>Telefonnr.:</i></b></td>
							<td style="text-align:left"><input type="tel" name="tel_num" size="25" maxlength="20" placeholder="<?php echo $user_tel; ?>"></td>
						</tr>
						<tr>
							<td style="text-align:right"><b><i>Beschaeftigungsgrad:</i></b></td>
							<td style="text-align:left"><input type="text" name="job_lvl" size="25" maxlength="20" placeholder="<?php echo $user_joblvl; ?>" readonly></td>
						</tr>
						<tr>
							<td style="text-align:right"><b><i>E-mail:</i></b></td>
							<td style="text-align:left"><input type="text" name="e_mail" size="25" maxlength="30" placeholder="<?php echo $user_email; ?>" readonly></td>
						</tr>
						<tr>
							<td style="text-align:center" colspan="2">
								<br />
								<input type="submit" name="submit_change" value="Bearbeiten">
							</td>
						</tr>
						</form>
					</table>
				</td>
				<td width="25%">
				</td>
			</tr>
		</table>
	</body>
</html>