<?php
require('user-validator.php');
session_start();
if (isset($_POST['submit'])) {
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
    $success = $validation->validateForm();
    $_SESSION['Inloggad'] = true;
}
if (!isset($_SESSION['Inloggad'])) {
    $_SESSION['Inloggad'] = false;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Registrera dig - api projekt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app-root" class="container">
        <h1>Registrera dig</h1>
        <section class="register-section forms">
            <section class="user-section">
                <ul class="navLinks">
                    <li>
                        <a class="anchor" href="./index.php">Nyheter API</a>
                    </li>
                    <li>
                        <a class="anchor" href="./football-api.php">Fotboll API</a>
                    </li>
                    <?php
                    if ($_SESSION['Inloggad'] == false) {
                    ?>
                        <li>
                            <a class="anchor" href="./login.php">Logga in</a>
                        </li>
                        <li>
                            <a class="anchor activeLink" href="./register.php">Registrera dig</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li>
                            <?php
                            if ($errors['password'] !== '✔' || $errors['username'] !== '✔') {
                                echo "<a class=\"anchor\" href=\"#\">logga in</a>";
                                $_SESSION['Inloggad'] = false;
                            } else {
                                $_SESSION['Inloggad'] = true;
                                $_SESSION['username'] = $_POST['username'];
                                $globalUser = $_SESSION['username'];
                                echo "<a class=\"anchor\" href=\"#\">$globalUser</a>";
                            }


                            ?>
                        </li>
                        <li>
                            <?php
                            if ($errors['password'] !== '✔' || $errors['username'] !== '✔') {
                                echo "<a class=\"anchor\" href='./register.php' >Registrera dig</a>";
                            } else {
                                echo "<a class=\"anchor\" href='./login.php?logout=true' >Logga ut</a>";
                            }
                            if (isset($_GET['logout'])) {
                                header("Location: register.php");
                                $_SESSION['Inloggad'] = false;
                            }
                            ?>
                        </li>
                </ul>
            <?php
                    }
            ?>
            </section>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Användarnamn</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $_POST['username'] ?? '' ?>">
                </div>
                <div class="response">
                    <p class="success-icon">
                        <?php echo $errors['username'] ?? $success['username'] ?? '' ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="">lösenord</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $_POST['password'] ?? '' ?>">
                </div>
                <div class="response">
                    <p class="response-text">
                        <?php echo $errors['password'] ?? $success['password'] ?? '' ?>
                    </p>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Skicka">
            </form>

            <div class=" login-link">
                <p>Har du redan ett konto?
                    <a href="./login.php">Klicka här</a>
                </p>
            </div>
        </section>

    </div>
</body>
</html>