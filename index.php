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



?>
	<br>
<hr>
	<br>
	
	<h2>
	Tworzenie tablicy 'Kino', 'Film', 'Bilet', 'Platnosc'.
	</h2>
	
<?php

$sql = "CREATE TABLE Kino (id int AUTO_INCREMENT,
 							name varchar(255),
 							adress varchar(255), 
 							PRIMARY KEY (id))";

$result = $conn->query($sql);

if ($result === TRUE) {
	echo "Tabela Kino została utworzona";
} else {
	echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
	echo '<br>';	
}

echo '<br>';

$sql = "CREATE TABLE Film (id int,
 							name varchar(255),
 							opis varchar(255),
 							PRIMARY KEY (id))";

$result = $conn->query($sql);

if ($result === TRUE) {
	echo "Tabela Film została utworzona";
} else {
	echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
	echo '<br>';
}

echo '<br>';

$sql = "CREATE TABLE Bilet (id int,
 							ilosc int,
 							cena float(5,2),
 							PRIMARY KEY (id))";

$result = $conn->query($sql);

if ($result === TRUE) {
	echo "Tabela Bilet została utworzona";
} else {
	echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
	echo '<br>';
}

echo '<br>';

$sql = "CREATE TABLE Platnosc (id int,
 							typ varchar(20),
 							data date,
 							PRIMARY KEY (id))";

$result = $conn->query($sql);

if ($result === TRUE) {
	echo "Tabela Płatność została utworzona";
} else {
	echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
	echo '<br>';

}

$conn->close(); // zamykanie tabeli ZAWSZE na końcu - to logiczne!
$conn = null; // zamykanie tabeli ZAWSZE na końcu - to logiczne!



// zakomentowałem żeby za każdym razem nie tworzyć tablicy którą już utworzyłem

	
?>	
	<br>
	<br>
<hr>
	<br>		
	
	<h2>
	Pobranie danych z formularza i dodanie ich do bazy:
	</h2>

	<br>
<hr>
	<br>	
	
	
</body>
</html>	