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
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT id, username, password FROM utente ORDER BY id, username, password ASC|DESC";
$result = mysqli_query($conn, $sql);

//Mostrare i dati estratti
if (mysqli_num_rows($result) > 0) 
{
    // Inizio della tabella
	?>
	<table>
	<thead>
	<tr>
	<th><a href="orderedTable.php?sort_column=id">id</a></th>
	<th><a href="orderedTable.php?sort_column=username">username</a></th>
	<th><a href="orderedTable.php?sort_column=password">password</a></th>
	</thead>
	<?php>
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
