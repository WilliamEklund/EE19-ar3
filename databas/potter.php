<?php
include("configdb.php")
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Harry Potter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lista på alla Harry Potter filmer</h1>
        <?php
        // 2. SQL-satsen vi vill köra
        $sql = "SELECT * FROM `movies` WHERE titel LIKE `%potter%`";

        // 3. Be mysql-servern köra frågan
        $result = $conn->query($sql);

        if (!$result) {
          die("Något blev fel med SQL-satsen");
        } else {
          // echo "SQL-satsen funkade bra";
          // var_dump($result);
          while ($rad = $result->fetch_assoc()) {
            echo "<p>$rad[titel] $rad[datum]</p>";
          }
        }
        ?>
    </div>

    <script> </script>
</body>
</html>