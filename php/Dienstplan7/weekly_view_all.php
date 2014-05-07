<!--
Autor: Florian Baumann,
Version: 2,
Userstory: Als Mitarbeiter möchte ich auch über meinen Browser, meine Arbeitsstunden einsehen können; 410 Als Mitarbeiter möchte ich ein ansprechendes und einheitliche Design der Website.
Zeitaufwand Userstory: 16h
Task:
Zeitaufwand angezeigter Code: 1h
Beschreibung: Eingeloggter Mitarbeiter kann Schichten aller Mitarbeiter in der aktuellen Woche anschauen. Die Tabelle ist dynamisch und kann über Eintragungen in der DB verändert werden.
-->

<!--Session Start und Anbindung an den header-->
<?php
include('header.php');

echo '<tr><td>';
echo '<br><br>';
echo '<h2 class="main_headline">Wochenschichten</h2>';

# Liest MA_Id aus Session in Variable
$maID = ($_SESSION['MA_Id']);

# Anzahl der Schichten wird ermittelt
$sql = "SELECT count(Rangfolge) FROM Dienst";
$shiftAmount = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: shiftAmount");

#Rangfolge wird ermittelt
$sql = "SELECT Rangfolge FROM Dienst";
$rankAmount = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: rankAmount");

# Die DienstBezeichnung in Variablen schreiben
$sql = "SELECT DienstBezeichnung FROM Dienst";
$shift =  mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: shift");

# Schichten mit Zeiten sollen ausgelesen werden.
$sql = "SELECT DienstBezeichnung, StartZeit, EndZeit FROM Dienst";
$timeShift = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: timeShift");

# Schichten mit Zeiten sollen ausgelesen werden. Wird zum erstellen der zweiten Tabelle benötigt.
$sql = "SELECT DienstBezeichnung, StartZeit, EndZeit FROM Dienst";
$stimeShift = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: stimeShift");

# Liest die Rangfolge aus
$sql = "SELECT Rangfolge FROM Dienstplan dp JOIN MitarbeiterArbeiten ma ON ma.PlanID = dp.PlanID WHERE ma.MA_Id ='$maID'";
$rank = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich: rank");

echo '<div align="center">';

# Anfang oberste Tabelle.
echo '<table border ="1" width="70%" cellspacing="0" cellpadding="0" class="weekMainTable">
	<tr><th width="12.5%" ></th>
    <th width="12.5%" class="weekDayView">Montag</th>
    <th width="12.5%" class="weekDayView">Dienstag</th>
	<th width="12.5%" class="weekDayView">Mittwoch</th>
	<th width="12.5%" class="weekDayView">Donnerstag</th>
	<th width="12.5%" class="weekDayView">Freitag</th>
	<th width="12.5%" class="weekDayView">Samstag</th>
	<th width="12.5%" class="weekDayView">Sonntag</th>
  </tr>
  <tr><td style="border-bottom:none;">
  
<table width="100%" class="tableShiftDescription" cellspacing="0" cellpadding="0" >';
# Anfang Tabelle: Schichtbezeichnungen. 
 
# Tabelle für die Schichtbezeichnungen wird erstellt		
while($row = mysqli_fetch_array($timeShift)){
	echo '<tr><td class="innerTableShiftDescriptionAll"><span class="shiftDescriptionTableContent">'.$row["DienstBezeichnung"].'<br>'.$row["StartZeit"].' - '.$row["EndZeit"].'</span></td></tr>';
}
	echo '</table></td>';
# Ende Tabelle: Schichtbezeichnungen.


# Aktuelles Datum wird ausgelesen.
$timestamp = time();
$currentdate = date("d.m.Y",$timestamp);

# Jetzt muss aus der aktuellen Woche das Datum des Montags ausgelesen werden.
	# letzten Sonntag bestimmen
	$date = mktime(0, 0, 0, date('m'), date('d') - (date('w')) , date('Y'));
	# Tag wird um 1 nach oben gesetzt und wir erhalten den Montag der aktuellen Woche. 
	$date =strtotime("+1 day", $date); # Montag als UNIX-Timestamp.
	$currentMonday = date('d.m.Y', $date);

# Ermittlung Anzahl der Schichten.
$shiftCount = 0;
while($tr =  mysqli_fetch_array($stimeShift)){
	$shiftCount++;
}	

# Tabelle mit den einzelnen Schichteinträgen wird erstellt.	
for($i=1; $i<= 7; $i++){
	
	$tempDate = date("Y-m-d", $date); # Wird für sql umgewandelt.
	$tempSc = $shiftCount;
	$tempRankShift = 1;
	echo '<td style="border-bottom:none">';
	# Anfang Tabelle: Schicht einzelner Wochentage.
	echo '<table class="dailyShift" cellspacing="0" cellpadding="0">';
		while($tempSc != 0){ #Rangfolge muss abgefragt werden und auch unten im select verwendet werden.
			$tempSc--;
			$sql = "SELECT m.Vorname, m.Nachname, dp.Rangfolge, dp.StartDatum 
			FROM mitarbeiter m JOIN  MitarbeiterArbeiten ma ON m.MA_ID = ma.MA_Id  JOIN Dienstplan dp ON dp.PlanID = ma.PlanID 
			WHERE dp.StartDatum = '$tempDate' AND dp.Rangfolge = '$tempRankShift'";
			$result = mysqli_query($hDB, $sql) or die("Abfrage war nicht erfolgreich");
			
			if($result!=null){
				echo '<tr><td class="dailyShiftTableContentAll">';
					while($name = mysqli_fetch_array($result)){
						echo '<span class="innerDailyShiftOnAll">';
						echo $name["Vorname"].'&nbsp';
						echo $name["Nachname"].'<br>';
						echo '</span>';
				}
				echo '</td></tr>';
			}else{
				echo '<tr><td class="innerDailyShiftOffAll" ></td></tr>';
			}
				
			$tempRankShift++;
		
		}
		$date =strtotime("+1 day", $date);
	echo'</table>';	
	# Ende Tabelle: Schicht einzelner Wochentage.
	
	echo '</td>';	
		
}

echo'</tr>
	</table>';	
	# Ende oberste Tabelle.
	
	echo '</div>';
?>
</tr></td>
</body>
</html>