<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netmask</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Netmask</h1>
        <?php
        // Ta emot data som skickas
        $ip = filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING);

        $subnet = filter_input(INPUT_POST, 'subnet', FILTER_SANITIZE_STRING);

        $d_gateway = filter_input(INPUT_POST, 'd_gateway', FILTER_SANITIZE_STRING);


        if ($ip && $subnet && $d_gateway) {

            // Filnamnet
            $filnamn = "netmask.txt";

            // Texten att spara \n = ny textrad
            $texten = "ip adress: $ip\n" .
        "subnetmask: $subnet\n" . 
        "deafult gateway: $d_gateway\n";

            // Skapa och spara i textfil gastbok.txt
            file_put_contents($filnamn, $texten);

            //Bekräftelse
            echo "<p class = \"alert alert-success\">Tack för ditt meddelande</p>";

        } else {
            echo "<p class = \"alert alert-warning\">Något gick fel. Försök igen</p>";
        }

        ?>

    </div>
</body>
</html>