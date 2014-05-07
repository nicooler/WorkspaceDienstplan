<!--
Autor: Florian Baumann,
Version: 2,
Userstory:410 Als Mitarbeiter möchte ich ein ansprechendes und einheitliche Design der Website, 330 Gewisse Rollen können Mitarbeiter über Website anlegen.
Zeitaufwand Userstory: 4h,
Task:
Zeitaufwand angezeigter Code: 1h,
Beschreibung: Header wurde überabeitet. Leute mit bestimmten Rollen erhalten jetzt Zugriff auf Mitarbeiter anlegen.
-->

<!-- Session wird gestartet -->
<?php
include ('authent.php');
?>

<html>
<head>
<meta charset="utf-8">
<title>Dienstplan</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</style>
</head>

<!--Datenbankverbindung-->
<?php
include('dbconnect.php');
?>

<body>
<!-- Zeile 1-->
<table width="100%" border="0" >
<tr>
<td height="153">
<div id="header" style="background-color: #ffffff; min-height: 40px">
<div style="width: 10%; float: left; margin-left: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
<a href = "index.php">
<img src="images/logo.png" width=100% height="150" />
</a>
</div>
<div style="text-align: left; margin-left:20%">

     <span class="head_title"  style="margin-bottom:20%">Dienstplan</span>
    
      </div>
</div>
</td>
</tr>
<!-- Zeile 2-->
  <tr>
    <td>
    <div id="header" style="background-color: #57A7D6; min-height: 40px">
	<div style="width: 20%; float: left; margin-right: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
	
	<!-- Wenn eine Session besteht, sprich wenn man sich angemeldet hat wird Abmelden auf der Website ausgegeben -->
	<?php
					if(isset($_SESSION['MA_Id'])) {
						echo '<a href="logout.php">Abmelden</a>&nbsp&nbsp;';
					}
					# Wert von Rolle wird aus der Session in Variable geschrieben
					if(isset($_SESSION['role'])){
						$role = ($_SESSION['role']);							
					}	
					
					# Es wird unterschieden ob Rolle 0 oder 1 eingelogt ist beide erhalten Zugriff auf Mitarbeiter anlegen.
					
					if($role == 0){
						echo '<a href="workmate_setting.php">Mitarbeiter anlegen</a>';
					}
					if($role == 1){
						echo '<a href="workmate_setting.php">Mitarbeiter anlegen</a>';
					}
	?>	
				
             <br>           
        </div>
        <div style="width: 10%; float: right; margin-right: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">        
						
						<a href="pwchange.php">Passwort &aumlndern</a>	
             <br>  
        </div>
     </div>
    </td>
  </tr>
<!-- Zeile 3-->  
<tr>
    <td>
      <table width="100%" border="0">
      <colgroup>
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="20%">
	<col width="20%">
  	</colgroup>
        <tr style="text-align:center">
        
        <td width="20%" class="navigation_bar"
		onMouseOver="this.style.background='url(images/bright_blue.png)'"
        onMouseOut="this.style.background='url(img/white.jpg)'">
		<a href="profil.php">Profil</a></td>
        <td width="20%" class="navigation_bar" 
        onMouseOver="this.style.background='url(images/bright_blue.png)'"
        onMouseOut="this.style.background='url(img/white.jpg)'">
        <a href="message.php">Nachrichten</a></td>
        <td width="20%" class="navigation_bar" 
        onMouseOver="this.style.background='url(images/bright_blue.png)'"
        onMouseOut="this.style.background='url(img/white.jpg)'">
        <a href="weekly_view.php">Wochenansicht</a></td>
		<td width="20%" class="navigation_bar" 
        onMouseOver="this.style.background='url(images/bright_blue.png)'"
        onMouseOut="this.style.background='url(img/white.jpg)'">
		<a href="weekly_view_all.php">Wochenansicht gesamt</a></td>
        <td width="20%" class="navigation_bar" 
        onMouseOver="this.style.background='url(images/bright_blue.png)'"
        onMouseOut="this.style.background='url(img/white.jpg)'">
		<a href="vacation_form.php">Urlaubsantrag</a></td>
		
          
        </tr>
    </table></td>
  </tr>