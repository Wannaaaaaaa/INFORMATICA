<html>
<head>
<title>Tabella</title>
</head>
<body>
<font color=#FF0000>
<center>
<h1>Tabella Utente</h1>
</center>
</font>
<?php
//Connessione al database
$conn = mysqli_connect("localhost", "root", "", "tabella");

//Verificare la connessione
if (!$conn) 
{
    die("Connessione fallita: " . mysqli_connect_error());
}

//Selezionare la tabella
$sql = "SELECT * FROM utente";

//Estrarre i dati dalla tabella
$result = mysqli_query($conn, $sql);

//Mostrare i dati estratti
if (mysqli_num_rows($result) > 0) 
{
    // Inizio della tabella
	?>
	<style>
	th{
		background-color: #04AA6D;
	}
	table, th, td
	{
		border: 1px solid;
		border-collapse: collapse; 
		width: 40%;
	}
	table.center 
	{
		margin-left: auto;
		margin-right: auto;
	}
	</style>
	<?php
    echo "<table class = center ><tr><th>ID</th><th>USERNAME</th><th>PASSWORD</th></tr>";

    // Mostra i dati con un ciclo while
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
    }

    // Fine della tabella
    echo "</table>";
} 
else 
{
    echo "La tabella è vuota.";
}

// Chiudere la connessione
mysqli_close($conn);
?>
</body>
</html>
