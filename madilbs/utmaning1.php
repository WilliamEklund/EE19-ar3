<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>Utmaning 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="kontainer">
        <h1 class="display-4">Madlibs</h1>
        <?php

// Tar emot data från formuläret
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
$adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
$adjektiv = filter_input(INPUT_POST, 'adjektiv', FILTER_SANITIZE_STRING);
$verb = filter_input(INPUT_POST, 'verb', FILTER_SANITIZE_STRING);
$plural = filter_input(INPUT_POST, 'plural', FILTER_SANITIZE_STRING);

// output
        echo "<p class =\"alert alert-success\">Namnet är $namn den männksliga varelsen bor på adressen $adress dens favorit adjektiv är $adjektiv och dens favorit verb är $verb, dens favorit plural är $plural</p>";


?>
</div>

</body>
</html>
