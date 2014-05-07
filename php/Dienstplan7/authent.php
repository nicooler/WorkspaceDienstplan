<!-- Session wird gestartet und es wird überprüft ob Session nicht gestartet wurde, wenn das der Fall ist wird auf login Seite verlinkt -->
<?php
session_start();
if(!isset($_SESSION['login'])) {
	//header noch anpassen!
header("location:login.php");
echo "no login";
exit;
}

?>
