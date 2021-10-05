<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h3>Hur varmt är det?</h3>

        <?php
        $temp = filter_input(INPUT_POST, 'temp', FILTER_SANITIZE_STRING);
        $riktning = filter_input(INPUT_POST, 'riktning', FILTER_SANITIZE_STRING);

        echo "<p>Tempraturen bilr $temp&deg;</p>";

        if ($riktning == "cf") {
                $farenheit = $temp * 1.8 + 32;
                echo "<p>$temp&deg; Celsius är $farenheit&deg; Farenheit</p>";

        } else {
                $celsius = ($temp - 32) / 1.8;
                echo "<p>$temp&deg; Farenheit är $celsius&deg; Celsius</p>";
        }
        echo "<p>Riktinigen är $riktning&deg;</p>";


        ?>
    </div>