<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Weather API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Vädret Idag</h1>
        <?php
        $town = "Stockholm";
        $appId = "22ee1d58f7adae08ee71fa7c0bd24481";
        // $url = "http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=$appId";
        $url = "http://api.openweathermap.org/data/2.5/weather?q=$town&appid=$appId&units=metric";
        $json = file_get_contents($url);
        $data = json_decode($json);

        // get specific data
        // WEATHER
        $weather = $data->weather;
        $description = $weather[0]->description;
        // MAIN
        $main = $data->main;
        // get data in $main array
        $temp = $main->temp;
        // WIND
        $wind = $data->wind;
        // get data in $wind array
        $speed = $wind->speed;
        // COORD
        $coord = $data->coord;
        $icon_url = "http://openweathermap.org/img/wn/04d@2x.png";
        $icon = $data->icon;
        // get data in $coord array
        $lon = $coord->lon;
        $lat = $coord->lat;
        echo "<p>Tempratur: $temp &deg;C</p> 
        <p>Kordinater: longitude: $lon latitude: $lat</p> 
        <p><img src=\"$icon_url\"> Vindhastighet: $speed</p>
        <p>Beskrivning: $description";


        // get specific data
        $dataValues = array(
            $weather,
            $description,
            $main,
            $temp,
            $wind,
            $speed,
            $coord,
            $lon,
            $lat,
        );
        ?>
    </div>

    <script> </script>
</body>
</html>