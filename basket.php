<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>BookNest - Zielona księgarnia</title>
</head>
<body>
    <div id="container">
        <header>
            <a href="index.php">
            <div id="logo">
                <h1>BookNest</h1>
            </div>
            </a>
            <div id="user">
                <?php
                if(isset($_COOKIE['loggedin'])) {
                    echo('
                        <div class="dropdown">
                            <i class="fa-solid fa-user-tie"></i>
                            <div class="dropdown-content">
                                <a href="profil.html">Ustawienia</a>
                                <a href="logout.php">Wyloguj</a>
                            </div>
                        </div>');
                } else {
                    echo('<a href="login.html"><i class="fa-solid fa-user-tie"></i></a>');
                }
                ?>
                
            </div>
        </header>



        <nav>
            <ul>
                <a href="index.php"><li class="link">Strona główna</li></a>
                <a href="wishlist.php"><li class="link">Lista życzeń</li></a>
                <a href="basket.php"><li class="link current">Koszyk</li></a>
                <a href="management.php"><li class="link management-ui">Zarządzanie</li></a>
                
                <hr>

            </ul>            
        </nav>



        <main>
        <div id="books"></div>

        <div id="payment-options">
    <h3>Wybierz metodę płatności:</h3>
    <button class="payment-option" data-method="blik">
    <i class="fa-solid fa-mobile-screen-button"></i> BLIK
</button>

<button class="payment-option" data-method="paypal">
    <i class="fa-brands fa-paypal"></i> PayPal
</button>

<button class="payment-option" data-method="card">
    <i class="fa-solid fa-credit-card"></i> Karta płatnicza
</button>

</div>


        </main>

        <footer>
            <p>Stronę wykonali Magdalena Czyż, Karolina Turos, Nicole Roszak i Błażej Adamski.</p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/e44205ae58.js" crossorigin="anonymous"></script>   <!--font awesome icons kit-->
    <script src="scripts/management-ui.js"></script>
    <script src="scripts/basket.js"></script>
</body>
</html>