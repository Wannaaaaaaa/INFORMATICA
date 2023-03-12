<html>
<head>
<title>Login</title>
</head>
<body> 
<?php
//sessione in php
session_start();
require 'funzioni.php';
//definizione del db
define('DB_SERVER', 'localhost');
define('DB_NAME', 'es05');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

if(!isset($_SESSION['login']))
{
	//il login non è ancora verificato
	if(!isset($_POST['invio']))
	{
		//Visualizzo il form
        form();
	}
	else
	{
		//connessione al database
		login();
	}
}
else
{
	//L'utente ha già fatto il login
	echo "L'utente ha già effetuato il login <br>";
	echo "<a href='index.php'>Home</a><br>";
	echo "<a href='logout.php'>Esci</a><br>";
}
?>
