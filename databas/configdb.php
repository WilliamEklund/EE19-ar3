<?php
//Aktivera felmeddelanden
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


// uppgifter - logga in - mysql-databas
$host = "localhost";
$databas = "movies_db";
$user = "movies_db";
$pass = "-/4cKRpO/Ap5juox";

// Logga in
$conn = new mysqli($host, $user, $pass, $databas);

// Testa anslutning
if ($conn->connect_error) {
  echo "Connection Erorr" . $conn->connect_error;
}
else {
// echo "Du är inloggad!";
}
?>



