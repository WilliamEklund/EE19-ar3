<?php
include 'config-db.php';
session_start();
if (!isset($_SESSION['Inloggad'])) {
    $_SESSION['Inloggad'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/vue-cookies@1.8.1/vue-cookies.js"></script>
    <script defer src="./app.js"> </script>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div id="app-root" class="container">
        <header>
            <div class="hamburger-menu" @click="hideNav = !hideNav">
                <i :class="!hideNav ? 'bi-x-lg' : 'bi-list'"></i>
            </div>
            <div class="header-logo">
                <a href="./index.php">
                    <img class="header-img" src="./bilder/ikea-logo.f88b07ceb5a8c356b7a0fdcc9a563d63.svg" alt="ikea logo" />
                </a>
            </div>
            <div class="header-navlinks">
                <ul>
                    <li>
                        <a class="anchor" href="#">Nytt i sortimentet</a>
                    </li>
                    <li>
                        <a class="anchor" href="./produkter.php">Produkter</a>
                    </li>
                    <li>
                        <a class="anchor" href="#">Rum</a>
                    </li>
                </ul>
            </div>
            <div class="search-input">
                <a href="#"></a>
                <input type="text" placeholder="Vad letar du efter?" />
            </div>
            <div class="login-links">
                <?php
                if ($_SESSION['Inloggad'] == false) {
                ?>
                    <ul>
                        <li>
                            <a class="anchor" href="./login.php">Logga in</a>
                        </li>
                        <li>
                            <a class="anchor activeLink" href="./register.php">Registrera dig</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul>
                        <li>
                            <a class="anchor" href="#">
                                <?php
                                echo $_SESSION['email'];
                                ?>
                        <li>
                            <a class="anchor" href="./login.php?logout=true">Logga ut</a>
                            <?php
                            if (isset($_GET['logout'])) {
                                $_SESSION['Inloggad'] = false;
                                $GET_['logout'] = false;
                            }
                            ?>
                        </li>
                        </a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
            <!-- cart icon -->
            <div class="shopping-cart" :class="{bounce: isBouncing}" @click="isHidden = !isHidden">
                <!-- hide -->
                <i class="bi bi-cart"></i>
                <span class="cart-amount" v-text="cartAmount">{{cartAmount}}</span>
                <!-- show -->
            </div>
        </header>
        <!-- SIDENAV -->
        <nav class="sidenav" :class="hideNav" v-show="!hideNav">
            <div class="sidenav-content">
                <ul>
                    <li><a class="anchor" href="#">Nytt i sortimentet</a></li>
                    <li><a class="anchor" href="./produkter.php">Produkter</a></li>
                    <li><a class="anchor" href="#">Rum</a></li>
                    <?php
                    if ($_SESSION['Inloggad'] == false) {
                    ?>

                        <li>
                            <a class="anchor" href="./login.php">Logga in</a>
                        </li>
                        <li>
                            <a class="anchor  activeLink" href="./register.php">Registrera dig</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li>
                            <a class="anchor" href="#">
                                <?php
                                echo $_SESSION['email'];
                                ?>
                        <li>
                            <a class="anchor" href="./login.php?logout=true">Logga ut</a>
                            <?php
                            if (isset($_GET['logout'])) {
                                $_SESSION['Inloggad'] = false;
                                $GET_['logout'] = false;
                            }
                            ?>
                        </li>
                        </a>
                        </li>
                </ul>
            <?php
                    }
            ?>
            </div>
        </nav>
        <!-- CART MODAL -->
        <section class="cart-modal" v-show="!isHidden">
            <div class="close-cart-modal-wrapper">
                <i @click="isHidden = true" class="bi bi-x-lg close-cart-btn"></i>
            </div>
            <h2>Cart</h2>
            <ul class="cart-modal-items" v-for="(value, key) in cart">
                <img class="cart-img" :src="products[key].imgURL" alt="key">
                <div class="cart-modal-list">
                    <li>{{products[key].total}} {{value.total}}</li>
                    <li>{{products[key].label}}</li>
                    <li>{{products[key].category}}</li>
                    <li>{{products[key].measure}}</li>
                    <li>{{products[key].price}}</li>
                </div>
                <div class="remove-item-btn">
                    <i class="bi bi-x-square remove-item-btn" @click="removeItem(key)"></i>
                </div>
            </ul>
            <div class="cart-total">
                <p>Antal produkter: {{cartAmount}}</p>
                <p>Totala pris: {{totalPrice}}</p>
            </div>
        </section>
        <section class="register-section forms">
            <h1>Registrera dig</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Epost</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="">Skapa lösenord</label>
                    <input class="form-control" type="password" name="checkPassword">
                </div>
                <div class="form-group">
                    <label for="">Repetera lösenord</label>
                    <input class="form-control" type="password" name="getPassword">
                </div>
                <div class="form-check">
                    <section class="form-p">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit <a href="#"> Läs mer</a></p>

                    </section>
                    <section class="check-section">
                        <a href="#">Godkänn villkor
                        </a>
                        <input type="checkbox" name="check">
                    </section>
                </div>
                <button type="submit" class="btn btn-primary">Skicka</button>
            </form>

            <div class="login-link">
                <p>Har du redan ett konto?
                    <a href="./login.php">Klicka här</a>
                </p>
            </div>
            <?php
            //  Kod från uppgifter vi gjort
            $email = filter_input(INPUT_POST, "email");
            $checkPassword = filter_input(INPUT_POST, "checkPassword");
            $getPassword = filter_input(INPUT_POST, "getPassword");
            if (isset($_POST['submit'])) {
                if ($checkPassword != $getPassword) {
                    echo "<p class=\"alert alert-danger\"role=\"alert\">Lösenorden matchar inte</p>";
                    exit;
                }
                preg_match('/[0-9]+/', $getPassword, $matches);
                if (sizeOf($matches) == 0) {
                    echo "<p class=\"alert alert-danger\"role=\"alert\">Lösenordet måste innehålla minst ett nummer</p>";
                }


                if (isset($_POST['check']) == false) {
                    echo "<p class=\"alert alert-danger\"role=\"alert\">Godkänn villkoren för att fortsätta</p>";
                    exit;
                }
            }
            if (isset($_POST['check']) && $checkPassword == $getPassword && $email) {
                $sql = "SELECT * FROM users WHERE `email` = '$email'";
                // RUN SQL Command
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<p class=\"alert alert-danger\"role=\"alert\">Epost-addressen $email finns redan</p>";
                    exit;
                } else {
                    // GENERERA HASH LÖSENORD
                    $hash = password_hash($getPassword, PASSWORD_DEFAULT);
                    // SQL Command - Lagra i databas
                    $sql = "INSERT INTO users (email, hash) VALUES ('$email', '$hash')";

                    $result = $conn->query($sql);
                    if ($result) {
                        echo "<p class=\"alert alert-success\"role=\"success\">Registrering lyckad</p>";
                    } else {
                        echo "<p class=\"alert alert-danger\"role=\"alert\">Något gick fel</p>";
                        exit;
                    }
                }
            }


            ?>
        </section>
    </div>
</body>

</html>