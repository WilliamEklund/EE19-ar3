<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Chuck Norris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Chuck Norris Skämt xD</h1>
        <?php
        $url = "https://api.chucknorris.io/jokes/random";
        $icon_url = "https://assets.chucknorris.host/img/avatar/chuck-norris.png";
        $json = file_get_contents($url, $icon_url);
        var_dump($json);

        $data = json_decode($json);
        $skämt = $data->value;
        $icon = $data->icon_url;

        echo "<p>$skämt</p>";
        echo "<img src=\"$icon_url\">";
        ?>
    </div>

</body>
</html>