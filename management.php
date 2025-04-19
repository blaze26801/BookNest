<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/management.css">
    <title>BookNest - Zielona księgarnia</title>
</head>
<body>
    <div id="container">
        <header>
            <a href="index.html">
            <div id="logo">
                <h1>BookNest</h1>
            </div>
            </a>
            <div id="search">
                <form id="searchbar" action="">
                    <input type="text" placeholder="Wyszukaj">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div id="user">
                <?php
                if(isset($_COOKIE['loggedin'])) {
                    echo('
                        <div class="dropdown">
                            <i class="fa-solid fa-user-tie"></i>
                            <div class="dropdown-content">
                                <a href="profil.html">Ustawienia</a>
                                <a href="#">Wyloguj</a>
                            </div>
                        </div>');
                } else {
                    echo('<a href="login.html"><i class="fa-solid fa-user-tie"></i></a>');
                }
                ?>
                </a>
            </div>
        </header>



        <nav>
            <ul>
                <a href="index.html"><li class="link">Strona główna</li></a>
                <a href="wishlist.php"><li class="link">Lista życzeń</li></a>
                <a href="basket.php"><li class="link">Koszyk</li></a>
                <a href="management.php"><li class="link management-ui">Zarządzanie</li></a>
                
                <hr>

                <li><h2>Filtry</h2></li>
                
                <li id="genres">
                    <h3>Gatunki</h3>
                    <ul>
                        <li class="link" id="genre-fantasy">Fantasy</li>
                        <li class="link" id="genre-scifi">Sci-fi</li>
                        <li class="link" id="genre-romance">Romans</li>
                    </ul>
                </li>
                
                <li id="authors">
                    <h3>Autor</h3>
                    <form action="">
                        <input type="text" placeholder="Jan Kowalski" name="author">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>            
        </nav>



        <main>
            <div id="management">
            <section id="add">
                <h2>Dodaj książkę</h2>
                <form id="manage-add" action="">
                    <input type="text" placeholder="Tytuł książki" name="title">
                    <input type="text" placeholder="Autor" name="author">
                    <input type="number" placeholder="Cena" name="price">
                    <input type="submit" value="Dodaj">
                </form>
            </section>
            <hr>
            <section>
                <h2>Usuń książkę</h2>
                <form action="">
                <select name="remove" id="manage-remove">
                    <option value="ID">Tytuł książki z bazy</option>
                    <option value="ID">Tytuł książki z bazy</option>
                    <option value="ID">Tytuł książki z bazy</option>
                    <option value="ID">Tytuł książki z bazy</option>
                    <option value="ID">Tytuł książki z bazy</option>
                </select>
                <input type="submit" value="Usuń">
                </form>
            </section>
            <hr>
            <section>
                <h2>Edytuj książkę</h2>
                <form action="">
                    <select name="edit" id="manage-edit">
                        <option value="ID">Tytuł książki z bazy</option>
                        <option value="ID">Tytuł książki z bazy</option>
                        <option value="ID">Tytuł książki z bazy</option>
                        <option value="ID">Tytuł książki z bazy</option>
                        <option value="ID">Tytuł książki z bazy</option>
                    </select><br>
                        <input type="text" placeholder="Tytuł książki" name="title"><br>
                        <input type="text" placeholder="Autor" name="author"><br>
                        <input type="number" placeholder="Cena" name="price"><br>
                        <input type="submit" value="Edytuj">
                    </form>
                </form>
            </section>
                
            </div>
        </main>

        <footer>
            <p>Stronę wykonali Magdalena Czyż, Karolina Turos, Nicole Roszak i Błażej Adamski.</p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/e44205ae58.js" crossorigin="anonymous"></script>   <!--font awesome icons kit-->
    <script src="scripts/management-ui.js"></script>
</body>
</html>