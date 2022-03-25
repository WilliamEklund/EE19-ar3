<?php
include 'config-db.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Registrera</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Bloggen</h1>

        <!-- PHP KOD -->
        <?php
        $name =  filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        // var_dump($user, $email, $password);

        if ($name && $email && $password) {
          // GENERERA HASH LÖSENORD
          $hash = password_hash($password, PASSWORD_DEFAULT);
          // SQL Command - Lagra i databas
          $sql = "INSERT INTO register (namn, epost, hash) VALUES ('$name', '$email', '$hash')";

          // RUN SQL Command
          $result = $conn->query($sql);
        }
        if (!$result) {
          die("<p class=\"alert alert-danger\"role=\"alert\">Error</p>");
        } else {
          echo "<p class=\"alert alert-success\"role=\"alert\">$name - Registrerad</p>";
        }
        ?>
    </div>


</body>
</html>