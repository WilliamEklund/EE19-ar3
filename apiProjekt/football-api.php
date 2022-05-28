<?php
session_start();
if (!isset($_SESSION['Inloggad'])) {
  $_SESSION['Inloggad'] = false;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Fotboll API - api projekt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app-root" class="container">
        <h1>Fotboll API</h1>
        <section class="user-section">
            <ul class="navLinks">
                <li>
                    <a class="anchor" href="./index.php">Nyheter API</a>
                </li>
                <li>
                    <a class="anchor activeLink" href="./football-api.php">Fotboll API</a>
                </li>
                <?php
                if ($_SESSION['Inloggad'] == false) {
                ?>
                    <li>
                        <a class="anchor" href="./login.php">Logga in</a>
                    </li>
                    <li>
                        <a class="anchor" href="./register.php">Registrera dig</a>
                    </li>

                <?php
                } else {
                ?>

                    <li>
                        <?php
                        if ($errors) {
                          $_SESSION['Inloggad'] = false;
                          echo "<a class=\"anchor activeLink\" href=\"./login.php\">Logga in</a>";
                        } else {
                          $_SESSION['Inloggad'] = true;
                          $globalUser = $_SESSION['username'];
                          echo "<a class=\"anchor\" href=\"#\">$globalUser</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($errors) {
                          $_SESSION['Inloggad'] = false;
                          echo "<a class=\"anchor\" href=\"./register.php\">Registrera dig</a>";
                        }
                        if (isset($globalUser)) {
                          $logoutHref = "./login.php?logout=true";
                          $link = "<a class=\"anchor\" href=\"$logoutHref\">Logga ut</a>";
                          echo $link;
                        }
                        if (isset($_GET['logout'])) {
                          header("Location: login.php");
                          $_SESSION['Inloggad'] = false;
                        }


                        ?>
                    </li>
            </ul>
        <?php
                }
        ?>
        </section>
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ?>

        <div id="football-table" class="search-result">
            <?php
            $apiKey = "1dd19c59fa0d44b3aef7d7994f2de681";
            $url = "http://api.football-data.org/v4/competitions/";
            $json = file_get_contents($url);
            $data = json_decode($json);
            $competitions = $data->competitions;
            $count = $data->count;
            echo "<table>" .
              "<thead>" .
              "<tr>" .
              "<th>Land</th>" .
              "<th>Flagga</th>" .
              "<th>Namn</th>" .
              "<th>Typ</th>" .
              "<th>emblem</th>" .
              "<th>Plan</th>" .
              "<th>Startdatum</th>" .
              "<th>Slutdatum</th>" .
              "<th>Matchdag</th>" .
              "</tr>" .
              "</thead>" .

              "<tbody>";
            foreach ($competitions as $key => $item) {
              $area = $item->area;
              $country = $area->name;
              $flag = $area->flag;
              $name = $item->name;
              $type = $item->type;
              $emblem = $item->emblem;
              $plan = $item->plan;
              $currentSeason = $item->currentSeason;
              $startDate = $currentSeason->startDate;
              $endDate = $currentSeason->endDate;
              $currentMatchday = $currentSeason->currentMatchday;
              $currentSeason->currentMatchday;

              echo "<tr>" .
                "<td>$country</td>" .
                "<td><img class=\"flag\" src=\"$flag\"</img></td>" .
                "<td>$name</td>" .
                "<td>$type</td>" .
                "<td><img class=\"emblem\" src=\"$emblem\"</img></td>" .
                "<td>$plan</td>" .
                "<td>$startDate</td>" .
                "<td>$endDate</td>" .
                "<td>$currentMatchday</td>" .
                "</tr>";
            }
            echo "</table>" .
              "</tbody>";
            echo "<p>Totalt: $count</p>";

            ?>
        </div>
</body>
</html>