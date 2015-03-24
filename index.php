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
<legend><strong><em>Dodawanie danych do bazy danych "KINO"</em></strong></legend><br>

<fieldset>
	<legend><strong><em>Kino</em></strong></legend><br>
		<form action="index.php" method="POST">
			<label>Nazwa:</label><br>
				<input type="text" name="nazwa"><br> 	
			<label>Adres:</label><br>	
				<input type="text" name="adres"><br>
			<button type="submit" name="submit" value="kino">Wyślij</button><br><br>
		</form>
</fieldset>	

	<br>
	
<fieldset>
	<legend><strong><em>Film</em></strong></legend><br>
		<form action="index.php" method="POST">
			<label>Tytuł:</label><br>
				<input type="text" name="tytul"><br>
			<label>Opis:</label><br>
				<input type="text" name="opis"><br>
			<label>Ocena:</label><br>
				<input type="text" name="ocena"><br>
			<button type="submit" name="submit" value="film">Wyślij</button><br><br>
		</form>
</fieldset>	
	
	<br>

<fieldset>
	<legend><strong><em>Bilet</em></strong></legend><br>
		<form action="index.php" method="POST">
			<label>Ilość:</label><br>		
				<input type="text" name="ilosc"><br> 
			<label>Cena:</label><br>
				<input type="text" name="cena"><br>
			<button type="submit" name="submit" value="bilet">Wyślij</button><br><br>
		</form>
</fieldset>
	
	<br>
		
<fieldset>
	<legend><strong><em>Płatność</em></strong></legend><br>
		<form action="index.php" method="POST">
			<label>Forma zapłaty:</label><br>
			<select name="formaZaplaty">
				<option value="gotowka">Gotówka</option>
				<option value="karta">Karta</option>
				<option value="przelew">Przelew</option></select><br>
			<label>Data:</label><br>
				<input type="text" name="data" placeholder="RRRR-MM-DD"><br>
			<button type="submit" name="submit" value="platnosc">Wyślij</button><br><br>
		</form>
</fieldset>
<br>
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
			id int AUTO_INCREMENT NOT NULL,
 			name varchar(255) NOT NULL,
 			address TEXT, 
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
			id int AUTO_INCREMENT NOT NULL,
 			name varchar(255) NOT NULL,
 			opis TEXT,
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
			id int AUTO_INCREMENT NOT NULL,
 			ilosc int NOT NULL DEFAULT 0,
 			cena float(5,2) NOT NULL DEFAULT 0.0,
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
			id int AUTO_INCREMENT NOT NULL,
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
			$sql = "INSERT INTO Kino (name, address) VALUES ('".$_POST['nazwa']."', '".$_POST['adres']."')";
				// , '".$."')";
			break;
		case "film";
			$sql = "INSERT INTO Film (name, opis, ocena) VALUES ('".$_POST['tytul']."', '".$_POST['opis']."', '".$_POST['ocena']."')";
			break;
		case "bilet";
			$sql = "INSERT INTO Bilet (ilosc, cena) VALUES ('".$_POST['ilosc']."', '".$_POST['cena']."')";
			break;
		case "platnosc";
			$sql = "INSERT INTO Platnosc (typ, data) VALUES ('".$_POST['formaZaplaty']."', '".$_POST['data']."')";
			break;
	}
	
	if ($conn->query($sql) === TRUE) {
		echo "Nowy wpis został dodany do bazy :)";
	} 
	else {
		echo "Coś poszło nie tak: " .$sql. " - " .$conn->error;
	};
	


}





?>
	
	
	<br>
	<br>
<hr>
	<br>		
	
	<h2>
	Wyświetlanie danych z bazy:
	</h2>

	<br>
<hr>
	<br>	
<?php

echo "Kina: ", '<br>';

$sql = "SELECT * FROM Kino";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "Nazwa: ".$row["name"]. ", Adres: ".$row["address"]."<br>";
	}
}
else {
	echo "Brak kin w bazie danych";
}


echo "Filmy: ", '<br>';

$sql = "SELECT * FROM Film";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "Nazwa: ".$row["name"]. ", Opis: ".$row["opis"]. ", Ocena: ".$row["rating"]."<br>";
	}
}
else {
	echo "Brak filmów w bazie danych";
}

echo "Bilety: ", '<br>';

$sql = "SELECT * FROM Bilet";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "Ilość: ".$row["ilosc"]. ", Cena: ".$row["cena"]."<br>";
	}
}
else {
	echo "Brak biletów w bazie danych";
}

echo "Kina: ", '<br>';

$sql = "SELECT * FROM Platnosc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "Typ: ".$row["typ"]. ", Data: ".$row["data"]."<br>";
	}
}
else {
	echo "Brak płatności w bazie danych";
}


$conn->close(); // zamykanie tabeli ZAWSZE na końcu - to logiczne!
$conn = null; 	// zamykanie tabeli ZAWSZE na końcu - to logiczne!

?>	
	
</body>
</html>	