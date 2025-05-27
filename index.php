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
                <form id="searchbar" action="index.php" method="get">
                    <input type="text" name="search" placeholder="Wyszukaj książkę" 
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div id="user">
                <?php
                if (isset($_COOKIE['loggedin'])) {
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
                        <li class="link"><a href="index.php?category=1">Fantasy</a></li>
                        <li class="link"><a href="index.php?category=2">Sci-fi</a></li>
                        <li class="link"><a href="index.php?category=3">Romans</a></li>
                    </ul>
                </li>

                <li id="authors">
                    <h3>Autor</h3>
                    <form action="index.php" method="get">
                        <input type="text" placeholder="Jan Kowalski" name="author" 
                            value="<?php echo isset($_GET['author']) ? htmlspecialchars($_GET['author']) : ''; ?>" />
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>            
        </nav>

        <main>
            <div id="books">
                <?php
                $conn = new mysqli("localhost", "root", "", "bookstore");
                $conn->set_charset("utf8");

                if ($conn->connect_error) {
                    echo "<p>Błąd połączenia z bazą danych.</p>";
                    exit();
                }

                $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                $author = isset($_GET['author']) ? $conn->real_escape_string($_GET['author']) : '';
                $category = isset($_GET['category']) ? (int)$_GET['category'] : 0;

                $sql = "SELECT books.title, books.author, books.price, books.image, categories.name AS category
                        FROM books
                        JOIN categories ON books.category_id = categories.id";

                $whereClauses = [];

                if (!empty($search)) {
                    $whereClauses[] = "books.title LIKE '%$search%'";
                }

                if (!empty($author)) {
                    $whereClauses[] = "books.author LIKE '%$author%'";
                }

                if ($category > 0) {
                    $whereClauses[] = "books.category_id = $category";
                }

                if (count($whereClauses) > 0) {
                    $sql .= " WHERE " . implode(" AND ", $whereClauses);
                }

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="book">';
                        echo '<img src="img/book-covers/' . htmlspecialchars($row["image"]) . '" alt="okładka książki">';
                        echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                        echo '<p>' . htmlspecialchars($row["author"]) . '</p>';
                        echo '<p>' . htmlspecialchars($row["category"]) . '</p>';
                        echo '<p class="price">' . number_format($row["price"], 2) . ' zł</p>';
                        echo '<div id="buttons">';
                        echo '<button class="add-to-cart">Kup</button>';
                        echo '<button class="wishlist-add"><i class="fa-solid fa-heart"></i></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Nie znaleziono książek.</p>";
                }

                $conn->close();
                ?>
            </div>
        </main>

        <footer>
            <p>Stronę wykonali Magdalena Czyż, Karolina Turos, Nicole Roszak i Błażej Adamski.</p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/e44205ae58.js" crossorigin="anonymous"></script>
    <script src="scripts/management-ui.js"></script>
    <script src="scripts/basket_backend.js"></script>
</body>
</html>
