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
    <title>Nyheter API - api projekt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app-root" class="container">
        <h1>Nyheter API</h1>
        <section class="user-section">
            <ul class="navLinks">
                <li>
                    <a class="anchor activeLink" href="./index.php">Nyheter API</a>
                </li>
                <li>
                    <a class="anchor" href="./football-api.php">Fotboll API</a>
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
        $category = $_POST["category"];
        $sortBy = $_POST["sortBy"];
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ?>
        <section class="search-section">
            <form method="post">
                <label>Välj kategori</label>
                <select name="category">
                    <option <?php if (isset($category) && $category == "Tesla")
                              echo "selected"; ?>>Tesla</option>
                    <option <?php if (isset($category) && $category == "Apple")
                              echo "selected"; ?>>Apple</option>
                    <option <?php if (isset($category) && $category == "WSJ")
                              echo "selected"; ?>>WSJ</option>
                    <option <?php if (isset($category) && $category == "Bitcoin")
                              echo "selected"; ?>>Bitcoin</option>
                </select>
                <select name="sortBy">
                    <option>Sortera efter</option>
                    <option <?php if (isset($sortBy) && $sortBy == "Nyaste")
                              echo "selected"; ?>>Nyaste</option>
                    <option <?php if (isset($sortBy) && $sortBy == "Populäraste")
                              echo "selected"; ?>>Populäraste</option>
                </select>
                <button type="submit">Verkställ</button>
            </form>
            <div class="search-result">
                <?php
                $apiKey = "8e64578c1f3c4ddda0eaf03e4ea8edd1";
                $teslaOpt = "everything?q=tesla";
                $appleOpt = "everything?q=apple";
                $wsjOpt = "everything?domains=wsj.com";
                $bitcoinOpt = "everything?q=bitcoin";
                $sortByNewest = "sortBy=publishedAt";
                $sortByPopular = "sortBy=popularity";
                $newestString = "<p>Sorterad efer: Nyaste</p>";
                $popularString = "<p>Sorterad efer: Populäraste</p>";

                if (!isset($category)) {
                  $url = "https://newsapi.org/v2/$teslaOpt&apiKey=$apiKey";
                  echo "<h2>Kategori: Tesla</h2>";
                }
                if ($category == "Tesla") {
                  $url = "https://newsapi.org/v2/$teslaOpt&apiKey=$apiKey";
                  echo "<h2>Kategori: Tesla</h2>";

                  if ($sortBy == "Populäraste") {
                    $url = "https://newsapi.org/v2/$teslaOpt&$sortByPopular&apiKey=$apiKey";
                    echo $popularString;
                  }
                  if ($sortBy == "Nyaste") {
                    $url = "https://newsapi.org/v2/$teslaOpt&$sortByNewest&apiKey=$apiKey";
                    echo $newestString;
                  }
                }
                // APPLE
                if ($category == "Apple") {
                  $url = "https://newsapi.org/v2/$appleOpt&apiKey=$apiKey";
                  echo "<h2>Kategori: Apple</h2>";

                  if ($sortBy == "Populäraste") {
                    $url = "https://newsapi.org/v2/$appleOpt&$sortByPopular&apiKey=$apiKey";
                    echo $popularString;
                  }
                  if ($sortBy == "Nyaste") {
                    $url = "https://newsapi.org/v2/$appleOpt&$sortByNewest&apiKey=$apiKey";
                    echo $newestString;
                  }
                }
                if ($category == "WSJ") {
                  $url = "https://newsapi.org/v2/$wsjOpt&apiKey=$apiKey";
                  echo "<h2>Kategori: Wall Street Journal</h2>";
                  if ($sortBy == "Populäraste") {
                    $url = "https://newsapi.org/v2/$wsjOpt&$sortByPopular&apiKey=$apiKey";
                    echo $popularString;
                  }
                  if ($sortBy == "Nyaste") {
                    $url = "https://newsapi.org/v2/$wsjOpt&$sortByNewest&apiKey=$apiKey";
                    echo $newestString;
                  }
                }
                if ($category == "Bitcoin") {
                  $url = "https://newsapi.org/v2/$bitcoinOpt&apiKey=$apiKey";
                  echo "<h2>Kategori: Bitcoin</h2>";

                  if ($sortBy == "Populäraste") {
                    $url = "https://newsapi.org/v2/$bitcoinOpt&$sortByPopular&apiKey=$apiKey";
                    echo $popularString;
                  }
                  if ($sortBy == "Nyaste") {
                    $url = "https://newsapi.org/v2/$bitcoinOpt&$sortByNewest&apiKey=$apiKey";
                    echo $newestString;
                  }
                }
                ?>
            </div>
        </section>
        <?php

        $json = file_get_contents($url);
        $data = json_decode($json);
        $totalResults = $data->totalResults;
        $articles = $data->articles;
        foreach ($articles as $key => $item) {
          $source = $item->source;
          $name = $source->name;
          $author = $item->author;
          $title = $item->title;
          $description = $item->description;
          $url = $item->url;
          $urlToImage = $item->urlToImage;
          $publishedAt = $item->publishedAt;
          $content = $item->content;
          echo "<section  id='$key' class=\"articles\" >" .
            "<h2>$title</h2>" .
            "<div class=\"content-container\">" .
            "<div class=\"text-container\">" .
            "<p>Author: $author</p>" .
            "<p>Description: $description</p>";
          echo "<p>Content: $content</p>" .
            "<p>Published: $publishedAt</p>" .
            "<p><a href=\"$url\">Full article</a></p>" .
            "<p>Source: $name</p>" .
            "</div>";
          echo "<div class=\"img-container\">" .
            "<img class=\"news-images\" src=\"$urlToImage\"></img>" .
            "</div>" .
            "</div>" .
            "</section>";
        }
        echo "<p>Total results: $totalResults</p>";
        ?>

    </div>
</body>
</html>