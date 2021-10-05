<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>Labb 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="labb-1.css">
</head>
<body>
<div class="kontainer">
        <h1 class="display-4">Inloggning</h1>
        <?php

// Tar emot data från formuläret
$anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
$losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);

// villkor
if ($anamn == "Admin" && $losen == "secret123") {
        echo "<p class =\"alert alert-success\">Hej Admin!</p>";

}
else {
        echo "<p class =\"alert alert-warning\">Fel användarnamn eller lösenord</p>";

}

?>
</div>

</body>
</html>
