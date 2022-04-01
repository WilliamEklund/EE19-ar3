<?php
include 'config-db.php';
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
    <title>Logga in</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($_SESSION['Inloggad'] == true) {
      echo "<p class=\"alert alert-success\"role=\"alert\"> Inloggad</p>";
    } else {
      echo "<p class=\"alert alert-warning\"role=\"alert\"> Utloggad</p>";
    }
    ?>
    <div class="container">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <?php
            if ($_SESSION['Inloggad'] == false) {
            ?>
                <li class="nav-item">
                    <a class="nav-link login-link active" aria-current="page" href="./logga-in.php">Logga in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link register-link" href="./registrera.php">Registrera dig</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="./admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logga-ut.php">Logga ut</a>
                </li>
            <?php
            }
            ?>
        </ul>
        <main>
            <h3>Logga in</h3>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Logga in</button>
            </form>
            <!-- PHP KOD -->
            <?php
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");

            // var_dump($user, $email, $password);

            if ($email && $password) {
              // CHECK FOR DUPLICATES
              $sql = "SELECT * FROM register WHERE `epost` = '$email'";
              // RUN SQL Command
              $result = $conn->query($sql);

              if (!$result) {
                die("<p class=\"alert alert-danger\"role=\"alert\">Något gick fel</p>");
              } else {
                // add values o array
                $rad = $result->fetch_assoc();
                // GENERERA HASH LÖSENORD
              }
              if (password_verify($password, $rad['hash'])) {
                echo "<p class=\"alert alert-success\"role=\"alert\"> Inloggad</p>";
                $_SESSION['Inloggad'] = true;
                header("Location: admin.php");
              } else {
                echo "<p class=\"alert alert-danger\"role=\"alert\"> Fel lösenord eller epost-address</p>";
              }
            }
            ?>
        </main>
    </div>
</body>
</html>