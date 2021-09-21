<?php

// Tar emot data från formuläret
$namn = $_POST["namn"];
$adress = $_POST["adress"];
$telefon = $_POST["telefon"];


if ($namn == "Admin") {
        # code...
        echo "<p>Hej Admin!</p>";
}
else {
echo "<p>Inte välkommen</p>";
}

?>