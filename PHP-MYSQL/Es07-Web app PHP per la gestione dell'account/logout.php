<html>
<head>
<title>LOGOUT</title>
</head>
<body>
<?php
session_start();
session_destroy();
echo "Logout effettuato con successo. Arrivederci";
?>
<br>
<a href="login.php">Accedi di nuovo</a><br>
<a href="index.php">Torna alla home del sito</a><br>
</body>
</html>
