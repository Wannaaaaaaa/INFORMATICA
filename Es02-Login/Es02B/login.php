index.php
<html>
<head>
<title>FORM</title>
</head>
<body>
<?php
if(!isset($_POST["invio"]))
{
    ?>
    <h1>Richiesta accesso</h1>
    <br> <br>
    <form name="formLogin" action="index.php" method="POST">
	Username: <input type="text" name="username"> <br> <br>
	Password: <input type="password" name="password"> </br> </br> 
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
	<?php
}
else
{
    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    if($usr!="Flavio" || $pwd!="ciao")
	{
		echo "Errore! Username o password errati.";
	}
		
	else
	{	
		echo "<h1>Benvenuto ". $usr. "</h1>";
	}
}
?>
</body>
</html>
