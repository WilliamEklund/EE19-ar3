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
    <title>Registrera</title>
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
                    <a class="nav-link login-link" aria-current="page" href="./logga-in.php">Logga in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link register-link active" href="#">Registrera dig</a>
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
            <h3>Registrera dig</h3>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Namn</label>
                    <input type="text" class="form-control" id="name" placeholder="Namn" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Registrera dig</button>
            </form>
            <!-- PHP KOD -->
            <?php
            $name =  filter_input(INPUT_POST, "name");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");

            // var_dump($user, $email, $password);

            if ($name && $email && $password) {
                // CHECK FOR DUPLICATES
                $sql = "SELECT * FROM register WHERE `namn` = '$name' OR `epost` = '$email'";
                // RUN SQL Command
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<p class=\"alert alert-danger\"role=\"alert\">User already exists</p>";
                } else {
                    // GENERERA HASH LÖSENORD
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    // SQL Command - Lagra i databas
                    $sql = "INSERT INTO register (namn, epost, hash) VALUES ('$name', '$email', '$hash')";
                    // RUN SQL Command
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("<p class=\"alert alert-danger\"role=\"alert\">Error</p>");
                    } else {
                        echo "<p class=\"alert alert-success\"role=\"alert\">$name - Registrerad</p>";
                    }
                }
            }
            ?>
        </main>
    </div>

    <script> </script>
</body>
</html>