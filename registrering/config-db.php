<?php 
// felsökning
ini_set("display_errors", 1);
error_reporting(E_ALL);
//Uppgifter databas
$user = "bloggen_db";
$password = "4J(]2[O!ACZRb*nF";
$database = "bloggen_db";
$host = "localhost";

// Logga in
$conn = new mysqli($host, $user, $password, $database);

// Testa anslutning
if ($conn->connect_error) {
  die("connection error" . $conn->connect_error);
}
else {
  // echo "<h1>Success</h1>";
}
?>