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

<fieldset>
<legend><strong><em>Kino</em></strong></legend>
		<form action="index.php" method="POST">
		<label>Nazwa:</label><br>
		<input type="text" name="kino"> 	
		<label>Adres:</label><br>	
		<input type="text" name="kino">
	<button type="submit" name="submit" value="kino">Wyślij</button>
	</form>
</fieldset>	

	<br>
	
<fieldset>
<legend><strong><em>Film</em></strong></legend>
	<form action="index.php" method="POST">
	<label>Tytuł:</label><br>
	<input type="text" name="film"><br>
	<label>Opis:</label><br>
	<input type="text" name="opis"><br>
	<label>Rating:</label><br>
	<input type="text" name="rating"><br>
	<button type="submit" name="submit" value="film">Wyślij</button>
	</form>
</fieldset>	
	
	<br>

<fieldset>
<legend><strong><em>Bilet</em></strong></legend>
			<form action="index.php" method="POST">
			<input type="text" name="bilet"> 
			<button type="submit" name="submit" value="bilet">Wyślij</button>
			</form>
	</label>
	
	<br>
		
<fieldset>
<legend><strong><em>Płatność</em></strong></legend>
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

$sql = "CREATE TABLE Kino (
			id int,
 			name varchar(255),
 			address varchar(255), 
 			PRIMARY KEY (id))";

$result = $conn->query($sql);

	if ($result === TRUE) {
		echo "Tabela Kino została utworzona";
	}
	else {
		echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
		echo '<br>';	
	};

echo '<br>';


$sql = "CREATE TABLE Film (
			id int,
 			name varchar(255),
 			opis varchar(255),
 			PRIMARY KEY (id))";

$result = $conn->query($sql);

	if ($result === TRUE) {
		echo "Tabela Film została utworzona";
	} 
	else {
		echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
		echo '<br>';
	};

echo '<br>';


$sql = "CREATE TABLE Bilet (
			id int,
 			ilosc int,
 			cena float(5,2),
 			PRIMARY KEY (id))";

$result = $conn->query($sql);

	if ($result === TRUE) {
		echo "Tabela Bilet została utworzona";
	}
	else {
		echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
		echo '<br>';
	};

echo '<br>';


$sql = "CREATE TABLE Platnosc (
			id int,
 			typ varchar(20),
 			data date,
 			PRIMARY KEY (id))";

$result = $conn->query($sql);

	if ($result === TRUE) {
		echo "Tabela Płatność została utworzona";
	} 
	else {
		echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
		echo '<br>';
	};





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

<?php
	
	if (var_dump($_POST) != null) {
	var_dump($_POST);
	echo '<br>';
	var_dump($_POST['kino']);
	echo '<br>';
	var_dump($_POST['film']);
	echo '<br>';
	var_dump($_POST['bilet']);
	echo '<br>';
	var_dump($_POST['platnosc']);
	echo '<br>';
	};


	
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	switch($_POST['submit']){
		case "kino";
			$sql = "INSERT INTO Kino (name) VALUES ('".$_POST['kino']."')";
				// , '".$."')";
			break;
		case "film";
			$sql = "INSERT INTO Film (name) VALUES ('".$_POST['film']."')";
			break;
		case "bilet";
			$sql = "INSERT INTO Bilet (ilosc) VALUES ('".$_POST['bilet']."')";
			break;
		case "platnosc";
			$sql = "INSERT INTO Platnosc () VALUES ('".$_POST['platnosc']."')";
			break;
	}
	
	if ($conn->query($sql) === TRUE) {
		echo "Nowy wpis został dodany do bazy :)";
	} 
	else {
		echo "Coś poszło nie tak: " .$sql. " - " .$conn->error;
	};
	


}



$conn->close(); // zamykanie tabeli ZAWSZE na końcu - to logiczne!
$conn = null; // zamykanie tabeli ZAWSZE na końcu - to logiczne!

?>
	
</body>
</html>	