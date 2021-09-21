<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>Uppgift 4</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$tid = date("h:i:s");
echo "Klockan är $tid<br>";

echo "Klockan är ";
echo strftime("%T");
?>

</body>
</html>