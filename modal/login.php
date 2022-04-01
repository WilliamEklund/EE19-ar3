<?php
include 'config-db.php';

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
if ($email && $password) {
  // CHECK FOR DUPLICATES
  $sql = "SELECT * FROM register WHERE `epost` = '$email'";
  // RUN SQL Command
  $result = $conn->query($sql);

  if (!$result) {
    echo "Fel";
  } else {
    // add values o array
    $rad = $result->fetch_assoc();
    // GENERERA HASH LÖSENORD
  }
  if (password_verify($password, $rad['hash'])) {
    echo "Inloggad";
    $_SESSION['Inloggad'] = true;
  } else {
    echo "Fel uppgifter";
  }
}
