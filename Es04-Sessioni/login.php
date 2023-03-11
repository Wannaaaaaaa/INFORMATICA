<html>
<head>
<title>LOGIN</title>
</head>
<body>
<?php
session_start();
require 'funzioni.php';
if(!isset($_POST["invio"]))
{
    ?>
    <h1>Pagina di login</h1>
    <br> <br>
    <form name="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
	controlloUser($usr);
	controlloPass($pwd);
    if($usr=="Flavio" && $pwd=="Ciao_1234")
    {
	    $_SESSION["username"]=$usr;
	    $_SESSION["password"]=$pwd;
	    header("Location:riservata.php");
	    exit;
    }
    else
    {
        echo "Errore! Username o password errati.";
        exit;
    }
}
?>
</body>
</html>
