<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>News API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app-root" class="container">
        <h1>Börsnyheter</h1>
        <?php

        $category = $_POST["category"];
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ?>
        <form method="post">
            <label>Välj kategori</label>
            <select name="category">
                <option <?php if (isset($category) && $category == "Business")
                            echo "selected"; ?>>Business</option>
                <option <?php if (isset($category) && $category == "Tech")
                            echo "selected"; ?>>Tech</option>
                <option <?php if (isset($category) && $category == "tesla")
                            echo "selected"; ?>>tesla</option>
                <option <?php if (isset($category) && $category == "apple")
                            echo "selected"; ?>>apple</option>
                <option <?php if (isset($category) && $category == "wsj")
                            echo "selected"; ?>>wsj</option>
            </select>
            <button type="submit">Sök</button>
        </form>
        <?php
        $apiKey = "46f6fcbfc14d4f29848b3359f2150592";
        $businessOpt = "top-headlines?country=us&category=business";
        $techOpt = "top-headlines?sources=techcrunch";
        $teslaOpt = "everything?q=tesla";
        $sortByNew;
        $appleOpt = "everything?q=apple";
        $wsjOpt = "everything?domains=wsj.com";
        if (!isset($category)) {
            $url = "https://newsapi.org/v2/$businessOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori:</h2>";
        }
        if ($category == "Business") {
            $url = "https://newsapi.org/v2/$businessOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori: Företag</h2>";
        }
        if ($category == "Tech") {
            $url = "https://newsapi.org/v2/$techOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori: Teknik</h2>";
        }
        if ($category == "tesla") {
            $url = "https://newsapi.org/v2/$teslaOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori: Tesla</h2>";
        }
        if ($category == "apple") {
            $url = "https://newsapi.org/v2/$appleOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori: Apple</h2>";
        }
        if ($category == "wsj") {
            $url = "https://newsapi.org/v2/$wsjOpt&apiKey=$apiKey";
            echo "<h2>Vald kategori: Wall Street Journal</h2>";
        }

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
            echo "<section class=\"articles\" >" .
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
                "<img class=\"images\" src=\"$urlToImage\"></img>" .
                "</div>" .
                "</div>" .
                "</section>";
        }
        echo "<p>Total results: $totalResults</p>";
        ?>

    </div>
</body>
</html>