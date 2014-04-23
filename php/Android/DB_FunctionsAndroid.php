<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
</head>

<body>
<?php
 /*
 Author: Nicolas Balss , 
 Userstory: 320 Als Mitarbeiter möchte ich mich über mein Android smartphone einloggen 
 Version: 1.0
 
 /**/
class DB_Functions {
 
    private $db;
 
    function __construct() {
        require_once 'dbconnect.php';
        // connecting to database
        $this->hDB = new DB_Connect();
        $this->hDB->connect();
    }
 
    
 
 
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
       
    
	 # check database
        $_sql = "SELECT * FROM mitarbeiter WHERE
                    Email='$email' AND
                    Passwort=SHA('$password')
                LIMIT 1";

        # check if data is found
        $_res = mysqli_query($hDB, $_sql);
        $_count = @mysqli_num_rows($_res);

        # Max one entry
	
        if ($_count > 0)
            {
           //login correct

           return $_res;
            
            }
        else
            {
            //login not correct
			return false;
            }
        }
 

}
 
?>
</body>
</html>