<?php
include 'config-db.php';
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
                        <a class="anchor activeLink" href="#">Produkter</a>
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
                <ul>
                    <li>
                        <a class="anchor" href="./login.php">Logga in</a>
                    </li>
                    <li>
                        <a class="anchor" href="./register.php">Registrera dig</a>
                    </li>
                </ul>
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
                    <li><a class="anchor" href="#">Produkter</a></li>
                    <li><a class="anchor" href="#">Rum</a></li>
                    <li><a class="anchor" href="./login.php">Logga in</a></li>
                    <li><a class="anchor" href="./register.php">Registrera dig</a></li>
                </ul>
            </div>
        </nav>
        <div class="content-container">
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
            <!-- main content -->
            <div class="items-wrapper">
                <h1>Produkter</h1>
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
    </div>
</body>

</html>