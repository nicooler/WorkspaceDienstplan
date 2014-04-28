<!--
Autor: Florian Baumann,
Version: 1,
Userstory:
Zeitaufwand Userstory:
Task:
Zeitaufwand angezeigter Code:
Beschreibung:
-->
<!-- Die Session wird hier beendet bzw. zerstört und auf die Seite login.php geleitet -->
<?php
session_start();
session_destroy();

header("Location: login.php");
?>