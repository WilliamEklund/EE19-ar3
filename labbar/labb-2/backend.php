<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gästboken</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Gästboken</h1>
        <?php
        // Ta emot data som skickas
        $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);

        $meddelande = filter_input(INPUT_POST, 'meddelande', FILTER_SANITIZE_STRING);

        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);


        if ($rubrik && $meddelande && $namn) {

            // Filnamnet
            $filnamn = "gastbok.txt";

            // Texten att spara \n = ny textrad
            $texten = "Rubrik: $rubrik\n" .
        "Meddelande: $meddelande\n" . 
        "Namn: $namn\n";

            // Skapa och spara i textfil gastbok.txt
            file_put_contents($filnamn, $texten);

            //Bekräftelse
            echo "<p class = \"alert alert-success\">Tack för ditt meddelande</p>";

        } else {
            echo "<p class = \"alert alert-warning\">Något gick fel. Försök igen!</p>";
        }

        ?>

    </div>
</body>
</html>