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

if(!isset($_POST['invio']))
{		  
    //visualizzo form di reset password
	form_resetPass();
}
else 
{
	//reset password
	reset_password();
	echo "<a href='login.php'>Login<br></a>";
}
?>
</body>
</html>
