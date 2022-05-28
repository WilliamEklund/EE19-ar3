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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/vue-cookies@1.8.1/vue-cookies.js"></script>

    <script defer src="./app.js"> </script>
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
                                echo $_SESSION['email'];
                                ?>
                            </a>
                        </li>
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
                <span class="cart-amount" v-text="totalCart">{{totalCart}}</span>
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
                            <a class="anchor" href="./register.php">Registrera dig</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li>
                            <a class="anchor" href="#">
                                <?php
                                echo $_SESSION['email'];
                                ?>
                            </a>
                        </li>
                        <li>
                            <a class="anchor" href="./login.php?logout=true">Logga ut</a>
                            <?php
                            if (isset($_GET['logout'])) {
                                $_SESSION['Inloggad'] = false;
                                $GET_['logout'] = false;
                            }
                            ?>
                        </li>
                </ul>
            <?php
                    }
            ?>
            </div>
        </nav>
        <div class="content-container">
            <div class="top-content-wrapper">
                <div class="category-wrapper">
                    <h1>Kategorier</h1>
                    <section class="category-items">
                        <div class="beds category-item">
                            <h3>Sängar</h3>
                            <img src="https://www.ikea.com/global/assets/navigation/images/divan-beds-28433.jpeg?imwidth=150" alt="bed-category">
                        </div>
                        <div class="wardrobes category-item">
                            <h3>Garderober</h3>
                            <img src="https://www.ikea.com/global/assets/navigation/images/fitted-wardrobes-43632.jpeg?imwidth=150" alt="bed-category">
                        </div>
                        <div class="bookshelves category-item">
                            <h3>Bokhyllor</h3>
                            <img src="https://www.ikea.com/global/assets/navigation/images/bookcases-10382.jpeg?imwidth=150" alt="bed-category">
                        </div>
                    </section>
                </div>
                <div class="newsletter-wrapper">
                    <section class="newsletter-content">
                        <h1>Nyhetsbrev</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, nulla! Exercitationem rerum quo
                            praesentium
                            dolorem!</p>
                        <section id="newsletter" class="register-section forms">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label>Epost</label>
                                    <input type="email" name="email">
                                </div>
                                <div id="newsletter-check" class="form-check">
                                    <section id="newsletter-text" class="form-p">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit <a href="#"> Läs mer</a></p>
                                    </section>
                                    <section class="check-section">
                                        <a href="#">Godkänn villkor
                                        </a>
                                        <input type="checkbox" name="check">
                                    </section>
                                </div>
                                <button type="submit" class="btn btn-primary">Prenumera</button>
                            </form>
                        </section>
                    </section>
                </div>
            </div>
            <section class="cart-active" v-show="!isHidden">
                <section class="cart-modal">
                    <div class="close-cart-modal-wrapper">
                        <i @click="isHidden = true" class="bi bi-x-lg close-cart-btn" :class="{isShown: true}"></i>
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
                        <p id="totalAmount">Antal produkter: {{totalCart}}</p>
                        <p id="totalPrice">Totala pris: {{totalPrice}}</p>
                    </div>
                </section>
            </section>
            <!-- main content -->
            <div class="items-wrapper">
                <h1>Alla produkter</h1>
                <section class="items-container">
                    <div v-for="product in products" class="grid-box">
                        <div class="box-up">
                            <img class="box-img" :src="product.imgURL" v-bind:alt="product">
                            <div class="img-info">
                                <div class="info-inner">
                                    <span class="p-name">

                                        {{ product.label }}</span>
                                    <span class="p-category">

                                        {{ product.category }}</span>
                                    <span class="p-measure">

                                        {{ product.measure }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-down">
                            <span class="price">

                                {{ product.price }}</span>
                            <button class="add-to-cart" @click="addToCart(product), cartCounter+= 1">Add to cart</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php
        $email = filter_input(INPUT_POST, "email");

        if (isset($_POST['check']) == false) {
            $message =  "<p class=\"alert alert-danger newsletter-alert\"role=\"alert\">Godkänn villkoren för att fortsätta</p>";
            echo " <section class=\"check-section\">$message</section>";
        }
        if (isset($_POST['check']) && $email) {
            $sql = "SELECT * FROM newsletter WHERE `email` = '$email'";
            // RUN SQL Command
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<p class=\"alert alert-danger newsletter-alert\"role=\"alert\">Epost-addressen $email finns redan</p>";
            } else {
                // SQL Command - Lagra i databas
                $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

                $result = $conn->query($sql);
                if ($result) {
                    echo "
              <p class=\"alert alert-success newsletter-alert\"role=\"success\">Registrering lyckad</p>";
                } else {
                    echo "<p class=\"alert alert-danger newsletter-alert\"role=\"alert\">Något gick fel</p>";
                }
            }
        }

        $output = "";
        foreach ($_COOKIE as $key => $value) {
            // push
            $output .= $key . $value;
        }
        $name = substr($output, 39, 9);
        $amount = substr($output, 49, 1);
        $price = substr($output, 51);
        if ($_SESSION['Inloggad'] == true  && $amount > 0) {
            $sql = "INSERT INTO cart (name, amount, price) VALUES ('$name', '$amount', '$price')";
            $result = $conn->query($sql);
        } else {
            die;
        }
        ?>
    </div>
</body>

</html>