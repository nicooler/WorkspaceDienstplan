<!--Autor: Florian Baumann, Version 1, Userstory: Tabelle für PHP-->
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
        <div style="width: 10%; float: right; margin-right: 30px; font-weight: 400; color: white; font-size:20px; margin-top:10px">
            
				
						<a href="pwchange.php">Passwort ändern</a>
					
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
    <col width="25%">
    <col width="25%">
    <col width="25%">
    <col width="25%">
  	</colgroup>
        <tr style="text-align:center">
        
        <td width="25%">&nbsp;</td>
          <td width="25%" class="navigation_bar" 
          onMouseOver="this.style.background='url(images/bright_blue.png)'"
          onMouseOut="this.style.background='url(img/white.jpg)'">
          <a href="daily_view.php">Tagesansicht</a></td>
          <td width="25%" class="navigation_bar" 
          onMouseOver="this.style.background='url(images/bright_blue.png)'"
          onMouseOut="this.style.background='url(img/white.jpg)'">
          <a href="weekly_view.php">Wochenansicht</a></td>
          <td width="25%">&nbsp;</td>
          
        </tr>
    </table></td>
  </tr>