<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>NASA API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sök NASA bilder</h1>
        <form action="#" method="POST">
            <label for="">Ange datum</label>
            <input type="date" name="date" placeholder="YYYY-MM-DD">
            <button type="submit" name="submit">Sök</button>
        </form>
        <?php
        $input = filter_input(INPUT_POST, "date");
        if ($input) {
            if ($input > date("Y-m-d")) {
                echo "<h3>Ändra till dagens eller ett datum som redan har varit</h3>";
            } else {
                $appId = "AgjV74XsECwfEvqXvaZc6oClzRP6Ng8fpdjvnOgB";
                // $url = "http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=$appId";
                $url = "https://api.nasa.gov/planetary/apod";
                $json = file_get_contents("$url?api_key=$appId&date=$input");
                $data = json_decode($json);
                $date = $data->date;
                $copyright = $data->copyright;
                $hdurl = $data->hdurl;
                $explanation = $data->explanation;
                if (isset($_POST['submit'])) {
                    echo "<p> Datum: $date</p>
                        <img src=\"$hdurl\"></img>
                        <p>Explanation: $explanation</p>
                        <p>Copyright: $copyright</p>";
                }
            }
        }


        // // get specific data
        // // WEATHER
        // $weather = $data->weather;
        // $description = $weather[0]->description;
        // // MAIN
        // $main = $data->main;
        // // get data in $main array
        // $temp = $main->temp;
        // // WIND
        // $wind = $data->wind;
        // // get data in $wind array
        // $speed = $wind->speed;
        // // COORD
        // $coord = $data->coord;
        // $icon_url = "http://openweathermap.org/img/wn/04d@2x.png";
        // $icon = $data->icon;
        // // get data in $coord array
        // $lon = $coord->lon;
        // $lat = $coord->lat;
        // echo "<p>Tempratur: $temp &deg;C</p> 
        // <p>Kordinater: longitude: $lon latitude: $lat</p> 
        // <p><img src=\"$icon_url\"> Vindhastighet: $speed</p>
        // <p>Beskrivning: $description";


        // // get specific data
        // $dataValues = array(
        //     $weather,
        //     $description,
        //     $main,
        //     $temp,
        //     $wind,
        //     $speed,
        //     $coord,
        //     $lon,
        //     $lat,
        // );
        ?>
    </div>

    <script> </script>
</body>
</html>