<!DOCTYPE html>

<html lang="pl-PL">

<head>
	<meta charset="UTF-8">
	<meta name="Ćwiczenia - mySQL - Kino" content="ćwiczenia, mySQL, kino">	
	<title>						
	Ćwiczenia - mySQL - Kino
	</title>
</head>

<body>

	<h1>
	<strong><em>Ćwiczenia - mySQL - Kino</em></strong>
	</h1>
	
	<br>
<hr>
	<br>
	
<fieldset>
<legend><strong><em>Dodawanie danych do bazy danych "KINO"</em></strong></legend>

	<label> 
	<br>					
		<strong>Kino:</strong>
			<form action="index.php" method="POST">
			<input type="text" name="kino"> 	
			<button type="submit" name="submit" value="kino">Wyślij</button>
			</form>
	</label>

	<br>

	<label> 				
		<strong>Film:</strong>
			<form action="index.php" method="POST">
			<input type="text" name="film"> 
			<button type="submit" name="submit" value="film">Wyślij</button>
			</form>
	</label>
	
	<br>

	<label> 					
		<strong>Bilet:</strong>
			<form action="index.php" method="POST">
			<input type="text" name="bilet"> 
			<button type="submit" name="submit" value="bilet">Wyślij</button>
			</form>
	</label>
	
	<br>
		
	<label> 					
		<strong>Płatność:</strong>
			<form action="index.php" method="POST">
			<input type="text" name="platnosc">
			<button type="submit" name="submit" value="platnosc">Wyślij</button>
			</form>
	<br>			
	</label>

</fieldset>	
	
	<br>

	<br>
<hr>
	<br>

	<h2>
	Status połączenia z bazą danych:
	</h2>
<br>
		
<?php

$servername = "localhost";
$username = "root";
$password = "cwiczenia";
$baseName = "kino";

	$conn = new mysqli($servername, $username, $password, $baseName);

		if ($conn->connect_error) {
			die("Połączenie nieudane. Błąd: " . $conn->connect_error);
		}
		else {
			echo "Połączenie z bazą ", '<strong>', $baseName, '</strong>', " udane :)";
			echo '<br>';
			echo '<br>';
		}

	$conn->close(); 	// zamykanie tabeli ZAWSZE na końcu - to logiczne!
	$conn = null; 		// zamykanie tabeli ZAWSZE na końcu - to logiczne!

?>
	<br>
<hr>
	<br>

</body>

</html>	