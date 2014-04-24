<!-- Autor: Florian Baumann, Version 1, Userstory: Passwort ändern -->
<?php
session_start();
include('dbconnect.php')

?>

<html>

<meta charset="utf-8">
<title>Dienstplan - Passwort ändern</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

</style>
</head>

<body>
<div id="header" style="background-color: #ffffff; min-height: 40px">
<div style="width: 10%; float: left; margin-left: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
<a href = "index.php">
<img src="images/logo.png" width=100% height="150" />
</a>
</div>
<div style="text-align: left; margin-left:40%">

     <span class="head_title"  style="margin-bottom:20%">Passwort ändern</span>
    
      </div>
</div>
<table width="100%" border="0">
<form action="pwchange.php?page" method="post">
<tr>
    <td width="50%" class="pwchange_data">Altes Passwort: </td>
    <td width="50%"><input name="oldpassword" type="text" size="30" maxlength="30">
	 	 <br><br></td>
  </tr>
  <tr>
    <td width="50%" class="pwchange_data">Neues Passwort: </td>
    <td width="50%"><input name="newpassword" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="pwchange_data">Neues Passwort wiederholen: </td>
    <td width="50%"><input name="newpassword2" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <!--Button um Passwortänderung zu starten-->
  <tr>
    <td width="50%"></td>
    <td width="50%"><input type="button" name="pwchange" value="Passwort ändern"
      onclick=""><br><br></td>
  </tr>
 <!-- PHP Code für Passwortänderung -->
 <!-- PHP Code geht noch nicht ganz-->
 <?php
 /*
 isset($_GET["page"])) {
 $opw = $_POST['oldpassword'];
 $pw = $_POST['newpassword'];
 $pw2 = $_POST['newpassword2'];
 }
 
 if($pw != $pw2) {
        echo "<font color=red>Passwort stimmt nicht überein, Eingabe überprüfen. <a href=\"pwchange.php\">Zurück</a>";
    } 
    else {
	$passworddb = md5($pw);
	// Code um neues Passwort in DB zu schreiben.
 
 }
 */
 ?>
</body>
</html>