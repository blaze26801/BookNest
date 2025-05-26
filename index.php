<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/style.css" />
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
            <div id="search">
                <form id="searchbar" action="wishlist.php" method="get">
                    <input type="text" name="search" placeholder="Wyszukaj książkę" 
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div id="user">
                <?php
                if(isset($_COOKIE['loggedin'])) {
                    echo '
                        <div class="dropdown">
                            <i class="fa-solid fa-user-tie"></i>
                            <div class="dropdown-content">
                                <a href="profil.html">Ustawienia</a>
                                <a href="logout.php">Wyloguj</a>
                            </div>
                        </div>';
                } else {
                    echo '<a href="login.html"><i class="fa-solid fa-user-tie"></i></a>';
                }
                ?>
            </div>
        </header>

        <nav>
            <ul>
                <a href="index.php"><li class="link">Strona główna</li></a>
                <a href="wishlist.php"><li class="link">Lista życzeń</li></a>
                <a href="basket.php"><li class="link">Koszyk</li></a>
                <a href="management.php"><li class="link management-ui">Zarządzanie</li></a>

                <hr />

                <li><h2>Filtry</h2></li>

                <li id="genres">
                    <h3>Gatunki</h3>
                    <ul>
                        <li class="link"><a href="wishlist.php?category=1<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?><?php echo isset($_GET['author']) ? '&author=' . urlencode($_GET['author']) : ''; ?>">Fantasy</a></li>
                        <li class="link"><a href="wishlist.php?category=2<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?><?php echo isset($_GET['author']) ? '&author=' . urlencode($_GET['author']) : ''; ?>">Sci-fi</a></li>
                        <li class="link"><a href="wishlist.php?category=3<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?><?php echo isset($_GET['author']) ? '&author=' . urlencode($_GET['author']) : ''; ?>">Romans</a></li>
                    </ul>
                </li>

                <li id="authors">
                    <h3>Autor</h3>
                    <form action="wishlist.php" method="get">
                        <input type="text" placeholder="Jan Kowalski" name="author" 
                            value="<?php echo isset($_GET['author']) ? htmlspecialchars($_GET['author']) : ''; ?>" />
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
        </nav>

        <main>
            <div id="books"></div>
        </main>

        <script src="scripts/basket_backend.js"></script>
        <script>
            window.onload = function() {
                let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                const booksContainer = document.getElementById('books');

                if (wishlist.length === 0) {
                    booksContainer.innerHTML = '<p>Brak książek na liście życzeń.</p>';
                    return;
                }

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

                document.querySelectorAll('.wishlist-remove').forEach(button => {
                    button.addEventListener('click', function() {
                        const bookElement = button.closest('.book');
                        const bookTitle = bookElement.querySelector('h2').innerText;

                        wishlist = wishlist.filter(book => book.title !== bookTitle);
                        localStorage.setItem('wishlist', JSON.stringify(wishlist));
                        bookElement.remove();

                        alert('Książka została usunięta z listy życzeń.');
                        if (wishlist.length === 0) {
                            booksContainer.innerHTML = '<p>Brak książek na liście życzeń.</p>';
                        }
                    });
                });

                createAddToCartListeners();
            };
        </script>

        <footer>
            <p>Stronę wykonali Magdalena Czyż, Karolina Turos, Nicole Roszak i Błażej Adamski.</p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/e44205ae58.js" crossorigin="anonymous"></script>
    <script src="scripts/management-ui.js"></script>
</body>
</html>
