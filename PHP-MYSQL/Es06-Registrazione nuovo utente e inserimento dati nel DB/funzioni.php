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
    <input type="submit"  name="invio" value="invio"> 
	<br> <br>
	<input type="reset"   value="cancella">
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
	$registr = "INSERT INTO utente(id, nome, cognome, nascita, mail, username, pasword) VALUES(NULL, '$nome','$cognome','$nascita','$mail','$username','$password')";
	
	if($pdo->query($registr)==true)
	{
        echo "Registrazione avvenuta con successo!";
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
