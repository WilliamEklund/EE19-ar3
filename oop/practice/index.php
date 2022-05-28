<?php
require('validator.php');
if (isset($_POST['submit'])) {
  $validation = new UserValidator($_POST);
  $errors = $validation->validateForm();
}
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
        <section class="register-section forms">
            <ul>
                <li>
                    <a class="anchor activeLink" href="./index.php">API</a>
                </li>
                <?php
                if ($_SESSION['Inloggad'] == false) {
                ?>
                    <li>
                        <a class="anchor activeLink" href="./login.php">Logga in</a>
                    </li>
                    <li>
                        <a class="anchor" href="./register.php">Registrera dig</a>
                    </li>
            </ul>
        <?php
                } else {
        ?>
            <ul>
                <li>
                    <a class="anchor" href="#">
                        <?php
                        $_SESSION['username'] = filter_input(INPUT_POST, "username");
                        echo $_SESSION['username'];
                        ?>
                    </a>
                </li>
                <li>
                    <a class="anchor" href="./index.php?logout=true">Logga ut</a>
                    <?php
                    if (isset($_GET['logout'])) {
                      $_SESSION['Inloggad'] = false;
                      $_GET['logout'] = false;
                    }
                    ?>
                </li>
            </ul>
        <?php
                }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Användarnamn</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="error">
                <?php echo $errors['username'] ?? '' ?>
            </div>
            <div class="form-group">
                <label for="">lösenord</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="error">
                <?php echo $errors['password'] ?? '' ?>
            </div>

            <input type="submit" name="submit" class="btn btn-primary">
        </form>

        <div class="login-link">
            <p>Har du inte ett konto?
                <a href="./register.php">Klicka här</a>
            </p>
        </div>
        </section>

    </div>
</body>
</html>