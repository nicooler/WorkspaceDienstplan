
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<?php
error_reporting(0);
 /*Nicolas Balss, Version 1.0 UserStory 10 PHP Funktion Login
 Task 11/**/	
    # Connect to database
    include('dbconnect.php');
 	if(!isset($_SESSION)){
    session_start();
}

   

    # $_POST not null, found data
    if (!empty($_POST["submit"]))
        {
        # Insert Data from form, using escape, so no sql insert possible
        $_username = mysqli_real_escape_string($hDB, $_POST["username"]);
        $_passwort = mysqli_real_escape_string($hDB, $_POST["passwort"]);
		
		# for java byte[] decodedHash = Base64().decode(hash); 
		
        # check database
        $_sql = "SELECT * FROM mitarbeiter WHERE
                    Email='$_username' AND
                    Passwort=SHA('$_passwort')
                LIMIT 1";

        # check if data is found
        $_res = mysqli_query($hDB, $_sql);
        $_count = @mysqli_num_rows($_res);

        # Max one entry
	
        if ($_count > 0)
            {
            echo "Login erfolgreich<br>";

            # save login
            $_SESSION['login'] = true;
			$_SESSION['Name'] = Name;
            
            }
        else
            {
            echo "Login nicht korrekt.<br>";
			
            }
        }
    if (!isset($_SESSION['login']))
        {
        # user is not logged in go to loginpage
        # close database connection
		#hier noch die richtige html datei hinzufügen
        include("login-formular.html");
		
        mysqli_close($hDB);
        exit;
        }
	# if user is logged in
    # change form!
    echo "Willkommen auf im Forum Diesnplan<br>";
  
  #save session variables

  
    if($result = mysqli_query($hDB,$_sql)){
	    if($row = mysqli_fetch_object($result)) {
    	
        $_SESSION['MA_Id'] = htmlspecialchars($row->MA_Id);
        $_SESSION['FirstName'] = htmlspecialchars($row->Vorname);
        $_SESSION['LastName'] =htmlspecialchars($row->Nachname);
    
  
       }
	}
    # Close database connection
    mysqli_close($hDB);
	# Einfügen der nächsten Daten oder eine Weiterleitung
	echo "Login erfolgreich";
	
?>

</body>
</html>