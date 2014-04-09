<?php
/*Nicolas Balss, Version 1.0 UserStory 10 Task 11/**/	
include('configuration.php');
$jc = new JConfig();

$hostname =  $jc->host;
$username = $jc->user;
$password =$jc->password;
$database = $jc->db;

try{
	$hDB = new mysqli($hostname, $username, $password, $database);
	
}catch(mysqli_sql_exception $e){
	echo 'Error. ' . htmlspecialchars($e->getMessage());
	exit();
	
	}

if (!$hDB) {
    die('no connection: ' . mysql_error());
}
if ($hDB){


}

?>