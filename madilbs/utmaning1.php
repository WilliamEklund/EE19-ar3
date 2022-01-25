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
        $adjective = filter_input(INPUT_POST, 'adjective', FILTER_SANITIZE_STRING);
        $verbIng = filter_input(INPUT_POST, 'verbIng', FILTER_SANITIZE_STRING);
        $food = filter_input(INPUT_POST, 'food', FILTER_SANITIZE_STRING);
        $noun = filter_input(INPUT_POST, 'noun', FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        $plural = filter_input(INPUT_POST, 'plural', FILTER_SANITIZE_STRING);


        // IF sats
        if ($adjective && $verbIng && $food && $noun && $number && $plural) {
                $verben = ["eat", "love", "walk", "run", "talk", "swim", "cook", "look", "bark", "shoot", "sing"];


                echo "<p><strong>Mario:</strong> What a/an $adjective day, eh? The perfect day for $verbIng some Koopas. The $food Kingdom is crawling with them!</p>
                <p><strong>Luigi:</strong> You're right about that, dear $noun. I hope you're ready to " .  $verben = rand(0, 11) . 
                "<p><strong>Mario:</strong> ready? I've waited $number years to " . $verben = rand(0, 11) . 
                "that scoundrel Boswer!</p>
                <p><strong>Luigi:</strong> Pipe down. He has $bodyPart everywhere.</p>
                <p><strong>Mario:</strong> First I'll " . $verben = rand(0, 11) . 
                "and grab a(an $food. That I'll give me $noun.</p>
                ";
        }


        ?>
    </div>

</body>
</html>