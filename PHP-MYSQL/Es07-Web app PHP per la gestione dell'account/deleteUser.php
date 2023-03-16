<html>
<head>
<title>ELIMINAZIONE ACCOUNT</title>
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
	//form per cancellazione istanza
	cancUserForm();
}
else 
{
	//cancellazione istanza
	cancUser();
	echo "Torna alla home<br>";
    echo "<a href='index.php'>Home</a><br>";
}
?>     
</body>
</html>
