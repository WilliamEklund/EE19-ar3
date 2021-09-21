<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>Variabler</title>
<script src="https://kit.fontawesome.com/e7c2c526f3.js"crossorigin=anonymous></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Variabler i PHP</h1>

<?php
$förnamn = "William";
$efternamn = "Eklund";
//echo $förnamn . " " . $efternamn;
echo "Mitt namn är $förnamn $efternamn <br>";
echo "Dagens datum är: ";
    setLocale(LC_ALL, "sv_SE.utf8");
    echo strftime("%A %d %B %Y");

echo "<p>";
    echo "Todays date is: ";
    date("%ll %d %F %Y");
    echo "</p>";
?>
</body>
</html>