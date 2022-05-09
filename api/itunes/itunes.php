<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Ituens API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sök Itunes låtar</h1>
        <form action="#" method="POST">
            <label></label>
            <input type="text" name="firstName" placeholder="Förnamn">
            <label></label>
            <input type="text" name="lastName" placeholder="Efternamn">
            <label></label>
            <!-- <!-- <input type="text" name="input" placeholder="Artist, låt, album"> -->
            <button type="submit" name="submit">Sök</button>
        </form>
        <?php
        // $input = filter_input(INPUT_POST, "input");
        $firstName = filter_input(INPUT_POST, "firstName");
        $lastName = filter_input(INPUT_POST, "lastName");

        if ($firstName && $lastName) {
          $url = "https://itunes.apple.com/search?term=$firstName+$lastName&limit=10";
          $json = file_get_contents($url);
          $data = json_decode($json);
          $resultCount = $data->resultCount;
          $results = $data->results;
          echo "<table>";
          echo "<theader>";
          echo "</tr>";
          echo "<th>Artist</th>";
          echo "<th>Album</th>";
          echo "<th>Spår</th>";
          echo "<th>Album</th>";
          echo "<th>Bild</th>";
          echo "<th>Längd</th>";
          echo "<th>Genre</th>";
          echo "</tr>";
          echo "</theader>";
          foreach ($results as $track) {
            $artistName = $track->artistName;
            $collectionName = $track->collectionName;
            $trackName = $track->trackName;
            $artworkUrl100 = $track->artworkUrl100;
            $trackTimeMillis = $track->trackTimeMillis;
            $trackTime = $track->$trackTimeMillis / 1000;
            $primaryGenreName = $track->primaryGenreName;
            echo "<tr>";
            echo "<td>$artistName</td>";
            echo "<td>$collectionName</td>";
            echo "<td>$trackName</td>";
            echo "<td><img src=\"$artworkUrl100\"></img></td>";
            echo "<td>$trackTime</td>";
            echo "<td>$primaryGenreName</td>";
            echo "</tr>";
          }
          echo "</table>";
          // if (isset($_POST['submit'])) {
          // }
        }
        ?>
    </div>
</body>
</html>