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
                    </a>
                </div>
            </div>
        </header>
        


        <nav>
            <ul>
                <a href="index.php"><li class="link">Strona główna</li></a>
                <a href="wishlist.php"><li class="link current">Lista życzeń</li></a>
                <a href="basket.php"><li class="link">Koszyk</li></a>
                <a href="management.php"><li class="link management-ui">Zarządzanie</li></a>
                
                <hr>
            </ul>            
        </nav>



        <main>
            <div id="books"></div>
        </main>
        
        <script src="scripts/basket_backend.js"></script>
        <script>
            // Funkcja do ładowania książek z listy życzeń z localStorage
            window.onload = function() {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    
    const booksContainer = document.getElementById('books');
    
    if (wishlist.length === 0) {
        booksContainer.innerHTML = '<p>Brak książek na liście życzeń.</p>';
    } else {
        wishlist.forEach(book => {
            const bookElement = document.createElement('div');
            bookElement.classList.add('book');

            bookElement.innerHTML = `
                <img src="${book.image}" alt="okładka książki">
                <h2>${book.title}</h2>
                <p>${book.author}</p>
                <p class="price">${book.price}</p>
                <div id="buttons">
                    <button class="add-to-cart">Kup</button>
                    <button class="wishlist-remove"><i class="fa-solid fa-trash"></i></button>
                </div>
            `;
            
            booksContainer.appendChild(bookElement);
        });

        // Usuwanie książek
        document.querySelectorAll('.wishlist-remove').forEach(button => {
            button.addEventListener('click', function() {
                const bookElement = button.closest('.book');
                const bookTitle = bookElement.querySelector('h2').innerText;

                wishlist = wishlist.filter(book => book.title !== bookTitle);
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                bookElement.remove();

                alert('Książka została usunięta z listy życzeń.');
            });
        });
    }
    createAddToCartListeners()
};

        </script>
        

        <footer>
            <p>Stronę wykonali Magdalena Czyż, Karolina Turos, Nicole Roszak i Błażej Adamski.</p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/e44205ae58.js" crossorigin="anonymous"></script>   <!--font awesome icons kit-->
    <script src="scripts/wishlist.js"></script>
    <script src="scripts/management-ui.js"></script>
</body>
</html>