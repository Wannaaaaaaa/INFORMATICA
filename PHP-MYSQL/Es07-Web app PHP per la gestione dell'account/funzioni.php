<?php

function form_login()
{
	?>
	<font color=#FF0000>
    <h1>BENVENUTI NEL FORM DI LOGIN</h1>
    </font>
    <h4>Inserire i dati richiesti:</h4>
	<form name="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
	Username: <input type="text" name="username"> <br> <br>
	Password: <input type="password" name="password"> </br> </br> 
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
    <p>Non sei registrato? <a href="registrazione.php"> Registrati subito!</a>.</p>
	<p>Hai dimenticato la password? <a href="reset.php"> Cambia Password!</a>.</p></br>
	<?php
}

function login()
{	
	//variabili login
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//query per database
	$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);	
	
	//interogazione database
	$interr = "SELECT * FROM utente WHERE username = '$username' AND password = '$password'";
	//risultato interrogazione
	$ris = $pdo->query($interr);
	
	if($ris->rowCount()>0){
		$_SESSION['login']=true;
		echo "<a href='riservata.php'>pagina riservata!</a>";
	}
	else
	{
		$_SESSION['login']=false;
		echo "<a href='index.php'>Credenziali sbagliate!";
	}
}

function form_registrazione()
{
	?>
	<style>
    .errore {color: #FF0000;} 
    </style>
	<font color=#FF0000>
    <h1>BENVENUTI NEL FORM DI REGISTRAZIONE</h1>
    </font>
    <h4>Inserire i dati richiesti:</h4>
    <p><span class="errore">* campo obbligatorio</span></p>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    Nome: 
    <input type="text" name="nome"> 
    <span class="errore">*</span>
    <br> <br>
	Cognome: 
    <input type="text" name="cognome"> 
    <span class="errore">*</span>
	<br> <br>
	E-mail: 
    <input type="text" name="email"> 
    <span class="errore">*</span>
    <br> <br>
	Data di nascita: 
    <input type="date" name="nascita"> 
    <span class="errore">*</span>
	<br> <br>
	Username: 
	<input type="text" name="username"> 
	<span class="errore">*</span>
	<br> <br>
	Password: 
	<input type="password" name="password"> 
	<span class="errore">*</span>
    <p><input type="checkbox" required name="terms"> <a href="https://github.com/Wannaaaaaaa/INFORMATICA">Accetto i termini e le condizioni sull'informatica privacy</a></p>
    <input type="submit" name="invio" value="invio"> 
	<br> <br>
	<input type="reset" value="cancella">
    </form>
	<?php
}

function registrazione()
{
	$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$mail=$_POST['email'];
	$nascita=$_POST['nascita'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//query per database
	$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	
	//inserisco i dati
	$registr = "INSERT INTO utente(id, nome, cognome, nascita, mail, username, password) VALUES(NULL, '$nome','$cognome','$nascita','$mail','$username','$password')";
	
	if($pdo->query($registr)==true)
	{
        echo "Registrazione avvenuta con successo!<br>";
		echo "<a href='login.php'>Login!</a><br>";
    }
	else
	{
        $_SESSION['login'] = false;
		echo "Registrazione fallita!";
	}
	//termino connessione al database
	$pdo=null;
}
function form_resetPass()
{
	?>
	<font color=#FF0000>
    <h1>BENVENUTI NEL FORM DI RIPRISTINO PASSWORD</h1>
    </font>
    <h4>Inserire i dati richiesti:</h4>
	<form name="formLogin" action="reset.php" method="POST">
	Username: <input type="text" name="username"> <br> <br>
	E-mail: <input type="text" name="email"> <br> <br>
	Nuova password: <input type="password" name="password"> <br> <br>
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
    <p>Torna alla pagina<a href="index.php"> home!</a>.</p>
	<?php
}
function reset_password()
{
	//passo le variabili con POST
	$username = $_POST['username'];
        $password = $_POST['password'];
	$mail = $_POST['email'];
	
	//query per database
	$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	
	//interogazione database
	$interr = "SELECT * FROM utente WHERE username = '$username' AND mail = '$mail'";
	//risultato interrogazione
	$ris = $pdo->query($interr);
	if($ris->rowCount()>0)
	{
		//se vero
		$_SESSION['login']=true;
			
		$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$pasRes = "UPDATE utente SET password='$password' WHERE username='$username'";
		//controllo se la query è andata a buon fine
		if($pdo->query($pasRes)==true)
		{
			echo "Password aggiornata <br>";
		}
		else
		    echo "Impossibile aggiornare la password <br>";
	}
	else
	{
		//se falso
		$_SESSION['login']=false;
		echo "Errore! <a href='reset.php'> Cambia Password</a><br>";
	}
	
	//termino connessione al db
	$pdo=null;
}

function cancUserForm()
{
	?>
	<font color=#FF0000>
    <h1>BENVENUTI NEL FORM DI RIPRISTINO PASSWORD</h1>
    </font>
	<form name="formLogin" action="deleteUser.php" method="POST">
	E-mail: <input type="text" name="email"> <br> <br>
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
    <p><a href="index.php">home!</a>.</p>
	<?php
}

function cancUser(){
	$mail = $_POST['email'];

    $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $canc = "DELETE FROM utente WHERE mail='$mail'";
		
	//controllo se la query è andata a buon fine
    if($pdo->query($canc)==true)
	{
        echo "Eliminazione avvenuta correttamente!<br>";
    }
	else
		$_SESSION['login']=false;
        echo "Impossibile eliminare l'account!<br>";
	
	//chiudo la connessione al database
	$pdo=null;
	session_destroy();
}
?>
