<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Testa PHP</h1>
    <?php
    echo "php string 1</p>";
    echo "php string 2</p>";
    echo "<p>";
    echo date("l d F Y");
    echo "</p>";

    echo "<p>";
    setLocale(LC_ALL, "sv_SE.utf8");
    echo strftime("%A %d %B %Y");
    echo "</p>";
    ?>

    <script> </script>
</body>
</html>