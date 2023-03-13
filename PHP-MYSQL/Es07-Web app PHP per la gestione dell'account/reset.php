<html>
<head>
<title>RESET PASSWORD</title>
</head>
<body>
<?php
session_start();
require 'funzioni.php';
//definizioni del database
define('DB_SERVER', 'localhost');
define('DB_NAME', 'es05');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

if(!isset($_SESSION['login']))
{
	if(!isset($_POST['invio']))
	{		  
        //visualizzoform di reset password
		form_reset();
	}
	else 
    {
		//reset password
		reset_password();
	}
}
else
{
	echo "Password cambiata!<br>";
	echo "<a href='login.php'></a><br>";
}
?>
</body>
</html>
