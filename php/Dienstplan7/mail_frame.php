<!--
Autor: Florian Baumann,
Version: 2,
Userstory: Passwort soll geändert werden
Zeitaufwand Userstory: 3h
Task:
Zeitaufwand angezeigter Code: 3h
Beschreibung: Passwort kann geändert werden. Nur eingeloggter Mitarbeiter kann sein Passwort ändern nicht die der Änderen.
-->
<html>

<meta charset="utf-8">
<title>Dienstplan - Passwort wurde geändert</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

</style>
</head>

<body>
<div id="header" style="background-color: #ffffff; min-height: 40px">
<div style="width: 10%; float: left; margin-left: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">

<img src="images/logo.png" width=100% height="150" />

</div>
<div style="text-align: left; margin-left:40%">

     <span  style="margin-bottom:20%; font-family: Arial Narrow; text-align: center">Passwort wurde geändert</span>
    
      </div>
</div>
<table width="100%" border="0">
	<tr>
		<td style="font-family: Arial Narrow; text-align:right">Ihr neues Passwort: </td>
		<td style="font-family: Arial Narrow; text-align:left"><?php echo 'Variable die Passwort enthält' ?> </td>
	</tr>
</body>
</html>