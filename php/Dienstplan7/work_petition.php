<!--
Autor: Florian Baumann,
Version: 2,
Userstory: Passwort ändern
Zeitaufwand Userstory: 3h
Task:
Zeitaufwand angezeigter Code: 3h
Beschreibung: Arbeitsantrag kann hier gestellt werden.
-->
<?php
include('header.php');
?>
<tr >
<td>
<br><br>
<h2 class="main_headline">Arbeitsantrag</h2>
<table width="100%" border="0">
<form action="work_petition.php" method="post">
 
  <tr>
    <td width="50%" class="work_petition">Tage: </td>
    <td width="50%"><input name="forename" type="date" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
    <td width="50%" class="work_petition">Schicht: </td>
    <td width="50%"><input name="shift" type="text" size="30" maxlength="30"><br><br></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td style="text-align: left" ><input type="submit" name="submit" value="Schicht beantragen"><br><br></td>
  </tr>
</form>
</table>
</td>
</tr>
